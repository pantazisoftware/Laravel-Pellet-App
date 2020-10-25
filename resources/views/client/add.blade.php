@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between pt-2 mb-2">
        <div>
            <h4>Add new client</h4>
        </div>
        <div>
            <a href="{{ route('clients') }}" class="btn btn-outline-secondary">View all clients</a>
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

    <form action="{{route('storeclient')}}" method="post">
        <div class="form-group">
            <label for="name">Client name</label>
            <input type="text" id="name" class="form-control" placeholder="Insert client name..." name="name">
        </div>
        <div class="form-group">
            <label for="phone">Client phone</label>
            <input type="number" id="phone" class="form-control" placeholder="Insert client phone number..." name="phone">
        </div>
        <div class="form-group">
            <label for="adress">Client adress</label>
            <textarea name="adress" class="form-control" id="adress" cols="30" rows="10" placeholder="Insert client adress"></textarea>
        </div>
        @csrf
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit client</button>
        </div>
    </form>
@endsection
