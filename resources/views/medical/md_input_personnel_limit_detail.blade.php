<!DOCTYPE html>
<html>

<head>
    <title>{{ __('md_input_personnel_limit.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
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

        .required {
            color: red;
        }

    </style>
</head>

<body>
    <div class="div-medical">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID('{{ url()->previous() }}')" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('md_input_personnel_limit.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="input_personnel_limit_form" method="post">
                @csrf
                <div class="row" id="div-input-type">
                    <div class="col-2">
                        <div class="form-group">
                            <label
                                for="input_type">{{ __('md_input_personnel_limit.label_type') }}</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="input_type_one_employee"
                                    name="input_type" value="one" checked>
                                <label class="form-radio-label"
                                    for="input_type_one_employee">{{ __('md_input_personnel_limit.label_input_type_one_employee') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label
                                for="input_type">&nbsp;</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="input_type_all_employee"
                                    name="input_type" value="all"> 
                                <label class="form-radio-label"
                                    for="input_type_all_employee">{{ __('md_input_personnel_limit.label_input_type_all_employee') }}</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="record_function" name="record_function">
                </div>
                <div class="row" id="div-employee-no">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no">{{ __('md_input_personnel_limit.label_employee_no') }}</label>
                            <select class="form-control" id="employee_no" name="employee_no"
                                placeholder="{{ __('md_input_personnel_limit.label_employee_no') }}"> </select>
                        </div>
                        <input type="hidden" class="form-control" id="employee_no_det" name="employee_no_det">
                    </div>
                </div>
                <div class="row" id="div-process-date" style="display: none;">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="process_date">{{ __('md_input_personnel_limit.label_process_date') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="process_date" name="process_date"
                                    placeholder="{{ __('md_input_personnel_limit.label_process_date') }}">
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
                            <label for="claim_code">{{ __('md_input_personnel_limit.label_claim_code') }}</label>
                            <select class="form-control" id="claim_code" name="claim_code"
                                placeholder="{{ __('md_input_personnel_limit.label_claim_code') }}"> </select>
                        </div>
                        <input type="hidden" class="form-control" id="claim_code_det" name="claim_code_det">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="expired_date">{{ __('md_input_personnel_limit.label_expired_date') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="expired_date" name="expired_date"
                                    placeholder="{{ __('md_input_personnel_limit.label_expired_date') }}">
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
                            <label for="max_limit_per_claim">{{ __('md_input_personnel_limit.label_max_limit_per_claim') }}</label>
                            <input type="number" class="form-control" min="0" id="max_limit_per_claim" name="max_limit_per_claim"
                                placeholder="{{ __('md_input_personnel_limit.label_max_limit_per_claim') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="max_limit_per_year">{{ __('md_input_personnel_limit.label_max_limit_per_year') }}</label>
                            <input type="number" class="form-control" min="0" id="max_limit_per_year" name="max_limit_per_year"
                                placeholder="{{ __('md_input_personnel_limit.label_max_limit_per_year') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="max_limit_per_month">{{ __('md_input_personnel_limit.label_max_limit_per_month') }}</label>
                            <input type="number" class="form-control" min="0" id="max_limit_per_month" name="max_limit_per_month"
                                placeholder="{{ __('md_input_personnel_limit.label_max_limit_per_month') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('md_input_personnel_limit.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('medical/input_personnel_limit') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('md_input_personnel_limit.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('md_input_personnel_limit.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var func = "{{ $func }}";

        let pickerExpiredDate = $('#expired_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#expired_date").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerProcessDate = $('#process_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#process_date").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        if (func == 'new') {
            $('#div-input-type').show();
            $('#input_type_one_employee').prop('checked', true).trigger('change');
            $('#record_function').val("New");
            $('#employee_no').val(null).trigger('change');
            $('#claim_code').val(null).trigger('change');
            $('#employee_no_det').val("");
            $('#claim_code_det').val("");
            $('#max_limit_per_claim').val("0");
            $('#max_limit_per_year').val("0");
            $('#max_limit_per_month').val("0");
            $('#employee_no').attr("disabled", false); 
            $('#claim_code').attr("disabled", false); 
            pickerExpiredDate._input.removeAttribute('disabled');
        } else if (func == 'edit') {
            $('#div-input-type').hide();
            $('#input_type_one_employee').prop('checked', true).trigger('change');
            $('#record_function').val("Edit");
            pickerExpiredDate.setDate("{{ isset($data[0]->expiredDate) ? $data[0]->expiredDate : '' }}");
            $.ajax({
                type: 'GET',
                url: "{{ url('/employee_no/req_detail/api') }}",
                data: {
                    'employeeNo' : "{{ isset($data[0]->employeeNo) ? $data[0]->employeeNo : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2
                    .employeeNo).text(data2.fullName);
                $("#employee_no").append($newOption).trigger('change');
                $('#employee_no_det').val(data2.employeeNo);
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/claim_code/func/api') }}",
                data: {
                    'claimCode' : "{{ isset($data[0]->claimCode) ? $data[0]->claimCode : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .claimCode).text(data2[0].claimCode);
                $("#claim_code").append($newOption).trigger('change');
                $('#claim_code_det').val(data2[0].claimCode);
            });
            $('#max_limit_per_year').val("{{ isset($data[0]->maxLimitPerYear) ? $data[0]->maxLimitPerYear : '' }}");
            $('#max_limit_per_claim').val("{{ isset($data[0]->maxLimitPerClaim) ? $data[0]->maxLimitPerClaim : '' }}");
            $('#max_limit_per_month').val("{{ isset($data[0]->maxLimitPerMonth) ? $data[0]->maxLimitPerMonth : '' }}");
            $('#employee_no').attr("disabled", true); 
            $('#claim_code').attr("disabled", true); 
            pickerExpiredDate._input.setAttribute('disabled', 'disalbed');
        }

        $('input[name=input_type]').on("change", function (e) {
            var data = $(this).val();
            if(data == "one"){
                $('#div-employee-no').show();
                $('#div-process-date').hide();
            }else{
                $('#div-employee-no').hide();
                $('#div-process-date').show();
            }
        });

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('medical/input_personnel_limit') }}";
        });

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_no_det').val(data[0].id);
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_no_det').val('');
        });

        $('#claim_code').on("select2:select", function (e) {
            var data = $('#claim_code').select2('data');
            $('#claim_code_det').val(data[0].id);
        });

        $('#claim_code').on("select2:unselecting", function (e) {
            $('#claim_code_det').val('');
        });

        loadDataEmployeeNo();
        loadDataClaimCode();

        function loadDataEmployeeNo() {
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
            $('#employee_no').on('select2:open', function (e) {
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

            var $employeeNo = $('#employee_no').select2({
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

        function loadDataClaimCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.claimCode + '</div>' +
                        '<div class="col-6">' + data.data.claimName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#claim_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Claim Code</b></div>' +
                        '<div class="col-6"><b>Claim Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $claimCode = $('#claim_code').select2({
                width: '100%',
                placeholder: 'Choose Claim Code',
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
                    url: "{{ url('/claim_code/api') }}",
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
                                    text: item.claimCode,
                                    id: item.claimCode,
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
            $("#input_personnel_limit_form").submit();
        });

        if ($("#input_personnel_limit_form").length > 0) {
            $("#input_personnel_limit_form").validate({
                rules: {
                    employee_no: {
                        required: "#input_type_one_employee:checked",
                    },
                    claim_code: {
                        required: true,
                    },
                    expired_date: {
                        required: "#input_type_one_employee:checked",
                    },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('md_input_personnel_limit.employee_no_required') }}",
                    },
                    claim_code: {
                        required: "{{ __('md_input_personnel_limit.claim_code_required') }}",
                    },
                    expired_date: {
                        required: "{{ __('md_input_personnel_limit.expired_date_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("md_input_personnel_limit.btn_save") }}'
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
                        url: "{{ url('medical/input_personnel_limit/proses') }}",
                        type: "POST",
                        data: $('#input_personnel_limit_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_input_personnel_limit.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/input_personnel_limit') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_input_personnel_limit.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("md_input_personnel_limit.btn_save") }}'
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