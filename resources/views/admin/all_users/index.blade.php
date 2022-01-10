@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>All Registered Users</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>                        
                        <th>Name</th>                                                
                        <th>Email</th>                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <div>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>                                
                                <td>
                                    <a href="{{ route('admin.view_user', $user->id) }}" class="btn btn-primary btn-sm text-light">View</a>                                                                  
                                </td>
                            </div>
                        </tr>
                    @endforeach                    
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{ $users->links() }}                      
            </div>  
        </div>
    </div>
@endsection