<!DOCTYPE html>
<html>
<head>
    <title>{{ __('data_employee_master.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/data_employee_master.css') }}"> 
    <style type="text/css">
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
    </style>
</head>

<body>
    <div class="div-form">
        <form id="master_data_employee_master" method="post">
            @csrf
            <div class="div-employee-master">
                <div class="div-title">
                    <a href="{{ route('master_data', ['moduleID' => 'MOB']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('data_employee_master.subjudul') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="status form-check-label">{{ __('data_employee_master.status') }}</label>
                        </div>
                        <input type="text" class="form-control" id="status" name="status" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="user_id form-check-label">{{ __('data_employee_master.userid') }}</label>
                        </div>
                        <input type="text" class="form-control" id="user_id" name="user_id" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="employee_no form-check-label">{{ __('data_employee_master.employeeno') }}</label>
                        </div>
                        <input type="text" class="form-control" id="employee_no" name="employee_no">
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="join_date form-check-label">{{ __('data_employee_master.label_claim_date_join') }}</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="join_date" name="join_date" readonly>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="join_date_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="join_date_hidden" name="join_date_hidden" hidden>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="company_code form-check-label">{{ __('data_employee_master.companycode') }}</label>
                        </div>
                        <input type="text" class="form-control" id="company_code" name="company_code" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="office_location form-check-label">{{ __('data_employee_master.location') }}</label>
                        </div>
                        <input type="text" class="form-control" id="office_location" name="office_location" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="full_name form-check-label">{{ __('data_employee_master.name') }}</label>
                        </div>
                        <input type="text" class="form-control" id="full_name" name="full_name" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="phone form-check-label">{{ __('data_employee_master.phone') }}</label>
                        </div>
                        <input type="text" class="form-control" id="phone" name="phone" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="personal_email form-check-label">{{ __('data_employee_master.personal_email') }}</label>
                        </div>
                        <input type="text" class="form-control" id="personal_email" name="personal_email" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="company_email form-check-label">{{ __('data_employee_master.company_email') }}</label>
                        </div>
                        <input type="text" class="form-control" id="company_email" name="company_email" readonly>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="address form-check-label">{{ __('data_employee_master.address') }}</label>
                        </div>
                        <textarea rows="3" class="form-control" id="address" name="address" readonly></textarea>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="division form-check-label">{{ __('data_employee_master.division') }}</label>
                        </div>
                        <input type="text" class="form-control" id="division" name="division" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="ranking form-check-label">{{ __('data_employee_master.ranking') }}</label>
                        </div>
                        <input type="text" class="form-control" id="ranking" name="ranking" readonly>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="row mt-5">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#employee_leave" aria-expanded="true" aria-controls="employee_leave">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="employee_leave" class="collapse m-3">
                                <div class="card-block">
                                    <table id="leave_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Leave Type</th>
                                                <th>Leave Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_employee_leave_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#employee_plafon" aria-expanded="true" aria-controls="employee_plafon">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee1') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="employee_plafon" class="collapse m-3">
                                <div class="card-block">
                                    <table id="plafon_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Reimbursement Type</th>
                                                <th>Reimbursement Plafon Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_employee_plafon_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#dependent_list" aria-expanded="true" aria-controls="dependent_list">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee2') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="dependent_list" class="collapse m-3">
                                <div class="card-block">
                                    <table id="dependent_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Relation</th>
                                                <th>Dependant Name</th>
                                                <th>Date of Birth</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_dependent_table">
                                        </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#permit_approval" aria-expanded="true" aria-controls="permit_approval">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee3') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="permit_approval" class="collapse m-3">
                                <div class="card-block">
                                    <table id="permit_approval_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Group</th>
                                                <th>Approval</th>
                                                <th>Employee Supervisor Group</th>
                                                <th>Supervisor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_permit_approval_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#leave_approval" aria-expanded="true" aria-controls="leave_approval">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee4') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="leave_approval" class="collapse m-3">
                                <div class="card-block">
                                    <table id="leave_approval_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Group</th>
                                                <th>Approval</th>
                                                <th>Employee Supervisor Group</th>
                                                <th>Supervisor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_leave_approval_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#overtime_approval" aria-expanded="true" aria-controls="overtime_approval">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee5') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="overtime_approval" class="collapse m-3">
                                <div class="card-block">
                                    <table id="overtime_approval_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Group</th>
                                                <th>Approval</th>
                                                <th>Employee Supervisor Group</th>
                                                <th>Supervisor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_overtime_approval_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#reimbursement_approval" aria-expanded="true" aria-controls="reimbursement_approval">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee6') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="reimbursement_approval" class="collapse m-3">
                                <div class="card-block">
                                    <table id="reimbursement_approval_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Group</th>
                                                <th>Approval</th>
                                                <th>Employee Supervisor Group</th>
                                                <th>Supervisor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_reimbursement_approval_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#business_trip_approval" aria-expanded="true" aria-controls="business_trip_approval">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee7') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="business_trip_approval" class="collapse m-3">
                                <div class="card-block">
                                    <table id="business_trip_approval_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Group</th>
                                                <th>Approval</th>
                                                <th>Employee Supervisor Group</th>
                                                <th>Supervisor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_business_trip_approval_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <div class="card" style="display: block">
                            <a class="collapsed" data-toggle="collapse" href="#multiple_checkin_approval" aria-expanded="true" aria-controls="multiple_checkin_approval">
                                <div class="card-header">
                                    <div class="div-dropdown-title">
                                        <span class="dropdown-title-text">{{ __('data_employee_master.formemployee8') }}</span>
                                        <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                    </div>
                                </div>
                            </a>
                            <div id="multiple_checkin_approval" class="collapse m-3">
                                <div class="card-block">
                                    <table id="multiple_checkin_approval_table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Group</th>
                                                <th>Approval</th>
                                                <th>Employee Supervisor Group</th>
                                                <th>Supervisor Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body_multiple_checkin_approval_table">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <!-- <button type="button" class="btn btn-primary" name="btn-save" id="btn-save" value="save">
                        {{ __('data_employee_master.btn_save') }}
                    </button> -->
                    <div class="col-3">
                        <button type="button" class="btn btn-outline-secondary" name="btn-cancel" id="btn-cancel" style="width: 100%;"
                            onClick="window.location.reload();">
                            {{ __('data_employee_master.btn_cancel') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list" style="width: 100%;"
                            data-toggle="modal" data-target="#modal_list">
                            {{ __('data_employee_master.btn_list') }}
                        </button>
                    </div>
                    <!-- <button type="button" class="btn btn-primary" name="btn-reset" id="btn-reset" value="reset password">
                        Reset Password
                    </button>
                    <button type="button" class="btn btn-primary" name="btn-active" id="btn-active" value="active">
                        Active
                    </button>
                    <button type="button" class="btn btn-primary" name="btn-deactive" id="btn-deactive" value="deactive">
                        Deactive
                    </button>
                    <button type="button" class="btn btn-primary" name="btn-invoice" id="btn-invoice" value="invoice">
                        Invoice
                    </button>
                    <button type="button" class="btn btn-primary" name="btn-export" id="btn-export" value="export">
                        Export Emp
                    </button> -->
                </div>
            </div>
        </form>
    </div>

    {{-- modal btn-list --}}
    <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            @csrf
            <div class="modal fade" id="modal_list">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">List User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee No</th>
                                    <th>Full Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>        
                                    <td></td>        
                                    <td></td>       
                                </tr>
                            </tbody>
                        </table>
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
                        <span class="title-text-notification">{{ __('trans_mass_leave.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
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
        
    $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "{{ url('master_data/employee_list/table') }}"             
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
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    });

    const klik = (element) => {
        let data = table2.row($(element).parent()).data();
        $.ajax({
            type: 'GET',
            url: "{{ url('/master_data/employee_master/get') }}",
            data: {
                'employeeNo': data.employeeNo
            }
        }).then(function (data) {
            $('#status').val(data[0].recordStatus);
            $('#user_id').val(data[0].userID);
            $('#employee_no').val(data[0].employeeNo);
            $('#full_name').val(data[0].fullName);
            $('#phone').val(data[0].personalPhone);
            $('#company_code').val(data[0].companyName);
            $('#address').val(data[0].homeAddress);
            $('#office_location').val(data[0].officeLocation);
            $('#join_date').val(moment(data[0].joinDate).format('YYYY-MM-DD'));
            $('#personel_email').val(data[0].personalEmail);
            $('#company_email').val(data[0].companyEmail);
            $('#division').val(data[0].division);
            $('#ranking').val(data[0].rankingCode);
            $('#employee_no').prop('readonly', true);

            if(data[0].peMasterFamily.length > 0){
                $('#body_dependent_table').append('');
            }else{
                $('#body_dependent_table').append(
                    '<tr><td colspan="6" style="text-align: center;">No Data</td></tr>'
                );
            }

            if(data[0].pePlafon.length > 0){
                $('#body_plafon_table').append('');
            }else{
                $('#body_plafon_table').append(
                    '<tr><td colspan="3" style="text-align: center;">No Data</td></tr>'
                );
            }

            if(data[0].peMasterLeave != null){
                $('#body_leave_table').append('');
            }else{
                $('#body_leave_table').append(
                    '<tr><td colspan="3" style="text-align: center;">No Data</td></tr>'
                );
            }
        });

        $('.close').click();
    }

    $('#employee_no').blur(function () {
        if($(this).val() != null && $(this).val() != ''){
            $.ajax({
                type: 'GET',
                url: "{{ url('/master_data/employee_master/get') }}",
                data: {
                    'employeeNo': $(this).val()
                }
            }).then(function (data) {
                $('#status').val(data[0].recordStatus);
                $('#user_id').val(data[0].userID);
                $('#employee_no').val(data[0].employeeNo);
                $('#full_name').val(data[0].fullName);
                $('#phone').val(data[0].personalPhone);
                $('#company_code').val(data[0].companyName);
                $('#address').val(data[0].homeAddress);
                $('#office_location').val(data[0].officeLocation);
                $('#join_date').val(moment(data[0].joinDate).format('YYYY-MM-DD'));
                $('#personel_email').val(data[0].personalEmail);
                $('#company_email').val(data[0].companyEmail);
                $('#division').val(data[0].division);
                $('#ranking').val(data[0].rankingCode);
                $('#employee_no').prop('readonly', true);

                if(data[0].peMasterFamily.length > 0){
                    $('#body_dependent_table').append('');
                }else{
                    $('#body_dependent_table').append(
                        '<tr><td colspan="6" style="text-align: center;">No Data</td></tr>'
                    );
                }

                if(data[0].pePlafon.length > 0){
                    $('#body_plafon_table').append('');
                }else{
                    $('#body_plafon_table').append(
                        '<tr><td colspan="3" style="text-align: center;">No Data</td></tr>'
                    );
                }

                if(data[0].peMasterLeave != null){
                    $('#body_leave_table').append('');
                }else{
                    $('#body_leave_table').append(
                        '<tr><td colspan="3" style="text-align: center;">No Data</td></tr>'
                    );
                }
            });
        }
    });
</script>

</html>