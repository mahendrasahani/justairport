<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function checkUserType(){
        if(Auth::check()){ 
            return response()->json([
                "status" => "success",
                "message" => "logged_in",
                "role_id" => Auth::user()->role_id
            ]);
        }else{
            return response()->json([
                "status" => "success",
                "message" => "not_logged_in"
            ]);
        }
    }



}
