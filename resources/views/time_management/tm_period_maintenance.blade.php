<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_period_maintenance.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
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
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .modal-header-notification-success {
            border-bottom:1px solid #eee;
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }
    </style>
</head>

<body>
    <div class="time_management">
        <div class="div-title">
            <a href="{{ route('time_management', ['moduleID' => 'TM']) }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_period_maintenance.list') }}</span>
            </a> 
        </div>
        <div class="div-table">
            <table id="period_maintenance_table" class="table hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Year</th>
                        <th>Month</th>
                        <th>Period</th>
                        <th>Absenteeism Start</th>
                        <th>Absenteeism End</th>
                        <th>Overtime Start</th>
                        <th>Overtime End</th>
                        <th>Salary Start</th>
                        <th>Salary End&nbsp;&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-primary" name="btn-add" id="btn-add"
                style="width: 100%;" data-toggle="modal" data-target="#modal_add_overtime_spl">
                <i class="fa fa-plus"></i> {{ __('tm_period_maintenance.btn_add') }}
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit"
                style="width: 100%;">
                <i class="fa fa-pencil"></i> {{ __('tm_period_maintenance.btn_edit') }}
            </button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger" name="btn-remove" id="btn-remove"
                style="width: 100%;">
                <i class="fa fa-times-circle"></i> {{ __('tm_period_maintenance.btn_remove') }}
            </button>
            <!-- <a class="btn btn-danger" href="{{ url('time_management/period_maintenance') }}" target="iframe_dashboard"
                name="btn-remove" id="btn-remove" style="width: 100%;">
                <i class="fa fa-times-circle"></i> {{ __('tm_period_maintenance.btn_remove') }}
            </a> -->
        </div>
    </div>
    <div class="modal fade" id="modal_add_overtime_spl"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('tm_period_maintenance.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="period_maintenance_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="year">{{ __('tm_period_maintenance.label_year') }}</label>
                                        <span class="required">*</span>
                                    <select class="form-control select2" id="year" name="year"></select>
                                </div>
                                <input type="hidden" class="form-control" id="record_function" name="record_function">
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="month">{{ __('tm_period_maintenance.label_month') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group month">
                                        <input type="text" class="form-control" id="month" name="month"
                                            placeholder="{{ __('tm_period_maintenance.label_month') }}">
                                        <div class="input-group-prepend" id="month-calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="period">{{ __('tm_period_maintenance.label_period') }}</label>
                                    <span class="required">*</span>
                                    <select class="form-control" id="period" name="period">
                                        <option selected value>{{ __('tm_period_maintenance.select_period') }}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="absenteeism_from">{{ __('tm_period_maintenance.label_absenteeism_from') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="absenteeism_from" name="absenteeism_from"
                                            placeholder="{{ __('tm_period_maintenance.label_absenteeism_from') }}">
                                        <div class="input-group-prepend" id="absenteeism_from_calendar">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="absenteeism_to">{{ __('tm_period_maintenance.label_absenteeism_to') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="absenteeism_to" name="absenteeism_to"
                                            placeholder="{{ __('tm_period_maintenance.label_absenteeism_to') }}">
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
                                    <label for="overtime_from">{{ __('tm_period_maintenance.label_overtime_from') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="overtime_from" name="overtime_from"
                                            placeholder="{{ __('tm_period_maintenance.label_overtime_from') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="overtime_to">{{ __('tm_period_maintenance.label_overtime_to') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="overtime_to" name="overtime_to"
                                            placeholder="{{ __('tm_period_maintenance.label_overtime_to') }}">
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
                                    <label for="salary_from">{{ __('tm_period_maintenance.label_salary_from') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="salary_from" name="salary_from"
                                            placeholder="{{ __('tm_period_maintenance.label_salary_from') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="salary_to">{{ __('tm_period_maintenance.label_salary_to') }}</label>
                                    <span class="required">*</span>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="salary_to" name="salary_to"
                                            placeholder="{{ __('tm_period_maintenance.label_salary_to') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" id="btn-save-period-maintenance" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('tm_period_maintenance.btn_save') }}</button>
                        <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                class="fa fa-times-circle"></i> {{ __('tm_period_maintenance.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('tm_period_maintenance.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_detail">
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
                        <span class="title-text-notification">{{ __('tm_period_maintenance.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-detail"></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.11.3/dataRender/datetime.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script text="text/javascript">
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var table = null;

        let pickerMonth = $('#month').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "F",
            dateFormat: "m",
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "m", //defaults to "F Y"
                    altFormat: "F", //defaults to "F Y"
                })
            ],
            onReady: function () {
                var flatPickrInstance = this;
                flatPickrInstance.monthNav.style.display = "none";
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#month-calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            },
            onValueUpdate: function(selectedDates, dateStr, instance) {
                var year = $('#year').val();
                var month = $('#month').val();

                if(year !== "" && month !== ""){
                    $.ajax({
                        url: "{{ url('/time_management/period_maintenance/data/detail') }}",
                        type: "GET",
                        success: function (response) {
                            //absenteeism
                            var absenteeism_from = moment(response.absenteeismEnd).format('MM/DD/YYYY');
                            var add_absenteeism_date_from = moment(absenteeism_from).add(1, 'days');
                            var absenteeism_date_from = year + '-' + month + '-' + moment(add_absenteeism_date_from).format('DD');
                            pickerAbsenteeismDateFrom.setDate(absenteeism_date_from);

                            var add_absenteeism_date_to = moment(absenteeism_date_from).add(1, 'months').subtract(1, 'days');
                            var absenteeism_date_to = moment(add_absenteeism_date_to).format('YYYY-MM-DD');
                            pickerAbsenteeismDateTo.setDate(absenteeism_date_to);

                            //overtime
                            var overtime_from = moment(response.overtimeEnd).format('MM/DD/YYYY');
                            var add_overtime_date_from = moment(overtime_from).add(1, 'days');
                            var overtime_date_from = year + '-' + month + '-' + moment(add_overtime_date_from).format('DD');
                            pickerOvertimeDateFrom.setDate(overtime_date_from);

                            var add_overtime_date_to = moment(overtime_date_from).add(1, 'months').subtract(1, 'days');
                            var overtime_date_to = moment(add_overtime_date_to).format('YYYY-MM-DD');
                            pickerOvertimeDateTo.setDate(overtime_date_to);

                            //salary                    
                            var salary_from = moment(response.salaryEnd).format('MM/DD/YYYY');
                            var add_salary_date_from = moment(salary_from).add(1, 'days');
                            var salary_date_from = year + '-' + month + '-' + moment(add_salary_date_from).format('DD');
                            pickerSalaryDateFrom.setDate(salary_date_from);

                            var add_salary_date_to = moment(salary_date_from).add(1, 'months').subtract(1, 'days');
                            var salary_date_to = moment(add_salary_date_to).format('YYYY-MM-DD');
                            pickerSalaryDateTo.setDate(salary_date_to);

                        },
                        error: function (response) {
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            }
        });

        let pickerAbsenteeismDateFrom = $('#absenteeism_from').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#absenteeism_from_calendar").click(function () {
                    flatPickrInstance.togge();
                });
            }
        });

        let pickerAbsenteeismDateTo = $('#absenteeism_to').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#absenteeism_from_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerOvertimeDateFrom = $('#overtime_from').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#absenteeism_from_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerOvertimeDateTo = $('#overtime_to').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#absenteeism_from_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerSalaryDateFrom = $('#salary_from').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#absenteeism_from_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerSalaryDateTo = $('#salary_to').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            onReady: function () {
                var flatPickrInstance = this;
                // console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#absenteeism_from_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        $('#period_maintenance_table thead tr').clone(true).appendTo('#period_maintenance_table thead');
        $('#period_maintenance_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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

        load_data_table_period_maintenance();

        function load_data_table_period_maintenance() {
            table = $('#period_maintenance_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('time_management/period_maintenance/table') }}",
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type, row) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'periodYear', name: 'periodYear'},
                    {data: 'periodMonth', name: 'periodMonth'},
                    {data: 'period', name: 'period'},
                    {
                        data: 'absenteeismStart', 
                        name: 'absenteeismStart',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'absenteeismEnd', 
                        name: 'absenteeismEnd',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'overtimeStart', 
                        name: 'overtimeStart',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'overtimeEnd', 
                        name:'overtimeEnd',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'salaryStart', 
                        name: 'salaryStart',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'salaryEnd', 
                        name: 'salaryEnd',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#period_maintenance_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#period_maintenance_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        var prevYear = moment().subtract(5, 'years');
        var nextYear = moment().add(5, 'years');

        var prevYear = moment(prevYear).format('YYYY');
        var nextYear = moment(nextYear).format('YYYY');

        var attrYear = $('#year');

        for (var i = prevYear; i <= nextYear; i++){
            var option = $("<option/>", {
                value: i,
                text: i
            });
            attrYear.append(option);
        }

        $('#year').on('change', function () {
            var year = $('#year').val();
            var month = $('#month').val();

            if(year !== "" && month !== ""){
                $.ajax({
                    url: "{{ url('/time_management/period_maintenance/data/detail') }}",
                    type: "GET",
                    success: function (response) {
                        //absenteeism
                        var absenteeism_from = moment(response.absenteeismEnd).format('MM/DD/YYYY');
                        var add_absenteeism_date_from = moment(absenteeism_from).add(1, 'days');
                        var absenteeism_date_from = year + '-' + month + '-' + moment(add_absenteeism_date_from).format('DD');
                        pickerAbsenteeismDateFrom.setDate(absenteeism_date_from);

                        var add_absenteeism_date_to = moment(absenteeism_date_from).add(1, 'months').subtract(1, 'days');
                        var absenteeism_date_to = moment(add_absenteeism_date_to).format('YYYY-MM-DD');
                        pickerAbsenteeismDateTo.setDate(absenteeism_date_to);

                        //overtime
                        var overtime_from = moment(response.overtimeEnd).format('MM/DD/YYYY');
                        var add_overtime_date_from = moment(overtime_from).add(1, 'days');
                        var overtime_date_from = year + '-' + month + '-' + moment(add_overtime_date_from).format('DD');
                        pickerOvertimeDateFrom.setDate(overtime_date_from);

                        var add_overtime_date_to = moment(overtime_date_from).add(1, 'months').subtract(1, 'days');
                        var overtime_date_to = moment(add_overtime_date_to).format('YYYY-MM-DD');
                        pickerOvertimeDateTo.setDate(overtime_date_to);

                        //salary                    
                        var salary_from = moment(response.salaryEnd).format('MM/DD/YYYY');
                        var add_salary_date_from = moment(salary_from).add(1, 'days');
                        var salary_date_from = year + '-' + month + '-' + moment(add_salary_date_from).format('DD');
                        pickerSalaryDateFrom.setDate(salary_date_from);

                        var add_salary_date_to = moment(salary_date_from).add(1, 'months').subtract(1, 'days');
                        var salary_date_to = moment(add_salary_date_to).format('YYYY-MM-DD');
                        pickerSalaryDateTo.setDate(salary_date_to);
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            }
        });

        $("#btn-add").on('click', function () {
            $('#record_function').val("New");
            $('#year').val("2017");
            $('#period').val("");
            $('#year').prop('disabled', false);
            pickerMonth._input.removeAttribute('disabled');
            $('#period').prop('disabled', false);
            pickerMonth.clear();
            pickerAbsenteeismDateFrom.clear();
            pickerAbsenteeismDateTo.clear();
            pickerOvertimeDateFrom.clear();
            pickerOvertimeDateTo.clear();
            pickerSalaryDateFrom.clear();
            pickerSalaryDateTo.clear();
        });

        $("#btn-edit").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $('#modal_add_overtime_spl').modal('show');
                $('#record_function').val("Edit");
                $('#year').val(data[0].periodYear);
                $('#year').prop('disabled', true);
                pickerMonth._input.setAttribute("disabled", "disabled");
                $('#period').prop('disabled', true);
                pickerMonth.setDate(String(data[0].periodMonth).padStart(2, '0') + "/01/" + data[0].periodYear, false);
                $('#period').val(data[0].period);
                pickerAbsenteeismDateFrom.setDate(data[0].absenteeismStart);
                pickerAbsenteeismDateTo.setDate(data[0].absenteeismEnd);
                pickerOvertimeDateFrom.setDate(data[0].overtimeStart);
                pickerOvertimeDateTo.setDate(data[0].overtimeEnd);
                pickerSalaryDateFrom.setDate(data[0].salaryStart);
                pickerSalaryDateTo.setDate(data[0].salaryEnd);
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#period_maintenance_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table.row(this).data();
            $('#modal_add_overtime_spl').modal('show');
            $('#record_function').val("Edit");
            $('#year').prop('disabled', true);
            pickerMonth._input.setAttribute("disabled", "disabled");
            $('#period').prop('disabled', true);
            $('#year').val(data.periodYear);
            pickerMonth.setDate(String(data.periodMonth).padStart(2, '0') + "/01/" + data.periodYear, false);
            $('#period').val(data.period);
            pickerAbsenteeismDateFrom.setDate(data.absenteeismStart);
            pickerAbsenteeismDateTo.setDate(data.absenteeismEnd);
            pickerOvertimeDateFrom.setDate(data.overtimeStart);
            pickerOvertimeDateTo.setDate(data.overtimeEnd);
            pickerSalaryDateFrom.setDate(data.salaryStart);
            pickerSalaryDateTo.setDate(data.salaryEnd);
        });

        $("#btn-save-period-maintenance").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#period_maintenance_form").submit();
        });

        $("#btn-remove").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            // console.log(data.length);
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('time_management/period_maintenance/remove') }}",
                    type: "GET",
                    data: {
                        'data' : data
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            $('#period_maintenance_table').DataTable().destroy();
                            load_data_table_period_maintenance();
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

        jQuery.validator.addMethod("greaterThan", 
        function(value, element, params) {

            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }

            return isNaN(value) && isNaN($(params).val()) 
                || (Number(value) > Number($(params).val())); 
        },'Must be greater than {0}.');

        if ($("#period_maintenance_form").length > 0) {
            $("#period_maintenance_form").validate({  
            rules: {
                    year: {
                        required: true,
                    },
                    month: {
                        required: true,
                    },
                    period: {
                        required: true,
                    },
                    absenteeism_from: {
                        required: true,
                    },
                    absenteeism_to: {
                        required: true,
                        greaterThan: '#absenteeism_from'
                    },
                    overtime_from: {
                        required: true,
                    },
                    overtime_to: {
                        required: true,
                    },
                    salary_from: {
                        required: true,
                    },
                    salary_to: {
                        required: true,
                    },
                },
                messages: {
                    year: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    month: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    period: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    absenteeism_from: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    absenteeism_to: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    overtime_from: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    overtime_to: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    salary_from: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
                    },
                    salary_to: {
                        required: "{{ __('tm_period_maintenance.field_mandatory') }}",
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
                    $("#btn-save-period-maintenance").prop("disabled", false);
                    $("#btn-save-period-maintenance").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_period_maintenance.btn_save") }}'
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
                        url: "{{ url('time_management/period_maintenance/proses') }}",
                        type: "POST",
                        data: $('#period_maintenance_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-period-maintenance").prop("disabled", false);
                                $("#btn-save-period-maintenance").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_period_maintenance.btn_save") }}'
                                );

                                $('#period_maintenance_table').DataTable().destroy();
                                load_data_table_period_maintenance();

                                $('#modal_add_overtime_spl').modal('hide'); 
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                    // window.location =
                                        // "{{ url('time_management/period_maintenance') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_period_maintenance.btn_save") }}'
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
                            $("#btn-save-period-maintenance").prop("disabled", false);
                            $("#btn-save-period-maintenance").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_period_maintenance.btn_save") }}'
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