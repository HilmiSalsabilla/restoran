@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('register') }}">Register</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12 bg-dark">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>
                <h1 class="text-white mb-4">Register for a new user</h1>
                
                <form method="POST" action="{{ route('register') }}" class="col-md-12">
                    @csrf
                    <div class="row g-3">

                        <!-- Name -->
                        <div class="form-floating">
                            <input 
                                id="name" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}" 
                                class="form-control @error('name') is-invalid @enderror" 
                                required 
                                autofocus 
                                autocomplete="name">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-floating">
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}" 
                                class="form-control @error('email') is-invalid @enderror" 
                                required 
                                autocomplete="username">
                            <label for="email">Your Email</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-floating">
                            <input 
                                id="password" 
                                type="password" 
                                name="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                required 
                                autocomplete="new-password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-floating">
                            <input 
                                id="password_confirmation" 
                                type="password" 
                                name="password_confirmation" 
                                class="form-control" 
                                required 
                                autocomplete="new-password">
                            <label for="password_confirmation">Confirm Password</label>
                        </div>

                        <!-- Submit -->
                        <div class="col-md-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection