<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_thr_data_entry.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
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

        .required {
            color: red;
        }

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_thr_data_entry.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="thr_data_entry_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_thr_data_entry.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        <input type="text" class="form-control" id="employee_no_hidden" name="employee_no_hidden" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_thr_data_entry.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('payroll_thr_data_entry.label_employee_name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="entry_type">{{ __('payroll_thr_data_entry.label_entry_type') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="entry_type" name="entry_type">
                                <option value="" disabled selected>{{ __('payroll_thr_data_entry.label_select_entry_type') }}</option>
                                <option id="thr" name="thr" value="T">THR</option>
                            </select>
                            <input type="text" class="form-control" id="entry_type_hidden" name="entry_type_hidden" hidden>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="performance_result">{{ __('payroll_thr_data_entry.label_performance_result') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="performance_result" name="performance_result"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="service_month">{{ __('payroll_thr_data_entry.label_service_month') }}</label>
                            <span class="required">*</span>
                            <input type="number" class="form-control" id="service_month" name="service_month"
                                placeholder="{{ __('payroll_thr_data_entry.label_service_month') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_date">{{ __('payroll_thr_data_entry.label_payment_date') }}</label>
                            <span class="required">*</span>
                            <div class="input-group">
                                <input type="text" class="form-control" id="payment_date" name="payment_date"
                                    placeholder="{{ __('payroll_thr_data_entry.label_payment_date') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="payment_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="payment_date_hidden" name="payment_date_hidden" hidden>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="currency_code">{{ __('payroll_thr_data_entry.label_currency_code') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="currency_code" name="currency_code"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nominal">{{ __('payroll_thr_data_entry.label_nominal') }}</label>
                            <input type="number" class="form-control" id="nominal" name="nominal"
                                placeholder="{{ __('payroll_thr_data_entry.label_nominal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_thr_data_entry.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('payroll/thr_data_entry') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_thr_data_entry.btn_cancel') }}
                        </a>
                    </div>
                </div>
            </form>
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
                        <span class="title-text-notification">{{ __('payroll_thr_data_entry.alert_success') }}</span>
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
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURLTwo')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURLTwo', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURLTwo');

        sessionStorage.removeItem('previousURLTwo');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('#payment_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#payment_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        let pickerPaymentDate = $('#payment_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#payment_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var func = '{{ $func }}';
        var arrData = @json($data);

        if (func == 'new') {
            $('#record_function').val('New');
            $('#employee_no').prop('disabled', false);
            $('#employee_name').prop('readonly', true);
            $('#entry_type').prop('disabled', false);
            $('#performance_result').prop('disabled', false);
            $('#entry_type').on('change', function () {
                if ($('#entry_type').val() === 'B') {
                $('#performance_result').prop('disabled', false);
                }
                else {
                    $('#performance_result').prop('disabled', true);
                    $('#performance_result').val(null).trigger('change');
                }
            });
            
            $('#currency_code').prop('disabled', false);
            $('#nominal').prop('readonly', false);
            $('#service_month').prop('readonly', false);

            $('#employee_no').val(null).trigger('change');
            $('#employee_name').val('');
            $('#entry_type').val(null).trigger('change');
            $('#performance_result').val(null).trigger('change');
            $('#service_month').val('');
            $('#currency_code').val(null).trigger('change');
            $('#nominal').val('');
        }
        else {
            $('#record_function').val('Edit');
            $('#employee_no').prop('disabled', true);
            $('#employee_name').prop('readonly', true);
            $('#entry_type').prop('disabled', true);
            $('#performance_result').prop('disabled', false);
            pickerPaymentDate._input.setAttribute("disabled", "disabled");
            $('#currency_code').prop('disabled', false);
            $('#nominal').prop('disabled', false);
            $('#service_month').prop('disabled', false);

            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_no/req_detail/api') }}",
                data: {
                    'employeeNo': ((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : '')
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data.employeeNo,
                    title: data.fullName,
                    text: data.employeeNo
                });
                $("#employee_no").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#employee_no").trigger({
                    type: 'select2:select',
                    params: {
                        id: data.employeeNo,
                        text: data.employeeNo,
                        data: data
                    }
                });
            });

            $('#employee_no_hidden').val((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : '');
            $('#employee_name').val((typeof arrData[0].employeeName !== 'undefined') ? arrData[0].employeeName : '');
            $('#entry_type').val((typeof arrData[0].flagType !== 'undefined') ? arrData[0].flagType : '');
            $('#entry_type_hidden').val((typeof arrData[0].flagType !== 'undefined') ? arrData[0].flagType : '');
            if (arrData[0].flagType === 'B') {
                $('#performance_result').prop('disabled', false);
            }
            else {
                $('#performance_result').prop('disabled', true);
            }
            $('#service_month').val((typeof arrData[0].serviceMonth !== 'undefined') ? arrData[0].serviceMonth : '');

            $.ajax({
                type: 'GET',
                url: "{{ url('/performance_result/bonus_thr_data_entry/api') }}",
                data: {
                    'value': ((typeof arrData[0].performanceResult !== 'undefined') ? arrData[0].performanceResult : '')
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data.value,
                    title: data.value,
                    text: data.value
                });
                $("#performance_result").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#performance_result").trigger({
                    type: 'select2:select',
                    params: {
                        id: data.value,
                        text: data.value,
                        data: data
                    }
                });
            });

            pickerPaymentDate.setDate(((typeof arrData[0].receiptDate !== 'undefined') ? arrData[0].receiptDate : ''));
            $('#payment_date_hidden').val(((typeof arrData[0].receiptDate !== 'undefined') ? arrData[0].receiptDate : ''));

            $.ajax({
                type: 'GET',
                url: "{{ url('/comgen/api') }}",
                data: {
                    'currencyCode1': ((typeof arrData[0].currencyCode !== 'undefined' && arrData[0].currencyCode !== null) ? arrData[0].currencyCode : '')
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data.data_currency_code_1.comGenCode,
                    title: data.data_currency_code_1.value,
                    text: data.data_currency_code_1.comGenCode
                });
                $("#currency_code").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#currency_code").trigger({
                    type: 'select2:select',
                    params: {
                        id: data.data_currency_code_1.comGenCode,
                        text: data.data_currency_code_1.comGenCode,
                        data: data.data_currency_code_1
                    }
                });
            });

            $('#nominal').val((typeof arrData[0].amount !== 'undefined') ? arrData[0].amount : '');
        }

        loadDataEmployeeNo();
        loadDataPerformanceResult();
        loadDataCurrencyCode();

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
        
        $('select').on('select2:opening select2:closing', function( event ) {
            var $searchfield = $( '#'+event.target.id ).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#employee_no').on('select2:select', function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_name').val(htmlDecode(data[0].title));
        });

        $('#employee_no').on('select2:unselecting', function (e) {
            $('#employee_name').val('');
        });

        function loadDataEmployeeNo() {
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
            $('#employee_no').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Employee Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#employee_no').select2({
                width: '100%',
                placeholder: 'Choose Employee',
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
        }

        function loadDataPerformanceResult(){
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

            $('#performance_result').select2({
                width: '100%',
                placeholder: 'Choose Performance Result',
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
                    url: "{{ url('/performance_result/api') }}",
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
                                    id: item.value,
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

        function loadDataCurrencyCode(){
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

            $('#currency_code').select2({
                width: '100%',
                placeholder: 'Choose Currency',
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
                    url: "{{ url('/currency/api') }}",
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#thr_data_entry_form").submit();
        });

        if ($("#thr_data_entry_form").length > 0) {
            $("#thr_data_entry_form").validate({
            rules: {
                    employee_no: {
                        required: true,
                    },
                    entry_type: {
                        required: true,
                    },
                    performance_result: {
                        required: true,
                    },
                    service_month: {
                        required: true,
                    },
                    payment_date: {
                        required: true,
                    },
                    currency_code: {
                        required: true,
                    },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('payroll_thr_data_entry.field_mandatory') }}",
                    },
                    leave_code: {
                        required: "{{ __('payroll_thr_data_entry.field_mandatory') }}",
                    },
                    leave_date_from: {
                        required: "{{ __('payroll_thr_data_entry.field_mandatory') }}",
                    },
                    leave_date_to: {
                        required: "{{ __('payroll_thr_data_entry.field_mandatory') }}",
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
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_data_entry.btn_save") }}'
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
                        url: "{{ url('payroll/thr_bonus_data_entry/proses') }}",
                        type: "POST",
                        data: $('#thr_data_entry_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_data_entry.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/thr_data_entry') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_data_entry.btn_save") }}'
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
                            $("#btn-save").prop("disabled", false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_thr_data_entry.btn_save") }}'
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