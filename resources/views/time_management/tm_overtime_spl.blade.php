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
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/time_management_detail.css') }}">
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
            <a class="btn btn-danger" href="{{ url('time_management/input_balance_leave') }}" target="iframe_dashboard"
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
                            <div class="col-3">
                                <div class="form-group">
                                    <label
                                        for="shift">{{ __('tm_overtime_spl.label_shift') }}</label>
                                    <select class="form-control select2" id="shift" name="shift"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="code">{{ __('tm_overtime_spl.label_code') }}</label>
                                    <select class="form-control select2" id="code" name="code"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">{{ __('tm_overtime_spl.label_description') }}</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder={{ __('tm_overtime_spl.label_description') }} disabled>
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
                                    <label for="start">{{ __('tm_overtime_spl.label_start') }}</label>
                                    <input type="text" class="form-control" id="start" name="start"
                                        placeholder={{ __('tm_overtime_spl.label_start') }}>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="finish">{{ __('tm_overtime_spl.label_finish') }}</label>
                                    <input type="text" class="form-control" id="finish" name="finish"
                                        placeholder={{ __('tm_overtime_spl.label_finish') }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hour">{{ __('tm_overtime_spl.label_hour') }}</label>
                                    <input type="text" class="form-control" id="hour" name="hour"
                                        placeholder={{ __('tm_overtime_spl.label_hour') }}>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="convert">{{ __('tm_overtime_spl.label_convert') }}</label>
                                    <input type="text" class="form-control" id="convert" name="convert"
                                        placeholder={{ __('tm_overtime_spl.label_convert') }}>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btn-save-employment-data" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('tm_overtime_spl.btn_save') }}</button>
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
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

    $(document).ready(function () {
        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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
                                    text: item.fullName,
                                    id: item.employeeNo,
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
    });
</script>
</html>