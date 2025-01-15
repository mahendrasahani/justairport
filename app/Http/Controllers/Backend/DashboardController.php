<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard(){
        // return view('backend.dashboard.admin_dashboard');
        // return redirect()->route('admin.control_job');
        return redirect()->route('admin.all_jobs');
    }

    public function agentDashboard(){
        return view('backend.dashboard.agent_dashboard');
    }

    public function accountantDashboard(){
        return view('backend.dashboard.accountant_dashboard');
    }

    public function adminProfile(){
        return view('backend.dashboard.admin_profile');
    }
    public function editAdminProfile(Request $request){
        return view('backend.dashboard.edit_profile');
    }

    public function updateProfile(Request $request){
         $name = $request->name;
         $phone= $request->phone; 
         User::where('id', Auth::user()->id)->update([
            "name" => $name,
            "phone" => $phone
         ]);

         if($request->hasFile('profile')){
            $directory = "assets/backend/images/user_profile";
            $profile = $request->profile;
            $profile_name = time().'.'.$profile->getClientOriginalExtension();
            $profile->move(public_path($directory), $profile_name); 
            User::where('id', Auth::user()->id)->update([
                "profile" => "public/".$directory.'/'.$profile_name,
            ]);
        }

         return redirect()->route('admin.profile');

        
    }
}
