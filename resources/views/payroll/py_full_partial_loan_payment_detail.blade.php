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
            <a href="{{ url('payroll/full_partial_loan_payment') }}" target="iframe_dashboard">
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
                        <input type="text" class="form-control" id="period_month" name="period_month" hidden>
                        <input type="text" class="form-control" id="period_year" name="period_year" hidden>
                        <input type="text" class="form-control" id="status_period" name="status_period" hidden>
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
                            <select class="form-control select2" id="payment_method" name="payment_method" disabled>
                                <option value="" disabled selected></option>
                            </select>
                        </div>
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
                    <div class="col-6">
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
                    <div class="col-6">
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
                    <div class="col-6">
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
                    <div class="col-6">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_amount">{{ __('payroll_full_partial_loan_payment.label_payment_amount') }}</label>
                            <small class="text-muted">({{ __('payroll_full_partial_loan_payment.label_payment_amount_rules') }})</small>
                            <input type="number" class="form-control" id="payment_amount" name="payment_amount"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_payment_amount') }}">
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-6">
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
                    <div class="col-6">
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
                    <div class="col-6">
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
                    <div class="col-6">
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
                    <div class="col-6">
                        <div class="form-group">
                            <label for="new_no_of_installment_not_yet_paid">{{ __('payroll_full_partial_loan_payment.label_new_no_of_installment_not_yet_paid') }}</label>
                            <input type="number" class="form-control" id="new_no_of_installment_not_yet_paid" name="new_no_of_installment_not_yet_paid"
                                placeholder="{{ __('payroll_full_partial_loan_payment.label_new_no_of_installment_not_yet_paid') }}">
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="div-table">
                    <table id="full_partial_loan_payment_detail_table" class="table hover" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Seq</th>
                                <th>Type</th>
                                <th>Principal</th>
                                <th>Interest</th>
                                <th>Payment</th>
                                <th>Outstanding</th>
                                <th>Paid</th>
                                <th style="display: none; width: 0%">Employee No</th>
                                <th style="display: none; width: 0%">Employee Name</th>
                                <th style="display: none; width: 0%">Loan No</th>
                                <th style="display: none; width: 0%">Rate Per Year</th>
                            </tr>
                        </thead>
                    </table>
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
        var responseGrid = null;
        var arrTable = [];
        var table = null;
        var paymentType = null;
        var totalNotYetPaid = 0;
        var other_cost = 0;
        var payment_amount = 0;
        var totalPayment = 0;
        var total_not_yet_paid = 0;
        var total_payment = 0;
        var new_outstanding_amount = 0;
        var newOutStandingAmount = 0;
        var arrSeqNo = [];
        var arrPrincipalAmount = [];
        var arrInterest = [];
        var arrOutstandingAmount = [];
        var arrPayment = [];
        var no_of_installment_not_yet_paid = 0;
        var new_no_of_installment_not_yet_paid = 0;
        var idx = 0;
        var date = null;
        var principalTable = 0;
        var interestTable = 0;
        var paymentTable = 0;
        var principal_table = 0;
        var interest_table = 0;
        var outstanding_table_month = 0;
        var principal_table_month = 0;
        var outstanding_table = 0;
        var outstandingTableSeq = 0;

        var employee_no_table = null;
        var employee_name_table = null;
        var loan_no_table = 0;
        var rate_per_year_table = 0;

        $('.div-navbar a.disabled').attr('onclick', 'return false;');

        $('#full_partial_loan_payment_detail_table thead tr').clone(true).appendTo('#full_partial_loan_payment_detail_table thead');
        $('#full_partial_loan_payment_detail_table thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            } );
        });

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
            $('#loan_no').val("");
            $('#rate_per_year').val("");
            $('#paid_loan_seq').val("");
            $('#no_of_installment_not_yet_paid').val("");
            $('#payment_method').val(null).trigger('change');
            $('#currency_code').val(null).trigger('change');
            $('#principal_amount_installment').val("");
            $('#interest_amount_per_installment').val("");
            $('#outstanding_amount').val("");
            $('#total_not_yet_paid').val("");
            $('#payment_amount').val("");
            $('#other_cost').val("");
            $('#total_payment').val("");
            $('#new_outstanding_amount').val("");
            $('#new_rate_per_year').val("");
            $('#new_no_of_installment_not_yet_paid').val("");
            $('#full_partial_loan_payment_detail_table').DataTable().destroy();
            load_data_table_loan_payment();

            $('#employee_no').on('select2:select', function (e) {
                var data = $('#employee_no').select2('data');
                $('#employee_name').val(htmlDecode(data[0].title));
                $('#loan_no').val(htmlDecode(data[0].description));

                employee_no_table = $('#employee_no').val();
                employee_name_table = $('#employee_name').val();
                loan_no_table = $('#loan_no').val();
                rate_per_year_table = $('#new_rate_per_year').val();

                $.ajax({
                    url: "{{ url('payroll/full_partial_loan_payment/data') }}",
                    type: "GET",
                    data: {
                        'employeeNo': data[0].id,
                        'loanNo': data[0].description
                    },
                    success: function (response) {
                        responseGrid = response;
                        $('#rate_per_year').val(response[0].ratePerYear);

                        $('#full_partial_loan_payment_detail_table').DataTable().destroy();
                        load_data_table_loan_payment();
                        table.clear().draw();

                        if (typeof response[0].detail !== 'undefined') {
                            arrTable = response[0].detail;
                            $.each(response[0].detail, function(k, v) {
                                // if (typeof v.paymentType !== 'undefined' && v.paymentType !== null) {
                                //     if (v.paymentType == 'S') {
                                //         paymentType = 'Salary';
                                //     } else if (v.paymentType == 'B') {
                                //         paymentType = 'Bonus';
                                //     } else if (v.paymentType == 'T') {
                                //         paymentType = 'THR';
                                //     } else {
                                //         paymentType = 'Cash';
                                //     }
                                // }

                                table.row.add([
                                    '<input type="text" class="form-control" id="payment_date_table'+ k +'" name="payment_date_table[]" value="'+ ((typeof v.paymentDate !== 'undefined' && v.paymentDate !== null) ? moment(v.paymentDate).format('DD-MMM-YYYY') : '') +'" readonly>',
                                    '<input type="number" class="form-control" id="seq_no_table'+ k +'" name="seq_no_table[]" value="'+ ((typeof v.paymentSeq !== 'undefined' && v.paymentSeq !== null) ? v.paymentSeq : '') +'" readonly>',
                                    '<input type="text" class="form-control" id="payment_type_table'+ k +'" name="payment_type_table[]" value="'+ ((typeof v.paymentType !== 'undefined' && v.paymentType !== null) ? v.paymentType : '') +'" readonly>',
                                    '<input type="number" class="form-control" id="principal_table'+ k +'" name="principal_table[]" value="'+ ((typeof v.paymentPrincipal !== 'undefined' && v.paymentPrincipal !== null) ? v.paymentPrincipal : '') +'" readonly>',
                                    '<input type="number" class="form-control" id="interest_table'+ k +'" name="interest_table[]" value="'+ ((typeof v.paymentInterest !== 'undefined' && v.paymentInterest !== null) ? v.paymentInterest : '') +'" readonly>',
                                    '<input type="number" class="form-control" id="payment_table'+ k +'" name="payment_table[]" data-seq = "'+ k +'" value="'+ ((typeof v.payment !== 'undefined' && v.payment !== null) ? v.payment : '') +'" readonly>',
                                    '<input type="number" class="form-control" id="outstanding_table'+ k +'" data-seq = "'+ k +'" name="outstanding_table[]" value="'+ ((typeof v.outStandingAmount !== 'undefined' && v.outStandingAmount !== null) ? v.outStandingAmount : '') +'" readonly>',
                                    '<input type="text" class="form-control paid-table" id="paid_table'+ k +'" data-seq = "'+ k +'" name="paid_table[]" value="'+ ((typeof v.flagStatus !== 'undefined' && v.flagStatus !== null) ? v.flagStatus : '') +'" readonly>',
                                    '<input type="text" class="form-control" id="employee_no_table'+ k +'" name="employee_no_table[]" hidden>',
                                    '<input type="text" class="form-control" id="employee_name_table'+ k +'" name="employee_name_table[]" hidden>',
                                    '<input type="text" class="form-control" id="loan_no_table'+ k +'" name="loan_no_table[]" hidden>',
                                    '<input type="text" class="form-control" id="rate_per_year_table'+ k +'" name="rate_per_year_table[]" hidden>',
                                ]).draw();

                                $('#payment_type_table' + k).text(paymentType);
                                $('#employee_no_table' + k).val(data[0].id);
                                $('#employee_name_table' + k).val(data[0].title);
                                $('#loan_no_table' + k).val(data[0].description);
                                $('#rate_per_year_table' + k).val($('#new_rate_per_year').val());

                                principal_table = $('#principal_table'+ k).val();
                                interest_table = $('#interest_table' + k).val();

                                paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                                $('#payment_table' + 0).val(parseInt(0));
                                $('#payment_table' + k).val(parseFloat(paymentTable).toFixed(2));

                                if (v.flagStatus == false && typeof v.flagStatus !== 'undefined') {
                                    arrSeqNo.push(v.paymentSeq);
                                    arrPrincipalAmount.push(v.paymentPrincipal);
                                    arrInterest.push(v.paymentInterest);
                                    arrOutstandingAmount.push(v.outStandingAmount);
                                    
                                    $('#paid_loan_seq').val(arrSeqNo[0]);
                                    $('#no_of_installment_not_yet_paid').val(arrSeqNo.length + 1);
                                    $('#principal_amount_installment').val(arrPrincipalAmount[0]);
                                    $('#interest_amount_per_installment').val(arrInterest[0]);
                                    $('#outstanding_amount').val(arrOutstandingAmount[0]);

                                    var principalAmount = parseFloat($('#principal_amount_installment').val());
                                    var interestAmount = parseFloat($('#interest_amount_per_installment').val());
                                    var outstandingAmount = parseFloat($('#outstanding_amount').val());

                                    totalNotYetPaid = interestAmount + principalAmount + outstandingAmount;
                                    $('#total_not_yet_paid').val(totalNotYetPaid);
                                }
                            });
                        }
                    }
                });
            });

            $('#employee_no').on('select2:unselecting', function (e) {
                $('#employee_name').val('');
                $('#loan_no').val('');
                $('#rate_per_year').val('');
                $('#paid_loan_seq').val('');
                $('#no_of_installment_not_yet_paid').val('');
                $('#principal_amount_installment').val('');
                $('#interest_amount_per_installment').val('');
                $('#outstanding_amount').val('');
                $('#total_not_yet_paid').val('');
                $('#new_outstanding_amount').val('');
                $('#new_rate_per_year').val('');
                $('#new_no_installment_not_yet_paid').val('');
                $('#full_partial_loan_payment_detail_table').DataTable().destroy();
                load_data_table_loan_payment();
                table.clear().draw();
            });
        } 
        else {
            $('#record_function').val('Edit');
            $('#employee_no').prop('disabled', true);
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
            $('#other_cost').prop('readonly', false);
            $('#total_payment').prop('readonly', true);
            $('#new_outstanding_amount').prop('readonly', true);
            if (arrData[0].paymentFlag === 'F') {
                $('#payment_amount').prop('readonly', true);
                $('#new_rate_per_year').prop('readonly', true);
                $('#new_no_of_installment_not_yet_paid').prop('readonly', true);
            } else {
                $('#payment_amount').prop('readonly', false);
                $('#new_rate_per_year').prop('readonly', false);
                $('#new_no_of_installment_not_yet_paid').prop('readonly', false);
            }

            $.ajax({
                type: 'GET',
                url: '/employee_no_full_partial_loan_payment/api',
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
            $('#loan_no').val((typeof arrData[0].loanNo !== 'undefined') ? arrData[0].loanNo : '');
            $('#rate_per_year').val((typeof arrData[0].ratePerYear !== 'undefined') ? arrData[0].ratePerYear : '');
            $('#paid_loan_seq').val((typeof arrData[0].auditLoanSeqNo !== 'undefined') ? arrData[0].auditLoanSeqNo : '');
            $('#no_of_installment_not_yet_paid').val((typeof arrData[0].noOfInstallmentNotYetPaid !== 'undefined') ? arrData[0].noOfInstallmentNotYetPaid : '');
            $('#payment_method').val((typeof arrData[0].paymentFlag !== 'undefined') ? arrData[0].paymentFlag : '').select2();
            // $.ajax({
            //     type: 'GET',
            //     url: '/payment_method_full_partial_loan_payment/api',
            //     data: {
            //         'paymentFlag': ((typeof arrData[0].paymentFlag !== 'undefined') ? arrData[0].paymentFlag : '')
            //     }
            // }).then(function (data) {
            //     console.log(data.paymentFlag);
            //     var option = $('<option/>', {
            //         id: data.paymentFlag,
            //         title: data.paymentFlag,
            //         text: data.paymentFlag
            //     });
            //     $("#payment_method").append(option).attr('data-alias', 'yourvalue').trigger(
            //         'change');
            //     $("#payment_method").trigger({
            //         type: 'select2:select',
            //         params: {
            //             id: data.paymentFlag,
            //             text: data.paymentFlag,
            //             data: data
            //         }
            //     });
            // });
            $.ajax({
                type: 'GET',
                url: '/currency_code_full_partial_loan_payment/api',
                data: {
                    'currencyCode': ((typeof arrData[0].currencyCode !== 'undefined') ? arrData[0].currencyCode : '')
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
            $('#principal_amount_installment').val((typeof arrData[0].principalAmount !== 'undefined') ? arrData[0].principalAmount : '');
            $('#interest_amount_per_installment').val((typeof arrData[0].interestAmount !== 'undefined') ? arrData[0].interestAmount : '');
            $('#outstanding_amount').val((typeof arrData[0].outstandingAmount !== 'undefined') ? arrData[0].outstandingAmount : '');
            total_not_yet_paid = parseFloat($('#principal_amount_installment').val()) + parseFloat($('#interest_amount_per_installment').val()) + parseFloat($('#outstanding_amount').val());
            $('#total_not_yet_paid').val(total_not_yet_paid);
            $('#payment_amount').val((typeof arrData[0].paymentAmount !== 'undefined') ? arrData[0].paymentAmount : '');
            $('#other_cost').val((typeof arrData[0].paymentOtherCost !== 'undefined') ? arrData[0].paymentOtherCost : '');
            total_payment = parseFloat($('#payment_amount').val()) + parseFloat($('#other_cost').val());
            $('#total_payment').val(total_payment);
            new_outstanding_amount = parseFloat($('#total_not_yet_paid').val()) - parseFloat($('#payment_amount').val());
            $('#new_outstanding_amount').val(new_outstanding_amount);
            $('#new_rate_per_year').val((typeof arrData[0].newRatePerYear !== 'undefined') ? arrData[0].newRatePerYear : '');

            $('#full_partial_loan_payment_detail_table').DataTable().destroy();
            load_data_table_loan_payment();

            employee_no_table = (typeof arrData[0].employeeNo !== 'undefined') ? arrData[0].employeeNo : '';
            employee_name_table = $('#employee_name').val();
            loan_no_table = $('#loan_no').val();
            rate_per_year_table = $('#new_rate_per_year').val();

            $.ajax({
                url: "{{ url('payroll/full_partial_loan_payment/data') }}",
                type: "GET",
                data: {
                    'employeeNo': $('#employee_no').val(),
                    'loanNo': $('#loan_no').val(),
                    'auditLoanSeqNo': $('#paid_loan_seq').val()
                },
                success: function (response) {
                    responseGrid = response;

                    $('#full_partial_loan_payment_detail_table').DataTable().destroy();
                    load_data_table_loan_payment();
                    table.clear().draw();

                    if (typeof response[0].detail !== 'undefined') {
                        arrTable = response[0].detail;
                        $.each(response[0].detail, function(k, v) {
                            // if (typeof v.paymentType !== 'undefined' && v.paymentType !== null) {
                            //     if (v.paymentType == 'S') {
                            //         paymentType = 'Salary';
                            //     } else if (v.paymentType == 'B') {
                            //         paymentType = 'Bonus';
                            //     } else if (v.paymentType == 'T') {
                            //         paymentType = 'THR';
                            //     } else {
                            //         paymentType = 'Cash';
                            //     }
                            // }

                            table.row.add([
                                '<input type="text" class="form-control" id="payment_date_table'+ k +'" name="payment_date_table[]" value="'+ ((typeof v.paymentDate !== 'undefined' && v.paymentDate !== null) ? moment(v.paymentDate).format('DD-MMM-YYYY') : '') +'" readonly>',
                                '<input type="number" class="form-control" id="seq_no_table'+ k +'" name="seq_no_table[]" value="'+ ((typeof v.paymentSeq !== 'undefined' && v.paymentSeq !== null) ? v.paymentSeq : '') +'" readonly>',
                                '<input type="text" class="form-control" id="payment_type_table'+ k +'" name="payment_type_table[]" value="'+ ((typeof v.paymentType !== 'undefined' && v.paymentType !== null) ? v.paymentType : '') +'" readonly>',
                                '<input type="number" class="form-control" id="principal_table'+ k +'" name="principal_table[]" value="'+ ((typeof v.paymentPrincipal !== 'undefined' && v.paymentPrincipal !== null) ? v.paymentPrincipal : '') +'" readonly>',
                                '<input type="number" class="form-control" id="interest_table'+ k +'" name="interest_table[]" value="'+ ((typeof v.paymentInterest !== 'undefined' && v.paymentInterest !== null) ? v.paymentInterest : '') +'" readonly>',
                                '<input type="number" class="form-control" id="payment_table'+ k +'" name="payment_table[]" data-seq = "'+ k +'" value="'+ ((typeof v.payment !== 'undefined' && v.payment !== null) ? v.payment : '') +'" readonly>',
                                '<input type="number" class="form-control" id="outstanding_table'+ k +'" data-seq = "'+ k +'" name="outstanding_table[]" value="'+ ((typeof v.outStandingAmount !== 'undefined' && v.outStandingAmount !== null) ? v.outStandingAmount : '') +'" readonly>',
                                '<input type="text" class="form-control paid-table" id="paid_table'+ k +'" data-seq = "'+ k +'" name="paid_table[]" value="'+ ((typeof v.flagStatus !== 'undefined' && v.flagStatus !== null) ? v.flagStatus : '') +'" readonly>',
                                '<input type="text" class="form-control" id="employee_no_table'+ k +'" name="employee_no_table[]" value="'+ employee_no_table +'" hidden>',
                                '<input type="text" class="form-control" id="employee_name_table'+ k +'" name="employee_name_table[]" value="'+ employee_name_table +'" hidden>',
                                '<input type="text" class="form-control" id="loan_no_table'+ k +'" name="loan_no_table[]" value="'+ loan_no_table +'" hidden>',
                                '<input type="text" class="form-control" id="rate_per_year_table'+ k +'" name="rate_per_year_table[]" value="'+ rate_per_year_table +'" hidden>',
                            ]).draw();

                            principal_table = $('#principal_table'+ k).val();
                            interest_table = $('#interest_table' + k).val();

                            paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                            $('#payment_table' + 0).val(parseInt(0));
                            $('#payment_table' + k).val(parseFloat(paymentTable).toFixed(2));

                            if (v.flagStatus == false && typeof v.flagStatus !== 'undefined') {
                                arrSeqNo.push(v.paymentSeq);
                                $('#new_no_of_installment_not_yet_paid').val(arrSeqNo.length);
                            }
                        });
                    }
                }
            });
        }

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $.ajax({
            url: "{{ url('/time_management/period/data/detail') }}",
            type: "GET",
            success: function (response) {
                isData = Object.keys(response).length;
                if (isData !== 0) {
                    $('#period_month').val((typeof response[0].periodMonth !== 'undefined') ? response[0].periodMonth : '');
                    $('#period_year').val((typeof response[0].periodYear !== 'undefined') ? response[0].periodYear : '');
                    $('#status_period').val((typeof response[0].statusPeriod !== 'undefined') ? response[0].statusPeriod : '');
                }
            }
        });

        $('#other_cost, #payment_amount, #new_rate_per_year, #new_no_of_installment_not_yet_paid').on('input', function () {
            if ($('#other_cost').val() !== '' && $('#payment_amount').val() !== '') {
                other_cost = parseFloat($('#other_cost').val());
                payment_amount = parseFloat($('#payment_amount').val());
                total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());

                totalPayment = payment_amount + other_cost;
                newOutStandingAmount = total_not_yet_paid - payment_amount;

                $('#total_payment').val(totalPayment);
                $('#new_outstanding_amount').val(newOutStandingAmount);

            } else if ($('#other_cost').val() !== '') {
                other_cost = parseFloat($('#other_cost').val());
                payment_amount = 0;
                total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());

                totalPayment = payment_amount + other_cost;
                newOutStandingAmount = total_not_yet_paid - payment_amount;

                $('#total_payment').val(totalPayment);
                $('#new_outstanding_amount').val(newOutStandingAmount);

            } else if ($('#payment_amount').val() !== '') {
                other_cost = 0;
                payment_amount = parseFloat($('#payment_amount').val());
                total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());

                totalPayment = payment_amount + other_cost;
                newOutStandingAmount = total_not_yet_paid - payment_amount;

                $('#total_payment').val(totalPayment);
                $('#new_outstanding_amount').val(newOutStandingAmount);

            } else {
                other_cost = 0;
                payment_amount = 0;
                total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());

                totalPayment = payment_amount + other_cost;
                newOutStandingAmount = total_not_yet_paid - payment_amount;

                $('#total_payment').val(totalPayment);
                $('#new_outstanding_amount').val(newOutStandingAmount);
            }

            total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());
            $('#new_outstanding_amount').val(total_not_yet_paid);

            rate_per_year_table = $('#new_rate_per_year').val();

            table.rows( function(idx, data, node) {
                return $(data[7]).val() == "false";
            }).remove().draw();
            
            table.rows(':last', {order : 'applied'}).every( function(rowIdx, tableLoop, rowLoop) {
                var d = this.data();

                idx = rowIdx;    
                date = $(d[0]).val();

                d[3] = '<input type="number" class="form-control" id="principal_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="principal_table[]" value="'+ (totalPayment - arrTable[rowIdx].paymentInterest) +'" readonly>';
                d[4] = '<input type="number" class="form-control" id="interest_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="interest_table[]" value="'+ arrTable[rowIdx].paymentInterest +'" readonly>';
                d[5] = '<input type="number" class="form-control" id="payment_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="payment_table[]" value="'+ totalPayment +'" readonly>';
                d[6] = '<input type="number" class="form-control" id="outstanding_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="outstanding_table[]" value="'+ arrTable[rowIdx].outStandingAmount +'" readonly>';
                d[8] = '<input type="text" class="form-control" id="employee_no_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="employee_no_table[]" value="'+ employee_no_table +'" hidden>';
                d[9] = '<input type="text" class="form-control" id="employee_name_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="employee_name_table[]" value="'+ employee_name_table +'" hidden>';
                d[10] = '<input type="text" class="form-control" id="loan_no_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="loan_no_table[]" value="'+ loan_no_table +'" hidden>';
                d[11] = '<input type="text" class="form-control" id="rate_per_year_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="rate_per_year_table[]" value="'+ rate_per_year_table +'" hidden>';

                this.invalidate();
            });

            table.draw();

            new_no_of_installment_not_yet_paid = parseInt($('#new_no_of_installment_not_yet_paid').val());
            payment_amount = parseInt($('#payment_amount').val());
            new_rate_per_year = parseFloat($('#new_rate_per_year').val()) / 100;

            if (payment_amount !== '') {
                outstanding_table_month = parseFloat($('#outstanding_table' + (idx - 1)).val());
                principal_table_month = parseFloat($('#principal_table'+ idx).val());
                $('#outstanding_table' + idx).val((outstanding_table_month - principal_table_month).toFixed(2));  
            }

            outstanding_table_month = parseFloat($('#outstanding_table' + idx).val());
            outstandingTableSeq = parseInt($('#outstanding_table' + idx).attr('data-seq'));

            for (var i = 0; i < new_no_of_installment_not_yet_paid; i++) {
                date = moment(date).add(1, 'months').format('DD-MMM-YYYY');

                idx++;

                // if (typeof arrTable[idx].paymentType !== 'undefined' && arrTable[idx].paymentType !== null) {
                //     if (arrTable[idx].paymentType == 'S') {
                //         paymentType = 'Salary';
                //     } else if (arrTable[idx].paymentType == 'B') {
                //         paymentType = 'Bonus';
                //     } else if (arrTable[idx].paymentType == 'T') {
                //         paymentType = 'THR';
                //     } else {
                //         paymentType = 'Cash';
                //     }
                // }

                table.row.add([
                    '<input type="text" class="form-control" id="payment_date_table'+ idx +'" name="payment_date_table[]" value="'+ date +'" readonly>',
                    '<input type="number" class="form-control" id="seq_no_table'+ idx +'" name="seq_no_table[]" value="'+ idx +'" readonly>',
                    '<input type="text" class="form-control" id="payment_type_table'+ idx +'" name="payment_type_table[]" value="'+ arrTable[idx].paymentType +'" readonly>',
                    '<input type="number" class="form-control" id="principal_table'+ idx +'" name="principal_table[]" readonly>',
                    '<input type="number" class="form-control" id="interest_table'+ idx +'" name="interest_table[]" readonly>',
                    '<input type="number" class="form-control" id="payment_table'+ idx +'" name="payment_table[]" data-seq = "'+ idx +'" readonly>',
                    '<input type="number" class="form-control" id="outstanding_table'+ idx +'" data-seq = "'+ idx +'" name="outstanding_table[]" readonly>',
                    '<input type="text" class="form-control paid-table" id="paid_table'+ idx +'" data-seq = "'+ idx +'" name="paid_table[]" value="'+ arrTable[idx].flagStatus +'" readonly>',
                    '<input type="text" class="form-control" id="employee_no_table'+ idx +'" name="employee_no_table[]" value="'+ employee_no_table +'" hidden>',
                    '<input type="text" class="form-control" id="employee_name_table'+ idx +'" name="employee_name_table[]" value="'+ employee_name_table +'" hidden>',
                    '<input type="text" class="form-control" id="loan_no_table'+ idx +'" name="loan_no_table[]" value="'+ loan_no_table +'" hidden>',
                    '<input type="text" class="form-control" id="rate_per_year_table'+ idx +'" name="rate_per_year_table[]" value="'+ rate_per_year_table +'" hidden>',
                ]).draw();

                principal_table = $('#principal_table'+ idx).val();
                interest_table = $('#interest_table' + idx).val();

                paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));

                if (responseGrid[0].interestType === 'F' && payment_amount !== '' && new_no_of_installment_not_yet_paid !== '' && new_rate_per_year !== '' && new_no_of_installment_not_yet_paid > 0) {
                    principalTable = parseFloat(outstanding_table_month) / parseFloat(new_no_of_installment_not_yet_paid);
                    $('#principal_table' + idx).val(parseFloat(principalTable).toFixed(2));

                    interestTable = (parseFloat(outstanding_table_month) * parseFloat(new_rate_per_year) / 12);
                    $('#interest_table' + idx).val(parseFloat(interestTable).toFixed(2));

                    principal_table = $('#principal_table'+ idx).val();
                    interest_table = $('#interest_table' + idx).val();

                    paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                    $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));

                    for (var k = outstandingTableSeq; k < idx; k++) {
                        outstanding_table = $('#outstanding_table' + k).val();
                        outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                        $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));
                    }
                } else if (responseGrid[0].interestType === 'E' && payment_amount !== '' && new_no_of_installment_not_yet_paid !== '' && new_rate_per_year !== '' && new_no_of_installment_not_yet_paid > 0) {
                    principalTable = parseFloat(outstanding_table_month) / parseFloat(new_no_of_installment_not_yet_paid);
                    $('#principal_table' + idx).val(parseFloat(principalTable).toFixed(2));

                    seq_no_table = $('#seq_no_table' + idx).val();
                    principal_table = $('#principal_table' + idx).val();
                    interestTable = (parseFloat(outstanding_table_month) - ((parseFloat(seq_no_table) - 1) * parseFloat(principal_table))) * (parseFloat(new_rate_per_year) / 12);
                    $('#interest_table' + idx).val(parseFloat(interestTable).toFixed(2));

                    interest_table = $('#interest_table' + idx).val();
                    paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                    $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));

                    for (var k = outstandingTableSeq; k < idx; k++) {
                        outstanding_table = $('#outstanding_table' + k).val();
                        outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                        $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));
                    }
                } else if (responseGrid[0].interestType === 'A' && payment_amount !== '' && new_no_of_installment_not_yet_paid !== '' && new_rate_per_year !== '' && new_no_of_installment_not_yet_paid > 0) {
                    new_no_of_installment_not_yet_paid = $('#new_no_of_installment_not_yet_paid').val();
                    new_rate_per_year = parseFloat($('#new_rate_per_year').val()) / 100;

                    paymentTable = (parseFloat(outstanding_table_month)) * (parseFloat(new_rate_per_year) / 12) * (1 / (1 - (1 / Math.pow((1 + (parseFloat(new_rate_per_year) / 12)), parseInt(new_no_of_installment_not_yet_paid)))));
                    $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));
                    
                    for (var k = outstandingTableSeq; k < idx; k++) {
                        outstanding_table = $('#outstanding_table' + k).val();
                        interestTable = parseFloat(outstanding_table) * parseFloat(new_rate_per_year) / 12;
                        $('#interest_table' + (k+1)).val(parseFloat(interestTable).toFixed(2));

                        payment_table = $('#payment_table' + (k+1)).val();
                        interest_table = $('#interest_table' + (k+1)).val();
                        principalTable = parseFloat(payment_table) - parseFloat(interest_table);
                        $('#principal_table' + (k+1)).val(parseFloat(principalTable).toFixed(2));

                        principal_table = $('#principal_table' + (k+1)).val();
                        outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                        $('#outstanding_table' + (k+1)).val(parseFloat(outstandingTable).toFixed(2));
                    }
                }
            }
        });

        $('#payment_method').on('select2:select', function (e) {
            table.rows( function(idx, data, node) {
                return $(data[7]).val() == "false";
            }).remove().draw();

            if ($(this).val() === 'F') {
                $('#payment_amount').prop('readonly', true);
                $('#new_rate_per_year').prop('readonly', true);
                $('#new_no_of_installment_not_yet_paid').prop('readonly', true);

                total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());
                $('#payment_amount').val(total_not_yet_paid);

                $('#new_rate_per_year').val(0);

                if ($('#payment_amount').val() !== '' || $('#other_cost').val() !== '' || $('#no_of_installment_not_yet_paid').val() !== '') {
                    other_cost = parseFloat($('#other_cost').val());
                    payment_amount = parseFloat($('#payment_amount').val());
                    total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());
                    
                    $('#new_no_of_installment_not_yet_paid').val(0);

                    totalPayment = payment_amount + other_cost;
                    newOutStandingAmount = total_not_yet_paid - payment_amount;

                    $('#total_payment').val(totalPayment);
                    $('#new_outstanding_amount').val(newOutStandingAmount);

                    if ($('#other_cost').val() == '') {
                        other_cost = 0;
                    }

                    totalPayment = payment_amount + other_cost;
                    $('#total_payment').val(totalPayment);

                    rate_per_year_table = $('#new_rate_per_year').val();

                    table.rows(':last', {order : 'applied'}).every( function(rowIdx, tableLoop, rowLoop) {
                        var d = this.data();

                        d[3] = '<input type="number" class="form-control" id="principal_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="principal_table[]" value="'+ totalPayment +'" readonly>';
                        d[4] = '<input type="number" class="form-control" id="interest_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="interest_table[]" value="0" readonly>';
                        d[5] = '<input type="number" class="form-control" id="payment_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="payment_table[]" value="'+ totalPayment +'" readonly>';
                        d[6] = '<input type="number" class="form-control" id="outstanding_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="outstanding_table[]" value="0" readonly>';
                        d[8] = '<input type="text" class="form-control" id="employee_no_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="employee_no_table[]" value="'+ employee_no_table +'" hidden>';
                        d[9] = '<input type="text" class="form-control" id="employee_name_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="employee_name_table[]" value="'+ employee_name_table +'" hidden>';
                        d[10] = '<input type="text" class="form-control" id="loan_no_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="loan_no_table[]" value="'+ loan_no_table +'" hidden>';
                        d[11] = '<input type="text" class="form-control" id="rate_per_year_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="rate_per_year_table[]" value="'+ rate_per_year_table +'" hidden>';

                        this.invalidate();
                    });

                    table.draw();
                }

                else {
                    $('#total_payment').val("");
                    $('#new_outstanding_amount').val("");
                }
            } 
            else {
                $('#payment_amount').prop('readonly', false);
                $('#new_rate_per_year').prop('readonly', false);
                $('#new_no_of_installment_not_yet_paid').prop('readonly', false);

                total_not_yet_paid = parseFloat($('#total_not_yet_paid').val());
                $('#new_outstanding_amount').val(total_not_yet_paid);

                no_of_installment_not_yet_paid = parseFloat($('#no_of_installment_not_yet_paid').val());
                $('#new_no_of_installment_not_yet_paid').val(no_of_installment_not_yet_paid - 1);

                $('#new_rate_per_year').val(parseFloat($('#rate_per_year').val()));

                rate_per_year_table = $('#new_rate_per_year').val();

                table.rows( function(idx, data, node) {
                    return $(data[7]).val() == "false";
                }).remove().draw();

                table.rows(':last', {order : 'applied'}).every( function(rowIdx, tableLoop, rowLoop) {
                    var d = this.data();

                    idx = rowIdx;    
                    date = $(d[0]).val();

                    d[3] = '<input type="number" class="form-control" id="principal_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="principal_table[]" value="'+ (totalPayment - arrTable[rowIdx].paymentInterest) +'" readonly>';
                    d[4] = '<input type="number" class="form-control" id="interest_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="interest_table[]" value="'+ arrTable[rowIdx].paymentInterest +'" readonly>';
                    d[5] = '<input type="number" class="form-control" id="payment_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="payment_table[]" value="'+ totalPayment +'" readonly>';
                    d[6] = '<input type="number" class="form-control" id="outstanding_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="outstanding_table[]" value="'+ arrTable[rowIdx].outStandingAmount +'" readonly>';
                    d[8] = '<input type="text" class="form-control" id="employee_no_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="employee_no_table[]" value="'+ employee_no_table +'" hidden>';
                    d[9] = '<input type="text" class="form-control" id="employee_name_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="employee_name_table[]" value="'+ employee_name_table +'" hidden>';
                    d[10] = '<input type="text" class="form-control" id="loan_no_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="loan_no_table[]" value="'+ loan_no_table +'" hidden>';
                    d[11] = '<input type="text" class="form-control" id="rate_per_year_table'+ rowIdx +'" data-seq = "'+ rowIdx +'" name="rate_per_year_table[]" value="'+ rate_per_year_table +'" hidden>';

                    this.invalidate();
                });

                table.draw();

                if (payment_amount !== '') {
                    outstanding_table_month = parseFloat($('#outstanding_table' + (idx - 1)).val());
                    principal_table_month = parseFloat($('#principal_table'+ idx).val());
                    $('#outstanding_table' + idx).val((outstanding_table_month - principal_table_month).toFixed(2));  
                }

                outstanding_table_month = parseFloat($('#outstanding_table' + idx).val());
                outstandingTableSeq = parseInt($('#outstanding_table' + idx).attr('data-seq'));

                for (var i = 0; i < new_no_of_installment_not_yet_paid; i++) {
                    date = moment(date).add(1, 'months').format('DD-MMM-YYYY');

                    idx++;

                    // if (typeof arrTable[idx].paymentType !== 'undefined' && arrTable[idx].paymentType !== null) {
                    //     if (arrTable[idx].paymentType == 'S') {
                    //         paymentType = 'Salary';
                    //     } else if (arrTable[idx].paymentType == 'B') {
                    //         paymentType = 'Bonus';
                    //     } else if (arrTable[idx].paymentType == 'T') {
                    //         paymentType = 'THR';
                    //     } else {
                    //         paymentType = 'Cash';
                    //     }
                    // }

                    table.row.add([
                        '<input type="text" class="form-control" id="payment_date_table'+ idx +'" name="payment_date_table[]" value="'+ date +'" readonly>',
                        '<input type="number" class="form-control" id="seq_no_table'+ idx +'" name="seq_no_table[]" value="'+ idx +'" readonly>',
                        '<input type="text" class="form-control" id="payment_type_table'+ idx +'" name="payment_type_table[]" value="'+ arrTable[idx].paymentType +'" readonly>',
                        '<input type="number" class="form-control" id="principal_table'+ idx +'" name="principal_table[]" value="'+ arrTable[idx].paymentPrincipal +'" readonly>',
                        '<input type="number" class="form-control" id="interest_table'+ idx +'" name="interest_table[]" value="'+ arrTable[idx].paymentInterest +'" readonly>',
                        '<input type="number" class="form-control" id="payment_table'+ idx +'" name="payment_table[]" data-seq = "'+ idx +'" value="'+ arrTable[idx].payment +'" readonly>',
                        '<input type="number" class="form-control" id="outstanding_table'+ idx +'" data-seq = "'+ idx +'" name="outstanding_table[]" value="'+ arrTable[idx].outStandingAmount +'" readonly>',
                        '<input type="text" class="form-control paid-table" id="paid_table'+ idx +'" data-seq = "'+ idx +'" name="paid_table[]" value="'+ arrTable[idx].flagStatus +'" readonly>',
                        '<input type="text" class="form-control" id="employee_no_table'+ idx +'" name="employee_no_table[]" value="'+ employee_no_table +'" hidden>',
                        '<input type="text" class="form-control" id="employee_name_table'+ idx +'" name="employee_name_table[]" value="'+ employee_name_table +'" hidden>',
                        '<input type="text" class="form-control" id="loan_no_table'+ idx +'" name="loan_no_table[]" value="'+ loan_no_table +'" hidden>',
                        '<input type="text" class="form-control" id="rate_per_year_table'+ idx +'" name="rate_per_year_table[]" value="'+ rate_per_year_table +'" hidden>',
                    ]).draw();

                    principal_table = $('#principal_table'+ idx).val();
                    interest_table = $('#interest_table' + idx).val();

                    paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                    $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));

                    if (responseGrid[0].interestType === 'F' && payment_amount !== '' && new_no_of_installment_not_yet_paid !== '' && new_rate_per_year !== '' && new_no_of_installment_not_yet_paid > 0) {
                        principalTable = parseFloat(outstanding_table_month) / parseFloat(new_no_of_installment_not_yet_paid);
                        $('#principal_table' + idx).val(parseFloat(principalTable).toFixed(2));

                        interestTable = (parseFloat(outstanding_table_month) * parseFloat(new_rate_per_year) / 12);
                        $('#interest_table' + idx).val(parseFloat(interestTable).toFixed(2));

                        principal_table = $('#principal_table'+ idx).val();
                        interest_table = $('#interest_table' + idx).val();

                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));

                        for (var k = outstandingTableSeq; k < idx; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));
                        }
                    } else if (responseGrid[0].interestType === 'E' && payment_amount !== '' && new_no_of_installment_not_yet_paid !== '' && new_rate_per_year !== '' && new_no_of_installment_not_yet_paid > 0) {
                        principalTable = parseFloat(outstanding_table_month) / parseFloat(new_no_of_installment_not_yet_paid);
                        $('#principal_table' + idx).val(parseFloat(principalTable).toFixed(2));

                        seq_no_table = $('#seq_no_table' + idx).val();
                        principal_table = $('#principal_table' + idx).val();
                        interestTable = (parseFloat(outstanding_table_month) - ((parseFloat(seq_no_table) - 1) * parseFloat(principal_table))) * (parseFloat(new_rate_per_year) / 12);
                        $('#interest_table' + idx).val(parseFloat(interestTable).toFixed(2));

                        interest_table = $('#interest_table' + idx).val();
                        paymentTable = parseFloat(principal_table) + parseFloat(interest_table);
                        $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));

                        for (var k = outstandingTableSeq; k < idx; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k + 1)).val(parseFloat(outstandingTable).toFixed(2));
                        }
                    } else if (responseGrid[0].interestType === 'A' && payment_amount !== '' && new_no_of_installment_not_yet_paid !== '' && new_rate_per_year !== '' && new_no_of_installment_not_yet_paid > 0) {
                        new_no_of_installment_not_yet_paid = $('#new_no_of_installment_not_yet_paid').val();
                        new_rate_per_year = parseFloat($('#new_rate_per_year').val()) / 100;

                        paymentTable = (parseFloat(outstanding_table_month)) * (parseFloat(new_rate_per_year) / 12) * (1 / (1 - (1 / Math.pow((1 + (parseFloat(new_rate_per_year) / 12)), parseInt(new_no_of_installment_not_yet_paid)))));
                        $('#payment_table' + idx).val(parseFloat(paymentTable).toFixed(2));
                        
                        for (var k = outstandingTableSeq; k < idx; k++) {
                            outstanding_table = $('#outstanding_table' + k).val();
                            interestTable = parseFloat(outstanding_table) * parseFloat(new_rate_per_year) / 12;
                            $('#interest_table' + (k+1)).val(parseFloat(interestTable).toFixed(2));

                            payment_table = $('#payment_table' + (k+1)).val();
                            interest_table = $('#interest_table' + (k+1)).val();
                            principalTable = parseFloat(payment_table) - parseFloat(interest_table);
                            $('#principal_table' + (k+1)).val(parseFloat(principalTable).toFixed(2));

                            principal_table = $('#principal_table' + (k+1)).val();
                            outstandingTable = parseFloat(outstanding_table) - parseFloat(principal_table);
                            $('#outstanding_table' + (k+1)).val(parseFloat(outstandingTable).toFixed(2));
                        }
                    }
                }
            }
        });

        $('#payment_method').on('select2:unselecting', function (e) {
            $('#payment_amount').val("");
            $('#total_payment').val("");
        });

        loadDataEmployeeNo();
        loadDataCurrencyCode();
        loadDataPaymentMethod();

        function load_data_table_loan_payment() {
            table = $('#full_partial_loan_payment_detail_table').DataTable({
                processing: true,
                orderCellsTop: true,
                paging: false,
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
                        '<div class="col-4">' + data.data.employeeNo + '</div>' +
                        '<div class="col-4">' + data.data.fullName + '</div>' +
                        '<div class="col-4">' + data.data.loanNo + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#employee_no').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-4"><b>Employee No</b></div>' +
                        '<div class="col-4"><b>Employee Name</b></div>' +
                        '<div class="col-4"><b>Loan No</b></div>' +
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
                    url: '/employee_no_loan_payment/api',
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
                                    description: item.loanNo,
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

        function loadDataPaymentMethod() {

            var listPaymentMethod = [
                { id: 'P', text: 'Partial Payment' },
                { id: 'F', text: 'Full Payment' }
            ];

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#payment_method').select2({
                data: listPaymentMethod,
                width: '100%',
                placeholder: 'Choose Payment Method',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
            });
        }

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#full_partial_loan_payment_form").submit();
        });

        if ($("#full_partial_loan_payment_form").length > 0) {
            $("#full_partial_loan_payment_form").validate({
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_full_partial_loan_payment.btn_save") }}'
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
                        url: "{{ url('payroll/full_partial_loan_payment/proses') }}",
                        type: "POST",
                        data: $('#full_partial_loan_payment_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_full_partial_loan_payment.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/full_partial_loan_payment') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_full_partial_loan_payment.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_full_partial_loan_payment.btn_save") }}'
                            );

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }
    })
</script>

</html>