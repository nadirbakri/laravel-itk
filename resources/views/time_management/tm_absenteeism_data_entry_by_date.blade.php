<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_absenteeism_data_entry_by_date.judul') }}</title>
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

        thead tr th {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="div-time_management">
        <div class="div-title">
            <a href="{{ url('time_management') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_absenteeism_data_entry_by_date.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <form id="tm_absenteeism_data_entry_by_date_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="absenteeism_date">{{ __('tm_absenteeism_data_entry_by_date.label_absenteeism_date') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="absenteeism_date" name="absenteeism_date"
                                    placeholder="{{ __('tm_absenteeism_data_entry_by_date.label_absenteeism_date') }}">
                                <div class="input-group-prepend" id="absenteeism_date-calendar">
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
                    <i class="fa fa-pencil"></i> {{ __('tm_absenteeism_data_entry_by_date.btn_edit') }}
                </button>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                    style="width: 100%;" disabled>
                    <i class="fa fa-floppy-o"></i> {{ __('tm_absenteeism_data_entry_by_date.btn_save') }}
                </button>
            </div>
        </div>
        <form id="absenteeism_data_entry_by_date_table_form" method="post">
            <div class="div-table">
                <table id="absenteeism_data_entry_by_date_table" class="table hover">
                    <thead>
                        <tr>
                            <th colspan="2" class="middle">Employee Data</th>
                            <th rowspan="2" class="middle" style="width: 50%">Absent Date</th>
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
                            <th>No</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Code</th>
                            <th>Hour</th>
                            <th>Description</th>
                            <th>Code</th>
                            <th>Hour</th>
                            <th>Description</th>
                            <th>Code</th>
                            <th>Before</th>
                            <th>Start</th>
                            <th>Finish</th>
                            <th>Hour</th>
                            <th>Convert</th>
                            <th>BOT</th>
                            <th>Description</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>Before</th>
                            <th>After</th>
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
                        <span class="title-text-notification">{{ __('tm_absenteeism_data_entry_by_date.alert_success') }}</span>
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
        $('#absenteeism_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#absenteeism_date-calendar").click(function () {
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
            $(field).flatpickr({
                // altInput: true,
                // clickOpens: false,
                allowInput: true,
                altFormat: "j-M-y",
                dateFormat: "Y-m-d",
                defaultDate: "today",
                onReady: function () {
                    var flatPickrInstance = this;
                    // console.log(flatPickrInstance);
                    var $flatPickrInput = $(flatPickrInstance.element);
                    $flatPickrInput.siblings(".date").click(function () {
                        flatPickrInstance.toggle();
                    });
                }
            });
        }

        function initTimePicker(field='') {
            $(field).flatpickr({
                enableTime: true,
                noCalendar: true,
                // altInput: true,
                // clickOpens: false,
                // static: true,
                allowInput: true,
                time_24hr: true,
                defaultDate: "today",
                altFormat: "H:i",
                dateFormat: "H:i:ss"
            });
        }

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        initDatePicker('#absenteeism_date');

        load_data_table_absenteeism_data_entry_by_date();

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#absenteeism_date').val();
            console.log(data);

            table.clear().draw();

            $.ajax({
                url: "{{ url('time_management/absenteeism_data_entry_by_date/table') }}",
                type: "GET",
                data: {
                    'employeeNo': data[0].id
                },
                success: function (response) {
                    if(!isEmpty(response)){
                        $.each(response, function(k, v) {    
                            table.row.add([
                                '<input type="text" class="form-control absent_date" name="absent_date[]" id="absent_date" value="'+ ((typeof v.absentDate !== 'undefined' && v.absentDate !== null) ? moment(v.absentDate).format('YYYY-MM-DD') : '') +'" readonly>',
                                '<input type="text" class="form-control seq_no" name="seq_no[]" id="seq_no" value="'+ ((typeof v.seqNo !== 'undefined' && v.seqNo !== null) ? v.seqNo : '') +'" readonly>',
                                '<select class="form-control select2 select_day" name="day[]" id="day'+ (k+1) +'" disabled></select>',
                                '<select class="form-control select2 select_shift_code" name="shift_code[]" id="shift_code'+ (k+1) +'" disabled></select>',
                                '<select class="form-control select2 select_cost_center_code" name="cost_center_code[]" id="cost_center_code'+ (k+1) +'" disabled></select>',
                                '<div class="input-group">' +
                                    '<input type="text" class="form-control actual_date_in" id="actual_date_in'+ (k+1) +'" name="actual_date_in[]" disabled>' +  
                                    '<div class="input-group-prepend" id="actual_date_in_calendar">' +
                                        '<span class="input-group-text"><span class="fa fa-calendar"></span></span>' +
                                    '</div>' +
                                '</div>',
                                '<input type="text" class="form-control actual_time_in" name="actual_time_in[]" id="actual_time_in'+ (k+1) +'" data-no="'+ (k+1) +'" disabled>',
                                '<div class="input-group date">' +
                                    '<input type="text" class="form-control actual_date_out" id="actual_date_out" name="actual_date_out[]" disabled>' +  
                                    '<div class="input-group-prepend date" id="actual_date_in_calendar">' +
                                        '<span class="input-group-text"><span class="fa fa-calendar"></span></span>' +
                                    '</div>' +
                                '</div>',
                                '<input type="text" class="form-control actual_time_out" name="actual_time_out[]" id="actual_time_out'+ (k+1) +'" data-no="'+ (k+1) +'" disabled>',
                                '<input type="text" class="form-control total_actual_hour" name="total_actual_hour[]" id="total_actual_hour" readonly>',
                                '<select class="form-control select2 select_finger_absent_code" name="finger_absent_code[]" id="finger_absent_code'+ (k+1) +'" disabled></select>',
                                '<input type="text" class="form-control finger_absent_hour" name="finger_absent_hour[]" id="finger_absent_hour'+ (k+1) +'" readonly>',
                                '<input type="text" class="form-control finger_absent_description" name="finger_absent_description[]" id="finger_absent_description" value="'+ ((typeof v.descriptionAbsent !== 'undefined' && v.descriptionAbsent !== null) ? v.descriptionAbsent : '') +'" readonly>',
                                '<select class="form-control select2 select_absent_code" name="absent_code[]" id="absent_code'+ (k+1) +'" disabled></select>',
                                '<input type="text" class="form-control absent_hour" name="absent_hour[]" id="absent_hour" readonly>',
                                '<input type="text" class="form-control absent_description" name="absent_description[]" id="absent_description" value="'+ ((typeof v.descriptionAbsent2 !== 'undefined' && v.descriptionAbsent2 !== null) ? v.descriptionAbsent2 : '') +'" readonly>',
                                '<select class="form-control select2 select_overtime_code" name="overtime_code[]" id="overtime_code'+ (k+1) +'" disabled></select>',
                                '<input type="text" class="form-control overtime_before" name="overtime_before[]" id="overtime_before" readonly>',
                                '<input type="text" class="form-control overtime_start" name="overtime_start[]" id="overtime_start" readonly>',
                                '<input type="text" class="form-control overtime_finish" name="overtime_finish[]" id="overtime_finish" readonly>',
                                '<input type="text" class="form-control overtime_hour" name="overtime_hour[]" id="overtime_hour" readonly>',
                                '<input type="text" class="form-control overtime_convert" name="overtime_convert[]" id="overtime_convert" value="'+ ((typeof v.hourOvtCvt !== 'undefined' && v.hourOvtCvt !== null) ? v.hourOvtCvt : '') +'" readonly>',
                                '<input type="text" class="form-control overtime_bot" name="overtime_bot[]" id="overtime_bot" readonly>',
                                '<input type="text" class="form-control overtime_description" name="overtime_description[]" id="overtime_description" value="'+ ((typeof v.descriptionOvt !== 'undefined' && v.descriptionOvt !== null) ? v.descriptionOvt : '') +'" readonly>',
                                '<input type="text" class="form-control total_normal_hour" name="total_normal_hour[]" id="total_normal_hour" readonly>',
                                '<input type="text" class="form-control normal_hour_in" name="normal_hour_in[]" id="normal_hour_in" readonly>',
                                '<input type="text" class="form-control normal_hour_out" name="normal_hour_out[]" id="normal_hour_out" readonly>',
                                '<input type="text" class="form-control normal_overtime_before" name="normal_overtime_before[]" id="normal_overtime_before" readonly>',
                                '<input type="text" class="form-control normal_overtime_after" name="normal_overtime_after[]" id="normal_overtime_after" readonly>',
                                '<select class="form-control select2 select_position" name="position[]" id="position'+ (k+1) +'" disabled></select>',
                                '<select class="form-control select2 select_location" name="location[]" id="location'+ (k+1) +'" disabled></select>',
                                '<select class="form-control select2 select_grade" name="grade[]" id="grade'+ (k+1) +'" disabled></select>'
                            ]);
                        });

                        table.draw();
                        // table.columns.adjust().responsive.recalc();
                        // table.columns.adjust().draw();

                        loadDataDay(".select_day");
                        loadDataShiftCode(".select_shift_code");
                        loadDataCostCenterCode(".select_cost_center_code");
                        loadDataAbsentCode('.select_finger_absent_code');
                        loadDataAbsentCode('.select_absent_code');
                        loadDataOvertimeCode('.select_overtime_code');
                        loadDataPosition('.select_position');
                        loadDataLocation('.select_location');
                        loadDataGrade('.select_grade');

                        pickrActualDateIn = initDatePicker('.actual_date_in');
                        pickrActualDateOut = initDatePicker('.actual_date_out');

                        pickrActualTimeIn = initTimePicker('.actual_time_in');
                        pickrActualTimeOut = initTimePicker('.actual_time_out');
                        pickrTotalActualHour = initTimePicker('.total_actual_hour');
                        pickrFingerAbsentHour = initTimePicker('.finger_absent_hour');
                        pickrAbsentHour = initTimePicker('.absent_hour');
                        pickrOvertimeBefore = initTimePicker('.overtime_before');
                        pickrOvertimeStart = initTimePicker('.overtime_start');
                        pickrOvertimeFinish = initTimePicker('.overtime_finish');
                        pickrOvertimeHour = initTimePicker('.overtime_hour');
                        pickrOvertimeBot = initTimePicker('.overtime_bot');
                        pickrTotalNormalHour = initTimePicker('.total_normal_hour');
                        pickrNormalHourIn = initTimePicker('.normal_hour_in');
                        pickrNormalHourOut = initTimePicker('.normal_hour_out');
                        pickrNormalOvertimeBefore = initTimePicker('.normal_overtime_before');
                        pickrNormalOvertimeAfter = initTimePicker('.normal_overtime_after');

                        $('.actual_time_in, .actual_time_out').on('change', function () {
                            var noTmp = $(this).data('no');
                            var actual_date_out = moment($('#actual_date_out'+noTmp).val()).format('DD/MM/YYYY');
                            var actual_date_in = moment($('#actual_date_in'+noTmp).val()).format('DD/MM/YYYY');
                            var actual_time_out = $('#actual_time_out'+noTmp).val();
                            var actual_time_in = $('#actual_time_in'+noTmp).val();

                            const DateIn = actual_date_in + " " + actual_time_in;
                            const DateOut = actual_date_out + " " + actual_time_out;

                            const difference = moment(DateOut, "DD/MM/YYYY HH:mm").diff(moment(DateIn, "DD/MM/YYYY HH:mm"));
                            const diff = moment.utc(difference).format("HH:mm");

                            $('#finger_absent_hour'+noTmp).val(diff);
                        });

                        $.each(response, function(k, v) {
                            // console.log($('#day' + (k+1)).find("option[value='" + v.day + "']").length);
                            // var newOption = new Option("Normal", v.day, true, true);
                            // $('#day' + (k+1)).append(newOption).trigger('change');
                            // loadDataDetailDayCode('#day' + (k+1), ((typeof v.day !== 'undefined' && v.day !== null) ? v.day : ''));
                            // loadDataDetailShiftCode('#shift_code' + (k+1), ((typeof v.shiftCode !== 'undefined' && v.shiftCode !== null) ? v.shiftCode : ''));
                            // loadDataDetailCostCenterCode('#cost_center_code' + (k+1), ((typeof v.costCenterCode !== 'undefined' && v.costCenterCode !== null) ? v.costCenterCode : ''));
                            // loadDataDetailOvertimeCode('#overtime_code' + (k+1), ((typeof v.ovtCode !== 'undefined' && v.ovtCode !== null) ? v.ovtCode : ''));
                            // loadDataDetailFingerAbsentCode('#finger_absent_code' + (k+1), ((typeof v.absentCode !== 'undefined' && v.absentCode !== null) ? v.absentCode : ''));
                            // loadDataDetailAbsentCode('#absent_code' + (k+1), ((typeof v.absentCode2 !== 'undefined' && v.absentCode2 !== null) ? v.absentCode2 : ''));
                            // loadDataDetailPosition('#position' + (k+1), ((typeof v.positionCode !== 'undefined' && v.positionCode !== null) ? v.positionCode : ''));
                            // loadDataDetailLocation('#location' + (k+1), ((typeof v.locationCode !== 'undefined' && v.locationCode !== null) ? v.locationCode : ''));
                            // loadDataDetailGrade('#grade' + (k+1), ((typeof v.gradeCode !== 'undefined' && v.gradeCode !== null) ? v.gradeCode : ''));

                            pickrActualDateIn[k].setDate(((typeof v.actualDateIn !== 'undefined' && v.actualDateIn !== null) ? v.actualDateIn : ''));
                            pickrActualDateOut[k].setDate(((typeof v.actualDateOut !== 'undefined' && v.actualDateOut !== null) ? v.actualDateOut : ''));
                            pickrActualTimeIn[k].setDate(((typeof v.actualTimeIn !== 'undefined' && v.actualTimeIn !== null) ? v.actualTimeIn : ''));
                            pickrActualTimeOut[k].setDate(((typeof v.actualTimeOut !== 'undefined' && v.actualTimeOut !== null) ? v.actualTimeOut : ''));
                            pickrTotalActualHour[k].setDate(((typeof v.totalActualHour !== 'undefined' && v.totalActualHour !== null) ? v.totalActualHour : ''));
                            pickrFingerAbsentHour[k].setDate(((typeof v.fingerAbsentHour !== 'undefined' && v.fingerAbsentHour !== null) ? v.fingerAbsentHour : ''));
                            pickrAbsentHour[k].setDate(((typeof v.absentHour !== 'undefined' && v.absentHour !== null) ? v.absentHour : ''));
                            pickrOvertimeBefore[k].setDate(((typeof v.overtimeBefore !== 'undefined' && v.overtimeBefore !== null) ? v.overtimeBefore : ''));
                            pickrOvertimeStart[k].setDate(((typeof v.overtimeStart !== 'undefined' && v.overtimeStart !== null) ? v.overtimeStart : ''));
                            pickrOvertimeFinish[k].setDate(((typeof v.overtimeFinish !== 'undefined' && v.overtimeFinish !== null) ? v.overtimeFinish : ''));
                            pickrOvertimeHour[k].setDate(((typeof v.overtimeHour !== 'undefined' && v.overtimeHour !== null) ? v.overtimeHour : ''));
                            pickrOvertimeBot[k].setDate(((typeof v.overtimeBot !== 'undefined' && v.overtimeBot !== null) ? v.overtimeBot : ''));
                            pickrTotalNormalHour[k].setDate(((typeof v.totalNormalHour !== 'undefined' && v.totalNormalHour !== null) ? v.totalNormalHour : ''));
                            pickrNormalHourIn[k].setDate(((typeof v.normalHourIn !== 'undefined' && v.normalHourIn !== null) ? v.normalHourIn : ''));
                            pickrNormalHourOut[k].setDate(((typeof v.normalHourOut !== 'undefined' && v.normalHourOut !== null) ? v.normalHourOut : ''));
                            pickrNormalOvertimeBefore[k].setDate(((typeof v.normalOvertimeBefore !== 'undefined' && v.normalOvertimeBefore !== null) ? v.normalOvertimeBefore : ''));
                            pickrNormalOvertimeAfter[k].setDate(((typeof v.normalOvertimeAfter !== 'undefined' && v.normalOvertimeAfter !== null) ? v.normalOvertimeAfter : ''));
                        });
                    }
                }
            })
        });

        function load_data_table_absenteeism_data_entry_by_date(filter_employee_no_table = '') {
            table = $('#absenteeism_data_entry_by_date_table').DataTable({
                processing: true,
                orderCellsTop: true,
                paging: false,
                "sDom": 'lrtip',
                scrollY: 400,
                scrollX: 400,
                scrollCollapse: true,
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
                ],
                drawCallback: function(settings){
                    // loadDataDay(".select_day");
                },
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
                console.log(overtimeCode);
                if (!$(field).find('option:contains(' + data[0].costCenterDescription + ')').length && overtimeCode !== '') {
                    $(field).append($('<option>').val(data[0].costCenterCode).text(data[0].costCenterDescription));
                }
                $(field).val(data[0].costCenterCode);
                $(field).removeClass('loading');
            });
        }

        function loadDataDetailFingerAbsentCode(field = '', fingerAbsentCode = '') {
            $(field).addClass('spinner-border');
            console.log(fingerAbsentCode);

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