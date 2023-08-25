<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_csv_espt_report_form.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-payroll {
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
    </style>
</head>

<body>
    <div class="div-form">
        <form id="csv_espt_report_form_form" method="post">
            @csrf
            <div class="div-payroll">
                <div class="div-title">
                    <a href="{{ url()->previous() }}" target="iframe_dashboard">
                        <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                        <span class="title-text">{{ __('payroll_csv_espt_report_form.list') }}</span>
                    </a>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="periodical">{{ __('payroll_csv_espt_report_form.label_format') }}</label>
                            <div class="form-check">
                                <input type="radio" id="periodical" name="format" value="periodical" checked>
                                <label for="periodical">{{ __('payroll_csv_espt_report_form.label_periodical') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="annual">&nbsp;</label>
                            <div class="form-check">
                                <input type="radio" id="annual" name="format" value="annual">
                                <label for="annual">{{ __('payroll_csv_espt_report_form.label_annual') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="final">&nbsp;</label>
                            <div class="form-check">
                                <input type="radio" id="final" name="format" value="final">
                                <label for="final">{{ __('payroll_csv_espt_report_form.label_final') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="period">{{ __('payroll_csv_espt_report_form.label_period') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="period" name="period"
                                    placeholder="{{ __('payroll_csv_espt_report_form.label_period') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="rectification">{{ __('payroll_csv_espt_report_form.label_rectification') }}</label>
                            <input type="number" class="form-control" id="rectification" name="rectification"
                                placeholder="{{ __('payroll_csv_espt_report_form.label_rectification') }}" value="0">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="npwp_group">{{ __('payroll_csv_espt_report_form.label_npwp_group') }}</label>
                            <span style="color: red">*</span>
                            <select class="form-control select2" id="npwp_group" name="npwp_group"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="print_date">{{ __('payroll_csv_espt_report_form.label_print_date') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="print_date" name="print_date"
                                    placeholder="{{ __('payroll_csv_espt_report_form.label_print_date') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="print_date_calendar"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="group_authorized_code_from form-check-label">{{ __('payroll_csv_espt_report_form.label_group_authorized_code_from') }}</label>
                            <span style="color: red">*</span>
                            <select class="form-control select2" id="group_authorized_code_from" name="group_authorized_code_from"></select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="group_authorized_code_to form-check-label">{{ __('payroll_csv_espt_report_form.label_group_authorized_code_to') }}</label>
                            <span style="color: red">*</span>
                            <select class="form-control select2" id="group_authorized_code_to" name="group_authorized_code_to"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-primary" name="btn-export" id="btn-export" value="export" style="width: 100%;">
                            <i class="fa fa-print"></i> {{ __('payroll_csv_espt_report_form.btn_export') }}
                        </button>
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
                        <span class="title-text-notification">{{ __('payroll_csv_espt_report_form.alert_success') }}</span>
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
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var arrData = @json($data);

        let pickerPeriod = $('#period').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            // defaultDate: "today",
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "Y-m-01", //defaults to "F Y"
                    altFormat: "F Y", //defaults to "F Y"
                })
            ],
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerPrintDate = $('#print_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#print_date_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        var periodYear = (typeof arrData[0].periodYear !== 'undefined') ? '01-01-' + arrData[0].periodYear : null;

        if (arrData) {
            pickerPeriod.setDate(arrData[0].periodYear + "-" + moment(arrData[0].periodMonth).format('MM') + "-01");
        }

        var prevYear = moment(periodYear).subtract(5, 'years');
        var nextYear = moment(periodYear).add(5, 'years');

        var prevYear = moment(prevYear).format('YYYY');
        var nextYear = moment(nextYear).format('YYYY');

        var attrYear = $('#period_year');

        for (var i = prevYear; i <= nextYear; i++){
            var option = $("<option/>", {
                value: i,
                text: i
            });
            attrYear.append(option);
        }

        $('#npwp_group').on('select2:select', function (e) {
            var npwpGroup = $(this).select2('data');

            if (npwpGroup !== '' && npwpGroup !== null) {
                $.ajax({
                    url: "{{ url('npwp/personal_data/api') }}",
                    type: "GET",
                    data: {
                        'npwpCode' : npwpGroup[0].id
                    },
                    success: function (response) {
                        pickerPrintDate.setDate(((typeof response.printDate !== 'undefined') ? response.printDate : ''));
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                })
            }
        });

        $('#npwp_group').on('select2:unselecting', function (e) {
            var date = new Date();
            pickerPrintDate.setDate(date);
        })

        loadDataPeriodMonth();
        loadDataNPWPGroup();
        loadDataGroupAuthorize('#group_authorized_code_from');
        loadDataGroupAuthorize('#group_authorized_code_to');

        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_from', 'First');
        loadDataFirstLastAllGroupAuthorize('#group_authorized_code_to', 'Last');

        function loadDataFirstLastAllGroupAuthorize(field = '', func = '') {
            $.ajax({
                type: 'GET',
                url: "{{ url('/group_authorize/func/api') }}",
                data: {
                    'func': func,
                    'module': 'PY'
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data.groupAuthorizeCode)
                    .text(data.groupAuthorizeDesc);
                $(field).append($newOption).trigger('change');
            });
        }

        function loadDataPeriodMonth() {
            var listPeriodMonth = [
                { id: '1', text: "{{ __('payroll_csv_espt_report_form.period_1') }}" },
                { id: '2', text: "{{ __('payroll_csv_espt_report_form.period_2') }}" },
                { id: '3', text: "{{ __('payroll_csv_espt_report_form.period_3') }}" },
                { id: '4', text: "{{ __('payroll_csv_espt_report_form.period_4') }}" },
                { id: '5', text: "{{ __('payroll_csv_espt_report_form.period_5') }}" },
                { id: '6', text: "{{ __('payroll_csv_espt_report_form.period_6') }}" },
                { id: '7', text: "{{ __('payroll_csv_espt_report_form.period_7') }}" },
                { id: '8', text: "{{ __('payroll_csv_espt_report_form.period_8') }}" },
                { id: '9', text: "{{ __('payroll_csv_espt_report_form.period_9') }}" },
                { id: '10', text: "{{ __('payroll_csv_espt_report_form.period_10') }}" },
                { id: '11', text: "{{ __('payroll_csv_espt_report_form.period_11') }}" },
                { id: '12', text: "{{ __('payroll_csv_espt_report_form.period_12') }}" }
            ];

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#period_month').select2({
                data: listPeriodMonth,
                width: '100%',
                placeholder: 'Choose Period Month',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
            });
        }

        function loadDataNPWPGroup(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.npwpCode + '</div>' +
                        '<div class="col-6">' + data.data.companyName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#npwp_group').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>NPWP Code</b></div>' +
                        '<div class="col-6"><b>Company Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#npwp_group').select2({
                width: '100%',
                placeholder: 'Choose NPWP Group',
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
                    url: "{{ url('/npwp/api') }}",
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
                                    text: item.npwpCode,
                                    id: item.npwpCode,
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
                placeholder: 'Choose Group Authorize Code',
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
                            module: 'PY',
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

        $('#btn-export').click(function (){
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $('#csv_espt_report_form_form').submit();
        });

        if ($("#csv_espt_report_form_form").length > 0) {
            $("#csv_espt_report_form_form").validate({
                rules: {
                    npwp_group: {
                        required: true
                    },
                    group_authorized_code_from: {
                        required: true
                    },
                    group_authorized_code_to: {
                        required: true
                    }
                },
                messages: {
                    npwp_group: {
                        required: "{{ __('payroll_csv_espt_report_form.npwp_group_required') }}",
                    },
                    group_authorized_code_from: {
                        required: "{{ __('payroll_csv_espt_report_form.group_authorized_code_from_required') }}",
                    },
                    group_authorized_code_to: {
                        required: "{{ __('payroll_csv_espt_report_form.group_authorized_code_to_required') }}",
                    }
                },
                highlight: function (element) {
                    $("#btn-export").prop("disabled", false);
                    $("#btn-export").html(
                        '<i class="fa fa-print"></i> {{ __("payroll_csv_espt_report_form.btn_export") }}'
                    );
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-export").prop("disabled", false);
                    $("#btn-export").html(
                        '<i class="fa fa-print"></i> {{ __("payroll_csv_espt_report_form.btn_export") }}'
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
                        url: "{{ url('payroll/csv_espt_report_form/print/excel') }}",
                        type: "POST",
                        data: $('#csv_espt_report_form_form').serialize(),
                        success: function (result, status, xhr) {
                            $("#btn-export").prop("disabled", false);
                            $("#btn-export").html(
                                '<i class="fa fa-print"></i> {{ __("payroll_csv_espt_report_form.btn_export") }}'
                            );
                            var disposition = xhr.getResponseHeader(
                                'content-disposition');
                            var matches = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/.exec(disposition);
                            var filename = (matches != null && matches[1] ? matches[1].replace(/['"]/g, '') :
                                'audit_trail.csv');

                            // The actual download
                            var blob = new Blob([result], {
                                type: 'text/csv'
                            });
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = filename;

                            document.body.appendChild(link);

                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (response) {
                            $("#btn-export").prop("disabled", false);
                            $("#btn-export").html(
                                '<i class="fa fa-print"></i> {{ __("payroll_csv_espt_report_form.btn_export") }}'
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