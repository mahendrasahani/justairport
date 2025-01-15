<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    @page {
    margin-top: 2mm;
    padding-top: 2mm;
    
}



.container{max-width: 800px;
margin:0px;
padding: 0px;}
.invoice-title {
    margin-bottom: 20px;
}


table, th, td {
border: 1px solid black;
border-collapse: collapse;
text-align: left ;
}


.terms p {
    font-size: 0.9rem;
}
.remittance-table img {
    width: 150px;
}
.remittance-table p {
    margin: 0;
}
.journey-schedule .table th,
.journey-schedule .table td {
    vertical-align: middle;
    text-align: left;
    border: 1px solid #000;
}
.bold {
    font-weight: bold;
}
h1 {
    position: relative;
    margin-top: 20px;
    font-family: "Open Sans Condensed", sans-serif;
    text-align: center;
    position: relative;
    margin-top: 20px;
}
.one{
    margin-top: 0;
}
.one:before {
    content: "";
    display: block;
    border-top: solid 1px black;
    width: 100%;
    height: 1px;
    position: absolute;
    top: 50%;
    z-index: 1;
}
.one span {
background: #fff;
padding: 0 20px;
position: relative;
z-index: 5;
}


</style>
</head>

<body>
<div class="container nested-invoice-container mt-5">
<div class="row">
    <table class="tg" style="width: 100%; text-align:center;" >
        <thead>
            <tr>
                <th class="tg-0lax" style="width: 50%;">
                <p style="    text-align: center;">1378 Uxbridge Road Hillingdon UB10 0NQ</p>
                    <br>
                    <p style="    text-align: center;">Accounts: 020 8900 1333  <br> Email: info@justairports.com</p>
                </th>
                <th class="tg-0lax" style="text-align:center; width: 50%;" > 
                    <img src="{{ $data['logo_base64'] }}" class="logo img-fluid" alt="" width="200px">
                </th>
            </tr>
        </thead>
    </table>
</div>

<div class="row">
<table class="table table-bordered mt-4 journey-schedule" style="border: 1px solid #000; width: 100%; text-align:center;">

<tr> <td>  <p style=" text-align: center;">{{$data['account_detail']->account_name}}<br>
        {{$data['account_detail']->address}}<br>
        {{$data['account_detail']->email}}</p></td> 

<td> <h1 class="invoice-title one "><span>INVOICE</span></h1>
<p style="
text-align: center;
"><b>TERMS: 30 DAYS NET</b></p>
        <p style="text-align: center;"><b>VAT Reg: GB 744 2786 12</b></p></td>

</tr>


</table> 


    <!-- <div class="col-md-6 " style="border: 1px solid #000;">
        <p>{{$data['account_detail']->account_name}}<br>
        {{$data['account_detail']->address}}<br>
        {{$data['account_detail']->email}}</p>
    </div>
    <div class="col-md-6 " style="text-align: center;">
        <h1 class="invoice-title one "><span>INVOICE</span></h1>
        <p><b>TERMS: 30 DAYS NET</b></p>
        <p><b>VAT Reg: GB 744 2786 12</b></p></th> 
    </div> -->




</div>
<table class="table table-bordered mt-4  journey-schedule" style="border: 1px solid #000; width: 100%; margin-top:30px; text-align:left;">
    <tr style="border: 1px solid #000;" >
        
        <th style=" width:80%;">Your Account No.</th>
        <th style=" width: 10% ;"></th>
        <th>Invoice Date</th>
        <th>Invoice No.</th>
    </tr>
    <tr>
        <td>{{$data['account_detail']->account_number}}</td>
        <td ></td>
        <td>{{ $data['invoice_date'] }}</td>
        <td>{{$data['invoice_number']}}</td>
    </tr>
