@extends('layouts/frontend/main') 
@section('main-section') 
@section('meta-tags')
  <title>Just Airports™- Official Site | Best London Airport Transfer Service</title>
  <meta name="description" content="Just Airports is a leading airport transfer taxi service in London including Heathrow Airport, Gatwick, Stansted, London City & Luton Airport and available at very affordable prices.">  
  <meta name="keywords" content="Airport Transfer, Airport Transfer Service, Airport Transfers, London City Airport Taxi, Cheap Airport Taxi, Gatwick Airport Taxi, London Gatwick Airport, Taxi From Gatwick, Taxi To Gatwick, Stansted Airport Taxi, Airport Transfers UK, Heathrow Airport, London Heathrow Airport, Airport Taxi, Airport Taxis, London, UK">
  <meta name="author" content=" London airport transfer, pre book London airport transfer, heathrow airport transfers, gatwick airport transfers, luton airport transfers, stansted airport transfers, london city airport transfers, southend airport transfers">

@endsection



<main class="main">
      <section class="section">
        <div class="container">
          <h1 class="mt-25 ">CONTACT US</h1>
          <p class="red_border_line mt-5"></p>
          <div class="box-row-tab mb-40">
            <div class="box-tab-left col-4 contact-us">
              <div class="sidebar w-75 "> 
                  <div class="mw-770">
                    <h6 class="mb-5 fadeInUp pb-3">CONTACT FORM</h6>
                    <div class="form-contact form-comment wow fadeInUp">
                      <form action="{{route('frontend.contact_enquiry_store')}}" method="POST">
                        @csrf
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group"> 
                              <input class="form-control" name="name" id="fullname" type="text" value="{{old('name')}}" placeholder="Full Name"/>
                              @error('name')
                              <p style="color:red;">{{$message}}</p>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group"> 
                              <input class="form-control" name="phone" id="mobile_number" type="tel" placeholder="Mobile Number" value="{{old('phone')}}"/>
                              @error('phone')
                              <p style="color:red;">{{$message}}</p>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group"> 
                              <input class="form-control" name="email" id="email" type="email" placeholder="Email Address" value="{{old('email')}}"/>
                              @error('email')
                              <p style="color:red;">{{$message}}</p>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group"> 
                              <textarea class="form-control" name="message" id="message" placeholder="Message" value="{{old('message')}}"></textarea>
                              @error('message')
                              <p style="color:red;">{{$message}}</p>
                              @enderror
                            </div>
                          </div>
                          <div class="col-lg-12"> 
                            <button class="quote_btn mt-3 w-100" type="submit">SUBMIT <i class="fa-solid fa-arrow-right"></i></button>
                          </div>
                        
                        </div>
                      </form>
                    </div>
                  </div>
               
              </div>
            </div>
            <div class="box-tab-right col-8">
              <div class="section wow fadeInUp  pt-30">
                <h6 class="pb-4">GET IN TOUCH</h6>
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d317723.55002566!2d-0.442105!3d51.527612!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761189b7786417%3A0xeabe06f975fb6f9a!2sJust%20Airports!5e0!3m2!1sen!2sin!4v1718964479085!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>

                <div class="contact_info pt-4">
                  <ul class="mt-15">
                    <li class="contact_box_list gap-3">
                      <img src="{{url('public/assets/frontend/imgs/icone_imeges/location_on.webp')}}" alt="Location">
                      <span
                        >Just Airports <br> 1378, Uxbridge Road, <br> Hillington, Middlesex <br> UB10 0NQ <br> United Kingdom</span
                      >
                    </li>
                    <li class="contact_box_list gap-3 mt-3">
                    <img src="{{url('public/assets/frontend/imgs/icone_imeges/phone.webp')}}" alt="Phone">

                      <span  >
                          <a href="tel:+44 208 900 1666" class="phone-number">+44 208 900 1666</a> <br>
                        <a href="tel: +44 208 902 6022" class="phone-number">+44 208 902 6022</a>
                      </span
                      >
                    </li>
                    <li class="contact_box_list gap-3 ">
                     <img src="{{url('public/assets/frontend/imgs/icone_imeges/mail.webp')}}" alt="Mail">


                      <span class="mail-list">
                        <a href="mailto:webbookings@justairports.com">webbookings@justairports.com</a>
                       </span
                        
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>


@endsection