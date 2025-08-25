@extends('layouts.admin')

@section('content')
<div class="row g-4">
    <div class="col-md-3 col-sm-6">
        <div class="card text-bg-primary shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-1">Foods</h6>
                    <h3 class="fw-bold">{{ $foodCount }}</h3>
                </div>
                <i class="bi bi-egg-fried fs-1 opacity-75"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card text-bg-success shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-1">Orders</h6>
                    <h3 class="fw-bold">{{ $checkoutCount }}</h3>
                </div>
                <i class="bi bi-basket fs-1 opacity-75"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card text-bg-warning shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-1">Bookings</h6>
                    <h3 class="fw-bold">{{ $bookingCount }}</h3>
                </div>
                <i class="bi bi-calendar-check fs-1 opacity-75"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card text-bg-danger shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="card-title mb-1">Admins</h6>
                    <h3 class="fw-bold">{{ $adminCount }}</h3>
                </div>
                <i class="bi bi-people fs-1 opacity-75"></i>
            </div>
        </div>
    </div>
</div>
@endsection
