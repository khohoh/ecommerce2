<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartController extends Controller
{

    public function viewCart()
    {
        $cart_items = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.cart.index', compact('cart_items'));
    }


    public function addProduct(Request $request)
    {
        $product_id = $request->product_id;
        $product_quantity = $request->product_quantity;

        if (auth()->user()) {
            $product_check = Product::where('id', $product_id)->first();

            if ($product_check) {
                if (Cart::where('product_id', $product_id)->where('user_id', auth()->user()->id)->exists()) {
                    return response()->json(['status' => $product_check->name.' Already Added To Cart']);
                }
                else {
                    $carItem = new Cart();
                    $carItem->user_id = auth()->user()->id;
                    $carItem->product_id = $product_id;
                    $carItem->product_quantity = $product_quantity;
                    $carItem->save();
                    return response()->json(['status' => $product_check->name.' Added To Cart']);
                }                
            }
        }
        else {
            return response()->json(['status' => 'Please Login first with as [admin@admin.com] PW:123456789, or [user@user.com] PW:123456789']);            
        }        
    }


    public function updateCart(Request $request)
    {
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;

        if (auth()->user()) {
            if (Cart::where('product_id', $product_id)->where('user_id', auth()->user()->id)->exists()) {
                $cart = Cart::where('product_id', $product_id)->where('user_id', auth()->user()->id)->first();
                $cart->product_quantity = $product_qty;
                $cart->save();
                return response()->json(['status' => 'Quantity Updated']);
            }
        }
    }


    public function deleteCart(Request $request)
    {
        if (auth()->user()) {
            $prod_id = $request->product_id;
            if (Cart::where('product_id', $prod_id)->where('user_id', auth()->user()->id)->exists()) {
                $cartItme = Cart::where('product_id', $prod_id)->where('user_id', auth()->user()->id)->first();
                $cartItme->delete();
                return response()->json(['status' => 'The Product Removed From Cart Successfully']);
            }
        }
        else {
            return response()->json(['status' => 'Please Login to continue']);
        }
        
    }
}
