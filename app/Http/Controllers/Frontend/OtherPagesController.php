<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use App\Models\Backend\Job;
use App\Models\backend\SupportEnquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtherPagesController extends Controller
{
    public function support(){
        // $user = User::where('id', Auth::guard('client')->user()->id)->first();
        $client = Client::where('id', Auth::guard('client')->user()->id)->first(); 
        $bookings =  Job::with('getAirport:id,airport_name')->where('client_id', $client->id)->get();  
        return view('frontend.support', compact('bookings'));
    }

    public function supportEnquirySubmit(Request $request){
        $validate = $request->validate([    
            "name" => "required",
            "email" => "required|email",
            "message" => "required"
        ]); 
         $name = $request->name;
         $email = $request->email;
         $booking =  $request->booking;
         $message = $request->message;

         SupportEnquiry::create([
            'name' => $name,
            'email' => $email,
            'job_id' => $booking,
            'message' => $message,
            'user_id' => Auth::user()->id,
            'status' => 1
         ]);

         return redirect()->back()->with('support_enquiry_submitted', 'Your enquiry has been submitted successfully !');
    }  
    
    
    public function termAndCondition(){
        return view('frontend.term_and_condition');
    }

    public function generalTermsForDrivers(){
        return view('frontend.general_terms_for_drivers');
    }

    public function privacyPolicy(){
        return view('frontend.privacy_policy');
    }

    public function cookiePolicy(){
        return view('frontend.cookie_policy');
    }
    
     
    
    // .php pages start------------------------------------------------------------------------------------------------------------------------------------------------
     public function phpPageTour(){
        return view('frontend.php_pages.tour');
    }
    
     public function phpPagePrices(){
        return view('frontend.php_pages.prices');
    }
     public function phpPageHeathroAirportTransfer(){
        return view('frontend.php_pages.heathrow-airport-transfer');
    }
     public function phpPageGatwickAirportTransfer(){
        return view('frontend.php_pages.gatwick-airport-transfer');
    }
     public function phpPageLutonAirportTransfer(){
        return view('frontend.php_pages.luton-airport-transfer');
    }
     public function phpPageStanstedAirportTransfer(){
        return view('frontend.php_pages.stansted-airport-transfer');
    }
     public function phpPageLondonCityAirportTransfer(){
        return view('frontend.php_pages.london-city-airport-transfer');
    }
     public function phpPageSouthendAirportTransfer(){
        return view('frontend.php_pages.southend-airport-transfer');
    }
     public function phpPageTerms(){
        return view('frontend.php_pages.terms');
    }
    
     public function phpPagePrivacy(){
        return view('frontend.php_pages.privacy');
    }
    
    
    // .php pages end------------------------------------------------------------------------------------------------------------------------------------------------
}
