<!DOCTYPE html>
<html>

<head>
    <title>{{ __('md_claim_code.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/medical_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-medical {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
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
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
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

        .required {
            color: red;
        }

    </style>
</head>

<body>
    <div class="div-medical">
        <div class="div-title">
            <a href="{{ url('medical/claim_code') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('md_claim_code.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="claim_code_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="record_status">{{ __('md_claim_code.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('md_claim_code.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="claim_code">{{ __('md_claim_code.label_claim_code') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="claim_code" name="claim_code"
                                placeholder="{{ __('md_claim_code.label_claim_code') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="claim_name">{{ __('md_claim_code.label_claim_name') }}</label>
                            <input type="text" class="form-control" id="claim_name" name="claim_name"
                                placeholder="{{ __('md_claim_code.label_claim_name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="check_include_disease">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_include_disease"
                                    name="check_include_disease" value="true">
                                <label
                                    for="check_include_disease">{{ __('md_claim_code.label_include_disease') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="check_process_to_payroll">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_process_to_payroll"
                                    name="check_process_to_payroll" value="true">
                                <label
                                    for="check_process_to_payroll">{{ __('md_claim_code.label_process_to_payroll') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="check_must_have_family">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_must_have_family"
                                    name="check_must_have_family" value="true">
                                <label
                                    for="check_must_have_family">{{ __('md_claim_code.label_must_have_family') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="check_allow_claim_to_company">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_allow_claim_to_company"
                                    name="check_allow_claim_to_company" value="true">
                                <label
                                    for="check_allow_claim_to_company">{{ __('md_claim_code.label_allow_claim_to_company') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="check_allow_claim_to_insurance">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_allow_claim_to_insurance"
                                    name="check_allow_claim_to_insurance" value="true">
                                <label
                                    for="check_allow_claim_to_insurance">{{ __('md_claim_code.label_allow_claim_to_insurance') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="check_allow_claim_to_family">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_allow_claim_to_family"
                                    name="check_allow_claim_to_family" value="true">
                                <label
                                    for="check_allow_claim_to_family">{{ __('md_claim_code.label_allow_claim_to_family') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="limit_type">{{ __('md_claim_code.label_limit_type') }}</label>
                            <select class="form-control" id="limit_type" name="limit_type"
                                placeholder="{{ __('md_claim_code.label_limit_type') }}"> </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="payment">{{ __('md_claim_code.label_payment') }}</label>
                            <input type="number" class="form-control" id="payment" name="payment"
                                placeholder="{{ __('md_claim_code.label_payment') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('md_claim_code.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-primary" href="{{ url('medical/claim_code') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('md_claim_code.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('md_claim_code.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var func = "{{ $func }}";

        if (func == 'new') {
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#claim_code').val("");
            $('#claim_name').val("");
            $('#check_include_disease').prop('checked', false);
            $('#check_process_to_payroll').prop('checked', false);
            $('#check_must_have_family').prop('checked', false);
            $('#check_allow_claim_to_insurance').prop('checked', false);
            $('#check_allow_claim_to_family').prop('checked', false);
            $('#check_allow_claim_to_company').prop('checked', false);
            $('#limit_type').val(null).trigger('change');
            $('#payment').val("");
            $('#claim_code').prop('readonly', false);
        } else if (func == 'edit') {
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#record_function').val("Edit");
            $('#claim_code').val("{{ isset($data[0]->claimCode) ? $data[0]->claimCode : '' }}");
            $('#claim_name').val(htmlDecode("{{ isset($data[0]->claimName) ? $data[0]->claimName : '' }}"));
            var include_disease = "{{ isset($data[0]->flagDisease) ? $data[0]->flagDisease : '' }}";
            if(include_disease == 1) {
                $('#check_include_disease').prop('checked', true);
            }else{
                $('#check_include_disease').prop('checked', false);
            }
            var process_to_payroll = "{{ isset($data[0]->flagPayroll) ? $data[0]->flagPayroll : '' }}";
            if(process_to_payroll == 1) {
                $('#check_process_to_payroll').prop('checked', true);
            }else{
                $('#check_process_to_payroll').prop('checked', false);
            }
            var must_have_family = "{{ isset($data[0]->flagMustHaveFamily) ? $data[0]->flagMustHaveFamily : '' }}";
            if(must_have_family == 1) {
                $('#check_must_have_family').prop('checked', true);
            }else{
                $('#check_must_have_family').prop('checked', false);
            }
            var allow_claim_to_company = "{{ isset($data[0]->flagAllowClaimForCompany) ? $data[0]->flagAllowClaimForCompany : '' }}";
            if(allow_claim_to_company == 1) {
                $('#check_allow_claim_to_company').prop('checked', true);
            }else{
                $('#check_allow_claim_to_company').prop('checked', false);
            }
            var allow_claim_to_insurance = "{{ isset($data[0]->flagAllowClaimForInsurance) ? $data[0]->flagAllowClaimForInsurance : '' }}";
            if(allow_claim_to_insurance == 1) {
                $('#check_allow_claim_to_insurance').prop('checked', true);
            }else{
                $('#check_allow_claim_to_insurance').prop('checked', false);
            }
            var allow_claim_to_family = "{{ isset($data[0]->flagAllowClaimForFamily) ? $data[0]->flagAllowClaimForFamily : '' }}";
            if(allow_claim_to_family == 1) {
                $('#check_allow_claim_to_family').prop('checked', true);
            }else{
                $('#check_allow_claim_to_family').prop('checked', false);
            }
            $.ajax({
                type: 'GET',
                url: '/medical_limit_type/func/api',
                data: {
                    'limitType': "{{ isset($data[0]->paymentFromRemainingLimit) ? $data[0]->paymentFromRemainingLimit : '' }}"
                }
            }).then(function (data) {
                // var option = new Option(data.positionCode, data.positionCode, true, true);
                var option = $('<option/>', {
                    id: data[0].comGenCode,
                    title: data[0].value,
                    text: data[0].value
                });
                $("#limit_type").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                // $("#supervisor_position_code").val(data.positionCode).trigger("change");
                // $('#supervisor_position_code').select2('data', {id: data.positionCode, text: data.positionCode, data: data});
                $("#limit_type").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].comGenCode,
                        text: data[0].value,
                        data: data[0]
                    }
                });
            });
            $('#payment').val("{{ isset($data[0]->paymentFromRemainingLimit) ? $data[0]->paymentFromRemainingLimit : '' }}");
            $('#claim_code').prop('readonly', true);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('medical/claim_code') }}";
        });

        loadDataMedicalLimitType();

        function loadDataMedicalLimitType() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Type</b></div>' +

                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#limit_type').select2({
                width: '100%',
                placeholder: 'Choose Limit Type',
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
                    url: '/medical_limit_type/api',
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
                                    text: item.value,
                                    id: item.comGenCode,
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
            $("#claim_code_form").submit();
        });

        if ($("#claim_code_form").length > 0) {
            $("#claim_code_form").validate({
                rules: {
                    claim_code: {
                        required: true,
                    },
                    claim_name: {
                        required: true,
                    },
                },
                messages: {
                    claim_code: {
                        required: "{{ __('md_claim_code.claim_code_required') }}",
                    },
                    claim_name: {
                        required: "{{ __('md_claim_code.claim_name_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("md_claim_code.btn_save") }}'
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
                        url: "{{ url('medical/claim_code/proses') }}",
                        type: "POST",
                        data: $('#claim_code_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_claim_code.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/claim_code') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_claim_code.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("md_claim_code.btn_save") }}'
                            );

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }
                    });
                }
            })
        }
    })

</script>

</html>