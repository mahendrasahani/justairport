@extends('layouts/backend/main')
@section('main-section')
<style>
    #wip_table{
      width:100% !important;
    }
    .custom_table_header{
    background: #fff;
      font-size: 12px;
      padding: 2px 5px;
      color: black;
      font-weight: 500;
    }
    .custom_table_header p{
    margin-bottom:0px !important;
    font-size: 12px;
    font-weight: 500;
    }
    .main-container{
    padding: 0!important;
    }
    div.dt-container div.dt-info{
    font-size: 13px;
      margin-left: 12px;
    }
    .table-responsive {
    padding: 2px;
    }
    tbody td,.driver_td {
      background-color: #00fe00 !important;
      color: #0a56b2;
    }
    .selected {
        background-color:#0000ff !important;
        color:#00fe00  !important;
      }
    .selected a{
      color:#00fe00  !important;
    }
    .selected button{
      color:#00fe00  !important;
    }
    div.dt-container div.dt-length label { 
        font-size: 13px; 
        text-transform: capitalize;
    }
    div.dt-container div.dt-search { 
        font-size: 13px;
    }
    .th_dly{
      width:33px !important;
    }
    .th_job{
      width:44px !important;
    }
    .th_note{
      width:13px !important;
    }
    .th_source{
      width:20px !important;
    }
    #wip_table_wrapper .row{
      margin-top: 3px !important;
    }
    div.dt-container div.dt-paging ul.pagination {
        margin: -2px 0px; 
    }
    .driver_modal_content{
      padding:0px;
      width:60%;
      margin:auto;
      }
    .d-flex{
      align-items:start;
    }
    .driver_modal_header{
      background: #fff;
    font-size: 12px;
    padding: 2px 5px;
    font-weight: 500;
    /* box-shadow: inset 3px -9px 5px #8cbdef; */
    border-bottom: 1px solid #eee;
    }
    .driver_modal_header button{
      line-height:11px;
      color: #000 !important;
      padding: 0 2px !important;
      font-size: 16px;
      background: none;
      color: white;
      opacity: 1;
    }
    .driver_columns{
    padding: 2px;
    }
    .driver_modal_body{
        padding: 2px;
        margin: 0 !important;
        background:#fff;
    }
    a.send-bnt-driv {
    background: #000;
    padding: 1px 10px 0px 10px;
    margin-right: 12px;
    color: #fff !important;
    text-decoration: none;
}

a.send-bnt-custo {
  background: #000;
    padding: 1px 10px 0px 10px;
    margin-right: 12px;
    color: #fff !important;
    text-decoration: none;

}

