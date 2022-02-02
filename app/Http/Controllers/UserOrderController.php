<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->get();
        return view('order.index',compact('orders'));
    }

    public function changeStatus(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where('id',$id)->update(['status' => $request->status]);

        return back();
    }
}