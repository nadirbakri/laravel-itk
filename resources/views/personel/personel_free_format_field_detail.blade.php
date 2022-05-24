<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_free_format_field.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
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

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ url('personel/free_format_field') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_free_format_field.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="free_format_field_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="record_status">{{ __('personel_free_format_field.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('personel_free_format_field.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="free_format_code">{{ __('personel_free_format_field.label_free_format_code') }}</label>
                            <input type="text" class="form-control" id="free_format_code" name="free_format_code"
                                placeholder="{{ __('personel_free_format_field.label_free_format_code') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">{{ __('personel_free_format_field.label_description') }}</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="{{ __('personel_free_format_field.label_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field_type">{{ __('personel_free_format_field.label_field_type') }}</label>
                            <select class="form-control" id="field_type" name="field_type">
                                <option value="">Choose Type</option>
                                <option value="str">Str</option>
                                <option value="int">Int</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="length">{{ __('personel_free_format_field.label_length') }}</label>
                            <input type="number" class="form-control" id="length" name="length"
                                placeholder="{{ __('personel_free_format_field.label_length') }}">
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-6">
                    <table id="field_list_table" class="table hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Field List</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <button type="button" class="btn btn-primary" name="btn-add-field-list" id="btn-add-field-list"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_add_field_list">
                        <i class="fa fa-plus"></i> {{ __('personel_free_format_field.btn_add') }}
                    </button>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" name="btn-activate-field-list"
                        id="btn-activate-field-list" style="width: 100%;">
                        <i class="fa fa-toggle-on"></i> {{ __('personel_free_format_field.btn_activate') }}
                    </button>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" name="btn-deactivate-field-list"
                        id="btn-deactivate-field-list" style="width: 100%;">
                        <i class="fa fa-toggle-off"></i> {{ __('personel_free_format_field.btn_deactivate') }}
                    </button>
                </div>
            </div>
            <div class="row"></div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-save-data" id="btn-save-data"
                        style="width: 100%;">
                        <i class="fa fa-floppy-o"></i> {{ __('personel_free_format_field.btn_save') }}
                    </button>
                </div>
                <div class="col-3">
                    <a class="btn btn-primary" href="{{ url('personel/free_format_field') }}" target="iframe_dashboard"
                        name="btn-cancel-data" id="btn-cancel-data" style="width: 100%;">
                        <i class="fa fa-times-circle"></i> {{ __('personel_free_format_field.btn_cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_field_list" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_free_format_field.title_modal_field_list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="field_list_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="list_code">{{ __('personel_free_format_field.label_list_code') }}</label>
                                    <input type="text" class="form-control" id="list_code" name="list_code"
                                        placeholder="{{ __('personel_free_format_field.label_list_code') }}">
                                </div>
                                <input type="hidden" class="form-control" id="free_format_code_field_list"
                                    name="free_format_code_field_list">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="list_value">{{ __('personel_free_format_field.label_list_value') }}</label>
                                    <input type="text" class="form-control" id="list_value" name="list_value"
                                        placeholder="{{ __('personel_free_format_field.label_list_value') }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-field-list" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i> {{ __('personel_free_format_field.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_free_format_field.btn_cancel') }}</button>
                </div>
                </form>
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
                        <span
                            class="title-text-notification">{{ __('personel_free_format_field.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_field_list">
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
                        <span
                            class="title-text-notification">{{ __('personel_free_format_field.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-field-list"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = null;
        var func = "{{ $func }}";

        if (func == 'new') {
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#free_format_code').val("");
            $('#description').val("");
            $('#field_type').val("");
            $('#length').val("");
            $('#free_format_code').prop('readonly', false);
            $('#field_list_table').DataTable().clear().destroy();
        } else if (func == 'edit') {
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#record_function').val("Edit");
            $('#free_format_code').val("{{ isset($data[0]->freeFormatCode) ? $data[0]->freeFormatCode : '' }}");
            $('#description').val(htmlDecode(
                "{{ isset($data[0]->description) ? $data[0]->description : '' }}"));
            $('#field_type').val(
                "{{ isset($data[0]->freeFormatFieldType) ? $data[0]->freeFormatFieldType : '' }}");
            $('#length').val("{{ isset($data[0]->length) ? $data[0]->length : '' }}");
            $('#free_format_code').prop('readonly', true);
            $('#field_list_table').DataTable().clear().destroy();
            load_table_field_list("{{ isset($data[0]->freeFormatCode) ? $data[0]->freeFormatCode : '' }}");
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('personel/free_format_field') }}";
        })

        $('#notification_success_field_list').on('hide.bs.modal', function () {
            var oTable = $('#field_list_table').dataTable();
            oTable.fnDraw(false);
        });

        $('#field_list_table thead tr').clone(true).appendTo('#field_list_table thead');
        $('#field_list_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        function load_table_field_list(freeFormatCode = '') {
            table = $('#field_list_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personel/free_format_field/detail/table') }}",
                    data: {
                        freeFormatCode: freeFormatCode
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'listValue',
                        name: 'listValue'
                    },
                    {
                        data: 'recordStatus',
                        name: 'recordStatus'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $("#btn-save-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#free_format_field_form").submit();
        });

        $("#btn-save-field-list").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#field_list_form").submit();
        });

        $("#btn-activate-field-list").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('personel/free_format_field/detail/status') }}",
                    type: "GET",
                    data: {
                        'freeFormatCode': data[0].freeFormatCode,
                        'listCode': data[0].listCode,
                        'func': 'A'
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_field_list').modal('show');
                            $('#message-notification-success-field-list').html(response
                                .message);
                            var oTable = $('#field_list_table').dataTable();
                            oTable.fnDraw(false);
                            setTimeout(function () {
                                $('#notification_success_field_list').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-deactivate-field-list").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('personel/free_format_field/detail/status') }}",
                    type: "GET",
                    data: {
                        'freeFormatCode': data[0].freeFormatCode,
                        'listCode': data[0].listCode,
                        'func': 'D'
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_field_list').modal('show');
                            $('#message-notification-success-field-list').html(response
                                .message);
                            var oTable = $('#field_list_table').dataTable();
                            oTable.fnDraw(false);
                            setTimeout(function () {
                                $('#notification_success_field_list').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-add-field-list").on('click', function () {
            var freeFormatCode_data = $('#free_format_code').val();
            $('#free_format_code_field_list').val(freeFormatCode_data);
        });

        if ($("#free_format_field_form").length > 0) {
            $("#free_format_field_form").validate({
                rules: {
                    free_format_code: {
                        required: true,
                    },
                    field_type: {
                        required: true,
                    },
                    length: {
                        required: true,
                    },
                },
                messages: {
                    free_format_code: {
                        required: "{{ __('personel_free_format_field.free_format_code_required') }}",
                    },
                    field_type: {
                        required: "{{ __('personel_free_format_field.field_type_required') }}",
                    },
                    length: {
                        required: "{{ __('personel_free_format_field.length_required') }}",
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
                    $("#btn-save-data").prop("disabled", false);
                    $("#btn-save-data").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
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
                        url: "{{ url('personel/free_format_field/proses') }}",
                        type: "POST",
                        data: $('#free_format_field_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-data").prop("disabled", false);
                                $("#btn-save-data").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personel/free_format_field') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-data").prop("disabled", false);
                                $("#btn-save-data").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
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
                            $("#btn-save-data").prop("disabled", false);
                            $("#btn-save-data").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
                            );

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }

        if ($("#field_list_form").length > 0) {
            $("#field_list_form").validate({
                rules: {
                    list_code: {
                        required: true,
                    },
                    list_value: {
                        required: true,
                    },
                },
                messages: {
                    list_code: {
                        required: "{{ __('personel_free_format_field.list_code_required') }}",
                    },
                    list_value: {
                        required: "{{ __('personel_free_format_field.list_value_required') }}",
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
                    $("#btn-save-field-list").prop("disabled", false);
                    $("#btn-save-field-list").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
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
                        url: "{{ url('personel/free_format_field/detail/proses') }}",
                        type: "POST",
                        data: $('#field_list_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-field-list").prop("disabled", false);
                                $("#btn-save-field-list").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
                                );
                                
                                $('#notification_success_field_list').modal('show');
                                $('#field_list_table').DataTable().destroy();
                                var freeFormatCode = $('#free_format_code').val();
                                load_table_field_list(freeFormatCode);
                                $('#modal_add_field_list').modal('hide');
                                $('#message-notification-success-field-list').html(
                                    response.message);
                                setTimeout(function () {
                                    $('#notification_success_field_list').modal(
                                        'hide');
                                }, 3000);
                            } else {
                                $("#btn-save-field-list").prop("disabled", false);
                                $("#btn-save-field-list").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
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
                            $("#btn-save-field-list").prop("disabled", false);
                            $("#btn-save-field-list").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_free_format_field.btn_save") }}'
                            );

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }
    });

</script>

</html>
