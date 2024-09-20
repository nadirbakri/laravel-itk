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

        td.dt-control {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="div-utilities">
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
        var table2 = null;
        var table3 = null;
        var arrayMenu = [];
        var arrData = @json($data);
        var openRows = []; // Array untuk menyimpan ID parent row yang terbuka

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
                            <input type="hidden" class="form-control" name="lineNo[]" value="
                            ${child.lineNo}">
                            ${child.lineNo}
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="menuID[]" value="
                            ${child.menuID}">
                            <input type="hidden" class="form-control" name="parentMenuID[]" value="
                            ${rowData.menuID}">
                            <input type="hidden" class="form-control" name="menuDesc[]" value="
                            ${child.menuDesc}">
                            ${child.menuDesc}
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="className[]" value="
                            ${child.className}">
                            <input type="hidden" class="form-control" name="lineNo[]" value="
                            ${child.lineNo}">
                            ${child.className}
                        </td>
                        <td>
                            <input type="hidden" class="form-control" name="icon[]" value="
                            ${child.icon}">
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
                        <th>Line No</th>
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
                ordering: false,
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
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="lineNo[]" value="' +
                                row.lineNo + '">' + data;
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

            if (row.child.isShown()) {
                // Child row sedang terbuka - tutup sekarang
                row.child.hide();
                icon.removeClass('fa-minus').addClass('fa-plus');
            } else {
                // Child row sedang tertutup - buka sekarang
                row.child(format(row.data())).show();
                icon.removeClass('fa-plus').addClass('fa-minus');
            }
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#menu_master_mobile_setting_form").submit();
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
    });

</script>

</html>
