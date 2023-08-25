<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_loan_payment.judul') }}</title>
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
    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url('payroll/loan_payment') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_loan_payment.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="loan_payment_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_loan_payment.label_employee_no') }}</label>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_loan_payment.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('payroll_loan_payment.label_employee_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_no">{{ __('payroll_loan_payment.label_loan_no') }}</label>
                            <input type="text" class="form-control" id="loan_no" name="loan_no"
                                placeholder="{{ __('payroll_loan_payment.label_loan_no') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_sequence">{{ __('payroll_loan_payment.label_payment_sequence') }}</label>
                            <input type="text" class="form-control" id="payment_sequence" name="payment_sequence"
                                placeholder="{{ __('payroll_loan_payment.label_payment_sequence') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="payment_type">{{ __('payroll_loan_payment.label_payment_type') }}</label>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="salary" name="payment_type" value="S" disabled>
                                <label class="form-check-label" for="salary">Salary</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="bonus" name="payment_type" value="B" disabled>
                                <label class="form-check-label" for="bonus">Bonus</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="THR" name="payment_type" value="T" disabled>
                                <label class="form-check-label" for="THR">THR</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="cash" name="payment_type" value="C" disabled>
                                <label class="form-check-label" for="cash">Cash</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_date">{{ __('payroll_loan_payment.label_payment_date') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="payment_date" name="payment_date"
                                    placeholder="{{ __('payroll_loan_payment.label_payment_date') }}" disabled>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="payment_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="currency_code">{{ __('payroll_loan_payment.label_currency_code') }}</label>
                            <select class="form-control select2" id="currency_code" name="currency_code" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_amount">{{ __('payroll_loan_payment.label_loan_amount') }}</label>
                            <input type="text" class="form-control" id="loan_amount" name="loan_amount"
                                placeholder="{{ __('payroll_loan_payment.label_loan_amount') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interest">{{ __('payroll_loan_payment.label_interest') }}</label>
                            <input type="text" class="form-control" id="interest" name="interest"
                                placeholder="{{ __('payroll_loan_payment.label_interest') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="principal_plus_interest">{{ __('payroll_loan_payment.label_principal_plus_interest') }}</label>
                            <input type="text" class="form-control" id="principal_plus_interest" name="principal_plus_interest"
                                placeholder="{{ __('payroll_loan_payment.label_principal_plus_interest') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="total_payment">{{ __('payroll_loan_payment.label_total_payment') }}</label>
                            <input type="text" class="form-control" id="total_payment" name="total_payment"
                                placeholder="{{ __('payroll_loan_payment.label_total_payment') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="outstanding_balance">{{ __('payroll_loan_payment.label_outstanding_balance') }}</label>
                            <input type="number" class="form-control" id="outstanding_balance" name="outstanding_balance"
                                placeholder="{{ __('payroll_loan_payment.label_outstanding_balance') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
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
                        <span class="title-text-notification">{{ __('payroll_loan_payment.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

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

        var arrData = @json($data);
        var arrData2 = @json($data2);
        var outstandingBalance = 0;

        $.ajax({
            type: 'GET',
            url: "{{ url('/employee_no/loan_data_entry/api') }}",
            data: {
                'employeeNo': (typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : ''
            }
        }).then(function (data) {
            var option = $('<option/>', {
                id: data.employeeNo,
                title: data.employeeName,
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
        $('#employee_name').val((typeof arrData[0].employeeName !== 'undefined') ? arrData[0].employeeName : '');
        $('#loan_no').val((typeof arrData[0].loanNo !== 'undefined') ? arrData[0].loanNo : '');
        $('#payment_sequence').val((typeof arrData[0].paymentSeq !== 'undefined') ? arrData[0].paymentSeq : '');
        if (typeof arrData[0].paymentType !== 'undefined') {
            if (arrData[0].paymentType === 'S') {
                $('#salary').prop('checked', true).trigger('change');
            } else if (arrData[0].paymentType === 'B') {
                $('#bonus').prop('checked', true).trigger('change');
            } else if (arrData[0].paymentType === 'T') {
                $('#THR').prop('checked', true).trigger('change');
            } else if (arrData[0].paymentType === 'C') {
                $('#cash').prop('checked', true).trigger('change');
            }
        }
        pickerPaymentDate.setDate(((typeof arrData[0].paymentDate !== 'undefined') ? arrData[0].paymentDate : ''));
        $.ajax({
                type: 'GET',
                url: "{{ url('/currency_code/loan_data_entry/api') }}",
                data: {
                    'currencyCode': (typeof arrData2[0].currencyCode !== 'undefined') ? arrData2[0].currencyCode : ''
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data.currencyCode,
                    title: data.currencyCode,
                    text: data.currencyCode
                });
                $("#currency_code").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#currency_code").trigger({
                    type: 'select2:select',
                    params: {
                        id: data.currencyCode,
                        text: data.currencyCode,
                        data: data
                    }
                });
            });
        $('#loan_amount').val((typeof arrData2[0].loanAmount !== 'undefined') ? arrData2[0].loanAmount : '');
        $('#interest').val((typeof arrData2[0].interest !== 'undefined') ? arrData2[0].interest : '');
        $('#principal_plus_interest').val((typeof arrData2[0].principalPlusInterest !== 'undefined') ? arrData2[0].principalPlusInterest : '');
        $('#total_payment').val((typeof arrData2[0].paymentAmount !== 'undefined') ? arrData2[0].paymentAmount : '');
        if (typeof arrData2[0].principalPlusInterest !== 'undefined' && typeof arrData2[0].paymentAmount !== 'undefined') {
            outstandingBalance = arrData2[0].principalPlusInterest - arrData2[0].paymentAmount
        } else {
            outstandingBalance = 0;
        }
        $('#outstanding_balance').val(outstandingBalance);

        loadDataEmployeeNo();
        loadDataCurrencyCode();

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

        function loadDataCurrencyCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#currency_code').select2({
                width: '100%',
                placeholder: 'Choose Currency Code',
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
    })
</script>

</html>