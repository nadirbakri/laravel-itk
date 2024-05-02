<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_severance_data_entry.judul') }}</title>
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
                <span class="title-text">{{ __('payroll_severance_data_entry.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="severance_data_entry_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_severance_data_entry.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        <input type="text" class="form-control" id="employee_no_hidden" name="employee_no_hidden" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_severance_data_entry.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('payroll_severance_data_entry.label_employee_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_date">{{ __('payroll_severance_data_entry.label_payment_date') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="payment_date" name="payment_date"
                                    placeholder="{{ __('payroll_severance_data_entry.label_payment_date') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="payment_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="resign_date">{{ __('payroll_severance_data_entry.label_resign_date') }}</label>
                            <input type="text" class="form-control" id="resign_date" name="resign_date"
                                placeholder="{{ __('payroll_severance_data_entry.label_resign_date') }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_for">{{ __('payroll_severance_data_entry.label_payment_for') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="payment_for" name="payment_for">
                                <option value="" disabled selected>{{ __('payroll_severance_data_entry.label_select_payment_for') }}</option>
                                <option value="Pesangon">Pesangon</option>
                                <option value="Pensiun">Pensiun</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="total_amount">{{ __('payroll_severance_data_entry.label_total_amount') }}</label>
                            <input type="number" class="form-control" id="total_amount" name="total_amount"
                                placeholder="{{ __('payroll_severance_data_entry.label_total_amount') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="amount">{{ __('payroll_severance_data_entry.label_amount') }}</label>
                            <small class="text-muted">(0 - 0,9)</small>
                            <input type="number" min=0 max=0.9 step=0.1 class="form-control" id="amount" name="amount"
                                placeholder="{{ __('payroll_severance_data_entry.label_amount') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="adjustment">{{ __('payroll_severance_data_entry.label_adjusment') }}</label>
                            <small class="text-muted">(0 - 0,9)</small>
                            <input type="number" min=0 max=0.9 step=0.1 class="form-control" id="adjustment" name="adjustment"
                                placeholder="{{ __('payroll_severance_data_entry.label_adjusment') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_severance_data_entry.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('payroll/severance_data_entry') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_severance_data_entry.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('payroll_severance_data_entry.alert_success') }}</span>
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
    
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        let pickerPaymentDate = $('.input-group input').flatpickr({
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

        var func = '{{ $func }}';
        var arrData = @json($data);

        if (func === 'new') {
            $('#record_function').val('New');
            $('#employee_no').prop('disabled', false);

            $('#employee_no').val(null).trigger('change');
            $('#employee_name').val('');
            $('#payment_for').val('');
            $('#resign_date').val('');
            $('#total_amount').val('');
            $('#amount').val('');
            $('#adjustment').val('');

            $('#employee_no').on('select2:select', function (e) {
                var data = $('#employee_no').select2('data');
                $.ajax({
                    url: "{{ url('/employee_no/req_detail/api') }}",
                    type: "GET",
                    data : {
                        'employeeNo': data[0].data
                    },
                    success: function(response) {
                        $('#employee_name').val(response.fullName);
                        $('#resign_date').val(moment(response.terminationDate).format('D-MMM-YYYY'));
                    }
                });
            });

            $('#employee_no').on('select2:unselecting', function (e) {
                $('#employee_name').val('');
            });
        }
        else {
            $('#record_function').val('Edit');

            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_no/severance/api') }}",
                data: {
                    'employeeNo': (typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : ''
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data.employeeNo,
                    title: data.employeeNo,
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
            pickerPaymentDate.setDate((typeof arrData[0].paymentDate !== 'undefined') ? arrData[0].paymentDate : '');
            $('#resign_date').val((typeof arrData[0].resignDate !== 'undefined') ? moment(arrData[0].resignDate).format('D-MMM-YYYY') : '');
            $('#payment_for').val((typeof arrData[0].paymentFor !== 'undefined') ? arrData[0].paymentFor : '').trigger('change');
            $('#total_amount').val((typeof arrData[0].totalAmount !== 'undefined') ? arrData[0].totalAmount : '');
            $('#amount').val((typeof arrData[0].amount !== 'undefined') ? arrData[0].amount : '');
            $('#adjustment').val((typeof arrData[0].adjustment !== 'undefined') ? arrData[0].adjustment : '');
        }

        loadDataEmployeeNo();

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#amount, #adjustment').on('input', function () {
            var amount = parseFloat($('#amount').val());
            var adjustment = parseFloat($('#adjustment').val());
            if (amount !== '' && amount !== null && adjustment !== '' && adjustment !== null) {
                $('#total_amount').val(amount + adjustment);
            } else if (amount == '' || amount == null){
                $('#total_amount').val(adjustment);
            } else {
                $('#total_amount').val(amount);
            }
        });

        function loadDataEmployeeNo() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#employee_no').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
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
                    url: "{{ url('/employee_no_term_date/api') }}",
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
                                    text: item,
                                    id: item,
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
            $("#severance_data_entry_form").submit();
        });

        if ($("#severance_data_entry_form").length > 0) {
            $("#severance_data_entry_form").validate({
            rules: {
                    employee_no: {
                        required: true,
                    },
                    payment_for: {
                        required: true,
                    }
                },
                messages: {
                    employee_no: {
                        required: "{{ __('payroll_severance_data_entry.field_mandatory') }}",
                    },
                    payment_for: {
                        required: "{{ __('payroll_severance_data_entry.field_mandatory') }}",
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
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_severance_data_entry.btn_save") }}'
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
                        url: "{{ url('payroll/severance_data_entry/proses') }}",
                        type: "POST",
                        data: $('#severance_data_entry_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_severance_data_entry.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/severance_data_entry') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_severance_data_entry.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_severance_data_entry.btn_save") }}'
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