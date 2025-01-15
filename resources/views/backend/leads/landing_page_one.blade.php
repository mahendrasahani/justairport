@extends('layouts/backend/main')
@section('main-section')

<style> 
   .comment_btn{
    font-size: 12px;
    padding: 4px;
   }
    .tooltips {
  position: relative;
  display: inline-block;
  width: 100%;

}
.tooltips .tooltipstext {
  visibility: hidden;
  width: 100%;
  top:0;
  left: -150px;
  font-size: 11px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px;
  font-weight: bold;
    font-size: 13px;
  /* Position the tooltips */
  position: absolute;
  z-index: 1;
}
.tooltips:hover .tooltipstext {
  visibility: visible;

   
}
.tooltips:hover .hoverTooltip{
 color:#0b5ed7;
    font-weight: bold;
    font-size: 12px;
    cursor:pointer;
}


@media (max-width:600px){
  left:0px;
}
}
</style>

    <div class="content-wrapper"> 
        <div class="box main-container" style="width: 100%;"> 
            <div class="container-fuild"  >
                <div class="suspended1">
                    <h3>Landing Page One Lead</h3>
                </div>
            </div>
            <div class="box-body" style="overflow-x: auto;">
                <table id="suspended_driver_table" class="table table-bordered table-striped ">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th style="display:inline-block; width: 110px; border:none">Date</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Pick Address</th>
                            <th>Drop Address</th>
                            <th>Flight No</th>
                            <th>Dep. City</th>
                            <th>PickUp Date</th>
                            <th>PickUp Time</th>
                            <th style="display:inline-block; width: 80px; border:none">Car</th>
                            <th>Remark</th>
                            <th  style="display:inline-block; width: 160px; border:none">Comment</th>
                            <th>Lead Type</th>
                        </tr>
                    </thead>
                    <tbody id="driver_body"> 
                        @php $sn = 1; @endphp
                        @foreach($leads as $lead)
                        <tr>
                            <td>{{$sn++}}</td> 
                            <td>{{Carbon\Carbon::parse($lead->created_at)->format('d M, Y h:i A')}}</td>
                            <td>{{$lead->name}}</td>
                            <td>{{$lead->phone}}</td>
                            <td>{{$lead->email}}</td>
                            <td>{{$lead->pickup_address}}</td>
                            <td>{{$lead->dropoff_address}}</td>
                            <td>{{$lead->flight_number}}</td>
                            <td>{{$lead->departure_city}}</td>
                            <td>{{Carbon\Carbon::parse($lead->pickup_date)->format('d M, Y')}}</td>
                            <td>{{$lead->pickup_time}}</td>
                            <td>{{$lead->car}}</td>
                            <td>{{$lead->remark}}</td>
                            <td> 
                                <div class="tooltips">
                                       <span class="hoverTooltip"> {{Str::limit($lead->comment, 50)}}</span>
                                      <span class="tooltipstext">
                                           {{$lead->comment ?? 'No Comment'}}
                                      </span>
                                </div>
                                
                                <hr style="margin:5px 0">
                                <button class="btn btn-primary btn-xs comment_btn" id="comment_btn_id" data-id="{{$lead->id}}">Add Comment</button>
                            </td>
                            <td>{{$lead->lead_type}}</td>  
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$leads->links('pagination::bootstrap-5')}}
        </div> 
    </div> 
    
    <div class="modal fade" id="campaign_modal">
        <div class="modal-dialog campaign">
            <div class="modal-content"> 
                <div class="modal-header">  
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>  
                <div class="modal-body">
                    <form class="comment_form" method="POST" action="{{route('backend.leads.update_comment')}}"> 
                    @csrf    
                    <input type="hidden" id="lead_id" name="id">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="textarea4" style="font-size:20px;">Add Comment</label>
                            <textarea id="comment_area" name="comment" rows="4" class="form-control" placeholder="Write here..." required></textarea>
                        </div> 
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>    
                </div> 
            </div>
        </div>
    </div>

@section('javascript-section')
<script>
    $(document).on("click", "#comment_btn_id", async function(){
        let id = $(this).data('id');
        let url = "{{route('api.get_campaign_lead')}}";
        let response = await fetch(`${url}?id=${id}`);
        let responseData = await response.json();
        if(responseData.status == "success"){
            $("#comment_area").val(responseData.lead.comment);
            $("#lead_id").val(responseData.lead.id);
            $("#campaign_modal").modal('show');
        }
    });
</script>

@if(Session::has('comment_updated'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "{{Session::get('comment_updated')}}",
            icon: "success"
        });
    </script>
@endif
@endsection
@endsection
