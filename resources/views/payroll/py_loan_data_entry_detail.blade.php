<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_loan_data_entry.judul') }}</title>
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
                            <input type="number" min=0 max=100 class="form-control" id="rate_per_year" name="rate_per_year"
                                placeholder="{{ __('payroll_loan_data_entry.label_rate_per_year') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="installment_per_month">{{ __('payroll_loan_data_entry.label_installment_per_month') }}</label>
                            <input type="text" class="form-control" id="installment_per_month" name="installment_per_month"
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
                            <input type="text" class="form-control" id="outstanding_balance" name="outstanding_balance"
                                placeholder="{{ __('payroll_loan_data_entry.label_outstanding_balance') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="termination_loan">{{ __('payroll_loan_data_entry.label_termination_loan') }}</label>
                            <input type="number" class="form-control" id="termination_loan" name="termination_loan"
                                placeholder="{{ __('payroll_loan_data_entry.label_termination_loan') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="paid_on">{{ __('payroll_loan_data_entry.label_paid_on') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="paid_on" name="paid_on"
                                    placeholder="{{ __('payroll_loan_data_entry.label_paid_on') }}" disabled>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="paid_on_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="paid_on_hidden" name="paid_on_hidden" hidden>
                        </div>
                    </div>
                </div>
                <div class="div-table">
                    <table id="loan_data_entry_detail_table" class="table hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Date</th>
                                <th>Req</th>
                                <th>Type</th>
                                <th>Principal</th>
                                <th>Interest</th>
                                <th>Payment</th>
                                <th>Outstanding</th>
                                <th>Paid</th>
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

        var func = '{{ $func }}';
        var arrData = @json($data);
        var interest = null;
        var noOfInstallment = null;
        var loanAmount = null;
        var downPayment = null;
        var installmentPerMonth = null;
        var ratePerYear = null;

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
            $('#interest').prop('readonly', false);
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
            $('#loan_no').val(1);
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
        }   
        else {

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

        $('#interest, #interest_type, #loan_amount, #down_payment, #no_of_installment, #rate_per_year').on('input', function () {
            interest = $('#interest').val();
            loanAmount = $('#loan_amount').val();
            downPayment = $('#down_payment').val();
            noOfInstallment = $('#no_of_installment').val();
            ratePerYear = $('#rate_per_year').val();

            if (interest !== '' && interest !== null && loanAmount !== '' && loanAmount !== null) {
                $('#principal_plus_interest').val(parseInt(interest) + parseInt(loanAmount));
            } else if (interest == '' || interest == null){
                $('#principal_plus_interest').val(loanAmount);
            } else {
                $('#principal_plus_interest').val(interest);
            }

            if (loanAmount !== '' && loanAmount !== null && downPayment !== '' && downPayment !== null) {
                $('#loan_amount_balance').val(parseInt(loanAmount) - parseInt(downPayment));
            } else if (loanAmount == '' || loanAmount == null){
                $('#loan_amount_balance').val(downPayment);
            } else {
                $('#loan_amount_balance').val(loanAmount);
            }

            if ($('#interest_type').val() === 'F' && interest !== '' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
                installmentPerMonth = (parseInt(loanAmount) + parseInt(interest)) / parseInt(noOfInstallment);
                $('#installment_per_month').val(installmentPerMonth);
            } else if ($('#interest_type').val() === 'E' || $('#interest_type').val() === 'A' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
                installmentPerMonth = (parseInt(loanAmount)) * (parseInt(ratePerYear) / 12) * (1 / (1 - (1 / (1 + (parseInt(ratePerYear) / 12)^parseInt(noOfInstallment)))));
                $('#installment_per_month').val(installmentPerMonth);
            } else {
                $('#installment_per_month').val('');
            }
        });

        // $('#loan_amount, #down_payment').on('input', function () {
        //     loanAmount = $('#loan_amount').val();
        //     downPayment = $('#down_payment').val();
        //     if (loanAmount !== '' && loanAmount !== null && downPayment !== '' && downPayment !== null) {
        //         $('#loan_amount_balance').val(parseInt(loanAmount) - parseInt(downPayment));
        //     } else if (loanAmount == '' || loanAmount == null){
        //         $('#loan_amount_balance').val(downPayment);
        //     } else {
        //         $('#loan_amount_balance').val(loanAmount);
        //     }
        // });

        // $('#interest, #interest_type, #loan_amount, #no_of_installment, #rate_per_year').on('input', function () {
        //     interest = $('#interest').val();
        //     loanAmount = $('#loan_amount').val();
        //     noOfInstallment = $('#no_of_installment').val();
        //     ratePerYear = $('#rate_per_year').val();
        //     if ($('#interest_type').val() === 'F' && interest !== '' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
        //         installmentPerMonth = (parseInt(loanAmount) + parseInt(interest)) / parseInt(noOfInstallment);
        //         $('#installment_per_month').val(installmentPerMonth);
        //     } else if ($('#interest_type').val() === 'E' || $('#interest_type').val() === 'A' && loanAmount !== '' && noOfInstallment !== '' && noOfInstallment > 0) {
        //         installmentPerMonth = (parseInt(loanAmount)) * (parseInt(ratePerYear) / 12) * (1 / (1 - (1 / (1 + (parseInt(ratePerYear) / 12)^parseInt(noOfInstallment)))));
        //         $('#installment_per_month').val(installmentPerMonth);
        //     } else {
        //         $('#installment_per_month').val('');
        //     }
        // });

        // $('#installment_per_month').on('input', function () {
        //     var installmentPerMonth = $(this).val();
        //     console.log(installmentPerMonth);
        // })

        loadDataEmployeeNo();
        loadDataLoanCode();
        loadDataCurrencyCode();
        load_data_table_loan_data_entry_detail();

        function load_data_table_loan_data_entry_detail() {
            table = $('#loan_data_entry_detail').DataTable({
                processing: true,
                orderCellsTop: true,
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
            });
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
                    url: '/loan_code/api',
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
                    url: '/currency/api',
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