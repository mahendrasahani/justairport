<?php

use App\Http\Controllers\Auth\CustomAuthencationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\ApiController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Frontend\OnlineBookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/make-new-job', [ApiController::class, 'makeNewJob'])->name('get_new_job');  //hit from postman
Route::get('/get-new-call', [ApiController::class, 'getNewCall'])->name('get_new_call');
Route::get('/update-new-job', [ApiController::class, 'updateNewJob'])->name('update_new_job');
Route::get('/get-job-detail', [ApiController::class, 'getJobDetail'])->name('get_job_detail');

// Route::get('register-user-check', [RegisteredUserController::class, 'registerUserCheck'])->name('frontend.register_user_check');
// Route::get('register-user', [RegisteredUserController::class, 'registerUser'])->name('frontend.register_user');
// Route::get('send-otp', [RegisteredUserController::class, 'sendOtp'])->name('frontend.send_otp');
// Route::get('check-otp', [RegisteredUserController::class, 'checkOtp'])->name('frontend.check_otp');

Route::get('send-otp-to_verify_phone', [CustomAuthencationController::class, 'sendOtpToVerifyPhone'])->name('frontend.send_otp_to_verify_phone');
Route::get('submit-otp-to-verify-phone', [CustomAuthencationController::class, 'submitOtpToVerifyPhone'])->name('frontend.submit_otp_to_verify_phone');
Route::get('check-authencation', [CustomAuthencationController::class, 'checkAuthencationForClient'])->name('frontend.check_authencation_for_client');
Route::get('check_existing_user', [CustomAuthencationController::class, 'checkExistingUserForClient'])->name('frontend.check_existing_user_for_client');
Route::get('send-login-otp', [CustomAuthencationController::class, 'sendOtpToLogin'])->name('frontend.send_login_otp');

Route::middleware(['web'])->group(function () {
Route::get('submit-login-otp', [CustomAuthencationController::class, 'submitLoginOtp'])->name('frontend.submit_login_otp');
Route::post('submit-booking', [OnlineBookingController::class, 'submitBooking'])->name('frontend.submit_booking');
});

Route::get('reg-account-send-opt', [CustomAuthencationController::class, 'regAccAndSendOTP'])->name('frontend.reg_acc_send_otp');

// Route::post('submit-booking', [OnlineBookingController::class, 'submitBooking'])->name('frontend.submit_booking');
Route::get('get_price_on_new_booking', [JobController::class, 'getNewBookingPrice'])->name('frontend.get_price_on_new_booking');
Route::get('get-client-history', [ApiController::class, 'getHistoryWithClientNumber'])->name('frontend.get_history_with_client_number');
// Route::get('send-job-email', [ApiController::class, 'SendJobEmail'])->name('api.send_job_email');

// get airports terminal list with airport id
Route::get('get-terminal-list', [ApiController::class, 'getTerminalList'])->name('api.get_airport_terminal_list');

Route::get('get-address', [ApiController::class, 'getAddress'])->name('frontend.get_address');
Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('/get-history', [ApiController::class, 'getHistory'])->name('getHistory');
    Route::post('/create-new-job', [ApiController::class, 'createNewJob'])->name('create_new_job_api');
    Route::post('/test-api', [ApiController::class, 'testApi'])->name('test-api');
    
    // api for ROCS
    Route::post('/get-client', [ApiController::class, 'getClient'])->name('api.get_client');
    Route::post('/get-account', [ApiController::class, 'getAccount'])->name('api.get_account');
});

Route::get('get_campaign_lead', [ApiController::class, 'getCampaignLead'])->name('api.get_campaign_lead');

Route::post('/get-user', [ApiController::class, 'getUser'])->name('api.get_user');
Route::get('/dummy-api', [ApiController::class, 'dummyApi'])->name('api.dummyApi');

