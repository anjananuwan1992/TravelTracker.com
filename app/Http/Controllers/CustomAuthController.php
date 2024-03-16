<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Models\Business;
use App\Models\package;
use App\Models\Admin;
use App\Models\Attraction;
use App\Models\Tour;
use Session;
use DB;

class CustomAuthController extends Controller
{
    public function home(){
        return view('Home');
    }
    
    public function login(){
        return view ("Login");

    }

    public function admin(){
        return view ("admin");

    }

    public function adminpanel(){
        $users = DB::table('users')->where('status', 'active')->count();
        $usersCount = User::count();
        $explorerCount = DB::table('users')->where('usertype', 'explorer')->count();
        $attractionCount = DB::table('businesses')->where('type', 'Attractions')->count();
        $hotelCount = DB::table('businesses')->where('type', 'hotels')->count();
        $foodCount = DB::table('businesses')->where('type', 'foods-and-cafe')->count();
        $rentalCount = DB::table('businesses')->where('type', 'rental-items')->count();
        $shopCount = DB::table('businesses')->where('type', 'shops')->count();
        $guiderCount = DB::table('users')->where('usertype', 'guider')->count();
        $tourCount = Tour::count();
        $pendingusercount = DB::table('users')->where('status', 'pending')->count();
        $pendingbusinessCount = DB::table('businesses')->where('status', 'pending')->count();
        $adminCount = DB::table('admins')->count();
        $userData = User::selectRaw('date(created_at) as date, count(*) as user_count')
                        ->groupBy('date')
                        ->get();



        return view('admin_panel', compact('users', 'usersCount', 'attractionCount', 'hotelCount', 'foodCount', 'rentalCount', 'shopCount', 'explorerCount', 'guiderCount', 'tourCount', 'userData', 'pendingusercount', 'pendingbusinessCount', 'adminCount'));

    }

    public function addadmin(){
        if(Session::has('loginId')){
            $userId = Session::get('loginId');
            $user = Admin::find($userId);

            if($userId==1){

                return view("add_admins");
            }else{
                return redirect('admin_panel')->with('fail', 'Sorry! You have not access');
            }
        }
        

    }

    public function registeradmin(Request $request){
        $request->validate([
            'first_name'=>'required',
            'status'=>'required',
            'name'=>'required',
            'ID_no'=>'required',
            'email'=>'required|email|unique:admins',
            'address'=>'required',
            'contact'=>'required',
            'password'=>'required|min:8|max:12'

        ]);

        $admin = new Admin();
        $admin->status = $request->status;
        $admin->first_name = $request->first_name;
        $admin->name = $request->name;
        $admin->ID_no = $request->ID_no;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->contact = $request->contact;
        $admin->password = Hash::make($request->password);
        $res = $admin->save();
        if ($res){
            session()->put('registered_email', $request->email);
            return back()->with('success', 'Admin registration Successfuly');

        }else{
            return back()->with('fail', 'Something wrong');

        }


    }

