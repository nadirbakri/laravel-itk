<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_evaluation_code.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
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
            <a href="{{ url('personel/evaluation_form') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_evaluation_code.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="evaluation_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">{{ __('personel_evaluation_code.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('personel_evaluation_code.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="form_code">{{ __('personel_evaluation_code.label_form_code') }}</label>
                            <input type="text" class="form-control" id="form_code" name="form_code"
                                placeholder="{{ __('personel_evaluation_code.label_form_code') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="form_name">{{ __('personel_evaluation_code.label_form_name') }}</label>
                            <input type="text" class="form-control" id="form_name" name="form_name"
                                placeholder="{{ __('personel_evaluation_code.label_form_name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <table id="evaluated_aspect_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Seq</th>
                                    <th>Evaluated Aspect</th>
                                    <th>Calculation</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-evaluated-aspect"
                            id="btn-add-evaluated-aspect" style="width: 100%;" data-toggle="modal"
                            data-target="#modal_add_evaluated_aspect">
                            <i class="fa fa-plus"></i> {{ __('personel_evaluation_code.btn_add') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-evaluated-aspect"
                            id="btn-remove-evaluated-aspect" style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('personel_evaluation_code.btn_remove') }}
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('personel_evaluation_code.btn_save') }}
                        </button>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('personel/evaluation_form') }}"
                            target="iframe_dashboard" name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('personel_evaluation_code.btn_cancel') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_add_evaluated_aspect" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_evaluation_code.title_modal_evaluated_aspect') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="evaluated_aspect_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sequence">{{ __('personel_evaluation_code.label_sequence') }}</label>
                                    <input type="text" class="form-control" id="sequence" name="sequence"
                                        placeholder="{{ __('personel_evaluation_code.label_sequence') }}">
                                </div>
                                <input type="hidden" class="form-control" id="form_code_evaluated_aspect"
                                    name="form_code_evaluated_aspect">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="evaluated_aspect">{{ __('personel_evaluation_code.label_evaluated_aspect') }}</label>
                                    <input type="text" class="form-control" id="evaluated_aspect"
                                        name="evaluated_aspect"
                                        placeholder="{{ __('personel_evaluation_code.label_evaluated_aspect') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="calculation">{{ __('personel_evaluation_code.label_calculation') }}</label>
                                    <input type="text" class="form-control" id="calculation" name="calculation"
                                        placeholder="{{ __('personel_evaluation_code.label_calculation') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <table id="predicate_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Predicate</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-predicate"
                                    id="btn-add-predicate" style="width: 100%;">
                                    <i class="fa fa-plus"></i> {{ __('personel_evaluation_code.btn_add') }}
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-predicate"
                                    id="btn-remove-predicate" style="width: 100%;">
                                    <i class="fa fa-times"></i> {{ __('personel_evaluation_code.btn_remove') }}
                                </button>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-evaluated-aspect" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i> {{ __('personel_evaluation_code.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_evaluation_code.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('personel_evaluation_code.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_detail">
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
                        <span class="title-text-notification">{{ __('personel_evaluation_code.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-detail"></span>
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
        var func = "{{ $func }}";
        var table = null;

        if (func == 'new') {
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#form_code').val("");
            $('#form_name').val("");
            $('#evaluated_aspect_table').DataTable().destroy();
            load_table_evaluated_aspect();
            $('#form_code').prop('readonly', false);
        } else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#form_code').val("{{ isset($data[0]->formCode) ? $data[0]->formCode : '' }}");
            $('#form_name').val(htmlDecode("{{ isset($data[0]->formName) ? $data[0]->formName : '' }}"));
            $('#evaluated_aspect_table').DataTable().destroy();
            load_table_evaluated_aspect("{{ isset($data[0]->formCode) ? $data[0]->formCode : '' }}");
            $('#form_code').prop('readonly', true);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        function load_table_evaluated_aspect(formCode = '') {
            table = $('#evaluated_aspect_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personel/evaluation_form/evaluation_aspect/table') }}",
                    data: {
                        formCode: formCode
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                "order": [
                    [2, "asc"]
                ],
                columns: [{
                        "className": 'details-control',
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'sequenceNo',
                        name: 'sequenceNo'
                    },
                    {
                        data: 'evaluatedAspect',
                        name: 'evaluatedAspect'
                    },
                    {
                        data: 'calculation',
                        name: 'calculation'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:nth-child(2)'
                }
            });
        }

        function load_table_predicate() {
            table = $('#predicate_table').DataTable({
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses'
            });
        }

        $('#evaluated_aspect_table tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                var d = row.data();
                var tableID = "evaluated_aspect_" + d.sequenceNo;
                row.child(
                    '<table id = "' + tableID + '" cellpadding="5" cellspacing="0" border="0">' +
                    '<thead><tr><th>Predicate</th><th>Value</th></tr></thead></table>' +
                    '').show();

                $('#' + tableID).DataTable({
                    destroy: true,
                    select: true,
                    paging: false,
                    bFilter: false,
                    bInfo: false,
                    bLengthChange: false,
                    ajax: {
                        url: "{{ url('personel/evaluation_form/predicate/table') }}",
                        data: {
                            formCode: d.formCode,
                            sequenceNo: d.sequenceNo
                        }
                    },
                    columns: [{
                            data: 'predicate',
                            name: 'predicate'
                        },
                        {
                            data: 'resultValue',
                            name: 'resultValue'
                        }
                    ]
                });
                tr.addClass('shown');
            }
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('personel/evaluation_form') }}";
        })

        $('#modal_add_evaluated_aspect').on('hide.bs.modal', function () {
            var formCode = $('#form_code').val();

            $('#predicate_table').DataTable().clear();
            // table.row.add([]).draw();

            $('#evaluated_aspect_table').DataTable().destroy();
            load_table_evaluated_aspect(formCode);
        })

        $('#form_code').on('input', function () {
            var value = $(this).val();
            $('#form_code_evaluated_aspect').val(value);
        });

        $('#btn-add-predicate').on('click', function () {
            table.row.add([
                '<input type="text" class="form-control" name="predicate[]">',
                '<input type="text" class="form-control" name="result_value[]">'
            ]).draw();
        });

        $('#btn-remove-predicate').on('click', function () {
            table.row(':last-child').remove().draw();
        });

        $("#btn-add-evaluated-aspect").on('click', function () {
            var formCode = $('#form_code').val();
            var sequenceNo = $('#sequence').val();
            $('#form_code_evaluated_aspect').val(formCode);

            $('#predicate_table').DataTable().destroy();
            load_table_predicate();

            table.clear().draw();

            $('#btn-add-predicate').click();
        });

        $("#btn-remove-evaluated-aspect").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('personel/evaluation_form/evaluated_aspect/remove') }}",
                    type: "GET",
                    data: {
                        'formCode': data[0].formCode,
                        'sequenceNo': data[0].sequenceNo
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            var oTable = $('#evaluated_aspect_table').dataTable();
                            oTable.fnDraw(false);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#evaluation_form").submit();
        });

        $("#btn-save-evaluated-aspect").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#evaluated_aspect_form").submit();
        });

        if ($("#evaluation_form").length > 0) {
            $("#evaluation_form").validate({
                rules: {
                    form_code: {
                        required: true,
                    },
                    form_name: {
                        required: true,
                    },
                },
                messages: {
                    form_code: {
                        required: "{{ __('personel_evaluation_code.form_code_required') }}",
                    },
                    form_name: {
                        extension: "{{ __('personel_evaluation_code.form_name_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
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
                        url: "{{ url('personel/evaluation_form/proses') }}",
                        type: "POST",
                        data: $('#evaluation_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personel/evaluation_form') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#evaluated_aspect_form").length > 0) {
            $("#evaluated_aspect_form").validate({
                rules: {
                    sequence: {
                        required: true,
                    },
                    evaluated_aspect: {
                        required: true,
                    },
                    calculation: {
                        required: true,
                    },
                },
                messages: {
                    sequence: {
                        required: "{{ __('personel_evaluation_code.sequence_required') }}",
                    },
                    evaluated_aspect: {
                        extension: "{{ __('personel_evaluation_code.evaluated_aspect_required') }}",
                    },
                    calculation: {
                        extension: "{{ __('personel_evaluation_code.calculation_required') }}",
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
                    $("#btn-save-evaluated-aspect").prop("disabled", false);
                    $("#btn-save-evaluated-aspect").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
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
                        url: "{{ url('personel/evaluation_form/evaluted_aspect/proses') }}",
                        type: "POST",
                        data: $('#evaluated_aspect_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-evaluated-aspect").prop("disabled", false);
                                $("#btn-save-evaluated-aspect").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
                                );

                                $("#evaluated_aspect_form").trigger('reset')
                                $('#notification_success_detail').modal('show');
                                $('#message-notification-success-detail').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success_detail').modal(
                                        'hide');
                                    $('#modal_add_evaluated_aspect').modal(
                                        'hide');
                                }, 3000);
                            } else {
                                $("#btn-save-evaluated-aspect").prop("disabled", false);
                                $("#btn-save-evaluated-aspect").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
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
                            $("#btn-save-evaluated-aspect").prop("disabled", false);
                            $("#btn-save-evaluated-aspect").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_evaluation_code.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }
    });

</script>

</html>
