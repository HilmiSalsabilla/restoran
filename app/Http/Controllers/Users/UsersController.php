<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Food\Booking;

class UsersController extends Controller
{
    public function getBookings() {
        $allBookings = Booking::where('user_id', Auth::user()->id)->get();
        
        return view('users.bookings', compact('allBookings'));
    }
}
