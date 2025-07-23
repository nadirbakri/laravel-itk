<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_import_update_personal_data.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
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

        .row .box {
            /* width: 300px; */
            border: 1px solid #004883;
            padding: 5px;
        }

        .overlay {
            background: #e9e9e9;  
            display: none;       
            position: fixed;   
            top: 0;                  
            right: 0;               
            bottom: 0;
            left: 0;
            opacity: 0.5;
        }

        .div-loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_import_update_personal_data.list') }}</span>
            </a>
        </div>
    </div>
    <div class="div-form">
        <form id="import_update_personal_data_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="import_type form-check-label">{{ __('personel_import_update_personal_data.label_import_type') }}</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-check">
                                <input type="radio" id="import_type_all" name="import_type" value="ALL" checked>
                                <label for="import_type_all">{{ __('personel_import_update_personal_data.label_all') }}</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-check">
                                <input type="radio" id="import_type_partial" name="import_type" value="PARTIAL">
                                <label for="import_type_partial">{{ __('personel_import_update_personal_data.label_partial') }}</label>
                            </div>
                        </div>
                    </div>
                    <div id="div-partial" style="display: none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_a">{{ __('personel_import_update_personal_data.label_column_a') }}</label>
                                    <input type="text" class="form-control" id="column_a" name="column_a"
                                        placeholder="{{ __('personel_import_update_personal_data.label_column_a') }}" value="Employee No" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_b">{{ __('personel_import_update_personal_data.label_column_b') }}</label>
                                    <input type="text" class="form-control" id="column_b" name="column_b"
                                        placeholder="{{ __('personel_import_update_personal_data.label_column_b') }}" value="Employee Name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_c">{{ __('personel_import_update_personal_data.label_column_c') }}</label>
                                    <select class="form-control select2" id="column_c" name="column_c"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_d">{{ __('personel_import_update_personal_data.label_column_d') }}</label>
                                    <select class="form-control select2 " id="column_d" name="column_d"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_e">{{ __('personel_import_update_personal_data.label_column_e') }}</label>
                                    <select class="form-control select2" id="column_e" name="column_e"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_f">{{ __('personel_import_update_personal_data.label_column_f') }}</label>
                                    <select class="form-control select2" id="column_f" name="column_f"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_g">{{ __('personel_import_update_personal_data.label_column_g') }}</label>
                                    <select class="form-control select2" id="column_g" name="column_g"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_h">{{ __('personel_import_update_personal_data.label_column_h') }}</label>
                                    <select class="form-control select2" id="column_h" name="column_h"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_i">{{ __('personel_import_update_personal_data.label_column_i') }}</label>
                                    <select class="form-control select2" id="column_i" name="column_i"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_j">{{ __('personel_import_update_personal_data.label_column_j') }}</label>
                                    <select class="form-control select2" id="column_j" name="column_j"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_k">{{ __('personel_import_update_personal_data.label_column_k') }}</label>
                                    <select class="form-control select2" id="column_k" name="column_k"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="column_l">{{ __('personel_import_update_personal_data.label_column_l') }}</label>
                                    <select class="form-control select2" id="column_l" name="column_l"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="import_update">{{ __('personel_import_update_personal_data.label_import') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="import_update" id="import_update">
                                    <label class="custom-file-label" for="import_export">Choose file</label>
                                </div>
                                <small id="import_update_help" class="text-muted">
                                    {{ __('personel_import_update_personal_data.help_import') }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="button" class="btn btn-primary" name="btn-import" id="btn-import"
                                style="width: 100%;">
                                {{ __('personel_import_update_personal_data.btn-import') }}
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary" name="btn-download-template" id="btn-download-template"
                                style="width: 100%;">
                                {{ __('personel_import_update_personal_data.btn-download-template') }}
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-danger" name="btn-reset" id="btn-reset" style="width: 100%;">
                                {{ __('personel_import_update_personal_data.btn_reset') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div id="div-partial-table" style="display: none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group box">
                                    <div class="form-check">
                                        <label for="transfer_to">{{ __('payroll_import_data_from_excel.label_transfer_to') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="transfer_to_pemaster" name="transfer_to" value="PeMaster" checked>
                                        <label for="transfer_to_pemaster">PeMaster</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="transfer_to_pemaster_info" name="transfer_to" value="PeMasterInfo">
                                        <label for="transfer_to_pemaster_info">PeMaster Info</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <span class="title-text-notification">{{ __('personel_import_update_personal_data.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay" id="notification_loading">
        <div class="div-loading">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
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
        var column = null;

        column = $('#transfer_to_pemaster').val();

        $('input[type="radio"]').on('change', function () {
            if ($('#transfer_to_pemaster').is(':checked')) {
                column = $('#transfer_to_pemaster').val();
                loadDataColumn(column);
            } else if ($('#transfer_to_pemaster_info').is(':checked')) {
                column = $('#transfer_to_pemaster_info').val();
                loadDataColumn(column);
            }
        });

        loadDataColumn(column);

        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        $('input[name=import_type]').on("change", function (e) {
            var data = $(this).val();
            if(data == "ALL"){
                $('#div-partial').hide();
                $('#div-partial-table').hide();
            }else{
                $('#div-partial').show();
                $('#div-partial-table').show();
            }
        });

        $('#btn-reset').on('click', function () {
            $('#column_c, #column_d, #column_e, #column_f, #column_g, #column_h, #column_i, #column_j, #column_k, #column_l').val(null).trigger('change');
            $('#import_update').val('');
            $('.custom-file-label').html('{{ __("personel_import_update_personal_data.label_select_import_file") }}');
        });

        function loadDataColumn(column = ''){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#column_c, #column_d, #column_e, #column_f, #column_g, #column_h, #column_i, #column_j, #column_k, #column_l').select2({
                width: '100%',
                placeholder: 'Choose Column',
                allowClear: true,
                // multiple: true,
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
                    url: "{{ url('/field/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            tableName : column
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item,
                                    id: item,
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

        $("#btn-import").on('click', function () {
            url = "{{ url('personnel/personal_data/import_update') }}";
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $('#notification_loading').show();

            $('#import_update_personal_data_form').submit();
        });

        $("#btn-download-template").on('click', function () {
            url = "{{ url('personnel/personal_data/template') }}";
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            var myform = document.getElementById("import_update_personal_data_form");
            data = new FormData(myform);

            $.ajax({
                xhrFields: {
                    responseType: 'blob',
                },
                url: url,
                type: "POST",
                processData: false,
                contentType: false,
                data: data,
                success: function (result, status, xhr) {
                    $("#btn-download-template").prop("disabled", false);
                    $("#btn-download-template").html(
                        '{{ __("payroll_import_data_from_excel.btn_download_template") }}'
                    );
                    var disposition = xhr.getResponseHeader(
                        'content-disposition');
                    var matches = /"([^"]*)"/.exec(disposition);
                    var filename = (matches != null && matches[1] ? matches[1] :
                        'noname_file.xlsx');

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
                        '{{ __("payroll_import_data_from_excel.btn_download_template") }}'
                    );
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        if ($("#import_update_personal_data_form").length > 0) {
            $("#import_update_personal_data_form").validate({
                rules: {
                    import_export: {
                        extension: "xls|xlsx|xml",
                    },
                },
                messages: {
                    import_export: {
                        extension: "{{ __('personel_import_update_personal_data.import_export_extension') }}",
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
                    $('#notification_loading').hide();
                    $("#btn-import").prop("disabled", false);
                    $("#btn-import").html(
                        '{{ __("personel_import_update_personal_data.btn-import") }}'
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

                    var myform = document.getElementById("import_update_personal_data_form");
                    var formdata = new FormData(myform);

                    $.ajax({
                        url: "{{ url('personnel/personal_data/import_update') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            // if (response.status == "true") {
                            if (response[0].status == "true") {
                                $("#btn-import").prop("disabled", false);
                                $("#btn-import").html(
                                    '{{ __("personel_import_update_personal_data.btn-import") }}'
                                );
                                $('#notification_loading').hide();
                                $('#notification_success').modal('show');
                                // $('#message-notification-success').html(response
                                //     .message);
                                $('#message-notification-success').html(response[0]
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/import_update_personal_data') }}";
                                }, 3000);
                            } else {
                                $("#btn-import").prop("disabled", false);
                                $("#btn-import").html(
                                    '{{ __("personel_import_update_personal_data.btn-import") }}'
                                );
                                $('#notification_loading').hide();
                                $('#notification_error').modal('show');
                                // if (response.message == null || response.message ==
                                //     '') {
                                if (response[0].message == null || response[0].message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    // $('#message-notification-error').html(response
                                    //     .message);
                                    $('#message-notification-error').html(response[0]
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $('#notification_loading').hide();
                            $("#btn-import").prop("disabled", false);
                            $("#btn-import").html(
                                '{{ __("personel_import_update_personal_data.btn-import") }}'
                            );
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }
    })
</script>

</html>