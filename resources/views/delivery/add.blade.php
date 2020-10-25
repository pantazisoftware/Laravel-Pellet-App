@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>Add new delivery</h4>
        </div>
        <div>
            <a href="{{ route('deliveries') }}" class="btn btn-outline-secondary">View all deliveries</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('storedelivery') }}" method="post">
        <div class="form-group">
            <label for="order" id="order_label">Select order</label>
            <select name="order_id" id="order" class="form-control">
                <option>-- Select order --</option>
                @foreach($delivery['orders'] as $order)
                    <option value="{{$order->id}}">
                        {{$order->client->name }} |
                        @if ($order->product == 1)
                            Peleti Brad ALB
                        @elseif($order->product == 2)
                            Peleti Brad Mixt
                        @else
                            Peleti Mixt(Brad+Fag)
                        @endif
                        | {{ $order->quantity }} tone
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="delivered_at">Delivered at</label>
            <input type="date" class="form-control" name="delivered_at" id="delivered_at">
        </div>
        <div class="form-group">
            <label for="status">Delivery status</label>
            <input type="checkbox" class="form-control" name="status[]" id="status">
        </div>
        @csrf
        <input type="hidden" name="status" value="0">
        <div class="form-group">
            <button id="submit_btn" type="submit" class="btn btn-primary">Submit client</button>
        </div>
    </form>
@endsection

