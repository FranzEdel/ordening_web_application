@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                        <form action="{{ route('frontpage') }}" method="GET">
                            <a href="/" class="btn btn-sm btn-info ist-group-item list-group-item-action">Back</a>
                            <input type="submit" name="category" value="Vegetarian" class="list-group-item list-group-item-action">
                            <input type="submit" name="category" value="Nonvegetarian" class="list-group-item list-group-item-action">
                            <input type="submit" name="category" value="Traditional" class="list-group-item list-group-item-action">
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza ({{ count($pizzas) }} pizza)</div>

                <div class="card-body">
                    <div class="row">
                        @forelse($pizzas as $pizza)
                        <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">
                            <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width:100%; height: 50%;">
                            <p>{{ $pizza->name }}</p>
                            <p>{{ $pizza->description }}</p>
                            <a href="{{ route('pizza.show',$pizza->id) }}" class="btn btn-sm btn-danger mt-1">Order Now</a>
                        </div>
                        @empty
                        <p>No pizzas to show</p>
                        @endforelse
                    </div>
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
