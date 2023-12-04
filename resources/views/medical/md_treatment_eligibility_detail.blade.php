<!DOCTYPE html>
<html>

<head>
    <title>{{ __('md_treatment_eligibility.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
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
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('md_treatment_eligibility.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="treatment_eligibility_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="position">{{ __('md_treatment_eligibility.label_position') }}</label>
                            <select class="form-control" id="position" name="position"
                                placeholder="{{ __('md_treatment_eligibility.label_position') }}"> </select>
                        </div>
                        <input type="hidden" class="form-control" id="position_det" name="position_det">
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ranking">{{ __('md_treatment_eligibility.label_ranking') }}</label>
                            <select class="form-control" id="ranking" name="ranking"
                                placeholder="{{ __('md_treatment_eligibility.label_ranking') }}"> </select>
                        </div>
                        <input type="hidden" class="form-control" id="ranking_det" name="ranking_det">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="service_month">{{ __('md_treatment_eligibility.label_service_month') }}</label>
                            <input type="number" class="form-control" min="0" id="service_month" name="service_month"
                                placeholder="{{ __('md_treatment_eligibility.label_service_month') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="claim_code">{{ __('md_treatment_eligibility.label_claim_code') }}</label>
                            <select class="form-control" id="claim_code" name="claim_code"
                                placeholder="{{ __('md_treatment_eligibility.label_claim_code') }}"> </select>
                        </div>
                        <input type="hidden" class="form-control" id="claim_code_det" name="claim_code_det">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="eligibility">{{ __('md_treatment_eligibility.label_eligibility') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="minimum_age">{{ __('md_treatment_eligibility.label_minimum_age') }}</label>
                            <input type="number" class="form-control" min="0" id="minimum_age" name="minimum_age"
                                placeholder="{{ __('md_treatment_eligibility.label_minimum_age') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_for_employee">{{ __('md_treatment_eligibility.label_payment_for_employee') }}</label>
                            <input type="number" class="form-control" min="0" max="100" id="payment_for_employee" name="payment_for_employee"
                                placeholder="{{ __('md_treatment_eligibility.label_payment_for_employee') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payment_for_family">{{ __('md_treatment_eligibility.label_payment_for_family') }}</label>
                            <input type="number" class="form-control" min="0" max="100" id="payment_for_family" name="payment_for_family"
                                placeholder="{{ __('md_treatment_eligibility.label_payment_for_family') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('md_treatment_eligibility.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('medical/treatment_eligibility') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('md_treatment_eligibility.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('md_treatment_eligibility.alert_success') }}</span>
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
        var arrDataRef = @json($data_ref);

        if (func == 'new') {
            if(arrDataRef[0].eligibleBy == "P"){
                $('#position').attr("disabled", false);
                $('#ranking').attr("disabled", true);
            }else if(arrDataRef[0].eligibleBy == "R"){
                $('#position').attr("disabled", true);
                $('#ranking').attr("disabled", false);
            }else if(arrDataRef[0].eligibleBy == "B"){
                $('#position').attr("disabled", false);
                $('#ranking').attr("disabled", false);
            }else{
                $('#position').attr("disabled", true);
                $('#ranking').attr("disabled", true);
            }
            
            $('#record_function').val("New");
            $('#position').val(null).trigger('change');
            $('#ranking').val(null).trigger('change');
            $('#service_month').val("0");
            $('#claim_code').val(null).trigger('change');
            $('#position_det').val("");
            $('#ranking_det').val("");
            $('#claim_code_det').val("");
            $('#minimum_age').val("0");
            $('#payment_for_employee').val("0");
            $('#payment_for_family').val("0");
            $('#service_month').prop('readonly', false);
            $('#claim_code').attr("disabled", false);
        } else if (func == 'edit') {
            $('#record_function').val("Edit");
            $.ajax({
                type: 'GET',
                url: "{{ url('/position/detail/api') }}",
                data: {
                    'positionCode' : "{{ isset($data[0]->positionCode) ? $data[0]->positionCode : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .positionCode).text(data2[0].positionName);
                $("#position").append($newOption).trigger('change');
                $('#position_det').val(data2[0].positionCode);
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/ranking/detail/api') }}",
                data: {
                    'rankingCode' : "{{ isset($data[0]->rankingCode) ? $data[0]->rankingCode : '' }}"
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .rankingCode).text(data2[0].rankingName);
                $("#ranking").append($newOption).trigger('change');
                $('#ranking_det').val(data2[0].rankingCode);
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
            $('#service_month').val("{{ isset($data[0]->serviceMonth) ? $data[0]->serviceMonth : '' }}");
            $('#minimum_age').val("{{ isset($data[0]->minAge) ? $data[0]->minAge : '' }}");
            $('#payment_for_employee').val("{{ isset($data[0]->paymentPctForEmployee) ? $data[0]->paymentPctForEmployee : '' }}");
            $('#payment_for_family').val("{{ isset($data[0]->paymentPctForFamily) ? $data[0]->paymentPctForFamily : '' }}");
            $('#position').attr("disabled", true); 
            $('#ranking').attr("disabled", true);
            $('#service_month').prop('readonly', true);
            $('#claim_code').attr("disabled", true); 
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('medical/treatment_eligibility') }}";
        });

        $('#position').on("select2:select", function (e) {
            var data = $('#position').select2('data');
            $('#position_det').val(data[0].id);
        });

        $('#position').on("select2:unselecting", function (e) {
            $('#position_det').val('');
        });

        $('#ranking').on("select2:select", function (e) {
            var data = $('#ranking').select2('data');
            $('#ranking_det').val(data[0].id);
        });

        $('#ranking').on("select2:unselecting", function (e) {
            $('#ranking_det').val('');
        });

        $('#claim_code').on("select2:select", function (e) {
            var data = $('#claim_code').select2('data');
            $('#claim_code_det').val(data[0].id);
        });

        $('#claim_code').on("select2:unselecting", function (e) {
            $('#claim_code_det').val('');
        });

        loadDataPositionCode();
        loadDataRankingCode();
        loadDataClaimCode();

        function loadDataPositionCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.positionCode + '</div>' +
                        '<div class="col-6">' + data.data.positionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#position').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Position Code</b></div>' +
                        '<div class="col-6"><b>Position Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#position').select2({
                width: '100%',
                placeholder: 'Choose Position',
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
                    url: "{{ url('/position/api') }}",
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
                                    text: item.positionName,
                                    id: item.positionCode,
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

        function loadDataRankingCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Ranking Code</b></div>' +
                        '<div class="col-6"><b>Ranking Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.rankingCode + '</div>' +
                        '<div class="col-6">' + data.data.rankingName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#ranking').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Ranking Code</b></div>' +
                        '<div class="col-6"><b>Ranking Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#ranking').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
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
                    url: "{{ url('/ranking/api') }}",
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
                                    text: item.rankingName,
                                    id: item.rankingCode,
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
            $("#treatment_eligibility_form").submit();
        });

        if ($("#treatment_eligibility_form").length > 0) {
            $("#treatment_eligibility_form").validate({
                rules: {
                    service_month: {
                        required: true,
                    },
                    claim_code: {
                        required: true,
                    },
                },
                messages: {
                    service_month: {
                        required: "{{ __('md_treatment_eligibility.service_month_required') }}",
                    },
                    claim_code: {
                        required: "{{ __('md_treatment_eligibility.claim_code_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("md_treatment_eligibility.btn_save") }}'
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
                        url: "{{ url('medical/treatment_eligibility/proses') }}",
                        type: "POST",
                        data: $('#treatment_eligibility_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_treatment_eligibility.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/treatment_eligibility') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("md_treatment_eligibility.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("md_treatment_eligibility.btn_save") }}'
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