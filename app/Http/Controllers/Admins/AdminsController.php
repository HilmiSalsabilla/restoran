<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
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
            'password' => ['required'],
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

    public function allOrders() {
        $orders = Checkout::select()->orderBy('id', 'desc')->get();

        return view('admins.all-orders', compact('orders'));
    }

    public function editOrders($id) {
        $order = Checkout::find($id);

        return view('admins.edit-orders', compact('order'));
    }

    public function updateOrders(Request $request, $id) {
        $order = Checkout::find($id);
        $order->update($request->all());

        if($order) {
            return redirect()->route('orders.all')->with(['success'=>'Order status updated successfully']);
        }
    }

    public function deleteOrders($id) {
        $order = Checkout::find($id);
        $order->delete();

        if($order) {
            return redirect()->route('orders.all')->with(['danger'=>'Order deleted successfully']);
        }
    }

    public function allBookings() {
        $bookings = Booking::select()->orderBy('id', 'desc')->get();

        return view('admins.all-bookings', compact('bookings'));
    }

    public function editBookings($id) {
        $booking = Booking::find($id);

        return view('admins.edit-bookings', compact('booking'));
    }

    public function updateBookings(Request $request, $id) {
        $booking = Booking::find($id);
        $booking->update($request->all());

        if($booking) {
            return redirect()->route('bookings.all')->with(['success'=>'Booking status updated successfully']);
        }
    }

    public function deleteBookings($id) {
        $booking = Booking::find($id);
        $booking->delete();

        if($booking) {
            return redirect()->route('bookings.all')->with(['danger'=>'Booking deleted successfully']);
        }
    }

    public function allFoods() {
        $foods = Food::select()->orderBy('id', 'desc')->get();

        return view('admins.all-foods', compact('foods'));
    }

    public function createFoods() {
        return view('admins.create-foods');
    }

    public function storeFoods(Request $request) {
        $destinationPath = 'assets/img/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);

        $foods = Food::create([
            "name" => $request->name,
            "price" => $request->price,
            "category" => $request->category,
            "description" => $request->description,
            "image" => $myimage,
        ]);

        if($foods) {
            return redirect()->route('foods.all')->with(['success'=>'Food item created successfully']);
        }  
    }

    public function editFoods($id) {
        $food = Food::find($id);

        return view('admins.edit-foods', compact('food'));
    }
    
    public function updateFoods(Request $request, $id) {
        $food = Food::find($id);

        if($request->hasFile('image')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'price' => ['required', 'numeric'],
                'category' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
            ]);

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/img'), $imageName);

            $food->update([
                "name" => $request->name,
                "image" => $imageName,
                "price" => $request->price,
                "category" => $request->category,
                "description" => $request->description,
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'],
                'category' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
            ]);

            $food->update([
                "name" => $request->name,
                "price" => $request->price,
                "category" => $request->category,
                "description" => $request->description,
            ]);
        }

        if($food) {
            return redirect()->route('foods.all')->with(['success'=>'Food updated successfully']);
        }
    }

    public function deleteFoods($id) {
        $food = Food::find($id);

        if(File::exists(public_path('assets/img/' . $food->image))){
            File::delete(public_path('assets/img/' . $food->image));
        }else{
            //dd('File does not exists.');
        }
        
        $food->delete();

        if($food) {
            return redirect()->route('foods.all')->with(['danger'=>'Food deleted successfully']);
        }
    }
}
