@extends('layouts/backend/main')
@section('main-section')

<style>
      .custom_table_header{
  background: #fff;
    font-size: 12px;
    padding: 2px 5px;
    color: black;
    font-weight: 500;
    /* box-shadow: inset 3px -9px 5px #8cbdef */
 }  
 .custom_table_header p{
  margin-bottom:0px !important;
  
 }
 .main-container{
  padding: 0!important;
 }
 div.dt-container div.dt-info{
 font-size: 13px;
    margin-left: 12px;
 }

 

div.dt-container div.dt-length label { 
    font-size: 13px; 
    text-transform: capitalize;
}
div.dt-container div.dt-search { 
    font-size: 13px;
}




#job_summary_table_wrapper .row{
  margin-top: 4px !important;
}

div.dt-container div.dt-paging ul.pagination {
    margin: -2px 0px; 
}
 
 .filter{
    width: 68%;
 }

 .filter{
  width:68% !important;
 }
 
        .table-responsive {
    padding: 2px;
    }
    th{
    border-color:#fff;
    border:0.1px;
}
.btn_filter_search{ 
      padding: 0px;
    width: 58px;  
    font-size: 13px; 
 }
 .filter_lable{
    padding: 0px;
    font-size: 14px;
 }
 .endDate, .startDate{
    font-size: 14px;
 }
 .main-container{
    /* box-shadow: 0px 1px 7px 2px grey; */
 }
</style>

    <div class="content-wrapper pt-3"> 
        <div class="box main-container">
            <div class="box-body">
                <table id="job_summary_table" class="table table-bordered table-striped">
                <div class="custom_table_header">
                            <p>Job Summary</p> 
                            </div>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Deleted</th>
                            <th>Un-Allocated</th>
                            <th>Allocated</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="table_body" id="job_summary">
                        @foreach($job_count as $count)
                        <tr>
                            <td>{{$count->date}}</td>
                            <td>{{$count->deleted}}</td>
                            <td>{{$count->unallocated}}</td>
                            <td>{{$count->allocated}}</td>
                            <td>{{$count->total_count}}</td>
                            
                        </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
              
        </div> 
    </div>

    @section('javascript-section')

    <script>
    $(document).ready(function() {
    var dataTable = $('#job_summary_table').DataTable();
    dataTable.page.len(300).draw();
    
});
</script>


 @endsection
 @endsection