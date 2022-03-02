<!DOCTYPE html>
<html>

<head>
    <title>{{ __('payroll_report_format.judul') }}</title>
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
            <a href="{{ url('payroll/report_format') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_report_format.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="account_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="report_code">{{ __('payroll_report_format.label_report_code') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="report_code" name="report_code"
                                placeholder="{{ __('payroll_report_format.label_report_code') }}">
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">{{ __('payroll_report_format.label_description') }}</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="{{ __('payroll_report_format.label_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="font_size">{{ __('payroll_report_format.label_font_size') }}</label>
                            <input type="number" min="0" class="form-control" id="font_size" name="font_size"
                                placeholder="{{ __('payroll_report_format.label_font_size') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="div-table">
                        <table id="report_format_detail_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('payroll_report_format.label_column_no') }}</th>
                                    <th>{{ __('payroll_report_format.label_table_name') }}</th>
                                    <th>{{ __('payroll_report_format.label_field_name') }}</th>
                                    <th>{{ __('payroll_report_format.label_column_header') }}</th>
                                    <th>{{ __('payroll_report_format.label_alignment') }}</th>
                                    <th>{{ __('payroll_report_format.label_data_format') }}</th>
                                    <th>{{ __('payroll_report_format.label_display') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-report-format-detail"
                            id="btn-add-report-format-detail" data-toggle="modal" style="width: 100%;"  data-target="#modal_add_report_format_detail">
                            <i class="fa fa-plus"></i> {{ __('payroll_report_format.btn_add') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-report-format-detail"
                            id="btn-remove-report-format-detail" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('payroll_report_format.btn_remove') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="div-table">
                        <table id="report_format_condition_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ __('payroll_report_format.label_seq_no') }}</th>
                                    <th>{{ __('payroll_report_format.label_table_name') }}</th>
                                    <th>{{ __('payroll_report_format.label_field_name') }}</th>
                                    <th>{{ __('payroll_report_format.label_criteria') }}</th>
                                    <th>{{ __('payroll_report_format.label_value') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-report-format-condition" 
                            id="btn-add-report-format-condition" data-toggle="modal" style="width: 100%;" data-target="#modal_add_report_format_condition">
                            <i class="fa fa-plus"></i> {{ __('payroll_report_format.btn_add') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-report-format-condition"
                            id="btn-remove-report-format-condition" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('payroll_report_format.btn_remove') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('payroll_report_format.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('time_management/absent_code') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('payroll_report_format.btn_cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_add_report_format_detail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_report_format.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="report_format_detail_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_no">{{ __('payroll_report_format.label_column_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="column_no" name="column_no"
                                        placeholder="{{ __('payroll_report_format.label_column_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="table_name">{{ __('payroll_report_format.label_table_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="table_name" name="table_name"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="field_name">{{ __('payroll_report_format.label_field_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="field_name" name="field_name"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_header">{{ __('payroll_report_format.label_column_header') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="column_header" name="column_header"
                                            placeholder="{{ __('payroll_report_format.label_column_header') }}">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="alignment">{{ __('payroll_report_format.label_alignment') }}</label>
                                    <select class="form-control select2" id="alignment" name="alignment"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="data_format">{{ __('payroll_report_format.label_data_format') }}</label>
                                    <select class="form-control select2" id="data_format" name="data_format"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="display">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="display"
                                            name="display" value="true">
                                        <label class="form-check-label"
                                            for="display">{{ __('payroll_report_format.label_display') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-report-format-detail" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_report_format.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_report_format.btn_cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_report_format_condition" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_report_format.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="report_format_condition_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no">{{ __('payroll_report_format.label_seq_no') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="seq_no" name="seq_no"
                                        placeholder="{{ __('payroll_report_format.label_seq_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="table_name">{{ __('payroll_report_format.label_table_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="table_name" name="table_name"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="field_name">{{ __('payroll_report_format.label_field_name') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="field_name" name="field_name"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="criteria">{{ __('payroll_report_format.label_criteria') }}</label>
                                    <select class="form-control select2" id="criteria" name="criteria"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value">{{ __('payroll_report_format.label_value') }}</label>
                                    <input type="text" class="form-control" id="value" name="value"
                                        placeholder="{{ __('payroll_report_format.label_value') }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-report-format-condition" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_report_format.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_report_format.btn_cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
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
                        <span class="title-text-notification">{{ __('payroll_report_format.alert_success') }}</span>
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
        var func = "{{ $func }}";
        var arrData = @json($data);
        var table = null;

        if (func == 'new') {
            $('#record_function').val("New");
            $('#record_code').val("");
            $('#description').val("");
            $('#font_size').val("");
            $('#report_format_detail_table').DataTable().destroy();
            $('#report_format_condition_table').DataTable().destroy();
            load_table_report_format_detail();
            load_table_report_condition_detail();
        }
        else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#account_no').val(((typeof arrData[0].accountNo !== 'undefined') ? arrData[0].accountNo : '')).prop('readonly', true);
            $('#account_description').val(htmlDecode(((typeof arrData[0].accountDescription !== 'undefined') ? arrData[0].accountDescription : '')));
            $('#reference').val(((typeof arrData[0].reference !== 'undefined') ? arrData[0].reference : ''));
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        function load_table_report_format_detail() {
            table = $('#report_format_detail_table').DataTable({
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses'
            });
        }

        function load_table_report_condition_detail() {
            table = $('#report_format_condition_table').DataTable({
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses'
            });
        }

        function loadDataTableName() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Table Name</b></div>' +
                        '<div class="col-6"><b>Shift Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.shiftCode + '</div>' +
                        '<div class="col-6">' + data.data.shiftName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#shift_overtime_spl').select2({
                width: '100%',
                placeholder: 'Choose Shift',
                allowClear: true,
                // tags: true,
                closeOnSelect: false,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: '/shift_code/api',
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
                                    text: item.shiftName,
                                    id: item.shiftCode,
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

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('payroll/account') }}";
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#account_form").submit();
        });

        if ($("#account_form").length > 0) {
            $("#account_form").validate({
            rules: {
                    account_no: {
                        required: true,
                    },
                },
                messages: {
                    absent_code: {
                        required: "{{ __('payroll_report_format.account_no_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
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
                        url: "{{ url('payroll/account/proses') }}",
                        type: "POST",
                        data: $('#account_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/account') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_report_format.btn_save") }}'
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