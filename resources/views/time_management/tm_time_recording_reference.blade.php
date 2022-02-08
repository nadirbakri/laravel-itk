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
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data.css') }}">
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
    <div class="time_management">
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
                            <input type="number" min="0" class="form-control" id="in_code" name="in_code">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="out_code">{{ __('tm_time_recording_reference.label_out_code') }}</label>
                            <input type="number" min="0" class="form-control" id="out_code" name="out_code">
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
                                <td><input type="number" class="form-control" id="employee_no_start" name="employee_no_start"></td>
                                <td><input type="number" class="form-control" id="year_start" name="year_start"></td>
                                <td><input type="number" class="form-control" id="month_start" name="month_start"></td>
                                <td><input type="number" class="form-control" id="day_start" name="day_start"></td>
                                <td><input type="number" class="form-control" id="hour_start" name="hour_start"></td>
                                <td><input type="number" class="form-control" id="minute_start" name="minute_start"></td>
                                <td><input type="number" class="form-control" id="flag_start" name="flag_start"></td>
                                <td><input type="number" class="form-control" id="machine_code_start" name="machine_code_start"></td>
                                <td><input type="number" class="form-control" id="shift_start" name="shift_start"></td>
                                <td><input type="number" class="form-control" id="in_out_code_start" name="in_out_code_start"></td>
                            </tr>
                            <tr><br></tr>
                            <tr>
                                <td>Length digit</td>
                                <td><input type="number" class="form-control" id="employee_no_long" name="employee_no_long"></td>
                                <td><input type="number" class="form-control" id="year_long" name="year_long"></td>
                                <td><input type="number" class="form-control" id="month_long" name="month_long"></td>
                                <td><input type="number" class="form-control" id="day_long" name="day_long"></td>
                                <td><input type="number" class="form-control" id="hour_long" name="hour_long"></td>
                                <td><input type="number" class="form-control" id="minute_long" name="minute_long"></td>
                                <td><input type="number" class="form-control" id="flag_long" name="flag_long"></td>
                                <td><input type="number" class="form-control" id="machine_code_long" name="machine_code_long"></td>
                                <td><input type="number" class="form-control" id="shift_long" name="shift_long"></td>
                                <td><input type="number" class="form-control" id="in_out_code_long" name="in_out_code_long"></td>
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
        <div class="row">
            <div class="col-2">
                <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                    style="width: 100%;">
                    <i class="fa fa-floppy-o"></i> {{ __('tm_time_recording_reference.btn_save') }}
                </button>
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

        var table = null;

        $.ajax({
            url: "{{ url('/time_management/time_recording_reference/table') }}",
            type: "GET",
            success: function (response) {
                // console.log(response[0].inCode);
                if (response.length > 0) {
                    $('#in_code').val(response[0].inCode);
                    $('#out_code').val(response[0].outCode);

                    $('#employee_no_start').val(response[0].employeeNoStart);
                    $('#year_start').val(response[0].yearStart);
                    $('#month_start').val(response[0].monthStart);
                    $('#day_start').val(response[0].dateStart);
                    $('#hour_start').val(response[0].hourStart);
                    $('#minute_start').val(response[0].minuteStart);
                    $('#flag_start').val(response[0].flagStart);
                    $('#machine_code_start').val(response[0].machineCodeStart);
                    $('#shift_start').val(response[0].shiftStart);
                    $('#in_out_code_start').val(response[0].codeInOutStart);

                    $('#employee_no_long').val(response[0].employeeNoLong);
                    $('#year_long').val(response[0].yearLong);
                    $('#month_long').val(response[0].monthLong);
                    $('#day_long').val(response[0].dateLong);
                    $('#hour_long').val(response[0].hourLong);
                    $('#minute_long').val(response[0].minuteLong);
                    $('#flag_long').val(response[0].flagLong);
                    $('#machine_code_long').val(response[0].machineCodeLong);
                    $('#shift_long').val(response[0].shiftLong);
                    $('#in_out_code_long').val(response[0].codeInOutLong);
                }
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });

        load_data_table_time_recording_reference();

        function load_data_table_time_recording_reference() {
            table = $('#time_recording_reference_table').DataTable({
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses'
            });
        }

        $('input[name="radiobtn1"]').on('change', function () {
            if ($('#time_in_record_earliest').prop('checked', true)) {
                $('input[name="radiobtn1"]').val('E');
                // console.log($('input[name="radiobtn1"]').val());
            }
            else {
                $('input[name="radiobtn1"]').val('L');
            }
        });

        $('input[name="radiobtn2"]').on('change', function () {
            if ($('#time_out_record_earliest').prop('checked', true)) {
                $('input[name="radiobtn2"]').val('E');
            }
            else {
                $('input[name="radiobtn2"]').val('L');
            }
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#time_recording_reference_form").submit();
        });

        $('#time_recording_reference_form').on('submit', function () {
            $.ajax({
                type: "POST",
                url: "{{ url('time_management/time_recording_reference/proses') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: data,
                success: function (response) {
                    if (response.status == "true") {
                        $("#btn-save").prop("disabled", false);
                        $("#btn-save").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_reference.btn_save") }}'
                        );

                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);
                        $('#time_recording_reference_table').DataTable().destroy();
                        load_data_table_time_recording_reference();
                        setTimeout(function () {
                            $('#notification_success').modal('hide');
                        }, 3000);
                    } else {
                        $("#btn-save").prop("disabled", false);
                        $("#btn-save").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_reference.btn_save") }}'
                        );

                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html(
                            "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                },
                error: function (response) {
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_reference.btn_save") }}'
                    );

                    $('#notification').modal('show');
                    $('#message-notification').html(response);
                }
            });

            return false;
        });
    })

</script>

</html>