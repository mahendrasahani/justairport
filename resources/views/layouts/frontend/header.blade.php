<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta-tags')
     <meta property="og:title" content="Just Airports™ | Best London Airport Transfer Service" />
  <meta property="og:description" content="Just Airports is a top airport transfer taxi service in London" />
  <meta property="og:site_name" content="Just Airports" />
  <meta property="og:image" content="{{ url('public/assets/frontend/imgs/page/homepage2/justairportlogo.png') }}"  >
        <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="canonical" href="https://test.justairports.com/" /> 
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/assets/frontend/imgs/page/homepage2/justairportlogo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ url('public/assets/frontend/css/stylee209.css?v=1.0.0') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('public/assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/frontend/css/index-4.css') }}">
    <link rel="stylesheet" href="{{url('public/assets/frontend/css/international-telephone-input.css')}}">
    <script rel="preload" src="https://kit.fontawesome.com/8b7ad2abb9.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
     <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NQMDK2LP');</script>
<!-- End Google Tag Manager -->
    
</head>
<style>


    input.nav-link {
        font-size: 14px;
    }
    .header {
        background-color: white !important;
    }
    #mainNavbar {
        padding: 0 30px;
    }
    .box-list-how ul li {
        padding-right: 0px !important;

    }
    
    .radio-btn-group {
        margin-bottom: 5px;
        display: flex; 
        margin-top: 10px;
        justify-content: flex-start;
        align-items: center;
    }
    .radio-btn-group label {
        display: inline-block;
        margin-bottom: 5px;
        margin-right: 10px;
        cursor: pointer;
    }
    .select2-container .select2-selection--single {
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 8px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 40px;
        display: flex;
        align-items: center;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .select2-container--default .select2-results>.select2-results__options {
        max-height: 300px;
        overflow-y: auto;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        height: 40px;
        line-height: 40px;
    }
    .nav-link,
    .logout {
        border: none;
        background-color: transparent;
        border: none;
    }
    .iti input {
        border: none;
    }
    .iti .form-control {
        border: 1px solid #ABABAB !important;
    }
    .phone-btn>.flag-container>.selected-flag {
        height: 105% !important;
    }
    .form-control:focus {
        border-color: #181A1F !important;
    }
       .placeholders::placeholder {
        visibility: hidden;
    }
    .iti--separate-dial-code .iti__selected-flag {
     background-color: rgba(0, 0, 0, 0.0); 
}
    .iti__selected-flag:hover {
     background-color: rgba(0, 0, 0, 0.0); 
}
</style>
<body>
    
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQMDK2LP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="page-loading">
            <div class="page-loading-inner">
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <header class="header">
        <div class="top_header">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12 col-md-6 header-right">
                        <ul><li>PROVIDING PREMIUM LONDON AIRPORT TRANSFERS</li></ul>
                    </div>
                    <div class="col-12 col-md-6 header-left">
                        <ul class="contact_info">
                            <li class="mail-text"><a href="mailto:webbookings@justairports.com"><i class="fa-regular fa-envelope"></i> webbookings@justairports.com</a></li>
                            <li class="btn btn-link text-white" style="background: #EB1B25;padding: 2px 8px;"><a href="tel: +44 208 900 1666"><i class="fa-solid fa-phone"></i>+44 208 900 1666</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary " id="mainNavbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('frontend.home') }}">
                    <img src="{{ url('public/assets/frontend/imgs/page/homepage2/justairportlogo.webp') }}" alt=" Just Airport logo" width="153" height="55"/>
                </a>
                <button class="navbar-toggler" type="button" onclick="handleNav()">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <ul class="navbar-nav topnav main-menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('frontend.home') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://booking.justairports.com/">GET QUOTE</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.about') }}">ABOUT US</a>
                    </li> 
                    <li class="has-children nav-item">
                        <a class="nav-link" href="#">MORE <i class="fa-solid fa-caret-down" style="margin-right: 0;margin-left: 8px;"></i></a>
                        <ul class="sub-menu" id="more_submenu">
                            <li class="col-md-6 col-6 "> <a href="{{ route('frontend.driver_vacancy') }}">CAREER</a></li>
                            <li><a href="{{ route('frontend.online_booking') }}">ONLINE BOOKING</a></li>
                            <li><a href="{{ route('frontend.airports') }}">AIRPORTS</a></li>
                            <li><a href="{{ route('frontend.contact') }}">CONTACT US</a></li>
                             @if(Auth::guard('client')->check())
                             <li><a href="{{ route('frontend.booking_detail') }}">ACCOUNT</a></li>
                             @endif
                        </ul>
                    </li> 
                    <li class="nav-item" id="login_logout_btn">
                        @if (Auth::guard('client')->check())
                            <!-- <a class="nav-link" href="{{route('logout_client')}}" id="login_modal"><i class="fa-regular fa-circle-user"></i>LOGOUT</a> -->
                             <form method="POST" action="{{ route('logout_client') }}">
                                @csrf
                                <div class="d-flex  justify-content-center align-items-center">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <input type="submit" class="nav-link logout-text" value="LOGOUT"
                                        style="border:none;background:transparent">
                                </div>
                            </form>  
                        @else
                            <a class="nav-link" href="#" id="login_modal"><i class="fa-regular fa-circle-user"></i>LOGIN</a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </header> 
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" id="login_page">
                    <h1 style="font-size: 40px;">LOGIN</h1>
                    <p class="red_border_line mt-5"></p>
                    <form id="login_form" action="" onsubmit="return handleLogin()">
                        <p>Enter your mobile number and email to login</p>
                        <div class="radio-btn-group">
                            <label><input type="radio" name="login_method" value="email" checked>Email</label>
                            <label><input type="radio" name="login_method" value="phone">Phone Number</label>
                        </div>
                        <p id="login_phone_error" style="color:red"></p>
                        <div class="form-group mt-25" id="emailInputGroup" >
                            <input class="form-control" id="login_email" type="email" placeholder="Email Address"
                                name="login_email" required />
                            <p id="login_email_error" style="color:red;"></p>
                            <p id="emailError" style="color:red;"></p>
                        </div> 
                        <!-- <div class="form-group mt-25">
                            <input class="form-control" id="login_phone_number" type="number" value="" placeholder="Mobile Number" oninput="validateInput(this)" maxlength="15" />
                            <p id="login_phone_error" style="color:red;"></p>
                        </div>   --> 

                        <div class="form-group phone-btn iti" id="phoneInputGroup" >
                           <div class="d-flex gap-2">
                                <input class="form-control p-1 placeholders" type="tel" id="login_country_code" required
                                    style="width:80px">
                                <input class="form-control p-1" id="login_country_number" type="hidden" readonly>
                                <input class="form-control" id="login_phone_number" type="tel"
                                    placeholder="Mobile Number" name="phone_number" required maxlength="14"
                                    minlength="3">
                            </div>
                            <p id="login_phone_error" style="color:red"></p>
                            <p id="phoneError" class="error-message"></p>
                        </div> 
                        <button class="quote_btn mt-3 w-100" style="height: 48px; align-items: center; padding: 0 11px;"
                            id="send_otp" type="button">
                            SEND OTP<i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </form>
                    <h6 class="mt-25">Don’t have an account? You can <a style="color: #EB1B25;" href="#" id="signup_btn">SIGN UP HERE</a></h6>
                </div>

                <div class="modal-body" id="otp_page">
                    <button type="button" id="back_btn"><img src="assets/imgs/page/homepage2/arrow_forward.webp" alt="GO BACK" style="display:none">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> GO BACK</button>
                    <form id="otp_form" action="">
                        <p class="red_border_line mt-5"></p>
                        <p>Enter OTP in login</p>
                        <div class="form-group mt-25">
                            <input type="hidden" name="otp_phone" id="otp_phone">
                            <input type="hidden" name="otp_email" id="otp_email">
                            <input class="form-control " id="login_otp" type="number" value="" placeholder="Enter OTP" name="login_otp" />
                            <p id="login_otp_error" style="color:red;"></p>
                        </div>
                        <button class="quote_btn mt-3  " style="height: 48px; align-items: center; padding: 0 11px;"
                            type="button" id="submit_otp_btn">
                            SUBMIT<i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </form>
                    <h6 class="mt-25">Don’t have an account? You can <a style="color: #EB1B25;" href="#"
                            id="otp_signup_btn">SIGN UP HERE</a></h6>
                </div>

                <div class="modal-body" id="register_page">
                    <div class="register-main">
                        <h1 style="font-size: 40px;">SIGN UP</h1>
                        <p class="red_border_line mt-5"></p>
                        <p class="mt-25">Fill the details to create an account</p>
                        <div class="form-group mt-25">
                            <input class="form-control" id="reg_user_name" type="text" placeholder="Full Name"
                                name="user_name" />
                            <p id="reg_name_error" style="color:red;"></p>
                        </div>

                        <div class="form-group mt-25">
                            <input class="form-control" id="reg_user_email" type="email" placeholder="Email Address"
                                name="user_email" />
                            <p id="reg_email_error" style="color:red;"></p>
                        </div>

                        <!-- <div class="form-group mt-25">
                                        <input class="form-control" id="user_phone" type="number" placeholder="Mobile Number"
                                            name="user_phone" oninput="validateInput(this)" maxlength="10" />
                                        <p id="phone_error" style="color:red;"></p>
                                    </div> -->

                        <div class="form-group phone-btn iti">
                             <div class="d-flex gap-2">
                                <input class="form-control p-1 placeholders" type="tel" id="signup_country_code"
                                    required style="width:80px">
                                <input class="form-control p-1" id="signup_country_number" type="hidden" readonly>

                                <input class="form-control" id="reg_user_phone" type="tel" placeholder="Mobile Number"
                                    name="user_phone" maxlength="14" minlength="3" required>
                            </div>
                            <p id="reg_phone_number_error" style="color:red"></p>
                        </div>

                        <button class="quote_btn mt-3 w-100" style="height: 48px; align-items: center; padding: 0 11px;"
                            type="button" id="register_btn">
                            CREATE ACCOUNT<i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>