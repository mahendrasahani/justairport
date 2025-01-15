@extends('layouts/frontend/main')
@section('main-section')
@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">

@endsection


<script src="{{url('public/assets/frontend/js/international-telephone-input.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- <link rel="stylesheet" href="{{url('public/assets/frontend/css/international-telephone-input.css')}}"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
<!-- <--------------------------------------------------new date------------------------------------->
<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
<!-- <--------------------------------------------------new date------------------------------------->
<style>
 .price-box{
    background: white;
    padding: 10px 10px 10px 10px;
    border: 1px solid #C8C8C8;
    border-radius: 6px;
  }
.highlight {
    outline: 2px solid blue;
}
  .form_group {
    position: relative;
    display: flex;
    flex-direction: column;
    /* width: 300px; */
  }
  .form_control {
    padding-right: 30px;
    /* Space for the icon */
  }
  .form_control+.calendar_icon {
    position: absolute;
    right: 10px;
    top: 66%;
    align-items: center;
    transform: translateY(-50%);
    font-size: 14px;
    /* Adjust size as needed */
    pointer-events: none;
    /* Prevent clicks on the icon from affecting the input */
    color: #999;
    /* Adjust color as needed */
  }
  /* .form_group label {
            margin-bottom: 5px;
        } */
  .form_group p {
    margin-top: 5px;
  }
  /* <---------------------------------------date-dd/mm/yyyy-----------------------------------> */
  .note1  {
    font-family: "Outfit", sans-serif;
    font-weight: 500;
    font-style: normal;
    width: 60%;
}
  .phone-input {
    display: flex;
    align-items: center;
  }
  .first {
    width: 35px;
    color: #f5f5f5 !important;
  }
  .phoneinputWidth {
    /* max-width: 400px !important; */
    border: 1px solid #ABABAB;
    border-radius: 6px;
    min-height: 48px;
    font-size: 14px;
    font-weight: 500;
    /* color: #181A1F; */
    /* width: 100%; */
  }
  .iti--separate-dial-code .iti__selected-flag {
    background-color: transparent !important;
  }
  .phone-input select,
  .phone-input input {
    margin: 0 5px;
    padding: 5px;
  }
  .iti input,
  .iti input[type=text],
  .iti input[type=tel] {
    position: relative;
    z-index: 0;
    margin-top: 0 !important;
    margin-bottom: 0 !important;
    /* padding-right: 36px; */
    margin-right: 0;
    max-width: 400px !important;
  }
  /* animtion */
  .iti input {}
  .congestion-charges {
    float: right;
    padding-right: 31px;
    font-size: 12px;
    color: #000;
    font-weight: 600;
  }
  .text_right {
    text-align: center;
    border-radius: 0px !important;
    margin-right: 5px;
    border-top-left-radius: 9px !important; 
     border-bottom-left-radius: 9px !important;        /* box-shadow: inset 0px 4px 2px -1px rgba(0, 0, 0, .075), -2px 2px 4px 1px rgba(102, 175, 233, .8) !important; */
        background-color: #ebedee !important;
  }
.border_1{
      border-radius: 8px;
    color: #3D565F;
    border:  1px solid #ABABAB;
    /* padding: 18px 10px; */
}
  .confirm-bookingbtn {
    width: 315px;
  }
  .w-50 {
    width: 30% !important;
  }
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
  label.form-check-label1 {
    margin-top: 6px;
  }
  .active1 {
    background-color: red;
    color: white;
  }
  .inactive2 {
    background-color: white;
    color: black;
  }
  .header {
    background-color: white !important;
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
  .box-row-tab .box-tab-left {
    padding: 0px 10px;
    width: 35%;
  }
  .box-row-tab .box-tab-right {
    padding: 0px 10px;
    width: 65%;
  }
  @media screen and (max-width:992px) {
    .box-row-tab .box-tab-left {
      width: 100%;
    }
    .box-row-tab .box-tab-right {
      width: 100%;
    }
  }
  .price_breakdown_details {
    position: absolute;
    background-color: white;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    z-index: 1;
    right: 699px;
    top: 243px;
  }

  input[type="radio"] {
    display: none;
  }

  .to-btn {
    z-index: 9;
    left: 22px;
    font-size: medium;
    font-weight: 300;
    font-family: sans-serif;

    text-transform: capitalize !important;
  }

  #to_from_toggle {
    border: none;
    border-radius: 30px;
  }

  /* <-------------------------------dropdown---------------------> */
  #dropdown ul {
    /* border: 1px solid #ccc; */
    display: none;
    list-style: none;
    margin: 0;
    padding: 0;
    position: absolute;
    z-index: 1000;
    width: 40%;
    background: #fff;
    left: 0;
    border-radius: 10px;
    bottom: 44px;
  }

  #dropdown ul.has-suggestions {
    display: block;
  }

  #dropdown ul li {
    padding: 5px 10px;
    cursor: pointer;
    font-size: 12px;
    color: #848484;
  }

  #dropdown ul li:hover {
    background-color: #f0f0f0;
  }

  .select-dropdown.has-suggestions {
    max-height: 400px;
    overflow-y: auto;
    background-color: white;
    border: 1px solid rgba(0, 0, 0, .15);
    /* min-width: 160px; */
    padding: 5px 0;
    position: absolute;
    z-index: 999;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    border-radius: 4px;
    /* min-width: 100%; */
    /* max-width: max-content !important; */
    float: left;

  }

  .select-dropdown>li {
    color: black !important;
    padding: 6px 10px;
    font-size: 14px;
    font-weight: 400;
    /* width: 100%; */
    /* max-width: max-content !important; */

    background: #FFFFFF !important;
  }

  .select-dropdown>li:hover {
    background: #0d6efd;
    color: white;
  }

  .bg-transperent {
    background: none !important;
  }

  /* <-------------------------------------------------> */

  .airport-image {
    margin-right: 4px;
  }

  .custom-tooltip {
    --bs-tooltip-bg: var(--bd-violet-bg);
    --bs-tooltip-color: var(--bs-white);
  }

  .active1 {
    height: 100%;
    width: 100%;
    background-color: #EB1B25;
    border-radius: 25px;
    color: aliceblue;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

  }

  .inactive2 {
    background-color: white;
    color: black;
  }

  .parent-div {
    position: relative;
    width: 100%;
    border: 1px solid rgb(29, 29, 116);
    height: 50px;
    border-radius: 25px;
    display: flex;
    color: black;
  }

  .parent-div>div {
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }

  .tooltip1 {
    position: relative;
    display: inline-block;
  }

  .tooltip1 .tooltiptext {
    visibility: hidden;
    width: 300px;
    background-color: white;
    color: #989898;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 2;
    top: -17px;
    left: 110%;
    line-height: 30px;
    padding-left: 18px;
  }

  .line_height {
    line-height: 4;
  }

  .flight_display {
    display: none;
  }

  .tooltip1 .tooltiptext::after {
    content: "";
    position: absolute;
    top: 13%;
    right: 100%;
    margin-top: -12px;
    border-width: 11px;
    border-style: solid;
    border-color: transparent white transparent transparent;
  }

  .bg-light {
    background-color: white !important;

  }

  .tooltiptext .content {
    font-size: 12px;
  }

  .tooltip1:hover .tooltiptext {
    visibility: visible;
  }

  #to_airport_form {
    align-items: start;
  }

  .modal-dialog {
    z-index: 1050;
  }

  .modal {
    display: none;
  }

  .modal-backdrop {
    z-index: 1040;
  }

  .accep {
    border-radius: 0px !important;

  }

  .form-check-input {
    font-size: 16px !important;
  }

  .uppercase {
    text-transform: uppercase;
  }

  .select-dropdown li {
    cursor: pointer;
  }

  .select-dropdown {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  .select-dropdown li:hover {
    background-color: #f0f0f0;
  }

  /* input#postcode2:focus {
    box-shadow: 0 0 5px 2px rgba(0, 123, 255, 0.5);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
    outline: none;
} */
/* input#postcode2:focus {
    border-color: #66afe9 !important;
    outline: 0 !important;
    border-left: none !important;
    -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6) !important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .8) !important;
} */

 input#postcode2:focus {
    border-color: #66afe9 !important;
    outline: 0 !important;
    border-left: none !important;
    box-shadow: 
        inset 0 1px 1px rgba(0, 0, 0, .075),
        4px 0 8px rgba(102, 175, 233, .8) !important; 
}

