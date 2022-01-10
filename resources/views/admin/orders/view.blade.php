@extends('layouts.homepage')

@section('title')
    Order Status
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-warning d-flex justify-content-between">
                        <h4 class="pt-2">Order Status</h4>
                        <a href="{{ route('admin.orders') }}" class="btn btn-success pt-2">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order_status">
                                <h6>Shipping Details</h6>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border">{{ $orders->first_name }}</div>
                                <label for="">Last Name</label>
                                <div class="border">{{ $orders->last_name }}</div>
                                <label for="">Email</label>
                                <div class="border">{{ $orders->email }}</div>
                                <label for="">Phone Number</label>
                                <div class="border">{{ $orders->phone }}</div>
                                <label for="">First Name</label>
                                <div class="border">{{ $orders->first_name }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border">
                                    {{ $orders->address1 }},<br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->city }},<br>
                                    {{ $orders->state }},
                                    {{ $orders->country }},
                                </div>
                                <label for="">Zip Code</label>
                                <div class="border">{{ $orders->pin_code }}</div>
                            </div>


                            <div class="col-md-6">
                                <h6>Order Details</h6>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->ordered_products as $item)
                                            <tr class="text-center align-middle">
                                                <td>{{ $item->products->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>$ {{ $item->price }}</td>
                                                <td>
                                                    <img src="/storage/{{ $item->products->image }}" width="50px" alt="Product Imgage">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="text-center">Total Price: $ {{ $orders->total_price }}</h5>

                                <div class="mt-5 px-2">
                                    <label for="">Order Status</label>
                                    <form action="{{ route('admin.complete_order', $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="status">                                    
                                            <option {{ $orders->status == 0 ? 'selected' : '' }} value="0">Pending</option>
                                            <option {{ $orders->status == 1 ? 'selected' : '' }} value="1">Completed</option>                                    
                                        </select>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mt-3 w-25">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                            </div>
                        </div>                        
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection