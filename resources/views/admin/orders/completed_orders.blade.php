@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary d-flex justify-content-between">
                        <h4 class="text-white pt-2">Completed Orders</h4>
                        <a href="{{ route('admin.orders') }}" class="btn btn-warning">New Orders</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="text-center align-middle">
                                        <td>{{ date('M-d-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->tracking_number }}</td>
                                        <td>$ {{ $order->total_price }}</td>
                                        <td>{{ $order->status == 0 ? 'pending' : 'completed' }}</td>
                                        <td>
                                            <a href="{{ route('admin.view_order', $order->id) }}" class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>   
            </div>
        </div>
    </div>    
@endsection