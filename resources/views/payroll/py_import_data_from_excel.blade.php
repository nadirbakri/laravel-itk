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
                                        placeholder="{{ __('payroll_import_data_from_excel.label_process_period') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_a">{{ __('payroll_import_data_from_excel.label_column_a') }}</label>
                                    <input type="text" class="form-control" id="column_a" name="column_a"
                                        placeholder="{{ __('payroll_import_data_from_excel.label_column_a') }}" value="Employee No" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_b">{{ __('payroll_import_data_from_excel.label_column_b') }}</label>
                                    <input type="text" class="form-control" id="column_b" name="column_b"
                                        placeholder="{{ __('payroll_import_data_from_excel.label_column_b') }}" value="Employee Name" readonly>
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
                                    <label for=""></label>
                                    <select class="form-control select2 currency_code" id="column_c2" name="column_c2" disabled></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_d">{{ __('payroll_import_data_from_excel.label_column_d') }}</label>
                                    <select class="form-control select2 " id="column_d" name="column_d"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_d2"></label>
                                    <select class="form-control select2 currency_code" id="column_d2" name="column_d2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_e2" name="column_e2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_f2" name="column_f2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_g2" name="column_g2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_h2" name="column_h2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_i2" name="column_i2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_j2" name="column_j2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_k2" name="column_k2" disabled></select>
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
                                    <select class="form-control select2 currency_code" id="column_l2" name="column_l2" disabled></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="import_file">{{ __('payroll_import_data_from_excel.label_import_file') }}</label>
                                    <span style="color: red;">*</span>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="import_file" name="import_file">
                                        <label class="custom-file-label" for="import_file">{{ __('payroll_import_data_from_excel.label_select_import_file') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-process" name="btn-process" id="btn-process">
                                    <i class="fa fa-play-circle-o"></i> {{ __('payroll_import_data_from_excel.btn_process') }}
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-danger" name="btn-reset" id="btn-reset" style="width: 100%;">
                                    <i class="fa fa-times-circle"></i> {{ __('payroll_import_data_from_excel.btn_reset') }}
                                </button>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary" name="btn-download-template" id="btn-download-template">
                                    <i class="fa fa-print"></i> {{ __('payroll_import_data_from_excel.btn_download_template') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group box">
                                    <div class="form-check">
                                        <label for="transfer_to">{{ __('payroll_import_data_from_excel.label_transfer_to') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="salary_master" name="transfer_to" value="PrSalaryMaster" checked>
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
                                        <input type="radio" id="bonus_thr" name="transfer_to" value="PrBonusThr">
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
                        <span class="title-text-notification">{{ __('payroll_import_data_from_excel.alert_success') }}</span>
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
        var url = null;
        var data = null;
        var success = null;
        
        if (arrDataTM) {
            var month_year = moment(arrDataTM[0].periodYear.toString() + "-" + arrDataTM[0].periodMonth.toString()).format('MMMM' + ' ' + 'YYYY');
            $('#process_period').val(month_year);
        }

        column = $('#salary_master').val();
        $('.currency_code').prop('disabled', false);

        $('input[type="radio"]').on('change', function () {
            if ($('#bonus_thr').is(':checked')) {
                window.location.href = ("{{ url('payroll/import_data_from_excel_bonus_thr') }}");
            } else if ($('#salary_master').is(':checked')) {
                $('#column_c, #column_d, #column_e, #column_f, #column_g, column_h, #column_i, #column_j, #column_k, #column_l').val(null).trigger('change');
                column = $('#salary_master').val();
                loadDataColumn();
                $('.currency_code').prop('disabled', false);
            } else if ($('#salary_actual').is(':checked')) {
                $('#column_c, #column_d, #column_e, #column_f, #column_g, column_h, #column_i, #column_j, #column_k, #column_l').val(null).trigger('change');
                column = $('#salary_actual').val();
                loadDataColumn();
                $('.currency_code').prop('disabled', true);
            } else if ($('#yearly').is(':checked')) {
                $('#column_c, #column_d, #column_e, #column_f, #column_g, column_h, #column_i, #column_j, #column_k, #column_l').val(null).trigger('change');
                column = $('#yearly').val();
                loadDataColumn();
                $('.currency_code').prop('disabled', true);
            }
        });

        $('input[name="import_file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        $('#btn-reset').on('click', function () {
            $('#column_c, #column_c2, #column_d, #column_d2, #column_e, #column_e2, #column_f, #column_f2, #column_g, #column_g2, column_h, column_h2, #column_i, #column_i2, #column_j, #column_j2, #column_k, #column_k2, #column_l, #column_l2').val(null).trigger('change');
            $('#import_file').val('');
            $('.custom-file-label').html('{{ __("payroll_import_data_from_excel.label_select_import_file") }}');
        });

        loadDataColumn();
        loadDataCurrencyCode();

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

            $('#column_c2, #column_d2, #column_e2, #column_f2, #column_g2, #column_h2, #column_i2, #column_j2, #column_k2, #column_l2').select2({
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

        function loadDataColumn(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#column_c, #column_d, #column_e, #column_f, #column_g, #column_h, #column_i, #column_j, #column_k, #column_l').select2({
                width: '100%',
                placeholder: 'Choose Column',
                allowClear: true,
                // multiple: true,
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
                    url: '/column/api',
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: {
                        'transferTo' : column
                    }, function (params) {
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

        $("#btn-process").on('click', function () {
            url = "{{ url('payroll/import_data_from_excel/import') }}";
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $('#notification_loading').show();
            $('#import_data_from_excel_form').submit();
        });

        $("#btn-download-template").on('click', function () {
            url = "{{ url('payroll/import_data_from_excel/template') }}";
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            var myform = document.getElementById("import_data_from_excel_form");
            data = new FormData(myform);

            $.ajax({
                xhrFields: {
                    responseType: 'blob',
                },
                url: url,
                type: "POST",
                processData: false,
                contentType: false,
                data: data,
                success: function (result, status, xhr) {
                    $("#btn-download-template").prop("disabled", false);
                    $("#btn-download-template").html(
                        '<i class="fa fa-print"></i> {{ __("payroll_import_data_from_excel.btn_download_template") }}'
                    );
                    var disposition = xhr.getResponseHeader(
                        'content-disposition');
                    var matches = /"([^"]*)"/.exec(disposition);
                    var filename = (matches != null && matches[1] ? matches[1] :
                        'audit_trail.xlsx');

                    // The actual download
                    var blob = new Blob([result], {
                        type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = filename;

                    document.body.appendChild(link);

                    link.click();
                    document.body.removeChild(link);
                },
                error: function (response) {
                    $("#btn-download-template").prop("disabled", false);
                    $("#btn-download-template").html(
                        '<i class="fa fa-print"></i> {{ __("payroll_import_data_from_excel.btn_download_template") }}'
                    );
                    $('#notification').modal('show');
                    $('#message-notification').html(response);
                }
            });
        });

        if ($("#import_data_from_excel_form").length > 0) {
            $("#import_data_from_excel_form").validate({
                rules: {
                    import_file: {
                        required: true,
                        extension: "xls|xlsx|xml"
                    }
                },
                messages: {
                    import_file: {
                        required: "{{ __('payroll_import_data_from_excel.import_required') }}",
                        extension: "{{ __('payroll_import_data_from_excel.import_extension') }}"
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
                    $('#notification_loading').hide();
                    $("#btn-process").prop("disabled", false);
                    $("#btn-process").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_import_data_from_excel.btn_process") }}'
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

                    var myform = document.getElementById("import_data_from_excel_form");
                    data = new FormData(myform);

                    $.ajax({
                        url: url,
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: data,
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
                                        "{{ url('payroll/import_data_from_excel') }}";
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