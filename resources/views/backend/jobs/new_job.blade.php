@extends('layouts/backend/main')
@section('main-section')



<style>
  .row{
    margin: 0px !important;
}

.row>*{
    padding: 0px !important;
}

.row>div{
  margin-bottom:2px !important;
}

.confirm_box{
  margin-top: 2px !important;
}

.custom_table_header{
  background: #abc4de;
    font-size: 12px;
    padding: 2px 5px;
    color: black;
    font-weight: 500;
    box-shadow: inset 3px -9px 5px #8cbdef
 }  
 .custom_table_header p{
  margin-bottom:0px !important;
  
 }

 .main_section{
  width: 60%;
  margin: 4px auto;
  border: 1px solid rgb(180, 174, 174);
    background: rgb(217, 207, 207);
    box-shadow: 2px 2px 7px grey;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0px 1px 7px 2px grey;
 }
 .main-container2{ 
    padding:3px 10px !important;
    display: flex;
    flex-direction: column; 
    padding-bottom: 5px !important;  
 }
 .submit_btn{
  height: 20px !important;
    font-size: 14px;
    padding: 0px;
    width: 60px;
 }
 .highlighted {
      border: 2px solid blue; /* Change to whatever highlight color you want */
    }

span{
  font-size: 13px !important;
}

.select2-container--focus .select2-selection--single {
 
    border: 3px solid #61afff !important;
  }

  input:focus{
    border: 3px solid #61afff !important;
  }
  input:focus-visible{
    border: none !important;
  }
 
