<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\package;
use App\Models\Attraction;
use DB;
use Hash;

class catogoryController extends Controller
{
    public function attraction() {
        $businesses = Business::all();
        $attractions = Attraction::all();
        return view('attractions', compact('businesses', 'attractions'));
    }

    public function hotel() {
        $businesses = Business::all();
        $packages = package::all();
        return view('hotels', compact('businesses', 'packages'));
    }

    public function food() {
        $businesses = Business::all();
        $packages = package::all();
        return view('foods', compact('businesses', 'packages'));
    }

    public function rental() {
        $businesses = Business::all();
        $packages = package::all();
        return view('rentals', compact('businesses', 'packages'));
    }

    public function shop() {
        $businesses = Business::all();
        $packages = package::all();
        return view('shops', compact('businesses', 'packages'));
    }


}
