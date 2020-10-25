@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>View {{$client->name}} history</h4>
            <p>Location {{$client->adress}} | Phone {{$client->phone }}</p>
        </div>
        <div>
            <a href="{{ route('clients') }}" class="btn btn-outline-primary">View all clients</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>Latest orders for {{$client->name}}</h5>
            <table class="table">
                <thead>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price of product</th>
                    <th>Price for delivery</th>
                    <th>Est. delivery date</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->product}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price_product}}</td>
                        <td>{{$order->price_delivery}}</td>
                        <td>{{$order->delivery_day}}</td>
                        <td>{{$order->status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col">
            <h5>Latest deliveries for {{$client->name}}</h5>
            <table class="table">
                <thead>
                <th>Delivery ID</th>
                <th>Order ID</th>
                <th>Deliverey date</th>
                <th>Quantity</th>
                <th>Price for product</th>
                <th>Price for delivery</th>
                <th>Status</th>
                </thead>
                <tbody>
                @foreach ($deliveries as $delivery)
                    <tr>
                        <td>{{$delivery->id}}</td>
                        <td>{{$delivery->order_id}}</td>
                        <td>{{$delivery->delivered_at}}</td>
                        <td>{{$delivery->quantity}}</td>
                        <td>{{$delivery->price_product}}</td>
                        <td>{{$delivery->price_delivery}}</td>
                        <td>{{$delivery->status}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
