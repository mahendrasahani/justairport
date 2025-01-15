<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function getClient(Request $request){
        $name = $request->name; 
        if($name != ''){
        try{
            $clients = Client::where('name', 'LIKE', '%'.$name.'%')->where('mobile_verified', 1)->get();
            if(count($clients) > 0){
                return response()->json([
                    "status" => "success",
                    "data" => $clients
                ], 200);
            }else{
                return response()->json([
                    "status" => "no_record_found", 
                ], 200);
            } 
      
        }catch(\Exception $e){
            return response()->json([
                "status" => "something_went_wrong",
                "error" => $e->getMessage()
            ], 400);
        }
    }else{
        return response()->json([
            "status" => "enter_name", 
        ], 200);
    }

        
        
    }


}
