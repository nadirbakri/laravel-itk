<!DOCTYPE html>
<html>
<head>
    <title>{{ __('trans_attendance.judul') }}</title>
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css"> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
        {{-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
        {{-- <link  rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> --}}
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
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
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
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
        <form id="trans_attendance_form" method="post">
            @csrf
            <div class="div-trans-medical">
                <div class="div-title">
                    <a href="{{ url('transaction') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('trans_attendance.list') }}</span>
                    </a>
                </div>
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="claim_date_from form-check-label">{{ __('trans_transport.label_claim_date_start') }}</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="claim_date_from" name="claim_date_from"
                            placeholder="{{ __('trans_transport.label_claim_date_start') }}">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="claim_date_from_calendar"><span class="fa fa-calendar"></span></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="claim_date_from_hidden" name="claim_date_from_hidden" hidden>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        <label for="claim_date_to form-check-label">{{ __('trans_transport.label_claim_date_end') }}</label>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control" id="claim_date_to" name="claim_date_to"
                            placeholder="{{ __('trans_transport.label_claim_date_end') }}">
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
                            <label for="direct_superior form-check-label">Employee No</label>
                    </div>
                            <input type="text" class="form-control" id="direct_superior" name="direct_superior" placeholder="employee-no">
                </div>
            </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('trans_medical.btn_search') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_list_mass_leave">
                        <i class="fa fa-plus"></i> {{ __('trans_medical.btn_list') }}
                        </button>
                    </div>
                    {{-- <div class="col-3">
                        <button class="btn btn-primary" name="btn-list" id="btn-list" value="preview" style="width: 100%;">
                            <img src="{{ url('icons/mob/button/button-list.svg') }}" alt="export"> {{ __('trans_medical.btn_list') }}
                        </button>
                    </div> --}}
                </div>

                <!-- TABLE -->

            </form>
        </div>
        <br>
        <div class="card">
            <div class="row">
                    <p><b>{{ __('trans_attendance.list_table') }}</b></p>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table id="reimbursement_table" class="display table-striped table-hover dt-responsive display nowrap" cellspacing="10">
                        <thead>
                            <tr>
                                <th>Detail</th>
                                <th>Attendance Date</th>
                                <th>Employee No</th>
                                {{-- <th>Full Name</th> --}}
                                {{-- <th>Office Location</th> --}}
                                <th>Attendance Time In</th>
                                <th>Attendance Time Out</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal list --}}
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
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>User ID</th> --}}
                                    <th>Employee ID</th>
                                    <th>Full Name</th>
                                    <th>Division</th>
                                    <th>Ranking Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- <td>#</td>         --}}
                                    <td>
                                        
                                    </td>        
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
                                        <input id="reqdate" name="reqdate" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Receipt Date</h5>
                                    </div>
                                    <div class="col">
                                        <input id="recdate" name="recdate" style="border: none" style="outline: none"  type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Ticket Number</h5>
                                    </div>
                                    <div class="col">
                                        <input id="tiketno" name="tiketno" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Status</h5>
                                    </div>
                                    <div class="col">
                                        <input id="status" name="status" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Business Unit</h5>
                                    </div>
                                    <div class="col">
                                        <input id="b_unit" name="b_unit" style="border: none" style="outline: none"  type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Claim Type</h5>
                                    </div>
                                    <div class="col">
                                        <input id="c_type" name="c_type" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Employee Name</h5>
                                    </div>
                                    <div class="col">
                                        <input id="employeeno" name="employeeno" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Project Name</h5>
                                    </div>
                                    <div class="col">
                                        <input id="projectname" name="projectname" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>

                                <div class="row detailstatus">
                                    <div class="col-3">
                                        <h5>Total Claim</h5>
                                    </div>
                                    <div class="col">
                                        <input id="totalclaim" name="totalclaim" style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                    <div class="col-3">
                                        <h5>Dependent Name</h5>
                                    </div>
                                    <div class="col">
                                        <input style="border: none" style="outline: none" type="text" class="form-control" id="claim_date_from" name="claim_date_from">
                                    </div>
                                </div>
                            
                                <br>
                                <div class="row">
                                    <div class="col-3">
                                        <h5>Status</h5>
                                    </div>
                                    <div class="col-5">
                                            <select name="" id="reimbursement_status" class="custom-select">
                                                <option value="APPROVED">APPROVED</option>
                                                <option value="REJECTED">REJECTED</option>
                                                <option value="PAID">PAID</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <h5>Total Paid</h5>
                                    </div>
                                    <div class="col-5">
                                        <input id="totalpaid" name="totalpaid"  type="text" class="form-control" >
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
                        <span class="title-text-notification">{{ __('trans_medical.alert_success') }}</span>
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
        $('table.display').DataTable();
    });
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
     --}}
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
    $('#btn-update').click(()=>{
        let reimbursement_status = $('#reimbursement_status').val();
        let totalpaid = $('#totalpaid').val();
        let ticketNo = $('#tiketno').val();
        let direct_superior = $("#direct_superior").val();

        $('.close').click();
        update_data(reimbursement_status,totalpaid,ticketNo,direct_superior)
    })

    function update_data(reimbursement_status, totalpaid, ticketNo,direct_superior){
        $.ajax({
            url: "{{ url('trans/update/table') }}",
            type: "get",
            data: {
                'status': reimbursement_status,
                'totalPaidMonth': totalpaid,
                'ticketNo' : ticketNo,
                'employeeNo' : direct_superior
            },
            success: function (data) {
                console.log('sic');
                console.log(data);
                $('#btn-search').click();
            }, error: function (err) {
                console.log('err');
                console.log(err);
            }
        });
             
    }
