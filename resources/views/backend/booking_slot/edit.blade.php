@extends('layouts/backend/main')
@section('main-section')

<style>
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
  width: 130px;
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #747474;
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
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}
.p_3{
    padding: 6px 12px !important;
}
button:active {
  background-color: #0056b3;
  transform: translateY(1px);
}

</style>

<div class="content-wrapper">
    <div class="main-container main-form-driver mb-5">
        <div class="row  mb-5">
            <div class="col-md-6 col-lg-12 mb-5 ms-2">
                <h4 class="bold">Booking Slot</h4>
                <form class="py-4 px-2 " action="{{route('admin.booking_slot.update', [$slot->id])}}" method="POST" method="post">
                    @csrf
                 
                    <div class="row d-flex ">
                        
                        <div class="col-6 d-flex  pe-0 ">
                            <div class=" form-group mx-0  w-100">
                                <label class="form_lable" for="short_name">Start Date & Time:</label>
                            
                                <input class="px-2 border_1 p_3 w-100" type="datetime-local" value="" id="datetime" name="datetime"
                                    style="height: 40px; align-items: center;">
                            
                                <!-- <input style="height: 40px; align-items: center; padding: 0 11px;" type="datetime-local" id="start_time"
                                                            name="start_time" placeholder="Start Time" required value="{{$slot->start_time ?? ''}}"> -->
                            </div>
                            <div class=" form-group mx-4  w-100">
                                <label class="form_lable" for="no_of_passenger">End Date & Time:</label>
                                <input class="px-2 border_1 p_3 w-100" style="height: 40px; align-items: center;" value="" type="datetime-local" id="datetime"
                                    name="datetime">
                                <!-- <input style="height: 40px; align-items: center; padding: 0 11px;" type="time" id="end_time" name="end_time"
                                                            placeholder="End Time" required value="{{$slot->end_time ?? ''}}"> -->
                            </div>
                        </div>
                       <div class="col-sm-6 px-0">
                        <div class="col form-group ms-0">
                            <label for="" class="form_lable">Action</label>
                            <select class="select_option" name="" style="height: 40px; align-items: center; padding: 0 11px;" id="">
                                <option value="">Select</option>
                                <option value="Stop">Stop</option>
                                <option value="Hold">Hold</option>
                            </select>
                        
                        </div>
                       </div>
                        <div>
                         
                        </div>
                    </div>
    
                    
                    <button type="submit" class="my-3"
                        style="height: 40px; align-items: center; padding: 0 11px; ">Submit</button>
                </form>
    
            </div>
        </div>
    </div>
</div>



@section('javascript-section')
 
@endsection
@endsection