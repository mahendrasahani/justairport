<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Airport;
use App\Models\Backend\CarCategory;
use App\Models\Backend\Client;
use App\Models\Backend\ContactEnquiry;
use App\Models\Backend\Job;
use App\Models\Backend\Postcode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $airports = Airport::where('status', 1)->get();
        $postcodes = Postcode::get(); 
        $cars = CarCategory::get();
        // return $postcodes;
        return view('frontend.home', compact('airports', 'postcodes', 'cars'));
    }
    public function about(){
        // return redirect()->route('frontend.home')->with('booking_confirmed', "Booking has been confirmed. Thank You!");
        return view('frontend.about');
    }
    public function airports(){
        return view('frontend.airports');
    }
    public function contact(){
        return view('frontend.contact');
    }


    // test function start
    public function loginOtepTest(){
        return view('emails.login_otp');
    }
    public function driverApplyTemplate(){
        return view('emails.apply_driver');
    }
    public function testUserInfo(){
        return view('emails.apply_driver');
    }


    // test function end

    public function bookingDetails(){
        $client = Client::where('id', Auth::guard('client')->user()->id)->first();
        $current_date = Carbon::now()->format('Y-m-d');  
        $upcoming_bookings = Job::with(['getAirport', 'getCarCategory', 'getDriver'])
        ->where('client_id', $client->id)->whereDate('job_date', '>=', $current_date)->get();
        $bookings = Job::with(['getAirport', 'getCarCategory', 'getDriver'])
        ->where('client_id', $client->id)->whereDate('job_date', '<', $current_date)->get();
        return view('frontend.booking_detail', compact('bookings', 'upcoming_bookings'));
    }
    public function profile(){ 
        if (Auth::guard('client')->check()){
        $client = Client::where('id', Auth::guard('client')->user()->id)->first();
        return view('frontend.profile', compact('client'));
        }else{
            abort('404');
        }
    }
 
    public function journeyDetail($id){
        $job = Job::with(['getAirport:id,airport_name,display_name', 'getCarCategory:id,name,short_name,image,image_path',
         'getClient:id,name,email,phone', 'getDriver:id,name'])->where('id', $id)->first(); 
      
        return view('frontend.journey_detail', compact('job'));
    }
 
   public function updateClientProfile(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;  
   }

   public function contactEnquiryStore(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required', 
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $message = $request->message; 

        ContactEnquiry::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
            'status' => 1
        ]); 
        return redirect()->back()->with('enquiry_submitted', 'Your enquiry has been submitted successfully !');
   }

   public function profileSubmit(Request $request){
    try{
            $name = $request->name; 
            $company = $request->company_name;
            $employee_id = $request->employee_id;
            $address = $request->address;
            $postal_code = $request->postal_code;

            Client::where('id', Auth::guard('client')->user()->id)->update([
                'name' => $name,  
                'company_name' => $company,
                'employee_id' => $employee_id,
                'address' => $address,
                'postal_code' => $postal_code,
            ]);
            if($request->hasFile('profile_image')){
                $thumbnailImgPath = 'assets/backend/upload/profile_image';
                $thumbnailImgFromRequest = $request->file('profile_image');
                $originalThumbnailName = $request->file('profile_image')->getClientOriginalName();
                $thumbnailNewName = $name.'_profile_'.time().'.'.$thumbnailImgFromRequest->getClientOriginalExtension();
                $thumbnailImgFromRequest->move(public_path($thumbnailImgPath), $thumbnailNewName);
                Client::where('id', Auth::guard('client')->user()->id)->update([ 
                    'profile_image' => 'public/'.$thumbnailImgPath.'/'.$thumbnailNewName
                ]); 
            }
            return redirect()->back()->with('profile_updated', 'Your profile has been updated successfully !');
        }catch(\Exception $e){
            return $e->getMessage();
        }
   
    }
    
    // Emails pages
    public function new_booking_confirmation(){
        return view('emails.new_booking_confirmation');
    }
    // Emails pages
    public function reminder_to_client(){
        return view('emails.reminder_to_client');
    }
   
    public function driverInfo($id){
        $driver = DB::table('drivers')->where('driver_no', $id)->first(); 
        // return $driver;
        return view('backend.drivers.driver_info', compact('driver'));
    }

    public function testFunction(){ 
            //     try{
            //         //tbl_app_user data in clients table
            //     $old_data = DB::table('tbl_app_users')->get(); 
            //     foreach($old_data as $data){
            //         DB::table('clients')->insert([
            //             "id" => $data->id,
            //             "name" => $data->name,
            //             "phone" => $data->phone,
            //             "mobile" => $data->phone,
            //             "email" => $data->email,
            //             "mobile_verified" => 0,
            //             "email_verified" => 0,
            //             "password" => $data->pwd,
            //             "mobile_otp" => NULL,
            //             "email_otp" => NULL,
            //             "mobile_otp_timestamp" => NULL,
            //             "email_otp_timestamp" => NULL,
            //             "popup_status" => null,
            //             "user_id" => NULL,
            //             "account_id" => NULL,
            //             "company_name" => NULL,
            //             "employee_id" => NULL,
            //             "street" => $data->street,
            //             "city" => $data->city,
            //             "address" => $data->address,
            //             "other_address" => $data->other_address,
            //             "zip" => $data->zip,
            //             "acc_type" => $data->acctype,
            //             "device_token" => $data->device_token,
            //             "read_status" => $data->read_status,
            //             "ask_payment_status" => $data->ask_payment_status,
            //             "register_by" => $data->registerby,
            //             "status" => $data->status,
            //              "data_source" => "from_app_user_table",
            //             "created_at" => $data->created_on,
            //             "updated_at" => $data->created_on
            //         ]);
            //     }
            //     return "Data Successfully updated";
            // }catch(\Exception $e){
            //     return $e->getMessage();
            // }

            // try{ 
            //     // tbl_booking data in client data (unique)
            //     $uniqueRecords = DB::table('tbl_bookings')
            //     ->select('client_Phones', DB::raw('MAX(booking_ID) as id'))
            //     ->groupBy('client_Phones');

            //     $old_data = DB::table('tbl_bookings as t1')
            //     ->joinSub($uniqueRecords, 'uniqueRecords', function($join) {
            //     $join->on('t1.booking_ID', '=', 'uniqueRecords.id');
            //     })->get();

            //     foreach($old_data as $data){
            //         DB::table('clients')->insert([
            //             "name" => $data->customer_Name,
            //             "phone" => $data->client_Phones,
            //             "mobile" => $data->client_Phones,
            //             "email" => $data->client_Email,
            //             "mobile_verified" => 0,
            //             "email_verified" => 0,
            //             "password" => NULL,
            //             "mobile_otp" => NULL,
            //             "email_otp" => NULL,
            //             "mobile_otp_timestamp" => NULL,
            //             "email_otp_timestamp" => NULL,
            //             "popup_status" => null,
            //             "user_id" => NULL,
            //             "account_id" => NULL,
            //             "company_name" => NULL,
            //             "employee_id" => NULL,
            //             "street" => NULL,
            //             "city" => NULL,
            //             "address" => NULL,
            //             "other_address" => NULL,
            //             "zip" => NULL,
            //             "acc_type" => NULL,
            //             "device_token" => NULL,
            //             "read_status" => 0,
            //             "ask_payment_status" => 0,
            //             "register_by" => NULL,
            //             "status" => 0,
            //             "data_source" => "from_tbl_booking_unique_user",
            //             "created_at" => $data->created_Date,
            //             "updated_at" => $data->created_Date
            //         ]);
            //     }
            //     return "Data Successfully updated";
            // }catch(\Exception $e){
            //     return $e->getMessage();
            // }


            //transfer tbl_booking data in booking_history table
            // INSERT INTO booking_history1 (id, passenger_name, journey_type_id, address, airport_id, airport_terminal, payment_type_id, car_category_id, passenger_phone, passenger_count, checkin_luggage_count, hand_luggage_count, flight_number, departure_city, job_source, job_date, job_time, total_price, postcode, comment, additional_seat)
            // SELECT 
            //     booking_ID, 
            //     customer_Name,
            //     CASE 
            //         WHEN pickup_Address LIKE '%Airport%' THEN 1 
            //         ELSE 2 
            //     END AS journey_type_id,
            //     CASE 
            //         WHEN pickup_Address NOT LIKE '%Airport%' THEN pickup_Address 
            //         ELSE destination_Address
            //     END AS address,
            //     CASE 
            //         WHEN pickup_Address LIKE '%Heathrow%' THEN 1 
            //         WHEN pickup_Address LIKE '%Gatwick%' THEN 2 
            //         WHEN pickup_Address LIKE '%Luton%' THEN 3 
            //         WHEN pickup_Address LIKE '%Stansted%' THEN 4 
            //         WHEN pickup_Address LIKE '%City%' THEN 5
            //         WHEN destination_Address LIKE '%Heathrow%' THEN 1 
            //         WHEN destination_Address LIKE '%Gatwick%' THEN 2 
            //         WHEN destination_Address LIKE '%Luton%' THEN 3 
            //         WHEN destination_Address LIKE '%Stansted%' THEN 4 
            //         WHEN destination_Address LIKE '%City%' THEN 5
            //         ELSE NULL 
            //     END AS airport_id,
            //     airport_terminal,
            //     CASE 
            //         WHEN deposit_Ref LIKE '%CASH%' THEN 1 
            //         ELSE 2 
            //     END AS payment_type_id,
            //     CASE 
            //         WHEN car_Type = 'Saloon' THEN 1
            //         WHEN car_Type = 'Estate' THEN 2
            //         WHEN car_Type = 'Executive' THEN 3
            //         WHEN car_Type = 'MPV' THEN 4
            //         WHEN car_Type = 'MPV 7' THEN 5
            //         WHEN car_Type = 'MPV 8' THEN 6
            //         ELSE NULL 
            //     END AS car_category_id,
            //     client_Phones AS passenger_phone,
            //     passengers,
            //     large_Suitcases,
            //     small_Suitcases,
            //     flight_number,
            //     city_of_departure,
            //     source,
            //     pickup_Date,
            //     pickup_Time,
            //     price,
            //     post_Code,
            //     additional_Comments,
            //     baby_Seats
            // FROM (
            //     SELECT 
            //         b.booking_ID,
            //         b.client_Phones,
            //         b.customer_Name,
            //         b.pickup_Address,
            //         b.destination_Address,
            //         b.airport_terminal,
            //         b.deposit_Ref,
            //         b.car_Type, 
            //         b.passengers,
            //         b.large_Suitcases,
            //         b.small_Suitcases,
            //         b.flight_number,
            //         b.city_of_departure,
            //         b.source,
            //         b.pickup_Date,
            //         b.pickup_Time,
            //         b.price,
            //         b.post_Code,
            //         b.additional_Comments,
            //         b.baby_Seats,
                
            //         ROW_NUMBER() OVER (PARTITION BY b.client_Phones ORDER BY b.booking_ID) AS row_num
            //     FROM
            //         tbl_bookings b
            //     JOIN
            //         (SELECT DISTINCT phone FROM clients) uc 
            //     ON 
            //         b.client_Phones = uc.phone
            // ) AS Bookings
            // WHERE row_num <= 300;


    }
    
    
    
 

}
