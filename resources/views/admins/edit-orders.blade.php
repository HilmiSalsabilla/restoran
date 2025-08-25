@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4"><b>Update Order Status</b></h5>
                    <hr>

                    {{-- Status saat ini --}}
                    <p>Current Status: 
                        <span class="badge 
                            @if($order->status == 'Processing') bg-warning text-dark 
                            @elseif($order->status == 'Delivering') bg-info text-dark 
                            @elseif($order->status == 'Delivered') bg-success 
                            @else bg-secondary 
                            @endif">
                            {{ $order->status }}
                        </span>
                    </p>

                    {{-- Form update --}}
                    <form method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="status" class="form-label">Change Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option disabled>Choose Status</option>
                                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Delivering" {{ $order->status == 'Delivering' ? 'selected' : '' }}>Delivering</option>
                                <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('orders.all') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
