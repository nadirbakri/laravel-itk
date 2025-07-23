<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_plafon_medical.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
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

        .required {
            color: red;
        }

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_plafon_medical.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="plafon_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="year">{{ __('personel_plafon_medical.label_year') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="year" name="year"></select>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type">{{ __('personel_plafon_medical.label_type') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="type" name="type"
                                placeholder="{{ __('personel_plafon_medical.label_type') }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="code">{{ __('personel_plafon_medical.label_code') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="code" name="code" placeholder="{{ __('tm_shift_master_code.label_code') }}"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">{{ __('personel_plafon_medical.label_status') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="status" name="status"
                                placeholder="{{ __('personel_plafon_medical.label_status') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nominal">{{ __('personel_plafon_medical.label_nominal') }}</label>
                            <span class="required">*</span>
                            <input type="number" class="form-control" id="nominal" name="nominal"
                                placeholder="{{ __('personel_plafon_medical.label_nominal') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ranking_code">{{ __('personel_plafon_medical.label_ranking_code') }}</label>
                            <span class="required">*</span>
                            <select class="form-control select2" id="ranking_code" name="ranking_code"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('personel_plafon_medical.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('personnel/plafon_medical') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('personel_plafon_medical.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('personel_plafon_medical.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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

    var prevYear = moment(moment().subtract(10, 'years')).format('YYYY');
    var nextYear = moment(moment().add(10, 'years')).format('YYYY');
    var defaultYear = moment().format('YYYY');

    for (var i = prevYear; i <= nextYear; i++){
        var option = $("<option/>", {
            value: i,
            text: i
        });
        $('#year').append(option);
        $('#year').val(defaultYear);
    }
    
    $(document).ready(function () {
        var func = "{{ $func }}";
        var arrData = @json($data);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#code').select2();

        if (func == 'new') {
            $('#record_function').val("New");
            $('#type').val('Medical');
            $('#code').val(null).trigger('change');
            $('#status').val("");
            $('#nominal').val("");
            $('#ranking_code').val(null).trigger('change');
        } else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#year').val(arrData[0].plafonYear).trigger('change');
            $('#type').val(arrData[0].category);
            $('#code').val(arrData[0].plafonCode).trigger('change');
            $('#status').val(arrData[0].status);
            $('#nominal').val(arrData[0].plafonAmount);
            $('#ranking_code').val(arrData[0].rankCode).trigger('change');

            $.ajax({
                type: 'GET',
                url: "{{ url('/plafon_medical/func/api') }}",
                data: {
                    code: arrData[0].plafonCode
                }
            }).then(function (data) {
                var option = new Option(data[0].value, data[0].code, true, true);
                $('#code').append(option).trigger('change');

                $('#code').trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].code,
                        text: data[0].value,
                        data: data[0]
                    }
                });
            });

            $.ajax({
                type: 'GET',
                url: "{{ url('ranking/detail/api') }}",
                data: {
                    rankingCode: arrData[0].rankCode
                }
            }).then(function (data) {
                var option = new Option(data[0].rankingName, data[0].rankingCode, true, true);
                $('#ranking_code').append(option).trigger('change');

                $('#ranking_code').trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].rankingCode,
                        text: data[0].rankingName,
                        data: data[0]
                    }
                });
            });
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        loadDataPlafonCode();
        loadDataRankingCode();

        function loadDataPlafonCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#code').select2({
                width: '100%',
                placeholder: 'Choose Plafon Code',
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
                    url: "{{ url('/plafon_medical/api') }}",
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

        function loadDataRankingCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.rankingCode + '</div>' +
                        '<div class="col-6">' + data.data.rankingName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#ranking_code').on('select2:open', function (e) {
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

            $('#ranking_code').select2({
                width: '100%',
                placeholder: 'Choose Ranking Code',
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

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('personnel/plafon_medical') }}";
        })

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#plafon_form").submit();
        });

        if ($("#plafon_form").length > 0) {
            $("#plafon_form").validate({
                rules: {
                    year: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },
                    code: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    nominal: {
                        required: true,
                    },
                    ranking_code: {
                        required: true,
                    },
                },
                messages: {
                    year: {
                        required: "{{ __('personel_plafon_medical.year_required') }}",
                    },
                    type: {
                        required: "{{ __('personel_plafon_medical.type_required') }}",
                    },
                    code: {
                        required: "{{ __('personel_plafon_medical.code_required') }}",
                    },
                    status: {
                        required: "{{ __('personel_plafon_medical.status_required') }}",
                    },
                    nominal: {
                        required: "{{ __('personel_plafon_medical.nominal_required') }}",
                    },
                    ranking_code: {
                        required: "{{ __('personel_plafon_medical.ranking_code_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_plafon_medical.btn_save") }}'
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
                        url: "{{ url('personnel/plafon_medical/proses') }}",
                        type: "POST",
                        data: $('#plafon_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_plafon_medical.btn_save") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/plafon_medical') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_plafon_medical.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_plafon_medical.btn_save") }}'
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