</style>
<div class="content-wrapper pt-3">

  <div class="box main-container">

    <div class="box-body">
      <table id="wip_table" class="table table-bordered table-striped">
        <div class="custom_table_header">
          <p>Work In Progress</p> 
        </div>
      <thead>
          <tr>
            <th scope="col" class="th_dly">DLY</th>
            <th scope="col" class="th_time">T</th>
            <th scope="col" class="th_job">Job</th>
            <th scope="col" class="th_note"></th>
            <th scope="col" class="th_account" class="source_head">Account</th>
            <th scope="col" class="th_source">Car</th> 
            <th scope="col" class="th_job_detail">Job Details</th>
            <th scope="col" class="th_driver">Driver</th>
            <th scope="col" class="th_driver">Status</th>
          </tr>
        </thead>
        <tbody>
          @if(count($jobs) > 0)
          @foreach($jobs as $index => $job)
          <tr>
          @php
              $currentDateTime = \Carbon\Carbon::now();
              $providedDateTime = Carbon\Carbon::parse($job->job_date . $job->job_time);
              $hoursRemaining = $currentDateTime->diffInHours($providedDateTime);
              $formattedTimeRemaining = ''; 
                @endphp 
                  @if($currentDateTime > $providedDateTime)
                  <td scope="row" class="dlya" style="background:#000 !important; color:red;">
                  -{{$hoursRemaining}}h
                  </td>
                  @else
                  <td scope="row" class="dlya" style="background:#1e7f19 !important; color:white;">
                  +{{$hoursRemaining}}h
                  </td>
                  @endif
            <td>{{Carbon\Carbon::parse($job->job_time)->format('H:i') ?? ''}}</td> 
            <td><a href="{{ route('admin.job.view', [$job->id]) }}">{{ $job->job_number ?? '' }}</a></td>
            <td>{{$job->notes != '' ? 'N':''}}</td>
            <td class="account">
            {{ Str::limit($job->getAccount->display_name ?? '', 10, '') }}    {{$job->getAccount->account_number ?? ''}}
          </td>
          <td  class="source">{{$job->getCarCategory->short_name ?? ''}}</td>
          <td class="job_details" style="{{$job->notes == 'URGENT'?'background:red !important; color: #fff;':''}}"> 
          
           
          @if ($job->journey_type_id == 1)
           {{ $job->postcode }}  -  {{ $job->getAirport->display_name ?? '' }}
          @elseif($job->journey_type_id == 2)
          {{ $job->getAirport->display_name ?? '' }} - {{ $job->postcode }}
          @endif 
            {{$job->notes ?? ''}} 
              </td>
              <td class="driver_td">
              <!-- @if($job->job_status_type_id == 1)
              <button type="button" class="btn modal_btn" id="modal_btn{{$index}}" onclick="handleDriverModal(`modal_btn{{$index}}`)">
              </button>
              @elseif($job->job_status_type_id == 2)
              <button type="button" class="btn modal_btn" id="modal_btn{{$index}}" style="height: 100%;" onclick="handleDriverModal(`modal_btn{{$index}}`,`{{$job->job_number}}`,`{{$job->id}}`)">
                <small style="font-size: 11px">[{{$job->getDriver->driver_code ?? ''}}]{{$job->getCarCategory->short_name ?? ''}} </small>
              </button>
              @else -->
              <!-- @endif -->
              <button type="button" class="btn modal_btn" id="modal_btn{{$index}}" style="height: 100%;" onclick="handleModal(`modal_btn{{$index}}`,`{{$job->job_number}}`,`{{$job->id}}`, `{{$job->driver_id}}`)">
                <small style="font-size: 11px">{{$job->getDriver->call_Sign ?? ''}} </small>
              </button>
            </td>

            <td>
              <a href="{{route('admin.send_job_to_driver', [$job->id])}}" class="send-bnt-driv  btn-block btn-primary btn-sm ">Send to Driver</a>
              <a href="{{route('admin.send_job_confirmation_to_customer', [$job->id])}}" class=" send-bnt-custo btn-block btn-success btn-sm">Send to Customer</a>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
    <div class="modal" id="Driver_allocation_modal">
    <div class="modal-dialog-centered">
                    <div class="modal-content driver_modal_content"> 
                        <div class="d-flex justify-content-end driver_modal_header">
                            <button type="button" class="d-flex justify-content-center btn-close" data-bs-dismiss="modal"
                                onclick="handleModal()">x</button>
                        </div> 
                        <form action="{{ route('backend.un_allocate_job') }}" method="POST">
                            @csrf
                            <input type="hidden" id="modal_job_id" name="job_id">
                            <input type="hidden" id="driver_id" name="driver_id">
                            <div class="modal-body driver_modal_body d-block">
                               <div class="d-flex">
                                <div class="col-md-5 ms-2 driver_columns">
                                    <span style="margin-right:5px">Name </span>
                                    <input type="text" style="width:100%;" class="input_box" name="driver_name" id="driver_name" readonly>
                                </div>
                                <div class="col-md-4 ms-2 driver_columns">
                                    <span style="margin-right:5px">Phone </span>
                                    <input type="text" style="width:100%;" class="input_box" name="driver_phone" id="driver_phone" readonly>
                                </div> 
                                <div class="col-md-2 ms-2 driver_columns">
                                    <span>C/S</span>
                                    <input type="text" name="c_s" id="c_s" class="input_box w-100" readonly> 
                                </div>  
                               </div> 
                               <div class=" justify-content-end d-flex">
                                    <div class=" justify-content-end mx-1" id="allocate">
                                        <button id="allocate_btn" class="btn btn-primary save_btn">UnAllocate</button>
                                    </div>  
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
    </div>
  </div>
</div>

