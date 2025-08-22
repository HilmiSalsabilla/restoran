<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Food\Food;
use App\Models\Food\Review;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

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

        $reviews = Review::select()
            ->take(6)
            ->orderBy('id', 'desc')
            ->get();

        return view('dashboard', compact('breakfastFoods', 'lunchFoods', 'dinnerFoods', 'reviews'));
    }

    public function about() {
        return view('pages.about');
    }

    public function services() {
        return view('pages.services');
    }

    public function contact() {
        return view('pages.contact');
    }
}
