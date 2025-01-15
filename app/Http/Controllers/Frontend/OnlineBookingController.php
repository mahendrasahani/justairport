<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingConfirmationMail;
use App\Mail\BookingConfirmationMail;
use App\Models\Backend\Airport;
use App\Models\Backend\PaymentResponseLog;
use App\Models\Backend\BookingLog;
use App\Models\Backend\BookingSlot;
use App\Models\Backend\CarCategory;
use App\Models\Backend\Client;
use App\Models\Backend\Job;
use App\Models\Backend\Postcode;
use App\Models\Backend\PriceDetail;
use App\Models\Backend\Pricing;
use App\Models\Leads; 
use App\Models\TestLog; 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use GuzzleHttp\Client as GuzzleHttpClient;

class OnlineBookingController extends Controller{
    public function carsAvailable(Request $request){
        $form_data = $request->all();
        // return $form_data;
        $airports = Airport::where('status', 1)->get();
        $cars = CarCategory::where('status', 1)
        ->where('passenger_count', '>=', $form_data['passenger_count'])
        ->get();
        $postcodes = Postcode::get();
        $price = Pricing::select('price')
        ->where('postcode', $form_data['location_select'])
        ->where('airports_id', $form_data['airport'])->first();
        
        $airport = Airport::where('id', $form_data['airport'])->first();
        if($form_data['journey_type'] == 'to_airport'){
            $from = $form_data['location_select'];
            $to = $airport->airport_name;
        }else{
            $from = $airport->airport_name;
            $to = $form_data['location_select'];
        }
       $lead = Leads::create([
            "from" => $from,
            "to" => $to,
            "passenger_count" => $form_data['passenger_count'],
            "phone" => $form_data['passenger_phone'],
            "journey_type" => $form_data['journey_type']
        ]);
        return view('frontend.cars_available', compact('airports', 
        'form_data', 'cars', 'price', 'postcodes', 'lead'));
    }

    public function onlineBooking(){
        $airports = Airport::where('status', 1)->get();
        $postcodes = Postcode::get(); 
        return view('frontend.online_booking', compact('airports', 'postcodes'));
    }

    public function confirmBooking(Request $request){
        $form_data = $request->all();
        $car = CarCategory::where('id', $form_data['car_id'])->first();
        $postcodes = Postcode::get(); 
        $airports = Airport::where('status', 1)->get();
        return view('frontend.confirm_booking', compact('airports',
         'form_data', 'postcodes', 'car'));
    }

