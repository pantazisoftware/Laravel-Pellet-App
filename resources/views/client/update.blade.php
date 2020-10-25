@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>Update existing client</h4>
        </div>
        <div>
            <a href="{{ route('clients') }}" class="btn btn-outline-secondary">View all clients</a>
        </div>
    </div>

    <form action="{{route('updateExistingClient')}}" method="post">
        <div class="form-group">
            <label for="name">Client name</label>
            <input type="text" id="name" class="form-control" value="{{$client->name}}" name="name">
            <input type="hidden" value="{{$client->id}}">
        </div>
        <div class="form-group">
            <label for="phone">Client phone</label>
            <input type="number" id="phone" class="form-control" value="{{$client->phone}}" name="phone">
        </div>
        <div class="form-group">
            <label for="adress">Client adress</label>
            <textarea name="adress" class="form-control" id="adress" cols="30" rows="10" value="{{$client->adress}}"></textarea>
        </div>
        @csrf
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update client info</button>
        </div>
    </form>
@endsection
