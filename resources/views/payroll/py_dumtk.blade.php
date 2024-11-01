<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_dumtk.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
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
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
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
        <form id="dumtk_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ route('payroll', ['moduleID' => 'PY']) }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_dumtk.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="as_of_period">{{ __('payroll_dumtk.label_as_of_period') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="as_of_period" name="as_of_period"
                                    placeholder="{{ __('payroll_dumtk.label_as_of_period') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="employee_no_from form-check-label">{{ __('payroll_dumtk.label_employee_no') }}</label>
                            <span style="color: red">*</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="employee_no_to form-check-label">{{ __('payroll_dumtk.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="group_authorized_code_from form-check-label">{{ __('payroll_dumtk.label_group_authorized_code') }}</label>
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
                            <label for="group_authorized_code_to form-check-label">{{ __('payroll_dumtk.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="group_authorized_code_to" name="group_authorized_code_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="bpjs_group_from form-check-label">{{ __('payroll_dumtk.label_bpjs_group') }}</label>
                            <span style="color: red">*</span>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="bpjs_group_from" name="bpjs_group_from"></select>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label for="bpjs_group_to form-check-label">{{ __('payroll_dumtk.label_to') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control select2" id="bpjs_group_to" name="bpjs_group_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-preview" id="btn-preview" style="width: 100%;">
                            <i class="fa fa-eye"></i> {{ __('payroll_dumtk.btn_preview') }}
                        </button>
                    </div>
                    <div class="col-3 desc" id="send-to-slip" style="display: none;">
                        <button class="btn btn-primary" id="btn-send" style="width: 100%;">
                            <i class="fa fa-print"></i> {{ __('payroll_dumtk.btn_send_to') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" name="btn-send-to" id="btn-send-to" style="width: 100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-print"></i> {{ __('payroll_dumtk.btn_send_to') }}
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
                        <span class="title-text-notification">{{ __('payroll_dumtk.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_loading" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="div-title-notification">
                        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
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
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var clicked = "";

        let pickerPeriod = $('#as_of_period').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            // defaultDate: "today",
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
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        var arrData = @json($data);

        if (arrData) {
            pickerPeriod.setDate(arrData[0].periodYear + "-" + arrData[0].periodMonth + "-01");
        }

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataGroupAuthorize('#group_authorized_code_from');
        loadDataGroupAuthorize('#group_authorized_code_to');
        loadDataBPJSGroup('#bpjs_group_from');
        loadDataBPJSGroup('#bpjs_group_to');

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');
        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_to', 'Last');
        loadDataFirstLastAllBPJSGroup('#bpjs_group_from', 'First');
        loadDataFirstLastAllBPJSGroup('#bpjs_group_to', 'Last');

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

        function loadDataFirstLastAllBPJSGroup(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/bpjs/func/api') }}",
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.bpjsCode)
                    .text(data.bpjsNo);
                $(field).append($newOption).trigger('change');
            });
        }

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
                            module: 'PY',
                            isRange: false
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

        function loadDataBPJSGroup(field = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.bpjsCode + '<div>' +
                        '<div class="col-6">' + data.data.bpjsNo + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>BPJS Code</b></div>' +
                        '<div class="col-6"><b>BPJS No</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose BPJS Group',
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

        $('#send-to-pdf').click(function (){
            $("#btn-send-to").prop("disabled", true);
            $("#btn-send-to").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "DOWNLOAD_PDF";
            $('#dumtk_form').submit();
        });

        $('#send-to-xls').click(function (){
            $("#btn-send-to").prop("disabled", true);
            $("#btn-send-to").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "DOWNLOAD_XLS";
            $('#dumtk_form').submit();
        });

        $('#btn-preview').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            clicked = "PREVIEW";
            $('#dumtk_form').submit();
        });

        if($('#dumtk_form').length > 0){
            $('#dumtk_form').validate({
                rules: {
                    employee_no_from: {
                        required: true
                    },
                    employee_no_to: {
                        required: true
                    },
                    group_authorized_code_from: {
                        required: true
                    },
                    group_authorized_code_to: {
                        required: true
                    },
                    bpjs_group_from: {
                        required: true
                    },
                    bpjs_group_to: {
                        required: true
                    }
                },
                messages: {
                    employee_no_from: {
                        required: "{{ __('payroll_dumtk.employee_no_from_required') }}"
                    },
                    employee_no_to: {
                        required: "{{ __('payroll_dumtk.employee_no_to_required') }}"
                    },
                    group_authorized_code_from: {
                        required: "{{ __('payroll_dumtk.group_authorized_code_from_required') }}"
                    },
                    group_authorized_code_to: {
                        required: "{{ __('payroll_dumtk.group_authorized_code_to_required') }}"
                    },
                    bpjs_group_from: {
                        required: "{{ __('payroll_dumtk.bpjs_group_from_required') }}"
                    },
                    bpjs_group_to: {
                        required: "{{ __('payroll_dumtk.bpjs_group_to_required') }}"
                    }
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-preview").prop("disabled", false);
                    $("#btn-preview").html(
                        '<i class="fa fa-eye"></i> {{ __("payroll_dumtk.btn_preview") }}'
                    );

                    $("#btn-send-to").prop("disabled", false);
                    $("#btn-send-to").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_dumtk.btn_send_to") }}'
                    );

                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
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
                            url: "{{ url('payroll/dumtk/print/excel') }}",
                            type: "POST",
                            data: $('#dumtk_form').serialize(),
                            success: function(result, status, xhr){
                                $('#btn-send').prop("disabled", false);
                                $("#btn-send").html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_severance_report.btn_send_to") }}'
                                );
                                
                                $('#btn-send-to').prop("disabled", false);
                                $("#btn-send-to").html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_dumtk.btn_send_to") }}'
                                );
                                
                                if(clicked == "DOWNLOAD_XLS"){
                                    var disposition = xhr.getResponseHeader('content-disposition');
                                    var matches = /"([^"]*)"/.exec(disposition);
                                    var filename = (matches != null && matches[1] ? matches[1] : 'noname_file.xlsx');

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
                                    '<i class="fa fa-print"></i> {{ __("payroll_dumtk.btn_send_to") }}'
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
                            url: "{{ url('payroll/dumtk/print') }}",
                            type: "POST",
                            data: $('#dumtk_form').serialize(),
                            success: function(result, status, xhr){
                                $('#btn-send-to').prop("disabled", false);
                                $("#btn-send-to").html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_dumtk.btn_send_to") }}'
                                );

                                $('#btn-preview').prop("disabled", false);
                                $("#btn-preview").html(
                                    '<i class="fa fa-eye"></i> {{ __("payroll_dumtk.btn_preview") }}'
                                );
                                
                                if(clicked == "DOWNLOAD_PDF"){
                                    var disposition = xhr.getResponseHeader('content-disposition');
                                    var matches = /"([^"]*)"/.exec(disposition);
                                    var filename = (matches != null && matches[1] ? matches[1] : 'noname_file.xlsx');

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
                                    var filename = (matches != null && matches[1] ? matches[1] : 'noname_file.xlsx');

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
                                    '<i class="fa fa-print"></i> {{ __("payroll_dumtk.btn_send_to") }}'
                                );
                                $('#btn-send-to').prop("disabled", false);
                                $('#btn-send-to').html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_dumtk.btn_send_to") }}'
                                );
                                $('#btn-preview').prop("disabled", false);
                                $('#btn-preview').html(
                                    '<i class="fa fa-eye"></i> {{ __("payroll_dumtk.btn_preview") }}'
                                );
                                $('#notification_error').modal('show');
                                $('#message-notification-error').html(response);
                            }
                        });
                    }
                }
            })
        }
    })
</script>

</html>