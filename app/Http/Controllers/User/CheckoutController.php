<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderedProduct;

class CheckoutController extends Controller
{
    public function index()
    {        
        $pre_cart_items = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($pre_cart_items as $item) {
            $isExist = Product::where('id', $item->product_id)->where('quantity', '>=', intval($item->product_quantity))->exists();
            if (!$isExist) {
                $removeProduct = Cart::where('user_id', auth()->user()->id)->where('product_id', $item->product_id)->first();
                $removeProduct->delete();
            }
        }
        $cart_items = Cart::where('user_id', auth()->user()->id)->get();

        return view('user.cart.checkout', compact('cart_items'));
    }


    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address1 = $request->address1;
        $order->address2 = $request->address2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->pin_code = $request->pin_code;
        // To Calculate the Total Price
        $total = 0;
        $total_price_of_cart_items = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($total_price_of_cart_items as $price) {
            $total += $price->products->selling_price * $price->product_quantity;
        }
        $order->total_price = $total;
        // End Total Price
        $order->tracking_number = '#####'.rand(1111,9999);
        $order->save();


        $cart_items = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($cart_items as $item) {
            OrderedProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->product_quantity,
                'price' => $item->products->selling_price,
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->product_quantity;
            $product->save();
        }

        $cart_items = Cart::where('user_id', auth()->user()->id)->get();
        Cart::destroy($cart_items);

        return redirect('/')->with('success', 'Order Has Been Placed Successfully!');
    }

    // public function razorpaycheck(Request $request)
    // {
    //     $cartItems = Cart::where('user_id', auth()->user()->id);
    //     $total_price = 0;
    //     foreach ($cartItems as $cartItem) {
    //         $total_price += $cartItem->products->selling_price * $cartItem->product_quantity;
    //     };       

    //     $first_name = $request->first_name;
    //     $last_name = $request->last_name;
    //     $email = $request->email;
    //     $phone = $request->phone;
    //     $address1 = $request->address1;
    //     $address2 = $request->address2;
    //     $city = $request->city;
    //     $state = $request->state;
    //     $country = $request->country;
    //     $pin_code = $request->pin_code;

    //     return response()->json([
    //         'first_name' => $first_name,
    //         'last_name' => $last_name,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'address1' => $address1,
    //         'address2' => $address2,
    //         'city' => $city,
    //         'state' => $state,
    //         'country' => $country,
    //         'pin_code' => $pin_code,
    //         'total_price' => $total_price,
    //     ]);
    // }
}
