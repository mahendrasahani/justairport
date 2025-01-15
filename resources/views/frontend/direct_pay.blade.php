@extends('layouts/frontend/main')
@section('main-section')

<style>
    .ccr_mainsection {
    margin: 0;
    padding: 0;
    display: inline-block;
    width: 100%;
    /* float: left; */
}

.bg_driver {
    background-color: #e5e5e5;
    margin: 45px 0;
    padding: 30px;
    border-radius: 8px;
}

.bg_driver h4 {
    margin-bottom: 20px;
    font-size: 20px;
    line-height: 24px;
        font-family: inherit;
}
 
</style>
<main class="main"> 
    <section class="ccr_mainsection">
        <div class="container"> 
            <div class="row">
                <div class="bg_driver">
                    <h4>Pay Now</h4>
                    <div class="form-group">
                        <input type="text" class="form-control bookingvalid" name="booking_id" id="booking_id" placeholder="Enter Your Booking Ref Id" onchange="searchBookingId();" value="{{$getoid ?? ''}}" readonly>
                    </div>
                    <p id="errorMsg"></p>
     
                    <!--================ For Registration Form =======================-->
                    <div style="display: block;" id="showForRegistration">
                        <form action="https://redirect.globaliris.com/epage.cgi" method="post" name="reg_paynow"
                            id="reg_paynow">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Booking Ref Id</label>
                                        <input class="form-control" type="text" name="reg_booking_id" id="reg_booking_id"
                                        value="{{$getoid ?? ''}}" readonly>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passenger Name</label>
                                        <input class="form-control" type="text" name="reg_p_name" id="reg_p_name"
                                        value="{{$getcname ?? ''}}" readonly>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile No</label>
                                        <input class="form-control" type="text" name="reg_p_mob" id="reg_p_mob"
                                        value="{{$get_mob ?? ''}}" readonly>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Passenger Email</label>
                                        <input class="form-control" type="text" name="reg_p_email" id="reg_p_email"
                                        value="{{$row->email ?? $getcemail}}" readonly>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Full Address</label>
                                        <input class="form-control" type="text" name="reg_p_address" id="reg_p_address"
                                        value="{{$row->address ?? 'London'}}" readonly>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Post Code/Zip Code</label>
                                        <input class="form-control" type="text" name="reg_zipcode" id="reg_zipcode"
                                        value="{{$row->postcode ?? 'SS1'}}" readonly>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Amount £(GBP)</label>
                                        <input class="form-control" type="hidden" name="reg_amount" id="reg_amount" value="{{$gettotal_amt ?? ''}}" readonly>
                                        <input class="form-control" type="text" name="" id="" value="{{$total_amount ?? ''}}" readonly>

                                    </div>
                                </div>
    
                                <!-- Begin 3D Secure 2 Mandatory and Recommended Fields -->
                                <input type="hidden" name="HPP_CUSTOMER_EMAIL" value="{{$getcemail ?? ''}}" id="HPP_CUSTOMER_EMAI2">
                                <input type="hidden" name="HPP_CUSTOMER_PHONENUMBER_MOBILE" value="44|2089001666" id="HPP_CUSTOMER_PHONENUMBER_MOBILE2">
                                <input type="hidden" name="HPP_BILLING_STREET1" value="1378, Uxbridge Road" id="HPP_BILLING_STREET12">
                                <input type="hidden" name="HPP_BILLING_STREET2" value="Hillington, Middlesex'" id="HPP_BILLING_STREET22">
                                <input type="hidden" name="HPP_BILLING_STREET3" value="UB10 0NQ" id="HPP_BILLING_STREET32">
                                <input type="hidden" name="HPP_BILLING_CITY" value="London" id="HPP_BILLING_CITY2">
                                <input type="hidden" name="HPP_BILLING_POSTALCODE" value="2AA" id="HPP_BILLING_POSTALCODE2">
                                <input type="hidden" name="HPP_BILLING_COUNTRY" value="840" id="HPP_BILLING_COUNTRY2">
                                <input type="hidden" name="HPP_ADDRESS_MATCH_INDICATOR" value="FALSE">
                                <input type="hidden" name="HPP_CHALLENGE_REQUEST_INDICATOR" value="NO_PREFERENCE">
                                 <input type="hidden" name="MERCHANT_RESPONSE_URL" value="https://www.justairports.com/paymentresponse">
    
                                <input type="hidden" name="MERCHANT_ID" value="justairportchauffeur" id="merchantid2">
                                <input type="hidden" name="ORDER_ID" value="{{$getoid ?? ''}}" id="orderid2">
                                <input type="hidden" name="CURRENCY" value="GBP" id="curr2">
                                <input type="hidden" name="AMOUNT" value="{{$gettotal_amt}}" id="amount2">
                                <input type="hidden" name="TIMESTAMP" value="{{$timestamp}}" id="timestamp2">
                                <input type="hidden" name="MD5HASH" value="{{$md5hash}}" id="md5hash2">
                                <input type="hidden" name="AUTO_SETTLE_FLAG" value="1">
                                <div class="col-md-12">
                                    <input type="button" class="btn btn-primary" name="reg_dpay" id="reg_dpay" value="Paynow">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@section('javascript-section')
