<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_evaluation_report.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ route('personnel', ['moduleID' => 'PE']) }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_evaluation_report.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="evaluation_report_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no_from">{{ __('personel_evaluation_report.label_employee_no_from') }}</label>
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no_to">{{ __('personel_evaluation_report.label_employee_no_to') }}</label>
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period_from">{{ __('personel_evaluation_report.label_evaluation_period_from') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="period_from" name="period_from"
                                    placeholder="{{ __('personel_evaluation_report.label_evaluation_period_from') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period_to">{{ __('personel_evaluation_report.label_evaluation_period_to') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="period_to" name="period_to"
                                    placeholder="{{ __('personel_evaluation_report.label_evaluation_period_to') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ml-3">
                        <label for="include_resign">&nbsp;</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="include_resign"
                                name="include_resign" value="true">
                            <label class="form-check-label"
                                for="include_resign">{{ __('personel_evaluation_report.label_include_resign') }}</label>
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="group_authorize_from">{{ __('personel_evaluation_report.label_group_authorize_from') }}</label>
                            <select class="form-control select2" id="group_authorize_from"
                                name="group_authorize_from"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="group_authorize_to">{{ __('personel_evaluation_report.label_group_authorize_to') }}</label>
                            <select class="form-control select2" id="group_authorize_to"
                                name="group_authorize_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="position">{{ __('personel_evaluation_report.label_position') }}</label>
                            <select class="form-control select2 select2-hidden-accessible" id="position"
                                name="position[]" multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ranking">{{ __('personel_evaluation_report.label_ranking') }}</label>
                            <select class="form-control select2" id="ranking" name="ranking[]"
                                multiple="multiple"></select>
                        </div>
                    </div>
                </div>
                <div class="row" id="div-level">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="location">{{ __('personel_evaluation_report.label_location') }}</label>
                            <select class="form-control select2" id="location" name="location[]"
                                multiple="multiple"></select>
                        </div>
                        <input type="hidden" class="form-control" id="level_format" name="level_format">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-print-data" id="btn-print-data"
                            style="width: 100%;">
                            <i class="fa fa-print"></i> {{ __('personel_evaluation_report.btn_print') }}
                        </button>
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
            // plugins: [
            //     new monthSelectPlugin({
            //         shorthand: true, //defaults to false
            //         dateFormat: "Y-m-01", //defaults to "F Y"
            //         altFormat: "F Y", //defaults to "F Y"
            //     })
            // ],
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
        $.ajax({
            url: "{{ url('personnel/report/level/check') }}",
            type: "GET",
            success: function (response) {
                $('#level_format').val(response.data[0].levelFormat);
                for (var i = 1; i <= response.data[0].levelFormat; i++) {
                    $('#div-level').append(
                        '<div class="col-6">' +
                        '<div class="form-group">' +
                        '<label for="level' + i + '">' + response.data_level[i - 1]
                        .levelDescription + '</label>' +
                        '<select class="form-control select2" id="level' + i + '" name="level' +
                        i + '[]" multiple="multiple"></select>' +
                        '</div></div>'
                    );

                    loadDataLevelCode('#level' + i, i);
                    loadDataFirstLastAllLevel('#level' + i, i);
                }
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataGroupAuthorize('#group_authorize_from');
        loadDataGroupAuthorize('#group_authorize_to');
        loadDataPositionCode();
        loadDataLocationCode();
        loadDataRankingCode();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorize_to', 'Last');
        loadDataFirstLastAllPosition();
        loadDataFirstLastAllLocation();
        loadDataFirstLastAllRanking();

        // $('select').on('select2:opening select2:closing', function( event ) {
        //     var $searchfield = $( '#'+event.target.id ).parent().find('.select2-search__field');
        //     $searchfield.prop('disabled', true);
        // });

        // $('#employee_no_from').on('select2:open', function (e) {
        //     html = '<div class="row header-select">' +
        //     '<div class="col-6"><b>Employee No</b></div>' +
        //     '<div class="col-6"><b>Employee Name</b></div>' +
        //     '</div>';
        //     $('.select2-search--dropdown').append(html);
        // });

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

        function loadDataFirstLastAllGroupAuthorize(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/group_authorize/func/api') }}",
                data: {
                    'func': func,
                    'module': 'PE'
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.groupAuthorizeCode)
                    .text(data.groupAuthorizeDesc);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataFirstLastAllPosition() {
            $('#position').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: "{{ url('/position/func/api') }}",
            }).then(function (data) {
                if (!$('#position').find('option:contains(' + data.positionName + ')').length) {
                    $('#position').append($('<option>').val(data.positionCode).text(data.positionName));
                }
                $('#position').val(data.positionCode);
                $('#position').removeClass('loading');
            });
        }

        function loadDataFirstLastAllLocation() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/location/func/api') }}",
            }).then(function (data) {
                if (!$('#location').find('option:contains(' + data.locationName + ')').length) {
                    $('#location').append($('<option>').val(data.locationCode).text(data.locationName));
                }
                $('#location').val(data.locationCode);
            });
        }

        function loadDataFirstLastAllRanking() {
            $.ajax({
                type: 'GET',
                url: "{{ url('/ranking/func/api') }}",
            }).then(function (data) {
                if (!$('#ranking').find('option:contains(' + data.rankingName + ')').length) {
                    $('#ranking').append($('<option>').val(data.rankingCode).text(data.rankingName));
                }
                $('#ranking').val(data.rankingCode);
            });
        }

        function loadDataFirstLastAllLevel(field = '', levelType = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/level/func/api') }}",
                data: {
                    'levelType': levelType
                }
            }).then(function (data) {
                if (!$(field).find('option:contains(' + data.levelName + ')').length) {
                    $(field).append($('<option>').val(data.levelCode).text(data.levelName));
                }
                $(field).val(data.levelCode);
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

            // $(field).on('select2:open', function (e) {
            //     html = '<div class="row header-select">' +
            //         '<div class="col-6"><b>Employee No</b></div>' +
            //         '<div class="col-6"><b>Employee Name</b></div>' +
            //         '</div>';
            //     $('.select2-search--dropdown').append(html);
            // });

            // $(field).on('select2:close', function (event) {
            //     var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            //     $searchfield.prop('disabled', true);
            // });

            // var headerIsAppend = false;
            // $(field).on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Employee No</b></div>' +
            //             '<div class="col-6"><b>Full Name</b></div>' +
            //             '</div>';
            //         $('.select2-search--dropdown').append(html);
            //         headerIsAppend = true;
            //     }
            // });

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

        function loadDataGroupAuthorize(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.groupAuthorizeCode + '</div>' +
                        '<div class="col-6">' + data.data.groupAuthorizeDesc + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Group Authorize Code</b></div>' +
                        '<div class="col-6"><b>Group Authorize Desc</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Group Authorize',
                allowClear: true,
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
                    url: "{{ url('/group_authorize/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            module: 'PE',
                            isRange: false
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.groupAuthorizeDesc,
                                    id: item.groupAuthorizeCode,
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

            $('#position').select2({
                width: '100%',
                placeholder: 'Choose Position',
                allowClear: true,
                multiple: true,
                tags: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/position/all/api') }}",
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

        function loadDataLocationCode() {
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
            $('#location').on('select2:open', function (e) {
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

            $('#location').select2({
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
                    url: "{{ url('/location/all/api') }}",
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

            $('#ranking').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
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
                    url: "{{ url('/ranking/all/api') }}",
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

        function loadDataLevelCode(field = '', levelType = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.levelCode + '</div>' +
                        '<div class="col-6">' + data.data.levelName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Level Code</b></div>' +
                        '<div class="col-6"><b>Level Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Level',
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
                    url: "{{ url('/level/all/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            levelType: levelType
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.levelName,
                                    id: item.levelCode,
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

        $("#btn-print-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#evaluation_report_form").submit();
        });

        if ($("#evaluation_report_form").length > 0) {
            $("#evaluation_report_form").validate({
                rules: {
                    employee_no_from: {
                        required: true,
                    },
                    employee_no_to: {
                        required: true,
                    },
                    group_authorize_from: {
                        required: true,
                    },
                    group_authorize_to: {
                        required: true,
                    },
                },
                messages: {
                    employee_no_from: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    employee_no_to: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    group_authorize_from: {
                        required: "{{ __('personel_employee_list.field_required') }}",
                    },
                    group_authorize_to: {
                        required: "{{ __('personel_employee_list.field_required') }}",
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
                    $("#btn-print-data").prop("disabled", false);
                    $("#btn-print-data").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_employee_list.btn_print") }}'
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
                        xhrFields: {
                            responseType: 'blob',
                        },
                        url: "{{ url('personnel/evaluation_report/print') }}",
                        type: "POST",
                        data: $('#evaluation_report_form').serialize(),
                        success: function (result, status, xhr) {
                            $("#btn-print-data").prop("disabled", false);
                            $("#btn-print-data").html(
                                '<i class="fa fa-print"></i> {{ __("personel_evaluation_report.btn_print") }}'
                            );
                            
                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] :
                                'noname_file.xlsx');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'application/pdf'
                            });
                            var link = document.createElement('a');
                            const url = URL.createObjectURL(blob);
                            link.href = window.URL.createObjectURL(blob);
                            // link.href = window.open(url, "_blank");
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (response) {
                            $("#btn-print-data").prop("disabled", false);
                            $("#btn-print-data").html(
                                '<i class="fa fa-print"></i> {{ __("personel_evaluation_report.btn_print") }}'
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
