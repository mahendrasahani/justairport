@extends('layouts/frontend/main')
@section('main-section')
 <section class="section  p-25  mb-lg-40 p-10" > 
    <div class="container-xl"> 
        <div class="row">
            <main class="main">
                <div style="display: block;" id="showForRegistration">
                    <form action="https://redirect.globaliris.com/epage.cgi" method="post" name="pyament_form" id="pyament_form">
                        @csrf
                        <div class="row">
              				<div class="col-md-6">  
              					<div class="form-group">
              					    <label>Booking Ref Id</label>
              						<input class="form-control" type="text" name="booking_id" id="booking_id" onChange="searchBookingId();">
              					</div>
              				</div> 
                            <div class="col-md-6">  
                                <div class="form-group">
                                    <label>Passenger Name</label>
                                    <input class="form-control" type="text" name="passenger_name" id="passenger_name">
                                </div>
                            </div> 
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" name="passenger_phone" id="passenger_phone">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Passenger Email</label>
                                    <input class="form-control" type="text" name="passenger_email" id="passenger_email">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Full Address</label>
                                    <input class="form-control" type="text" name="passenger_address" id="passenger_address">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Post Code/Zip Code</label>
                                    <input class="form-control" type="text" name="passenger_zipcode" id="passenger_zipcode">
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label>Amount £(GBP)</label>
                                    <input class="form-control" type="text" name="total_amount" id="total_amount">
                                    <input type="hidden" id="order_id">
                                </div>
                            </div>

                            <!-- Begin 3D Secure 2 Mandatory and Recommended Fields -->
                            <input type="hidden" name="HPP_CUSTOMER_EMAIL" value="" id="HPP_CUSTOMER_EMAIL">
                            <input type="hidden" name="HPP_CUSTOMER_PHONENUMBER_MOBILE" value="" id="HPP_CUSTOMER_PHONENUMBER_MOBILE">
                            <input type="hidden" name="HPP_BILLING_STREET1" value="" id="HPP_BILLING_STREET1">
                            <input type="hidden" name="HPP_BILLING_STREET2" value="" id="HPP_BILLING_STREET2">
                            <input type="hidden" name="HPP_BILLING_STREET3" value="" id="HPP_BILLING_STREET3">
                            <input type="hidden" name="HPP_BILLING_CITY"  value="" id="HPP_BILLING_CITY">
                            <input type="hidden" name="HPP_BILLING_POSTALCODE" value="" id="HPP_BILLING_POSTALCODE">
                            <input type="hidden" name="HPP_BILLING_COUNTRY" value="" id="HPP_BILLING_COUNTRY">
                            <input type="hidden" name="HPP_ADDRESS_MATCH_INDICATOR" value="FALSE">
                            <input type="hidden" name="HPP_CHALLENGE_REQUEST_INDICATOR" value="NO_PREFERENCE">
                           <!--  <input type="hidden" name="MERCHANT_RESPONSE_URL" value="https://www.justairports.com/thanks-page.php"> -->
    
                            <input type="hidden" name="MERCHANT_ID" value="" id="justairportchauffeur">
                            <input type="hidden" name="ORDER_ID" value="" id="orderid">
                            <input type="hidden" name="CURRENCY" value="" id="curr">
                            <input type="hidden" name="AMOUNT"  value="" id="amount">
                             <input type="hidden" name="TIMESTAMP" value="" id="timestamp">
                            <input type="hidden" name="MD5HASH" value="" id="md5hash">
                            <input type="hidden" name="AUTO_SETTLE_FLAG" value="1"> 
                            <div class="col-md-12">
                            	<input type="button" class="btn btn-primary" name="reg_dpay" id="reg_dpay" value="Pay Now">
                            </div> 
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</section>

