@extends('layouts/frontend/main') 
@section('main-section') 
<style>
    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }


    img {
        vertical-align: middle
    }


    .img-responsive,
    .thumbnail>img,
    .thumbnail a>img,
    .carousel-inner>.item>img,
    .carousel-inner>.item>a>img {
        display: block;
        width: 100% \9;
        max-width: 100%;
        height: auto
    }

    .img-rounded {
        border-radius: 6px
    }

    .img-thumbnail {
        display: inline-block;
        width: 100% \9;
        max-width: 100%;
        height: auto;
        padding: 4px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        margin-left: -20px;
    }


    .img-circle {
        border-radius: 50%
    }

    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #eee
    }


    .container {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }

    @media (min-width: 768px) {
        .container {
            width: 750px
        }
    }

    @media (min-width: 992px) {
        .container {
            width: 970px
        }
    }

    @media (min-width: 1200px) {
        .container {
            width: 1170px
        }
    }

    .container-fluid {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }

    .row {
        margin-right: -15px;
        margin-left: -15px
    }

    @media (min-width: 992px) {

        .col-md-1,
        .col-md-2,
        .col-md-3,
        .col-md-4,
        .col-md-5,
        .col-md-6,
        .col-md-7,
        .col-md-8,
        .col-md-9,
        .col-md-10,
        .col-md-11,
        .col-md-12 {
            float: left
        }

        .col-md-12 {
            width: 100%
        }

        .col-md-6 {
            width: 50%
        }

    }


    th {
        text-align: left
    }


    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px
    }

    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd
    }


    .inf-content {
        border: 1px solid #DDDDDD;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
        height: 55%;
        padding: 80px;
        margin-bottom: 60px;

    }
</style>

<section class="user-profile1 section mt-60">
    <div class="container">
        <div class="panel-body inf-content">
            <div class="row">
            @if($driver == '' || $driver == NULL)
                    <h4>Driver Profile Not Found</h4>
            @else
                <div class="col-md-4">
                    @if($driver->image_driver == '')
                    <img alt="" style="width: 360px;" title="" class="img-circle img-thumbnail isTooltip" 
                     src="{{url('public/assets/backend/images/drivers-images/default-driver.jpg')}}" data-original-title="Usuario">
                        @else
                        <img alt="" style="width: 360px;" title="" class="img-circle img-thumbnail isTooltip" 
                        src="{{url('public/assets/backend/images/drivers-images')}}/{{$driver->image_driver}}" data-original-title="Usuario">
                        @endif
                </div>
                <div class="col-md-6"> 
                    <div class="table-responsive">
                        <table class="table table-user-information">
                            <tbody>
                                 
                                <tr>
                                    <td>
                                        <strong>

                                            Name
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{$driver->full_Name ?? ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>

                                            Contact No
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        {{$driver->phone ?? ''}}
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <strong>

                                        Vehicle Registration No.
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                    {{$driver->reg_No ?? ''}}
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <strong>

                                        Vehicle Model
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                    {{$driver->vmm ?? ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>

                                        Vehicle Color
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                    {{$driver->vehicle_Color ?? ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>

                                        Operating Center Number
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                    <a href="tel:+442089001666">+44 208 900 1666</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>

                                        PCO Badge Number
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                    {{$driver->nino ?? ''}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

@endif


        </div>
    </div>
</section>

@endsection