<script>
    $('#reg_dpay').click(function(){
     var err = 0;
     var regbookingid 	= $('#reg_booking_id').val();
     var regname   		= $('#reg_p_name').val();
     var regmob   		= $('#reg_p_mob').val();
     var regemail   	= $('#reg_p_email').val();
     var regaddress   	= $('#reg_p_address').val();
     var regzipcode   	= $('#reg_zipcode').val();
     var regamount   	= $('#reg_amount').val();
     if(regbookingid =='' || regbookingid == null){
         alert('Please enter the booking id');
         $('#reg_booking_id').focus();
         err = 1;
         return false;
     }
    if(regname =='' || regname == null){
         alert('Please enter your name');
         $('#reg_p_name').focus();
         err = 1;
         return false;
     }
      if(regmob =='' || regmob == null){
         alert('Please enter your Mobile No');
         $('#reg_p_mob').focus();
         err = 1;
         return false;
     }
     if(regemail =='' || regemail == null){
         alert('Please enter your email');
         $('#reg_p_email').focus();
         err = 1;
         return false;
     }
     if(regemail !=''){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(regemail)) {
        alert('Please provide a valid email address');
        $('#reg_p_email').focus();
        err = 1;
        return false;
        } 
     }
      if(regaddress =='' || regaddress == null){
         alert('Please enter your Address');
         $('#reg_p_address').focus();
         err = 1;
         return false;
     }
     if(regzipcode =='' || regzipcode == null){
         alert('Please enter your Zip Code');
         $('#reg_zipcode').focus();
         err = 1;
         return false;
     }
     if(regamount =='' || regamount == null){
         alert('Please enter Amount');
         $('#reg_amount').focus();
         err = 1;
         return false;
     }
       if(!err){
        let url = "{{route('frontend.reg_directpay')}}";
        $("#reg_paynow").submit();
          //alert('ready to submit'); 
        //   var regdt = $('#reg_paynow').serialize(); 
        //   $.ajax({
    	// 		url:'https://www.justairports.com/ajax/reg_directpayment.php',
    	// 		type:'POST',
    	// 		data:regdt,
    	// 		dataType: 'json',
    	// 		beforeSend: function(){ $("#reg_dpay").val('Please Wait....');},
    	// 		success: function(regdata)
    	// 		{
        //    if(regdata.status){
        //         $('#HPP_CUSTOMER_EMAI2').val(regdata.HPP_CUSTOMER_EMAIL);
        //         $('#HPP_CUSTOMER_PHONENUMBER_MOBILE2').val(regdata.HPP_CUSTOMER_PHONENUMBER_MOBILE);
        //         $('#HPP_BILLING_STREET12').val(regdata.HPP_BILLING_STREET1);
        //         $('#HPP_BILLING_STREET22').val(regdata.HPP_BILLING_STREET2);
        //         $('#HPP_BILLING_STREET32').val(regdata.HPP_BILLING_STREET3);
        //         $('#HPP_BILLING_CITY2').val(regdata.HPP_BILLING_CITY);
        //         $('#HPP_BILLING_POSTALCODE2').val(regdata.HPP_BILLING_POSTALCODE);
        //         $('#HPP_BILLING_COUNTRY2').val(regdata.HPP_BILLING_COUNTRY);
                
        //         $('#merchantid2').val(regdata.merchantid);
        //         $('#orderid2').val(regdata.orderid);
        //         $('#curr2').val(regdata.curr);
        //         $('#amount2').val(regdata.amount);
        //         $('#timestamp2').val(regdata.timestamp);
        //         $('#md5hash2').val(regdata.md5hash);
    	// 		$("#reg_paynow").submit();
        //         //document.payform.submit();
        //     } 
        //     	return false;
    	// 	}
    	// 	});
       } 
});
</script>
@endsection
@endsection