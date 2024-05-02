<!DOCTYPE html>
<html>

<head>
    <title>{{ __('tm_absent_code.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-time_management {
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
    <div class="div-time_management">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID('{{ url()->previous() }}')" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_absent_code.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="absent_code_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="record_status">{{ __('tm_absent_code.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('tm_absent_code.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="absent_code">{{ __('tm_absent_code.label_absent_code') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="absent_code" name="absent_code"
                                placeholder="{{ __('tm_absent_code.label_absent_code') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="description">{{ __('tm_absent_code.label_description') }}</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="{{ __('tm_absent_code.label_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="category">{{ __('tm_absent_code.label_category') }}</label>
                            <span class="required">*</span>
                            <select class="form-control" id="category" name="category"
                                placeholder="{{ __('tm_absent_code.label_category') }}"> </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="deduct_leave">{{ __('tm_absent_code.label_deduct_leave') }}</label>
                            <select class="form-control" id="deduct_leave" name="deduct_leave"
                                placeholder="{{ __('tm_absent_code.label_deduct_leave') }}"> </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="get_compensation_leave">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_get_compensation_leave"
                                    name="check_get_compensation_leave" value="true">
                                <label
                                    for="check_get_compensation_leave">{{ __('tm_absent_code.label_get_compensation_leave') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="must_woman">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_must_woman"
                                    name="check_must_woman" value="true">
                                <label
                                    for="check_must_woman">{{ __('tm_absent_code.label_must_woman') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="deduct_salary">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_deduct_salary"
                                    name="check_deduct_salary" value="true">
                                <label
                                    for="check_deduct_salary">{{ __('tm_absent_code.label_deduct_salary') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="deduct_allowance">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_deduct_allowance"
                                    name="check_deduct_allowance" value="true">
                                <label
                                    for="check_deduct_allowance">{{ __('tm_absent_code.label_deduct_allowance') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="warning">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_warning"
                                    name="check_warning" value="true">
                                <label
                                    for="check_warning">{{ __('tm_absent_code.label_warning') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="times_allowed">{{ __('tm_absent_code.label_times_allowed') }}</label>
                            <input type="text" class="form-control" id="times_allowed" name="times_allowed"
                                placeholder="{{ __('tm_absent_code.label_times_allowed') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tolerance_request">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_tolerance_request"
                                    name="check_tolerance_request" value="true">
                                <label
                                    for="check_tolerance_request">{{ __('tm_absent_code.label_tolerance_request') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="back_date">{{ __('tm_absent_code.label_back_date') }}</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="back_date" name="back_date"
                                    placeholder="{{ __('tm_absent_code.label_back_date') }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Day</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="max_per_request">{{ __('tm_absent_code.label_max_per_request') }}</label>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" id="max_per_request" name="max_per_request"
                                    placeholder="{{ __('tm_absent_code.label_max_per_request') }}" readonly>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Day</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="mobile">{{ __('tm_absent_code.label_mobile') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_display_absent_code"
                                    name="check_display_absent_code" value="true">
                                <label
                                    for="check_display_absent_code">{{ __('tm_absent_code.label_display_absent_code') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-1"></div>
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_need_attachment"
                                    name="check_need_attachment" value="true">
                                <label
                                    for="check_need_attachment">{{ __('tm_absent_code.label_need_attachment') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payroll">{{ __('tm_absent_code.label_payroll') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row" id="div-payroll-count">
                    <div class="col-1"></div>
                    <!-- <div id="div-payroll-count">
                    </div> -->
                    <!-- <div class="col-1"></div> -->
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('tm_absent_code.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('time_management/absent_code') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('tm_absent_code.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('tm_absent_code.alert_success') }}</span>
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
        var checkboxes = $('#div-payroll-count');
        var j = 0;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        for (var i = 0; i < 25; i++) {
            if(i%5 == 0){
                // console.log(i);
                j = i+1;
                checkboxes.append(
                    '<div class="col-2" id="div-payroll-checkboxes'+ (i+1) +'"></div> '
                );
            }
            // console.log(j);
            $('#div-payroll-checkboxes'+ j).append(
                    '<div class="row">'+
                    '<div class="form-group">'+
                    '<div class="form-check">'+
                    '<input class="form-check-input" type="checkbox" id="check_payroll'+ (i+1) +'" name="check_payroll'+ (i+1) +'">'+
                    '<label for="check_payroll'+ (i+1) +'">' + (i+1) + '</label>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                );
        }

        var func = "{{ $func }}";
        var arrData = @json($data);
        var table = null;

        if (func == 'new') {
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#absent_code').val("");
            $('#description').val("");
            $('#category').val(null).trigger('change');
            $('#deduct_leave').val(null).trigger('change');
            $('#check_get_compensation_leave').prop('checked', false);
            $('#check_must_woman').prop('checked', false);
            $('#check_deduct_salary').prop('checked', false);
            $('#check_deduct_allowance').prop('checked', false);
            $('#check_warning').prop('checked', false);
            $('#times_allowed').val("");
            $('#check_tolerance_request').prop('checked', false);
            $('#back_date').val("");
            $('#max_per_request').val("");
            $('#check_display_absent_code').prop('checked', false);
            $('#check_need_attachment').prop('checked', false);
            for(var i=0; i<25; i++){
                $('#check_payroll'+ (i+1)).prop('checked', false);
            }
        }
        else if (func == 'edit') {
            $('#record_status').val(((typeof arrData[0].recordStatus !== 'undefined') ? arrData[0].recordStatus : ''));
            $('#record_function').val("Edit");
            $('#absent_code').val(((typeof arrData[0].absentCode !== 'undefined') ? arrData[0].absentCode : '')).prop('readonly', true);
            $('#description').val(htmlDecode(((typeof arrData[0].description !== 'undefined') ? arrData[0].description : '')));
            $('#times_allowed').val(((typeof arrData[0].timesAllowed !== 'undefined') ? arrData[0].timesAllowed : ''));
            $('#back_date').val(((typeof arrData[0].reqBackDay !== 'undefined') ? arrData[0].reqBackDay : ''));
            $('#max_per_request').val(((typeof arrData[0].reqAdvanceDay !== 'undefined') ? arrData[0].reqAdvanceDay : ''));
            $.ajax({
                type: 'GET',
                url: "{{ url('/absenteeism_type/func/api') }}",
                data: {
                    'absentType': "{{ isset($data[0]->absentType) ? $data[0]->absentType : '' }}"
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data[0].comGenCode,
                    title: data[0].value,
                    text: data[0].value
                });
                $("#category").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#category").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].comGenCode,
                        text: data[0].value,
                        data: data[0]
                    }
                });
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/deduct_leave/func/api') }}",
                data: {
                    'deductLeave': "{{ isset($data[0]->deductLeave) ? $data[0]->deductLeave : '' }}"
                }
            }).then(function (data) {
                // var option = new Option(data.positionCode, data.positionCode, true, true);
                var option = $('<option/>', {
                    id: data[0].comGenCode,
                    title: data[0].value,
                    text: data[0].value
                });
                $("#deduct_leave").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                // $("#supervisor_position_code").val(data.positionCode).trigger("change");
                // $('#supervisor_position_code').select2('data', {id: data.positionCode, text: data.positionCode, data: data});
                $("#deduct_leave").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].comGenCode,
                        text: data[0].value,
                        data: data[0]
                    }
                });
            });
            var get_compensation_leave = ((typeof arrData[0].getCompensationLeave !== 'undefined') ? arrData[0].getCompensationLeave : '');
            // console.log(work_on_holiday);
            if ( get_compensation_leave == 1 ) {
                $('#check_get_compensation_leave').prop('checked', true)
            }
            else {
                $('#check_get_compensation_leave').prop('checked', false)
            }
            var must_woman = ((typeof arrData[0].mustWoman !== 'undefined') ? arrData[0].mustWoman : '');
            // console.log(work_on_holiday);
            if ( must_woman == 1 ) {
                $('#check_must_woman').prop('checked', true)
            }
            else {
                $('#check_must_woman').prop('checked', false)
            }
            var deduct_salary = ((typeof arrData[0].deductSalary !== 'undefined') ? arrData[0].deductSalary : '');
            // console.log(work_on_holiday);
            if ( deduct_salary == 1 ) {
                $('#check_deduct_salary').prop('checked', true)
            }
            else {
                $('#check_deduct_salary').prop('checked', false)
            }
            var deduct_allowance = ((typeof arrData[0].deductAllowance !== 'undefined') ? arrData[0].deductAllowance : '');
            // console.log(work_on_holiday);
            if ( deduct_allowance == 1 ) {
                $('#check_deduct_allowance').prop('checked', true)
            }
            else {
                $('#check_deduct_allowance').prop('checked', false)
            }
            var warning = ((typeof arrData[0].flagWarning !== 'undefined') ? arrData[0].flagWarning : '');
            // console.log(work_on_holiday);
            if ( warning == 1 ) {
                $('#check_warning').prop('checked', true)
            }
            else {
                $('#check_warning').prop('checked', false)
            }
            var tolerance_request = ((typeof arrData[0].flagReqDay !== 'undefined') ? arrData[0].flagReqDay : '');
            // console.log(work_on_holiday);
            if ( tolerance_request == 1 ) {
                $('#check_tolerance_request').prop('checked', true)
            }
            else {
                $('#check_tolerance_request').prop('checked', false)
            }
            var display_absent_code = ((typeof arrData[0].flagDisplayESS !== 'undefined') ? arrData[0].flagDisplayESS : '');
            // console.log(work_on_holiday);
            if ( display_absent_code == 1 ) {
                $('#check_display_absent_code').prop('checked', true)
            }
            else {
                $('#check_display_absent_code').prop('checked', false)
            }
            var need_attachment = ((typeof arrData[0].flagAttachment !== 'undefined') ? arrData[0].flagAttachment : '');
            // console.log(work_on_holiday);
            if ( need_attachment == 1 ) {
                $('#check_need_attachment').prop('checked', true)
            }
            else {
                $('#check_need_attachment').prop('checked', false)
            }
            for ( var i=0; i<25; i++ ) {
                var data_payroll = 'payroll'+(i+1);
                // console.log(arrData[0][data_payroll]);
                var payroll = ((typeof arrData[0][data_payroll] !== 'undefined') ? arrData[0][data_payroll] : '');
                if ( payroll == 1 ) {
                    $('#check_payroll'+ (i+1)).prop('checked', true)
                }
                else {
                    $('#check_payroll'+ (i+1)).prop('checked', false)
                }
            }

        }
        loadDataAbsentType();
        loadDataDeductLeave();

        function loadDataAbsentType() {
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

            $('#category').select2({
                width: '100%',
                placeholder: 'Choose Absent Type',
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
                    url: "{{ url('/absenteeism_type/api') }}",
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

        function loadDataDeductLeave() {
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

            $('#deduct_leave').select2({
                width: '100%',
                placeholder: 'Choose Deduct Leave',
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
                    url: "{{ url('/deduct_leave/api') }}",
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

        $('#check_tolerance_request').on('change', function() {
            if ($(this).is(':checked')) {
            // console.log($('#check_tolerance_request').val());
                $('#back_date').prop('readonly', false);
                $('#max_per_request').prop('readonly', false);
            }

            else {
                $('#back_date').prop('readonly', true);
                $('#max_per_request').prop('readonly', true);
            }
        });

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('time_management/absent_code') }}";
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#absent_code_form").submit();
        });

        if ($("#absent_code_form").length > 0) {
            $("#absent_code_form").validate({
            rules: {
                    absent_code: {
                        required: true,
                    },
                    category: {
                        required: true,
                    },
                },
                messages: {
                    absent_code: {
                        required: "{{ __('tm_absent_code.absent_code_required') }}",
                    },
                    no_of_day: {
                        required: "{{ __('tm_absent_code.category_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_absent_code.btn_save") }}'
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
                        url: "{{ url('time_management/absent_code/proses') }}",
                        type: "POST",
                        data: $('#absent_code_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_absent_code.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/absent_code') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_absent_code.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_absent_code.btn_save") }}'
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