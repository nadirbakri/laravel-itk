<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_import_data_from_excel.judul') }}</title>
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
            <a href="{{ url('payroll') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_import_data_from_excel.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="import_data_from_excel_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-7">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="process_period">{{ __('payroll_import_data_from_excel.label_process_period') }}</label>
                                    <input type="text" class="form-control" id="process_period" name="process_period"
                                        placeholder="{{ __('payroll_import_data_from_excel.label_process_period') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_a">{{ __('payroll_import_data_from_excel.label_column_a') }}</label>
                                    <input type="text" class="form-control" id="column_a" name="column_a"
                                        placeholder="{{ __('payroll_import_data_from_excel.label_column_a') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_b">{{ __('payroll_import_data_from_excel.label_column_b') }}</label>
                                    <input type="text" class="form-control" id="column_b" name="column_b"
                                        placeholder="{{ __('payroll_import_data_from_excel.label_column_b') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_c">{{ __('payroll_import_data_from_excel.label_column_c') }}</label>
                                    <select class="form-control select2" id="column_c" name="column_c"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <br>
                                    <select class="form-control select2" id="column_c2" name="column_c2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_d">{{ __('payroll_import_data_from_excel.label_column_d') }}</label>
                                    <select class="form-control select2" id="column_d" name="column_d"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_d2"></label>
                                    <select class="form-control select2" id="column_d2" name="column_d2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_e">{{ __('payroll_import_data_from_excel.label_column_e') }}</label>
                                    <select class="form-control select2" id="column_e" name="column_e"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_e2"></label>
                                    <select class="form-control select2" id="column_e2" name="column_e2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_f">{{ __('payroll_import_data_from_excel.label_column_f') }}</label>
                                    <select class="form-control select2" id="column_f" name="column_f"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_f2"></label>
                                    <select class="form-control select2" id="column_f2" name="column_f2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_g">{{ __('payroll_import_data_from_excel.label_column_g') }}</label>
                                    <select class="form-control select2" id="column_g" name="column_g"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_g2"></label>
                                    <select class="form-control select2" id="column_g2" name="column_g2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_h">{{ __('payroll_import_data_from_excel.label_column_h') }}</label>
                                    <select class="form-control select2" id="column_h" name="column_h"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_h2"></label>
                                    <select class="form-control select2" id="column_h2" name="column_h2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_i">{{ __('payroll_import_data_from_excel.label_column_i') }}</label>
                                    <select class="form-control select2" id="column_i" name="column_i"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_i2"></label>
                                    <select class="form-control select2" id="column_i2" name="column_i2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_j">{{ __('payroll_import_data_from_excel.label_column_j') }}</label>
                                    <select class="form-control select2" id="column_j" name="column_j"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_j2"></label>
                                    <select class="form-control select2" id="column_j2" name="column_j2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_k">{{ __('payroll_import_data_from_excel.label_column_k') }}</label>
                                    <select class="form-control select2" id="column_k" name="column_k"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_k2"></label>
                                    <select class="form-control select2" id="column_k2" name="column_k2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_l">{{ __('payroll_import_data_from_excel.label_column_l') }}</label>
                                    <select class="form-control select2" id="column_l" name="column_l"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_l2"></label>
                                    <select class="form-control select2" id="column_l2" name="column_l2"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="import_file">{{ __('payroll_import_data_from_excel.label_import_file') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                        <label class="custom-file-label" for="import_file">{{ __('payroll_import_data_from_excel.label_select_import_file') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="submit" class="btn btn-process" name="btn-process" id="btn-process">
                                    <i class="fa fa-play-circle-o"></i> {{ __('payroll_import_data_from_excel.btn_process') }}
                                </button>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-danger" href="{{ url('payroll/import_data_from_excel') }}" target="iframe_dashboard"
                                    name="btn-reset" id="btn-reset" style="width: 100%;">
                                    <i class="fa fa-times-circle"></i> {{ __('payroll_import_data_from_excel.btn_reset') }}
                                </a>
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
                        <span class="title-text-notification">{{ __('payroll_import_data_from_excel.alert_success') }}</span>
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

</html>