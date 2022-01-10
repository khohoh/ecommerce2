@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Products</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.update_products', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $product->id }}">                
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="col-md-12">                            
                            <option value="1">{{ $product->category->name }}</option>                                                                                
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{ $product->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" rows="3" class="form-control">{{ $product->short_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="number" name="original_price" class="form-control" value="{{ $product->original_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tax">Tax</label>
                        <input type="number" name="tax" class="form-control" value="{{ $product->tax }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" {{ $product->status == 1 ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" name="trending" {{ $product->trending == 1 ? 'checked' : '' }}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" value="{{ $product->meta_description }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="{{ $product->meta_keywords }}">
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection