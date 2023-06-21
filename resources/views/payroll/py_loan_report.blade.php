<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_loan_report.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-payroll {
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
    </style>
</head>

<body>
    <div class="div-form">
        <form id="loan_report_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url('/payroll') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_loan_report.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_no_from form-check-label">{{ __('payroll_loan_report.label_employee_no') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="employee_no_to form-check-label">{{ __('payroll_loan_report.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="loan_type_from form-check-label">{{ __('payroll_loan_report.label_loan_type') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="loan_type_from" name="loan_type_from"></select>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="loan_type_to form-check-label">{{ __('payroll_loan_report.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="loan_type_to" name="loan_type_to"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="report_type form-check-label">{{ __('payroll_loan_report.label_report_type') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input type="radio" id="type_loan_report" name="report_type" value="L" checked>
                            <label for="type_loan_report">{{ __('payroll_loan_report.label_loan_report') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="radio" id="type_loan_payment" name="report_type" value="P">
                            <label for="type_loan_payment">{{ __('payroll_loan_report.label_loan_payment') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="report_type form-check-label">&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input type="radio" id="type_summary_report" name="report_type" value="S">
                            <label for="type_summary_report">{{ __('payroll_loan_report.label_summary_report') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="radio" id="type_detail_report" name="report_type" value="D">
                            <label for="type_detail_report">{{ __('payroll_loan_report.label_detail_report') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="report_type form-check-label">&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check">
                            <input type="radio" id="type_loan_schedule" name="report_type" value="C">
                            <label for="type_loan_schedule">{{ __('payroll_loan_report.label_loan_schedule') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row" id="div_loan_type">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="loan_type_one form-check-label">{{ __('payroll_loan_report.label_loan_type') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <select class="form-control select2" id="loan_type_one" name="loan_type_one"></select>
                    </div>
                    <div class="col-3">
                        <select class="form-control select2" id="loan_type_two" name="loan_type_two"></select>
                    </div>
                    <div class="col-3">
                        <select class="form-control select2" id="loan_type_three" name="loan_type_three"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="include_resign">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="include_resign"
                                    name="include_resign" value="true">
                                <label class="form-check-label"
                                    for="include_resign">{{ __('payroll_loan_report.label_include_resign') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="group_authorized_code_from form-check-label">{{ __('payroll_loan_report.label_group_authorized_code') }} <span style="color: red">*</span></label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="group_authorized_code_from" name="group_authorized_code_from"></select>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="group_authorized_code_to form-check-label">{{ __('payroll_loan_report.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="group_authorized_code_to" name="group_authorized_code_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="position form-check-label">{{ __('payroll_loan_report.label_position') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2 select2-hidden-accessible" id="position"
                                name="position[]" multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="ranking form-check-label">{{ __('payroll_loan_report.label_ranking') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="ranking" name="ranking[]"
                                multiple="multiple"></select>
                        </div>
                    </div>
                </div>
                <div class="row" id="div-level">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="location form-check-label">{{ __('payroll_loan_report.label_location') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="location" name="location[]"
                                multiple="multiple"></select>
                        </div>
                        <input type="hidden" class="form-control" id="level_format" name="level_format">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-preview" id="btn-preview" value="preview" style="width: 100%;">
                            <i class="fa fa-eye"></i> {{ __('payroll_loan_report.btn_preview') }}
                        </button>
                    </div>
                    <div class="col-3 desc" id="btn-send-to" style="display: none;">
                        <button class="btn btn-primary" id="btn-send" style="width: 100%;">
                            <i class="fa fa-print"></i> {{ __('payroll_loan_report.btn_send_to') }}
                        </button>
                    </div>
                    <div class="col-3 desc" id="send-to-report">
                        <div class="dropdown">
                            <button style="width: 100%;" class="btn btn-primary dropdown-toggle" id="btn-send-to-report" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i> {{ __('payroll_loan_report.btn_send_to') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" id="send-to-pdf">PDF</a>
                                <a class="dropdown-item" href="#" id="send-to-xls">Excel</a>
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
                        <span class="title-text-notification">{{ __('payroll_loan_report.alert_success') }}</span>
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
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataLoanCode('#loan_type_from');
        loadDataLoanCode('#loan_type_to');
        loadDataLoanCode('#loan_type_one');
        loadDataLoanCode('#loan_type_two');
        loadDataLoanCode('#loan_type_three');
        loadDataGroupAuthorize('#group_authorized_code_from');
        loadDataGroupAuthorize('#group_authorized_code_to');
        loadDataPositionCode();
        loadDataLocationCode();
        loadDataRankingCode();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last'); 
        loadDataFirstLastAllLoanCode('#loan_type_from', 'First');
        loadDataFirstLastAllLoanCode('#loan_type_to', 'Last'); 
        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_to', 'Last');
        loadDataFirstLastAllPosition();
        loadDataFirstLastAllLocation();
        loadDataFirstLastAllRanking();

        $.ajax({
            url: "{{ url('personnel/report/level/check') }}",
            type: "GET",
            success: function (response) {
                $('#level_format').val(response.data[0].levelFormat);
                for (var i = 1; i <= response.data[0].levelFormat; i++) {
                    $('#div-level').append(
                        '<div class="col-2">' +
                        '<div class="form-group">'+
                        '<label for="level' + i + ' form-check-label">' + response.data_level[i - 1]
                        .levelDescription + '</label>' +
                        '</div></div>'+
                        '<div class="col-4">' +
                        '<div class="form-group">' +
                        '<select class="form-control select2" id="level' + i + '" name="level' +
                        i + '[]" multiple="multiple"></select>' +
                        '</div></div>'
                    );

                    loadDataLevelCode('#level' + i, i);
                    loadDataFirstLastAllLevel('#level' + i, i);
                }
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
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

        $('#div_loan_type').hide();

        $('input[type=radio][name=report_type]').change(function() {
            if (this.value == 'S') {
                $('#div_loan_type').show();
            }
            else{
                $('#div_loan_type').hide();
            }
        });

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $(field).select2({
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

        function loadDataFirstLastAllEmployeeNo(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_no/func/api') }}",
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.employeeNo).text(
                    data.fullName);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataLoanCode(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.loanCode + '</div>' +
                        '<div class="col-6">' + data.data.loanDescription + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Loan Code</b></div>' +
                        '<div class="col-6"><b>Loan Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Loan Code',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/loan_code/api') }}",
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
                                    text: item.loanDescription,
                                    id: item.loanCode,
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

        function loadDataFirstLastAllLoanCode(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/loan_code/func/api') }}",
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.loanCode).text(
                    data.loanDescription);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataFirstLastAllGroupAuthorize(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/group_authorize/func/api') }}",
                data: {
                    'func': func,
                    'module': 'PY'
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.groupAuthorizeCode)
                    .text(data.groupAuthorizeDesc);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataGroupAuthorize(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.groupAuthorizeCode + '</div>' +
                        '<div class="col-6">' + data.data.groupAuthorizeDesc + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Group Authorize Code</b></div>' +
                        '<div class="col-6"><b>Group Authorize Desc</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Group Authorize Code',
                allowClear: true,
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
                    url: "{{ url('/group_authorize/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            module: 'PY'
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.groupAuthorizeDesc,
                                    id: item.groupAuthorizeCode,
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

        function loadDataFirstLastAllPosition() {
            $('#position').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/position/func/api') }}",
            }).then(function (data) {
                if (!$('#position').find('option:contains(' + data.positionName + ')').length) {
                    $('#position').append($('<option>').val(data.positionCode).text(data.positionName));
                }
                $('#position').val(data.positionCode);
                $('#position').removeClass('loading');
            });
        }

        function loadDataFirstLastAllLocation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/location/func/api') }}",
            }).then(function (data) {
                if (!$('#location').find('option:contains(' + data.locationName + ')').length) {
                    $('#location').append($('<option>').val(data.locationCode).text(data.locationName));
                }
                $('#location').val(data.locationCode);
            });
        }

        function loadDataFirstLastAllRanking() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/ranking/func/api') }}",
            }).then(function (data) {
                if (!$('#ranking').find('option:contains(' + data.rankingName + ')').length) {
                    $('#ranking').append($('<option>').val(data.rankingCode).text(data.rankingName));
                }
                $('#ranking').val(data.rankingCode);
            });
        }

        function loadDataFirstLastAllLevel(field = '', levelType = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/level/func/api') }}",
                data: {
                    'levelType': levelType
                }
            }).then(function (data) {
                if (!$(field).find('option:contains(' + data.levelName + ')').length) {
                    $(field).append($('<option>').val(data.levelCode).text(data.levelName));
                }
                $(field).val(data.levelCode);
            });
        }

        function loadDataPositionCode() {
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
            $('#position').on('select2:open', function (e) {
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

            $('#position').select2({
                width: '100%',
                placeholder: 'Choose Position',
                allowClear: true,
                multiple: true,
                tags: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/position/all/api') }}",
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

        function loadDataLocationCode() {
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
            $('#location').on('select2:open', function (e) {
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

            $('#location').select2({
                width: '100%',
                placeholder: 'Choose Location',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/location/all/api') }}",
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

        function loadDataRankingCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.rankingCode + '</div>' +
                        '<div class="col-6">' + data.data.rankingName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#ranking').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Ranking Code</b></div>' +
                        '<div class="col-6"><b>Ranking Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#ranking').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/ranking/all/api') }}",
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
                                    text: item.rankingName,
                                    id: item.rankingCode,
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

        function loadDataLevelCode(field = '', levelType = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.levelCode + '</div>' +
                        '<div class="col-6">' + data.data.levelName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Level Code</b></div>' +
                        '<div class="col-6"><b>Level Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Level',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/level/all/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            levelType: levelType
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

        var clicked = "";

        $('#btn-send').click(function (){
            $("#btn-send").prop("disabled", true);
            $("#btn-send").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "DOWNLOAD_PDF";
            $('#loan_report_form').submit();
        });

        $('#send-to-pdf').click(function (){
            $("#btn-send-to-report").prop("disabled", true);
            $("#btn-send-to-report").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "DOWNLOAD_PDF";
            $('#loan_report_form').submit();
        });

        $('#send-to-xls').click(function (){
            $("#btn-send-to-report").prop("disabled", true);
            $("#btn-send-to-report").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "DOWNLOAD_XLS";
            $('#loan_report_form').submit();
        });

        $('#btn-preview').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "PREVIEW";
            $('#loan_report_form').submit();
        });

        if($('#loan_report_form').length > 0){
            $('#loan_report_form').validate({
                submitHandler: function(form){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    if(clicked=="DOWNLOAD_XLS"){
                        $.ajax({
                            xhrFields: {
                                responseType: 'blob',
                            },
                            url: "{{ url('payroll/loan_report/print/excel') }}",
                            type: "POST",
                            data: $('#loan_report_form').serialize(),
                            success: function(result, status, xhr){
                                $('#btn-send-to-report').prop("disabled", false);
                                $("#btn-send-to-report").html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_loan_report.btn_send_to") }}'
                                );
                                
                                if(clicked == "DOWNLOAD_XLS"){
                                    var disposition = xhr.getResponseHeader('content-disposition');
                                    var matches = /"([^"]*)"/.exec(disposition);
                                    var filename = (matches != null && matches[1] ? matches[1] : 'audit_trail.xlsx');

                                    var blob = new Blob([result], {
                                        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                                    });

                                    var link = document.createElement('a');
                                    link.href = window.URL.createObjectURL(blob);
                                    link.download = filename;
                                    
                                    document.body.appendChild(link);

                                    link.click();
                                    document.body.removeChild(link);

                                    clicked = "";
                                }
                            },
                            error: function(response){
                                $('#btn-send-to').prop("disabled", false);
                                $('#btn-send-to').html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_loan_report.btn_send_to") }}'
                                );
                                $('#notification_error').modal('show');
                                $('#message-notification-error').html(response);
                            }
                        });
                    }
                    else
                    {
                        $.ajax({
                            xhrFields: {
                                responseType: 'blob',
                            },
                            url: "{{ url('payroll/loan_report/print') }}",
                            type: "POST",
                            data: $('#loan_report_form').serialize(),
                            success: function(result, status, xhr){
                                $('#btn-send').prop("disabled", false);
                                $("#btn-send").html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_loan_report.btn_send_to") }}'
                                );

                                $('#btn-send-to-report').prop("disabled", false);
                                $("#btn-send-to-report").html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_loan_report.btn_send_to") }}'
                                );

                                $('#btn-preview').prop("disabled", false);
                                $("#btn-preview").html(
                                    '<i class="fa fa-eye"></i> {{ __("payroll_loan_report.btn_preview") }}'
                                );
                                
                                if(clicked == "DOWNLOAD_PDF"){
                                    var disposition = xhr.getResponseHeader('content-disposition');
                                    var matches = /"([^"]*)"/.exec(disposition);
                                    var filename = (matches != null && matches[1] ? matches[1] : 'audit_trail.xlsx');

                                    var blob = new Blob([result], {
                                        type: 'application/pdf'
                                    });

                                    var link = document.createElement('a');
                                    link.href = window.URL.createObjectURL(blob);
                                    link.download = filename;
                                    
                                    document.body.appendChild(link);

                                    link.click();
                                    document.body.removeChild(link);

                                    clicked = "";
                                }
                                else if(clicked == "PREVIEW"){
                                    var disposition = xhr.getResponseHeader('content-disposition');
                                    var matches = /"([^"]*)"/.exec(disposition);
                                    var filename = (matches != null && matches[1] ? matches[1] : 'audit_trail.xlsx');

                                    var blob = new Blob([result], {
                                        type: 'application/pdf'
                                    });

                                    var link = document.createElement('a');
                                    const url = URL.createObjectURL(blob);
                                    link.href = window.open(url, "_blank");

                                    document.body.appendChild(link);
                                    document.body.removeChild(link);

                                    clicked = "";
                                }
                            },
                            error: function(response){
                                $('#btn-send').prop("disabled", false);
                                $('#btn-send').html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_loan_report.btn_send_to") }}'
                                );
                                $('#btn-send-to-report').prop("disabled", false);
                                $('#btn-send-to-report').html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_loan_report.btn_send_to") }}'
                                );
                                $('#btn-preview').prop("disabled", false);
                                $('#btn-preview').html(
                                    '<i class="fa fa-eye"></i> {{ __("payroll_loan_report.btn_preview") }}'
                                );
                                $('#notification_error').modal('show');
                                $('#message-notification-error').html(response);
                            }
                        });
                    }
                }
            })
        }

    });

</script>

</html>