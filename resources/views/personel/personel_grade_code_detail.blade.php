<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_grade_code.judul') }}</title>
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
            <a href="javascript:void(0);" onclick="goBackWithModuleID('{{ url()->previous() }}')" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_grade_code.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="grade_code_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">{{ __('personel_grade_code.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('personel_grade_code.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="grade_code">{{ __('personel_grade_code.label_grade_code') }}</label>
                            <input type="text" class="form-control" id="grade_code" name="grade_code"
                                placeholder="{{ __('personel_grade_code.label_grade_code') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="grade_name">{{ __('personel_grade_code.label_grade_name') }}</label>
                            <input type="text" class="form-control" id="grade_name" name="grade_name"
                                placeholder="{{ __('personel_grade_code.label_grade_name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('personel_grade_code.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('personnel/grade') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('personel_grade_code.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('personel_grade_code.alert_success') }}</span>
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
            $('#grade_code').val("");
            $('#grade_name').val("");
            $('#grade_code').prop('readonly', false);
        } else if (func == 'edit') {
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#record_function').val("Edit");
            $('#grade_code').val("{{ isset($data[0]->gradeCode) ? $data[0]->gradeCode : '' }}");
            $('#grade_name').val(htmlDecode("{{ isset($data[0]->gradeName) ? $data[0]->gradeName : '' }}"));
            $('#grade_code').prop('readonly', true);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('personnel/grade') }}";
        })

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#grade_code_form").submit();
        });

        if ($("#grade_code_form").length > 0) {
            $("#grade_code_form").validate({
                rules: {
                    grade_code: {
                        required: true,
                    },
                    grade_name: {
                        required: true,
                    },
                },
                messages: {
                    grade_code: {
                        required: "{{ __('personel_grade_code.grade_code_required') }}",
                    },
                    grade_name: {
                        required: "{{ __('personel_grade_code.grade_name_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_grade_code.btn_save") }}'
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
                        url: "{{ url('personnel/grade/proses') }}",
                        type: "POST",
                        data: $('#grade_code_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_grade_code.btn_save") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/grade') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_grade_code.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_grade_code.btn_save") }}'
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
