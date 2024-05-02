<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_absenteeism_overtime_calculation_process.monthly_process_judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/payroll_detail_data.css') }}">
    
    <style type="text/css">
        .div-payroll {
            max-width: 97%;
            margin: auto;
            margin-top: 1%;
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

        .overlay {
            background: #e9e9e9;  
            display: none;       
            position: fixed;   
            top: 0;                  
            right: 0;               
            bottom: 0;
            left: 0;
            opacity: 0.5;
        }

        .div-loading {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link {
            color: #0F5289 !important;
        }

        .nav-link.active {
            background: none !important;
            font-family: 'Montserrat';
        }

        .nav-link.active::after {
            content: "";
            display: block;
            width: 100%;
            height: 3px;
            background-color: #0F5289;
            position: relative;
            bottom: -10px;
        }

        .box {
            border: 1px solid #CED4DA;
            border-radius: 8px;
            padding: 24px;
        }

        .center-ul {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .process-input {
            width: 100%;
            position: relative;
            height: 55px;
        }

        .select2, .select2-selection__rendered { 
            line-height: calc(1.5em + .5rem + 2px) !important; 
        } 
        
        .select2-container .select2-selection--single { 
            height: calc(1.5em + .5rem + 2px) !important; 
        } 
        
        .select2-selection__arrow { 
            height: calc(1.5em + .5rem + 2px) !important; 
        }

        .modal-header-authentication {
            border-bottom: 1px solid #eee;
            background-color: #004883;
            color: white;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .font-label {
            font-size: 12px !important;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <div class="div-payroll">
            <div class="div-title">
                <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
                    <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                    <span class="title-text">{{ __('payroll_absenteeism_overtime_calculation_process.list') }}</span>
                </a>
            </div>

            <div class="process-input">
                <form class="form-inline" id="form-inline" style="position: absolute; right: 0;">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="process_status" class="font-label">Process Status:</label>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control form-control-sm" id="process_status" name="process_status" readonly>
                    </div>

                    <input type="hidden" class="form-control" id="processing_period_month" name="processing_period_month">
                    <input type="hidden" class="form-control" id="processing_period_year" name="processing_period_year">
                    <input type="hidden" class="form-control" id="record_function" name="record_function">
                    <input type="hidden" class="form-control" id="period_status" name="period_status">
                    <input class="form-control" type="hidden" id="template_preparation_process" name="template_preparation_process">
                    <input class="form-control" type="hidden" id="flag_absent_mobile" name="flag_absent_mobile">
                    <input class="form-control" type="hidden" id="not_clock_in" name="not_clock_in" value="DEFAULT">
                    <input class="form-control" type="hidden" id="late" name="late" value="DEFAULT">
                    <input class="form-control" type="hidden" id="not_clock_out" name="not_clock_out" value="DEFAULT">
                    <input class="form-control" type="hidden" id="early_back" name="early_back" value="DEFAULT">
                    <input class="form-control" type="hidden" id="not_clock_in_early_back" name="not_clock_in_early_back" value="DEFAULT">
                    <input class="form-control" type="hidden" id="late_early_back" name="late_early_back" value="DEFAULT">
                    <input class="form-control" type="hidden" id="not_clock_out_late" name="not_clock_out_late" value="DEFAULT">
                    <input class="form-control" type="hidden" id="unpaid_leave" name="unpaid_leave" value="DEFAULT">
                    <input class="form-control" type="hidden" id="absent" name="absent" value="DEFAULT">
                    <input class="form-control" type="hidden" id="overtime" name="overtime" value="DEFAULT">
                    <input class="form-control" type="hidden" id="late_hour" name="late_hour">
                    <input class="form-control" type="hidden" id="early_back_hour" name="early_back_hour">
                    <input class="form-control" type="hidden" id="default_calculation" name="default_calculation">
                    <input class="form-control" type="hidden" id="overtime_before_from" name="overtime_before_from">
                    <input class="form-control" type="hidden" id="overtime_after_from" name="overtime_after_from">

                    <button type="button" id="btn-save" class="btn btn-primary btn-sm mb-2" disabled>Save</button>
                </form>
            </div>

            <div class="tab-nav">
                <div class="center-ul">
                    <ul class="nav nav-pills mb-4" id="myTab" role="tablist">
                        <li class="nav-item" style="margin-left:0;">
                            <a class="nav-link active" id="absenteeism_overtime_calculation_process-tab" data-toggle="tab" href="#absenteeism_overtime_calculation_process" role="tab" aria-controls="absenteeism_overtime_calculation_process">Absenteeism & Overtime</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="salary_calculation_process-tab" data-toggle="tab" href="#salary_calculation_process" role="tab" aria-controls="salary_calculation_process">Salary</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tax_calculation_process-tab" data-toggle="tab" href="#tax_calculation_process" role="tab" aria-controls="tax_calculation_process">Tax</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="absenteeism_overtime_calculation_process" role="tabpanel" aria-labelledby="absenteeism_overtime_calculation_process-tab">
                        <div class="row">
                            <div class="offset-md-3 col-12 col-md-6 box">
                                <form id="absenteeism_overtime_calculation_process_form" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="process_period_salary_year_absenteeism" class="font-label">{{ __('payroll_salary_calculation_process.label_process_period') }}</label>
                                                <input type="text" class="form-control form-control-sm" id="process_period_salary_year_absenteeism" name="process_period_salary_year_absenteeism"
                                                    placeholder="{{ __('payroll_salary_calculation_process.label_process_period_salary') }}" readonly>
                                            </div>
                                            <input type="hidden" class="form-control" id="process_period_salary_month_absenteeism_hidden" name="process_period_absenteeism_month_hidden">
                                            <input type="hidden" class="form-control" id="process_period_salary_year_absenteeism_hidden" name="process_period_absenteeism_year_hidden">
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="range_employee_no_absenteeism" name="range_employee_no_absenteeism" value="true" style="margin-top: 7px;">
                                                <label class="form-check-label font-label" for="range_employee_no_absenteeism" style=" font-family: 'Montserrat-Regular';">{{ __('payroll_absenteeism_overtime_calculation_process.label_range_employee_no') }}</label> 
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="employee_no_from_absenteeism">{{ __('payroll_absenteeism_overtime_calculation_process.label_employee_no_from') }}</label>
                                                <select class="form-control select2 form-control-sm" id="employee_no_from_absenteeism" name="employee_no_from_absenteeism" disabled></select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="employee_no_to_absenteeism">{{ __('payroll_absenteeism_overtime_calculation_process.label_employee_no_to') }}</label>
                                                <select class="form-control select2 form-control-sm" id="employee_no_to_absenteeism" name="employee_no_to_absenteeism" disabled></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary btn-sm btn-block" name="btn-process-absenteeism" id="btn-process-absenteeism">
                                                <i class="fa fa-play-circle-o"></i> {{ __('payroll_absenteeism_overtime_calculation_process.btn_process') }}
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-outline-primary btn-sm" href="{{ url('/payroll') }}" target="iframe_dashboard"
                                                name="btn-cancel" id="btn-cancel" style="width: 100%;">
                                                <i class="fa fa-times-circle"></i> {{ __('payroll_absenteeism_overtime_calculation_process.btn_cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="salary_calculation_process" role="tabpanel" aria-labelledby="salary_calculation_process-tab">
                        <div class="row">
                            <div class="offset-md-3 col-12 col-md-6 box">
                                <form id="salary_calculation_process_form" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="process_period_salary">{{ __('payroll_salary_calculation_process.label_process_period') }}</label>
                                                <input type="text" class="form-control" id="process_period_salary" name="process_period_salary"
                                                    placeholder="{{ __('payroll_salary_calculation_process.label_process_period_salary') }}" readonly>
                                            </div>
                                            <input type="hidden" class="form-control" id="process_period_salary_month_hidden" name="process_period_salary_month_hidden">
                                            <input type="hidden" class="form-control" id="process_period_salary_year_hidden" name="process_period_salary_year_hidden">
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="loan_payment_process_salary" name="loan_payment_process_salary" value="true">
                                                <label class="font-label" for="loan_payment_process_salary" style="font-family: 'Montserrat-Regular'">{{ __('payroll_salary_calculation_process.label_loan_payment_process') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="retroactive_process_salary" name="retroactive_process_salary" value="true">
                                                <label class="font-label" for="retroactive_process_salary" style="font-family: 'Montserrat-Regular'">{{ __('payroll_salary_calculation_process.label_retroactive_process') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-6 retroactive_salary" hidden>
                                            <div class="form-group">
                                                <label class="font-label" for="retroactive_salary" style="font-family: 'Montserrat-Regular'">{{ __('payroll_salary_calculation_process.label_retroactive') }}</label>
                                                <select class="form-control select2" id="retroactive_salary" name="retroactive_salary"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row include_probation_period_salary" hidden>
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="include_probation_period_salary" name="include_probation_period_salary" value="true">
                                                <label class="font-label" for="include_probation_period_salary" style="font-family: 'Montserrat-Regular'">{{ __('payroll_salary_calculation_process.label_include_probation_period') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row include_jamsostek_retroactive_salary" hidden>
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="include_jamsostek_retroactive_salary" name="include_jamsostek_retroactive_salary" value="true">
                                                <label class="font-label"  for="include_jamsostek_retroactive_salary" style="font-family: 'Montserrat-Regular'">{{ __('payroll_salary_calculation_process.label_include_jamsostek_retroactive') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="rounded_jamsostek_amount_salary" name="rounded_jamsostek_amount_salary" value="true">
                                                <label class="font-label" for="rounded_jamsostek_amount_salary" style="font-family: 'Montserrat-Regular'">{{ __('payroll_salary_calculation_process.label_rounded_jamsostek_amount') }}</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="range_salary" name="range_salary" value="true">
                                                <label class="font-label" for="range_salary" style="font-family: 'Montserrat-Regular'">{{ __('payroll_salary_calculation_process.label_range') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="employee_no_from_salary">{{ __('payroll_salary_calculation_process.label_employee_no_from') }}</label>
                                                <select class="form-control select2" id="employee_no_from_salary" name="employee_no_from_salary" disabled></select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="employee_no_to_salary">{{ __('payroll_salary_calculation_process.label_employee_no_to') }}</label>
                                                <select class="form-control select2" id="employee_no_to_salary" name="employee_no_to_salary" disabled></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary btn-block btn-sm" name="btn-process-salary" id="btn-process-salary">
                                                <i class="fa fa-play-circle-o"></i> {{ __('payroll_salary_calculation_process.btn_process') }}
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-outline-primary btn-sm" href="{{ url('/payroll') }}" target="iframe_dashboard"
                                                name="btn-cancel" id="btn-cancel" style="width: 100%;">
                                                <i class="fa fa-times-circle"></i> {{ __('payroll_salary_calculation_process.btn_cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>  
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tax_calculation_process" role="tabpanel" aria-labelledby="tax_calculation_process-tab">
                        <div class="row">
                            <div class="offset-md-3 col-12 col-md-6 box">
                                <form id="tax_calculation_process_form" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="process_period">{{ __('payroll_tax_calculation_process.label_process_period') }}</label>
                                                    <input type="text" class="form-control" id="process_period" name="process_period"
                                                        placeholder="{{ __('payroll_tax_calculation_process.label_process_period') }}" readonly>
                                            </div>
                                            <input type="hidden" class="form-control" id="process_period_det" name="process_period_det">
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="recalculate_thr_tax" name="recalculate_thr_tax" value="true">
                                                <label class="font-label" for="recalculate_thr_tax" style="font-family: 'Montserrat-Regular'">{{ __('payroll_tax_calculation_process.label_recalculate_thr_tax') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="recalculate_bonus_tax" name="recalculate_bonus_tax" value="true">
                                                <label class="font-label" for="recalculate_bonus_tax" style="font-family: 'Montserrat-Regular'">{{ __('payroll_tax_calculation_process.label_recalculate_bonus_tax') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2 mb-2">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" style="margin-top: 7px;" type="checkbox" id="range" name="range" value="true">
                                                <label class="font-label" for="range" style="font-family: 'Montserrat-Regular'">{{ __('payroll_tax_calculation_process.label_range') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="employee_no_from">{{ __('payroll_tax_calculation_process.label_employee_no_from') }}</label>
                                                <select class="form-control select2" id="employee_no_from" name="employee_no_from" disabled></select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="font-label" for="employee_no_to">{{ __('payroll_tax_calculation_process.label_employee_no_to') }}</label>
                                                <select class="form-control select2" id="employee_no_to" name="employee_no_to" disabled></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-sm btn-primary" name="btn-process" id="btn-process" style="width: 100%;">
                                                <i class="fa fa-play-circle-o"></i> {{ __('payroll_tax_calculation_process.btn_process') }}
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ url('/payroll') }}" target="iframe_dashboard"
                                                name="btn-cancel" id="btn-cancel" style="width: 100%;">
                                                <i class="fa fa-times-circle"></i> {{ __('payroll_tax_calculation_process.btn_cancel') }}
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_authentication"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-authentication text-center">
                    <h5 class="modal-title w-100 title-text-authentication">{{ __('payroll_salary_accumulation_data.header_password_form') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="authentication_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="user_id">{{ __('payroll_salary_accumulation_data.label_user_id') }}</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id"
                                        placeholder="{{ __('payroll_salary_accumulation_data.label_user_id') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">{{ __('payroll_salary_accumulation_data.label_password') }}</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="{{ __('payroll_salary_accumulation_data.label_password') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary rounded-right" type="button" id="show_password"><i id="icon_show_password"
                                                class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-ok" name="btn-ok" class="btn btn-primary w-25"><i>
                                </i> {{ __('payroll_salary_accumulation_data.btn_ok') }}</button>
                            <button type="button" id="btn-cncl" class="btn btn-primary w-25" data-dismiss="modal"><i
                                class="fa fa-times-circle"></i> {{ __('payroll_salary_accumulation_data.btn_cancel') }}</button>
                        </div>
                    </form>
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
                        <span class="title-text-notification">{{ __('payroll_absenteeism_overtime_calculation_process.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay" id="notification_loading">
        <div class="div-loading">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/pagination/ellipses.js"></script>
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/flatpickr.monthselect.js') }}"></script>


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
    
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var arrData = @json($data);
        var arrData2 = @json($data2);
        var arrayMinutesRounded = [];

        if (arrData2) {
            let processStatus = arrData[0].statusProcess

            if (processStatus == "1") {
                $("#process_status").val("Absent / Overtime Proceed")
            } else if (processStatus == "2") {
                $("#process_status").val("Salary Calculation Proceed")
            } else if (processStatus == "3") {
                $("#process_status").val("Tax Calculation Proceed")
            } else if (processStatus == "4") {
                $("#process_status").val("Period Close")
            } else if (processStatus == "5") {
                $("#process_status").val("Final Tax Proceed")
            } else if (processStatus == "5") {
                $("#process_status").val("Year End Proceed")
            }

            $('#processing_period_month').val(((typeof arrData[0].periodMonth !== 'undefined') ? arrData[0].periodMonth : ''));
            $('#processing_period_year').val(((typeof arrData[0].periodYear !== 'undefined') ? arrData[0].periodYear : ''));
            $('#period_status').val(((typeof arrData[0].statusPeriod !== 'undefined') ? arrData[0].statusPeriod : ''));
            $('#template_preparation_process').val(((typeof arrData[0].templatePreparation !== 'undefined') ? arrData[0].templatePreparation.toLowerCase() : ''));
            $('#flag_absent_mobile').val(((typeof arrData[0].flagAbsentMobile !== 'undefined') ? arrData[0].flagAbsentMobile : ''));
            $('#late_hour').val(((typeof arrData[0].calculateLateHour !== 'undefined') ? arrData[0].calculateLateHour : ''));
            $('#early_back_hour').val(((typeof arrData[0].calculateEarlyBackHour !== 'undefined') ? arrData[0].calculateEarlyBackHour : ''));
            $('#default_calculation').val(((typeof arrData[0].calculateOvertime !== 'undefined') ? arrData[0].calculateOvertime : ''));
            $('#overtime_before_from').val(((typeof arrData[0].ovtBeforeHourFrom !== 'undefined') ? arrData[0].ovtBeforeHourFrom : ''));
            $('#overtime_after_from').val(((typeof arrData[0].ovtAfterHourFrom !== 'undefined') ? arrData[0].ovtAfterHourFrom : ''));

            if(arrData[0].ovtRounded.length > 0){
                for (const obj of arrData[0].ovtRounded) {
                    arrayMinutesRounded.push({
                        "from": obj.minutesFrom,
                        "to": obj.minutesTo,
                        "become": obj.become
                    });
                }
            }
        }

        if (arrData) {
            var month_year = moment(arrData[0].periodYear.toString() + "-" + arrData[0].periodMonth.toString()).format('MMMM' + ' ' + 'YYYY');

            $('#process_period_salary_month_absenteeism_hidden').val(arrData[0].periodMonth.toString());
            $('#process_period_salary_year_absenteeism_hidden').val(arrData[0].periodYear.toString());
            $('#process_period_salary_year_absenteeism').val(month_year);
            $('#process_period_salary').val(month_year);

            $('#process_period_salary_month_hidden').val((typeof arrData[0].periodMonth !== 'undefined') ? arrData[0].periodMonth : '');
            $('#process_period_salary_year_hidden').val((typeof arrData[0].periodYear !== 'undefined') ? arrData[0].periodYear : '');
        
            var date_period = moment(arrData[0].periodYear + "-" + arrData[0].periodMonth + "-01").format('YYYY-MM-DD');
            $('#process_period').val(month_year);
            $('#process_period_det').val(date_period);
        }

        $('#range_employee_no_absenteeism').on('change', function () {
            if ($('#range_employee_no_absenteeism').is(':checked')) {
                $('#employee_no_from_absenteeism').prop('disabled', false);
                $('#employee_no_to_absenteeism').prop('disabled', false);
            } else {
                $('#employee_no_from_absenteeism').prop('disabled', true);
                $('#employee_no_to_absenteeism').prop('disabled', true);
            }
        });

        $('#range').on('change', function () {
            if ($('#range').is(':checked')) {
                $('#employee_no_from').prop('disabled', false);
                $('#employee_no_to').prop('disabled', false);
            } else {
                $('#employee_no_from').prop('disabled', true);
                $('#employee_no_to').prop('disabled', true);
            }
        });
        
        $('#retroactive_process_salary').on('change', function () {
            if ($('#retroactive_process_salary').is(':checked')) {
                $('.retroactive_salary').prop('hidden', false);
                $('.include_probation_period_salary').prop('hidden', false);
                $('.include_jamsostek_retroactive_salary').prop('hidden', false);
            } else {
                $('.retroactive_salary').prop('hidden', true);
                $('.include_probation_period_salary').prop('hidden', true);
                $('.include_jamsostek_retroactive_salary').prop('hidden', true);
            }
        });

        $('#range_salary').on('change', function () {
            if ($('#range_salary').is(':checked')) {
                $('#employee_no_from_salary').prop('disabled', false);
                $('#employee_no_to_salary').prop('disabled', false);
            } else {
                $('#employee_no_from_salary').prop('disabled', true);
                $('#employee_no_to_salary').prop('disabled', true);
            }
        });

        function loadDataRetroactive() {
            var listRetroactive = [
                { id: '0', text: '0' },
                { id: '1', text: '1' },
                { id: '2', text: '2' },
                { id: '3', text: '3' },
                { id: '4', text: '4' },
                { id: '5', text: '5' },
                { id: '6', text: '6' },
                { id: '7', text: '7' },
                { id: '8', text: '8' },
                { id: '9', text: '9' },
                { id: '10', text: '10' },
                { id: '11', text: '11' },
                { id: '12', text: '12' },
                { id: '13', text: '13' },
                { id: '14', text: '14' },
                { id: '15', text: '15' },
                { id: '16', text: '16' },
                { id: '17', text: '17' },
                { id: '18', text: '18' },
                { id: '19', text: '19' },
                { id: '20', text: '20' },
                { id: '21', text: '21' },
                { id: '22', text: '22' },
                { id: '23', text: '23' },
                { id: '24', text: '24' }
            ];

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#retroactive_salary').select2({
                data: listRetroactive,
                width: '100%',
                placeholder: 'Choose Retroactive',
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

        loadDataRetroactive();
        loadDataEmployeeNo('#employee_no_from_absenteeism');
        loadDataEmployeeNo('#employee_no_to_absenteeism');
        loadDataEmployeeNo('#employee_no_from_salary');
        loadDataEmployeeNo('#employee_no_to_salary');
        loadDataEmployeeNo('#employee_no_from');
        loadDataEmployeeNo('#employee_no_to');

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
                                    text: item.fullName + ' - ' + item.employeeNo,
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

        $("#btn-process").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#tax_calculation_process_form").submit();
        });

        if ($("#tax_calculation_process_form").length > 0) {
            $("#tax_calculation_process_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('payroll/tax_calculation_process/proses') }}",
                        type: "POST",
                        data: $('#tax_calculation_process_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-process").prop("disabled", false);
                                $("#btn-process").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                                );
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/monthly_proses') }}";
                                }, 3000);
                            } else {
                                $("#btn-process").prop("disabled", false);
                                $("#btn-process").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
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
                            $("#btn-process").prop("disabled", false);
                            $("#btn-process").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        $("#btn-process-absenteeism").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $('#notification_loading').show();
            $("#absenteeism_overtime_calculation_process_form").submit();
        });

        if ($("#absenteeism_overtime_calculation_process_form").length > 0) {
            $("#absenteeism_overtime_calculation_process_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('payroll/absenteeism_overtime_calculation_process/proses') }}",
                        type: "POST",
                        data: $('#absenteeism_overtime_calculation_process_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-process-absenteeism").prop("disabled", false);
                                $("#btn-process-absenteeism").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                                );
                                $('#notification_loading').hide();
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/monthly_proses') }}";
                                }, 3000);
                            } else {
                                $("#btn-process-absenteeism").prop("disabled", false);
                                $("#btn-process-absenteeism").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                                );
                                $('#notification_loading').hide();
                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    if (response.message.includes('redirect')) {
                                        var matches = response.message.match(/redirect\s+(.+)/);
                                        if (matches && matches.length > 1) {
                                            var url = matches[1].trim();
                                            response.message = response.message.replace(/redirect\s+(.+)/, '');
                                            $('#message-notification-error').html(response.message);

                                            $('#notification_error').on('hidden.bs.modal', function () {
                                                window.location.href = "{{ url('') }}" + "/" + url;
                                            });

                                            $('#notification_error').modal('show');
                                        }
                                    } else {
                                        $('#message-notification-error').html(response.message);
                                    }
                                }
                            }
                        },
                        error: function (response) {
                            $('#notification_loading').hide();
                            $("#btn-process-absenteeism").prop("disabled", false);
                            $("#btn-process-absenteeism").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        $("#btn-process-salary").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $('#notification_loading').show();
            $("#salary_calculation_process_form").submit();
        });

        if ($("#salary_calculation_process_form").length > 0) {
            $("#salary_calculation_process_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ url('payroll/salary_calculation_process/proses') }}",
                        type: "POST",
                        data: $('#salary_calculation_process_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-process-salary").prop("disabled", false);
                                $("#btn-process-salary").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                                );
                                // $('#div-loading').hide();
                                $('#notification_loading').hide();
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/monthly_proses') }}";
                                }, 3000);
                            } else {
                                $("#btn-process-salary").prop("disabled", false);
                                $("#btn-process-salary").html(
                                    '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                                );
                                $('#notification_loading').hide();
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
                            $('#notification_loading').hide();
                            $("#btn-process-salary").prop("disabled", false);
                            $("#btn-process-salary").html(
                                '<i class="fa fa-play-circle-o"></i> {{ __("payroll_salary_calculation_process.btn_process") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        $('#process_status').on("dblclick", function () {
            $('#modal_authentication').modal('show')
        })

        $("#btn-ok").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#authentication_form").submit();
        });

        if ($("#authentication_form").length > 0) {
            $("#authentication_form").validate({
                rules: {
                    user_id: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    user_id: {
                        required: "{{ __('payroll_salary_accumulation_data.userid_required') }}",
                    },
                    password: {
                        required: "{{ __('payroll_salary_accumulation_data.password_required') }}",
                    },
                },
                highlight: function (element) {
                    jQuery(element).closest('.form-control').addClass('is-invalid');
                    $('#show_password').addClass('danger');
                },
                unhighlight: function (element) {
                    jQuery(element).closest('.form-control').removeClass('is-invalid');
                    $('#show_password').removeClass('danger');
                },
                errorElement: 'label',
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
					$("#btn-ok").prop("disabled", false);
                    $("#btn-ok").html('{{ __("payroll_salary_accumulation_data.btn_ok") }}');

                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
					$("#btn-ok").prop("disabled", true);
                    $("#btn-ok").html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                    );

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ url('authentication/proses') }}",
                        type: "POST",
                        data: $('#authentication_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
								$("#btn-ok").prop("disabled", false);
								$("#btn-ok").html('{{ __("payroll_salary_accumulation_data.btn_ok") }}');
                                $('#btn-save').prop("disabled", false);
                                
                                var selectElement = '<select class="form-control form-control-sm" id="process_status" name="process_status">' +
                                                        '<option value="1">Absent / Overtime Proceed</option>' +
                                                        '<option value="2">Salary Calculation Proceed</option>' +
                                                        '<option value="3">Tax Calculation Proceed</option>' +
                                                        '<option value="4">Period Close</option>' +
                                                        '<option value="5">Final Tax Proceed</option>' +
                                                        '<option value="6">Year End Proceed</option>' +
                                                    '</select>';
                                $('#process_status').replaceWith(selectElement);
                                $('#modal_authentication').modal('hide');
                            } else {
								$("#btn-ok").prop("disabled", false);
								$("#btn-ok").html('{{ __("payroll_salary_accumulation_data.btn_ok") }}');
                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "{{ __('login.error') }}");
                                } else {
                                    $('#message-notification-error').html(response.message);
                                }
                            }
                        },
                        error: function (response) {
							$("#btn-ok").prop("disabled", false);
							$("#btn-ok").html('{{ __("payroll_salary_accumulation_data.btn_ok") }}');
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        $('#btn-save').on('click', function() {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span> Loading...</span>'
            );

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ url('time_management/reference_time_management/proses') }}",
                type: "POST",
                data: { 'field': $('#form-inline').serialize(), 'field_name': JSON.stringify(arrayMinutesRounded) },
                success: function(response) {
                    if (response.status == "true") {
                        $('#btn-save').prop("disabled", false);
                        $('#btn-save').html('<span>Save</span>');

                        $('#notification_success').modal('show');
                        $('#message-notification-success').html(response.message);

                        setTimeout(function() {
                            window.location = "{{ url('payroll/monthly_proses') }}";
                        }, 3000);
                    } else {
                        $('#btn-save').prop("disabled", false);
                        $('#btn-save').html('<span>Save</span>');

                        $('#notification_error').modal('show');
                        if (response.message == null || response.message == '') {
                            $('#message-notification-error').html("{{ __('login.error') }}");
                        } else {
                            $('#message-notification-error').html(response.message);
                        }
                    }
                },
                error: function(response) {
                    $('#btn-save').prop("disabled", false);
                    $('#btn-save').html('<span>Save</span>');

                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        })
    })
</script>

</html>