</style>
<div class="content-wrapper">  
  <form>
    <section class="main_section">
    <div class="custom_table_header">
      <p>New Job</p> 
      </div>
      <div class="main-container2">
    
      @csrf
      <div class="row gap-3 align-items-center">
        <div class="col-md-7 d-flex">
          <span style="margin-right:5px">Acc</span>
          <div style="width:20%;" tabindex="1" class="input_box  account_box">

            <select class="account_suggestion input_box" name="state" id="account_suggestion">
              <option value=""> </option>
              <option value="">sachin</option>
              <option value="">anil</option>
              <!-- @if(count($accounts) > 0)
              @foreach($accounts as $account)
              <option value="{{$account->id}}">{{$account->account_number}}</option>
              @endforeach
              @endif -->
          </select>
          </div>



          <div style="width:70%" class="input_box account_box ms-0">
          
            <select class="account_name_suggestion input_box w-100" tabindex="2" name="state" id="account_name_suggestion">
              <option value="">
                <p><span>***</span> No Account selected <sub>***</sub></p>
              </option>
              <option value="">sachin</option>
              <!-- @if(count($accounts) > 0)
              @foreach($accounts as $account)
              <option value="{{$account->id}}">{{$account->account_name}}</option>
              @endforeach
              @endif -->
            </select>
          </div>

          <input type="text" class="input_box" style="width:20%" name="account_display_name" id="account_display_name" disabled>
          <input type="hidden" style="width:5%" name="account_id" id="account_id">

        </div>


        <div class="col-md-4">
          <div class="row">
            <div class="d-flex">
              <span style="margin-right:5px">Car</span>
              <div>

                <select name="car_category" tabindex="3" id="car_category" class="car_category disabled_box" name="state" >
                  <option value=""></option>
                  <!-- @foreach($car_categories as $car_category)
                  <option value="{{$car_category->id}}">{{$car_category->short_name}}</option>

                  @endforeach -->
                </select>
              </div>

              <input type="text" placeholder="" class="input_box disabled_box" style="width:60%" id="car_category_name" name="car_category_name" disabled>
            </div>
          </div>



        </div>
      </div>







      <div class="row">

        <div class="col-md-4 ">
          <span style="margin-right:5px">Job Date</span><input type="date" class="input_box" tabindex="4" id="job_date" name="job_date" onchange="getDay(`job_date`,`job_day`)">
          <input type="text" class="input_box disabled_input" id="job_day" name="job_day" style="width:50px" disabled>
        </div>


        <div class="col-md-7 d-flex">
          <span Job Time</span>
          <input type="text" class="input_box disabled_box" tabindex="5" style="width:173px;padding-left:50px" id="job_time" name="job_time">
        </div> 

        <div class="row confirm_box">
          <div class="col-md-6 d-flex confirm_box">
            <span  style="margin-right:5px">Contact</span>

            <div class="position-relative input_box">
              <input type="text" class="disabled_box input_box" autocomplete="nope"  style="width:100%;"  name="contact_name" id="contact_name" />
              <ul class="contact_suggestion" id="contact_suggestion">
              </ul>

              <input type="hidden" style="width:5%" id="client_id" name="client_id" class="disabled_box">
            </div>

          </div>
          <div class="col-md-6 d-flex confirm_box">
            <span  style="margin-right:5px">Tel</span>
            <input type="tel" class="disabled_box input_box" name="telphone_number" id="telephone_number" />
            <button class="profile_modal_btn" id="profile_modal_btn" onclick="ProfileModal(event)">P</button>
          </div>
        </div>




        <div class="row confirm_box">
          <div class="col-md-6 d-flex confirm_box">
            <span  style="margin-right:5px">Ref</span>
            <input type="text" class="disabled_box input_box" id="rel" name="ref" id="ref" />

          </div>
          <div class="col-md-6 d-flex confirm_box">
            <span  style="margin-right:5px">Ref2</span>
            <input type="text" class="disabled_box input_box" name="ref2" id="ref2" />
            <p style="width: 20.95px;"></p>
           
          </div>
        </div>





        <div class="row confirm_box">
          <div class="col-md-6 d-flex confirm_box">
            <span  style="margin-right:5px">Passenger</span>
            <input type="text" class="disabled_box input_box" id="passenger_name" name="passenger_name" />

          </div>
          <div class="col-md-6 d-flex confirm_box">
            <span  style="margin-right:5px">Telephone</span>
            <input type="tel" class="disabled_box input_box" id="passenger_phone" name="passenger_phone" />
            <button class="profile_modal_btn" onclick="ProfileModal(event)">P</button>
          </div>
        </div>


        <div class="row">
          <div class="col-md-3 d-flex">
            <span style="width:fit-content;margin-right:5px">No. of Passengers</span>
            <input type="number" class="input_box disabled_box" style="width:20%" id="passenger_count" name="passenger_count">
          </div>
          <div class="col-md-3 d-flex">
            <span style="width:fit-content;margin-right:5px">No. of Chekin Bags</span>
            <input type="number" class="input_box disabled_box" style="width:20%" id="checkin_luggage_count" name="checkin_luggage_count">
          </div>

          <div class="col-md-3 d-flex" >
            <span style="width:fit-content;margin-right:5px">No. of Hand Bags</span>
            <input type="number" name="callout_reqd disabled_box" id="callout_reqd"  style="width:20%">
          </div>






        <div class="row gap-2">
       
          <div class="col-md-8 d-flex my-1">
            <span  style="margin-right:5px" >E-mail address</span>
            <input type="email" class="disabled_box input_box" autocomplete="nope" id="email_address" name="email_address" style="width: 80%;">
          </div>

          <div class="col-md-3 d-flex my-1">
            <span  style="margin-right:5px">E-mail ack required?</span>
            <input type="checkbox" checked name="email_acknowledge_flag" id="email_acknowledge_flag" value="1" style="width: 23px;">

          </div>
        </div>



        <div>
          <span>Journey Details</span>
          <div>
               
          <div style="width:100%;display:flex">
            <input type="text" class="journey_start disabled_box" style="width:10%" value="" name="journey_start" id="journey_start" placeholder="P/D">
            <input type="hidden" name="journey_type_id disabled_box" id="journey_type_id">

            <select class=" journey_start_details disabled_box" style="width:95%" name="airport_id" id="journey_start_details">
              <option value="">--SELECT AIRPORT--</option>
              <!-- @if(count($airports) > 0)
              @foreach($airports as $airport)
              <option value="{{$airport->id}}">{{$airport->airport_name}}</option>
              @endforeach
              @endif -->

            </select>
          </div>
          <div style="width:100%;display:flex">
            <input type="text" class=" journey_end disabled_box" autocomplete="nope" style="width:10%" value="" name="journey_end" id="journey_end" >

            <input class="journey_end_details disabled_box" autocomplete="nope" style="width:95%" name="address" id="journey_end_details" placeholder="--SEARCH GOOGLE MAPS--">

          </div>
       
          <div class="d-flex justify-content-between">
            <!-- <div style="width:30%" class="d-flex input_box">
              <span>Flight No.</span>
              <input type="text" class="mt-1 input_box disabled_box" value="" style="width:60%" name="flight_number" id="flight_number">
            </div>
            <div style="width:30%" class="d-flex input_box">
              <span>City Of Arrival</span>
              <input type="text" class="mt-1 input_box disabled_box" style="width:60%" name="arrival_city" id="arrival_city">
            </div>

            <div style="width:30%" class="d-flex input_box confirm_box">
              <span>Car Park</span>
              <input type="text" class="mt-1 input_box disabled_box" style="width:60%" name="car_park" id="car_park">
            </div> -->

          </div>
       
          </div> 
        </div> 
        <div  class="d-flex">
          <select name="" id=""  class="journey_end disabled_box" style="width:10%">
           <option value="">Notes</option>
            <option value="">SEE JOBS</option>
            <option value="">URGENT</option>
          </select>
          <select name="" id=""  class="journey_end disabled_box" style="width:20%">
          <option value="">Terminal</option>
            <option value="">SEE JOBS</option>
            <option value="">URGENT</option>
          </select>
          <input type="text" value="" placeholder="Flight no." style="width:20%">
          
          <input type="text" value="" autocomplete="nope" placeholder="City of arrival" style="width:20%">
          <select name="" id=""  class="journey_end disabled_box" style="width:20%">
          <option value="">Car park</option>
            <option value="CAR PARK">YES</option>
            <option value="">NO</option>
          </select>
          <select name="" id=""  class="journey_end disabled_box" style="width:20%">
          <option value="">Additional seat</option>
            <option value="BABY SEAT">BABY SEAT</option>
            <option value="BOOSTER SEAT">BOOSTER SEAT</option>
          </select>
        </div>

        <div style="width:100%;display:flex" class="mt-0">
         <input type="text" placeholder="comments [optional]" class="w-100">

          </div>


        <!-- <div class="d-flex gap-3" style="padding-left:10px;justify-content:space-between">
        <div class="d-flex mt-1" style="width:100%;">
        <span  style="margin-right:5px">Summary</span>
          <input type="text" class="input_box disabled_box" style="width:100%;" name="job_number" id="job_number" value="{{$job_number}}" disabled>
        </div>
       
       
        <div class="d-flex mt-1 confirm_box" style="width: 23%;">
          <span  style="margin-right:5px">Job No.</span>
          <input type="text" class="input_box disabled_box" style="width:40%;" name="job_number" id="job_number" value="{{$job_number}}" disabled>
        </div>
        </div> -->

        <div class="row confirm_box">

          <div class="col-md-12">
          <div class="d-flex justify-content-end">
              <div class="d-flex">
              <span  style="margin-right:5px">Distance</span>
              <input type="text" name="waiting_time" id="waiting_time" class="input_box" style="width: 50%;">
              </div >
              <div class="d-flex justify-content-end" style="width:40%">
              <span  style="margin-right:5px">Price</span>
              <input type="text" name="waiting_time" id="waiting_time" class="input_box" style="width:150px;">
              </div>
