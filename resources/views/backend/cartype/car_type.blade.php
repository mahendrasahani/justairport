@extends('layouts/backend/main')
@section('main-section')

<style>
    .box {width: 100%; border-top: none;}
    #car_type_body td , #car_type_body tr>td{padding: 10px !important;}

    .form-box input{height: 35px;}
    .form-hedding h3{  padding-bottom: 10px;  border-bottom: 1px solid #dcd7d7;}
</style>

<div class="content-wrapper">
    <div class="container mt-3  form-hedding form-box">
        <h3>Car Types</h3>
       
        <!-- <form action="{{route('admin.car_type.store')}}" method="POST" >
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <label for="shortName" class="col-sm-2 col-form-label">Short Name</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="shortName" name="short_name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="passengers" class="col-sm-2 col-form-label" name="passenger_count">No. of Passengers</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="passengers" name="passenger_count" min="1" required>
                </div>
                <label for="largeLuggage" class="col-sm-2 col-form-label">Large Luggage</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="largeLuggage" name="large_luggage_count"
                        placeholder="No. of Large Luggage" min="0" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="smallLuggage" class="col-sm-2 col-form-label">Small Luggage</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" id="smallLuggage" placeholder="No. of Small Luggage"
                        name="small_luggage_count" min="0" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary btn-sm">Add Car Type</button>
                </div>
            </div>
        </form> -->
      


        <div class="box" style="margin: 0 auto;">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Short Name</th>
                            <th>No. of Passengers</th>
                            <th>Large Luggage</th>
                            <th>Small Luggage</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="car_type_body">
                        @if(count($cars) > 0)
                                                @php
    $sn = 1;
                                                @endphp
                                                @foreach($cars as $car)
                                                    <tr>
                                                        <td>{{$sn++}}</td>
                                                        <td>{{$car->name}}</td>
                                                        <td>{{$car->short_name}}</td>
                                                        <td>{{$car->passenger_count}}</td>
                                                        <td>{{$car->checkin_luggage}}</td>
                                                        <td>{{$car->hand_luggage}}</td>
                                                        <td>@if($car->status == 1)
                                                            Active
                                                            @else
                                                            Inactive
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('admin.car_type.status', [$car->id, $car->status])}}" type="button" class="btn btn-primary btn-sm" value="{{$car->id}}">Change Status</a>
                                                            <a href="{{route('admin.car_type.edit', [$car->id])}}" type="button" class="btn btn-success btn-sm">Edit</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@section('javascript-section')
@if(Session::has('car_added'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{Session::get('car_added')}}',
        });
    </script>
@endif

<script>
 
</script>

@endsection
@endsection