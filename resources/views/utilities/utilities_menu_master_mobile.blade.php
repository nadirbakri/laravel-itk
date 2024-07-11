<!DOCTYPE html>
<html>

<head>
    <title>{{ __('utilities_menu_master_mobile.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-utilities {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        th,
        td {
            text-align: center;
            /* center checkbox horizontally */
            vertical-align: middle;
            /* center checkbox vertically */
        }

        .modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
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
            <a href="{{ route('utilities', ['moduleID' => 'UTI']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('utilities_menu_master_mobile.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="menu_master_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="group_id">{{ __('utilities_menu_master_mobile.label_group_id') }}</label>
                            <select class="form-control select2" id="group_id" name="group_id"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu_title">{{ __('utilities_menu_master_mobile.label_menu_title') }}</label>
                            <input type="text" class="form-control" id="menu_title" name="menu_title"
                                placeholder="{{ __('utilities_menu_master_mobile.label_menu_title') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-configure-menu" id="btn-configure-menu"
                            style="width: 100%;" data-toggle="modal" data-target="#modal_configure_menu">
                            {{ __('utilities_menu_master_mobile.btn_configure_menu') }}
                        </button>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-primary" name="btn-copy-to-another-group"
                            id="btn-copy-to-another-group" style="width: 100%;" data-toggle="modal"
                            data-target="#modal_copy_to_another_group">
                            {{ __('utilities_menu_master_mobile.btn_copy_to_another_group') }}
                        </button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <table id="menu_master_table" class="table hover">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <!-- <th>Sub Module</th> -->
                                <th>Menu Title</th>
                                <th>Allow Access</th>
                                <th>Allow Add</th>
                                <th>Allow Edit</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_configure_menu"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_menu_master_mobile.btn_configure_menu') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="module">{{ __('utilities_menu_master_mobile.label_module') }}</label>
                                <select class="form-control select2" id="module" name="module"></select>
                            </div>
                            <input type="hidden" class="form-control" id="group_id_configure_menu"
                                name="group_id_configure_menu">
                        </div>
                    </div>
                    <form id="configure_menu_form" method="post">
                        @csrf
                        <table id="configure_menu_table" class="table hover">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="select_all" name="select_all" value="all"></th>
                                    <th>Module</th>
                                    <!-- <th>Sub Module</th> -->
                                    <th>Menu Title</th>
                                    <th><input type="checkbox" class="select_all_allow_access"
                                            name="select_all_allow_access" value="all"> Allow Access</th>
                                    <th><input type="checkbox" class="select_all_allow_add" name="select_all_allow_add"
                                            value="all"> Allow Add</th>
                                    <th><input type="checkbox" class="select_all_allow_edit"
                                            name="select_all_allow_edit" value="all"> Allow Edit</th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary w-25" id="btn-save-configure-menu"><i
                            class="fa fa-floppy-o"></i> {{ __('utilities_menu_master_mobile.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('utilities_menu_master_mobile.btn_cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_copy_to_another_group"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_menu_master_mobile.btn_copy_to_another_group') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="copy_to_another_group_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('utilities_menu_master_mobile.label_copy_from') }}</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="group_id_copy_from">{{ __('utilities_menu_master_mobile.label_group_id') }}</label>
                                    <select class="form-control select2" id="group_id_copy_from"
                                        name="group_id_copy_from"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="group_name_copy_from">{{ __('utilities_menu_master_mobile.label_group_name') }}</label>
                                    <input type="text" class="form-control" id="group_name_copy_from"
                                        name="group_name_copy_from"
                                        placeholder="{{ __('utilities_menu_master_mobile.label_group_name') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('utilities_menu_master_mobile.label_copy_destination') }}</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="group_id_copy_destination">{{ __('utilities_menu_master_mobile.label_group_id') }}</label>
                                    <select class="form-control select2" id="group_id_copy_destination"
                                        name="group_id_copy_destination"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="group_name_copy_destination">{{ __('utilities_menu_master_mobile.label_group_name') }}</label>
                                    <input type="text" class="form-control" id="group_name_copy_destination"
                                        name="group_name_copy_destination"
                                        placeholder="{{ __('utilities_menu_master_mobile.label_group_name') }}" readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-copy-to-another-group" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i> {{ __('utilities_menu_master_mobile.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('utilities_menu_master_mobile.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('utilities_menu_master_mobile.alert_success') }}</span>
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
                        <span class="title-text-notification">{{ __('utilities_menu_master_mobile.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURL')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURL', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURL');

        sessionStorage.removeItem('previousURL');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        var table = null;
        var rows_configure_menu_selected = [];

        loadDataGroupID('#group_id');

        $('#group_id').on("select2:select", function (e) {
            var data = $('#group_id').select2('data');

            $('#menu_master_table').DataTable().destroy();
            load_table_menu_master(data[0].id);

            $('#menu_title').on('keyup change', function () {
                if (table.column(1).search() !== this.value) {
                    table
                        .column(1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#group_id').on("select2:unselecting", function (e) {
            $('#menu_master_table').DataTable().clear().destroy();
        });

        $('#module').on("select2:select", function (e) {
            var data = $('#module').select2('data');
            var group_id = $('#group_id').select2('data');

            $('#configure_menu_table').DataTable().destroy();
            load_table_configure_menu(group_id[0].id, data[0].id);
        });

        $('#module').on("select2:unselecting", function (e) {
            $('#configure_menu_table').DataTable().clear().destroy();
        });

        function load_table_menu_master(groupAccessID = '') {
            table = $('#menu_master_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('utilities/menu_master/table') }}",
                    data: {
                        groupAccessID: groupAccessID
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        data: 'moduleName',
                        name: 'moduleName'
                    },
                    // {data: 'subModuleName', name: 'subModuleName'},
                    {
                        data: 'menuName',
                        name: 'menuName'
                    },
                    {
                        data: 'allowAccess',
                        name: 'allowAccess',
                        render: function (data, type, row) {
                            if (data == 'Y') {
                                return '<input type="checkbox" class="form-check-input allow_access_menu_master" name="allow_access_menu_master[]" value="Y" checked>';
                            } else {
                                return '<input type="checkbox" class="form-check-input allow_access_menu_master" name="allow_access_menu_master[]" value="Y">';
                            }
                        }
                    },
                    {
                        data: 'allowAdd',
                        name: 'allowAdd',
                        render: function (data, type, row) {
                            if (data == 'Y') {
                                return '<input type="checkbox" class="form-check-input allow_add_menu_master" name="allow_add_menu_master[]" value="Y" checked>';
                            } else {
                                return '<input type="checkbox" class="form-check-input allow_add_menu_master" name="allow_add_menu_master[]" value="Y">';
                            }
                        }
                    },
                    {
                        data: 'allowEdit',
                        name: 'allowEdit',
                        render: function (data, type, row) {
                            if (data == 'Y') {
                                return '<input type="checkbox" class="form-check-input allow_edit_menu_master" name="allow_edit_menu_master[]" value="Y" checked>';
                            } else {
                                return '<input type="checkbox" class="form-check-input allow_edit_menu_master" name="allow_edit_menu_master[]" value="Y">';
                            }
                        }
                    }
                ]
            });
        }

        function load_table_configure_menu(groupAccessID = '', moduleID = '') {
            table = $('#configure_menu_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('utilities/menu_master/configure_menu/table') }}",
                    data: {
                        groupAccessID: groupAccessID,
                        moduleID: moduleID
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type, row) {
                            return type === 'display' ?
                                '<input class="chk-select selected_configure_menu" type="checkbox" name="selected_configure_menu[' +
                                $('<div />').text(row.menuID).html() + ']" value="1">' : '';
                        }
                    },
                    {
                        data: 'moduleName',
                        name: 'moduleName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="menu_id_configure_menu[]" value="' +
                                $('<div />').text(row.menuID).html() +
                                '"><input type="hidden" class="form-control" name="group_id_configure_menu[]" value="' +
                                $('<div />').text(row.groupAccessID).html() +
                                '"><input type="hidden" class="form-control" name="module_id_configure_menu[]" value="' +
                                $('<div />').text(row.moduleID).html() + '">' + 
                                $('<div />').text(row.moduleName).html();
                        }
                    },
                    // {data: 'subModuleName', name: 'subModuleName'},
                    {
                        data: 'menuName',
                        name: 'menuName'
                    },
                    {
                        orderable: false,
                        data: 'allowAccess',
                        name: 'allowAccess',
                        render: function (data, type, row) {
                            return '<input type="checkbox" class="allow_access_configure_menu form-check-input" name="allow_access_configure_menu[' +
                                $('<div />').text(row.menuID).html() + ']" value="Y">';
                        }
                    },
                    {
                        orderable: false,
                        data: 'allowAdd',
                        name: 'allowAdd',
                        render: function (data, type, row) {
                            return '<input type="checkbox" class="form-check-input allow_add_configure_menu" name="allow_add_configure_menu[' +
                                $('<div />').text(row.menuID).html() + ']" value="Y">';
                        }
                    },
                    {
                        orderable: false,
                        data: 'allowEdit',
                        name: 'allowEdit',
                        render: function (data, type, row) {
                            return '<input type="checkbox" class="form-check-input allow_edit_configure_menu" name="allow_edit_configure_menu[' +
                                $('<div />').text(row.menuID).html() + ']" value="Y">';
                        }
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                'rowCallback': function (row, data, dataIndex) {
                    var rowId = data[0];

                    if ($.inArray(rowId, rows_configure_menu_selected) !== -1) {
                        $(row).find('input[type="checkbox"]').prop('checked', true);
                        $(row).addClass('selected');
                    }
                }
            });
        }

        $(".select_all").on("click", function (e) {
            if ($(this).is(":checked")) {
                table.rows().select();
                $('.selected_configure_menu').prop('checked', true);
            } else {
                table.rows().deselect();
                $('.selected_configure_menu').prop('checked', false);
            }
        });

        $(".select_all_allow_access").on("click", function (e) {
            if ($(this).is(":checked")) {
                $('.allow_access_configure_menu').prop('checked', true);
            } else {
                $('.allow_access_configure_menu').prop('checked', false);
            }
        });

        $(".select_all_allow_add").on("click", function (e) {
            if ($(this).is(":checked")) {
                $('.allow_add_configure_menu').prop('checked', true);
            } else {
                $('.allow_add_configure_menu').prop('checked', false);
            }
        });

        $(".select_all_allow_edit").on("click", function (e) {
            if ($(this).is(":checked")) {
                $('.allow_edit_configure_menu').prop('checked', true);
            } else {
                $('.allow_edit_configure_menu').prop('checked', false);
            }
        });

        $("#btn-configure-menu").on('click', function () {
            loadDataModule();

            $('#configure_menu_table').DataTable().destroy();
        });

        $("#btn-copy-to-another-group").on('click', function () {
            loadDataGroupID('#group_id_copy_from');
            loadDataGroupID('#group_id_copy_destination');
        });

        $("#btn-save-configure-menu").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $(this).prop("disabled", true);
                $(this).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

                $("#configure_menu_form").submit();
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $(document).on("change", "input[name='allow_access_menu_master[]']", function () {
            var data = table.row(this.closest('tr')).data();
            var allowAccess = 'N';
            var group_id = $('#group_id').val();
            // console.log(data.menuID);

            if (this.checked) {
                allowAccess = 'Y';
            }

            $.ajax({
                type: "POST",
                url: "{{ url('utilities/menu_master/proses') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {
                    'menuID': data.menuID,
                    'groupAccessID': data.groupAccessID,
                    'allowAccess': allowAccess,
                    'allowAdd': data.allowAdd,
                    'allowEdit': data.allowEdit
                },
                success: function (response) {
                    if (response.status == "true") {
                        $('#notification_success_detail').modal('show');
                        $('#message-notification-success-detail').html(response.message);
                        $('#menu_master_table').DataTable().destroy();
                        load_table_menu_master(group_id);
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
                }
            });
        });

        $(document).on("change", "input[name='allow_add_menu_master[]']", function () {
            var data = table.row(this.closest('tr')).data();
            var allowAdd = 'N';
            var group_id = $('#group_id').val();
            // console.log(data.menuID);

            if (this.checked) {
                allowAdd = 'Y';
            }

            $.ajax({
                type: "POST",
                url: "{{ url('utilities/menu_master/proses') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {
                    'menuID': data.menuID,
                    'groupAccessID': data.groupAccessID,
                    'allowAccess': data.allowAccess,
                    'allowAdd': allowAdd,
                    'allowEdit': data.allowEdit
                },
                success: function (response) {
                    if (response.status == "true") {
                        $('#notification_success_detail').modal('show');
                        $('#message-notification-success-detail').html(response.message);
                        $('#menu_master_table').DataTable().destroy();
                        load_table_menu_master(group_id);
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
                }
            });
        });

        $(document).on("change", "input[name='allow_edit_menu_master[]']", function () {
            var data = table.row(this.closest('tr')).data();
            var allowEdit = 'N';
            var group_id = $('#group_id').val();
            // console.log(data.menuID);

            if (this.checked) {
                allowEdit = 'Y';
            }

            $.ajax({
                type: "POST",
                url: "{{ url('utilities/menu_master/proses') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: {
                    'menuID': data.menuID,
                    'groupAccessID': data.groupAccessID,
                    'allowAccess': data.allowAccess,
                    'allowAdd': data.allowAdd,
                    'allowEdit': allowEdit
                },
                success: function (response) {
                    if (response.status == "true") {
                        $('#notification_success_detail').modal('show');
                        $('#message-notification-success-detail').html(response.message);
                        $('#menu_master_table').DataTable().destroy();
                        load_table_menu_master(group_id);
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
                }
            });
        });

        $('#group_id_copy_from').on("select2:select", function (e) {
            var data = $('#group_id_copy_from').select2('data');
            $('#group_name_copy_from').val(htmlDecode(data[0].title));
        });

        $('#group_id_copy_from').on("select2:unselecting", function (e) {
            $('#group_name_copy_from').val('');
        });

        $('#group_id_copy_destination').on("select2:select", function (e) {
            var data = $('#group_id_copy_destination').select2('data');
            $('#group_name_copy_destination').val(htmlDecode(data[0].title));
        });

        $('#group_id_copy_destination').on("select2:unselecting", function (e) {
            $('#group_name_copy_destination').val('');
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function loadDataGroupID(fieldName = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.groupAccessID + '</div>' +
                        '<div class="col-6">' + data.data.groupAccessName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(fieldName).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Group ID</b></div>' +
                        '<div class="col-6"><b>Group Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(fieldName).select2({
                width: '100%',
                placeholder: 'Choose Group ID',
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
                    url: "{{ url('/group_user_access/api') }}",
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
                                    text: item.groupAccessID,
                                    id: item.groupAccessID,
                                    title: item.groupAccessName,
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

        function loadDataModule() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.moduleID + '</div>' +
                        '<div class="col-6">' + data.data.moduleName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#module').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Module ID</b></div>' +
                        '<div class="col-6"><b>Module Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#module').select2({
                width: '100%',
                placeholder: 'Choose Module',
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
                    url: "{{ url('/module/api') }}",
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
                                    text: item.moduleID,
                                    id: item.moduleID,
                                    title: item.moduleName,
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
            window.location = "{{ url('utilities/menu_master') }}";
        });

        $('#modal_configure_menu').on('hide.bs.modal', function () {
            $('#module').val('').change();
            $('#configure_menu_table').DataTable().clear().destroy();
        });

        $("#btn-save-copy-to-another-group").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#copy_to_another_group_form").submit();
        });

        $('#configure_menu_form').on('submit', function () {
            var data = decodeURI(table.rows('.selected').nodes().$('input').serialize());

            var group_id = $('#group_id').val();

            $.ajax({
                type: "POST",
                url: "{{ url('utilities/menu_master/configure_menu/proses') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: data,
                success: function (response) {
                    if (response.status == "true") {
                        $("#btn-save-configure-menu").prop("disabled", false);
                        $("#btn-save-configure-menu").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile.btn_save") }}'
                        );

                        $('#modal_configure_menu').modal('hide');
                        $('#notification_success_detail').modal('show');
                        $('#message-notification-success-detail').html(response.message);
                        $('#menu_master_table').DataTable().destroy();
                        load_table_menu_master(group_id);
                        setTimeout(function () {
                            $('#notification_success_detail').modal('hide');
                        }, 3000);
                    } else {
                        $("#btn-save-configure-menu").prop("disabled", false);
                        $("#btn-save-configure-menu").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile.btn_save") }}'
                        );

                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html(
                            "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                }
            });

            return false;
        });

        if ($("#copy_to_another_group_form").length > 0) {
            $("#copy_to_another_group_form").validate({
                rules: {
                    group_id_copy_from: {
                        required: true,
                    },
                    group_id_copy_destination: {
                        required: true,
                    }
                },
                messages: {
                    group_id_copy_from: {
                        required: "{{ __('utilities_menu_master_mobile.group_id_required') }}",
                    },
                    group_id_copy_destination: {
                        required: "{{ __('utilities_menu_master_mobile.group_id_required') }}",
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
                    $("#btn-save-copy-to-another-group").prop("disabled", false);
                    $("#btn-save-copy-to-another-group").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile.btn_save") }}'
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
                        url: "{{ url('utilities/menu_master/copy_to_another_group/proses') }}",
                        type: "POST",
                        data: $('#copy_to_another_group_form').serialize(),
                        success: function (response) {
                            var group_id = $('#group_id').val();

                            if (response.status == "true") {
                                $("#btn-save-copy-to-another-group").prop("disabled",
                                    false);
                                $("#btn-save-copy-to-another-group").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile.btn_save") }}'
                                );

                                $("#copy_to_another_group_form").trigger('reset');
                                $('#modal_copy_to_another_group').modal('hide');
                                $('#notification_success_detail').modal('show');
                                $('#message-notification-success-detail').html(response
                                    .message);
                                $('#menu_master_table').DataTable().destroy();
                                setTimeout(function () {
                                    $('#notification_success_detail').modal(
                                        'hide');
                                }, 3000);
                            } else {
                                $("#btn-save-copy-to-another-group").prop("disabled",
                                    false);
                                $("#btn-save-copy-to-another-group").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile.btn_save") }}'
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
                            $("#btn-save-copy-to-another-group").prop("disabled",
                            false);
                            $("#btn-save-copy-to-another-group").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile.btn_save") }}'
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
