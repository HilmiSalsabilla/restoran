@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('danger'))
            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
        @endif
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4"><b>Orders</b></h5>

                    <table class="table table-striped table-bordered table-hover align-middle">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Town</th>
                                <th scope="col">Country</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->town }}</td>
                                    <td>{{ $order->country }}</td>
                                    <td>{{ $order->phone_number }}</td>
                                    <td style="max-width: 250px; white-space: normal;">
                                        {{ $order->address }}
                                    </td>
                                    <td class="text-end">${{ $order->price }}</td>
                                    <td>
                                        @if($order->status == 'Processing')
                                            <span class="badge bg-warning text-dark">{{ $order->status }}</span>
                                        @elseif($order->status == 'Delivering')
                                            <span class="badge bg-info text-dark">{{ $order->status }}</span>
                                        @elseif($order->status == 'Delivered')
                                            <span class="badge bg-success">{{ $order->status }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $order->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('orders.edit', $order->id) }}" 
                                               class="btn btn-sm btn-warning">Change</a>
                                            <a href="{{ route('orders.delete', $order->id) }}" 
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure want to delete this order?')">
                                               Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>
@endsection
