<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_salary_complaint_list.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-trans-medical {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .div-profile {
            margin-top: 0;
        }

        .div-row-profile {
            margin: 0;
        }

        .modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .div-title-notification {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 5%;
            font-family: Monserrat;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .div-title-notification-warning {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 2%;
            font-family: Monserrat;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .div-title-notification img {
            max-width: 100%;
            height: 6vh;
            margin-right: 5%;
        }

        .title-text-notification {
            font-family: Inter;
            font-weight: 700;
            font-size: 2.5vw;
            margin-left: 0.5%;
        }

        .title-text-notification-warning {
            font-family: Inter;
            font-weight: 500;
            font-size: 2.5vw;
        }

        .detailstatus h5{
            font-size: 16px;
        }
        .approve h5{
            font-size: 18px;
        }
        .detailstatus input{
            outline: none;
        }
        .preview {
            width:100%;
            height:100%;
        }

        .myimage{
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 4px;
        }

        .imgdiv{
            overflow: hidden;
            margin: 0;
            padding:0.5%;
            border:2px solid #ddd;
            border-radius: 5px;
        }

        #loading {
			display: none;
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(255, 255, 255, 0.8);
			z-index: 9999;
		}

		.spinner {
            position: absolute;
			margin-left: 45%;
			margin-top: 20%;
			border-radius: 50%;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			border: 5px solid #ccc;
			border-top-color: #333;
			animation: spin 1s infinite linear;
		}

        @keyframes spin {
		to { transform: rotate(360deg); }
		}

        #modalImage {
            max-width: 100%;
            max-height: 500px;
            object-fit: contain;  /* Agar gambar tidak terdistorsi */
        }

        .modal {
            overflow-y:auto;
        }

        .modal-body {
            position: relative;
        }

        /* Common styles for both left and right buttons */
        .slide-button {
            position: absolute;
            top: 50%;
            padding: 10px;
            font-size: 24px;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
            color: white;
            cursor: pointer;
            border: none;
            z-index: 1000;
            transform: translateY(-50%);
            text-decoration: none;
        }

        /* Left button */
        .left-btn {
            left: 0;
        }

        /* Right button */
        .right-btn {
            right: 0;
        }

        .slide-button:hover {
            background-color: rgba(0, 0, 0, 0.8);
            color: white; /* Keep the color white on hover */
            text-decoration: none; /* Prevent underline on hover */
        }

        .slide-button:link,
        .slide-button:visited {
            color: white; /* Ensure the color stays white */
            text-decoration: none; /* No underline */
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="salary_complaint_list_form" method="post">
            @csrf
            <div class="div-trans-medical">
                <div class="div-title">
                    <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_salary_complaint_list.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_salary_complaint_list.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_salary_complaint_list.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_salary_complaint_list.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_salary_complaint_list.label_claim_date_end') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_to_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_to_hidden" name="claim_date_to_hidden" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="business_unit form-check-label">{{ __('trans_salary_complaint_list.label_business_unit') }}</label>
                        </div>
                        <select class="form-control select2" id="business_unit" name="business_unit"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="salary_complaint_status_filter form-check-label">{{ __('trans_salary_complaint_list.label_salary_complaint_status') }}</label>
                        </div>
                        <select class="form-control select2" id="salary_complaint_status_filter" name="salary_complaint_status_filter"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="direct_superior form-check-label">{{ __('trans_salary_complaint_list.employee') }}</label>
                        </div>
                        <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="{{ __('trans_salary_complaint_list.employee') }}">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                        <i class="fa fa-search"></i> {{ __('trans_salary_complaint_list.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_salary_complaint">
                        <i class="fa fa-list"></i> {{ __('trans_salary_complaint_list.btn_list') }}
                        </button>
                    </div>
                    {{-- <div class="col-3">
                        <button class="btn btn-primary" name="btn-list" id="btn-list" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-list.svg') }}" alt="export"> {{ __('trans_medical.btn_list') }}
                        </button>
                    </div> --}}
                </div>
                <br>
                <!-- TABLE -->

                <div class="card" style="position: relative;">   
                    <div id="loading">
                        <div class="spinner"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p><b> {{ __('trans_salary_complaint_list.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="salary_complaint_list_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                        <th>{{ __('trans_salary_complaint_list.detail') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.complaint_date') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.complaint_type') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.status') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.ticket_no') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.name') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.missing_amount') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.correct_amount') }}</th>
                                        <th>{{ __('trans_salary_complaint_list.remarks') }}</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="div-form">
        <form id="payroll_salary_complaint_list_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_salary_complaint">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">List User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="list_table" class="table hover display">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">#</th>
                                    <th>Employee ID</th>
                                    <th>Full Name</th>
                                    <th>Division</th>
                                    <th>Ranking Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"></td>        
                                    <td></td>        
                                    <td></td>        
                                    <td></td>        
                                    <td></td>        
                                </tr>
                            </tbody>
                        </table>
                    </div>
                   </div>

                    
                </div>
            </div>
        </form>
    </div>

    <div class="div-form">
        <form id="update_approval_salary_complaint_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_detail">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">Detail Salary Complaint</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row detailstatus">
                                    <div class="col-3  ">
                                        <h5>Request Date</h5>
                                    </div>
                                    <div class="col">
                                        <input id="reqdate" name="reqdate" type="hidden" class="form-control">
                                        <input id="directsuperior" name="directsuperior" type="hidden" class="form-control">
                                        <span id="reqdate_val"></span>
                                    </div>
                                    <div class="col-3">
                                        <h5>Receipt Date</h5>
                                    </div>
                                    <div class="col">
                                        <input id="recdate" name="recdate" type="hidden" class="form-control"><span id="recdate_val"></span>
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Ticket Number</h5>
                                    </div>
                                    <div class="col">
                                        <input id="tiketno" name="tiketno" type="hidden" class="form-control"><span id="tiketno_val"></span>
                                    </div>
                                    <div class="col-3">
                                        <h5>Status</h5>
                                    </div>
                                    <div class="col">
                                        <input id="status" name="status" type="hidden" class="form-control"><span id="status_val"></span>
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <!-- <div class="col-3">
                                        <h5>Business Unit</h5>
                                    </div>
                                    <div class="col">
                                        <input id="b_unit" name="b_unit" type="hidden" class="form-control"><span id="b_unit_val"></span>
                                    </div> -->
                                    <div class="col-3">
                                        <h5>Employee No</h5>
                                    </div>
                                    <div class="col">
                                        <input id="employee_no" name="employee_no" type="hidden" class="form-control"><span id="employee_no_val"></span>
                                    </div>
                                    <div class="col-3">
                                        <h5>Missing Amount</h5>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" class="form-control" id="missing_amount" name="missing_amount"><span id="missing_amount_val"></span>
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Employee Name</h5>
                                    </div>
                                    <div class="col">
                                        <input id="employee_name" name="employee_name" type="hidden" class="form-control"><span id="employee_name_val"></span>
                                    </div>
                                    <div class="col-3">
                                        <h5>Correct Amount</h5>
                                    </div>
                                    <div class="col">
                                        <input id="correct_amount" name="correct_amount" type="hidden" class="form-control"><span id="correct_amount_val"></span>
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Remarks</h5>
                                    </div>
                                    <div class="col">
                                        <input id="remarks" name="remarks" type="hidden" class="form-control"><span id="remarks_val"></span>
                                    </div>
                                    <div class="col-8">
                                    </div>
                                </div>

                                <div class="row approve">
                                    <div class="col-12">
                                        <h5>Attachment</h5>
                                    </div>
                                </div>
                                <div class="row approve">
                                    <div class="col-12">
                                        <div id="attachment" class="row"></div>
                                    </div>
                                </div>
                            
                                <!-- <div class="row detailstatus">
                                    
                                </div> -->
                                <br>
                                <div class="row approve">
                                    <div class="col-3">
                                        <h5>Status</h5>
                                    </div>
                                    <div class="col-5">
                                            <select name="status_new" id="status_new" class="custom-select">
                                                <option value="APPROVED">APPROVE</option>
                                                <option value="REJECTED">REJECT</option>
                                            </select>
                                    </div>
                                </div>                                
                                <div class="row approve">
                                    <div class="col-3">
                                        <h5>Approval Remarks</h5>
                                    </div>
                                    <div class="col-5">
                                        <input id="approvalremarks" name="approvalremarks"  type="text" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-primary btn-block" id="btn-update" type="button">Update</button>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Detail Photo Reimbursement-->
    <div class="modal fade" id="modal_preview_file" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Photo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" id="previewPhoto"></div>    
                </div>
                <hr></hr>
                <div class="row">														
                    <div id="detailPhoto"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary w-25" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-error">{{ $errors->first() }}</span>
                </div>
            </div>
        </div>
    </div>

      {{-- if status false --}}
      <div class="modal fade" role="dialog" id="notification_update_data_fail">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Update Data Failed!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-update-data-fail"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-title-notification">
                        <img src="{{ url('/pictures/checklist-green-confirm-password.svg') }}" alt="Password">
                        <span class="title-text-notification">{{ __('trans_medical.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan gambar -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <a href="javascript:void(0);" id="modalImageLink">
                        <img id="modalImage" class="img-fluid" src="" alt="Image Preview" style="max-width: 100%; max-height: 500px;">
                    </a>

                    <!-- Next and Previous buttons -->
                    <a href="javascript:void(0);" id="prevButton" class="slide-button left-btn">&#10094;</a>  <!-- &#10094; is the HTML code for "<" -->
                    <a href="javascript:void(0);" id="nextButton" class="slide-button right-btn">&#10095;</a> <!-- &#10095; is the HTML code for ">" -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURL')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURL', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURL');

        sessionStorage.removeItem('previousURL');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        $('table.display').DataTable({
            scrollX: true
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>
<script type="text/javascript">
    var lastImg = 1;
    var companyCode = "{{ Session::get('companyCode') }}";
    var table = null;
    var table2 = null;
    var arraySalaryComplaint = [];
    let currentIndex = 0;
    let currentAttachments = [];

    function load_data_salary_complaint_list(claim_date_from, claim_date_to, direct_superior, business_unit, salary_complaint_status){
        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/salary_complaint/table') }}",
            data: {
                'startDate': claim_date_from,
                'endDate': claim_date_to,
                'employeeNo' : direct_superior,
                'businessUnit' : business_unit,
                'salaryComplaintStatus' : salary_complaint_status
            }
        }).then(function (data) {
            arraySalaryComplaint = data;
            $('#salary_complaint_list_table').DataTable().destroy();
            load_data_table_salary_complaint_list();
            $('#loading').hide();
        });
    }

    function load_data_table_salary_complaint_list() {
        table = $('#salary_complaint_list_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arraySalaryComplaint,
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {
                    orderable: false,
                    targets: 0, 
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<button type="button" title="Detail" class="btn btn-info btn-circle" id="btn-detail" data-toggle="modal" data-target="#modal_list_detail" onclick="klikdetail(this)"><i class="fa fa-file-text"></i></button>' : '';
                    }
                },
                {data: 'complainEntity.complainDate', name: 'complainEntity.complainDate', 
                    render: function (data, type, row) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'complainEntity.complainTypeValue', name: 'complainEntity.complainTypeValue'},
                {data: 'complainEntity.status', name: 'complainEntity.status'},
                {data: 'complainEntity.ticketNo', name: 'complainEntity.ticketNo'},
                {data: 'complainEntity.fullName', name: 'complainEntity.fullName'},
                {data: 'complainEntity.missingAmount', name: 'complainEntity.missingAmount',
                    render: function (data, type, row) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                {data: 'complainEntity.correctAmount', name: 'complainEntity.correctAmount',
                    render: function (data, type, row) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                {data: 'complainEntity.remarks', name: 'complainEntity.remarks'},
            ]
        });

        $("#btn-search").prop("disabled", true);
        $("#btn-search").html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'

        );

        $("#btn-search").prop("disabled", false);
        $("#btn-search").html(
            "<img src={{ url('icons/mob/button/button-search.svg') }} alt='export'> {{ __('trans_transport.btn_search') }}"
        );
    }

        $("#salary_complaint_list_form").submit((e)=>{
            e.preventDefault();

            var claim_date_from = $("#claim_date_from").val();
            var claim_date_to = $("#claim_date_to").val();
            var direct_superior = $("#direct_superior").val();
            var business_unit = $("#business_unit").val();
            var salary_complaint_status = $("#salary_complaint_status_filter").val();

            // $("#btn-search").prop("disabled", true);
            // $("#btn-search").html(
            //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            // );

            $('#loading').show();

            load_data_salary_complaint_list(claim_date_from, claim_date_to,direct_superior, business_unit, salary_complaint_status);
    })
    const klikdetail = (element) => {
        let data = table.row($(element).parent()).data().complainEntity;

        $('#reqdate').val(moment(data.createdDate).format('YYYY-MM-DD'))
        $('#reqdate_val').html(moment(data.createdDate).format('YYYY-MM-DD'))
        $('#missing_amount').val(data.missingAmount)
        $('#missing_amount_val').html(data.missingAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
        $('#recdate').val(moment(data.complainDate).format('YYYY-MM-DD'))
        $('#recdate_val').html(moment(data.complainDate).format('YYYY-MM-DD'))
        $('#tiketno').val(data.ticketNo)
        $('#tiketno_val').html(data.ticketNo)
        $('#status').val(data.status)
        $('#status_val').html(data.status)
        // $('#b_unit').val(data.businessUnit)
        // $('#b_unit_val').html(data.businessUnit)
        $('#employee_no').val(data.employeeNo)
        $('#employee_no_val').html(data.employeeNo)
        $('#employee_name').val(data.fullName)
        $('#employee_name_val').html(data.fullName)
        $('#remarks').val(data.remarks)
        $('#remarks_val').html(data.remarks)
        $('#correct_amount').val(data.correctAmount)
        $('#correct_amount_val').html(data.correctAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
        $('#approvalremarks').val(data.approvalRemarks)
        $('#directsuperior').val(data.directSuperiorID)
        $('#status').val(data.status).trigger('change')

        attachmentPreview(data)
    }

    function preview(img) {
        document.getElementById(0).src = img.src;
        lastImg = img.id;
    }

    const attachmentPreview = (data) => {
        $('#attachment').empty();
        $('#attachment').addClass('spinner-border');
        let attachmentArray = [];
        currentIndex = 0;
        currentAttachments = [];

        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/salary_complaint/attachment') }}",
            data: {
                'employeeNo' : data.employeeNo,
                'complainDate' : data.complainDate,
                'ticketNo' : data.ticketNo,
            },
            success: function (response) {
                $('#attachment').removeClass('spinner-border');
                const attachmentEntity = response.attachmentEntity;

                if (attachmentEntity.length) {
                    for (let i = 0; i < attachmentEntity.length; i++) {
                        const data = attachmentEntity[i];
                        attachmentArray.push("data:image/png;base64," + data.complainAttachment);

                        $('#attachment').append(`
                            <div class="col-2">
                                <a href="javascript:void(0);" onclick="load_image('data:image/png;base64,${data.complainAttachment}')">
                                <a href="javascript:void(0);" class="attachment-link" data-index="${i}">
                                    <img id="${i + 1}" class="myimage img-rounded img-fluid" src="data:image/png;base64,${data.complainAttachment}" alt="${i}"/>
                                </a>
                            </div>`
                        );
                    }
                }
            },
            error: function(xhr, status, error) {
                $('#attachment').removeClass('spinner-border');
                console.error('AJAX error:', status, error);
            }
        })

        window.attachmentData = attachmentArray;
    }

    $(document).on('click', '.attachment-link', function() {
        let index = $(this).data('index');
        load_image(window.attachmentData, index);
    });

    // Fungsi untuk menampilkan gambar di modal
    function load_image(attachments, index) {
        currentAttachments = attachments;  // Simpan array attachments
        currentIndex = index;  // Simpan index gambar yang sedang ditampilkan
        
        // Set gambar di modal sesuai index
        $('#modalImage').attr('src', attachments[index]);
        $('#modalImageLink').attr('onclick', `load_image_new_tab('${attachments[index]}')`);

        // Tampilkan modal
        $('#imageModal').modal('show');
    }

    // Event listener untuk tombol Previous
    $('#prevButton').on('click', function() {
        if (currentIndex > 0) {
            currentIndex--;
            $('#modalImage').attr('src', currentAttachments[currentIndex]);  // Tampilkan gambar sebelumnya
            $('#modalImageLink').attr('onclick', `load_image_new_tab('${currentAttachments[currentIndex]}')`);
        }
    });

    // Event listener untuk tombol Next
    $('#nextButton').on('click', function() {
        if (currentIndex < currentAttachments.length - 1) {
            currentIndex++;
            $('#modalImage').attr('src', currentAttachments[currentIndex]);  // Tampilkan gambar berikutnya
            $('#modalImageLink').attr('onclick', `load_image_new_tab('${currentAttachments[currentIndex]}')`);
        }
    });

    function load_image_new_tab(dataImage){
        var image = new Image();
        image.src = dataImage;

        var w = window.open("");
        w.document.write(`
        <html>
            <head>
                <style>
                    body, html {
                        margin: 0;
                        height: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        background-color: #000;
                    }
                    img {
                        max-width: 100%;
                        max-height: 100%;
                    }
                </style>
            </head>
            <body>
                <img src="${dataImage}" />
            </body>
        </html>
        `);
        w.document.close()
    }

    $('#btn-list').click(()=> {
        $('#list_table').DataTable().destroy();
        table2 = $('#list_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('transaction/list/table') }}"             
            },
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {
                    orderable: false,
                    targets: 0,
                    className: 'dt-center',
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<a href="#" id="btnaja" onclick="klik(this)"> <i class="fa fa-check"></i></a>' : '';
                             }
                },
                {data: 'employeeNo', name: 'employeeNo'},
                {data: 'fullName', name: 'fullName'},
                {data: 'positionName', name: 'positionName'},
                {data: 'rankingName', name: 'rankingName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    })
    
    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text()
        $('#direct_superior').val(employee_id)

        $('.close').click();
    }

    // $('#notification_success').on('hide.bs.modal', function () {
    //     window.location = "{{ url('transaction/transaction_reimbursement') }}";
    // });

    $('#btn-update').click(()=>{
        let status = $('#status_new').val();
        let ticketNo = $('#tiketno').val();
        let employeeNo = $("#employee_no").val();
        let approvalremarks = $("#approvalremarks").val();

        update_data(status,ticketNo,employeeNo,approvalremarks)
    })

    function updateSalaryComplaintStatus(status, ticketNo, employeeNo, approvalremarks) {
        var item = arraySalaryComplaint.find(obj => obj.complainEntity && obj.complainEntity.ticketNo === ticketNo);

        if (item) {
            item.complainEntity.status = status;
            item.complainEntity.approvalRemarks = approvalremarks;

            table.clear().rows.add(arraySalaryComplaint).draw(false);
        }
    }

    function update_data(status,  ticketNo, employeeNo, approvalremarks){
        $.ajax({
            url: "{{ url('trans/update_salary_complaint/table') }}",
            type: "get",
            data: {
                'status': status,
                'ticketNo' : ticketNo,
                'employeeNo' : employeeNo,
                'approvalRemarks': approvalremarks
            },
            success: function (response) {
                if (response.status == "true") {
                    $("#btn-update").prop("disabled", false);
                    $("#btn-update").html(
                        // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_update") }}'
                        'Update'
                    );

                    $('.close').click();
                    
                    $('#notification_success').modal('show');
                    $('#message-notification-success').html(response
                        .message);

                    updateSalaryComplaintStatus(status,  ticketNo, employeeNo, approvalremarks);
                    // var oTable = $('#salary_complaint_list_table').dataTable();
                    // oTable.fnDraw(false);
                    // setTimeout(function () {
                    //     window.location =
                    //         "{{ url('transaction/transaction_reimbursement') }}";
                    // }, 3000);
                } else{
                    $("#btn-update").prop("disabled", false);
                    $("#btn-update").html(
                        // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                        'Update'
                    );
                    
                    $('#notification_update_data_fail').modal('show');
                    $('#message-notification-update-data-fail').html(response
                        .message);
                }
            },
            error: function (response) {
                $("#btn-update").prop("disabled", false);
                $("#btn-update").html(
                    // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                    'Update'
                );

                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    }

    loadDataBusinessUnit();
    loadDataFirstLastAllBusinessUnit();
    loadDataStatus();
    loadDataFirstLastAllStatus();
    
        $('#select').focus(function (event) {
                var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
                $searchfield.prop('disabled', true);
        });

        $('#select').click(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').change(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('select').on('select2:close', function (e) {
            $('.header-select').remove();
        });

        function loadDataBusinessUnit(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.id + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            $('#business_unit').select2({
                width: '100%',
                placeholder: 'Choose Business Unit',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/level/access/all/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            search: params.term,
                            levelType: '1' 
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item,
                                    id: item,
                                    data: data
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataFirstLastAllBusinessUnit () {
            $('#business_unit').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/level/access/func/api') }}",
                data: {
                    'levelType' : '1'
                },
            }).then(function (data) {
                if (!$('#business_unit').find('option:contains(' + data + ')').length) {
                    $('#business_unit').append($('<option>').val(data).text(data));
                }
                $('#business_unit').val(data);
                $('#business_unit').removeClass('loading');
            });
        }
        function loadDataStatus(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-12">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            $('#salary_complaint_status_filter').select2({
                width: '100%',
                placeholder: 'Choose Status',
                allowClear: true,
                // multiple: true,
                // tags: true,
                closeOnSelect: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/status_trans/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            search: params.term,
                        };
                    },
                    processResults: function (data) {
                        if(companyCode == 'ITK' || companyCode == 'III'){
                            var filteredData = data.filter(function (item) {
                                var allowedStatuses = ["NEW", "APPROVED", "CANCELED", "PARTIAL APPROVED", "REJECTED", "PAID"];
                                return allowedStatuses.includes(item.value);
                            });
                        }else{
                            var filteredData = data.filter(function (item) {
                                var allowedStatuses = ["NEW", "APPROVED", "CANCELED", "PARTIAL APPROVED", "REJECTED"];
                                return allowedStatuses.includes(item.value);
                            });
                        }

                        filteredData.unshift({ value: "ALL" });

                        return {
                            results: $.map(filteredData, function (item) {
                                return {
                                    text: item.value,
                                    id: item.value,
                                    data: item
                                }
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataFirstLastAllStatus() {
            $('#salary_complaint_status_filter').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/status_trans/api') }}",
            }).then(function (data) {
                $('#salary_complaint_status_filter').prepend($('<option>').val('ALL').text('ALL'));
                $('#salary_complaint_status_filter option:contains("ALL")').not(':first').remove();
                $('#salary_complaint_status_filter').val('ALL');
                $('#salary_complaint_status_filter').removeClass('spinner-border');
            });
        }
    </script>
  
    
</html>