</div>
            <div class="d-flex">
              <div class="d-flex">
              <span  style="margin-right:5px">Waiting Time Charges</span>
              <input type="text" name="waiting_time" id="waiting_time" class="input_box" style="width: 50%;">
              </div >
              <div class="d-flex">
              <span  style="margin-right:5px">Congestion Charges</span>
              <input type="text" name="waiting_time" id="waiting_time" class="input_box" style="width: 50%;">
              </div>
              <div  class="d-flex confirm_box" >
              <span  style="margin-right:5px">Total Additional Charges</span>
              <input type="text" name="waiting_time" id="waiting_time" class="input_box" style="width:150px">
              </div>
            
            </div>
            <div class="d-flex confirm_box">
              <span  style="margin-right:5px">Total Price</span>
              <input type="text" class="input_box" name="total_price" style="width:150px;">
            </div>
          </div>
        </div> 
        <div style="text-Align:right">
          <button class="btn btn-primary save_btn submit_btn" type="submit">Save</button>
        </div> 
      </div>
      </div>
</section>




  </form>
</div>


@section('javascript-section')
@if(Session::has('job_created'))
<script>
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '{{Session::get('
    job_created ')}}',
  });
</script>
@endif


<script>


  function handleLuggage() {
    const luggagecount = document.getElementById("hand_luggage");
    const value = document.getElementById("checkin_luggage_count").value;
    luggagecount.value = `HAND LUGGAGE:${value}`;
  }
  document.getElementById('checkin_luggage_count').addEventListener('change', handleLuggage);

  function handleFlight() {
    const luggagecount = document.getElementById("flight_data");
    const value = document.getElementById("flight_number").value;
    luggagecount.value = `${value}`;
  }
  document.getElementById('flight_number').addEventListener('change', handleFlight);


  function handleArrival() {
    const luggagecount = document.getElementById("arrival_data");
    const value = document.getElementById("arrival_city").value;
    luggagecount.value = `${value}`;
  }
  document.getElementById('arrival_city').addEventListener('change', handleArrival);
