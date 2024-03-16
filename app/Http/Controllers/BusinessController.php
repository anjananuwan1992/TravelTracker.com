<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\User;
use Session;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;

class BusinessController extends Controller
{
 
    public function saveBusiness(Request $request){
        $request->validate([
            'type'=>'required',
            'name'=>'required',
            'introduction'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'email'=>'required|email|unique:businesses',
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
                return redirect('login')->with('save_business','Business details added successfully');
            }else{
                return back()->with('fail', 'Something wrong');
    
            }

    }

    /*public function index()
    {
        $members = Member::all();
        return view ('index')->with('members', $members);
    }
 
    public function create()
    {
        return view('create');
    }*/

    public function addPost(){
        return view('add_post');
    }

    public function profile(){
        return view('profile');
    }

    public function pendingbusiness(){
        $businesses = Business::all();
        return view('business', compact('businesses'));
        
    }

    public function activebusiness(Request $request){
        $request->validate([
         
            'status'=>'required',
            

        ]);

        $businessId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $business = Business::find($businessId);

        // Check if the package exists
        if ($business) {
            // Update the package properties with the new values from the request

            $business->status = $request->status;
            
            $res = $business->save();

            if ($res) {
                return back();
            }
        }
    }

    public function deletebusiness($id){
        DB::table('businesses')->where('id', $id)->delete();
        return back();
    }

    public function activatedbusiness(){
        $businesses = Business::all();
        return view('activebusiness', compact('businesses'));
        
    }

    public function suspendbusiness(Request $request){
        $request->validate([
         
            'status'=>'required',
            

        ]);

        $businessId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $business = Business::find($businessId);

        // Check if the package exists
        if ($business) {
            // Update the package properties with the new values from the request

            $business->status = $request->status;
            
            $res = $business->save();

            if ($res) {
                return back();
            }
        }
    }


    
}
