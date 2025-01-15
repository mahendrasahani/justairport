<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Account;
use App\Models\Backend\AirportPickupLocation;
use App\Models\Backend\Campaign;
use App\Models\Backend\Client;
use App\Models\Backend\ClientHistory;
use App\Models\Backend\Job;
use App\Models\Backend\JobHistory;
use App\Models\User;
use Hash;
use Http;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Mail\BookingConfirmationMail;
use Mail;
use App\Services\FirebaseService;

class ApiController extends Controller{

      // show modal if popup status is 1 
      public function getNewCall(){
        //to show the modal hit this api in web if popup_status is   1 then show modal
        try{
            $new_calls = Client::where('popup_status', 1)->get();
            return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => $new_calls,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => 400,
                "message" => "something_went_wrong", 
                "error" => $e->getMessage()
            ], 400);
        }  
    }

    // create new job when api hit 
    public function makeNewJob(Request $request, FirebaseService $firebaseService){
        // this api is hitting from postman to create job so we can show popup in our web
        $phone = $request->phone;
        $user_id = $request->user_id;
        $timeWithMilliseconds = Carbon::now()->format('Y-m-d H:i:s.u');
        try{ 
            $client = Client::where('phone', $phone)->first();
            if($client){
                Client::where('id', $client->id)->update([
                    "popup_status" => 1,
                    "user_id" => $user_id
                ]);
                $client = Client::where('phone', $phone)->first();
 
            }else{
                $client = Client::create([
                    "phone" => $phone, 
                    "popup_status" => 1,
                    "user_id" => $user_id
                ]);   
            }
            // $firebaseService->getDatabase()
            //     ->getReference('client/' . $client->id)
            //     ->set([
            //         'id' => $client->id,
            //         'name' => $client->name,
            //         'email' => $client->email,
            //         'phone' => $client->phone,
            //         'agent' => $user_id,
            //         'popup_status' => 1,
            //         'created_at' => now()->toDateTimeString(),
            // ]); 
            return response()->json([
                "status" => 200,
                "message" => "new_call_created",
                "data" => $client,
                "user_id" => $user_id,
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => 400,
                "message" => "something_went_wrong", 
                "error" => $e->getMessage()
            ], 400);
        }
        
        
    }

    public function getNewJob(){
        try{
        $history = null;
        $new_client = Client::where('popup_status', 1)->where('user_id', Auth::user()->id)->first();
        if($new_client != null){
            $history = Job::with(['getAirport', 'getAccount'])->where('client_id', $new_client->id)->orderBy('id', 'desc')->paginate(4);
        }
          return response()->json([
                "status" => 200,
                "message" => "success",
                "data" => $new_client,
                "history" => $history
            ], 200);
             
        }catch(\Exception $e){
           return response()->json([
                    "status" => 400,
                    "message" => "something_went_wrong", 
                    "error" => $e->getMessage()
           ]);
        }  
        
    }


    // change popup status after showing modal 
    public function updateNewJob(Request $request){
            try{
            $id = $request->id;
            Client::where('id', $id)->update([
                "popup_status" => 0
                ]);
                
        return response()->json([
            "status" => 200,
            "message" => "call_status_updated"
        ], 200);
            }catch(\Exception $e){
                return response()->json([
                        "status" => 400,
                        "message" => "something_went_wrong", 
                        "error" => $e->getMessage()
                    ], 400);
            }         
    }
  public function fillNewJobForm(){
  }

  public function getJobDetail(Request $request){
    try{
        $id = $request->id;
        $job = Job::with('getAirport', 'getAccount','getAirportPickupLocation', 'getClient', 'getPriceDetail','getCarCategory')->where('id', $id)->first();
        return response()->json([
            "status" => 200,
            "message" => "success",
            "job" => $job, 
        ], 200);
    }catch(\Exception $e){
        return response()->json([
            "status" => 400,
            "message" => "something_went_wrong", 
            "error" => $e->getMessage()
        ], 400);
    } 
  }

  public function getHistory(Request $request){
    try{
        $client_id = Client::where('phone', $request->phone)->first();
        if($client_id != null){
            $job_history = Job::where('client_id', $client_id->id)->get();
            return response()->json([
                "message" => "history_found",
                "history" => $job_history
            ], 200);
        }else{
            return response()->json([
                "message" => "history_not_found"
            ], 200);
        } 
    }catch(\Exception $e){
        return response()->json([
            "message" => "something_went_wron",
            "error" => $e->getMessage()
        ], 400);
    }
  }