</script>


<!-- <script>
  $(document).ready(function() {
    $('.account_suggestion').select2();
    $('.account_name_suggestion').select2();
    $('.car_category').select2();

    const select2 = document.getElementsByClassName("select2-selection--single")

    select2[0].style.background = "#ff7fff";
    select2[1].style.background = "#ff7fff";
  });
</script> -->

<script>
      function getDayName(date) {
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const dayIndex = date.getDay();
        return days[dayIndex];
    }

    
    function getDay(id1,id2){
        const dateBox=document.getElementById(`${id1}`);
      const dayBox=document.getElementById(`${id2}`);
      const selectedDate = new Date(dateBox.value);
        const dayName = getDayName(selectedDate);
        dayBox.value = `${dayName}`;
      
    }
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var accountSuggestion = document.getElementById('account_suggestion');
    var inputFields = document.querySelectorAll('input');
    accountSuggestion.addEventListener('input', function() {
        var inputValue = accountSuggestion.value;
    
        inputFields.forEach(function(inputField) {
            inputField.disabled = !inputValue;
        });

        
        
    });

  
    inputFields.forEach(function(inputField) {
        inputField.addEventListener('input', function() {
            if (accountSuggestion.value === '') {
                inputField.value = '';
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    var jobDateInput = document.getElementById('job_date');
    var deadLineDate=document.getElementById("deadline_date");
    var currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + 1);
    var nextDay = currentDate.toISOString().slice(0, 10);
    jobDateInput.value = nextDay;
 
   

    function getDayName(date) {
        const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        const dayIndex = new Date(date).getDay();
        return days[dayIndex];
    }

    const dayName = getDayName(nextDay);
    document.getElementById('job_day').value = `${dayName}`;
});
</script>






<script>
  $('.account_suggestion').on('input', async function() {
    const accountNumber = $(this).val();
    const accountName = $("#account_name_suggestion");
    const displayName = $("#account_display_name");
    const accountId = $("#account_id");
    const contactName=$('#contact_name')
    const telephoneNumber=$('#telephone_number')
    const emailAddress = $("#email_address")
    let acc_no_url = "{{route('admin.new_job.get_acc_with_acc_no')}}";
    let acc_no = $(this).val();
    let response = await fetch(acc_no_url + '/?id=' + accountNumber);
    let responseData = await response.json();
    const data = responseData?.data;
    // console.log("data", data)
    if (data) {

      accountName.val(accountNumber);
      accountName.change();
      displayName.val(data?.get_account_status_type.status_name);
      accountId.val(data?.id);
      contactName.val(data?.contact_name)
      telephoneNumber.val(data?.contact_phone)
      emailAddress.val(data?.get_client.email)
    }

    $('#account_name_suggestion').select2('close');

  });
</script>




<script>
  $('.account_name_suggestion').on('input', async function(event) {
    event.preventDefault();
    const accountName = $(this).val();
    const accountNumber = $("#account_suggestion");
    const displayName = $("#account_display_name");
    const accountId = $("#account_id");
    const contactName=$('#contact_name');
    const telephoneNumber=$('#telephone_number');
    const emailAddress = $("#email_address")
    let acc_no_url = "{{route('admin.new_job.get_acc_with_acc_no')}}";
    let acc_no = $(this).val();
    let response = await fetch(acc_no_url + '/?id=' + accountName)
    let responseData = await response.json();
    const data = responseData?.data;
    console.log("data",data)

    if (data) {
      accountNumber.val(accountName);
      accountNumber.change()
      displayName.val(data?.get_account_status_type.status_name);
      accountId.val(data?.id);
      contactName.val(data?.contact_name)
      telephoneNumber.val(data?.contact_phone)
      emailAddress.val(data?.get_client.email)
    }
    $('#account_suggestion').select2('close');
  });
</script>

<!-- 
<script>
  $(document).ready(function() {
    let a = document.getElementById('account_suggestion');
    var firstSpan = a.nextElementSibling;
    console.log(firstSpan);
    firstSpan.id = 'firstSpan';

    let b = document.getElementById('account_name_suggestion');
    var firstSpan = b.nextElementSibling;
    console.log(firstSpan);
    firstSpan.id = 'secondSpan';

    $(document).on("click", "#firstSpan", function() {

      $('#account_name_suggestion').select2('open');
    })

    $(document).on("click", "#secondSpan", function() {
      $('#account_suggestion').select2('open');
    })

  });
</script> -->





<script>
  var mainData = null;
  $(document).ready(function() {
    $("#car_category").on("change", async () => {
      const option = document.getElementById("car_category");
      const categoryName = document.getElementById("car_category_name");
      const shortname = option.value;

      if (shortname != "") {
        let car_category_url = "{{route('admin.new_job.get_car_category')}}";
        let acc_name = $(this).val();
        let response = await fetch(car_category_url + '/?car_category_id=' + shortname)
        let responseData = await response.json();
        if (responseData?.data) {
          categoryName.value = responseData?.data?.name;
        }
      } else {
        categoryName.value = "";
      }

    })
  });



  $(document).ready(function() {
    const accSuggestion = $("#contact_suggestion");
    const telphoneNumber = $("#telephone_number");
    const contactName = $("#contact_name");
    const contactId = $("#client_id");
    const emailAddress = $("#email_address")
    let mainData = null;


    const setData = (selectedAccount) => {
      for (let i = 0; i < mainData?.length; i++) {
        if (selectedAccount == mainData[i]?.name) {
          telphoneNumber.val(mainData[i].phone);
          contactId.val(mainData[i].id)
          emailAddress.val(mainData[i].email)

        }
      }
      contactName.val(selectedAccount);
      accSuggestion.hide();
    };


    $("#contact_name").on("keyup", async function(event) {
      const telphoneNumber = document.getElementById("telephone_number");
      const contactName = document.getElementById("contact_name");
      let contact_url = "{{route('admin.new_job.get_client')}}";
      let acc_name = $(this).val();
      let response = await fetch(contact_url + '/?name=' + contactName.value)
      let responseData = await response.json();
      console.log("responsedata", responseData);
      const data = responseData?.data;
      const suggestionBox = document.getElementById("contact_suggestion");
      suggestionBox.innerHTML = '';
      if (data?.length > 0 && data !== "") {
        mainData = data;
        suggestionBox.style.display = "block";
        for (let i = 0; i < data.length; i++) {
          const li = document.createElement('li');
          li.innerHTML = `${data[i].name}`;
          suggestionBox.append(li);
        }
      } else {
        telphoneNumber.val("");
      }

      if (event.key === 'Tab' || event.keyCode == 9) {
        accSuggestion.hide();
      }
    });


    accSuggestion.on("click", "li", function() {
      const selectedAccount = $(this).text();
      setData(selectedAccount);
    });


    $(document.body).on("click", function(event) {
      if (!$(event.target).closest(accSuggestion).length && !$(event.target).is(accSuggestion)) {
        accSuggestion.hide();
      }
    });
  });




  $(document).ready(function() {
    var journey_start = $("#journey_start");
    var journey_end = $("#journey_end");
    const journey_start_details = $("#journey_start_details");

    $("#journey_start").on("keyup", async () => {
      if (journey_start.val() == "P" || journey_start.val() == "p") {
        journey_start.val("P/UP");
        journey_end.val("DROP");
        $("#journey_type_id").val(1);
        setTimeout(function() {
          journey_start_details.focus();
        }, 100);

      } else if (journey_start.val() == "D" || journey_start.val() == "d") {
        journey_start.val("DROP");
        journey_end.val("P/UP");
        $("#journey_type_id").val(2);
      }

      journey_start.select();
    });
  });
</script>

<script>
  flatpickr("#job_time", {
    enableTime: true,
    noCalendar: true,
    time_24hr: true 
  });

  flatpickr("#deadline_time", {
    enableTime: true,
    noCalendar: true,
    time_24hr: true 
  });
</script>

<script>
  $(document).ready(function() { 
    $('#account_suggestion').next('.select2-container').find('.select2-selection').focus();
  });
</script>

<script>
  function ProfileModal(e){
    e.preventDefault()
  }
</script>

@endsection 
@endsection