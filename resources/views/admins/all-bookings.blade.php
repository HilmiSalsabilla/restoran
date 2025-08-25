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
                    <h5 class="card-title mb-4"><b>Bookings</b></h5>

                    <table class="table table-striped table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date</th>
                                <th scope="col">People</th>
                                <th scope="col">Special Request</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->date)->format('d M Y H:i') }}</td>
                                    <td class="text-center">{{ $booking->num_people }}</td>
                                    <td style="max-width: 200px; white-space: normal;">
                                        {{ $booking->spe_request }}
                                    </td>
                                    <td>
                                        @if($booking->status == 'Processing')
                                            <span class="badge bg-warning text-dark">{{ $booking->status }}</span>
                                        @elseif($booking->status == 'Booked')
                                            <span class="badge bg-success">{{ $booking->status }}</span>
                                        @elseif($booking->status == 'Cancelled')
                                            <span class="badge bg-danger">{{ $booking->status }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $booking->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('bookings.edit', $booking->id) }}" 
                                               class="btn btn-sm btn-warning">Change</a>
                                            <a href="{{ route('bookings.delete', $booking->id) }}" 
                                               class="btn btn-sm btn-danger"
                                               onclick="return confirm('Are you sure want to delete this booking?')">
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
