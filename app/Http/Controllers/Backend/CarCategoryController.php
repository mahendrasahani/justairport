<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CarCategory;
use Illuminate\Http\Request;

class CarCategoryController extends Controller
{
    public function getCarCategory(Request $request){
        try{
            $id = $request->car_category_id;
            $cart_categories = CarCategory::where('id', $id)->first();
            if($cart_categories != ''){
                return response()->json([
                    "status" => "success",
                    "data" => $cart_categories
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
    }


  
}
