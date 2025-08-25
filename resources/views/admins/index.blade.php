@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Foods</h5>
                    <p class="card-text">number of foods: {{ $foodCount }} </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">number of orders: {{ $checkoutCount }} </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bookings</h5>
                    <p class="card-text">number of bookings: {{ $bookingCount }} </p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text">number of admins: {{ $adminCount }} </p>
                </div>
            </div>
        </div>
    </div>
@endsection