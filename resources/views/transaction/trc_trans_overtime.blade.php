<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_overtime.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link  rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
        .div-trans-overtime {
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
            font-size: 14px;
        }

        .detailstatus input{
            outline: none;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="trans_overtime_form" method="post">
            @csrf
            <div class="div-trans-overtime">
                <div class="div-title">
                    <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_overtime.judul') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from form-check-label">{{ __('trans_overtime.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_overtime.label_claim_date_start') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to form-check-label">{{ __('trans_overtime.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_overtime.label_claim_date_end') }}">
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
                            <label for="business_unit form-check-label">{{ __('trans_overtime.label_bu') }}</label>
                        </div>
                        <select class="form-control select2" id="business_unit" name="business_unit"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                                <label for="direct_superior form-check-label">{{ __('trans_overtime.employee') }}</label>
                        </div>
                                <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="employee-no">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="overtime_status form-check-label">{{ __('trans_overtime.label_overtime_status') }}</label>
                        </div>
                        <select class="form-control select2" id="overtime_status" name="overtime_status"></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="reimbursement_type form-check-label">{{ __('trans_overtime.label_reimbursement_type') }}</label>
                        </div>
                        <select class="form-control select2" id="reimbursement_type" name="reimbursement_type"></select>
                    </div>
                </div>
                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_overtime.btn_search') }}
                        </button>
                    </div>
                    {{-- <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-upload" id="btn-upload"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_upload">
                        <i class="fa fa-plus"></i>{{ __('trans_overtime.btn_upload') }}
                        </button>
                    </div> --}}
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_overtime.btn_list') }}
                        </button>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="card">

                    <div class="row">
                        <div class="col-6">
                            <p>{{ __('trans_overtime.list_table') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="overtime_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                       <th>{{ __('trans_overtime.detail') }}</th>
                                       <th>{{ __('trans_overtime.name') }}</th>
                                       <th>{{ __('trans_overtime.status') }}</th>
                                       <th>{{ __('trans_overtime.tnom') }}</th>
                                       <th>{{ __('trans_overtime.pname') }}</th>
                                       <th>{{ __('trans_overtime.odate') }}</th>
                                       <th>{{ __('trans_overtime.ohourfrom') }}</th>
                                       <th>{{ __('trans_overtime.ohourto') }}</th>
                                       <th>{{ __('trans_overtime.ohourremarks') }}</th>
                                       <th>{{ __('trans_overtime.cname') }}</th>
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
                        <h4 class="modal-little">{{ __('trans_overtime.luser') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('trans_overtime.employee') }}</th>
                                    <th>{{ __('trans_overtime.fname') }}</th>
                                    <th>{{ __('trans_overtime.division') }}</th>
                                    <th>{{ __('trans_overtime.ranking') }}</th>
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
        </form>
    </div>

    <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list_detail">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">{{ __('trans_overtime.dreimbursement') }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row detailstatus">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="request_date" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_request_date') }}</label>
                                        <h5 id="request_date"></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="overtime_date" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_overtime_date') }}</label>
                                        <h5 id="overtime_date"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ticket_no" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_ticket_no') }}</label>
                                        <h5 id="ticket_no"></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="status" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_status') }}</label>
                                        <h5 id="status"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="employee_name" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_employee_name') }}</label>
                                        <h5 id="employee_name"></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="business_unit" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_business_unit') }}</label>
                                        <h5 id="business_unit"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="start_date" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_start_date') }}</label>
                                        <h5 id="start_date"></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="actual_overtime" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_actual_overtime') }}</label>
                                        <h5 id="actual_overtime"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="end_date" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_end_date') }}</label>
                                        <h5 id="end_date"></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="next_day" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_next_day') }}</label>
                                        <h5 id="next_day"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="task_name" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_task_name') }}</label>
                                        <h5 id="task_name"></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="location" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_location') }}</label>
                                        <h5 id="location"></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row detailstatus">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="description" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_description') }}</label>
                                        <h5 id="description"></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="customer" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_customer') }}</label>
                                        <h5 id="customer"></h5>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="overtime_status" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_status') }}</label>
                                        <select name="overtime_status" id="overtime_status" class="custom-select">
                                            <option value="APPROVED">{{ __('trans_overtime.approve') }}</option>
                                            <option value="REJECTED">{{ __('trans_overtime.reject') }}</option>
                                            <option value="PAID">{{ __('trans_overtime.paid') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="last_approval_date" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_last_approval_date') }}</label>
                                        <input type="text" name="last_approval_date" id="last_approval_date" class="form-control" readonly>
                                        <input type="hidden" name="overtime_ticket_no" id="overtime_ticket_no" class="form-control" value="">
                                        <input type="hidden" name="direct_superior" id="direct_superior" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="approval_remarks" style="color: gray; margin-bottom: 0;">{{ __('trans_overtime.label_approval_remarks') }}</label>
                                        <textarea name="approval_remarks" id="approval_remarks" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-update" class="btn btn-primary w-25">{{ __('trans_overtime.btn_save') }}</button>
                            <button type="button" class="btn btn-outline-primary w-25" data-dismiss="modal">{{ __('trans_overtime.btn_cancel') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="div-form">
        <form id="upload_paid_overtime_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="modal_upload">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">{{ __('trans_overtime.upaidovt') }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <div class="card">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="medical_history form-check-label"><b>{{ __('trans_overtime.fovt') }}</b></label>
                                            <input type="file" name="file_overtime" id="file_overtime">
                                        <br> <br>
                                        <button type="submit" class="btn btn-process" name="btn-process" id="btn-process">
                                            {{ __('trans_overtime.btn_upload') }}
                                        </button>
                                    </div>
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
                        <span class="title-text-notification">{{ __('trans_overtime.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
        $('table.display').DataTable({
            scrollX: true,
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
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
    function load_data_overtime(claim_date_from, claim_date_to, business_unit, direct_superior, reimbursement_type, status) {
            table = $('#overtime_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('trans/overtime/table') }}",
                    data: {
                        'startDate': claim_date_from,
                        'endDate': claim_date_to,
                        'employeeNo' : direct_superior,
                        'businessUnit' : business_unit,
                        'type': reimbursement_type,
                        'status' : status

                    }
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
                            return type === 'display'? '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' : '';
                        }
                    },
                    // {data: 'overtimeEntity.requestDate', name: 'requestDate', 
                    //         render: function (data, type, row) {
                    //         return moment(data).format('YYYY-MM-DD');
                    //     }
                    // },
                    {data: 'overtimeEntity.fullnameRequester', name: 'overtimeEntity.fullnameRequester'},
                    {data: 'overtimeEntity.status', name: 'overtimeEntity.status'},
                    {data: 'overtimeEntity.ticketNo', name: 'overtimeEntity.ticketNo'},
                    {data: 'overtimeEntity.projectName', name: 'overtimeEntity.projectName'},
                    {data: 'overtimeEntity.overtimeDate', name: 'overtimeEntity.overtimeDate', 
                            render: function (data, type, row){
                            return moment(data).format('YYYY-MM-DD');
                            }
                    },
                    {data: 'overtimeEntity.overtimeHourFrom', name: 'overtimeEntity.overtimeHourFrom',
                            render: function (data, type, row){
                                return moment(data).format('HH-MM-SS')
                            }
                },
                    {data: 'overtimeEntity.overtimeHourTo', name: 'overtimeEntity.overtimeHourTo',
                            render: function (data, type, row){
                                return moment(data).format('HH-MM-SS')
                            }
                },
                    {data: 'overtimeEntity.overtimeRemarks', name: 'overtimeEntity.overtimeRemarks'},
                    {data: 'overtimeEntity.customerName', name: 'overtimeEntity.customerName'},
                    // {data: 'overtimeEntity.', name: ''},
                    // {
                    //     data: 'leaveBalanceBeforeExpiredDate', 
                    //     name: 'leaveBalanceBeforeExpiredDate',
                    //     render: function (data, type, row) {
                    //         return moment(data).format('DD-MMM-YYYY');
                    //     }
                    // }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
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

        $("#trans_overtime_form").submit((e)=>{
            e.preventDefault();

            var claim_date_from = $("#claim_date_from").val();
            var claim_date_to = $("#claim_date_to").val();
            var direct_superior = $("#direct_superior").val();
            var business_unit = $("#business_unit").val();
            var reimbursement_type = $("#reimbursement_type").val();
            var status = $("#overtime_status").val();
           
            // $("#btn-search").prop("disabled", true);
            // $("#btn-search").html(
            //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            // );

            $('#overtime_table').DataTable().destroy();
            load_data_overtime(claim_date_from, claim_date_to, business_unit, direct_superior, reimbursement_type, status);
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
                        return type === 'display'? '<button type="button"  onclick="klik(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
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
        var data = table.row($(element).parents('tr')).data().overtimeEntity;
        var duration = moment.duration(data.ovtDuration)

        $('#request_date').html(moment(data.createdDate).format('YYYY-MM-DD'))
        $('#overtime_date').html(moment(data.overtimeDate).format('YYYY-MM-DD'))
        $('#ticket_no').html(data.ticketNo)
        $('#status').html(data.status)
        $('#employee_name').html(data.fullnameRequester)
        $('#business_unit').html(data.businessUnit)
        $('#start_date').html(moment(data.overtimeHourFrom).format('YYYY-MM-DD') + ', ' + moment(data.overtimeHourFrom).format('HH.mm'))
        $('#actual_overtime').html(duration.hours() + ' hours ' + duration.minutes() + ' minutes')
        $('#end_date').html(moment(data.overtimeHourTo).format('YYYY-MM-DD') + ', ' + moment(data.overtimeHourTo).format('HH.mm'))
        $('#next_day').html(data.isNext)
        $('#task_name').html(data.projectName)
        $('#location').html(data.locationCode)
        $('#description').html(data.overtimeRemarks)
        $('#customer').html(data.customerName)
        $('#overtime_status').val(data.status).trigger('chnage')
        $('#last_approval_date').val(moment().format('YYYY-MM-DD'))
        $('#approval_remarks').val(data.approvalRemarks)

        // $('#totalclaim').val(totalclaim)
        // $('#totalpaid').val(totalpaid)
        // $('#direct_superior').val(employee_id)

        // alert(reimbursement_type);
    }

    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text()

        $('#direct_superior').val(employee_id)

        $('.close').click();
        
        // let fullname = $(element).parent().siblings('td').eq(1).text()
        // let division = $(element).parent().siblings('td').eq(2).text()
        // let rankingname = $(element).parent().siblings('td').eq(3).text()
        // alert(data1)
    }

</script>
<script>
    $('#btn-update').click(()=>{
        let status = $('#overtime_status').val();
        // let totalpaid = $('#totalpaid').val();
        let ticketNo = $('#overtime_ticket_no').val();
        let directSuperior = $("#direct_superior").val();
        let approvalRemarks = $("#approval_remarks").val();

        $('.close').click();
        update_data(status, ticketNo, directSuperior, approvalRemarks)
    })

    function update_data(status, ticketNo, directSuperior, approvalRemarks){
        $.ajax({
            url: "{{ url('trans/update_overtime/table') }}",
            type: "get",
            data: {
                'status': status,
                // 'paidAmount': totalpaid,
                'ticketNo' : ticketNo,
                'directSuperior' : directSuperior,
                'approvalRemarks' : approvalRemarks
            },
            success: function (response) {
                // console.log(response);
                           if (response.status == "true") {
                               $("#btn-update").prop("disabled", false);
                               $("#btn-update").html(
                                   // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                                   'Update'
                               );
                               
                               $('#notification_success').modal('show');
                               $('#message-notification-success').html(response
                                   .message);
                               setTimeout(function () {
                                   window.location =
                                       "{{ url('transaction/transaction_overtime') }}";
                               }, 3000);
                           } else{
                            $("#btn-update").prop("disabled", false);
                               $("#btn-update").html(
                                   // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                                   'Update'
                               );
                               
                               $('#notification_update_data_fail').modal('show');
                               $('#message-notification-update-data-fail').html(response
                                   .message);
                               setTimeout(function () {
                                   window.location =
                                       "{{ url('transaction/transaction_overtime') }}";
                               }, 3000);
                           }
                       },

                    //            $("#btn-update").prop("disabled", false);
                    //            $("#btn-update").html(
                    //                // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                    //                'Update'
                    //            );
                               
                    //            $('#notification_error').modal('show');
                    //            $('#message-notification-error').html(response
                    //                .message);
                    //            setTimeout(function () {
                    //                window.location =
                    //                    "{{ url('transaction/transaction_overtime') }}";
                    //            }, 3000);
                    //        }
                    //    },
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
<script>
    $("#btn-process").click(function () {
           $(this).prop("disabled", true);
           $(this).html(
               '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
           );
           $("#upload_paid_overtime_form").submit();
       });

       $('#notification_success').on('hide.bs.modal', function () {
           window.location = "{{ url('transaction/transaction_overtime') }}";
       });

       if ($("#upload_paid_overtime_form").length > 0) {
           $("#upload_paid_overtime_form").validate({
               submitHandler: function (form) {
                   $.ajaxSetup({
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                   });
                   var myForm = document.getElementById('upload_paid_overtime_form');
                   var formdata = new FormData(myForm);
                   
                   $.ajax({
                       url: "{{ url('transaction/update_overtime/import') }}",
                       type: "POST",
                       processData: false,
                       contentType: false,
                       data: formdata,
                       success: function (response) {
                           if (response[0].status == "true") {
                               $("#btn-process").prop("disabled", false);
                               $("#btn-process").html(
                                   // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                                   'Update'
                               );
                               
                               $('#notification_success').modal('show');
                               $('#message-notification-success').html(response[0]
                                   .message);
                               setTimeout(function () {
                                   window.location =
                                       "{{ url('transaction/transaction_overtime') }}";
                               }, 3000);
                           } else {
                               $("#btn-process").prop("disabled", false);
                               $("#btn-process").html(
                                   // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                                   'Update'
                               );

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
                           $("#btn-process").html(
                               // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                               'Update'
                           );

                           $('#notification_error').modal('show');
                           $('#message-notification-error').html(response);
                       }
                   });
               }
           })
       }
</script>
<script type="text/javascript">

    loadDataExportOvertime();
    loadDataFirstLastAllOvertime();
    loadDataBusinessUnit();
    loadDataFirstLastAllBusinessUnit();
    loadDataStatus();
    loadDataFirstLastAllStatus();
    
        $.get("{{ url('reimbursement_type/overtime/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#reimbursement_type').append("<option value=" + v.comGenCode + ">" + v.value +
                    "</option>");
            });
        });

        $.get("{{ url('level/api') }}", function (data) {      
            $.each(data, function (k, v) {
                $('#business_unit').append("<option value=" + v.levelCode + ">" + v.levelName +
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

        function loadDataExportOvertime(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data.value + '<div>' +
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
                    url: "{{ url('/reimbursement_type/overtime/api') }}",
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
        
        
        function loadDataBusinessUnit(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data.levelName + '<div>' +
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
                    url: "{{ url('/level/api') }}",
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
                                    text: item.levelName,
                                    id: item.levelCode,
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

        function loadDataFirstLastAllBusinessUnit () {
            $('#business_unit').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/level/func/api') }}",
            }).then(function (data) {
                if (!$('#business_unit').find('option:contains(' + data.levelName + ')').length) {
                    $('#business_unit').append($('<option>').val(data.levelCode).text(data.levelName));
                }
                $('#business_unit').val(data.levelCode);
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
                        '<div class="col-6">' + data.data.value + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            $('#overtime_status').select2({
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
                        var filteredData = data.filter(function (item) {
                            var allowedStatuses = ["NEW", "APPROVED", "CANCELED", "PARTIAL APPROVED", "REJECTED"];
                            return allowedStatuses.includes(item.value);
                        });

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
            $('#overtime_status').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/status_trans/api') }}",
            }).then(function (data) {
                $('#overtime_status').prepend($('<option>').val('ALL').text('ALL'));
                $('#overtime_status option:contains("ALL")').not(':first').remove();
                $('#overtime_status').val('ALL');
                $('#overtime_status').removeClass('spinner-border');
            });
        }
        
        function loadDataFirstLastAllOvertime() {
            $('#reimbursement_type').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/reimbursement_type/overtime_all/api') }}",
            }).then(function (data) {
                if (!$('#reimbursement_type').find('option:contains(' + data.value + ')').length) {
                    $('#reimbursement_type').append($('<option>').val(data.comGenCode).text(data.value));
                }
                $('#reimbursement_type').val(data.comGenCode);
                $('#reimbursement_type').removeClass('loading');
            });
        }

        $("#btn-preview").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#export_overtime_form").submit();
        });

        if ($("#export_overtime_form").length > 0) {
            $("#export_overtime_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        xhrFields: {
                            responseType: 'blob',
                        }, 
                        url: "{{ url('export/export_overtime/print') }}",
                        type: "POST",
                        data: $('#export_overtime_form').serialize(),
                        success: function (result, status, xhr) {
                            $("#btn-preview").prop("disabled", false);
                            $("#btn-preview").html(
                                '<i class="fa fa-print"></i> {{ __("personel_employee_list.btn_print") }}'
                            );
                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] :
                                'audit_trail.xlsx');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (response) {
                            $("#btn-preview").prop("disabled", false);
                            $("#btn-preview").html(
                                '<i class="fa fa-print"></i> {{ __("personel_employee_list.btn_print") }}'
                            );
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }
    
    
    </script>

</html>