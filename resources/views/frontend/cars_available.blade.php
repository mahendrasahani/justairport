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
  .header {
    background-color: white !important;
  }

  /* #mainNavbar {
    padding: 0 30px !important;
  } */

  .box-list-how ul li {
    padding-right: 0px !important;
  }
.line_height{
   line-height: 4;
   /* color: #0000CC; */
  
   padding-top: 50%;
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

  /* .box-row-tab .box-tab-left {
    padding: 0px 10px;
    width: 35%;
  }

  .box-row-tab .box-tab-right {
    padding: 0px 10px;
    width: 65%;
  } */

  .cars_available .luggage_box {
   padding: 4px 10px;
    /* max-width: 221px ; */
    margin: auto ;
  }

  @media screen and (max-width: 992px) {
    .box-row-tab .box-tab-left {
      width: 100%;
    }

    .box-row-tab .box-tab-right {
      width: 100%;
    }
  }


  .modal-body h1{margin-bottom: 12px;}
  .active1 {
    height: 100%;
    width: 100%;
    background-color: #eb1b25;
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
    /* width: 300px; */
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

/* 
  .banner-text2>.form-main {
    width: calc(100% - 4px);
} */

  
        .selected-options {
            list-style-type: none;
            padding: 0;
        }
        
  .baby-select{flex-wrap: wrap; justify-content: space-between;}
.cars_available_box img{
  border: 2px solid #ebebeb; 
  width:90%; 
}
/* .price_breakdown_container  {padding-right: 90px;} */





.CareNameX7{
                display: flex;
                justify-content: space-between;
                font-size: 10px;
                line-height: 15px;
                font-weight: 500;
            }
            .btnColorsBook{
                background-color: #2A2867;
                border: none;
                outline: none;
                width: 50%;
                color: #fff;
                
            }
            .cardbordrs{border-radius: 0 0 10px 10px; overflow: hidden;}
            .pee3{padding: 6px; font-size: 14px;}
            .bgSizeElements{
                color:#fff;
                font-weight: 500;
                width: 70%;
                text-align: center;    
            }
            .bgSizeElements-1{
              color:#fff;
                font-weight: 500;
                width: 30%;
                text-align: center;  
            }
              /* .btnColorsBook:hover{
                background-color: #4a4876;
            } */
            .codeIsEl-2{background-color: red;  }
            .cardTitles{margin-bottom: 0px !important; font-size: 16px;}
            .cardBodyEleents{padding: .3rem .5rem !important;}

    .passger-coun b {
    font-weight: 400;
         font-size: 12px;
        text-transform: lowercase
}

@media screen and (max-width: 450px) {
    .cars_available_box img {
        height: 45px;
    }
}

.iti--allow-dropdown{width:135px}


</style>
<main class="main">
  <section class="section p-0 bg-grey latest-new-white">
  <div class="container-fluid">
    <div class="row columnReverse">
        <div class="col-4 banner-text pb-40 pt-50  paddngbtnis">
            <h5 class="banner_box_heading">ONLINE BOOKING</h5>
            <p class="red_border_line"></p>
            <div class="form-main"  >        
                  <form action="{{route('frontend.confirm_booking')}}" id="booking_form" class=" gap-3 flex-column"
                    method="POST">
                    @csrf
                    <input type="hidden" name="car_id" id="car_id">
                    <input type="hidden" name="car_price" id="car_price">
                    <input type="hidden" name="lead_id" value="{{$lead->id}}">
                          
            <div class="parent-div parent-div1">
            <div id="to-airport" class="" onclick="toggleField()">
            <label class="active1 d-flex justify-content align-items-center  gap-3" id="to_btn">
            <input type="radio" class="btn-check" name="journey_type" value="to_airport" {{$form_data['journey_type'] == 'to_airport' ? 'checked' : ''}} onchange="getUpdatedCarAvailable()">
            <i class="fa fa-plane icon" aria-hidden="true"></i>
              <span>TO AIRPORT</span>
            </label>
            </div>

            <div id="from-airport" class="" onclick="toggleField()">
            <label class="d-flex justify-content align-items-center gap-3 inactive1" id="from_btn">
            <input type="radio" class="btn-check" name="journey_type" value="from_airport" onchange="getUpdatedCarAvailable()" {{$form_data['journey_type'] == 'from_airport' ? 'checked' : ''}}>
            <i class="fa fa-plane  icon1" aria-hidden="true"></i>
            <span>FROM AIRPORT</span>
            </label>
            </div>
          </div>
                    <!-- Section 1 -->
                    <div id="section1">
                      <div class="select_container mt-25" id="airport_div">
                        <input type="hidden" value="{{$form_data['location_select'] }}" id="selected_location">
                        <h6 class="droptext">PICK-UP LOCATION</h6>
                        <select name="location_select" id="location_select" class="select_box" onchange="getUpdatedCarAvailable()">
                          <option value="">Select</option> 
                          <optgroup label="-----------------------" style="color:#0000CC;"></optgroup> 
                          @foreach($postcodes as $postcode)
                            <option value="{{$postcode->postcode}}">{{$postcode->postcode}} - {{$postcode->name}}</option>
                            @endforeach 
                        </select>
                      </div>

                      <div class="select_container mt-15" id="location_div">
                        <h6>SELECT AIRPORT</h6>
                        <select name="airport" id="airport_select" class="select_box" onchange="getUpdatedCarAvailable()">
                          <option value="">Select Airport</option>
                          @if(count($airports) > 0)
                  @foreach($airports as $airport)
              <option value="{{$airport->id}}" {{$form_data['airport'] != '' && $form_data['airport'] == $airport->id ? 'selected' : ''}}>{{$airport->airport_name}}</option>
            @endforeach
                @endif
                        </select>
                      </div>
                      <div class="select_container mt-15">
                        <h6>PASSENGERS</h6>
                        <input type="number" class="passenger_number select_box" name="passenger_count"
                          value="{{$form_data['passenger_count'] != '' ? $form_data['passenger_count'] : '1'}}" id="passenger_count" onchange="getUpdatedCarAvailable()" onkeyup="getUpdatedCarAvailable()"/>
                      </div>
                    </div>

                    <!---number input box -->
                      <div class="select_container ">
                      <h6 class="banner-hedding mt-15">NUMBER</h6>
                     <div class="d-flex gap-2" >
                        <input id="country_code" type="tel" class="select_box" value="+{{$form_data['country_code']}}">
                      <input id="country_number" type="hidden" readonly name="country_code" required value="{{$form_data['country_code']}}" > 
                      <input type="text" class="passenger_number select_box" name="passenger_phone" value="{{$form_data['passenger_phone']}}" id="passenger_phone" />
                     </div>
                      
                      </div>
                  
                    <input type="hidden" name="booster_seat_count"/> 
      <ul id="selectedOptions" class="line_height selected-options  child-list"></ul>

      <div class="select_container baby-booster pt-10">
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


                  </form>
            </div>
                    
        </div>
        <div class="col-8 price_breakdown_container  price-comman  mt-60 pl-40 marginboxH ">
                  <h6 class="hiddenText1">Select Car</h6>
                  <p class="para_class hiddenText1">
                    Select from diverse fleet of standard and executive cars,
                    including family-sized sedans to MPVs and minivans for larger
                    groups.
                  </p>
                  <div class="row  cars_available" id="available_cars_list">
                    @if(count($cars) > 0)
                    @foreach($cars as $index => $car)

                <div class="col-md-6 col-lg-4 col-12 col-sm-6">
                <!------gsdjfkd---->
                <div class="cars_available_box">
                <div class="imgMobilefit"><img src="{{url('public/' . $car->image_path . '/' . $car->image)}}" alt="" /></div>
                <ul class="luggage_box">
                <h3> {{$car->name ?? ''}}</h3>

                <li>
                <span>Passenger </span>
                <span class="passger-coun"><b><b class="xelementsis">X</b> {{$car->passenger_count ?? ''}} </b></span>
                </li>
                <li>
                <span>Check-in Luggage</span>
                <span class="passger-coun"> <b><b class="xelementsis">X</b> {{$car->checkin_luggage ?? ''}}</b></span>
                </li>
                <li>
                <span>Hand Luggage</span> <span class="passger-coun"> <b><b class="xelementsis">X</b> {{$car->hand_luggage ?? ''}}</b></span>
                </li>
                </ul>
                @php
            if ($car->name == 'Estate') {
              $final_price = $price->price + 5;
            } else if ($car->name == 'MPV') {
              $final_price = $price->price + 17;
            } else if ($car->name == 'Executive') {
              $final_price = $price->price + 17;
            } else if ($car->name == 'MPV 7' && $form_data['location_select'] != 'T1') {
              $final_price = $price->price + 29;
            } else if ($car->name == 'MPV 8' && $form_data['location_select'] != 'T1') {
              $final_price = $price->price + 36;
            } else {
              $final_price = $price->price;
            } 
                @endphp
                <div class="car_available_box_bottom">
                <h6>£{{$final_price ?? ''}}</h6>
                <button class="book_now_btn" data-id="{{$car->id}}" data-car_price="{{$final_price}}">BOOK <span class="mobileBook">NOW</span></button>
                </div>
                </div>

                <!------gsdjfkd---->

                <!-- <div class="card cardbordrs mb-3">
                <div class="row g-0">
                <div class="col-5">
                <div class="d-flex align-items-center h-100">
                <img src="{{url('public/' . $car->image_path . '/' . $car->image)}}" class="img-fluid rounded-start" alt="...">
                </div>
                </div>
                <div class="col-7">
                <div class="card-body cardBodyEleents">
                <h5 class="card-title cardTitles">{{$car->name ?? ''}}</h5>
                <div>
                <div class="CareNameX7">
                <span>Passenger</span>
                <span>X {{$car->passenger_count ?? ''}}</span>
                </div>
                <div class="CareNameX7">
                <span>Check-in Luggage</span>
                <span>X {{$car->checkin_luggage ?? ''}}</span>
                </div>
                <div class="CareNameX7">
                <span>Hand Luggage</span>
                <span>X {{$car->hand_luggage ?? ''}}</span>
                </div>
                </div>
                </div>
                </div>
                @php
                if ($car->name == 'Estate') {
                $final_price = $price->price + 5;
                } else if ($car->name == 'MPV') {
                $final_price = $price->price + 17;
                } else if ($car->name == 'Executive') {
                $final_price = $price->price + 17;
                } else if ($car->name == 'MPV 7' && $form_data['location_select'] != 'T1') {
                $final_price = $price->price + 29;
                } else if ($car->name == 'MPV 8' && $form_data['location_select'] != 'T1') {
                $final_price = $price->price + 36;
                } else {
                $final_price = $price->price;
                } 
                @endphp
                <div class="col-12">
                <div class="d-flex w-100">
                <div class="col66 bgSizeElements-1 codeIsEl-2">
                <div class="pee3">£{{$final_price ?? ''}}</div>
                </div>
                <div class="col66 bgSizeElements">
                <button class="btnColorsBook btnwid w-100 pee3 book_now_btn" data-id="{{$car->id}}" data-car_price="{{$final_price}}">Book Now</button>
                </div>
                </div>
                </div>
                </div>
                </div> -->

                </div>
          @endforeach
          @endif             
          
          </div>
                
        </div>
      </div>
  </div>
  </section>
  <section class="container-xl mt-50 mb-50">
    <p>Cancelation of your booking is your right. We allow free of cost airport transfer booking cancelations. You can
      cancel your booking 4 hours prior to your pickup for free of cost. Any cancelations after that will attract a
      charge of £20 + parking charges (if any paid by driver). Our pre-booked airport transfer cars cancelations are
      hassle free. Any amount paid in advance will be refunded to your account or card immediately in full if there are
      no dues on your side. It takes approximate up to 7 days for the amount to reflect on your statement or depending
      on your Bank’s policy. All card payments are taken on very secure network.</p>
  </section>
</main>

@section('javascript-section')

<script>

  window.addEventListener("pageshow", function (event) {
      if (event.persisted || performance.getEntriesByType("navigation")[0].type === "back_forward") {
          // getUpdatedCarAvailable();
      }
  });

        
  $(document).on('click', '.book_now_btn', function () {
    
    let car_id = $(this).data('id')
    let car_price = $(this).data('car_price');
    const urlParams = new URLSearchParams(window.location.search);
    const bookingForm = document.querySelector('#booking_form');
    const booster_seat_count = $("#Select_child_list").val();
    if(booster_seat_count == 1){
      $("#child1_age_error").html('');
      let first_check = $("#child1").val();
      if(first_check == ''){
        $("#child1_age_error").html('Child age is required.');
        return false;
     } 
    }
    if(booster_seat_count == 2){
      $("#child1_age_error").html('');
      $("#child2_age_error").html('');
      let first_check = $("#child1").val();
      let second_check = $("#child2").val();
      if(first_check == ''){
        $("#child1_age_error").html('Child age is required.');
        return false;
     }
     if(second_check == ''){
        $("#child2_age_error").html('Child age is required.');
        return false;
     }  
    }
    if(booster_seat_count == 3){
      $("#child1_age_error").html('');
      $("#child2_age_error").html('');
      $("#child3_age_error").html('');
      let first_check = $("#child1").val();
      let second_check = $("#child2").val();
      let third_check = $("#child3").val();
      if(first_check == ''){
        $("#child1_age_error").html('Child age is required.');
        return false;
     }
     if(second_check == ''){
        $("#child2_age_error").html('Child age is required.');
        return false;
     }   
     if(third_check == ''){
        $("#child3_age_error").html('Child age is required.');
        return false;
     }  
    }
    $("#car_id").val(car_id);
    $("#car_price").val(car_price);

    bookingForm.submit();
  });

  async function getUpdatedCarAvailable(){
    let carAvailableUrl = "{{route('frontend.confirm_booking.car_update_available')}}";
    let passenger_count = $("#passenger_count").val();
    let journey_type = $('input[name="journey_type"]:checked').val();
    let postcode = $("#location_select").val();
    console.log(postcode);

    let airport_id = $("#airport_select").val(); 
    // console.log(passenger_count);

      let check_in_luggage = $("input[name='check_in_luggage']:checked").val();
      let hand_luggage = $("input[name='hand_luggage']:checked").val();

      let booster_seat_count = $("#Select_child_list").val();

      let response = await fetch(`${carAvailableUrl}/?passenger_count=${passenger_count}&journey_type=${journey_type}&postcode=${postcode}&airport_id=${airport_id}
      &check_in_luggage=${check_in_luggage}&hand_luggage=${hand_luggage}&booster_seat_count=${booster_seat_count}`);
      let responseData = await response.json();
      console.log(responseData);
      let appendToHtml = '';
      let final_price = 0;
      if(responseData.status == "success"){
          if(responseData.cars.length > 0){
              responseData.cars.forEach(car => {
                if (car.name == 'Estate') {
                  final_price = responseData.price + 5;
                }else if (car.name == 'MPV') {
                    final_price = responseData.price + 17;
                }else if (car.name == 'Executive'){
                    final_price = responseData.price + 17;
                }else if (car.name == 'MPV 7' && postcode != 'T1') {
                    final_price = responseData.price + 29; 
                }else if (car.name == 'MPV 8' && postcode!= 'T1') {
                    final_price = responseData.price + 36; 
                }else {
                    final_price = responseData.price; 
                }
          appendToHtml += `<div class="col-md-6 col-lg-4 col-12 col-sm-6">
          <div class="cars_available_box">
          <img src="public/${car.image_path}/${car.image}" alt="" />
          <ul class="luggage_box">
            <h3>${car.name}</h3>
          <li>
          <span>Passenger </span>
          <span class="passger-coun">X ${car.passenger_count}</span>
          </li>
          <li>
          <span>Check-in Luggage</span>
           <span class="passger-coun"> X ${car.checkin_luggage}</span>
          </li>
          <li>
          <span>Hand Luggage</span> <span class="passger-coun">
           X ${car.hand_luggage}</span>
          </li>
          </ul>
              
          <div class="car_available_box_bottom">
          <h6>£${final_price}</h6>
          <button class="book_now_btn" data-id="${car.id}" data-car_price="${final_price}">BOOK
          NOW</button>
          </div>
          </div>
          </div>`;
            }); 

          }else{
             
          }
     
          $("#available_cars_list").html(appendToHtml);
      }
  }


</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    let selected_location = $("#selected_location").val();
    document.getElementById("location_select").value = selected_location;

    // getUpdatedCarAvailable();
    toggleField(); 
  });

  
  function toggleField() {
    let selectedValue = document.querySelector('input[name="journey_type"]:checked').value;
    let section1 = document.getElementById('section1');
    let section2 = document.getElementById('section2');
    let toBtn = document.getElementById('to_btn');
    let fromBtn = document.getElementById('from_btn');
    if (selectedValue === 'to_airport') {
      $('#airport_label').text('SELECT AIRPORT');
      $('#location_label').text('PICK-UP LOCATION');
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
      fromBtn.classList.add('active1');
      fromBtn.classList.remove('inactive1');
      toBtn.classList.add('inactive1');
      toBtn.classList.remove('active1');
        $('.droptext').text('DROP-OFF LOCATION');
    }
  }
</script>

<!-- baby booster select-js -->
      <script>
        document.getElementById('Select_child_list').addEventListener('change', function (event)
        {
          const selectedValue = event.target.value;
          const selectedOptions = document.getElementById('selectedOptions');
          selectedOptions.innerHTML = ''; // Clear the current list items

          const numberOfInputs = parseInt(selectedValue, 10);

          const ordinalNumbers = ["First", "Second", "Third"];

          // Add the appropriate number of input fields
          for (let i = 1; i <= numberOfInputs; i++)
          {
            const li = document.createElement('li');
            li.id = `li-${i}`;
            li.innerHTML = `${ordinalNumbers[i - 1]} Child Age: <input type="number" name="child${i}" id="child${i}" min="0" max="9" oninput="this.value = this.value.slice(0, 1);" /><p class="baby-booster-alert" id="child${i}_age_error"></p>`;
            selectedOptions.appendChild(li);
          }
        });
      </script>
      
      
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
 
@endsection
@endsection