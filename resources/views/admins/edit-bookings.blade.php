@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4"><b>Update Booking Status</b></h5>
                    <hr>

                    {{-- Status saat ini --}}
                    <p>Current Status: 
                        <span class="badge
                            @if($booking->status == 'Processing') bg-warning text-dark
                            @elseif($booking->status == 'Booked') bg-success
                            @elseif($booking->status == 'Cancelled') bg-danger
                            @else bg-secondary
                            @endif">
                            {{ $booking->status }}
                        </span>
                    </p>

                    {{-- Form update --}}
                    <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                        @csrf

                        <div class="mb-4">
                            <label for="status" class="form-label">Change Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option disabled>Choose Status</option>
                                <option value="Processing" {{ $booking->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                <option value="Booked" {{ $booking->status == 'Booked' ? 'selected' : '' }}>Booked</option>
                                <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('bookings.all') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
