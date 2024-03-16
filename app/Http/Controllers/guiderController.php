<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\package;
use App\Models\Attraction;
use App\Models\Tour;
use Session;
use DB;
use Hash;

class guiderController extends Controller
{
    public function registerguider(Request $request){
        
            $request->validate([
                'first_name'=>'required',
                'status'=>'required',
                'usertype'=>'required',
                'name'=>'required',
                'ID_no'=>'required',
                'email'=>'required|email|unique:users',
                'address'=>'required',
                'contact'=>'required',
                'password'=>'required|min:8|max:12'
    
            ]);
    
            $user = new User();
            $user->status = $request->status;
            $user->usertype = $request->usertype;
            $user->first_name = $request->first_name;
            $user->name = $request->name;
            $user->ID_no = $request->ID_no;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->contact = $request->contact;
            $user->password = Hash::make($request->password);
            $res = $user->save();
            if ($res){
                session()->put('registered_email', $request->email);
                return redirect('login')->with('success', 'Guider registration Successful Please wait for admin approval');
    
            }else{
                return back()->with('fail', 'Something wrong');
    
            }
    
    
        }

        public function guiderdashboard(){
            $data = null;
            
            if (Session::has('loginId')) {
                $userId = Session::get('loginId');
                $user = User::find($userId);
        
                if ($user) {
                    $userEmail = $user->email;
                    $contact = $user->contact;
                    $fname = $user->first_name;
                    $lname = $user->name;
                    $data = DB::table('users')->where('email', $userEmail)->get();
                    $tours = DB::table('tours')->where('email', $userEmail)->get();
                }
            } else {
                $tour=[];
                $data = [];
            }
            
            return view('guiderdashboard', compact('data', 'tours', 'userEmail', 'contact', 'fname', 'lname'));
        }

        public function savetour(Request $request){
            $request->validate([
                'title'=>'required',
                'details'=>'required',
                'price'=>'required',
                'currency'=>'required',
                'email'=>'required|email',
                'latitude'=>'required',
                'longitude'=>'required',
                'contact'=>'required',
                'fname'=>'required',
                'lname'=>'required',
                
            ]);
    
                $imgOneUrl = '';
                if ($request->hasFile('img_one')) {
                    $image = $request->file('img_one');
                    $imageName = uniqid('img_one') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $imgOneUrl = 'storage/tour_images/' . $imageName;   
                }
    
                $imgTwoUrl = '';
                if ($request->hasFile('img_two')) {
                    $image = $request->file('img_two');
                    $imageName = uniqid('img_two') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $imgTwoUrl = 'storage/tour_images/' . $imageName;   
                }
    
                $imgThreeUrl = '';
                if ($request->hasFile('img_three')) {
                    $image = $request->file('img_three');
                    $imageName = uniqid('img_three') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $imgThreeUrl = 'storage/tour_images/' . $imageName;   
                }
    
                $imgFourUrl = '';
                if ($request->hasFile('img_four')) {
                    $image = $request->file('img_four');
                    $imageName = uniqid('img_four') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $imgFourUrl = 'storage/tour_images/' . $imageName;   
                }
    
                $tour = new Tour();        
                $tour->title = $request->title;
                $tour->details = $request->details;
                $tour->price = $request->price;
                $tour->contact = $request->contact;
                $tour->fname = $request->fname;
                $tour->lname = $request->lname;
                $tour->latitude = $request->latitude;
                $tour->longitude = $request->longitude;
                $tour->currency = $request->currency;
                $tour->email = $request->email;
                $tour->img_one = $imgOneUrl;
                $tour->img_two = $imgTwoUrl;
                $tour->img_three = $imgThreeUrl;
                $tour->img_four = $imgFourUrl; // Save the image URL
                
                $res = $tour->save();
    
                if ($res){
                    return back()->with('success','Package added successfully');
                }else{
                    return back()->with('fail', 'Something wrong');
        
                }
    
        }

        public function tour() {
            $tours = Tour::all();
            return view('tours', compact('tours'));
        }

        public function updatetour(Request $request){

            if ($request->has('discard')) {
                // If discard button is clicked, redirect back without updating
                return redirect('guiderdashboard');
            }
    
            $request->validate([
                
                
                    'title'=>'required',
                    'details'=>'required',
                    'price'=>'required',
                    'currency'=>'required',
                    'email'=>'required|email',
                    'latitude'=>'required',
                    'longitude'=>'required',
                    'contact'=>'required',
                    'fname'=>'required',
                    'lname'=>'required',
                    
                
                
            ]);
    
            $tourId = $request->id; // Change 'package_id' to the actual identifier you use
    
            // Retrieve the existing package
            $tour = Tour::find($tourId);
    
            if($tour) {
    
                $tour->title = $request->title;
                $tour->details = $request->details;
                $tour->price = $request->price;
                $tour->contact = $request->contact;
                $tour->fname = $request->fname;
                $tour->lname = $request->lname;
                $tour->latitude = $request->latitude;
                $tour->longitude = $request->longitude;
                $tour->currency = $request->currency;
                $tour->email = $request->email;
                
                if ($request->hasFile('img_one')) {
                    $image = $request->file('img_one');
                    $imageName = uniqid('img_one') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $tour->img_one = 'storage/tour_images/' . $imageName;   
                }
    
                if ($request->hasFile('img_two')) {
                    $image = $request->file('img_two');
                    $imageName = uniqid('img_two') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $tour->img_two = 'storage/tour_images/' . $imageName;   
                }
    
                if ($request->hasFile('img_three')) {
                    $image = $request->file('img_three');
                    $imageName = uniqid('img_three') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $tour->img_three = 'storage/tour_images/' . $imageName;   
                }
    
                if ($request->hasFile('img_four')) {
                    $image = $request->file('img_four');
                    $imageName = uniqid('img_four') . '.' . $image->getClientOriginalExtension();
                    $image->storeAs('public/tour_images', $imageName);
        
                    // Save the image URL in the database
                    $tour->img_four = 'storage/tour_images/' . $imageName;   
                }
    
                
                $res = $tour->save();
        
                if ($res){
        
                    return redirect('guiderdashboard');
                }else{
                    return back()->with('fail', 'Something wrong');
        
                }
            }else {
                return back()->with('fail', 'Package not found'); // Handle the case when the package doesn't exist
            }
    
    
        }
    
        public function edittour($id){  
            $data = null;
            if (Session::has('loginId')) {
                $userId = Session::get('loginId');
                $user = User::find($userId);
    
                if ($user) {
                    $userEmail = $user->email;
                    $businesses = DB::table('businesses')->where('email', $userEmail)->get();
                    $packages = DB::table('packages')->where('email', $userEmail)->get();
                    $attractions = DB::table('attractions')->where('email', $userEmail)->get();
                    $data = $user;
                    $trip = DB::table('tours')->where('id', $id)->first(); 
                    return view('edit-tour', compact('trip'));
                }
            }
    
        }
    
        public function deletetour($id){
            DB::table('tours')->where('id', $id)->delete();
            return back();
        }
    

    
}
