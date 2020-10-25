@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>Orders</h4>
            <p><span class="text-black-50">Today is <span class="font-mono font-weight-bold">{{ date('d F Y') }}</span></span></p>
        </div>
        <div>
            <a href="{{ route('addorder') }}" class="btn btn-outline-primary">Add new order</a>
        </div>
    </div>


    <table class="table table-striped">
        <thead>
        <th class="w-5">Order ID</th>
        <th>Client ID</th>
        <th>Product</th>
        <th>Quantity</th>
        <th class="d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">Delivery day est.</th>
        <th>Product price</th>
        <th>Order status</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($orders['orders'] as $order)
            <tr>
                <td class="w-5">{{$order->id}}</td>
                <td><span data-toggle="tooltip" data-placement="top" title="{{$order->client->phone}} // {{$order->client->adress}}">
                       @if(strpos($order->client->name, "COMANDA") !== false)
                           {{$order->client->phone}}
                        @else
                            {{$order->client->name}}
                        @endif
                    </span></td>
                <td>
                    @if ($order->product == 1)
                        Peleti Brad ALB
                    @elseif($order->product == 2)
                        Peleti Brad Mixt
                    @else
                        Peleti Mixt(Brad+Fag)
                    @endif
                </td>
                <td>{{$order->quantity}} tone</td>
                <td class="d-xs-none d-sm-none d-md-none d-lg-block d-xl-block">{{ date('d F Y', strtotime($order->delivery_day)) }}</td>
                <td>{{ number_format($order->price_product, 0, ',', '.')}} lei</td>
                <td>
                    @if($order->status) <p class="text-success m-0 p-0">Done</p> @else <p class="text-danger m-0 p-0">Pending</p> @endif
                    @if($order->status == true) <a href="#" class="m-0 p-0 small">Delivery #{{ \App\Models\Delivery::where('order_id', $order->id)->first()['id'] }} @endif</a>
                </td>
                <th><a href="" class="btn btn-sm btn-info text-white font-weight-bold">Edit</a></th>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td><b>Statistics</b></td>
                <td colspan="2">{{$orders['totalOrders']}} comenzi</td>
                <td>{{ $orders['totalQuantity'] }} tone</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
@endsection
