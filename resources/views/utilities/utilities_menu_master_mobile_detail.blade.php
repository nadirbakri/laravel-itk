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
                <span class="title-text">{{ __('utilities_menu_master_mobile.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="menu_master_mobile_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="menu_desc">{{ __('utilities_menu_master_mobile.label_menu_description') }}</label>
                            <input type="text" class="form-control" id="menu_desc" name="menu_desc"
                                placeholder="{{ __('utilities_menu_master_mobile.label_menu_description') }}">
                        </div>
                        <input type="hidden" class="form-control" id="menu_id" name="menu_id">
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="class_name">{{ __('utilities_menu_master_mobile.label_class_name') }}</label>
                            <input type="text" class="form-control" id="class_name" name="class_name"
                                placeholder="{{ __('utilities_menu_master_mobile.label_class_name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="container">
                            <div class="preview" id="imagePreview"></div>
                            <div class="form-group">
                                <label for="fileInput">{{ __('utilities_menu_master_mobile.label_icon') }}</label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="fileInput" name="fileInput" accept=".svg, .png" style="height: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('utilities_menu_master_mobile.btn_save') }}
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
                        <span class="title-text-notification">{{ __('utilities_menu_master_mobile.alert_success') }}</span>
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
        var existingBase64 = null;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        if (func == 'new') {
            $('#record_function').val("New");
            $('#menu_id').val("");
            $('#menu_desc').val("");
            $('#class_name').val("");
            existingBase64 = null; 
            $('#imagePreview').empty();
        } else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#menu_id').val(
                "{{ isset($data[0]->menuID) ? $data[0]->menuID : '' }}");
            $('#menu_desc').val(htmlDecode(
                "{{ isset($data[0]->menuDesc) ? $data[0]->menuDesc : '' }}"));
            $('#class_name').val(htmlDecode(
                "{{ isset($data[0]->className) ? $data[0]->className : '' }}"));   
            existingBase64 = "{{ isset($data[0]->icon) ? $data[0]->icon : '' }}"; 
            setExistingPreview(existingBase64);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#fileInput').on('change', function(event) {
            const file = event.target.files[0];
            const preview = $('#imagePreview');
            preview.empty();

            if (file) {
                const validTypes = ['image/svg+xml', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    alert('File harus berupa format SVG atau PNG.');
                    return;
                }

                const img = new Image();
                img.onload = function() {
                    if (img.width > 60 || img.height > 60) {
                        alert('Resolusi gambar tidak boleh lebih dari 60x60.');
                        return;
                    }
                    preview.append(img);
                }
                img.src = URL.createObjectURL(file);
            }
        });

        // Fungsi untuk menampilkan preview dari data base64 yang sudah ada
        function setExistingPreview(base64Data) {
            const preview = $('#imagePreview');
            preview.empty(); // Kosongkan preview sebelumnya

            const svg = document.createElement('div');
            svg.innerHTML = atob(base64Data); // Decode base64
            const svgElement = svg.querySelector('svg');
            if (svgElement) {
                svgElement.setAttribute('width', '40');
                svgElement.setAttribute('height', '40');
                svgElement.style.maxWidth = '100%'; // Pastikan SVG tidak melebihi lebar div
                svgElement.style.maxHeight = '100%'; // Pastikan SVG tidak melebihi tinggi div
                preview.append(svg);
            } else {
                const img = new Image();
                img.src = 'data:image/png;base64,' + base64Data;
                preview.append(img);
            }
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('utilities/menu_master_mobile') }}";
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#menu_master_mobile_form").submit();
        });

        if ($("#menu_master_mobile_form").length > 0) {
            $("#menu_master_mobile_form").validate({
                rules: {
                    menu_desc: {
                        required: true,
                    },
                    class_name: {
                        required: true,
                    }
                },
                messages: {
                    menu_desc: {
                        required: "{{ __('utilities_menu_master_mobile.menu_desc_required') }}",
                    },
                    class_name: {
                        required: "{{ __('utilities_menu_master_mobile.class_name_required') }}",
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

                    var myform = document.getElementById("menu_master_mobile_form");
                    var formdata = new FormData(myform);

                    $.ajax({
                        url: "{{ url('utilities/menu_master_mobile/proses') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled",
                                    false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_menu_master_mobile.btn_save") }}'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                            } else {
                                $("#btn-save").prop("disabled",
                                    false);
                                $("#btn-save").html(
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
                            $("#btn-save").prop("disabled",
                            false);
                            $("#btn-save").html(
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
