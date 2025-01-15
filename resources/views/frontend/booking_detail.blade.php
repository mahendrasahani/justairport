@extends('layouts/frontend/main') 
@section('main-section') 

@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">

@endsection

<style>
    .header {
      background-color: white !important;
    }

    #mainNavbar {
      padding: 0 30px !important;
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

    .select2-container--default
      .select2-selection--single
      .select2-selection__rendered {
      line-height: 40px;
      display: flex;
      align-items: center;
    }

    .select2-container--default
      .select2-selection--single
      .select2-selection__arrow {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .select2-container--default .select2-results > .select2-results__options {
      max-height: 300px;
      overflow-y: auto;
    }

    .select2-container--default
      .select2-search--dropdown
      .select2-search__field {
      height: 40px;
      line-height: 40px;
    }

    .box-row-tab .box-tab-left {
    padding: 0px 10px;
    width: 40%;
}

.box-row-tab .box-tab-right {
    padding: 0px 10px;
    width: 60%;
}

@media screen and (max-width:992px) {
  .box-row-tab .box-tab-left {
    width: 100%;
}

.box-row-tab .box-tab-right {
    width: 100%;
}
}

h1{
    font-size:40px !important;
 }
 
  @media screen and (max-width:600px) {
    .upcoming_booking {
      font-size: 17px;
    }

    .author_name {
      font-size: 24px !important;
    }
  }
 
  </style>
<main class="main">
      <section class="section">
        <div class="container booking_page"> 
        <h1 class="author_name">HI {{Auth::user()->name}}!</h1>
        <p class="red_border_line mt-5"></p>

        <ul class="d-flex booking_navbar mt-2 gap-2">
          <li class="active_nav_btn"><a href="{{route('frontend.booking_detail')}}">Booking</a></li>
          <li><a href="{{route('frontend.profile')}}">Profile</a></li>
          <li><a href="#">Messages</a></li>
          <li><a href="{{route('frontend.support')}}">Support</a></li>
        </ul>

        <div class="upcoming_bookings mt-2">
                <h3 class="upcoming_booking mt-1 mb-2">Upcoming Bookings</h3>
                @if(count($upcoming_bookings) > 0)
   @foreach($upcoming_bookings as $booking) 
   <div class="your_booking_details">
          <h6 class="info_heading"><a href="{{route('frontend.journey_detail', [$booking->id])}}">Booking #{{$booking->job_number ?? ''}}</a></h6>
          <div class="box-info-book-border wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> 
            <div class="info-1"> <span class="color-text text-14">DATE/TIME</span><br><span class="color-text text-14-medium">{{ Carbon\Carbon::parse($booking->job_date)->format('d/m/Y') }} {{Carbon\Carbon::parse($booking->job_date)->format('h:m a')}}</span></div>
            <div class="info-1"> <span class="color-text text-14">PICKUP FROM</span><br><span class="color-text text-14-medium">{{$booking->journey_type_id == 1 ? $booking->address:$booking->getAirport->airport_name}}</span></div>
            <div class="info-1"> <span class="color-text text-14">DROP TO</span><br><span class="color-text text-14-medium">{{$booking->journey_type_id == 1 ? $booking->getAirport->airport_name:$booking->address}}</span></div>
            <div class="info-1"> <span class="color-text text-14">FARE</span><br><span class="color-text text-14-medium">${{$booking->total_price ?? ''}}</span></div>
            <div class="info-1"> <span class="color-text text-14">CAR TYPE</span><br><span class="color-text text-14-medium">{{$booking->getCarCategory->name ?? ''}}</span></div>
            <div class="info-1"> <span class="color-text text-14">DRIVER</span><br><span class="color-text text-14-medium">{{$booking->getDriver->name ?? ''}}</span></div>
          </div> 
        </div>
   @endforeach
   @else
   <div class="upcoming_bookings mt-2"> 
                <p class="upcoming_booking_message">You have no bookings!</p>
        </div>
 @endif
        </div> 
        <div class="your_bookings mt-2">
          <h3 class="upcoming_booking mt-1 mb-2">Your Bookings</h3>
         
 @if(count($bookings) > 0)
   @foreach($bookings as $booking) 
   <div class="your_booking_details">
          <h6 class="info_heading"><a href="{{route('frontend.journey_detail', [$booking->id])}}">Booking #{{$booking->job_number ?? ''}}</a></h6>
          <div class="box-info-book-border wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;"> 
            <div class="info-1"> <span class="color-text text-14">DATE/TIME</span><br><span class="color-text text-14-medium">{{ Carbon\Carbon::parse($booking->job_date)->format('d/m/Y') }} {{Carbon\Carbon::parse($booking->job_date)->format('h:m a')}}</span></div>
            <div class="info-1"> <span class="color-text text-14">PICKUP FROM</span><br><span class="color-text text-14-medium">{{$booking->journey_type_id == 1 ? $booking->address:$booking->getAirport->airport_name}}</span></div>
            <div class="info-1"> <span class="color-text text-14">DROP TO</span><br><span class="color-text text-14-medium">{{$booking->journey_type_id == 1 ? $booking->getAirport->airport_name:$booking->address}}</span></div>
            <div class="info-1"> <span class="color-text text-14">FARE</span><br><span class="color-text text-14-medium">${{$booking->total_price ?? ''}}</span></div>
            <div class="info-1"> <span class="color-text text-14">CAR TYPE</span><br><span class="color-text text-14-medium">{{$booking->getCarCategory->name ?? ''}}</span></div>
            <div class="info-1"> <span class="color-text text-14">DRIVER</span><br><span class="color-text text-14-medium">{{$booking->getDriver->name ?? ''}}</span></div>
          </div> 
        </div>
   @endforeach
   @else
   <div class="upcoming_bookings mt-2"> 
                <p class="upcoming_booking_message">You have no bookings!</p>
        </div>
 @endif
          
   
  </div>
      
        </div>
      </section>
    </main>



@endsection