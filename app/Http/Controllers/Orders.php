<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class Orders extends Controller
{
    public function index()
    {
        $orders = array();
        $orders['orders'] = Order::orderBy('status', 'asc')->get();
        $orders['totalOrders'] = Order::count('id');
        $orders['totalQuantity'] = Order::sum('quantity');
        return view('order.index', compact('orders', $orders));
    }

    public function viewOrder(Order $order)
    {
        return view('order.view');
    }

    public function addOrder()
    {
        $clients = Client::all();
        return view('order.add', compact('clients', $clients));
    }

    public function updateOrder(Order $order)
    {
        return view('order.update');
    }

    public function storeOrder(Request $request)
    {
        $new_client = $request->input('client_name_or_phone');
        $lastClientID = 0;
        if(isset($new_client))
        {
            $validateData = $request->validate(
                [
                    'client_name_or_phone' => 'required|numeric',
                    'product' => 'required',
                    'quantity' => 'required',
                    'delivery_day' => 'required',
                    'price_product' => 'required',
                    'price_delivery' => 'required',
                    'status' => 'required'
                ]
            );
            // Insert new client
            $client_name = "COMANDA din" . date('d.M.Y');
            Client::insert(
                 [
                     'name' => $client_name,
                     'phone' => $new_client,
                     'adress' => "CLIENT ADAUGAT DIN PAGINA DE COMENZI NOI"
                 ]);
            // Grab ID of last client inserted
            $lastClientID = Client::orderBy('id', 'desc')->first()->id;
        }

        $validateData = $request->validate(
            [
                'client_id' => 'required',
                'product' => 'required',
                'quantity' => 'required',
                'delivery_day' => 'required',
                'price_product' => 'required',
                'price_delivery' => 'required',
                'status' => 'required'
            ]
        );
         Order::insert([
             'client_id' => ($lastClientID == 0)? $request->input('client_id') : $lastClientID,
             'product' => $request->input('product'),
             'quantity' => $request->input('quantity'),
             'delivery_day' => $request->input('delivery_day'),
             'price_product' => $request->input('price_product'),
             'price_delivery' => $request->input('price_delivery'),
             'status' => $request->input('status'),
         ]);
         return redirect('orders');
    }
}
