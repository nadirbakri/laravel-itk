<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_overtime_spl.judul') }}</title>
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
                <span class="title-text">{{ __('tm_overtime_spl.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <form id="tm_overtime_spl" method="post">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="employee_no_from">{{ __('tm_overtime_spl.label_employee_no_from') }}</label>
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="employee_no_to">{{ __('tm_overtime_spl.label_employee_no_to') }}</label>
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" name="btn-app-leader" id="btn-app-leader"
                            style="width: 100%;" disabled>{{ __('tm_overtime_spl.btn_app_leader') }}
                        </button>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="check_all_app_leader"
                                    name="check" value="check_all_app_leader">
                                <label class="form-check-label"
                                    for="check_all_app_leader">{{ __('tm_overtime_spl.label_check_all') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="uncheck_all_app_leader"
                                    name="check" value="uncheck_all_app_leader">
                                <label class="form-check-label"
                                    for="uncheck_all_app_leader">{{ __('tm_overtime_spl.label_uncheck_all') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="date_from">{{ __('tm_overtime_spl.label_date_from') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="date_from" name="date_from"
                                    placeholder="{{ __('tm_overtime_spl.label_date_from') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="date_to">{{ __('tm_overtime_spl.label_date_to') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="date_to" name="date_to"
                                    placeholder="{{ __('tm_overtime_spl.label_date_to') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" name="btn-app-hrd" id="btn-app-hrd"
                            style="width: 100%;" disabled>{{ __('tm_overtime_spl.btn_app_hrd') }}
                        </button>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="check_all_app_hrd"
                                    name="check" value="check_all_app_hrd">
                                <label class="form-check-label"
                                    for="check_all_app_hrd">{{ __('tm_overtime_spl.label_check_all') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="uncheck_all_app_hrd"
                                    name="check" value="uncheck_all_app_hrd">
                                <label class="form-check-label"
                                    for="uncheck_all_app_hrd">{{ __('tm_overtime_spl.label_uncheck_all') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="div-table">
            <table id="overtime_spl_table" class="table hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('tm_overtime_spl.table_employee_no') }}</th>
                        <th>{{ __('tm_overtime_spl.table_employee_name') }}</th>
                        <th>{{ __('tm_overtime_spl.table_date') }}</th>
                        <th>{{ __('tm_overtime_spl.table_seq_no') }}</th>
                        <th>{{ __('tm_overtime_spl.table_shift') }}</th>
                        <th>{{ __('tm_overtime_spl.table_before_in') }}</th>
                        <th>{{ __('tm_overtime_spl.table_start') }}</th>
                        <th>{{ __('tm_overtime_spl.table_finish') }}</th>
                        <th>{{ __('tm_overtime_spl.table_hour') }}</th>
                        <th>{{ __('tm_overtime_spl.table_convert') }}</th>
                        <th>{{ __('tm_overtime_spl.table_code') }}</th>
                        <th>{{ __('tm_overtime_spl.table_description') }}</th>
                        <th>{{ __('tm_overtime_spl.table_app_leader') }}</th>
                        <th>{{ __('tm_overtime_spl.table_app_hrd') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-add" id="btn-add"
                style="width: 100%;" data-toggle="modal" data-target="#modal_add_overtime_spl">
                <i class="fa fa-plus"></i> {{ __('tm_overtime_spl.btn_add') }}
            </button>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                style="width: 100%;">
                <i class="fa fa-floppy-o"></i> {{ __('tm_overtime_spl.btn_save') }}
            </button>
        </div>
        <div class="col-2">
            <a class="btn btn-danger" href="{{ url('time_management/overtime_spl') }}" target="iframe_dashboard"
                name="btn-delete" id="btn-delete" style="width: 100%;">
                <i class="fa fa-times-circle"></i> {{ __('tm_overtime_spl.btn_delete') }}
            </a>
        </div>
    </div>
    <div class="modal fade" id="modal_add_overtime_spl" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('tm_overtime_spl.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="overtime_spl_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="employee_no">{{ __('tm_overtime_spl.label_employee_no') }}</label>
                                    <select class="form-control select2" id="employee_no" name="employee_no"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="employee_name">{{ __('tm_overtime_spl.label_employee_name') }}</label>
                                    <input type="text" class="form-control" id="employee_name" name="employee_name"
                                        placeholder={{ __('tm_overtime_spl.label_employee_name') }} disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_overtime_spl">{{ __('tm_overtime_spl.label_date_overtime_spl') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="date_overtime_spl" name="date_overtime_spl"
                                            placeholder="{{ __('tm_overtime_spl.label_date_overtime_spl') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="shift_overtime_spl">{{ __('tm_overtime_spl.label_shift') }}</label>
                                    <select class="form-control select2" id="shift_overtime_spl" name="shift_overtime_spl"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="code_overtime_spl">{{ __('tm_overtime_spl.label_code') }}</label>
                                    <select class="form-control select2" id="code_overtime_spl" name="code_overtime_spl"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">{{ __('tm_overtime_spl.label_description') }}</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder={{ __('tm_overtime_spl.label_description') }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="before_in">{{ __('tm_overtime_spl.label_before_in') }}</label>
                                    <input type="text" class="form-control" id="before_in" name="before_in"
                                        placeholder={{ __('tm_overtime_spl.label_before_in') }}>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="start_overtime_spl">{{ __('tm_overtime_spl.label_start') }}</label>
                                    <input type="text" class="form-control" id="start_overtime_spl" name="start_overtime_spl"
                                        placeholder={{ __('tm_overtime_spl.label_start') }}>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="finish_overtime_spl">{{ __('tm_overtime_spl.label_finish') }}</label>
                                    <input type="text" class="form-control" id="finish_overtime_spl" name="finish_overtime_spl"
                                        placeholder={{ __('tm_overtime_spl.label_finish') }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hour_overtime_spl">{{ __('tm_overtime_spl.label_hour') }}</label>
                                    <input type="text" class="form-control" id="hour_overtime_spl" name="hour_overtime_spl"
                                        placeholder={{ __('tm_overtime_spl.label_hour') }}>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="convert">{{ __('tm_overtime_spl.label_convert') }}</label>
                                    <input type="number" class="form-control" id="convert" name="convert"
                                        placeholder={{ __('tm_overtime_spl.label_convert') }}>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btn-save-overtime-spl" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('tm_overtime_spl.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('tm_overtime_spl.btn_cancel') }}</button>
                </div>
                </form>
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
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> --}}
<script src="differenceHours.js"></script>
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
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

    $(document).ready(function () {
        var hour_min = $('#before_in, #start_overtime_spl, #finish_overtime_spl');

        hour_min.flatpickr({
                enableTime: true,
                noCalendar: true,
                altInput: true,
                static: true,
                allowInput: true,
                defaultDate: "today",
                altFormat: "H:i K",
                dateFormat: "H:i:ss"
        });

        var start_finish = $('#start_overtime_spl, #finish_overtime_spl');

        start_finish.on('change', function () {
            var start = $('#start_overtime_spl').val();
            var finish = $('#finish_overtime_spl').val();

            var diff = (finish - start) / 60000;
            var minutes = diff % 60;
            var hours = (diff - minutes) / 60;

            console.log(diff);

            // $('#hour_overtime_spl').flatpickr({
            //     enableTime: true,
            //     noCalendar: true,
            //     altInput: true,
            //     allowInput: true,
            //     defaultDate: "today",
            //     altFormat: "H:i K",
            //     dateFormat: "H:i:ss"
            // });
        })

        $("#date_overtime_spl").on('change', function() {
            var date_overtime_spl = $("#date_overtime_spl").attr('value');
            // console.log(date_overtime_spl);
            var date = moment(date_overtime_spl).format('DD-MM-YYYY');
            var date2 = moment(date_overtime_spl).format('YYYY-MM-DD');
            // console.log(date);

            // $('#before_in').on('click', function () {
            //     var before_in = $('#before_in').attr('value');
            //     var before_date = before_in + date
            //     return before_date;
            //     console.log(before_date);
            // })

            // console.log($hour_min.attr('value'));
        });


        // var shift = $('#shift_overtime_spl').attr('value');
        // console.log(shift);

        // var before_in = $('#before_in').attr('value');
        // console.log(before_in);

        // console.log($("#before_in").attr('value'));

        // $('#hour_overtime_spl').on('keyup change', function () {
        //     differenceHours.diff_hours('#start_overtime_spl', '#finish_overtime_spl');
        // })

        // var valueStart = $('#start_overtime_spl').attr('value');
        // var valueFinish = $('#finish_overtime_spl').attr('value');

        // console.log(valueStart);

        // var timeStart = new Date (valueStart).getHours();
        // var timeEnd = new Date (valueFinish).getHours();

        // console.log(timeStart);

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataEmployeeNo('#employee_no');
        loadDataShiftCode();
        loadDataCode();

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_name').val(htmlDecode(data[0].title));
            // console.log(data[0].title);
            $.ajax({
                url: "{{ url('time_management/employee_name/detail') }}",
                type: "GET",
                data: {
                    'employeeNo': data[0].id
                },
            })
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_name').val('');
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_data_overtime_spl(employee_no = '') {
            table = $('#overtime_spl_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('time_management/overtime_spl/table') }}",
                    data: {
                        'employeeNo' : employee_no
                    }
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'leaveCode', name: 'leaveCode'},
                    {data: 'leaveBalance', name: 'leaveBalance'},
                    {data: 'leaveBalanceBefore', name: 'leaveBalanceBefore'},
                    {data: 'leaveBalanceBeforeExpiredDate', name: 'leaveBalanceBeforeExpiredDate'}
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $(field).select2({
                width: '100%',
                placeholder: 'Choose Employee',
                allowClear: true,
                // tags: true,
                closeOnSelect: false,
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

        function loadDataShiftCode() {
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

            $('#shift_overtime_spl').select2({
                width: '100%',
                placeholder: 'Choose Shift',
                allowClear: true,
                // tags: true,
                closeOnSelect: false,
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

        function loadDataCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.absentType + '</div>' +
                        '<div class="col-6">' + data.data.absentCode + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#code_overtime_spl').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Absent Type</b></div>' +
                        '<div class="col-6"><b>Absent Code</b></div>' +
                        '</div>';
                    $('.select2-search').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#code_overtime_spl').select2({
                width: '100%',
                placeholder: 'Choose Code',
                allowClear: true,
                // tags: true,
                closeOnSelect: false,
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
                                    text: item.absentCode,
                                    id: item.absentType,
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

        $("#btn-save-overtime-spl").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#overtime_spl_form").submit();
        });

        if ($("#overtime_spl_form").length > 0) {
            $("#overtime_spl_form").validate({
                rules: {
                    employee_no: {
                        required: true,
                    },
                    date_overtime_spl: {
                        required: true,
                    },
                    shift_overtime_spl: {
                        required: true,
                    },
                    code_overtime_spl: {
                        required: true,
                    },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
                    },
                    date_overtime_spl: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
                    },
                    shift_overtime_spl: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
                    },
                    code_overtime_spl: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-save-overtime-spl").prop("disabled", false);
                    $("#btn-save-overtime-spl").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
                    );

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
                        url: "{{ url('time_management/overtime_spl/proses') }}",
                        type: "POST",
                        data: $('#overtime_spl_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-overtime-spl").prop("disabled", false);
                                $("#btn-save-overtime-spl").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/overtime_spl') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-overtime-spl").prop("disabled", false);
                                $("#btn-save-overtime-spl").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
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
                            $("#btn-save-overtime-spl").prop("disabled", false);
                            $("#btn-save-overtime-spl").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
                            );

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }
    });
</script>
</html>