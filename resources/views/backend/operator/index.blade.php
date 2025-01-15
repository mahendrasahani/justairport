@extends('layouts/backend/main')
 @section('main-section')
 <style>
       h3 {
        font-size: 20px;
        font-weight: 600;
        margin-bottom:0 !important;
        pad: 20px;
    }

    .users_header{
    font-size: 12px;
    padding:10px;
    font-weight: 500;
}
 tbody#account_body tr td{padding: 10px !important; background-color: transparent;}

</style>

<div class="content-wrapper">
    <div class="container">
        <div class="row d-flex"> 
            <div class="col-md-6">
                <div class="users_header">
                    <h3>All Operators</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex justify-content-end"> 
                    <a class="btn btn-primary btn-sm save_btn" href="{{route('admin.operator.create')}}"><i class="fa-solid fa-pen-to-square" mb-20></i>Add New Operator</a>
                </div>
            </div> 
        </div> 
    </div><br>
    <div class="box main-container">
        <div class="box-body"> 
                    <table id="example1" class=" user_table table table-bordered table-striped text-light" >
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Phone</th>  
                        <th>user_id</th>  
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- ---------- user table body --------- -->
                <tbody id="account_body">
                    @php
                     $sn = 1;
                    @endphp
                    @if(count($operators) > 0)
                        @foreach($operators as $operator)
                            <tr>
                                <td>{{$sn++}}.</td>
                                <td>{{$operator->first_name}}</td>
                                <td>{{$operator->last_name}}</td>
                                <td>{{$operator->username}}</td>
                                <td>{{$operator->phone}}</td>
                                <td>{{$operator->id}}</td>
                                <td>
                                    <a href="{{route('admin.operator.edit', [$operator->id])}}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        {{$operators->links("pagination::bootstrap-5")}}
    </div>

     


   
</div>
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@ection('javascript-section')
 
@if(Session::has('operator_created'))
<script>
    console.log('tesingn');
    Swal.fire({
        title: "Success !",
        text: "{{Session::get('operator_created')}}",
        icon: "success"
    });
</script>
@endif 
 @endsection
 
 

 