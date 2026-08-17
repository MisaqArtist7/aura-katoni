<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Models\ProvinceCities;

class OrderController extends Controller
{
    public function __construct(public Order $order){}

    public function index()
    {
        $orders = Order::all();
        return view('Admin.Orders.orders', compact('orders'));
    }




//    public function details(Order $order)
//    {
//        $order->load([
//            'items.product.category',
//            'items.product.brand',
//            'items.variant',
//            'address.provinceRelation',
//            'address.cityRelation'
//        ]);
//
//        $orderDate = \Morilog\Jalali\Jalalian::fromDateTime($order->created_at)
//            ->format('Y/m/d');
//
//        $addressRecord = \App\Models\Address::find($order->address);
//
//        if ($addressRecord) {
//            $province = ProvinceCities::select('title')->where('id', $addressRecord->province)->first();
//            $cities = ProvinceCities::select('title')->where('id', $addressRecord->city)->first();
//        } else {
//            $province = null;
//            $cities = null;
//        }
//
//        return view('Admin.Orders.details', compact('order', 'orderDate', 'addressRecord', 'province', 'cities'));
//    }
    public function details(Order $order)
    {
        $orderDate = Jalalian::fromDateTime($order->created_at)->format('Y/m/d');
        $address = json_decode($order->address);
        $province =  ProvinceCities::select('title')->where('id', $address->province)->first();
        $cities = ProvinceCities::select('title')->where('id', $address->city)->first();
        return view('Admin.Orders.details', compact('order', 'orderDate', 'address', 'province', 'cities'));
    }
}
