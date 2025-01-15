<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingConfirmationMail;
use App\Mail\ReminderMail;
use App\Models\Backend\Account;
use App\Models\Backend\Airport;
use App\Models\Backend\AirportPickupLocation;
use App\Models\Backend\CarCategory;
use App\Models\Backend\Client;
use App\Models\Backend\ClientHistory;
use App\Models\Backend\Driver;
use App\Models\Backend\Job;
use App\Models\Backend\JobStatusType;
use App\Models\Backend\PriceDetail;
use App\Models\Backend\Pricing;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\BookingConfirmationMail;
use Hash;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Routing\Matcher\ExpressionLanguageProvider;
use GuzzleHttp\Client as GuzzleHttpClient;
use Http;
use App\Models\Backend\JobHistory;
use Yajra\DataTables\Facades\DataTables;

class JobController extends Controller{
    public function controlJob(){
        $current_date = Carbon::now();
        // $jobs = Job::with(['getAccount', 'getCarCategory', 'getDriver', 'getAirportPickupLocation'])
        // ->orderBy('job_date', 'asc')->whereDate('job_date', $current_date)->orderBy('job_time', 'asc')->get();
        $jobs = Job::with(['getAccount', 'getCarCategory', 'getDriver', 'getAirportPickupLocation'])
        ->orderBy('job_date', 'asc')->whereIn('job_status_type_id', [1, 2])->orderBy('job_time', 'asc')->get();
        // $drivers = Driver::get();
        $drivers = DB::table('drivers')->where('status', 1)->orderByRaw('RIGHT(call_Sign, 2) ASC')->get();
        // return $jobs;
        return view('backend.jobs.control_jobs', compact('jobs', 'drivers'));
    }

