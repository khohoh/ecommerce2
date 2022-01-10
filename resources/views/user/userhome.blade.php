@extends('layouts.homepage')

@section('title')
    Welcome to Ecommerce
@endsection

@section('content')
    @include('layouts.inc.user_slide')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">                    
                    @foreach ($trending_products as $trending_product)
                        <div class="item">
                            <a href="{{ url('view_product/'.$trending_product->category->slug.'/'.$trending_product->slug) }}">
                                <div class="card">
                                    <img src="/storage/{{ $trending_product->image }}" height="350px" alt="Product Image">
                                    <div class="card-body">
                                        <h5>{{ $trending_product->name }}</h5>
                                        <span class="float-start">$ {{ $trending_product->selling_price }}</span>
                                        <span class="float-end"><s>$ {{ $trending_product->original_price }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach                      
                </div>                              
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Popular Categories</h2>
                <div class="owl-carousel featured-carousel owl-theme">                    
                    @foreach ($popular_categories as $popular_category)
                        <div class="item">
                            <a href="{{ route('user.view_category', $popular_category->slug) }}">
                                <div class="card">
                                    <img src="/storage/{{ $popular_category->image }}" height="360px" alt="Product Image">
                                    <div class="card-body">
                                        <h5>{{ $popular_category->name }}</h5>
                                        <p>{{ $popular_category->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach                      
                </div>                              
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>
@endsection