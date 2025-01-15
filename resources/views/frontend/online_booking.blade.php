@extends('layouts/frontend/main') 
@section('main-section') 
@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">

@endsection


<style>
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
  .parent-div {
    position: relative;
    width: 100%;
    border: 1px solid rgb(29, 29, 116);
    height: 50px;
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
  @media screen and (max-width:1200px) {
    .banner_box .banner_box_heading{font-size: 30px;}
  }
  @media screen and (max-width:1024px){
    .banner_box{gap: 10px;}
    .box-list-how ul li:last-child{min-width: auto;}
  }
  @media screen and (max-width:768px){
    .banner_box .banner_box_heading{font-size: 25px;}
    .banner-text h5{padding-bottom: 10px;}
    .booking_img {width: 100px; height: 100px;}
    .cardWork .cardImage{margin-bottom: 10px;}
  } 
  
     
  .iti--separate-dial-code .iti__selected-flag {
    background-color: rgba(0, 0, 0, 0.0);
}

</style>
<main class="main">  
  <section class="section p-0 bg-grey latest-new-white">
    <div class="container-fluid">
      <div class="row">
        <div class="col-3 banner-text pb-40 pt-50  ">
          <h5 class="banner_box_heading">ONLINE BOOKING</h5> 
          <p class="red_border_line mt-5"></p> 
          <div class="form-main">
            <!-- <h5>CHOOSE YOUR JOURNEY TYPE</h5> -->
            <form action="{{route('frontend.cars_available')}}" id="to_airport_form" class="gap-3 flex-column w-100 online-cart" method="POST">
              @csrf 
              <div class="parent-div parent-div1">
                <div id="to-airport" class="" onclick="toggleField()">
                  <label class="active1 d-flex  justify-content align-items-center  gap-3 " id="to_btn">
                    <input type="radio" class="btn-check" name="journey_type" value="to_airport" id="to_airport" checked>
                    <i class="fa fa-plane  icon" aria-hidden="true"></i>
                    <span>TO AIRPORT</span>
                  </label>
                </div> 
                <div id="from-airport" class="" onclick="toggleField()"> 
                  <label class="d-flex  justify-content align-items-center  gap-3  inactive1" id="from_btn">
                    <input type="radio" class="btn-check" name="journey_type" value="from_airport" id="from_airport">
                    <i class="fa fa-plane  icon1" aria-hidden="true"></i>
                    <span>FROM AIRPORT</span>
                  </label>
                </div>
              </div> 
              <div id="section1"> 
                <div class="select_container mt-15" id="airport_div">
                  <h6 class="droptext">PICK-UP LOCATION</h6>
                  <select name="location_select" id="location_select" class="select_box" required>
                  <option value="">Select Location</option>
                    @foreach ($postcodes as $postcode)
                        <option value="{{ $postcode->postcode }}" >{{ $postcode->postcode }} -
                            {{ $postcode->name }}</option>
                    @endforeach
                  </select>
                </div> 
                <div class="select_container mt-15" id="location_div">
                    <h6>SELECT AIRPORT</h6>
                    <select name="airport" id="airport_select" class="select_box" required>
                      <option value="">Select Airport</option>
                      @if(count($airports) > 0)
                        @foreach($airports as $airport)
                          <option value="{{$airport->id}}">{{$airport->airport_name}}</option>
                        @endforeach
                      @endif
                  </select>
                </div> 
              <div class="select_container mt-15">
                <h6>PASSENGERS</h6>
                <input type="number" class="passenger_number select_box" name="passenger_count" value="1" />
              </div>
              <div class="select_container ">
                <h6 class="banner-hedding mt-15">NUMBER</h6>
                       <div class="d-flex gap-2">
                            <input id="country_code" type="tel" class="select_box">
                    <input id="country_number" type="hidden" readonly name="country_code" required>
                    <input type="number" class="passenger_number select_box"  id="phone_number" name="passenger_phone" required>
                       </div>
                </div>
            </div>
            <button class="quote_btn">
              GET A QUOTE <i class="fa-solid fa-arrow-right"></i>
            </button>
            <div>
              <p class="py-2"> We accept all major credit cards</p>
              <img src="{{url('public/assets/frontend/imgs/page/homepage2/cards.webp')}}" alt="Card">
            </div>
          </form>
            </div> 
        </div>

        <div class="col-8 choose-journey mt-80 pl-40">
          <p class="zilla-slab-regular">We accept payment from bank across the world. Our Customer's can choose to pay
            by cash or they can choose Debit / Credit card from any part of the world. <span class="zilla-slab-regular"
              style="color:#EB1B25;text-decoration:underline;text-decoration-color: #EB1B25;font-weight: 700
            ;"> BOOK NOW</span></p>
          <div class="box-list-how mt-50">
            <ul>
              <li >
                <div class="cardWork">
                  <div class="cardImage booking_img"> <img
                      src="{{url('public/assets/frontend/imgs/page/homepage2/air.webp')}}" alt="JOURNEY TYPE"></div>
                  <div class="cardTitle">
                    <h5 class="text-18 color-text">CHOOSE YOUR <br> JOURNEY TYPE</h5>
                  </div>

                </div>
              </li>
              <li class="line">
                <img src="{{url('public/assets/frontend/imgs/page/homepage2/line.webp')}}" alt="line">
              </li>
              <li >
                <div class="cardWork">
                  <div class="cardImage booking_img"> <img
                      src="{{url('public/assets/frontend/imgs/page/homepage2/car.webp')}}" alt="Car"></div>
                  <div class="cardTitle">
                    <h5 class="text-18 color-text">SELECT THE VEHICLE <br> AVAILABLE</h5>
                  </div>

                </div>
              </li>
              <li class="line">
                <img src="{{url('public/assets/frontend/imgs/page/homepage2/line.png')}}" alt="line">
              </li>
              <li>
                <div class="cardWork">
                  <div class="cardImage booking_img"><img
                      src="{{url('public/assets/frontend/imgs/page/homepage2/calender.webp')}}" alt="BOOKING"></div>
                  <div class="cardTitle">
                    <h5 class="text-18 color-text">COMPLETE YOUR <br> BOOKING</h5>
                  </div>
                </div>
              </li>
            </ul>
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
  document.getElementById('price_breakdown_link').addEventListener('click', function (){
    var priceBreakdownDetails = document.getElementById('price_breakdown_details');
    if (priceBreakdownDetails.style.display === 'none'){
      priceBreakdownDetails.style.display = 'block';
    }else{
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
  $(document).ready(function (){
       let journey_type = sessionStorage.getItem('journey_type'); 
       const locationselect = sessionStorage.getItem('location_select');
       const airportselect = sessionStorage.getItem('airport_select');
        const phone_number = sessionStorage.getItem('phone_number'); 
       const country_code = sessionStorage.getItem('country_code'); 
       
       $("#phone_number").val(phone_number);
       $('#airport_select').val(airportselect).change();
       $("#location_select").val(locationselect).change();
    if(journey_type == 'to_airport'){
      $('input[name="journey_type"][value="to_airport"]').prop('checked', true); 
      $("#to_btn").addClass('active1');
      $("#to_btn").removeClass('inactive1');
      $("#from_btn").addClass('inactive1');
      $("#from_btn").removeClass('active1'); 
    }else if(journey_type == 'from_airport'){
      $('input[name="journey_type"][value="from_airport"]').prop('checked', true);
      $("#to_btn").addClass('inactive1');
      $("#to_btn").removeClass('active1');
      $("#from_btn").removeClass('inactive1');
      $("#from_btn").addClass('active1'); 
    }
    $('input[name="journey_type"]').on('change', function () {
      sessionStorage.setItem('journey_type', $(this).val());
    });
    $('[data-bs-toggle="popover"]').popover();


    if (journey_type === 'to_airport')
    {
      $('#airport_label').text('SELECT AIRPORT');
      $('#location_label').text('PICK-UP LOCATION');

      $('#airport_div').insertBefore('#location_div');

      $(".droptext").text("PICK-UP LOCATION");
 
    } else if (journey_type === 'from_airport')
    {
      $('#airport_label').text('PICK-UP LOCATION');
      $('#location_label').text('SELECT AIRPORT');
      $('#location_div').insertBefore('#airport_div');
      $(".droptext").text("DROP-OFF LOCATION");
    }
    sessionStorage.clear();
    if(country_code == null){
        const input = document.querySelector("#country_code"); 
        console.log('country code is null'); 
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
      }else{
          $('#country_code').val('+'+country_code);
          $('#country_number').val(country_code);
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
    }
    
    
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function (){
  });
  function toggleField(){
    let selectedValue = document.querySelector('input[name="journey_type"]:checked').value;
    let section1 = document.getElementById('section1');
    let section2 = document.getElementById('section2');
    let toBtn = document.getElementById('to_btn');
    let fromBtn = document.getElementById('from_btn');
    if (selectedValue === 'to_airport'){
      $('#airport_label').text('SELECT AIRPORT');
      $('#location_label').text('PICK-UP LOCATION');

      $('#airport_div').insertBefore('#location_div');

      $(".droptext").text("PICK-UP LOCATION");  
      toBtn.classList.add('active1');
      toBtn.classList.remove('inactive1');
      fromBtn.classList.add('inactive1');
      fromBtn.classList.remove('active1');
    } else if (selectedValue === 'from_airport')
    {
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
        }else{
          label.classList.add('inactive_luggage');
          label.classList.remove('active_luggage');
        }
      });
    }
    ['check-in-luggage', 'hand-luggage'].forEach(name =>{
      const radios = document.querySelectorAll(`input[name="${name}"]`);
      radios.forEach(radio =>{
        radio.addEventListener('change', () => updateLuggageSelection(name));
      });
      updateLuggageSelection(name);
    });
  });
</script>
@endsection
@endsection