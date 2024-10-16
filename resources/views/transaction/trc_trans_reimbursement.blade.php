<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_reimbursement.judul') }}</title>
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
        <form id="trans_medical_form" method="post">
            @csrf
            <div class="div-trans-medical">
                <div class="div-title">
                    <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_reimbursement.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_reimbursement.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_reimbursement.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_reimbursement.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_reimbursement.label_claim_date_end') }}">
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
                            <label for="reimbursement_type form-check-label">{{ __('trans_reimbursement.label_reimbursement_type') }}</label>
                        </div>
                        <select class="form-control select2" id="reimbursement_type" name="reimbursement_type[]"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="business_unit form-check-label">{{ __('trans_reimbursement.label_business_unit') }}</label>
                        </div>
                        <select class="form-control select2" id="business_unit" name="business_unit"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="reimbursement_status_filter form-check-label">{{ __('trans_reimbursement.label_reimbursement_status') }}</label>
                        </div>
                        <select class="form-control select2" id="reimbursement_status_filter" name="reimbursement_status_filter"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="direct_superior form-check-label">{{ __('trans_reimbursement.employee') }}</label>
                        </div>
                        <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="{{ __('trans_reimbursement.employee') }}">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                        <i class="fa fa-search"></i> {{ __('trans_reimbursement.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-upload" id="btn-upload"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_upload">
                        <i class="fa fa-upload"></i> {{ __('trans_reimbursement.btn_upload') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-list"></i> {{ __('trans_reimbursement.btn_list') }}
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
                            <p><b> {{ __('trans_reimbursement.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="medical_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                        <th>{{ __('trans_reimbursement.detail') }}</th>
                                        <th>{{ __('trans_reimbursement.receiptdate') }}</th>
                                        <th>{{ __('trans_reimbursement.status') }}</th>
                                        <th>{{ __('trans_reimbursement.ticketno') }}</th>
                                        <th>{{ __('trans_reimbursement.name') }}</th>
                                        <th>{{ __('trans_reimbursement.cname') }}</th>
                                        <th>{{ __('trans_reimbursement.pname') }}</th>
                                        <th>{{ __('trans_reimbursement.pdate') }}</th>
                                        <th>{{ __('trans_reimbursement.treq') }}</th>
                                        <th>{{ __('trans_reimbursement.premarks') }}</th>
                                        <th>{{ __('trans_reimbursement.tpaid') }}</th>
                                        {{-- <th>{{ __('trans_reimbursement.preview') }}</th> --}}
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
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_mass_leave">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">List User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="table hover display">
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
        <form id="update_approval_medical_history_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_detail">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">Detail Reimbursement</h4>
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
                                        <h5>Claim Type</h5>
                                    </div>
                                    <div class="col">
                                        <input id="c_type" name="c_type" type="hidden" class="form-control"><span id="c_type_val"></span>
                                    </div>
                                    <div class="col-3">
                                        <h5>Project Name</h5>
                                    </div>
                                    <div class="col">
                                        <input type="hidden" class="form-control" id="project_name" name="project_name"><span id="project_name_val"></span>
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Employee No</h5>
                                    </div>
                                    <div class="col">
                                        <input id="employee_no" name="employee_no" type="hidden" class="form-control"><span id="employee_no_val"></span>
                                    </div>
                                    <div class="col-3">
                                        <h5>Total Claim</h5>
                                    </div>
                                    <div class="col">
                                        <input id="totalclaim" name="totalclaim" type="hidden" class="form-control"><span id="totalclaim_val"></span>
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Employee Name</h5>
                                    </div>
                                    <div class="col">
                                        <input id="employee_name" name="employee_name" type="hidden" class="form-control"><span id="employee_name_val"></span>
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
                                            <select name="reimbursement_status" id="reimbursement_status" class="custom-select">
                                                <option value="APPROVED">APPROVE</option>
                                                <option value="REJECTED">REJECT</option>
                                                <option value="PAID">PAID</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="row approve">
                                    <div class="col-3">
                                        <h5>Total Paid</h5>
                                    </div>
                                    <div class="col-5">
                                        <input id="totalpaid" name="totalpaid"  type="text" class="form-control">
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

    <div class="div-form">
        <form id="upload_paid_reimbursement_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="modal_upload">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">Upload Paid Reimbursement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file_reimbursement">File Reimbursement</label>
                                    <span style="color: red;">*</span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_reimbursement" name="file_reimbursement">
                                        <label class="custom-file-label" for="file_reimbursement">Choose Import File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btn-process" id="btn-process" style="width: 100%;">
                                        Upload
                                    </button>
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
            altFormat: "j-M-y",
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
    var arrayReimbursement = [];
    let currentIndex = 0;
    let currentAttachments = [];

    function load_data_reimbursement(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit, reimbursement_status){
        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/reimbursement/table') }}",
            data: {
                'startDate': claim_date_from,
                'endDate': claim_date_to,
                'employeeNo' : direct_superior,
                'reimbursementType' : reimbursement_type,
                'businessUnit' : business_unit,
                'reimbursementStatus' : reimbursement_status
            }
        }).then(function (data) {
            arrayReimbursement = data;
            $('#medical_table').DataTable().destroy();
            load_data_table_reimbursement();
            $('#loading').hide();
        });
    }

    function load_data_table_reimbursement() {
        table = $('#medical_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrayReimbursement,
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
                {data: 'reimbursementEntity.receiptDate', name: 'reimbursementEntity.receiptDate', 
                    render: function (data, type, row) {
                        return moment(data).format('YYYY-MM-DD');
                    }
                },
                {data: 'reimbursementEntity.reimbursementStatus', name: 'reimbursementEntity.reimbursementStatus'},
                {data: 'reimbursementEntity.ticketNo', name: 'reimbursementEntity.ticketNo'},
                {data: 'reimbursementEntity.fullnameRequester', name: 'reimbursementEntity.fullnameRequester'},
                {data: 'reimbursementEntity.customerName', name: 'reimbursementEntity.customerName'},
                {data: 'reimbursementEntity.projectName', name: 'reimbursementEntity.projectName'},
                {data: 'reimbursementEntity.paymentDate', name: 'reimbursementEntity.paymentDate', 
                        render: function (data, type, row) {
                            if (data == null){
                                return '-'
                            }else {
                                return moment(data).format('YYYY-MM-DD');
                            }
                        }
                },
                {data: 'reimbursementEntity.totalClaimAmount', name: 'reimbursementEntity.totalClaimAmount',
                    render: function (data, type, row) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                {data: 'reimbursementEntity.approvalRemarks', name: 'reimbursementEntity.approvalRemarks'},
                {data: 'reimbursementEntity.paidAmount', name: 'reimbursementEntity.paidAmount',
                    render: function (data, type, row) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                // {
                //     orderable: false,
                //     "defaultContent": '',
                //     render: function(data, type) {
                //         return '<button type="button" title="Preview" class="btn btn-info btn-circle" id="btn-preview" data-toggle="modal" data-target="#modal_preview_file" onclick="klikpreview(this)"><i class="fa fa-file-photo-o"></i></button>';
                //     }
                // },
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

        $("#trans_medical_form").submit((e)=>{
            e.preventDefault();

            var claim_date_from = $("#claim_date_from").val();
            var claim_date_to = $("#claim_date_to").val();
            var direct_superior = $("#directsuperior").val();
            var reimbursement_type = $("#reimbursement_type").val();
            var business_unit = $("#business_unit").val();
            var reimbursement_status = $("#reimbursement_status_filter").val();

            // $("#btn-search").prop("disabled", true);
            // $("#btn-search").html(
            //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            // );

            $('#loading').show();

            load_data_reimbursement(claim_date_from, claim_date_to,direct_superior, reimbursement_type, business_unit, reimbursement_status);
    })
    const klikdetail = (element) => {
        console.log(table.row($(element).parent()).data())
        let data = table.row($(element).parent()).data().reimbursementEntity;

        $('#reqdate').val(moment(data.createdDate).format('YYYY-MM-DD'))
        $('#reqdate_val').html(moment(data.createdDate).format('YYYY-MM-DD'))
        $('#project_name').val(data.projectName)
        $('#project_name_val').html(data.projectName)
        $('#recdate').val(moment(data.receiptDate).format('YYYY-MM-DD'))
        $('#recdate_val').html(moment(data.receiptDate).format('YYYY-MM-DD'))
        $('#tiketno').val(data.ticketNo)
        $('#tiketno_val').html(data.ticketNo)
        $('#status').val(data.reimbursementStatus)
        $('#status_val').html(data.reimbursementStatus)
        // $('#b_unit').val(data.businessUnit)
        // $('#b_unit_val').html(data.businessUnit)
        $('#employee_no').val(data.employeeNo)
        $('#employee_no_val').html(data.employeeNo)
        $('#employee_name').val(data.fullnameRequester)
        $('#employee_name_val').html(data.fullnameRequester)
        $('#c_type').val(data.reimbursementType)
        $('#c_type_val').html(data.reimbursementType)
        $('#totalclaim').val(data.totalClaimAmount)
        $('#totalclaim_val').html(data.totalClaimAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."))
        $('#approvalremarks').val(data.approvalRemarks)
        $('#totalpaid').val(data.paidAmount)
        $('#directsuperior').val(data.directSuperiorID)
        $('#reimbursement_status').val(data.reimbursementStatus).trigger('change')

        attachmentPreview(data)
    }

    function preview(img) {
        document.getElementById(0).src = img.src;
        lastImg = img.id;
    }

    const klikpreview = (element) => {
        let data = table.row($(element).parent()).data().attachmentEntity;

        $('#detailPhoto').empty();
        $('#previewPhoto').empty();	
        
        if(data[0] != "")
        {
            for(var i =0; i < data.length ; i++)
            {
                $('#detailPhoto').append('<div class="imgdiv col-2" ><img id="'+(i+1)+'" class="myimage img-rounded" src="data:image/png;base64,'+ data[i].reimbursementAttachment64 +'" onclick="preview(this)" alt="'+i+'"/></div>');					
            }
            
            $('#previewPhoto').append('<img id="0" class="preview" src="" alt="preview" />');
            document.getElementById(0).src = document.getElementById(lastImg).src;
        }
        else
        {
            $('#previewPhoto').append('<div>No Data Available.</div>');
        }
    }

    const attachmentPreview = (data) => {
        $('#attachment').empty();
        $('#attachment').addClass('spinner-border');
        let attachmentArray = [];
        currentIndex = 0;
        currentAttachments = [];

        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/reimbursement/attachment') }}",
            data: {
                'employeeNo' : data.employeeNo,
                'receiptDate' : data.receiptDate,
                'ticketNo' : data.ticketNo,
            },
            success: function (response) {
                $('#attachment').removeClass('spinner-border');
                const attachmentEntity = response.attachmentEntity;

                if (attachmentEntity.length) {
                    for (let i = 0; i < attachmentEntity.length; i++) {
                        const data = attachmentEntity[i];
                        attachmentArray.push("data:image/png;base64," + data.reimbursementAttachment64);

                        $('#attachment').append(`
                            <div class="col-2">
                                <a href="javascript:void(0);" onclick="load_image('data:image/png;base64,${data.reimbursementAttachment64}')">
                                <a href="javascript:void(0);" class="attachment-link" data-index="${i}">
                                    <img id="${i + 1}" class="myimage img-rounded img-fluid" src="data:image/png;base64,${data.reimbursementAttachment64}" alt="${i}"/>
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
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
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

    $("#btn-process").click(function () {
        $(this).prop("disabled", true);
        $(this).html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        $("#upload_paid_reimbursement_form").submit();
    });

    // $('#notification_success').on('hide.bs.modal', function () {
    //     window.location = "{{ url('transaction/transaction_reimbursement') }}";
    // });

    if ($("#upload_paid_reimbursement_form").length > 0) {
        $("#upload_paid_reimbursement_form").validate({
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myForm = document.getElementById('upload_paid_reimbursement_form');
                var formdata = new FormData(myForm);
                
                $.ajax({
                    url: "{{ url('transaction/update_reimbursement/import') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function (response) {
                        if (response[0].status == "true") {
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html('Upload');

                            $('#modal_upload').modal('hide');
                            
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response[0]
                                .message);
                            
                            // setTimeout(function () {
                            //     window.location =
                            //         "{{ url('transaction/transaction_reimbursement') }}";
                            // }, 3000);
                        } else {
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html('Upload');

                            $('#notification_error').modal('show');
                            if (response[0].message == null || response[0].message ==
                                '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response[0]
                                    .message);
                            }
                        }
                    },
                    error: function (response) {
                        $("#btn-process").prop("disabled", false);
                        $("#btn-process").html('Upload');

                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        })
    }

    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    $('#btn-update').click(()=>{
        let reimbursement_status = $('#reimbursement_status').val();
        let totalpaid = $('#totalpaid').val();
        let ticketNo = $('#tiketno').val();
        let direct_superior = $("#directsuperior").val();
        let approvalremarks = $("#approvalremarks").val();

        update_data(reimbursement_status,totalpaid,ticketNo,direct_superior,approvalremarks)
    })

    function updateReimbursementStatus(reimbursement_status, totalpaid, ticketNo, direct_superior, approvalremarks) {
        var item = arrayReimbursement.find(obj => obj.reimbursementEntity && obj.reimbursementEntity.ticketNo === ticketNo);

        if (item) {
            item.reimbursementEntity.reimbursementStatus = reimbursement_status;
            item.reimbursementEntity.paidAmount = totalpaid;
            item.reimbursementEntity.approvalRemarks = approvalremarks;

            table.clear().rows.add(arrayReimbursement).draw(false);
        }
    }

    function update_data(reimbursement_status, totalpaid, ticketNo, direct_superior, approvalremarks){
        $.ajax({
            url: "{{ url('trans/update/table') }}",
            type: "get",
            data: {
                'status': reimbursement_status,
                'paidAmount': totalpaid,
                'ticketNo' : ticketNo,
                'employeeNo' : direct_superior,
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

                    updateReimbursementStatus(reimbursement_status, totalpaid, ticketNo, direct_superior, approvalremarks);
                    // var oTable = $('#medical_table').dataTable();
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

    loadDataExportReimbrusement();
    loadDataFirstLastAllReimbursement();
    loadDataBusinessUnit();
    loadDataFirstLastAllBusinessUnit();
    loadDataStatus();
    loadDataFirstLastAllStatus();
    
        $.get("{{ url('reimbursement_type/reimbursement/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#reimbursement_type').append("<option value=" + v.comGenCode + ">" + v.value +
                    "</option>");
            });
        });
    
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
    
            
        function loadDataExportReimbrusement(){
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
            
            $('#reimbursement_type').select2({
                width: '100%',
                placeholder: 'Choose Reimbursement Type',
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
                    url: "{{ url('/reimbursement_type/reimbursement/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.value,
                                    id: item.comGenCode,
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

        function loadDataFirstLastAllReimbursement () {
            $('#reimbursement_type').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/reimbursement_type/reimbursement/func/api') }}",
            }).then(function (data) {
                if (!$('#reimbursement_type').find('option:contains(' + data[0].value + ')').length) {
                    $('#reimbursement_type').append($('<option>').val(data[0].comGenCode).text(data[0].value));
                }
                $('#reimbursement_type').val(data[0].comGenCode);
                $('#reimbursement_type').removeClass('loading');
            });
        }


        // buat ALL
        // function loadDataFirstLastAllReimbursement() {
        //     $.ajax({
        //         type: 'GET',
        //         url: "{{ url('/reimbursement_type/all/api') }}",
        //     }).then(function (data) {
        //         if (!$('#reimbursement_type').find('option:contains(' + data.value + ')').length)
        //         $('#reimbursement_type').val(data.value);
        //     });
        // }


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
            
            $('#reimbursement_status_filter').select2({
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
            $('#reimbursement_status_filter').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/status_trans/api') }}",
            }).then(function (data) {
                $('#reimbursement_status_filter').prepend($('<option>').val('ALL').text('ALL'));
                $('#reimbursement_status_filter option:contains("ALL")').not(':first').remove();
                $('#reimbursement_status_filter').val('ALL');
                $('#reimbursement_status_filter').removeClass('spinner-border');
            });
        }
    </script>
  
    
</html>


