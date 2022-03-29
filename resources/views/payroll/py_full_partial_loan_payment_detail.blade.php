<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_full_partial_loan_payment.judul') }}</title>
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
            <a href="{{ url('payroll/partial_full_loan_payment') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_full_partial_loan_payment.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="full_partial_loan_payment_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_full_partial_loan_payment.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        <input type="text" class="form-control" id="employee_no_hidden" name="employee_no_hidden" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_full_partial_loan_payment.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_employee_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_no">{{ __('payroll_full_partial_loan_payment.label_loan_no') }}</label>
                            <input type="text" class="form-control" id="loan_no" name="loan_no"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_loan_no') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="rate_per_year">{{ __('payroll_full_partial_loan_payment.label_rate_per_year') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="rate_per_year" name="rate_per_year"
                                    placeholder="{{ __('payroll_full_partial_loan_payment.label_rate_per_year') }}" readonly>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span>%</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paid_loan_seq">{{ __('payroll_full_partial_loan_payment.label_paid_loan_seq') }}</label>
                            <input type="text" class="form-control" id="paid_loan_seq" name="paid_loan_seq"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_paid_loan_seq') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_of_installment_not_yet_paid">{{ __('payroll_full_partial_loan_payment.label_no_of_installment_not_yet_paid') }}</label>
                            <input type="text" class="form-control" id="no_of_installment_not_yet_paid" name="no_of_installment_not_yet_paid"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_no_of_installment_not_yet_paid') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_method">{{ __('payroll_full_partial_loan_payment.label_payment_method') }}</label>
                            <select class="form-control select2" id="payment_method" name="payment_method" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="payment_method_hidden" name="payment_method_hidden" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="currency_code">{{ __('payroll_full_partial_loan_payment.label_currency_code') }}</label>
                            <select class="form-control select2" id="currency_code" name="currency_code"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <h5>{{ __('payroll_full_partial_loan_payment.label_not_yet_paid') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="principal_amount_installment">{{ __('payroll_full_partial_loan_payment.label_principal_amount_installment') }}</label>
                            <input type="text" class="form-control" id="principal_amount_installment" name="principal_amount_installment"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_principal_amount_installment') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="interest_amount_per_installment">{{ __('payroll_full_partial_loan_payment.label_interest_amount_per_installment') }}</label>
                            <input type="text" class="form-control" id="interest_amount_per_installment" name="interest_amount_per_installment"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_interest_amount_per_installment') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="outstanding_amount">{{ __('payroll_full_partial_loan_payment.label_outstanding_amount') }}</label>
                            <input type="text" class="form-control" id="outstanding_amount" name="outstanding_amount"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_outstanding_amount') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="total_not_yet_paid">{{ __('payroll_full_partial_loan_payment.label_total_not_yet_paid') }}</label>
                            <input type="text" class="form-control" id="total_not_yet_paid" name="total_not_yet_paid"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_total_not_yet_paid') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="payment_amount">{{ __('payroll_full_partial_loan_payment.label_payment_amount') }}</label>
                            <input type="number" class="form-control" id="payment_amount" name="payment_amount"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_payment_amount') }}">
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="other_cost">{{ __('payroll_full_partial_loan_payment.label_other_cost') }}</label>
                            <input type="number" class="form-control" id="other_cost" name="other_cost"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_other_cost') }}">
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="total_payment">{{ __('payroll_full_partial_loan_payment.label_total_payment') }}</label>
                            <input type="text" class="form-control" id="total_payment" name="total_payment"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_total_payment') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="new_outstanding_amount">{{ __('payroll_full_partial_loan_payment.label_new_outstanding_amount') }}</label>
                            <input type="text" class="form-control" id="new_outstanding_amount" name="new_outstanding_amount"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_new_outstanding_amount') }}" readonly>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="new_rate_per_year">{{ __('payroll_full_partial_loan_payment.label_new_rate_per_year') }}</label>
                            <small id="new_rate_per_year_rules" class="text-muted">
                                (0 - 100)
                            </small>
                            <div class="input-group">
                                <input type="number" min=0 max=100 class="form-control" id="new_rate_per_year" name="new_rate_per_year"
                                    placeholder="{{ __('payroll_full_partial_loan_payment.label_new_rate_per_year') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span>%</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="new_no_of_installment_not_yet_paid">{{ __('payroll_full_partial_loan_payment.label_new_no_of_installment_not_yet_paid') }}</label>
                            <input type="number" class="form-control" id="new_no_of_installment_not_yet_paid" name="new_no_of_installment_not_yet_paid"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_new_no_of_installment_not_yet_paid') }}">
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_full_partial_loan_payment.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('payroll/full_partial_loan_payment') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_full_partial_loan_payment.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('payroll_full_partial_loan_payment.alert_success') }}</span>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var func = '{{ $func }}';
        var arrData = @json($data);
        var arrData2 = @json($data2);

        console.log(arrData2);

        if (func == 'new') {
            $('#record_function').val('New');
            $('#employee_no').prop('disabled', false);
            $('#employee_name').prop('readonly', true);
            $('#loan_no').prop('readonly', true);
            $('#rate_per_year').prop('readonly', true);
            $('#paid_loan_seq').prop('readonly', true);
            $('#no_of_installment_not_yet_paid').prop('readonly', true);
            $('#payment_method').prop('disabled', false);
            $('#currency_code').prop('disabled', false);
            $('#principal_amount_installment').prop('readonly', true);
            $('#interest_amount_per_installment').prop('readonly', true);
            $('#outstanding_amount').prop('readonly', true);
            $('#total_not_yet_paid').prop('readonly', true);
            $('#payment_amount').prop('readonly', false);
            $('#other_cost').prop('readonly', false);
            $('#total_payment').prop('readonly', true);
            $('#new_outstanding_amount').prop('readonly', true);
            $('#new_rate_per_year').prop('readonly', false);
            $('#new_no_of_installment_not_yet_paid').prop('readonly', false);

            $('#employee_no').val(null).trigger('change');
            $('#employee_name').val("");
        }

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

        loadDataEmployeeNo();

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
                    $('.select2-search').append(html);
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
    })
</script>

</html>