@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="card mt-4">
                <div class="card-body">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>

                <form action="{{ route('pizza.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name of pizza</label>
                            <input type="text" class="form-control" name="name" placeholder="name of pizza">
                        </div>
                        <div class="form-control">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="form-input form-input-inline">
                            <label>Pizza price($)</label>
                            <input type="number" name="small_pizza_price" class="form-input" placeholder="small pizza price">
                            <input type="number" name="medium_pizza_price" class="form-input" placeholder="medium pizza price">
                            <input type="number" name="large_pizza_price" class="form-input" placeholder="large pizza price">
                        </div>
                        <div class="form-control">
                            <label for="category">Category</label>
                            <select class="form-control" name="category">
                                <option value=""></option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="vegetarian">Non vegetarian Pizza</option>
                                <option value="vegetarian">Tradicional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
