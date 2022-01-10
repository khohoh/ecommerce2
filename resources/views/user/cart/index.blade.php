@extends('layouts.homepage')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h4 class="py-4 d-inline">
                My Cart
            </h4>            
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow">
            @if ($cart_items->count() > 0)
                <div class="card-body">                
                    @php
                        $total = 0;
                    @endphp
                    
                    @foreach ($cart_items as $cart_item)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="/storage/{{ $cart_item->products->image }}" height="70px" width="70px" alt="Image">
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{ $cart_item->products->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>$ {{ $cart_item->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $cart_item->product_id }}">
                                @if($cart_item->products->quantity >= $cart_item->product_quantity)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width: 130px;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $cart_item->product_quantity }}">
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                    @php
                                        $total += $cart_item->products->selling_price * $cart_item->product_quantity;
                                    @endphp
                                @else
                                    <h6>Out of stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">                                
                                <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>                                    
                            </div>
                        </div>                        
                    @endforeach                                                                    
                </div>

                <div class="card-footer">
                    <h5 class="d-inline">Total Price : $ {{ $total }}</h5>
                    <a href="{{ route('user.checkout') }}" class="btn btn-outline-success float-end">Proceed To Checkout</a>
                </div>
            @else
                <div class="card-body text-center">
                    <h3>Your <i class="fa fa-shopping-cart"></i>cart is empty</h3>
                    <a href="{{ route('user.category') }}" class="btn btn-outline-primary float-end">Go to category</a>
                </div>
            @endif
        </div>
    </div>
@endsection