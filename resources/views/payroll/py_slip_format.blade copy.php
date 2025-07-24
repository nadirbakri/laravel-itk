<!DOCTYPE html>
<html>

<head>
    <title>{{ __('payroll_slip_format.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-payroll {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .col-0-5 {
            @extend .col;
            flex: 0 0 4.16666667%;
            max-width: 4.16666667%;
        }

        .col-1-5 {
            @extend .col;
            flex: 0 0 8.5%;
            max-width: 12.5%;
        }

        .no-border {
            border-width:0px; 
            border:none;
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

        .select2-results__option[aria-selected=true] {
            display: none;
        }

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="{{ route('payroll', ['moduleID' => 'PY']) }}" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('payroll_slip_format.list') }}</span>
            </a>
        </div>
        <div class="div-form">
            <form id="slip_format_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label
                                for="slip_type">{{ __('payroll_slip_format.label_slip_type') }}</label>
                                <select class="form-control select2" id="slip_type" name="slip_type">
                                <option value="" disabled selected>{{ __('payroll_slip_format.label_select_slip_type') }}</option>
                            </select>
                        </div>                        
                        <input type="text" class="form-control" id="slip_name" name="slip_name" hidden>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <br>
                            <label
                                for="format">{{ __('payroll_slip_format.label_format') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <br>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="up_down"
                                    name="format" value="up_down" checked>
                                <label class="form-radio-label"
                                    for="format">{{ __('payroll_slip_format.label_up_down') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-2">
                        <div class="form-group">
                            <br>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="left_right"
                                    name="format" value="left_right">
                                <label class="form-radio-label"
                                    for="format">{{ __('payroll_slip_format.label_left_right') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="font_size">{{ __('payroll_slip_format.label_font_size') }}</label>
                            <input type="number" min="0" class="form-control" id="font_size" name="font_size"
                                placeholder="{{ __('payroll_slip_format.label_font_size') }}">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label
                                for="number_format">{{ __('payroll_slip_format.label_number_format') }}</label>
                                <select class="form-control select2" id="number_format" name="number_format">
                                <option value="" disabled selected>{{ __('payroll_slip_format.label_select_number_format') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_no">{{ __('payroll_slip_format.label_employee_no') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_no">X----------------X</label>
                        </div>
                    </div>
                    <div class="col-0-5">
                    </div>
                    <div class="col-1-5">
                        <div class="form-group">
                            <label for="join_date">{{ __('payroll_slip_format.label_join_date') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="join_date">X----------------X</label>
                        </div>
                    </div>
                    <div class="col-0-5">
                    </div>
                    <div class="col-1-5">
                        <div class="form-group">
                            <label type="button" for="custom1" id="label_custom1" name="label_custom1"
                            data-toggle="modal" data-edit="false" data-field="" style="width: 100%;" data-target="#modal_custom"
                            >{{ __('payroll_slip_format.label_custom1') }}</label>
                        </div>
                        <input type="text" class="form-control" id="header_custom_1" name="header_custom_1" hidden>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="label_custom1">X----------------X</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_name">{{ __('payroll_slip_format.label_employee_name') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="employee_name">X----------------X</label>
                        </div>
                    </div>
                    <div class="col-0-5">
                    </div>
                    <div class="col-1-5">
                        <div class="form-group">
                            <label for="position">{{ __('payroll_slip_format.label_position') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="position">X----------------X</label>
                        </div>
                    </div>
                    <div class="col-0-5">
                    </div>
                    <div class="col-1-5">
                        <div class="form-group">
                            <label type="button" for="custom2" id="label_custom2" name="label_custom2"
                            data-toggle="modal" data-edit="false" data-field="" style="width: 100%;" data-target="#modal_custom"
                            >{{ __('payroll_slip_format.label_custom2') }}</label>
                        </div>
                        <input type="text" class="form-control" id="header_custom_2" name="header_custom_2" hidden>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="label_custom2">X----------------X</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button"for="allowance" class="allowance" id="allowance1" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction1" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance2" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction2" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance3" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction3" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance4" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction4" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance5" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction5" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance6" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction6" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance7" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction7" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance8" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction8" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance9" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction9" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="allowance" class="allowance" id="allowance10" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_allowance">{{ __('payroll_slip_format.label_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label class="head-title-text">IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label type="button" for="deduction" class="deduction" id="deduction10" data-toggle="modal" data-edit="false" data-field=""
                            data-target="#modal_deduction">{{ __('payroll_slip_format.label_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="total_allowance" class="total_allowance" id="total_allowance">{{ __('payroll_slip_format.label_total_allowance') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group head-title-text">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group head-title-text">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="total_deduction" class="total_deduction" id="total_deduction">{{ __('payroll_slip_format.label_total_deduction') }}</label>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">
                            <label>IDR</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="number">999.999.999,99</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="location" class="location" id="location">{{ __('payroll_slip_format.label_location') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="datetime" class="datetime" id="datetime">{{ __('payroll_slip_format.label_date_time') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="employee_name_ttd" class="employee_name_ttd" id="employee_name_ttd">{{ __('payroll_slip_format.label_employee_name') }}</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_custom"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_slip_format.label_custom') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="custom_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="custom">{{ __('payroll_slip_format.label_custom') }}</label>
                                    <select class="form-control select2" id="custom" name="custom">
                                        <option value="" disabled selected>{{ __('payroll_slip_format.label_select_code') }}</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" id="custom_label" name="custom_label" hidden>
                                <input type="text" class="form-control" id="slip_type_custom" name="slip_type_custom" hidden>
                                <input type="text" class="form-control" id="slip_name_custom" name="slip_name_custom" hidden>
                                <input type="text" class="form-control" id="font_size_custom" name="font_size_custom" hidden>
                                <input type="text" class="form-control" id="number_format_custom" name="number_format_custom" hidden>
                                <input type="text" class="form-control" id="record_function_custom" name="record_function_custom" hidden>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-custom" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_slip_format.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_slip_format.btn_cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_allowance" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_slip_format.label_allowance') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="allowance_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="field_name_allowance">{{ __('payroll_slip_format.label_field_name') }}</label>
                                    <textarea class="form-control" id="field_name_allowance" name="field_name_allowance" rows="3" readonly></textarea>
                                </div>
                                <input type="text" class="form-control" id="slip_type_allowance" name="slip_type_allowance" hidden>
                                <input type="text" class="form-control" id="slip_name_allowance" name="slip_name_allowance" hidden>
                                <input type="text" class="form-control" id="font_size_allowance" name="font_size_allowance" hidden>
                                <input type="text" class="form-control" id="number_format_allowance" name="number_format_allowance" hidden>
                                <input type="text" class="form-control" id="record_function_allowance" name="record_function_allowance" hidden>
                                <input type="text" class="form-control" id="number_allowance" name="number_allowance" hidden>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="component_allowance">{{ __('payroll_slip_format.label_component') }}</label>
                                    <select class="form-control select2" id="component_allowance" name="component_allowance"></select>
                                </div>
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-primary" name="btn-add-allowance" id="btn-add-allowance">
                                        {{ __('payroll_slip_format.btn_add') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="field_label_allowance">{{ __('payroll_slip_format.label_field_label') }}</label>
                                    <input class="form-control" id="field_label_allowance" name="field_label_allowance"
                                    placeholder="{{ __('payroll_slip_format.label_field_label') }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-allowance" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_slip_format.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_slip_format.btn_cancel') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_deduction" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('payroll_slip_format.label_deduction') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deduction_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="field_name_deduction">{{ __('payroll_slip_format.label_field_name') }}</label>
                                    <textarea class="form-control" id="field_name_deduction" name="field_name_deduction" rows="3" readonly></textarea>
                                </div>
                                <input type="text" class="form-control" id="slip_type_deduction" name="slip_type_deduction" hidden>
                                <input type="text" class="form-control" id="slip_name_deduction" name="slip_name_deduction" hidden>
                                <input type="text" class="form-control" id="font_size_deduction" name="font_size_deduction" hidden>
                                <input type="text" class="form-control" id="number_format_deduction" name="number_format_deduction" hidden>
                                <input type="text" class="form-control" id="record_function_deduction" name="record_function_deduction" hidden>
                                <input type="text" class="form-control" id="number_deduction" name="number_deduction" hidden>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="component_deduction">{{ __('payroll_slip_format.label_component') }}</label>
                                    <select class="form-control select2" id="component_deduction" name="component_deduction"></select>
                                </div>
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <br>
                                    <button type="button" class="btn btn-primary" name="btn-add-deduction" id="btn-add-deduction">
                                        {{ __('payroll_slip_format.btn_add') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="field_label_deduction">{{ __('payroll_slip_format.label_field_label') }}</label>
                                    <input class="form-control" id="field_label_deduction" name="field_label_deduction"
                                    placeholder="{{ __('payroll_slip_format.label_field_label') }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-deduction" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('payroll_slip_format.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('payroll_slip_format.btn_cancel') }}</button>
                        </div>
                    </form>
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
                        <span class="title-text-notification">{{ __('payroll_report_format.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
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
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var table = null;
        var slipType = null;

        function isEmpty(obj) {
            return Object.keys(obj).length === 0;
        }

        $('#notification_success').on('hidden.bs.modal', function () {
            $('#notification_success').modal('hide');
        })

        $('#slip_type, input[name="format"]').on('change', function () {
            slipType = $('#slip_type').val();
            if ($('#up_down').is(':checked')) {
                $('#slip_name').val(slipType + '_UD');
            }
            else {
                $('#slip_name').val(slipType + '_LR');
            }
            $.ajax({
                type: 'GET',
                url: "{{ url('/payroll/slip_format/detail_data') }}",
                data: {
                    'slipCode': $('#slip_type').val(),
                    'slipName': $('#slip_name').val()
                },
                success: function (response) {      
                    if (!isEmpty(response)) {
                        $("#record_function_custom").val("Edit");
                        $("#record_function_allowance").val("Edit");
                        $("#record_function_deduction").val("Edit");
                        
                        if(response.headerCustom1 != null){
                            $("#label_custom1").html(response.headerCustom1);
                            $("#label_custom1").attr('data-edit', "true");
                            $("#label_custom1").attr('data-field', response.headerCustom1);
                        }
                        if(response.headerCustom2 != null){
                            $("#label_custom2").html(response.headerCustom2);
                            $("#label_custom2").attr('data-edit', "true");
                            $("#label_custom2").attr('data-field', response.headerCustom2);
                        }
                        if(response.allowance1Field != null){
                            $("#allowance1").html(response.allowance1Label);
                            $("#allowance1").attr('data-edit', "true");
                            $("#allowance1").attr('data-field', response.allowance1Field);
                        }
                        if(response.allowance2Field != null){
                            $("#allowance2").html(response.allowance2Label);
                            $("#allowance2").attr('data-edit', "true");
                            $("#allowance2").attr('data-field', response.allowance2Field);
                        }
                        if(response.allowance3Field != null){
                            $("#allowance3").html(response.allowance3Label);
                            $("#allowance3").attr('data-edit', "true");
                            $("#allowance3").attr('data-field', response.allowance3Field);
                        }
                        if(response.allowance4Field != null){
                            $("#allowance4").html(response.allowance4Label);
                            $("#allowance4").attr('data-edit', "true");
                            $("#allowance4").attr('data-field', response.allowance4Field);
                        }
                        if(response.allowance5Field != null){
                            $("#allowance5").html(response.allowance5Label);
                            $("#allowance5").attr('data-edit', "true");
                            $("#allowance5").attr('data-field', response.allowance5Field);
                        }
                        if(response.allowance6Field != null){
                            $("#allowance6").html(response.allowance6Label);
                            $("#allowance6").attr('data-edit', "true");
                            $("#allowance6").attr('data-field', response.allowance6Field);
                        }
                        if(response.allowance7Field != null){
                            $("#allowance7").html(response.allowance7Label);
                            $("#allowance7").attr('data-edit', "true");
                            $("#allowance7").attr('data-field', response.allowance7Field);
                        }
                        if(response.allowance8Field != null){
                            $("#allowance8").html(response.allowance8Label);
                            $("#allowance8").attr('data-edit', "true");
                            $("#allowance8").attr('data-field', response.allowance8Field);
                        }
                        if(response.allowance9Field != null){
                            $("#allowance9").html(response.allowance9Label);
                            $("#allowance9").attr('data-edit', "true");
                            $("#allowance9").attr('data-field', response.allowance9Field);
                        }
                        if(response.allowance10Field != null){
                            $("#allowance10").html(response.allowance10Label);
                            $("#allowance10").attr('data-edit', "true");
                            $("#allowance10").attr('data-field', response.allowance10Field);
                        }
                        if(response.deduction1Field != null){
                            $("#deduction1").html(response.deduction1Label);
                            $("#deduction1").attr('data-edit', "true");
                            $("#deduction1").attr('data-field', response.deduction1Field);
                        }
                        if(response.deduction2Field != null){
                            $("#deduction2").html(response.deduction2Label);
                            $("#deduction2").attr('data-edit', "true");
                            $("#deduction2").attr('data-field', response.deduction2Field);
                        }
                        if(response.deduction3Field != null){
                            $("#deduction3").html(response.deduction3Label);
                            $("#deduction3").attr('data-edit', "true");
                            $("#deduction3").attr('data-field', response.deduction3Field);
                        }
                        if(response.deduction4Field != null){
                            $("#deduction4").html(response.deduction4Label);
                            $("#deduction4").attr('data-edit', "true");
                            $("#deduction4").attr('data-field', response.deduction4Field);
                        }
                        if(response.deduction5Field != null){
                            $("#deduction5").html(response.deduction5Label);
                            $("#deduction5").attr('data-edit', "true");
                            $("#deduction5").attr('data-field', response.deduction5Field);
                        }
                        if(response.deduction6Field != null){
                            $("#deduction6").html(response.deduction6Label);
                            $("#deduction6").attr('data-edit', "true");
                            $("#deduction6").attr('data-field', response.deduction6Field);
                        }
                        if(response.deduction7Field != null){
                            $("#deduction7").html(response.deduction7Label);
                            $("#deduction7").attr('data-edit', "true");
                            $("#deduction7").attr('data-field', response.deduction7Field);
                        }
                        if(response.deduction8Field != null){
                            $("#deduction8").html(response.deduction8Label);
                            $("#deduction8").attr('data-edit', "true");
                            $("#deduction8").attr('data-field', response.deduction8Field);
                        }
                        if(response.deduction9Field != null){
                            $("#deduction9").html(response.deduction9Label);
                            $("#deduction9").attr('data-edit', "true");
                            $("#deduction9").attr('data-field', response.deduction9Field);
                        }
                        if(response.deduction10Field != null){
                            $("#deduction10").html(response.deduction10Label);
                            $("#deduction10").attr('data-edit', "true");
                            $("#deduction10").attr('data-field', response.deduction10Field);
                        }
                        // $("#label_custom1").html(response.headerCustom1 == null ? "{{ __('payroll_slip_format.label_custom1') }}" : response.headerCustom1);
                        // $("#label_custom2").html(response.headerCustom2 == null ? "{{ __('payroll_slip_format.label_custom2') }}" : response.headerCustom2);
                        // $("#allowance1").html(response.allowance1Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance1Field);
                        // $("#allowance2").html(response.allowance2Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance2Field);
                        // $("#allowance3").html(response.allowance3Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance3Field);
                        // $("#allowance4").html(response.allowance4Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance4Field);
                        // $("#allowance5").html(response.allowance5Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance5Field);
                        // $("#allowance6").html(response.allowance6Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance6Field);
                        // $("#allowance7").html(response.allowance7Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance7Field);
                        // $("#allowance8").html(response.allowance8Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance8Field);
                        // $("#allowance9").html(response.allowance9Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance9Field);
                        // $("#allowance10").html(response.allowance10Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.allowance10Field);
                        // $("#deduction1").html(response.deduction1Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction1Field);
                        // $("#deduction2").html(response.deduction2Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction2Field);
                        // $("#deduction3").html(response.deduction3Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction3Field);
                        // $("#deduction4").html(response.deduction4Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction4Field);
                        // $("#deduction5").html(response.deduction5Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction5Field);
                        // $("#deduction6").html(response.deduction6Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction6Field);
                        // $("#deduction7").html(response.deduction7Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction7Field);
                        // $("#deduction8").html(response.deduction8Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction8Field);
                        // $("#deduction9").html(response.deduction9Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction9Field);
                        // $("#deduction10").html(response.deduction10Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.deduction10Field);
                    }
                    else {
                        $("#record_function_custom").val("New");
                        $("#record_function_allowance").val("New");
                        $("#record_function_deduction").val("New");
                        $("#label_custom1").html("{{ __('payroll_slip_format.label_custom1') }}");
                        $("#label_custom2").html("{{ __('payroll_slip_format.label_custom2') }}");
                        $("#allowance1").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance2").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance3").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance4").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance5").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance6").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance7").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance8").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance9").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#allowance10").html("{{ __('payroll_slip_format.label_allowance') }}");
                        $("#deduction1").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction2").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction3").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction4").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction5").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction6").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction7").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction8").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction9").html("{{ __('payroll_slip_format.label_deduction') }}");
                        $("#deduction10").html("{{ __('payroll_slip_format.label_deduction') }}");
                    }
                }
            });
            // console.log($('#record_function').val());
        });

        $('#label_custom1').on('click', function () {
            $('#custom').on('change', function () {
                var custom = $('#custom').val();
                $('#header_custom_1').val(custom);
                // console.log($('#header_custom_1').val());
            });
            $('#custom_label').val($(this).html());
            $('#slip_type_custom').val($('#slip_type').val());
            $('#slip_name_custom').val($('#slip_name').val());
            $('#font_size_custom').val($('#font_size').val());
            $('#font_size_custom').val($('#font_size').val());
            $('#number_format_custom').val($('#number_format').val());
        });

        $('#label_custom2').on('click', function () {
            $('#custom').on('change', function () {
                var custom = $('#custom').val();
                $('#header_custom_2').val(custom);
            });
            $('#custom_label').val($(this).html());
            $('#slip_type_custom').val($('#slip_type').val());
            $('#slip_name_custom').val($('#slip_name').val());
            $('#font_size_custom').val($('#font_size').val());
            $('#number_format_custom').val($('#number_format').val());
        });

        $('#allowance1').on('click', function () {
            $('#number_allowance').val('1');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
        });
        $('#allowance2').on('click', function () {
            $('#number_allowance').val('2');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance3').on('click', function () {
            $('#number_allowance').val('3');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance4').on('click', function () {
            $('#number_allowance').val('4');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance5').on('click', function () {
            $('#number_allowance').val('5');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance6').on('click', function () {
            $('#number_allowance').val('6');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance7').on('click', function () {
            $('#number_allowance').val('7');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance8').on('click', function () {
            $('#number_allowance').val('8');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance9').on('click', function () {
            $('#number_allowance').val('9');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });
        $('#allowance10').on('click', function () {
            $('#number_allowance').val('10');
            $('#field_label_allowance').val($(this).html());
            $('#slip_type_allowance').val($('#slip_type').val());
            $('#slip_name_allowance').val($('#slip_name').val());
            $('#font_size_allowance').val($('#font_size').val());
            $('#number_format_allowance').val($('#number_format').val());
            $('#field_name_allowance').val($(this).data('field'));
            
        });

        $('#deduction1').on('click', function () {
            $('#number_deduction').val('1');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction2').on('click', function () {
            $('#number_deduction').val('2');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction3').on('click', function () {
            $('#number_deduction').val('3');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction4').on('click', function () {
            $('#number_deduction').val('4');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction5').on('click', function () {
            $('#number_deduction').val('5');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction6').on('click', function () {
            $('#number_deduction').val('6');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction7').on('click', function () {
            $('#number_deduction').val('7');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction8').on('click', function () {
            $('#number_deduction').val('8');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction9').on('click', function () {
            $('#number_deduction').val('9');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });
        $('#deduction10').on('click', function () {
            $('#number_deduction').val('10');
            $('#field_label_deduction').val($(this).html());
            $('#slip_type_deduction').val($('#slip_type').val());
            $('#slip_name_deduction').val($('#slip_name').val());
            $('#font_size_deduction').val($('#font_size').val());
            $('#number_format_deduction').val($('#number_format').val());
            $('#field_name_deduction').val($(this).data('field'));
            
        });

        loadDataFormat();
        loadDataSlipType();
        loadDataCustom();
        loadDataComponent();

        function loadDataSlipType() {
            var listSlipType = [
                {id:"Salary", text:"Salary"},
                {id:"THR", text:"THR"},
                {id:"Bonus", text:"Bonus"}
            ];

            $('#slip_type').select2({
                data : listSlipType,
                width : '100%',
                placeholder : "Choose Slip Type",
                allowClear : true
            });
        }

        function loadDataFormat() {
            var listFormat = [
                {id:"#,##0", text:"#,##0"},
                {id:"#,##0.00", text:"#,##0.00"}
            ];

            $('#number_format').select2({
                data : listFormat,
                width : '100%',
                placeholder : "Choose Number Format",
                allowClear : true
            });
        }

        var employee = $('employee_no').val();

        $.ajax({
            type: 'GET',
            url: "{{ url('/employee_no_slip_format/api') }}",
            data: {
                'employeeNo': employee
            }
        }).then(function (data) {
            // console.log(data);
            var option = $('<option/>', {
                id: data[0].costCenterCode,
                title: data[0].costCenterDescription,
                text: data[0].costCenterCode
            });
            $("#cost_center").append(option).attr('data-alias', 'yourvalue').trigger(
                'change');
            $("#cost_center").trigger({
                type: 'select2:select',
                params: {
                    id: data[0].costCenterCode,
                    text: data[0].costCenterCode,
                    data: data[0]
                }
            });
        });

        function loadDataCustom() {
            var listFormat = [
                {id:"RankingCode", text:"Ranking Code"},
                {id:"GradeCode", text:"Grade Code"},
                {id:"GroupCode", text:"Group Code"},
                {id:"WorkNatureCode", text:"Work Nature Code"},
                {id:"LocationCode", text:"Location Code"}
            ];

            $('#custom').select2({
                data : listFormat,
                width : '100%',
                placeholder : "Choose Number Format",
                allowClear : true
            });
        }

        $('#component_allowance').on('change', function () {
            var component_allowance = $('#component_allowance').val();
            $('#btn-add-allowance').on('click', function () {
                $('#field_name_allowance').val(component_allowance);
            });
        });

        $('#component_deduction').on('change', function () {
            var component_deduction = $('#component_deduction').val();
            $('#btn-add-deduction').on('click', function () {
                $('#field_name_deduction').val(component_deduction);
            });
        });

        function loadDataComponent() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.fieldName + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#component_allowance, #component_deduction').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Field Name</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#component_allowance, #component_deduction').select2({
                width: '100%',
                placeholder: 'Choose Field Name',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/field_name_salary_component/api') }}",
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
                                    text: item.fieldName,
                                    id: item.fieldName,
                                    title: item.description,
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

        $("#btn-save-custom").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#custom_form").submit();
        });

        if ($("#custom_form").length > 0) {
            $("#custom_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('payroll/slip_format/custom/proses') }}",
                        type: "POST",
                        data: $('#custom_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-custom").prop("disabled", false);
                                $("#btn-save-custom").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                
                                $('#modal_custom').modal('hide');
                                
                                if (!isEmpty(response.data)) {
                                    $("#record_function").val("Edit");
                                    if(response.data.headerCustom1 != null){
                                        $("#label_custom1").html(response.data.headerCustom1);
                                        $("#label_custom1").attr('data-edit', "true");
                                        $("#label_custom1").attr('data-field', response.data.headerCustom1);
                                    }
                                    if(response.data.headerCustom2 != null){
                                        $("#label_custom2").html(response.data.headerCustom2);
                                        $("#label_custom2").attr('data-edit', "true");
                                        $("#label_custom2").attr('data-field', response.data.headerCustom2);
                                    }
                                    if(response.data.allowance1Field != null){
                                        $("#allowance1").html(response.data.allowance1Field);
                                        $("#allowance1").attr('data-edit', "true");
                                        $("#allowance1").attr('data-field', response.data.allowance1Field);
                                    }
                                    if(response.data.allowance2Field != null){
                                        $("#allowance2").html(response.data.allowance2Field);
                                        $("#allowance2").attr('data-edit', "true");
                                        $("#allowance2").attr('data-field', response.data.allowance2Field);
                                    }
                                    if(response.data.allowance3Field != null){
                                        $("#allowance3").html(response.data.allowance3Field);
                                        $("#allowance3").attr('data-edit', "true");
                                        $("#allowance3").attr('data-field', response.data.allowance3Field);
                                    }
                                    if(response.data.allowance4Field != null){
                                        $("#allowance4").html(response.data.allowance4Field);
                                        $("#allowance4").attr('data-edit', "true");
                                        $("#allowance4").attr('data-field', response.data.allowance4Field);
                                    }
                                    if(response.data.allowance5Field != null){
                                        $("#allowance5").html(response.data.allowance5Field);
                                        $("#allowance5").attr('data-edit', "true");
                                        $("#allowance5").attr('data-field', response.data.allowance5Field);
                                    }
                                    if(response.data.allowance6Field != null){
                                        $("#allowance6").html(response.data.allowance6Field);
                                        $("#allowance6").attr('data-edit', "true");
                                        $("#allowance6").attr('data-field', response.data.allowance6Field);
                                    }
                                    if(response.data.allowance7Field != null){
                                        $("#allowance7").html(response.data.allowance7Field);
                                        $("#allowance7").attr('data-edit', "true");
                                        $("#allowance7").attr('data-field', response.data.allowance7Field);
                                    }
                                    if(response.data.allowance8Field != null){
                                        $("#allowance8").html(response.data.allowance8Field);
                                        $("#allowance8").attr('data-edit', "true");
                                        $("#allowance8").attr('data-field', response.data.allowance8Field);
                                    }
                                    if(response.data.allowance9Field != null){
                                        $("#allowance9").html(response.data.allowance9Field);
                                        $("#allowance9").attr('data-edit', "true");
                                        $("#allowance9").attr('data-field', response.data.allowance9Field);
                                    }
                                    if(response.data.allowance10Field != null){
                                        $("#allowance10").html(response.data.allowance10Field);
                                        $("#allowance10").attr('data-edit', "true");
                                        $("#allowance10").attr('data-field', response.data.allowance10Field);
                                    }
                                    if(response.data.deduction1Field != null){
                                        $("#deduction1").html(response.data.deduction1Field);
                                        $("#deduction1").attr('data-edit', "true");
                                        $("#deduction1").attr('data-field', response.data.deduction1Field);
                                    }
                                    if(response.data.deduction2Field != null){
                                        $("#deduction2").html(response.data.deduction2Field);
                                        $("#deduction2").attr('data-edit', "true");
                                        $("#deduction2").attr('data-field', response.data.deduction2Field);
                                    }
                                    if(response.data.deduction3Field != null){
                                        $("#deduction3").html(response.data.deduction3Field);
                                        $("#deduction3").attr('data-edit', "true");
                                        $("#deduction3").attr('data-field', response.data.deduction3Field);
                                    }
                                    if(response.data.deduction4Field != null){
                                        $("#deduction4").html(response.data.deduction4Field);
                                        $("#deduction4").attr('data-edit', "true");
                                        $("#deduction4").attr('data-field', response.data.deduction4Field);
                                    }
                                    if(response.data.deduction5Field != null){
                                        $("#deduction5").html(response.data.deduction5Field);
                                        $("#deduction5").attr('data-edit', "true");
                                        $("#deduction5").attr('data-field', response.data.deduction5Field);
                                    }
                                    if(response.data.deduction6Field != null){
                                        $("#deduction6").html(response.data.deduction6Field);
                                        $("#deduction6").attr('data-edit', "true");
                                        $("#deduction6").attr('data-field', response.data.deduction6Field);
                                    }
                                    if(response.data.deduction7Field != null){
                                        $("#deduction7").html(response.deduction7Field);
                                        $("#deduction7").attr('data-edit', "true");
                                        $("#deduction7").attr('data-field', response.data.deduction7Field);
                                    }
                                    if(response.data.deduction8Field != null){
                                        $("#deduction8").html(response.data.deduction8Field);
                                        $("#deduction8").attr('data-edit', "true");
                                        $("#deduction8").attr('data-field', response.data.deduction8Field);
                                    }
                                    if(response.data.deduction9Field != null){
                                        $("#deduction9").html(response.data.deduction9Field);
                                        $("#deduction9").attr('data-edit', "true");
                                        $("#deduction9").attr('data-field', response.data.deduction9Field);
                                    }
                                    if(response.data.deduction10Field != null){
                                        $("#deduction10").html(response.data.deduction10Field);
                                        $("#deduction10").attr('data-edit', "true");
                                        $("#deduction10").attr('data-field', response.data.deduction10Field);
                                    }
                                    // $("#label_custom1").html(response.data.headerCustom1 == null ? "{{ __('payroll_slip_format.label_custom1') }}" : response.data.headerCustom1);
                                    // $("#label_custom2").html(response.data.headerCustom2 == null ? "{{ __('payroll_slip_format.label_custom2') }}" : response.data.headerCustom2);
                                    // $("#allowance1").html(response.data.allowance1Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance1Field);
                                    // $("#allowance2").html(response.data.allowance2Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance2Field);
                                    // $("#allowance3").html(response.data.allowance3Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance3Field);
                                    // $("#allowance4").html(response.data.allowance4Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance4Field);
                                    // $("#allowance5").html(response.data.allowance5Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance5Field);
                                    // $("#allowance6").html(response.data.allowance6Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance6Field);
                                    // $("#allowance7").html(response.data.allowance7Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance7Field);
                                    // $("#allowance8").html(response.data.allowance8Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance8Field);
                                    // $("#allowance9").html(response.data.allowance9Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance9Field);
                                    // $("#allowance10").html(response.data.allowance10Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance10Field);
                                    // $("#deduction1").html(response.data.deduction1Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction1Field);
                                    // $("#deduction2").html(response.data.deduction2Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction2Field);
                                    // $("#deduction3").html(response.data.deduction3Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction3Field);
                                    // $("#deduction4").html(response.data.deduction4Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction4Field);
                                    // $("#deduction5").html(response.data.deduction5Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction5Field);
                                    // $("#deduction6").html(response.data.deduction6Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction6Field);
                                    // $("#deduction7").html(response.data.deduction7Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction7Field);
                                    // $("#deduction8").html(response.data.deduction8Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction8Field);
                                    // $("#deduction9").html(response.data.deduction9Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction9Field);
                                    // $("#deduction10").html(response.data.deduction10Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction10Field);
                                }
                                else {
                                    $("#record_function").val("New");
                                    $("#label_custom1").html("{{ __('payroll_slip_format.label_custom1') }}");
                                    $("#label_custom2").html("{{ __('payroll_slip_format.label_custom2') }}");
                                    $("#allowance1").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance2").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance3").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance4").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance5").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance6").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance7").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance8").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance9").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance10").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#deduction1").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction2").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction3").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction4").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction5").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction6").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction7").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction8").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction9").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction10").html("{{ __('payroll_slip_format.label_deduction') }}");
                                }
                            } else {
                                $("#btn-save-custom").prop("disabled", false);
                                $("#btn-save-custom").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
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
                            $("#btn-save-custom").prop("disabled", false);
                            $("#btn-save-custom").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            });
        }

        $("#btn-save-allowance").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#allowance_form").submit();
        });

        if ($("#allowance_form").length > 0) {
            $("#allowance_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('payroll/slip_format/allowance/proses') }}",
                        type: "POST",
                        data: $('#allowance_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-allowance").prop("disabled", false);
                                $("#btn-save-allowance").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);

                                $('#modal_allowance').modal('hide');
                                
                                if (!isEmpty(response.data)) {
                                    $("#record_function").val("Edit");
                                    if(response.data.headerCustom1 != null){
                                        $("#label_custom1").html(response.data.headerCustom1);
                                        $("#label_custom1").attr('data-edit', "true");
                                        $("#label_custom1").attr('data-field', response.data.headerCustom1);
                                    }
                                    if(response.data.headerCustom2 != null){
                                        $("#label_custom2").html(response.data.headerCustom2);
                                        $("#label_custom2").attr('data-edit', "true");
                                        $("#label_custom2").attr('data-field', response.data.headerCustom2);
                                    }
                                    if(response.data.allowance1Field != null){
                                        $("#allowance1").html(response.data.allowance1Field);
                                        $("#allowance1").attr('data-edit', "true");
                                        $("#allowance1").attr('data-field', response.data.allowance1Field);
                                    }
                                    if(response.data.allowance2Field != null){
                                        $("#allowance2").html(response.data.allowance2Field);
                                        $("#allowance2").attr('data-edit', "true");
                                        $("#allowance2").attr('data-field', response.data.allowance2Field);
                                    }
                                    if(response.data.allowance3Field != null){
                                        $("#allowance3").html(response.data.allowance3Field);
                                        $("#allowance3").attr('data-edit', "true");
                                        $("#allowance3").attr('data-field', response.data.allowance3Field);
                                    }
                                    if(response.data.allowance4Field != null){
                                        $("#allowance4").html(response.data.allowance4Field);
                                        $("#allowance4").attr('data-edit', "true");
                                        $("#allowance4").attr('data-field', response.data.allowance4Field);
                                    }
                                    if(response.data.allowance5Field != null){
                                        $("#allowance5").html(response.data.allowance5Field);
                                        $("#allowance5").attr('data-edit', "true");
                                        $("#allowance5").attr('data-field', response.data.allowance5Field);
                                    }
                                    if(response.data.allowance6Field != null){
                                        $("#allowance6").html(response.data.allowance6Field);
                                        $("#allowance6").attr('data-edit', "true");
                                        $("#allowance6").attr('data-field', response.data.allowance6Field);
                                    }
                                    if(response.data.allowance7Field != null){
                                        $("#allowance7").html(response.data.allowance7Field);
                                        $("#allowance7").attr('data-edit', "true");
                                        $("#allowance7").attr('data-field', response.data.allowance7Field);
                                    }
                                    if(response.data.allowance8Field != null){
                                        $("#allowance8").html(response.data.allowance8Field);
                                        $("#allowance8").attr('data-edit', "true");
                                        $("#allowance8").attr('data-field', response.data.allowance8Field);
                                    }
                                    if(response.data.allowance9Field != null){
                                        $("#allowance9").html(response.data.allowance9Field);
                                        $("#allowance9").attr('data-edit', "true");
                                        $("#allowance9").attr('data-field', response.data.allowance9Field);
                                    }
                                    if(response.data.allowance10Field != null){
                                        $("#allowance10").html(response.data.allowance10Field);
                                        $("#allowance10").attr('data-edit', "true");
                                        $("#allowance10").attr('data-field', response.data.allowance10Field);
                                    }
                                    if(response.data.deduction1Field != null){
                                        $("#deduction1").html(response.data.deduction1Field);
                                        $("#deduction1").attr('data-edit', "true");
                                        $("#deduction1").attr('data-field', response.data.deduction1Field);
                                    }
                                    if(response.data.deduction2Field != null){
                                        $("#deduction2").html(response.data.deduction2Field);
                                        $("#deduction2").attr('data-edit', "true");
                                        $("#deduction2").attr('data-field', response.data.deduction2Field);
                                    }
                                    if(response.data.deduction3Field != null){
                                        $("#deduction3").html(response.data.deduction3Field);
                                        $("#deduction3").attr('data-edit', "true");
                                        $("#deduction3").attr('data-field', response.data.deduction3Field);
                                    }
                                    if(response.data.deduction4Field != null){
                                        $("#deduction4").html(response.data.deduction4Field);
                                        $("#deduction4").attr('data-edit', "true");
                                        $("#deduction4").attr('data-field', response.data.deduction4Field);
                                    }
                                    if(response.data.deduction5Field != null){
                                        $("#deduction5").html(response.data.deduction5Field);
                                        $("#deduction5").attr('data-edit', "true");
                                        $("#deduction5").attr('data-field', response.data.deduction5Field);
                                    }
                                    if(response.data.deduction6Field != null){
                                        $("#deduction6").html(response.data.deduction6Field);
                                        $("#deduction6").attr('data-edit', "true");
                                        $("#deduction6").attr('data-field', response.data.deduction6Field);
                                    }
                                    if(response.data.deduction7Field != null){
                                        $("#deduction7").html(response.deduction7Field);
                                        $("#deduction7").attr('data-edit', "true");
                                        $("#deduction7").attr('data-field', response.data.deduction7Field);
                                    }
                                    if(response.data.deduction8Field != null){
                                        $("#deduction8").html(response.data.deduction8Field);
                                        $("#deduction8").attr('data-edit', "true");
                                        $("#deduction8").attr('data-field', response.data.deduction8Field);
                                    }
                                    if(response.data.deduction9Field != null){
                                        $("#deduction9").html(response.data.deduction9Field);
                                        $("#deduction9").attr('data-edit', "true");
                                        $("#deduction9").attr('data-field', response.data.deduction9Field);
                                    }
                                    if(response.data.deduction10Field != null){
                                        $("#deduction10").html(response.data.deduction10Field);
                                        $("#deduction10").attr('data-edit', "true");
                                        $("#deduction10").attr('data-field', response.data.deduction10Field);
                                    }
                                    // $("#label_custom1").html(response.data.headerCustom1 == null ? "{{ __('payroll_slip_format.label_custom1') }}" : response.data.headerCustom1);
                                    // $("#label_custom2").html(response.data.headerCustom2 == null ? "{{ __('payroll_slip_format.label_custom2') }}" : response.data.headerCustom2);
                                    // $("#allowance1").html(response.data.allowance1Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance1Field);
                                    // $("#allowance2").html(response.data.allowance2Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance2Field);
                                    // $("#allowance3").html(response.data.allowance3Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance3Field);
                                    // $("#allowance4").html(response.data.allowance4Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance4Field);
                                    // $("#allowance5").html(response.data.allowance5Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance5Field);
                                    // $("#allowance6").html(response.data.allowance6Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance6Field);
                                    // $("#allowance7").html(response.data.allowance7Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance7Field);
                                    // $("#allowance8").html(response.data.allowance8Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance8Field);
                                    // $("#allowance9").html(response.data.allowance9Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance9Field);
                                    // $("#allowance10").html(response.data.allowance10Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance10Field);
                                    // $("#deduction1").html(response.data.deduction1Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction1Field);
                                    // $("#deduction2").html(response.data.deduction2Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction2Field);
                                    // $("#deduction3").html(response.data.deduction3Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction3Field);
                                    // $("#deduction4").html(response.data.deduction4Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction4Field);
                                    // $("#deduction5").html(response.data.deduction5Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction5Field);
                                    // $("#deduction6").html(response.data.deduction6Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction6Field);
                                    // $("#deduction7").html(response.data.deduction7Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction7Field);
                                    // $("#deduction8").html(response.data.deduction8Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction8Field);
                                    // $("#deduction9").html(response.data.deduction9Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction9Field);
                                    // $("#deduction10").html(response.data.deduction10Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction10Field);
                                }
                                else {
                                    $("#record_function").val("New");
                                    $("#label_custom1").html("{{ __('payroll_slip_format.label_custom1') }}");
                                    $("#label_custom2").html("{{ __('payroll_slip_format.label_custom2') }}");
                                    $("#allowance1").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance2").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance3").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance4").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance5").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance6").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance7").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance8").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance9").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance10").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#deduction1").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction2").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction3").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction4").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction5").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction6").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction7").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction8").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction9").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction10").html("{{ __('payroll_slip_format.label_deduction') }}");
                                }
                            } else {
                                $("#btn-save-allowance").prop("disabled", false);
                                $("#btn-save-allowance").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
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
                            $("#btn-save-allowance").prop("disabled", false);
                            $("#btn-save-allowance").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            });
        }

        $("#btn-save-deduction").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#deduction_form").submit();
        });

        if ($("#deduction_form").length > 0) {
            $("#deduction_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('payroll/slip_format/deduction/proses') }}",
                        type: "POST",
                        data: $('#deduction_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-deduction").prop("disabled", false);
                                $("#btn-save-deduction").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);

                                $('#modal_deduction').modal('hide');
                                
                                if (!isEmpty(response.data)) {
                                    $("#record_function").val("Edit");
                                    if(response.data.headerCustom1 != null){
                                        $("#label_custom1").html(response.data.headerCustom1);
                                        $("#label_custom1").attr('data-edit', "true");
                                        $("#label_custom1").attr('data-field', response.data.headerCustom1);
                                    }
                                    if(response.data.headerCustom2 != null){
                                        $("#label_custom2").html(response.data.headerCustom2);
                                        $("#label_custom2").attr('data-edit', "true");
                                        $("#label_custom2").attr('data-field', response.data.headerCustom2);
                                    }
                                    if(response.data.allowance1Field != null){
                                        $("#allowance1").html(response.data.allowance1Field);
                                        $("#allowance1").attr('data-edit', "true");
                                        $("#allowance1").attr('data-field', response.data.allowance1Field);
                                    }
                                    if(response.data.allowance2Field != null){
                                        $("#allowance2").html(response.data.allowance2Field);
                                        $("#allowance2").attr('data-edit', "true");
                                        $("#allowance2").attr('data-field', response.data.allowance2Field);
                                    }
                                    if(response.data.allowance3Field != null){
                                        $("#allowance3").html(response.data.allowance3Field);
                                        $("#allowance3").attr('data-edit', "true");
                                        $("#allowance3").attr('data-field', response.data.allowance3Field);
                                    }
                                    if(response.data.allowance4Field != null){
                                        $("#allowance4").html(response.data.allowance4Field);
                                        $("#allowance4").attr('data-edit', "true");
                                        $("#allowance4").attr('data-field', response.data.allowance4Field);
                                    }
                                    if(response.data.allowance5Field != null){
                                        $("#allowance5").html(response.data.allowance5Field);
                                        $("#allowance5").attr('data-edit', "true");
                                        $("#allowance5").attr('data-field', response.data.allowance5Field);
                                    }
                                    if(response.data.allowance6Field != null){
                                        $("#allowance6").html(response.data.allowance6Field);
                                        $("#allowance6").attr('data-edit', "true");
                                        $("#allowance6").attr('data-field', response.data.allowance6Field);
                                    }
                                    if(response.data.allowance7Field != null){
                                        $("#allowance7").html(response.data.allowance7Field);
                                        $("#allowance7").attr('data-edit', "true");
                                        $("#allowance7").attr('data-field', response.data.allowance7Field);
                                    }
                                    if(response.data.allowance8Field != null){
                                        $("#allowance8").html(response.data.allowance8Field);
                                        $("#allowance8").attr('data-edit', "true");
                                        $("#allowance8").attr('data-field', response.data.allowance8Field);
                                    }
                                    if(response.data.allowance9Field != null){
                                        $("#allowance9").html(response.data.allowance9Field);
                                        $("#allowance9").attr('data-edit', "true");
                                        $("#allowance9").attr('data-field', response.data.allowance9Field);
                                    }
                                    if(response.data.allowance10Field != null){
                                        $("#allowance10").html(response.data.allowance10Field);
                                        $("#allowance10").attr('data-edit', "true");
                                        $("#allowance10").attr('data-field', response.data.allowance10Field);
                                    }
                                    if(response.data.deduction1Field != null){
                                        $("#deduction1").html(response.data.deduction1Field);
                                        $("#deduction1").attr('data-edit', "true");
                                        $("#deduction1").attr('data-field', response.data.deduction1Field);
                                    }
                                    if(response.data.deduction2Field != null){
                                        $("#deduction2").html(response.data.deduction2Field);
                                        $("#deduction2").attr('data-edit', "true");
                                        $("#deduction2").attr('data-field', response.data.deduction2Field);
                                    }
                                    if(response.data.deduction3Field != null){
                                        $("#deduction3").html(response.data.deduction3Field);
                                        $("#deduction3").attr('data-edit', "true");
                                        $("#deduction3").attr('data-field', response.data.deduction3Field);
                                    }
                                    if(response.data.deduction4Field != null){
                                        $("#deduction4").html(response.data.deduction4Field);
                                        $("#deduction4").attr('data-edit', "true");
                                        $("#deduction4").attr('data-field', response.data.deduction4Field);
                                    }
                                    if(response.data.deduction5Field != null){
                                        $("#deduction5").html(response.data.deduction5Field);
                                        $("#deduction5").attr('data-edit', "true");
                                        $("#deduction5").attr('data-field', response.data.deduction5Field);
                                    }
                                    if(response.data.deduction6Field != null){
                                        $("#deduction6").html(response.data.deduction6Field);
                                        $("#deduction6").attr('data-edit', "true");
                                        $("#deduction6").attr('data-field', response.data.deduction6Field);
                                    }
                                    if(response.data.deduction7Field != null){
                                        $("#deduction7").html(response.deduction7Field);
                                        $("#deduction7").attr('data-edit', "true");
                                        $("#deduction7").attr('data-field', response.data.deduction7Field);
                                    }
                                    if(response.data.deduction8Field != null){
                                        $("#deduction8").html(response.data.deduction8Field);
                                        $("#deduction8").attr('data-edit', "true");
                                        $("#deduction8").attr('data-field', response.data.deduction8Field);
                                    }
                                    if(response.data.deduction9Field != null){
                                        $("#deduction9").html(response.data.deduction9Field);
                                        $("#deduction9").attr('data-edit', "true");
                                        $("#deduction9").attr('data-field', response.data.deduction9Field);
                                    }
                                    if(response.data.deduction10Field != null){
                                        $("#deduction10").html(response.data.deduction10Field);
                                        $("#deduction10").attr('data-edit', "true");
                                        $("#deduction10").attr('data-field', response.data.deduction10Field);
                                    }
                                    // $("#label_custom1").html(response.data.headerCustom1 == null ? "{{ __('payroll_slip_format.label_custom1') }}" : response.data.headerCustom1);
                                    // $("#label_custom2").html(response.data.headerCustom2 == null ? "{{ __('payroll_slip_format.label_custom2') }}" : response.data.headerCustom2);
                                    // $("#allowance1").html(response.data.allowance1Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance1Field);
                                    // $("#allowance2").html(response.data.allowance2Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance2Field);
                                    // $("#allowance3").html(response.data.allowance3Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance3Field);
                                    // $("#allowance4").html(response.data.allowance4Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance4Field);
                                    // $("#allowance5").html(response.data.allowance5Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance5Field);
                                    // $("#allowance6").html(response.data.allowance6Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance6Field);
                                    // $("#allowance7").html(response.data.allowance7Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance7Field);
                                    // $("#allowance8").html(response.data.allowance8Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance8Field);
                                    // $("#allowance9").html(response.data.allowance9Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance9Field);
                                    // $("#allowance10").html(response.data.allowance10Field == null ? "{{ __('payroll_slip_format.label_allowance') }}" : response.data.allowance10Field);
                                    // $("#deduction1").html(response.data.deduction1Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction1Field);
                                    // $("#deduction2").html(response.data.deduction2Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction2Field);
                                    // $("#deduction3").html(response.data.deduction3Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction3Field);
                                    // $("#deduction4").html(response.data.deduction4Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction4Field);
                                    // $("#deduction5").html(response.data.deduction5Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction5Field);
                                    // $("#deduction6").html(response.data.deduction6Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction6Field);
                                    // $("#deduction7").html(response.data.deduction7Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction7Field);
                                    // $("#deduction8").html(response.data.deduction8Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction8Field);
                                    // $("#deduction9").html(response.data.deduction9Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction9Field);
                                    // $("#deduction10").html(response.data.deduction10Field == null ? "{{ __('payroll_slip_format.label_deduction') }}" : response.data.deduction10Field);
                                }
                                else {
                                    $("#record_function").val("New");
                                    $("#label_custom1").html("{{ __('payroll_slip_format.label_custom1') }}");
                                    $("#label_custom2").html("{{ __('payroll_slip_format.label_custom2') }}");
                                    $("#allowance1").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance2").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance3").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance4").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance5").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance6").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance7").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance8").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance9").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#allowance10").html("{{ __('payroll_slip_format.label_allowance') }}");
                                    $("#deduction1").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction2").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction3").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction4").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction5").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction6").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction7").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction8").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction9").html("{{ __('payroll_slip_format.label_deduction') }}");
                                    $("#deduction10").html("{{ __('payroll_slip_format.label_deduction') }}");
                                }
                            } else {
                                $("#btn-save-deduction").prop("disabled", false);
                                $("#btn-save-deduction").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
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
                            $("#btn-save-deduction").prop("disabled", false);
                            $("#btn-save-deduction").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("payroll_slip_format.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            });
        }
    });
</script>

</html>
