<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
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

    public function customers()
    {
        $customers = User::where('is_admin',0)->get();

        return view('customers',compact('customers'));
    }
}
