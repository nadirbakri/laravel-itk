<!DOCTYPE html>
<html>

<head>
    <title>{{ __('tm_time_recording_process_form.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-time_management {
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

        .required {
            color: red;
        }
    </style>
</head>

<body>
    <div class="div-time_management">
        <div class="div-title">
            <a href="{{ route('time_management', ['moduleID' => 'TM']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_time_recording_process_form.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <div class="row">
                <div class="col-6">
                    <form id="tm_time_recording_process_upload_form" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="process_date">{{ __('tm_time_recording_process_form.label_process_date') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="process_date" name="period"
                                            placeholder="{{ __('tm_time_recording_process_form.label_process_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="process_date">{{ __('tm_time_recording_process_form.label_file_location') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_location" name="file_location">
                                        <label class="custom-file-label" for="file_location">{{ __('tm_time_recording_process_form.label_select_file_location') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="automatic">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="automatic"
                                            name="automatic" value="true">
                                        <label class="form-check-label" 
                                            for="automatic">{{ __('tm_time_recording_process_form.label_automatic_in_out_code') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-process" name="btn-process-upload" id="btn-process-upload">
                                    <i class="fa fa-play-circle-o"></i> {{ __('tm_time_recording_process_form.btn_process_upload') }}
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-process" name="btn-download-template" id="btn-download-template">
                                    <i class="fa fa-download"></i> {{ __('tm_time_recording_process_form.btn_download_template') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <form id="tm_time_recording_process_delete_form">
                    @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="delete_date_from">{{ __('tm_time_recording_process_form.label_delete_date_from') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="delete_date_from" name="delete_date_from"
                                            placeholder="{{ __('tm_time_recording_process_form.label_delete_date_from') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="delete_date_to">{{ __('tm_time_recording_process_form.label_delete_date_to') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="delete_date_to" name="delete_date_to"
                                            placeholder="{{ __('tm_time_recording_process_form.label_delete_date_to') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="employee_no_from">{{ __('tm_time_recording_process_form.label_employee_no_from') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="employee_no_to">{{ __('tm_time_recording_process_form.label_employee_no_to') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-process" name="btn-process-delete" id="btn-process-delete">
                                    <i class="fa fa-play-circle-o"></i> {{ __('tm_time_recording_process_form.btn_process_delete') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <p><u>{{ __('tm_time_recording_process_form.label_text') }}</u></p>
                    <p>{{ __('tm_time_recording_process_form.label_text_detail') }}</p>
                    <p><u>{{ __('tm_time_recording_process_form.label_excel') }}</u></p>
                    <p>{{ __('tm_time_recording_process_form.note_column_a') }}</p>
                    <p>{{ __('tm_time_recording_process_form.note_column_b') }}</p>
                    <p>{{ __('tm_time_recording_process_form.note_column_c') }}</p>
                    <p>{{ __('tm_time_recording_process_form.note_column_d') }}</p>
                    <p>{{ __('tm_time_recording_process_form.note_column_e') }}</p>
                    <p>{{ __('tm_time_recording_process_form.note_column_f') }}</p>
                </div>
            </div>
        </div>
        <div class="div-form">
            
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
                        <span class="title-text-notification">{{ __('tm_time_recording_process_form.alert_success') }}</span>
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
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.js"></script>
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
    
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "d-M-Y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');

        $('#select').focus(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').click(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('#select').change(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        $('select').on('select2:close', function (e) {
            $('.header-select').remove();
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('input[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        function loadDataFirstLastAllEmployeeNo(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_no/func/api') }}",
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.employeeNo).text(
                    data.fullName);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $(field).select2({
                width: '100%',
                placeholder: 'Choose Employee',
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
                    url: "{{ url('/employee_no/api') }}",
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
                                    text: item.fullName,
                                    id: item.employeeNo,
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

        $("#btn-download-template").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                xhrFields: {
                    responseType: 'blob',
                },
                url: "{{ url('time_management/time_recording_process_form/download') }}",
                type: "POST",
                success: function (result, status, xhr) {
                    $("#btn-download-template").prop("disabled", false);
                    $("#btn-download-template").html(
                        '<i class="fa fa-download"></i> {{ __("tm_time_recording_process_form.btn_download_template") }}'
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
                        '<i class="fa fa-download"></i> {{ __("tm_time_recording_process_form.btn_download_template") }}'
                    );
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $("#btn-process-upload").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#tm_time_recording_process_upload_form").submit();
        });

        $("#btn-process-delete").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#tm_time_recording_process_delete_form").submit();
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('time_management/time_recording_process_form') }}";
        });

        if ($("#tm_time_recording_process_upload_form").length > 0) {
            $("#tm_time_recording_process_upload_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var myForm = document.getElementById('tm_time_recording_process_upload_form');
                    var formdata = new FormData(myForm);
                    
                    $.ajax({
                        url: "{{ url('time_management/time_recording_process_form/proses') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response[0].status == "true") {
                                $("#btn-process-upload").prop("disabled", false);
                                $("#btn-process-upload").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_process_form.btn_process_upload") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response[0]
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/time_recording_process_form') }}";
                                }, 3000);
                            } else {
                                $("#btn-process-upload").prop("disabled", false);
                                $("#btn-process-upload").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_process_form.btn_process_upload") }}'
                                );

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
                            $("#btn-process-upload").prop("disabled", false);
                            $("#btn-process-upload").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_process_form.btn_process_upload") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#tm_time_recording_process_delete_form").length > 0) {
            $("#tm_time_recording_process_delete_form").validate({
                rules: {
                    delete_date_from : {
                        required: true
                    },
                    delete_date_to: {
                        required: true
                    },
                    employee_no_from: {
                        required: true
                    },
                    employee_no_to: {
                        required: true
                    }
                },
                messages: {
                    delete_date_from: {
                        required: "{{ __('tm_time_recording_process_form.field_mandatory') }}",
                    },
                    delete_date_to: {
                        required: "{{ __('tm_time_recording_process_form.field_mandatory') }}",
                    },
                    employee_no_from: {
                        required: "{{ __('tm_time_recording_process_form.field_mandatory') }}",
                    },
                    employee_no_to: {
                        required: "{{ __('tm_time_recording_process_form.field_mandatory') }}",
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
                    $("#btn-process-delete").prop("disabled", false);
                    $("#btn-process-delete").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_process_form.btn_process_delete") }}'
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
                        url: "{{ url('time_management/time_recording_process_form/remove') }}",
                        type: "GET",
                        data: $('#tm_time_recording_process_delete_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-process-delete").prop("disabled", false);
                                $("#btn-process-delete").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_process_form.btn_process_delete") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/time_recording_process_form') }}";
                                }, 3000);
                            } else {
                                $("#btn-process-delete").prop("disabled", false);
                                $("#btn-process-delete").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_process_form.btn_process_delete") }}'
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
                            $("#btn-process-delete").prop("disabled", false);
                            $("#btn-process-delete").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_time_recording_process_form.btn_process_delete") }}'
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