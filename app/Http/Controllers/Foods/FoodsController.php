<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Food\Food;
use App\Models\Food\Cart;
use App\Models\Food\Checkout;
use App\Models\Food\Booking;

class FoodsController extends Controller
{
    public function index() {
        $breakfastFoods = Food::where('category', 'Breakfast')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $lunchFoods = Food::where('category', 'Lunch')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        $dinnerFoods = Food::where('category', 'Dinner')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();

        return view('dashboard', compact('breakfastFoods', 'lunchFoods', 'dinnerFoods'));
    }

    public function foodDetails($id) {
        $foodItem = Food::find($id);

        //verifying if the user added item to cart
        $cartVerify = Cart::where('food_id', $id)
                    ->where('user_id', Auth::user()->id)->count();

        return view('foods.food-details', compact('foodItem', 'cartVerify'));
    }

    public function cart(Request $request, $id) {
        $cart = Cart::create([
            "user_id" => $request->user_id,
            "food_id" => $request->food_id,
            "name" => $request->name,
            "image" => $request->image,
            "price" => $request->price,
        ]);

        if($cart) {
            return redirect()->route('food.details', $id)->with(['success'=>'Item added to cart successfully']);
        }   
    }

    public function displayCartItems() {
        if(auth()->user()) {
            //display cart items
            $cartItems = Cart::where('user_id', Auth::user()->id)->get();

            //display price 
            $price = Cart::where('user_id', Auth::user()->id)->sum('price');

            return view('foods.cart', compact('cartItems', 'price'));
        } else {
            abort(404, 'Page not found');
        }

    }

    public function deleteCartItems($id) {

        $deleteItem = Cart::where('user_id', Auth::user()->id)->where('food_id', $id);

        $deleteItem->delete();

        if($deleteItem) {
            return redirect()->route('food.display.cart')->with(['success'=>'Item deleted successfully']);
        } else {
            return redirect()->route('food.display.cart')->with(['error'=>'Failed to delete item']);
        }
    }

    public function prepareCheckout(Request $request) {
        $value = $request->price;
        $price = Session::put('price', $value);

        $newPrice = Session::get('price');

        if($newPrice > 0) {
            if(Session::get('price') == 0) {
                abort(403, 'Forbidden');
            }else {
                return redirect()->route('foods.checkout');
            }
        }
    }

    public function checkout() { 
        if(Session::get('price') == 0) {
            abort(403, 'Forbidden');
        }else {
            return view('foods.checkout');
        }
    }

    public function storeCheckout (Request $request) { 
        $storeCheckout = Checkout::create([
            "name" => $request->name,
            "email" => $request->email,
            "town" => $request->town,
            "country" => $request->country,
            "zipcode" => $request->zipcode,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "user_id" => Auth::user()->id,
            "price" => $request->price,
        ]);

        // echo "go to paypal";

        if($storeCheckout) {
            if(Session::get('price') == 0) {
                abort(403, 'Forbidden');
            }else {
                return redirect()->route('foods.pay');
            }
        }
    }

    public function payWithPaypal() {
        if(Session::get('price') == 0) {
                abort(403, 'Forbidden');
            }else {
                return view('foods.pay');
            }
    }

    public function success() {
        $deleteItem = Cart::where('user_id', Auth::user()->id);

        $deleteItem->delete();

        if($deleteItem) {
            if(Session::get('price') == 0) {
                abort(403, 'Forbidden');
            }else {
                Session::forget('price');
                return view('foods.success')->with(['success'=>'You have successfully paid the food items']);
            }
        }
    }

    public function bookingTables(Request $request) {
        Request()->validate([
            "name" => 'required|max:50',
            "email" => 'required|max:50',
            "date" => 'required',
            "num_people" => 'required',
            "spe_request" => 'required',
        ]);

        $currentDate = date("d/m/Y h:i:sa");

        if($request->name !== "" OR $request->email !== "" OR $request->date !== "" OR $request->num_people !== "" OR $request->spe_request !== "") {
            if($request->date == $currentDate OR $request->date < $currentDate) {
                return redirect()->route('dashboard')->with(['error'=>'You cannot book a table for the past date and the current date']);
            } else {
                $bookingTables = Booking::create([
                    "user_id" => Auth::user()->id,
                    "name" => $request->name,
                    "email" => $request->email,
                    "date" => str_replace('T', ' ', $request->date) . ':00',
                    "num_people" => $request->num_people,
                    "spe_request" => $request->spe_request,
                ]);

                if($bookingTables) {
                    return redirect()->route('dashboard')->with(['success'=>'Table booked successfully']);
                }
            }
        } else {
            return redirect()->route('dashboard')->with(['error'=>'Please fill in all the fields']);
        }

    }

    public function menu() {
        $breakfastFoods = Food::where('category', 'Breakfast')
            ->orderBy('id', 'desc')
            ->get();

        $lunchFoods = Food::where('category', 'Lunch')
            ->orderBy('id', 'desc')
            ->get();

        $dinnerFoods = Food::where('category', 'Dinner')
            ->orderBy('id', 'desc')
            ->get();

        return view('foods.menu', compact('breakfastFoods', 'lunchFoods', 'dinnerFoods'));
    }

}