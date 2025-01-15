<style>
    td.flex-p-bold {
        font-size: 14px !important;
        color: #595959 !important;
        line-height: 26px !important;
        font-weight: 400;
    }


    td.flex-p {
        font-size: 14px !important;
        color: #595959 !important;
        line-height: 26px !important;
        font-weight: 400;
    }

    p {
        font-size: 14px !important;
        color: #595959 !important;
    }


    td {

        padding-top: 10px;

    }

    body {
        background-color: rgb(235, 235, 235);
    }

    hr {

        border-bottom: 1px dashed #999999;
    }
</style>


<body style="margin: 0; padding: 0; bgcolor: #EBEBEB;" >

<!--HEADER-->
                                                       
<table border="0" cellpadding="0" cellspacing="0" width="100%">

    <tr>
        <td bgcolor="">
            <div align="center" style="padding: 0px 15px 0px 15px;">
                <table border="0" cellpadding="0" cellspacing="0" width="580" class="responsive-table">

                    <!-- LOGO/PREHEADER TEXT -->

                    <tr>
                        <td align="center" style="padding: 20px 0 0 0;">
                            <a href="#" target="blank">

                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">

                                <!-- TOP TICKER -->

                                <tr>

                                </tr>

                                <!-- CONFIRMATION COPY -->
                                <tr>
                                    <td bgcolor="#2A2867" style="padding: 30px 0 30px 0;" class="pad-header">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <td style="padding: 20px 0 0 0;padding-bottom: 30px;" align="center">
                                                <img src="https://www.justairports.com/crm/images/brand_logo.png"
                                                    alt="">
                                            </td> 
                                            <tr style="color:White;border-color:Black;border-width:1px;border-style:solid;font-size:16pt;font-weight:bold"
                                                align="center">
                                                <td colspan="2">{{$booking_data['heading']}}</td> 
                                            </tr> 
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
   

    <!-- RESERVATION DETAILS
                                                                                      
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td bgcolor="#EBEBEB" align="center" style="padding: 0 15px 0 15px;">
            <table border="0" cellpadding="0" cellspacing="0" width="580" class="responsive-table">
                <tr>
                    <td bgcolor="#ffffff">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
     
                       RESERVATION DEETS -->
    
    <tr>
        <td style="padding: 10px 30px 0 30px;">
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="
    margin: auto;