</table> 
<table class="table table-bordered mt-4" style="border: 1px solid #000; text-align:left !important; margin-top:30px;">
<tr style="border: 1px solid #000;">
        <th  colspan="3" style=" width:80%;">Item </th>
        <th  style=" width: 10%"> </th>
        <th>Total GBP</th>
        <th>VAT Code</th>
    </tr>
    <tr>
        <td colspan="3"  style="height: 300px; width:90%; vertical-align: top">Jobs as per attached Schedule. VAT at 20.00%</td>
        <td style=" width: 10%"></td>
        
        <td   style=" vertical-align: top"> {{number_format($data['total_amount'], 2) }}</td>
        <td   style=" vertical-align: top">01</td>
    </tr>
    <tr>
        <td class="tg-0lax" colspan="3" rowspan="2" style=" width: 10%">All goods carried are subject to our Terms of Trade and Standard Conditions of Carriage. Please note that all queries must be made within 30 days of the invoice date, any queries made after this time will not be considered.</td>
        <td class="tg-0lax">Sub Total</td>
        <td  class="tg-0lax">{{number_format($data['total_amount'], 2) }} GBP</td>
        <td class="tg-0lax"></td>
    </tr>
    <tr>
        <td class="tg-0lax">VAT</td>
        <td class="tg-0lax">{{number_format($data['vat_amount'], 2) }} GBP 
        <!-- {{number_format($data['total_amount'], 2) }} GBP -->
    </td>
        <td class="tg-0lax"></td>
    </tr>
    <tr>
        <td >TERMS</td>
        <td>30 Days</td>
        <td>DUE DATE </td>
        <td>{{ \Carbon\Carbon::parse($data['invoice_date'])->addMonth()->format('d/m/Y') }}</td>
        <td>TOTAL GBP</td>
        <td>{{number_format($data['total_amount'], 2) }}</td>
    </tr>
</table>
<div class="terms mt-4">

<table class="table table-bordered mt-4" style="border: 1px solid #000; height: 160px;  margin-top:30px; witdh:100%;">
    <tr>
        <td>-------------------------------------------------------------</td>
    </tr>
</table>
</div> 


<div class="row mt-5" style=" min-height: 300px; witdh:100%;">

<table class="table table-bordered mt-4" style="border: 1px solid #000; witdh:100%; text-align:center;">
    <tr>
        <td><img src="{{ $data['logo_base64'] }}" class="logo img-fluid" alt=""> </td>
        <td>  <h1 class="bold ">REMITTANCE ADVICE</h1>
        <p style="text-align: center;">Please return the remittance advice with your payment</p></td>
        <td> <p style="text-align: center;">1378 Uxbridge Road<br>Hillingdon<br>UB10 0NQ</p></td>
    </tr>
</table>

    <!-- <div class="col-md-2">
        <img src="{{ $data['logo_base64'] }}" class="logo img-fluid" alt="">
    </div>
    <div class="col-md-8 text-center">
        <h4 class="bold">REMITTANCE ADVICE</h4>
        <p>Please return the remittance advice with your payment</p>
    </div>
    <div class="col-md-2 text-end">
        <p>1378 Uxbridge Road<br>Hillingdon<br>UB10 0NQ</p>
    </div> -->
</div>


<table class="table table-bordered mt-4 remittance-table" style="border: 1px solid #000; width: 100%; text-align:left; min-height: 500px; margin-top:30px;">

    <tr style="border: 1px solid #000; width: 100%;">
        <th  style="width: 90%;" >Your Account No.</th>
        <th tyle="width: 10%;"></th>
        <th>Invoice No.</th>
        <th>Terms</th>
    </tr>



    <tr style="border: 1px solid #000; width: 100%;">
        <td  >{{$data['account_detail']->account_number}}</td>
        <td></td>
        <td>{{ $data['invoice_number'] }}</td>
        <td>30 Days</td>
    </tr></table> 


    <table class="table table-bordered mt-4 remittance-table" style="
    border: 1px solid #000;">

    <tr>
        <td rowspan="2">
            <p>CUSTOMER PAYMENT DETAILS</p>
            <p>Just Airports 1378 Uxbridge Road Hillingdon UB10 0NQ</p>
        </td>
    </tr>
    <tr>
        <th  colspan="4" >TERMS</th>
        <th>DUE DATE</th>
        <th>TOTAL DUE</th>
    </tr>
    <tr>
        <td colspan="4"  >
        <p>Account: Just Airports Chauffeur Services Ltd </p>
<p>Sort Code: 40-42-13 Account Number: 71367129</p>
        </td>
        <td>30 Days</td>
        <td>{{ $data['invoice_date'] }}</td>
        <td>{{number_format($data['total_amount']+$data['vat_amount'], 2) }}</td>
    </tr>

   
