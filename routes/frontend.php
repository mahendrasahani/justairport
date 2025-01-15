<?php
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OnlineBookingController;
use App\Http\Controllers\Frontend\OtherPagesController;

Route::get('/', [HomeController::class, 'home'])->name('frontend.home');
Route::get('about', [HomeController::class, 'about'])->name('frontend.about');
Route::get('airports', [HomeController::class, 'airports'])->name('frontend.airports');
Route::get('contact', [HomeController::class, 'contact'])->name('frontend.contact');
Route::get('term-and-condition', [OtherPagesController::class, 'termAndCondition'])->name('frontend.term_and_condition');
Route::get('general-terms-for-drivers', [OtherPagesController::class, 'generalTermsForDrivers'])->name('frontend.general_terms_for_drivers');
Route::get('privacy-policy', [OtherPagesController::class, 'privacyPolicy'])->name('frontend.privacy_policy');
Route::get('cookie-policy', [OtherPagesController::class, 'cookiePolicy'])->name('frontend.cookie_policy');
Route::post('contact-enquiry', [HomeController::class, 'contactEnquiryStore'])->name('frontend.contact_enquiry_store');
Route::get('profile', [HomeController::class, 'profile'])->name('frontend.profile');
Route::post('profile-submit', [HomeController::class, 'profileSubmit'])->name('frontend.profile_submit');

Route::get('support', [OtherPagesController::class, 'support'])->name('frontend.support');
Route::post('support-submit', [OtherPagesController::class, 'supportEnquirySubmit'])->name('frontend.support_submit');
Route::post('bookingdetails.php', [OnlineBookingController::class, 'confirmBooking'])->name('frontend.confirm_booking');
Route::get('onlinebooking.php', [OnlineBookingController::class, 'onlineBooking'])->name('frontend.online_booking');
Route::post('select-car', [OnlineBookingController::class, 'carsAvailable'])->name('frontend.cars_available');
Route::get('journey-detail/{id}', [HomeController::class, 'journeyDetail'])->name('frontend.journey_detail');
Route::get('driver-vacancy', [DriverController::class, 'driverVacancy'])->name('frontend.driver_vacancy');
Route::post('driver-vacancy-submit', [DriverController::class, 'driverVacancySubmit'])->name('frontend.driver_vacancy_submit');

//php pages start-------------------------------------------------------------------------------------------------------------------------------------
Route::get('tour.php', [OtherPagesController::class, 'phpPageTour'])->name('frontend.php_page.tour'); 
Route::get('prices.php', [OtherPagesController::class, 'phpPagePrices'])->name('frontend.php_page.prices');
Route::get('heathrow-airport-transfer.php', [OtherPagesController::class, 'phpPageHeathroAirportTransfer'])->name('frontend.php_page.heathrow-airport-transfer');
Route::get('gatwick-airport-transfer.php', [OtherPagesController::class, 'phpPageGatwickAirportTransfer'])->name('frontend.php_page.gatwick-airport-transfer');
Route::get('luton-airport-transfer.php', [OtherPagesController::class, 'phpPageLutonAirportTransfer'])->name('frontend.php_page.luton-airport-transfer');
Route::get('stansted-airport-transfer.php', [OtherPagesController::class, 'phpPageStanstedAirportTransfer'])->name('frontend.php_page.stansted-airport-transfer');
Route::get('london-city-airport-transfer.php', [OtherPagesController::class, 'phpPageLondonCityAirportTransfer'])->name('frontend.php_page.london-city-airport-transfer');
Route::get('southend-airport-transfer.php', [OtherPagesController::class, 'phpPageSouthendAirportTransfer'])->name('frontend.php_page.southend-airport-transfer');
Route::get('terms.php', [OtherPagesController::class, 'phpPageTerms'])->name('frontend.php_page.terms'); 
Route::get('privacy.php', [OtherPagesController::class, 'phpPagePrivacy'])->name('frontend.php_page.privacy'); 
//php pages start-------------------------------------------------------------------------------------------------------------------------------------



Route::get('confirm_booking_getCar', [OnlineBookingController::class, 'getUpdatedCar'])->name('frontend.confirm_booking.car_update');
Route::get('confirm_booking_getCarPrice', [OnlineBookingController::class, 'getUpdatedCarPrice'])->name('frontend.confirm_booking.car_update_price');
Route::get('confirm_booking_getCarAvailable', [OnlineBookingController::class, 'getUpdatedCarAvailable'])->name('frontend.confirm_booking.car_update_available');

Route::get('check_slot_available', [OnlineBookingController::class, 'checkSlotAvailable'])->name('frontend.check_slot_available');

Route::get('direct-pay/{ref_id}', [OnlineBookingController::class, 'directPay'])->name('frontend.direct_pay');
// Route::get('direct-pay/{ref_id}/{billing_data?}', [OnlineBookingController::class, 'directPay'])->name('frontend.direct_pay');
Route::get('reg_directpay', [OnlineBookingController::class, 'regDirectpay'])->name('frontend.reg_directpay');

Route::get('check-user-type', [ApiController::class, 'checkUserType'])->name('check_user_type');
Route::get('driver-info/{id}', [HomeController::class, 'driverInfo'])->name('frontend.driver_info');
//emails------------------
Route::get('new_booking_confirmation', [HomeController::class, 'new_booking_confirmation'])->name('new_booking_confirmation');

Route::middleware(['auth:client', 'verified'])->group(function (){
    Route::get('account', [HomeController::class, 'bookingDetails'])->name('frontend.booking_detail');
});

// transfer justairports old table data in new table
// Route::get('test', [HomeController::class, 'testFunction']);

Route::get('login-otp', [HomeController::class, 'loginOtepTest'])->name('test.login_otp');
Route::get('driver-apply-template', [HomeController::class, 'driverApplyTemplate'])->name('test.driver_apply_template');

// Route::get('payment-response',[OnlineBookingController::class, 'paymentResponse'])->name('payment_response');





// ---------------------------------------------------------------------------------------------------------------------
// Route::post('bankfiles/response.php', [OnlineBookingController::class, 'paymentResponse'])->name('payment_response');
// Route are to manually direct payment  (start)
Route::get('directpay.php', [OnlineBookingController::class, 'directPayManual'])->name('frontend.direct_pay_manual');
Route::post('api_direct_pay_check_booking', [OnlineBookingController::class, 'apiDirectPayManualChkBkng'])->name('frontend.api_direct_pay_manual_chk_bkng');
Route::post('api_direct_pay_manual', [OnlineBookingController::class, 'setFormDataApiDirectPayManual'])->name('frontend.set_form_data.api_direct_pay_manual');

Route::get('paymentconfirmation.php', [OnlineBookingController::class, 'paymentConfirmation'])->name('payment_confirmation');  // new to test manual direct payment
// Route are to manually direct payment  (start)
// ---------------------------------------------------------------------------------------------------------------------



Route::post('paymentresponse', [OnlineBookingController::class, 'paymentResponse'])->name('payment_response');
Route::get('payment-success', [OnlineBookingController::class, 'paymentSuccess'])->name('payment_success');
Route::get('payment-failed', [OnlineBookingController::class, 'paymentFailed'])->name('payment_failed');


 

// insert pickup and drop location in job_history table (only for insert use)
// Route::get('insert_from_to_in_job_history', [JobController::class, 'enterDataInJobHistoryFromTo']);









