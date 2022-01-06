<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('tm_period_maintenance.judul') }}</title>
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
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/time_management_detail.css') }}">
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
                <span class="title-text">{{ __('tm_period_maintenance.list') }}</span>
            </a> 
        </div>
        <div class="div-table">
            <table id="overtime_spl_table" class="table hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('tm_period_maintenance.label_year') }}</th>
                        <th>{{ __('tm_period_maintenance.label_month') }}</th>
                        <th>{{ __('tm_period_maintenance.label_period') }}</th>
                        <th>{{ __('tm_period_maintenance.label_absenteeism_start') }}</th>
                        <th>{{ __('tm_period_maintenance.label_absenteeism_end') }}</th>
                        <th>{{ __('tm_period_maintenance.label_overtime_start') }}</th>
                        <th>{{ __('tm_period_maintenance.label_overtime_end') }}</th>
                        <th>{{ __('tm_period_maintenance.label_salary_start') }}</th>
                        <th>{{ __('tm_period_maintenance.label_salary_end') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <button type="submit" class="btn btn-primary" name="btn-add" id="btn-add"
                style="width: 100%;" data-toggle="modal" data-target="#modal_add_overtime_spl">
                <i class="fa fa-plus"></i> {{ __('tm_period_maintenance.btn_add') }}
            </button>
        </div>
        <div class="col-2">
            <a class="btn btn-danger" href="{{ url('time_management/period_maintenance') }}" target="iframe_dashboard"
                name="btn-remove" id="btn-remove" style="width: 100%;">
                <i class="fa fa-times-circle"></i> {{ __('tm_period_maintenance.btn_remove') }}
            </a>
        </div>
    </div>
    <div class="modal fade" id="modal_add_overtime_spl" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('tm_period_maintenance.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="overtime_spl_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="year">{{ __('tm_period_maintenance.label_year') }}</label>
                                    <select class="form-control select2" id="year" name="year"></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="month">{{ __('tm_period_maintenance.label_month') }}</label>
                                    <select class="form-control" id="month" name="month">
                                        <option disabled selected value>{{ __('tm_period_maintenance.select_month') }}</option>
                                        <option value="january">{{ __('tm_period_maintenance.select_january') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_february') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_march') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_april') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_may') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_june') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_july') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_august') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_september') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_october') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_november') }}</option>
                                        <option value="february">{{ __('tm_period_maintenance.select_december') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="period">{{ __('tm_period_maintenance.label_period') }}</label>
                                    <select class="form-control" id="period" name="period">
                                        <option disabled selected value>{{ __('tm_period_maintenance.select_period') }}</option>
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
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="absenteeism_from" name="absenteeism_from"
                                            placeholder="{{ __('tm_period_maintenance.label_absenteeism_from') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="absenteeism_to">{{ __('tm_period_maintenance.label_absenteeism_to') }}</label>
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
                        <button type="button" id="btn-save-overtime-spl" class="btn btn-primary w-25"><i class="fa fa-floppy-o"></i> {{ __('tm_period_maintenance.btn_save') }}</button>
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

<script text="text/javascript">
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
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }

    $(document).ready(function () {
        var rangeYear = [];

        var prevYear = moment().subtract(5, 'years');
        var nextYear = moment().add(5, 'years');

        // console.log(prevYear);

        var prevYear = moment(prevYear).format('YYYY');
        var nextYear = moment(nextYear).format('YYYY');

        for (var i = prevYear; i <= nextYear; i++){
            rangeYear.push(i);
            // var newDate = prevYear + 1;
            $('#year').append($('<option></option>').val(i).html(i));
        }
        // console.log(rangeYear);

        var periodYear = moment(prevYear).format('YY');
        console.log(periodYear);
        // var selectMonth = $('#month').attr('value');
        // var periodMonth = moment(selectMonth).format('')

        $.ajax({
            url: "{{ url('/time_management/period_maintenance/data/detail') }}",
            type: "GET",
            success: function (response) {
                $('#absenteeism_from').val(response[0].absenteeismEnd);
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });
    })
</script>

</html>