<!DOCTYPE html>
<html>

<head>
    <title>{{ __('tm_shift_master_code.judul') }}</title>
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
            <a href="{{ url('time_management/shift_master_code') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('tm_shift_master_code.list_detail') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="shift_master_code_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="record_status">{{ __('tm_shift_master_code.label_record_status') }}</label>
                            <input type="text" class="form-control" id="record_status" name="record_status"
                                placeholder="{{ __('tm_shift_master_code.label_record_status') }}" readonly>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="shift_code">{{ __('tm_shift_master_code.label_shift_code') }}</label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="shift_code" name="shift_code"
                                placeholder="{{ __('tm_shift_master_code.label_shift_code') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description">{{ __('tm_shift_master_code.label_description') }}</label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="{{ __('tm_shift_master_code.label_description') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="group_shift">{{ __('tm_shift_master_code.label_group_shift') }}</label>
                            <select class="form-control" id="group_shift" name="group_shift"
                                placeholder="{{ __('tm_shift_master_code.label_group_shift') }}"> </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="flexy">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_flexy"
                                    name="check_flexy" value="true">
                                <label
                                    for="check_flexy">{{ __('tm_shift_master_code.label_flexy') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="flexy_work_hour">{{ __('tm_shift_master_code.label_flexy_work_hour') }}</label>
                            <input type="text" class="form-control" id="flexy_work_hour" name="flexy_work_hour"
                                placeholder="{{ __('tm_shift_master_code.label_flexy_work_hour') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="flexy_overtime_after">{{ __('tm_shift_master_code.label_flexy_overtime_after') }}</label>
                            <input type="text" class="form-control" id="flexy_overtime_after" name="flexy_overtime_after"
                                placeholder="{{ __('tm_shift_master_code.label_flexy_overtime_after') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="tolerance_in">{{ __('tm_shift_master_code.label_tolerance_in') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tolerance_in_from">{{ __('tm_shift_master_code.label_from') }}</label>
                            <input type="time" class="form-control" id="tolerance_in_from" name="tolerance_in_from"
                                placeholder="{{ __('tm_shift_master_code.label_from') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tolerance_in_to">{{ __('tm_shift_master_code.label_to') }}</label>
                            <input type="time" class="form-control" id="tolerance_in_to" name="tolerance_in_to"
                                placeholder="{{ __('tm_shift_master_code.label_to') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="tolerance_out">{{ __('tm_shift_master_code.label_tolerance_out') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tolerance_out_from">{{ __('tm_shift_master_code.label_from') }}</label>
                            <input type="time" class="form-control" id="tolerance_out_from" name="tolerance_out_from"
                                placeholder="{{ __('tm_shift_master_code.label_from') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="tolerance_out_to">{{ __('tm_shift_master_code.label_to') }}</label>
                            <input type="time" class="form-control" id="tolerance_out_to" name="tolerance_out_to"
                                placeholder="{{ __('tm_shift_master_code.label_to') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="time_hour">{{ __('tm_shift_master_code.label_time_hour') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="th_monday_thursday">{{ __('tm_shift_master_code.label_monday_thursday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_monday_thursday_in">{{ __('tm_shift_master_code.label_in') }}</label>
                            <input type="time" class="form-control" id="th_monday_thursday_in" name="th_monday_thursday_in"
                                placeholder="{{ __('tm_shift_master_code.label_in') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_monday_thursday_out">{{ __('tm_shift_master_code.label_out') }}</label>
                            <input type="time" class="form-control" id="th_monday_thursday_out" name="th_monday_thursday_out"
                                placeholder="{{ __('tm_shift_master_code.label_out') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_monday_thursday_break">{{ __('tm_shift_master_code.label_break') }}</label>
                            <input type="time" class="form-control" id="th_monday_thursday_break" name="th_monday_thursday_break"
                                placeholder="{{ __('tm_shift_master_code.label_break') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_monday_thursday_bot">{{ __('tm_shift_master_code.label_bot') }}</label>
                            <input type="time" class="form-control" id="th_monday_thursday_bot" name="th_monday_thursday_bot"
                                placeholder="{{ __('tm_shift_master_code.label_bot') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="th_friday">{{ __('tm_shift_master_code.label_friday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_friday_in">{{ __('tm_shift_master_code.label_in') }}</label>
                            <input type="time" class="form-control" id="th_friday_in" name="th_friday_in"
                                placeholder="{{ __('tm_shift_master_code.label_in') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_friday_out">{{ __('tm_shift_master_code.label_out') }}</label>
                            <input type="time" class="form-control" id="th_friday_out" name="th_friday_out"
                                placeholder="{{ __('tm_shift_master_code.label_out') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_friday_break">{{ __('tm_shift_master_code.label_break') }}</label>
                            <input type="time" class="form-control" id="th_friday_break" name="th_friday_break"
                                placeholder="{{ __('tm_shift_master_code.label_break') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_friday_bot">{{ __('tm_shift_master_code.label_bot') }}</label>
                            <input type="time" class="form-control" id="th_friday_bot" name="th_friday_bot"
                                placeholder="{{ __('tm_shift_master_code.label_bot') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="th_saturday">{{ __('tm_shift_master_code.label_saturday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_saturday_in">{{ __('tm_shift_master_code.label_in') }}</label>
                            <input type="time" class="form-control" id="th_saturday_in" name="th_saturday_in"
                                placeholder="{{ __('tm_shift_master_code.label_in') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_saturday_out">{{ __('tm_shift_master_code.label_out') }}</label>
                            <input type="time" class="form-control" id="th_saturday_out" name="th_saturday_out"
                                placeholder="{{ __('tm_shift_master_code.label_out') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_saturday_break">{{ __('tm_shift_master_code.label_break') }}</label>
                            <input type="time" class="form-control" id="th_saturday_break" name="th_saturday_break"
                                placeholder="{{ __('tm_shift_master_code.label_break') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="th_saturday_bot">{{ __('tm_shift_master_code.label_bot') }}</label>
                            <input type="time" class="form-control" id="th_saturday_bot" name="th_saturday_bot"
                                placeholder="{{ __('tm_shift_master_code.label_bot') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="overtime_hour">{{ __('tm_shift_master_code.label_overtime_hour') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="overtime_meal">{{ __('tm_shift_master_code.label_overtime_meal') }}</label>
                            <input type="time" class="form-control" id="overtime_meal" name="overtime_meal"
                                placeholder="{{ __('tm_shift_master_code.label_overtime_meal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="oh_monday_thursday">{{ __('tm_shift_master_code.label_monday_thursday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_monday_thursday_before">{{ __('tm_shift_master_code.label_before') }}</label>
                            <input type="time" class="form-control" id="oh_monday_thursday_before" name="oh_monday_thursday_before"
                                placeholder="{{ __('tm_shift_master_code.label_before') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_monday_thursday_before_max">{{ __('tm_shift_master_code.label_max') }}</label>
                            <input type="time" class="form-control" id="oh_monday_thursday_before_max" name="oh_monday_thursday_before_max"
                                placeholder="{{ __('tm_shift_master_code.label_max') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_monday_thursday_after">{{ __('tm_shift_master_code.label_after') }}</label>
                            <input type="time" class="form-control" id="oh_monday_thursday_after" name="oh_monday_thursday_after"
                                placeholder="{{ __('tm_shift_master_code.label_break') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_monday_thursday_after_max">{{ __('tm_shift_master_code.label_max') }}</label>
                            <input type="time" class="form-control" id="oh_monday_thursday_after_max" name="oh_monday_thursday_after_max"
                                placeholder="{{ __('tm_shift_master_code.label_max') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="oh_friday">{{ __('tm_shift_master_code.label_friday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_friday_before">{{ __('tm_shift_master_code.label_before') }}</label>
                            <input type="time" class="form-control" id="oh_friday_before" name="oh_friday_before"
                                placeholder="{{ __('tm_shift_master_code.label_before') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_friday_before_max">{{ __('tm_shift_master_code.label_max') }}</label>
                            <input type="time" class="form-control" id="oh_friday_before_max" name="oh_friday_before_max"
                                placeholder="{{ __('tm_shift_master_code.label_max') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_friday_after">{{ __('tm_shift_master_code.label_after') }}</label>
                            <input type="time" class="form-control" id="oh_friday_after" name="oh_friday_after"
                                placeholder="{{ __('tm_shift_master_code.label_break') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_friday_after_max">{{ __('tm_shift_master_code.label_max') }}</label>
                            <input type="time" class="form-control" id="oh_friday_after_max" name="oh_friday_after_max"
                                placeholder="{{ __('tm_shift_master_code.label_max') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="oh_saturday">{{ __('tm_shift_master_code.label_saturday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_saturday_before">{{ __('tm_shift_master_code.label_before') }}</label>
                            <input type="time" class="form-control" id="oh_saturday_before" name="oh_saturday_before"
                                placeholder="{{ __('tm_shift_master_code.label_before') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_saturday_before_max">{{ __('tm_shift_master_code.label_max') }}</label>
                            <input type="time" class="form-control" id="oh_saturday_before_max" name="oh_saturday_before_max"
                                placeholder="{{ __('tm_shift_master_code.label_max') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_saturday_after">{{ __('tm_shift_master_code.label_after') }}</label>
                            <input type="time" class="form-control" id="oh_saturday_after" name="oh_saturday_after"
                                placeholder="{{ __('tm_shift_master_code.label_break') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="oh_saturday_after_max">{{ __('tm_shift_master_code.label_max') }}</label>
                            <input type="time" class="form-control" id="oh_saturday_after_max" name="oh_saturday_after_max"
                                placeholder="{{ __('tm_shift_master_code.label_max') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="shift_allowance">{{ __('tm_shift_master_code.label_shift_allowance') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="sa_monday_thursday">{{ __('tm_shift_master_code.label_monday_thursday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select type="text" class="form-control" id="sa_monday_thursday_option" name="sa_monday_thursday_option">
                                <option value="">{{ __('tm_shift_master_code.label_choose_sa') }}</option>
                                <option value="N">{{ __('tm_shift_master_code.label_no') }}</option>
                                <option value="O">{{ __('tm_shift_master_code.label_yes_if_overtime') }}</option>
                                <option value="Y">{{ __('tm_shift_master_code.label_yes') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="sa_monday_thursday" name="sa_monday_thursday"
                            placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="sa_friday">{{ __('tm_shift_master_code.label_friday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select type="text" class="form-control" id="sa_friday_option" name="sa_friday_option">
                                <option value="">{{ __('tm_shift_master_code.label_choose_sa') }}</option>
                                <option value="N">{{ __('tm_shift_master_code.label_no') }}</option>
                                <option value="O">{{ __('tm_shift_master_code.label_yes_if_overtime') }}</option>
                                <option value="Y">{{ __('tm_shift_master_code.label_yes') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="sa_friday" name="sa_friday"
                            placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="sa_saturday">{{ __('tm_shift_master_code.label_saturday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select type="text" class="form-control" id="sa_saturday_option" name="sa_saturday_option">
                                <option value="">{{ __('tm_shift_master_code.label_choose_sa') }}</option>
                                <option value="N">{{ __('tm_shift_master_code.label_no') }}</option>
                                <option value="O">{{ __('tm_shift_master_code.label_yes_if_overtime') }}</option>
                                <option value="Y">{{ __('tm_shift_master_code.label_yes') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="sa_saturday" name="sa_saturday"
                            placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="overtime_master_tarif">{{ __('tm_shift_master_code.label_overtime_master_tarif') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="omt_monday_thursday">{{ __('tm_shift_master_code.label_monday_thursday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_monday_thursday_hour1">{{ __('tm_shift_master_code.label_hour_1') }}</label>
                            <input type="text" class="form-control" id="omt_monday_thursday_hour1" name="omt_monday_thursday_hour1"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_monday_thursday_hour1_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_monday_thursday_hour1_factorx" name="omt_monday_thursday_hour1_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_monday_thursday_hour2">{{ __('tm_shift_master_code.label_hour_2') }}</label>
                            <input type="text" class="form-control" id="omt_monday_thursday_hour2" name="omt_monday_thursday_hour2"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_monday_thursday_hour2_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_monday_thursday_hour2_factorx" name="omt_monday_thursday_hour2_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_monday_thursday_and_on">{{ __('tm_shift_master_code.label_and_on') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_monday_thursday_and_on_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_monday_thursday_and_on_factorx" name="omt_monday_thursday_and_on_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="omt_friday">{{ __('tm_shift_master_code.label_friday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_friday_hour1">{{ __('tm_shift_master_code.label_hour_1') }}</label>
                            <input type="text" class="form-control" id="omt_friday_hour1" name="omt_friday_hour1"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_friday_hour1_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_friday_hour1_factorx" name="omt_friday_hour1_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_friday_hour2">{{ __('tm_shift_master_code.label_hour_2') }}</label>
                            <input type="text" class="form-control" id="omt_friday_hour2" name="omt_friday_hour2"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_friday_hour2_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_friday_hour2_factorx" name="omt_friday_hour2_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_friday_and_on">{{ __('tm_shift_master_code.label_and_on') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_friday_and_on_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_friday_and_on_factorx" name="omt_friday_and_on_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="omt_saturday">{{ __('tm_shift_master_code.label_saturday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_saturday_hour1">{{ __('tm_shift_master_code.label_hour_1') }}</label>
                            <input type="text" class="form-control" id="omt_saturday_hour1" name="omt_saturday_hour1"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_saturday_hour1_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_saturday_hour1_factorx" name="omt_saturday_hour1_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_saturday_hour2">{{ __('tm_shift_master_code.label_hour_2') }}</label>
                            <input type="text" class="form-control" id="omt_saturday_hour2" name="omt_saturday_hour2"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_saturday_hour2_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_saturday_hour2_factorx" name="omt_saturday_hour2_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_saturday_and_on">{{ __('tm_shift_master_code.label_and_on') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_saturday_and_on_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_saturday_and_on_factorx" name="omt_saturday_and_on_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="omt_sunday">{{ __('tm_shift_master_code.label_sunday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_sunday_hour1">{{ __('tm_shift_master_code.label_hour_1') }}</label>
                            <input type="text" class="form-control" id="omt_sunday_hour1" name="omt_sunday_hour1"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_sunday_hour1_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_sunday_hour1_factorx" name="omt_sunday_hour1_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_sunday_hour2">{{ __('tm_shift_master_code.label_hour_2') }}</label>
                            <input type="text" class="form-control" id="omt_sunday_hour2" name="omt_sunday_hour2"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_sunday_hour2_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_sunday_hour2_factorx" name="omt_sunday_hour2_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_sunday_and_on">{{ __('tm_shift_master_code.label_and_on') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_sunday_and_on_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_sunday_and_on_factorx" name="omt_sunday_and_on_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="omt_holiday">{{ __('tm_shift_master_code.label_holiday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_hour1">{{ __('tm_shift_master_code.label_hour_1') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_hour1" name="omt_holiday_hour1"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_hour1_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_hour1_factorx" name="omt_holiday_hour1_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_hour2">{{ __('tm_shift_master_code.label_hour_2') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_hour2" name="omt_holiday_hour2"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_hour2_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_hour2_factorx" name="omt_holiday_hour2_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_and_on">{{ __('tm_shift_master_code.label_and_on') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_and_on_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_and_on_factorx" name="omt_holiday_and_on_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="omt_holiday_on_saturday">{{ __('tm_shift_master_code.label_holiday_on_saturday') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_on_saturday_hour1">{{ __('tm_shift_master_code.label_hour_1') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_on_saturday_hour1" name="omt_holiday_on_saturday_hour1"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_on_saturday_hour1_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_on_saturday_hour1_factorx" name="omt_holiday_on_saturday_hour1_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_on_saturday_hour2">{{ __('tm_shift_master_code.label_hour_2') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_on_saturday_hour2" name="omt_holiday_on_saturday_hour2"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_on_saturday_hour2_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_on_saturday_hour2_factorx" name="omt_holiday_on_saturday_hour2_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_on_saturday_and_on">{{ __('tm_shift_master_code.label_and_on') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="omt_holiday_on_saturday_and_on_factorx">{{ __('tm_shift_master_code.label_factor_x') }}</label>
                            <input type="text" class="form-control" id="omt_holiday_on_saturday_and_on_factorx" name="omt_holiday_on_saturday_and_on_factorx"
                                placeholder="{{ __('tm_shift_master_code.label_decimal') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> {{ __('tm_shift_master_code.btn_save') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="{{ url('time_management/shift_master_code') }}" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> {{ __('tm_shift_master_code.btn_cancel') }}
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
                        <span class="title-text-notification">{{ __('tm_shift_master_code.alert_success') }}</span>
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
    $(document).ready(function () {
        var func = "{{ $func }}";
        var arrData = @json($data);
        var table = null;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var $flexy_work_hour=$('#flexy_work_hour').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $flexy_overtime_after=$('#flexy_overtime_after').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $tolerance_in_from=$('#tolerance_in_from').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $tolerance_in_to=$('#tolerance_in_to').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $tolerance_out_from=$('#tolerance_out_from').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $tolerance_out_to=$('#tolerance_out_to').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_monday_thursday_in=$('#th_monday_thursday_in').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_monday_thursday_out=$('#th_monday_thursday_out').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_monday_thursday_break=$('#th_monday_thursday_break').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_monday_thursday_bot=$('#th_monday_thursday_bot').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_friday_in=$('#th_friday_in').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_friday_out=$('#th_friday_out').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_friday_break=$('#th_friday_break').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_friday_bot=$('#th_friday_bot').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_saturday_in=$('#th_saturday_in').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_saturday_out=$('#th_saturday_out').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_saturday_break=$('#th_saturday_break').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $th_saturday_bot=$('#th_saturday_bot').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $overtime_meal=$('#overtime_meal').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_monday_thursday_before=$('#oh_monday_thursday_before').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_monday_thursday_before_max=$('#oh_monday_thursday_before_max').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_monday_thursday_after=$('#oh_monday_thursday_after').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });
        
        var $oh_monday_thursday_after_max=$('#oh_monday_thursday_after_max').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_friday_before=$('#oh_friday_before').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_friday_before_max=$('#oh_friday_before_max').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_friday_after=$('#oh_friday_after').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });
        
        var $oh_friday_after_max=$('#oh_friday_after_max').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_saturday_before=$('#oh_saturday_before').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_saturday_before_max=$('#oh_saturday_before_max').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        var $oh_saturday_after=$('#oh_saturday_after').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });
        
        var $oh_saturday_after_max=$('#oh_saturday_after_max').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        if (func == 'new') {
            $('#record_status').val("A");
            $('#record_function').val("New");
            $('#shift_code').val("");
            $('#description').val("");
            $('#group_shift').val(null).trigger('change');
            $('#check_flexy').prop('checked', false);
            $('#flexy_work_hour').val("");
            $('#flexy_overtime_after').val("");

            $('#tolerance_in_from').val("");
            $('#tolerance_in_to').val("");
            $('#tolerance_out_from').val("");
            $('#tolerance_out_to').val("");

            $('#th_monday_thursday_in').val("");
            $('#th_monday_thursday_out').val("");
            $('#th_monday_thursday_break').val("");
            $('#th_monday_thursday_bot').val("");

            $('#th_friday_in').val("");
            $('#th_friday_out').val("");
            $('#th_friday_break').val("");
            $('#th_friday_bot').val("");

            $('#th_saturday_in').val("");
            $('#th_saturday_out').val("");
            $('#th_saturday_break').val("");
            $('#th_saturday_bot').val("");

            $('#overtime_meal').val("");
            $('#oh_monday_thursday_before').val("");
            $('#oh_monday_thursday_before_max').val("");
            $('#oh_monday_thursday_after').val("");
            $('#oh_monday_thursday_after_max').val("");

            $('#oh_friday_before').val("");
            $('#oh_friday_before_max').val("");
            $('#oh_friday_after').val("");
            $('#oh_friday_after_max').val("");

            $('#oh_saturday_before').val("");
            $('#oh_saturday_before_max').val("");
            $('#oh_saturday_after').val("");
            $('#oh_saturday_after_max').val("");

            $('#sa_monday_thursday_option').val(null).trigger('change');
            $('#sa_monday_thursday').val("");
            $('#sa_friday_option').val(null).trigger('change');
            $('#sa_friday').val("");
            $('#sa_saturday_option').val(null).trigger('change');
            $('#sa_saturday').val("");

            $('#omt_monday_thursday_hour1').val("");
            $('#omt_monday_thursday_hour1_factorx').val("");
            $('#omt_monday_thursday_hour2').val("");
            $('#omt_monday_thursday_hour2_factorx').val("");
            $('#omt_monday_thursday_and_on_factorx').val("");

            $('#omt_friday_hour1').val("");
            $('#omt_friday_hour1_factorx').val("");
            $('#omt_friday_hour2').val("");
            $('#omt_friday_hour2_factorx').val("");
            $('#omt_friday_and_on_factorx').val("");

            $('#omt_saturday_hour1').val("");
            $('#omt_saturday_hour1_factorx').val("");
            $('#omt_saturday_hour2').val("");
            $('#omt_saturday_hour2_factorx').val("");
            $('#omt_saturday_and_on_factorx').val("");

            $('#omt_sunday_hour1').val("");
            $('#omt_sunday_hour1_factorx').val("");
            $('#omt_sunday_hour2').val("");
            $('#omt_sunday_hour2_factorx').val("");
            $('#omt_sunday_and_on_factorx').val("");

            $('#omt_holiday_hour1').val("");
            $('#omt_holiday_hour1_factorx').val("");
            $('#omt_holiday_hour2').val("");
            $('#omt_holiday_hour2_factorx').val("");
            $('#omt_holiday_and_on_factorx').val("");

            $('#omt_holiday_on_saturday_hour1').val("");
            $('#omt_holiday_on_saturday_hour1_factorx').val("");
            $('#omt_holiday_on_saturday_hour2').val("");
            $('#omt_holiday_on_saturday_hour2_factorx').val("");
            $('#omt_holiday_on_saturday_and_on_factorx').val("");
            
        } else if (func == 'edit') {
            $('#record_status').val(((typeof arrData[0].recordStatus !== 'undefined') ? arrData[0].recordStatus : ''));
            $('#record_function').val("Edit");
            $('#shift_code').val(((typeof arrData[0].shiftCode !== 'undefined') ? arrData[0].shiftCode : '')).prop('readonly', true);
            $('#description').val(htmlDecode(((typeof arrData[0].shiftName !== 'undefined') ? arrData[0].shiftName : '')));

            var flexy_work_hour = moment(((typeof arrData[0].flexyTime !== 'undefined') ? arrData[0].flexyTime : '')).format('HH:mm:ss');
            // console.log(flexy_work);
            $flexy_work_hour.setDate(flexy_work_hour);

            var flexy_overtime_after = moment(((typeof arrData[0].fLexyOvtAfter !== 'undefined') ? arrData[0].fLexyOvtAfter : '')).format('HH:mm:ss');
            $flexy_overtime_after.setDate(flexy_overtime_after);

            var tolerance_in_from = moment(((typeof arrData[0].toleranceInFrom !== 'undefined') ? arrData[0].toleranceInFrom : '')).format('HH:mm:ss');
            $tolerance_in_from.setDate(tolerance_in_from);

            var tolerance_in_to = moment(((typeof arrData[0].toleranceInTo !== 'undefined') ? arrData[0].toleranceInTo : '')).format('HH:mm:ss');
            $tolerance_in_to.setDate(tolerance_in_to);

            var tolerance_out_from = moment(((typeof arrData[0].toleranceOutFrom !== 'undefined') ? arrData[0].toleranceOutFrom : '')).format('HH:mm:ss');
            $tolerance_out_from.setDate(tolerance_out_from);

            var tolerance_out_to = moment(((typeof arrData[0].toleranceOutTo !== 'undefined') ? arrData[0].toleranceOutTo : '')).format('HH:mm:ss');
            $tolerance_out_to.setDate(tolerance_out_to);

            var th_monday_thursday_in = moment(((typeof arrData[0].normalTimeIn !== 'undefined') ? arrData[0].normalTimeIn : '')).format('HH:mm:ss');
            $th_monday_thursday_in.setDate(th_monday_thursday_in);
            var th_monday_thursday_out = moment(((typeof arrData[0].normalTimeOut !== 'undefined') ? arrData[0].normalTimeOut : '')).format('HH:mm:ss');
            $th_monday_thursday_out.setDate(th_monday_thursday_out);
            var th_monday_thursday_break = moment(((typeof arrData[0].normalBreakTime !== 'undefined') ? arrData[0].normalBreakTime : '')).format('HH:mm:ss');
            $th_monday_thursday_break.setDate(th_monday_thursday_break);
            var th_monday_thursday_bot = moment(((typeof arrData[0].normalBuiltInOvt !== 'undefined') ? arrData[0].normalBuiltInOvt : '')).format('HH:mm:ss');
            $th_monday_thursday_bot.setDate(th_monday_thursday_bot);

            var th_friday_in = moment(((typeof arrData[0].fridayTimeIn !== 'undefined') ? arrData[0].fridayTimeIn : '')).format('HH:mm:ss');
            $th_friday_in.setDate(th_friday_in);
            var th_friday_out = moment(((typeof arrData[0].fridayTimeOut !== 'undefined') ? arrData[0].fridayTimeOut : '')).format('HH:mm:ss');
            $th_friday_out.setDate(th_friday_out);
            var th_friday_break = moment(((typeof arrData[0].fridayBreakTime !== 'undefined') ? arrData[0].fridayBreakTime : '')).format('HH:mm:ss');
            $th_friday_break.setDate(th_friday_break);
            var th_friday_bot = moment(((typeof arrData[0].fridayBuiltInOvt !== 'undefined') ? arrData[0].fridayBuiltInOvt : '')).format('HH:mm:ss');
            $th_friday_bot.setDate(th_friday_bot);

            var th_saturday_in = moment(((typeof arrData[0].saturdayTimeIn !== 'undefined') ? arrData[0].saturdayTimeIn : '')).format('HH:mm:ss');
            $th_saturday_in.setDate(th_saturday_in);
            var th_saturday_out = moment(((typeof arrData[0].saturdayTimeOut !== 'undefined') ? arrData[0].saturdayTimeOut : '')).format('HH:mm:ss');
            $th_saturday_out.setDate(th_saturday_out);
            var th_saturday_break = moment(((typeof arrData[0].saturdayBreakTime !== 'undefined') ? arrData[0].saturdayBreakTime : '')).format('HH:mm:ss');
            $th_saturday_break.setDate(th_saturday_break);
            var th_saturday_bot = moment(((typeof arrData[0].saturdayBuiltInOvt !== 'undefined') ? arrData[0].saturdayBuiltInOvt : '')).format('HH:mm:ss');
            $th_saturday_bot.setDate(th_saturday_bot);

            var overtime_meal = moment(((typeof arrData[0].overtimeMeal !== 'undefined') ? arrData[0].overtimeMeal : '')).format('HH:mm:ss');
            $overtime_meal.setDate(overtime_meal);

            var oh_monday_thursday_before = moment(((typeof arrData[0].normalOvtBefore !== 'undefined') ? arrData[0].normalOvtBefore : '')).format('HH:mm:ss');
            $oh_monday_thursday_before.setDate(oh_monday_thursday_before);
            var oh_monday_thursday_before_max = moment(((typeof arrData[0].normalMaxOvtBefore !== 'undefined') ? arrData[0].normalMaxOvtBefore : '')).format('HH:mm:ss');
            $oh_monday_thursday_before_max.setDate(oh_monday_thursday_before_max);
            var oh_monday_thursday_after = moment(((typeof arrData[0].normalOvtAfter !== 'undefined') ? arrData[0].normalOvtAfter : '')).format('HH:mm:ss');
            $oh_monday_thursday_after.setDate(oh_monday_thursday_after);
            var oh_monday_thursday_after_max = moment(((typeof arrData[0].normalMaxOvtAfter !== 'undefined') ? arrData[0].normalMaxOvtAfter : '')).format('HH:mm:ss');
            $oh_monday_thursday_after_max.setDate(oh_monday_thursday_after_max);

            var oh_friday_before = moment(((typeof arrData[0].fridayOvtBefore !== 'undefined') ? arrData[0].fridayOvtBefore : '')).format('HH:mm:ss');
            $oh_friday_before.setDate(oh_friday_before);
            var oh_friday_before_max = moment(((typeof arrData[0].fridayMaxOvtBefore !== 'undefined') ? arrData[0].fridayMaxOvtBefore : '')).format('HH:mm:ss');
            $oh_friday_before_max.setDate(oh_friday_before_max);
            var oh_friday_after = moment(((typeof arrData[0].fridayOvtAfter !== 'undefined') ? arrData[0].fridayOvtAfter : '')).format('HH:mm:ss');
            $oh_friday_after.setDate(oh_friday_after);
            var oh_friday_after_max = moment(((typeof arrData[0].fridayMaxOvtAfter !== 'undefined') ? arrData[0].fridayMaxOvtAfter : '')).format('HH:mm:ss');
            $oh_friday_after_max.setDate(oh_friday_after_max);

            var oh_saturday_before = moment(((typeof arrData[0].saturdayOvtBefore !== 'undefined') ? arrData[0].saturdayOvtBefore : '')).format('HH:mm:ss');
            $oh_saturday_before.setDate(oh_saturday_before);
            var oh_saturday_before_max = moment(((typeof arrData[0].saturdayMaxOvtBefore !== 'undefined') ? arrData[0].saturdayMaxOvtBefore : '')).format('HH:mm:ss');
            $oh_saturday_before_max.setDate(oh_saturday_before_max);
            var oh_saturday_after = moment(((typeof arrData[0].saturdayOvtAfter !== 'undefined') ? arrData[0].saturdayOvtAfter : '')).format('HH:mm:ss');
            $oh_saturday_after.setDate(oh_saturday_after);
            var oh_saturday_after_max = moment(((typeof arrData[0].saturdayMaxOvtAfter !== 'undefined') ? arrData[0].saturdayMaxOvtAfter : '')).format('HH:mm:ss');
            $oh_saturday_after_max.setDate(oh_saturday_after_max);
           
            $('#sa_monday_thursday_option').val(((typeof arrData[0].normalShiftAllowFlag !== 'undefined') ? arrData[0].normalShiftAllowFlag : ''));
            $('#sa_monday_thursday').val(((typeof arrData[0].normalAllowance !== 'undefined') ? arrData[0].normalAllowance : ''));
            $('#sa_friday_option').val(((typeof arrData[0].fridayShiftAllowFlag !== 'undefined') ? arrData[0].fridayShiftAllowFlag : ''));
            $('#sa_friday').val(((typeof arrData[0].fridayAllowance !== 'undefined') ? arrData[0].fridayAllowance : ''));
            $('#sa_saturday_option').val(((typeof arrData[0].saturdayShiftAllowFlag !== 'undefined') ? arrData[0].saturdayShiftAllowFlag : ''));
            $('#sa_saturday').val(((typeof arrData[0].saturdayAllowance !== 'undefined') ? arrData[0].saturdayAllowance : ''));
            
            $('#omt_monday_thursday_hour1').val(((typeof arrData[0].factorNormalHour1 !== 'undefined') ? arrData[0].factorNormalHour1 : ''));
            $('#omt_monday_thursday_hour1_factorx').val(((typeof arrData[0].factorNormal1 !== 'undefined') ? arrData[0].factorNormal1 : ''));
            $('#omt_monday_thursday_hour2').val(((typeof arrData[0].factorNormalHour2 !== 'undefined') ? arrData[0].factorNormalHour2 : ''));
            $('#omt_monday_thursday_hour2_factorx').val(((typeof arrData[0].factorNormal2 !== 'undefined') ? arrData[0].factorNormal2 : ''));
            $('#omt_monday_thursday_and_on_factorx').val(((typeof arrData[0].factorNormal3 !== 'undefined') ? arrData[0].factorNormal3 : ''));

            $('#omt_friday_hour1').val(((typeof arrData[0].factorFridayHour1 !== 'undefined') ? arrData[0].factorFridayHour1 : ''));
            $('#omt_friday_hour1_factorx').val(((typeof arrData[0].factorFriday1 !== 'undefined') ? arrData[0].factorFriday1 : ''));
            $('#omt_friday_hour2').val(((typeof arrData[0].factorFridayHour2 !== 'undefined') ? arrData[0].factorFridayHour2 : ''));
            $('#omt_friday_hour2_factorx').val(((typeof arrData[0].factorFriday2 !== 'undefined') ? arrData[0].factorFriday2 : ''));
            $('#omt_friday_and_on_factorx').val(((typeof arrData[0].factorFriday3 !== 'undefined') ? arrData[0].factorFriday3 : ''));
            
            $('#omt_saturday_hour1').val(((typeof arrData[0].factorSaturdayHour1 !== 'undefined') ? arrData[0].factorSaturdayHour1 : ''));
            $('#omt_saturday_hour1_factorx').val(((typeof arrData[0].factorSaturday1 !== 'undefined') ? arrData[0].factorSaturday1 : ''));
            $('#omt_saturday_hour2').val(((typeof arrData[0].factorSaturdayHour2 !== 'undefined') ? arrData[0].factorSaturdayHour2 : ''));
            $('#omt_saturday_hour2_factorx').val(((typeof arrData[0].factorSaturday2 !== 'undefined') ? arrData[0].factorSaturday2 : ''));
            $('#omt_saturday_and_on_factorx').val(((typeof arrData[0].factorSaturday3 !== 'undefined') ? arrData[0].factorSaturday3 : ''));

            $('#omt_sunday_hour1').val(((typeof arrData[0].factorSundayHour1 !== 'undefined') ? arrData[0].factorSundayHour1 : ''));
            $('#omt_sunday_hour1_factorx').val(((typeof arrData[0].factorSunday1 !== 'undefined') ? arrData[0].factorSunday1 : ''));
            $('#omt_sunday_hour2').val(((typeof arrData[0].factorSundayHour2 !== 'undefined') ? arrData[0].factorSundayHour2 : ''));
            $('#omt_sunday_hour2_factorx').val(((typeof arrData[0].factorSunday2 !== 'undefined') ? arrData[0].factorSunday2 : ''));
            $('#omt_sunday_and_on_factorx').val(((typeof arrData[0].factorSunday3 !== 'undefined') ? arrData[0].factorSunday3 : ''));

            $('#omt_holiday_hour1').val(((typeof arrData[0].factorHolidayHour1 !== 'undefined') ? arrData[0].factorHolidayHour1 : ''));
            $('#omt_holiday_hour1_factorx').val(((typeof arrData[0].factorHoliday1 !== 'undefined') ? arrData[0].factorHoliday1 : ''));
            $('#omt_holiday_hour2').val(((typeof arrData[0].factorHolidayHour2 !== 'undefined') ? arrData[0].factorHolidayHour2 : ''));
            $('#omt_holiday_hour2_factorx').val(((typeof arrData[0].factorHoliday2 !== 'undefined') ? arrData[0].factorHoliday2 : ''));
            $('#omt_holiday_and_on_factorx').val(((typeof arrData[0].factorHoliday3 !== 'undefined') ? arrData[0].factorHoliday3 : ''));

            $('#omt_holiday_on_saturday_hour1').val(((typeof arrData[0].factorHolidaySaturdayHour1 !== 'undefined') ? arrData[0].factorHolidaySaturdayHour1 : ''));
            $('#omt_holiday_on_saturday_hour1_factorx').val(((typeof arrData[0].factorHolidaySaturday1 !== 'undefined') ? arrData[0].factorHolidaySaturday1 : ''));
            $('#omt_holiday_on_saturday_hour2').val(((typeof arrData[0].factorHolidaySaturdayHour2 !== 'undefined') ? arrData[0].factorHolidaySaturdayHour2 : ''));
            $('#omt_holiday_on_saturday_hour2_factorx').val(((typeof arrData[0].factorHolidaySaturday2 !== 'undefined') ? arrData[0].factorHolidaySaturday2 : ''));
            $('#omt_holiday_on_saturday_and_on_factorx').val(((typeof arrData[0].factorHolidaySaturday3 !== 'undefined') ? arrData[0].factorHolidaySaturday3 : ''));

            $.ajax({
                type: 'GET',
                url: "{{ url('/shift_master_code/func/api') }}",
                data: {
                    'groupShift': "{{ isset($data[0]->groupShift) ? $data[0]->groupShift : '' }}"
                }
            }).then(function (data) {
                var $newOption = $("<option selected='selected'></option>").val(data[0].comGenCode).text(
                    data[0].value);
                $('#group_shift').append($newOption).trigger('change');
            });
            var flexy = ((typeof arrData[0].flexyFlag !== 'undefined') ? arrData[0].flexyFlag : '');
            // console.log(work_on_holiday);
            if ( flexy == 1 ) {
                $('#check_flexy').prop('checked', true)
            }
            else {
                $('#check_flexy').prop('checked', false)
            }
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('time_management/shift_master_code') }}";
        });

        loadDataGroupShift();

        function loadDataGroupShift() {
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

            $('#group_shift').select2({
                width: '100%',
                placeholder: 'Choose Group Shift',
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
                    url: "{{ url('/shift_master_code/api') }}",
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

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#shift_master_code_form").submit();
        });

        if ($("#shift_master_code_form").length > 0) {
            $("#shift_master_code_form").validate({
            rules: {
                    shift_code: {
                        required: true,
                    },
                },
                messages: {
                    shift_code: {
                        required: "{{ __('tm_shift_master_code.shift_code_required') }}",
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
                        '<i class="fa fa-floppy-o"></i> {{ __("tm_shift_master_code.btn_save") }}'
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
                        url: "{{ url('time_management/shift_master_code/proses') }}",
                        type: "POST",
                        data: $('#shift_master_code_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_shift_master_code.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('time_management/shift_master_code') }}";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("tm_shift_master_code.btn_save") }}'
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
                                '<i class="fa fa-floppy-o"></i> {{ __("tm_shift_master_code.btn_save") }}'
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