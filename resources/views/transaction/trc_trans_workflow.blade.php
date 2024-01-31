<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_workflow.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <style type="text/css">
        .div-trans-workflow {
            max-width: 100%;
            margin: auto;
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
        .detailstatus input{
            outline: none;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="trans_workflow_form" method="post">
            @csrf
            <div class="div-trans-workflow">
                <div class="div-title">
                    <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_workflow.judul') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_from">{{ __('trans_workflow.label_claim_date_start') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                                placeholder="{{ __('trans_workflow.label_claim_date_start') }}" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="claim_date_to">{{ __('trans_workflow.label_claim_date_end') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                                placeholder="{{ __('trans_workflow.label_claim_date_end') }}" required>
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
                            <label for="business_unit">{{ __('trans_workflow.label_bu') }}</label>
                        </div>
                        <div class="input-group">
                            <select class="form-control select2" id="business_unit" name="business_unit" required></select>
                        </div>    
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="workflow_type">{{ __('trans_workflow.label_workflow_type') }}</label>
                        </div>
                        <div class="input-group">
                            <select class="form-control select2" id="workflow_type" name="workflow_type" required></select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="employee_no">{{ __('trans_workflow.employee') }}</label>
                        </div>
                        <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="employee-no">
                    </div>
                </div>
                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_workflow.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_workflow.btn_list') }}
                        </button>
                    </div>
                </div>
                <br>

                <!-- TABLE -->
                <div class="card">
                    <div class="row">
                        <div class="col-6">
                            <p><b>{{ __('trans_workflow.list_table') }}</b></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="workflow_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('trans_workflow.rdate') }}</th>
                                        <th>{{ __('trans_workflow.employee') }}</th>
                                        <th>{{ __('trans_workflow.ename') }}</th>
                                        <th>{{ __('trans_workflow.status') }}</th>
                                        <th>{{ __('trans_workflow.remarks') }}</th>
                                        <th>{{ __('trans_workflow.lduration') }}</th>
                                        <th>{{ __('trans_workflow.aby') }}</th>
                                        <th>{{ __('trans_workflow.tno') }}</th>
                                        <th>{{ __('trans_workflow.appremarks') }}</th>
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
                        <h4 class="modal-little">{{ __('trans_workflow.luser') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('trans_workflow.fname') }}</th>
                                    <th>{{ __('trans_workflow.employee') }}</th>
                                    <th>{{ __('trans_workflow.division') }}</th>
                                    <th>{{ __('trans_workflow.ranking') }}</th>
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
    <div class="modal fade" id="modal_list_detail">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-little">Detail Workflow</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="payroll_calculation_detail_modal_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <h6>Request Date</h6>
                            </div>
                            <div class="col-3">
                                <input type="hidden" class="form-control" id="reqdate" name="reqdate">
                                <input type="hidden" class="form-control" id="directsuperior" name="directsuperior">
                                <span id="reqdate_val"></span>
                            </div>
                            <div class="col-3">
                                <h6>Receipt Date</h6>
                            </div>
                            <div class="col-3">
                                <input id="recdate" name="recdate" type="hidden" class="form-control"><span id="recdate_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Ticket Number</h6>
                            </div>
                            <div class="col-3">
                                <input id="tiketno" name="tiketno" type="hidden" class="form-control"><span id="tiketno_val"></span>
                            </div>
                            <div class="col-3">
                                <h6>Status</h6>
                            </div>
                            <div class="col">
                                <input id="status" name="status" type="hidden" class="form-control"><span id="status_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Business Unit</h6>
                            </div>
                            <div class="col-3">
                                <input id="b_unit" name="b_unit" type="hidden" class="form-control"><span id="b_unit_val"></span>
                            </div>
                            <div class="col-3">
                                <h6>Total Claim </h6>
                            </div>
                            <div class="col-3">
                                <input id="c_type" name="c_type" type="hidden" class="form-control"><span id="c_type_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Dependent Name</h6>
                            </div>
                            <div class="col-3">
                                <input type="hidden" class="form-control" id="dependent" name="dependent"><span id="dependent_val"></span>
                            </div>
                        </div>
                    
                        <div class="row approve">
                            <div class="col-3">
                                <h5>Status</h5>
                            </div>
                            <div class="col-5">
                                    <select name="workflow_status" id="workflow_status" class="custom-select">
                                        <option value="APPROVED">APPROVE</option>
                                        <option value="REJECTED">REJECT</option>
                                        <option value="CANCELED">CANCEL</option>
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
                                <input id="approvalremarks" name="approvalremarks"  type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-block" id="btn-update" type="button">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_list_detail_leave">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-little">Detail Workflow</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form id="payroll_calculation_detail_modal_form" method="post">
                        @csrf
                        <input type="hidden" class="form-control" id="reqdate_leave" name="reqdate_leave">
                        <input type="hidden" class="form-control" id="directsuperior_leave" name="directsuperior_leave">
                        
                        <div class="row">
                            <div class="col-3">
                                <h6>Ticket Number</h6>
                            </div>
                            <div class="col-3">
                                <input id="tiketno_leave" name="tiketno_leave" type="hidden" class="form-control"><span id="tiketno_leave_val"></span>
                            </div>
                            <div class="col-3">
                                <h6>Status</h6>
                            </div>
                            <div class="col">
                                <input id="status_leave" name="status_leave" type="hidden" class="form-control"><span id="status_leave_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Employee No</h6>
                            </div>
                            <div class="col-3">
                                <input id="employee_no_leave" name="employee_no_leave" type="hidden" class="form-control"><span id="employee_no_leave_val"></span>
                            </div>
                            <div class="col-3">
                                <h6>Employee Name</h6>
                            </div>
                            <div class="col-3">
                                <input id="employee_name_leave" name="employee_name_leave" type="hidden" class="form-control"><span id="employee_name_leave_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Start Date</h6>
                            </div>
                            <div class="col-3">
                                <input id="start_date_leave" name="start_date_leave" type="hidden" class="form-control"><span id="start_date_leave_val"></span>
                            </div>
                            <div class="col-3">
                                <h6>End Date</h6>
                            </div>
                            <div class="col-3">
                                <input id="end_date_leave" name="end_date_leave" type="hidden" class="form-control"><span id="end_date_leave_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Workflow Type</h6>
                            </div>
                            <div class="col-3">
                                <input id="workflow_type_leave" name="workflow_type_leave" type="hidden" class="form-control"><span id="workflow_type_leave_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Leave Type</h6>
                            </div>
                            <div class="col-3">
                                <input id="leave_type_leave" name="leave_type_leave" type="hidden" class="form-control"><span id="leave_type_leave_val"></span>
                            </div>
                            <div class="col-3">
                                <h6>Leave Time</h6>
                            </div>
                            <div class="col-3">
                                <input id="leave_time_leave" name="leave_time_leave" type="hidden" class="form-control"><span id="leave_time_leave_val"></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <h6>Leave Remarks</h6>
                            </div>
                            <div class="col-3">
                                <input id="remarks_leave" name="remarks_leave" type="hidden" class="form-control"><span id="remarks_leave_val"></span>
                            </div>
                        </div>
                    
                        <div class="row approve">
                            <div class="col-3">
                                <h5>Status</h5>
                            </div>
                            <div class="col-5">
                                    <select name="workflow_status_leave" id="workflow_status_leave" class="custom-select">
                                        <option value="APPROVED">APPROVE</option>
                                        <option value="REJECTED">REJECT</option>
                                        <option value="CANCELED">CANCEL</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row approve">
                            <div class="col-3">
                                <h5>Approval Remarks</h5>
                            </div>
                            <div class="col-5">
                                <input id="approvalremarks_leave" name="approvalremarks_leave" type="text" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-block" id="btn-update-leave" type="button">Update</button>
                        </form>
                    </div>
                </div>
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
                        <span class="title-text-notification">{{ __('trans_workflow.alert_success') }}</span>
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

<script>
    const klikdetail = (element) => {
        let data;
        let type = $("#workflow_type").val();
        if(type == "ER"){
            $('#modal_list_detail').modal('show')
            data = table.row($(element).parents('tr')).data().permitEntity;

            $('#reqdate').val(data.createdBy)
            $('#reqdate_val').html(data.createdBy)
            $('#recdate').val(data.receiptDate)
            $('#recdate_val').html(data.receiptDate)
            $('#tiketno').val(data.ticketNo)
            $('#tiketno_val').html(data.ticketNo)
            $('#status').val(data.status)
            $('#status_val').html(data.status)
            $('#b_unit').val(data.businessUnit)
            $('#b_unit_val').html(data.businessUnit)
            $('#approvalremarks').val(data.approvalRemarks)
            $('#directsuperior').val(data.directSuperiorID)
        }else{
            $('#modal_list_detail_leave').modal('show')
            data = table.row($(element).parents('tr')).data().leaveEntity;

            $('#directsuperior_leave').val(data.directSuperiorID)
            $('#reqdate_leave').val(data.leaveDate)
            $('#tiketno_leave').val(data.ticketNo)
            $('#tiketno_leave_val').html(data.ticketNo)
            $('#status_leave').val(data.status)
            $('#status_leave_val').html(data.status)
            $('#employee_no_leave').html(data.employeeNo)
            $('#employee_no_leave_val').html(data.employeeNo)
            $('#employee_name_leave').html(data.fullnameRequester)
            $('#employee_name_leave_val').html(data.fullnameRequester)
            $('#start_date_leave').html(data.leaveDateFrom)
            $('#start_date_leave_val').html(new Date(data.leaveDateFrom).toISOString().split('T')[0])
            $('#end_date_leave').html(data.leaveDateTo)
            $('#end_date_leave_val').html(new Date(data.leaveDateTo).toISOString().split('T')[0])
            $('#workflow_type_leave').html('Leave')
            $('#workflow_type_leave_val').html('LEAVE')
            $('#leave_type_leave').html(data.leaveCode)
            $('#leave_type_leave_val').html(data.leaveName)
            $('#leave_time_leave').html(data.leaveTime)
            $('#leave_time_leave_val').html(data.dayDuration)
            $('#remarks_leave').html(data.leaveRemarks)
            $('#remarks_leave_val').html(data.leaveRemarks)
        }

        $('.close').click();
    }

    function load_data_workflow(claim_date_from, claim_date_to, employee_no,  business_unit, workflow_type) {
        
        if(workflow_type == "ER"){
            table = $('#workflow_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('trans/workflow/table') }}",
                    data: {
                        'startDate': claim_date_from,
                        'endDate': claim_date_to,
                        'employeeNo' : employee_no,
                        'businessUnit' : business_unit,
                        'workflowType' : workflow_type

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
                    {data: 'permitEntity.createdDate', name: 'createdDate', 
                                render: function (data, type, row) {
                                if (data == null){
                                    return '-'
                                }else {
                                    return moment(data).format('YYYY-MM-DD');
                                }
                            }
                    },
                    {data: 'permitEntity.employeeNo', name: 'permitEntity.employeeNo'},
                    {data: 'permitEntity.fullnameRequester', name: 'permitEntity.fullnameRequester'},
                    {data: 'permitEntity.status', name: 'permitEntity.status'},
                    {data: 'permitEntity.approvalRemarks', name: 'permitEntity.approvalRemarks'},
                    {data: 'permitEntity.time', name: 'permitEntity.time'},
                    {data: 'permitEntity.superiorFullname', name: 'permitEntity.superiorFullname'},
                    {data: 'permitEntity.ticketNo', name: 'permitEntity.ticketNo'},
                    {data: 'permitEntity.approvalRemarks', name: 'permitEntity.approvalRemarks'}
                ]
            });   
        }else{
            table = $('#workflow_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('trans/workflow/table') }}",
                    data: {
                        'startDate': claim_date_from,
                        'endDate': claim_date_to,
                        'employeeNo' : employee_no,
                        'businessUnit' : business_unit,
                        'workflowType' : workflow_type

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
                            return type === 'display'? '<button type="button" onclick="klikdetail(this)" class="btn btn-info" name="btn-detail" id="btn-detail" style="width: 100%;" data-toggle="modal" data-target="#modal_list_detail_leave"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/></svg> {{ __('trans_medical.detail') }} </button>' : '';
                        }
                    },
                    {data: 'leaveEntity.createdDate', name: 'createdDate', 
                            render: function (data, type, row) {
                            if (data == null){
                                return '-'
                            }else {
                                return moment(data).format('YYYY-MM-DD');
                            }
                        }
                    },
                    {data: 'leaveEntity.employeeNo', name: 'leaveEntity.employeeNo'},
                    {data: 'leaveEntity.fullnameRequester', name: 'leaveEntity.fullnameRequester'},
                    {data: 'leaveEntity.status', name: 'leaveEntity.status'},
                    {data: 'leaveEntity.approvalRemarks', name: 'leaveEntity.approvalRemarks'},
                    {data: 'leaveEntity.leaveDurationDepan', name: 'leaveEntity.leaveDurationDepan'},
                    {data: 'leaveEntity.createdBy', name: 'leaveEntity.createdBy'},
                    {data: 'leaveEntity.ticketNo', name: 'leaveEntity.ticketNo'},
                    {data: 'leaveEntity.approvalRemarks', name: 'leaveEntity.approvalRemarks'},
                ]
            });
        }
            // dari sini

        $("#btn-search").prop("disabled", true);
        $("#btn-search").html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'

        );
    

        $("#btn-search").prop("disabled", false);
        $("#btn-search").html(
            "<img src={{ url('icons/mob/button/button-search.svg') }} alt='export'> {{ __('trans_transport.btn_search') }}"
        );
    }

    $("#trans_workflow_form").submit((e)=>{
        e.preventDefault();

        var claim_date_from = $("#claim_date_from").val();
        var claim_date_to = $("#claim_date_to").val();
        var employee_no = $("#employee_no").val();
        var business_unit = $("#business_unit").val();
        var workflow_type = $("#workflow_type").val();
        
        $('#workflow_table').DataTable().destroy();
        load_data_workflow(claim_date_from, claim_date_to, employee_no,  business_unit, workflow_type);
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
    const klik = (element) => {
        let employee_id = $(element).parent().siblings('.sorting_1').text()

        $('#employee_no').val(employee_id)

        $('.close').click();
        // let fullname = $(element).parent().siblings('td').eq(1).text()
        // let division = $(element).parent().siblings('td').eq(2).text()
        // let rankingname = $(element).parent().siblings('td').eq(3).text()
        // alert(data1)
    }

    $('#btn-update').click(()=>{
        let workflow_status = $('#workflow_status').val();
        let totalpaid = $('#totalpaid').val();
        let ticketNo = $('#tiketno').val();
        let direct_superior = $("#directsuperior").val();
        let approvalremarks = $("#approvalremarks").val();
        // alert(totalpaid)
        // $('.close').click();
        $('#btn-update').prop("disabled", true);
        $('#btn-update').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );
        console.log(workflow_status);
        update_data(workflow_status,totalpaid,ticketNo,direct_superior,approvalremarks)
    })

    $('#btn-update-leave').click(()=>{
        let workflow_status = $('#workflow_status_leave').val();
        let ticketNo = $('#tiketno_leave').val();
        let direct_superior = $("#directsuperior_leave").val();
        let approvalremarks = $("#approvalremarks_leave").val();
        $('#btn-update').prop("disabled", true);
        $('#btn-update').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
        );

        update_data(workflow_status, ticketNo, direct_superior, approvalremarks)
    })

    function update_data(workflow_status, ticketNo, direct_superior, approvalremarks){
        $.ajax({
            url: "{{ url('trans/update_leave/table') }}",
            type: "get",
            data: {
                'status': workflow_status,
                'ticketNo' : ticketNo,
                'directSuperiorCode' : direct_superior,
                'approvalRemarks': approvalremarks
            },
            success: function (response) {
                if (response.status == "true") {
                    $("#btn-update").prop("disabled", false);
                    $("#btn-update").html(
                        // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_update") }}'
                        'Update'
                    );

                    $('#modal_list_detail_leave').modal('hide');
                    
                    $('#notification_success').modal('show');
                    $('#message-notification-success').html(response
                        .message);
                    setTimeout(function () {
                        window.location =
                            "{{ url('transaction/transaction_workflow') }}";
                    }, 3000);
                } else{
                    $("#btn-update").prop("disabled", false);
                    $("#btn-update").html(
                        // '<i class="fa fa-floppy-o"></i> {{ __("tm_update_absenteeism_data.btn_process") }}'
                        'Update'
                    );
                    
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response
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
<script type="text/javascript">

    loadDataBusinessUnit();
    loadDataWorkflowType();
    loadDataFirstLastAllBusinessUnit();
    
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
            function loadDataWorkflowType(){
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
                
                $('#workflow_type').select2({
                    width: '100%',
                    placeholder: 'Choose Workflow Type',
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
                        url: "{{ url('/workflow/api') }}",
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
    </script>
</html>