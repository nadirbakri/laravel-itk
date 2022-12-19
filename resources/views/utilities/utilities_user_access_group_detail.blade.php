<!DOCTYPE html>
<html>

<head>
    <title>{{ __('utilities_user_access_group.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <style type="text/css">
        .div-utilities {
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
    <div class="div-utilities">
        <div class="div-title">
            <a href="{{ url('utilities/group_user_access') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('utilities_user_access_group.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="user_access_group_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="record_status">{{ __('utilities_user_access_group.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('utilities_user_access_group.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="group_id">{{ __('utilities_user_access_group.label_group_id') }}</label>
                            <input type="text" class="form-control" id="group_id" name="group_id"
                                placeholder="{{ __('utilities_user_access_group.label_group_id') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="group_name">{{ __('utilities_user_access_group.label_group_name') }}</label>
                            <input type="text" class="form-control" id="group_name" name="group_name"
                                placeholder="{{ __('utilities_user_access_group.label_group_name') }}">
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-8">
                    <table id="user_data_table" class="table hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>User ID</th>
                                <!-- <th>User Name</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-add-user" id="btn-add-user"
                        style="width: 100%;" data-toggle="modal" data-target="#modal_add_user">
                        <i class="fa fa-plus"></i> {{ __('utilities_user_access_group.btn_add_user') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-danger" name="btn-remove-user" id="btn-remove-user"
                        style="width: 100%;">
                        <i class="fa fa-times"></i> {{ __('utilities_user_access_group.btn_remove_user') }}
                    </button>
                </div>
            </div>
            <div class="row"></div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-save-data" id="btn-save-data"
                        style="width: 100%;">
                        <i class="fa fa-floppy-o"></i> {{ __('utilities_user_access_group.btn_save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_user_access_group.add_new_user') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="user_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="user_id">{{ __('utilities_user_access_group.label_user_id') }}</label>
                                    <select class="form-control select2" id="user_id" name="user_id"></select>
                                </div>
                                <input type="hidden" class="form-control" id="group_id_user" name="group_id_user">
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="user_name">{{ __('utilities_user_access_group.label_user_name') }}</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name"
                                        placeholder="{{ __('utilities_user_access_group.label_user_name') }}" readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-user" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i>
                        {{ __('utilities_user_access_group.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('utilities_user_access_group.btn_cancel') }}</button>
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
                            class="title-text-notification">{{ __('utilities_user_access_group.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_user">
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
                            class="title-text-notification">{{ __('utilities_user_access_group.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-user"></span>
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
            $('#group_id').val("");
            $('#group_name').val("");
            $('#group_id').prop('readonly', false);
            $('#user_data_table').DataTable().clear().destroy();
        } else if (func == 'edit') {
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#record_function').val("Edit");
            $('#group_id').val("{{ isset($data[0]->groupAccessID) ? $data[0]->groupAccessID : '' }}");
            $('#group_name').val(htmlDecode(
                "{{ isset($data[0]->groupAccessName) ? $data[0]->groupAccessName : '' }}"));
            $('#group_id').prop('readonly', true);
            $('#user_data_table').DataTable().clear().destroy();
            load_table_user("{{ isset($data[0]->groupAccessID) ? $data[0]->groupAccessID : '' }}");
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('utilities/group_user_access') }}";
        })

        $('#notification_success_user').on('hide.bs.modal', function () {
            var oTable = $('#user_data_table').dataTable();
            oTable.fnDraw(false);
        });

        $('#user_data_table thead tr').clone(true).appendTo('#user_data_table thead');
        $('#user_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
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

        function load_table_user(groupAccessID = '') {
            table = $('#user_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('utilities/group_user_access/user/table') }}",
                    data: {
                        groupAccessID: groupAccessID
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
                        data: 'userID',
                        name: 'userID'
                    },
                    // {data: 'name', name: 'name'}
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $("#btn-save-data").on('click', function () {
            $('#user_access_group_form').submit();
        });

        $("#btn-remove-user").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('utilities/group_user_access/user/remove') }}",
                    type: "GET",
                    data: {
                        'groupAccessID': data[0].groupAccessID,
                        'userID': data[0].userID
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_user').modal('show');
                            $('#message-notification-success-user').html(response.message);
                            var oTable = $('#user_data_table').dataTable();
                            oTable.fnDraw(false);
                            setTimeout(function () {
                                $('#notification_success_user').modal('hide');
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

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function loadDataUserID() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.userID + '</div>' +
                        '<div class="col-6">' + data.data.userName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#user_id').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>User ID</b></div>' +
                        '<div class="col-6"><b>User Name</b></div>' +
                        '</div>';
                    $('.select2-search').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#user_id').select2({
                width: '100%',
                placeholder: 'Choose User ID',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/user/api') }}",
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
                                    text: item.userID,
                                    id: item.userID,
                                    title: item.userName,
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

        $("#btn-add-user").on('click', function () {
            var groupID_data = $('#group_id').val();
            $('#group_id_user').val(groupID_data);
            loadDataUserID();

            $('#user_id').on("select2:select", function (e) {
                var data = $('#user_id').select2('data');
                $('#user_name').val(data[0].title);
            });

            $('#user_id').on("select2:unselecting", function (e) {
                $('#user_name').val('');
            });
        });

        $("#btn-save-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#user_access_group_form").submit();
        });

        $("#btn-save-user").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#user_form").submit();
        });

        if ($("#user_access_group_form").length > 0) {
            $("#user_access_group_form").validate({
                rules: {
                    group_id: {
                        required: true,
                    },
                    group_name: {
                        required: true,
                    },
                },
                messages: {
                    group_id: {
                        required: "{{ __('utilities_user_access_group.group_id_required') }}",
                    },
                    group_name: {
                        required: "{{ __('utilities_user_access_group.group_name_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
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
                        url: "{{ url('utilities/group_user_access/proses') }}",
                        type: "POST",
                        data: $('#user_access_group_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-data").prop("disabled", false);
                                $("#btn-save-data").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('utilities/group_user_access') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-data").prop("disabled", false);
                                $("#btn-save-data").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#user_form").length > 0) {
            $("#user_form").validate({
                rules: {
                    user_id: {
                        required: true,
                    },
                    user_name: {
                        required: true,
                    },
                },
                messages: {
                    user_id: {
                        required: "{{ __('utilities_user_access_group.user_id_required') }}",
                    },
                    user_name: {
                        required: "{{ __('utilities_user_access_group.user_name_required') }}",
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
                    $("#btn-save-user").prop("disabled", false);
                    $("#btn-save-user").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
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
                        url: "{{ url('utilities/group_user_access/user/add') }}",
                        type: "POST",
                        data: $('#user_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-user").prop("disabled", false);
                                $("#btn-save-user").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
                                );

                                $('#notification_success_user').modal('show');
                                $('#user_data_table').DataTable().destroy();
                                load_table_user(
                                    "{{ isset($data[0]->groupAccessID) ? $data[0]->groupAccessID : '' }}"
                                );
                                $('#modal_add_user').modal('hide');
                                $('#message-notification-success-user').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success_user').modal(
                                        'hide');
                                }, 3000);
                            } else {
                                $("#btn-save-user").prop("disabled", false);
                                $("#btn-save-user").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
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
                            $("#btn-save-user").prop("disabled", false);
                            $("#btn-save-user").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_user_access_group.btn_save") }}'
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
