@extends('layouts/backend/main')
@section('main-section')

<style>
    .box {width: 100%; border-top: none;}
    #car_type_body td , #car_type_body tr>td{padding: 10px !important;}

    .form-box input{height: 35px;}
    .form-hedding h3{  padding-bottom: 10px;  border-bottom: 1px solid #dcd7d7;}
    .pe_1{
        padding-left: 1.8rem;
    }
    

/* .table>:not(caption)>*>* {
   padding: auto; 
} */
</style>

<div class="content-wrapper">
    <div class="container mt-3  form-hedding form-box">
        <h3>User Analytic</h3> 
        <div class="d-flex justify-content-between"> 
                        <a href="{{route('admin.booking_slot.create')}}" class="btn btn-primary">Add New</a> 
                    </div>
        <div class="box" style="margin: 0 auto;">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>  
                            <th>Start Date Time</th>
                            <th>End Date Time</th> 
                            <th>Status</th> 
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody id="">
                        @php
$sn = 1;
                        @endphp
                         @if(count($slots) > 0)
                            @foreach($slots as $slot)
                                <tr>
                                    <td class="pe_1">{{$sn++}}</td> 
                                    <td>{{\Carbon\Carbon::parse($slot->start_date_time)->format('d M, Y h:i')}}</td>
                                    <td>{{\Carbon\Carbon::parse($slot->end_date_time)->format('d M, Y h:i')}}</td>
                                    <td>
                                        @if($slot->status == 1)
                                        Stop
                                        @else
                                        Hold
                                        @endif
                                    </td>
                                    <td>  
                                        <a href="{{route('admin.booking_slot.edit', [$slot->id])}}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                         @endif
                    </tbody>
                </table>
            </div>
         {{--   {{$booking_logs->links('pagination::bootstrap-5')}}   --}}
        </div>
    </div>

</div>


@section('javascript-section') 
@endsection
@endsection