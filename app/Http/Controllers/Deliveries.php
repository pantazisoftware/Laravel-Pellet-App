<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;

class Deliveries extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('delivery.index', compact('deliveries', $deliveries));
    }

    public function addDelivery()
    {
        $delivery = array();
        $delivery['orders'] = Order::where('status', false)->get();
        return view('delivery.add', compact('delivery'));
    }

    public function editDelivery(Delivery $delivery)
    {
        $delivery = Delivery::findOrFail($delivery);
        return view('delivery.edit', compact('delivery', $delivery));
    }

    public function viewDelivery(Delivery $delivery)
    {
        $delivery = Delivery::findOrFail($delivery);
        return view('delivery.view', compact('delivery', $delivery));
    }

    public function storeDelivery(Request $request)
    {

        $validateData = $request->validate([
            'order_id' => 'required|numeric',
            'delivered_at' => 'required|date',
            'status' => 'required'
        ]);

        $orderDetails = Order::findOrFail($request->input('order_id'));
        Order::where('id', $request->input('order_id'))->update(['status' => true]);
        Delivery::create([
            'client_id'         => $orderDetails['client_id'],
            'order_id'          => $request->input('order_id'),
            'delivered_at'      => $request->input('delivered_at'),
            'quantity'          => $orderDetails['quantity'],
            'price_product'     => $orderDetails['price_product'],
            'price_delivery'    => $orderDetails['price_delivery'],
            'status'            => $request->has('status')
        ]);
        return redirect('deliveries');
    }
}
