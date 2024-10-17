<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_business_trip.judul') }}</title>
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
    <link  rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <style type="text/css">
        .div-trans-business-trip {
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

        .container {
            display: flex;
            flex-wrap: wrap;
        }

        .preview {
            width: 100%;
            height: 100%;
        }

        .myimage{
            width: 100%;
            height: 100%;
        }

        .imgdiv{
            height: 50px;
            width: 50px;
            overflow: hidden;
            margin: 1%;
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

        #loading2 {
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
        <form id="trans_business_trip_form" method="post">
            @csrf
            <div class="div-trans-business-trip">
                <div class="div-title">
                    <a href="{{ route('transaction', ['moduleID' => 'TRX']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_business_trip.list') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_business_trip.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_business_trip.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_business_trip.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_business_trip.label_claim_date_end') }}">
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
                            <label for="processed_date form-check-label">{{ __('trans_business_trip.label_processed_date') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="processed_date" name="processed_date"
                                placeholder="{{ __('trans_business_trip.label_processed_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="processed_date_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="processed_date_hidden" name="processed_date_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label">{{ __('trans_business_trip.label_reimbursement_type') }}</label>
                        </div>
                        <select class="form-control select2" id="reimbursement_type" name="reimbursement_type"></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="business_unit form-check-label">{{ __('trans_business_trip.label_bu') }}</label>
                        </div>
                        <select class="form-control select2" id="business_unit" name="business_unit"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="business_trip_status form-check-label">{{ __('trans_business_trip.label_business_trip_status') }}</label>
                        </div>
                        <select class="form-control select2" id="business_trip_status" name="business_trip_status"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="direct_superior form-check-label">{{ __('trans_business_trip.employee') }}</label>
                        </div>
                        <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="employee-no">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_business_trip.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-upload" id="btn-upload"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_upload">
                        <i class="fa fa-upload"></i> {{ __('trans_business_trip.btn_upload') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_business_trip.btn_list') }}
                        </button>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="card" style="position: relative;">
                    <div id="loading">
                        <div class="spinner"></div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p><b>{{ __('trans_business_trip.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="business_trip_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                        <th>{{ __('trans_business_trip.detail') }}</th>
                                        <th>{{ __('trans_business_trip.tnom') }}</th>
                                        <th>{{ __('trans_business_trip.type') }}</th>
                                        <th>{{ __('trans_business_trip.name') }}</th>
                                        <th>{{ __('trans_business_trip.cname') }}</th>
                                        <th>{{ __('trans_business_trip.status') }}</th>
                                        <th>{{ __('trans_business_trip.destination') }}</th>
                                        <th>{{ __('trans_business_trip.cname') }}</th>
                                        <th>{{ __('trans_business_trip.pname') }}</th>
                                        <th>{{ __('trans_business_trip.tpaid') }}</th>
                                        <th>{{ __('trans_business_trip.treq') }}</th>
                                        <th>{{ __('trans_business_trip.tujuan') }}</th>
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
        <div class="modal fade" id="modal_list_mass_leave" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-little">{{ __('trans_business_trip.luser') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('trans_business_trip.employee') }}</th>
                                <th>{{ __('trans_business_trip.name') }}</th>
                                <th>{{ __('trans_business_trip.division') }}</th>
                                <th>{{ __('trans_business_trip.ranking') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>        
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
    </div>
    <div class="div-form">
        <div class="modal fade" id="modal_list_detail" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-little">{{ __('trans_business_trip.dbtrip') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body pl-0 pr-0">
                        <form id="payroll_calculation_detail_modal_form" method="post">
                            @csrf
                            <div class="row detailstatus">
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.employeename') }}</h5>
                                </div>
                                <div class="col-9">
                                    <input id="employeename" name="employeename" type="hidden" class="form-control"><span id="employeename_val"></span>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.status') }}</h5>
                                </div>
                                <div class="col-9">
                                    <input id="status" name="status" type="hidden" class="form-control"><span id="status_val"></span>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.label_claim_date_start') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="s_date" name="s_date" type="hidden" class="form-control"><span id="s_date_val"></span>
                                </div>
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.label_claim_date_end') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="e_date" name="e_date" type="hidden" class="form-control"><span id="e_date_val"></span>
                                </div>
                            </div>

                            <div class="row detailstatus">
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.tnom') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="tiketno" name="tiketno" type="hidden" class="form-control"><span id="tiketno_val"></span>
                                    <input id="directsuperior" name="directsuperior" type="hidden" class="form-control">
                                </div>
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.treq') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="c_type" name="c_type" type="hidden" class="form-control"><span id="c_type_val"></span>
                                </div>
                            </div>

                            <div class="row detailstatus">
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.label_bu') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="b_unit" name="b_unit" type="hidden" class="form-control"><span id="b_unit_val"></span>
                                </div>
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.label_claim_type') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="c_type_bst" name="c_type_bst" type="hidden" class="form-control"><span id="c_type_bst_val"></span>
                                </div>
                            </div>

                            <div class="row detailstatus">
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.label_reimbursement_type') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="type" name="type" type="hidden" class="form-control"><span id="type_val"></span>
                                </div>
                                <div class="col-3">
                                    <h5>{{ __('trans_business_trip.employee') }}</h5>
                                </div>
                                <div class="col">
                                    <input id="employee_no" name="employee_no" type="hidden" class="form-control"><span id="employee_no_val"></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div id="loading2">
                                    <div class="spinner"></div>
                                </div>
                                <div class="col-12">
                                    <div class="card m-0" style="display: block">
                                        <a id="collapseLink" class="collapsed" data-toggle="collapse" href="#detail_business_trip" aria-expanded="true" aria-controls="detail_business_trip">
                                            <div class="card-header">
                                                <div class="div-dropdown-title">
                                                    <span class="dropdown-title-text">{{ __('trans_business_trip.detail_business_trip') }}</span>
                                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                                </div>
                                            </div>
                                        </a>
                                        <div id="detail_business_trip" class="collapse m-3">
                                            <div class="card-block">
                                                <table id="leave_table" class="table table-bordered" style="font-size: 10px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Claim Date</th>
                                                            <th>Cost Type</th>
                                                            <th>Description</th>
                                                            <th>Currency</th>
                                                            <th>Exchange Rate</th>
                                                            <th>Amount</th>
                                                            <th>Total</th>
                                                            <th>Attachment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="body_detail_business_trip"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div id="div-approve">
                                <div class="row approve">
                                    <div class="col-3">
                                        <h5>{{ __('trans_business_trip.status') }}</h5>
                                    </div>
                                    <div class="col-5">
                                            <select name="reimbursement_status" id="reimbursement_status" class="custom-select" required>
                                                <!-- @if(Session::get('companyCode') == 'ITK' || Session::get('companyCode') == 'III')
                                                <option value="NEW">{{ __('trans_business_trip.new') }}</option>
                                                <option value="PARTIAL_APPROVED">{{ __('trans_business_trip.partial_approved') }}</option>
                                                <option value="APPROVED">{{ __('trans_business_trip.approved') }}</option>
                                                <option value="WAITING_PAYMENT">{{ __('trans_business_trip.waiting_payment') }}</option>
                                                <option value="PAID">{{ __('trans_business_trip.paid') }}</option>
                                                <option value="REJECTED">{{ __('trans_business_trip.rejected') }}</option>
                                                <option value="CANCELLED">{{ __('trans_business_trip.cancelled') }}</option>
                                                <option value="SETTLEMENT_REQUEST">{{ __('trans_business_trip.settlement_request') }}</option>
                                                <option value="SETTLEMENT_APPROVED">{{ __('trans_business_trip.settlement_approved') }}</option>
                                                <option value="SETTLEMENT_PARTIAL_APPROVED">{{ __('trans_business_trip.settlement_partial_approved') }}</option>
                                                <option value="CHECKING_HRD">{{ __('trans_business_trip.checking_hrd') }}</option>
                                                <option value="SETTLEMENT_WAITING_PAYMENT">{{ __('trans_business_trip.settlement_waiting_payment') }}</option>
                                                <option value="WAITING_DEPOSITSLIP">{{ __('trans_business_trip.waiting_deposit_slip') }}</option>
                                                <option value="SETTLEMENT_CHECKING">{{ __('trans_business_trip.settlement_checking') }}</option>
                                                <option value="SETTLEMENT_REJECTED">{{ __('trans_business_trip.settlement_rejected') }}</option>
                                                <option value="SETTLEMENT_CANCELLED">{{ __('trans_business_trip.settlement_cancelled') }}</option>
                                                <option value="COMPLETED">{{ __('trans_business_trip.completed') }}</option>
                                                <option value="COMPLETED_MANUAL">{{ __('trans_business_trip.completed_manual') }}</option>
                                                @else
                                                <option value="APPROVED">{{ __('trans_business_trip.approve') }}</option>
                                                <option value="REJECTED">{{ __('trans_business_trip.reject') }}</option>
                                                <option value="PAID">{{ __('trans_business_trip.paid') }}</option>
                                                @endif -->
                                            </select>
                                    </div>
                                </div>
                                <div class="row approve" id="div-totalpaid">
                                    <div class="col-3">
                                        <h5>{{ __('trans_business_trip.tpaid') }}</h5>
                                    </div>
                                    <div class="col-5">
                                        <input id="totalpaid" name="totalpaid"  type="number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row approve">
                                    <div class="col-3">
                                        <h5>{{ __('trans_business_trip.approvalremarks') }}</h5>
                                    </div>
                                    <div class="col-5">
                                        <input id="approvalremarks" name="approvalremarks"  type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary btn-block" id="btn-update" type="button">{{ __('trans_business_trip.update') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="div-form">
        <form id="upload_paid_business_trip_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="modal_upload">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-little">Upload Paid Business Trip</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="file_business_trip">File Business Trip</label>
                                    <span style="color: red;">*</span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_business_trip" name="file_business_trip">
                                        <label class="custom-file-label" for="file_business_trip">Choose Import File</label>
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
                        <span class="title-text-notification">{{ __('trans_business_trip.alert_success') }}</span>
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
<script>
    $(document).ready( function () {
        $('table.display').DataTable({
            scrollX: true,
        });
    } );
</script>
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
    var companyCode = "{{ Session::get('companyCode') }}";
    var table = null;
    var table2 = null;
    var arrayBusinessTrip = [];
    let currentIndex = 0;
    let currentAttachments = [];

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

    $('#collapseLink').on('click', function(e) {
        if ($('#loading2').is(':visible')) {
            e.preventDefault();
            return false;
        }
    });

    function showLoading() {
        $('#loading2').show();
        $('#collapseLink').addClass('disabled');
    }

    function hideLoading() {
        $('#loading2').hide();
        $('#collapseLink').removeClass('disabled');
    }

    function load_data_business_trip(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit, business_trip_status){
        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/businesstrip/table') }}",
            data: {
                'startDate': claim_date_from,
                'endDate': claim_date_to,
                'employeeNo' : direct_superior,
                'type' : reimbursement_type,
                'businessUnit' : business_unit,
                'status' : business_trip_status
            }
        }).then(function (data) {
            arrayBusinessTrip = data;
            $('#business_trip_table').DataTable().destroy();
            load_data_table_business_trip();
            $('#loading').hide();
        });
    }

    function isEmpty(obj) {
        for(var prop in obj) {
            if(Object.prototype.hasOwnProperty.call(obj, prop)) {
                return false;
            }
        }

        return JSON.stringify(obj) === JSON.stringify({});
    }

    function load_image_new_tab(image) {
        var w = window.open("");
        w.document.write('<img src="' + image + '" style="max-width: 100%; max-height: 100%;">');
    }

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

    function load_data_attachment(type, ticketNo){
        showLoading();
        $.ajax({
            type: 'GET',
            url: "{{ url('/trans/businesstrip/attachment') }}",
            data: {
                'type': type,
                'ticketNo': ticketNo,
            }
        }).then(function (data) {
            let rows = '';
            let attachmentArray = [];
            currentIndex = 0;
            attachmentIndex = 0;
            currentAttachments = [];

            if(data[0].hasOwnProperty('settlementDetail') && data[0].settlementDetail.length !== 0){
                $.each(data[0].settlementDetail, function (key, val) {
                    if(val.detail.length !== 0){
                        let isFirstRow = true;
                        $.each(val.detail, function (key2, val2) {
                            rows += `
                                <tr>
                                    <td>${moment(val.claimDate).format('YYYY-MM-DD')}</td>
                                    <td>${val2.typeClaim}</td>
                                    <td>${val2.remarks ? val2.remarks : ''}</td>
                                    <td>${val2.currency}</td>
                                    <td>${val2.exchangeRate.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
                                    <td>0</td>
                                    <td>${val2.totalClaim.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>`;

                            if (isFirstRow) {
                                rows += `<td rowspan="${val.detail.length}">
                                            <div class="container pr-0 pl-0">`;

                                $.each(val.attachment, function (key3, val3) {
                                    let imageSrc = "";
                                    if (val3.attachment == "" || val3.attachment == null) {
                                        attachmentArray.push("<?= asset('pictures/no_image.png') ?>");
                                        imageSrc = "<?= asset('pictures/no_image.png') ?>";
                                    } else {
                                        attachmentArray.push("data:image/png;base64," + val3.attachment);
                                        imageSrc = "data:image/png;base64," + val3.attachment;
                                    }
                                    
                                    rows += `
                                        <a href="javascript:void(0);" class="attachment-link" data-index="${attachmentIndex}">
                                            <div class="imgdiv">
                                                <img id="ItemPreview" alt="image" class="myimage img-rounded" src="${imageSrc}"/>
                                            </div>
                                        </a>`;

                                    attachmentIndex++;
                                });

                                rows += `</div></td></tr>`;
                                isFirstRow = false;
                            }
                            rows += `</div>
                                </td>
                                </tr>
                            `;
                        });
                    }
                });

                window.attachmentData = attachmentArray;
            }else if(data[0].hasOwnProperty('travelAdvance') && data[0].travelAdvance.length !== 0){
                $.each(data[0].travelAdvance, function (key, val) {
                    rows += `
                        <tr>
                            <td>${moment(val.createdDate).format('YYYY-MM-DD')}</td>
                            <td>${val.typeClaim}</td>
                            <td>${val.remarks}</td>
                            <td>${val.currency}</td>
                            <td>${val.exchangeRate.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
                            <td>${val.claimPerDay.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td>
                            <td>${val.totalClaimPerDay.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</td> 
                            <td></td>
                        </tr>
                    `;
                });
            }else{
                rows += `
                    <tr>
                        <td class="text-center" colspan="8">No Data Available</td>
                    </tr>
                `;
            }
            $('#body_detail_business_trip').html(rows);
            hideLoading()
        });
    }

    $(document).on('click', '.attachment-link', function() {
        let index = $(this).data('index');
        console.log(index);
        load_image(window.attachmentData, index);
    });

    function load_data_table_business_trip() {
        table = $('#business_trip_table').DataTable({
            processing: true,
            // serverSide: true,
            orderCellsTop: true,
            data: arrayBusinessTrip,
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
                    render: function(data, type, row) {
                        return type === 'display' ?
                            (row.claimType == "Business Trip") ?
                                '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' 
                            :
                                '<button type="button" onclick="klikdetail(this)" class="btn btn-success" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>'
                            : '';
                    }
                },
                // {data: 'responseBusinessTrip.requestDate', name: 'requestDate', 
                //         render: function (data, type, row) {
                //         return moment(data).format('YYYY-MM-DD');
                //     }
                // },
                {data: 'ticketNo', name: 'ticketNo'},
                {data: 'claimType', name: 'claimType'},
                {data: 'fullName', name: 'fullName'},
                {data: 'customerName', name: 'customerName'},
                {data: 'status', name: 'status'},
                {data: 'destination', name: 'destination'},
                {data: 'customerName', name: 'customerName'},
                {data: 'projectName', name: 'projectName'},
                {data: 'paidAmount', name: 'paidAmount'},
                {data: 'totalClaimAmount', name: 'totalClaimAmount',
                    render: function (data, type, row) {
                        return data.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
                {data: 'purpose', name: 'purpose'},
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

    $("#trans_business_trip_form").submit((e)=>{
        e.preventDefault();

        var claim_date_from = $("#claim_date_from").val();
        var claim_date_to = $("#claim_date_to").val();
        var direct_superior = $("#direct_superior").val();
        var reimbursement_type = $("#reimbursement_type").val();
        var business_unit = $("#business_unit").val();
        var business_trip_status = $("#business_trip_status").val();

        $('#loading').show();

        load_data_business_trip(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit, business_trip_status);
    })

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
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<button type="button" onclick="klik(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
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


    const klikdetail = (element) => {
        let data = table.row($(element).parent()).data();

        $('#detail_business_trip').collapse('hide');
        $('#body_detail_business_trip').html('');
        load_data_attachment(data.claimType, data.ticketNo);

        $('#s_date').val(moment(data.startDate).format('DD-MMM-YYYY'))
        $('#s_date_val').html(moment(data.startDate).format('DD-MMM-YYYY'))
        $('#e_date').val(moment(data.endDate).format('DD-MMM-YYYY'))
        $('#e_date_val').html(moment(data.endDate).format('DD-MMM-YYYY'))
        $('#c_type_bst').val(data.claimType)
        $('#c_type_bst_val').html(data.claimType)
        $('#tiketno').val(data.ticketNo)
        $('#tiketno_val').html(data.ticketNo)
        $('#totalpaid').val(data.paidAmount)
        $('#status').val(data.status)
        $('#status_val').html(data.status)
        $('#employeename').val(data.fullName)
        $('#employeename_val').html(data.fullName)
        $('#b_unit').val(data.businessUnit)
        $('#b_unit_val').html(data.businessUnit)
        $('#employee_no').val(data.employeeNo)
        $('#employee_no_val').html(data.employeeNo)
        $('#c_type').val(data.totalClaimAmount)
        $('#c_type_val').html(data.totalClaimAmount)
        $('#approvalremarks').val(data.approvalRemarks)
        $('#type').val(data.purpose)
        $('#type_val').html(data.purpose)
        $('#directsuperior').val(data.directSuperiorID)
        $('#div-totalpaid').show();
        if(data.claimType == "Business Trip"){
            $('#divShowAttachment').hide();
        }else{
            $('#divShowAttachment').show();
        }

        if (!data.statusList || data.statusList.length === 0 || data.statusList[0] == null) {
            $('#btn-update').hide();
            $('#div-approve').hide();
        } else {
            $('#btn-update').show();
            $('#div-approve').show();

            $('#reimbursement_status').empty();
            $.each(data.statusList, function(index, value) {
                $('#reimbursement_status').append($('<option>', {
                    value: value,
                    text: value
                }));
            });

            var selectedValue = $('#reimbursement_status').val();
            if (selectedValue === 'COMPLETED' || selectedValue === 'PAID') {
                $('#div-totalpaid').show();
            } else {
                $('#div-totalpaid').hide();
            }
        }
    }

    $('#reimbursement_status').on('change', function() {
        var selectedValue = $(this).val();
        if(selectedValue == 'COMPLETED' || selectedValue == 'PAID'){
            $('#div-totalpaid').show();
        }else{
            $('#div-totalpaid').hide();
        }
    });

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
        $("#upload_paid_business_trip_form").submit();
    });

    // $('#notification_success').on('hide.bs.modal', function () {
    //     window.location = "{{ url('transaction/transaction_reimbursement') }}";
    // });

    if ($("#upload_paid_business_trip_form").length > 0) {
        $("#upload_paid_business_trip_form").validate({
            submitHandler: function (form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var myForm = document.getElementById('upload_paid_business_trip_form');
                var formdata = new FormData(myForm);
                
                $.ajax({
                    url: "{{ url('transaction/update_business_trip/import') }}",
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

    loadDataBusinessUnit();
    loadDataTravelType();
    loadDataFirstLastAllTravelType();
    loadDataFirstLastAllBusinessUnit();
    loadDataStatus();
    loadDataFirstLastAllStatus();
    // loadDataUpdateStatus();

    $.get("{{ url('travel_type/api') }}", function (data) {
        $.each(data, function (k, v) {
            $('#travel_type').append("<option value=" + v.variable + ">" + v.value +
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

    function loadDataFirstLastAllTravelType () {
        $('#reimbursement_type').addClass('spinner-border');

        $.ajax({
            type: 'GET',
            url: "{{ url('/travel_type/all/api') }}",
        }).then(function (data) {
            if (!$('#reimbursement_type').find('option:contains(' + data.value + ')').length) {
                $('#reimbursement_type').append($('<option>').val(data.comGenCode).text(data.value));
            }
            $('#reimbursement_type').val(data.comGenCode);
            $('#reimbursement_type').removeClass('loading');
        });
    }

    function loadDataTravelType(){
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
            placeholder: 'Choose Travel Type',
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
                url: "{{ url('/travel_type/api') }}",
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
        
        $('#business_trip_status').select2({
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
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.value,
                                    id: item.value,
                                    data: item
                                }
                            })
                        };
                    }else{
                        var filteredData = data.filter(function (item) {
                            var allowedStatuses = ["NEW", "APPROVED", "CANCELED", "PARTIAL APPROVED", "REJECTED"];
                            return allowedStatuses.includes(item.value);
                        });

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
                    }
                },
                cache: true,
            },
            templateResult: formatSelect
        });
    }

    function loadDataFirstLastAllStatus() {
        $('#business_trip_status').addClass('spinner-border');

        $.ajax({
            type: 'GET',
            url: "{{ url('/status_trans/api') }}",
        }).then(function (data) {
            $('#business_trip_status').prepend($('<option>').val('ALL').text('ALL'));
            $('#business_trip_status option:contains("ALL")').not(':first').remove();
            $('#business_trip_status').val('ALL');
            $('#business_trip_status').removeClass('spinner-border');
        });
    }

    function loadDataUpdateStatus(statusList = []){
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
        
        $('#business_trip_status').select2({
            width: '100%',
            placeholder: 'Choose Status',
            allowClear: true,
            closeOnSelect: true,
            language: {
                errorLoading: function () {
                    return $search;
                },
                searching: function () {
                    return $search;
                }
            },
            data: statusList.map(function(item) {
                return {
                    id: item,  // Gunakan item sebagai id dan text
                    text: item
                };
            }),
            templateResult: formatSelect
        });
    }

    $("#btn-update").on( "click", function() {
        let reimbursement_status = $('#reimbursement_status').val();
        let totalpaid = $('#totalpaid').val();
        let ticketNo = $('#tiketno').val();
        let direct_superior = $("#directsuperior").val();
        let approvalremarks = $("#approvalremarks").val();
        let claim_type = $('#c_type_bst').val();

        update_data_approval_businesstrip(reimbursement_status, claim_type, totalpaid, ticketNo, direct_superior, approvalremarks)
    })

    function updateBusinessTripStatus(reimbursement_status, claim_type, totalpaid, ticketNo, direct_superior, approvalremarks) {
        var item = arrayBusinessTrip.find(obj => obj.ticketNo === ticketNo && obj.claimType === claim_type);

        if (item) {
            item.status = reimbursement_status;
            item.paidAmount = totalpaid;
            item.approvalRemarks = approvalremarks;

            table.clear().rows.add(arrayBusinessTrip).draw(false);
        }
    }

    function update_data_approval_businesstrip(reimbursement_status, claim_type, totalpaid, ticketNo, direct_superior, approvalremarks){
        $.ajax({
            url: "{{ url('trans/update_approvalbusinesstrip/table') }}",
            type: "get",
            data: {
                'status': reimbursement_status,
                'paidAmount': totalpaid,
                'ticketNo' : ticketNo,
                'employeeNo' : direct_superior,
                'approvalRemarks' : approvalremarks
            },
            success: function (response) {
                if (response.status == "true") {
                    $("#btn-update").prop("disabled", false);
                    $("#btn-update").html(
                        // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                        'Update'
                    );

                    $('.close').click();
                    
                    $('#notification_success').modal('show');
                    $('#message-notification-success').html(response
                        .message);

                    updateBusinessTripStatus(reimbursement_status, totalpaid, ticketNo, direct_superior, approvalremarks);

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
</script>
{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
</html>