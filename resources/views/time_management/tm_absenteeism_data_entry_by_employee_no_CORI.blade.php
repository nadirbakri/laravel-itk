<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_absenteeism_data_entry_by_employee_no.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedcolumns/4.3.0/css/fixedColumns.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.min.js"> --}}
    {{-- <link rel="stylesheet" href="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css"> --}}
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data_CORI.css') }}">
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
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-success {
            border-bottom:1px solid #eee;
            background-color: #00a862;
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

        .row {
            margin: 0;
        }

        .form-group {
            margin-bottom: 0.5rem;
        }

        .label-xs {
            font-size: 1vw;
        }

        .form-control-xs {
            padding: 0.1rem 0.25rem;
            font-size: 0.75rem;
            line-height: 1.2;
            height: 1.5rem;
        }

        .input-group-prepend {
            font-size: 0.75rem;
            line-height: 1.2;
            height: 1.5rem;
        }

        .select2-dropdown .select2-results__option {
            font-size: 11px;
        }

        .select2-dropdown {
            width: 30rem !important;
        }

        .select2-container--default.select2-xs .select2-selection--single {
            padding: 0 0.25rem;            /* padding kiri-kanan */
            height: 1.5rem;
            font-size: 0.75rem;
            line-height: 1.5rem;           /* ini yang sejajarkan teks vertikal */
            display: flex;
            align-items: center;          /* untuk vertikal centering */
        }

        .select2-container--default.select2-xs .select2-selection__rendered {
            width: 100%;
        }

        .select2-container--default.select2-xs .select2-selection--single .select2-selection__arrow {
            height: 15px
        }

        table.dataTable thead th, table.dataTable thead td {
            padding: 1px 3px;
            border-bottom: 1px solid #111;
        }

        table.dataTable tbody th, table.dataTable tbody td {
            padding: 1px 3px;
        }

        .table th{
            white-space: normal !important;
        }

        .table th, .table td {
            white-space: nowrap;
            padding: 0.3rem;
            font-size: 0.85em;
            text-align: center !important;
            vertical-align: middle !important;
        }

        .table input {
            font-size: 0.5em;
            padding: 0;
            width: 100%;
            min-width: 2vw;
        }

        .table select {
            font-size: 0.7em;
            padding: 0;
            width: 100%;
            min-width: 2vw;
        }

        .table .select2-container .select2-selection--single {
            height: 22px !important;
            font-size: 9px;
            padding: 1px 2px;
            max-width: 20px;
        }

        .table .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 17px !important;
            font-size: 0.7em;
        }

        .table .select2-container--default .select2-selection--single .select2-selection__arrow {
            display: none !important;
        }

        .table .select2-container--default .select2-selection--single .select2-selection__clear {
            position: absolute;
            right: 1px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #999;
            cursor: pointer;
        }

        .table .select2-container--default .select2-selection--single {
            padding-right: 20px !important;
            min-height: 22px;
            font-size: 9px;
            position: relative;
        }

    </style>
</head>

