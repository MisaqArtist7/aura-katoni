<?php
namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\ProvinceCities;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use AuthorizesRequests;

    public function __construct(public Order $model){}

    public function index(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $address = null;
        $province = null;
        $city = null;

        if ($order->address) {
            $address = json_decode($order->address);
            if ($address) {
                $province = ProvinceCities::select('title')->find($address->province);
                $city = ProvinceCities::select('title')->find($address->city);
            }
        }
        $data = $order;

        return view('dashboardOrdersDetails', compact('data', 'address', 'province', 'city'));
    }


    public function storeItem(Request $request)
    {
        $user = Auth::user();
        $items = $request->input('items', []);

        if (empty($items)) {
            return back()->with('error', 'سبد خرید شما خالی است.');
        }

        DB::beginTransaction();

        try {

            $order = Order::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'status' => 'pending'
                ],
                [
                    'tracking_code' => $this->generate_order_no(),
                    'total_price' => 0,
                ]
            );

            $totalPrice = 0;
//            dd($items);
            foreach ($items as $item) {

                if (!isset($item['variant_id'])) {
                    throw new \Exception('variant_id ارسال نشده');
                }

                $variant = ProductVariant::where('id', $item['variant_id'])
                    ->where('is_active', 1)
                    ->first();

                if (!$variant) {
                    throw new \Exception('تنوع محصول نامعتبر است');
                }

                if ($variant->stock < $item['quantity']) {
                    throw new \Exception('موجودی کافی نیست');
                }

                $unitPrice = $variant->discount_price > 0
                    ? $variant->discount_price
                    : $variant->price;

                $lineTotal = $unitPrice * $item['quantity'];
                $totalPrice += $lineTotal;

                OrderItem::updateOrCreate(
                    [
                        'order_id' => $order->id,
                        'variant_id' => $variant->id,
                    ],
                    [
                        'product_id' => $variant->product_id,
                        'quantity' => $item['quantity'],
                        'unit_price' => $unitPrice,
                        'total_price' => $lineTotal,
                    ]
                );
            }

            $order->update(['total_price' => $totalPrice]);

            DB::commit();

            return redirect()->route('checkout.store', ['order_id' => $order->id]);

        } catch (\Exception $e) {

            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    private function generate_order_no()
    {
        do {
            $code = 'neli-order' . str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
        } while(Order::where('tracking_code', $code)->exists());

        return $code;
    }




}
