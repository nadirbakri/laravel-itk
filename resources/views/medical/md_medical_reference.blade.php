<!DOCTYPE html>
<html>
<head>
	<title>{{ __('md_medical_reference.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.monthselect.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/medical_detail.css') }}">
	<style type="text/css">
		.div-medical {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
        .modal-header-notification-error {
            border-bottom:1px solid #eee;
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
                <span>{{ __('md_medical_reference.label_back') }}</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>{{ __('md_medical_reference.label_next') }}</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>{{ __('md_medical_reference.label_new') }}</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>{{ __('md_medical_reference.label_edit') }}</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>{{ __('md_medical_reference.btn_save') }}</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>{{ __('md_medical_reference.label_list') }}</span>
            </a>
        </div>
        <div class="div-title">
			<a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('md_medical_reference.list') }}</span>
			</a>
        </div>
        <div class="div-form">
            <form id="medical_reference_form" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="processing_period">{{ __('md_medical_reference.label_processing_period') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="processing_period" name="processing_period"
                                    placeholder="{{ __('md_medical_reference.label_processing_period') }}">
                            </div>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="basic_calculation">{{ __('md_medical_reference.label_basic_calculation') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="limit_by">{{ __('md_medical_reference.label_limit_by') }}</label>
                            <select class="form-control select2" id="limit_by" name="limit_by" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period_start_month">{{ __('md_medical_reference.label_period_start_month') }}</label>
                            <select class="form-control" id="period_start_month" name="period_start_month" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="eligible_by">{{ __('md_medical_reference.label_eligible_by') }}</label>
                            <select class="form-control select2" id="eligible_by" name="eligible_by" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="check_default_multiple_month_for_payment_plan">&nbsp;</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_default_multiple_month_for_payment_plan"
                                    name="check_default_multiple_month_for_payment_plan" value="true" disabled>
                                <label
                                    for="check_default_multiple_month_for_payment_plan">{{ __('md_medical_reference.label_check_default_multiple_month_for_payment_plan') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="minimum_service_length_by">{{ __('md_medical_reference.label_minimum_service_length_by') }}</label>
                            <select class="form-control select2" id="minimum_service_length_by" name="minimum_service_length_by" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="default_medical_payment_bank_type">{{ __('md_medical_reference.label_default_medical_payment_bank_type') }}</label>
                            <select class="form-control select2" id="default_medical_payment_bank_type" name="default_medical_payment_bank_type" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="last_transaction_date_for_process_payroll">{{ __('md_medical_reference.label_last_transaction_date_for_process_payroll') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="last_transaction_date_for_process_payroll" name="last_transaction_date_for_process_payroll"
                                    placeholder="{{ __('md_medical_reference.label_last_transaction_date_for_process_payroll') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label
                                for="proportional_limit_for_new_employee">{{ __('md_medical_reference.label_proportional_limit_for_new_employee') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="proportional_limit_for_new_employee_yes"
                                    name="proportional_limit_for_new_employee" value="true" disabled>
                                <label class="form-radio-label"
                                    for="proportional_limit_for_new_employee">{{ __('md_medical_reference.label_proportional_limit_for_new_employee_yes') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="proportional_limit_for_new_employee_no"
                                    name="proportional_limit_for_new_employee" value="false" disabled> 
                                <label class="form-radio-label"
                                    for="proportional_limit_for_new_employee">{{ __('md_medical_reference.label_proportional_limit_for_new_employee_no') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <h5
                                for="maximum_expired_receipt">{{ __('md_medical_reference.label_maximum_expired_receipt') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="for_company_length">{{ __('md_medical_reference.label_for_company') }}</label>
                            <input type="number" class="form-control" id="for_company_length" name="for_company_length"
                                placeholder="{{ __('md_medical_reference.label_length') }}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="for_company_days">&nbsp;</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="for_company_days"
                                    name="for_company" value="D" disabled>
                                <label class="form-radio-label"
                                    for="for_company">{{ __('md_medical_reference.label_for_company_days') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="for_company_months">&nbsp;</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="for_company_months"
                                    name="for_company" value="M" disabled> 
                                <label class="form-radio-label"
                                    for="for_company">{{ __('md_medical_reference.label_for_company_months') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="for_company_year">&nbsp;</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="for_company_year"
                                    name="for_company" value="Y" disabled> 
                                <label class="form-radio-label"
                                    for="for_company">{{ __('md_medical_reference.label_for_company_year') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="for_insurance_length">{{ __('md_medical_reference.label_for_insurance') }}</label>
                            <input type="number" class="form-control" id="for_insurance_length" name="for_insurance_length"
                                placeholder="{{ __('md_medical_reference.label_length') }}">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="for_insurance_days">&nbsp;</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="for_insurance_days"
                                    name="for_insurance" value="D" disabled>
                                <label class="form-radio-label"
                                    for="for_insurance">{{ __('md_medical_reference.label_for_insurance_days') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="for_insurance_months">&nbsp;</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="for_insurance_months"
                                    name="for_insurance" value="M" disabled> 
                                <label class="form-radio-label"
                                    for="for_insurance">{{ __('md_medical_reference.label_for_insurance_months') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="for_insurance_year">&nbsp;</label>
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="for_insurance_year"
                                    name="for_insurance" value="Y" disabled> 
                                <label class="form-radio-label"
                                    for="for_insurance">{{ __('md_medical_reference.label_for_insurance_year') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="maximum_dependents">{{ __('md_medical_reference.label_maximum_dependents') }}</label>
                            <input type="number" class="form-control" id="maximum_dependents" name="maximum_dependents"
                                placeholder="{{ __('md_medical_reference.label_maximum_dependents') }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="maximum_child_age">{{ __('md_medical_reference.label_maximum_child_age') }}</label>
                            <input type="number" class="form-control" id="maximum_child_age" name="maximum_child_age"
                                placeholder="{{ __('md_medical_reference.label_maximum_child_age') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_contract_employee"
                                    name="check_contract_employee" value="true" disabled>
                                <label
                                    for="check_contract_employee">{{ __('md_medical_reference.label_check_contract_employee') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="insurance">{{ __('md_medical_reference.label_insurance') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="join_insurance">{{ __('md_medical_reference.label_join_insurance') }}</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="join_insurance_yes"
                                    name="join_insurance" value="true" disabled>
                                <label class="form-radio-label"
                                    for="join_insurance">{{ __('md_medical_reference.label_join_insurance_yes') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="join_insurance_no"
                                    name="join_insurance" value="false" disabled> 
                                <label class="form-radio-label"
                                    for="join_insurance">{{ __('md_medical_reference.label_join_insurance_no') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="insurance_policy_no">{{ __('md_medical_reference.label_insurance_policy_no') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="insurance_policy_no" name="insurance_policy_no"
                                    placeholder="{{ __('md_medical_reference.label_insurance_policy_no') }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="insurance_period_from">{{ __('md_medical_reference.label_insurance_period') }}</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="insurance_period_from" name="insurance_period_from"
                                    placeholder="{{ __('md_medical_reference.label_insurance_period_from') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label class="pt-2"><br></label>
                            <p style="font-size: 1rem;">To</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="insurance_period_to">&nbsp;</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="insurance_period_to" name="insurance_period_to"
                                    placeholder="{{ __('md_medical_reference.label_insurance_period_to') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="other">{{ __('md_medical_reference.label_other') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="check_transfer_salary_from_payroll"
                                    name="check_transfer_salary_from_payroll" value="true" disabled>
                                <label
                                    for="check_transfer_salary_from_payroll">{{ __('md_medical_reference.label_check_transfer_salary_from_payroll') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="transaction_rate_type_code">{{ __('md_medical_reference.label_transaction_rate_type_code') }}</label>
                            <select class="form-control select2" id="transaction_rate_type_code" name="transaction_rate_type_code" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="transaction_rate_type_name">&nbsp;</label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="transaction_rate_type_name" name="transaction_rate_type_name"
                                    placeholder="{{ __('md_medical_reference.label_transaction_rate_type_name') }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="rounding_method_code">{{ __('md_medical_reference.label_rounding_method') }}</label>
                            <select class="form-control select2" id="rounding_method_code" name="rounding_method_code" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="rounding_method_decimal">&nbsp;</label>
                            <div class='input-group'>
                                <input type="number" class="form-control" id="rounding_method_decimal" name="rounding_method_decimal"
                                    placeholder="{{ __('md_medical_reference.label_rounding_method_decimal') }}" disabled>
                            </div>
                        </div>
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
                        <span class="title-text-notification">{{ __('md_medical_reference.alert_success') }}</span>
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
<script src="{{ asset('js/jquery.redirect.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
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

        var arrData = @json($data);

        let pickrProcessPeriod = $('#processing_period').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
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
                $flatPickrInput.siblings("#processing_period").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerLastTransactionDate = $('#last_transaction_date_for_process_payroll').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#last_transaction_date_for_process_payroll").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerInsurancePeriodFrom = $('#insurance_period_from').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#insurance_period_from").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerInsurancePeriodTo = $('#insurance_period_to').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#insurance_period_to").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        pickrProcessPeriod._input.setAttribute('disabled', 'disalbed');
        pickerLastTransactionDate._input.setAttribute('disabled', 'disalbed');
        pickerInsurancePeriodFrom._input.setAttribute('disabled', 'disalbed');
        pickerInsurancePeriodTo._input.setAttribute('disabled', 'disalbed');

        for (var i = 1; i <= 12; i++){
            $('#period_start_month').append($('<option/>').val(i).text(i));
        }

        loadDataLimitEligible('#limit_by');
        loadDataLimitEligible('#eligible_by');
        loadDataMinimumService();
        loadDataDefaultMedicalPaymentBankType();
        loadDataRateType();
        loadDataRoundingMethod();

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        if (arrData) {
            pickrProcessPeriod.setDate(arrData[0].processingPeriod);
            $.ajax({
                type: 'GET',
                url: "{{ url('/limit_eligible/func/api') }}",
                data: {
                    'limitEligible' : arrData[0].limitBy
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#limit_by").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/limit_eligible/func/api') }}",
                data: {
                    'limitEligible' : arrData[0].eligibleBy
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#eligible_by").append($newOption).trigger('change');
            });
            $("#period_start_month").val(arrData[0].periodStartMonth).trigger('change');
            if (typeof arrData[0].defaultPaymentPlanForMultipleMonth !== 'undefined') {
                if(arrData[0].defaultPaymentPlanForMultipleMonth) {
                    $('#check_default_multiple_month_for_payment_plan').prop('checked', true).trigger('change');
                } else {
                    $('#check_default_multiple_month_for_payment_plan').prop('checked', false).trigger('change');
                }
            }
            $.ajax({
                type: 'GET',
                url: "{{ url('/minimum_service_length/func/api') }}",
                data: {
                    'minServiceLengthBy' : arrData[0].minServiceLengthBy
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#minimum_service_length_by").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/default_medical_payment_bank_type/func/api') }}",
                data: {
                    'defaultMedicalPaymentBankType' : arrData[0].defaultMedicalPaymentBankType
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#default_medical_payment_bank_type").append($newOption).trigger('change');
            });
            pickerLastTransactionDate.setDate(arrData[0].lastConfirmDate);
            if (typeof arrData[0].flagProportionalLimitForNewEmployee !== 'undefined') {
                if(arrData[0].flagProportionalLimitForNewEmployee) {
                    $('#proportional_limit_for_new_employee_yes').prop('checked', true).trigger('change');
                } else {
                    $('#proportional_limit_for_new_employee_no').prop('checked', true).trigger('change');
                }
            }
            $('#for_company_length').val(arrData[0].expiredReceiptPeriodLengthCompany);
            if (typeof arrData[0].expiredReceiptPeriodTypeCompany !== 'undefined') {
                if(arrData[0].expiredReceiptPeriodTypeCompany == "D") {
                    $('#for_company_days').prop('checked', true).trigger('change');
                } else if(arrData[0].expiredReceiptPeriodTypeCompany == "M") {
                    $('#for_company_months').prop('checked', true).trigger('change');
                } else if(arrData[0].expiredReceiptPeriodTypeCompany == "Y") {
                    $('#for_company_year').prop('checked', true).trigger('change');
                }
            }
            $('#for_insurance_length').val(arrData[0].expiredReceiptPeriodLengthInsurance);
            if (typeof arrData[0].expiredReceiptPeriodTypeInsurance !== 'undefined') {
                if(arrData[0].expiredReceiptPeriodTypeInsurance == "D") {
                    $('#for_insurance_days').prop('checked', true).trigger('change');
                } else if(arrData[0].expiredReceiptPeriodTypeInsurance == "M") {
                    $('#for_insurance_months').prop('checked', true).trigger('change');
                } else if(arrData[0].expiredReceiptPeriodTypeInsurance == "Y") {
                    $('#for_insurance_year').prop('checked', true).trigger('change');
                }
            }
            $('#maximum_dependents').val(arrData[0].maxDependents);
            $('#maximum_child_age').val(arrData[0].childMaxAge);
            if (typeof arrData[0].flagContractEmployee !== 'undefined') {
                if(arrData[0].flagContractEmployee) {
                    $('#check_contract_employee').prop('checked', true).trigger('change');
                } else {
                    $('#check_contract_employee').prop('checked', false).trigger('change');
                }
            }
            if (typeof arrData[0].flagInsurance !== 'undefined') {
                if(arrData[0].flagInsurance) {
                    $('#join_insurance_yes').prop('checked', true).trigger('change');
                } else {
                    $('#join_insurance_no').prop('checked', true).trigger('change');
                }
            }
            $('#insurance_policy_no').val(arrData[0].policyNo);
            pickerInsurancePeriodFrom.setDate(arrData[0].insurancePeriodStart);
            pickerInsurancePeriodTo.setDate(arrData[0].insurancePeriodEnd);
            if (typeof arrData[0].flagTransferSalaryFromPayroll !== 'undefined') {
                if(arrData[0].flagTransferSalaryFromPayroll) {
                    $('#check_transfer_salary_from_payroll').prop('checked', true).trigger('change');
                } else {
                    $('#check_transfer_salary_from_payroll').prop('checked', false).trigger('change');
                }
            }
            $.ajax({
                type: 'GET',
                url: "{{ url('/rate_type/func/api') }}",
                data: {
                    'transactionRateTypeCode': arrData[0].transactionRateTypeCode
                }
            }).then(function (data) {
                var option = $('<option/>', {
                    id: data[0].comGenCode,
                    title: data[0].value,
                    text: data[0].comGenCode
                });
                $("#transaction_rate_type_code").append(option).attr('data-alias', 'yourvalue').trigger(
                    'change');
                $("#transaction_rate_type_code").trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].comGenCode,
                        text: data[0].comGenCode,
                        data: data[0]
                    }
                });
            });
            $.ajax({
                type: 'GET',
                url: "{{ url('/rounding_method/func/api') }}",
                data: {
                    'roundingMethod' : arrData[0].roundingMethod
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#rounding_method_code").append($newOption).trigger('change');
            });
            $('#rounding_method_decimal').val(arrData[0].roundingDecimal);
            $("#toolbar-new").hide();
            $("#toolbar-edit").show();
        } else {
            $('#limit_by').val(null).trigger('change');
            $('#eligible_by').val(null).trigger('change');
            $('#period_start_month').val("1").trigger('change');
            $('#check_default_multiple_month_for_payment_plan').prop('checked', false).trigger('change');
            $('#minimum_service_length_by').val(null).trigger('change');
            $('#default_medical_payment_bank_type').val(null).trigger('change');
            $('#proportional_limit_for_new_employee_yes').prop('checked', true).trigger('change');
            $('#for_company_length').val("");
            $('#for_company_days').prop('checked', true).trigger('change');
            $('#for_insurance_length').val("");
            $('#for_insurance_days').prop('checked', true).trigger('change');
            $('#maximum_dependents').val("");
            $('#maximum_child_age').val("");
            $('#check_contract_employee').prop('checked', false).trigger('change');
            $('#join_insurance_yes').prop('checked', true).trigger('change');
            $('#insurance_policy_no').val("");
            $('#check_transfer_salary_from_payroll').prop('checked', false).trigger('change');
            $('#transaction_rate_type_code').val(null).trigger('change');
            $('#rounding_method_code').val(null).trigger('change');
            $('#rounding_method_decimal').val("");
            $("#toolbar-new").show();
            $("#toolbar-edit").hide();
        }

        function loadDataLimitEligible(field = '') {
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

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Data',
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
                    url: "{{ url('/limit_eligible/api') }}",
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

        function loadDataMinimumService() {
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

            $('#minimum_service_length_by').select2({
                width: '100%',
                placeholder: 'Choose Data',
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
                    url: "{{ url('/minimum_service_length/api') }}",
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

        function loadDataDefaultMedicalPaymentBankType() {
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

            $('#default_medical_payment_bank_type').select2({
                width: '100%',
                placeholder: 'Choose Data',
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
                    url: "{{ url('/default_medical_payment_bank_type/api') }}",
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

        function loadDataRateType() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.comGenCode + '</div>' +
                        '<div class="col-6">' + data.data.value + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#transaction_rate_type_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Currency Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#transaction_rate_type_code').select2({
                width: '100%',
                placeholder: 'Choose Rate Type',
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
                    url: "{{ url('/rate_type/api') }}",
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
                                    text: item.comGenCode,
                                    title: item.value,
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

        function loadDataRoundingMethod() {
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

            $('#rounding_method_code').select2({
                width: '100%',
                placeholder: 'Choose Data',
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
                    url: "{{ url('/rounding_method/api') }}",
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

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "{{ url('medical/medical_reference') }}";
        });

        $('#transaction_rate_type_code').on("select2:select", function (e) {
            var data = $('#transaction_rate_type_code').select2('data');
            $('#transaction_rate_type_name').val(htmlDecode(data[0].title));
        });

        $('#transaction_rate_type_code').on("select2:unselecting", function (e) {
            $('#transaction_rate_type_name').val('');
        });

        $("#toolbar-new").on('click', function() {
            $('#record_function').val("New");
            $('#limit_by').val(null).trigger('change');
            $('#eligible_by').val(null).trigger('change');
            $('#period_start_month').val("1").trigger('change');
            $('#check_default_multiple_month_for_payment_plan').prop('checked', false).trigger('change');
            $('#minimum_service_length_by').val(null).trigger('change');
            $('#default_medical_payment_bank_type').val(null).trigger('change');
            $('#proportional_limit_for_new_employee_yes').prop('checked', true).trigger('change');
            $('#for_company_length').val("");
            $('#for_company_days').prop('checked', true).trigger('change');
            $('#for_insurance_length').val("");
            $('#for_insurance_days').prop('checked', true).trigger('change');
            $('#maximum_dependents').val("");
            $('#maximum_child_age').val("");
            $('#check_contract_employee').prop('checked', false).trigger('change');
            $('#join_insurance_yes').prop('checked', true).trigger('change');
            $('#insurance_policy_no').val("");
            $('#check_transfer_salary_from_payroll').prop('checked', false).trigger('change');
            $('#transaction_rate_type_code').val(null).trigger('change');
            $('#rounding_method_code').val(null).trigger('change');
            $('#rounding_method_decimal').val("");
            pickrProcessPeriod._input.removeAttribute('disabled');
            pickerLastTransactionDate._input.removeAttribute('disabled');
            pickerInsurancePeriodFrom._input.removeAttribute('disabled');
            pickerInsurancePeriodTo._input.removeAttribute('disabled');
            $('#limit_by').prop('disabled', false);
            $('#period_start_month').prop('disabled', false);
            $('#eligible_by').prop('disabled', false);
            $('#check_default_multiple_month_for_payment_plan').prop('disabled', false).trigger('change');
            $('#minimum_service_length_by').prop('disabled', false);
            $('#default_medical_payment_bank_type').prop('disabled', false);
            $('#proportional_limit_for_new_employee_yes').prop('disabled', false).trigger('change');
            $('#proportional_limit_for_new_employee_no').prop('disabled', false).trigger('change');
            $('#for_company_length').prop('disabled', false);
            $('#for_company_days').prop('disabled', false).trigger('change');
            $('#for_company_months').prop('disabled', false).trigger('change');
            $('#for_company_year').prop('disabled', false).trigger('change');
            $('#for_insurance_length').prop('disabled', false);
            $('#for_insurance_days').prop('disabled', false).trigger('change');
            $('#for_insurance_months').prop('disabled', false).trigger('change');
            $('#for_insurance_year').prop('disabled', false).trigger('change');
            $('#maximum_dependents').prop('disabled', false);
            $('#maximum_child_age').prop('disabled', false);
            $('#check_contract_employee').prop('disabled', false).trigger('change');
            $('#join_insurance_yes').prop('disabled', false).trigger('change');
            $('#join_insurance_no').prop('disabled', false).trigger('change');
            $('#insurance_policy_no').prop('disabled', false);
            $('#check_transfer_salary_from_payroll').prop('disabled', false).trigger('change');
            $('#transaction_rate_type_code').prop('disabled', false);
            $('#rounding_method_code').prop('disabled', false);
            $('#rounding_method_decimal').prop('disabled', false);
            $("#toolbar-save").show();
        });

        $("#toolbar-edit").on('click', function() {
            $('#record_function').val("Edit");
            pickrProcessPeriod._input.removeAttribute('disabled');
            pickerLastTransactionDate._input.removeAttribute('disabled');
            pickerInsurancePeriodFrom._input.removeAttribute('disabled');
            pickerInsurancePeriodTo._input.removeAttribute('disabled');
            $('#limit_by').prop('disabled', false);
            $('#period_start_month').prop('disabled', false);
            $('#eligible_by').prop('disabled', false);
            $('#check_default_multiple_month_for_payment_plan').prop('disabled', false).trigger('change');
            $('#minimum_service_length_by').prop('disabled', false);
            $('#default_medical_payment_bank_type').prop('disabled', false);
            $('#proportional_limit_for_new_employee_yes').prop('disabled', false).trigger('change');
            $('#proportional_limit_for_new_employee_no').prop('disabled', false).trigger('change');
            $('#for_company_length').prop('disabled', false);
            $('#for_company_days').prop('disabled', false).trigger('change');
            $('#for_company_months').prop('disabled', false).trigger('change');
            $('#for_company_year').prop('disabled', false).trigger('change');
            $('#for_insurance_length').prop('disabled', false);
            $('#for_insurance_days').prop('disabled', false).trigger('change');
            $('#for_insurance_months').prop('disabled', false).trigger('change');
            $('#for_insurance_year').prop('disabled', false).trigger('change');
            $('#maximum_dependents').prop('disabled', false);
            $('#maximum_child_age').prop('disabled', false);
            $('#check_contract_employee').prop('disabled', false).trigger('change');
            $('#join_insurance_yes').prop('disabled', false).trigger('change');
            $('#join_insurance_no').prop('disabled', false).trigger('change');
            $('#insurance_policy_no').prop('disabled', false);
            $('#check_transfer_salary_from_payroll').prop('disabled', false).trigger('change');
            $('#transaction_rate_type_code').prop('disabled', false);
            $('#rounding_method_code').prop('disabled', false);
            $('#rounding_method_decimal').prop('disabled', false);
            $("#toolbar-save").show();
        });

        $("#toolbar-save").on('click', function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#medical_reference_form").submit();
        });

        if ($("#medical_reference_form").length > 0) {
            $("#medical_reference_form").validate({
                rules: {
                    processing_period: {
                        required: true,
                    },
                    limit_by: {
                        required: true,
                    },
                    eligible_by: {
                        required: true,
                    },
                    insurance_policy_no: {
                        required: "#join_insurance_yes:checked",
                    },
                    insurance_period_from: {
                        required: "#join_insurance_yes:checked",
                    },
                    insurance_period_to: {
                        required: "#join_insurance_yes:checked",
                    },
                    transaction_rate_type_code: {
                        required: true,
                    },
                    rounding_method_code: {
                        required: true,
                    },
                    rounding_method_decimal: {
                        required: true,
                    },
                },
                messages: {
                    processing_period: {
                        required: "{{ __('md_medical_reference.processing_period_required') }}",
                    },
                    limit_by: {
                        required: "{{ __('md_medical_reference.limit_by_required') }}",
                    },
                    eligible_by: {
                        required: "{{ __('md_medical_reference.eligible_by_required') }}",
                    },
                    insurance_policy_no: {
                        required: "{{ __('md_medical_reference.insurance_policy_no_required') }}",
                    },
                    insurance_period_from: {
                        required: "{{ __('md_medical_reference.insurance_period_from_required') }}",
                    },
                    insurance_period_to: {
                        required: "{{ __('md_medical_reference.insurance_period_to_required') }}",
                    },
                    transaction_rate_type_code: {
                        required: "{{ __('md_medical_reference.transaction_rate_type_code_required') }}",
                    },
                    rounding_method_code: {
                        required: "{{ __('md_medical_reference.rounding_method_code_required') }}",
                    },
                    rounding_method_decimal: {
                        required: "{{ __('md_medical_reference.rounding_method_decimal_required') }}",
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
                    $("#toolbar-save").prop("disabled", false);
                    $("#toolbar-save").html(
                        '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                        '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                        '<span>{{ __("md_medical_reference.btn_save") }}</span>'
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
                        url: "{{ url('medical/medical_reference/proses') }}",
                        type: "POST",
                        data: $('#medical_reference_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>{{ __("md_medical_reference.btn_save") }}</span>'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);

                                setTimeout(function () {
                                    window.location =
                                        "{{ url('medical/medical_reference') }}";
                                }, 3000);
                            } else {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>{{ __("md_medical_reference.btn_save") }}</span>'
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
                            $("#toolbar-save").prop("disabled", false);
                            $("#toolbar-save").html(
                                '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                '<span>{{ __("md_medical_reference.btn_save") }}</span>'
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