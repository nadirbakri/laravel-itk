<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_salary_calculation_process.judul') }}</title>
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

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
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

        .overlay {
            background: #e9e9e9;  
            display: none;       
            position: fixed;   
            top: 0;                  
            right: 0;               
            bottom: 0;
            left: 0;
            opacity: 0.5;
        }

        .div-loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="salary_calculation_process_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url('/payroll') }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_salary_calculation_process.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="process_period">{{ __('payroll_salary_calculation_process.label_process_period') }}</label>
                                <input type="text" class="form-control" id="process_period" name="process_period"
                                    placeholder="{{ __('payroll_salary_calculation_process.label_process_period') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="process_period_month_hidden" name="process_period_month_hidden">
                        <input type="hidden" class="form-control" id="process_period_year_hidden" name="process_period_year_hidden">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="loan_payment_process" name="loan_payment_process" value="true">
                            <label for="loan_payment_process">{{ __('payroll_salary_calculation_process.label_loan_payment_process') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="retroactive_process" name="retroactive_process" value="true">
                            <label for="retroactive_process">{{ __('payroll_salary_calculation_process.label_retroactive_process') }}</label>
                        </div>
                    </div>
                    <div class="col-3 retroactive" hidden>
                        <div class="form-group">
                            <label
                                for="retroactive">{{ __('payroll_salary_calculation_process.label_retroactive') }}</label>
                            <select class="form-control select2" id="retroactive" name="retroactive"></select>
                        </div>
                    </div>
                </div>
                <div class="row include_probation_period" hidden>
                    <div class="col-3"></div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="include_probation_period" name="include_probation_period" value="true">
                            <label for="include_probation_period">{{ __('payroll_salary_calculation_process.label_include_probation_period') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row include_jamsostek_retroactive" hidden>
                    <div class="col-3"></div>
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="include_jamsostek_retroactive" name="include_jamsostek_retroactive" value="true">
                            <label for="include_jamsostek_retroactive">{{ __('payroll_salary_calculation_process.label_include_jamsostek_retroactive') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rounded_jamsostek_amount" name="rounded_jamsostek_amount" value="true">
                            <label for="rounded_jamsostek_amount">{{ __('payroll_salary_calculation_process.label_rounded_jamsostek_amount') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="range" name="range" value="true">
                            <label for="range">{{ __('payroll_salary_calculation_process.label_range') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no_from">{{ __('payroll_salary_calculation_process.label_employee_no_from') }}</label>
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no_to">{{ __('payroll_salary_calculation_process.label_employee_no_to') }}</label>
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-process" name="btn-process" id="btn-process">
                            <i class="fa fa-play-circle-o"></i> {{ __('payroll_salary_calculation_process.btn_process') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('/payroll') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_salary_calculation_process.btn_cancel') }}
                        </a>
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
                        <span class="title-text-notification">{{ __('payroll_salary_calculation_process.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay" id="notification_loading">
        <div class="div-loading">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
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

        var arrData = @json($data);

        if (arrData) {
            var month_year = moment(arrData[0].periodYear.toString() + "-" + arrData[0].periodMonth.toString()).format('MMMM' + ' ' + 'YYYY');
            $('#process_period').val(month_year);

            $('#process_period_month_hidden').val((typeof arrData[0].periodMonth !== 'undefined') ? arrData[0].periodMonth : '');
            $('#process_period_year_hidden').val((typeof arrData[0].periodYear !== 'undefined') ? arrData[0].periodYear : '');
        }

        $('#retroactive_process').on('change', function () {
            if ($('#retroactive_process').is(':checked')) {
                $('.retroactive').prop('hidden', false);
                $('.include_probation_period').prop('hidden', false);
                $('.include_jamsostek_retroactive').prop('hidden', false);
            } else {
                $('.retroactive').prop('hidden', true);
                $('.include_probation_period').prop('hidden', true);
                $('.include_jamsostek_retroactive').prop('hidden', true);
            }
        });

        $('#range').on('change', function () {
            if ($('#range').is(':checked')) {
                $('#employee_no_from').prop('disabled', false);
                $('#employee_no_to').prop('disabled', false);
            } else {
                $('#employee_no_from').prop('disabled', true);
                $('#employee_no_to').prop('disabled', true);
            }
        });

        loadDataRetroactive();
        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');

        function loadDataRetroactive() {
            var listRetroactive = [
                { id: '0', text: '0' },
                { id: '1', text: '1' },
                { id: '2', text: '2' },
                { id: '3', text: '3' },
                { id: '4', text: '4' },
                { id: '5', text: '5' },
                { id: '6', text: '6' },
                { id: '7', text: '7' },
                { id: '8', text: '8' },
                { id: '9', text: '9' },
                { id: '10', text: '10' },
                { id: '11', text: '11' },
                { id: '12', text: '12' },
                { id: '13', text: '13' },
                { id: '14', text: '14' },
                { id: '15', text: '15' },
                { id: '16', text: '16' },
                { id: '17', text: '17' },
                { id: '18', text: '18' },
                { id: '19', text: '19' },
                { id: '20', text: '20' },
                { id: '21', text: '21' },
                { id: '22', text: '22' },
                { id: '23', text: '23' },
                { id: '24', text: '24' }
            ];

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#retroactive').select2({
                data: listRetroactive,
                width: '100%',
                placeholder: 'Choose Retroactive',
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

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

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

        $("#btn-process").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $('#notification_loading').show();
            $("#salary_calculation_process_form").submit();
        });

        if ($("#salary_calculation_process_form").length > 0) {
            $("#salary_calculation_process_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('payroll/salary_calculation_process/proses') }}",
                        type: "POST",
                        data: $('#salary_calculation_process_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-process").prop("disabled", false);
                                $("#btn-process").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                                );
                                // $('#div-loading').hide();
                                $('#notification_loading').hide();
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/salary_calculation_process') }}";
                                }, 3000);
                            } else {
                                $("#btn-process").prop("disabled", false);
                                $("#btn-process").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                                );
                                $('#notification_loading').hide();
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
                            $('#notification_loading').hide();
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
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