</table> 


<div class="row mt-4">
<table class="table table-bordered mt-4 journey-schedule" style="border: 1px solid #000;width: 100%;text-align:left;margin-top:30px;" >

<tr>
<td>  <p style="text-align: center;">Trinity House<br>Heather Park Drive Wembley<br>Middlesex<br>HA0 1SU</p>
<p style="text-align: center;">Accounts: 020 8900 1333<br<br>Email: info@justairports.com</p></td>
<td>  <h1 class="invoice-title">SCHEDULE OF JOURNEYS</h1></td>
<td style="text-align: center;"><img src="{{ $data['logo_base64'] }}" class="logo img-fluid" alt="" width="120px"></td>

</tr>

</table> 

    <!-- <div class="col-md-6">
        
    </div>
    <div class="col-md-6 text-end">
        
        
    </div>
</div> -->

<table class="table table-bordered mt-4 journey-schedule" style="border: 1px solid #000;width: 100%;text-align:left;margin-top:30px;" >
    <tr>
        <th>Your Account No.</th>
        <th>Customer</th>
        <th>Invoice Date</th>
        <th>Invoice No.</th>
        <th>Page No</th>
    </tr>
    <tr>
        <td>{{$data['account_detail']->account_number}}</td>
        <td>{{$data['account_detail']->account_name}}</td>
        <td>{{$data['invoice_date']}}</td>
        <td>{{$data['invoice_number']}}</td>
        <td>1</td>
    </tr>
</table>
<table class="table table-bordered journey-schedule mt-4" style="border: 1px solid #000;text-align:left;margin-top:30px;">
    <thead>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Service</th>
            <th>Our Ref</th>
            <th>Your Reference</th>
            <th>Price</th>
            <th>Mins</th>
            <th>Wait</th>
            <th>Misc</th>
            <th>Total GBP</th>
            <th>VAT Code</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data['jobs'] as $job)
    @php 
    $hours = floor($job->wating_time / 60);
    $minutes = $job->wating_time % 60;
    @endphp
        <tr>
            <td>{{Carbon\Carbon::parse($job->job_date)->format('d-m-Y')}}</td>
            <td>{{Carbon\Carbon::parse($job->job_time)->format('H:i')}}</td>
            <td>
            {{$job->getCarCategory->short_name}} {{$job->getCarCategory->name}}<br>
            {{$job->getClient != null ? $job->getClient->name : ''}}<br>
            {{$job->getClient != null ? $job->getClient->phone : ''}}<br> 
            Pax: {{$job->passenger_name}} 
            </td>
            <td>{{$job->ref ?? "-"}}</td>
            <td>
                @if($job->journey_type_id == 1)
                {{$job->address}}<br>
                {{$job->getAirportPickupLocation?->terminal_name}}.{{$job->getAirport->display_name}}
                @else
                {{$job->getAirportPickupLocation?->terminal_name}}.{{$job->getAirport->display_name}}<br>
                {{$job->address}}
                @endif
                <!-- TS:LHR<br>32 BRUNSWICK GARDENS W8 4AL -->
            </td>
            <td>{{number_format($job->total_price, 2)}}</td> 
            <td>{{$hours.'h:'.$minutes.'m'}}</td>
            <td>{{number_format($job->getPriceDetail?->waiting_charge, 2)}}</td>
            <td>{{number_format($job->getPriceDetail?->adjustment, 2)}}</td>
            <td>{{number_format($job->total_price, 2)}}</td>
            <td>01</td>
        </tr>
        @endforeach
        @php 
            $total_hours = floor($data['total_waiting_minutes']  / 60);
            $total_minutes = $data['total_waiting_minutes']  % 60;
            @endphp 
        <tr>
            <td colspan="4"></td>
            <td>TOTAL GBP</td>
            <td>{{number_format($data['total_amount'], 2)}} </td>
            <td>{{$total_hours.'h:'.$total_minutes.'m'}}</td>
            <td>{{number_format($data['total_waiting_charges'], 2)}}</td>
            <td>{{number_format($data['adjustment'], 2)}}</td>
            <td>{{number_format($data['total_amount'], 2)}}</td>
            <td>01</td>
        </tr>
    </tbody>
</table>
</div> 
<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
