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

    .box-row-tab .box-tab-left {
      padding: 0px 10px;
      width:25%;
    }

    .box-row-tab .box-tab-right {
      padding: 0px 10px;
      width: 75%;
    }
    
   
    
    
    

    @media screen and (max-width: 992px) {
      .box-row-tab .box-tab-left {
        width: 100%;
      }

      .box-row-tab .box-tab-right {
        width: 100%;
      }
    }

    h1{
    font-size:40px !important;
   }
    
 .file-upload {
/*
  background-color: #ffffff;
  width: 0px;
  margin: 0 auto;
  padding: 20px;
*/
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #000;
  background: #fff;
  border: none;
  padding: 10px;
  border-radius: 4px;
/*  border-bottom: 4px solid #15824B;*/
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
/*  background: #1AA059;*/
  color: #000;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  /*border: 4px dashed #1FB264;*/
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
/*
  background-color: #1FB264;
  border: 4px dashed #ffffff;
*/
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #15824B;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #cd4535;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
    
    
  </style>
<main class="main">
      <section class="section">
        <div class="container booking_page">
          <h1>PROFILE!</h1>
          <p class="red_border_line mt-5"></p>

          <ul class="d-flex booking_navbar mt-2 gap-2">
          <li ><a href="{{route('frontend.booking_detail')}}">Booking</a></li>
          <li class="active_nav_btn"><a href="{{route('frontend.profile')}}">Profile</a></li>
          <li><a href="#">Messages</a></li>
          <li><a href="{{route('frontend.support')}}">Support</a></li>
        </ul>

          <h6 class="mt-50" style="font-size: 24px;">Profile Details</h6>

            <div class="box-row-tab">
           
              <div class="box-tab-left">
                <div class="sidebar p-0 pt-30 position-relative">
<!--
                  <div class="form-group text-center">
                    <label for="profile_picture">PROFILE PICTURE</label>
                    <div class="profile-picture-container">
                      <input
                        class="form-control"
                        id="profile_picture"
                        type="file"
                        name="profile"
                        accept="image/*"
                        onchange="displayImage(this)"
                      />
                      <div class="plus-icon">+</div>
                      <img id="profile_image" class="profile-image" style="display:none;" />
                    </div>
                  </div>
-->
                  
<form action="{{route('frontend.profile_submit')}}" method="POST" enctype="multipart/form-data">   
  @csrf     
     <div class="file-upload form-group text-center">
  <button class="file-upload-btn profile_picture" type="button" onclick="$('.file-upload-input').trigger( 'click' )">PROFILE PICTURE</button>

  <div class="image-upload-wrap profile-picture-container">
    <input class="file-upload-input" type='file' name="profile_image" onchange="readURL(this);" accept="image/*" />
    <div class="drag-text">
   <div class="plus-icon">+</div>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="" alt="your image" />
<!--
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    </div>
-->
  </div>
</div>
                </div>
              </div>
              <div class="box-tab-right">
                <div class="container price_breakdown_container">
                  <div class="price_breakdown_box">
                    <div class="box-content-detail">
                    <div class="form-contact form-comment wow fadeInUp mt-2">
                      
                          <div class="row">
                            
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="name">YOUR NAME</label>
                                <input
                                  class="form-control"
                                  id="name"
                                  type="text"
                                  name="name"
                                  value="{{$client->name ?? ''}}"
                                  placeholder="Enter your full name"
                                />
                              </div>
                            </div>
  
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="phone_number">PHONE NUMBER</label>
                                <input
                                  class="form-control"
                                  id="phone_number"
                                  type="tel"
                                  name="phone"
                                  value="{{$client->phone ?? ''}}"
                                  placeholder="Enter your phone number" disabled
                                />
                              </div>
                            </div>
  
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="email">EMAIL ADDRESS</label>
                                <input
                                  class="form-control"
                                  id="email"
                                  type="email"
                                  name="email"
                                  value="{{$client->email ?? ''}}"
                                  placeholder="Enter your email address" disabled
                                />
                              </div>
                            </div>
                           
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="company_name">YOUR COMPANY NAME</label>
                                <input
                                  class="form-control"
                                  id="company_name"
                                  type="text"
                                  value="{{$client->company_name ?? ''}}"
                                  name="company_name"
                                  placeholder="Enter your company name"
                                />
                              </div>
                            </div>
  
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="employee_id">EMPLOYEE ID</label>
                                <input
                                  class="form-control"
                                  id="employee_id"
                                  type="text"
                                  value="{{$client->employee_id}}"
                                  name="employee_id"
                                  placeholder="Enter your employee ID"
                                />
                              </div>
                            </div>
  
                            <div class="col-lg-8">
                              <div class="form-group">
                                <label for="address">YOUR ADDRESS</label>
                                <input
                                  class="form-control"
                                  id="address"
                                  type="text"
                                  value="{{$client->address ?? ''}}"
                                  name="address"
                                  placeholder="Enter your complete address"
                                />
                              </div>
                            </div>
  
                            <div class="col-lg-4">
                              <div class="form-group">
                                <label for="postal_code">POSTAL CODE</label>
                                <input
                                  class="form-control"
                                  id="postal_code"
                                  type="text"
                                  value="{{$client->postal_code ?? ''}}"
                                  name="postal_code"
                                  placeholder="Enter your postal code"
                                />
                              </div>
                            </div>
                           
                          </div>
  
                          <button class="quote_btn mt-3" type="submit">
                            SAVE <i class="fa-solid fa-arrow-right"></i>
                          </button>
                        </form>
                      </div>
                    </div>
  
                  
                  </div>
                </div>
              </div>
            </div>
        
       
        </div>
      </section>
    </main>


@section('javascript-section') 
@if(Session::has('profile_updated'))
<script>
  Swal.fire({
  title: "Success!",
  text: "{{Session::get('profile_updated')}}",
  icon: "success"
});
</script>
@endif

<script>function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
		$('.image-upload-wrap').addClass('image-dropping');
	});
	$('.image-upload-wrap').bind('dragleave', function () {
		$('.image-upload-wrap').removeClass('image-dropping');
});
        </script>
@endsection

@endsection
