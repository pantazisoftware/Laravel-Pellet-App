@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>Add new order</h4>
        </div>
        <div>
            <a href="{{ route('orders') }}" class="btn btn-outline-secondary">View all orders</a>
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

    <form action="{{route('storeorder')}}" method="post">
        <div class="form-group">
            <label for="client" id="client_label">Select client</label>
            <select name="client_id" id="client" class="form-control" onchange="show_new_client(this.value)">
                <option>-- Select client --</option>
                <option value="0">-- ENTER NEW CLIENT --</option>
                @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name }} / {{ $client->phone}}</option>
                @endforeach
            </select>
            <a href="#" id="view_clients" class="btn btn-outline-info my-2 d-none" onclick="show_existing_client()">View existing clients</a>
            <input type="text" id="new_client" class="d-none form-control" name="client_name_or_phone" placeholder="Enter new client name or phone number">
        </div>
        <div class="form-group">
            <label for="product">Product</label>
            <select name="product" id="product" class="form-control">
                <option> -- Selecteaza produsul --</option>
                <option value="1">Peleti Brad ALB</option>
                <option value="2">Peleti Brad Mixt</option>
                <option value="3">Peleti Mixt (Brad+Fag)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" step="0.01" id="quantity" class="form-control" placeholder="Insert quantity in tones, eg. 1.2 tones">
        </div>
        <div class="form-group">
            <label for="delivery_day">Delivery day est.</label>
            <input type="date" name="delivery_day"  id="delivery_day" class="form-control" placeholder="Choose a day for delivery...">
        </div>
        <div class="form-group">
            <label for="price_product">Price for product</label>
            <input type="number" name="price_product" id="price_product" class="form-control" placeholder="Insert product price...">
        </div>
        <div class="form-group">
            <label for="price_delivery">Price for delivery</label>
            <input type="number" name="price_delivery" id="price_delivery" class="form-control" placeholder="Insert delivery price...">
        </div>
        @csrf
        <input type="hidden" name="status" value="0">
        <div class="form-group">
            <button id="submit_btn" type="submit" class="btn btn-primary">Submit client</button>
        </div>
    </form>
@endsection

@section('javascripts')
    <script type="text/javascript">

           var client_value = $("#client");
           var client_label = $("#client_label");
           var show_clients_btn = $("#view_clients");
           var new_client_input = $("#new_client");

           function show_new_client(val)
           {
               if(client_value.val() == 0){
                   client_label.addClass("d-none");
                   client_value.addClass("d-none");
                   show_clients_btn.removeClass("d-none");
                   new_client_input.removeClass("d-none");
                   console.log(client_value.val())
               }
           }

           function show_existing_client()
           {
               client_value.removeClass("d-none");
               client_label.removeClass("d-none");
               show_clients_btn.addClass("d-none");
               new_client_input.addClass("d-none");
               console.log(client_value.val());
           }

    </script>
@endsection
