<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\ProvinceCities;
use App\Traits\Logger;
use Illuminate\Http\Request;
use App\Models\Address;
class CheckoutController extends Controller
{
    use Logger;
    public function __construct(public Order $order){}

    public function index($order_id)
    {
        $categories = Category::all();
        $provinces = ProvinceCities::where('parent', 0)->get();
        $order = $this->order->find($order_id);
        return view('checkout', compact('provinces', 'order', 'categories'));
    }

    public function updateOrderAddress(int $orderId, int $addressId): bool
    {
        try {
            $order = $this->order->findOrFail($orderId);
            $address = Address::findOrFail($addressId);

            $order->address = $address->toArray();
            $order->save();

            return true;
        } catch (\Exception $e) {
            $this->logError('failed to update address', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
            ]);
            return false;
        }
    }

}