    public function submitBooking(Request $request){    
        // return $request;
        // try {  
            $lastJobNumber = DB::table('jobs')->max('job_number');  
            $newJobNumber = $lastJobNumber ? $lastJobNumber + 1 : 700000;
            $phone_with_code = $request->country_number.' '.$request->phone_number;
            $parking_charge_value = $request->parking_charge_value;
            $congestion_charge_value = $request->congestion_charge_value;
            $night_charge_value = $request->night_charge_value;
            $booster_seat_charge_value = $request->booster_seat_charge_value;
            $basic_fare = $request->basic_fare;
            $drop_off_charge = 0;
            $booking_made_at = Carbon::now();

            $form_data = [
                'id' => $newJobNumber,
                'journey_type_id' => $request->journey_type == 'to_airport' ? 1 : 2,
                'postcode' => $request->location_select.strtoupper($request->postcode2),
                'address' => $request->address,
                'airport_id' => $request->airport,
                'passenger_count' => $request->passenger_count,
                'checkin_luggage_count' => $request->check_in_luggage,
                'hand_luggage_count' => $request->hand_luggage,
                'job_date' => Carbon::parse($request->pickup_date)->format('Y-m-d'),
                "job_day" => Carbon::parse($request->pickup_date)->format('D'),
                'job_time' => $request->pickup_time_h . ':' . $request->pickup_time_m . ':00',
                'comment' => $request->comments,
                'passenger_name' => $request->name,
                'passenger_phone' => $phone_with_code,
                'job_source' => 'Web',
                'job_status_type_id' => 1,
                'job_number' => $newJobNumber,
                'email_acknowledge_flag' => 1,
                'car_category_id' => $request->car_id,
                'total_price' => $request->car_price,
                'payment_type_id' => $request->payment_method,
                 'booster_seat_count' =>  $request->car_id == 1 ? "0":$request->booster_seat_count,
                'child_age' => $request->car_id == 1 ? "":$request->child_age,
                'email' => $request->email,
                'payment_status' => 0, 
                'entry_after' => 40
            ];

            if ($request->journey_type == 'to_airport') {
                $pick_up_address = $request->location_select;
            } else {
                $pick_up_address = $request->airport;
            } 
            if ($request->payment_method == 1){
                $payment_type = 'Cash';
                $form_data['account_id'] = 2; 
            } else{
                $payment_type = "Credit";
                $form_data['account_id'] = 3;
            }

            switch($request->airport){
                case '1';
                    $drop_off_charge = 5;
                break;

                case '2';
                    $drop_off_charge = 6;
                break;

                case '4';
                    $drop_off_charge = 7;
                break;

                case '3';
                $drop_off_charge = 5;
                break;

                default;
                    $drop_off_charge = 0;
                break; 
            }
            $form_data['drop_off_charge'] = $drop_off_charge; 

            if(Auth::guard('client')->check()){ 
                $form_data['client_id'] = Auth::guard('client')->user()->id;
            }else{
                 
                $check_client_phone = Client::where('phone', 'LIKE', '%'.$request->phone_number.'%')->exists();
                    if($check_client_phone){
                        $client = Client::where('phone', 'LIKE', '%'.$request->phone_number.'%')->first(); 
                        if($client->email == ''){
                            Client::where('id', $client->id)->update([
                                "email" => $request->email
                            ]);
                        }
                    }else{
                        $client = Client::create([
                           'name' => $request->name,
                           'phone' => $phone_with_code, 
                           'phone2' => $phone_with_code, 
                           'email' => $request->email, 
                           'email_verified' => 0,
                        ]);
                    }
                    $form_data['client_id'] = $client->id;
                // $check_client_phone = Client::where('phone', 'LIKE', '%'.$phone_with_code.'%')->exists();
                // $check_client_email = Client::where('email', $request->email)->exists();
                // if(!$check_client_phone && !$check_client_email){
                //     $client = Client::create([
                //         'name' => $request->name,
                //         'phone' => $phone_with_code, 
                //         'email' => $request->email, 
                //         'email_verified' => 0,
                //     ]); 
                // }elseif(!$check_client_phone && $check_client_email){
                //     return "email already exists" ."phone is:- ". $phone_with_code;
                // }elseif($check_client_phone && !$check_client_email){
                //     return "phone already exists";
                // } 
                // $client = Client::where('phone', 'LIKE', '%'.$phone_with_code.'%')
                // ->where('email', $request->email)->first(); 
                // $form_data['client_id'] = $client->id;
            } 
            
            
            $booking_slot = true;
            $new_pickup_date_with_new_format = Carbon::parse($request->pickup_date)->format('Y-m-d');
            $pickup_datetime = Carbon::createFromFormat('Y-m-d H:i', $new_pickup_date_with_new_format . ' ' . $request->pickup_time_h . ':' . $request->pickup_time_m);
            
            // Retrieve all booking slots for the given pickup date
            $book_slot_date = BookingSlot::whereDate('start_date_time', Carbon::parse($request->pickup_date)->format('Y-m-d'))
                                          ->orWhereDate('end_date_time', Carbon::parse($request->pickup_date)->format('Y-m-d'))
                                          ->get();
            
            foreach($book_slot_date as $slot_date){
                $start_time = Carbon::parse($slot_date->start_date_time);
                $end_time = Carbon::parse($slot_date->end_date_time);
            
                // Check if the pickup time overlaps with any booked slot
                if ($pickup_datetime->between($start_time, $end_time)){
                    $booking_slot = false;
                    break; // No need to check further if one slot is already booked
                }
            }
            
            if($booking_slot === true){
                $new_job = Job::create($form_data); 
                $price_detail = PriceDetail::create([
                    "basic_price" => $basic_fare,
                    "congestion_charges" => $congestion_charge_value,
                    "night_charge" => $night_charge_value,
                    "booster_seat_charge" => $booster_seat_charge_value, 
                    "total_price" => $request->car_price, 
                    "net_price" => $request->car_price, 
                    "parking_charges" => $parking_charge_value,
                ]); 
                
                Job::where('id', $new_job->id)->update([
                    'price_detail_id' => $price_detail->id
                ]);

                if($request->journey_type == 'from_airport'){
                    Job::where('id', $new_job->id)->update([
                        "flight_number" => $request->flight_number,
                        // 'airport_pickup_location_id' => 3,
                        "airport_terminal" => $request->airport_terminal,
                        "departure_city" => $request->departure_city, 
                    ]);
                }
                Leads::find($request->lead_id)->delete();
            }else{
                return redirect()->back()->with('slot_not_available', "Slot is not available");
                // return response()->json(['message' => 'Booking slot is not available.'], 422);
            }

            $car_name = CarCategory::where('id', $request->car_id)->first();
            $airport_name = Airport::where('id', $request->airport)->first();
            $booking_data = [
                "pickup_from" => $request->journey_type == 'to_airport' ? $request->location_select : $airport_name->airport_name, 
                "drop_of_at" => $request->journey_type == 'to_airport' ?  $airport_name->airport_name : $request->location_select, 
                "vehicle" => $car_name->name,
                "job_date" => Carbon::parse($request->pickup_date)->format('Y-m-d'),  
                "job_time" => $request->pickup_time_h . ':' . $request->pickup_time_m . ':00',
                "price" => $request->car_price,
                "terminal" => $request->airport_terminal,
                "passenger_name" => $request->name,
                "contact_phone" => $phone_with_code,
                "contact_email" => $request->email,
                "no_of_passenger" => $request->passenger_count,
                "no_of_checkin_luggage" => $request->check_in_luggage,
                "no_of_hand_luggage" => $request->hand_luggage,
                "address" => $request->address,
                "job_number" => $newJobNumber,
                "post_code" => $request->location_select,
                "notes" => $request->comments,
                'baby_seat' => $request->car_id == 1 ? "0":$request->booster_seat_count, 
                "child_age" => $request->car_id == 1 ? "":$request->child_age,
                "payment_method" => $request->payment_method == 1 ? 'Cash':'Credit Card',
                "country_code" => '',
                "drop_location" => $request->journey_type == 'to_airport' ? $airport_name->airport_name : $request->location_select,
                "aditional_info" => $request->comments, 
                "departure_city" => $request->departure_city,
                "flight_number" => $request->flight_number,
                "full_post_code" => $request->location_select.strtoupper($request->postcode2)
            ];
            $admin_booking_confirmation_mail_data = [
                "job_number" => $newJobNumber,
                "service" => $car_name->name,
                "payment_method" => $request->payment_method == 1 ? 'Cash':'Credit Card',
                "passenger_name" => $request->name,
                "contact_phone" => $phone_with_code,
                "pickup_from" => $request->journey_type == 'to_airport' ? $request->address : $airport_name->airport_name, 
                "drop_of_at" => $request->journey_type == 'to_airport' ?  $airport_name->airport_name : $request->address, 
                "price" => $request->car_price, 
                "flight_number" => $request->flight_number,
                "departure_city" => $request->departure_city,
                "no_of_hand_luggage" => $request->hand_luggage,
                "booking_made_at" => $booking_made_at,
                "job_date" => Carbon::parse($request->pickup_date)->format('Y-m-d'),  
                "job_time" => $request->pickup_time_h . ':' . $request->pickup_time_m, 
                "journey_type" => $request->journey_type
                 
            ];

            $messageBody = "From Just Airports: Your job has been booked for ".Carbon::parse($new_job->job_time)->format('H:i')." ".$new_job->job_day." ".Carbon::parse($new_job->job_date)->format('d/m/Y').".
                                Your reference is ".$new_job->job_number.". If there are any issues call 0208 9001666";
                $messages = [
                    [
                        'source' => 'php',
                        'body' => $messageBody,
                        'to' => $phone_with_code,
                        'from' => '+61411111111',
                    ]
                ];
                 $url = 'https://rest.clicksend.com/v3/sms/send';
                    $apiUsername = env('CLICKSEND_USERNAME');
                    $apiPassword = env('CLICKSEND_PASSWORD'); 
                    $client = new GuzzleHttpClient();
                    $response = $client->post($url, [
                        'auth' => [$apiUsername, $apiPassword],
                        'headers' => [
                            'Content-Type' => 'application/json',
                        ],
                        'json' => [
                            'messages' => $messages
                        ],
                    ]); 
                    $admin_booking_confirmation_mail_data['admin_mail_subject'] = 'Justairports - Booking Confirmation Job: '.$newJobNumber;
            if($request->payment_method == 1){
                $booking_data['heading'] = 'Online Cash Booking';
               
                Mail::to($request->email)->send(new BookingConfirmationMail($booking_data, 'Online Cash Booking'));
                // Mail::to($request->email)->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
                
                Mail::to(env('MAIL_ADMIN'))->send(new BookingConfirmationMail($booking_data, 'Online Cash Booking'));
                // Mail::to(env('MAIL_ADMIN'))->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
                return redirect()->route('frontend.home')->with('booking_confirmed', 'Your booking has been confirmd');
            }else{
                $booking_data['heading'] = 'Credit Card Booking';
                $booking_data['payment_link'] = route('frontend.direct_pay', [$newJobNumber]);
                Mail::to($request->email)->send(new BookingConfirmationMail($booking_data, 'Credit Card Booking'));
                // Mail::to($request->email)->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
                
                Mail::to(env('MAIL_ADMIN'))->send(new BookingConfirmationMail($booking_data, 'Credit Card Booking'));
                // Mail::to(env('MAIL_ADMIN'))->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
                $agent = new Agent();
                $agent->setUserAgent($request->header('User-Agent')); 
                $ipAddress = $request->ip();
                $browser = $agent->browser();
                $browserVersion = $agent->version($browser);
                $platform = $agent->platform();
                $platformVersion = $agent->version($platform);
                
                //store Booking logs
                BookingLog::create([
                    "ip" => $ipAddress,
                    "browser" => $browser,
                    "os" => $platform,
                    "booking_id" => $newJobNumber,
                ]);
 
                // if booking is with credit card (start)---------------------------------------------------------------------------
                $merchantid = "justairportchauffeur";
                $secret = "F1bOaxQhZk";
                $timestamp = strftime("%Y%m%d%H%M%S");
                mt_srand((double) microtime() * 1000000);
                $orderid = $new_job->job_number;
                $curr = "GBP";
                $amount = $request->car_price * 100;
                $tmp = "$timestamp.$merchantid.$orderid.$amount.$curr";
                $md5hash = md5($tmp);
                $tmp = "$md5hash.$secret";
                $md5hash = md5($tmp);
                if ($request->email != ''){
                    $billing_data['HPP_CUSTOMER_EMAIL'] = $request->email;
                } else {
                    $billing_data['HPP_CUSTOMER_EMAIL'] = '';
                }
                if ($request->phone_number != '') {
                    $billing_data['HPP_CUSTOMER_PHONENUMBER_MOBILE'] = $request->phone_number;
                } else {
                    $billing_data['HPP_CUSTOMER_PHONENUMBER_MOBILE'] = '44|2089001666';
                }
                if ($request->address != '') {
                    $billing_data['HPP_BILLING_STREET1'] = $request->address;
                } else {
                    $billing_data['HPP_BILLING_STREET1'] = '1378, Uxbridge Road';
                }
                if ($pick_up_address != '') {
                    $billing_data['HPP_BILLING_STREET2'] = $pick_up_address;
                } else {
                    $billing_data['HPP_BILLING_STREET2'] = 'Hillington, Middlesex';
                }
                $billing_data['HPP_BILLING_STREET3'] = "UB10 0NQ";
                if ($request->city_of_departure != '') {
                    $billing_data['HPP_BILLING_CITY'] = $request->city_of_departure;
                } else {
                    $billing_data['HPP_BILLING_CITY'] = "London";
                }
                if ($request->location_select != '') {
                    $billing_data['HPP_BILLING_POSTALCODE'] = $request->location_select;
                } else {
                    $billing_data['HPP_BILLING_POSTALCODE'] = '2AA';
                }
                if ($request->billing_country != '') {
                    $billing_data['HPP_BILLING_COUNTRY'] = 840;
                } else {
                    $billing_data['HPP_BILLING_COUNTRY'] = 840;
                }
                $billing_data['payment_type'] = $payment_type;
                $billing_data['merchantid'] = $merchantid;
                $billing_data['timestamp'] = $timestamp;
                $billing_data['orderid'] = $orderid;
                $billing_data['curr'] = $curr;
                $billing_data['amount'] = $amount;
                $billing_data['md5hash'] = $md5hash;
                $billing_data['status'] = true;
                $error['error'] = 'No';
                $encoded_billing_data = urlencode(json_encode($billing_data));
                // return $encoded_billing_data;
                // return redirect()->route('frontend.direct_pay', [$new_job->job_number, $encoded_billing_data]);
                // return redirect('https://www.test.justairports.com/direct-pay/'.$new_job->job_number); //new to live
                return redirect()->route('frontend.direct_pay', [$new_job->job_number]);
                // if booking is with credit card (end)---------------------------------------------------------------------------
            }

        // }catch (\Exception $e){
        //     return response()->json([
        //         "status" => "something_went_wrong",
        //         "message" => $e->getMessage()
        //     ], 400);
        // }
    }

