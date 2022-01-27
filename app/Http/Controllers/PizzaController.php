<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PizzaStoreRequest;

class PizzaController extends Controller
{
    public function index()
    {
        return 'List of pizza';
    }

    public function create()
    {
        return view('pizza.create');
    }

    public function store(PizzaStoreRequest $request)
    {
        //dd($request->all());

    }
}
