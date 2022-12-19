<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_monthly_jamsostek_report.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .cb_size{
            height:25px;
            width:25px;
        }
    </style>
</head>
<body>
    <div class="div-form">
        <form id="monthly_jamsostek_report_form">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url('payroll') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_monthly_jamsostek_report.judul_form') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="jamsostek_period">{{ __('payroll_monthly_jamsostek_report.label_jamsostek_period') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <input type="text" class="form-control" id="jamsostek_period_month" name="jamsostek_period_month" readonly>
                    </div>
                    <div class="col-0.5">
                        <h4>/</h4>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" id="jamsostek_period_year" name="jamsostek_period_year" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="radio" id="form2" name="jamsostek_report_type" value="formulir2">
                            <label for="form2">{{ __('payroll_monthly_jamsostek_report.label_formulir_2') }}</label>
                            <br>
                            <input type="radio" id="form1a" name="jamsostek_report_type" value="formulir1a">
                            <label for="form1a">{{ __('payroll_monthly_jamsostek_report.label_formulir_1a') }}</label>
                            <br>
                            <input type="radio" id="form1b" name="jamsostek_report_type" value="formulir1b">
                            <label for="form1b">{{ __('payroll_monthly_jamsostek_report.label_formulir_1b') }}</label>
                            <br>
                            <input type="radio" id="form2a" name="jamsostek_report_type" value="formulir2a">
                            <label for="form2a">{{ __('payroll_monthly_jamsostek_report.label_formulir_2a') }}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="kekurangan_kelebihan">{{ __('payroll_monthly_jamsostek_report.label_kelebihan_kekurangan') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="input-group">
                            <input type="text" class="form-control" id="kekurangan_kelebihan_period_month" name="kekurangan_kelebihan_period_month">
                        </div>
                    </div>
                    <div class="col-0.5">
                        <h4>/</h4>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" id="kekurangan_kelebihan_period_year" name="kekurangan_kelebihan_period_year">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="jkk">{{ __('payroll_monthly_jamsostek_report.label_JKK') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="jkk" name="jkk">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="jht">{{ __('payroll_monthly_jamsostek_report.label_JHT') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="jht" name="jht">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="jk">{{ __('payroll_monthly_jamsostek_report.label_JK') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="jk" name="jk">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="jp">{{ __('payroll_monthly_jamsostek_report.label_JP') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="jp" name="jp">
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="jdi">{{ __('payroll_monthly_jamsostek_report.label_JDI') }}</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="jdi" name="jdi">
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="group_authorize_code_from">{{ __('payroll_monthly_jamsostek_report.label_group_authorize_code') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="group_authorize_code_from" name="group_authorize_code_from"></select>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="group_authorize_code_to form-check-label">{{ __('payroll_monthly_jamsostek_report.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="group_authorize_code_to" name="group_authorize_code_to"></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="group_bpjs_code">{{ __('payroll_monthly_jamsostek_report.label_group_bpjs') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                    <select class="form-control select2" id="group_bpjs_code" name="group_bpjs_code"></select>
                    </div>
                </div>
                
                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" id="btn-print" style="width:100%">
                            <i class="fa fa-print"></i> {{ __('payroll_monthly_jamsostek_report.label_print') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
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

        var arrData = @json($data);

        if (arrData) {
            var period_month = moment(arrData[0].periodMonth.toString()).format('MM');
            var period_year = moment(arrData[0].periodYear.toString()).format('YYYY');

            $('#jamsostek_period_month').val(period_month);
            $('#jamsostek_period_year').val(period_year);
        }
               
        loadDataGroupAuthorized('#group_authorize_code_from');
        loadDataGroupAuthorized('#group_authorize_code_to');

        loadDataFirstLastGroupAuthorized('#group_authorize_code_from', 'First');
        loadDataFirstLastGroupAuthorized('#group_authorize_code_to', 'Last');

        loadDataGroupBPJS('#group_bpjs_code');
        loadDataFirstLastGroupBPJS('#group_bpjs_code', 'First');



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
        
        function loadDataGroupAuthorized(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Group Authorize Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.groupAuthorizeCode + '</div>' +
                        '<div class="col-6">' + data.data.groupAuthorizeDesc + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $authorizedCode = $(field).select2({
                width: '100%',
                placeholder: 'Choose Authorized Code',
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

        function loadDataFirstLastGroupAuthorized(field = '', func = ''){
            $.ajax({
                type: 'GET',
                url: "{{ url('/group_authorize/func/api') }}",
                data: {
                    'func': func,
                    'module': 'PY'
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.groupAuthorizeCode).text(
                    data.groupAuthorizeDesc);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataGroupBPJS(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>BPJS Code</b></div>' +
                        '<div class="col-6"><b>BPJS No</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.bpjsCode + '</div>' +
                        '<div class="col-6">' + data.data.bpjsNo + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $authorizedCode = $(field).select2({
                width: '100%',
                placeholder: 'Choose BPJS Code',
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
                    url: "{{ url('/bpjs/api') }}",
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
                                    text: item.bpjsNo,
                                    id: item.bpjsCode,
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

        function loadDataFirstLastGroupBPJS(field = '', func = ''){
            $.ajax({
                type: 'GET',
                url: "{{ url('/bpjs/func/api') }}",
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.bpjsCode).text(
                    data.bpjsNo);
                $(field).append($newOption).trigger('change');
            });
        }
    });

</script>

</html>