<body>
    <div class="div-time_management">
        <div class="div-title" style="display: flex; width: 100%; justify-content: space-between;">
            <a href="{{ route('time_management', ['moduleID' => 'TM']) }}" target="iframe_dashboard" style="display: flex; gap: 10px;">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back" style="width: 16px; height: 16px;">
                <span class="title-text" style="font-size: 1vw">{{ __('tm_absenteeism_data_entry_by_employee_no.list') }}</span>
            </a> 
            <div style="display: flex; gap: 12px; margin-right: 12px;">
                {{-- <div class="col-2"> --}}
                    <button type="submit" class="btn btn-primary form-control-xs" name="btn-edit" id="btn-edit"
                        style="width: 100px;">
                        <i class="fa fa-pencil"></i> {{ __('tm_absenteeism_data_entry_by_employee_no.btn_edit') }}
                    </button>
                {{-- </div> --}}
                {{-- <div class="col-2"> --}}
                    <button type="submit" class="btn btn-primary form-control-xs" name="btn-save" id="btn-save"
                        style="width: 100px;" disabled>
                        <i class="fa fa-floppy-o"></i> {{ __('tm_absenteeism_data_entry_by_employee_no.btn_save') }}
                    </button>
                {{-- </div> --}}
            </div>
        </div>
        <div class="div-form">
            <form id="tm_absenteeism_data_entry_by_employee_no_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <div class="form-group label-xs">
                            <label
                                for="employee_no">{{ __('tm_absenteeism_data_entry_by_employee_no.label_employee_no') }}</label>
                            <select class="form-control form-control-xs" id="employee_no" name="employee_no"></select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group label-xs">
                            <label
                                for="employee_name">{{ __('tm_absenteeism_data_entry_by_employee_no.label_employee_name') }}</label>
                            <input type="text" class="form-control form-control-xs" id="employee_name" name="employee_name"
                                placeholder="{{ __('tm_absenteeism_data_entry_by_employee_no.label_employee_name') }}" readonly size="small">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group label-xs">
                            <label
                                for="period">{{ __('tm_absenteeism_data_entry_by_employee_no.label_period') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control form-control-xs" id="period" name="period"
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
        {{-- <div class="row">
            
        </div> --}}
        <form id="absenteeism_data_entry_by_employee_no_table_form" method="post">
            <div class="div-table" width="100%">
                <table id="absenteeism_data_entry_by_employee_no_table" class="table hover" style="font-size: 0.8em; font-weight: lighter">
                    <thead>
                        <tr>
                            <th rowspan="2" class="middle">Absent Date</th>
                            
                            <th rowspan="2" class="middle">Period</th>
                            <th rowspan="2" class="middle">Day</th>
                            <th rowspan="2" class="middle">Shift Code</th>
                            <!-- <th rowspan="2" class="middle">Cost Center Code</th> -->
                            <th colspan="2" class="middle">Actual In</th>
                            <th colspan="2"class="middle">Actual Out</th>
                            <th rowspan="2" class="middle">Total Actual Hour</th>
                            <th colspan="3" class="middle">Summary Absent Code</th>
                            <th colspan="2" class="middle">Shift Hour</th>
                            <th rowspan="2" class="middle">Total Shift Hour</th>
                            <th colspan="2" class="middle">Overtime Shift Hour</th>
                            <th colspan="8" class="middle">Overtime</th>
                            <!-- <th colspan="3" class="middle">Absent</th> -->
                            <!-- <th rowspan="2" class="middle">Position</th>
                            <th rowspan="2" class="middle">Location</th>
                            <th rowspan="2" class="middle">Grade</th> -->
                        </tr>
                        <tr>
                            <th class="middle">Date</th>
                            <th class="middle">Time</th>
                            <th class="middle">Date</th>
                            <th class="middle">Time</th>
                            <th class="middle">Code</th>
                            <th class="middle">Hour</th>
                            <th class="middle">Description</th>
                            <th class="middle">In</th>
                            <th class="middle">Out</th>
                            <th class="middle">Before</th>
                            <th class="middle">After</th>
                            <th class="middle">Code</th>
                            <th class="middle">Before</th>
                            <th class="middle">Start</th>
                            <th class="middle">Finish</th>
                            <th class="middle">Hour</th>
                            <th class="middle">Convert</th>
                            <th class="middle">BOT</th>
                            <th class="middle">Description</th>
                            <!-- <th class="middle">Code</th>
                            <th class="middle">Hour</th>
                            <th class="middle">Description</th> -->
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
<script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js"></script>
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
        var table = null;

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var companyCode = "{{ Session::get('companyCode') }}";

        var pickrPeriod = $('#period').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "Y-m-01", //defaults to "F Y"
                    altFormat: "F Y", //defaults to "F Y"
                })
            ],
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#period-calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        function initDatePicker(field='') {
            return flatpickr(field, {
                allowInput: true,
                altFormat: "d-M-Y",
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
            return flatpickr(field, {
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
                // console.log(response);
                pickrPeriod.setDate(response[0].periodYear + "-" + response[0].periodMonth + "-01");
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        })

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        function isEmpty(obj) {
            for(var prop in obj) {
                if(Object.prototype.hasOwnProperty.call(obj, prop)) {
                    return false;
                }
            }

            return JSON.stringify(obj) === JSON.stringify({});
        }

        load_data_table_absenteeism_data_entry_by_employee_no();

        $('#employee_no, #period').on("select2:select, change", function (e) {
            load_data();
        });

        function load_data(){
            var data = $('#employee_no').select2('data');
            // console.log(data[0]);
            var data2 = $('#period').val();
            $('#employee_name').val(htmlDecode(data[0].title));
            $('#ranking').val(data[0].data.rankingName);
            $('#position').val(data[0].data.positionName);
            $('#location').val(data[0].data.locationName);
            $('#work_pattern').val(data[0].data.patternCodeDescription);
            $('#cost_center').val(data[0].data.costCenterDescription);
            $('#level1').val(data[0].data.levelName1);
            // console.log(data);

            // var filter_employee_no_table = $('#employee_no').val();
            table.clear().draw();

            $.ajax({
                url: "{{ url('time_management/absenteeism_data_entry_by_employee_no/table') }}",
                type: "GET",
                data: {
                    'employeeNo': data[0].id,
                    'period': data2
                },
                success: function (response) {
                    if(!isEmpty(response)){
                        $.each(response, function(k, v) {
                            table.row.add([
                                '<input type="hidden" class="employee_no_table" name="employee_no_table[]" id="employee_no_table" value="'+ data[0].id +'"><input type="hidden" class="absent_date" name="absent_date[]" id="absent_date" value="'+ ((typeof v.absentDate !== 'undefined' && v.absentDate !== null) ? moment(v.absentDate).format('YYYY-MM-DD') : '') +'" style="width: 50px; text-align: center;" readonly>' + ((typeof v.absentDate !== 'undefined' && v.absentDate !== null) ? moment(v.absentDate).format('YYYY-MM-DD') : ''),
                                '<input type="hidden" class="seq_no" name="seq_no[]" id="seq_no" value="'+ ((typeof v.seqNo !== 'undefined' && v.seqNo !== null) ? v.seqNo : '') +'" style="text-align: center;" readonly>' + ((typeof v.seqNo !== 'undefined' && v.seqNo !== null) ? v.seqNo : ''),
                                '<select class="select2 select_day" name="day[]" id="day'+ (k+1) +'" data-no="'+ (k+1) +'" style="font-size: 1px;" disabled></select><input type="hidden" class="" name="day_det[]" id="day_det'+ (k+1) +'">',
                                '<select class="form-control form-control-sm select2 select_shift_code" name="shift_code[]" id="shift_code'+ (k+1) +'" data-no="'+ (k+1) +'" disabled></select><input type="hidden" class="form-control" name="shift_code_det[]" id="shift_code_det'+ (k+1) +'">',
                                // '<select class="form-control select2 select_cost_center_code" name="cost_center_code[]" id="cost_center_code'+ (k+1) +'" disabled></select>',
                                '<div class="input-group">' +
                                    '<input type="text" class="form-control form-control-sm actual_date_in" id="actual_date_in'+ (k+1) +'" name="actual_date_in[]" style="text-align: center;" disabled>' + 
                                '</div>',
                                '<input type="text" class="form-control form-control-sm actual_time_in" name="actual_time_in[]" id="actual_time_in'+ (k+1) +'" data-no="'+ (k+1) +'" style="text-align: center;" disabled>',
                                '<div class="input-group date">' +
                                    '<input type="text" class="form-control form-control-sm actual_date_out" id="actual_date_out" name="actual_date_out[]" style="text-align: center;" disabled>' + 
                                '</div>',
                                '<input type="text" class="form-control form-control-sm actual_time_out" name="actual_time_out[]" id="actual_time_out'+ (k+1) +'" data-no="'+ (k+1) +'" style="text-align: center;" disabled>',
                                '<input type="text" class="form-control form-control-sm total_actual_hour" name="total_actual_hour[]" id="total_actual_hour" style="text-align: center;" readonly>',
                                '<select class="form-control form-control-sm select2 select_overtime_code" name="overtime_code[]" id="overtime_code'+ (k+1) +'" data-no="'+ (k+1) +'" style="text-align: center;" disabled></select><input type="hidden" class="form-control" name="overtime_code_det[]" id="overtime_code_det'+ (k+1) +'">',
                                '<input type="text" class="form-control form-control-sm overtime_before" name="overtime_before[]" id="overtime_before" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm overtime_start" name="overtime_start[]" id="overtime_start" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm overtime_finish" name="overtime_finish[]" id="overtime_finish" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm overtime_hour" name="overtime_hour[]" id="overtime_hour" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm overtime_convert" name="overtime_convert[]" id="overtime_convert" value="'+ ((typeof v.hourOvtCvt !== 'undefined' && v.hourOvtCvt !== null) ? v.hourOvtCvt : '') +'" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm overtime_bot" name="overtime_bot[]" id="overtime_bot" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm overtime_description" name="overtime_description[]" id="overtime_description" value="'+ ((typeof v.descriptionOvt !== 'undefined' && v.descriptionOvt !== null) ? v.descriptionOvt : '') +'" style="text-align: center;" readonly>',
                                '<select class="form-control form-control-sm select2 select_absent_code" name="absent_code[]" id="absent_code'+ (k+1) +'" data-no="'+ (k+1) +'" style="text-align: center;" disabled></select><input type="hidden" class="form-control" name="absent_code_det[]" id="absent_code_det'+ (k+1) +'">',
                                '<input type="text" class="form-control form-control-sm absent_hour" name="absent_hour[]" id="absent_hour" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm absent_description" name="absent_description[]" id="absent_description" value="'+ ((typeof v.descriptionAbsent !== 'undefined' && v.descriptionAbsent !== null) ? v.descriptionAbsent : '') +'" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm normal_hour_in" name="normal_hour_in[]" id="normal_hour_in" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm normal_hour_out" name="normal_hour_out[]" id="normal_hour_out" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm total_normal_hour" name="total_normal_hour[]" id="total_normal_hour" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm normal_overtime_before" name="normal_overtime_before[]" id="normal_overtime_before" style="text-align: center;" readonly>',
                                '<input type="text" class="form-control form-control-sm normal_overtime_after" name="normal_overtime_after[]" id="normal_overtime_after" style="text-align: center;" readonly>',
                                // '<select class="form-control select2 select_finger_absent_code" name="finger_absent_code[]" id="finger_absent_code'+ (k+1) +'" disabled></select>',
                                // '<input type="text" class="form-control finger_absent_hour" name="finger_absent_hour[]" id="finger_absent_hour'+ (k+1) +'" readonly>',
                                // '<input type="text" class="form-control finger_absent_description" name="finger_absent_description[]" id="finger_absent_description" value="'+ ((typeof v.descriptionAbsent !== 'undefined' && v.descriptionAbsent !== null) ? v.descriptionAbsent : '') +'" readonly>',
                                // '<select class="form-control select2 select_position" name="position[]" id="position'+ (k+1) +'" disabled></select>',
                                // '<select class="form-control select2 select_location" name="location[]" id="location'+ (k+1) +'" disabled></select>',
                                // '<select class="form-control select2 select_grade" name="grade[]" id="grade'+ (k+1) +'" disabled></select>'
                            ]);
                        });

                        table.draw();
                        // table.columns.adjust().responsive.recalc();
                        // $($.fn.dataTable.tables({ visible: true, api: true })).DataTable()
                        //         .columns.adjust()
                        //         .responsive.recalc();
                        // });
                        table.columns.adjust().draw();

                        loadDataDay(".select_day");
                        loadDataShiftCode(".select_shift_code");
                        // loadDataCostCenterCode(".select_cost_center_code");
                        // loadDataAbsentCode('.select_finger_absent_code');
                        loadDataAbsentCode('.select_absent_code');
                        loadDataOvertimeCode('.select_overtime_code');
                        // loadDataPosition('.select_position');
                        // loadDataLocation('.select_location');
                        // loadDataGrade('.select_grade');

                        pickrActualDateIn = initDatePicker('.actual_date_in');
                        pickrActualDateOut = initDatePicker('.actual_date_out');

                        pickrActualTimeIn = initTimePicker('.actual_time_in');
                        pickrActualTimeOut = initTimePicker('.actual_time_out');
                        pickrTotalActualHour = initTimePicker('.total_actual_hour');
                        // pickrFingerAbsentHour = initTimePicker('.finger_absent_hour');
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

                            // $('#finger_absent_hour'+noTmp).val(diff);
                            $('#total_actual_hour'+noTmp).val(diff);
                        });

                        $('.select_day').on('change', function () {
                            var noTmp = $(this).data('no');
                            $('#day_det'+noTmp).val($(this).val());
                        });

                        $('.select_shift_code').on('change', function () {
                            var noTmp = $(this).data('no');
                            $('#shift_code_det'+noTmp).val($(this).val());
                        });

                        $('.select_overtime_code').on('change', function () {
                            var noTmp = $(this).data('no');
                            $('#overtime_code_det'+noTmp).val($(this).val());
                        });

                        $('.select_absent_code').on('change', function () {
                            var noTmp = $(this).data('no');
                            $('#absent_code_det'+noTmp).val($(this).val());
                        });

                        $.each(response, function(k, v) {
                            // console.log($('#day' + (k+1)).find("option[value='" + v.day + "']").length);
                            if(v.day != null && v.dayName != null){
                                var newOptionDay = new Option(v.day, v.day, true, true);
                                $('#day' + (k+1)).append(newOptionDay).trigger('change');
                                $('#day_det' + (k+1)).val(v.day);
                            }
                            if(v.shiftCode != null && v.shiftName != null){
                                var newOptionShift = new Option(v.shiftCode, v.shiftCode, true, true);
                                $('#shift_code' + (k+1)).append(newOptionShift).trigger('change');
                                $('#shift_code_det' + (k+1)).val(v.shiftCode);
                            }
                            // if(v.costCenterCode != null && v.costCenterDescription != null){
                            //     var newOptionCostCenter = new Option(v.costCenterDescription, v.costCenterCode, true, true);
                            //     $('#cost_center_code' + (k+1)).append(newOptionCostCenter).trigger('change');
                            // }
                            if(v.ovtCode != null && v.ovtDescription != null){
                                var newOptionOvertime = new Option(v.ovtCode, v.ovtCode, true, true);
                                $('#overtime_code' + (k+1)).append(newOptionOvertime).trigger('change');
                                $('#overtime_code_det' + (k+1)).val(v.ovtCode);
                            }
                            // if(v.absentCode != null && v.absentCodeDescription != null){
                            //     var newOptionFinger = new Option(v.absentCodeDescription, v.absentCode, true, true);
                            //     $('#finger_absent_code' + (k+1)).append(newOptionFinger).trigger('change');
                            // }
                            // if(v.absentCode2 != null && v.absentCode2Description != null){
                            //     var newOptionAbsent = new Option(v.absentCode2Description, v.absentCode2, true, true);
                            //     $('#absent_code' + (k+1)).append(newOptionAbsent).trigger('change');
                            // }
                            if(v.absentCode != null && v.absentCodeDescription != null){
                                var newOptionAbsent = new Option(v.absentCode, v.absentCode, true, true);
                                $('#absent_code' + (k+1)).append(newOptionAbsent).trigger('change');
                                $('#absent_code_det' + (k+1)).val(v.absentCode);
                            }
                            // if(v.positionCode != null && v.positionName != null){
                            //     var newOptionPosition = new Option(v.positionName, v.positionCode, true, true);
                            //     $('#position' + (k+1)).append(newOptionPosition).trigger('change');
                            // }
                            // if(v.locationCode != null && v.locationName != null){
                            //     var newOptionLocation = new Option(v.locationName, v.locationCode, true, true);
                            //     $('#location' + (k+1)).append(newOptionLocation).trigger('change');
                            // }
                            // if(v.gradeCode != null && v.gradeName != null){
                            //     var newOptionGrade = new Option(v.gradeName, v.gradeCode, true, true);
                            //     $('#grade' + (k+1)).append(newOptionGrade).trigger('change');
                            // }
                            // loadDataDetailDayCode('#day' + (k+1), ((typeof v.day !== 'undefined' && v.day !== null) ? v.day : ''));
                            // loadDataDetailShiftCode('#shift_code' + (k+1), ((typeof v.shiftCode !== 'undefined' && v.shiftCode !== null) ? v.shiftCode : ''));
                            // loadDataDetailCostCenterCode('#cost_center_code' + (k+1), ((typeof v.costCenterCode !== 'undefined' && v.costCenterCode !== null) ? v.costCenterCode : ''));
                            // loadDataDetailOvertimeCode('#overtime_code' + (k+1), ((typeof v.ovtCode !== 'undefined' && v.ovtCode !== null) ? v.ovtCode : ''));
                            // loadDataDetailFingerAbsentCode('#finger_absent_code' + (k+1), ((typeof v.absentCode !== 'undefined' && v.absentCode !== null) ? v.absentCode : ''));
                            // loadDataDetailAbsentCode('#absent_code' + (k+1), ((typeof v.absentCode2 !== 'undefined' && v.absentCode2 !== null) ? v.absentCode2 : ''));
                            // loadDataDetailPosition('#position' + (k+1), ((typeof v.positionCode !== 'undefined' && v.positionCode !== null) ? v.positionCode : ''));
                            // loadDataDetailLocation('#location' + (k+1), ((typeof v.locationCode !== 'undefined' && v.locationCode !== null) ? v.locationCode : ''));
                            // loadDataDetailGrade('#grade' + (k+1), ((typeof v.gradeCode !== 'undefined' && v.gradeCode !== null) ? v.gradeCode : ''));
                            
                            pickrActualDateIn[k].setDate(((typeof v.actualDateIn !== 'undefined' && v.actualDateIn !== null) ? moment(v.actualDateIn).format('YYYY-MM-DD') : ''));
                            pickrActualDateOut[k].setDate(((typeof v.actualDateOut !== 'undefined' && v.actualDateOut !== null) ? moment(v.actualDateOut).format('YYYY-MM-DD') : ''));
                            pickrActualTimeIn[k].setDate(((typeof v.actualDateIn !== 'undefined' && v.actualDateIn !== null) ? moment(v.actualDateIn).format('HH:mm:ss') : ''));
                            pickrActualTimeOut[k].setDate(((typeof v.actualDateOut !== 'undefined' && v.actualDateOut !== null) ? moment(v.actualDateOut).format('HH:mm:ss') : ''));
                            pickrTotalActualHour[k].setDate(((typeof v.totalActualHour !== 'undefined' && v.totalActualHour !== null) ? moment(v.totalActualHour).format('HH:mm:ss') : ''));
                            // pickrFingerAbsentHour[k].setDate(((typeof v.hourAbsent !== 'undefined' && v.hourAbsent !== null) ? moment(v.hourAbsent).format('HH:mm:ss') : ''));
                            pickrAbsentHour[k].setDate(((typeof v.hourAbsent !== 'undefined' && v.hourAbsent !== null) ? moment(v.hourAbsent).format('HH:mm:ss') : ''));
                            pickrOvertimeBefore[k].setDate(((typeof v.ovtBeforeIn !== 'undefined' && v.ovtBeforeIn !== null) ? moment(v.ovtBeforeIn).format('HH:mm:ss') : ''));
                            pickrOvertimeStart[k].setDate(((typeof v.ovtIn !== 'undefined' && v.ovtIn !== null) ? moment(v.ovtIn).format('HH:mm:ss') : ''));
                            pickrOvertimeFinish[k].setDate(((typeof v.ovtOut !== 'undefined' && v.ovtOut !== null) ? moment(v.ovtOut).format('HH:mm:ss') : ''));
                            pickrOvertimeHour[k].setDate(((typeof v.hourOvt !== 'undefined' && v.hourOvt !== null) ? moment(v.hourOvt).format('HH:mm:ss') : ''));
                            pickrOvertimeBot[k].setDate(((typeof v.buildInOvt !== 'undefined' && v.buildInOvt !== null) ? moment(v.buildInOvt).format('HH:mm:ss') : ''));
                            pickrTotalNormalHour[k].setDate(((typeof v.totalNormalHour !== 'undefined' && v.totalNormalHour !== null) ? moment(v.totalNormalHour).format('HH:mm:ss') : ''));
                            pickrNormalHourIn[k].setDate(((typeof v.normalDateIn !== 'undefined' && v.normalDateIn !== null) ? moment(v.normalDateIn).format('HH:mm:ss') : ''));
                            pickrNormalHourOut[k].setDate(((typeof v.normalDateOut !== 'undefined' && v.normalDateOut !== null) ? moment(v.normalDateOut).format('HH:mm:ss') : ''));
                            pickrNormalOvertimeBefore[k].setDate(((typeof v.ovtBefore !== 'undefined' && v.ovtBefore !== null) ? moment(v.ovtBefore).format('HH:mm:ss') : ''));
                            pickrNormalOvertimeAfter[k].setDate(((typeof v.ovtAfter !== 'undefined' && v.ovtAfter !== null) ? moment(v.ovtAfter).format('HH:mm:ss') : ''));
                        });
                    }
                }
            })
        }

        $('#btn-edit').on('click', function () {
            $('.select_day').prop('disabled', false);
            $('.select_shift_code').prop('disabled', false);
            // $('.select_cost_center_code').prop('disabled', false);
            $('.actual_date_in').prop('disabled', false);
            $('.actual_time_in').prop('disabled', false);
            $('.actual_date_out').prop('disabled', false);
            $('.actual_time_out').prop('disabled', false);
            $('.total_actual_hour').prop('readonly', false);
            // $('.select_finger_absent_code').prop('disabled', false);
            // $('.finger_absent_hour').prop('readonly', false);
            // $('.finger_absent_description').prop('readonly', false);
            $('.select_absent_code').prop('disabled', false);
            $('.absent_hour').prop('readonly', false);
            $('.absent_description').prop('readonly', false);
            $('.select_overtime_code').prop('disabled', false);
            $('.overtime_before').prop('readonly', false);
            $('.overtime_start').prop('readonly', false);
            $('.overtime_finish').prop('readonly', false);
            $('.overtime_hour').prop('readonly', false);
            $('.overtime_convert').prop('readonly', false);
            $('.overtime_bot').prop('readonly', false);
            $('.overtime_description').prop('readonly', false);
            // $('.select_position').prop('disabled', false);
            // $('.select_location').prop('disabled', false);
            // $('.select_grade').prop('disabled', false);
            $('#btn-save').prop('disabled', false);
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_name').val('');
            $('#ranking').val('');
            $('#position').val('');
            $('#level1').val('');
            $('#location').val('');
            $('#cost_center').val('');
            $('#work_pattern').val('');
            $('#absenteeism_data_entry_by_employee_no_table').DataTable().destroy();
        });

        loadDataEmployeeNo();

        function load_data_table_absenteeism_data_entry_by_employee_no(filter_employee_no_table = '') {
            $('#absenteeism_data_entry_by_employee_no_table').on('shown.bs.collapse', function () {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            table = $('#absenteeism_data_entry_by_employee_no_table').DataTable({
                autoWidth: false,
                processing: true,
                orderCellsTop: true,
                fixedHeader: true,
                paging: false,
                "sDom": 'lrtip',
                scrollY: false,
                scrollX: false,
                scrollCollapse: true,
                ordering: false,
                searching: false,
                fixedColumns: {
                    left: 2
                },
                // aoColumns: [
                //     { "sWidth": '50px' }, // Absent Date
                //     { "sWidth": '40px' },  // Period
                //     { "sWidth": '50px' },  // Day
                //     { "sWidth": '80px' },  // Shift Code
                //     { "sWidth": '90px' },  // Actual In Date
                //     { "sWidth": '50px' },  // Actual In Time
                //     { "sWidth": '90px' },  // Actual Out Date
                //     { "sWidth": '50px' },  // Actual Out Time
                //     { "sWidth": '50px' },  // Total Actual Hour
                //     { "sWidth": '70px' },  // Overtime Code
                //     { "sWidth": '50px' },  // Before OT
                //     { "sWidth": '50px' },  // Start OT
                //     { "sWidth": '50px' },  // Finish OT
                //     { "sWidth": '50px' },  // OT Hour
                //     { "sWidth": '50px' },  // OT Convert
                //     { "sWidth": '50px' },  // OT BOT
                //     { "sWidth": '100px' }, // OT Description
                //     { "sWidth": '70px' },  // Absent Code
                //     { "sWidth": '50px' },  // Absent Hour
                //     { "sWidth": '100px' }, // Absent Description
                //     { "sWidth": '50px' },  // Normal In
                //     { "sWidth": '50px' },  // Normal Out
                //     { "sWidth": '50px' },  // Total Normal Hour
                //     { "sWidth": '50px' },  // Normal OT Before
                //     { "sWidth": '50px' },  // Normal OT After
                // ],
                // drawCallback: function(settings){
                //     // loadDataDay(".select_day");
                // },
            });
        }

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $row = $('<tr class="custom-row">' +
                        '<td>' + data.data.employeeNo + '</td>' +
                        '<td>' + data.data.fullName + '</td>' +
                        '</tr>');

                    return $row;
                }
            }

            var headerIsAppend = false;
            $('#employee_no').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row" style="font-size: 11px;">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }

                if (companyCode === 'CORI' || companyCode === 'CII') {
                    const container = $('#employee_no').data('select2').$container;
                    container.addClass('select2-xs').css('padding', '0');
                }
            });

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
                    url: "{{ url('/employee_no/api') }}",
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

            if (companyCode === 'CORI' || companyCode === 'CII') {
                const container = $('#employee_no').data('select2').$container;
                container.addClass('select2-xs');

                $('#employee_no').addClass('form-control-xs');
            }
        }

        function loadDataDetailDayCode(field = '', dayCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/day_code/func/api') }}",
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
                url: "{{ url('/shift_code/func/api') }}",
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
                url: "{{ url('/cost_center/func/api') }}",
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
                url: "{{ url('/cost_center/func/api') }}",
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
                url: "{{ url('/absent_code/func/api') }}",
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
                url: "{{ url('/absent_code/func/api') }}",
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

        function loadDataDetailPosition(field = '', positionCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/position/detail/api') }}",
                data: {
                    positionCode : positionCode
                }
            }).then(function (data) {
                // console.log(data);
                if (!$(field).find('option:contains(' + data[0].positionName + ')').length && positionCode !== '') {
                    $(field).append($('<option>').val(data[0].positionCode).text(data[0].positionName));
                }
                $(field).val(data[0].positionCode);
                $(field).removeClass('loading');
            });
        }

        function loadDataDetailLocation(field = '', locationCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/location/detail/api') }}",
                data: {
                    locationCode : locationCode
                }
            }).then(function (data) {
                // console.log(data);
                if (!$(field).find('option:contains(' + data[0].locationName + ')').length && locationCode !== '') {
                    $(field).append($('<option>').val(data[0].locationCode).text(data[0].locationName));
                }
                $(field).val(data[0].locationCode);
                $(field).removeClass('loading');
            });
        }

        function loadDataDetailGrade(field = '', gradeCode = '') {
            $(field).addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/grade/detail/api') }}",
                data: {
                    gradeCode : gradeCode
                }
            }).then(function (data) {
                // console.log(data);
                if (!$(field).find('option:contains(' + data[0].gradeName + ')').length && gradeCode !== '') {
                    $(field).append($('<option>').val(data[0].gradeCode).text(data[0].gradeName));
                }
                $(field).val(data[0].gradeCode);
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
                    url: "{{ url('/day_code/api') }}",
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
                                    text: item.comGenCode,
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
                        '<div class="col-6">' + data.data.shiftCode + '</div>' +
                        '<div class="col-6">' + data.data.shiftName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Shift Code</b></div>' +
                        '<div class="col-6"><b>Shift Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

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
                    url: "{{ url('/shift_code/api') }}",
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
                                    text: item.shiftCode,
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
                        '<div class="col-6">' + data.data.costCenterCode + '</div>' +
                        '<div class="col-6">' + data.data.costCenterDescription + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Cost Center Code</b></div>' +
                        '<div class="col-6"><b>Cost Center Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

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
                    url: "{{ url('/cost_center/api') }}",
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
                        '<div class="col-6">' + data.data.absentCode + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Absent Code</b></div>' +
                        '<div class="col-6"><b>Absent Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Absent Code',
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
                    url: "{{ url('/absent_code/api') }}",
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
                                    text: item.absentCode,
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
                        '<div class="col-6">' + data.data.absentCode + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Overtime Code</b></div>' +
                        '<div class="col-6"><b>Overtime Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Overtime Code',
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
                    url: "{{ url('/code/api') }}",
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
                                    text: item.absentCode,
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

        function loadDataPosition(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.positionCode + '</div>' +
                        '<div class="col-6">' + data.data.positionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Position Code</b></div>' +
                        '<div class="col-6"><b>Position Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Position Code',
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
                    url: "{{ url('/position/api') }}",
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
                                    text: item.positionName,
                                    id: item.positionCode,
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

        function loadDataLocation(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.locationCode + '</div>' +
                        '<div class="col-6">' + data.data.locationName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Location Code</b></div>' +
                        '<div class="col-6"><b>Location Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Location Code',
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
                    url: "{{ url('/location/api') }}",
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
                                    text: item.locationName,
                                    id: item.locationCode,
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

        function loadDataGrade(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Grade Code</b></div>' +
                        '<div class="col-6"><b>Grade Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.gradeCode + '</div>' +
                        '<div class="col-6">' + data.data.gradeName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Grade Code</b></div>' +
                        '<div class="col-6"><b>Grade Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Grade Code',
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
                    url: "{{ url('/grade/api') }}",
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
                                    text: item.gradeName,
                                    id: item.gradeCode,
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#absenteeism_data_entry_by_employee_no_table_form").submit();
        });

        if ($("#absenteeism_data_entry_by_employee_no_table_form").length > 0) {
            $("#absenteeism_data_entry_by_employee_no_table_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    // var arrData = [];
                    $.ajax({
                        url: "{{ url('time_management/absenteeism_data_entry_by_employee_no/proses') }}",
                        type: "POST", 
                        data: $('#absenteeism_data_entry_by_employee_no_table_form').serialize(),
                        success: function (response) {
                            // console.log(response.status);
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_absenteeism_data_entry_by_employee_no.btn_save") }}'
                                );

                                $('#absenteeism_data_entry_by_employee_no_table').DataTable().destroy();
                                load_data_table_absenteeism_data_entry_by_employee_no();
                                load_data();
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);

                                $('#close').click(function () {
                                    window.location = "{{ url('time_management/absenteeism_data_entry_by_employee_no') }}";
                                })

                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                    // window.location = "{{ url('time_management/absenteeism_data_entry_by_employee_no') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_absenteeism_data_entry_by_employee_no.btn_save") }}'
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

                                setTimeout(function () {
                                    $('#notification_error').modal('hide');
                                    // window.location = "{{ url('time_management/absenteeism_data_entry_by_employee_no') }}";
                                }, 3000);
                            }
                        },
                        error: function (response) {
                            $("#btn-save").prop("disabled", false);
                            $("#btn-save").html(
                                '<i class="fa fa-print"></i> {{ __("tm_absenteeism_data_entry_by_employee_no.btn_save") }}'
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