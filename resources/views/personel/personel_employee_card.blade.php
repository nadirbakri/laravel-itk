<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_employee_card.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/jquery.multiselect.css') }}">
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
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .select2-results__option[aria-selected=true] {
            display: none;
        }

        .row-employee-card {
            line-height: 0.8;
        }

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="{{ url('personel') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_employee_card.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="employee_card_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="employee_no_from">{{ __('personel_employee_card.label_employee_no_from') }}</label>
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_no_to">{{ __('personel_employee_card.label_employee_no_to') }}</label>
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="include_resign">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="include_resign"
                                    name="include_resign" value="true">
                                <label class="form-check-label"
                                    for="include_resign">{{ __('personel_employee_card.label_include_resign') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="position">{{ __('personel_employee_card.label_position') }}</label>
                            <select class="form-control select2 select2-hidden-accessible" id="position"
                                name="position[]" multiple="multiple">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ranking">{{ __('personel_employee_card.label_ranking') }}</label>
                            <select class="form-control select2" id="ranking" name="ranking[]"
                                multiple="multiple"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="location">{{ __('personel_employee_card.label_location') }}</label>
                            <select class="form-control select2" id="location" name="location[]"
                                multiple="multiple"></select>
                        </div>
                        <input type="hidden" class="form-control" id="level_format" name="level_format">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="include_list">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="include_list"
                                    name="include_list" value="true">
                                <label class="form-check-label"
                                    for="include_list">{{ __('personel_employee_card.label_include_list') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="family">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="family"
                                            name="family" value="true" disabled>
                                        <label class="form-check-label"
                                            for="family">{{ __('personel_employee_card.label_family') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="training_records">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="training_records"
                                            name="training_records" value="true" disabled>
                                        <label class="form-check-label"
                                            for="training_records">{{ __('personel_employee_card.label_training_records') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="formal_education">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="formal_education"
                                            name="formal_education" value="true" disabled>
                                        <label class="form-check-label"
                                            for="formal_education">{{ __('personel_employee_card.label_formal_education') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="historical_jobs">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="historical_jobs"
                                            name="historical_jobs" value="true" disabled>
                                        <label class="form-check-label"
                                            for="historical_jobs">{{ __('personel_employee_card.label_historical_jobs') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="language">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="language"
                                            name="language" value="true" disabled>
                                        <label class="form-check-label"
                                            for="language">{{ __('personel_employee_card.label_language') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_experience">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="work_experience"
                                            name="work_experience" value="true" disabled>
                                        <label class="form-check-label"
                                            for="work_experience">{{ __('personel_employee_card.label_work_experience') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="organization">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="organization"
                                            name="organization" value="true" disabled>
                                        <label class="form-check-label"
                                            for="organization">{{ __('personel_employee_card.label_organization') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="award">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="award"
                                            name="award" value="true" disabled>
                                        <label class="form-check-label"
                                            for="award">{{ __('personel_employee_card.label_award') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="project_experience">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="project_experience"
                                            name="project_experience" value="true" disabled>
                                        <label class="form-check-label"
                                            for="project_experience">{{ __('personel_employee_card.label_project_experience') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sanction">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sanction"
                                            name="sanction" value="true" disabled>
                                        <label class="form-check-label"
                                            for="sanction">{{ __('personel_employee_card.label_sanction') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-print-data" id="btn-print-data"
                            style="width: 100%;">
                            <i class="fa fa-print"></i> {{ __('personel_employee_card.btn_print') }}
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.multiselect.js') }}"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {
        
        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataPositionCode();
        loadDataLocationCode();
        loadDataRankingCode();
        loadDataIncludeList();

        loadDataFirstLastAllEmployeeNo('#employee_no_from', 'First');
        loadDataFirstLastAllEmployeeNo('#employee_no_to', 'Last');
        loadDataFirstLastAllPosition();
        loadDataFirstLastAllLocation();
        loadDataFirstLastAllRanking();

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
                url: '/employee_no/func/api',
                data: {
                    'func': func
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.employeeNo).text(
                    data.fullName);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataFirstLastAllPosition() {
            $('#position').addClass('spinner-border');

            $.ajax({
                type: 'GET',
                url: '/position/func/api',
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
                url: '/location/func/api',
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
                url: '/ranking/func/api',
            }).then(function (data) {
                if (!$('#ranking').find('option:contains(' + data.rankingName + ')').length) {
                    $('#ranking').append($('<option>').val(data.rankingCode).text(data.rankingName));
                }
                $('#ranking').val(data.rankingCode);
            });
        }

        function loadDataEmployeeNo(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Full Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.employeeNo + '</div>' +
                        '<div class="col-6">' + data.data.fullName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

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
                    url: '/employee_no/api',
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

        function loadDataPositionCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Position Code</b></div>' +
                        '<div class="col-6"><b>Position Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.positionCode + '</div>' +
                        '<div class="col-6">' + data.data.positionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // var headerIsAppend = false;
            // $('#position').on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Position Code</b></div>' +
            //             '<div class="col-6"><b>Position Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

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
                    url: '/position/all/api',
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
                        '<div class="col-6"><b>Location Code</b></div>' +
                        '<div class="col-6"><b>Location Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.locationCode + '</div>' +
                        '<div class="col-6">' + data.data.locationName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            // var headerIsAppend = false;
            // $('#location').on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Location Code</b></div>' +
            //             '<div class="col-6"><b>Location Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

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
                    url: '/location/all/api',
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

            // var headerIsAppend = false;
            // $('#ranking').on('select2:open', function (e) {
            //     if (!headerIsAppend) {
            //         html = '<div class="row">' +
            //             '<div class="col-6"><b>Ranking Code</b></div>' +
            //             '<div class="col-6"><b>Ranking Name</b></div>' +
            //             '</div>';
            //         $('.select2-search').append(html);
            //         headerIsAppend = true;
            //     }
            // });

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
                    url: '/ranking/all/api',
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


        function loadDataIncludeList() {
            var headerIsAppend = false;
            $('#include_list').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                    '<div class="col-6"><b>Family</b></div>' +
                    '<div class="col-6"><b>Training Records</b></div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-6"><b>Formal Education</b></div>' +
                    '<div class="col-6"><b>Historical Jobs</b></div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-6"><b>Language</b></div>' +
                    '<div class="col-6"><b>Work Experience</b></div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-6"><b>Organization</b></div>' +
                    '<div class="col-6"><b>Award</b></div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-6"><b>Project Experience</b></div>' +
                    '<div class="col-6"><b>Sanction</b></div>' +
                    '</div>';
                    $('.select2-search').append(html);
                    headerIsAppend = true;
                }
            });
            
            // $('#include_list').select2({
            //     closeOnSelect: false,
            //     placeholder: "Choose Include List",
            //     allowHtml: true,
            //     allowClear: true,
            //     tags: true,
            //     showCheckbox: true,
            // });
        }

        $("#include_list").on('change', function () {
            if ($(this).is(':checked')) {
                $("#family").prop('disabled', false);
                $("#training_records").prop('disabled', false);
                $("#formal_education").prop('disabled', false);
                $("#historical_jobs").prop('disabled', false);
                $("#language").prop('disabled', false);
                $("#work_experience").prop('disabled', false);
                $("#organization").prop('disabled', false);
                $("#award").prop('disabled', false);
                $("#project_experience").prop('disabled', false);
                $("#sanction").prop('disabled', false);
            }
            else {
                $("#family").prop('disabled', true);
                $("#training_records").prop('disabled', true);
                $("#formal_education").prop('disabled', true);
                $("#historical_jobs").prop('disabled', true);
                $("#language").prop('disabled', true);
                $("#work_experience").prop('disabled', true);
                $("#organization").prop('disabled', true);
                $("#award").prop('disabled', true);
                $("#project_experience").prop('disabled', true);
                $("#sanction").prop('disabled', true);
            }
        });

        $("#btn-print-data").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#employee_card_form").submit();
        });

        if ($("#employee_card_form").length > 0) {
            $("#employee_card_form").validate({
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
                        url: "{{ url('personel/employee_card/print') }}",
                        type: "POST",
                        data: $('#employee_card_form').serialize(),
                        success: function (result, status, xhr) {
                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /"([^"]*)"/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1] :
                                'audit_trail.xlsx');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (response) {
                            $("#btn-print-data").prop("disabled", false);
                            $("#btn-print-data").html(
                                '<i class="fa fa-print"></i> {{ __("personel_employee_card.btn_print") }}'
                            );
                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }
                    });
                }
            })
        }
        
        /*var items = [{
                $('<div class="row">' +
                '<div class="col-6"><b>Family</b></div>' +
                '<div class="col-6"><b>Training Records</b></div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6"><b>Formal Education</b></div>' +
                '<div class="col-6"><b>Historical Jobs</b></div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6"><b>Language</b></div>' +
                '<div class="col-6"><b>Work Experience</b></div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6"><b>Organization</b></div>' +
                '<div class="col-6"><b>Award</b></div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-6"><b>Project Experience</b></div>' +
                '<div class="col-6"><b>Sanction</b></div>' +
                '</div>'
        }];*/
            
        // $('#include_list').ejDropDownList({
        //     dataSource: items,
        //     showCheckbox : true
        // });
    });
</script>

</html>