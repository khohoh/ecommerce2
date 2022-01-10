@extends('layouts.homepage')

@section('title', $selected_product->name)
    
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ route('user.category') }}">Categories</a> / <a href="{{ route('user.view_category', $selected_product->category->slug) }}">{{ $selected_product->category->name }}</a> / {{ $selected_product->name }}
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="/storage/{{ $selected_product->image }}" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $selected_product->name }}
                            @if ($selected_product->trending == 1)
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>    
                            @endif                            
                        </h2>

                        <hr>
                        <label class="me-3">Original Price : <s>Rs {{ $selected_product->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : Rs {{ $selected_product->selling_price }}</label>
                        <p class="mt-3">
                            {!! $selected_product->short_description !!}
                        </p>
                        <hr>
                        @if ($selected_product->quantity > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out Of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $selected_product->id }}"  class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control text-center qty-input">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($selected_product->quantity > 0)            
                                    <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add To Cart <i class="fa fa-shopping-cart"></i></button>                        
                                @endif
                                
                                {{-- <button type="button" class="btn btn-success me-3 addToWishList float-start">Add To Wishlist <i class="fa fa-heart"></i></button>                                 --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

