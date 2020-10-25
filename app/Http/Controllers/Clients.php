<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Delivery;
use Illuminate\Http\Request;

class Clients extends Controller
{
    //
    public function index()
    {
        // List all clients
        $clients = Client::all();
        return view('client.index', compact('clients', $clients));
    }

    public function addClient()
    {
        return view('client.add');
    }

    public function updateClient(Request $request, Client $client_id)
    {
        $client = Client::findOrFail($client_id);
        return view('client.update', compact('client', $client));
    }

    public function storeClient(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required|min:9',
        ]);

        Client::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'adress' => $request->input('adress')
        ]);
        return redirect('clients');

    }

    public function updateExistingClient(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required',
        ]);

        $client_id = $request->id;
        Client::where('id', $client_id)->update(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'adress' => $request->adress
            ]);
        return redirect('clients');
    }

    public function profileHistory(Request $request, Client $client_id)
    {
        die("Hello");

        $client = Client::findOrFail($client_id);
        $order = Order::where('client_id', $client_id)->get();
        $delivery = Delivery::where('client_id', $client_id)->get();
        return view('client.history', compact(
            [
                'client' => $client,
                'orders' => $order,
                'deliveries' => $delivery
            ]));
    }
}
