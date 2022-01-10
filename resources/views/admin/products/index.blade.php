@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Name</th>                                                
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <div>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>
                                    <img src="/storage/{{ $product->image }}" class="category-image" alt="Image">
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit_products', $product) }}" class="btn btn-primary btn-sm text-light">Edit</a>
                                    <form action="{{ route('admin.delete_products', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>                                
                                </td>
                            </div>
                        </tr>
                    @endforeach                                   
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $products->links() }}                      
            </div> 
        </div>
    </div>
@endsection