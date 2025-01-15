@extends('layouts/frontend/main') 
@section('main-section') 

@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">

@endsection


<section class="section">
  <div class="container booking_page">
    <h1>DRIVER VACANCY</h1>
    <p class="red_border_line mt-5"></p>

    <h6 class="mt-25" style="font-size: 24px;">Eligibility:</h6>
    <ul class="eligibility_list">
      <li> If you live in and around London</li>
      <li> Have a PCO Driving license</li>
      <li> And a PCO Certified Car (Not older then 4 Years)</li>
    </ul>

    <p class="para_class">
      If you meet the above criteria, then, fill in the form to submit your
      application. Also, do check our general terms for drivers.
    </p>

    <h6 class="mt-25">GENERAL TERMS FOR DRIVERS -></h6>
  </div>
</section>

<section class="section  bg-grey  ">
  <div class="container driver-main">
    <div class="row row--0 ">
      <div class=" col-6 pt-25  driver-content ">
        <h1 class="driver_vacancy_form_head">FILL IN THE FORM</h1>
        <form action="{{route('frontend.driver_vacancy_submit')}}" class="mb-25" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 ">
              <div class="form-group mb-15 mb-15">
                <input class="form-control" name="fullname" id="fullname" type="text" value="{{old('fullname')}}"
                  placeholder="Full Name" />
                @error('fullname')
          <p style="color:red;">{{$message}}</p>
        @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-15">
                <input class="form-control" name="mobile_number" id="mobile_number" type="tel"
                  placeholder="Mobile Number" value="{{old('mobile_number')}}" />
                @error('mobile_number')
          <p style="color:red;">{{$message}}</p>
        @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-15">
                <input class="form-control" name="address" id="address" type="text" placeholder="Address"
                  {{old('address')}} />
                @error('address')
          <p style="color:red;">{{$message}}</p>
        @enderror
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group mb-15">
                <input class="form-control" name="postal_code" id="postal_code" type="text" placeholder="Postal Code"
                  {{old('postal_code')}} />
                @error('postal_code')
          <p style="color:red;">{{$message}}</p>
        @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-15">
                <input class="form-control" name="email_address" id="email_address" type="email"
                  placeholder="Email Address" {{old('email_address')}} />
                @error('email_address')
          <p style="color:red;">{{$message}}</p>
        @enderror
              </div>
            </div>

            <div class="col-md-6 col-xl-4">
              <div class="form-group mb-15">
                <input class="form-control" name="car_model" id="car_model" type="text" placeholder="Car Make & Model"
                  {{old('car_model')}} />
                @error('car_model')
          <p style="color:red;">{{$message}}</p>
        @enderror
              </div>
            </div>

            <div class="col-md-6 col-xl-2">
              <div class="form-group mb-15">
                <input class="form-control" name="car_year" id="car_year" type="text" placeholder="Car Year"
                  {{old('car_year')}} />
                @error('car_year')
          <p style="color:red;">{{$message}}</p>
        @enderror
              </div>
            </div>

            <div class="col-md-12 col-xl-6">
              <button class="quote_btn driver-btn mt-3 w-100" type="submit">SUBMIT <i class="fa-solid fa-arrow-right"></i></button>
            </div>
          </div>
        </form>
        
      </div>

      <div class="  driver-col ">
        <img class="w-100 h-100"
          src="{{ url('public/assets/frontend/imgs/page/homepage2/driver_vacancy.webp') }}" alt="JOB VACANCY" />
      </div>
    </div>
  </div>
</section>

<section class="section pt-20 pb-20">
  <div class="container">
    <h1>JOB VACANCY</h1>
    <p class="red_border_line mt-5"></p>
    <p class="para_class">
      Are you ready to embark on a journey with a company that has been a
      trusted name in the transportation industry for over 25 years? At
      Justairports, we pride ourselves on providing premier airport transfer
      services, connecting passengers to and from London airports and
      railway stations, facilitating seamless travel experiences in and
      around the bustling city of London.
    </p>

    <p class="para_class">Are you passionate to join us?</p>
    <div class="mt-25 job_description">
      <h1>
        POSITIONS:
        <span>Telephonist / Controller / Customer Care Officer</span>
      </h1>
      <div>
        <div class="job_qualities">
          <h6>EDUCATION:</h6>
          <p>
            At least 15 years of education. <br />
            Good command of English Language. In case of immigrant with
            permission of work permit from Home office, an IELTS score of
            Band 6.5 is mandatory.
          </p>
        </div>
        <div class="job_qualities">
          <h6>POSITION REQUIERMENTS:</h6>
          <p>
            We are a 24 hours service provider. <br />
            You will be expected to be available for any shifts in 24 hours.
            <br />
            You are expected to have fair enough knowledge of London roads
            and it Motorways. <br />You will be in direct communications
            with passengers and drivers.And will be expected to provide real
            time resolutions customers.
          </p>
        </div>
        <div class="job_qualities">
          <h6>DUTIES AND RESPONSIBILITIES:</h6>
          <p>
            You will be answering calls from customers and drivers. <br />
            You will be expected to take Journey bookings, allocate those
            bookings to drivers. You will be Co-ordinating between drivers
            and customers. <br />
            You are expected to Send and Reply Emails.
          </p>
        </div>
        <div class="job_qualities">
          <h6>SKILLS REQUIRED:</h6>
          <p>
            You will be answering calls from customers and drivers. <br />
            You will be expected to take Journey bookings, allocate those
            bookings to drivers. You will be Co-ordinating between drivers
            and customers. <br />
            You are expected to Send and Reply Emails.
          </p>
        </div>
      </div>
      <h1>
        WAGES:
        <span>£10 to £12 per hour</span>
      </h1>
    </div>
    <p class="para_class">Join us in our commitment to excellence and become part of a company dedicated to delivering
      top-notch chauffeur services around the clock. Explore our career opportunities today and embark on a fulfilling
      journey with Justairports.</p>
  </div>
</section>

@section('javascript-section')
@if(Session::has('vacancy_submitted'))
  <script>
    Swal.fire({
    title: "Success!",
    text: "{{Session::get('vacancy_submitted')}}",
    icon: "success"
    });
  </script>
@endif
@endsection
@endsection