<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
	</style>
</head>

<body>
	<div class="div-personel">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
        </div>
        <div class="div-profile">
            <div class="row div-row-profile">
                <div class="col-2 subdiv-profile-image">
                    <img src="{{ url('/pictures/profile-picture.png') }}" alt="Profile">
                    <label class="btn btn-primary"><i class="fa fa-edit"></i> Change Picture
                        <input type="file" hidden>
                    </label>
                </div>
                <div class="col-9 subdiv-profile">
                    <p>{{ $employee_name }} &emsp; | &emsp; {{ $employee_no }}</p>
                    <p class="small">Director &emsp; | &emsp; Finance Accounting & Investment &emsp; | &emsp; Pegawai Tetap</p>
                    <p class="small">PT Intikom Berlian Mustika &emsp; | &emsp; Jakarta</p>
                    <p class="small">lina.sudrajat@intikom.co.id &emsp; | &emsp; 08111010101</p>
                </div>
            </div>
        </div>
		<div class="div-title">
			<a href="{{ url()->previous() }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Other Information List</span>
			</a>
		</div>

		<div class="div-form">
            <ul class="nav nav-tabs" id="tab-other-information" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="leave-tab" data-toggle="tab" href="#leave" role="tab" aria-controls="leave" aria-selected="true">Leave</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="insurance-tab" data-toggle="tab" href="#insurance" role="tab" aria-controls="insurance" aria-selected="false">Insurance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="free-format-field-tab" data-toggle="tab" href="#free_format_field" role="tab" aria-controls="free-format-field" aria-selected="false">Free Format Field</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-other-information">
                <div class="tab-pane fade show active" id="leave" role="tabpanel" aria-labelledby="leave-tab">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="leave_data_format_code">Leave Data Format Code</label>
                                    <select class="form-control" id="leave_data_format_code" name="leave_data_format_code">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <hr class="horizontal" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="div-title-text">Annual Leave</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="annual_leave_balance">Balance</label>
                                    <input type="text" class="form-control" id="annual_leave_balance" name="annual_leave_balance" placeholder="Balance">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="annual_leave_leave_in">Leave In</label>
                                    <input type="text" class="form-control" id="annual_leave_leave_in" name="annual_leave_leave_in" placeholder="Leave In">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="annual_leave_leave_out">Leave Out</label>
                                    <input type="text" class="form-control" id="annual_leave_leave_out" name="annual_leave_leave_out" placeholder="Leave Out">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr class="horizontal" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="div-title-text">Long Leave</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="long_leave_balance">Balance</label>
                                    <input type="text" class="form-control" id="long_leave_balance" name="long_leave_balance" placeholder="Balance">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="long_leave_leave_in">Leave In</label>
                                    <input type="text" class="form-control" id="long_leave_leave_in" name="long_leave_leave_in" placeholder="Leave In">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="long_leave_leave_out">Leave Out</label>
                                    <input type="text" class="form-control" id="long_leave_leave_out" name="long_leave_leave_out" placeholder="Leave Out">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <span class="div-title-text">Compensation Leave</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="compensation_leave_balance">Balance</label>
                                    <input type="text" class="form-control" id="compensation_leave_balance" name="compensation_leave_balance" placeholder="Balance">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="compensation_leave_leave_in">Leave In</label>
                                    <input type="text" class="form-control" id="compensation_leave_leave_in" name="compensation_leave_leave_in" placeholder="Leave In">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="compensation_leave_leave_out">Leave Out</label>
                                    <input type="text" class="form-control" id="compensation_leave_leave_out" name="compensation_leave_leave_out" placeholder="Leave Out">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="insurance" role="tabpanel" aria-labelledby="insurance-tab">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="insurance_code">Insurance Code</label>
                                    <select class="form-control" id="insurance_code" name="insurance_code">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="insurance_description">Description</label>
                                    <input type="text" class="form-control" id="insurance_description" name="insurance_description" placeholder="Description">
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="insurance_class_code">Insurance Class Code</label>
                                    <select class="form-control" id="insurance_class_code" name="insurance_class_code">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="insurance_date_start">Insurance Date Start</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="insurance_date_start" name="insurance_date_start" placeholder="Insurance Date Start">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="insurance_date_end">Insurance Date End</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="insurance_date_end" name="insurance_date_end" placeholder="Insurance Date End">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="insurance_policy_no">Insurance Policy No</label>
                                    <input type="text" class="form-control" id="insurance_policy_no" name="insurance_policy_no" placeholder="Insurance Policy No">
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Remarks"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="free_format_field" role="tabpanel" aria-labelledby="free-format-field-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="free_format_field_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function() {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function() {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURLTwo')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURLTwo', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURLTwo');

        sessionStorage.removeItem('previousURLTwo');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function() {
        var table = null;

        $('#free_format_field_data_table thead tr').clone(true).appendTo('#free_format_field_data_table thead');
        $('#free_format_field_data_table thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                    .column(i)
                    .search(this.value)
                    .draw();
                }
            } );
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = e.target;

            if(target.id == "free-format-field-tab"){
                $('#free_format_field_data_table').DataTable().destroy();
                load_table_free_format_field();
            }
        });

        function load_table_free_format_field() {
            table = $('#free_format_field_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('personnel/other_information/free_format_field/table') }}",
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                columns: [
                {data: 'description', name: 'description'},
                {data: 'value', name: 'value'},
                ]
            });
        }
    });
</script>

</html>