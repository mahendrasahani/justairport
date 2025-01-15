@extends('layouts/frontend/main')
@section('main-section')
@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Comfortaa:400,700,300');
        
        .spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 24px;
            height: 24px;
            margin-top: -12px;
            margin-left: -12px;
            border: 3px solid #ff0000;
            border-top: 3px solid #6a1b9a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        /* animtion */

        .active_luggage {
            background-color: red;
            color: white;
        }
        .inactive_luggage {
            background-color: white;
            color: black;
        }
        .active_luggage {
            background-color: red;
            color: white;
        }
        .inactive_luggage {
            background-color: white;
            color: black;
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

        .parent-div {
            position: relative;
            width: 100%;
            border: 1px solid rgb(29, 29, 116);
            height: 50px !important;
            border-radius: 25px;
            display: flex;

        }

        .parent-div>div {
            width: 50%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: gray !important;
        }

        .active1 {
            height: 100%;
            width: 100%;
            background-color: #EB1B25;
            border-radius: 25px;
            padding: 10px;
            cursor: pointer;
            display: flex;
            color: white;
            align-items: center;
            justify-content: center;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

        }

        span {
            color: lightblack;
        }

        .icon {
            transform: rotate(-47deg);
        }
        .icon1 {
            transform: rotate(40deg);

        }
        .profile_container {
            width: 100%;
            height: 100%;
        }

        .whatsapp-float {
            position: fixed;
            display: flex;
            align-items: end;
            /* justify-items: end; */
            justify-content: flex-end;
            right: 10px;
            bottom: 20px;
            /* Adjust as per your layout */
            z-index: 1000;
            /* Ensure it's above other elements */
        }

        .whatsapp {
            width: 50px;
            height: 50px;
        }
        .profile_title {
            font-size: 40px;
        }
        .profile_container_content {
            width: 907px;
            height: 72px;
        }
        .profile_container_content_text {
            width: 223px;
            height: 72px;
            font-size: 16px;
            color: #000000;
        }

        .profile {
            background-color: #FFFFFF;
        }
        .iti__selected-flag{background-color: transparent !important;}
        
        .banner_side_box h1 {
    font-size: 40px;
    font-weight: 800;  line-height: 50px;}
        @media (max-width:600px){
            .banner_container{background-image:none; !important;}
            .p00mobile{}
             .banner_container {padding: 7px !important;}
             .margin_top_element{margin-top:0px !important};
             .top_mobile_view{margin-top: 6px !important;}
             .top_element_margin{margin-top:20px;}
             .banner_side_box{display:none;}
        }
    </style> 
    <!-- success conform-booking modal --> 
<main class="main"><section><div class="fade modal" id="thankyou_modal_confirm" aria-hidden="true" aria-labelledby="exampleModalLabel" tabindex="-1"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="p-4 m-4 modal-body"><div class="d-flex align-items-center justify-content-between"><div style="color:#000;font-size:25px;font-weight:800;font-family:'Gill Sans','Gill Sans MT',Calibri,'Trebuchet MS',sans-serif">THANK YOU FOR BOOKING</div><div style="border-radius:50%;padding:10px;background:#009951;width:30px;height:30px;display:flex;align-items:center;justify-content:center"><i class="fa-solid fa-check text-white"></i></div></div><div><p class="mt-3 p-2" class="mt-3 mb-1" style="font-family:'Zilla Slab';font-weight:400;font-style:normal">You will receive a confirmation in 2 hours. Or, Alternatively, Call us on our toll free number +44 208 900 1666<p class="mt-3 p-2" style="color:#2a2867;background-color:#f3f3f3;font-size:14px;font-family:Zilla Slab,serif;font-weight:400;font-style:normal">IF YOU DON’T RECEIVE EMAIL FROM US WITHIN 20 MINUTES, KINDLY CHECK YOUR SPAM FOLDER OR, KINDLY CONTACT US ON webbookings@justairports.com</div><div class="mt-4 semi-bold"><b>CONTINUE TO HOMEPAGE</b><i class="fa-solid fa-arrow-right"></i></div></div></div></div></div></section><section class="section banner_container mb-lg-40 p-10 p-25"><div class="container-xl"><div class="row"><div class="banner_box col-3 col-lg-4 col-xxl-3" style="background-color:#f5f5f5"><div class="w-100 banner-text1"><h5>CHOOSE YOUR JOURNEY TYPE</h5><form action="{{ route('frontend.cars_available') }}" class="gap-2 flex-column to_airport_form" id="to_airport_form" method="POST">@csrf<div class="parent-div parent-div1"><div id="to-airport" onclick="toggleField()"><label class="d-flex align-items-center gap-3 justify-content active1 col-sm-gap-2" id="to_btn"><input type="radio" class="btn-check" name="journey_type" value="to_airport" checked="checked"><i class="fa fa-plane icon" aria-hidden="true"></i><span>TO AIRPORT</span></label></div><div id="from-airport" onclick="toggleField()"><label class="d-flex align-items-center gap-3 justify-content airport-icone inactive1 md-gap-1" id="from_btn"><input type="radio" class="btn-check" name="journey_type" value="from_airport"><i class="fa fa-plane icon1" aria-hidden="true"></i><span>FROM AIRPORT</span></label></div></div><div id="section1"><div class="select_container" id="airport_div"><h6 class="mt-15 droptext top_mobile_view">PICK-UP LOCATION</h6><select class="select_box" id="location_select" name="location_select" required><option value="">Select Location</option>{{--<optgroup label="-----------------------" style="color:#00c"></optgroup>--}} @foreach ($postcodes as $postcode)<option value="{{ $postcode->postcode }}">{{ $postcode->postcode }} - {{ $postcode->name }}</option>@endforeach</select></div><div class="select_container" id="location_div"><h6 class="mt-15 banner-hedding">SELECT AIRPORT</h6><select class="select_box" id="airport_select" name="airport" required><option value="" selected="selected">Select Airport</option>@if (count($airports) > 0) @foreach ($airports as $airport)<option value="{{ $airport->id }}">{{ $airport->airport_name }}</option>@endforeach @endif</select></div><div class="select_container"><h6 class="mt-15 banner-hedding">PASSENGERS</h6><input type="number" class="select_box passenger_number" name="passenger_count" value="1"></div><div class="select_container"><h6 class="mt-15 banner-hedding">NUMBER</h6><div class="d-flex gap-2"><input type="tel" class="select_box" id="country_code"> <input type="hidden" name="country_code" required id="country_number" readonly="readonly"> <input type="number" class="select_box passenger_number" name="passenger_phone" required></div></div></div><button class="quote_btn" id="quote_btn">GET A QUOTE<i class="fa-solid fa-arrow-right"></i></button><div><p>We accept all major credit cards</p><img alt="cards" height="32" src="{{ url('public/assets/frontend/imgs/page/homepage2/cards.webp') }}" width="228"></div></form></div></div><div class="col-9 col-lg-8 col-xxl-9 getbest"><div class="banner_side_box"><h1 class="text-white">GET THE BEST PRICE!</h1><p class="red_border_line mt-5"><h6 class="text-white mb-2 mt-2" style="font-size:18px;font-weight:400">Justairports promises to offer best prices possible to all its customers. We DO NOT increase prices for peak Hours or Holiday season.</h6></div></div></div></div></section><section class="pt-20"><div class="container-xl"><div class="row"><p class="zilla-slab-regular">For more than 20 years ago, Just Airports Transfers have been providing premium chauffeur services between airports across the United Kingdom. Our clients most often require airport transfers to and from the airports of<b>London Heathrow Airport (LHR), London Stansted Airport (STN), London Luton Airport (LTN), London Gatwick Airport (LGW), London City Airport (LCY) and Southend Airport (SEN)</b>.</p></div></div></section><section class="section pt-40 pt-lg-40"><div class="container-xl"><h2 class="easy-online-booking">EASY ONLINE BOOKING</h2><p class="zilla-slab-regular">We accept payment from bank across the world. Our Customer's can choose to pay by cash or they can choose Debit / Credit card from any part of the world. BOOK NOW<div class="box-list-how margin_top_element mt-50"><ul><li><div class="cardWork"><div class="booking_img cardImage"><img alt="Just Airports" height="72" src="{{ url('public/assets/frontend/imgs/page/homepage2/air.webp') }}" width="72"></div><div class="cardTitle"><h5 class="color-text text-18">CHOOSE YOUR<br>JOURNEY TYPE</h5></div></div><li class="line"><img alt="JOURNEY TYPE" height="11" src="{{ url('public/assets/frontend/imgs/page/homepage2/line.webp') }}" width="290"><li><div class="cardWork"><div class="booking_img cardImage"><img alt="luxride" height="35" src="{{ url('public/assets/frontend/imgs/page/homepage2/car.webp') }}" width="72"></div><div class="cardTitle"><h5 class="color-text text-18">SELECT THE VEHICLE<br>AVAILABLE</h5></div></div><li class="line"><img alt="SELECT THE VEHICLE" height="11" src="{{ url('public/assets/frontend/imgs/page/homepage2/line.webp') }}" width="290"><li><div class="cardWork"><div class="booking_img cardImage"><img alt="Car Booking" height="72" src="{{ url('public/assets/frontend/imgs/page/homepage2/calender.webp') }}" width="72"></div><div class="cardTitle"><h5 class="color-text text-18">COMPLETE YOUR<br>BOOKING</h5></div></div></ul></div></div></section><section class="section mb-20 pt-30"><div class="container-xl"><div class="row align-items-center"><div class="col-7 col-lg-6"><h2 class="heading-44-medium mb-10 title-fleet" style="font-weight:800!important">OUR FLEET</h2></div><p class="zilla-slab-regular">We have a large fleet of standard and executive cars to meet your travel requirements. Our cars range from standard family sized Saloons (Sedans) to People Carriers (MPVs) and Minivans for larger groups.<p class="zilla-slab-regular">Each car is fitted with the latest in satellite navigation technology to ensure only the most efficient route is taken on the day.<div class="container-xl"><div class="d-flex car-box-main mb-4 mt-4 p-0">@foreach($cars as $car)<div class="car-box-col"><div class="d-flex fleet_container"><img alt="Fleet" height="86" src="{{ url('public/'.$car->image_path.'/'.$car->image) }}" width="192"><div class="luggage_container"><h4>{{$car->name}}</h4><ul class="luggage_box"><li><span>Passenger</span><span class="passger-coun">X {{$car->passenger_count}}</span><li><span>Check-in Luggage</span><span class="passger-coun">X {{$car->checkin_luggage}}</span><li><span>Hand Luggage</span><span class="passger-coun">X {{$car->hand_luggage}}</span></ul></div></div></div>@endforeach</div></div></div></div></section><section class="position-relative customer_support" style="z-index:1;top:0"><div class="container-xl bg-dark customer_section rounded-2" style="box-shadow:0 8px 20px 0 #00000033"><div class="row"><div class="col-md-8 customer-hedding p-4"><h2>24/7 CUSTOMER SUPPORT</h2><p class="red_border_line"><h6>Justairprots is open 24 hours and 365 days. We will serve you any day and time of the year. We will give support over phone and email round the clock all year through.</h6><div class="mt-2 customer_icon"><i class="fa-solid fa-phone"></i><span>+44 208 900 1666,</span><span>+44 208 900 1333</span></div></div><div class="col-md-4 p-0"><img alt="customer " height="226" src="{{ url('public/assets/frontend/imgs/page/homepage2/customer_img.webp') }}" width="470" class="w-100"></div></div></div></section><section class="position-relative align-items-end facility_section pre-chauff"><div class="container-xl"><div class="row facility_container top_element_margin"><div class="col-md-4"><div class="row facility_box"><p class="col-md-3 facility_img_box"><img alt="Driver" height="85" src="{{ url('public/assets/frontend/imgs/page/homepage2/driver_vector.webp') }}" width="71" class="facility_img"><div class="col-md-8 services_heading"><h5>Premium Chauffer Services</h5><p>Between airports across the United Kingdom</div></div></div><div class="col-md-4"><div class="row facility_box"><p class="col-md-3 facility_img_box"><img alt="Car" height="22" src="{{ url('public/assets/frontend/imgs/page/homepage2/car_vector.webp') }}" width="91" class="facility_img"><div class="col-md-8 services_heading"><h5>Wide range of luxury vehicles</h5><p>We have a wide fleet of luxury vehicles including saloons, estates, MPVs, minivans, minibuses, and limousines.</div></div></div><div class="col-md-4"><div class="row facility_box"><p class="col-md-3 facility_img_box"><img alt="Clock" height="87" src="{{ url('public/assets/frontend/imgs/page/homepage2/clock_vector.webp') }}" width="71" class="facility_img"><div class="col-md-8 services_heading"><h5>Premium Chauffer Services</h5><p>Save time and stress by allowing Just Airports Transfers to expertly manage all your airport journeys.</div></div></div></div></div></section><section class="container-xl mb-25 mb-lg-50 mt-30 mt-lg-56"><div><p>Cancelation of your booking is your right. We allow free of cost airport transfer booking cancelations. You can cancel your booking 4 hours prior to your pickup for free of cost. Any cancelations after that will attract a charge of £20 + parking charges (if any paid by driver). Our pre-booked airport transfer cars cancelations are hassle free.<p>Any amount paid in advance will be refunded to your account or card immediately in full if there are no dues on your side. It takes approximate up to 7 days for the amount to reflect on your statement or depending on your Bank’s policy. All card payments are taken on very secure network.</div></section><div class="wthsappSection"><a class="whatsapp-float" href="https://wa.me/+442089001333" target="_blank"><img alt="Whatsapp" height="24" src="{{ url('public/assets/frontend/imgs/page/homepage2/whatsapp-img.webp') }}" width="24" class="whatsapp"></a></div></main>
@section('javascript-section') 
 @if (Session::has('booking_confirmed'))
        <script>
        
            $(document).ready(function() {
                $('#thankyou_modal_confirm').modal('show');
            });
            
        </script>
    @endif
  
    <script>
        $(document).ready(async function() {
            const url = "http://localhost/justairports/api/get-user";
            const token =
            "3|eEThFFAkJJyE9DCO6Cft0kXPF8aEi4IcYGlhWuCL3bc28278";
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${token}`
                },
                body: JSON.stringify({
                    username: 'admin'
                })
            });
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const responseData = await response.json();
        });
    </script>
    <script>
        document.getElementById('price_breakdown_link').addEventListener('click', function() {
            var priceBreakdownDetails = document.getElementById('price_breakdown_details');
            if (priceBreakdownDetails.style.display === 'none') {
                priceBreakdownDetails.style.display = 'block';
            } else {
                priceBreakdownDetails.style.display = 'none';
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var priceBreakdownLink = document.getElementById('price_breakdown_link');
            var priceBreakdownDetails = document.getElementById('price_breakdown_details');
            priceBreakdownLink.addEventListener('mouseenter', function() {
                priceBreakdownDetails.style.display = 'block';
            });
            priceBreakdownLink.addEventListener('mouseleave', function() {
                priceBreakdownDetails.style.display = 'none';
            });
            priceBreakdownDetails.addEventListener('mouseenter', function() {
                priceBreakdownDetails.style.display = 'block';
            });
            priceBreakdownDetails.addEventListener('mouseleave', function() {
                priceBreakdownDetails.style.display = 'none';
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#quote_btn").html(`GET A QUOTE <i class="fa-solid fa-arrow-right"></i>`);
            $('[data-bs-toggle="popover"]').popover();
        });
    </script>
    <script>
        $(window).on("pageshow", function() {
        $("#quote_btn").html(`GET A QUOTE <i class="fa-solid fa-arrow-right"></i>`);
    });
    </script>
    <script>
        function toggleField(){
            let selectedValue = document.querySelector('input[name="journey_type"]:checked').value;
            let section1 = document.getElementById('section1');
            let section2 = document.getElementById('section2');
            let toBtn = document.getElementById('to_btn');
            let fromBtn = document.getElementById('from_btn');
            if (selectedValue === 'to_airport') {
                $('#airport_label').text('SELECT AIRPORT');
                $('#location_label').text('PICK-UP LOCAT');
                $('#airport_div').insertBefore('#location_div');
                 $('.droptext').text('PICK-UP LOCATION');
                toBtn.classList.add('active1');
                toBtn.classList.remove('inactive1');
                fromBtn.classList.add('inactive1');
                fromBtn.classList.remove('active1');
            } else if (selectedValue === 'from_airport') {
                $('#airport_label').text('PICK-UP LOCATION');
                $('#location_label').text('SELECT AIRPORT');
                $('#location_div').insertBefore('#airport_div');
                $('.droptext').text("DROP-OFF LOCATION")
                fromBtn.classList.add('active1');
                fromBtn.classList.remove('inactive1');
                toBtn.classList.add('inactive1');
                toBtn.classList.remove('active1');
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            function updateLuggageSelection(name) {
                const radios = document.querySelectorAll(`input[name="${name}"]`);
                radios.forEach(radio => {
                    const label = document.querySelector(`label[for="${radio.id}"]`);
                    if (radio.checked) {
                        label.classList.add('active_luggage');
                        label.classList.remove('inactive_luggage');
                    } else {
                        label.classList.add('inactive_luggage');
                        label.classList.remove('active_luggage');
                    }
                });
            }
            ['check-in-luggage', 'hand-luggage'].forEach(name => {
                const radios = document.querySelectorAll(`input[name="${name}"]`);
                radios.forEach(radio => {
                    radio.addEventListener('change', () => updateLuggageSelection(name));
                });
                updateLuggageSelection(name);
            });
        });
    </script>

    <script>
        $(document).on("click", "#quote_btn", function(){
            let location1 = $("#location_select").val();
            let location2 = $("#airport_select").val();
            if (location1 != '' && location2 != ''){
                $("#quote_btn").html(`Loading... <i class="fa-solid fa-arrow-right"></i>`);
            }
        });
    </script>
   <script>
        const input = document.querySelector("#country_code");
        const iti = intlTelInput(input, {
            initialCountry: "auto",  
            separateDialCode: true,
            geoIpLookup: function (callback){
                fetch('https://ipinfo.io/json')
                    .then(response => response.json())
                    .then(data => callback(data.country)) 
                    .catch(() => callback('us'));
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"  
        });
        input.addEventListener('countrychange', function (){
            const countryCode = iti.getSelectedCountryData().dialCode;
            document.querySelector("#country_number").value = countryCode; 
        });
        input.addEventListener('input', function (){
            const countryCode = iti.getSelectedCountryData().dialCode; 
        });
    </script> 
        
@endsection
@endsection
