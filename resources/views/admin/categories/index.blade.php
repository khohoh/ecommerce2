@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Categories</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <img src="/storage/{{ $category->image }}" class="category-image" alt="Image">
                            </td>
                            <td>
                                <a href="{{ route('admin.edit_categories', $category) }}" class="btn btn-primary btn-sm text-light">Edit</a>
                                <form action="{{ route('admin.delete_categories', $category) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>                                
                            </td>
                        </tr>
                    @endforeach                                      
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $categories->links() }}                      
            </div>  
        </div>
    </div>
@endsection