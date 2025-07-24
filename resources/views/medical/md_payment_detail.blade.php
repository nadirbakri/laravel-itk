<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_payment.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/medical_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-medical {
            max-width: 100%;
            margin: auto;
            margin-top: 1%;
        }

        .div-profile {
            margin-top: 0;
        }

        .div-row-profile {
            margin: 0;
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

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
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

        .div-title-notification-warning {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 2%;
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

        .title-text-notification-warning {
            font-family: Inter;
            font-weight: 500;
            font-size: 2.5vw;
        }

        .required {
            color: red
        }
    </style>
</head>

<body>
    <div class="div-medical">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>{{ __('md_payment.btn_save') }}</span>
            </a>
        </div>
        <div class="div-form" style="padding-top: 30px">
            <form id="payment_form" method="post">
                @csrf
                <div class="div-medical">
                    <div class="div-title">
                        <a href="{{ route('medical', ['moduleID' => 'MD']) }}" target="iframe_dashboard">
                            <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                            <span class="title-text">{{ __('md_payment.list_detail') }}</span>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="master_code">{{ __('md_payment.label_master_code') }}</label>
                                <span class="required">*</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="master_code" name="master_code"
                                    placeholder="{{ __('md_payment.label_master_code') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="indonesian_value form-check-label">{{ __('md_payment.label_indonesian_value') }}</label>
                                <span class="required">*</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="indonesian_value" name="indonesian_value"
                                placeholder="{{ __('md_payment.label_indonesian_value') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="english_value form-check-label">{{ __('md_payment.label_english_value') }}</label>
                                <span class="required">*</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="english_value" name="english_value"
                                    placeholder="{{ __('md_payment.label_english_value') }}">
                            </div>
                        </div>
                    </div>
                    <hr style="margin-left: 2rem; margin-right: 2rem" />
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding: 0 30px;">
                        <h5>{{ __('md_payment.header_child_list') }}</h5>
                        <button type="button" class="btn btn-primary" name="btn-add-child" id="btn-add-child" style="width: 150px;" >
                            <i class="fa fa-plus"></i> {{ __('md_payment.btn_add_child') }}
                        </button>
                    </div>
                    <div class="row" id="child-container">
                        <div class="col-4 box-child" id="box-child" style="margin-bottom: 20px" data-index="0">
                            <div style="border-radius: 8px; border: 1px solid #D4D4D4; padding: 20px;">
                                <div style="display: flex; justify-content: space-between">
                                    <h6 class="child-title">{{ __('md_payment.header_child') }} 1</h6>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="claim_code_child_0">{{ __('md_payment.label_claim_code') }}</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="claim_code_child_0" name="claimForDetail[0][claimForCode]"
                                                placeholder="{{ __('md_payment.label_claim_code') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="indonesian_value_child_0">{{ __('md_payment.label_indonesian_value') }}</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="indonesian_value_child_0" name="claimForDetail[0][iD_Value]"
                                                placeholder="{{ __('md_payment.label_indonesian_value') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="english_value_child_0">{{ __('md_payment.label_english_value') }}</label>
                                            <span class="required">*</span>
                                            <input type="text" class="form-control" id="english_value_child_0" name="claimForDetail[0][eN_Value]"
                                                placeholder="{{ __('md_payment.label_english_value') }}">
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
                            <span class="title-text-notification">{{ __('md_payment.alert_success') }}</span>
                        </div>
                        <div class="div-title-notification">
                            <span id="message-notification-success"></span>
                        </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
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

        let childCounter = 1;

        function updateChildNumbers() {
            $(".box-child").each(function (index) {
                $(this).attr("data-index", index);
                $(this).find("input").each(function () {
                    let name = $(this).attr("name");
                    name = name.replace(/\[\d+\]/, `[${index}]`);
                    $(this).attr("name", name);
                });
                $(this).find(".child-title").text("Child " + (index + 1));
            });
            childCounter = $(".box-child").length;
        }

        $("#btn-add-child").click(function () {
            childCounter++;
            let newBox = `
                <div class="col-4 box-child" style="margin-bottom: 20px" data-index="${childCounter}">
                    <div style="border-radius: 8px; border: 1px solid #D4D4D4; padding: 20px;">
                        <div style="display: flex; justify-content: space-between">
                            <h6 class="child-title">{{ __('md_payment.header_child') }} ${childCounter}</h6>
                            <div class="remove-child" style="display: flex; justify-content: space-between; align-items: center; gap: 6px; color: #FE3440; cursor: pointer">
                                <i class="fa fa-trash"></i>
                                {{ __('md_payment.btn_delete') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="claim_code_child_${childCounter}">{{ __('md_payment.label_claim_code') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="claim_code_child_${childCounter}" name="claimForDetail[${childCounter}][claimForCode]"
                                        placeholder="{{ __('md_payment.label_claim_code') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="indonesian_value_child_${childCounter}">{{ __('md_payment.label_indonesian_value') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="indonesian_value_child_${childCounter}" name="claimForDetail[${childCounter}][iD_Value]"
                                        placeholder="{{ __('md_payment.label_indonesian_value') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="english_value_child_${childCounter}">{{ __('md_payment.label_english_value') }}</label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="english_value_child_${childCounter}" name="claimForDetail[${childCounter}][eN_Value]"
                                        placeholder="{{ __('md_payment.label_english_value') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `
            $("#child-container").append(newBox); 
            updateChildNumbers();

            addValidationRules(childCounter - 1)
        });

        $(document).on("click", ".remove-child", function () {
            $(this).closest(".col-4").remove();
            updateChildNumbers();

            if ($("#child-container").children().length === 0) {
                $("#child-container").append(createChild());
                updateChildNumbers();
            }
        });

        $("#toolbar-save").on('click', function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#payment_form").submit();
        });

        function addValidationRules(index) {
            $("#payment_form").validate().settings.rules[`claimForDetail[${index}][claimForCode]`] = { required: true };
            $("#payment_form").validate().settings.rules[`claimForDetail[${index}][iD_Value]`] = { required: true };
            $("#payment_form").validate().settings.rules[`claimForDetail[${index}][eN_Value]`] = { required: true };

            $("#payment_form").validate().settings.messages[`claimForDetail[${index}][claimForCode]`] = { required: "{{ __('md_payment.label_claim_code_required') }}" };
            $("#payment_form").validate().settings.messages[`claimForDetail[${index}][iD_Value]`] = { required: "{{ __('md_payment.label_indonesian_value_required') }}" };
            $("#payment_form").validate().settings.messages[`claimForDetail[${index}][eN_Value]`] = { required: "{{ __('md_payment.label_english_value_required') }}" };
        }

        if ($("#payment_form").length > 0) {
            $("#payment_form").validate({  
                rules: {
                    master_code: {
                        required: true,
                    },
                    indonesian_value: {
                        required: true,
                    },
                    english_value: {
                        required: true,
                    },
                    'claimForDetail[0][claimForCode]': {
                        required: true,
                    },
                    'claimForDetail[0][eN_Value]': {
                        required: true,
                    },
                    'claimForDetail[0][iD_Value]': {
                        required: true,
                    },
                },
                messages: {
                    master_code: {
                        required: "{{ __('md_payment.label_master_code_required') }}",
                    },
                    indonesian_value: {
                        required: "{{ __('md_payment.label_indonesian_value_required') }}",
                    },
                    english_value: {
                        required: "{{ __('md_payment.label_english_value_required') }}",
                    },
                    'claimForDetail[0][claimForCode]': {
                        required: "{{ __('md_payment.label_claim_code_required') }}",
                    },
                    'claimForDetail[0][eN_Value]': {
                        required: "{{ __('md_payment.label_english_value_required') }}",
                    },
                    'claimForDetail[0][iD_Value]': {
                        required: "{{ __('md_payment.label_indonesian_value_required') }}",
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
                    $("#toolbar-save").prop("disabled", false);
                    $("#toolbar-save").html(
                        '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                        '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                        '<span>Save</span>'
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
                        url: "{{ url('medical/payment/proses') }}",
                        type: "POST",
                        data: $('#payment_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
                                );                              
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/payment') }}";
                                }, 3000);
                            } else {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
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
                            $("#toolbar-save").prop("disabled", false);
                            $("#toolbar-save").html(
                                '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                '<span>Save</span>'
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