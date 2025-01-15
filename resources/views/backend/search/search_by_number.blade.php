@extends('layouts/backend/main')
@section('main-section')
<style>
.modal-content{
    padding: 0px !important;
    overflow: hidden;
}

.custom_table_header{
  background: #abc4de;
    font-size: 12px;
    padding: 2px 5px;
    color: black;
    font-weight: 500;
    box-shadow: inset 3px -9px 5px #8cbdef
 }  
 .custom_table_header p{
  margin-bottom:0px !important;
  
 }

 .table-responsive {
    padding: 2px;
    }

    #search_by_number_wrapper .row{
  margin-top: 3px !important;
}
div.dt-container div.dt-paging ul.pagination {
    margin: -2px 0px; 
}

.main-container{
    box-shadow: 0px 1px 7px 2px grey;
 }
 div.dt-container div.dt-paging ul.pagination {
    margin: -2px 0px; 
}
div.dt-container div.dt-search { 
    font-size: 13px;
}
div.dt-container div.dt-length label { 
    font-size: 13px; 
    text-transform: capitalize;
}
div.dt-container div.dt-info{
 font-size: 13px;
    margin-left: 12px;
 }

 .modal-body{
    padding: 0px !important;
 }


    h3 {
        font-size:12px;
        font-weight: 600;
        margin-bottom:0 !important;
    }

    .search_header {
    background: #abc4de;
    font-size: 12px;
    padding: 4px 2px;
    font-weight: 500;
    box-shadow: inset 3px -9px 5px #8cbdef;
}


 </style>
<div class="content-wrapper">
<div class="main-container border rounded" style="margin: 0 auto;padding:0 !important">
<div class="search_header">
        <h3 class="">Job By Number</h3>
        </div>
        <div class="box-body">
            <form id="myForm" action="" method="GET"> 
                <div class="col-sm-12 driver_search_field">
                    <label for="searchbynumber">Number</label>
                    <br>
                    <input type="text" class="form-control" id="job_number" placeholder="Enter Job Number" name="job_number" style="width: 177px;" autofocus>
                    <p id="job_number_error" style="color:red; font-weight:bold;"></p>
                </div>
                <div class="d-flex justify-content-end ">
                    <button type="submit" class="btn btn-primary save_btn" id="modal_btn" onclick="handleData(event)">Search</button>
                </div>
            </form>
        </div>

            <!-- ------number modal view --------- -->
            <div class="modal" id="myModal" style="backdrop-filter: blur(2px)">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                            <div class="d-flex justify-content-between driver_modal_header">
                            <span>Jobs By Number</span> 

            <button type="button" class="d-flex justify-content-center btn-close"
            onclick="handleModalClose(event)">x</button>
          </div>
                       
                    <div class="modal-body row">
                        <table id="search_by_number"  class="table table-bordered table-striped text-light number-search-table" >
                            <thead>
                                <tr>
                                    <th class="table-coll">Job</th>
                                    <th class="table-coll">Date</th>
                                    <th class="table-coll">Time</th>
                                    <th class="table-coll">Client</th>
                                    <th class="table-coll">Client Name</th>
                                    <th class="table-coll cal-last-md">Dri</th>
                                    <th class="table-coll cal-last-md">Srv</th>
                                    <th class="table-coll">Details</th>
                                    <th class="table-coll">Cli Pr</th>
                                    <th class="table-coll cal-last-md">Dri Pr</th>
                                    <th class="table-coll">Invoiced</th>
                                    <th class="table-coll">C Extr</th>
                                    <th class="table-coll">D Extr</th>
                                    <th class="table-coll">Paid</th>
                                    <th class="table-coll cal-last-sm">T</th>
                                    <th class="table-coll cal-last-sm">L</th>
                                </tr>
                            </thead>
                            <tbody id="modal_table_body">
                           
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@section('javascript-section')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("myModal");
        modal.style.display = "none"; 
    })





    function handleModal() {
        const modal = document.getElementById("myModal");
        if (modal.style.display == "" || modal.style.display == "none") {
            modal.style.display = "block";
        } else {
            $("#modal_table_body").html(''); 
            $("#job_number_error").html('');
            $('#example1').DataTable();  
            modal.style.display = "none";
        }
    }

    function handleModalClose() {
        const modal = document.getElementById("myModal"); 
            $("#job_number_error").html('');
            modal.style.display = "none"; 
    } 
</script>

<script>
    async function handleData(e) {
        e.preventDefault(); 
        let dataTableInstance = $('#example1').DataTable();
        if (dataTableInstance) { 
            dataTableInstance.destroy(); 
        }
        let html_to_append = '';
        let page_url = "{{route('admin.search_by_number_data')}}"
        let job_number = $("#job_number").val();  
        if(job_number === ''){
            $("#job_number").focus();
            $("#job_number_error").html('Please Enter Job Number');
            return false;
        } 
        let response = await fetch(page_url+'/?job_number='+job_number);
        let responseData = await response.json();  
        console.log(responseData);
        responseData.data.forEach(function(item){
            html_to_append += `<tr>
                                    <td class="search-table-data">${item.job_number}</td>
                                    <td>${item.job_date}</td>
                                    <td>${item.job_time}</td>
                                    <td>${item?.get_client?.name}</td>
                                    <td>ONLINE PAYMENT BOOKING</td>
                                    <td>...</td>
                                    <td>M</td>
                                    <td>SW6 2RT-LHR</td>
                                    <td>50.00</td>
                                    <td>0.00</td>
                                    <td></td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td></td>
                                    <td>B</td>
                                    <td>C</td>
                                </tr>`;
        });

        $("#modal_table_body").html(html_to_append); 
        $('#search_by_number').DataTable(); 
        document.getElementById("myModal").style.display = "block"; 
        
    }
</script>
@endsection
@endsection
 