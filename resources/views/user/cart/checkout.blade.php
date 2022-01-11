@extends('layouts.homepage')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container d-flex justify-content-between">
            <h6 class="pt-2 d-inline">
                Checkout
            </h6>
            <a href="{{ route('user.view_cart') }}" class="btn btn-secondary btn-sm pt-1">Back</a>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{ route('user.place_order') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" class="form-control first_name">                                 
                                    @error('first_name')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" class="form-control last_name">
                                    @error('last_name')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control email">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control phone">
                                    @error('phone')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input type="text" name="address1" class="form-control address1">
                                    @error('address1')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input type="text" name="address2" class="form-control address2">
                                    @error('address2')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">City</label>
                                    <input type="text" name="city" class="form-control city">
                                    @error('city')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State</label>
                                    <input type="text" name="state" class="form-control state">
                                    @error('state')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country</label>
                                    <input type="text" name="country" class="form-control country">
                                    @error('country')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code</label>
                                    <input type="text" name="pin_code" class="form-control pin_code">
                                    @error('pin_code')
                                        <div class="text-danger">
                                            {{ $message }}    
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            @php
                                $total = 0;
                            @endphp

                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_items as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->product_quantity }}</td>
                                            <td>$ {{ $item->products->selling_price }}</td>
                                        </tr>
                                        @php
                                            $total += $item->products->selling_price * $item->product_quantity;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="text-center">
                                <h6>Total Price: $ {{ $total }}</h6>                                
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success w-50 mt-2">Place Order</button>                                                        
                            </div>                       
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection