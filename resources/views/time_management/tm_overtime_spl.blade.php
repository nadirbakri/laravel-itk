<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_overtime_spl.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.css" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/i18n/jquery-ui-timepicker-addon-i18n.min.js"> --}}
    {{-- <link rel="stylesheet" href="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css"> --}}
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/time_management_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-time_management {
            max-width: 97%;
            margin: auto;
            margin-top: 1%;
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

        .modal-header-notification-success {
            border-bottom:1px solid #eee;
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="time_management">
        <div class="div-title">
            <a href="{{ url('time_management') }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_overtime_spl.list') }}</span>
            </a> 
        </div>
        <div class="div-form">
            <form id="tm_overtime_spl_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="employee_no_from">{{ __('tm_overtime_spl.label_employee_no_from') }}</label>
                            <select class="form-control select2" id="employee_no_from" name="employee_no_from"></select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="employee_no_to">{{ __('tm_overtime_spl.label_employee_no_to') }}</label>
                            <select class="form-control select2" id="employee_no_to" name="employee_no_to"></select>
                            <input type="hidden" class="form-control" id="employee_no_get" name="employee_no_get">
                        </div>
                    </div>
                    <div class="col-2">
                        <label for=""></label>
                        <button type="button" class="btn btn-primary" name="btn-app-leader" id="btn-app-leader"
                            style="width: 100%;" >{{ __('tm_overtime_spl.btn_app_leader') }}
                        </button>
                    </div>
                    <div class="col-4">
                        <label for=""></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="check_all_app_leader"
                                    name="check_all_app_leader" value="check_all_app_leader" >
                                <label class="form-check-label"
                                    for="check_all_app_leader">{{ __('tm_overtime_spl.label_check_all') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="uncheck_all_app_leader"
                                    name="check_all_app_leader" value="uncheck_all_app_leader" >
                                <label class="form-check-label"
                                    for="uncheck_all_app_leader">{{ __('tm_overtime_spl.label_uncheck_all') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="date_from">{{ __('tm_overtime_spl.label_date_from') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="date_from" name="date_from"
                                    placeholder="{{ __('tm_overtime_spl.label_date_from') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="date_to">{{ __('tm_overtime_spl.label_date_to') }}</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="date_to" name="date_to"
                                    placeholder="{{ __('tm_overtime_spl.label_date_to') }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <label for=""></label>
                        <button type="button" class="btn btn-primary" name="btn-app-hrd" id="btn-app-hrd"
                            style="width: 100%;" >{{ __('tm_overtime_spl.btn_app_hrd') }}
                        </button>
                    </div>
                    <div class="col-4">
                        <label for=""></label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="check_all_app_hrd"
                                    name="check_all_app_hrd" value="check_all_app_hrd" >
                                <label class="form-check-label"
                                    for="check_all_app_hrd">{{ __('tm_overtime_spl.label_check_all') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="uncheck_all_app_hrd"
                                    name="check_all_app_hrd" value="uncheck_all_app_hrd" >
                                <label class="form-check-label"
                                    for="uncheck_all_app_hrd">{{ __('tm_overtime_spl.label_uncheck_all') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <form id="overtime_spl_table_form" method="post">
            <div class="div-table">
                <table id="overtime_spl_table" class="table hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __('tm_overtime_spl.table_employee_no') }}</th>
                            <th>{{ __('tm_overtime_spl.table_employee_name') }}</th>
                            <th>{{ __('tm_overtime_spl.table_date') }}</th>
                            <th>{{ __('tm_overtime_spl.table_seq_no') }}</th>
                            <th>{{ __('tm_overtime_spl.table_shift') }}</th>
                            <th>{{ __('tm_overtime_spl.table_before_in') }}</th>
                            <th>{{ __('tm_overtime_spl.table_start') }}</th>
                            <th>{{ __('tm_overtime_spl.table_finish') }}</th>
                            <th>{{ __('tm_overtime_spl.table_hour') }}</th>
                            <th>{{ __('tm_overtime_spl.table_convert') }}</th>
                            <th>{{ __('tm_overtime_spl.table_code') }}</th>
                            <th>{{ __('tm_overtime_spl.table_description') }}</th>
                            <th>{{ __('tm_overtime_spl.table_app_leader') }}</th>
                            <th>{{ __('tm_overtime_spl.table_app_hrd') }}</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-add" id="btn-add"
                style="width: 100%;" data-toggle="modal" data-target="#modal_add_overtime_spl">
                <i class="fa fa-plus"></i> {{ __('tm_overtime_spl.btn_add') }}
            </button>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                style="width: 100%;">
                <i class="fa fa-floppy-o"></i> {{ __('tm_overtime_spl.btn_save') }}
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger" name="btn-delete" id="btn-delete"
                style="width: 100%;">
                <i class="fa fa-times"></i> {{ __('tm_overtime_spl.btn_delete') }}
            </button>
        </div>
    </div>
    <div class="modal fade" id="modal_add_overtime_spl" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('tm_overtime_spl.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="overtime_spl_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="employee_no">{{ __('tm_overtime_spl.label_employee_no') }}</label>
                                    <select class="form-control select2" id="employee_no" name="employee_no"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="employee_name">{{ __('tm_overtime_spl.label_employee_name') }}</label>
                                    <input type="text" class="form-control" id="employee_name" name="employee_name"
                                        placeholder={{ __('tm_overtime_spl.label_employee_name') }} disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="date_overtime_spl">{{ __('tm_overtime_spl.label_date_overtime_spl') }}</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="date_overtime_spl" name="date_overtime_spl"
                                            placeholder="{{ __('tm_overtime_spl.label_date_overtime_spl') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="shift_overtime_spl">{{ __('tm_overtime_spl.label_shift') }}</label>
                                    <select class="form-control select2" id="shift_overtime_spl" name="shift_overtime_spl"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="code_overtime_spl">{{ __('tm_overtime_spl.label_code') }}</label>
                                    <select class="form-control select2" id="code_overtime_spl" name="code_overtime_spl"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">{{ __('tm_overtime_spl.label_description') }}</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                        placeholder={{ __('tm_overtime_spl.label_description') }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="before_in">{{ __('tm_overtime_spl.label_before_in') }}</label>
                                    <input type="text" class="form-control" id="before_in" name="before_in"
                                        placeholder={{ __('tm_overtime_spl.label_before_in') }}>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="start_overtime_spl">{{ __('tm_overtime_spl.label_start') }}</label>
                                    <input type="text" class="form-control" id="start_overtime_spl" name="start_overtime_spl"
                                        placeholder={{ __('tm_overtime_spl.label_start') }}>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="finish_overtime_spl">{{ __('tm_overtime_spl.label_finish') }}</label>
                                    <input type="text" class="form-control" id="finish_overtime_spl" name="finish_overtime_spl"
                                        placeholder={{ __('tm_overtime_spl.label_finish') }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="hour_overtime_spl">{{ __('tm_overtime_spl.label_hour') }}</label>
                                    <input type="text" class="form-control" id="hour_overtime_spl" name="hour_overtime_spl"
                                        placeholder={{ __('tm_overtime_spl.label_hour') }}>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="convert">{{ __('tm_overtime_spl.label_convert') }}</label>
                                    <input type="number" class="form-control" id="convert" name="convert"
                                        placeholder={{ __('tm_overtime_spl.label_convert') }}>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btn-save-overtime-spl" class="btn btn-primary w-25"><i 
                            class="fa fa-floppy-o"></i> {{ __('tm_overtime_spl.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('tm_overtime_spl.btn_cancel') }}</button>
                </div>
                </form>
            </div>
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
                        <span class="title-text-notification">{{ __('tm_overtime_spl.alert_success') }}</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.1/jquery.timepicker.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

    $(document).ready(function () {
        var table = null;
        // load_data_table_overtime_spl();

        $.ajax({
            url: "{{ url('time_management/user_detail/check') }}",
            type: "GET",
            success: function (response) {
                console.log(response);
                // console.log(response[0].detailList[0].flagAppLead);
                var app_leader = response[0].detailList[0].flagAppLead;
                var app_hrd = response[0].detailList[0].flagAppHRD;
                if (app_leader) {
                    $('#btn-app-leader').prop('disabled', false);
                    $('#check_all_app_leader').prop('disabled', false);
                    $('#uncheck_all_app_leader').prop('disabled', false);
                }
                else {
                    $('#btn-app-leader').prop('disabled', true);
                    $('#check_all_app_leader').prop('disabled', true);
                    $('#uncheck_all_app_leader').prop('disabled', true);
                }
                
                if (app_hrd) {
                    $('#btn-app-hrd').prop('disabled', false);
                    $('#check_all_app_hrd').prop('disabled', false);
                    $('#uncheck_all_app_hrd').prop('disabled', false);
                }
                else {
                    $('#btn-app-hrd').prop('disabled', true);
                    $('#check_all_app_hrd').prop('disabled', true);
                    $('#uncheck_all_app_hrd').prop('disabled', true);
                }
            }
        })

        $('input[type="checkbox"]').on('change', function() {
            $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        });

        $('input[name="check_all_app_leader"]').on('change', function () {
            var rows = table.rows({ 'search': 'applied' }).nodes();
            if ($('#check_all_app_leader').is(':checked')) {
                $('.check_app_leader', rows).prop('checked', true);
            }
            else {
                $('.check_app_leader', rows).prop('checked', false);
            }
        })

        $('#overtime_spl_table tbody').on('change', 'input[name="check_app_leader[]"]', function(){
            if(!this.checked){
                var check = $('#check_all_app_leader').get(0);
                if(check && check.checked && ('checked' in check)){
                    check.checked = false;
                }
            } else  {
                var uncheck = $('#uncheck_all_app_leader').get(0);
                if(uncheck && uncheck.checked && ('checked' in uncheck)){
                    uncheck.checked = false;
                }
            }
        });

        $('input[name="check_all_app_hrd"]').on('change', function () {
            var rows = table.rows({ 'search': 'applied' }).nodes();
            if ($('#check_all_app_hrd').is(':checked')) {
                $('.check_app_hrd', rows).prop('checked', true);
            }
            else {
                $('.check_app_hrd', rows).prop('checked', false);
            }
        })

        $('#overtime_spl_table tbody').on('change', 'input[name="check_app_hrd[]"]', function(){
            if(!this.checked){
                var check = $('#check_all_app_hrd').get(0);
                if(check && check.checked && ('checked' in check)){
                    check.checked = false;
                }
            } else  {
                var uncheck = $('#uncheck_all_app_hrd').get(0);
                if(uncheck && uncheck.checked && ('checked' in uncheck)){
                    uncheck.checked = false;
                }
            }
        });

        var hour_min = $('#before_in, #start_overtime_spl, #finish_overtime_spl');

        hour_min.flatpickr({
                enableTime: true,
                noCalendar: true,
                altInput: true,
                static: true,
                allowInput: true,
                time_24hr: true,
                defaultDate: "today",
                altFormat: "H:i",
                dateFormat: "H:i:ss"
        });

        var start_finish = $('#start_overtime_spl, #finish_overtime_spl');

        start_finish.on('change', function () {
            var date_overtime_spl = $("#date_overtime_spl").attr('value');
            var date = moment(date_overtime_spl).format('DD/MM/YYYY');
            var start = $('#start_overtime_spl').val();
            var finish = $('#finish_overtime_spl').val();

            const earlierDateTime = date + " " + start;
            const laterDateTime = date + " " + finish;

            const difference = moment(laterDateTime, "DD/MM/YYYY HH:mm:ss").diff(moment(earlierDateTime, "DD/MM/YYYY HH:mm:ss"));
            const diff = moment.utc(difference).format("HH:mm:ss");

            // console.log(diff);

            $('#hour_overtime_spl').flatpickr({
                enableTime: true,
                noCalendar: true,
                altInput: true,
                allowInput: true,
                time_24hr: true,
                defaultDate: diff,
                altFormat: "H:i",
                dateFormat: "H:i:ss"
            });
        })

        // var date = moment(date_overtime_spl).format('DD/MM/YYYY');
        // $('#date_overtime_spl').val(date);
        // console.log($('#date_overtime_spl').val(date));

        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');
        loadDataEmployeeNo('#employee_no');
        loadDataShiftCode();
        loadDataCode();
        

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_name').val(htmlDecode(data[0].title));
            // console.log(data[0].title);
            $.ajax({
                url: "{{ url('time_management/employee_name/detail') }}",
                type: "GET",
                data: {
                    'employeeNo': data[0].id
                },
            })
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_name').val('');
        });

        $('#overtime_spl_table thead tr').clone(true).appendTo('#overtime_spl_table thead');
        $('#overtime_spl_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
    
            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            } );
        });

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_data_table_overtime_spl(filter_employee_no_from_table = '', filter_employee_no_to_table = '', filter_date_from_table = '', filter_date_to_table = '') {
            table = $('#overtime_spl_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url : "{{ url('time_management/overtime_spl/table') }}",
                    data: {
                        'employeeNoFrom' : filter_employee_no_from_table,
                        'employeeNoTo' : filter_employee_no_to_table,
                        'dateFrom' : filter_date_from_table,
                        'dateTo' : filter_date_to_table
                   } 
                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type, row) {
                            var id = $('<div />').text(row.employeeNo).html() + $('<div />').text(row.ovtDate).html() + $('<div />').text(row.seqNo).html();
                            return type === 'display'? '<input class="chk-select selected_overtime_spl_table" type="checkbox" name="selected_overtime_spl_table[' + id +']" value="1">' : ''
                        }
                    },
                    {
                        data: 'employeeNo', 
                        name: 'employeeNo',
                        render: function (data, type, row) {
                            var id = $('<div />').text(row.employeeNo).html() + $('<div />').text(row.ovtDate).html() + $('<div />').text(row.seqNo).html();
                            return '<input type="hidden" class="form-control" name="id_overtime_spl[]" value="' +
                                id + '"><input type="hidden" class="form-control" name="employee_no_overtime_spl[' + id + ']" value="' +
                                $('<div />').text(row.employeeNo).html() + '">' + 
                                $('<div />').text(row.employeeNo).html();
                        }
                    },
                    {data: 'fullName', name: 'fullName'},
                    {
                        data: 'ovtDate', 
                        name: 'ovtDate',
                        render: function (data, type, row) {
                            var id = $('<div />').text(row.employeeNo).html() + $('<div />').text(row.ovtDate).html() + $('<div />').text(row.seqNo).html();
                            return moment(data).format('DD-MM-YYYY')
                                '<input type="hidden" class="form-control" name="ovt_date_overtime_spl[' + id + ']" value="' +
                                $('<div />').text(row.ovtDate).html() + '">' + 
                                $('<div />').text(row.ovtDate).html();
                        }
                    },
                    {
                        data: 'seqNo', 
                        name: 'seqNo',
                        render: function (data, type, row) {
                            var id = $('<div />').text(row.employeeNo).html() + $('<div />').text(row.ovtDate).html() + $('<div />').text(row.seqNo).html();
                            return '<input type="hidden" class="form-control" name="seq_no_overtime_spl[' + id + ']" value="' +
                                $('<div />').text(row.seqNo).html() + '">' + 
                                $('<div />').text(row.seqNo).html();
                        }
                    },
                    {data: 'shiftCode', name: 'shiftCode'},
                    {
                        data: 'ovtBeforeIn', 
                        name: 'ovtBeforeIn',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'ovtIn', 
                        name:'ovtIn',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'ovtOut', 
                        name: 'ovtOut',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'ovtHour', 
                        name: 'ovtHour',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {data: 'ovtConvert', name: 'ovtConvert'},
                    {data: 'ovtCode', name: 'ovtCode'},
                    {data: 'ovtDescription', name: 'ovtDescription'},
                    { 
                        data: 'leadApprove',
                        name: 'leadApprove',
                        render: function(data, type, row) {
                            var id = $('<div />').text(row.employeeNo).html() + $('<div />').text(row.ovtDate).html() + $('<div />').text(row.seqNo).html();
                            if (data) {
                                return '<input class="chk-select check_app_leader" type="checkbox" name="check_app_leader[' + id + ']" value="true" checked>';
                            } else {
                                return '<input class="chk-select check_app_leader" type="checkbox" name="check_app_leader[' + id + ']" value="true">';
                            }
                        }
                    },
                    { 
                        data: 'hrdApprove',
                        name: 'hrdApprove',
                        render: function(data, type, row) {
                            var id = $('<div />').text(row.employeeNo).html() + $('<div />').text(row.ovtDate).html() + $('<div />').text(row.seqNo).html();
                            if (data) {
                                return '<input class="chk-select check_app_hrd" type="checkbox" name="check_app_hrd[' + id + ']" value="true" checked>';
                            } else {
                                return '<input class="chk-select check_app_hrd" type="checkbox" name="check_app_hrd[' + id + ']" value="true">';
                            }
                        }
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
            // console.log(data);
        }

        var filter = $('#employee_no_from, #employee_no_to, #date_from, #date_to');
        // console.log($('#employee_no_from').val());

        filter.on('change', function() {
            var filter_employee_no_from_table = $('#employee_no_from').val();
            var filter_employee_no_to_table = $('#employee_no_to').val();
            var filter_date_from_table = $('#date_from').val();
            var filter_date_to_table = $('#date_to').val();
            // console.log($('#employee_no_from').val());
            $('#overtime_spl_table').DataTable().destroy();
            load_data_table_overtime_spl(filter_employee_no_from_table, filter_employee_no_to_table, filter_date_from_table, filter_date_to_table);
        })

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
                closeOnSelect: false,
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
                                    text: item.employeeNo,
                                    id: item.employeeNo,
                                    title: item.fullName,
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

        function loadDataShiftCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Shift Code</b></div>' +
                        '<div class="col-6"><b>Shift Name</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.shiftCode + '</div>' +
                        '<div class="col-6">' + data.data.shiftName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#shift_overtime_spl').select2({
                width: '100%',
                placeholder: 'Choose Shift',
                allowClear: true,
                // tags: true,
                closeOnSelect: false,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: '/shift_code/api',
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
                                    text: item.shiftName,
                                    id: item.shiftCode,
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

        function loadDataCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Absent Type</b></div>' +
                        '<div class="col-6"><b>Absent Code</b></div>' +
                        '<div class="col-6">' + data.data.absentType + '</div>' +
                        '<div class="col-6">' + data.data.absentCode + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#code_overtime_spl').select2({
                width: '100%',
                placeholder: 'Choose Code',
                allowClear: true,
                // tags: true,
                closeOnSelect: false,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: '/code/api',
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
                                    text: item.absentCode,
                                    id: item.absentType,
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

        $("#btn-save").on('click', function() {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $(this).prop("disabled", true);
                $(this).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

                $("#overtime_spl_table_form").submit();
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-delete").on('click', function () {
            var data = table.rows('.selected').data().toArray();

            var filter_employee_no_from_table = $('#employee_no_from').val();
            var filter_employee_no_to_table = $('#employee_no_to').val();
            var filter_date_from_table = $('#date_from').val();
            var filter_date_to_table = $('#date_to').val();

            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('time_management/overtime_spl/remove') }}",
                    type: "GET",
                    data: {
                        'data' : data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            $('#overtime_spl_table').DataTable().destroy();
                            load_data_table_overtime_spl(filter_employee_no_from_table, filter_employee_no_to_table, filter_date_from_table, filter_date_to_table);
                            setTimeout(function () {
                                $('#notification_success').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-save-overtime-spl").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#overtime_spl_form").submit();
        });
        
        $('#overtime_spl_table_form').on('submit', function () {
            var data = decodeURI(table.rows('.selected').nodes().$('input').serialize());

            var filter_employee_no_from_table = $('#employee_no_from').val();
            var filter_employee_no_to_table = $('#employee_no_to').val();
            var filter_date_from_table = $('#date_from').val();
            var filter_date_to_table = $('#date_to').val();

            $.ajax({
                type: "POST",
                url: "{{ url('time_management/overtime_spl/status') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                data: data,
                success: function (response) {
                    if (response.status == "true") {
                        $("#btn-save").prop("disabled", false);
                        $("#btn-save").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
                        );

                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);
                        $('#overtime_spl_table').DataTable().destroy();
                        load_data_table_overtime_spl(filter_employee_no_from_table, filter_employee_no_to_table, filter_date_from_table, filter_date_to_table);
                        setTimeout(function () {
                            $('#notification_success').modal('hide');
                        }, 3000);
                    } else {
                        $("#btn-save").prop("disabled", false);
                        $("#btn-save").html(
                            '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
                        );

                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html(
                            "{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                }
            });

            return false;
        });

        if ($("#overtime_spl_form").length > 0) {
            $("#overtime_spl_form").validate({
                rules: {
                    employee_no: {
                        required: true,
                    },
                    date_overtime_spl: {
                        required: true,
                    },
                    shift_overtime_spl: {
                        required: true,
                    },
                    code_overtime_spl: {
                        required: true,
                    },
                },
                messages: {
                    employee_no: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
                    },
                    date_overtime_spl: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
                    },
                    shift_overtime_spl: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
                    },
                    code_overtime_spl: {
                        required: "{{ __('tm_overtime_spl.field_mandatory') }}",
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
                    $("#btn-save-overtime-spl").prop("disabled", false);
                    $("#btn-save-overtime-spl").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
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
                        url: "{{ url('time_management/overtime_spl/proses') }}",
                        type: "POST",
                        data: $('#overtime_spl_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-overtime-spl").prop("disabled", false);
                                $("#btn-save-overtime-spl").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/overtime_spl') }}";
                                }, 3000);
                            } else {
                                $("#btn-save-overtime-spl").prop("disabled", false);
                                $("#btn-save-overtime-spl").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
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
                            $("#btn-save-overtime-spl").prop("disabled", false);
                            $("#btn-save-overtime-spl").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_overtime_spl.btn_save") }}'
                            );

                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }
    });
</script>
</html>