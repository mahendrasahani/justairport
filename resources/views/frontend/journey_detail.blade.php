@extends('layouts/frontend/main')
@section('main-section')

@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">

@endsection

<style>
    .main_booking_container {
        width: 1300px;
        height: 100%;
        margin-bottom: 30px;
        margin: 10px 25px;
    }

    .booking_title,
    .peronal_containers_title,
    .payment_containers_title {
        color: #000000;
        font-size: 24px;
        padding-top: 57px;
    }

    .main_booking_container-content {
        width: 100%;
        display: flex;
        justify-content: space-between;
        /* align-items: center; */
    }

    .journery_details {
        width: 75%;
        /* background-color: pink; */
    }


    .driver_details {
        width: 25%;
        background-color: green;
    }



    h2 {
        font-size: 16px;
    }

    .journey_details_car_details {
        width: 300px;
        height: 52px;

        background-color: #FFFFFF;
        display: flex;
        /* border :1px solid #C8C8C8; */
        /* justify-content: space-between; */
        /* align-items: center; */


        margin-bottom: 10px;
        gap: 10px;
    }


    /* .estate_car_icon{
        background-color: #C8C8C8;
        } */
    .estate_car {
        color: #000000;
        font-size: 18px;
    }

    .estate-price {
        color: #EB1B25;
        font-size: 24px;

    }


    .estate_width {
        width: 100px;
        height: 52px;

        text-align: center;
        padding-top: 10px;

    }


    .time_container,
    .time_container_details {
        width: 1004px;
        /* height: 52px; */

        /* background-color: #FFFFFF; */
        display: flex;
        ;
        */ gap: 10px;
        /* border-bottom:1px solid gray; */
    }

    .time_content,
    .time_content__details {
        width: 251px;
        height: 52px;
        font-size: 14px;
        color: #1C1B1F;
    }

    .gray_border_line {
        /* background:#C8C8C8; */
        border-bottom: 1px solid #C8C8C8;

        width: 100%;
        display: block;
        height: 5px;
    }

    .time_container_details {
        color: #000000;
        font-size: 16px;
    }

    .driver_name {
        color: #1C1B1F;
        font-size: 14px;
    }

    .author_name {
        color: #000000;
        font-size: 16px;
    }

    .item-vehicle .vehicle-left .vehicle-facilities .text-fact.meet-greeting {
        background: 0
    }

    .item-vehicle .vehicle-left .vehicle-facilities .text-fact.free-cancel {
        background: 0
    }

    .item-vehicle .vehicle-left .vehicle-facilities .text-fact.free-waiting {
        background: 0
    }

    /* .item-vehicle .vehicle-left .vehicle-facilities .text-fact{width: auto;} */

    /* .booking-content{width: 25% !important;} */
    .booking-content {
        width: 25% !important;
    }

    .vehicle-left .journey {
        column-gap: 48px;
    }
    .vehicle-left{border-bottom: none !important;}

    .auther-name li{font-size: 16px !important; font-weight: 400 !important;}
    .booking_box_left{width: 75%;}
    .booking_box_right{width: 25%;}
    .smoll-text{font-size: 20px !important;}
    .journey-extra{width: 293px !important;}
    
     .booking_details {
        line-height: 20px;
        font-size: 12.5px;
    }

    .booking_details_heading {
        font-weight: 600;
        font-size:13px;
    }
    @media screen and (max-width:600px){
        .journy_heading{font-size:19px;}
    }

</style>


