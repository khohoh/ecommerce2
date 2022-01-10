<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.all_users.index', compact('users'));
    }

    public function viewUser($id)
    {
        // $users = User::find('id', $id);
        $orders = Order::where('user_id', $id)->first();
        // dd($orders);
        return view('admin.all_users.view_user', compact('orders'));
    }
}
