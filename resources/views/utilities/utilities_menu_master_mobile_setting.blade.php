<!DOCTYPE html>
<html>

<head>
    <title>{{ __('utilities_menu_master_mobile_setting.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-utilities {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
        .div-title {
            margin: 1.5%;
            margin-bottom: 3%;
            margin-top: 8%;
        }
        .div-title img {
            max-width: 100%;
            height: 4.5vh;
        }
        .title-text {
            font-family: Montserrat;
            color: #106da7;
            font-weight: 700;
            font-size: 1.5vw;
            margin-left: 0.5%;
        }
        .div-title a {
            text-decoration: none;
            display: flex;
            align-items: center;
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

        td.dt-control {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="div-utilities">
    <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-active">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" style="display: none;" href="javascript:void(0)" id="toolbar-deactive">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
            <a class="list-functionbar-xl" href="javascript:void(0)" id="toolbar-process" data-toggle="modal" data-target="#modal_copy_from_another_company">
                <img src="{{ url('/icons/functionbar/process.svg') }}" alt="Process">
                <img src="{{ url('/icons/functionbar/process.svg') }}" class="functionbar-hover" alt="Process">
                <span>Copy From Another Company</span>
            </a>
        </div>
        <div class="div-title">
            <a href="{{ route('utilities', ['moduleID' => 'UTI']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('utilities_menu_master_mobile_setting.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="menu_master_mobile_setting_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <table id="menu_master_mobile_setting_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Line No</th>
                                    <th>Menu</th>
                                    <th>Class Name</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1" style="padding-right: 0.3rem;">
                        <button class="button btn btn-primary" name="btn-add" id="btn-add" data-toggle="modal" data-target="#modal_list_menu" type="button" style="width: 100%;">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="col-1" style="padding-left: 0.3rem;">
                        <button class="button btn btn-danger" name="btn-delete" id="btn-delete" type="button" style="width: 100%;">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('utilities_menu_master_mobile_setting.btn_save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_copy_from_another_company"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('utilities_menu_master_mobile_setting.label_copy_from_another_company') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="copy_from_another_company_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('utilities_menu_master_mobile_setting.label_copy_from') }}</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="company_code_from">{{ __('utilities_menu_master_mobile_setting.label_company_code') }}</label>
                                    <select class="form-control select2" id="company_code_from"
                                        name="company_code_from"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="company_name_from">{{ __('utilities_menu_master_mobile_setting.label_company_name') }}</label>
                                    <input type="text" class="form-control" id="company_name_from"
                                        name="company_name_from"
                                        placeholder="{{ __('utilities_menu_master_mobile_setting.label_company_name') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{ __('utilities_menu_master_mobile_setting.label_copy_destination') }}</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="company_code_destination">{{ __('utilities_menu_master_mobile_setting.label_company_code') }}</label>
                                    <select class="form-control select2" id="company_code_destination"
                                        name="company_code_destination"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="company_name_destination">{{ __('utilities_menu_master_mobile_setting.label_company_name') }}</label>
                                    <input type="text" class="form-control" id="company_name_destination"
                                        name="company_name_destination"
                                        placeholder="{{ __('utilities_menu_master_mobile_setting.label_company_name') }}" readonly>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-copy-from-another-company" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i> {{ __('utilities_menu_master_mobile_setting.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('utilities_menu_master_mobile_setting.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_list_menu"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-table">
                        <table id="list_menu_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Menu</th>
                                    <th>Class Name</th>
                                    <th>Icon</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_list_menu_child"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">List Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-table">
                        <table id="list_menu_child_table" class="table hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Menu</th>
                                    <th>Class Name</th>
                                    <th>Icon</th>
                            </thead>
                        </table>
                    </div>
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
                        <span class="title-text-notification">{{ __('utilities_menu_master_mobile_setting.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script> -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var table = null;
        var table2 = null;
        var table3 = null;
        var arrayMenu = [];
        var arrData = @json($data);
        var openRows = []; // Array untuk menyimpan ID parent row yang terbuka
        var typingTimer;

        arrayMenu = arrData;
        
        $('#menu_master_mobile_setting_table').DataTable().destroy();
        load_table_menu_master_mobile_setting();

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#modal_list_menu').on('show.bs.modal', function () {
            load_table_list_menu();
        });

        $('#modal_list_menu_child').on('show.bs.modal', function () {
            load_table_list_menu_child();
        });

        loadDataCompany('#company_code_from');
        loadDataCompany('#company_code_destination');

        $('#company_code_from').on('select2:select', function (e) {
            var data = $('#company_code_from').select2('data');
            $('#company_name_from').val(htmlDecode(data[0].title));
        });

        $('#company_code_from').on('select2:unselecting', function (e) {
            $('#company_name_from').val('');
        });

        $('#company_code_destination').on('select2:select', function (e) {
            var data = $('#company_code_destination').select2('data');
            $('#company_name_destination').val(htmlDecode(data[0].title));
        });

        $('#company_code_destination').on('select2:unselecting', function (e) {
            $('#company_name_destination').val('');
        });

        function format(rowData) {
            let rows = '';

            if (rowData.menuChild.length === 0) {
                return `
                    <table cellpadding="5" cellspacing="0" border="0" style="width:100%;">
                        <tr>
                            <td colspan="4">No Data Available</td>
                        </tr>
                    </table>
                `;
            }

            rowData.menuChild.forEach(child => {
                let imageContent = '';
                let imageDiv = document.createElement('div');
                imageDiv.innerHTML = atob(child.icon); // Decode base64
                const svgElement = imageDiv.querySelector('svg');

                if (!svgElement) {
                    var image = new Image();
                    image.src = 'data:image/png;base64,' + child.icon;
                    image.width = 40;
                    image.height = 40;
                    imageContent = image.outerHTML;
                } else {
                    svgElement.setAttribute('width', '40');
                    svgElement.setAttribute('height', '40');
                    svgElement.style.maxWidth = '100%'; // Pastikan SVG tidak melebihi lebar div
                    svgElement.style.maxHeight = '100%'; // Pastikan SVG tidak melebihi tinggi div
                    imageContent = imageDiv.innerHTML;
                }

                rows += `
                    <tr>
                        <td>
                            <input type="text" class="form-control lineno-child-input" name="lineNo[]" value="${child.lineNo}">
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="menuID[]" value="${child.menuID}">
                            <input type="hidden" class="form-control" name="parentMenuID[]" value="${rowData.menuID}">
                            <input type="hidden" class="form-control" name="menuDesc[]" value="${child.menuDesc}">
                            ${child.menuDesc}
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="className[]" value="${child.className}">
                            <input type="hidden" class="form-control" name="lineNo[]" value="${child.lineNo}">
                            ${child.className}
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="icon[]" value="${child.icon}">
                            ${imageContent}
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-delete-child" data-menu-id="${child.menuID}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            });

            return `
                <table cellpadding="5" cellspacing="0" border="0" style="width:100%;">
                    <tr>
                        <th width="10%">Line No</th>
                        <th>Menu Name</th>
                        <th>Class Name</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                    ${rows}
                </table>
            `;
        }

        function load_table_menu_master_mobile_setting() {
            table = $('#menu_master_mobile_setting_table').DataTable({
                processing: true,
                data: arrayMenu,
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                paging: false,
                order: [],
                // ordering: false,
                order: [[2, 'asc']],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '<i class="fa fa-plus"></i>'
                    },
                    {
                        data: 'lineNo',
                        name: 'lineNo',
                        width: '10%',
                        render: function (data, type, row) {
                            return '<input type="text" class="form-control lineno-input" name="lineNo[]" value="' +
                                row.lineNo + '">';
                        }
                    },
                    {
                        data: 'menuDesc',
                        name: 'menuDesc',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="menuID[]" value="' +
                                row.menuID + '"><input type="hidden" class="form-control" name="parentMenuID[]" value="' +
                                row.parentMenuID + '"><input type="hidden" class="form-control" name="menuDesc[]" value="' +
                                row.menuDesc + '">' + data;
                        }
                    },
                    {
                        data: 'className',
                        name: 'className',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="className[]" value="' +
                                row.className + '"><input type="hidden" class="form-control" name="lineNo[]" value="' +
                                row.lineNo + '"><input type="hidden" class="form-control" name="icon[]" value="' +
                                row.icon + '">' + data;
                        }
                    },
                    {
                        data: 'icon',
                        name: 'icon',
                        className: "text-center",
                        render: function (data, type, row) {
                            var imageDiv = document.createElement('div');
                            imageDiv.innerHTML = atob(data); // Decode base64
                            const svgElement = imageDiv.querySelector('svg');

                            var imageHtml;
                            if (!svgElement) {
                                var image = new Image();
                                image.src = 'data:image/png;base64,' + data;
                                image.width = 40;
                                image.height = 40;
                                imageHtml = image.outerHTML;
                            }else{
                                svgElement.setAttribute('width', '40');
                                svgElement.setAttribute('height', '40');
                                svgElement.style.maxWidth = '100%'; // Pastikan SVG tidak melebihi lebar div
                                svgElement.style.maxHeight = '100%'; // Pastikan SVG tidak melebihi tinggi div
                                imageHtml = imageDiv.innerHTML;
                            }
                            return imageHtml;
                        }
                    },
                    {
                        data: null,
                        orderable: false,
                        defaultContent: '<button type="button" class="btn btn-primary btn-add-child" data-menu-id="${child.menuID}">Add Child</button>'
                    },
                ],
                select: {
                    style: 'single',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_list_menu() {
            $('#list_menu_table').DataTable().destroy();
            table2 = $('#list_menu_table').DataTable( {
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('/menu_mobile/table/api') }}"             
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lfrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        "className": "text-center",
                        render: function (data, type) {
                            return type === 'display' ?
                                '<button type="button" class="btn btn-primary btn-choose-menu"><i class="fa fa-check"></i></button>' : '';
                        }
                    },
                    {   
                        data: 'menuDesc',
                        name: 'menuDesc',
                    },
                    {
                        data: 'className',
                        name: 'className'
                    },
                    {
                        data: 'icon',
                        name: 'icon',
                        render: function (data, type, row) {
                            var imageDiv = document.createElement('div');
                            imageDiv.innerHTML = atob(data); // Decode base64
                            const svgElement = imageDiv.querySelector('svg');

                            var imageHtml;
                            if (!svgElement) {
                                var image = new Image();
                                image.src = 'data:image/png;base64,' + data;
                                image.width = 40;
                                image.height = 40;
                                imageHtml = image.outerHTML;
                            }else{
                                svgElement.setAttribute('width', '40');
                                svgElement.setAttribute('height', '40');
                                svgElement.style.maxWidth = '100%'; // Pastikan SVG tidak melebihi lebar div
                                svgElement.style.maxHeight = '100%'; // Pastikan SVG tidak melebihi tinggi div
                                imageHtml = imageDiv.innerHTML;
                            }
                            return imageHtml;
                        }
                    }],
                    select: {
                        style: 'single',
                        selector: 'td:first-child'
                    }
            });
        }

        function load_table_list_menu_child() {
            $('#list_menu_child_table').DataTable().destroy();
            table3 = $('#list_menu_child_table').DataTable( {
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('/menu_mobile/table/api') }}"             
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lfrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        "className": "text-center",
                        render: function (data, type) {
                            return type === 'display' ?
                                '<button type="button" class="btn btn-primary btn-choose-menu-child"><i class="fa fa-check"></i></button>' : '';
                        }
                    },
                    {   
                        data: 'menuDesc',
                        name: 'menuDesc',
                    },
                    {
                        data: 'className',
                        name: 'className'
                    },
                    {
                        data: 'icon',
                        name: 'icon',
                        render: function (data, type, row) {
                            var imageDiv = document.createElement('div');
                            imageDiv.innerHTML = atob(data); // Decode base64
                            const svgElement = imageDiv.querySelector('svg');

                            var imageHtml;
                            if (!svgElement) {
                                var image = new Image();
                                image.src = 'data:image/png;base64,' + data;
                                image.width = 40;
                                image.height = 40;
                                imageHtml = image.outerHTML;
                            }else{
                                svgElement.setAttribute('width', '40');
                                svgElement.setAttribute('height', '40');
                                svgElement.style.maxWidth = '100%'; // Pastikan SVG tidak melebihi lebar div
                                svgElement.style.maxHeight = '100%'; // Pastikan SVG tidak melebihi tinggi div
                                imageHtml = imageDiv.innerHTML;
                            }
                            return imageHtml;
                        }
                    }],
                    select: {
                        style: 'single',
                        selector: 'td:first-child'
                    }
            });
        }

        table.on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var icon = $(this).find('i');

            // Tutup semua child row yang sedang terbuka
            table.rows().every(function () {
                if (this.child.isShown() && !this.node().isEqualNode(tr[0])) {
                    this.child.hide();
                    $(this.node()).find('i').removeClass('fa-minus').addClass('fa-plus');
                }
            });

            // Toggle untuk child row yang diklik
            if (row.child.isShown()) {
                row.child.hide();
                icon.removeClass('fa-minus').addClass('fa-plus');
            } else {
                row.child(format(row.data())).show();
                icon.removeClass('fa-plus').addClass('fa-minus');
            }
        });

        $('#menu_master_mobile_setting_table').on('input', '.lineno-child-input', function () {
            clearTimeout(typingTimer);
            var childInputField = $(this);
            var childRow = childInputField.closest('tr'); // Ambil row child saat ini

            // Temukan row parent dengan mencari ke atas
            var parentRow = childRow.closest('table').closest('td').closest('tr').prev('tr'); // Mengambil parent yang memiliki dt-control

            // Simpan state row yang terbuka
            openRows = []; // Reset array openRows sebelum mengisi ulang
            $('#menu_master_mobile_setting_table tbody tr').each(function () {
                var row = table.row(this);
                if (row.child.isShown()) {
                    openRows.push(row.data().menuID); // Menyimpan ID parent yang terbuka
                }
            });

            typingTimer = setTimeout(function () {
                // Ambil index row parent
                var rowIndex = table.row(parentRow).index(); 
                var childRowIndex = childRow.index(); // Ambil index child row

                var childData = arrayMenu[rowIndex].menuChild;

                // Perbarui lineNo
                childData[childRowIndex - 1].lineNo = childInputField.val(); // Pastikan indeks yang benar

                // Urutkan menuChild berdasarkan lineNo
                childData.sort(function(a, b) {
                    return parseInt(a.lineNo) - parseInt(b.lineNo);
                });
                
                // Hancurkan DataTable yang ada dan muat ulang
                $('#menu_master_mobile_setting_table').DataTable().destroy();
                load_table_menu_master_mobile_setting();

                // Buka kembali row yang terbuka berdasarkan ID yang disimpan
                table.rows().every(function () {
                    var row = this;
                    if (openRows.includes(row.data().menuID)) {
                        row.child(format(row.data())).show();
                        $(row.node()).find('td.dt-control i').removeClass('fa-plus').addClass('fa-minus');
                    }
                });
            }, 500);
        });

        $('#menu_master_mobile_setting_table tbody').on('click', '.btn-add-child', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr).data();
            addChildRow(row);
        });

        $('#menu_master_mobile_setting_table tbody').on('click', '.btn-delete-child', function() {
            var menuID = $(this).data('menu-id');
            deleteChildRow(menuID);
        });

        $('#menu_master_mobile_setting_table').on('input', '.lineno-input', function () {
            clearTimeout(typingTimer); // Clear the previous timer
            var inputField = $(this);

            typingTimer = setTimeout(function () {
                var rowIndex = inputField.closest('tr').index();
                arrayMenu[rowIndex].lineNo = inputField.val();

                arrayMenu.sort(function(a, b) {
                    return parseInt(a.lineNo) - parseInt(b.lineNo);
                });

                // Simpan state row yang terbuka
                $('#menu_master_mobile_setting_table tbody tr').each(function () {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    if (row.child.isShown()) {
                        openRows.push(row.data().menuID); // Menyimpan ID parent yang terbuka
                    }
                });

                // Hancurkan dan muat ulang DataTable
                $('#menu_master_mobile_setting_table').DataTable().destroy();
                load_table_menu_master_mobile_setting();

                // Buka kembali row yang terbuka berdasarkan ID yang disimpan
                table.rows().every(function () {
                    var row = this;
                    if (openRows.includes(row.data().menuID)) {
                        row.child(format(row.data())).show();
                        $(row.node()).find('td.dt-control i').removeClass('fa-plus').addClass('fa-minus');
                    }
                });
            }, 500);
        });

        function addChildRow(parentData) {
            openRows = [];
            
            $('#modal_list_menu_child').modal('show');

            window.selectedParentData = parentData;

            // Simpan state row yang terbuka
            $('#menu_master_mobile_setting_table tbody tr').each(function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                if (row.child.isShown()) {
                    openRows.push(row.data().menuID); // Menyimpan ID parent yang terbuka
                }
            });
        }

        function deleteChildRow(menuID) {
            var parentIndex = -1;
            var childIndex = -1;

            // Temukan parent dan child index berdasarkan menuID
            for (var i = 0; i < arrayMenu.length; i++) {
                for (var j = 0; j < arrayMenu[i].menuChild.length; j++) {
                    if (arrayMenu[i].menuChild[j].menuID === menuID) {
                        parentIndex = i;
                        childIndex = j;
                        break;
                    }
                }
                if (parentIndex !== -1 && childIndex !== -1) {
                    break;
                }
            }

            if (parentIndex !== -1 && childIndex !== -1) {
                // Hapus child dari arrayMenu
                arrayMenu[parentIndex].menuChild.splice(childIndex, 1);
                openRows = [];

                // Simpan state row yang terbuka
                $('#menu_master_mobile_setting_table tbody tr').each(function () {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    if (row.child.isShown()) {
                        openRows.push(row.data().menuID); // Menyimpan ID parent yang terbuka
                    }
                });

                // Hancurkan dan muat ulang DataTable
                $('#menu_master_mobile_setting_table').DataTable().destroy();
                load_table_menu_master_mobile_setting();

                // Buka kembali row yang terbuka berdasarkan ID yang disimpan
                table.rows().every(function () {
                    var row = this;
                    if (openRows.includes(row.data().menuID)) {
                        row.child(format(row.data())).show();
                        $(row.node()).find('td.dt-control i').removeClass('fa-plus').addClass('fa-minus');
                    }
                });
            } else {
                alert('Child not found');
            }
        }

        $('#menu_master_mobile_setting_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#menu_master_mobile_setting_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#list_menu_table').on('click', '.btn-choose-menu', function () {
            var data = table2.row($(this).parents('tr')).data();
            openRows = [];

            // Simpan state row yang terbuka
            $('#menu_master_mobile_setting_table tbody tr').each(function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                if (row.child.isShown()) {
                    openRows.push(row.data().menuID); // Menyimpan ID parent yang terbuka
                }
            });

            if (data.menuChild === null) {
                data.menuChild = [];
            }

            if (arrayMenu.length > 0) {
                data.lineNo = arrayMenu[arrayMenu.length - 1].lineNo + 1;
            } else {
                data.lineNo = 1;
            }

            arrayMenu.push(data);

            // Refresh DataTable atau menambahkan baris baru ke child row yang sudah terbuka
            $('#menu_master_mobile_setting_table').DataTable().destroy();
            load_table_menu_master_mobile_setting();

            // Buka kembali row yang terbuka berdasarkan ID yang disimpan
            table.rows().every(function () {
                var row = this;
                if (openRows.includes(row.data().menuID)) {
                    row.child(format(row.data())).show();
                    $(row.node()).find('td.dt-control i').removeClass('fa-plus').addClass('fa-minus');
                }
            });
  
            // Menutup modal
            $('#modal_list_menu').modal('hide');
        });

        $('#list_menu_child_table').on('click', '.btn-choose-menu-child', function () {
            var data = table3.row($(this).parents('tr')).data();
            var parentID = window.selectedParentData.menuID;
  
            // Menutup modal
            $('#modal_list_menu_child').modal('hide');

            // Menambahkan child ke arrayMenu
            for (var i = 0; i < arrayMenu.length; i++) {
                if (arrayMenu[i].menuID === parentID) {
                    if (arrayMenu[i].menuChild.length > 0) {
                        data.lineNo = arrayMenu[i].menuChild[arrayMenu[i].menuChild.length - 1].lineNo + 1;
                    } else {
                        data.lineNo = 1;
                    }
                    arrayMenu[i].menuChild.push(data);
                    break;
                }
            }

            // Simpan state row yang terbuka
            $('#menu_master_mobile_setting_table tbody tr').each(function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                if (row.child.isShown()) {
                    openRows.push(row.data().menuID); // Menyimpan ID parent yang terbuka
                }
            });

            // Refresh DataTable atau menambahkan baris baru ke child row yang sudah terbuka
            $('#menu_master_mobile_setting_table').DataTable().destroy();
            load_table_menu_master_mobile_setting();

            // Buka kembali row yang terbuka berdasarkan ID yang disimpan
            table.rows().every(function () {
                var row = this;
                if (openRows.includes(row.data().menuID)) {
                    row.child(format(row.data())).show();
                    $(row.node()).find('td.dt-control i').removeClass('fa-plus').addClass('fa-minus');
                }
            });
        });

        $('#btn-delete').on('click', function(e){
            var selectedRows = table.rows('.selected').data();
            openRows = [];

            // Loop melalui setiap baris yang dipilih
            selectedRows.each(function (rowData) {
                // Cari indeks dari item yang akan dihapus di arrayMenu berdasarkan menuID atau atribut unik lain
                var indexToDelete = arrayMenu.findIndex(menu => menu.menuID === rowData.menuID);
                
                // Jika item ditemukan di arrayMenu, hapus menggunakan splice
                if (indexToDelete !== -1) {
                    arrayMenu.splice(indexToDelete, 1);
                }
            });

            // Hapus baris yang dipilih dari DataTable
            // table.rows('.selected').remove().draw(false);

            // Simpan state row yang terbuka
            $('#menu_master_mobile_setting_table tbody tr').each(function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                if (row.child.isShown()) {
                    openRows.push(row.data().menuID); // Menyimpan ID parent yang terbuka
                }
            });

            $('#menu_master_mobile_setting_table').DataTable().destroy();
            load_table_menu_master_mobile_setting();

             // Buka kembali row yang terbuka berdasarkan ID yang disimpan
             table.rows().every(function () {
                var row = this;
                if (openRows.includes(row.data().menuID)) {
                    row.child(format(row.data())).show();
                    $(row.node()).find('td.dt-control i').removeClass('fa-plus').addClass('fa-minus');
                }
            });
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('utilities/menu_master_mobile_setting') }}";
        });

        function collectAllData() {
            var allData = [];

            arrayMenu.forEach(function(parent) {
                // Salin data parent
                allData.push({
                    menuID: parent.menuID,
                    menuDesc: parent.menuDesc,
                    className: parent.className,
                    icon: parent.icon,
                    parentMenuID: parent.parentMenuID,
                    lineNo: parent.lineNo
                });

                // Salin data child
                parent.menuChild.forEach(function(child) {
                    allData.push({
                        menuID: child.menuID,
                        parentMenuID: parent.menuID,
                        menuDesc: child.menuDesc,
                        className: child.className,
                        icon: child.icon,
                        lineNo: child.lineNo
                    });
                });
            });

            return allData;
        }

        function loadDataCompany(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-4">' + data.data.companyCode + '</div>' +
                        '<div class="col-8">' + data.data.companyName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-4"><b>Code</b></div>' +
                        '<div class="col-8"><b>Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $companyCode = $(field).select2({
                width: '100%',
                placeholder: 'Choose Company',
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
                    url: "{{ url('/session_company/api') }}",
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
                                    text: item.companyCode,
                                    id: item.companyCode,
                                    title: item.companyName,
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
            $("#menu_master_mobile_setting_form").submit();
        });

        $("#btn-save-copy-from-another-company").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#copy_from_another_company_form").submit();
        });

        if ($("#menu_master_mobile_setting_form").length > 0) {
            $("#menu_master_mobile_setting_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var allData = collectAllData();
                    console.log(allData);

                    $.ajax({
                        url: "{{ url('utilities/menu_master_mobile_setting/proses') }}",
                        type: "POST",
                        data: JSON.stringify(allData),
                        contentType: 'application/json; charset=utf-8',
                        dataType: 'json',
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled",
                                    false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile_setting.btn_save") }}'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                            } else {
                                $("#btn-save").prop("disabled",
                                    false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile_setting.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile_setting.btn_save") }}'
                            );
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#copy_from_another_company_form").length > 0) {
            $("#copy_from_another_company_form").validate({
                rules: {
                    company_code_from: {
                        required: true,
                    },
                    company_code_destination: {
                        required: true,
                    }
                },
                messages: {
                    company_code_from: {
                        required: "{{ __('utilities_menu_master_mobile_setting.company_code_required') }}",
                    },
                    company_code_destination: {
                        required: "{{ __('utilities_menu_master_mobile_setting.company_code_required') }}",
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
                    $("#btn-save-copy-from-another-company").prop("disabled", false);
                    $("#btn-save-copy-from-another-company").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile_setting.btn_save") }}'
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
                        url: "{{ url('utilities/menu_master_mobile_setting/copy_from_another_company/proses') }}",
                        type: "POST",
                        data: $('#copy_from_another_company_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-copy-from-another-company").prop("disabled",
                                    false);
                                $("#btn-save-copy-from-another-company").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile_setting.btn_save") }}'
                                );

                                $("#copy_from_another_company_form").trigger('reset');
                                $('#modal_copy_from_another_company').modal('hide');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('utilities/menu_master_mobile_setting') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-copy-from-another-company").prop("disabled",
                                    false);
                                $("#btn-save-copy-from-another-company").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile_setting.btn_save") }}'
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
                            $("#btn-save-copy-from-another-company").prop("disabled",
                            false);
                            $("#btn-save-copy-from-another-company").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile_setting.btn_save") }}'
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