.active {
   border: none;
}

.form-control[readonly] {
    background-color: #ffffff;
    opacity: 1;}

  .inmovileView{
    display: none;
  }
  @media (max-width:600px){
    .indesktopView{
      /* display: none; */
    }
    .inmovileView{
      display: block;
    }
  }
  
   .iti--allow-dropdown{
    max-width: 100px;
    height:40px;
  }
  #country_code{border:none;}

   #phone_number::-webkit-outer-spin-button,
    #phone_number::-webkit-inner-spin-button {
    -webkit-appearance: none;
   margin: 0;
}

</style>


<main class="main">
  <section class="section p-0 bg-grey latest-new-white">
    <div class="container-fluid">
      <div class="row conform-booking-main">

        <div class="col-4 banner-text pb-40 pt-50 indesktopView paddingRop">

          <h5 class="banner_box_heading diddenmob">ONLINE BOOKING</h5>
          <p class="red_border_line mt-5 diddenmob"></p>

          <div class="form-main">
            <form action="{{route('frontend.submit_booking')}}" id="to_airport_form"
              class="gap-2 flex-column select_container" method="POST">
              @csrf
                <input type="hidden" value="{{$form_data['lead_id']}}" name="lead_id">
                  <div class="parent-div parent-div1 diddenmob">
                    <div id="to-airport" class="" onclick="toggleField(); redirectOnlineBooking();">
                      <label class="active1 d-flex  justify-content align-items-center  gap-3 " id="to_btn">
                        <input type="radio" class="btn-check" name="journey_type" value="to_airport" onchange="updateCar()"
                          {{$form_data['journey_type']=='to_airport' ? 'checked' : '' }}>
                        <i class="fa fa-plane  icon" aria-hidden="true"></i>
                        <span>TO AIRPORT</span>
                      </label>
                    </div>
                    <div id="from-airport" class="" onclick="toggleField(); redirectOnlineBooking();">
                      <label class="d-flex  justify-content align-items-center  gap-3  inactive1" id="from_btn">
                        <input type="radio" class="btn-check" name="journey_type" value="from_airport" onchange="updateCar()"
                          {{$form_data['journey_type']=='from_airport' ? 'checked' : '' }}>
                        <i class="fa fa-plane  icon1" aria-hidden="true"></i>
                        <span>FROM AIRPORT</span>
                      </label>
                    </div>
                  </div>
                  
                  <div id="section1" class="diddenmob">
                    <div class="select_container mt-15" id="airport_div">
                      <input type="hidden" value="{{$form_data['location_select'] }}" id="selected_location">
                      <h6 class="droptext">PICK-UP LOCATION</h6>
                      <select name="location_select" id="location_select" class="select_box" required
                        onchange="updateCar(); redirectOnlineBooking();">
                        <option value="">Select</option>
                        @foreach($postcodes as $postcode)
                        <option value="{{$postcode->postcode}}">{{$postcode->postcode}} - {{$postcode->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  
                    <div class="select_container mt-15" id="location_div">
                      <h6>SELECT AIRPORT</h6>
                      <select name="airport" id="airport_select" class="select_box" required
                        onchange="updateCar(); redirectOnlineBooking();">
                        <option value="" selected>Select Airport</option>
                        @if(count($airports) > 0)
                        @foreach($airports as $airport)
                        <option value="{{$airport->id}}" {{$form_data['airport'] !='' && $form_data['airport']==$airport->id ? 'selected'
                          : ''}}>{{$airport->airport_name}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="select_container mt-15">
                      <h6>PASSENGERS</h6>
                      <input type="number" class="passenger_number select_box" name="passenger_count" id="passenger_count"
                        value="{{$form_data['passenger_count'] != '' ? $form_data['passenger_count'] : '1'}}" min="1" required />
                        
                      <input type="hidden" name="old_passenger_count" id="old_passenger_count"
                        value="{{$form_data['passenger_count'] != '' ? $form_data['passenger_count'] : '1'}}">
                    </div>
                  </div>
                  <p class="white_line mt-4 diddenmob"></p>

              <div class="changeMobileSi">

                  <div class="select_container pb-20 pt-20">
                    <h6>CHECK-IN LUGGAGE</h6>
                    <div class="d-flex luggage_number_container" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="check_in_luggage" id="check-in-luggage1"
                        autocomplete="off" value="1" checked onclick="updateCar()" {{$car->checkin_luggage == 1 ? 'checked'
                      : ''}}>
                      <label class="btn btn-outline-primary" for="check-in-luggage1">1</label>

                      <input type="radio" class="btn-check" name="check_in_luggage" id="check-in-luggage2"
                        autocomplete="off" value="2" onclick="updateCar()" {{$car->checkin_luggage == 2 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="check-in-luggage2"> 2</label>

                      <input type="radio" class="btn-check" name="check_in_luggage" id="check-in-luggage3"
                        autocomplete="off" value="3" onclick="updateCar()" {{$car->checkin_luggage == 3 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="check-in-luggage3"> 3</label>

                      <input type="radio" class="btn-check" name="check_in_luggage" id="check-in-luggage4"
                        autocomplete="off" value="4" onclick="updateCar()" {{$car->checkin_luggage == 4 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="check-in-luggage4"> 4</label>

                      <input type="radio" class="btn-check" name="check_in_luggage" id="check-in-luggage5"
                        autocomplete="off" value="5" onclick="updateCar()" {{$car->checkin_luggage == 5 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="check-in-luggage5"> 5</label>

                      <input type="radio" class="btn-check" name="check_in_luggage" id="check-in-luggage6"
                        autocomplete="off" value="6" onclick="updateCar()" {{$car->checkin_luggage == 6 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="check-in-luggage6"> 6</label>
                    </div>
                  </div>

                  <div class="select_container">
                    <h6>HAND LUGGAGE</h6>
                    <div class="d-flex hand_luggage_container" role="group" aria-label="Basic radio toggle button group">
                      <input type="radio" class="btn-check" name="hand_luggage" id="hand-luggage1" value="1"
                        autocomplete="off" checked onclick="updateCar()" {{$car->hand_luggage == 1 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="hand-luggage1">1</label>

                      <input type="radio" class="btn-check" name="hand_luggage" id="hand-luggage2" value="2"
                        autocomplete="off" onclick="updateCar()" {{$car->hand_luggage == 2 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="hand-luggage2"> 2</label>

                      <input type="radio" class="btn-check" name="hand_luggage" id="hand-luggage3" value="3"
                        autocomplete="off" onclick="updateCar()" {{$car->hand_luggage == 3 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="hand-luggage3"> 3</label>

                      <input type="radio" class="btn-check" name="hand_luggage" id="hand-luggage4" value="4"
                        autocomplete="off" onclick="updateCar()" {{$car->hand_luggage == 4 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="hand-luggage4"> 4</label>

                      <input type="radio" class="btn-check" name="hand_luggage" id="hand-luggage5" value="5"
                        autocomplete="off" onclick="updateCar()" {{$car->hand_luggage == 5 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="hand-luggage5"> 5</label>

                      <input type="radio" class="btn-check" name="hand_luggage" id="hand-luggage6" value="6"
                        autocomplete="off" onclick="updateCar()" {{$car->hand_luggage == 6 ? 'checked' : ''}}>
                      <label class="btn btn-outline-primary" for="hand-luggage6"> 6</label>
                    </div>
                  </div>

                <div id="baby_seat_section" style="display:{{$car->id == 1 ? "none":"block"}};">
                  <div class="select_container d-flex seat_container pt-20 ">
                    <div class="baby-col">
                      <h6>BABY / BOOSTER SEAT</h6>
                      <p class="additional">£ 5.00 each additional charges</p>
                    </div>
                    <select id="Select_child_list" name="booster_seat_count" onchange="updateCar(), addChldAgeList()">
                      <option value="0" selected="selected">0</option>
                      <option value="1" {{$form_data['booster_seat_count']==1 ? 'selected' : '' }}>1</option>
                      <option value="2" {{$form_data['booster_seat_count']==2 ? 'selected' : '' }}>2</option>
                      <option value="3" {{$form_data['booster_seat_count']==3 ? 'selected' : '' }}>3</option>
                    </select>
                  </div>
                  <ul id="selectedOptions" class="selected-options line_height child-list">
                    @if($form_data['booster_seat_count'] == 1)
                    <li id="li-1">
                      First Child Age: <input type="number" name="child_age[]" id="child1" min="0" max="9"
                        oninput="this.value = this.value.slice(0, 1);" value="{{$form_data['child1']}}" />
                    </li>
                    @endif 
                    @if($form_data['booster_seat_count'] == 2)
                    <li id="li-1">
                      First Child Age: <input type="number" name="child_age[]" id="child1" min="0" max="9"
                        oninput="this.value = this.value.slice(0, 1);" value="{{$form_data['child1']}}" />
                    </li>
                    <li id="li-2">
                      second Child Age: <input type="number" name="child_age[]" id="child2" min="0" max="9"
                        oninput="this.value = this.value.slice(0, 1);" value="{{$form_data['child2']}}" />
                    </li>
                    @endif @if($form_data['booster_seat_count'] == 3)
                    <li id="li-1">
                      First Child Age: <input type="number" name="child_age[]" id="child1" min="0" max="9"
                        oninput="this.value = this.value.slice(0, 1);" value="{{$form_data['child1']}}" />
                    </li>
                    <li id="li-2">
                      Second Child Age: <input type="number" name="child_age[]" id="child2" min="0" max="9"
                        oninput="this.value = this.value.slice(0, 1);" value="{{$form_data['child2']}}" />
                    </li>
                    <li id="li-3">
                      Third Child Age: <input type="number" name="child_age[]" id="child3" min="0" max="9"
                        oninput="this.value = this.value.slice(0, 1);" value="{{$form_data['child3']}}" />
                    </li>
                    @endif
                  </ul>
                  
              </div>
              </div>

              <div class="select_container baby-booster pt-10 diddenmob">
                <p style="color: #eb1b25">
                  <strong>Note:</strong> You'll be charged £15 for passing through a congestion zone during peak
                  hours, in addition to your initial quote. If you believe you're exempt from this charge, please
                  inform us within 72 hours of your journey's end at <a
                    href="mailto:webbookings@justairports.com">webbookings@justairports.com</a>, and we'll review
                  accordingly.
                  <br>
                  <a href="https://tfl.gov.uk/modes/driving/congestion-charge" target="_blank">Know more</a>
                </p>
              </div>

          </div>
        </div>

        <div class="col-8 executive ">
          <div class="price_breakdown_container comments price-extra">
            <b class="price_breakdown_box">
              <a href="javascript:void(0)" onclick="goBack()" class="mb-3 text-dark">Go Back</a>
              <div class="d-flex align-items-center  pt-30 car-price inmobinePadding">
                @php
                $car = App\Models\backend\CarCategory::where('id', $form_data['car_id'])->first();
                @endphp

                <input type="hidden" value="{{$form_data['car_id']}}" name="car_id" id="car_id">
                <div class="d-flex justify-content-between align-items-center journey car-cart">
                  <img src="{{url('public/assets/frontend/imgs/page/homepage2/car_img.png')}}" alt="" width="86"
                    height="" />
                  <p class="sall" id="car_name">{{$car->name}}</p>
                  <p class="pric" id="show_car_price">£{{$form_data['car_price']}}</p>
                  <input type="hidden" value="{{$form_data['car_price']}}" name="car_price" id="car_price">
                </div>

                <div class="tooltip1 pl-10">
                  <a href="#" class="tooltext1">PRICE BREAKDOWN</a>
                  <div class="tooltiptext">
                    <div class="congestion-charges" id="basic_fare">£{{$form_data['car_price']}}</div>
                    <div class="toolkip content">Basic Fare </div>
                    <input type="hidden" name="basic_fare" id="basic_fare_val" value="{{$form_data['car_price']}}">

                    <div id="congestion_charge_section" style="display:none;">
                      <div class="congestion-charges" id="congestion_charge">£0</div>
                      <div class="toolkip content">Congestion Charges</div>
                      <input type="hidden" name="congestion_charge_value" id="congestion_charge_value">
                    </div>

                    <div id="night_charge_section" style="display:none;">
                      <div class="congestion-charges" id="night_charge">£0</div>
                      <div class="toolkip content">Night Charges</div>
                      <input type="hidden" name="night_charge_value" id="night_charge_value">
                    </div>

                    <div id="parking_charge_section" style="display:none;">
                      <div class="congestion-charges" id="parking_charge">£0</div>
                      <div class="toolkip content">Parking Charges</div>
                      <input type="hidden" name="parking_charge_value" id="parking_charge_value">
                    </div>

                    <div id="booster_seat_charge_section" style="display:none;">
                      <div class="congestion-charges" id="booster_seat_charge">£0</div>
                      <div class="toolkip content">Booster Seat Charge</div>
                      <input type="hidden" name="booster_seat_charge_value" id="booster_seat_charge_value">
                    </div>

                    <!-- <div class="congestion-charges" id="congestion_charge">$2</div> -->
                    <!-- <div class="toolkip content">Booster Seat Charges</div>-->

                    <div class="congestion-charges" id="total_fare">£{{$form_data['car_price']}}</div>
                    <div class="Booster-total">TOTAL</div>

                  </div>
                </div>
                <!-- <a href="#" id="price_breakdown_link"   data-bs-toggle="tooltip"  title="toggle"  data-bs-placement="right">PRICE BREAKDOWN</a> -->

              </div>
              <hr class="white_line mt-30 mb-30 diddenmob" style="width:100%" />
              <div class="box-content-detail"> 
                <h3 class="heading-24-bold color-text wow" style="line-height:.5rem">JOURNEY DETAILS</h3>
                <p class="mt-2">Fill in your journey details for seamless booking</p>

              

                <div class="form-contact form-comment wow  mt-30 position-relative">
                  <div class="row">
                    <div class="col-md-6  col-xl-3 ">
                      <!-- <div class="form-group">
                        <label for="pickup_date">PICK UP DATE</label>
                        <input class="form-control" id="pickup_date" type="date" name="pickup_date"
                          placeholder="dd/mm/yyyy" required onchange="updateCar()">
                        <p id="pickup_date_error" style="color:red"></p>
                      </div> -->

                      <div class="form_group form-group mobilemargin-element">
                        <label for="pickup_date">PICK UP DATE</label>
                        <input class="form_control form-control" id="pickup_date" type="text" name="pickup_date"
                          placeholder="dd/mm/yyyy" required onchange="updateCar()" autocomplete="nope">
                        <i class="fas fa-calendar calendar_icon"></i>
                        
                      </div>
                    </div>
                    <div class=" col-xl-2 col-md-6 col-6 pickup-time1">
                      <div class="form-group mobilemargin-element">
                        <label for="pickup_time">PICK UP TIME</label>
                        <select name="pickup_time_h" id="pickup_time" class="select_box pickup-date form-control"
                          required onchange="updateCar()">
                          <option value="">Hours</option>
                          <option value="00">00</option>
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          <option value="13">13</option>
                          <option value="14">14</option>
                          <option value="15">15</option>
                          <option value="16">16</option>
                          <option value="17">17</option>
                          <option value="18">18</option>
                          <option value="19">19</option>
                          <option value="20">20</option>
                          <option value="21">21</option>
                          <option value="22">22</option>
                          <option value="23">23</option>
                        </select>
                        <p id="hours_error" style="color:red"></p>


                      </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-6 seamless booking mobile-samless mt20e">
                      <div class="form-group mobilemargin-element mobilemargin-elementBottom">
                        <label for="pickup_time"></label>
                        <select name="pickup_time_m" id="minutes" class="select_box form-control mt" required>
                          <option value="">Minutes</option>
                          <option value="05">00</option>
                          <option value="05">05</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                          <option value="20">20</option>
                          <option value="25">25</option>
                          <option value="30">30</option>
                          <option value="35">35</option>
                          <option value="40">40</option>
                          <option value="45">45</option>
                          <option value="50">50</option>
                          <option value="55">55</option>
                        </select>
                        <p id="minutes_error" style="color:red"></p>

                        <!-- <input class="form-control w-50" id="hours" type="text" name="pickup_time_h" placeholder="Hours" required>
                          <p id="hours_error" style="color:red"></p>
                          <input class="form-control w-50" id="minutes" type="text" name="pickup_time_m" placeholder="Minutes" required>
                          <p id="minutes_error" style="color:red"></p> -->

                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-xl-6 note" id="extra_charge_note">

                  </div>
                  <div class="row d-flex col-12">

                    <div class="col-xl-2 col-md-4">
                      <div class="form-group mobilemargin-element">
                        <label for="postal_code">POSTAL CODE</label>
                        <div class="d-flex bg-light align-items-center border_1 px-0">
                          <input class="form-control border-0 text_right p-0" id="postcode1"
                            name="postcode1" disabled value="{{$form_data['location_select']}}">
                          <input class="form-control bg-transperent border-0 p-0 mx-0 uppercase" id="postcode2"
                            name="postcode2" type="text" name="pin_code" value="" autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-7 col-md-6">
                      <div class="form-group mobilemargin-element">
                        <label for="address">ADDRESS</label>
                        <input class="form-control" id="address" type="text" name="address" placeholder="Enter your complete address" required autocomplete="nope">
                        <ul class="select-dropdown"></ul>
                      </div>
                    </div>


                    <!-- <div id="dropdown" >
                    <ul class="select-dropdown has-suggestions"></ul>

                  </div> -->

                  </div>
                  <div class="row mt-3" id="flightDisplayCity">
                    <div class="form-group col-md-4 col-xl-3">
                      <label for="airport_terminal" class="airport-terminal">FLIGHT NUMBER</label>
                      <input class="form-control" id="Flight_Number" type="text" name="flight_number"
                        placeholder=" Enter Flight" required>
                    </div>
                    <div class=" col-md-3 col-xl-3">
                      <div class="form-group">
                        <label for="airport_terminal " class="airport-terminal">AIRPORT TERMINAL </label>
                        <select class="form-control" id="airport_terminal" name="airport_terminal">
                          <option value="">--Select--</option>
                        </select>
                        <!-- <input class="form-control" id="airport_terminal" type="text" name="airport_terminal" placeholder="Optional"> -->

                      </div>
                    </div>
                    <div class="form-group col-md-3 col-xl-3">
                      <label for="airport_terminal" class="airport-terminal">DEPARTURE CITY</label>
                      <input class="form-control " id="" type="text" name="departure_city" placeholder="Enter City"
                        required>

                    </div>


                  </div>
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="form-group mobilemargin-element">
                        <label for="comments">COMMENTS</label>
                        <textarea class="form-control" id="comments" rows="5" name="comments"
                          placeholder="Enter your comments if any" required></textarea>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <hr class="white_line diddenmob" style="width:100%" />
              <div class="box-content-detail ">
                <h3 class="heading-24-bold  color-text wow ">PERSONAL DETAILS</h3>
                <p class="mt-2">We need your details to continue booking or you can sign in to save time</p>
                <div class="form-contact form-comment wow mt-2">
                  <div class="row mt-30">
                    <div class="col-lg-6 ">

                      <div class="form-group iti ">
                        <label for="phone_number">PHONE NUMBER</label>
                        <div class="phone-input gap-2"> 
                        <input id="country_code" type="tel" class="select_box" value="+{{$form_data['country_code']}}">
                            <input id="country_number" type="hidden" readonly name="country_number" required value="{{$form_data['country_code']}}"> 
                            <input type="number" id="phone_number" class="passenger_number select_box" name="phone_number" required autocomplete="nope">
                          
                           
                            

                        </div>
                        <p id="phone_number_error" style="color:red"></p>
                      </div> 
                    </div>
                              
                    <!-------------hidden verify ---------->
                    <!-- <div class="col-lg-6 d-flex align-items-center otp-text">
                      <div class="form-group mb-0" id="verified_content">
                        <a href="javascript:void(0)" id="trigger_verify_number">VERIFY VIA OTP</a>
                      </div>
                    </div> -->
                    <!-------------hidden verify ---------->

                    <div class="col-lg-6 ">
                      <div class="form-group mobilemargin-element">
                        <label for="name">YOUR NAME</label>
                        <input class="form-control" id="name" type="text" name="name" placeholder="Full Name" required
                          value="{{Auth::guard('client')->check() ? Auth::guard('client')->user()->name : ''}}"
                          autocomplete="nope">
                        <p id="user_name_error" style="color:red"></p>
                        <p id="verify_phone_error" style="color:red;"></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group mobilemargin-element">
                        <label for="email">EMAIL ADDRESS</label>
                        <input class="form-control" id="email" type="email" name="email"
                          placeholder="Enter your email address" required
                          value="{{Auth::guard('client')->check() ? Auth::guard('client')->user()->email : ''}}"
                          autocomplete="nope">
                        <p id="user_email_error" style="color:red"></p>
                      </div>
                    </div>
                    <p style="color:red;" id="verification_error"></p>
                  </div>
                </div>
              </div>
              <hr class="white_line my-2 diddenmob" style="width:100%" />
              <div class="row d-flex">
                <div class="mb-4 col-lg-6 mt-20">
                  <h6>HOW WOULD YOU LIKE TO PAY?</h6>
                  <div class="d-flex gap-4  mt-2 pb-20 cart-box"> 
                    <div class="form-check">
                      <input class="form-check-input" type="radio" checked id="cash" value="1" name="payment_method"
                        onchange="updateCar()" />
                      <label class="form-check-label" for="cash">Cash</label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="credit_card" value="2" name="payment_method"
                        onchange="updateCar()" />
                      <label class="form-check-label" for="credit_card">Credit Card</label>
                    </div>  
                  </div> 
                </div> 
              
                <div class="mb-4 ms-0 ps-0 col-lg-6 mt-10 mobilemargin-element lef512">
                  <p class="mt-0 mb-0">We accept all major credit cards</p>
                  <img src="{{url('public/assets/frontend/imgs/page/homepage2/cards.png')}}" alt="Accepted credit cards"
                    class="img-fluid" />
                </div>
              </div>
              <p class="mb-3 note_2" id="bottom_note" style="display:none;">For card payments, a prepaid parking charge of £18 is added. For cash, you pay the parking charges at the airport.</p>
              
              <hr class="white_line my-2" style="width:100%" />
              <div class=" pt-1 mt-2 mb-3 gap-2">
                <input type="checkbox" class="form-check-input_2 accep" id="terms_conditions" name="term_and_condition"
                  required />
                <label class="form-check-label_2 Check_box_size" for="terms_conditions">
                  Do you accept our
                  <a href="#" style="color: #3583f8">Terms & Conditions</a>
                  <p id="terms_and_condition_error" style="color:red"></p>
                </label>
              </div>
              <p class="mt-2">
                Cancellation of your booking is your right. We allow free of cost airport transfer booking
                cancellations. You can cancel your booking 4 hours prior to your pickup for free of cost. Any
                cancellations after that will attract a charge of £20 + parking charges (if any paid by driver). Our
                pre-booked airport transfer cars cancellations are hassle-free. Any amount paid in advance will be
                refunded to your account or card immediately in full if there are no dues on your side. It takes
                approximately up to 7 days for the amount to reflect on your statement or depending on your Bank’s
                policy. All card payments are taken on a very secure network.
              </p>

              <div class="col-xl-1 price-box d-flex justify-content-center mt-3 ">
                  <p class="pric" id="total_price_bottom">£{{$form_data['car_price']}}</p>
              </div>

              <button type="submit" class="quote_btn confirm-bookingbtn mt-3" id="confirm_booking_btn">
                CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>
              </button>
              <!-- <button id="myButton">Click Me!</button> -->
            </b>
          </div>
        </div>

        </form>
      </div>
    </div>
  </section>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog   modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!----------------------Login Modal for via-otp ------------->
<div class="modal fade" id="verify_number_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-body">
        <h1 style="font-size: 40px;"> VERIFY</h1>
        <p class="red_border_line mt-5"></p>
        <p>Enter OTP in login</p>
        <div class="form-group verify mt-25">
          <input type="hidden" name="verify_phone_otp" id="verify_phone_otp">
          <input class="form-control " id="verify_otp" type="number" value="" placeholder="Enter OTP"
            name="verify_otp" />
          <p id="verify_otp_error" style="color:red;"></p>
        </div>
        <button class="quote_btn mt-3 verify" style="height: 48px; align-items: center; padding: 0 11px;" type="button"
          id="submit_otp_to_verify_phone">
          VERIFY<i class="fa-solid fa-arrow-right"></i>
        </button>
        <h6 class="mt-25">Don’t have an account? You can <a style="color: #EB1B25;" href="#" id="otp_signup_btn">SIGN UP
            HERE</a></h6>
      </div>
    </div>
  </div>
</div>


@section('javascript-section')
<script>
  document.addEventListener('DOMContentLoaded', function (){
    getAirportTerminalList();
  });
  function redirectOnlineBooking(){
    const journeyType = $('input[name="journey_type"]:checked').val();
    const airportSelect = $('#airport_select').val();
    const locationSelect = $('#location_select').val();
    const phone_number = $('#phone_number').val();
    const country_code = $('#country_number').val();
    
    sessionStorage.setItem('journey_type', journeyType);
    sessionStorage.setItem('airport_select', airportSelect);
    sessionStorage.setItem('location_select', locationSelect);
    sessionStorage.setItem('phone_number', phone_number);
    sessionStorage.setItem('country_code', country_code)
   
    // GET sessionStorage value for 
    const locationselect = sessionStorage.getItem('location_select');
    const airportselect = sessionStorage.getItem('airport_select');

    let url = "{{route('frontend.online_booking')}}";
    window.location.href = url;
  }

  async function getAirportTerminalList(){
    try{
      let airport_id = $("#airport_select").val();
      let url = "{{route('api.get_airport_terminal_list')}}";
      let response = await fetch(`${url}/?airport_id=${airport_id}`);
      let append_to_html = '';
      if (!response.ok){
        throw new Error('Network response was not ok');
      }
      let responseData = await response.json();
      responseData.terminal_list.forEach(function (item){
        append_to_html += `<option value="${item.terminal_name}" ${responseData.terminal_list.length == 1 ? 'selected':''}>${item.terminal_name}</option>`;
      });
      $("#airport_terminal").append(append_to_html);
    }catch (error){
      console.error('There was a problem with the fetch operation:', error);
    }
  }
</script>

<script>
  document.addEventListener("DOMContentLoaded", function (event){
    let journey_type = "{{$form_data['journey_type']}}";
    if (journey_type == "from_airport"){
      $("#flightDisplayCity").show();
    } else{
      $("#flightDisplayCity").hide();
    }
  });  
</script>

@if(Auth::guard('client')->check())
<script>
  let client_phone = "{{ltrim(Auth::guard('client')->user()->phone, '0')}}";
  let passenger_phone = "{{ ltrim($form_data['passenger_phone'], '0') }}";

  if(client_phone != passenger_phone){
    $("#phone_number").val(passenger_phone);
     
  }else{
    $("#phone_number").val(client_phone);
     
  }
</script>
@else 
<script>
  $("#phone_number").val('{{ ltrim($form_data['passenger_phone'], '0') }}');
</script>
@endif

<script>
  async function updateCar(car_id = ''){
    let getCarUrl = "{{route('frontend.confirm_booking.car_update')}}";
    let journey_type = $('input[name="journey_type"]:checked').val();
    let payment_method = $('input[name="payment_method"]:checked').val();
    let passenger_count = $("#passenger_count").val();
    let old_passenger_count = $("#old_passenger_count").val();
    var check_in_luggage = $('input[name="check_in_luggage"]:checked').val();
    var hand_luggage = $('input[name="hand_luggage"]:checked').val();
    let airport_id = $("#airport_select").val();
    let postcode = $("#location_select").val();
    let booster_seat = $("#Select_child_list").val();
    const pickup_date = $("#pickup_date").val();
    const pickup_time = $("#pickup_time").val();
    const minutes = $("#minutes").val();
    let postcode1 = $("#postcode1").val();
    const dateParts = pickup_date.split("-");
    const formattedDate = `${dateParts[1]}/${dateParts[0]}/${dateParts[2]}`; 
    let only_date = dateParts[0];
    let only_month = dateParts[1];
    var selectedDate = new Date(formattedDate);
    var dayOfWeek = selectedDate.getDay();
    var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    var pickup_day = days[dayOfWeek]; 
    
    let response = await fetch(`${getCarUrl}/?passenger_count=${passenger_count}
      &journey_type=${journey_type}&payment_method=${payment_method}
      &check_in_luggage=${check_in_luggage}&hand_luggage=${hand_luggage}
      &airport_id=${airport_id}&postcode=${postcode}&booster_seat=${booster_seat}&old_passenger_count=${old_passenger_count}
      &car_id=${car_id}&pickup_day=${pickup_day}&pickup_time=${pickup_time}&postcode1=${postcode1}&minutes=${minutes}
      &minutes=${minutes}&only_date=${only_date}&only_month=${only_month}`);
    let responseData = await response.json(); 
    console.log(responseData);
    if (responseData.status == "success"){
      if (responseData.congestion_charge != 0){
        let message = '<div class="note1">You\'ll be charged £15 extra for passing through a congestion zone during peak hours.</div>';
        $("#extra_charge_note").html(message);
      } else if (responseData.night_charge != 0){
        let message = '<div class="note1">Any Transfer from anywhere between 2200 to 0200 Hours will cost £20.00 extra.</div>';
        $("#extra_charge_note").html(message);
      } else{
        $("#extra_charge_note").html('');
      } 
      if (responseData.congestion_charge != 0){
        $("#congestion_charge_section").show();
      } else{
        $("#congestion_charge_section").hide();
      }
      if (responseData.night_charge != 0){
        $("#night_charge_section").show();
      } else{
        $("#night_charge_section").hide();
      }
      if (responseData.parking_charge != 0){
        $("#parking_charge_section").show();
        $("#parking_charge_value").val(responseData.parking_charge);
        $("#parking_charge").html("$" + responseData.parking_charge);
      }else{
        $("#parking_charge_section").hide();
        $("#parking_charge_value").val(0);
        $("#parking_charge").html("$0");
      } 
      if(responseData.booster_seat_charge != 0){
        $("#booster_seat_charge_section").show();
        $("#booster_seat_charge_value").val(responseData.booster_seat_charge);
        $("#booster_seat_charge").html("$" + responseData.booster_seat_charge);
      }else{
        $("#booster_seat_charge_section").hide();
        $("#booster_seat_charge_value").val(0);
        $("#booster_seat_charge").html("$0");
      }
      if(payment_method == 1){
        $("#bottom_note").hide();
      }else{
        $("#bottom_note").show();
      } 
       if(responseData.data.id == 1){
        $("#baby_seat_section").hide();
      }else{
        $("#baby_seat_section").show();
      }
      $("#car_id").val(responseData.data.id);
      $("#car_name").html(responseData.data.name);
      $("#show_car_price").html("£" + responseData.total_fare);
      $("#car_price").val(responseData.total_fare);
      $("#basic_fare").html("£" + responseData.basic_fare);
      $("#basic_fare_val").val(responseData.basic_fare);
      $("#booster_seat_charge").html("£" + responseData.booster_seat_charge);
      $("#total_fare").html("£" + responseData.total_fare);
      $("#congestion_charge").html("£" + responseData.congestion_charge);
      $("#congestion_charge_value").val(responseData.congestion_charge);
      $("#night_charge_value").val(responseData.night_charge);
      $("#night_charge").html("£" + responseData.night_charge);
      $("#total_price_bottom").html("£" + responseData.total_fare);
    }
    $("#old_passenger_count").val(passenger_count);
    
  }
  
  
//   $(document).on("click", "#passenger_count", function (){
//     let passenger_count = $("#passenger_count").val();
//     let old_passenger_count = $("#old_passenger_count").val();
//     let car_id = $("#car_id").val();
//     if (passenger_count > old_passenger_count){
//       updateCar(car_id);
//     }
//     $("#passenger_count").val(passenger_count);
//     $("#old_passenger_count").val(passenger_count);
//   }).on( "#passenger_count", function (){
//     //----------------------New_code-for-typable-input--------
//   // }).on("keydown", "#passenger_count", function ()///////------Earlier_code_for_no_typing_allowed----
//     event.preventDefault();
//   });
</script>

<script>
  const postalCodeInput = document.querySelector('#postcode2');
  const suggestions = document.querySelector('.select-dropdown');
  const addressInput = document.querySelector('#address');
  let addressSuggestions = [];
  let suggestionsFetched = false;
  async function locationlist(postcode2){
    let postcode1 = $("#postcode1").val();
    let get_address_api_url = "{{route('frontend.get_address')}}";
    try{
      let response = await fetch(`${get_address_api_url}?postcode=${postcode1 + postcode2}`);
      let responseData = await response.json();
      console.log(responseData);
      return responseData.address_list || [];
    } catch (error){
      console.error("Error fetching location list:", error);
      return [];
    }
  }

  function showSuggestions(results, query){
    suggestions.innerHTML = '';
    if (results.length > 0){
      results.forEach(item =>{
        const address = item.address;
        const highlightedAddress = address.replace(new RegExp(query, 'gi'), match => `<strong>${match}</strong>`);
        suggestions.innerHTML += `<li data-address="${address}" data-postcode="${item.postcode}">${highlightedAddress}</li>`;
      });
      suggestions.classList.add('has-suggestions');
    } else{
      suggestions.innerHTML = '';
      suggestions.classList.remove('has-suggestions');
    }
  }

  function useSuggestion(e){
    const selectedAddress = e.target.getAttribute('data-address');
    addressInput.value = selectedAddress;
    suggestions.innerHTML = '';
    suggestions.classList.remove('has-suggestions');
  }

  function filterSuggestions(query){
    const filteredResults = addressSuggestions.filter(item => item.address.toLowerCase().includes(query.toLowerCase()));
    showSuggestions(filteredResults, query);
  }

  function addressTypeHandler(e){
    const inputVal = e.currentTarget.value;
    filterSuggestions(inputVal);
  }

  addressInput.addEventListener('click', () =>{
    if (!suggestionsFetched){
      const postcode1 = document.querySelector('#postcode1').value;
      const postcode2 = document.querySelector('#postcode2').value;
      const combinedPostcode = postcode1 + postcode2;
      if (combinedPostcode.length > 0){
        locationlist(postcode2).then(results =>{
          addressSuggestions = results;
          showSuggestions(results, '');
          suggestionsFetched = true;
        });
      }
    }
  });

  postalCodeInput.addEventListener('keyup', (e) =>{
    if (e.currentTarget.value.length === 4){
      suggestionsFetched = false;
    }
  });

  suggestions.addEventListener('click', useSuggestion);
  addressInput.addEventListener('input', addressTypeHandler);
</script>

<script>

  $(document).on("click", "#trigger_verify_number", async function (e){
    e.preventDefault();
    const send_verify_phone_url = "{{route('frontend.send_otp_to_verify_phone')}}";
    let country_code = $("#country_number").val();
  

    $("#phone_number_error").html('');
    $("#user_name_error").html('');
    $("#user_email_error").html('');
    let phone_number = $("#phone_number").val();

    let name = $("#name").val();
    let email = $("#email").val();
    if (phone_number == ''){
      $("#phone_number_error").html('Phone Number is Required!');
      return false;
    }
    if (name == ''){
      $("#user_name_error").html('Name is Required!');
      return false;
    }
    if (email == ''){
      $("#user_email_error").html('Email is Required!');
      return false;
    }
    try{
      let sendOtpResponse = await fetch(`${send_verify_phone_url}/?user_phone=${country_code + phone_number}&user_name=${name}&user_email=${email}`);
      let sendOtpResponseData = await sendOtpResponse.json();

      if (sendOtpResponseData.status = "otp_sent" && sendOtpResponseData.message == "new_created"){
        $("#verify_phone_otp").val(sendOtpResponseData.phone);
        $('#verify_number_modal').modal('show');
      }
      else if (sendOtpResponseData.status = "otp_sent" && sendOtpResponseData.message == "not_verified"){
        $("#verify_phone_otp").val(sendOtpResponseData.phone);
        $('#verify_number_modal').modal('show');
      }
      else if (sendOtpResponseData.status = "verified" && sendOtpResponseData.message == "client_already_verified")
      {
        logout_html = `<form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="d-flex  justify-content-center align-items-center">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <input type="submit" class="nav-link" value="LOGOUT" style="border:none;background:transparent">
                            </div>
                            </form>`;
        $("#login_logout_btn").html(logout_html);
        $("#verified_content").html(`<p style="color:green; font-weight:bold;">VERIFIED</p>`);
      }
      else if (sendOtpResponseData.status = "exist" && sendOtpResponseData.message == "phone_already_exist")
      {
        console.log("email id does not exist");
        $("#verification_error").text("Email id does not exist.");
      }
      else if (sendOtpResponseData.status = "exist" && sendOtpResponseData.message == "email_already_exist")
      {
        console.log("phone does not exist");
        $("#verification_error").text("Phone number does not exist.");
      }
    } catch (error)
    {
      console.error('Error:', error);
    }
  });


  $(document).on('click', '#submit_otp_to_verify_phone', async function ()
  {
    let logout_html = '';
    const submit_otp_url = "{{route('frontend.submit_otp_to_verify_phone')}}";
    $("#verify_otp_error").html('');
    const otp = $("#verify_otp").val();
    const user_phone = $('#verify_phone_otp').val();
    if (otp == '')
    {
      $("#verify_otp_error").html('Please enter OTP !');
      return false;
    }

    try
    {
      let checkOtpResponse = await fetch(`${submit_otp_url}/?phone=${user_phone}&otp=${otp}`);
      let checkOtpResponseData = await checkOtpResponse.json();
      if (checkOtpResponseData.message == 'login_success')
      {
        let redirectUrl = "{{route('frontend.booking_detail')}}";
        logout_html = `<form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="d-flex  justify-content-center align-items-center">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <input type="submit" class="nav-link" value="LOGOUT" style="border:none;background:transparent">
                            </div>
                            </form>`;
        $('#phone_number').val(checkOtpResponseData.user_data.phone);
        $('#name').val(checkOtpResponseData.user_data.name);
        $('#email').val(checkOtpResponseData.user_data.email);
        $('#phone_number').prop('disabled', true);
        $('#name').prop('disabled', true);
        $('#email').prop('disabled', true);
        $('#verify_number_modal').modal('hide');
        // $("#trigger_verify_number").text('VERIFIED');
        $("#verified_content").html(`<p style="color:green; font-weight:bold;">VERIFIED</p>`);
        $('#trigger_verify_number').prop('disabled', true);
        $("#login_logout_btn").html(logout_html);
      } else if (checkOtpResponseData.message == 'incorrect_otp')
      {
        $("#verify_otp_error").html('Incorrect OTP !');
        return false;
      }
    } catch (error)
    {
      console.error('Error:', error);
    }
  });

  $(document).on("click", "#confirm_booking_btn", async function (e){
    e.preventDefault();
    $("#confirm_booking_btn").prop('disabled', true);
    $("#confirm_booking_btn").html(`Please Wait... <i class="fa-solid fa-arrow-right"></i>`);
 
    $("#pickup_date_error").html('');
    $("#hours_error").html('');
    $("#minutes_error").html('');
    $("#phone_number_error").html('');
    $("#user_name_error").html('');
    $("#user_email_error").html('');
    $("#terms_and_condition_error").html('');
    let pickup_date = $("#pickup_date").val();
    let hours = $("#pickup_time").val();
    let minutes = $("#minutes").val();
    let email = $("#email").val();
    let name = $("#name").val();
    let phone_number = $("#phone_number").val();
    let country_code = $("#country_number").val();

    console.log(country_code, 'security code');

    const booster_seat_count = $("#Select_child_list").val();
    if(booster_seat_count == 1){
      $("#child1_age_error").html('');
      let first_check = $("#child1").val();
      if (first_check == ''){
        $("#child1_age_error").html('Child age is required.');
        $("#child1").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      }
    }
    if (booster_seat_count == 2){
      $("#child1_age_error").html('');
      $("#child2_age_error").html('');
      let first_check = $("#child1").val();
      let second_check = $("#child2").val();
      if (first_check == ''){
        $("#child1_age_error").html('Child age is required.');
        $("#child1").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      }
      if (second_check == ''){
        $("#child2_age_error").html('Child age is required.');
        $("#child2").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      }
    }
    if (booster_seat_count == 3){
      $("#child1_age_error").html('');
      $("#child2_age_error").html('');
      $("#child3_age_error").html('');
      let first_check = $("#child1").val();
      let second_check = $("#child2").val();
      let third_check = $("#child3").val();
      if (first_check == ''){
        $("#child1_age_error").html('Child age is required.');
        $("#child1").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      }
      if (second_check == ''){
        $("#child2_age_error").html('Child age is required.');
        $("#child2").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      }
      if (third_check == ''){
        $("#child3_age_error").html('Child age is required.');
        $("#child3").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      }
    }
    if (pickup_date == ''){
      $("#pickup_date_error").html('This is Required !');
      $("#pickup_date").focus();
      $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
      $("#confirm_booking_btn").prop('disabled', false);
      return false;
    }
    if (hours == ''){
      $("#hours_error").html('This is Required !');
      $("#pickup_time").focus();
      $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
      $("#confirm_booking_btn").prop('disabled', false);
      return false;
    }
    if (minutes == ''){
      $("#minutes_error").html('This is Required !');
      $("#minutes").focus();
      $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
      $("#confirm_booking_btn").prop('disabled', false);
      return false;
    }
    if (phone_number == ''){
      $("#phone_number_error").html('Phone Number is Required !');
      $("#phone_number").focus();
      $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
      $("#confirm_booking_btn").prop('disabled', false);
      return false;
    }
    if (name == ''){
      $("#user_name_error").html('Name is Required !');
      $("#name").focus();
      $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
      $("#confirm_booking_btn").prop('disabled', false);
      return false;
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (email == '') {
        $("#user_email_error").html('Email is Required !'); 
        $("#email").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      } else if (!emailRegex.test(email)) {
        $("#user_email_error").html('Invalid Email Address !'); 
        $("#email").focus();
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
        $("#confirm_booking_btn").prop('disabled', false);
        return false;
      }
    
    
    if (!$("#terms_conditions").is(":checked")){
      $("#terms_and_condition_error").html('Please check this box if you want to proceed.');
      $("#terms_conditions").focus();
      $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
      $("#confirm_booking_btn").prop('disabled', false);
      return false;
    }
    const authencation_check_url = "{{route('frontend.check_authencation_for_client')}}";
    const check_existing_user_url = "{{route('frontend.check_existing_user_for_client')}}";
    let slot_check_url = "{{route('frontend.check_slot_available')}}";
    try{
      let responseSlot = await fetch(`${slot_check_url}/?pickup_date=${pickup_date}&hours=${hours}&minutes=${minutes}`);
      let responseDataSlot = await responseSlot.json();
      if (responseDataSlot.status == "success" && responseDataSlot.message == "slot_not_available"){
        Swal.fire({
          icon: 'warning',
          title: 'Sorry',
          text: 'We are facing high booking volume for this time slot. Please call on our customar care number  +44 208-900-1666  or write us at webbookings@justairports.com to create your booking. Thanks',
        });
        return false;
      }
    } catch (error){
      console.error('Error:' + error);
    }
    $("#confirm_booking_btn").prop('disabled', true);
          $("#confirm_booking_btn").html(`Please Wait... <i class="fa-solid fa-arrow-right"></i>`);
          $('#to_airport_form').submit();
  });
</script>
 
 
    <script>
           $(window).on("pageshow", function() {
        $("#confirm_booking_btn").html(`CONFIRM BOOKING <i class="fa-solid fa-arrow-right"></i>`);
    });
    </script>
<script>
  document.getElementById('price_breakdown_link').addEventListener('click', function (){
    var priceBreakdownDetails = document.getElementById('price_breakdown_details');
    if (priceBreakdownDetails.style.display === 'none'){
      priceBreakdownDetails.style.display = 'block';
    } else{
      priceBreakdownDetails.style.display = 'none';
    }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function (){
    var priceBreakdownLink = document.getElementById('price_breakdown_link');
    var priceBreakdownDetails = document.getElementById('price_breakdown_details');
    priceBreakdownLink.addEventListener('mouseenter', function (){
      priceBreakdownDetails.style.display = 'block';
    });
    priceBreakdownLink.addEventListener('mouseleave', function (){
      priceBreakdownDetails.style.display = 'none';
    });
    priceBreakdownDetails.addEventListener('mouseenter', function (){
      priceBreakdownDetails.style.display = 'block';
    });
    priceBreakdownDetails.addEventListener('mouseleave', function (){
      priceBreakdownDetails.style.display = 'none';
    });
  });
</script>

<script>
  $(document).ready(function ()
  {
    $('[data-bs-toggle="popover"]').popover();
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function (){
    toggleField();
    let selected_location = $("#selected_location").val();
    document.getElementById("location_select").value = selected_location;
    // addChldAgeList();
  });
  function toggleField(){
    let selectedValue = document.querySelector('input[name="journey_type"]:checked').value;
    let section1 = document.getElementById('section1');
    let section2 = document.getElementById('section2');
    let toBtn = document.getElementById('to_btn');
    let fromBtn = document.getElementById('from_btn');
    // let formCity =document.getElementById('flightDisplayCity'); 
    if (selectedValue === 'to_airport'){
      $("#flightDisplayCity").hide();
      $('#airport_label').text('SELECT AIRPORT');
      $('#location_label').text('PICK-UP LOCATION');
      $('#airport_div').insertBefore('#location_div');
      $(".droptext").text("PICK-UP LOCATION");
      toBtn.classList.add('active1');
      toBtn.classList.remove('inactive1');
      fromBtn.classList.add('inactive1');
      fromBtn.classList.remove('active1');
      // formCity.classList.remove('flight_display');
    } else if (selectedValue === 'from_airport'){
      $("#flightDisplayCity").show();
      $('#airport_label').text('PICK-UP LOCATION');
      $('#location_label').text('SELECT AIRPORT');
      $('#location_div').insertBefore('#airport_div');
      $(".droptext").text("DROP-OFF LOCATION");
      fromBtn.classList.add('active1');
      fromBtn.classList.remove('inactive1');
      toBtn.classList.add('inactive1');
      toBtn.classList.remove('active1');
    }
  }

  document.addEventListener('DOMContentLoaded', function (){
    function updateLuggageSelection(name){
      const radios = document.querySelectorAll(`input[name="${name}"]`);
      radios.forEach(radio =>{
        const label = document.querySelector(`label[for="${radio.id}"]`);
        if (radio.checked){
          label.classList.add('active_luggage');
          label.classList.remove('inactive_luggage');
        } else{
          label.classList.add('inactive_luggage');
          label.classList.remove('active_luggage');
        }
      });
    }
    ['check-in-luggage', 'hand-luggage'].forEach(name =>{
      const radios = document.querySelectorAll(`input[name="${name}"]`);
      radios.forEach(radio =>
      {
        // radio.addEventListener('change', () => updateLuggageSelection(name));
      });
      updateLuggageSelection(name);
    });
  });
</script>

<script>
  function addChldAgeList(){
    const selectedValue = $("#Select_child_list").val();
    const selectedOptions = document.getElementById('selectedOptions');
    selectedOptions.innerHTML = '';
    const numberOfInputs = parseInt(selectedValue, 10);
    const ordinalNumbers = ["First", "Second", "Third"];
    for (let i = 1; i <= numberOfInputs; i++){
      const li = document.createElement('li');
      li.id = `li-${i}`;
      li.innerHTML = `${ordinalNumbers[i - 1]} Child Age: <input type="number" name="child_age[]" id="child${i}" min="0" max="9" oninput="this.value = this.value.slice(0, 1);"/><p class="baby-booster-alert" id="child${i}_age_error"></p>`;
      selectedOptions.appendChild(li);
    }
  }
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
{{-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> --}}

{{-- date function  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/yearSelect/index.js"></script>

<script>
  const input = document.querySelector("#country_code");
  const iti = intlTelInput(input, {
  });
  input.addEventListener('countrychange', function (){
    const countryCode = iti.getSelectedCountryData().dialCode;
    document.querySelector("#country_number").value = countryCode;
  });
  input.addEventListener('input', function (){
    const countryCode = iti.getSelectedCountryData().dialCode;
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#pickup_date", {
      dateFormat: "d-m-Y",
      onChange: function(selectedDates, dateStr, instance) {
        // Set the data-date attribute
        instance.element.setAttribute("data-date", dateStr);
        // Trigger change event manually
        var event = new Event('change');
        instance.element.dispatchEvent(event);
      }
    });
    // Handle the change event
    document.querySelector("#pickup_date").addEventListener('change', function() {
      var selectedDate = this.value;
      if (selectedDate !== ''){
        document.querySelector("#pickup_time").removeAttribute('disabled');
      }
    });
  });

  
</script>
<script>
  function goBack(){
    window.history.back();
  }
</script>

<!-- <------------------------------------------For_nevegation--------------------------- -->
<script>
  $(document).ready(function (){
    // Add keyboard focus styles
    $('a, button, input, textarea, select').on('focus', function (){
      $(this).addClass('highlight');
    }).on('blur', function (){
      $(this).removeClass('highlight');
    });
    // Navigation using arrow keys
    $(document).on('keydown', function (event){
      let focusedElement = $(document.activeElement);
      if(event.key === 'ArrowDown'){
        // Move to the next focusable element
        focusedElement.nextAll(':focusable').first().focus();
        event.preventDefault();
      }else if (event.key === 'ArrowUp'){
        // Move to the previous focusable element
        focusedElement.prevAll(':focusable').first().focus();
        event.preventDefault();
      }
    });

    // Handle Enter key for buttons and links
    $(document).on('keydown', 'button, a', function (event){
      if (event.key === 'Enter'){
        $(this).click();
      }
    });

    // Custom keyboard shortcuts
    $(document).on('keydown', function (event){
      if (event.ctrlKey && event.key === 's'){
        // Example: Ctrl+S to save
        alert('Save shortcut triggered!');
        event.preventDefault();
      } else if (event.altKey && event.key === 'n'){
        // Example: Alt+N to navigate to a specific section
        $('#section-to-navigate').focus();
        event.preventDefault();
      }
    });
  });
  // jQuery custom selector for focusable elements
  $.extend($.expr[':'], {
    focusable: function (el){
      return $(el).is('a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])') && !$(el).is(':disabled');
    }
  });
</script>


<script>
  $(document).ready(function ()
  {
    $('#Select_child_list').on('change', function ()
    {
      const Select_child_list = $('#Select_child_list').val();
      console.log(Select_child_list);
      if (Select_child_list === '0')
      {
        $('.inmobinePadding').css({ 'margin-bottom': '20rem' })
      } else if (Select_child_list === '1')
      {
        $('.inmobinePadding').css({ 'margin-bottom': '25rem' })
      } else if (Select_child_list === '2')
      {
        $('.inmobinePadding').css({ 'margin-bottom': '27rem' })
      } else if (Select_child_list === '3')
      {
        $('.inmobinePadding').css({ 'margin-bottom': '31rem' })
      }
    })
  })
</script>

<!-- <------------------------------------------For_nevegation--------------------------- -->


@endsection
@endsection