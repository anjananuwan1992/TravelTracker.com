<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Models\Business;
use App\Models\package;
use App\Models\Admin;
use App\Models\Attraction;
use Session;
use DB;




class adminController extends Controller
{
    
    public function activeuser(Request $request){
        $request->validate([
            'first_name'=>'required',
            'status'=>'required',
            'name'=>'required',
            'ID_no'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'contact'=>'required',

        ]);

        $userId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $user = User::find($userId);

        // Check if the package exists
        if ($user) {
            // Update the package properties with the new values from the request
            $user->first_name = $request->first_name;
            $user->name = $request->name;
            $user->status = $request->status;
            $user->ID_no = $request->ID_no;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->contact = $request->contact;
            $res = $user->save();

            if ($res) {
                return back();
            }
        }
    }

    public function activeaccounts(){
        $users = User::all();
        return view('activeaccounts', compact('users'));

    }


    public function activeuser2(Request $request){
        $request->validate([
         
            'status'=>'required',
            

        ]);

        $userId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $user = User::find($userId);

        // Check if the package exists
        if ($user) {
            // Update the package properties with the new values from the request

            $user->status = $request->status;
            
            $res = $user->save();

            if ($res) {
                return back();
            }
        }
    }

    public function deleteuser($id){
        DB::table('users')->where('id', $id)->delete();
        return back();
    }

    public function pendingaccounts(){
        $users = User::all();
        return view('pendingaccounts', compact('users'));
        
    }

    public function suspendeduser(){
        $users = User::all();
        return view('suspendeduser', compact('users'));
        
    }




    public function adminaccounts()
    {
        if(Session::has('loginId')){
            $userId = Session::get('loginId');
            $user = User::find($userId);

            if($userId==1){

                $admins = Admin::all();
                return view('adminaccounts', compact('admins'));
            }else{
                return redirect('admin_panel')->with('fail', 'Sorry! You have not access');
            }
        }
        
    }

    public function deleteadmin($id){
        DB::table('admins')->where('id', $id)->delete();
        return back();
    }

    public function suspendadmin(Request $request){
        $request->validate([
            'first_name'=>'required',
            'status'=>'required',
            'name'=>'required',
            'ID_no'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'contact'=>'required',
            

        ]);

        $adminId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $admin = Admin::find($adminId);

        if ($admin) {
        $admin->status = $request->status;
        $admin->first_name = $request->first_name;
        $admin->name = $request->name;
        $admin->ID_no = $request->ID_no;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->contact = $request->contact;
        
        $res = $admin->save();
        
            if ($res){
                
                return back();

            }

        }


    }

    public function susadmin()
    {
        if(Session::has('loginId')){
            $userId = Session::get('loginId');
            $user = Admin::find($userId);

            if($userId==1){

                $admins = Admin::all();
                return view('suspendedadmin', compact('admins'));
            }else{
                return redirect('admin_panel')->with('fail', 'Sorry! You have not access');
            }
        }
        
    }

    public function activeadmin(Request $request){
        $request->validate([
            'first_name'=>'required',
            'status'=>'required',
            'name'=>'required',
            'ID_no'=>'required',
            'email'=>'required|email',
            'address'=>'required',
            'contact'=>'required',
            

        ]);

        $adminId = $request->id; // Change 'package_id' to the actual identifier you use

        // Retrieve the existing package
        $admin = Admin::find($adminId);

        if ($admin) {
        $admin->status = $request->status;
        $admin->first_name = $request->first_name;
        $admin->name = $request->name;
        $admin->ID_no = $request->ID_no;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->contact = $request->contact;
        
        $res = $admin->save();
        
            if ($res){
                
                return back();

            }

        }


    }


}
