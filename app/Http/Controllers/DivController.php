<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\package;
use App\Models\Attraction;
use DB;
use Hash;


class DivController extends Controller
{   
    public function create(Request $request) {
        $amount = $request->input('amount');
        $users = User::all();
        $businesses = Business::all();
        $packages = package::all();
        $attractions = Attraction::all();
         if($amount>=1){
            return view('Plan', ['amount' => $amount], compact('users', 'businesses', 'packages', 'attractions'));
         }else{
            return back()->withErrors(['amount' => 'Enter Valid Dates']);;
         }
        
    }

    public function planaria(){
        

    }
}
