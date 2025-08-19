@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('login') }}">Login</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="col-md-12 bg-dark">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Login</h5>
                <h1 class="text-white mb-4">Login</h1>
                <form method="POST" action="{{ route('login') }}" class="col-md-12">
                    @csrf
                    <div class="row g-3">
                        
                        <div class="">
                            <div class="form-floating">
                                <input id="email" class="form-control @error('name') is-invalid @enderror" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                                <label for="email">Your Email</label>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <div class="form-floating">
                                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
