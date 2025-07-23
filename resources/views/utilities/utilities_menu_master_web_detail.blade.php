<!DOCTYPE html>
<html>

<head>
    <title>{{ __('utilities_menu_master_web.judul') }}</title>
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

        .container {
            display: flex;
            align-items: center;
            padding-left: 0;
        }
        .preview {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9f9f9;
        }
        .preview img {
            max-width: 100%;
            max-height: 100%;
        }
        .file-input-wrapper {
            display: flex;
            align-items: center;
            height: 40px; /* Tinggi disesuaikan dengan input file */
        }

    </style>
</head>

<body>
    <div class="div-utilities">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('utilities_menu_master_web.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="menu_master_web_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu_name">{{ __('utilities_menu_master_web.label_menu_name') }}</label>
                            <input type="text" class="form-control" id="menu_name" name="menu_name"
                                placeholder="{{ __('utilities_menu_master_web.label_menu_name') }}">
                        </div>
                        <input type="hidden" class="form-control" id="menu_id" name="menu_id">
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="page_url">{{ __('utilities_menu_master_web.label_page_url') }}</label>
                            <input type="text" class="form-control" id="page_url" name="page_url"
                                placeholder="{{ __('utilities_menu_master_web.label_page_url') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_have_child"
                                    name="check_have_child" value="1">
                                <label
                                    for="check_have_child">{{ __('utilities_menu_master_web.label_check_have_child') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="div-parent-id">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="parent_id">{{ __('utilities_menu_master_web.label_parent_id') }}</label>
                            <select class="form-control select2" id="parent_id" name="parent_id"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="module_id">{{ __('utilities_menu_master_web.label_module_id') }}</label>
                            <select class="form-control select2" id="module_id" name="module_id"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="order_line">{{ __('utilities_menu_master_web.label_order_line') }}</label>
                            <input type="number" class="form-control" id="order_line" name="order_line"
                                placeholder="{{ __('utilities_menu_master_web.label_order_line') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="icon_url">{{ __('utilities_menu_master_web.label_icon_url') }}</label>
                            <input type="text" class="form-control" id="icon_url" name="icon_url"
                                placeholder="{{ __('utilities_menu_master_web.label_icon_url') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('utilities_menu_master_web.btn_save') }}
                        </button>
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
                        <span class="title-text-notification">{{ __('utilities_menu_master_web.alert_success') }}</span>
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
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
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
        var func = "{{ $func }}";
        var arrData = @json($data);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        if (func == 'new') {
            $('#record_function').val("New");
            $('#menu_id').val("");
            $('#menu_name').val("");
            $('#page_url').val("");
            $('#check_have_child').prop('checked', false);
            $('#parent_id').val(null).trigger('change');
            $('#module_id').val(null).trigger('change');
            $('#order_line').val("");
            $('#icon_url').val("");
        } else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#menu_id').val("{{ isset($data[0]->menuID) ? $data[0]->menuID : '' }}");
            $('#menu_name').val("{{ isset($data[0]->menuName) ? $data[0]->menuName : '' }}");
            $('#page_url').val("{{ isset($data[0]->pageURL) ? $data[0]->pageURL : '' }}");
            $('#order_line').val("{{ isset($data[0]->orderLine) ? $data[0]->orderLine : '' }}");
            $('#icon_url').val("{{ isset($data[0]->iconURL) ? $data[0]->iconURL : '' }}");
            if (typeof arrData[0].isHaveChild !== 'undefined' && arrData[0].isHaveChild == "1") {
                $('#check_have_child').prop('checked', true);
            }

            $.ajax({
                type: 'GET',
                url: "{{ url('/menu_master_web/detail/api') }}",
                data: {
                    'menuID': "{{ isset($data[0]->parentID) ? $data[0]->parentID : '' }}"
                }
            }).then(function (data) {
                var option = new Option(data[0].menuName, data[0].menuID, true, true);

                $('#parent_id').append(option).trigger('change');

                $('#parent_id').trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].menuID,
                        text: data[0].menuName,
                        data: data[0]
                    }
                });
            });
            
            $.ajax({
                type: 'GET',
                url: "{{ url('/module/detail/api') }}",
                data: {
                    'moduleID': "{{ isset($data[0]->moduleID) ? $data[0]->moduleID : '' }}"
                }
            }).then(function (data) {
                var option = new Option(data[0].moduleName, data[0].moduleID, true, true);

                $('#module_id').append(option).trigger('change');

                $('#module_id').trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].moduleID,
                        text: data[0].moduleName,
                        data: data[0]
                    }
                });
            });
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        loadDataParentMenu();
        loadDataModule();

        $('#check_have_child').on('change', function () {
            if ($('#check_have_child').is(':checked')) {
                $('#div-parent-id').hide();
            } else {
                $('#div-parent-id').show();
            }
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('utilities/menu_master_web') }}";
        });

        function loadDataParentMenu() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.menuID + '</div>' +
                        '<div class="col-6">' + data.data.menuName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#parent_id').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Parent ID</b></div>' +
                        '<div class="col-6"><b>Parent Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#parent_id').select2({
                width: '100%',
                placeholder: 'Choose Parent Menu',
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
                    url: "{{ url('/menu_master_web/api') }}",
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
                                    text: item.menuName,
                                    id: item.menuID,
                                    title: item.menuName,
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
            $('#module_id').on('select2:open', function (e) {
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

            $('#module_id').select2({
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
                                    text: item.moduleName,
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#menu_master_web_form").submit();
        });

        if ($("#menu_master_web_form").length > 0) {
            $("#menu_master_web_form").validate({
                rules: {
                    menu_name: {
                        required: true,
                    },
                    page_url: {
                        required: true,
                    },
                    module_id: {
                        required: true,
                    }
                },
                messages: {
                    menu_name: {
                        required: "{{ __('utilities_menu_master_web.menu_name_required') }}",
                    },
                    page_url: {
                        required: "{{ __('utilities_menu_master_web.page_url_required') }}",
                    },
                    module_id: {
                        required: "{{ __('utilities_menu_master_web.module_id_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_web.btn_save") }}'
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
                        url: "{{ url('utilities/menu_master_web/proses') }}",
                        type: "POST",
                        data: $('#menu_master_web_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled",
                                    false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_web.btn_save") }}'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                            } else {
                                $("#btn-save").prop("disabled",
                                    false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_web.btn_save") }}'
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
                            $("#btn-save").prop("disabled",
                            false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_web.btn_save") }}'
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
