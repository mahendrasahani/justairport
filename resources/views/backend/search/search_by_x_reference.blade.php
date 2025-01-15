@extends('layouts/backend/main')
@section('main-section')

<style>
    h3 {
        font-size: 12px;
        font-weight: 600;
        margin-bottom:0px !important;
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
        <h3 class="">Job Search</h3>
        </div>
            <form id="myForm" action="#" method="GET">
                <div>
                    <label for="refNumber" class="form-label mb-0">Ref No.</label>
                    <input type="text" class="form-control" id="refNumber" placeholder="Enter Reference Number" name="ref_Number" style="width:50%;">
                </div>
                <div class="d-flex justify-content-end mt-0">
                    <button type="submit" class="btn btn-primary save_btn" id="modal_btn" onclick="handleData(event)">Search</button>
                </div>
             </form>
        </div>
    </div>


    <div class="modal" id="myModal" style="backdrop-filter: blur(2px)">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header with Close Button -->
                <div class="d-flex justify-content-between driver_modal_header">
                            <span>Jobs By Telephonist</span>
            <button type="button" class="d-flex justify-content-center btn-close"
            onclick="handleModal(event)">x</button>
          </div>
                <div class="modal-body row">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Ref</th>
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
                                <td>001</td>
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
        const modal = document.getElementById("myModal");
        modal.style.display = "none";
        $('#example1').DataTable()
    })

    function handleModal() {
        const modal = document.getElementById("myModal");
        if (modal.style.display == "" || modal.style.display == "none") {
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
@endsection
 @endsection