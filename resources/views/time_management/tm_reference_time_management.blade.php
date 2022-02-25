<!DOCTYPE html>
<html>
<head>
	<title>{{ __('tm_reference_time_management.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/time_management_detail.css') }}">
	<style type="text/css">
		.div-time_management {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
        .modal-header-notification-error {
            border-bottom:1px solid #eee;
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
            align-items:center;
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
	</style>
</head>

<body>
	<div class="div-time_management">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>{{ __('tm_reference_time_management.label_back') }}</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>{{ __('tm_reference_time_management.label_next') }}</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>{{ __('tm_reference_time_management.label_new') }}</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>{{ __('tm_reference_time_management.label_edit') }}</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>{{ __('tm_reference_time_management.btn_save') }}</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>{{ __('tm_reference_time_management.label_list') }}</span>
            </a>
        </div>
        <div class="div-title">
			<a href="{{ url('time_management') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('tm_reference_time_management.list') }}</span>
			</a>
        </div>
        <div class="div-form">
            <form id="reference_time_management_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="processing_period_month">{{ __('tm_reference_time_management.label_processing_period') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="processing_period_month" name="processing_period_month"
                                    placeholder="{{ __('tm_reference_time_management.label_month') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label class="pt-1"><br></label>
                            <p><b>/</b></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label><br></label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="processing_period_year" name="processing_period_year"
                                    placeholder="{{ __('tm_reference_time_management.label_year') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period_status">{{ __('tm_reference_time_management.label_period_status') }}</label>
                            <input type="text" class="form-control" id="period_status" name="deperiod_statusscription"
                                placeholder="{{ __('tm_reference_time_management.label_period_status') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="process_status">{{ __('tm_reference_time_management.label_process_status') }}</label>
                            <select class="form-control select2" id="process_status" name="process_status"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="template_preparation_process">{{ __('tm_reference_time_management.label_template_preparation_process') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="shift"
                                    name="template_preparation_process" value="shift">
                                <label class="form-radio-label"
                                    for="template_preparation_process">{{ __('tm_reference_time_management.label_by_shift') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="blank"
                                    name="template_preparation_process" value="blank">
                                <label class="form-radio-label"
                                    for="template_preparation_process">{{ __('tm_reference_time_management.label_blank') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="attendance_absent_code">{{ __('tm_reference_time_management.label_attendance_absent_code') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_in">{{ __('tm_reference_time_management.label_not_clock_in') }}</label>
                            <select class="form-control select2" id="not_clock_in" name="not_clock_in"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="late">{{ __('tm_reference_time_management.label_late') }}</label>
                            <select class="form-control select2" id="late" name="late"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_out">{{ __('tm_reference_time_management.label_not_clock_out') }}</label>
                            <select class="form-control select2" id="not_clock_out" name="not_clock_out"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="early_back">{{ __('tm_reference_time_management.label_early_back') }}</label>
                            <select class="form-control select2" id="early_back" name="early_back"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_in_early_back">{{ __('tm_reference_time_management.label_not_clock_in_early_back') }}</label>
                            <select class="form-control select2" id="not_clock_in_early_back" name="not_clock_in_early_back"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="late_early_back">{{ __('tm_reference_time_management.label_late_early_back') }}</label>
                            <select class="form-control select2" id="late_early_back" name="late_early_back"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_out_late">{{ __('tm_reference_time_management.label_not_clock_out_late') }}</label>
                            <select class="form-control select2" id="not_clock_out_late" name="not_clock_out_late"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="unpaid_leave">{{ __('tm_reference_time_management.label_unpaid_leave') }}</label>
                            <select class="form-control select2" id="unpaid_leave" name="unpaid_leave"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="absent">{{ __('tm_reference_time_management.label_absent') }}</label>
                            <select class="form-control select2" id="absent" name="absent"></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="overtime">{{ __('tm_reference_time_management.label_overtime') }}</label>
                            <select class="form-control select2" id="overtime" name="overtime"></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="calculate_hour">{{ __('tm_reference_time_management.label_calculate_hour') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="late_hour">{{ __('tm_reference_time_management.label_late_hour') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="late_hour_normal_in"
                                    name="late_hour" value="normal">
                                <label class="form-radio-label"
                                    for="late_hour">{{ __('tm_reference_time_management.label_normal_in') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="late_hour_tolerance"
                                    name="late_hour" value="tolerance">
                                <label class="form-radio-label"
                                    for="late_hour">{{ __('tm_reference_time_management.label_normal_in_time_tolerance') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="early_back_hour">{{ __('tm_reference_time_management.label_early_back_hour') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="early_back_normal_out"
                                    name="early_back_hour" value="normal">
                                <label class="form-radio-label"
                                    for="early_back_hour">{{ __('tm_reference_time_management.label_normal_out') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="early_back_hour_tolerance"
                                    name="early_back_hour" value="tolerance">
                                <label class="form-radio-label"
                                    for="early_back_hour">{{ __('tm_reference_time_management.label_normal_out_time_tolerance') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="overtime">{{ __('tm_reference_time_management.label_overtime') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="default_calculation">{{ __('tm_reference_time_management.label_default_calculation') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="default_calculation_blank"
                                    name="default_calculation" value="blank">
                                <label class="form-radio-label"
                                    for="default_calculation">{{ __('tm_reference_time_management.label_blank') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="default_calculation_system"
                                    name="default_calculation" value="system">
                                <label class="form-radio-label"
                                    for="default_calculation">{{ __('tm_reference_time_management.label_calculated_by_system') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="overtime_before_from">{{ __('tm_reference_time_management.label_overtime_before_from') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_before_from_normal"
                                    name="overtime_before_from" value="normal">
                                <label class="form-radio-label"
                                    for="overtime_before_from">{{ __('tm_reference_time_management.label_normal_in') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_before_from_overtime"
                                    name="overtime_before_from" value="overtime">
                                <label class="form-radio-label"
                                    for="overtime_before_from">{{ __('tm_reference_time_management.label_overtime_before') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="overtime_after_from">{{ __('tm_reference_time_management.label_overtime_after_from') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_after_from_normal"
                                    name="overtime_after_from" value="normal">
                                <label class="form-radio-label"
                                    for="overtime_after_from">{{ __('tm_reference_time_management.label_normal_out') }}</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_after_from_overtime"
                                    name="overtime_after_from" value="overtime">
                                <label class="form-radio-label"
                                    for="overtime_after_from">{{ __('tm_reference_time_management.label_overtime_after') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="minute_rounded">{{ __('tm_reference_time_management.label_minute_rounded') }}</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="minute_rounded_from">{{ __('tm_reference_time_management.label_from') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="minute_rounded_from" name="minute_rounded_from"
                                    placeholder="{{ __('tm_reference_time_management.label_from') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="minute_rounded_to">{{ __('tm_reference_time_management.label_to') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="minute_rounded_to" name="minute_rounded_to"
                                    placeholder="{{ __('tm_reference_time_management.label_to') }}">                                
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="minute_rounded_become">{{ __('tm_reference_time_management.label_become') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="minute_rounded_become" name="minute_rounded_become"
                                    placeholder="{{ __('tm_reference_time_management.label_become') }}">                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="hour_deduction">{{ __('tm_reference_time_management.label_hour_deduction') }}</label>
                        </div>
                    </div>
                </div>
                <div class="div-table col-12">
                    <table id="reference_time_management_table" class="table hover  width: 100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('tm_reference_time_management.label_day') }}</th>
                                <th>{{ __('tm_reference_time_management.label_description') }}</th>
                                <th>{{ __('tm_reference_time_management.label_from1') }}</th>
                                <th>{{ __('tm_reference_time_management.label_to1') }}</th>
                                <th>{{ __('tm_reference_time_management.label_hour1') }}</th>
                                <th>{{ __('tm_reference_time_management.label_from2') }}</th>
                                <th>{{ __('tm_reference_time_management.label_to2') }}</th>
                                <th>{{ __('tm_reference_time_management.label_hour2') }}</th>
                                <th>{{ __('tm_reference_time_management.label_every') }}</th>
                                <th>{{ __('tm_reference_time_management.label_hour') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-reference-time-management" id="btn-add-reference-time-management"
                            style="width: 100%;" data-toggle="modal" data-target="#modal_add_reference_time_management">
                            <i class="fa fa-plus"></i> {{ __('tm_reference_time_management.btn_add') }}
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-data" id="btn-remove-data"
                            style="width: 100%;">
                            <i class="fa fa-times"></i> {{ __('tm_reference_time_management.btn_remove') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_add_reference_time_management" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('tm_reference_time_management.list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reference_time_management_detail_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="deduct_day">{{ __('tm_reference_time_management.label_deduct_day') }}</label>
                                    <select class="form-control select2" id="deduct_day" name="deduct_day"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label
                                        for="deduction1">{{ __('tm_reference_time_management.label_deduction1') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction1_from">{{ __('tm_reference_time_management.label_from') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction1_from" name="deduction1_from"
                                            placeholder="{{ __('tm_reference_time_management.label_from') }}">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction1_to">{{ __('tm_reference_time_management.label_to') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction1_to" name="deduction1_to"
                                            placeholder="{{ __('tm_reference_time_management.label_to') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction1_deduct">{{ __('tm_reference_time_management.label_deduct') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction1_deduct" name="deduction1_deduct"
                                            placeholder="{{ __('tm_reference_time_management.label_deduct') }}">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label
                                        for="deduction2">{{ __('tm_reference_time_management.label_deduction2') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction2_from">{{ __('tm_reference_time_management.label_from') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction2_from" name="deduction2_from"
                                            placeholder="{{ __('tm_reference_time_management.label_from') }}">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction2_to">{{ __('tm_reference_time_management.label_to') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction2_to" name="deduction2_to"
                                            placeholder="{{ __('tm_reference_time_management.label_to') }}">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction2_deduct">{{ __('tm_reference_time_management.label_deduct') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction2_deduct" name="deduction2_deduct"
                                            placeholder="{{ __('tm_reference_time_management.label_deduct') }}">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label
                                        for="deduction3">{{ __('tm_reference_time_management.label_deduction3') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction3_every">{{ __('tm_reference_time_management.label_every') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction1_to" name="deduction1_to"
                                            placeholder="{{ __('tm_reference_time_management.label_to') }}">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction3_deduct">{{ __('tm_reference_time_management.label_deduct') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="deduction3_deduct" name="deduction3_deduct"
                                            placeholder="{{ __('tm_reference_time_management.label_deduct') }}">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-overtime-spl" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> {{ __('tm_reference_time_management.btn_save') }}</button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> {{ __('tm_reference_time_management.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('tm_reference_time_management.alert_success') }}</span>
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

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        for(var i=0; i<60; i++){
            
        }

        // var $deduction1_from=$('#deduction1_from').flatpickr({
        //     enableTime: true,
        //     noCalendar: true,
        //     altInput: true,
        //     // static: true,
        //     allowInput: true,
        //     time_24hr: true,
        //     defaultDate: "today",
        //     altFormat: "H:i",
        //     dateFormat: "H:i:ss"
        // });

        // var $deduction1_to=$('#deduction1_to').flatpickr({
        //     enableTime: true,
        //     noCalendar: true,
        //     altInput: true,
        //     // static: true,
        //     allowInput: true,
        //     time_24hr: true,
        //     defaultDate: "today",
        //     altFormat: "H:i",
        //     dateFormat: "H:i:ss"
        // });

        loadDataProcessStatus();
        loadDataAbsent();
        loadDataDeductDay();

        function loadDataProcessStatus() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Process Status</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#process_status').select2({
                width: '100%',
                placeholder: 'Choose Process Status',
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
                    url: '/process_status/api',
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
                                    id: item.value,
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

        function loadDataAbsent() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#not_clock_in, #not_clock_out, #late, #early_back, #not_clock_in_early_back, #late_early_back, #not_clock_out_late, #unpaid_leave, #absent, #overtime').select2({
                width: '100%',
                placeholder: 'Choose Absent',
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
                    url: '/absent_code/api',
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
                                    text: item.description,
                                    id: item.description,
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

        var table = null;
        $('.div-navbar a.disabled').attr('onclick', 'return false;');

        $('#reference_time_management_table thead tr').clone(true).appendTo('#reference_time_management_table thead');
        $('#reference_time_management_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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

        load_data_table_reference_time_management();

        function load_data_table_reference_time_management() {
            table = $('#reference_time_management_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('time_management/reference_time_management/table') }}",
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
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'deductOvtDay', name: 'deductOvtDay'},
                    {data: 'description', name: 'description'},
                    {
                        data: 'deductFrom1', 
                        name: 'deductFrom1',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {
                        data: 'deductTo1', 
                        name: 'deductTo1',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {
                        data: 'deductHour1', 
                        name: 'deductHour1',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {
                        data: 'deductFrom2', 
                        name: 'deductFrom2',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {
                        data: 'deductTo2', 
                        name: 'deductTo2',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {
                        data: 'deductHour2', 
                        name: 'deductHour2',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {
                        data: 'deductEvery3', 
                        name: 'deductEvery3',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    },
                    {
                        data: 'deductHour3', 
                        name: 'deductHour3',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm:ss');
                        }
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function loadDataDeductDay() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6"><b>Deduct Day</b></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#deduct_day').select2({
                width: '100%',
                placeholder: 'Choose Deduct Day',
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
                    url: '/deduct_day/api',
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
                                    id: item.value,
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

        $("#toolbar-new").on('click', function() {
            $.redirect("{{ url('time_management/shift_master_code/detail_data') }}", { 'shiftCode' : null, 'func' : 'new' }, "GET", "iframe_dashboard");
        });

        $("#toolbar-edit").on('click', function() {
            var data = table.rows('.selected').data();
            if(data.count() > 0){
                $.redirect("{{ url('time_management/shift_master_code/detail_data') }}", { 'shiftCode' : data[0].shiftCode, 'func' : 'edit' }, "GET", "iframe_dashboard");
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        

        $('#shift_master_code_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table.row(this).data();
            $.redirect("{{ url('time_management/shift_master_code/detail_data') }}", { 'shiftCode' : data.shiftCode, 'func' : 'edit' }, "GET", "iframe_dashboard");
        });
    })
</script>

</html>