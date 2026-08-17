<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Traits\Logger;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\SMSController;
use Illuminate\Support\Facades\DB;


class payController extends Controller
{
    use Logger;

    public function __construct(public Order $orderModel)
    {
        // می‌تونی middleware هم اینجا اضافه کنی اگه لازمه
    }
    /**
     * ایجاد درخواست پرداخت و ریدایرکت به درگاه زرین‌پال
     */
    public function pay(PayRequest $request, CheckoutController $checkout)
    {
        DB::beginTransaction();

        try {
            $checkout->updateOrderAddress($request->order_id, $request->address);
            $order = $this->orderModel->findOrFail($request->order_id);

            $response = zarinPal()
                ->amount((int)$order->total_price)
                ->request()
                ->description('پرداخت سفارش شماره #' . $order->id)
                ->callbackUrl(route('payment.callback', ['orderId' => $order->id]))
                ->mobile(auth()->user()->phone ?? '')
                ->email(auth()->user()->email ?? '')
                ->send();
            if (!$response->success()) {
                DB::rollBack();
                return back()->withErrors(['payment_error' => $response->error()->message()]);
            }

            Payment::create([
                'order_id' => $order->id,
                'amount' => $order->total_price,
                'authority' => $response->authority(),
                'ref_code' => null,
                'status' => 'pending',
            ]);
            $order->update([
                'authority' => $response->authority(),
                'status' => 'pending',
            ]);

            DB::commit();

            return $response->redirect();

        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error('Zarinpal Request Error: ' . $e->getMessage(), [
                'order_id' => $request->order_id,
                'line' => $e->getLine()
            ]);

            return back()->withErrors(['payment_error' => 'خطا در برقراری ارتباط با درگاه پرداخت.']);
        }
    }


    public function callback(Request $request)
    {
        $authority = $request->query('Authority');
        $status = $request->query('Status');

        if (!$authority) {
            return redirect()->route('pay.result')
                ->with('error', 'اطلاعات پرداخت نامعتبر است.');
        }

        $payment = Payment::where('authority', $authority)->first();

        if (!$payment) {
            return redirect()->route('pay.result')
                ->with('error', 'پرداختی با این شناسه یافت نشد.');
        }

        $order = $payment->order;
        $categories = Category::all();

        // اگر قبلاً پرداخت موفق بوده (جلوگیری از verify دوباره)
        if ($payment->status === 'success') {
            return view('payment', [
                'order' => $order->load(['items.product']),
                'refId' => $payment->ref_code,
                'categories' => $categories
            ]);
        }

        // کاربر پرداخت رو لغو کرده
        if ($status !== 'OK') {
            $payment->update(['status' => 'failed']);
            $order?->update(['status' => 'canceled']);

            return redirect()->route('pay.result')
                ->with('error', 'پرداخت توسط کاربر لغو شد.');
        }

        try {
            $response = zarinPal()
                ->amount((int)$payment->amount)
                ->verification()
                ->authority($authority)
                ->send();

            if (!$response->success()) {
                throw new \Exception($response->error()->message());
            }

            $refId = $response->referenceId();

            // ۱. به‌روزرسانی وضعیت پرداخت و سفارش در دیتابیس
            $payment->update([
                'status' => 'success',
                'ref_code' => $refId
            ]);

            $order->update(['status' => 'paid']);

            // ۲. کسر موجودی واریانت‌های خریداری شده از انبار
            // روی آیتم‌های سفارش می‌چرخیم و از متد decrement برای کم کردن موجودی استفاده می‌کنیم
            if ($order && $order->items) {
                foreach ($order->items as $item) {
                    // چک می‌کنیم که آیتم حتماً به یک واریانت متصل باشه (مثلاً variant_id داشته باشه)
                    if (isset($item->variant_id) && $item->variant_id) {
                        $variant = \App\Models\ProductVariant::find($item->variant_id);
                        if ($variant) {
                            // به تعداد خریداری شده ($item->quantity) از ستون stock کم میکنه و ذخیره میکنه
                            $variant->decrement('stock', $item->quantity);
                        }
                    }
                }
            }

            // ۳. پاک کردن سبد خرید از سشن
            session()->forget('cart');

            // ۴. ارسال پیامک اطلاع‌رسانی
            SMSController::sendSMSAfterOrderPay($order->tracking_code);

            return view('payment', [
                'order' => $order->load(['items.product']),
                'refId' => $refId,
                'categories' => $categories
            ]);

        } catch (\Exception $e) {

            $payment->update(['status' => 'failed']);

            \Log::error('Zarinpal Verify Error', [
                'authority' => $authority,
                'message' => $e->getMessage()
            ]);

            return redirect()->route('pay.result')
                ->with('error', 'خطا در تایید پرداخت.');
        }
    }

    public function payCancelled()
    {
        return view('payCancelled');
    }
}
