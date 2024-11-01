<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_monthly_jamsostek_report.judul') }}</title>
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
                    <a href="{{ route('payroll', ['moduleID' => 'PY']) }}" target="iframe_dashboard">
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
                    <div class="col-4">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" id="jamsostek_period" name="jamsostek_period"
                                    placeholder="{{ __('payroll_monthly_jamsostek_report.label_jamsostek_period') }}">
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="grand_total"
                                    name="grand_total" value="true">
                                <label
                                    for="grand_total">{{ __('payroll_monthly_jamsostek_report.label_grand_total') }}</label>
                            </div>
                        </div>
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

                <!-- <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="kekurangan_kelebihan">{{ __('payroll_monthly_jamsostek_report.label_kelebihan_kekurangan') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="input-group">
                            <input type="text" class="form-control" id="kekurangan_kelebihan_period_month" name="kekurangan_kelebihan_period_month" value="{{ date('m') }}">
                        </div>
                    </div>
                    <div class="col-0.5">
                        <h4>/</h4>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" id="kekurangan_kelebihan_period_year" name="kekurangan_kelebihan_period_year"  value="{{ date('Y') }}">
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
                </div> -->

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
                        <input type="hidden" class="form-control" id="group_bpjs_name" name="group_bpjs_name" value="">
                    </div>
                </div>
                
                <!-- BUTTON -->
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" id="btn-print" style="width:100%">
                            <i class="fa fa-print"></i> {{ __('payroll_monthly_jamsostek_report.label_print') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary" id="btn-download" style="width:100%; display: none;">
                            <i class="fa fa-download"></i> {{ __('payroll_monthly_jamsostek_report.label_download_excel') }}
                        </button>
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
        var clicked = "";
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        let pickerJamsostekPeriod = $('#jamsostek_period').flatpickr({
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
            pickerJamsostekPeriod.setDate(moment(arrData[0].periodYear.toString() + "-" + arrData[0].periodMonth.toString().padStart(2,0) + "-01").format('YYYY-MM-DD'));
        }
               
        loadDataGroupAuthorized('#group_authorize_code_from');
        loadDataGroupAuthorized('#group_authorize_code_to');

        loadDataFirstLastGroupAuthorized('#group_authorize_code_from', 'First');
        loadDataFirstLastGroupAuthorized('#group_authorize_code_to', 'Last');

        loadDataGroupBPJS('#group_bpjs_code');
        loadDataFirstLastGroupBPJS('#group_bpjs_code', 'First');

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#group_bpjs_code').on('select2:select', function (e) {
            var data = $('#group_bpjs_code').select2('data');
            $('#group_bpjs_name').val(htmlDecode(data[0].title));
        });

        $('#group_bpjs_code').on('select2:unselecting', function (e) {
            $('#group_bpjs_name').val('');
        });

        $('input[name="jamsostek_report_type"]').change(function() {
            var selectedValue = $('input[name="jamsostek_report_type"]:checked').val();
            if(selectedValue == 'formulir2'){
                $('#btn-download').hide();
            }else{
                $('#btn-download').show();
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
        
        function loadDataGroupAuthorized(field = ''){
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
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

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
                        '<div class="col-6">' + data.data.bpjsCode + '</div>' +
                        '<div class="col-6">' + data.data.bpjsNo + '</div>' +
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
                                    text: item.bpjsCode,
                                    id: item.bpjsCode,
                                    title: item.bpjsNo,
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
                // var option = new Option(data.bpjsCode, data.bpjsCode, true, true);
                var option = $('<option/>', {
                    id: data.bpjsCode,
                    title: data.bpjsNo,
                    text: data.bpjsCode
                });
                $(field).append(option).trigger('change');
                $('#group_bpjs_name').val(htmlDecode(data.bpjsNo));
            });
        }

        $('#btn-print').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            
            clicked = "DOWNLOAD_PDF";
            $('#monthly_jamsostek_report_form').submit();
        });

        $('#btn-download').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            clicked = "DOWNLOAD_XLS";
            $('#monthly_jamsostek_report_form').submit();
        });

        function blobToString(b) {
            var u, x;
            u = URL.createObjectURL(b);
            x = new XMLHttpRequest();
            x.open('GET', u, false); // although sync, you're not fetching over internet
            x.send();
            URL.revokeObjectURL(u);
            return x.responseText;
        }

        if($('#monthly_jamsostek_report_form').length > 0){
            $('#monthly_jamsostek_report_form').validate({
                rules: {
                    group_authorize_from: {
                        required: true,
                    },
                    group_authorize_to: {
                        required: true,
                    },
                },
                messages: {
                    group_authorize_from: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    group_authorize_to: {
                        required: "{{ __('personel_employee_list.field_required') }}",
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
                    $('#btn-print').prop("disabled", false);
                    $('#btn-print').html(
                        '<i class="fa fa-print"></i> {{ __("payroll_monthly_jamsostek_report.label_print") }}'
                    );

                    $('#btn-download').prop("disabled", false);
                    $('#btn-download').html(
                        '<i class="fa fa-download"></i> {{ __("payroll_monthly_jamsostek_report.label_download_excel") }}'
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
                            url: "{{ url('payroll/monthly_jamsostek_report/print/excel') }}",
                            type: "POST",
                            data: $('#monthly_jamsostek_report_form').serialize(),
                            success: function(result, status, xhr){
                                $('#btn-download').prop("disabled", false);
                                $("#btn-download").html(
                                    '<i class="fa fa-download"></i> {{ __("payroll_monthly_jamsostek_report.label_download_excel") }}'
                                );
                                
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
                            },
                            error: function(response){
                                var contentType = result.getResponseHeader('Content-Type');

                                if (contentType === 'application/json') {
                                    $('#btn-download').prop("disabled", false);
                                    $("#btn-download").html(
                                        '<i class="fa fa-download"></i> {{ __("payroll_monthly_jamsostek_report.label_download_excel") }}'
                                    );
                                    
                                    $('#notification_error').modal('show');
                                    $('#message-notification-error').html(result.statusText);
                                } else {
                                    $('#btn-download').prop("disabled", false);
                                    $("#btn-download").html(
                                        '<i class="fa fa-download"></i> {{ __("payroll_monthly_jamsostek_report.label_download_excel") }}'
                                    );
                                    
                                    $('#notification_error').modal('show');
                                    $('#message-notification-error').html('Something Went Wrong');
                                }
                            }
                        });
                    }else{
                        $.ajax({
                            xhrFields: {
                                responseType: 'blob',
                            },
                            url: "{{ url('payroll/monthly_jamsostek_report/print') }}",
                            type: "POST",
                            data: $('#monthly_jamsostek_report_form').serialize(),
                            success: function(result, status, xhr){
                                $('#btn-print').prop("disabled", false);
                                $("#btn-print").html(
                                    '<i class="fa fa-print"></i> {{ __("payroll_monthly_jamsostek_report.label_print") }}'
                                );
                                
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
                            },
                            error: function(result, status, xhr){
                                var contentType = result.getResponseHeader('Content-Type');

                                if (contentType === 'application/json') {
                                    $('#btn-print').prop("disabled", false);
                                    $('#btn-print').html(
                                        '<i class="fa fa-print"></i> {{ __("payroll_monthly_jamsostek_report.label_print") }}'
                                    );
                                    
                                    $('#notification_error').modal('show');
                                    $('#message-notification-error').html(result.statusText);
                                } else {
                                    $('#btn-print').prop("disabled", false);
                                    $('#btn-print').html(
                                        '<i class="fa fa-print"></i> {{ __("payroll_monthly_jamsostek_report.label_print") }}'
                                    );
                                    
                                    $('#notification_error').modal('show');
                                    $('#message-notification-error').html('Something Went Wrong');
                                }
                            }
                        });
                    }
                }
            })
        }
    });

</script>

</html>