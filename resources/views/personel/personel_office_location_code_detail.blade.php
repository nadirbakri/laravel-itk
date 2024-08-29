<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_office_location_code.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
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
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_office_location_code.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="office_location_code_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">{{ __('personel_office_location_code.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('personel_office_location_code.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="office_location_code">{{ __('personel_office_location_code.label_office_location_code') }}</label>
                            <input type="text" class="form-control" id="office_location_code" name="office_location_code"
                                placeholder="{{ __('personel_office_location_code.label_office_location_code') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="office_location_desc">{{ __('personel_office_location_code.label_office_location_desc') }}</label>
                            <input type="text" class="form-control" id="office_location_desc" name="office_location_desc"
                                placeholder="{{ __('personel_office_location_code.label_office_location_desc') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="longitude">{{ __('personel_office_location_code.label_longitude') }}</label>
                            <input type="number" class="form-control" id="longitude" name="longitude"
                                placeholder="{{ __('personel_office_location_code.label_longitude') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="latitude">{{ __('personel_office_location_code.label_latitude') }}</label>
                            <input type="number" class="form-control" id="latitude" name="latitude"
                                placeholder="{{ __('personel_office_location_code.label_latitude') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="max_tolerance">{{ __('personel_office_location_code.label_max_tolerance') }}</label>
                            <input type="number" class="form-control" id="max_tolerance" name="max_tolerance"
                                placeholder="{{ __('personel_office_location_code.label_max_tolerance') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="check_lock">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_lock"
                                    name="check_lock" value="true">
                                <label
                                    for="check_lock">{{ __('personel_office_location_code.label_check_lock') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('personel_office_location_code.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('personnel/office_location') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('personel_office_location_code.btn_cancel') }}
                        </a>
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
                        <span class="title-text-notification">{{ __('personel_office_location_code.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURLTwo')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURLTwo', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURLTwo');

        sessionStorage.removeItem('previousURLTwo');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        var func = "{{ $func }}";

        if (func == 'new') {
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#office_location_code').val("");
            $('#office_location_desc').val("");
            $('#longitude').val("");
            $('#latitude').val("");
            $('#max_tolerance').val("");
            $('#check_lock').prop('checked', false);
            $('#office_location_code').prop('readonly', false);
        } else if (func == 'edit') {
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#record_function').val("Edit");
            $('#office_location_code').val("{{ isset($data[0]->officeCode) ? $data[0]->officeCode : '' }}");
            $('#office_location_desc').val(htmlDecode(
                "{{ isset($data[0]->officeDesc) ? $data[0]->officeDesc : '' }}"));
            $('#longitude').val("{{ isset($data[0]->longitude) ? $data[0]->longitude : '' }}");
            $('#latitude').val("{{ isset($data[0]->latitude) ? $data[0]->latitude : '' }}");
            $('#max_tolerance').val("{{ isset($data[0]->maxTolerance) ? $data[0]->maxTolerance : '' }}");
            var isLock = "{{ isset($data[0]->isLock) ? $data[0]->isLock : '' }}";
            if(isLock) {
                $('#check_lock').prop('checked', true);
            }else{
                $('#check_lock').prop('checked', false);
            }
            $('#office_location_code').prop('readonly', true);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('personnel/office_location') }}";
        })

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#office_location_code_form").submit();
        });

        if ($("#office_location_code_form").length > 0) {
            $("#office_location_code_form").validate({
                rules: {
                    office_location_code: {
                        required: true,
                    },
                    office_location_name: {
                        required: true,
                    },
                    longitude: {
                        required: true,
                    },
                    latitude: {
                        required: true,
                    },
                    max_tolerance: {
                        required: true,
                    },
                },
                messages: {
                    office_location_code: {
                        required: "{{ __('personel_office_location_code.office_location_code_required') }}",
                    },
                    office_location_name: {
                        required: "{{ __('personel_office_location_code.office_location_name_required') }}",
                    },
                    longitude: {
                        required: "{{ __('personel_office_location_code.longitude_required') }}",
                    },
                    latitude: {
                        required: "{{ __('personel_office_location_code.latitude_required') }}",
                    },
                    max_tolerance: {
                        required: "{{ __('personel_office_location_code.max_tolerance_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_office_location_code.btn_save") }}'
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
                        url: "{{ url('personnel/office_location/proses') }}",
                        type: "POST",
                        data: $('#office_location_code_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_office_location_code.btn_save") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/office_location') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_office_location_code.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_office_location_code.btn_save") }}'
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
