<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_import_data_from_excel_bonus_thr.judul') }}</title>
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

        .row .box {
            /* width: 300px; */
            border: 1px solid #004883;
            padding: 5px;
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
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ url('/payroll') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_import_data_from_excel_bonus_thr.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="import_data_from_excel_bonus_thr_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="process_period">{{ __('payroll_import_data_from_excel_bonus_thr.label_process_period') }}</label>
                                    <input type="text" class="form-control" id="process_period" name="process_period"
                                        placeholder="{{ __('payroll_import_data_from_excel_bonus_thr.label_process_period') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>{{ __('payroll_import_data_from_excel.note_column_a') }}</p>
                                <p>{{ __('payroll_import_data_from_excel.note_column_b') }}</p>
                                <p>{{ __('payroll_import_data_from_excel.note_column_c') }}</p>
                                <p>{{ __('payroll_import_data_from_excel.note_column_d') }}</p>
                                <p>{{ __('payroll_import_data_from_excel.note_column_e') }}</p>
                                <p>{{ __('payroll_import_data_from_excel.note_column_f') }}</p>
                                <p>{{ __('payroll_import_data_from_excel.note_column_g') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="import_file">{{ __('payroll_import_data_from_excel_bonus_thr.label_import_file') }}</label>
                                    <span style="color: red;">*</span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                        <label class="custom-file-label" for="import_file">{{ __('payroll_import_data_from_excel_bonus_thr.label_select_import_file') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="submit" class="btn btn-process" name="btn-process" id="btn-process">
                                    <i class="fa fa-play-circle-o"></i> {{ __('payroll_import_data_from_excel_bonus_thr.btn_process') }}
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-reset" id="btn-reset" style="width: 100%;">
                                    <i class="fa fa-times-circle"></i> {{ __('payroll_import_data_from_excel_bonus_thr.btn_reset') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group box">
                                    <div class="form-check">
                                        <label for="transfer_to">{{ __('payroll_import_data_from_excel_bonus_thr.label_transfer_to') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="salary_master" name="transfer_to" value="PrSalaryMaster">
                                        <label for="salary_master">Salary Master</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="salary_actual" name="transfer_to" value="PrSalaryActual">
                                        <label for="salary_actual">Salary Actual</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="yearly" name="transfer_to" value="PrYearly">
                                        <label for="yearly">Yearly</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="bonus_thr" name="transfer_to" value="PrBonusThr" checked>
                                        <label for="bonus_thr">Bonus / THR</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <span class="title-text-notification">{{ __('payroll_import_data_from_excel_bonus_thr.alert_success') }}</span>
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
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var arrDataTM = @json($data_tm);
        var column = null;
        
        if (arrDataTM) {
            var month_year = moment(arrDataTM[0].periodYear.toString() + "-" + arrDataTM[0].periodMonth.toString().padStart(2,0)).format('MMMM' + ' ' + 'YYYY');
            $('#process_period').val(month_year);
        }

        $('input[type="radio"]').on('change', function () {
            if ($('#bonus_thr').is(':checked')) {
                window.location.href = ("{{ url('payroll/import_data_from_excel_bonus_thr') }}");
            } else {
                window.location.href = ("{{ url('payroll/import_data_from_excel') }}");
            }
        });

        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        $('#btn-reset').on('click', function () {
            $('#import_file').val('');
            $('.custom-file-label').html('{{ __("payroll_import_data_from_excel.label_select_import_file") }}');
        });

        $("#btn-process").on('click', function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $('#notification_loading').show();
            $('#import_data_from_excel_bonus_thr_form').submit();
        });

        if ($("#import_data_from_excel_bonus_thr_form").length > 0) {
            $("#import_data_from_excel_bonus_thr_form").validate({
                rules: {
                    import_file: {
                        extension: "xls|xlsx|xml",
                        required: true
                    },
                },
                messages: {
                    import_file: {
                        extension: "{{ __('payroll_import_data_from_excel.import_extension') }}",
                        required: "{{ __('payroll_import_data_from_excel.import_required') }}",
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
                    $("#btn-process").prop("disabled", false);
                    $("#btn-process").html(
                        '<i class="fa fa-play-circle-o"></i> {{ __("payroll_import_data_from_excel.btn_process") }}'
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

                    var myform = document.getElementById("import_data_from_excel_bonus_thr_form");
                    var formdata = new FormData(myform);

                    $.ajax({
                        url: "{{ url('payroll/import_data_from_excel_bonus_thr/import') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response[0].status == "true") {
                                $("#btn-process").prop("disabled", false);
                                $("#btn-process").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_import_data_from_excel.btn_process") }}'
                                );
                                $('#notification_loading').hide();
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response[0]
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/import_data_from_excel_bonus_thr') }}";
                                }, 3000);
                            } else {
                                $("#btn-process").prop("disabled", false);
                                $("#btn-process").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_import_data_from_excel.btn_process") }}'
                                );
                                $('#notification_loading').hide();
                                $('#notification_error').modal('show');
                                if (response[0].message == null || response[0].message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response[0]
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $('#notification_loading').hide();
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("payroll_import_data_from_excel.btn_process") }}'
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