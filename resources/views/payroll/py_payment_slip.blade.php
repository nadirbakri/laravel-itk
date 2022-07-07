<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
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
        <form id="payment_slip_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url('payroll') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_payment_slip.list') }}</span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="slip_type form-check-label">{{ __('payroll_payment_slip.label_slip_type') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <select name="slip_type" id="slip_type" class="form-control select2">
                            <option value="Salary">{{ __('payroll_payment_slip.label_slip') }}</option>
                            <option value="THR">{{ __('payroll_payment_slip.label_thr') }}</option>
                            <option value="Bonus">{{ __('payroll_payment_slip.label_bonus') }}</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="period form-check-label">{{ __('payroll_payment_slip.label_period') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="period" name="period"
                                placeholder="{{ __('payroll_payment_slip.label_period') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="period_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="period_hidden" name="period_hidden" hidden>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="format_type form-check-label">{{ __('payroll_payment_slip.label_format') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="radio" id="landscape" name="format_type" value="landscape" checked>
                            <label for="landscape">{{ __('payroll_payment_slip.label_landscape') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="radio" id="portrait" name="format_type" value="portrait">
                            <label for="portrait">{{ __('payroll_payment_slip.label_portrait') }}</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="print_date form-check-label">{{ __('payroll_payment_slip.label_print_date') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="print_date" name="print_date"
                                placeholder="{{ __('payroll_payment_slip.label_print_date') }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="print_date_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="print_date_hidden" name="print_date_hidden" hidden>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="employee_no_from form-check-label">{{ __('payroll_payment_slip.label_employee_no') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="employee_no_to form-check-label">{{ __('payroll_payment_slip.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="sort_by form-check-label">{{ __('payroll_payment_slip.label_sort_by') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="radio" id="by_employee_no" name="sort_by" value="by_employee_no" checked>
                            <label for="by_employee_no">{{ __('payroll_payment_slip.label_employee_no') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input type="radio" id="by_level" name="sort_by" value="by_level">
                            <label for="by_level">{{ __('payroll_payment_slip.label_level') }}</label>
                        </div>
                    </div>
                    <div class="col-2 desc" id="choose_level_by_level" style="display:none;">
                        <select class="form-control select2" id="level" name="level"></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="group_authorized_from form-check-label">{{ __('payroll_payment_slip.label_group_authorize_code') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="group_authorized_from" name="group_authorized_from"></select>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="group_authorized_to form-check-label">{{ __('payroll_payment_slip.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <select class="form-control select2" id="group_authorized_to" name="group_authorized_to"></select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="display_logo">{{ __('payroll_payment_slip.label_display_company_code') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <input class="form-control" type="hidden" name="display_logo" value="0">
                        <input class="cb_size form-control" type="checkbox" id="display_logo" name="display_logo" value="1">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" id="btn-preview"style="width: 100%;">
                            <i class="fa fa-eye"></i> {{ __('payroll_payment_slip.btn_preview') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" id="btn-send-to" style="width: 100%;">
                            <i class="fa fa-print"></i> {{ __('payroll_payment_slip.btn_send_to') }}
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

        $("input[name$='sort_by']").click(function(){
            var value=$(this).val();
            $("div.desc").hide();
            $("#choose_level_" + value).show();
        })

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        let pickerPeriod = $('#period').flatpickr({
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
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("period_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerPaymentDateTo = $('#print_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#print_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last'); 
               
        loadDataGroupAuthorized('#group_authorized_from');
        loadDataGroupAuthorized('#group_authorized_to');

        loadDataFirstLastGroupAuthorized('#group_authorized_from', 'First');
        loadDataFirstLastGroupAuthorized('#group_authorized_to', 'Last');

        loadDataLevel('#level');
        loadDataFirstLastLevel('#level', 'First');

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
                url: '/employee_no/func/api',
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.employeeNo).text(
                    data.fullName);
                $(field).append($newOption).trigger('change');
            });
        }
        
        function loadDataGroupAuthorized(field = ''){
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
                    url: '/group_authorize/api',
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
                url: '/group_authorize/func/api',
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.groupAuthorizeCode).text(
                    data.groupAuthorizeDesc);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataLevel(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Level Code</b></div>' +
                        '<div class="col-6"><b>Level Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.levelType + '</div>' +
                        '<div class="col-6">' + data.data.levelName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $levelCode = $(field).select2({
                width: '100%',
                placeholder: 'Choose Level Code',
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
                    url: '/level/api',
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
                                    text: item.levelName,
                                    id: item.levelType,
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

        function loadDataFirstLastLevel(field = '', func = ''){
            $.ajax({
                type: 'GET',
                url: '/level/func/api',
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.levelType).text(
                    data.levelName);
                $(field).append($newOption).trigger('change');
            });
        }

        var clicked = "";
        $('#btn-send-to').click(function (){
            $("#btn-send-to").prop("disabled", true);
            $("#btn-send-to").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "DOWNLOAD_PDF";
            $('#payment_slip_form').submit();
        });

        $('#btn-preview').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "PREVIEW";
            $('#payment_slip_form').submit();
        });

        if($('#payment_slip_form').length > 0){
            $('#payment_slip_form').validate({
                submitHandler: function(form){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    // console.log($('#payment_slip_form').serialize());
                    $.ajax({
                        xhrFields: {
                            responseType: 'blob',
                        },
                        url: "{{ url('payroll/payment_slip/print') }}",
                        type: "POST",
                        data: $('#payment_slip_form').serialize(),
                        success: function(result, status, xhr){
                            $('#btn-send-to').prop("disabled", false);
                            $("#btn-send-to").html(
                                '<i class="fa fa-print"></i> {{ __("payroll_payment_slip.btn_send_to") }}'
                            );
                            $('#btn-preview').prop("disabled", false);
                            $("#btn-preview").html(
                                '<i class="fa fa-eye"></i> {{ __("payroll_payment_slip.btn_preview") }}'
                            );

                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] :
                                'audit_trail.xlsx');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'application/pdf'
                            });

                            if(clicked == "DOWNLOAD_PDF"){
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = filename;
                                    
                                document.body.appendChild(link);

                                link.click();
                                document.body.removeChild(link);

                                clicked = "";
                            }
                            else{
                                var link = document.createElement('a');
                                const url = URL.createObjectURL(blob);
                                link.href = window.open(url, "_blank");

                                document.body.appendChild(link);
                                document.body.removeChild(link);
                                clicked = "";
                            }
                        },
                        error: function(response){
                            $('#btn-send-to').prop("disabled", false);
                            $('#btn-send-to').html(
                                '<i class="fa fa-print"></i> {{ __("payroll_payment_slip.btn_send_to") }}'
                            );
                            $('#btn-preview').prop("disabled", false);
                            $('#btn-preview').html(
                                '<i class="fa fa-eye"></i> {{ __("payroll_payment_slip.btn_preview") }}'
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