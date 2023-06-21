<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_transfer_data_to_bank.judul') }}</title>
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

        .row .box {
            border: 1px solid #004883;
            padding: 5px;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="transfer_data_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url('payroll') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_transfer_data_to_bank.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="output_file">{{ __('payroll_transfer_data_to_bank.label_output_file') }}</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <select class="form-control select2" id="output_file" name="output_file">
                            <option value="BANK CENTRAL ASIA">Bank Central Asia</option>
                            <option value="BANK INA">Bank Ina</option>
                            <option value="BTPN">BTPN</option>
                            <option value="BANK INA MULTI ACCOUNT">Bank Ina Multi Account</option>
                            <option value="MCM">MCM Bank Mandiri</option>
                            <!-- <option value="MANDIRI">Bank Mandiri</option> -->
                            <option value="BOT">BOT</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="source_bank">{{ __('payroll_transfer_data_to_bank.label_source_bank') }}</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <select class="form-control select2" id="source_bank" name="source_bank"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="account_number">{{ __('payroll_transfer_data_to_bank.label_account_number') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="account_number" name="account_number"
                                placeholder="{{ __('payroll_transfer_data_to_bank.label_account_number') }}" readonly>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="transfer_code">{{ __('payroll_transfer_data_to_bank.label_transfer_code') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="transfer_code" name="transfer_code"
                                placeholder="{{ __('payroll_transfer_data_to_bank.label_transfer_code') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="transfer_date">{{ __('payroll_transfer_data_to_bank.label_transfer_date') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="transfer_date" name="transfer_date"
                                placeholder="{{ __('payroll_transfer_data_to_bank.label_payment_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="transfer_date_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="employee_no_from">{{ __('payroll_transfer_data_to_bank.label_employee_no') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="employee_no_to form-check-label">{{ __('payroll_transfer_data_to_bank.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="group_authorized_code_from form-check-label">{{ __('payroll_transfer_data_to_bank.label_group_authorize_code') }}</label>
                            <span style="color: red">*</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="group_authorized_code_from" name="group_authorized_code_from"></select>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="group_authorized_code_to form-check-label">{{ __('payroll_transfer_data_to_bank.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="group_authorized_code_to" name="group_authorized_code_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 box">
                        <div class="row">
                            <div class="col-12">
                                <label for="data_to_transfer">{{ __('payroll_transfer_data_to_bank.label_data_to_transfer') }}</label>
                            </div>
                        </div>
                        <div class="row" id="div_data_to_transfer">
                            <div class="col-6">
                                <div class="form-check">
                                    <input type="radio" id="data_to_transfer_transfer_amount" name="data_to_transfer" value="transfer_amount" checked>
                                    <label for="data_to_transfer_transfer_amount">{{ __('payroll_transfer_data_to_bank.label_transfer_amount') }}</label>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input type="radio" id="data_to_transfer_take_homepay_group" name="data_to_transfer" value="take_homepay_group">
                                    <label for="data_to_transfer_take_homepay_group">{{ __('payroll_transfer_data_to_bank.label_takehomepay_group') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 30px;">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check_transfer_amount_salary"
                                        name="check_transfer_amount_salary" value="true">
                                    <label
                                        for="check_transfer_amount_salary">{{ __('payroll_transfer_data_to_bank.label_salary') }}</label>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input type="radio" id="take_homepay_group_one" name="take_homepay_group" value="one" disabled>
                                    <label for="take_homepay_group_one">1</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 30px;">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check_transfer_amount_bonus"
                                        name="check_transfer_amount_bonus" value="true">
                                    <label
                                        for="check_transfer_amount_bonus">{{ __('payroll_transfer_data_to_bank.label_bonus') }}</label>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input type="radio" id="take_homepay_group_two" name="take_homepay_group" value="two" disabled>
                                    <label for="take_homepay_group_two">2</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 30px;">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check_transfer_amount_thr"
                                        name="check_transfer_amount_thr" value="true">
                                    <label
                                        for="check_transfer_amount_thr">{{ __('payroll_transfer_data_to_bank.label_thr') }}</label>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input type="radio" id="take_homepay_group_three" name="take_homepay_group" value="three" disabled>
                                    <label for="take_homepay_group_three">3</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 30px;">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check_transfer_amount_pension"
                                        name="check_transfer_amount_pension" value="true">
                                    <label
                                        for="check_transfer_amount_pension">{{ __('payroll_transfer_data_to_bank.label_pension') }}</label>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input type="radio" id="take_homepay_group_none" name="take_homepay_group" value="none" disabled>
                                    <label for="take_homepay_group_none">{{ __('payroll_transfer_data_to_bank.label_none') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 30px;">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="check_transfer_amount_severance"
                                        name="check_transfer_amount_severance" value="true">
                                    <label
                                        for="check_transfer_amount_severance">{{ __('payroll_transfer_data_to_bank.label_severance') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-process" name="btn-process" id="btn-process">
                            <i class="fa fa-play-circle-o"></i> {{ __('payroll_transfer_data_to_bank.btn_process') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('payroll/transfer_data_to_bank/export_to_file') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_transfer_data_to_bank.btn_cancel') }}
                        </a>
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
                        <span class="title-text-notification">{{ __('payroll_transfer_data_to_bank.alert_success') }}</span>
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

        let pickerTransferDateFrom = $('#transfer_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#transfer_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataGroupAuthorize('#group_authorized_code_from');
        loadDataGroupAuthorize('#group_authorized_code_to');
        loadDataSourceBank();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last'); 
        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_to', 'Last');

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

        $('input[type=radio][name=data_to_transfer]').change(function() {
            if (this.value == 'transfer_amount') {
                $('#check_transfer_amount_salary').prop('disabled', false);
                $('#check_transfer_amount_bonus').prop('disabled', false);
                $('#check_transfer_amount_thr').prop('disabled', false);
                $('#check_transfer_amount_pension').prop('disabled', false);
                $('#check_transfer_amount_severance').prop('disabled', false);
                $('#take_homepay_group_one').prop('disabled', true);
                $('#take_homepay_group_two').prop('disabled', true);
                $('#take_homepay_group_three').prop('disabled', true);
                $('#take_homepay_group_none').prop('disabled', true);
            }else if(this.value == 'take_homepay_group'){
                $('#check_transfer_amount_salary').prop('disabled', true);
                $('#check_transfer_amount_bonus').prop('disabled', true);
                $('#check_transfer_amount_thr').prop('disabled', true);
                $('#check_transfer_amount_pension').prop('disabled', true);
                $('#check_transfer_amount_severance').prop('disabled', true);
                $('#take_homepay_group_one').prop('disabled', false);
                $('#take_homepay_group_two').prop('disabled', false);
                $('#take_homepay_group_three').prop('disabled', false);
                $('#take_homepay_group_none').prop('disabled', false);
            }else{
                $('#check_transfer_amount_salary').prop('disabled', true);
                $('#check_transfer_amount_bonus').prop('disabled', true);
                $('#check_transfer_amount_thr').prop('disabled', true);
                $('#check_transfer_amount_pension').prop('disabled', true);
                $('#check_transfer_amount_severance').prop('disabled', true);
                $('#take_homepay_group_one').prop('disabled', true);
                $('#take_homepay_group_two').prop('disabled', true);
                $('#take_homepay_group_three').prop('disabled', true);
                $('#take_homepay_group_none').prop('disabled', true);
            }
        });

        $('#source_bank').on("select2:select", function (e) {
            var data = $('#source_bank').select2('data');
            // console.log(data);
            $('#account_number').val(data[0].data.accountNo);
            $('#transfer_code').val(data[0].data.description);
        });

        $('#source_bank').on("select2:unselecting", function (e) {
            $('#account_number').val('');
            $('#transfer_code').val('');
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

        function loadDataSourceBank(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.bankCode + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
            
            $('#source_bank').select2({
                width: '100%',
                placeholder: 'Choose Source Bank',
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
                    url: "{{ url('/company_bank_code/api') }}",
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
                                    text: item.bankCode,
                                    id: item.bankCode,
                                    data: item
                                }
                                // console.log(data);
                            })
                        };
                    },
                    cache: true,
                },
                templateResult: formatSelect
            });
        }

        function loadDataReport() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.reportCode + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#report_name').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-12"><b>Report Code</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#report_name').select2({
                width: '100%',
                placeholder: 'Choose Report Code',
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
                    url: "{{ url('/report_code/api') }}",
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
                                    text: item.reportCode,
                                    id: item.reportCode,
                                    title: item.description,
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

        $("#btn-process").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#transfer_data_form").submit();
        });

        if ($("#transfer_data_form").length > 0) {
            $("#transfer_data_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        xhrFields: {
                            responseType: 'blob',
                        },
                        url: "{{ url('payroll/transfer_data/proses') }}",
                        type: "POST",
                        data: $('#transfer_data_form').serialize(),
                        success: function (result, status, xhr) {
                            console.log(xhr.getResponseHeader(
                                'content-disposition'));
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("payroll_transfer_data_to_bank.btn_process") }}'
                            );
                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1].replace(/['"]/g, '') :
                                'audit_trail.csv');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'text/csv'
                            });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (response) {
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("payroll_transfer_data_to_bank.btn_process") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

    });

</script>

</html>