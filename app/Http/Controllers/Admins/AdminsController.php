<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Food\Food;
use App\Models\Admin\Admin;
use App\Models\Food\Checkout;
use App\Models\Food\Booking;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function viewLogin() {
        return view('admins.login');
    }

    public function checkLogin(Request $request) {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt([
            'email' => $request->input("email"), 
            'password' => $request->input("password")
        ], 
            $remember_me)) {
                return redirect()->route('admins.dashboard');
            }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login');
    }

    public function index() {
        //count
        $foodCount = Food::select()->count();
        $checkoutCount = Checkout::select()->count();
        $bookingCount = Booking::select()->count();
        $adminCount = Admin::select()->count();

        return view('admins.index', compact('foodCount', 'checkoutCount', 'bookingCount', 'adminCount'));
    }

    public function allAdmins() {
        $admins = Admin::select()->orderBy('id')->get();
        
        return view('admins.all-admins', compact('admins'));
    }

    public function createAdmins() {
        return view('admins.create-admins');
    }

    public function storeAdmins(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);

        $admins = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if($admins) {
            return redirect()->route('admins.all')->with(['success'=>'Admin created successfully']);
        }  
    }
}