// get airports terminal list with airport id
  public function getTerminalList(Request $request){
    try{ 
    $airport_id = $request->airport_id;
   $terminal_list = AirportPickupLocation::where('airport_id', $airport_id)->get();
   if(count($terminal_list) > 0){
    return response()->json([
        "status" => "success",
        "terminal_list" => $terminal_list
    ], 200);
   }else{
    return response()->json([
        "status" => "success",
        "message" => "no_terminal_found"
    ], 200);
   }
   
    }catch(\Exception $e){
        return response()->json([
            "staus" => "failed",
            "error" => $e->getMessage()
        ], 400);
    }
  }
 
  public function testApi(Request $request){
    try{
        $taken_by = $request->taken_by;
        $jobs = Job::where('taken_by', $taken_by)->get(); 
        return response()->json([
            "message" => "success",
            "no_of_records" => count($jobs),
            "data" => $jobs
        ]);
    }catch(\Exception $e){
        return response()->json([
            "message" => "something_went_wrong",
            "error" => $e->getMessage()
        ]);
    }
  }

// public function checkExistingUser(Request $request){ 
//     $check_phone = User::where('phone', $request->phone)->exists();
//     $check_email = User::where('email', $request->email)->exists();

//         if($check_phone && !$check_email){
//                 return response()->json([
//                     "status" => "already_exist",
//                     "message" => "phone_already_exist"
//                 ]);
//             }elseif(!$check_phone && $check_email){
//                 return response()->json([
//                     "status" => "already_exist",
//                     "message" => "email_already_exist"
//                 ]);
//             }else{
//                 return response()->json([
//                     "status" => "success",
//                     "message" => "proceed"
//                 ]);
//             }

// }