    public function loginadmin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);
    
        $admin = Admin::where('email', $request->email)->first();
    
        if ($admin) {
            if ($admin->status == 'active') { // Check the user's status
                if (Hash::check($request->password, $admin->password)) {
                    $request->session()->put('loginId', $admin->id);
                    return redirect('admin_panel');
                } else {
                    return back()->with('fail', 'Password not match');
                }
            } else {
                return back()->with('fail', 'Your account is not active.');
            }
        } else {
            return back()->with('fail', 'This is an invalid email');
        }
    }

    public function adminlogout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('admin');
        }
    }

    public function registration(){
        return view("Registration");

    }
    
    public function registerUser(Request $request){
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
            return redirect('add_business')->with('success', 'User registration Successful Please add your business');

        }else{
            return back()->with('fail', 'Something wrong');

        }


    }

    public function addBusiness()
    {
        $registeredEmail = session()->get('registered_email');
        return view('add_business', ['email' => $registeredEmail]);
    }

    
    public function loginUser(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            if ($user->status == 'active') { // Check the user's status
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('loginId', $user->id);
                    if($user->usertype == 'business')
                    {
                        return redirect('dashboard');
                    } else if ($user->usertype=='explorer')
                    {
                        return redirect('addattractions');
                    }else if ($user->usertype=='guider')
                    {
                        return redirect('guiderdashboard');
                    }
                    
                } else {
                    return back()->with('fail', 'Password not match');
                }
            } else {
                return back()->with('fail', 'Your account is not active.');
            }
        } else {
            return back()->with('fail', 'This is an invalid email');
        }
    }

    
    

    public function dashboard(){
        $data = null;
        
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $user = User::find($userId);
    
            if ($user) {
                $userEmail = $user->email;
                $businesses = DB::table('businesses')->where('email', $userEmail)->get();
                $packages = DB::table('packages')->where('email', $userEmail)->get();
                $attractions = DB::table('attractions')->where('email', $userEmail)->get();
                $data = DB::table('users')->where('email', $userEmail)->get();
            }
        } else {
            $businesses = [];
            $packages = []; 
            $attractions = [];
            $data = [];
        }
        
        return view('dashboard', compact('businesses', 'packages', 'attractions'));
    }
    

    public function editpackage($id){  
        $data = null;
        if (Session::has('loginId')) {
            $userId = Session::get('loginId');
            $user = User::find($userId);

            if ($user) {
                $userEmail = $user->email;
                $businesses = DB::table('businesses')->where('email', $userEmail)->get();
                $packages = DB::table('packages')->where('email', $userEmail)->get();
                $data = $user;
                $package = DB::table('packages')->where('id', $id)->first(); 
                return view('edit-package', compact('package'));
            }
        }

    }

    public function updatePackage(Request $request){

        if ($request->has('discard')) {
            // If discard button is clicked, redirect back without updating
            return redirect('dashboard');
        }

        $request->validate ([
            'title'=>'required',
            'introduction'=>'required',
            'price'=>'required',
            'currency'=>'required',
            'email'=>'required|email',
            'img_one' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
            'img_two' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
            'img_three' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
            'img_four' => 'image|mimes:jpeg,png,jpg,gif|dimensions:max_width=4000,max_height=4000|max:10240',
        ]);

            

        // First, identify the package you want to update, e.g., by its ID
        $packageId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $package = Package::find($packageId);

        // Check if the package exists
        if ($package) {
            // Update the package properties with the new values from the request
            $package->title = $request->title;
            $package->introduction = $request->introduction;
            $package->price = $request->price;
            $package->currency = $request->currency;
            $package->email = $request->email;

            // You can update the image URLs if needed
            if ($request->hasFile('img_one')) {
                $image = $request->file('img_one');
                $imageName = uniqid('img_one') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $package->img_one = 'storage/package_images/' . $imageName;   
            }

            if ($request->hasFile('img_two')) {
                $image = $request->file('img_two');
                $imageName = uniqid('img_two') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $package->img_two = 'storage/package_images/' . $imageName;   
            }

            if ($request->hasFile('img_three')) {
                $image = $request->file('img_three');
                $imageName = uniqid('img_three') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $package->img_three = 'storage/package_images/' . $imageName;   
            }

            if ($request->hasFile('img_four')) {
                $image = $request->file('img_four');
                $imageName = uniqid('img_four') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/package_images', $imageName);
    
                // Save the image URL in the database
                $package->img_four = 'storage/package_images/' . $imageName;   
            }

            // Save the updated package
            $res = $package->save();

            if ($res) {
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Something went wrong while updating');
            }
        } else {
            return back()->with('fail', 'Package not found'); // Handle the case when the package doesn't exist
        }

    }

    public function deletepackage($id){
        DB::table('packages')->where('id', $id)->delete();
        return back();
    }

    

    
    

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function canceledit(){
            return resirect('dashboard');
    }

    


    
}
