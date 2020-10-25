@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>View delivery</h4>
            <p>Delivery ID: {{ $delivery['id'] }}</p>
        </div>
        <div>
            <a href="{{ route('deliveries') }}" class="btn btn-outline-primary">Back to all deliveries</a>
        </div>
    </div>


    <table class="table table-striped">
        <thead>
        <th>Name of field</th>
        <th>Delivery value</th>

        </thead>
        <tbody>
        @foreach($delivery as $item)
            <tr>
                <td>Order ID</td>
                <td>{{$item->order_id}}</td>
            </tr>
            <tr>
                <td>Client ID</td>
                <td>{{$item->client_id}}</td>
            </tr>
            <tr>
                <td>Delivered at</td>
                <td>{{$item->delivered_at}}</td>
            </tr>
            <tr>
                <td>Product</td>
                <td></td>
            </tr>
            <tr>
                <td>Product price</td>
                <td>{{$item->order->price_product}}</td>
            </tr>
            <tr>
                <td>Delivery taxes</td>
                <td>{{$item->order->price_delivery}}</td>
            </tr>
            <tr>
                <td>Status delivery</td>
                <td>{{$item->status}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection
