<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_import_master_data.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .loading {
            background-color: #ffffff;
            background-image: url("https://c.tenor.com/tEBoZu1ISJ8AAAAC/spinning-loading.gif");
            background-size: 60px 40px;
            background-position: right center;
            background-repeat: no-repeat;
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_import_master_data.list') }}</span>
            </a>
        </div>
    </div>
    <div class="div-form">
        <form id="import_master_data_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="maintenance_type">{{ __('personel_import_master_data.label_maintenance_type') }}</label>
                        <span class="required">*</span>
                        <select class="form-control select2" id="maintenance_type" name="maintenance_type">
                            <option value="">{{ __('personel_import_master_data.label_select_maintenance_type') }}</option>
                            <option value="level">{{ __('personel_import_master_data.select_level') }}</option>
                            <option value="cost_center">{{ __('personel_import_master_data.select_cost_center') }}</option>
                            <option value="location">{{ __('personel_import_master_data.select_location') }}</option>
                            <option value="position">{{ __('personel_import_master_data.select_position') }}</option>
                            <option value="ranking">{{ __('personel_import_master_data.select_ranking') }}</option>
                            <option value="grade">{{ __('personel_import_master_data.select_grade') }}</option>
                            <option value="group">{{ __('personel_import_master_data.select_group') }}</option>
                            <option value="nature_of_work">{{ __('personel_import_master_data.select_nature_of_work') }}</option>
                            <option value="institution">{{ __('personel_import_master_data.select_institution') }}</option>
                            <option value="major">{{ __('personel_import_master_data.select_major') }}</option>
                            <option value="city">{{ __('personel_import_master_data.select_city') }}</option>
                            <option value="zip_code">{{ __('personel_import_master_data.select_zip_code') }}</option>
                            <option value="account">{{ __('personel_import_master_data.select_account') }}</option>
                            <option value="journal_template">{{ __('personel_import_master_data.select_journal_template') }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="import_export">{{ __('personel_import_master_data.label_import_export') }}</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="import_export" id="import_export">
                            <label class="custom-file-label" for="import_export">Choose file</label>
                        </div>
                        <small id="import_export_help" class="text-muted">
                            {{ __('personel_import_master_data.help_import_export') }}
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-import" id="btn-import"
                        style="width: 100%;">
                        {{ __('personel_import_master_data.btn-import') }}
                    </button>
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" name="btn-download-template" id="btn-download-template"
                        style="width: 100%;">
                        {{ __('personel_import_master_data.btn-download-template') }}
                    </button>
                </div>
            </div>
        </form>
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
                        <span class="title-text-notification">{{ __('personel_import_master_data.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
        var urlData = null;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        function ConfirmDialog(message) {
            $('<div></div>').appendTo('body')
                .html('<div><h6>' + message + '?</h6></div>')
                .dialog({
                modal: true,
                title: 'Confirm Alert',
                zIndex: 10000,
                autoOpen: true,
                width: '30%',
                resizable: false,
                buttons: {
                    Yes: function() {
                        $(this).dialog("close");

                        $("#btn-import").prop("disabled", true);
                        $("#btn-import").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                        );

                        if ($('#import_master_data_form').valid()) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            var myform = document.getElementById("import_master_data_form");
                            var formdata = new FormData(myform);

                            $.ajax({
                                url: "{{ url('personnel/import_master_data/import') }}",
                                type: "POST",
                                processData: false,
                                contentType: false,
                                data: formdata,
                                dataType: "json",
                                success: function (response) {
                                    $("#btn-import").prop("disabled", false);
                                    $("#btn-import").html(
                                        '{{ __("personel_import_master_data.btn-import") }}'
                                    );

                                    if (response[0].status == "true") {
                                        $('#notification_success').modal('show');
                                        $('#message-notification-success').html(response[0]
                                            .message);
                                        setTimeout(function () {
                                            window.location =
                                                "{{ url('personnel/import_master_data') }}";
                                        }, 3000);
                                    } else {
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
                                    $("#btn-import").prop("disabled", false);
                                    $("#btn-import").html(
                                        '{{ __("personel_import_master_data.btn-import") }}'
                                    );

                                    $('#notification_error').modal('show');
                                    $('#message-notification-error').html(response);
                                }
                            });
                        }
                    },
                    No: function() {
                        $(this).dialog("close");
                    }
                },
                close: function(event, ui) {
                    $(this).remove();
                }
            });
        };

        $("#btn-import").on('click', function () {
            ConfirmDialog('Are you sure you want to import data to ' + $('#maintenance_type').find('option:selected').text() + ' Table');
        });

        $("#btn-download-template").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            if ($('#import_master_data_form').valid()) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var myform = document.getElementById("import_master_data_form");
                var formdata = new FormData(myform);

                $.ajax({
                    xhrFields: {
                        responseType: 'blob'
                    },
                    url: "{{ url('personnel/import_master_data/download_template') }}",
                    type: "POST",
                    processData: false,
                    contentType: false,
                    data: formdata,
                    success: function (result, status, xhr) {
                        $("#btn-download-template").prop("disabled", false);
                        $("#btn-download-template").html(
                            '{{ __("personel_import_export_personal_data.btn-download-template") }}'
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
                            '{{ __("personel_import_master_data.btn-download-template") }}'
                        );

                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        });

        $("#import_master_data_form").validate({
            rules: {
                maintenance_type: {
                    required: true,
                },
                import_export: {
                    extension: "xls|xlsx",
                },
            },
            messages: {
                maintenance_type: {
                    required: "{{ __('personel_import_master_data.maintenance_type_required') }}",
                },
                import_export: {
                    extension: "{{ __('personel_import_master_data.import_export_extension') }}",
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
                $("#btn-download-template").prop("disabled", false);
                $("#btn-download-template").html(
                    '{{ __("personel_import_master_data.btn-download-template") }}'
                );

                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            }
        });

        // if ($("#import_master_data_form").length > 0) {
        //     $("#import_master_data_form").validate({
        //         rules: {
        //             maintenance_type: {
        //                 required: true,
        //             },
        //             import_export: {
        //                 extension: "xls|xlsx",
        //             },
        //         },
        //         messages: {
        //             maintenance_type: {
        //                 required: "{{ __('personel_import_master_data.maintenance_type_required') }}",
        //             },
        //             import_export: {
        //                 extension: "{{ __('personel_import_master_data.import_export_extension') }}",
        //             },
        //         },
        //         highlight: function (element) {
        //             $(element).addClass('is-invalid');
        //         },
        //         unhighlight: function (element) {
        //             $(element).removeClass('is-invalid');
        //         },
        //         errorElement: 'span',
        //         errorPlacement: function (error, element) {
        //             $("#btn-download-template").prop("disabled", false);
        //             $("#btn-download-template").html(
        //                 '{{ __("personel_import_master_data.btn-download-template") }}'
        //             );

        //             $("#btn-import").prop("disabled", false);
        //             $("#btn-import").html(
        //                 '{{ __("personel_import_master_data.btn-import") }}'
        //             );

        //             error.addClass('invalid-feedback');
        //             element.closest('.form-group').append(error);
        //         },
        //         submitHandler: function (form) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });

        //             var myform = document.getElementById("import_master_data_form");
        //             var formdata = new FormData(myform);

        //             $.ajax({
        //                 dataType: 'json',
        //                 xhrFields: {
        //                     responseType: 'blob'
        //                 },
        //                 url: urlData,
        //                 type: "POST",
        //                 processData: false,
        //                 contentType: false,
        //                 data: formdata,
        //                 success: function (result, status, xhr) {
        //                     // console.log("Result : " + result);
        //                     // console.log("Status : " + status);
        //                     // console.log("Xhr : " + xhr);
        //                     console.log(result);
        //                     if (urlData == "{{ url('personnel/import_master_data/import') }}") {
        //                         $("#btn-import").prop("disabled", false);
        //                         $("#btn-import").html(
        //                             '{{ __("personel_import_master_data.btn-import") }}'
        //                         );

        //                         if (response[0].status == "true") {
        //                             $('#notification_success').modal('show');
        //                             $('#message-notification-success').html(response[0]
        //                                 .message);
        //                             setTimeout(function () {
        //                                 window.location =
        //                                     "{{ url('personnel/import_master_data') }}";
        //                             }, 3000);
        //                         } else {
        //                             $('#notification_error').modal('show');
        //                             if (response[0].message == null || response[0].message ==
        //                                 '') {
        //                                 $('#message-notification-error').html(
        //                                     "{{ __('login.error') }}");
        //                             } else {
        //                                 $('#message-notification-error').html(response[0]
        //                                     .message);
        //                             }
        //                         }
        //                     }else{
        //                         $("#btn-download-template").prop("disabled", false);
        //                         $("#btn-download-template").html(
        //                             '{{ __("personel_import_export_personal_data.btn-download-template") }}'
        //                         );

        //                         var disposition = xhr.getResponseHeader(
        //                             'content-disposition');
        //                         var matches = /"([^"]*)"/.exec(disposition);
        //                         var filename = (matches != null && matches[1] ? matches[1] :
        //                             'audit_trail.xlsx');
                            
        //                         // The actual download
        //                         var blob = new Blob([result], {
        //                             type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        //                         });

        //                         var link = document.createElement('a');
        //                         link.href = window.URL.createObjectURL(blob);
        //                         link.download = filename;

        //                         document.body.appendChild(link);

        //                         link.click();
        //                         document.body.removeChild(link);
        //                     }    
        //                 },
        //                 error: function (response) {
        //                     $("#btn-download-template").prop("disabled", false);
        //                     $("#btn-download-template").html(
        //                         '{{ __("personel_import_master_data.btn-download-template") }}'
        //                     );

        //                     $("#btn-import").prop("disabled", false);
        //                     $("#btn-import").html(
        //                         '{{ __("personel_import_master_data.btn-import") }}'
        //                     );
        //                     $('#notification_error').modal('show');
        //                     $('#message-notification-error').html(response);
        //                 },
        //                 beforeSend: function(xhr) {
        //                     xhr.setRequestHeader('Accept', 'application/json');
        //                 }
        //             });
        //         }
        //     })
        // }

        
    })
</script>

</html>