// APIs for ROCS
    public function getUser(Request $request){
        try{
            $username = $request->username;
            $password = $request->password;
            $user = User::where('username', $username)->first();  
            if ($user && Hash::check($password, $user->password)) {  
                $user->tokens()->delete();
                $token = $user->createToken('Personal Access Token');   
            return response()->json([
                "status" => "success",
                "user_id" => $user->id,
                "token" => $token->plainTextToken,
            ], 200);
        }else{
            return response()->json([
                "status" => "failed",
                "error" => "incorrect credentials", 
            ], 400);
        }
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        } 
    }
    public function getClient(Request $request){
        try{
            $phone = $request->phone;
            $userid = $request->userid; 
            // $client = Client::where('user_id', $userid)->where('phone', $phone)->first();
            $client = Client::where('phone', $phone)->first();
            if($client){
                $account = Account::where('id', $client->account_id)->first();
                $bookings = Job::where('client_id', $client->id)->get();  
                return response()->json([
                    "status" => "success",
                    "client_id" => $client->id,
                    "profile" => $client,
                    "account" => $account,
                    "bookings" => $bookings
                ], 200);
            }else{
                return response()->json([
                    "status" => "success",
                    "message" => "client_not_found"
                ], 200);
            } 
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }
    public function createNewJob(Request $request){
        try{ 
            // $validated = $request->validate([
            //     'passenger_name' => 'required', 
            // ]); 
            // $job_number = rand(100000, 999999);
            $lastJobNumber = Job::max('job_number');  
            $newJobNumber = $lastJobNumber ? $lastJobNumber + 1 : 1000001; 
            $account_id = $request->account_id;
            $car_category_id = $request->car_category_id;
            $job_date = $request->job_date;
            $job_day = $request->job_day;
            $job_time = $request->job_time; 
            $ref = $request->ref;
            $ref2 = $request->ref2;
            $passenger_name = $request->passenger_name;
            $passenger_count = $request->passenger_count;
            $passenger_phone = $request->passenger_phone;
            $checkin_luggage_count = $request->checkin_luggage_count;
            $hand_luggage_count = $request->hand_luggage_count;
            $email_acknowledge_flag = $request->email_acknowledge_flag;
            $journey_type_id = $request->journey_type_id;
            $airport_id = $request->airport_id;
            $address = $request->address;
            $postcode = $request->postcode;
            $notes = $request->notes;
            $airport_terminal = $request->airport_terminal; 
            $flight_number = $request->flight_number;
            $arrival_city = $request->arrival_city;
            $car_park = $request->car_park;
            $additional_seat = $request->additional_seat;
            $comment = $request->comment; 
            $distance = $request->distance;
            $total_price = $request->total_price;
            $taken_by = $request->taken_by; 
            if($request->client_id != ''){
                $check_client = Client::where('id', $request->client_id)->first();
                if($check_client == '' ){
                    $client = Client::create([
                        "phone" => $request->client_phone,
                        "mobile" => $request->passenger_phone ?? $request->client_phone,
                        "name" => $request->contact_name,
                        "email" => $request->email_address,
                        "account_id" => $request->account_id
                    ]);
                    }else{
                        $client = Client::where('id', $request->client_id)->first();
                    }
            }else{
                $client = Client::create([
                    "phone" => $request->client_phone,
                    "mobile" => $request->passenger_phone ?? $request->client_phone,
                    "name" => $request->contact_name,
                    "email" => $request->email_address,
                    "account_id" => $request->account_id
                ]);
            } 
        $new_job = Job::create([
                "account_id" => $account_id,
                "car_category_id" => $car_category_id,
                "job_date" => $job_date,
                "job_day" => $job_day,
                "job_time" => $job_time,
                "client_id" => $client->id,
                "ref" => $ref,
                "ref2" => $ref2,
                "passenger_name" => $passenger_name ?? $client->name,
                "passenger_count" => $passenger_count,
                "passenger_phone" => $passenger_phone ?? $client->phone,
                "checkin_luggage_count" => $checkin_luggage_count,
                "hand_luggage_count" => $hand_luggage_count,
                "email_acknowledge_flag" => $email_acknowledge_flag == '' ? 0 : $email_acknowledge_flag,
                "journey_type_id" => $journey_type_id,
                "airport_id" => $airport_id,
                "airport_terminal" => $airport_terminal,
                "address" => $address,
                "postcode" => $postcode,
                "notes" => strtoupper($notes),
                "flight_number" => $flight_number,
                "arrival_city" => $arrival_city,
                "car_park" => strtoupper($car_park),
                "additional_seat" => strtoupper($additional_seat), 
                "summary" => $comment,
                "job_number" => $newJobNumber,
                "distance" => $distance,
                "total_price" => $total_price,
                "taken_by" => $taken_by,
                "job_status_type_id" => 1,
                "payment_type_id" => 1,
                "job_source" => "api" 
            ]);
            return response()->json([
                "status" => "success", 
                "job_number" => $new_job->job_number
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "message" => "something_went_wron",
                "error" => $e->getMessage()
            ], 400);
        }
    }
    public function getAddress(Request $request){
        try{
            $postcode = $request->postcode;
            $response = Http::get('https://api.getAddress.io/autocomplete/'.$postcode.'/?api-key=egJGhHf3VUWDo-VoXtfu3A43846');
            return response()->json([
                "status" => "success",
                "address_list" => $response['suggestions'],
                "postcode" => $postcode
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        } 
    }
    public function getAccount(Request $request){
        try{ 
            $accounts = Account::with('getAccountStatusType:id,status_name as status')->get();
            return response()->json([
                "status" => "success",
                "accounts" => $accounts
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    // get history with client phone number on keyup at create new job 
    public function getHistoryWithClientNumber(Request $request){
        try{
            $client = Client::where('phone', 'LIKE', '%'.$request->phone.'%')
            ->first();
            //  if(!$client){
            //     $client = ClientHistory::where('telephone', 'LIKE', '%'.$request->phone.'%')->first();
            // }
            if($client){
                $jobs = Job::with('getClient', 'getAirport')
                ->where('client_id', $client->id)
                ->orderBy('job_number', 'desc')->limit(3)->get();
                if(count($jobs) < 1){
                    $jobs = JobHistory::where('telephone', 'LIKE', '%'.$client->phone.'%')
                    ->orderBy('number', 'desc')->limit(3)->get();
                    if(count($jobs) > 1){
                        return response()->json([
                            "status" => "success",
                            "history" => $jobs,
                            "client_id" => $client->id,
                            "client_profile" => $client
                        ], 200);
                    }else{
                        return response()->json([
                            "status" => "success", 
                            "history" => "",
                            "client_id" => $client->id,
                            "client_profile" => $client 
                        ], 200);  
                    }
                }else{
                    return response()->json([
                        "status" => "success", 
                        "history" => $jobs,
                        "client_id" => $client->id,
                        "client_profile" => $client
                    ], 200);
                }
            }else{
                return response()->json([
                    "status" => "success", 
                    "history" => "",
                    "client_id" => "",
                    "client_profile" => ""
                ], 200); 
            }

        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }
    // public function getHistoryWithClientNumber1(Request $request){
    //     try{ 
    //         $client = Client::where('phone', 'LIKE', '%'.$request->phone.'%')->first();
    //         if($client){
    //         $jobs = Job::with('getClient', 'getAirport')
    //         ->where('client_id', $client->id)
    //         ->orderBy('job_number', 'desc')->limit(3)->get();
    //         if(count($jobs) > 0){
    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "history_found",
    //                 "history" => $jobs,
    //                 "client_id" => $client->id,
    //                 "client_profile" => $client
    //             ], 200);
    //         }else{
    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "client_found", 
    //                 "client_profile" => $client
    //             ], 200);
    //         }
    //     }else{ 
    //         return response()->json([
    //                     "status" => "success",
    //                     "message" => "client_not_found",  
    //                 ], 200); 
    //     } 
    //     }catch(\Exception $e){
    //         return response()->json([
    //             "status" => "failed",
    //             "error" => $e->getMessage()
    //         ], 400);
    //     } 
    // }

    public function SendJobEmail(Request $request){
        try{
        $job_id = $request->job_id;
        $receiver_type = $request->receiver_type; 
        $job = Job::where('id', $job_id)->with([ 
            'getAccount', 'getCarCategory', 'getClient',
            'getAirport', 'getTakenBy', 'getAllocatedBy', 'getDriver', 'getAssignedBy',
            'getAirportPickupLocation:id,terminal_name', 'getAirport.getAirportPickupLocationList', 'getAmendedBy', 'getPriceDetail'
        ])->first(); 
        $booking_data = [
            "pickup_from" => $job->journey_type_id == 1 ? $job->postcode : $job->getAirport->airport_name, 
            "drop_of_at" =>  $job->journey_type_id == 1 ?  $job->getAirport->airport_name : $job->postcode, 
            "vehicle" => $job->getCarCategory->name,
            "job_date" => Carbon::parse($job->job_date)->format('Y-m-d'),
            "job_time" => Carbon::parse($job->job_time)->format('H:i'),
            "price" => $job->total_price,
            "terminal" => $job->getAirportPickupLocation?->terminal_name,
            "passenger_name" => $job->passenger_name,
            "contact_phone" => $job->passenger_phone,
            "contact_email" => $job->email,
            "no_of_passenger" => $job->passenger_count,
            "no_of_checkin_luggage" => $job->checkin_luggage_count,
            "no_of_hand_luggage" => $job->hand_luggage_count,
            "address" => $job->address,
            "job_number" => $job->job_number,
            "post_code" => $job->job_number,
            "notes" => $job->summary,
            'baby_seat' => $job->booster_seat_count, 
            "child_age" => $job->child_age,
            "payment_method" => $job->account_id == 2 ? 'Cash':'Credit Card',
            "country_code" => '', 
            "drop_location" => $request->journey_type == '1' ?  $job->getAirport->airport_name : $job->postcode,
            "aditional_info" => $job->comment, 
            "departure_city" => $job->departure_city,
            "flight_number" => $job->flight_number,
            "full_post_code" =>strtoupper($job->postcode)
        ];
        if($job->account_id == 2){
            $booking_data['heading'] = 'Online Cash Booking';
        }else{
            $booking_data['payment_link'] = route('frontend.direct_pay', [$job->job_number]);
            $booking_data['heading'] = 'Online Credit Card Booking';
        } 
        if($receiver_type == 'client'){
            Mail::to($job->getClient->email)->send(new BookingConfirmationMail($booking_data, $booking_data['heading']));
        }else if($receiver_type == 'admin'){
            Mail::to(env('MAIL_ADMIN'))->send(new BookingConfirmationMail($booking_data, $booking_data['heading']));
        }else if($receiver_type == 'driver'){
            Mail::to($job->getDriver->email)->send(new BookingConfirmationMail($booking_data, $booking_data['heading']));
        }

        return response()->json([
            "status" => "success",
            "message" => "email_sent_successfully"
        ], 400);
    }catch(\Exception $e){
        return response()->json([
            "status" => "failed",
            "error" => $e->getMessage()
        ], 400);
    }
    }

    public function getCampaignLead(Request $request){
        try{
            $lead = Campaign::where('id', $request->id)->first();
            return response()->json([
                "status" => "success",
                "lead" => $lead
            ]);
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ]);
        }
    }
}
