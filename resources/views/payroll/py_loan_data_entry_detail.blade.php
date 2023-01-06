<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_loan_data_entry.judul') }}</title>
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

        /* .disabled {
            display: none;
            visibility: hidden;
        } */

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url('payroll/loan_data_entry') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_loan_data_entry.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="loan_data_entry_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_loan_data_entry.label_employee_no') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        <input type="text" class="form-control" id="employee_no_hidden" name="employee_no_hidden" hidden>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_loan_data_entry.label_employee_name') }}</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="{{ __('payroll_loan_data_entry.label_employee_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_no">{{ __('payroll_loan_data_entry.label_loan_no') }}</label>
                            <input type="text" class="form-control" id="loan_no" name="loan_no"
                                placeholder="{{ __('payroll_loan_data_entry.label_loan_no') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_code">{{ __('payroll_loan_data_entry.label_loan_code') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="loan_code" name="loan_code" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="loan_code_hidden" name="loan_code_hidden" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="source_document">{{ __('payroll_loan_data_entry.label_source_document') }}</label>
                            <input type="text" class="form-control" id="source_document" name="source_document"
                                placeholder="{{ __('payroll_loan_data_entry.label_source_document') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_description">{{ __('payroll_loan_data_entry.label_loan_description') }}</label>
                            <input type="text" class="form-control" id="loan_description" name="loan_description"
                                placeholder="{{ __('payroll_loan_data_entry.label_loan_description') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_date">{{ __('payroll_loan_data_entry.label_loan_date') }}</label>
                            <span class="required">*</span>
                            <div class="input-group">
                                <input type="text" class="form-control" id="loan_date" name="loan_date"
                                    placeholder="{{ __('payroll_loan_data_entry.label_loan_date') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="loan_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="loan_date_hidden" name="loan_date_hidden" hidden>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interest_type">{{ __('payroll_loan_data_entry.label_interest_type') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="interest_type" name="interest_type" disabled>
                                <option value="" disabled selected>{{ __('payroll_loan_data_entry.label_select_interest_type') }}</option>
                                <option value="F">Flat</option>
                                <option value="A">Anuitas</option>
                                <option value="E">Effective</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" id="interest_type_hidden" name="interest_type_hidden" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="first_payment_date">{{ __('payroll_loan_data_entry.label_first_payment_date') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="first_payment_date" name="first_payment_date"
                                    placeholder="{{ __('payroll_loan_data_entry.label_first_payment_date') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="first_payment_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="first_payment_date_hidden" name="first_payment_date_hidden" hidden>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="currency_code">{{ __('payroll_loan_data_entry.label_currency_code') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="currency_code" name="currency_code" disabled></select>
                        </div>
                        <input type="text" class="form-control" id="currency_code_hidden" name="currency_code_hidden" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_of_installment">{{ __('payroll_loan_data_entry.label_no_of_installment') }}</label>
                            <small id="no_of_installment_rules" class="text-muted">
                                (1 - 360)
                            </small>
                            <input type="number" min=1 max=360 class="form-control" id="no_of_installment" name="no_of_installment"
                                placeholder="{{ __('payroll_loan_data_entry.label_no_of_installment') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="interest">{{ __('payroll_loan_data_entry.label_interest') }}</label>
                            <input type="number" class="form-control" id="interest" name="interest"
                                placeholder="{{ __('payroll_loan_data_entry.label_interest') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="rate_per_year">{{ __('payroll_loan_data_entry.label_rate_per_year') }}</label>
                            <small id="no_of_installment_rules" class="text-muted">
                                (0 - 100)
                            </small>
                            <div class="input-group">
                                <input type="number" min=0 max=100 class="form-control" id="rate_per_year" name="rate_per_year"
                                placeholder="{{ __('payroll_loan_data_entry.label_rate_per_year') }}" readonly>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span>%</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="installment_per_month">{{ __('payroll_loan_data_entry.label_installment_per_month') }}</label>
                            <input type="number" class="form-control" id="installment_per_month" name="installment_per_month"
                                placeholder="{{ __('payroll_loan_data_entry.label_installment_per_month') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_amount">{{ __('payroll_loan_data_entry.label_loan_amount') }}</label>
                            <input type="number" class="form-control" id="loan_amount" name="loan_amount"
                                placeholder="{{ __('payroll_loan_data_entry.label_loan_amount') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="principal_plus_interest">{{ __('payroll_loan_data_entry.label_principal_plus_interest') }}</label>
                            <input type="number" class="form-control" id="principal_plus_interest" name="principal_plus_interest"
                                placeholder="{{ __('payroll_loan_data_entry.label_principal_plus_interest') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="down_payment">{{ __('payroll_loan_data_entry.label_down_payment') }}</label>
                            <input type="number" class="form-control" id="down_payment" name="down_payment"
                                placeholder="{{ __('payroll_loan_data_entry.label_down_payment') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="total_payment">{{ __('payroll_loan_data_entry.label_total_payment') }}</label>
                            <input type="number" class="form-control" id="total_payment" name="total_payment"
                                placeholder="{{ __('payroll_loan_data_entry.label_total_payment') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_amount_balance">{{ __('payroll_loan_data_entry.label_loan_amount_balance') }}</label>
                            <input type="number" class="form-control" id="loan_amount_balance" name="loan_amount_balance"
                                placeholder="{{ __('payroll_loan_data_entry.label_loan_amount_balance') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="outstanding_balance">{{ __('payroll_loan_data_entry.label_outstanding_balance') }}</label>
                            <input type="number" class="form-control" id="outstanding_balance" name="outstanding_balance"
                                placeholder="{{ __('payroll_loan_data_entry.label_outstanding_balance') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="termination_loan">{{ __('payroll_loan_data_entry.label_termination_loan') }}</label>
                            <input type="text" class="form-control" id="termination_loan" name="termination_loan"
                                placeholder="{{ __('payroll_loan_data_entry.label_termination_loan') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paid_on">{{ __('payroll_loan_data_entry.label_paid_on') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="paid_on" name="paid_on"
                                    placeholder="{{ __('payroll_loan_data_entry.label_paid_on') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="paid_on_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            {{-- <input type="text" class="form-control" id="paid_on_hidden" name="paid_on_hidden" hidden> --}}
                        </div>
                    </div>
                </div>
                <div class="div-table">
                    <table id="loan_data_entry_detail_table" class="table hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 5%"></th>
                                <th style="width: 15%">Date</th>
                                <th style="width: 7%">Seq</th>
                                <th style="width: 15%">Type</th>
                                <th style="width: 10%">Principal</th>
                                <th style="width: 10%">Interest</th>
                                <th style="width: 10%">Payment</th>
                                <th style="width: 10%">Outstanding</th>
                                <th style="width: 18%">Paid</th>
                                <th style="display: none; width: 0%">Payment Type Hidden</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_loan_data_entry.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('payroll/loan_data_entry') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_loan_data_entry.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('payroll_loan_data_entry.alert_success') }}</span>
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

        let pickerLoanDate = $('#loan_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#loan_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerFirstPaymentDate = $('#first_payment_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#first_payment_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerPaidOn = $('#paid_on').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#paid_on_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerPaymentDate = $('#payment_date_table').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#payment_date_table_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        function pickerPaymentDateTable(field='') {
            $(field).flatpickr({
                altInput: true,
                allowInput: true,
                altFormat: "j-M-y",
                dateFormat: "Y-m-d",
                defaultDate: "today",
                onReady: function () {
                    var flatPickrInstance = this;
                    // console.log(flatPickrInstance);
                    var $flatPickrInput = $(flatPickrInstance.element);
                    $flatPickrInput.siblings(".date").click(function () {
                        flatPickrInstance.toggle();
                    });
                }
            });
        }

        var func = '{{ $func }}';
        var arrData = @json($data);
        var interest = null;
        var noOfInstallment = null;
        var loanAmount = null;
        var downPayment = null;
        var installmentPerMonth = null;
        var ratePerYear = null;
        var principalTable = null;
        var interestTable = null;
        var paymentTable = null;
        var seq_no_table = null;
        var principal_table = null;
        var interest_table = null;
        var outstanding_table = null;
        var outstandingTableSeq = null;
        var outstandingTable = null
        var payment_table = null;
        var firstPaymentDate = null;
        var paid_table = null;
        var paidTableSeq = null;
        var outstandingBalance = null;
        var loan_amount = null;
        var noOfInstallmentChanged = false;

        if (func === 'new') {
            $('#record_function').val('New');
            $('#employee_no').prop('disabled', false);
            $('#employee_name').prop('readonly', true);
            $('#loan_no').prop('readonly', true);
            $('#loan_code').prop('disabled', false);
            $('#source_document').prop('readonly', false);
            $('#loan_description').prop('readonly', false);
            $('#interest_type').prop('disabled', false);
            $('#currency_code').prop('disabled', false);
            $('#no_of_installment').prop('readonly', false);
            $('#interest').prop('readonly', true);
            $('#rate_per_year').prop('readonly', false);
            $('#installment_per_month').prop('readonly', true);
            $('#loan_amount').prop('readonly', false);
            $('#principal_plus_interest').prop('readonly', true);
            $('#down_payment').prop('readonly', false);
            $('#total_payment').prop('readonly', true);
            $('#loan_amount_balance').prop('readonly', true);
            $('#outstanding_balance').prop('readonly', true);
            $('#termination_loan').prop('readonly', true);

            $('#employee_no').val(null).trigger('change');
            $('#employee_name').val('');
            $.ajax({
                url: "{{ url('payroll_loan_no/number/check') }}",
                type: "GET",
                data: {
                    'url':'/prloandataentry/getloanemployee'
                },
                success: function (response) {
                    $('#loan_no').val(response);
                }
            });
            $('#loan_code').val(null).trigger('change');
            $('#source_document').val('');
            $('#loan_description').val('');
            $('#interest_type').val(null).trigger('change');
            $('#currency_code').val(null).trigger('change');
            $('#no_of_installment').val('');
            $('#interest').val('');
            $('#rate_per_year').val('');
            $('#installment_per_month').val('');
            $('#loan_amount').val('');
            $('#principal_plus_interest').val('');
            $('#down_payment').val('');
            $('#total_payment').val('');
            $('#loan_amount_balance').val('');
            $('#outstanding_balance').val('');
            $('#termination_loan').val('');
            $('#loan_data_entry_detail_table').DataTable().destroy();
            load_data_table_loan_data_entry_detail();
        }   
        else {
            $('#record_function').val('Edit');
            $('#employee_no').prop('disabled', true);
            $('#employee_name').prop('readonly', true);
            $('#loan_no').prop('readonly', true);
            $('#loan_code').prop('disabled', true);
            pickerLoanDate._input.setAttribute("disabled", "disabled");
            $('#source_document').prop('readonly', true);
            $('#loan_description').prop('readonly', true);
            $('#interest_type').prop('disabled', true);
            pickerFirstPaymentDate._input.setAttribute("disabled", "disabled");
            // $('#currency_code').prop('disabled', true);
            $('#no_of_installment').prop('readonly', false);
            $('#interest').prop('readonly', true);
            $('#rate_per_year').prop('readonly', true);
            $('#installment_per_month').prop('readonly', true);
            $('#loan_amount').prop('readonly', true);
            $('#principal_plus_interest').prop('readonly', true);
            $('#down_payment').prop('readonly', true);
            $('#total_payment').prop('readonly', true);
            $('#loan_amount_balance').prop('readonly', true);
            $('#outstanding_balance').prop('readonly', true);
            $('#termination_loan').prop('readonly', true);
            pickerPaidOn._input.setAttribute("disabled", "disabled");
            // pickerPaymentDate._input.setAttribute("disabled", "disabled");

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
            $('#employee_no_hidden').val(((typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : ''));
            $('#employee_name').val(((typeof arrData[0].employeeName !== 'undefined') ? arrData[0].employeeName : ''));
            $('#loan_no').val(((typeof arrData[0].loanNo !== 'undefined') ? arrData[0].loanNo : ''));
            $.ajax({
                type: 'GET',
                url: "{{ url('/loan_code/loan_data_entry/api') }}",
                data: {
                    'loanCode': (typeof arrData[0].loanCode !== 'undefined') ? arrData[0].loanCode : ''
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data.loanCode,
                    title: data.loanCode,
                    text: data.loanCode
                });
                $("#loan_code").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#loan_code").trigger({
                    type: 'select2:select',
                    params: {
                        id: data.loanCode,
                        text: data.loanCode,
                        data: data
                    }
                });
            });
            $('#loan_code_hidden').val(((typeof arrData[0].loanCode !== 'undefined') ? arrData[0].loanCode : ''));
            $('#source_document').val(((typeof arrData[0].sourceDocument !== 'undefined') ? arrData[0].sourceDocument : ''));
            $('#loan_description').val(((typeof arrData[0].description !== 'undefined') ? arrData[0].description : ''));
            pickerLoanDate.setDate(((typeof arrData[0].loanDate !== 'undefined') ? arrData[0].loanDate : ''));
            $('#interest_type').val(((typeof arrData[0].interestType !== 'undefined') ? arrData[0].interestType : '')).trigger('change');
            $('#interest_type_hidden').val(((typeof arrData[0].interestType !== 'undefined') ? arrData[0].interestType : ''));
            pickerFirstPaymentDate.setDate(((typeof arrData[0].firstPaymentDate !== 'undefined') ? arrData[0].firstPaymentDate : ''));
            $.ajax({
                type: 'GET',
                url: "{{ url('/currency_code/loan_data_entry/api') }}",
                data: {
                    'currencyCode': (typeof arrData[0].currencyCode !== 'undefined') ? arrData[0].currencyCode : ''
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
            $('#currency_code_hidden').val(((typeof arrData[0].currencyCode !== 'undefined') ? arrData[0].currencyCode : ''));
            $('#no_of_installment').val(((typeof arrData[0].noOfInstallment !== 'undefined') ? arrData[0].noOfInstallment : ''));
            $('#interest').val(((typeof arrData[0].interest !== 'undefined') ? arrData[0].interest : ''));
            $('#rate_per_year').val(((typeof arrData[0].ratePerYear !== 'undefined') ? arrData[0].ratePerYear : ''));
            $('#installment_per_month').val(((typeof arrData[0].installmentPerMonth !== 'undefined') ? arrData[0].installmentPerMonth : ''));
            $('#loan_amount').val(((typeof arrData[0].loanAmount !== 'undefined') ? arrData[0].loanAmount : ''));
            $('#principal_plus_interest').val(((typeof arrData[0].principalPlusInterest !== 'undefined') ? arrData[0].principalPlusInterest : ''));
            $('#down_payment').val(((typeof arrData[0].downPayment !== 'undefined') ? arrData[0].downPayment : ''));
            $('#total_payment').val(((typeof arrData[0].paymentAmount !== 'undefined') ? arrData[0].paymentAmount : ''));
            $('#loan_amount_balance').val(((typeof arrData[0].loanBalance !== 'undefined') ? arrData[0].loanBalance : ''));
            $('#outstanding_balance').val(((typeof arrData[0].outstandingBalance !== 'undefined') ? arrData[0].outstandingBalance : ''));
            $('#termination_loan').val(((typeof arrData[0].loanEndDate !== 'undefined') ? moment(arrData[0].loanEndDate).format('DD-MMM-YYYY') : ''));
            pickerPaidOn.setDate(((typeof arrData[0].paidOn !== 'undefined') ? arrData[0].paidOn : ''));
            $('#loan_data_entry_detail_table').DataTable().destroy();
            load_data_table_loan_data_entry_detail();
            load_data_grid();
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

        $('#interest_type, #loan_amount, #down_payment, #no_of_installment, #rate_per_year, #first_payment_date').on('input', function () {
            noOfInstallmentChanged = true; 

            interest = $('#interest').val();
            loanAmount = $('#loan_amount').val();
            downPayment = $('#down_payment').val();
            noOfInstallment = $('#no_of_installment').val();
            ratePerYear = parseFloat($('#rate_per_year').val()) / 100;
            // installmentPerMonth = $('#installment_per_month').val();
            firstPaymentDate = $('#first_payment_date').val();

            var terminationLoan = moment(firstPaymentDate).add(parseInt(noOfInstallment), 'months').format('DD-MMM-YYYY');
            $('#termination_loan').val(terminationLoan);

            if (loanAmount !== '' && loanAmount !== null && downPayment !== '' && downPayment !== null) {
                $('#loan_amount_balance').val((parseFloat(loanAmount) - parseFloat(downPayment)).toFixed(2));
            } else if (loanAmount == '' || loanAmount == null){
                $('#loan_amount_balance').val(parseFloat(downPayment).toFixed(2));
            } else {
                $('#loan_amount_balance').val(parseFloat(loanAmount).toFixed(2));
            }

            table.clear().draw();

            if (noOfInstallment !== '') {
                load_data_grid();
            }
        });

        loadDataEmployeeNo();
        loadDataLoanCode();
        loadDataCurrencyCode();

        function load_data_table_loan_data_entry_detail() {
            table = $('#loan_data_entry_detail_table').DataTable({
                processing: true,
                orderCellsTop: true,
                paging: false,
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                "deferLoading": 10
            });
        }

        function load_data_grid() {
            if (func === 'new') {
                for (var i = 0; i <= noOfInstallment; i++) {
                    table.row.add([
                        '<div class="form-check">' +
                            '<input class="form-check-input" type="checkbox" id="check_table" name="check_table" value="true">' +
                        '</div>',
                        '<div class="input-group">' +
                            '<input type="text" class="form-control" id="payment_date_table'+ i +'" name="payment_date_table[]">' +  
                            '<div class="input-group-prepend date" id="payment_date_table_calendar">' +
                                '<span class="input-group-text"><span class="fa fa-calendar"></span></span>' +
                            '</div>' +
                        '</div>',
                        '<input type="number" class="form-control" id="seq_no_table'+ i +'" name="seq_no_table[]" value="'+ i +'" readonly>',
                        '<select class="form-control select2" id="payment_type'+ i +'" name="payment_type[]">' +
                                '<option value="" disabled selected>{{ __("payroll_loan_data_entry.label_select_payment_type") }}</option>' +
                                '<option value="S" selected="selected">Salary</option>' +
                                '<option value="B">Bonus</option>' +
                                '<option value="T">THR</option>' +
                                '<option value="C">Cash</option>' +
                        '</select>',
                        '<input type="number" class="form-control" id="principal_table'+ i +'" name="principal_table[]" readonly>',
                        '<input type="number" class="form-control" id="interest_table'+ i +'" data-seq = "'+ i +'" name="interest_table[]" readonly>',
                        '<input type="number" class="form-control" id="payment_table'+ i +'" name="payment_table[]" readonly>',
                        '<input type="number" class="form-control" id="outstanding_table'+ i +'" data-seq = "'+ i +'" name="outstanding_table[]" readonly>',
                        '<input type="text" class="form-control paid-table" id="paid_table'+ i +'" data-seq = "'+ i +'" name="paid_table[]" value="false" placeholder={{ __("payroll_loan_data_entry.label_select_paid_table") }} readonly>',
                        '<input type="text" class="form-control" id="payment_type_hidden'+ k +'" name="payment_type_hidden[]" hidden>',
                    ]).draw();

                    // var paymentDate = moment().add(i+1, 'month').format('YYYY-MM-DD');

                    pickerPaymentDateTable('#payment_date_table' + i);

                    $('#payment_type' + 0).on('change', function() {
                        if ($(this).val() == 'S') {
                            for (j = 0; j <= noOfInstallment; j++) {
                                $('#payment_type' + (j+1)).val('S').trigger('change');
                            }
                        }
                        else if ($(this).val() == 'B') {
                            for (j = 0; j <= noOfInstallment; j++) {
                                $('#payment_type' + (j+1)).val('B').trigger('change');
                            }
                        }
                        else if ($(this).val() == 'T') {
                            for (j = 0; j <= noOfInstallment; j++) {
                                $('#payment_type' + (j+1)).val('T').trigger('change');
                            }
                        }
                        else {
                            for (j = 0; j <= noOfInstallment; j++) {
                                $('#payment_type' + (j+1)).val('C').trigger('change');
                            }
                        }
                    });

                    if ($('#interest_type').val() === 'F' && loanAmount !== '' && noOfInstallment !== '' && ratePerYear !== '' && noOfInstallment > 0) {
                        principalTable = parseFloat(loanAmount) / parseFloat(noOfInstallment);
                        $('#principal_table' + 0).val(parseInt(0));
                        $('#principal_table' + i).val(parseFloat(principalTable).toFixed(2));

                        interestTable = (parseFloat(loanAmount) * parseFloat(ratePerYear) / 12);
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#interest_table' + i).val(parseFloat(interestTable).toFixed(2));

                        principal_table = $('#principal_table'+ i).val();
                        interest_table = $('#interest_table' + i).val();

                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + 0).val(parseInt(0));
                        $('#payment_table' + i).val(parseFloat(paymentTable).toFixed(2));

                        loan_amount = $('#loan_amount').val();
                        $('#outstanding_table' + 0).val(parseFloat(loan_amount).toFixed(2));

                        outstandingTableSeq = parseInt($('#outstanding_table' + 0).attr('data-seq'));
                        var totalPayment = parseFloat(0);
                        var sum = parseFloat(0);
                        for (var k = outstandingTableSeq; k <= noOfInstallment; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));

                            paid_table = $('#paid_table' + k).val();
                            payment_table = $('#payment_table' + k).val();
                            if (paid_table == 'true') {
                                totalPayment = parseFloat(totalPayment) + parseFloat(payment_table);
                            }
                            $('#total_payment').val(parseFloat(totalPayment).toFixed(2));
                            
                            sum += parseFloat($('#interest_table' + k).val());
                            $('#interest').val(parseFloat(sum).toFixed(2));
                        }

                        interest = $('#interest').val();
                        loanAmount = $('#loan_amount').val();
                        noOfInstallment = $('#no_of_installment').val();

                        $('#principal_plus_interest').val((parseFloat(interest) + parseFloat(loanAmount)).toFixed(2));
                        
                        installmentPerMonth = (parseFloat(loanAmount) + parseFloat(interest)) / parseInt(noOfInstallment);
                        $('#installment_per_month').val(parseFloat(installmentPerMonth).toFixed(2));
                        
                        principalPlusInterest = $('#principal_plus_interest').val();
                        totalPayment = $('#total_payment').val();
                        outstandingBalance = parseFloat(principalPlusInterest) - parseFloat(totalPayment);
                        $('#outstanding_balance').val(parseFloat(outstandingBalance).toFixed(2));

                    } else if ($('#interest_type').val() === 'E' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
                        principalTable = parseFloat(loanAmount) / parseFloat(noOfInstallment);
                        $('#principal_table' + 0).val(parseInt(0));
                        $('#principal_table' + i).val(parseFloat(principalTable).toFixed(2));

                        seq_no_table = $('#seq_no_table' + i).val();
                        principal_table = $('#principal_table' + i).val();
                        interestTable = (parseFloat(loanAmount) - ((parseFloat(seq_no_table) - 1) * parseFloat(principal_table))) * (parseFloat(ratePerYear) / 12);
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#interest_table' + i).val(parseFloat(interestTable).toFixed(2));

                        interest_table = $('#interest_table' + i).val();
                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + 0).val(parseInt(0));
                        $('#payment_table' + i).val(parseFloat(paymentTable).toFixed(2));

                        loan_amount = $('#loan_amount').val();
                        $('#outstanding_table' + 0).val(parseFloat(loan_amount).toFixed(2));

                        outstandingTableSeq = parseInt($('#outstanding_table' + 0).attr('data-seq'));
                        var totalPayment = parseFloat(0);
                        var sum = parseFloat(0);
                        for (var k = outstandingTableSeq; k <= noOfInstallment; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));

                            paid_table = $('#paid_table' + k).val();
                            payment_table = $('#payment_table' + k).val();
                            if (paid_table == 'true') {
                                totalPayment = parseFloat(totalPayment) + parseFloat(payment_table);
                            }
                            $('#total_payment').val(parseFloat(totalPayment).toFixed(2));
                            
                            sum += parseFloat($('#interest_table' + k).val());
                            $('#interest').val(parseFloat(sum).toFixed(2));
                        }

                        loanAmount = $('#loan_amount').val();
                        noOfInstallment = $('#no_of_installment').val();
                        ratePerYear = parseFloat($('#rate_per_year').val()) / 100;
                        interest = $('#interest').val();

                        $('#principal_plus_interest').val((parseFloat(interest) + parseFloat(loanAmount)).toFixed(2));
                        
                        installmentPerMonth = (parseFloat(loanAmount)) * (parseFloat(ratePerYear) / 12) * (1 / (1 - (1 / Math.pow((1 + (parseFloat(ratePerYear) / 12)), parseInt(noOfInstallment)))));
                        $('#installment_per_month').val(parseFloat(installmentPerMonth).toFixed(2));
                        
                        principalPlusInterest = $('#principal_plus_interest').val();
                        totalPayment = $('#total_payment').val();
                        outstandingBalance = parseFloat(principalPlusInterest) - parseFloat(totalPayment);
                        $('#outstanding_balance').val(parseFloat(outstandingBalance).toFixed(2));

                    } else if ($('#interest_type').val() === 'A' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
                        loan_amount = $('#loan_amount').val();
                        $('#outstanding_table' + 0).val(parseFloat(loan_amount).toFixed(2));

                        $('#payment_table' + 0).val(parseInt(0));
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#principal_table' + 0).val(parseInt(0));

                        loanAmount = $('#loan_amount').val();
                        noOfInstallment = $('#no_of_installment').val();
                        ratePerYear = parseFloat($('#rate_per_year').val()) / 100;
                        interest = $('#interest').val();

                        installmentPerMonth = (parseFloat(loanAmount)) * (parseFloat(ratePerYear) / 12) * (1 / (1 - (1 / Math.pow((1 + (parseFloat(ratePerYear) / 12)), parseInt(noOfInstallment)))));
                        $('#payment_table' + i).val(parseFloat(installmentPerMonth).toFixed(2));
                        $('#installment_per_month').val(parseFloat(installmentPerMonth).toFixed(2));
                        
                        outstandingTableSeq = parseInt($('#outstanding_table' + 0).attr('data-seq'));
                        var totalPayment = parseFloat(0);
                        var sum = parseFloat(0);
                        for (var k = outstandingTableSeq; k <= noOfInstallment; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            interestTable = parseFloat(outstanding_table) * parseFloat(ratePerYear) / 12;
                            $('#interest_table' + (k+1)).val(parseFloat(interestTable).toFixed(2));

                            payment_table = $('#payment_table' + (k+1)).val();
                            interest_table = $('#interest_table' + (k+1)).val();
                            principalTable = parseFloat(payment_table) - parseFloat(interest_table);
                            $('#principal_table' + (k+1)).val(parseFloat(principalTable).toFixed(2));

                            principal_table = $('#principal_table' + (k+1)).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k+1)).val(parseFloat(outstandingTable).toFixed(2));

                            paid_table = $('#paid_table' + k).val();
                            payment_table = $('#payment_table' + k).val();
                            if (paid_table == 'true') {
                                totalPayment = parseFloat(totalPayment) + parseFloat(payment_table);
                            }
                            $('#total_payment').val(parseFloat(totalPayment).toFixed(2));
                            
                            sum += parseFloat($('#interest_table' + k).val());
                            $('#interest').val(parseFloat(sum).toFixed(2));
                        }

                        loanAmount = $('#loan_amount').val();
                        interest = $('#interest').val();

                        $('#principal_plus_interest').val((parseFloat(interest) + parseFloat(loanAmount)).toFixed(2));

                        principalPlusInterest = $('#principal_plus_interest').val();
                        totalPayment = $('#total_payment').val();
                        outstandingBalance = parseFloat(principalPlusInterest) - parseFloat(totalPayment);
                        $('#outstanding_balance').val(parseFloat(outstandingBalance).toFixed(2));
                    } else {
                        $('#interest').val("");
                        $('#principal_plus_interest').val("");
                        $('#installment_per_month').val("");
                        $('#total_payment').val("");
                        $('#outstanding_balance').val("");
                        $('#principal_table').val("");
                        $('#interest_table').val("");
                        $('#payment_table').val("");
                        $('#outstanding_table').val("");
                        $('#total_payment').val("");
                    }
                }
            }
            else if (func === 'edit' && noOfInstallmentChanged == true) {
                for (var i = 0; i <= noOfInstallment; i++) {
                    table.row.add([
                        '<div class="form-check">' +
                            '<input class="form-check-input" type="checkbox" id="check_table" name="check_table" value="true">' +
                        '</div>',
                        '<div class="input-group">' +
                            '<input type="text" class="form-control" id="payment_date_table'+ i +'" name="payment_date_table[]">' +  
                            '<div class="input-group-prepend date" id="payment_date_table_calendar">' +
                                '<span class="input-group-text" id="payment_date_calendar_table'+ i +'"><span class="fa fa-calendar"></span></span>' +
                            '</div>' +
                        '</div>',
                        '<input type="number" class="form-control" id="seq_no_table'+ i +'" name="seq_no_table[]" value="'+ i +'" readonly>',
                        '<select class="form-control select2" id="payment_type'+ i +'" name="payment_type[]" disabled>' +
                                '<option value="" disabled selected>{{ __("payroll_loan_data_entry.label_select_payment_type") }}</option>' +
                                '<option value="S">Salary</option>' +
                                '<option value="B">Bonus</option>' +
                                '<option value="T">THR</option>' +
                                '<option value="C">Cash</option>' +
                        '</select>',
                        '<input type="number" class="form-control" id="principal_table'+ i +'" name="principal_table[]" readonly>',
                        '<input type="number" class="form-control" id="interest_table'+ i +'" data-seq = "'+ i +'" name="interest_table[]" readonly>',
                        '<input type="number" class="form-control" id="payment_table'+ i +'" name="payment_table[]" readonly>',
                        '<input type="number" class="form-control" id="outstanding_table'+ i +'" data-seq = "'+ i +'" name="outstanding_table[]" readonly>',
                        '<input type="text" class="form-control paid-table" id="paid_table'+ i +'" data-seq = "'+ i +'" name="paid_table[]" value="false" placeholder={{ __("payroll_loan_data_entry.label_select_paid_table") }} readonly>',
                        '<input type="text" class="form-control" id="payment_type_hidden'+ i +'" name="payment_type_hidden[]" hidden>',
                    ]).draw();

                    // var paymentDate = moment().add(i+1, 'month').format('YYYY-MM-DD');

                    pickerPaymentDateTable('#payment_date_table' + i);

                    if ($('#payment_type' + 0).val() == 'S') {
                        for (j = 0; j <= noOfInstallment; j++) {
                            $('#payment_type' + (j+1)).val('S').trigger('change');
                            $('#payment_type_hidden' + (j+1)).val('S');
                        }
                    }
                    else if ($('#payment_type' + 0).val() == 'B') {
                        for (j = 0; j <= noOfInstallment; j++) {
                            $('#payment_type' + (j+1)).val('B').trigger('change');
                            $('#payment_type_hidden' + (j+1)).val('B');
                        }
                    }
                    else if ($('#payment_type' + 0).val() == 'T') {
                        for (j = 0; j <= noOfInstallment; j++) {
                            $('#payment_type' + (j+1)).val('T').trigger('change');
                            $('#payment_type_hidden' + (j+1)).val('T');
                        }
                    }
                    else if ($('#payment_type' + 0).val() == 'C') {
                        for (j = 0; j <= noOfInstallment; j++) {
                            $('#payment_type' + (j+1)).val('C').trigger('change');
                            $('#payment_type_hidden' + (j+1)).val('C');
                        }
                    }
                    else {
                        for (j = 0; j <= noOfInstallment; j++) {
                            $('#payment_type' + (j+1)).val('').trigger('change');
                            $('#payment_type_hidden' + (j+1)).val('');
                        }
                    }

                    if (typeof arrData[0].detail[i] !== 'undefined') {
                        $('#payment_type' + i).val(arrData[0].detail[i].paymentType);
                        $('#payment_type_hidden' + i).val(arrData[0].detail[i].paymentType);
                        $('#paid_table' + i).val(arrData[0].detail[i].flagStatus);

                        let pickerPaymentDate = $('#payment_date_table' + i).flatpickr({
                            altInput: true,
                            allowInput: true,
                            altFormat: "j-M-y",
                            dateFormat: "Y-m-d",
                            defaultDate: "today",
                            onReady: function () {
                                var flatPickrInstance = this;
                                var $flatPickrInput = $(flatPickrInstance.element);
                                $flatPickrInput.siblings("#payment_date_calendar_table" + i).click(function () {
                                    flatPickrInstance.toggle();
                                });
                            }
                        });

                        pickerPaymentDate.setDate((typeof arrData[0].detail[i].paymentDate !== 'undefined' && arrData[0].detail[i].paymentDate !== null) ? arrData[0].detail[i].paymentDate : '');
                    }

                    if ($('#interest_type').val() === 'F' && loanAmount !== '' && noOfInstallment !== '' && ratePerYear !== '' && noOfInstallment > 0) {
                        principalTable = parseFloat(loanAmount) / parseFloat(noOfInstallment);
                        $('#principal_table' + 0).val(parseInt(0));
                        $('#principal_table' + i).val(parseFloat(principalTable).toFixed(2));

                        interestTable = (parseFloat(loanAmount) * parseFloat(ratePerYear) / 12);
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#interest_table' + i).val(parseFloat(interestTable).toFixed(2));

                        principal_table = $('#principal_table'+ i).val();
                        interest_table = $('#interest_table' + i).val();

                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + 0).val(parseInt(0));
                        $('#payment_table' + i).val(parseFloat(paymentTable).toFixed(2));

                        loan_amount = $('#loan_amount').val();
                        $('#outstanding_table' + 0).val(parseFloat(loan_amount).toFixed(2));

                        outstandingTableSeq = parseInt($('#outstanding_table' + 0).attr('data-seq'));
                        var totalPayment = parseFloat(0);
                        var sum = parseFloat(0);
                        for (var k = outstandingTableSeq; k <= noOfInstallment; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));

                            paid_table = $('#paid_table' + k).val();
                            payment_table = $('#payment_table' + k).val();
                            if (paid_table == 'true') {
                                totalPayment = parseFloat(totalPayment) + parseFloat(payment_table);
                            }
                            $('#total_payment').val(parseFloat(totalPayment).toFixed(2));
                            
                            sum += parseFloat($('#interest_table' + k).val());
                            $('#interest').val(parseFloat(sum).toFixed(2));
                        }

                        interest = $('#interest').val();
                        loanAmount = $('#loan_amount').val();
                        noOfInstallment = $('#no_of_installment').val();

                        $('#principal_plus_interest').val((parseFloat(interest) + parseFloat(loanAmount)).toFixed(2));
                        
                        installmentPerMonth = (parseFloat(loanAmount) + parseFloat(interest)) / parseInt(noOfInstallment);
                        $('#installment_per_month').val(parseFloat(installmentPerMonth).toFixed(2));
                        
                        principalPlusInterest = $('#principal_plus_interest').val();
                        totalPayment = $('#total_payment').val();
                        outstandingBalance = parseFloat(principalPlusInterest) - parseFloat(totalPayment);
                        $('#outstanding_balance').val(parseFloat(outstandingBalance).toFixed(2));

                    } else if ($('#interest_type').val() === 'E' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
                        principalTable = parseFloat(loanAmount) / parseFloat(noOfInstallment);
                        $('#principal_table' + 0).val(parseInt(0));
                        $('#principal_table' + i).val(parseFloat(principalTable).toFixed(2));

                        seq_no_table = $('#seq_no_table' + i).val();
                        principal_table = $('#principal_table' + i).val();
                        interestTable = (parseFloat(loanAmount) - ((parseFloat(seq_no_table) - 1) * parseFloat(principal_table))) * (parseFloat(ratePerYear) / 12);
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#interest_table' + i).val(parseFloat(interestTable).toFixed(2));

                        interest_table = $('#interest_table' + i).val();
                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + 0).val(parseInt(0));
                        $('#payment_table' + i).val(parseFloat(paymentTable).toFixed(2));

                        loan_amount = $('#loan_amount').val();
                        $('#outstanding_table' + 0).val(parseFloat(loan_amount).toFixed(2));

                        outstandingTableSeq = parseInt($('#outstanding_table' + 0).attr('data-seq'));
                        var totalPayment = parseFloat(0);
                        var sum = parseFloat(0);
                        for (var k = outstandingTableSeq; k <= noOfInstallment; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));

                            paid_table = $('#paid_table' + k).val();
                            payment_table = $('#payment_table' + k).val();
                            if (paid_table == 'true') {
                                totalPayment = parseFloat(totalPayment) + parseFloat(payment_table);
                            }
                            $('#total_payment').val(parseFloat(totalPayment).toFixed(2));
                            
                            sum += parseFloat($('#interest_table' + k).val());
                            $('#interest').val(parseFloat(sum).toFixed(2));
                        }

                        loanAmount = $('#loan_amount').val();
                        noOfInstallment = $('#no_of_installment').val();
                        ratePerYear = parseFloat($('#rate_per_year').val()) / 100;
                        interest = $('#interest').val();

                        $('#principal_plus_interest').val((parseFloat(interest) + parseFloat(loanAmount)).toFixed(2));
                        
                        installmentPerMonth = (parseFloat(loanAmount)) * (parseFloat(ratePerYear) / 12) * (1 / (1 - (1 / Math.pow((1 + (parseFloat(ratePerYear) / 12)), parseInt(noOfInstallment)))));

                        $('#installment_per_month').val(parseFloat(installmentPerMonth).toFixed(2));
                        
                        principalPlusInterest = $('#principal_plus_interest').val();
                        totalPayment = $('#total_payment').val();
                        outstandingBalance = parseFloat(principalPlusInterest) - parseFloat(totalPayment);
                        $('#outstanding_balance').val(parseFloat(outstandingBalance).toFixed(2));

                    } else if ($('#interest_type').val() === 'A' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
                        loan_amount = $('#loan_amount').val();
                        $('#outstanding_table' + 0).val(parseFloat(loan_amount).toFixed(2));

                        $('#payment_table' + 0).val(parseInt(0));
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#interest_table' + 0).val(parseInt(0));
                        $('#principal_table' + 0).val(parseInt(0));

                        loanAmount = $('#loan_amount').val();
                        noOfInstallment = $('#no_of_installment').val();
                        ratePerYear = parseFloat($('#rate_per_year').val()) / 100;
                        interest = $('#interest').val();

                        installmentPerMonth = (parseFloat(loanAmount)) * (parseFloat(ratePerYear) / 12) * (1 / (1 - (1 / Math.pow((1 + (parseFloat(ratePerYear) / 12)), parseInt(noOfInstallment)))));
                        $('#payment_table' + i).val(parseFloat(installmentPerMonth).toFixed(2));
                        $('#installment_per_month').val(parseFloat(installmentPerMonth).toFixed(2));
                        
                        outstandingTableSeq = parseInt($('#outstanding_table' + 0).attr('data-seq'));
                        var totalPayment = parseFloat(0);
                        var sum = parseFloat(0);
                        for (var k = outstandingTableSeq; k <= noOfInstallment; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            interestTable = parseFloat(outstanding_table) * parseFloat(ratePerYear) / 12;
                            $('#interest_table' + (k+1)).val(parseFloat(interestTable).toFixed(2));

                            payment_table = $('#payment_table' + (k+1)).val();
                            interest_table = $('#interest_table' + (k+1)).val();
                            principalTable = parseFloat(payment_table) - parseFloat(interest_table);
                            $('#principal_table' + (k+1)).val(parseFloat(principalTable).toFixed(2));

                            principal_table = $('#principal_table' + (k+1)).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k+1)).val(parseFloat(outstandingTable).toFixed(2));

                            paid_table = $('#paid_table' + k).val();
                            payment_table = $('#payment_table' + k).val();
                            if (paid_table == 'true') {
                                totalPayment = parseFloat(totalPayment) + parseFloat(payment_table);
                            }
                            $('#total_payment').val(parseFloat(totalPayment).toFixed(2));
                            
                            sum += parseFloat($('#interest_table' + k).val());
                            $('#interest').val(parseFloat(sum).toFixed(2));
                        }

                        loanAmount = $('#loan_amount').val();
                        interest = $('#interest').val();

                        $('#principal_plus_interest').val((parseFloat(interest) + parseFloat(loanAmount)).toFixed(2));

                        principalPlusInterest = $('#principal_plus_interest').val();
                        totalPayment = $('#total_payment').val();
                        outstandingBalance = parseFloat(principalPlusInterest) - parseFloat(totalPayment);
                        $('#outstanding_balance').val(parseFloat(outstandingBalance).toFixed(2));
                    } else {
                        $('#interest').val("");
                        $('#principal_plus_interest').val("");
                        $('#installment_per_month').val("");
                        $('#total_payment').val("");
                        $('#outstanding_balance').val("");
                        $('#principal_table').val("");
                        $('#interest_table').val("");
                        $('#payment_table').val("");
                        $('#outstanding_table').val("");
                        $('#total_payment').val("");
                    }
                }
            }
            else {
                $.each(arrData[0].detail, function(k, v) {
                    table.row.add([
                        '<div class="form-check">' +
                            '<input class="form-check-input" type="checkbox" id="check_table" name="check_table" value="true">' +
                        '</div>',
                        '<div class="input-group">' +
                            '<input type="text" class="form-control" id="payment_date_table'+ k +'" name="payment_date_table[]">' +  
                            '<div class="input-group-prepend date" id="payment_date_table_calendar">' +
                                '<span class="input-group-text" id="payment_date_calendar_table'+ k +'"><span class="fa fa-calendar"></span></span>' +
                            '</div>' +
                        '</div>',
                        '<input type="number" class="form-control" id="seq_no_table'+ k +'" name="seq_no_table[]" value="'+ ((typeof v.paymentSeq !== 'undefined' && v.paymentSeq !== null) ? v.paymentSeq : '') +'" readonly>',
                        '<select class="form-control select2" id="payment_type'+ k +'" name="payment_type[]" disabled>' +
                                '<option value="" disabled selected>{{ __("payroll_loan_data_entry.label_select_payment_type") }}</option>' +
                                '<option value="S">Salary</option>' +
                                '<option value="B">Bonus</option>' +
                                '<option value="T">THR</option>' +
                                '<option value="C">Cash</option>' +
                        '</select>',
                        '<input type="number" class="form-control" id="principal_table'+ k +'" name="principal_table[]" value="'+ ((typeof v.paymentPrincipal!== 'undefined' && v.paymentPrincipal !== null) ? v.paymentPrincipal : '') +'" readonly>',
                        '<input type="number" class="form-control" id="interest_table'+ k +'" name="interest_table[]" value="'+ ((typeof v.paymentInterest !== 'undefined' && v.paymentInterest !== null) ? v.paymentInterest : '') +'" readonly>',
                        '<input type="number" class="form-control" id="payment_table'+ k +'" name="payment_table[]" value="'+ ((typeof v.payment !== 'undefined' && v.payment !== null) ? v.payment : '') +'" readonly>',
                        '<input type="number" class="form-control" id="outstanding_table'+ k +'" data-seq = "'+ k +'" name="outstanding_table[]" value="'+ ((typeof v.outStandingAmount !== 'undefined' && v.outStandingAmount !== null) ? v.outStandingAmount : '') +'" readonly>',
                        '<input type="text" class="form-control paid-table" id="paid_table'+ k +'" data-seq = "'+ k +'" name="paid_table[]" placeholder={{ __("payroll_loan_data_entry.label_select_paid_table") }} value="'+ ((typeof v.flagStatus !== 'undefined' && v.flagStatus !== null) ? v.flagStatus : '') +'" readonly>',
                        '<input type="text" class="form-control" id="payment_type_hidden'+ k +'" name="payment_type_hidden[]" value="'+ ((typeof v.paymentType !== 'undefined' && v.paymentType !== null) ? v.paymentType : '') +'" hidden>',
                    ]).draw();

                    let pickerPaymentDate = $('#payment_date_table' + k).flatpickr({
                        altInput: true,
                        allowInput: true,
                        altFormat: "j-M-y",
                        dateFormat: "Y-m-d",
                        defaultDate: "today",
                        onReady: function () {
                            var flatPickrInstance = this;
                            var $flatPickrInput = $(flatPickrInstance.element);
                            $flatPickrInput.siblings("#payment_date_calendar_table" + k).click(function () {
                                flatPickrInstance.toggle();
                            });
                        }
                    });

                    pickerPaymentDate.setDate((typeof v.paymentDate !== 'undefined' && v.paymentDate !== null) ? v.paymentDate : '');

                    $('#payment_type' + k).val((typeof v.paymentType !== 'undefined' && v.paymentType !== null) ? v.paymentType : '').trigger('change');

                    outstandingTableSeq = parseInt($('#outstanding_table' + 0).attr('data-seq'));
                    var totalPayment = parseFloat(0);
                    var sum = parseFloat(0);
                    $.each (arrData[0].detail, function(k, v) {
                        paid_table = $('#paid_table' + k).val();
                        payment_table = $('#payment_table' + k).val();
                        if (paid_table == 'true') {
                            totalPayment = parseFloat(totalPayment) + parseFloat(payment_table);
                        }
                        $('#total_payment').val(parseFloat(totalPayment).toFixed(2));

                        loanAmount = $('#loan_amount').val();
                        interest = $('#interest').val();

                        $('#principal_plus_interest').val((parseFloat(interest) + parseFloat(loanAmount)).toFixed(2));
                        
                        principalPlusInterest = $('#principal_plus_interest').val();
                        totalPayment = $('#total_payment').val();
                        outstandingBalance = parseFloat(principalPlusInterest) - parseFloat(totalPayment);
                        $('#outstanding_balance').val(parseFloat(outstandingBalance).toFixed(2));
                    });

                    if ($('#interest_type').val() === 'F' && $('#loan_amount').val() !== '' && $('#no_of_installment').val() !== '' && $('#rate_per_year').val() !== '' && $('#no_of_installment').val() > 0) {
                        principal_table = $('#principal_table'+ k).val();
                        interest_table = $('#interest_table' + k).val();

                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + 0).val(parseInt(0));
                        $('#payment_table' + k).val(parseFloat(paymentTable).toFixed(2));
                    } else if ($('#interest_type').val() === 'E' && $('#loan_amount').val() !== '' && $('#no_of_installment').val() !== '' && $('#rate_per_year').val() !== '' && $('#no_of_installment').val() > 0) {
                        principal_table = $('#principal_table' + k).val();
                        interest_table = $('#interest_table' + k).val();

                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + 0).val(parseInt(0));
                        $('#payment_table' + k).val(parseFloat(paymentTable).toFixed(2));
                    } else if ($('#interest_type').val() === 'A' && $('#loan_amount').val() !== '' && $('#no_of_installment').val() !== '' && $('#rate_per_year').val() !== '' && $('#no_of_installment').val() > 0) {
                        loanAmount = $('#loan_amount').val();
                        noOfInstallment = $('#no_of_installment').val();
                        ratePerYear = parseFloat($('#rate_per_year').val()) / 100;
                        interest = $('#interest').val();

                        installmentPerMonth = (parseFloat(loanAmount)) * (parseFloat(ratePerYear) / 12) * (1 / (1 - (1 / Math.pow((1 + (parseFloat(ratePerYear) / 12)), parseInt(noOfInstallment)))));
                        $('#payment_table' + k).val(parseFloat(installmentPerMonth).toFixed(2));
                    } else {
                        $('#interest').val("");
                        $('#principal_plus_interest').val("");
                        $('#installment_per_month').val("");
                        $('#total_payment').val("");
                        $('#outstanding_balance').val("");
                        $('#principal_table').val("");
                        $('#interest_table').val("");
                        $('#payment_table').val("");
                        $('#outstanding_table').val("");
                        $('#total_payment').val("");
                    }
                });
            }
        }

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

        function loadDataLoanCode() {
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
            $('#loan_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Loan Code</b></div>' +
                        '<div class="col-6"><b>Loan Description</b></div>' +
                        '</div>';
                    $('.select2-search').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#loan_code').select2({
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
                                    text: item.loanCode,
                                    id: item.loanCode,
                                    title: item.loanDescription,
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

            $("#loan_data_entry_form").submit();
        });

        if ($("#loan_data_entry_form").length > 0) {
            $("#loan_data_entry_form").validate({
            rules: {
                    employee_no: {
                        required: true,
                    },
                    loan_code: {
                        required: true,
                    },
                    loan_date: {
                        required: true,
                    },
                    interest_type: {
                        required: true,
                    }
                },
                messages: {
                    employee_no: {
                        required: "{{ __('payroll_loan_data_entry.field_mandatory') }}",
                    },
                    loan_code: {
                        required: "{{ __('payroll_loan_data_entry.field_mandatory') }}",
                    },
                    loan_date: {
                        required: "{{ __('payroll_loan_data_entry.field_mandatory') }}",
                    },
                    interest_type: {
                        required: "{{ __('payroll_loan_data_entry.field_mandatory') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_data_entry.btn_save") }}'
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
                        url: "{{ url('payroll/loan_data_entry/proses') }}",
                        type: "POST",
                        data: $('#loan_data_entry_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_data_entry.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/loan_data_entry') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_data_entry.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_data_entry.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            });
        }
    })
</script>

</html>