">
                <tr>
                    <td align="left"
                        style="padding: 0 0 15px 0; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 300; border-bottom: 1px dashed #999999;">
                        DEAR {{strtoupper($booking_data['passenger_name'])}}

                    </td>
                </tr>
                <!-- <tr>
                    <td align="left"
                        style="padding: 0 0 15px 0; font-size: 14px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color:#000; font-weight: 300; line-height: 22px; text-align: left;border-bottom: 1px dashed #999999;">
                        Web reference No. #{{$booking_data['job_number']}}
                    </td>
                
                    <td align="left"
                        style="padding: 0 0 15px 0; font-size: 14px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 300; line-height: 22px; text-align: right;border-bottom: 1px dashed #999999; padding: 0px 30px 0 0px;">
                        Booking From :web
                    </td>
                </tr> -->

                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                WEB REFERENCE NO. # {{strtoupper($booking_data['job_number'])}}
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000;; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                BOOKING FROM: WEB
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!-- CHECK-IN -->
                 @if($booking_data['pickup_from'] != '')
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                PICK UP FROM:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000;; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['pickup_from'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
               @if($booking_data['drop_of_at'] != '')
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0;border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width=40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                DROP OFF AT:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['drop_of_at'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>



                            </tr>
                        </table>
                    </td>
                </tr>
            @endif

                @if($booking_data['vehicle'] != '')
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                VEHICLE:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['vehicle'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                <!-- NUMBER OF ROOMS -->
               
                <tr>
                    <td>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        @if($booking_data['job_date'] != '')
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                DATE:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{Carbon\Carbon::parse($booking_data['job_date'])->format('d-m-Y')}}
                                                </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endif
                        </table>




                        @if($booking_data['job_time'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="30%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                TIEM:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{$booking_data['job_time']}}

                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        @endif

                        @if($booking_data['price'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                PRICE
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                £{{$booking_data['price']}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        @endif


                        @if(isset($booking_data['payment_link']) && $booking_data['payment_link'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                PAYMENT LINK
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['payment_link'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        @endif

                        <h4>FURTHER DETAILS</h4>


                        @if($booking_data['terminal'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left; "
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                TERMINAL:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['terminal']) ?? ''}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        @endif

                        @if($booking_data['flight_number'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                FLIGHT NO:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                 {{strtoupper($booking_data['flight_number'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        @endif


                        @if($booking_data['departure_city'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                CITY OF DEPARTURE:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                 {{strtoupper($booking_data['departure_city'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif


                        @if($booking_data['passenger_name'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                NAME:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['passenger_name'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        @if($booking_data['contact_phone'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                MOBILE NO. (WITH COUNTRY CODE):
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                +{{$booking_data['contact_phone']}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        @if($booking_data['contact_email'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                EMAIL ADDRESS:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['contact_email'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

 
                        @if($booking_data['no_of_passenger'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                NO. OF PASSENGERS:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{$booking_data['no_of_passenger']}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        @if($booking_data['no_of_checkin_luggage'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                NO. OF LUGGAGES:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{$booking_data['no_of_checkin_luggage']}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        @if($booking_data['no_of_hand_luggage'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                NO. OF HAND LUGGAGES:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{$booking_data['no_of_hand_luggage']}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        @if($booking_data['address'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="10%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                ADDRESS:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="90%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['address'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif


                        @if($booking_data['full_post_code'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                FULL POST CODE:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['full_post_code'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        @if($booking_data['notes'] != '')
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                PAX NOTES:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #333333; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{strtoupper($booking_data['notes'])}}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        @if($booking_data['baby_seat'] > 0)
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td valign="top" style="padding: 0 0 5px 0; border-bottom: 1px dashed #999999;">
                                    <!-- LEFT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="40%" align="left"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px; text-align: left;"
                                                bgcolor="#ffffff" class="flex-p-bold">
                                                URGENT: BABY SEATS:
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- RIGHT COLUMN -->
                                    <table cellpadding="0" cellspacing="0" border="0" width="60%" align="right"
                                        class="responsive-table">
                                        <tr>
                                            <td align="center"
                                                style="padding: 0 0 0 0; font-family: Arial, sans-serif; color: #000; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 400; font-size: 14px; line-height: 22px; text-align: right;"
                                                bgcolor="#ffffff" class="flex-p">
                                                {{$booking_data['baby_seat']}} - 
                                                @for($i = 0; $i < $booking_data['baby_seat']; $i++)
                                                {{$booking_data['child_age'][$i] ?? ''}} YEARS,
                                                @endfor
                                            
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 
                        </table>
                        @endif

                        <p>CLICK ON TFL LINK : <a href="https://tfl.gov.uk/modes/driving/congestion-charge"
                                target="_blank"
                                data-saferedirecturl="https://www.google.com/url?q=https://tfl.gov.uk/modes/driving/congestion-charge&amp;source=gmail&amp;ust=1720874118117000&amp;usg=AOvVaw3fES8_6M1PGcQqfBIstUTi">https://tfl.gov.uk/modes/<wbr>driving/congestion-charge</a>
                        </p>

                        <p>cash airport pick up is subject to parking charges and credit card airport pick up already
                            included parking charges.
                            Bookings made for pickup within next 4 hours are subject to availability of drivers.</p>
                    </td>
                </tr>
                <!-- ROOM TYPE -->
                <!--  -->
            </table>
        </td>
    </tr>


    <table width="580" border="0" align="center" cellspacing="0" cellpadding="0" style="padding-top: 20px; ">
        <!-- EXTRA HOTEL INFO -->
        <tr>
            <td align="left"
                style="padding: 0 0 15px 0; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 300; line-height: 22px; text-align: left;border-bottom: 1px dashed #999999;">
                Total Payment:
            </td>

            <td align="left"
                style="padding: 0 0 15px 0; font-size: 20px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 300; line-height: 22px; text-align: right;border-bottom: 1px dashed #999999; padding: 0px 30px 0 0px;">
                £{{$booking_data['price']}}
            </td>
        </tr>

        <!-- <tr>
            <td align="left"
                style="padding: 0 0 15px 0; font-size: 14px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color:#000; font-weight: 300; line-height: 22px; text-align: left;border-bottom: 1px dashed #999999;">
                Web reference No. #{{$booking_data['job_number']}}
            </td>

            <td align="left"
                style="padding: 0 0 15px 0; font-size: 14px; font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 300; line-height: 22px; text-align: right;border-bottom: 1px dashed #999999; padding: 0px 30px 0 0px;">
                Booking From :web
            </td>
        </tr> -->

        <!-- CHECK IN -->
        <tr>
            <td align="left"
                style="font-family: 'Open Sans', Helvetica, Arial, sans-serif; color: #000; font-weight: 600; font-size: 14px; line-height: 22px;padding-bottom: 30px;">
                <p>Regards: Just Airport</p>
                <!-- <p>Toll free number: 0800 096 8 096</p> -->
                <p>Call Us: +44 208 900 1666</p>
            </td>
        </tr>

        </tr>
    </table>

    <!-- PAYMENT INFORMATION -->

    </table>
    </td>
    </tr>
    </table>
    </td>
    </tr>

    </table>


    <!-- ADDITIONAL INFORMATION -->


    <!-- FOOTER -->


</body>