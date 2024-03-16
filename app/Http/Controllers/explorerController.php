<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Business;
use App\Models\package;
use App\Models\Attraction;
use Session;
use DB;
use Hash;

class explorerController extends Controller
{
    public function registerExplorerUser(Request $request){
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
            return redirect('login')->with('success', 'Explorer registration Successful Please wait for admin approval');

        }else{
            return back()->with('fail', 'Something wrong');

        }


    }

    public function saveattractionlocation(Request $request){
        $request->validate([
            
            'type'=>'required',
            'name'=>'required',
            'introduction'=>'required',
            'contact'=>'required',
            'email'=>'required|email',
            'latitude'=>'required',
            'longitude'=>'required',
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif',
        
        ]);

        $coverImgUrl = '';
        if ($request->hasFile('cover_img')) {
            $image = $request->file('cover_img');
            $imageName = uniqid('cover_img') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/cover_images', $imageName);

            // Save the image URL in the database
            $coverImgUrl = 'storage/cover_images/' . $imageName;   
        }

            
            $business = new Business();        
            
            $business->type = $request->type;
            $business->title = $request->name;
            $business->introduction = $request->introduction;
            $business->address = $request->address;
            $business->contact = $request->contact;
            $business->status = 'pending';
            $business->registration_no = $request->registration_no;
            $business->email = $request->email;
            $business->latitude = $request->latitude;
            $business->longitude = $request->longitude;
            $business->cover_img = $coverImgUrl; // Save the image URL

                        
            $res = $business->save();

            if ($res){
                return redirect('attractioninfo');
            }else{
                return back()->with('fail', 'Something wrong');
    
            }

    }

    public function addattractionloc()
    {
        $data = null;
        
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $user = User::find($userId);
    
            if ($user) {
                $userEmail = $user->email;
                $businesses = DB::table('businesses')->where('email', $userEmail)->get();
                $attractions = DB::table('attractions')->where('email', $userEmail)->get();
                $data = DB::table('users')->where('email', $userEmail)->get();
            }
        } else {
            $businesses = [];
            $attractions = [];
            $data=[]; // If there's no logged-in user, set businesses & packages as an empty array or handle it as needed.
        }

        return view('addattractions', compact('data', 'businesses', 'attractions'));
    }

    

    

    public function addAttractionToBusiness(Request $request)
    {


        $imgOneUrl = '';
        if ($request->hasFile('img_one')) {
            $image = $request->file('img_one');
            $imageName = uniqid('img_one') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/attraction_images', $imageName);

            // Save the image URL in the database
            $imgOneUrl = 'storage/attraction_images/' . $imageName;   
        }

        $imgTwoUrl = '';
        if ($request->hasFile('img_two')) {
            $image = $request->file('img_two');
            $imageName = uniqid('img_two') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/attraction_images', $imageName);

            // Save the image URL in the database
            $imgTwoUrl = 'storage/attraction_images/' . $imageName;   
        }

        $imgThreeUrl = '';
        if ($request->hasFile('img_three')) {
            $image = $request->file('img_three');
            $imageName = uniqid('img_three') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/attraction_images', $imageName);

            // Save the image URL in the database
            $imgThreeUrl = 'storage/attraction_images/' . $imageName;   
        }

        $imgFourUrl = '';
        if ($request->hasFile('img_four')) {
            $image = $request->file('img_four');
            $imageName = uniqid('img_four') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/attraction_images', $imageName);

            // Save the image URL in the database
            $imgFourUrl = 'storage/attraction_images/' . $imageName;   
        }

        $request->validate([
            
            'businessId'=>'required',
            'information'=>'required',
            'title'=>'required',
            'introduction'=>'required',
            'email'=>'required|email',
            'latitude'=>'required',
            'longitude'=>'required',
            'img_one' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
            'img_two' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
            'img_three' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
            'img_four' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
        
        ]);

        $attraction = new Attraction();        
        $attraction->business_id = $request->businessId;
        $attraction->information = $request->information;
        $attraction->title = $request->title;
        $attraction->latitude = $request->latitude;
        $attraction->longitude = $request->longitude;
        $attraction->introduction = $request->introduction;
        $attraction->email = $request->email;
        $attraction->img_one = $imgOneUrl;
        $attraction->img_two = $imgTwoUrl;
        $attraction->img_three = $imgThreeUrl;
        $attraction->img_four = $imgFourUrl; // Save the image URL
        
        $res = $attraction->save();

        if ($res){

            return redirect('addattractions');
        }else{
            return back()->with('fail', 'Something wrong');

        }
    }

    public function attractioninfo(){
        $data = null;
        $businesses = [];
    
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $user = User::find($userId);
    
            if ($user) {
                $userEmail = $user->email;

                $latestBusiness = DB::table('businesses')->where('email', $userEmail)->latest()->first();
                if ($latestBusiness) {

                    $latestBusinessId = $latestBusiness->id;
                    $title = $latestBusiness->title;
                    $introduction = $latestBusiness->introduction;
                    $latitude = $latestBusiness->latitude;
                    $longitude = $latestBusiness->longitude;


                    return view('attractioninfo', compact('latestBusinessId', 'userEmail', 'title', 'introduction', 'latitude', 'longitude'));
                }
            }
        }
    
        return view('attractioninfo', compact('businesses'));
    }
    

    public function editattraction($business_id){  
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
                $busi = DB::table('businesses')->where('id', $business_id)->first(); 
                return view('edit-location', compact('busi'));
            }
        }

    }

    public function updateattraction(Request $request){

        if ($request->has('discard')) {
            // If discard button is clicked, redirect back without updating
            return redirect('addattractions');
        }

        $request->validate([
            
            'type'=>'required',
            'name'=>'required',
            'introduction'=>'required',
            'contact'=>'required',
            'email'=>'required|email',
            'latitude'=>'required',
            'longitude'=>'required',
            'cover_img' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
        
        ]);

        $businessId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $business = Business::find($businessId);

        if($business) {

            if ($request->hasFile('cover_img')) {
                $image = $request->file('cover_img');
                $imageName = uniqid('cover_img') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/cover_images', $imageName);
    
                // Save the image URL in the database
                $business->cover_img = 'storage/cover_images/' . $imageName;    
            }      
                
                $business->type = $request->type;
                $business->title = $request->name;
                $business->introduction = $request->introduction;
                $business->address = $request->address;
                $business->contact = $request->contact;
                $business->status = 'pending';
                $business->registration_no = $request->registration_no;
                $business->email = $request->email;
                $business->latitude = $request->latitude;
                $business->longitude = $request->longitude;
    
                            
                $res = $business->save();
    
                if ($res){
                    return redirect('addattractions');
                }else{
                    return back()->with('fail', 'Something wrong');
        
                }
        }


    }

    public function updateinfomation(Request $request){

        if ($request->has('discard')) {
            // If discard button is clicked, redirect back without updating
            return redirect('addattractions');
        }

        $request->validate([
            
            'businessId'=>'required',
            'information'=>'required',
            'title'=>'required',
            'introduction'=>'required',
            'email'=>'required|email',
            'latitude'=>'required',
            'longitude'=>'required',
            'img_one' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
            'img_two' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
            'img_three' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240',
            'img_four' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=6000,max_height=4000|max:10240'
            
        ]);

        $informationId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $attraction = Attraction::find($informationId);

        if($attraction) {

            $attraction->business_id = $request->businessId;
            $attraction->information = $request->information;
            $attraction->title = $request->title;
            
            $attraction->latitude = $request->latitude;
            $attraction->longitude = $request->longitude;
            $attraction->introduction = $request->introduction;
            $attraction->email = $request->email;
            
            if ($request->hasFile('img_one')) {
                $image = $request->file('img_one');
                $imageName = uniqid('img_one') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/attraction_images', $imageName);
    
                // Save the image URL in the database
                $attraction->img_one = 'storage/attraction_images/' . $imageName;   
            }

            if ($request->hasFile('img_two')) {
                $image = $request->file('img_two');
                $imageName = uniqid('img_two') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/attraction_images', $imageName);
    
                // Save the image URL in the database
                $attraction->img_two = 'storage/attraction_images/' . $imageName;   
            }

            if ($request->hasFile('img_three')) {
                $image = $request->file('img_three');
                $imageName = uniqid('img_three') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/attraction_images', $imageName);
    
                // Save the image URL in the database
                $attraction->img_three = 'storage/attraction_images/' . $imageName;   
            }

            if ($request->hasFile('img_four')) {
                $image = $request->file('img_four');
                $imageName = uniqid('img_four') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/attraction_images', $imageName);
    
                // Save the image URL in the database
                $attraction->img_four = 'storage/attraction_images/' . $imageName;   
            }

            
            $res = $attraction->save();
    
            if ($res){
    
                return redirect('addattractions');
            }else{
                return back()->with('fail', 'Something wrong');
    
            }
        }else {
            return back()->with('fail', 'Package not found'); // Handle the case when the package doesn't exist
        }


    }

    public function editinfomation($id){  
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
                $attract = DB::table('attractions')->where('id', $id)->first(); 
                return view('edit-infomation', compact('attract'));
            }
        }

    }

    public function deleteattraction($id){
        DB::table('businesses')->where('id', $id)->delete();
        return back();
    }


}
