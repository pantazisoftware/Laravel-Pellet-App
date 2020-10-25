@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>Clients</h4>
        </div>
        <div>
            <a href="{{ route('addclient') }}" class="btn btn-outline-primary">Add new client</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <th>Client ID</th>
            <th>Client Name</th>
            <th>Client Phone</th>
            <th>Client Adress</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->adress}}</td>
                <td><a href="{{route('updateclient', $client->id)}}" class="btn btn-sm btn-info text-white font-weight-bold">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