@section('javascript-section')
<script>
    async function searchBookingId() {
        let check_booking_url = "{{ route('frontend.api_direct_pay_manual_chk_bkng') }}";
        var bookingId = document.getElementById("booking_id").value;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        try {
            let response = await fetch(check_booking_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, 
                },
                body: JSON.stringify({
                    bookingId: bookingId, 
                }),
            });
            if (response.ok) {
                let responseData = await response.json(); 
                if(responseData.status =="no_data_found"){ 
                  $("#passenter_name").val("");
                  $("#passenger_phone").val("");   
                  $("#passenger_email").val("");   
                  $("#passenger_address").val("");
                  $("#passenger_zipcode").val("");        
                  $("#amount").val("");      
                  $("#order_id").val("");
                }else{
                  $("#passenger_name").val(responseData.data.passenger_name);
                  $("#passenger_phone").val(responseData.data.passenger_phone);
                  $("#passenger_email").val(responseData.data.email);
                  $("#passenger_address").val(responseData.data.address);
                  $("#passenger_zipcode").val(responseData.data.postcode); 
                  $("#total_amount").val(responseData.data.total_price); 
                  $("#order_id").val(responseData.data.job_number);
                }
            }else{
                console.error('Error:', response.status, response.statusText);
            }
        }catch (error){
            console.error('Fetch error:', error);
        }
    }
  
    $('#reg_dpay').click(function(){
        var err = 0;
        var booking_id = $('#booking_id').val();
        var passenger_name = $('#passenger_name').val();
        var passenger_phone = $('#passenger_phone').val();
        var passenger_email = $('#passenger_email').val();
        var passenger_address = $('#passenger_address').val();
        var passenger_zipcode = $('#passenger_zipcode').val();
        var total_amount = $('#total_amount').val();
        if(booking_id =='' || booking_id == null){
            alert('Please enter the booking id');
            $('#booking_id').focus();
            err = 1;
            return false;
        }
        if(passenger_name =='' || passenger_name == null){
            alert('Please enter your name');
            $('#passenger_name').focus();
            err = 1;
            return false;
        }
        if(passenger_phone =='' || passenger_phone == null){
            alert('Please enter your Mobile No');
            $('#passenger_phone').focus();
            err = 1;
            return false;
        }
        if(passenger_email =='' || passenger_email == null){
            alert('Please enter your email');
            $('#passenger_email').focus();
            err = 1;
            return false;
        }
        if(passenger_email !=''){
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(passenger_email)){
                alert('Please provide a valid email address');
                $('#passenger_email').focus();
                err = 1;
                return false;
            }
        }
        if(passenger_address =='' || passenger_address == null){
            alert('Please enter your Address');
            $('#passenger_address').focus();
            err = 1;
            return false;
        }
        if(passenger_zipcode =='' || passenger_zipcode == null){
            alert('Please enter your Zip Code');
            $('#passenger_zipcode').focus();
            err = 1;
            return false;
        }
        if(total_amount =='' || total_amount == null){
            alert('Please enter Amount');
            $('#amount').focus();
            err = 1;
            return false;
        }
        if (!err) {
            let api_url = "{{route('frontend.set_form_data.api_direct_pay_manual')}}";
            let formElement = document.getElementById('pyament_form');
            let formData = new FormData(formElement);
            document.getElementById("reg_dpay").value = 'Please Wait...';
            fetch(api_url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData,
            })
            .then(response => response.json())
            .then(result_data => {
                if(result_data.status) { 
                    document.getElementById('HPP_CUSTOMER_EMAIL').value = result_data.data.HPP_CUSTOMER_EMAIL;
                    document.getElementById('HPP_CUSTOMER_PHONENUMBER_MOBILE').value = result_data.data.HPP_CUSTOMER_PHONENUMBER_MOBILE;
                    document.getElementById('HPP_BILLING_STREET1').value = result_data.data.HPP_BILLING_STREET1;
                    document.getElementById('HPP_BILLING_STREET2').value = result_data.data.HPP_BILLING_STREET2;
                    document.getElementById('HPP_BILLING_STREET3').value = result_data.data.HPP_BILLING_STREET3;
                    document.getElementById('HPP_BILLING_CITY').value = result_data.data.HPP_BILLING_CITY;
                    document.getElementById('HPP_BILLING_POSTALCODE').value = result_data.data.HPP_BILLING_POSTALCODE;
                    document.getElementById('HPP_BILLING_COUNTRY').value = result_data.data.HPP_BILLING_COUNTRY;
        
                    document.getElementById('justairportchauffeur').value = result_data.data.merchantid;
                    document.getElementById('orderid').value = result_data.data.orderid;
                    document.getElementById('curr').value = result_data.data.curr;
                    document.getElementById('amount').value = result_data.data.amount;
                    document.getElementById('timestamp').value = result_data.data.timestamp;
                    document.getElementById('md5hash').value = result_data.data.md5hash; 
                    document.getElementById("pyament_form").submit();
                }else{
                    document.getElementById("reg_dpay").value = 'Pay Now';
                    return false;
                }
            })
            .catch(error =>{
                console.error('Error:', error);
                document.getElementById("reg_dpay").value = 'Pay Now';
            });
        } 
    });
</script>
@endsection
@endsection