@extends('layouts/backend/main')
@section('main-section')

<style>
    .form-group {
  margin-bottom: 1rem;
}
.bg-off-white{
    background-color: #ecf0f5;
}
.bold{
    font-weight: 600;
}
.form_lable{
font-size: 16px;
    font-weight: 700;
    margin-bottom: 5px !important;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="number"],
select {
  /* width: 100%; */
   width: 130px;
  padding: 0.5rem;
  font-size: 1rem;
  /* border: 1px solid #ccc; */
  border-radius: 4px;
}
.border_1{
  border-radius: 4px;
    border: 1px solid #676464;

}
button {
  /* padding: 0.75rem 1rem; */
  font-size: 1rem;
  background-color: #007bff;
  color: white;
  border: none;
  /* border-radius: 4px; */
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

button:active {
  background-color: #0056b3;
  transform: translateY(1px);
}
.p_3{
    padding: 6px 12px !important;
}

</style>

<div class="content-wrapper">
    <div class="main-container border-none main-form-driver mb-5" style="border:none">
        <div class="row col-12 mb-5">
            <div class="col-md-10 col-xl-12 col-lg-9 mb-5 ms-2">
                <h4 class="bold mx-2">Booking Slot</h4>
                <form class="py-4 px-2 " action="{{route('admin.booking_slot.store')}}" method="POST" method="post">
                    @csrf
                 
                    <div class="row d-flex">
                       <div class="col-6 d-flex  pe-0 ">
                        <div class="form-group mx-0  w-100">
                            <label class="form_lable" for="name">Start Date & Time:</label>
                            <input class="px-2 border_1 p_3 w-100" type="datetime-local" id="date_time" name="start_date_time"
                                style="height: 40px; align-items: center;" required>
                        
                        </div>
                        
                        <div class="form-group mx-4 w-100">
                            <label class="form_lable" for="short_name">End Date & Time:</label>
                            <input class="px-2 border_1 p_3 w-100" type="datetime-local" id="end_time" name="end_date_time"
                                style="height: 40px; align-items: center;" required>
                        </div>
                       </div>
                       <div class="col-sm-6  px-0">
                            <div class="col form-group ms-0">
                                <label for="" class="form_lable">Action</label>
                                <select class="select_option border_1" name="" style="height: 40px; align-items: center; padding: 0 11px;" id="">
                                    <option value="">Select</option>
                                    <option value="1">Stop</option>
                                    <option value="2">Hold</option>
                                </select>
                            
                            </div>
                       </div>
                      
                        
                    </div> 
                    <button type="submit" class="rounded"
                        style="height: 40px; align-items: center; padding: 0 11px;">Submit</button>
                </form>
    
            </div>
        </div>
    </div>
</div>



@section('javascript-section')
 
@endsection
@endsection