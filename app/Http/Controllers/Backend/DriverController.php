<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\ApplyDriverMail;
use App\Models\Backend\CarCategory;
use App\Models\Backend\Driver;
use App\Models\backend\DriverVacancy;
use App\Models\DriverData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DriverController extends Controller
{
    public function driverProfile() { 
        $drivers = Driver::where('status', 1)->orderByRaw('RIGHT(call_Sign, 2) ASC')->get();
        return view('backend.drivers.driver_profile', compact('drivers'));
    }

    public function suspendedDriversPageView(){
        $drivers = Driver::where('status', 0)->where('d_Delete', 0)->orderByRaw('RIGHT(call_Sign, 2) ASC')->get();
        return view('backend.drivers.suspended_driver', compact('drivers'));
    }


    public function addNewDriver(){
        $cars = CarCategory::where('status', 0)->get();
        return view('backend.drivers.add_new_driver', compact('cars'));
    }
    public function storeNewDriver(Request $request){
        try{  
        $current_date = Carbon::now();
        //driver personal detials-------------------------------------
        $full_name = $request->full_name;  
        $full_address = $request->full_address;  
        $driver_phone = $request->driver_phone;  
        $secondary_phone = $request->secondary_phone;  
        $email_address = $request->email_address;  
        $call_sign = $request->call_sign;  
        $nationality = $request->nationality;  
        $nino = $request->nino;  //(PCO badge number is nino)

        //vehicle details-----------------------------------------------
        $vmm = $request->vmm;  //(vehicle make and model)
        $reg_No = $request->registration_no; 
        $vehicle_Color = $request->vehicle_color; 
        $vehicle_Type = $request->car_type; 
        $dob = $request->vehicle_check_date; // (done same as old)
        $pax = $request->pax;
        $large_S = $request->large_s;
        $small_S = $request->small_s;
                
        //Driver PCO Details---------------------------------------
        $driving_LicenceNo = $request->driver_private_hire_license; 
        $driver_licence_expiry = $request->driver_licence_exp_date;
        $pco_Expiry = $request->pco_exp_date;
        $driver_no = $request->driver_no;
        
        // Vehicle PCO Details----------------------------------
        $PCO_LicenceNo = $request->pco_licence_number;
        $phv_Expiry = $request->pco_vehicle_exp_date;
        $mot_Expiry = $request->mot_exp_date;
        $insurance_Expiry = $request->insurance_exp_date;
        $tax_ExpiryDate = $request->tax_exp_date;
        $comments = $request->comment;

        $new_driver_id = Driver::insertGetId([
            "full_Name" => $full_name,
            "full_Address" => $full_address,
            "phone" => $driver_phone,
            "phone_Secondary" => $secondary_phone,
            "email" => $email_address,
            "call_Sign" => $call_sign,
            "nationality" => $nationality,
            "nino" => $nino,
            "vmm" => $vmm,
            "reg_No" => $reg_No,
            "vehicle_Color" => $vehicle_Color,
            "vehicle_Type" => $vehicle_Type,
            "dob" => $dob, 
            "pax" => $pax,
            "large_S" => $large_S,
            "small_S" => $small_S,
            "driving_LicenceNo" => $driving_LicenceNo,
            "driver_licence_expiry" => $driver_licence_expiry,
            "pco_Expiry" => $pco_Expiry,
            "driver_no" => $driver_no,
            "PCO_LicenceNo" => $PCO_LicenceNo,
            "phv_Expiry" => $phv_Expiry,
            "mot_Expiry" => $mot_Expiry,
            "insurance_Expiry" => $insurance_Expiry,
            "tax_ExpiryDate" => $tax_ExpiryDate,
            "comments" => $comments,  
            'date_Created' => $current_date,
            'status' => 1
        ]);

        Driver::where('id', $new_driver_id)->update(["info_link" => "http://justairports.com/driver-info/".$driver_no]);
        if($request->hasFile('image_driver')){
            $d_image = $request->file('image_driver');
            $originalFileName = $d_image->getClientOriginalName();
            $newFileName = time().'_'.date('Y-m-d').'.'.$d_image->getClientOriginalExtension();
            $d_image->move(public_path('assets/backend/images/drivers-images'), $newFileName);
            Driver::where('id', $new_driver_id)->update(['image_driver' => $newFileName]);
        }  
        return redirect()->route('admin.driver_profile')->with('success', 'New driver has been added successfully !');

    }catch(\Exception $e){
        return $e->getMessage();
    }


    }
    public function addNewDriverStore(Request $request){
        //driver details --------------------------------------------
        $name = $request->name;
        // $address = $request->address;
        $phone = $request->phone;
        // $phone_secondry = $request->phone_secondry;
        $email = $request->email;
        // $call_sign = $request->call_sign;
        // $nationality = $request->nationality; 
        // $pco_badge_number = $request->pco_badge_number; 



        //vehicle details --------------------------------------------
        $vehicle_model = $request->vehicle_model; 
        // $vehicle_registration_number = $request->vehicle_registration_number; 
        // $vehicle_color = $request->vehicle_color; 
        // $car_type = $request->car_type; 
        // $vehicle_check_date_in_office = $request->vehicle_check_date_in_office; 
        // $pax = $request->pax; 
        // $large_s = $request->large_s; 
        // $small_s = $request->small_s; 


        //Driver PCO Details --------------------------------------------
        // $private_hire_license = $request->private_hire_license; 
        // $driver_license_exp_date = $request->driver_license_exp_date; 
        // $pco_exp_date = $request->pco_exp_date; 
        // $driver_number = $request->driver_number; 
        // $driver_photo = $request->driver_photo; 
        // $image = $request->image;
        
        
        //Vehicle PCO Details --------------------------------------------
        // $pco_license_number = $request->pco_license_number; 
        // $pco_vehicle_exp_date = $request->pco_vehicle_exp_date; 
        // $mot_exp_date = $request->mot_exp_date; 
        // $insurance_exp_date = $request->insurance_exp_date; 
        // $tax_exp_date = $request->tax_exp_date;   


        return view('backend.drivers.add_new_driver');
    }
    public function driverApplied(){
        $apply_drivers = DB::table('tbl_apply_driver')->orderBy('id', 'desc')->get();
        return view('backend.drivers.driver_applied', compact('apply_drivers'));
    }
  
    public function expiredDocument(){
        return view('backend.drivers.expired_documents');
    }
    public function verifiedDriverDocument(){
        return view('backend.drivers.verified_driver_document');
    }
    public function driverLeaves(){
        $driver_leaves = DB::table('driver_leaves')->get();
        return view('backend.drivers.driver_leaves', compact('driver_leaves'));
    }

    public function suspendDriver(Request $request){
        try{ 
            $id = $request->id;
            Driver::where('id', $id)->update(['status' => 0]);
            return response()->json([
            "status" => "suspended",
            "message" => "Driver has been suspended successfully !"
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "something_went_wrong",
                "error" => $e->getMessage()
            ]);
        }
    }
    public function unSuspendDriver(Request $request){
        try{ 
            $id = $request->id;
        Driver::where('id', $id)->update(['status' => 1]);
       return response()->json([
        "status" => "unsuspended",
        "message" => "Driver has been unsuspended successfully !"
       ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "something_went_wrong",
                "error" => $e->getMessage()
            ]);
        }
    }

    public function driverVacancy(){
        return view('frontend.driver_vacancy');
    }
       public function driverVacancySubmit(Request $request){ 
        $validate = $request->validate([
            'fullname' => 'required',
            'mobile_number' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'email_address' => 'required|email',
            'car_model' => 'required',
            'car_year' => 'required',
        ]);

        $fullname = $request->fullname;
        $mobile_number  = $request->mobile_number;
        $address  = $request->address;
        $postal_code  = $request->postal_code;
        $email_address  = $request->email_address;
        $car_model  = $request->car_model;
        $car_year  = $request->car_year;
    
        DriverVacancy::create([
            'name' =>$fullname,
            'mobile' => $mobile_number, 
            'postcode' => $postal_code,
            'email' => $email_address,
            'carmake' => $car_model,
            'caryear' => $car_year
        ]);

        $apply_driver_data = [
            "name" => $fullname,
            "mobile" => $mobile_number,
            "postcode" => $postal_code,
            "email" => $email_address,
            "carmake" => $car_model,
            "caryear" => $car_year,
        ];

        Mail::to('info@justairports.com')->send(new ApplyDriverMail($apply_driver_data));
        //replace email with this:- info@justairports.com
        return redirect()->back()->with('vacancy_submitted', 'Your detail has been submitted successfully !');
       }


       public function editDriver($id){
        $cars = CarCategory::where('status', 1)->get();
        $driver_data = Driver::where('id', $id)->first(); 
        return view('backend.drivers.edit_driver', compact('cars', 'driver_data'));
       }

       public function updateDriver(Request $request, $id){
        try{  
            $current_date = Carbon::now();
            //driver personal detials-------------------------------------
            $full_name = $request->full_name;  
            $full_address = $request->full_address;  
            $driver_phone = $request->driver_phone;  
            $secondary_phone = $request->secondary_phone;  
            $email_address = $request->email_address;  
            $call_sign = $request->call_sign;  
            $nationality = $request->nationality;  
            $nino = $request->nino;  //(PCO badge number is nino)
    
            //vehicle details-----------------------------------------------
            $vmm = $request->vmm;  //(vehicle make and model)
            $reg_No = $request->registration_no; 
            $vehicle_Color = $request->vehicle_color; 
            $vehicle_Type = $request->car_type; 
            $dob = $request->vehicle_check_date; // (done same as old)
            $pax = $request->pax;
            $large_S = $request->large_s;
            $small_S = $request->small_s;
                    
            //Driver PCO Details---------------------------------------
            $driving_LicenceNo = $request->driver_private_hire_license; 
            $driver_licence_expiry = $request->driver_licence_exp_date;
            $pco_Expiry = $request->pco_exp_date;
            $driver_no = $request->driver_no;
            
            // Vehicle PCO Details----------------------------------
            $PCO_LicenceNo = $request->pco_licence_number;
            $phv_Expiry = $request->pco_vehicle_exp_date;
            $mot_Expiry = $request->mot_exp_date;
            $insurance_Expiry = $request->insurance_exp_date;
            $tax_ExpiryDate = $request->tax_exp_date;
            $comments = $request->comment;
    
            $new_driver_id = Driver::where('id', $id)->update([
                "full_Name" => $full_name,
                "full_Address" => $full_address,
                "phone" => $driver_phone,
                "phone_Secondary" => $secondary_phone,
                "email" => $email_address,
                "call_Sign" => $call_sign,
                "nationality" => $nationality,
                "nino" => $nino,
                "vmm" => $vmm,
                "reg_No" => $reg_No,
                "vehicle_Color" => $vehicle_Color,
                "vehicle_Type" => $vehicle_Type,
                "dob" => $dob, 
                "pax" => $pax,
                "large_S" => $large_S,
                "small_S" => $small_S,
                "driving_LicenceNo" => $driving_LicenceNo,
                "driver_licence_expiry" => $driver_licence_expiry,
                "pco_Expiry" => $pco_Expiry,
                "driver_no" => $driver_no,
                "PCO_LicenceNo" => $PCO_LicenceNo,
                "phv_Expiry" => $phv_Expiry,
                "mot_Expiry" => $mot_Expiry,
                "insurance_Expiry" => $insurance_Expiry,
                "tax_ExpiryDate" => $tax_ExpiryDate,
                "comments" => $comments,  
                'date_Created' => $current_date
            ]);
    
            if($request->hasFile('image_driver')){
                $d_image = $request->file('image_driver');
                $originalFileName = $d_image->getClientOriginalName();
                $newFileName = time().'_'.date('Y-m-d').'.'.$d_image->getClientOriginalExtension();
                $d_image->move(public_path('assets/backend/images/drivers-images'), $newFileName);
                Driver::where('id', $id)->update(['image_driver' => $newFileName]);
            }  
            return redirect()->route('admin.driver_profile')->with('success', 'New driver has been added successfully !');
    
        }catch(\Exception $e){
            return $e->getMessage();
        }
       }    
}
