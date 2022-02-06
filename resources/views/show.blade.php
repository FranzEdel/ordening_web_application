@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if(Auth::check())
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <p>Name: {{ auth()->user()->name }}</p> 
                            <p>Email: {{ auth()->user()->email }}</p>
                            <p>Phone number: <input type="number" name="phone" class="form-control"></p>
                            <p>Small pizza order: <input type="number" name="small_pizza" class="form-control" value="0"></p>
                            <p>Medium pizza order: <input type="number" name="medium_pizza" class="form-control" value="0"></p>
                            <p>Large pizza order: <input type="number" name="large_pizza" class="form-control" value="0"></p>
                            <p><input type="hidden" name="pizza_id" value="{{ $pizza->id }}"></p>
                            <p><input type="date" name="date" class="form-control" required></p>
                            <p><input type="time" name="time" class="form-control" required></p>
                            <p><textarea name="body" class="form-control" required></textarea></p>
                            <p><button class="btn btn-danger" type="submit">Make order</button></p>
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif
                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                    </form>
                    @else
                    <p><a href="/login">Please login to make</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <div class="card-body">
                    <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width:100%;">
                    <h3>{{ $pizza->name }}</h3>
                    <h3>{{ $pizza->description }}</h3>
                    <h3>Small pizza price: {{ $pizza->small_pizza_price }} $us</h3>
                    <h3>Medium pizza price: {{ $pizza->medium_pizza_price }} $us</h3>
                    <h3>Large pizza price: {{ $pizza->large_pizza_price }} $us</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a.list-group-item {
        font-size: 18px;
    }
    a.list-group-item:hover {
        background-color: red;
        color: #fff;
    }
    .card-header {
        background-color: red;
        color: #fff;
        font-size: 20px;
    }
</style>
@endsection
