@extends('layouts.homepage')

@section('title')
    Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Categories</h2>
                    <div class="row">                       
                        @foreach ($categories as $category)
                            <div class="col-md-3 mb-3">
                                <a href="{{ route('user.view_category', $category->slug) }}">
                                    <div class="card">
                                        <img src="/storage/{{ $category->image }}" height="350px" alt="Category Image">
                                        <div class="card-body">
                                            <h5>{{ $category->name }}</h5>
                                            <p>{{ $category->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <div class="pagination justify-content-center">
                            {{ $categories->links() }}                      
                        </div>
                    </div>
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