<section class="section">

    <div class="container">
        <h1 class="booking_title journy_heading"><i class="fa fa-arrow-left" aria-hidden="true"></i> Booking #{{$job->job_number}}</h1>

        <div class="box-row-tab mt-30">
            <div class="box-tab-left booking_box_left">
                <div class="box-content-detail">

                    <div class="item-vehicle wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="vehicle-left">
                            <div class="d-flex gap-20 align-items-center journey journey-extra">
                                <img src="{{url('public/'.$job->getCarCategory->image_path)}}/{{$job->getCarCategory->image}}"
                                    alt="" width="86" height="">
                                <p class="sall">{{$job->getCarCategory->name ?? ''}}</p>
                                <p class="pric">${{$job->total_price ?? ''}}</p>
                                <input type="hidden" value="72" name="car_price">

                            </div>
                            <div class="vehicle-facilities booking pt-30">
                                <div class="text-fact meet-greeting booking-content booking-comman col-3">
                                     <span class="booking_details_heading">PACK UP DATE</span>
                                    <span class="booking_details">{{\Carbon\Carbon::parse($job->job_date)->format('d/m/Y')}}</span>
                                </div>
                                <div class="text-fact meet-greeting booking-content booking-comman col-3">
                                     <span class="booking_details_heading">PACK UP TIME</span>
                                    <span class="booking_details">{{\Carbon\Carbon::parse($job->job_time)->format('H')}} Hrs {{\Carbon\Carbon::parse($job->job_time)->format('m')}} Mins</span>
                                </div>
                                <div class="text-fact meet-greeting booking-content booking-comman col-3">
                                     <span class="booking_details_heading">ADDRESS</span>
                                    <span class="booking_details">
                                        {{$job->address ?? ''}}
                                    </span>
                                </div>
                                <div class="text-fact meet-greeting booking-content booking-comman col-3">
                                    <span class="booking_details_heading">POSTAL CODE</span>
                                    <span class="booking_details">
                                    {{$job->postcode ?? ''}}
                                    </span>
                                </div>


                            </div>

                        </div>

                    </div>
                </div>

                <div class="box-tab-left comman p-0">
                    <div class="box-content-detail">

                        <div class="item-vehicle wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="vehicle-left">
                                <div class="d-flex gap-20 align-items-center journey pb-10 sidebar  px-0   border-0    ">
                                    <!-- <p class="sall">Personal Details</p> -->
                                    <h6 class="fw-bold journy_heading"> PERSONAL DETAILS</h6>

                                </div>
                                <div class="vehicle-facilities booking">
                                    <div class="text-fact meet-greeting booking-content booking-comman col-3">
                                        <span class="booking_details_heading">PHONE NUMBER</span>
                                        <span class="booking_details">{{$job->getClient->phone ?? ''}}</span>
                                    </div>
                                    <div class="text-fact meet-greeting booking-content booking-comman col-3">
                                        <span class="booking_details_heading">YOUR NAME</span>
                                        <span class="booking_details">{{$job->getClient->name ?? ''}}</span>
                                    </div>
                                    <div class="text-fact meet-greeting booking-content booking-comman col-3">
                                        <span class="booking_details_heading">EMAIL ADDRESS</span>
                                        <span class="booking_details">{{$job->getClient->email}}</span>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="box-tab-left comman">
                    <div class="box-content-detail">
                        <div class=" gap-20 align-items-center  pb-10 px-0 border-0">
                            <p class="smoll-text fw-bold journy_heading">MADE OF PAYMENT</p>
                            <div class="card-check ">
                                <div class="d-flex gap-3 mt-2">
                                    @if($job->payment_type_id == 1)
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio"  checked>
                                        <label class="form-check-label" for="cash">Cash</label>
                                    </div>
                                    @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" checked
                                            name="payment_method">
                                        <label class="form-check-label" for="credit_card">Credit Card</label>
                                    </div>
                                    
                                  
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="box-tab-right booking_box_right">
                <div class="sidebar mb-15">
                    <div class="d-flex align-items-center justify-content-between wow fadeInUp"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <h6 class="text-20-medium color-text fw-bold"> DRIVER DETAILS</h6>

                    </div>

                </div>
                <ul class="list-ticks list-ticks-small list-ticks-small-booking auther-name">
                    <li class="text-14 mb-20"><span class="booking_details_heading">Driver Name</span> </li>
                    <li class="text-14 mb-20">{{$job->getDriver->name ?? ''}}</li>

                </ul>

            </div>
        </div>

    </div>
</section>


@section('javascript-section')
<script></script>
@endsection
@endsection