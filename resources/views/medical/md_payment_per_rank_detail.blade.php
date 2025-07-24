<!DOCTYPE html>
<html>
<head>
    <title>{{ __('md_payment_per_rank.judul') }}</title>
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
                <span>{{ __('md_payment_per_rank.btn_save') }}</span>
            </a>
        </div>
        <div class="div-form" style="padding-top: 30px">
            <form id="payment_per_rank_form" method="post">
                @csrf
                <div class="div-medical">
                    <div class="div-title">
                        <a href="{{ route('medical', ['moduleID' => 'MD']) }}" target="iframe_dashboard">
                            <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                            <span class="title-text">{{ __('md_payment_per_rank.list_detail') }}</span>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="ranking_code">{{ __('md_payment_per_rank.label_ranking_code') }}</label>
                                <span class="required">*</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ranking_code" name="ranking_code"
                                    placeholder="{{ __('md_payment_per_rank.label_ranking_code') }}" disabled >
                                <input type="hidden" class="form-control" id="ranking_code_hidden" name="ranking_code_hidden">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="service_code form-check-label">{{ __('md_payment_per_rank.label_service_code') }}</label>
                                <span class="required">*</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <select class="form-control" id="service_code" name="service_code"
                                placeholder="{{ __('md_payment_per_rank.label_service_code') }}"> </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="btn btn-primary" name="btn-search" id="btn-search" value="preview" style="width: 100%;">
                                <img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('md_payment_per_rank.btn_search') }}
                            </button>
                        </div>
                    </div>
                    <hr style="margin-left: 2rem; margin-right: 2rem" />
                    <div class="row">
                        {{-- <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;"> --}}
                            <h5>{{ __('md_payment_per_rank.header_claim_for') }}</h5>
                            {{-- <select style="width: 158px;" class="form-control" id="service_child" name="service_child"
                                placeholder="{{ __('md_payment_per_rank.header_claim_for') }}"> </select> --}}
                        {{-- </div> --}}
                    </div>
                    <div class="row" id="child-container">
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
                            <span class="title-text-notification">{{ __('md_payment_per_rank.alert_success') }}</span>
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
        var arrData = @json($data);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        let childCounter = 1;
        let dataChild = []

        $('#ranking_code').val(arrData.rankCode);
        $('#ranking_code_hidden').val(arrData.rankCode);
        $("#btn-search").on('click', function (e) {
            e.preventDefault();

            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $(this).prop("disabled", true);

            const ranking_code = $("#ranking_code_hidden").val();
            const service_code = $("#service_code").val();

            $("#child-container").empty();

            if (!$("#payment_per_rank_form").valid()) {
                $(this).html(
                    '<img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('md_payment_per_rank.btn_search') }}'
                );
                $(this).prop("disabled", false);
                return;
            }

            $.ajax({
                type: 'GET',
                url: "{{ url('/medical_service_code/ranking/api') }}",
                data: { serviceCode: service_code }
            }).then(function (data) {
                dataChild = data;
                return $.ajax({
                    type: 'GET',
                    url: "{{ url('/medical/payment_per_rank/claim/detail_data') }}",
                    data: { rankCode: ranking_code, serviceCode: service_code }
                });
            }).then(function (data) {
                if (data?.claimForDetail?.length > 0) {
                    data.claimForDetail.forEach((detail) => {
                        const code = `${data.serviceCode}_${detail.claimForCode}`;
                        const code2 = `${data.serviceCode}_${detail.serviceCode}`;
                        
                        const matchedIndex = dataChild.findIndex(item => item.code === code || item.code === code2);

                        if (matchedIndex !== -1) {
                            dataChild[matchedIndex].claimDetails = detail; 
                        }
                    });
                }

                dataChild.forEach((item, index) => {
                    handleNewBox(item, index);
                    addValidationRules(index);
                });

                $("#btn-search").html(
                    '<img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('md_payment_per_rank.btn_search') }}'
                );
                $("#btn-search").prop("disabled", false);
            }).catch((error) => {
                alert("Terjadi kesalahan saat mengambil data.");
                $("#btn-search").html(
                    '<img src="{{ url('icons/mob/button/button-search.svg') }}" alt="export"> {{ __('md_payment_per_rank.btn_search') }}'
                );
                $("#btn-search").prop("disabled", false);
            });
        });

        function handleNewBox(item, index) {
            let newBox = ''
            if (item.claimDetails) {
                const detail = item.claimDetails;

                newBox = `
                    <div class="col-4 box-child" id="box-child-${index}" style="margin-bottom: 20px; height: 426px;" data-index="${index}">
                        <div style="border-radius: 8px; border: 1px solid #D4D4D4; padding: 20px;">
                            <div style="display: flex; justify-content: space-between">
                                <h6 class="child-title">${item.value}</h6>
                                <div class="reset" style="display: flex; justify-content: flex-end; align-items: center; gap: 6px; color: #FE3440; cursor: pointer">
                                    <i class="fa fa-trash"></i> Remove
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="claim_code_child_${index}">Claim Code</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="claim_code_child_${index}" name="claimForDetail[${index}][claimForCode]" placeholder="Enter Claim Code" value="${detail.claimForCode}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="cut_off_year_${index}">Cut Off Year</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="cut_off_year_${index}" name="claimForDetail[${index}][cutOffYear]" placeholder="Enter Cut Off Year" value="${detail.cutOffYear}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="age_minimum_${index}">Age Minimum</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="age_minimum_${index}" name="claimForDetail[${index}][ageMinimum]" placeholder="Enter Age Minimum" value="${detail.ageMinimum}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="max_payment_${index}">Max Payment</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="max_payment_${index}" name="claimForDetail[${index}][maxPayment]" placeholder="Enter Max Payment" value="${detail.maxPayment}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="minimum_month_of_service_${index}">Minimum Month of Service</label>
                                        <span class="required">*</span>
                                        <input type="text" class="form-control" id="minimum_month_of_service_${index}" name="claimForDetail[${index}][minServiceMonth]" placeholder="Enter Minimum Month of Service" value="${detail.minServiceMonth}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
            else {
                newBox = `
                    <div class="col-4 box-child" id="box-child-${index}" style="margin-bottom: 20px; height: 426px;" data-index="${index}">
                        <div style="border-radius: 8px; border: 1px solid #D4D4D4; padding: 20px; cursor: pointer;">
                            <h6 class="child-title" style="padding-bottom: 16px">${item.value}</h6>
                            <div style="display: flex; flex-direction: column; gap: 20px; border-radius: 10px; border: 1px dashed #76AFE3; height: 353px; align-items: center; justify-content: center; color: #007BFF">
                                <div style="border-radius: 100px; background-color: #F5F9FF: padding: 12px;">
                                    <i class="fa fa-plus"></i>
                                </div>                            
                                <h6>Add Detail Data</h6>
                            </div>
                        </div>
                    </div>
                `
            }

            $("#child-container").append(newBox);
        }

        $(document).on("click", ".box-child", function (e) {
            e.stopPropagation();

            let index = $(this).data("index");
            let itemValue = $(this).find(".child-title").text();

            if ($(this).find("input").length > 0) return;

            let newContent = `
                <div style="border-radius: 8px; border: 1px solid #D4D4D4; padding: 20px;">
                    <div style="display: flex; justify-content: space-between">
                        <h6 class="child-title">${itemValue}</h6>
                        <div class="reset" style="display: flex; align-items: center; gap: 6px; color: #FE3440; cursor: pointer">
                            <i class="fa fa-trash"></i> Remove
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="claim_code_child_${index}">Claim Code</label>
                                <span class="required">*</span>
                                <input type="text" class="form-control" id="claim_code_child_${index}" name="claimForDetail[${index}][claimForCode]" placeholder="Enter Claim Code">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cut_off_year_${index}">Cut Off Year</label>
                                <span class="required">*</span>
                                <input type="text" class="form-control" id="cut_off_year_${index}" name="claimForDetail[${index}][cutOffYear]" placeholder="Enter Cut Off Year">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="age_minimum_${index}">Age Minimum</label>
                                <span class="required">*</span>
                                <input type="text" class="form-control" id="age_minimum_${index}" name="claimForDetail[${index}][ageMinimum]" placeholder="Enter Age Minimum">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="max_payment_${index}">Max Payment</label>
                                <span class="required">*</span>
                                <input type="text" class="form-control" id="max_payment_${index}" name="claimForDetail[${index}][maxPayment]" placeholder="Enter Max Payment">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="minimum_month_of_service_${index}">Minimum Month of Service</label>
                                <span class="required">*</span>
                                <input type="text" class="form-control" id="minimum_month_of_service_${index}" name="claimForDetail[${index}][minServiceMonth]" placeholder="Enter Minimum Month of Service">
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $(this).empty().append(newContent);
        });

        $(document).on("click", ".reset", function (e) {
            e.stopPropagation();
            let parentBox = $(this).closest(".box-child");
            
            let index = parentBox.data("index");
            let itemValue = parentBox.find(".child-title").text();

            let originalBox = `
                <div class="box-content" style="border-radius: 8px; border: 1px solid #D4D4D4; padding: 20px; cursor: pointer;">
                    <h6 class="child-title" style="padding-bottom: 16px">${itemValue}</h6>
                    <div style="display: flex; flex-direction: column; gap: 20px; border-radius: 10px; border: 1px dashed #76AFE3; height: 353px; align-items: center; justify-content: center; color: #007BFF">
                        <div style="border-radius: 100px; background-color: #F5F9FF; padding: 12px; width: 20px; height: 20px;">
                            <i class="fa fa-plus"></i>
                        </div>                            
                        <h6>Add Detail Data</h6>
                    </div>
                </div>
            `;

            parentBox.html(originalBox);
        });

        loadDataServiceCode();
        function loadDataServiceCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.code + '</div>' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#service_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Code</b></div>' +
                        '<div class="col-6"><b>Value</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#service_code').select2({
                width: '100%',
                placeholder: 'Choose Service Code',
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
                    url: "{{ url('/medical_service_code/api') }}",
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
                                    id: item.code,
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

        $("#toolbar-save").on('click', function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#payment_per_rank_form").submit();
        });

        function addValidationRules(index) {
            $("#payment_per_rank_form").validate().settings.rules[`claimForDetail[${index}][claimForCode]`] = { required: true };
            $("#payment_per_rank_form").validate().settings.rules[`claimForDetail[${index}][cutOffYear]`] = { required: true };
            $("#payment_per_rank_form").validate().settings.rules[`claimForDetail[${index}][ageMinimum]`] = { required: true };
            $("#payment_per_rank_form").validate().settings.rules[`claimForDetail[${index}][maxPayment]`] = { required: true };
            $("#payment_per_rank_form").validate().settings.rules[`claimForDetail[${index}][minServiceMonth]`] = { required: true };

            $("#payment_per_rank_form").validate().settings.messages[`claimForDetail[${index}][claimForCode]`] = { required: "{{ __('md_payment_per_rank.label_claim_code_required') }}" };
            $("#payment_per_rank_form").validate().settings.messages[`claimForDetail[${index}][cutOffYear]`] = { required: "{{ __('md_payment_per_rank.label_cut_off_year_required') }}" };
            $("#payment_per_rank_form").validate().settings.messages[`claimForDetail[${index}][ageMinimum]`] = { required: "{{ __('md_payment_per_rank.label_age_minimum_required') }}" };
            $("#payment_per_rank_form").validate().settings.messages[`claimForDetail[${index}][maxPayment]`] = { required: "{{ __('md_payment_per_rank.label_max_payment_required') }}" };
            $("#payment_per_rank_form").validate().settings.messages[`claimForDetail[${index}][minServiceMonth]`] = { required: "{{ __('md_payment_per_rank.label_minimum_month_of_service_required') }}" };
        }

        if ($("#payment_per_rank_form").length > 0) {
            $("#payment_per_rank_form").validate({
                rules: {
                    service_code: {
                        required: true,
                    },
                },
                messages: {
                    service_code: {
                        required: "{{ __('md_payment_per_rank.label_service_code_required') }}",
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
                        url: "{{ url('medical/payment_per_rank/proses') }}",
                        type: "POST",
                        data: $('#payment_per_rank_form').serialize(),
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
                                        "{{ url('medical/payment_per_rank') }}";
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