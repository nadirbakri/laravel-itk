<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_time_recording_reference.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/time_management_detail.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">

    <style type="text/css">
        .div-time_management {
            max-width: 97%;
            margin: auto;
            margin-top: 1%;
        }

        table {
            border-collapse: collapse; 
        }

        th, td {
            padding: 5px;
        }

        .loading {
            background-color: #ffffff;
            background-image: url("https://c.tenor.com/tEBoZu1ISJ8AAAAC/spinning-loading.gif");
            background-size: 60px 40px;
            background-position: right center;
            background-repeat: no-repeat;
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
            border-bottom:1px solid #eee;
            background-color: #00a862;
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>

</head>

<body>
    <div class="div-time_management">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover"
                    alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover"
                    alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover"
                    alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover"
                    alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover"
                    alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)" style="display: none;" id="toolbar-cancel">
                <img src="{{ url('/icons/functionbar/x.svg') }}" alt="Cancel">
                <img src="{{ url('/icons/functionbar/x.svg') }}" class="functionbar-hover"
                    alt="Cancel">
                <span>Cancel</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-active">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover"
                    alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" style="display: none;" href="javascript:void(0)" id="toolbar-deactive">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover"
                    alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover"
                    alt="List">
                <span>List</span>
            </a>
        </div>
        <div class="div-title">
            <a href="{{ url('time_management') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_time_recording_reference.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <form id="time_recording_reference_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="in_code">{{ __('tm_time_recording_reference.label_in_code') }}</label>
                            <input type="text" class="form-control" id="in_code" name="in_code" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="out_code">{{ __('tm_time_recording_reference.label_out_code') }}</label>
                            <input type="text" class="form-control" id="out_code" name="out_code" readonly>
                        </div>
                    </div>
                </div>
                <div class="div-table">
                    <table id="time_recording_reference_table" class="table hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Employee No</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Day</th>
                                <th>Hour</th>
                                <th>Minute</th>
                                <th>Flag</th>
                                <th>Machine Code</th>
                                <th>Shift</th>
                                <th>In/Out Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Start Index</td>
                                <td><input type="number" class="form-control" id="employee_no_start" name="employee_no_start" readonly></td>
                                <td><input type="number" class="form-control" id="year_start" name="year_start" readonly></td>
                                <td><input type="number" class="form-control" id="month_start" name="month_start" readonly></td>
                                <td><input type="number" class="form-control" id="day_start" name="day_start" readonly></td>
                                <td><input type="number" class="form-control" id="hour_start" name="hour_start" readonly></td>
                                <td><input type="number" class="form-control" id="minute_start" name="minute_start" readonly></td>
                                <td><input type="number" class="form-control" id="flag_start" name="flag_start" readonly></td>
                                <td><input type="number" class="form-control" id="machine_code_start" name="machine_code_start" readonly></td>
                                <td><input type="number" class="form-control" id="shift_start" name="shift_start" readonly></td>
                                <td><input type="number" class="form-control" id="in_out_code_start" name="in_out_code_start" readonly></td>
                            </tr>
                            <tr><br></tr>
                            <tr>
                                <td>Length digit</td>
                                <td><input type="number" class="form-control" id="employee_no_long" name="employee_no_long" readonly></td>
                                <td><input type="number" class="form-control" id="year_long" name="year_long" readonly></td>
                                <td><input type="number" class="form-control" id="month_long" name="month_long" readonly></td>
                                <td><input type="number" class="form-control" id="day_long" name="day_long" readonly></td>
                                <td><input type="number" class="form-control" id="hour_long" name="hour_long" readonly></td>
                                <td><input type="number" class="form-control" id="minute_long" name="minute_long" readonly></td>
                                <td><input type="number" class="form-control" id="flag_long" name="flag_long" readonly></td>
                                <td><input type="number" class="form-control" id="machine_code_long" name="machine_code_long" readonly></td>
                                <td><input type="number" class="form-control" id="shift_long" name="shift_long" readonly></td>
                                <td><input type="number" class="form-control" id="in_out_code_long" name="in_out_code_long" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>&nbsp;</div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="time_in_record">{{ __('tm_time_recording_reference.label_time_in_record') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="time_in_record_earliest"
                                    name="radiobtn1" value="E" checked>
                                <label class="form-check-label"
                                    for="time_in_record_earliest">{{ __('tm_time_recording_reference.label_earliest') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="time_in_record_latest"
                                    name="radiobtn1" value="L">
                                <label class="form-check-label"
                                    for="time_in_record_latest">{{ __('tm_time_recording_reference.label_latest') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="time_out_record">{{ __('tm_time_recording_reference.label_time_out_record') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="time_out_record_earliest"
                                    name="radiobtn2" value="E">
                                <label class="form-check-label"
                                    for="time_out_record_earliest">{{ __('tm_time_recording_reference.label_earliest') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="time_out_record_latest"
                                    name="radiobtn2" value="L" checked>
                                <label class="form-check-label"
                                    for="time_out_record_latest">{{ __('tm_time_recording_reference.label_latest') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                        <span class="title-text-notification">{{ __('tm_time_recording_reference.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script text="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var isData = 0;

        $.ajax({
            url: "{{ url('/time_management/time_recording_reference/table') }}",
            type: "GET",
            success: function (response) {
                isData = Object.keys(response).length;            
                if (Object.keys(response).length !== 0) {
                    $('#in_code').val((typeof response[0].inCode !== 'undefined') ? response[0].inCode : '');
                    $('#out_code').val((typeof response[0].outCode !== 'undefined') ? response[0].outCode : '');

                    $('#employee_no_start').val((typeof response[0].employeeNoStart !== 'undefined') ? response[0].employeeNoStart : '');
                    $('#year_start').val((typeof response[0].yearStart !== 'undefined') ? response[0].yearStart : '');
                    $('#month_start').val((typeof response[0].monthStart !== 'undefined') ? response[0].monthStart : '');
                    $('#day_start').val((typeof response[0].dateStart) !== 'undefined' ? response[0].dateStart : '');
                    $('#hour_start').val((typeof response[0].hourStart !== 'undefined') ? response[0].hourStart : '');
                    $('#minute_start').val((typeof response[0].minuteStart !== 'undefined') ? response[0].minuteStart : '');
                    $('#flag_start').val((typeof response[0].flagStart !== 'undefined') ? response[0].flagStart : '');
                    $('#machine_code_start').val((typeof response[0].machineCodeStart !== 'undefined') ? response[0].machineCodeStart : '');
                    $('#shift_start').val((typeof response[0].shiftStart !== 'undefined') ? response[0].shiftStart : '');
                    $('#in_out_code_start').val((typeof response[0].codeInOutStart !== 'undefined') ? response[0].codeInOutStart : '');

                    $('#employee_no_long').val((typeof response[0].employeeNoLong !== 'undefined') ? response[0].employeeNoLong : '');
                    $('#year_long').val((typeof response[0].yearLong !== 'undefined') ? response[0].yearLong : '');
                    $('#month_long').val((typeof response[0].monthLong !== 'undefined') ? response[0].monthLong : '');
                    $('#day_long').val((typeof response[0].dateLong !== 'undefined') ? response[0].dateLong : '');
                    $('#hour_long').val((typeof response[0].hourLong !== 'undefined') ? response[0].hourLong : '');
                    $('#minute_long').val((typeof response[0].minuteLong !== 'undefined') ? response[0].minuteLong : '');
                    $('#flag_long').val((typeof response[0].flagLong !== 'undefined') ? response[0].flagLong : '');
                    $('#machine_code_long').val((typeof response[0].machineCodeLong !== 'undefined') ? response[0].machineCodeLong : '');
                    $('#shift_long').val((typeof response[0].shiftLong !== 'undefined') ? response[0].shiftLong : '');
                    $('#in_out_code_long').val((typeof response[0].codeInOutLong !== 'undefined') ? response[0].codeInOutLong : '');

                    $('#toolbar-new').hide();
                    $('#toolbar-edit').show();
                }
                else {
                    $('#in_code').val("");
                    $('#out_code').val("");

                    $('#employee_no_start').val("");
                    $('#year_start').val("");
                    $('#month_start').val("");
                    $('#day_start').val("");
                    $('#hour_start').val("");
                    $('#minute_start').val("");
                    $('#flag_start').val("");
                    $('#machine_code_start').val("");
                    $('#shift_start').val("");
                    $('#in_out_code_start').val("");

                    $('#employee_no_long').val("");
                    $('#year_long').val("");
                    $('#month_long').val("");
                    $('#day_long').val("");
                    $('#hour_long').val("");
                    $('#minute_long').val("");
                    $('#flag_long').val("");
                    $('#machine_code_long').val("");
                    $('#shift_long').val("");
                    $('#in_out_code_long').val("");

                    $('#toolbar-new').show();
                    $('#toolbar-edit').hide();
                }
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });

        $("#toolbar-new").on('click', function () {
            $('#record_function').val("New");
            $('#in_code').prop('readonly', false);
            $('#out_code').prop('readonly', false);
            $('#employee_no_start').prop('readonly', false);
            $('#year_start').prop('readonly', false);
            $('#month_start').prop('readonly', false);
            $('#day_start').prop('readonly', false);
            $('#hour_start').prop('readonly', false);
            $('#minute_start').prop('readonly', false);
            $('#flag_start').prop('readonly', false);
            $('#machine_code_start').prop('readonly', false);
            $('#shift_start').prop('readonly', false);
            $('#in_out_code_start').prop('readonly', false);
            $('#employee_no_long').prop('readonly', false);
            $('#year_long').prop('readonly', false);
            $('#month_long').prop('readonly', false);
            $('#day_long').prop('readonly', false);
            $('#hour_long').prop('readonly', false);
            $('#minute_long').prop('readonly', false);
            $('#flag_long').prop('readonly', false);
            $('#machine_code_long').prop('readonly', false);
            $('#shift_long').prop('readonly', false);
            $('#in_out_code_long').prop('readonly', false);
            $("#toolbar-save").show();
            $('#toolbar-cancel').show();
            $('#toolbar-new').hide();
        });

        $("#toolbar-edit").on('click', function () {
            $('#record_function').val("Edit");
            $('#in_code').prop('readonly', false);
            $('#out_code').prop('readonly', false);
            $('#employee_no_start').prop('readonly', false);
            $('#year_start').prop('readonly', false);
            $('#month_start').prop('readonly', false);
            $('#day_start').prop('readonly', false);
            $('#hour_start').prop('readonly', false);
            $('#minute_start').prop('readonly', false);
            $('#flag_start').prop('readonly', false);
            $('#machine_code_start').prop('readonly', false);
            $('#shift_start').prop('readonly', false);
            $('#in_out_code_start').prop('readonly', false);
            $('#employee_no_long').prop('readonly', false);
            $('#year_long').prop('readonly', false);
            $('#month_long').prop('readonly', false);
            $('#day_long').prop('readonly', false);
            $('#hour_long').prop('readonly', false);
            $('#minute_long').prop('readonly', false);
            $('#flag_long').prop('readonly', false);
            $('#machine_code_long').prop('readonly', false);
            $('#shift_long').prop('readonly', false);
            $('#in_out_code_long').prop('readonly', false);
            $("#toolbar-save").show();
            $('#toolbar-cancel').show();
            $('#toolbar-edit').hide();
        });

        $("#toolbar-cancel").on('click', function () {
            $('#record_function').val("");
            $('#in_code').prop('readonly', true);
            $('#out_code').prop('readonly', true);
            $('#employee_no_start').prop('readonly', true);
            $('#year_start').prop('readonly', true);
            $('#month_start').prop('readonly', true);
            $('#day_start').prop('readonly', true);
            $('#hour_start').prop('readonly', true);
            $('#minute_start').prop('readonly', true);
            $('#flag_start').prop('readonly', true);
            $('#machine_code_start').prop('readonly', true);
            $('#shift_start').prop('readonly', true);
            $('#in_out_code_start').prop('readonly', true);
            $('#employee_no_long').prop('readonly', true);
            $('#year_long').prop('readonly', true);
            $('#month_long').prop('readonly', true);
            $('#day_long').prop('readonly', true);
            $('#hour_long').prop('readonly', true);
            $('#minute_long').prop('readonly', true);
            $('#flag_long').prop('readonly', true);
            $('#machine_code_long').prop('readonly', true);
            $('#shift_long').prop('readonly', true);
            $('#in_out_code_long').prop('readonly', true);
            if(isData !== 0){
                $('#toolbar-edit').show();
            }else{
                $('#toolbar-new').show();
            }
            $("#toolbar-save").hide();
            $("#toolbar-cancel").hide();
        });

        $("#toolbar-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#time_recording_reference_form").submit();
        });

        if ($("#time_recording_reference_form").length > 0) {
            $("#time_recording_reference_form").validate({
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('time_management/time_recording_reference/proses') }}",
                        type: "POST",
                        data: $('#time_recording_reference_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/time_recording_reference') }}";
                                }, 3000);
                            } else {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#toolbar-save").prop("disabled", false);
                            $("#toolbar-save").html(
                                '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                '<span>Save</span>'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }
    })

</script>

</html>