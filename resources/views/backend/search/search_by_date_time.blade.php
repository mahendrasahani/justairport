@extends('layouts/backend/main')
@section('main-section')

<style>
    h3 {
        font-size: 12px;
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

#jobs_date_time_modal .modal-content, #jobs_date_time_modal .modal-content .modal-body{
 padding: 0 !important;;
}

</style>
<div class="content-wrapper">
<div class="main-container border rounded" style="margin: 0 auto;padding:0 !important">
<div class="search_header">
        <h3 class="">Job By Date And Time</h3>
        </div>
        <div class="box-body">
            <form id="myForm" action="#" method="GET">
                <div>
                    <label for="searchbydatetime" c>From Date And Time</label>
                    <input type="text" name="from_date" class="Date_pickerformat" placeholder="DD/MM/YY">
                    <input type="time" name="from_time">
                </div>
                <div class="d-flex justify-content-end ">
                    <button type="submit" class="btn btn-primary save_btn" id="modal_btn" onclick="handleData(event)">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" id="jobs_date_time_modal" style="backdrop-filter: blur(2px)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- modal header -->
                <div class="d-flex justify-content-between driver_modal_header">
                            <span>Jobs By Date And Time</span>
            <button type="button" class="d-flex justify-content-center btn-close"
            onclick="handleModal(event)">x</button>
          </div>
                
                <div class="modal-body row">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Job</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Client</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Driver</th>
                                <th scope="col">Car</th>
                                <th scope="col">Details</th>
                                <th scope="col">Cli. Price</th>
                                <th scope="col">Dri. Price</th>
                            </tr>
                        </thead>
                        <tbody id="modal_table_body">
                            <tr>
                                <td>555556</td>
                                <td>18/03/24</td>
                                <td>20:14</td>
                                <td>999997</td>
                                <td>CASH ACCOUNT</td>
                                <td>M17</td>
                                <td>A</td>
                                <td>W91TA</td>
                                <td>67.00</td>
                                <td>29.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('javascript-section')
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modal = document.getElementById("jobs_date_time_modal");
        modal.style.display = "none";
        $('#example1').DataTable()
    })



    function handleModal() {
        const modal = document.getElementById("jobs_date_time_modal");
        if (modal.style.display == "" || modal.style.display == "none") {http://localhost/justairports/admin/car-type
            modal.style.display = "block";
        } else {
            modal.style.display = "none";
        }
    }

    document.getElementById('modal_btn').addEventListener('click', handleModal);
</script>

<script>
    function handleData(e) {
        e.preventDefault();
        var form = document.getElementById('myForm');
        var formData = new FormData(form);
        formData.forEach(function(value, key) {
            console.log(key, value);
        });

    }
</script>
<script>
     $(document).ready(function ()
        {
            $('.Date_pickerformat').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            })
        });
  
</script>
@endsection
 @endsection