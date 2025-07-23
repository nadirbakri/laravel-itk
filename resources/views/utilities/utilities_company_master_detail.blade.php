<!DOCTYPE html>
<html>

<head>
    <title>{{ __('utilities_company_master.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
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
    <div class="div-utilities">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('utilities_company_master.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="company_master_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">{{ __('utilities_company_master.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('utilities_company_master.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="company_code">{{ __('utilities_company_master.label_company_code') }}</label>
                            <input type="text" class="form-control" id="company_code" name="company_code"
                                placeholder="{{ __('utilities_company_master.label_company_code') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="company_name">{{ __('utilities_company_master.label_company_name') }}</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="{{ __('utilities_company_master.label_company_name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="plafond">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_holding_company"
                                    name="check_holding_company" value="true">
                                <label
                                    for="check_holding_company">{{ __('utilities_company_master.label_check_holding_company') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="holding_company">{{ __('utilities_company_master.label_holding_company') }}</label>
                            <select class="form-control select2" id="holding_company"
                                name="holding_company"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="npwp_no">{{ __('utilities_company_master.label_npwp_no') }}</label>
                            <input type="text" class="form-control" id="npwp_no"
                                name="npwp_no"
                                placeholder="{{ __('utilities_company_master.label_npwp_no') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="location_code">{{ __('utilities_company_master.label_location_code') }}</label>
                            <select class="form-control select2" id="location_code"
                                name="location_code"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="address">{{ __('utilities_company_master.label_address') }}</label>
                            <textarea rows="3" class="form-control" id="address"
                                    name="address"
                                    placeholder="{{ __('utilities_company_master.label_address') }}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('utilities_company_master.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('utilities/company') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('utilities_company_master.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('utilities_company_master.alert_success') }}</span>
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
            $('#company_code').val("");
            $('#company_name').val("");
            $('#holding_company').val(null).trigger('change');
            $('#npwp_no').val("");
            $('#location_code').val(null).trigger('change');
            $('#address').val("");
            $('#company_code').prop('readonly', false);
        } else if (func == 'edit') {
            $('#record_status').val("{{ isset($data[0]->recordStatus) ? $data[0]->recordStatus : '' }}");
            $('#record_function').val("Edit");
            $('#company_code').val("{{ isset($data[0]->companyCode) ? $data[0]->companyCode : '' }}");
            $('#company_name').val(htmlDecode(
                "{{ isset($data[0]->companyName) ? $data[0]->companyName : '' }}"));
            $('#npwp_no').val(htmlDecode(
                "{{ isset($data[0]->npwpNo) ? $data[0]->npwpNo : '' }}"));
            $('#address').val(htmlDecode(
                "{{ isset($data[0]->address) ? $data[0]->address : '' }}"));
            $.ajax({
                type: 'GET',
                url: "{{ url('/holding_company/detail/api') }}",
                data: {
                    'companyCode': "{{ isset($data[0]->holdingCompany) ? $data[0]->holdingCompany : '' }}"
                }
            }).then(function (data) {
                // var option = new Option(data.positionCode, data.positionCode, true, true);
                var option = $('<option/>', {
                    id: data[0].companyCode,
                    title: data[0].companyName,
                    text: data[0].companyCode
                });
                $("#holding_company").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                // $("#supervisor_position_code").val(data.positionCode).trigger("change");
                // $('#supervisor_position_code').select2('data', {id: data.positionCode, text: data.positionCode, data: data});
                $("#holding_company").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].companyCode,
                        text: data[0].companyCode,
                        data: data[0]
                    }
                });
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('/location/detail/api') }}",
                data: {
                    'locationCode': "{{ isset($data[0]->locationCode) ? $data[0]->locationCode : '' }}"
                }
            }).then(function (data) {
                // var option = new Option(data.positionCode, data.positionCode, true, true);
                var option = $('<option/>', {
                    id: data[0].locationCode,
                    title: data[0].locationName,
                    text: data[0].locationName
                });
                $("#location_code").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                // $("#supervisor_position_code").val(data.positionCode).trigger("change");
                // $('#supervisor_position_code').select2('data', {id: data.positionCode, text: data.positionCode, data: data});
                $("#location_code").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].locationCode,
                        text: data[0].locationName,
                        data: data[0]
                    }
                });
            });
            $('#company_code').prop('readonly', true);
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        loadDataHoldingCompany();
        loadDataLocation();

        $('#check_holding_company').on('change', function () {
            if ($('#check_holding_company').is(':checked')) {
                $('#holding_company').prop('disabled', true);
            } else {
                $('#holding_company').prop('disabled', false);
            }
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('utilities/company') }}";
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function loadDataHoldingCompany() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.companyCode + '</div>' +
                        '<div class="col-6">' + data.data.companyName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#holding_company').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Company Code</b></div>' +
                        '<div class="col-6"><b>Company Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#holding_company').select2({
                width: '100%',
                placeholder: 'Choose Holding Company',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/holding_company/api') }}",
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
                                    text: item.companyCode,
                                    id: item.companyCode,
                                    title: item.companyName,
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

        function loadDataLocation() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.locationCode + '</div>' +
                        '<div class="col-6">' + data.data.locationName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#location_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Location Code</b></div>' +
                        '<div class="col-6"><b>Location Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#location_code').select2({
                width: '100%',
                placeholder: 'Choose Location',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/location/api') }}",
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
                                    text: item.locationName,
                                    id: item.locationCode,
                                    title: item.locationName,
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
            $("#company_master_form").submit();
        });

        if ($("#company_master_form").length > 0) {
            $("#company_master_form").validate({
                rules: {
                    company_code: {
                        required: true,
                    },
                    company_name: {
                        required: true,
                    },
                    holding_company: {
                        required: function(element) {
                            return !$('#check_holding_company').is(':checked');
                        }
                    },
                    location_code: {
                        required: true,
                    },
                },
                messages: {
                    company_code: {
                        required: "{{ __('utilities_company_master.company_code_required') }}",
                    },
                    company_name: {
                        required: "{{ __('utilities_company_master.company_name_required') }}",
                    },
                    holding_company: {
                        required: "{{ __('utilities_company_master.holding_company_required') }}",
                    },
                    location_code: {
                        required: "{{ __('utilities_company_master.location_code_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("utilities_company_master.btn_save") }}'
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
                        url: "{{ url('utilities/company/proses') }}",
                        type: "POST",
                        data: $('#company_master_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_company_master.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('utilities/company') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("utilities_company_master.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("utilities_company_master.btn_save") }}'
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
