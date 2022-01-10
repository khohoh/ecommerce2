<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 0)->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function viewOrder($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }

    public function completeOrder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->status;
        $orders->save();

        return redirect('/admin_orders')->with('success', 'The Order Updated Successfully!');
    }

    public function completedOrders()
    {
        $orders = Order::where('status', 1)->get();
        return view('admin.orders.completed_orders', compact('orders'));
    }
}