    public function assignDriver(Request $request){
        $job_number = $request->job_number;
        $driver_id = $request->driver_id;
        $modal_job_id = $request->modal_job_id; 
        if($driver_id == ''){ 
            return redirect()->back()->with('select_driver', 'Please Select a Driver');
        }else{
            $job = Job::with(['getAirport', 'getAirportPickupLocation', 'getCarCategory', 'getAccount'])->where('id', $modal_job_id)->first();    
            $driver = Driver::where('id', $driver_id)->first();
        if($job->journey_type_id == 1){
            $pickup =  $job->address;
            $dropoff = $job->getAirport->airport_name;
        }else{
            $pickup = $job->getAirport->airport_name;
            $dropoff =  $job->address;
        }

        $total_price = $job->total_price;
        $befor = $total_price * $driver->sharing_perc_before/100;
        $after = $total_price * $driver->sharing_perc_after/100;

        // if($driver_id == ''){
        //     if($job->allocated_by != null){
        //         Job::where('id', $modal_job_id)->update([
        //             "driver_id" => NULL,
        //             "amended_by" => Auth::user()->id,
        //             "job_status_type_id" => 1, 
        //         ]);
        //     }else{
        //         Job::where('id', $modal_job_id)->update([
        //             "driver_id" => NULL, 
        //             "job_status_type_id" => 1
        //         ]);
        //     }
        // }else{
            if($job->assigned_by != null){ 
                return redirect()->back()->with('already_assigned', 'Driver Already Assigned');
            }
            else{
                Job::where('id', $modal_job_id)->update([
                    "driver_id" => $driver_id,
                    "assigned_by" => Auth::user()->id,
                    "job_status_type_id" => 2,
                    "company_share" => $befor,
                    "driver_share" => $after
                ]);
            }  
            //send sms to driver start  
            $messageBody = $job_number." ".$job->passenger_name." ".$job->passenger_phone." ".($job->airport_terminal ?? '')." ".
                            $pickup." DROP ".$dropoff." Note:-".$job->flight_number.
                            " HANDLUGGAGE:".$job->hand_luggage_count." PAX/".$job->passenger_count." LUG/".$job->checkin_luggage_count." ".
                            Carbon::parse($job->job_date)->format('d/m/Y')." ".Carbon::parse($job->job_time)->format('H:i')." ".
                            $job->getCarCategory->short_name." ACC".$job->getAccount->account_number; 
            $messages = [
                [
                    'source' => 'php',
                    'body' => $messageBody,
                    'to' => $driver->phone,
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
                return redirect()->back()->with('assign_success', 'Driver Assigned Successfully');

            // send sms to driver end 
        // } 
    }
    }

    public function allocateControlJob(Request $request){
        $driver_id = $request->driver_id;
        $job_id = $request->job_id;
        $job = Job::where('id', $job_id)->where('driver_id', $driver_id)->update([
            'job_status_type_id' => 3,
            "allocated_by" => Auth::user()->id
        ]);
        if($job > 0){ 
            //send sms to driver start 
            $driver = Driver::where('id', $driver_id)->first();
            $jobresult = Job::with(['getAirport', 'getAirportPickupLocation', 'getCarCategory', 'getAccount'])->where('id', $job_id)->first();
            if($jobresult->journey_type_id == 1){
                $pickup =  $jobresult->address;
                $dropoff = $jobresult->getAirport->airport_name;
            }else{
                $pickup = $jobresult->getAirport->airport_name;
                $dropoff =  $jobresult->address;
            }
            $messageBody = $jobresult->job_number." ".$jobresult->passenger_name." ".$jobresult->passenger_phone." ".($jobresult->airport_terminal ?? '')." ".
                            $pickup." DROP ".$dropoff." Note:-".$jobresult->flight_number.
                            " HANDLUGGAGE:".$jobresult->hand_luggage_count." PAX/".$jobresult->passenger_count." LUG/".$jobresult->checkin_luggage_count." ".
                            Carbon::parse($jobresult->job_date)->format('d/m/Y')." ".Carbon::parse($jobresult->job_time)->format('H:i')." ".
                            $jobresult->getCarCategory->short_name." ACC".$jobresult->getAccount->account_number; 
                $messages = [
                    [
                        'source' => 'php',
                        'body' => $messageBody,
                        'to' => $driver->phone,
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

            // send sms to driver end 
            return response()->json([
                "status" => "success",
                "job" => $job, 
            ], 200);
        }
       
    }

    public function unAllocateJob(Request $request){ 
        $driver_id = $request->driver_id;
        $job_id = $request->job_id; 
        $job = Job::where('id', $job_id)->where('driver_id', $driver_id)->update([
            'job_status_type_id' => 2,
            "amended_by" => Auth::user()->id
        ]);
        if($job > 0){ 
            //send sms to driver start 
            $driver = Driver::where('id', $driver_id)->first();
            $jobresult = Job::with(['getAirport', 'getAirportPickupLocation', 'getCarCategory', 'getAccount'])->where('id', $job_id)->first();
            if($jobresult->journey_type_id == 1){
                $pickup =  $jobresult->address;
                $dropoff = $jobresult->getAirport->airport_name;
            }else{
                $pickup = $jobresult->getAirport->airport_name;
                $dropoff =  $jobresult->address;
            }
            $messageBody = "Job UnAllocated:- " .$jobresult->job_number." ".$jobresult->passenger_name." ".$jobresult->passenger_phone." ".($jobresult->airport_terminal ?? '')." ".
                            $pickup." DROP ".$dropoff." Note:-".$jobresult->flight_number.
                            " HANDLUGGAGE:".$jobresult->hand_luggage_count." PAX/".$jobresult->passenger_count." LUG/".$jobresult->checkin_luggage_count." ".
                            Carbon::parse($jobresult->job_date)->format('d/m/Y')." ".Carbon::parse($jobresult->job_time)->format('H:i')." ".
                            $jobresult->getCarCategory->short_name." ACC".$jobresult->getAccount->account_number; 
                $messages = [
                    [
                        'source' => 'php',
                        'body' => $messageBody,
                        'to' => $driver->phone,
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

            // send sms to driver end 
            return redirect()->back();
        }
       
    }

    public function unassignControlJob(Request $request){
        $job_id = $request->job_id;
        $job = Job::where('id', $job_id)->update([
            "job_status_type_id" => 1,
            "driver_id" => NULL,
            "amended_by" => Auth::user()->id,
            "assigned_by" => NULL,
        ]);
        return response()->json([
            "status" => "success",
            "job" => $job, 
        ], 200);
    }

    public function changeDriver(Request $request){
        $job_number = $request->job_number;
        $driver_id = $request->driver;
        $modal_job_id = $request->modal_job_id;
        Job::where('id', $modal_job_id)->update([
            "driver_id" => $driver_id, 
        ]);
        return redirect()->back();
    }

    public function getDriverDetail(Request $request){
        try{
        $id = $request->id;
        $driver = Driver::with('getDriverStatus', 'getCarForDriver')->where('id', $id)->first(); 
        return response()->json([
            "message" => "success",
            "data" => $driver
        ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "error",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function newJobStore(Request $request){      
        // return $request->all();
        // try{
        
        $lastJobNumber = DB::table('jobs')->max('job_number');  
        $newJobNumber = $lastJobNumber ? $lastJobNumber + 1 : 700000;  
        $account_number = $request->account_number;
        $account_record = Account::where('account_number', $account_number)->first(); 
        $car_category_name = $request->car_category_name;
        $car_category_id = CarCategory::where('short_name', $car_category_name)->first(); 
        $job_date = Carbon::createFromFormat('d/m/Y', $request->job_date)->format('Y-m-d');
        $job_day = $request->job_day;
        $job_time = $request->job_time;
        $client_id = $request->client_id;
        $ref = $request->ref;
        $ref2 = $request->ref2;
        $passenger_name = $request->passenger_name ?? $request->contact_name;
        $passenger_count = $request->passenger_count;
        $passenger_phone = $request->passenger_phone;
        $checkin_luggage_count = $request->checkin_luggage_count;
        $hand_luggage_count = $request->hand_luggage_count;
        $email_acknowledge_flag = $request->email_acknowledge_flag; 
        $topi_job = $request->topi_job;
        $drop_off_charge = 0;
        $parking_charge = $request->parking_charge;

        $pickup = strtoupper($request->pickup);
        $pickup_detail = $request->pickup_detail;
        $drop = $request->drop;
        $drop_detail = $request->drop_detail;

        $booking_made_at = Carbon::now();


        if($pickup == "LHR" || $pickup == "LGW" || $pickup == "LTN" || $pickup == "STN" || $pickup == "LCY" || $pickup == "SEN"){
            $journey_type_id = 2; 
            $airport_row = Airport::where('display_name', $pickup)->first();
            $airport_id = $airport_row->id;
            $postcode = $drop;
            $full_address = $drop_detail;
            $journey_type = "from_airport";
        }else{
            $journey_type_id = 1;
            $airport_row = Airport::where('display_name', $drop)->first();
            $airport_id =  $airport_row->id;
            $postcode = $pickup;
            $full_address = $pickup_detail; 
            $journey_type = "to_airport";
        }
        $notes = $request->notes;

            switch($airport_row->display_name){
                case 'LHR';
                    $drop_off_charge = 5;
                break;

                case 'LGW';
                    $drop_off_charge = 6;
                break;

                case 'STN';
                    $drop_off_charge = 7;
                break;

                case 'LTN';
                $drop_off_charge = 5;
                break;

                default;
                    $drop_off_charge = 0;
                break; 
            }

            // if($journey_type_id == '2' && $account_number == 997){
            //     $parking_charge = 18;
            // } 
            //$airport_pickup_location_id = $request->terminal_hidden;  
        $airport_terminal = $request->airport_terminal; 
        if($airport_terminal != ''){
            $airport_terminal_record = AirportPickupLocation::where('id', $airport_terminal)->first();
        }
        $flight_number = $request->flight_number;
        $departure_city = $request->departure_city;
        $car_park = $request->car_park;
        $additional_seat = $request->additional_seat;
        $comment = $request->comment;   
        $basic_price = $request->basic_fare;
        $congestion_charge = $request->congestion_charge; 
        $night_charge = $request->night_charge;
        $booster_seat_charge = $request->booster_seat_charge;
        $additional_charge = $request->additional_charge;
        $discount = $request->discount;   
        $total_price = $request->total_price;
        $net_price = $request->net_price;
        $net_total_price = $request->net_price;    
        $child_age = explode(',', $request->child_age);
             
        $client = Client::where('phone', 'LIKE', '%'.$request->telphone_number.'%')->first();
        
        if($client){
            if($client->email == '' && $request->email_address != ''){
              Client::where('phone', 'LIKE', '%'.$request->telphone_number.'%')->update([
                    "email" => $request->email_address
                ]);
            }
            $client_email = $request->email_address;
            $client_name = $client->name;
            $client_phone = $client->phone;
        }else{
            $client = Client::create([
                "phone" => $request->telphone_number,
                "phone2" => $request->passenger_phone ?? $request->telphone_number,
                "name" => $request->contact_name,
                "email" => $request->email_address,
                "account_id" => $request->account_id,
                'phone_verified' => 0,
                'email_verified' => 0, 
            ]);
            $client_email = $client->email;
            $client_name = $client->name;
            $client_phone = $client->phone;
        }

        //--------------------------------------------------------------
            // if($client_id != ''){
            //     $check_client = Client::where('id', $client_id)->first(); 
            //     if($check_client == '' ){ 
            //     $client = Client::create([
            //         "phone" => $request->telphone_number,
            //         "phone2" => $request->passenger_phone ?? $request->telphone_number,
            //         "name" => $request->contact_name,
            //         "email" => $request->email_address,
            //         "account_id" => $request->account_id,
            //         'phone_verified' => 0,
            //         'email_verified' => 0, 
            //     ]);
            //     $client_email = $client->email;
            //     $client_name = $client->name;
            //     $client_phone = $client->phone;
            //    }else{
            //     $client = Client::where('id', $client_id)->first();
            //     $client_email = $client->email;
            //     $client_name = $client->name;
            //     $client_phone = $client->phone;
            //    }
            // }else{
            //     $client = Client::create([
            //         "phone" => $request->telphone_number,
            //         "phone2" => $request->passenger_phone ?? $request->telphone_number,
            //         "name" => $request->contact_name,
            //         "email" => $request->email_address,
            //         "account_id" => $request->account_id,
            //         'phone_verified' => 0,
            //         'email_verified' => 0, 
            //     ]); 
            //     $client_email = $client->email;
            //     $client_name = $client->name;
            //     $client_phone = $client->phone;
            // }
        //-------------------------------------------------

        $price_detail = PriceDetail::create([
            "basic_price" => $basic_price,
            "congestion_charges" => $congestion_charge,
            "night_charge" => $night_charge,
            "booster_seat_charge" => $booster_seat_charge,
            "waiting_charge" => $additional_charge,
            "adjustment" => $discount,
            "total_price" => $total_price,
            "net_price" => $net_total_price,
            "parking_charges" => $parking_charge,
        ]);

        $new_job = Job::create([
            "id" => $newJobNumber,
            "account_id" => $account_record->id,
            "car_category_id" => $car_category_id->id,
            "job_date" => $job_date,
            "job_day" => $job_day,
            "job_time" => $job_time,
            "client_id" => $client->id,
            "ref" => $ref,
            "ref2" => $ref2,
            "passenger_name" => $passenger_name ?? $client_name,
            "email" =>  $request->email_address ?? $client_email,
            "passenger_count" => $passenger_count,
            "passenger_phone" => $request->passenger_phone ?? $client_phone,
            "checkin_luggage_count" => $checkin_luggage_count,
            "hand_luggage_count" => $hand_luggage_count,
            "email_acknowledge_flag" => $email_acknowledge_flag == '' ? 0 : $email_acknowledge_flag,
            "journey_type_id" => $journey_type_id,
            "airport_id" => $airport_id,
            "airport_terminal" => $airport_terminal,
            "airport_pickup_location_id" => $airport_terminal,
            "postcode" => $postcode, 
            "address" => $full_address, 
            "notes" => $notes,
            "flight_number" => $flight_number,
            "departure_city" => $departure_city,
            "car_park" => $car_park,
            "additional_seat" => $additional_seat, 
            "comment" => $comment,
            "job_number" => $newJobNumber, 
            "total_price" => $net_total_price,
            "taken_by" => Auth::user()->id,
            "job_status_type_id" => 1,
            "payment_type_id" => 1,
            'job_source' => 'Call',
            'payment_status' => 0,
            'booster_seat_count' => $car_category_id->id == 1 ? "0":$request->baby_seat_count,
            'child_age' => $car_category_id->id == 1 ? "":$child_age, 
            'price_detail_id' => $price_detail->id,
            'entry_after' => $request->entry_after,
            'wating_time' => $request->waiting_time,
            'topi_job' => $topi_job == '' ? 0:$topi_job,
            'drop_off_charge' => $drop_off_charge
        ]); 
 
        $booking_data = [
            "pickup_from" => $request->pickup, 
            "drop_of_at" => $request->drop, 
            "vehicle" => $car_category_id->name,
            "job_date" => Carbon::parse($job_date)->format('Y-m-d'),  
            "job_time" => $job_time,
            "price" => $net_total_price,
            "terminal" => $airport_terminal_record->terminal_name ?? '',
            "passenger_name" => $passenger_name ?? $client_name,
            "contact_phone" => $request->passenger_phone ?? $client_phone,
            "contact_email" => $request->email_address ?? $client_email,
            "no_of_passenger" => $passenger_count,
            "no_of_checkin_luggage" => $checkin_luggage_count,
            "no_of_hand_luggage" => $hand_luggage_count,
            "address" => $full_address,
            "job_number" => $newJobNumber,
            "post_code" => $postcode,
            "notes" => $notes,
            'baby_seat' => $car_category_id->id == 1 ? "0":$request->baby_seat_count,
            "child_age" => $car_category_id->id == 1 ? "0":$child_age,
            "payment_method" => $account_record->account_name,
            "country_code" => '',
            "drop_location" => $request->drop_detail,
            "aditional_info" => $request->comments, 
            "departure_city" => $departure_city,
            "flight_number" => $flight_number,
            "full_post_code" => strtoupper($postcode)
        ];
        $admin_booking_confirmation_mail_data = [
            "job_number" => $newJobNumber,
            "service" => $car_category_id->name,
            "payment_method" => $account_record->account_name,
            "passenger_name" => $passenger_name ?? $client_name,
            "contact_phone" => $request->passenger_phone ?? $client_phone,
            "pickup_from" => $request->pickup_detail, 
            "drop_of_at" => $request->drop_detail, 
            "price" => $net_total_price, 
            "flight_number" => $flight_number,
            "departure_city" => $departure_city,
            "no_of_hand_luggage" => $hand_luggage_count,
            "booking_made_at" => $booking_made_at,
            "job_date" => Carbon::parse($job_date)->format('Y-m-d'),  
            "job_time" => $job_time, 
            "journey_type" => $journey_type
             
        ];
        $admin_booking_confirmation_mail_data['admin_mail_subject'] = 'Justairports - Booking Confirmation Job: '.$newJobNumber;
        $recipients = [
            $request->email_address ?? $client_email,   
            env('MAIL_ADMIN')
        ];
        
        $admin_email = env('MAIL_ADMIN');
        $user_email = $request->email_address ?? $client_email;
        if($email_acknowledge_flag == 1){
            if($user_email != ''){
                if($account_record->id == 2){
                    $booking_data['heading'] = 'Online Cash Booking';
                    Mail::to($user_email)->send(new BookingConfirmationMail($booking_data, 'Online Cash Booking'));
                    Mail::to($user_email)->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
                }else{
                    $booking_data['heading'] = 'Online Credit Card Booking';
                    Mail::to($user_email)->send(new BookingConfirmationMail($booking_data, 'Online Credit Card Booking'));
                    Mail::to($user_email)->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
                }
            }
        }
        
       
        if($account_record->id == 2){
            $booking_data['heading'] = 'Online Cash Booking';
            Mail::to($admin_email)->send(new BookingConfirmationMail($booking_data, 'Online Cash Booking'));
            Mail::to($admin_email)->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
        }else{
            $booking_data['heading'] = 'Online Credit Card Booking';
            Mail::to($admin_email)->send(new BookingConfirmationMail($booking_data, 'Online Credit Card Booking'));
            Mail::to($admin_email)->send(new AdminBookingConfirmationMail($admin_booking_confirmation_mail_data,  $admin_booking_confirmation_mail_data['admin_mail_subject']));
        }
         
           
        //    return redirect()->back()->with('job_created', $newJobNumber); 
        return redirect()->back()->with('job_created', [
            'id' => $new_job->id,
            'number' => $new_job->job_number,
        ]);
        // }catch(\Exception $e){
        //     return $e->getMessage();
        // }
    }

    public function jobUpdate(Request $request, $id){   
        //  return $request->all();
        // try{
            $prevUrl = $request->prevUrl;
            $account_number = $request->account_number;
            $account_id = Account::where('account_number', $account_number)->first()->id; 
            $car_category_name = $request->car_category_name;
            $car_category_id = CarCategory::where('short_name', $car_category_name)->first()->id; 
            $job_date = Carbon::createFromFormat('d/m/Y', $request->job_date)->format('Y-m-d');
            $job_day = $request->job_day;
            $job_time = $request->job_time;
            $client_id = $request->client_id;
            $ref = $request->ref;
            $ref2 = $request->ref2;
            $passenger_name = $request->passenger_name ?? $request->contact_name;
            $passenger_count = $request->passenger_count;
            $passenger_phone = $request->passenger_phone;
            $checkin_luggage_count = $request->checkin_luggage_count;
           $hand_luggage_count = $request->hand_luggage_count;
            $email_acknowledge_flag = $request->email_acknowledge_flag;
            $pickup = strtoupper($request->pickup);
            $pickup_detail = $request->pickup_detail;
            $drop = $request->drop;
            $drop_detail = $request->drop_detail;
            if($pickup == "LHR" || $pickup == "LGW" || $pickup == "LTN" || $pickup == "STN" || $pickup == "LCY" || $pickup == "SEN"){
                $journey_type_id = 2; 
                $airport_id = Airport::where('display_name', $pickup)->first()->id;
                $postcode = $drop;
                $full_address = $drop_detail;
            }else{
                $journey_type_id = 1;
                $airport_id = Airport::where('display_name', $drop)->first()->id;
                $postcode = $pickup;
                $full_address = $pickup_detail; 
            } 
            $notes = $request->notes;
            $child_age = explode(',', $request->child_age);
            
            $airport_terminal = $request->airport_terminal; 
            $flight_number = $request->flight_number;
            $departure_city = $request->departure_city;
            $car_park = $request->car_park;
            $additional_seat = $request->additional_seat;
            $comment = $request->comment;

            $basic_price = $request->basic_fare;
            $congestion_charge = $request->congestion_charge; 
            $night_charge = $request->night_charge;
            $booster_seat_charge = $request->booster_seat_charge;
            $additional_charge = $request->additional_charge;
            $discount = $request->discount;   
            $total_price = $request->total_price;
            $net_price = $request->net_price;
            $net_total_price = $request->net_price;  
            $client = Client::where('id', $client_id)->update([
                "name" =>  $request->contact_name,
                "phone" => $request->telphone_number,
                "email" =>$request->email_address,
            ]); 
            $price_detail = PriceDetail::where('id', $request->price_detail_id)->update([
                "basic_price" => $basic_price,
                "congestion_charges" => $congestion_charge,
                "night_charge" => $night_charge,
                "booster_seat_charge" => $booster_seat_charge,
                // "additional_charge" => $additional_charge,
                // "discount" => $discount,
                "total_price" => $total_price,
                "net_price" => $net_total_price,
                "waiting_charge" => $additional_charge,
                "adjustment" => $discount
            ]);

            Job::where('id', $id)->update([
                "account_id" => $account_id,
                "car_category_id" => $car_category_id,
                "job_date" => $job_date,
                "job_day" => $job_day,
                "job_time" => $job_time, 
                "ref" => $ref,
                "ref2" => $ref2, 
                "passenger_name" => $passenger_name,
                "email" =>  $request->email_address,
                "passenger_count" => $passenger_count,
                "passenger_phone" => $passenger_phone,
                "checkin_luggage_count" => $checkin_luggage_count,
                "hand_luggage_count" => $hand_luggage_count,
                "email_acknowledge_flag" => $email_acknowledge_flag == '' ? 0 : $email_acknowledge_flag,
                "journey_type_id" => $journey_type_id,
                "airport_id" => $airport_id,
                "airport_terminal" => $airport_terminal,
                "postcode" => $postcode,   
                "address" => $full_address, 
                "notes" => $notes,
                "flight_number" => $flight_number,
                "departure_city" => $departure_city,
                "car_park" => $car_park, 
                'booster_seat_count' => $request->baby_seat_count,
                'child_age' => $child_age,
                "comment" => $comment,
                // "summary" => $comment,  
                "total_price" => $net_total_price, 
                'entry_after' => $request->entry_after,
                'wating_time' => $request->waiting_time,
                'amended_by' => Auth::user()->id,
                'payment_status' => $request->payment_status
           ]); 

           if($request->job_status_type != ''){
            Job::where('id', $id)->update([
                'job_status_type_id' => $request->job_status_type,
                'cancel_due_to' => $request->cancel_due_to, 
                'cancel_reason' => $request->cancel_reason,
            ]);
           }
            
        return redirect()->route('admin.job.view', [$id])
        ->with('job_updated', 'Job has been updated successfully !')
        ->with('previousUrl', $prevUrl);
        // }catch(\Exception $e){
        //     return $e->getMessage();
        // }
    }

    public function newJob(){ 
        $lastJobNumber = DB::table('jobs')->max('job_number');  
        $job_number = $lastJobNumber ? $lastJobNumber + 1 : 700000;

        $airports = Airport::where('status', 1)->get();
        $car_categories = CarCategory::where('status', 1)->get();
        $accounts = Account::get();
        return view('backend.jobs.new_job', compact('car_categories', 'job_number', 'airports', 'accounts'));
    }
    public function wipJob(){   
        $current_date = Carbon::now()->format('Y-m-d');
        $jobs = Job::with('getAirportPickupLocation', 'getDriver')->where('job_status_type_id', 3)->whereDate('job_date', '>=', $current_date)->orderBy('job_time', 'asc')->get();
        $drivers = Driver::get(); 
        return view('backend.jobs.wip_jobs', compact('jobs', 'drivers'));
    }

    public function allJobs(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $firstDateOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $currentDateOfMonth = Carbon::now()->format('Y-m-d');
        $jobs = Job::with(['getJobStatus', 'getDriver', 'getPaymentType', 'getAccount', 'getAirport', 'getAirportPickupLocation']);
        if($start_date != '' && $end_date != ''){
            $jobs = $jobs->whereBetween('job_date', [$start_date, $end_date]);
            } 
        // if($start_date != ''){
        //     $jobs = $jobs->where('job_date', '>=', $start_date);
        // }else{
        //     $jobs = $jobs->where('job_date', '>=', $firstDateOfMonth);
        // }
        // if($end_date != ''){
        //     $jobs = $jobs->where('job_date', '<=', $end_date);
        // }else{
        //     $jobs = $jobs->where('job_date', '<=', $currentDateOfMonth);
        // }
        $jobs = $jobs->orderBy('id', 'desc')->get();
        $drivers = Driver::get();
        $job_status_types = JobStatusType::get();
         Job::where('read_status', 0)->update(['read_status' => 1]);
        // return $jobs;
        return view('backend.jobs.all_jobs', compact('jobs', 'job_status_types', 'drivers'));
    }
    public function deletedJobs(){
        $drivers = Driver::get();
        $jobs = Job::onlyTrashed()->get();
        return view('backend.jobs.deleted_jobs', compact('jobs','drivers'));
    }

    public function canceledJob(){
        $drivers = Driver::get();
        $jobs = Job::with('getDriver')->whereIn('job_status_type_id', [4,7])->get();
    //    return $jobs;
        return view('backend.jobs.canceled_jobs', compact('jobs','drivers'));
    }
    public function transferJob(){
        $drivers = Driver::get();
        $jobs = Job::where('amended_by', '!=', 'NULL')->get();
        return view('backend.jobs.transfer_job', compact('jobs','drivers'));
    }
     
    public function printJobs(){
        $drivers = Driver::get();
        $jobs = Job::get();
        return view('backend.jobs.print_jobs', compact('jobs','drivers'));
    }
    public function jobSummary(){
        $job_count = Job::select(DB::raw('DATE(created_at) as date'),
                    DB::raw('SUM(CASE WHEN job_status_type_id = 1 THEN 1 ELSE 0 END) AS unallocated'),
                    DB::raw('SUM(CASE WHEN job_status_type_id = 2 THEN 1 ELSE 0 END) AS preallocated'),
                    DB::raw('SUM(CASE WHEN job_status_type_id = 3 THEN 1 ELSE 0 END) AS allocated'),
                    DB::raw('SUM(CASE WHEN job_status_type_id = 3 THEN 1 ELSE 0 END) AS canceled'),
                    DB::raw('SUM(CASE WHEN job_status_type_id = 3 THEN 1 ELSE 0 END) AS active'),
                    DB::raw('SUM(CASE WHEN job_status_type_id = 3 THEN 1 ELSE 0 END) AS completed'),
                    DB::raw('SUM(CASE WHEN deleted_at IS NOT NULL THEN 1 ELSE 0 END) AS deleted'),
                    DB::raw('COUNT(*) as total_count'))
            ->groupBy('date')
            ->get();
       
        return view('backend.jobs.job_summary', compact('job_count'));
    }
    public function editJob(Request $request, $id){ 
        $car_categories = CarCategory::where('status', 1)->get();
        $airports = Airport::where('status', 1)->get();
        $previousUrl = $request->prevUrl;
        $job = Job::where('id', $id)->with([ 
            'getAccount', 'getCarCategory', 'getClient',
         'getAirport', 'getTakenBy', 'getAllocatedBy', 'getDriver', 'getAssignedBy',
          'getAirportPickupLocation:id,terminal_name', 'getAirport.getAirportPickupLocationList', 'getAmendedBy', 'getPriceDetail'
        ])->first(); 
        return view('backend.jobs.edit_job', compact('car_categories', 'job', 'airports', 'previousUrl'));
    }
 
    public function getClientProfile(Request $request){
        try{
            $id = $request->id;
            $client_profile = Client::where('id', $id)->first();
            if($client_profile){
            return response()->json([
                "status" => "success",
                "data" => $client_profile
            ]);
        }else{
            return response()->json([
                "status" => "not_found"
            ]);
        }
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ]);
        }
    }

    public function getAssignedDriverWithJob(Request $request){
        try{
            $id = $request->job_id;
            $job_detail = Job::with('getDriver')->where('id', $id)->first();
             $driver = Driver::with('getCarForDriver')->where('id', $job_detail->driver_id)->first();

            // $job_detail = DB::table('jobs as a')->select('a.*', 'b.did', 'b.full_Name as driver_name', 'b.call_Sign', 'b.driver_no')
            // ->leftjoin('tbl_drivers_new as b', 'a.driver_id', '=', 'b.did')->where('id', $id)->first();
           
            return response()->json([
                "status" => "success",
                "data" => $job_detail,
                "driver" => $driver
            ]);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ]);
        }
    }

    public function getTerminalList(Request $request){
        try{
            $airport_id = $request->airport_id;
            $terminals = AirportPickupLocation::where('airport_id', $airport_id)->get();
            return response()->json([
                "status" => "success",
                "data" => $terminals
            ], 200);
       }catch(\Exception $e){
        return response()->json([
            "status" => "failed",
            "error" => $e->getMessage()
        ], 400);
       }

    }

    public function getClientProfileWithPhone(Request $request){
        try{
            $phone = $request->client_phone;
            $client = Client::where('phone', $phone)->first(); 
            if($client){ 
                return response()->json([
                    "status" => "success",
                    "data"=> $client
                ], 200);
            }else{
                return response()->json([
                    "status" => "not_found"
                ], 200);
            }
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getCode()
            ], 400);
        }
    }

    public function sendReminderEmail(Request $request){
        try{
            $email = $request->email;
            $id = $request->job_id;
         $current_date_time = Carbon::now();
        $booking = Job::where('id', $id)->first();
        $reminder_data = [
            "passenger_name" => $booking->passenger_name,
            "job_number" => $booking->job_number,
            "total_price" => $booking->total_price,
        ];
        $job = Job::where('id', $id)->first();
        Job::where('id', $id)->update([
            'payment_reminder' => 1,
            'payment_reminder_count' => $job->payment_reminder_count + 1, 
            'last_reminder_sent_date' => $current_date_time   
        ]); 
        Mail::to($email)->send(new ReminderMail($reminder_data)); 
        return response()->json([
            "status" => "success",
            "message" => "Reminder email has been sent successfully !",
            "reminder_count" => $job->payment_reminder_count + 1
        ], 200);
    }catch(\Exception $e){
        return response()->json([
            "status" => "failed",
            "error" => $e->getMessage()
        ], 400);
    
    }
    }

    public function getNewBookingPrice(Request $request){
        try{
            $full_postcode = $request->postcode;
            $airport_id = $request->airport_id;
            $car_id = $request->car_category;
            $pickup_day = $request->job_day; 
            $job_time = $request->job_time;
            $baby_seat_count = $request->baby_seat_count;
            $pickup_time = explode(':', $job_time);
            $only_month = $request->only_month;
            $only_date = $request->only_date;
            $basic_price = 0;  
            $night_charge = 0;
            $congestion_charge = 0; 
            $baby_seat_price = 5;
            $drop_off_charge = 0;
            $parking_charge = 0;
            $baby_seat_cost = intval($baby_seat_count) * 5;
            $account_id = $request->account_id;
            $journey_type = $request->journey_type;

            if($full_postcode != '' && $airport_id != '' && $car_id != ''){
                for ($length = 4; $length >= 2; $length--){
                $price_query = Pricing::select('price');  
                switch ($airport_id) {
                    case 1:
                        $price_query->where('airport', 'Heathrow');
                        $drop_off_charge = 5;
                        break;
                    case 2:
                        $price_query->where('airport', 'Gatwick');
                        $drop_off_charge = 6;
                        break;
                    case 3:
                        $price_query->where('airport', 'Luton');
                        $drop_off_charge = 5;
                        break;
                    case 4:
                        $price_query->where('airport', 'Stansted');
                        $drop_off_charge = 7;
                        break;
                    case 5:
                        $price_query->where('airport', 'City');
                        break; 
                } 
                    $short_postcode = strtoupper(substr($request->postcode, 0, $length));
                    $price = $price_query->where('postcode', $short_postcode)->first(); 
                    if ($price !== null){
                        break;
                    }
                }

                // return response()->json([
                //     "car_id" =>$car_id
                // ]);
                $car = CarCategory::where('short_name', strtoupper($car_id))->first();  
                if ($car->name == 'Estate') {
                    $basic_price = $price->price + 5;
                } else if ($car->name == 'MPV') {
                    $basic_price = $price->price + 17;
                } else if ($car->name == 'Executive') {
                    $basic_price = $price->price + 17;
                } else if ($car->name == 'MPV 7' && $short_postcode != 'T1') {
                    $basic_price = $price->price + 29;
                } else if ($car->name == 'MPV 8' && $short_postcode != 'T1') {
                    $basic_price = $price->price + 36;
                } else {
                    $basic_price = $price->price;
                } 
                
                 if($only_month == 12){
                    $holidays = [24, 25, 26, 31];
                    if(in_array($only_date, $holidays)){
                        if(($only_date == 24 || $only_date == 31) && ($pickup_time[0] >= 12 && $pickup_time[0] <= 23) ){
                            $basic_price = $basic_price + ($basic_price/2);
                        }elseif($only_date == 25 || $only_date == 26){
                            $basic_price = $basic_price + ($basic_price/2); 
                        }
                    }
                }else if($only_month == 1){
                    if($only_date == 1){
                        $basic_price = $basic_price + ($basic_price/2); 
                    }
                }

                if($account_id == 997 && $journey_type == 'from_airport'){
                    $parking_charge = 18;
                    // $basic_price = $basic_price + $parking_charge; 
                }
                // if($journey_type == 'from_airport'){
                //     $basic_price = $basic_price + 12;
                // }
            } 
            if($airport_id != 1){
                
            
            if($pickup_time[0] != '' && ($pickup_time[0] >= 22 || $pickup_time[0] <= 01)){
                $night_charge = 20;
            }
            }

            if($short_postcode == "EC1" || $short_postcode == "EC2" || $short_postcode == "EC3" || $short_postcode == "EC4" || 
            $short_postcode == "SE1" || $short_postcode == "SW1" || $short_postcode == "W1" || $short_postcode == "WC1" || $short_postcode == "WC2"){
                
                
             if($only_month == 12 && ($only_date == 25 || $only_date == 26 || $only_date == 27 || $only_date == 28 || $only_date == 29 || $only_date == 30 || $only_date == 31)){
                $congestion_charge = 0;
            }elseif($only_month == 1 && $only_date == 1){
                $congestion_charge = 0;
            }else{
                if($pickup_day != '' && $pickup_time[0] != ''){
                    if(($pickup_day == 'Mon' || $pickup_day == 'Tue' || $pickup_day == 'Wed' || $pickup_day == 'Thu' || $pickup_day == 'Fri') &&
                    ($pickup_time[0] >= 07 && $pickup_time[0] <= 18)){
                        $congestion_charge = 15;
                    }
                    if(($pickup_day == 'Sat' || $pickup_day == 'Sun') &&
                    ($pickup_time[0] >= 12 && $pickup_time[0] <= 18)){
                        $congestion_charge = 15;
                    }
                }
            }
            
            
            }

             
            return response()->json([
                "status" => "success",
                "basic_price" => $basic_price, 
                "pickup_time" => $pickup_time[0],
                "night_charge" => $night_charge,
                "pickup_day" => $pickup_day,
                "congestion_charge" => $congestion_charge,
                "parking_charge" => $parking_charge,
                // "baby_seat_cost" => $baby_seat_cost, 
                "total_price" => $basic_price + $night_charge + $congestion_charge + $baby_seat_cost + $parking_charge
            ]);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => "something_went_wrong",
                "error" => $e->getMessage()
            ]);
        }

    }

    public function sendJobToDriver($job_id){ 
        $job = Job::with(['getDriver', 'getAirport', 'getAirportPickupLocation', 'getCarCategory', 'getAccount'])->where('id', $job_id)->first();
        if($job->journey_type_id == 1){
            $pickup =  $job->address;
            $dropoff = $job->getAirport->airport_name;
        }else{
            $pickup = $job->getAirport->airport_name;
            $dropoff =  $job->address;
        }     
        $messageBody = $job->job_number." ".$job->passenger_name." ".$job->passenger_phone." ".($job->airport_terminal ?? '')." ".
                            $pickup." DROP ".$dropoff." Note:-".$job->flight_number.
                            " HANDLUGGAGE:".$job->hand_luggage_count." PAX/".$job->passenger_count." LUG/".$job->checkin_luggage_count." ".
                            Carbon::parse($job->job_date)->format('d/m/Y')." ".Carbon::parse($job->job_time)->format('H:i')." ".
                            $job->getCarCategory->short_name." ACC".$job->getAccount->account_number; 
        $messages = [
                        [
                            'source' => 'php',
                            'body' => $messageBody,
                            'to' => $job->getDriver->phone,
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
 
            return redirect()->back();
    }
    public function sendConfirmationToCustomer($job_id){
        $job = Job::with(['getDriver', 'getAirport', 'getAirportPickupLocation', 'getCarCategory', 'getAccount'])->where('id', $job_id)->first();
        $driver = Driver::where('id', $job->id)->first();
        if($job->journey_type_id == 1){
            $pickup =  $job->address;
            $dropoff = $job->getAirport->airport_name;
        }else{
            $pickup = $job->getAirport->airport_name;
            $dropoff =  $job->address;
        }
        $messageBody = "Confirmation of your car/driver details Make/Model ".$driver->vmm." transporter Colour ".$driver->vehicle_Color." Reg". 
                        $driver->reg_No. " Driver ".$driver->full_Name." Mob ".$driver->phone.", photo at ".route('frontend.driver_info', [$driver->id]);
        $messages = [
                        [
                            'source' => 'php',
                            'body' => $messageBody,
                            'to' => $job->passenger_phone,
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
            return redirect()->back();
    }
    public function viewJob($id){
        $previousUrl = url()->previous(); 
        $car_categories = CarCategory::where('status', 1)->get();
        $airports = Airport::where('status', 1)->get();
        $job = Job::where('id', $id)->with(['getAccount', 'getCarCategory', 'getClient',
         'getAirport', 'getTakenBy', 'getAllocatedBy', 'getDriver',
          'getAirportPickupLocation:id,terminal_name', 'getAmendedBy', 'getPriceDetail'])->first();
         
        // return $job;
        return view('backend.jobs.view_job', compact('car_categories', 'job', 'airports', 'previousUrl'));
    }

    public function getDriverCallSignList(){
        try{  
            // $callSigns = Driver::where('status', 0)
            // ->groupBy('call_Sign')
            // ->pluck('call_Sign')
            // ->toArray(); 
            // return response()->json([
            //     "status" => "success",
            //     'drivers' => $callSigns
            // ]);  
            $driver_list = Driver::with('getCarForDriver')
            ->where('status', 0)
            ->get()
            ->mapWithKeys(function ($driver) {
                return [
                    $driver->call_Sign => [ // Ensure correct case
                        'id' => $driver->id,
                        'name' => $driver->full_Name, // Ensure correct case
                        'car' => $driver->getCarForDriver ? $driver->getCarForDriver->name : null,
                        'phone' => $driver->phone,
                        'driverNumber' => $driver->driver_no
                    ]
                ];
            });  
            return response()->json([
                "status" => "success",  
                "driver_list" => $driver_list
                ]
            );  
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" -> $e->getMessage()
            ]);
        }
    }

    public function getDriverWithCallSign(Request $request){
        try{ 
            $call_sign = $request->call_sign;
            $driver = Driver::where('call_Sign', $call_sign)->where('status', 0)->first();
            return response()->json([
                "status" => "success",
                "driver" => $driver
            ]);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ]);
        }
    }
    public function getPostcodeAirportsList(Request $request){
        try{
            $data = [];
            $req_value = $request->req_value;
            $response = Http::get('https://api.getAddress.io/autocomplete/'.$req_value.'/?api-key=egJGhHf3VUWDo-VoXtfu3A43846');
            foreach($response['suggestions'] as $suggestion){
                $data[] = $suggestion['address'];
            } 
            // $airports = Airport::where('airport_name', 'LIKE', '%'.$req_value.'%')->get();
            // foreach($airports as $airport){
            //     $data[] = $airport->airport_name;
            // } 

            return response()->json([ 
                "status" => "success",
                "data" => $data,
                "value" => $req_value
            ], 200);

        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }

    }

// history data for client using datatable and job start 
    public function jobHistoryData(){
        // $jobs = JobHistory::paginate(300);
        return view('backend.history_data.job_history');
    }
    public function getJobHistoryDataTable(){
        $query = JobHistory::query();
        return DataTables::eloquent($query)
            ->addColumn('action', function($row){
                // Add any action buttons or links here
                // return '<a href="" class="btn btn-sm btn-primary">View</a>';
            })->make(true);
    }
    
    public function clientHistoryData(){
        return view('backend.history_data.client_history');
    }
    public function getClientHistoryDataTable(){
        $query = ClientHistory::query();
        return DataTables::eloquent($query)
            ->addColumn('action', function($row){ 
                // return '<a href="" class="btn btn-sm btn-primary">View</a>';
            })->make(true);
    }

    // history data for client using datatable and job start 

    
    
    
    // public function enterDataInJobHistoryFromTo(){ 
    //     // remove after data inserted. 
    // $rows = DB::table('jobs_history')->first(); 
    // return $rows;
    // foreach ($rows as $row) {
    //     if (strpos($row->places, ',') !== false) {
    //         $parts = explode(',', $row->places, 2);
    //         $from = trim($parts[0]);
    //         $to = trim($parts[1]);  
    //         DB::table('jobs_history')
    //             ->where('id', $row->id)
    //             ->update([
    //                 'pickup_location' => $from,
    //                 'drop_location' => $to,
    //             ]);
    //     }
    //     }
    //     return "success";
    // }

}