</script>

<script type="text/javascript">
    function load_data_reimbursement(claim_date_from, claim_date_to, direct_superior, reimbursement_type, business_unit) {
            table = $('#reimbursement_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('trans/attendance/table') }}",
                    data: {
                        'startDate': claim_date_from,
                        'endDate': claim_date_to,
                        'employeeNo' : direct_superior

                    }
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lfrtip',
                'sPaginationType': 'ellipses',
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
                    {data: 'createDate', name: 'createDate', 
                            render: function (data, type, row) {
                            return moment(data).format('YYYY-MM-DD');
                        }
                    },
                    {data: 'employeeNo', name: 'employeeNo'},
                    {data: 'checkInDate', name: 'checkInDate',
                            render: function (data, type, row){
                            return moment(data).format('YYYY-MM-DD')
                            }
                    },
                    // {data: 'businessUnit', name: 'businessUnit'},
                    {data: 'checkOutDate', name: 'checkOutDate',
                            render: function (data, type, row){
                            return moment(data).format('YYYY-MM-DD')
                            }
                    },
                    {data: 'absenceType', name: 'absenceType'},
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

        $("#trans_attendance_form").submit((e)=>{
            e.preventDefault();

            var claim_date_from = $("#claim_date_from").val();
            var claim_date_to = $("#claim_date_to").val();
            var direct_superior = $("#direct_superior").val();
            var reimbursement_type = $("#reimbursement_type").val();
            var business_unit = $("#business_unit").val();

            // $("#btn-search").prop("disabled", true);
            // $("#btn-search").html(
            //     '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            // );

            $('#reimbursement_table').DataTable().destroy();
            load_data_reimbursement(claim_date_from, claim_date_to,direct_superior, reimbursement_type, business_unit);
    })

    const klikdetail = (element) => {
        let receiptDate = $(element).parent().siblings('.sorting_1').text()
        let reimbursement_status = $(element).parent().siblings('td').eq(1).text()
        let tikcetNo = $(element).parent().siblings('td').eq(2).text()
        let projectname = $(element).parent().siblings('td').eq(5).text()
        let employeename = $(element).parent().siblings('td').eq(3).text()
        let totalclaim = $(element).parent().siblings('td').eq(7).text()
        let totalpaid = $(element).parent().siblings('td').eq(9).text()
        var reimbursement_type = $("#reimbursement_type").val();
        var business_unit = $("#business_unit").val();

        $('#recdate').val(receiptDate)
        $('#reqdate').val(receiptDate)
        $('#status').val(reimbursement_status)
        $('#tiketno').val(tikcetNo)
        $('#b_unit').val(business_unit)
        $('#c_type').val(reimbursement_type)
        $('#employeeno').val(employeename)
        $('#projectname').val(projectname)
        $('#totalclaim').val(totalclaim)
        $('#totalpaid').val(totalpaid)
        // $('#direct_superior').val(employee_id)

        // alert(reimbursement_type);
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
            'sPaginationType': 'ellipses',
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

        $('#direct_superior').val(employee_id)

        $('.close').click();
        // let fullname = $(element).parent().siblings('td').eq(1).text()
        // let division = $(element).parent().siblings('td').eq(2).text()
        // let rankingname = $(element).parent().siblings('td').eq(3).text()
        // alert(data1)
    }

</script>

<script type="text/javascript">

    loadDataExportReimbrusement();
    loadDataFirstLastAllReimbursement();
    loadDataBusinessUnit();
    loadDataFirstLastAllBusinessUnit();
    // loadDataFirstLastAllReimbursmentType();
    
    $.get("{{ url('reimbursement_type/export/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#reimbursement_type').append("<option value=" + v.variable + ">" + v.value +
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
    
            
            function loadDataExportReimbrusement(){
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
                        url: "{{ url('/reimbursement_type/export/api') }}",
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
                    url: "{{ url('/reimbursement_type/all/api') }}",
                }).then(function (data) {
                    if (!$('#reimbursement_type').find('option:contains(' + data.value + ')').length) {
                        $('#reimbursement_type').append($('<option>').val(data.comGenCode).text(data.value));
                    }
                    $('#reimbursement_type').val(data.comGenCode);
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
                                search: params.term, 'levelType' : '1' 
    
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
    
           
    
        $('#reimbursement-table tbody').off('click', 'tr').on( 'click', 'tr', function () {                
            if ( $(this).hasClass('selected') ) { 
        $(this).removeClass('selected'); 
    } 
             else {
        table.$('tr.selected').removeClass('selected'); 
    }  
  });
    </script>
</html>