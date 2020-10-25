@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>Deliveries</h4>
        </div>
        <div>
            <a href="{{ route('adddelivery') }}" class="btn btn-outline-primary">Add new delivery</a>
        </div>
    </div>


    <table class="table table-striped">
        <thead>
        <th>Delivery ID</th>
        <th>Client ID</th>
        <th>Order ID</th>
        <th>
            Order date est. /<br />
            Delivered at
        </th>
        <th>Quantity</th>
        <th>Product price</th>
        <th>Delivery status</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($deliveries as $delivery)
            <tr href="{{$delivery->id}}" id="{{$delivery->id}}">
                <td>{{$delivery->id}}</td>
                <td><span data-toggle="tooltip" data-placement="top" title="{{$delivery->client->phone}} // {{$delivery->client->adress}}">
                       @if(strpos($delivery->client->name, "COMANDA") !== false)
                            {{$delivery->client->phone}}
                        @else
                            {{$delivery->client->name}}
                        @endif
                    </span></td>
                <td>
                    <a href="#" class="btn btn-outline-info">Order #{{$delivery->order_id}}</a>
                </td>
                <td>
                    <span data-toggle="tooltip" data-placement="top" title="Date estimated for delivery">{{ date('d F Y', strtotime($delivery->order->delivery_day)) }} /</span> <br />
                    <span data-toggle="tooltip" data-placement="top" class="font-weight-bold text-success" title="Date when delivery was done">{{ date('d F Y', strtotime($delivery->delivered_at)) }}</span>
                </td>
                <td>{{$delivery->order->quantity}} tone</td>
                <td>
                    <span>{{ number_format($delivery->order->price_product, 0, ',', '.')}} lei</span><br />
                    <span class="text-success font-weight-bold">Total: {{ number_format(($delivery->order->price_product*$delivery->order->quantity), 0, ',', '.') }} lei</span>
                </td>
                <td>
                    @if($delivery->status) <p class="text-success m-0 p-0">Done</p> @else <p class="text-danger m-0 p-0">Pending</p> @endif
                </td>
                <th>
                    <a href="" class="btn btn-sm btn-success text-white font-weight-bold">View</a>
                    <a href="" class="btn btn-sm btn-info text-white font-weight-bold">Edit</a>
                </th>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection
