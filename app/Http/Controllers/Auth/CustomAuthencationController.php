<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendLoginOtpMail;
use App\Models\Backend\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Mail;

class CustomAuthencationController extends Controller
{
    public function sendOtpToVerifyPhone(Request $request){
        try{
            $name = $request->user_name;
            $phone = $request->user_phone;
            $email = $request->user_email;
            $otp = rand(1000, 9999);
            $client_phone = Client::where('phone', $phone)->exists();
            $client_email = Client::where('email', $email)->exists(); 
            if($client_phone && $client_email){
                $client_verify_flag =  Client::where('phone', $phone)->where('email', $email)->where('phone_verified', 1)->exists();
                if($client_verify_flag){
                    $client = Client::where('phone', $phone)->where('email', $email)->where('phone_verified', 1)->first();
                    Auth::guard('client')->login($client);
                    return response()->json([
                        "status" => "verified",
                        "message" => "client_already_verified"
                    ], 200); 
                }else{
                    //-------------------------Send OTP (*start*)--------------------------------------------------------
                    $messageBody = "Thank you for choosing JustAirports! ðŸš€\n\nYour verification code is ".$otp.". Please enter this code to verify your phone number and complete the process.";
                    $messages = [
                        [
                            'source' => 'php',
                            'body' => $messageBody,
                            'to' => '+'.$phone,
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
                        $client = Client::where('phone', $phone)->update([
                            "phone_otp" => $otp
                        ]); 
                    //-------------------------Send OTP (*end*)----------------------------------------------------------
                    return response()->json([
                        "status" => "otp_sent",
                        "message" => "not_verified",
                        "phone" => $phone
                    ], 200);
                }
            } elseif(!$client_phone && !$client_email){
                 //-------------------------Send OTP (*start*)-------------------------------------------------------- 
                 $messageBody = "Thank you for choosing JustAirports! ðŸš€\n\nYour verification code is ".$otp.". Please enter this code to verify your phone number and complete the process.";
                 $messages = [
                     [
                         'source' => 'php',
                         'body' => $messageBody,
                         'to' => '+'.$phone,
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
                 Client::create([
                    "name" => $name,
                    "phone" => $phone,
                    "email" => $email,
                    "phone_otp" => $otp 
                ]);
                 //-------------------------Send OTP (*end*)----------------------------------------------------------
                 return response()->json([
                    "status" => "otp_sent",
                    "message" => "new_created",
                    "phone" => $phone,
                ], 200);  
            }elseif(!$client_phone && $client_email){
                return response()->json([
                    "status" => "exist",
                    "message" => "email_already_exist",
                    "phone" => $phone
                ], 200); 
            }elseif($client_phone && !$client_email){
                return response()->json([
                    "status" => "exist",
                    "message" => "phone_already_exist",
                    "phone" => $phone
                ], 200); 
            } 
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "message" => $e->getMessage()
            ], 400); 
        }
    }

    public function submitOtpToVerifyPhone(Request $request){
        try{
        $phone = $request->phone;
        $otp = $request->otp; 
        $check_otp = Client::where('phone', $phone)->where('phone_otp', $otp)->exists();
        if ($check_otp){  
            $client = Client::where('phone', $phone)->where('phone_otp', $otp)->first();
            Client::where('phone', $phone)->where('phone_otp', $otp)->update([
                'phone_otp' => NULL,
                'phone_verified' => 1,
            ]);  
            Auth::guard('client')->login($client);
                return response()->json([
                    "status" => "success",
                    "message" => "login_success",
                    "user_data" => $client
                ], 200);
            } else {
                return response()->json([
                    "status" => "failed",
                    "message" => "incorrect_otp"
                ], 400);
            }
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
          
    }

    public function checkAuthencationForClient(){
        try {
            if (Auth::guard('client')->check()) {
                return response()->json([
                    "status" => "success",
                    "message" => "client_loggedin"
                ], 200);
            } else {
                return response()->json([
                    "status" => "success",
                    "message" => "client_not_loggedin"
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "status" => "something_went_wrong",
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function checkExistingUserForClient(Request $request){ 
        $phone = $request->phone;
        $code = $request->code;
        // $check_phone = Client::where('phone', 'LIKE', '%'.$phone.'%')->exists();
        // $check_email = Client::where('email', $request->email)->exists();
 // if($check_phone && !$check_email){
            //         return response()->json([
            //             "status" => "already_exist",
            //             "message" => "phone_already_exist",
            //             "phone from php" => $phone
            //         ]);
            //     }elseif(!$check_phone && $check_email){
            //         return response()->json([
            //             "status" => "already_exist",
            //             "message" => "email_already_exist",
            //             "phone from php" => $phone
            //         ]);
            //     }else{
            //         return response()->json([
            //             "status" => "success",
            //             "message" => "proceed"
            //         ]);
            //     }


        $check_phone = Client::where('phone', 'LIKE', '%'.$phone.'%')->exists();
        if($check_phone){
            return response()->json([
                "status" => "already_exist",
                "message" => "proceed"
            ]);
        }elseif(!$check_phone){
            return response()->json([
                "status" => "not_exist",
                "message" => "proceed"
            ]);
        }
              
    }

    public function sendOtpToLogin(Request $request){
        try { 
            $otp = rand(1000, 9999);  // generating otp
            $user_phone = $request->user_phone ?? '--';
            $user_email = $request->user_email ?? '--';
            $login_method = $request->login_method; 
            if($login_method == "phone"){
                    $check_client_phone = Client::where('phone', $user_phone)->exists();
                    if($check_client_phone){
                        try{
                            $messageBody = "Thank you for choosing JustAirports! ðŸš€\n\nYour verification code is ".$otp.". Please enter this code to verify your phone number and complete the process.";
                            $messages = [
                                [
                                    'source' => 'php',
                                    'body' => $messageBody,
                                    'to' => '+'.$user_phone,
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
                        }catch(\Exception $e){
                            return response()->json([
                                "status" => "failed",
                                "error" => $response
                            ], 400);
                        }
                    Client::where('phone', $user_phone)->update([
                        "phone_otp" => $otp,
                        "phone_otp_timestamp" => Carbon::now()
                    ]);
                    return response()->json([
                        "status" => "otp_sent",
                        "message" => "user_exists",
                        "platform" => "on_phone",
                        "phone" => $user_phone, 
                        // "login_method" => $login_method
                    ], 200);
                    }else{
                        // Client not registered
                        return response()->json([
                            "status" => "not_exists",
                            "message" => "client_not_registered", 
                        ], 200);
                    } 
            }elseif($login_method == "email"){
                $check_client_email = Client::where('email', $user_email)->exists();
                if($check_client_email){
                Client::where('email', $user_email)->update([
                    "email_otp" => $otp,
                    "email_otp_timestamp" => Carbon::now()
                ]);
                $login_otp_data = [
                    "otp" => $otp
                ];  
                Mail::to($request->user_email)->send(new SendLoginOtpMail($login_otp_data));
                return response()->json([
                    "status" => "otp_sent",
                    "message" => "user_exists",
                    "platform" => "on_email", 
                    "email" => $user_email,
                    // "login_method" => $login_method
                ], 200); 
                }else{
                    // Client not registered
                    return response()->json([
                        "status" => "not_exists",
                        "message" => "client_not_registered", 
                    ], 200);
                }
            }
        }catch (\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage(),
            ], 400);
        }
    }

     public function regAccAndSendOTP(Request $request){
        try {
            // ============================== Generate OTP Start ===========================================
            $otp = rand(1000, 9999); 
            // ============================== Generate OTP End ===========================================
            $name = $request->user_name;
            $email = $request->user_email;
            $phone =  $request->user_phone;
 
            $check_phone = Client::where('phone', 'LIKE', '%'.$phone.'%')->exists();
            $check_email = Client::where('email', $email)->exists();
            if($check_phone && !$check_email){
                return response()->json([
                    "status" => "already_registered",
                    "message" => "phone_already_registered",
                    "phone" => $phone,
                ], 200);
            }else if(!$check_phone && $check_email){
                return response()->json([
                    "status" => "already_registered",
                    "message" => "email_already_registered",
                    "phone" => $phone,
                ], 200);
            }else if($check_phone && $check_email){
                return response()->json([
                    "status" => "already_registered",
                    "message" => "client_already_registered",
                    "phone" => $phone,
                ], 200);
            }else{
                // Send OTP
                // ============================== Send OTP Start ===========================================
                $messageBody = "Thank you for choosing JustAirports! 🚀\n\nYour verification code is ".$otp.". Please enter this code to verify your phone number and complete the process.";
                $messages = [
                    [
                        'source' => 'php',
                        'body' => $messageBody,
                        'to' => '+'.$phone,
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
                    $login_otp_data = [
                        "otp" => $otp
                    ];  
                    Mail::to($email)->send(new SendLoginOtpMail($login_otp_data));
                    // ============================== Send OTP End =============================================
                    Client::create([
                        "name" => $name,
                        "phone" => $phone,
                        "email" => $email,
                        "phone_otp" => $otp,
                        "email_otp" => $otp,
                        "phone_otp_timestamp" => Carbon::now(),
                        "email_otp_timestamp" => Carbon::now(),
                        "phone_verified" => 0
                    ]);
                    return response()->json([
                        "status" => "otp_sent",
                        "message" => "user_created", 
                        "phone" => $phone,
                        "email" => $email,
                        "check_email" => $check_email,
                        "check_phone" => $check_phone
                    ], 200);  
                }
        } catch (\Exception $e){
            return response()->json([
                "status" => "something_went_wrong",
                "error" => $e->getMessage()
            ], 400);
        } 
    }

   public function submitLoginOtp(Request $request){
        try{ 
            $user_phone = $request->user_phone;
            $user_email = $request->user_email;
            $otp = $request->otp; 

            if($user_email != ''){
                $client_check = Client::where('email', $user_email)->where('email_otp', $otp)->exists();
                if ($client_check) {
                    Client::where('email', $user_email)->where('email_otp', $otp)->update([
                        'email_otp' => NULL,
                        'email_verified' => 1,
                    ]); 
                    $client = Client::where('email', $user_email)->first(); 
                    
                    $request->session()->regenerate();
                    Auth::guard('client')->login($client);
                    return response()->json([
                        "status" => "success",
                        "message" => "login_success"
                    ], 200); 
            }else{
                return response()->json([
                    "status" => "failed",
                    "message" => "incorrect_otp"
                ], 400);
            } 

            }else{
            $client_check = Client::where('phone', $user_phone)->where('phone_otp', $otp)->exists(); 
            if ($client_check) {
                    Client::where('phone', $user_phone)->where('phone_otp', $otp)->update([
                        'phone_otp' => NULL,
                        'phone_verified' => 1,
                    ]); 
                    $client = Client::where('phone', $user_phone)->first(); 
                    
                    $request->session()->regenerate();
                    Auth::guard('client')->login($client);
                    return response()->json([
                        "status" => "success",
                        "message" => "login_success"
                    ], 200); 
            }else{
                return response()->json([
                    "status" => "failed",
                    "message" => "incorrect_otp"
                ], 400);
            } 
        }
        }catch(\Exception $e){
            return response()->json([
                "status" => "failed",
                "error" => $e->getMessage()
            ], 400);
        }
    }

 


}
