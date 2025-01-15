<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'username' => ['required', 'string', 'lowercase', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
    public function registerUserCheck(Request $request)
    {
        try {
            $name = $request->name;
            $email = $request->user_email;
            $phone = $request->user_phone;
            $emailExists = User::where('email', $email)->exists();
            $phoneExists = User::where('phone', $phone)->exists();
            return response()->json([
                "status" => "success",
                "email_check" => $emailExists,
                "phone_check" => $phoneExists,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "something_went_wrong",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    public function sendOtp(Request $request)
    {
        try {
            $name = $request->user_name;
            $email = $request->user_email;
            $phone = $request->user_phone;
            $password = rand(100000, 999999);
            // ============================== OTP Send Code Start ===========================================
            $otp = 1234;
            // ============================== OTP Send Code End ===========================================

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'username' => $email,
                'phone' => $phone,
                'password' => Hash::make($password),
                'role_id' => 2
            ]);

            Client::create([
                'name' => $name,
                'phone' => $phone,
                'mobile' => $phone,
                'email' => $email,
                'mobile_verified' => 0,
                'email_verified' => 0,
                'mobile_otp' => $otp,
                'mobile_otp_timestamp' => Carbon::now(),
                'user_id' => $user->id
            ]);

            return response()->json([
                "status" => "otp_sent",
                "phone" => $phone
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                "status" => "something_went_wrong",
                "error" => $e->getMessage()
            ], 400);
        }
    }

    // public function checkOtp(Request $request){
        //     $user_phone = $request->user_phone;
        //     $otp = $request->otp;
        //     $user_check = User::where('phone', $user_phone)->first();
        //     if ($user_check != null) {
        //         $client_check = Client::where('user_id', $user_check->id)->where('mobile_otp', $otp)->exists();
        //         if ($client_check) {
        //             Client::where('phone', $user_phone)->where('mobile_otp', $otp)->update([
        //                 'mobile_otp' => NULL,
        //                 'mobile_verified' => 1,
        //             ]);
        //             event(new Registered($user_check));
        //             Auth::login($user_check);
        //             return response()->json([
        //                 "status" => "success",
        //                 "message" => "login_success"
        //             ], 200);
        //         } else {
        //             return response()->json([
        //                 "status" => "failed",
        //                 "message" => "incorrect_otp"
        //             ], 400);
        //         }
        //     } else {
        //         return response()->json([
        //             "status" => "failed",
        //             "message" => "user_not_found"
        //         ], 400);
        //     }

    // }

    // public function sendOtpToLogin(Request $request)
    // {
    //     try {
    //         $user_phone = $request->user_phone;
    //         // ============================== Generate OTP Start ===========================================
    //         $otp = 1234;
    //         // ============================== Generate OTP End ===========================================
    //         $user_check = User::where('phone', $user_phone)->first();
    //         if ($user_check != NULL) {
    //             if ($user_check->role_id == 2) {
    //                 // ============================== Send OTP Start ===========================================
    //                 // ============================== Send OTP End =============================================
    //                 $check_client = Client::where('user_id', $user_check->id)->exists();
    //                 if (!$check_client) {
    //                     $client = Client::create([
    //                         'name' => $user_check->name,
    //                         'phone' => $user_check->phone,
    //                         'mobile' => $user_check->phone,
    //                         'email' => $user_check->email,
    //                         'mobile_verified' => 0,
    //                         'user_id' => $user_check->id,
    //                     ]);
    //                 }
    //                 Client::where('user_id', $user_check->id)->update([
    //                     'mobile_otp' => $otp,
    //                     'mobile_otp_timestamp' => Carbon::now()
    //                 ]);
    //                 return response()->json([
    //                     "status" => "success",
    //                     "message" => "otp_sent"
    //                 ], 200);
    //             } else {
    //                 return response()->json([
    //                     "status" => "success",
    //                     "message" => "not_user"
    //                 ], 200);
    //             }
    //         } else {
    //             // ===============================================
    //             $user = User::create([
    //                 'name' => $request->user_name,
    //                 'email' => $request->user_email,
    //                 'username' => $request->user_email,
    //                 'phone' => $request->user_phone,
    //                 'password' => Hash::make($request->user_email),
    //                 'role_id' => 2
    //             ]);
    //             Client::create([
    //                 'name' => $request->user_name,
    //                 'phone' => $request->user_phone,
    //                 'mobile' => $request->user_phone,
    //                 'email' => $request->user_email,
    //                 'mobile_verified' => 0,
    //                 'email_verified' => 0,
    //                 'mobile_otp' => $otp,
    //                 'mobile_otp_timestamp' => Carbon::now(),
    //                 'user_id' => $user->id
    //             ]);

    //             // =============================================== 
    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "new user created"
    //             ], 400);
    //         }

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             "status" => "failed",
    //             "error" => $e->getMessage()
    //         ], 400);
    //     }

    // }

    // public function checkAuthencation()
    // {
    //     try {
    //         if (Auth::check()) {
    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "user_loggedin"
    //             ], 200);
    //         } else {
    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "user_not_loggedin"
    //             ], 200);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             "status" => "something_went_wrong",
    //             "message" => $e->getMessage()
    //         ], 400);
    //     }
    // }

    // public function sendOtpToVerifyPhone(Request $request)
    // {
    //     try {
    //         $user_phone = $request->user_phone;
    //         // ============================== Generate OTP Start ===========================================
    //         $otp = 1234;
    //         // ============================== Generate OTP End ===========================================
    //         $user_check = User::where('phone', $user_phone)->first();
    //         if ($user_check != NULL) {
    //             if ($user_check->role_id == 2) {
    //                 // ============================== Send OTP Start ===========================================
    //                 // ============================== Send OTP End =============================================
    //                 $check_client = Client::where('user_id', $user_check->id)->exists();
    //                 if (!$check_client) {
    //                     $client = Client::create([
    //                         'name' => $user_check->name,
    //                         'phone' => $user_check->phone,
    //                         'mobile' => $user_check->phone,
    //                         'email' => $user_check->email,
    //                         'mobile_verified' => 0,
    //                         'user_id' => $user_check->id,
    //                     ]);
    //                 }
    //                 Client::where('user_id', $user_check->id)->update([
    //                     'mobile_otp' => $otp,
    //                     'mobile_otp_timestamp' => Carbon::now()
    //                 ]);
    //                 return response()->json([
    //                     "status" => "success",
    //                     "message" => "otp_sent",
    //                     "user_type" => "existing_user",
    //                     "user_data" => $user_check
    //                 ], 200);
    //             } else {
    //                 return response()->json([
    //                     "status" => "success",
    //                     "message" => "not_user"
    //                 ], 200);
    //             }
    //         } else {
    //             // ===============================================
    //             $user = User::create([
    //                 'name' => $request->user_name,
    //                 'email' => $request->user_email,
    //                 'username' => $request->user_email,
    //                 'phone' => $request->user_phone,
    //                 'password' => Hash::make($request->user_email),
    //                 'role_id' => 2
    //             ]);
    //             Client::create([
    //                 'name' => $request->user_name,
    //                 'phone' => $request->user_phone,
    //                 'mobile' => $request->user_phone,
    //                 'email' => $request->user_email,
    //                 'mobile_verified' => 0,
    //                 'email_verified' => 0,
    //                 'mobile_otp' => $otp,
    //                 'mobile_otp_timestamp' => Carbon::now(),
    //                 'user_id' => $user->id
    //             ]);
    //             // =============================================== 
    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "otp_sent",
    //                 "user_type" => "new_user",
    //                 "user_data" => $user
    //             ], 400);
    //         }

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             "status" => "failed",
    //             "error" => $e->getMessage()
    //         ], 400);
    //     }

    // }
    // public function checkOtpToVerifyPhoneViaOTP(Request $request)
    // {
    //     $user_phone = $request->verify_phone_otp;
    //     $otp = $request->verify_otp;
    //     $user_check = User::where('phone', $user_phone)->first();
    //     if ($user_check != null) {
    //         $client_check = Client::where('user_id', $user_check->id)->where('mobile_otp', $otp)->exists();
    //         if ($client_check) {
    //             Client::where('phone', $user_phone)->where('mobile_otp', $otp)->update([
    //                 'mobile_otp' => NULL,
    //                 'mobile_verified' => 1,
    //             ]);
    //             event(new Registered($user_check));
    //             Auth::login($user_check);
    //             return response()->json([
    //                 "status" => "success",
    //                 "message" => "login_success",
    //                 "user_data" => $user_check
    //             ], 200);
    //         } else {
    //             return response()->json([
    //                 "status" => "failed",
    //                 "message" => "incorrect_otp"
    //             ], 400);
    //         }
    //     } else {
    //         return response()->json([
    //             "status" => "failed",
    //             "message" => "user_not_found"
    //         ], 400);
    //     }

    // }

}



