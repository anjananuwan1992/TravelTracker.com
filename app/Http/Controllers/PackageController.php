<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\package;
use Session;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function savePackage(Request $request){
        $request->validate([
            'title'=>'required',
            'introduction'=>'required',
            'price'=>'required',
            'currency'=>'required',
            'email'=>'required|email',
            'img_one' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
            'img_two' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
            'img_three' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
            'img_four' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
        ]);

            $imgOneUrl = '';
            if ($request->hasFile('img_one')) {
                $image = $request->file('img_one');
                $imageName = uniqid('img_one') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $imgOneUrl = 'storage/package_images/' . $imageName;   
            }

            $imgTwoUrl = '';
            if ($request->hasFile('img_two')) {
                $image = $request->file('img_two');
                $imageName = uniqid('img_two') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $imgTwoUrl = 'storage/package_images/' . $imageName;   
            }

            $imgThreeUrl = '';
            if ($request->hasFile('img_three')) {
                $image = $request->file('img_three');
                $imageName = uniqid('img_three') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $imgThreeUrl = 'storage/package_images/' . $imageName;   
            }

            $imgFourUrl = '';
            if ($request->hasFile('img_four')) {
                $image = $request->file('img_four');
                $imageName = uniqid('img_four') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $imgFourUrl = 'storage/package_images/' . $imageName;   
            }

            $package = new Package();        
            $package->title = $request->title;
            $package->introduction = $request->introduction;
            $package->price = $request->price;
            $package->currency = $request->currency;
            $package->email = $request->email;
            $package->img_one = $imgOneUrl;
            $package->img_two = $imgTwoUrl;
            $package->img_three = $imgThreeUrl;
            $package->img_four = $imgFourUrl; // Save the image URL
            
            $res = $package->save();

            if ($res){
                return back()->with('success','Package added successfully');
            }else{
                return back()->with('fail', 'Something wrong');
    
            }

    }
}