    public function directPay($ref_id){
        $merchantid = "justairportchauffeur";
        $secret = "F1bOaxQhZk";
        $getoid = '';
        $getcname = '';
        $getcemail = '';
        $gettotal_amt = '';
        $get_mob = '';
        $get_address = '';
        $get_zipcode = '';
        $timestamp = strftime("%Y%m%d%H%M%S");
        $curr = "GBP"; 
        if (!empty(trim($ref_id))) {
            try{ 
            $bid = trim($ref_id);
                $new_order_id = substr($bid, 0, 7); 
                $applied_booking = Job::with('getClient:id,email,phone,address')->where('job_number', $new_order_id)->first(); 
                if($applied_booking == NULL){
                    $new_order_id = substr($bid, 0, 6); 
                    $applied_booking = Job::with('getClient:id,email,phone,address')->where('job_number', $new_order_id)->first(); 
                }
                $orderid=$bid;
                $amount = $applied_booking->total_price * 100;
                $total_amount = $applied_booking->total_price;
                $tmp = "$timestamp.$merchantid.$orderid.$amount.$curr";
                $md5hash = md5($tmp); 
                $tmp = "$md5hash.$secret"; 
                $md5hash = md5($tmp);
                if ($applied_booking){
                    $row = $applied_booking;
                    $getoid = $orderid;
                    $getcname = $applied_booking->passenger_name;
                    $getcemail = $applied_booking->getClient->email;
                    $gettotal_amt = $amount;
                    $get_mob = $applied_booking->getClient->phone;
                    $get_address = $applied_booking->getClient->address;
                    $timestamp = strftime("%Y%m%d%H%M%S"); 
                    // $get_zipcode = $applied_booking->getClient->postal_code;
                }
            }catch(\Exception $e){
                return 'Something went wrong.';
            }
        }
        return view('frontend.direct_pay', compact('row', 'getoid', 'getcname', 'getcemail', 'gettotal_amt',
         'get_mob', 'get_mob', 'get_address', 'timestamp', 'md5hash', 'total_amount'));
    }

