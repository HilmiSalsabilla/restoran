@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h3 class="display-3 text-white mb-3 animated slideInDown">You have successfully paid the food items</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Success</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        @endif
    </div>

@endsection