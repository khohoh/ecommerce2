@extends('layouts.homepage')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"><a href="{{ route('user.category') }}">Categories</a> / {{ $category->name }}</h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>                                    
                    @foreach ($products as $product)
                        <div class="col-md-3 mb -3">
                            <a href="{{ url('view_product/'.$category->slug.'/'.$product->slug) }}">
                            <div class="card">                                
                                <img src="/storage/{{ $product->image }}" height="350px" alt="Product Image">                                
                                <div class="card-body">
                                    <h5>{{ $product->name }}</h5>
                                    <span class="float-start">$ {{ $product->selling_price }}</span>
                                    <span class="float-end"><s>$ {{ $product->original_price }}</s></span>
                                </div>                                
                            </div>
                            </a>
                        </div>
                    @endforeach                      
                    <div class="pagination justify-content-center mt-5">
                        {{ $products->links() }}                      
                    </div>                                         
            </div>
        </div>
    </div>
@endsection