    public function getUpdatedCar(Request $request){
        try {
            $congestion_charge = 0;
            $night_charge = 0;
            $parking_charge = 0;
            $journey_type = $request->journey_type;
            $payment_method = $request->payment_method;
            $passenger_count = $request->passenger_count;
            $old_passenger_count = $request->old_passenger_count;
            $check_in_luggage = $request->check_in_luggage;
            $hand_luggage = $request->hand_luggage;
            $postcode = $request->postcode;
            $airport_id = $request->airport_id;
            $booster_seat = intval($request->booster_seat);
            $booster_seat_price = 5;
            $booster_seat_cost = intval($booster_seat) * 5;
            $car_id = $request->car_id;
            $pickup_day = $request->pickup_day;
            $pickup_time = $request->pickup_time;
            $pickup_day = $request->pickup_day;
            $pickup_time = $request->pickup_time;
            $postcode1 = $request->postcode1;
            $minutes = $request->minutes;
            $only_date = $request->only_date;
            $only_month = $request->only_month;
           
            $total_value = $hand_luggage+($check_in_luggage*2);

            $cars = CarCategory::where('status', 1)
                ->where('passenger_count', '>=', $passenger_count)
                ->where('total_value', '>=', $total_value);
                // ->where('checkin_luggage', '>=', $check_in_luggage)
                // ->where('hand_luggage', '>=', $hand_luggage)
 
            if ($booster_seat > 0) {
                $cars = $cars->whereNotIn('id', [1,3]);
            }
            if ($car_id != '') {
                $cars = $cars->where('id', '>=', $car_id);
            }
            $cars = $cars->orderByRaw('CAST(total_value AS DECIMAL) ASC')->first(); 
           
            // if($booster_seat > 0){
            //     $cars = CarCategory::where('status', 1)
            //     ->where('id', '!=', 1)
            //     ->where('passenger_count', '>=', $passenger_count)
            //     ->where('large_luggage_count', '>=', $check_in_luggage)
            //     ->where('small_luggage_count', '>=', $hand_luggage)
            //     ->where('id', '>=', $car_id)->first(); 
            // }else{
            //     $cars = CarCategory::where('status', 1) 
            // ->where('passenger_count', '>=', $passenger_count)
            // ->where('large_luggage_count', '>=', $check_in_luggage)
            // ->where('small_luggage_count', '>=', $hand_luggage)
            // ->where('id', '>=', $car_id)->first(); 
            // }

            $price = Pricing::select('price')
                ->where('postcode', $postcode)
                ->where('airports_id', $airport_id)->first();

            if ($cars->name == 'Estate') {
                $final_price = $price->price + 5;
            } else if ($cars->name == 'MPV') {
                $final_price = $price->price + 17;
            } else if ($cars->name == 'Executive') {
                $final_price = $price->price + 17;
            } else if ($cars->name == 'MPV 7' && $postcode != 'T1') {
                $final_price = $price->price + 29;
            } else if ($cars->name == 'MPV 8' && $postcode != 'T1') {
                $final_price = $price->price + 36;
            } else {
                $final_price = $price->price;
            }

            // if ($journey_type == "from_airport" && $payment_method == '2') {
            //     $value_addition = DB::table('value_addition')->where('id', 2)->where('status', 1)->first();
            //     if ($value_addition) {
            //         $total_final_price = $final_price + intval($value_addition->amount_inc);
            //         // $congestion_charge = $value_addition->amount_inc;
            //     } else {
            //         $total_final_price = $final_price + 0;
            //     }
            // } else {
            //     $total_final_price = $final_price;
            //     // $congestion_charge = 0;
            // }
            
            if($only_month == 12){
                $holidays = [24, 25, 26, 31];
                if(in_array($only_date, $holidays)){
                    if(($only_date == 24 || $only_date == 31) && ($pickup_time >= 12 && $pickup_time <= 23) ){
                        $final_price = $final_price + ($final_price/2);
                    }elseif($only_date == 25 || $only_date == 26){
                        $final_price = $final_price + ($final_price/2); 
                    }
                }
            }else if($only_month == 1){
                if($only_date == 1){
                    $final_price = $final_price + ($final_price/2); 
                }
            } 
           
           if($airport_id != 1){
               
            if($pickup_time != '' && ($pickup_time >= 22 || $pickup_time <= 01) && $minutes <= 55){
                $night_charge = 20;
            }
           }

            
            if($postcode1 == "EC1" || $postcode1 == "EC2" || $postcode1 == "EC3" || $postcode1 == "EC4" || 
            $postcode1 == "SE1" || $postcode1 == "SW1" || $postcode1 == "W1" || $postcode1 == "WC1" || $postcode1 == "WC2"){
                      // -----------------------------old
            // if($pickup_day != '' && $pickup_time != ''){
            //     if(($pickup_day == 'Monday' || $pickup_day == 'Tuesday' || $pickup_day == 'Wednesday' || $pickup_day == 'Thursday' || $pickup_day == 'Friday') &&
            //     ($pickup_time >= 07 && $pickup_time <= 18)){
            //         $congestion_charge = 15;
            //     }
            //     if(($pickup_day == 'Saturday' || $pickup_day == 'Sunday') &&
            //     ($pickup_time >= 12 && $pickup_time <= 18)){
            //         $congestion_charge = 15;
            //     }
            // }
            // -----------------------------old
            
            // -----------------------------new
             if($only_month == 12 && ($only_date == 25 || $only_date == 26 || $only_date == 27 || $only_date == 28 || $only_date == 29 || $only_date == 30 || $only_date == 31)){
                $congestion_charge = 0;
            }elseif($only_month == 1 && $only_date == 1){
                $congestion_charge = 0;
            }else{
                if($pickup_day != '' && $pickup_time != ''){
                    if(($pickup_day == 'Monday' || $pickup_day == 'Tuesday' || $pickup_day == 'Wednesday' || $pickup_day == 'Thursday' || $pickup_day == 'Friday') &&
                    ($pickup_time >= 07 && $pickup_time <= 18)){
                        $congestion_charge = 15;    
                    }
                    if(($pickup_day == 'Saturday' || $pickup_day == 'Sunday') &&
                    ($pickup_time >= 12 && $pickup_time <= 18)){
                        $congestion_charge = 15;
                    }
                }
            }
              // -----------------------------new
            

        }
 
            if($journey_type == 'from_airport' && $payment_method == 2){
                $parking_charge = 18;
            }
 
            return response()->json([
                "status" => "success",
                "data" => $cars,
                "total_fare" => intval($final_price) + $booster_seat_cost + $congestion_charge + $night_charge + $parking_charge,
                "journey_type" => $journey_type,
                "basic_fare" => intval($final_price),
                "payment_method" => $payment_method,
                "booster_seat_charge" => $booster_seat_cost,
                "booster_seat" => $booster_seat,
                "congestion_charge" => $congestion_charge,
                "night_charge" => $night_charge,
                "parking_charge" => $parking_charge
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function getUpdatedCarAvailable(Request $request){
        try {
            $passenger_count = $request->passenger_count;
            $journey_type = $request->journey_type;
            $postcode = $request->postcode;
            $airport_id = $request->airport_id;
            // $check_in_luggage = $request->check_in_luggage;
            // $hand_luggage = $request->hand_luggage;
            // $booster_seat_count = $request->booster_seat_count;

            $cars = CarCategory::where('status', 1)->where('passenger_count', '>=', $passenger_count);
            // if($booster_seat_count > 0){
            //     $cars = $cars->where('id', '!=', 1);
            // }
            $cars = $cars->get();
            $price = Pricing::select('price')->where('postcode', $postcode)->where('airports_id', $airport_id)->first();
            return response()->json([
                "status" => "success",
                "cars" => $cars,
                "price" => intval($price->price)
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }


    }

    public function checkSlotAvailable(Request $request){
        try{
            $pickup_date = $request->pickup_date; 
            $hours = $request->hours;
            $minutes = $request->minutes;
            $formated_date = Carbon::parse($pickup_date)->format('Y-m-d');
            $pickup_datetime = Carbon::createFromFormat('Y-m-d H:i', $formated_date . ' ' . $hours . ':' . $minutes);

            $book_slot_date = BookingSlot::whereDate('start_date_time', $formated_date)
                                          ->orWhereDate('end_date_time', $formated_date)
                                          ->get(); 

            if(count($book_slot_date) > 0){ 
            foreach($book_slot_date as $slot_date){
                $start_time = Carbon::parse($slot_date->start_date_time);
                $end_time = Carbon::parse($slot_date->end_date_time); 
                if ($pickup_datetime->between($start_time, $end_time)) {
                     return response()->json([
                        "status" => "success",
                        "message" => "slot_not_available"
                     ]);
                }else{
                    return response()->json([
                        "status" => "success",
                        "message" => "slot_available"
                     ]);
                }
            } 
        }else{
            return response()->json([
                "status" => "success",
                "message" => "slot_available"
             ]);
        }

        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ]);
        }
    } 
    
    // this function is not using anywhere (all calculation are in submitBooking and direct pay function)
    public function regDirectpay(Request $request){
        $merchantid = "justairportchauffeur";
        $secret = "F1bOaxQhZk";
        $timestamp = strftime("%Y%m%d%H%M%S");
        mt_srand((double) microtime() * 1000000);
        $orderid    = $request->reg_booking_id;
        $curr       = "GBP";
        $amount     = $request->reg_amount;
        $r_amount   = $request->reg_amount;
        $tmp        = "$timestamp.$merchantid.$orderid.$amount.$curr";
        $md5hash = md5($tmp);
        $tmp = "$md5hash.$secret";
        $md5hash = md5($tmp); 
        // $resbookdata ="SELECT booking_id,send_remider FROM  tblBookingResLog WHERE booking_id='$orderid'";	
    	// $resbookdataresult =mysqli_query($conn,$resbookdata);
        // $rowdata = mysqli_fetch_array($resbookdataresult,MYSQLI_ASSOC);
        // if($rowdata){
        //   $send_remider = $rowdata['send_remider']+1;
        //     mysqli_query($conn, "UPDATE tblBookingResLog SET send_remider='$send_remider' WHERE booking_id='$orderid'");
        // }else{
        //     mysqli_query($conn, "INSERT INTO tblBookingResLog (booking_id, send_remider) VALUES ('$orderid', '1')");
        // } 
        // $sqlquery="SELECT client_Email,client_Phones,pickup_Address,address,additional_Comments,city_of_departure,post_Code,billing_country	FROM  tbl_bookings WHERE booking_ID='$orderid'";	
    	// $result =mysqli_query($conn,$sqlquery);
        // $row    = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $name              = trim($request->reg_p_name);
    	$regmob            = trim($$request->reg_p_mob); 
        $cemail            = trim($$request->reg_p_email); 
        $regaddress        = trim($$request->reg_p_address); 
        $regzipcode        = trim($$request->reg_zipcode);   
    }
    
    // Functions are to capture response after payment and redirect on success and failded page accourding to payment status (start)
        public function paymentResponse(Request $request){
            $data = $request->all(); 
            $name = $data['passenger_name'] ?? '';
            $email = $data['hpp_customer_email'] ?? '';
            $phone = $data['passenger_phone'] ?? '';
            $address = $data['passenger_address'] ?? '';
            $post_code = $data['hpp_billing_postalcode'] ?? '';
            $order_id = $data['ORDER_ID'] ?? '';
            $amount = $data['AMOUNT']/100;
            $result = $data['RESULT'] ?? null;
            $message = $data['MESSAGE'] ?? null;  
            PaymentResponseLog::create([
                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone,
                    "address" => $address,
                    "post_code" => $post_code,
                    "order_id" => $order_id,
                    "amount" => $amount,
                    "payment_status" => 1
     		]);
            if($result == "00"){
                Job::where('job_number', $order_id)->update([
                    'payment_status' => 1
                ]);
           	    return view('frontend.payment_success');
            }else{
                return view('frontend.payment_failed');
            }
        }
    
        public function paymentSuccess(Request $request){  
    		return view('frontend.payment_success'); 
        }
        public function paymentFailed(Request $request){
    		return view('frontend.payment_failed'); 
        }
    // Functions are to capture response after payment and redirect on success and failded page accourding to payment status (end)
    
    
    // Functions are to manually direct payment  (start)
            // call direct payment manual page
        public function directPayManual(){ 
          	return view('frontend.direct_pay_manual');
        }
        
        public function apiDirectPayManualChkBkng(Request $request){ 
            try{
              
              $bookingId = trim($request->bookingId);
                if(!empty($bookingId)){
                    $job = Job::where('job_number', $bookingId)->first();
                    if($job){
                        return response()->json([
                            "status" => "success",
                            "data" => $job
                            ], 200);
                    }else{
                        return response()->json([
                            "status" => "no_data_found",
                        ], 200);
                    }
                }
            }catch(\Exception $e){
                return response()->json([
                    "status" => "failed",
                    "error" => $e->getMessage()
                ], 200);
            }
        }
    
    
    
        public function setFormDataApiDirectPayManual(Request $request){
             try{
                $merchantid = "justairportchauffeur";
                $secret = "F1bOaxQhZk";
                $timestamp = strftime("%Y%m%d%H%M%S");
                mt_srand((double) microtime() * 1000000);
                $orderid = $request->booking_id;
                $curr = "GBP";
                $amount = $request->total_amount * 100;
                $tmp = "$timestamp.$merchantid.$orderid.$amount.$curr";
                $md5hash = md5($tmp);
                $tmp = "$md5hash.$secret";
                $md5hash = md5($tmp);
                $data = [];
                
                $passenger_email = $request->passenger_email;
                $passenger_phone = $request->passenger_phone;
                $passenger_address = $request->passenger_address;
                $passenger_zipcode = $request->passenger_zipcode;
                
                $data['HPP_CUSTOMER_EMAIL']  = $passenger_email;
                $data['HPP_CUSTOMER_PHONENUMBER_MOBILE']  = '44|2089001666';
                $data['HPP_BILLING_STREET1']  = '1378, Uxbridge Road'; 
                $data['HPP_BILLING_STREET2']  = 'Hillington, Middlesex';  
                $data['HPP_BILLING_STREET3']  = "UB10 0NQ"; 
                $data['HPP_BILLING_CITY']  = "London"; 
                $data['HPP_BILLING_POSTALCODE']  = '2AA';
                $data['HPP_BILLING_COUNTRY']  = 840;
                
                $data['merchantid']  = $merchantid;
 		        $data['timestamp']   = $timestamp;
 		        $data['orderid']     = $orderid;
 		        $data['curr']        = $curr;
 		        $data['amount']      = $amount;
 		        $data['md5hash']     = $md5hash;
 		        $data['status']      = true;
 		        $error['error']      = 'No';
 		        //   $_SESSION['direct_order_id'] = $orderid;
 		        //   $_SESSION['direct_email_id'] = $cemail;
 		     
     		 //   PaymentResponseLog::create([
        //             "name" => $request->passenger_name,
        //             "email" => $request->passenger_email,
        //             "phone" => $request->passenger_phone,
        //             "address" => $request->passenger_address,
        //             "post_code" => $request->passenger_zipcode,
        //             "order_id" => $request->booking_id,
        //             "amount" => $request->total_amount,
     		 //   ]);
 		     
                return response()->json([
                    "status" => "success" ,
                    "data" => $data
                ]);
             }catch(\Exception $e){
                return response()->json([
                    "status" => "failed",
                    "error" => $e->getMessage()
                ], 400);
             }
        }
        
        // new to test manual direct payment
        public function paymentConfirmation(){
           	return view('frontend.payment_confirmation');
        }
    // Functions are to manually direct payment  (start)
    
    
}
