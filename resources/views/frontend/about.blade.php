@extends('layouts/frontend/main') 

@section('meta-tags')
  <title>Heathrow Airport Taxi and London Heathrow Airport Transfers</title>
  <meta name="description" content="Just Airports is a leading airport transfer service in London including Heathrow Airport, Gatwick, Stansted, London City and Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">
@endsection


@section('main-section') 

<section class="section mt-25">
      <div class="container">
        <h1>AIRPORTS</h1>
        <p class="red_border_line mt-5"></p>
        <p class="para_class" style="line-height: 24px">
          Since our establishment more than 20 years ago, Just Airports
          Transfers have been providing premium chauffeur services between
          airports across the United Kingdom. Being based in London, our clients
          most often require airport transfers to and from the airports of
          London Heathrow, London Gatwick, London Stansted, London City, Luton,
          and Southampton. All other English airports can of course be
          accommodated for upon request.
        </p>
        <p class="para_class" style="line-height: 24px">
          Since our establishment more than 20 years ago, Just Airports
          Transfers have been providing premium chauffeur services between
          airports across the United Kingdom. Being based in London, our clients
          most often require airport transfers to and from the airports of
          London Heathrow, London Gatwick, London Stansted, London City, Luton,
          and Southampton. All other English airports can of course be
          accommodated for upon request.
        </p>
      </div>

      <div class="container">
        <h3 class="book-hedding pb-35" >Why Choose Us?</h3>
        <div class="row">

          <div class="col-md-6 d-flex align-items-center features_container">
            <img
              class="mx-4"
              src="{{url('public/assets/frontend/imgs/page/homepage2/about_1.webp')}}"
              alt="The Best Prices"
            />
            <div class="features_box">
              <h6>The Best Prices</h6>
              <p class="para_class">
                Justairports promises to offer best prices possible to all its
                customers. We DO NOT increase prices for peak Hours or Holiday
                season.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-center features_container">
            <img
              class="mx-4"
              src="{{url('public/assets/frontend/imgs/page/homepage2/about_2.webp')}}"
              alt="Customer Satisfaction"
            />
            <div class="features_box">
              <h6>99.9% Customer Satisfaction</h6>
              <p class="para_class">
                We take pride in serving our customers. Justairports have been
                used by its customers for more than 20 years now and we are
                still going strong.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-center features_container">
            <img
              class="mx-4"
              src="{{url('public/assets/frontend/imgs/page/homepage2/about_3.webp')}}"
              alt="Customer Support"
            />
            <div class="features_box">
              <h6>24/7 Customer Support</h6>
              <p class="para_class">
                Justairprots is open 24 hours and 365 days. We will serve you
                any day and time of the year. We will give support over phone
                and email round the clock all year through.
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-center features_container">
            <img
              class="mx-4"
              src="{{url('public/assets/frontend/imgs/page/homepage2/about_4.webp')}}"
              alt="Easy Online Booking"
            />
            <div class="features_box">
              <h6>Easy Online Booking</h6>
              <p class="para_class" style="margin-top: 10px">
                We accept payment from bank across the world. Our Customer's can
                choose to pay by cash or they can choose Debit / Credit card
                from any part of the world.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section mt-25 pt-40 " style="background: #F5F5F5;">
      <div class="container">
        <h3 class="book-hedding">
          Why settle for an imitation? Choose Just Airports Taxi at Heathrow
          Airport.
        </h3>
        <p class="zilla-slab-regular mt-25">
          We accept payment from bank across the world. Our Customer's can
          choose to pay by cash or they can choose Debit / Credit card from any
          part of the world.
          <span
            class="zilla-slab-regular"
            style="
              color: #eb1b25;
              text-decoration: underline;
              text-decoration-color: #eb1b25;
              font-weight: 700;
            "
          >
            BOOK NOW</span
          >
        </p>

        <div class="box-list-how mt-25">
          <ul>
            <li class="wow fadeInUp">
              <div class="cardWork">
                <div class="cardImage booking_img">
                  <img src="{{url('public/assets/frontend/imgs/page/homepage2/air.webp')}}" alt="JOURNEY TYPE" />
                </div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">
                    CHOOSE YOUR <br />
                    JOURNEY TYPE
                  </h5>
                </div>
              </div>
            </li>
            <li class="line">
              <img src="{{url('public/assets/frontend/imgs/page/homepage2/line.webp')}}" alt="line" />
            </li>
            <li class="wow fadeInUp">
              <div class="cardWork">
                <div class="cardImage booking_img">
                  <img src="{{url('public/assets/frontend/imgs/page/homepage2/car.webp')}}" alt="SELECT THE VEHICLE
                    AVAILABLE" />
                </div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">
                    SELECT THE VEHICLE <br />
                    AVAILABLE
                  </h5>
                </div>
              </div>
            </li>
            <li class="line">
              <img src="{{url('public/assets/frontend/imgs/page/homepage2/line.webp')}}" alt="line" />
            </li>
            <li class="wow fadeInUp">
              <div class="cardWork">
                <div class="cardImage booking_img">
                  <img
                    src="{{url('public/assets/frontend/imgs/page/homepage2/calender.webp')}}"
                    alt="calender"
                  />
                </div>
                <div class="cardTitle">
                  <h5 class="text-20-medium color-text">
                    COMPLETE YOUR <br />
                    BOOKING
                  </h5>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>

    <section class="section mt-25">
      <div class="container mt-25">
        <div class="row service-box-main">
          <div class="col-md-6  col-lg-4">
            <div   class="service-box"  >
              <img src="{{url('public/assets/frontend/imgs/page/homepage2/about_travel_1.webp')}}" alt="tour" />
              <div class="p-4 paragraph">
                <h6>TOUR PACKAGES</h6>
                <p class="red_border_line mt-5"></p>
                <p
                  class="para_class paragraph"
                  style="line-height: 22px; font-size: 14px"
                >
                  Just Airports are thrilled to provide complete travel
                  arrangements for an enchanted tour of England. Some clients
                  select personal or group tour packages involving sightseeing
                  at leading heritage sites and tourist attractions in the
                  British Isles including the British Museum, the Tower of
                  London, Stonehenge, the Cotswolds, Cornwall, the Lake
                  District, Stratford-upon-Avon, and the City of Bath. <br />
                  Additionally we are pleased to provide an executive and
                  discerning chauffeuring service to social functions and
                  musical events. <br />
                  <span style="color: #eb1b25; text-decoration: underline">
                    Contact us</span
                  >
                  to discuss your individual tour package itinerary or event
                  schedule
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ">
            <div class="service-box"
             
            >
              <img src="{{url('public/assets/frontend/imgs/page/homepage2/about_travel_2.webp')}}" alt="Price" />
              <div class="p-4 paragraph">
                <h6>PRICES</h6>
                <p class="red_border_line mt-5 "></p>
                <p
                  class="para_class paragraph"
                  style="line-height: 22px; font-size: 14px"
                >
                  Due to the highly specific and individual requirements of all
                  our clients and journeys it is unfortunately not possible to
                  provide generic pricing information. The reasons for this
                  include but are not limited to: location, number of
                  passengers, number of bags, and vehicle requirements. <br />
                  To receive a tailored no obligation quote, please either use
                  our online booking system or contact us through a medium of
                  your choice. <br />
                  We are transparent in our pricing and pride ourselves on only
                  charging the amount mutually agreed in advance without any
                  unwanted surprises.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 ">
            <div class="service-box" >
              <img src="{{url('public/assets/frontend/imgs/page/homepage2/about_travel_3.webp')}}" alt="Account" />
              <div class="p-4 paragraph">
                <h6>ACCOUNTS</h6>
                <p class="red_border_line mt-5"></p>
                <p
                  class="para_class paragraph"
                  style="line-height: 22px; font-size: 14px"
                >
                  Many of our regular clientele choose to open a Just Airports
                  Account (tab) due to the convenience and benefits it offers.
                  We are delighted to discuss and provide account options with
                  all of our clients. Please feel free to contact us to discuss
                  your specific needs and the various benefits of opening a Just
                  Airports Account. With an account, you can enjoy streamlined
                  booking, priority service, and tailored offers. Our dedicated
                  team is here to assist you every step of the way. Let us help
                  enhance your travel experience with Just Airports. Contact us
                  today to learn more about how we can serve you better.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <p class="para_class para_class-1 " >
          Booking in advance with Just Airports Transfers helps you to ensure a
          comfortable and stress-free journey to and from the airport. On many
          an occasion due to unforeseen circumstances or airport hustle and
          bustle arranging last minute transport can be stressful. Save time and
          stress by allowing Just Airports Transfers to expertly manage all your
          airport journeys. We have a wide fleet of luxury vehicles to and from
          Heathrow airport available at your preferred selection including
          saloons, estates (station wagons), MPVs (SUVs), minivans, minibuses,
          and limousines.
        </p>
      </div>
    </section>

@endsection