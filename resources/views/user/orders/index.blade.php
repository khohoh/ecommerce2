@extends('layouts.homepage')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Orders</h4>
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
                                        <td>{{ $order->status == '0' ? 'pending' : 'completed' }}</td>
                                        <td>
                                            <a href="{{ route('user.view_order', $order) }}" class="btn btn-primary">View</a>
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