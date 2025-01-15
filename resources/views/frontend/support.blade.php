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

    .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ABABAB;
    border-radius: 4px;
}

.select2-container .select2-selection--single {
    height:48px;
}

.select_box{
  width: 100%;
}

h1{
    font-size:40px !important;
   }

   .default_option{
    color: #ABABAB;
    font-family: Outfit;
  font-size: 16px;
  font-weight: 400;
  line-height: 20.16px;
  text-align: left;
   }
    
  </style>

<main class="main">
      <section class="section">
        <div class="container booking_page">
          <h1>SUPPORT!</h1>
          <p class="red_border_line"></p>

          <ul class="d-flex booking_navbar mt-2 gap-2">
          <li ><a href="{{route('frontend.booking_detail')}}">Booking</a></li>
          <li><a href="{{route('frontend.profile')}}">Profile</a></li>
          <li><a href="#">Messages</a></li>
          <li class="active_nav_btn"><a href="{{route('frontend.support')}}">Support</a></li>
        </ul>

       

          <div class="form-contact form-comment wow fadeInUp mt-2"> 
            <h6 class="mt-50" style="font-size: 24px;">Do you have any complaint?</h6>
            <p class="mt-5 mb-5" style="font-weight: 500;font-size: 16px;">Please enter your feedback, suggestions for improvement, or any complaints here: 
              Find Answers to Frequently Asked Questions from Our Clients</p>
            <form action="{{route('frontend.support_submit')}}" method="POST">
              @csrf
              <div class="row"> 
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="name">YOUR NAME</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{old('name')}}" placeholder="Enter your full name"/>
                  @error('name')
                  <p style="color:red;">{{$message}}</p>
                  @enderror
                  </div>
                </div>

            

                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="email">EMAIL ADDRESS</label>
                    <input class="form-control" id="email" name="email" type="email" value="{{old('email')}}" placeholder="Enter your email address"/>
                    @error('email')
                  <p style="color:red;">{{$message}}</p>
                  @enderror
                  </div>
                </div>

             
                    <div class="col-lg-4 col-md-4 col-sm-12">
                      <div class="form-group">
                        <label for="booking_select">BOOKING (OPTIONAL)</label>
                        <select  class="form-control select_box" name="booking">
                          <option value="" class="default_option" selected>Select your booking</option>
                          @if(count($bookings) > 0)
                            @foreach($bookings as $booking)
                            <option value="{{$booking->id}}">{{$booking->journey_type_id == 1 ? $booking->address.'-'.$booking->getAirport->airport_name : $booking->getAirport->airport_name.'-'.$booking->address}}</option> 
                            @endforeach

                          @endif
                         
                        </select>
                      </div>
                    </div>
            
             
                <div class="col-lg-4">
                  <div class="form-group"> 
                    <label  for="message">MESSAGE</label>
                    <textarea class="form-control" id="message" rows="5" name="message"  placeholder="Enter your message">{{old('message')}}</textarea>
                    @error('message')
                  <p style="color:red;">{{$message}}</p>
                  @enderror
                  </div>
                </div>

             
              </div>

              <div class="col-lg-4">
               
                <button class="quote_btn mt-3 w-100" type="submit">SUBMIT<i class="fa-solid fa-arrow-right"></i></button>
              </div>
            
            </form>

            <p class="inquiry_text mt-25">You can also book your cab by calling us at, <br></p>
              <ul class="support-text">
                  <li> <a href="tel:+44 208 900 1666">+44 208 900 1666,</a></li>
                  <li> <a href="tel:44 208 902 8990"> +44 208 902 8990,</a></li>
                  <li><a href="tel:44 208 900 1333"> +44 208 900 1333</a></li>
                </ul>
          
          

            <p class="white_line w-100 mt-25"></p>

            <div class="mt-25">
              <h6 class="mb-25">FAQs</h6>
              <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div>
</div>

            
            </div>

            <p class="mt-25 inquiry_text" >You can mail us at <span><a href="mailto:webbookings@justairports.com">webbookings@justairports.com</a></span></p>


            <p class="inquiry_whatsapp_text inquiry_text mt-25"><img src="assets/imgs/page/homepage2/whatsapp.png" alt=""> Whatsapp us at &nbsp;
              <span> <a href="tel:+44 208 900 1333">+44 208 900 1333</a> </p></span>
            
          
          </div>
       
        </div>
      </section>
    </main>



    @section('javascript-section')
    @if(Session::has('support_enquiry_submitted'))
<script>
  Swal.fire({
  title: "Success!",
  text: "{{Session::get('support_enquiry_submitted')}}",
  icon: "success"
});
</script>
@endif
    @endsection
@endsection