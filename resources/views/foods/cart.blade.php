@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}</p>
        @endif
    </div>

    <div class="container">   
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if($cartItems->count() > 0)
                        @foreach ($cartItems as $food)
                            <tr>
                                <th><img width="50" height="50" src="{{ asset('assets/img/'.$food->image.'') }}" alt=""></th>
                                <td>{{ $food->name }}</td>
                                <td>${{ $food->price }}</td>
                                <td><a href="{{ route('food.delete.cart', $food->food_id) }}" class="btn btn-danger btn-sm">delete</a></td>
                            </tr>
                        @endforeach
                    @else
                        <p class="alert alert-danger text-center">You have no items in your cart.</p>
                    @endif
                </tbody>
            </table>
            <div class="d-flex justify-content-end align-items-center mt-4">
                <div class="me-4">
                    <h5 class="mb-0">Total: ${{ $price }}</h5>
                </div>
                
                @if($price == 0)
                    <p class="alert alert-danger text-center">You cannot check out when you have no items in your cart.</p>
                @else
                <form action="{{ route('prepare.checkout') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $price }}" name="price">
                    <button type="submit" name="submit" class="btn btn-warning btn-md">Checkout</button>
                </form>
                @endif
            </div>
        </div>
    </div>

@endsection