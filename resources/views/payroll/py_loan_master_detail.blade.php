<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_loan_master.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
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
            <a href="{{ url('payroll/loan_master') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_loan_master.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="loan_master_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_code">{{ __('payroll_loan_master.label_loan_code') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="loan_code" name="loan_code"
                                placeholder="{{ __('payroll_loan_master.label_loan_code') }}" readonly>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                        <input type="text" class="form-control" id="record_status" name="record_status" hidden>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="loan_description">{{ __('payroll_loan_master.label_loan_description') }}</label>
                            <input type="text" class="form-control" id="loan_description" name="loan_description"
                                placeholder="{{ __('payroll_loan_master.label_loan_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="plafond">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_plafond"
                                    name="check_plafond" value="true">
                                <label
                                    for="check_plafond">{{ __('payroll_loan_master.label_plafond') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="percentage_plafond">{{ __('payroll_loan_master.label_percentage_plafond') }}</label>
                            <input type="number" class="form-control" id="percentage_plafond" name="percentage_plafond"
                                placeholder="{{ __('payroll_loan_master.label_percentage_plafond') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="include_other_loan">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_include_other_loan"
                                    name="check_include_other_loan" value="true">
                                <label
                                    for="check_include_other_loan">{{ __('payroll_loan_master.label_include_other_loan') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="collateral">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_collateral"
                                    name="check_collateral" value="true">
                                <label
                                    for="check_collateral">{{ __('payroll_loan_master.label_collateral') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="service_month">{{ __('payroll_loan_master.label_service_month') }}</label>
                            <input type="number" class="form-control" id="service_month" name="service_month"
                                placeholder="{{ __('payroll_loan_master.label_service_month') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_loan_master.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('payroll/loan_master') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_loan_master.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('payroll_loan_master.alert_success') }}</span>
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

        if (func === 'new') {
            $('#record_function').val('New');
            $('#record_status').val('A');
            $('#loan_code').prop('readonly', false);

            $('#loan_code').val('');
            $('#loan_description').val('');
            $('#check_plafond').prop('checked', false).trigger('change');
            $('#percentage_plafond').val('');
            $('#check_include_other_loan').prop('checked', false).trigger('change');
            $('#check_collateral').prop('checked', false).trigger('change');
            $('#service_month').val('');
        }
        else {
            $('#record_function').val('Edit');
            $('#record_status').val((typeof arrData[0].recordStatus !== 'undefined') ? arrData[0].recordStatus : '');
            $('#loan_code').prop('readonly', true);

            $('#loan_code').val((typeof arrData[0].loanCode !== 'undefined') ? arrData[0].loanCode : '');
            $('#loan_description').val((typeof arrData[0].loanDescription !== 'undefined') ? arrData[0].loanDescription : '');
            if (typeof arrData[0].flagPlafond !== 'undefined') {
                if (arrData[0].flagPlafond === true) {
                    $('#check_plafond').prop('checked', true).trigger('change');
                }
                else {
                    $('#check_plafond').prop('checked', false).trigger('change');
                }
            }
            $('#percentage_plafond').val((typeof arrData[0].percentagePlafond !== 'undefined') ? arrData[0].percentagePlafond : '');
            if (typeof arrData[0].flagIncludeOtherLoan !== 'undefined') {
                if (arrData[0].flagIncludeOtherLoan === true) {
                    $('#check_include_other_loan').prop('checked', true).trigger('change');
                }
                else {
                    $('#check_include_other_loan').prop('checked', false).trigger('change');
                }
            }
            if (typeof arrData[0].flagCollateral !== 'undefined') {
                if (arrData[0].flagCollateral === true) {
                    $('#check_collateral').prop('checked', true).trigger('change');
                }
                else {
                    $('#check_collateral').prop('checked', false).trigger('change');
                }
            }
            $('#service_month').val((typeof arrData[0].serviceMonth !== 'undefined') ? arrData[0].serviceMonth : '');
        }

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#loan_master_form").submit();
        });

        if ($("#loan_master_form").length > 0) {
            $("#loan_master_form").validate({
            rules: {
                    loan_code: {
                        required: true,
                    }
                },
                messages: {
                    loan_code: {
                        required: "{{ __('payroll_loan_master.field_mandatory') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_master.btn_save") }}'
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
                        url: "{{ url('payroll/loan_master/proses') }}",
                        type: "POST",
                        data: $('#loan_master_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_master.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/loan_master') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_master.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_loan_master.btn_save") }}'
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