<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_absenteeism_data_entry_by_employee_no.judul') }}</title>
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
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.min.js"> --}}
    {{-- <link rel="stylesheet" href="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css"> --}}
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-time_management {
            max-width: 97%;
            margin: auto;
            margin-top: 1%;
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

        thead tr .middle {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="div-time_management">
        <div class="div-title">
            <a href="{{ url('time_management') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_absenteeism_data_entry_by_employee_no.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <form id="tm_absenteeism_data_entry_by_employee_no_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="employee_no">{{ __('tm_absenteeism_data_entry_by_employee_no.label_employee_no') }}</label>
                            <select class="form-control select2" id="employee_no" name="employee_no"></select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="employee_name">{{ __('tm_absenteeism_data_entry_by_employee_no.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('tm_absenteeism_data_entry_by_employee_no.label_employee_name') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="ranking">{{ __('tm_absenteeism_data_entry_by_employee_no.label_ranking') }}</label>
                            <input type="text" class="form-control" id="ranking" name="ranking"
                                placeholder="{{ __('tm_absenteeism_data_entry_by_employee_no.label_ranking') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="position">{{ __('tm_absenteeism_data_entry_by_employee_no.label_position') }}</label>
                            <input type="text" class="form-control" id="position" name="position"
                                placeholder="{{ __('tm_absenteeism_data_entry_by_employee_no.label_position') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="period">{{ __('tm_absenteeism_data_entry_by_employee_no.label_period') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="period" name="period"
                                    placeholder="{{ __('tm_absenteeism_data_entry_by_employee_no.label_period') }}">
                                <div class="input-group-prepend" id="period-calendar">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-3">
                <button type="submit" class="btn btn-primary" name="btn-edit" id="btn-edit"
                    style="width: 100%;">
                    <i class="fa fa-pencil"></i> {{ __('tm_absenteeism_data_entry_by_employee_no.btn_edit') }}
                </button>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                    style="width: 100%;" disabled>
                    <i class="fa fa-floppy-o"></i> {{ __('tm_absenteeism_data_entry_by_employee_no.btn_save') }}
                </button>
            </div>
        </div>
        <form id="absenteeism_data_entry_by_employee_no_table_form" method="post">
            <div class="div-table">
                <table id="absenteeism_data_entry_by_employee_no_table" class="table hover">
                    <thead>
                        <tr>
                            <th rowspan="2" class="middle">Absent Date</th>
                            <th rowspan="2" class="middle">Period</th>
                            <th rowspan="2" class="middle">Day</th>
                            <th rowspan="2" class="middle">Shift Code</th>
                            <th rowspan="2" class="middle">Cost Center Code</th>
                            <th colspan="2" class="middle">Actual In</th>
                            <th colspan="2"class="middle">Actual Out</th>
                            <th rowspan="2" class="middle">Total Actual Hour</th>
                            <th colspan="3" class="middle">Finger Absent</th>
                            <th colspan="3" class="middle">Absent</th>
                            <th colspan="8" class="middle">Overtime</th>
                            <th rowspan="2" class="middle">Total Normal Hour</th>
                            <th colspan="2" class="middle">Normal Hour</th>
                            <th colspan="2" class="middle">Overtime</th>
                            <th rowspan="2" class="middle">Position</th>
                            <th rowspan="2" class="middle">Location</th>
                            <th rowspan="2" class="middle">Grade</th>
                        </tr>
                        <tr>
                            <th class="middle">Date</th>
                            <th class="middle">Time</th>
                            <th class="middle">Date</th>
                            <th class="middle">Time</th>
                            <th class="middle">Code</th>
                            <th class="middle">Hour</th>
                            <th class="middle">Description</th>
                            <th class="middle">Code</th>
                            <th class="middle">Hour</th>
                            <th class="middle">Description</th>
                            <th class="middle">Code</th>
                            <th class="middle">Before</th>
                            <th class="middle">Start</th>
                            <th class="middle">Finish</th>
                            <th class="middle">Hour</th>
                            <th class="middle">Convert</th>
                            <th class="middle">BOT</th>
                            <th class="middle">Description</th>
                            <th class="middle">In</th>
                            <th class="middle">Out</th>
                            <th class="middle">Before</th>
                            <th class="middle">After</th>
                        </tr>
                    </thead>
                </table>
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
                        <span class="title-text-notification">{{ __('tm_absenteeism_data_entry_by_employee_no.alert_success') }}</span>
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

<script type="text/javascript">
    $(function () {
        initMonthPicker();
    });

    function initMonthPicker() {
        $('#period').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "Y-m-01", //defaults to "F Y"
                    altFormat: "F Y", //defaults to "F Y"
                })
            ],
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#period-calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>

<script type="text/javascript">

    $(document).ready(function () {
        var table = null;

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function initDatePicker(field='') {
            return $(field).flatpickr({
                allowInput: true,
                altFormat: "j-M-y",
                dateFormat: "Y-m-d",
                defaultDate: "today",
                onReady: function () {
                    var flatPickrInstance = this;
                    var $flatPickrInput = $(flatPickrInstance.element);
                    $flatPickrInput.siblings(".date").click(function () {
                        flatPickrInstance.toggle();
                    });
                }
            });
        }

        function initTimePicker(field='') {
            return $(field).flatpickr({
                enableTime: true,
                noCalendar: true,
                allowInput: true,
                time_24hr: true,
                defaultDate: "today",
                altFormat: "H:i",
                dateFormat: "H:i"
            });
        }

        $.ajax({
            url: "{{ url('time_management/period/data/detail') }}",
            type: "GET",
            success: function (response) {
            }
        })

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        load_data_table_absenteeism_data_entry_by_employee_no();

        $('#employee_no, #period').on("select2:select, change", function (e) {
            var data = $('#employee_no').select2('data');
            var data2 = $('#period').val();
            console.log(data2);
            $('#employee_name').val(htmlDecode(data[0].title));

            var filter_employee_no_table = $('#employee_no').val();
            table.clear().draw();
            $.ajax({
                url: "{{ url('time_management/absenteeism_data_entry/detail') }}",
                type: "GET",
                data: {
                    'employeeNo': data[0].id
                },
                success: function (response) {
                    $('#ranking').val(response[0].rankingCode);
                    $('#position').val(response[0].positionCode);
                }
            })

            $.ajax({
                url: "{{ url('time_management/absenteeism_data_entry_by_employee_no/table') }}",
                type: "GET",
                data: {
                    'employeeNo': data[0].id
                },
                success: function (response) {
                    console.log(response[0]);
                    $.each(response, function(k, v) {    
                        if (v.absentDate !== 'undefined' && v.absentDate !== null) {
                            var absent_date = moment(v.absentDate).format('YYYY-MM-DD');
                        }
                        else {
                            var absent_date = '';
                        }

                        if (v.actualDateIn !== 'undefined' && v.actualDateIn !== null) {
                            var actual_time_in = moment(v.actualDateIn).format('HH:mm');
                        }
                        else {
                            var actual_time_in = '';
                        }

                        if (v.actualDateOut !== 'undefined' && v.actualDateOut !== null) {
                            var actual_time_out = moment(v.actualDateOut).format('HH:mm');
                        }
                        else {
                            var actual_time_out = '';
                        }

                        if (v.totalActualHour !== 'undefined' && v.totalActualHour !== null) {
                            var total_actual_hour = moment(v.totalActualHour).format('HH:mm');
                        }
                        else {
                            var total_actual_hour = '';
                        }

                        if (v.hourAbsent !== 'undefined' && v.hourAbsent !== null) {
                            var finger_absent_hour = moment(v.hourAbsent).format('HH:mm');
                        }
                        else {
                            var finger_absent_hour = '';
                        }

                        if (v.hourAbsent2 !== 'undefined' && v.hourAbsent2 !== null) {
                            var absent_hour = moment(v.hourAbsent2).format('HH:mm');
                        }
                        else {
                            var absent_hour = '';
                        }

                        if (v.ovtBeforeIn !== 'undefined' && v.ovtBeforeIn !== null) {
                            var overtime_before = moment(v.ovtBeforeIn).format('HH:mm');
                        }
                        else {
                            var overtime_before = '';
                        }

                        if (v.ovtIn !== 'undefined' && v.ovtIn !== null) {
                            var overtime_start = moment(v.ovtIn).format('HH:mm');
                        }
                        else {
                            var overtime_start = '';
                        }

                        if (v.ovtOut !== 'undefined' && v.ovtOut !== null) {
                            var overtime_finish = moment(v.ovtOut).format('HH:mm');
                        }
                        else {
                            var overtime_finish = '';
                        }

                        if (v.hourOvt !== 'undefined' && v.hourOvt !== null) {
                            var overtime_hour = moment(v.hourOvt).format('HH:mm');
                        }
                        else {
                            var overtime_hour = '';
                        }

                        if (v.builtInOvt !== 'undefined' && v.builtInOvt !== null) {
                            var overtime_bot = moment(v.builtInOvt).format('HH:mm');
                        }
                        else {
                            var overtime_bot = '';
                        }

                        if (v.totalNormalHour !== 'undefined' && v.totalNormalHour !== null) {
                            var total_normal_hour = moment(v.totalNormalHour).format('HH:mm');
                        }
                        else {
                            var total_normal_hour = '';
                        }

                        if (v.normalDateIn !== 'undefined' && v.normalDateIn !== null) {
                            var normal_hour_in = moment(v.normalDateIn).format('HH:mm');
                        }
                        else {
                            var normal_hour_in = '';
                        }

                        if (v.normalDateOut !== 'undefined' && v.normalDateOut !== null) {
                            var normal_hour_out = moment(v.normalDateOut).format('HH:mm');
                        }
                        else {
                            var normal_hour_out = '';
                        }

                        if (v.ovtBefore !== 'undefined' && v.ovtBefore !== null) {
                            var normal_overtime_before = moment(v.ovtBefore).format('HH:mm');
                        }
                        else {
                            var normal_overtime_before = '';
                        }

                        if (v.ovtAfter !== 'undefined' && v.ovtAfter !== null) {
                            var normal_overtime_after = moment(v.ovtAfter).format('HH:mm');
                        }
                        else {
                            var normal_overtime_after = '';
                        }

                        if (v.actualDateIn !== 'undefined' && v.actualDateIn !== null) {
                            var actual_date_in = moment(v.actualDateIn).format('DD-MMM-YYYY');
                        }
                        else {
                            var actual_date_in = '';
                        }

                        table.row.add([
                            '<input type="text" class="form-control" name="absent_date[]" id="absent_date" value="'+ absent_date +'" readonly>',
                            '<input type="text" class="form-control" name="seq_no[]" id="seq_no" value="'+ ((typeof v.seqNo !== 'undefined' && v.seqNo !== null) ? v.seqNo : '') +'" readonly>',
                            '<select class="form-control select2 select_day" name="day[]" id="day'+ (k+1) +'" disabled></select>',
                            '<select class="form-control select2" name="shift_code[]" id="shift_code'+ (k+1) +'" disabled></select>',
                            '<select class="form-control select2" name="cost_center_code[]" id="cost_center_code'+(k+1)+'" disabled></select>',
                            '<div class="input-group">' +
                                '<input type="text" class="form-control" id="actual_date_in'+ (k+1) +'" name="actual_date_in[]" disabled>' +  
                                '<div class="input-group-prepend" id="actual_date_in_calendar">' +
                                    '<span class="input-group-text"><span class="fa fa-calendar"></span></span>' +
                                '</div>' +
                            '</div>',
                            '<input type="text" class="form-control actual_time_in" name="actual_time_in[]" id="actual_time_in'+ (k+1) +'" disabled>',
                            '<div class="input-group date">' +
                                '<input type="text" class="form-control" id="actual_date_out'+ (k+1) +'" name="actual_date_out[]" disabled>' +  
                                '<div class="input-group-prepend date" id="actual_date_in_calendar'+ (k+1) +'">' +
                                    '<span class="input-group-text"><span class="fa fa-calendar"></span></span>' +
                                '</div>' +
                            '</div>',
                            '<input type="text" class="form-control actual_time_out" name="actual_time_out[]" id="actual_time_out'+ (k+1) +'" disabled>',
                            '<input type="text" class="form-control" name="total_actual_hour[]" id="total_actual_hour'+ (k+1) +'" value="'+ total_actual_hour +'" readonly>',
                            '<select class="form-control select2" name="finger_absent_code[]" id="finger_absent_code'+ (k+1) +'" disabled></select>',
                            '<input type="text" class="form-control finger_absent_hour" name="finger_absent_hour[]" id="finger_absent_hour'+ (k+1) +'" value="'+ finger_absent_hour +'" readonly>',
                            '<input type="text" class="form-control" name="finger_absent_description[]" id="finger_absent_description'+ (k+1) +'" value="'+ ((typeof v.descriptionAbsent !== 'undefined' && v.descriptionAbsent !== null) ? v.descriptionAbsent : '') +'" readonly>',
                            '<select class="form-control select2" name="absent_code[]" id="absent_code'+ (k+1) +'" disabled></select>',
                            '<input type="text" class="form-control" name="absent_hour[]" id="absent_hour'+ (k+1) +'" value="'+ absent_hour +'" readonly>',
                            '<input type="text" class="form-control" name="absent_description[]" id="absent_description'+ (k+1) +'" value="'+ ((typeof v.descriptionAbsent2 !== 'undefined' && v.descriptionAbsent2 !== null) ? v.descriptionAbsent2 : '') +'" readonly>',
                            '<select class="form-control select2" name="overtime_code[]" id="overtime_code'+ (k+1) +'" disabled></select>',
                            '<input type="text" class="form-control" name="overtime_before[]" id="overtime_before'+ (k+1) +'" value="'+ overtime_before +'" readonly>',
                            '<input type="text" class="form-control" name="overtime_start[]" id="overtime_start'+ (k+1) +'" value="'+ overtime_start +'" readonly>',
                            '<input type="text" class="form-control" name="overtime_finish[]" id="overtime_finish'+ (k+1) +'" value="'+ overtime_finish +'" readonly>',
                            '<input type="text" class="form-control" name="overtime_hour[]" id="overtime_hour'+ (k+1) +'" value="'+ overtime_hour +'" readonly>',
                            '<input type="text" class="form-control" name="overtime_convert[]" id="overtime_convert'+ (k+1) +'" value="'+ ((typeof v.hourOvtCvt !== 'undefined' && v.hourOvtCvt !== null) ? v.hourOvtCvt : '') +'" readonly>',
                            '<input type="text" class="form-control" name="overtime_bot[]" id="overtime_bot'+ (k+1) +'" value="'+ ((typeof v.builtInOvt !== 'undefined' && v.builtInOvt !== null) ? v.builtInOvt : '') +'" readonly>',
                            '<input type="text" class="form-control" name="overtime_description[]" id="overtime_description'+ (k+1) +'" value="'+ ((typeof v.descriptionOvt !== 'undefined' && v.descriptionOvt !== null) ? v.descriptionOvt : '') +'" readonly>',
                            '<input type="text" class="form-control" name="total_normal_hour[]" id="total_normal_hour'+ (k+1) +'" value="'+ total_normal_hour +'" readonly>',
                            '<input type="text" class="form-control" name="normal_hour_in[]" id="normal_hour_in'+ (k+1) +'" value="'+ normal_hour_in +'" readonly>',
                            '<input type="text" class="form-control" name="normal_hour_out[]" id="normal_hour_out'+ (k+1) +'" value="'+ normal_hour_out +'" readonly>',
                            '<input type="text" class="form-control" name="normal_overtime_before[]" id="normal_overtime_before'+ (k+1) +'" value="'+ normal_overtime_before +'" readonly>',
                            '<input type="text" class="form-control" name="normal_overtime_after[]" id="normal_overtime_after'+ (k+1) +'" value="'+ normal_overtime_after +'" readonly>',
                            '<input type="text" class="form-control" name="position[]" id="position'+ (k+1) +'" value="'+ ((typeof v.positionCode !== 'undefined' && v.positionCode !== null) ? v.positionCode : '') +'" readonly>',
                            '<input type="text" class="form-control" name="location[]" id="location'+ (k+1) +'" value="'+ ((typeof v.locationCode !== 'undefined' && v.locationCode !== null) ? v.locationCode : '') +'" readonly>',
                            '<input type="text" class="form-control" name="grade[]" id="grade'+ (k+1) +'" value="'+ ((typeof v.gradeCode !== 'undefined' && v.gradeCode !== null) ? v.gradeCode : '') +'" readonly>'
                        ]).draw();

                        loadDataDay("#day" + (k+1));
                        loadDataShiftCode("#shift_code" + (k+1));
                        loadDataCostCenterCode("#cost_center_code" + (k+1));
                        loadDataAbsentCode('#finger_absent_code' + (k+1));
                        loadDataAbsentCode('#absent_code' + (k+1));
                        loadDataAbsentCode('#absent_code' + (k+1));
                        loadDataOvertimeCode('#overtime_code' + (k+1));

                        loadDataDetailDayCode('#day' + (k+1), ((typeof v.day !== 'undefined' && v.day !== null) ? v.day : ''));
                        loadDataDetailShiftCode('#shift_code' + (k+1), ((typeof v.shiftCode !== 'undefined' && v.shiftCode !== null) ? v.shiftCode : ''));
                        loadDataDetailCostCenterCode('#cost_center_code' + (k+1), ((typeof v.costCenterCode !== 'undefined' && v.costCenterCode !== null) ? v.costCenterCode : ''));
                        loadDataDetailOvertimeCode('#overtime_code' + (k+1), ((typeof v.ovtCode !== 'undefined' && v.ovtCode !== null) ? v.ovtCode : ''));
                        loadDataDetailFingerAbsentCode('#finger_absent_code' + (k+1), ((typeof v.absentCode !== 'undefined' && v.absentCode !== null) ? v.absentCode : ''));
                        loadDataDetailAbsentCode('#absent_code' + (k+1), ((typeof v.absentCode2 !== 'undefined' && v.absentCode2 !== null) ? v.absentCode2 : ''));

                        // loadDataDetailActualDateIn('#actual_date_in' + (k+1), actual_date_in);

                        // console.log(setDate((typeof v.actualDateIn !== 'undefined' && v.actualDateIn !== null) ? v.actualDateIn : ''));

                        window["pickrActualTimeIn" + (k+1)] = initTimePicker('#actual_time_in' + (k+1));
                        initTimePicker('#actual_time_out' + (k+1));
                        window["pickrActualDateIn" + (k+1)] = initDatePicker('#actual_date_in' + (k+1));
                        initDatePicker('#actual_date_out' + (k+1));

                        console.log(moment(v.actualDateIn).format('YYYY-MM-DD HH:mm'));

                        window["pickrActualTimeIn" + (k+1)].selectedDateObj.setHours("09", "00");
                        window["pickrActualDateIn" + (k+1)].setDate(((typeof v.actualDateIn !== 'undefined' && v.actualDateIn !== null) ? v.actualDateIn : ''));

                        $('#btn-edit').on('click', function () {
                            $('#day' + (k+1)).prop('disabled', false);
                            $('#shift_code' + (k+1)).prop('disabled', false);
                            $('#cost_center_code' + (k+1)).prop('disabled', false);
                            $('#actual_date_in' + (k+1)).prop('disabled', false);
                            $('#actual_time_in'+ (k+1)).prop('disabled', false);
                            $('#actual_date_out' + (k+1)).prop('disabled', false);
                            $('#actual_time_out' + (k+1)).prop('disabled', false);
                            $('#total_actual_hour' + (k+1)).prop('readonly', false);
                            $('#finger_absent_code' + (k+1)).prop('disabled', false);
                            $('#finger_absent_hour'+ (k+1)).prop('readonly', false);
                            $('#finger_absent_description'+ (k+1)).prop('readonly', false);
                            $('#absent_code'+ (k+1)).prop('disabled', false);
                            $('#absent_hour'+ (k+1)).prop('readonly', false);
                            $('#absent_description'+ (k+1)).prop('readonly', false);
                            $('#overtime_code'+ (k+1)).prop('disabled', false);
                            $('#overtime_before'+ (k+1)).prop('readonly', false);
                            $('#overtime_start'+ (k+1)).prop('readonly', false);
                            $('#overtime_finish'+ (k+1)).prop('readonly', false);
                            $('#overtime_hour'+ (k+1)).prop('readonly', false);
                            $('#overtime_convert'+ (k+1)).prop('readonly', false);
                            $('#overtime_bot'+ (k+1)).prop('readonly', false);
                            $('#overtime_description'+ (k+1)).prop('readonly', false);
                            $('#position'+ (k+1)).prop('readonly', false);
                            $('#location'+ (k+1)).prop('readonly', false);
                            $('#grade'+ (k+1)).prop('readonly', false);
                            $('#btn-save').prop('disabled', false);
                        });

                        var date_time = $('actual_time_in, .actual_time_out');
                                    
                        date_time.on('change', function () {
                            var actual_date_out = moment($('#actual_date_out'+(k+1)).val()).format('DD/MM/YYYY');
                            var actual_date_in = moment($('#actual_date_in'+(k+1)).val()).format('DD/MM/YYYY');
                            var actual_time_out = $('#actual_time_out'+(k+1)).val();
                            var actual_time_in = $('#actual_time_in'+(k+1)).val();

                            const DateIn = actual_date_in + " " + actual_time_in;
                            const DateOut = actual_date_out + " " + actual_time_out;

                            const difference = moment(DateOut, "DD/MM/YYYY HH:mm:ss").diff(moment(DateIn, "DD/MM/YYYY HH:mm:ss"));
                            const diff = moment.utc(difference).format("HH:mm:ss");

                            $('#finger_absent_hour'+(k+1)).val(diff);

                            // console.log(actual_date_in);
                            // console.log(actual_time_in);
                            // console.log(difference);
                        })
                    });
                }
            })
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_name').val('');
            $('#ranking').val('');
            $('#position').val('');
            $('#absenteeism_data_entry_by_employee_no_table').DataTable().destroy();
        });

        loadDataEmployeeNo();

        // function calculate_date_time() {
            
        // }

        function load_data_table_absenteeism_data_entry_by_employee_no(filter_employee_no_table = '') {
            table = $('#absenteeism_data_entry_by_employee_no_table').DataTable({
                processing: true,
                orderCellsTop: true,
                paging: false,
                "sDom": 'lrtip',
                scrollY: 400,
                scrollX: true,
                aoColumns : [
                    { "sWidth": '110px' },
                    { "sWidth": '50px' },
                    { "sWidth": '100px' },
                    { "sWidth": '100px' },
                    { "sWidth": '200px' },
                    { "sWidth": '150px' },
                    { "sWidth": '70px' },
                    { "sWidth": '150px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '200px' },
                    { "sWidth": '70px' },
                    { "sWidth": '200px' },
                    { "sWidth": '200px' },
                    { "sWidth": '70px' },
                    { "sWidth": '200px' },
                    { "sWidth": '200px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '50px' },
                    { "sWidth": '70px' },
                    { "sWidth": '200px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '70px' },
                    { "sWidth": '100px' },
                    { "sWidth": '100px' },
                    { "sWidth": '100px' }
                ]
            });
        }

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#employee_no').select2({
                width: '100%',
                placeholder: 'Choose Employee',
                allowClear: true,
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
                    url: '/employee_no/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.employeeNo,
                                    id: item.employeeNo,
                                    title: item.fullName,
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

        function loadDataDetailDayCode(field = '', dayCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: '/day_code/func/api',
                data: {
                    dayCode : dayCode
                }
            }).then(function (data) {
                // console.log(data);
                if (data.length > 0) {
                    if (!$(field).find('option:contains(' + data[0].value + ')').length) {
                        $(field).append($('<option>').val(data[0].comGenCode).text(data[0].value));
                    }
                    $(field).val(data[0].comGenCode);
                    $(field).removeClass('loading');
                }
            });
        }

        function loadDataDetailShiftCode(field = '', shiftCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: '/shift_code/func/api',
                data: {
                    shiftCode : shiftCode
                }
            }).then(function (data) {
                // console.log(data);
                if (data.length > 0) {
                    if (!$(field).find('option:contains(' + data[0].shiftName + ')').length) {
                        $(field).append($('<option>').val(data[0].shiftCode).text(data[0].shiftName));
                    }
                    $(field).val(data[0].shiftCode);
                    $(field).removeClass('loading');
                }
            });
        }

        function loadDataDetailCostCenterCode(field = '', costCenterCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: '/cost_center/func/api',
                data: {
                    costCenterCode : costCenterCode
                }
            }).then(function (data) {
                // console.log(data);
                if (data.length > 0) {
                    if (!$(field).find('option:contains(' + data[0].costCenterDescription + ')').length && costCenterCode !== '') {
                        $(field).append($('<option>').val(data[0].costCenterCode).text(data[0].costCenterDescription));
                    }
                    $(field).val(data[0].costCenterCode);
                    $(field).removeClass('loading');
                }
            });
        }

        function loadDataDetailOvertimeCode(field = '', overtimeCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: '/cost_center/func/api',
                data: {
                    costCenterCode : overtimeCode
                }
            }).then(function (data) {
                // console.log(overtimeCode);
                if (!$(field).find('option:contains(' + data[0].costCenterDescription + ')').length && overtimeCode !== '') {
                    $(field).append($('<option>').val(data[0].costCenterCode).text(data[0].costCenterDescription));
                }
                $(field).val(data[0].costCenterCode);
                $(field).removeClass('loading');
            });
        }

        function loadDataDetailFingerAbsentCode(field = '', fingerAbsentCode = '') {
            $(field).addClass('spinner-border');
            // console.log(fingerAbsentCode);

            $.ajax({
                type: 'GET',
                url: '/absent_code/func/api',
                data: {
                    absentCode : fingerAbsentCode
                }
            }).then(function (data) {
                // console.log(fingerAbsentCode);
                if (!$(field).find('option:contains(' + data[0].description + ')').length && fingerAbsentCode !== '') {
                    $(field).append($('<option>').val(data[0].absentCode).text(data[0].description));
                }
                $(field).val(data[0].absentCode);
                $(field).removeClass('loading');
            });
        }

        function loadDataDetailAbsentCode(field = '', absentCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: '/absent_code/func/api',
                data: {
                    absentCode : absentCode
                }
            }).then(function (data) {
                // console.log(data);
                if (!$(field).find('option:contains(' + data[0].description + ')').length && absentCode !== '') {
                    $(field).append($('<option>').val(data[0].absentCode).text(data[0].description));
                }
                $(field).val(data[0].absentCode);
                $(field).removeClass('loading');
            });
        }

        function loadDataDay(field = ''){
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

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Day',
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
                    url: '/day_code/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
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

        function loadDataShiftCode(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Shift Code</b></div>' +
                        '<div class="col-6"><b>Shift Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.shiftCode + '</div>' +
                        '<div class="col-6">' + data.data.shiftName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Shift',
                allowClear: true,
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
                    url: '/shift_code/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.shiftName,
                                    id: item.shiftCode,
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

        function loadDataCostCenterCode(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Cost Center Code</b></div>' +
                        '<div class="col-6"><b>Cost Center Description</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.costCenterCode + '</div>' +
                        '<div class="col-6">' + data.data.costCenterDescription + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Cost Center Code',
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
                    url: '/cost_center/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.costCenterDescription,
                                    id: item.costCenterCode,
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

        function loadDataAbsentCode(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Absent Code</b></div>' +
                        '<div class="col-6"><b>Absent Description</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.absentCode + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Cost Center Code',
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
                    url: '/absent_code/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.description,
                                    id: item.absentCode,
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

        function loadDataOvertimeCode(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Overtime Code</b></div>' +
                        '<div class="col-6"><b>Overtime Description</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.absentCode + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Cost Center Code',
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
                    url: '/code/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.description,
                                    id: item.absentCode,
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
    })

</script>

</html>