@section('javascript-section')
<script> 
    document.addEventListener("DOMContentLoaded", () => {
      $('#wip_table').DataTable({
        "order": []
      })
    }) 
</script>
 
  <script>
  async function handleModal(id, job_number, job_id, driver_id){
    let get_assigned_driver_with_job_url = "{{route('admin.get_assigned_driver_with_job')}}";
    const modal = document.getElementById("Driver_allocation_modal");
    if(modal.style.display == "" || modal.style.display == "none"){
      $("#job_number").val(job_number);
      $("#modal_job_id").val(job_id); 
      $("#driver_id").val(driver_id); 
      let response = await fetch(get_assigned_driver_with_job_url+'/?job_id='+job_id);
      let responseData = await response.json();
      console.log(responseData);

      if(responseData.data.get_driver != null){
        $("#driver_name").val(responseData.data.get_driver.full_Name); 
        $("#c_s").val(responseData.data.get_driver.call_Sign);
        $("#driver_phone").val(responseData.data.get_driver.phone);
      }else{
        $("#driver_name").val(""); 
        $("#driver_code").val(""); 
      }
      modal.style.display = "block";
    }else{
      modal.style.display = "none";
    }
  }
</script>
 
<script>
  document.getElementById("driver_name").addEventListener("change", async function() {
        const driver_details_url ="{{route('admin.get_driver_detail')}}"; 
        let driver_id = $(this).val();  
        const response=await fetch(driver_details_url + "/?id=" + driver_id);
        const data=await response.json(); 
        $("#driver_code").val(data?.data?.driver_code); 
  })
</script>

<script>
    $(document).ready(function() {
    var dataTable = $('#wip_table').DataTable();
    dataTable.page.len(100).draw();
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var table = $('#wip_table').DataTable();
  var selectedRowIndex = 0;

  function updateSelectedRow(newRowIndex) {
    if (selectedRowIndex !== -1) {
      $(table.row(selectedRowIndex).node()).removeClass('selected');
      $(table.row(selectedRowIndex).node()).find('td').removeClass('selected');
    }
    selectedRowIndex = newRowIndex;
    var rowNode = $(table.row(selectedRowIndex).node());
    rowNode.addClass('selected');
    rowNode.find('td:not(:first):not(.source)').addClass('selected');
  }

  function handleArrowNavigation(direction) {
    var numRows = table.rows().count();
    var newRowIndex;
    if (direction === 'up') {
      newRowIndex = selectedRowIndex > 0 ? selectedRowIndex - 1 : numRows - 1;
    } else if (direction === 'down') {
      newRowIndex = selectedRowIndex < numRows - 1 ? selectedRowIndex + 1 : 0;
    }
    updateSelectedRow(newRowIndex);
  }
  $('#wip_table tbody').on('click', 'tr', function() {
    var dataTable = $('#wip_table').DataTable();
    $(dataTable.row(0).node()).find('td').removeClass('selected');
    updateSelectedRow(table.row(this).index());
  });

 
  const newJobModal = document.getElementById('new_job'); 

  $(document).keydown(function(e) {
    if (newJobModal.classList.contains('show')) {
            console.log('modal is opended');
            return;
            }
    if (e.key === 'ArrowUp' || e.keyCode === 38) {
      handleArrowNavigation('up');
    } else if (e.key === 'ArrowDown' || e.keyCode === 40) {
      handleArrowNavigation('down');
    } else if (e.key === 'Enter'){
      var selectedRowData = table.row(selectedRowIndex).data();
      console.log("Enter pressed on row:", selectedRowData);
    }
  });
});
</script>

<script>
  $(document).ready(function() {
    var dataTable = $('#wip_table').DataTable();
    var rowNode = $(dataTable.row(0).node());
    rowNode.addClass('selected');
    rowNode.find('td:not(:first):not(.source)').addClass('selected');
    dataTable.page.len(100).draw();
    const source=document.querySelectorAll(".source");
    source.forEach((ele,index)=>{
         if(ele.innerHTML=="E"){
          ele.style.color="#512c7f"
         }  
         else if(ele.innerHTML=="A"){
          ele.style.color="white"
         }
         else{
          ele.style.color="#03d428"
         }
    })
  });
</script>


@endsection
@endsection