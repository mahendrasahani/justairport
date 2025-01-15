<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\CarCategory;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    public function carType(){
        $cars = CarCategory::get(); 
        return view('backend.cartype.car_type', compact('cars'));
    }

    public function carTypeStore(Request $request){
        try{ 
            $name = $request->name;
            $short_name = $request->short_name;
            $passenger_count = $request->passenger_count;
            $large_luggage_count = $request->large_luggage_count;
            $small_luggage_count = $request->small_luggage_count; 
            CarCategory::create([
                "name" => $name,
                "short_name" => $short_name,
                "passenger_count" => $passenger_count,
                "checkin_luggage" => $large_luggage_count,
                "hand_luggage" => $small_luggage_count,
                "status" => 1
            ]);
            return redirect()->back()->with('car_added', 'Car has been added successfully !');
        }catch(\Exception $e){
            return redirect()->back()->with('something_went_wrong', $e->getMessage());
        }
    }


    public function carTypeStatus($id, $current_status){
        $newStatus = '';
        if($current_status == 1){
            $newStatus = 0;
        }else{
            $newStatus = 1;
        }
        CarCategory::where('id', $id)->update(['status' => $newStatus]);
        return redirect()->back();
    }

    public function edit($id){
       $car = CarCategory::where('id', $id)->first();
        return view('backend.cartype.edit', compact('car'));
    }

    public function update(Request $request, $id){
       $car = CarCategory::where('id', $id)->update([
        "name" => $request->name,
        "short_name" => $request->short_name,
        "passenger_count" => $request->no_of_passenger,
        "checkin_luggage" => $request->large_luggage,
        "hand_luggage" => $request->small_luggage,
        "status" => $request->status
       ]);

         if($request->hasFile('car_image')){
            $imageFile = $request->file('car_image');
            $extension = $imageFile->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;  
            $imagePath = public_path('assets/backend/images/car_images');
            $imageFile->move($imagePath, $imageName);  
            CarCategory::where('id', $id)->update([
               "image" => $imageName,
               "image_path" => "assets/backend/images/car_images"
            ]);
        } 
       return redirect()->route('admin.car_type');
    }



}