<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders =Order::where('user_id', auth()->user()->id)->get();
        return view('user.orders.index', compact('orders'));
    }

    public function viewOrder(Order $order)
    {
        $orders = Order::where('id', $order->id)->where('user_id', auth()->user()->id)->first();
        return view('user.orders.view', compact('orders'));
    }
}
