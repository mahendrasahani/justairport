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
  width: 100%;
  padding: 0.5rem;
  font-size: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
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

button:active {
  background-color: #0056b3;
  transform: translateY(1px);
}

</style>

<div class="content-wrapper">
    <div class="main-container main-form-driver mb-5">
        <div class="row col-12 mb-5">
            <div class="col-md-6 mb-5 ms-2">
                <h4 class="bold">Car Types</h4>
                <form class="py-4 px-2 " action="{{route('admin.car_type.update', [$car->id])}}" method="post" enctype='multipart/form-data'>
                    @csrf
                 
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form_lable" for="name">Name:</label>
                            <input style="height: 40px; align-items: center; padding: 0 11px;" type="text" id="name"
                                name="name" placeholder="Name" required value="{{$car->name ?? ''}}">
                        </div>
    
                        <div class="form-group col-md-6">
                            <label class="form_lable" for="short_name">Short Name:</label>
                            <input style="height: 40px; align-items: center; padding: 0 11px;" type="text" id="short_name"
                                name="short_name" placeholder="Short Name" required value="{{$car->short_name ?? ''}}">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form_lable" for="no_of_passenger">Number of Passengers:</label>
                            <input style="height: 40px; align-items: center; padding: 0 11px;" type="number"
                                id="no_of_passenger" name="no_of_passenger" placeholder="Number of Passengers:" required value="{{$car->passenger_count ?? ''}}">
                        </div>
    
                        <div class="form-group col-md-6">
                            <label class="form_lable" for="large_luggage">Large Luggage:</label>
                            <input style="height: 40px; align-items: center; padding: 0 11px;" type="number"
                                id="large_luggage" name="large_luggage" placeholder="Large Luggage:" required value="{{$car->checkin_luggage ?? ''}}">
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form_lable" for="small_luggage">Small Luggage:</label>
                            <input style="height: 40px; align-items: center; padding: 0 11px;" type="number"
                                id="small_luggage" name="small_luggage" placeholder="Small Luggage:" required value="{{$car->hand_luggage ?? ''}}">
                        </div>
    
                        <div class="form-group col-md-6">
                            <label class="form_lable" for="status">Status:</label>
                            <select id="status" name="status" class="form-control"
                                style="height: 40px; align-items: center; padding: 0 11px;" required> 
                                <option value="1" {{$car->status == '1' ? 'selected':''}}>Active</option>
                                <option value="0" {{$car->status == '0' ? 'selected':''}}>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form_lable" for="status">Replace Car Image:</label>
                            <input style="height: 40px;" type="file"  name="car_image" accept=".png, .jpg, .jpeg, .webp">
                        </div>
    
                    </div>
    
                    <button type="submit" class=""
                        style="height: 40px; align-items: center; padding: 0 11px;">Submit</button>
                </form>
    
            </div>
        </div>
    </div>
</div>



@section('javascript-section')

@endsection
@endsection