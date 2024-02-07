<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_reference_payroll.judul') }}</title>
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
    <link rel="stylesheet" href="{{ asset('css/payroll_detail.css') }}">
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

        .row .box {
            border: 1px solid #004883;
            padding: 5px;
        }

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-new" target="iframe_dashboard">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-save" style="display: none;">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-active">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" style="display: none;" href="javascript:void(0)" id="toolbar-deactive">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
            <a class="list-functionbar-sm" style="display: none;" href="javascript:void(0)" id="toolbar-delete">
                <img src="{{ url('/icons/functionbar/remove.svg') }}" alt="Delete">
                <img src="{{ url('/icons/functionbar/remove.svg') }}" class="functionbar-hover" alt="Delete">
                <span>Delete</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-process">
                <img src="{{ url('/icons/functionbar/process.svg') }}" alt="Process">
                <img src="{{ url('/icons/functionbar/process.svg') }}" class="functionbar-hover" alt="Process">
                <span>Process</span>
            </a>
        </div>
        <div class="div-title">
			<a href="{{ route('payroll', ['moduleID' => 'PY']) }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('payroll_reference_payroll.list') }}</span>
			</a>
		</div>
        <div class="div-form">
            <form id="reference_payroll_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="process_period">{{ __('payroll_reference_payroll.label_process_period') }}</label>
                                <input type="number" class="form-control" id="process_period_month" name="process_period_month"
                                    placeholder="{{ __('payroll_reference_payroll.label_process_period_month') }}" readonly>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <p style="font-size: 1.5rem;"><b>/</b></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <input type="number" class="form-control" id="process_period_year" name="process_period_year"
                                placeholder="{{ __('payroll_reference_payroll.label_process_period_year') }}" readonly>
                        </div>
                        <input type="text" class="form-control" id="record_function" name="record_function" hidden>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="process_status">{{ __('payroll_reference_payroll.label_process_status') }}</label>
                            <select class="form-control select2" id="process_status" name="process_status" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="payroll_payment_period">{{ __('payroll_reference_payroll.label_payroll_payment_period') }}</label>
                            <input type="number" class="form-control" id="payroll_payment_period" name="payroll_payment_period"
                                placeholder="{{ __('payroll_reference_payroll.label_payroll_payment_period') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="company_name">{{ __('payroll_reference_payroll.label_company_name') }}</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                placeholder="{{ __('payroll_reference_payroll.label_company_name') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="address">{{ __('payroll_reference_payroll.label_address') }}</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="{{ __('payroll_reference_payroll.label_address') }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="city">{{ __('payroll_reference_payroll.label_city') }}</label>
                            <input type="text" class="form-control" id="city" name="city"
                                placeholder="{{ __('payroll_reference_payroll.label_city') }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <a class="collapsed" data-toggle="collapse" href="#reference-data" aria-expanded="true"
                                aria-controls="reference-data">
                        <div class="card-header">
                            <div class="div-dropdown-title">
                                <span
                                    class="dropdown-title-text">{{ __('payroll_reference_payroll.label_reference') }}</span>
                                <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}"
                                    alt="Triangle">
                            </div>
                        </div>
                    </a>
                    <div id="reference-data" class="collapse show">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tax_registered_no">{{ __('payroll_reference_payroll.label_tax_registered_no') }}</label>
                                        <input type="text" class="form-control" id="tax_registered_no" name="tax_registered_no"
                                            placeholder="{{ __('payroll_reference_payroll.label_tax_registered_no') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="jamsostek_no">{{ __('payroll_reference_payroll.label_jamsostek_no') }}</label>
                                        <input type="text" class="form-control" id="jamsostek_no" name="jamsostek_no"
                                            placeholder="{{ __('payroll_reference_payroll.label_jamsostek_no') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pension_no">{{ __('payroll_reference_payroll.label_pension_no') }}</label>
                                        <input type="text" class="form-control" id="pension_no" name="pension_no"
                                            placeholder="{{ __('payroll_reference_payroll.label_pension_no') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="retirement_age_limit">{{ __('payroll_reference_payroll.label_retirement_age_limit') }}</label>
                                        <input type="number" class="form-control" id="retirement_age_limit" name="retirement_age_limit"
                                            placeholder="{{ __('payroll_reference_payroll.label_retirement_age_limit') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="prorate_method">{{ __('payroll_reference_payroll.label_prorate_method') }}</label>
                                        <select class="form-control select2" id="prorate_method" name="prorate_method" disabled>
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="maximum_dependents">{{ __('payroll_reference_payroll.label_maximum_dependents') }}</label>
                                        <input type="number" class="form-control" id="maximum_dependents" name="maximum_dependents"
                                            placeholder="{{ __('payroll_reference_payroll.label_maximum_dependents') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="take_home_pay_rounded_from">{{ __('payroll_reference_payroll.label_take_home_pay_rounded_from') }}</label>
                                        <input type="number" class="form-control" id="take_home_pay_rounded_from" name="take_home_pay_rounded_from"
                                            placeholder="{{ __('payroll_reference_payroll.label_take_home_pay_rounded_from') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="take_home_pay_rounded_become">{{ __('payroll_reference_payroll.label_take_home_pay_rounded_become') }}</label>
                                        <input type="number" class="form-control" id="take_home_pay_rounded_become" name="take_home_pay_rounded_become"
                                            placeholder="{{ __('payroll_reference_payroll.label_take_home_pay_rounded_become') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="transfer_data_from_medical">&nbsp;</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="transfer_data_from_medical"
                                                name="check_transfer_data_from_medical" value="true">
                                            <label
                                                for="check_transfer_data_from_medical">{{ __('payroll_reference_payroll.label_transfer_data_from_medical') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="transaction_rate_type">{{ __('payroll_reference_payroll.label_transaction_rate_type') }}</label>
                                        <select class="form-control select2" id="transaction_rate_type" name="transaction_rate_type" disabled>
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tax_rate_type">{{ __('payroll_reference_payroll.label_tax_rate_type') }}</label>
                                        <select class="form-control select2" id="tax_rate_type" name="tax_rate_type" disabled>
                                            <option value="" disabled selected></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rounding_method_report">{{ __('payroll_reference_payroll.label_rounding_method_report') }}</label>
                                        <select class="form-control select2" id="rounding_method_report" name="rounding_method_report" disabled>
                                            <option value="" disabled selected></select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rounding_decimal_report">{{ __('payroll_reference_payroll.label_rounding_decimal_report') }}</label>
                                        <input type="number" class="form-control" id="rounding_decimal_report" name="rounding_decimal_report"
                                            placeholder="{{ __('payroll_reference_payroll.label_rounding_decimal_report') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rounding_method_spt">{{ __('payroll_reference_payroll.label_rounding_method_spt') }}</label>
                                        <select class="form-control select2" id="rounding_method_spt" name="rounding_method_spt" disabled>
                                            <option value="" disabled selected></option></select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="rounding_decimal_spt">{{ __('payroll_reference_payroll.label_rounding_decimal_spt') }}</label>
                                        <input type="number" class="form-control" id="rounding_decimal_spt" name="rounding_decimal_spt"
                                            placeholder="{{ __('payroll_reference_payroll.label_rounding_decimal_spt') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="check_appreciation_and_employee_service">&nbsp;</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="check_appreciation_and_employee_service"
                                                name="check_appreciation_and_employee_service" value="true" disabled>
                                            <label
                                                for="check_appreciation_and_employee_service">{{ __('payroll_reference_payroll.label_appreciation_and_employee_service') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bonus_cooficient">{{ __('payroll_reference_payroll.label_bonus_cooficient') }}</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="bonus_cooficient" name="bonus_cooficient"
                                                placeholder="{{ __('payroll_reference_payroll.label_bonus_cooficient') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>x</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"> 
                                    <div class="form-group">
                                        <label for="tax_allowance">{{ __('payroll_reference_payroll.label_tax_allowance') }}</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" id="check_tax_allowance_bonus"
                                            name="check_tax_allowance_bonus" value="true" disabled>
                                        <label
                                            for="check_tax_allowance_bonus">{{ __('payroll_reference_payroll.label_tax_allowance_bonus') }}</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" id="check_tax_allowance_thr"
                                            name="check_tax_allowance_thr" value="true" disabled>
                                        <label
                                            for="check_tax_allowance_thr">{{ __('payroll_reference_payroll.label_tax_allowance_thr') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <a class="collapsed" data-toggle="collapse" href="#jamsostek-data" aria-expanded="true"
                                aria-controls="jamsostek-data">
                        <div class="card-header">
                            <div class="div-dropdown-title">
                                <span
                                    class="dropdown-title-text">{{ __('payroll_reference_payroll.label_jamsostek') }}</span>
                                <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}"
                                    alt="Triangle">
                            </div>
                        </div>
                    </a>
                    <div id="jamsostek-data" class="collapse show">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pension_contribution_employee">{{ __('payroll_reference_payroll.label_pension_contribution_employee') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="pension_contribution_employee" name="pension_contribution_employee"
                                                placeholder="{{ __('payroll_reference_payroll.label_pension_contribution_employee') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pension_contribution_employer">{{ __('payroll_reference_payroll.label_pension_contribution_employer') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="pension_contribution_employer" name="pension_contribution_employer"
                                                placeholder="{{ __('payroll_reference_payroll.label_pension_contribution_employer') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="work_related_accident_insurance_one">{{ __('payroll_reference_payroll.label_work_related_accident_insurance_one') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="work_related_accident_insurance_one" name="work_related_accident_insurance_one"
                                                placeholder="{{ __('payroll_reference_payroll.label_work_related_accident_insurance_one') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="work_related_accident_insurance_two">{{ __('payroll_reference_payroll.label_work_related_accident_insurance_two') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="work_related_accident_insurance_two" name="work_related_accident_insurance_two"
                                                placeholder="{{ __('payroll_reference_payroll.label_work_related_accident_insurance_two') }}"readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="work_related_accident_insurance_three">{{ __('payroll_reference_payroll.label_work_related_accident_insurance_three') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="work_related_accident_insurance_three" name="work_related_accident_insurance_three"
                                                placeholder="{{ __('payroll_reference_payroll.label_work_related_accident_insurance_three') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="non_accidental_death_insurance">{{ __('payroll_reference_payroll.label_non_accidental_death_insurance') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="non_accidental_death_insurance" name="non_accidental_death_insurance"
                                                placeholder="{{ __('payroll_reference_payroll.label_non_accidental_death_insurance') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="health_insurance_company">{{ __('payroll_reference_payroll.label_health_insurance_company') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="health_insurance_company" name="health_insurance_company"
                                                placeholder="{{ __('payroll_reference_payroll.label_health_insurance_company') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="health_insurance_employee">{{ __('payroll_reference_payroll.label_health_insurance_employee') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="health_insurance_employee" name="health_insurance_employee"
                                                placeholder="{{ __('payroll_reference_payroll.label_health_insurance_employee') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="min_calculation_health_insurance">{{ __('payroll_reference_payroll.label_min_calculation_health_insurance') }}</label>
                                        <input type="number" class="form-control" id="min_calculation_health_insurance" name="min_calculation_health_insurance"
                                            placeholder="{{ __('payroll_reference_payroll.label_min_calculation_health_insurance') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="max_calculation_health_insurance">{{ __('payroll_reference_payroll.label_max_calculation_health_insurance') }}</label>
                                        <input type="number" class="form-control" id="max_calculation_health_insurance" name="max_calculation_health_insurance"
                                            placeholder="{{ __('payroll_reference_payroll.label_max_calculation_health_insurance') }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pension_insurance_company">{{ __('payroll_reference_payroll.label_pension_insurance_company') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="pension_insurance_company" name="pension_insurance_company"
                                                placeholder="{{ __('payroll_reference_payroll.label_pension_insurance_company') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pension_insurance_employee">{{ __('payroll_reference_payroll.label_pension_insurance_employee') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="pension_insurance_employee" name="pension_insurance_employee"
                                                placeholder="{{ __('payroll_reference_payroll.label_pension_insurance_employee') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="min_calculation_pension_insurance">{{ __('payroll_reference_payroll.label_min_calculation_pension_insurance') }}</label>
                                        <input type="number" class="form-control" id="min_calculation_pension_insurance" name="min_calculation_pension_insurance"
                                            placeholder="{{ __('payroll_reference_payroll.label_min_calculation_pension_insurance') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="max_calculation_pension_insurance">{{ __('payroll_reference_payroll.label_max_calculation_pension_insurance') }}</label>
                                        <input type="number" class="form-control" id="max_calculation_pension_insurance" name="max_calculation_pension_insurance"
                                            placeholder="{{ __('payroll_reference_payroll.label_max_calculation_pension_insurance') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="multiplication_factor_daily_worker">{{ __('payroll_reference_payroll.label_multiplication_factor_daily_worker') }}</label>
                                        <input type="number" class="form-control" id="multiplication_factor_daily_worker" name="multiplication_factor_daily_worker"
                                            placeholder="{{ __('payroll_reference_payroll.label_multiplication_factor_daily_worker') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"> 
                                    <div class="form-group">
                                        <label for="calculation_method">{{ __('payroll_reference_payroll.label_calculation_method') }}</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" id="calculation_method_actual"
                                            name="calculation_method" value="A" disabled checked>
                                        <label
                                            for="calculation_method_actual">{{ __('payroll_reference_payroll.label_calculation_method_actual') }}</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" id="calculation_method_basic"
                                            name="calculation_method" value="B" disabled>
                                        <label
                                            for="calculation_method_basic">{{ __('payroll_reference_payroll.label_calculation_method_basic') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3"> 
                                    <div class="form-group">
                                        <label for="deduction_on_period_jamsostek">{{ __('payroll_reference_payroll.label_deduction_on_period') }}</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" id="check_all_period_jamsostek"
                                            name="deduction_on_period_jamsostek" value=0 disabled checked>
                                        <label
                                            for="check_all_period_jamsostek">{{ __('payroll_reference_payroll.label_deduction_on_period_all_period') }}</label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="check_on_period_jamsostek" name="deduction_on_period_jamsostek" disabled>
                                            <label
                                                for="check_on_period_jamsostek">{{ __('payroll_reference_payroll.label_deduction_on_period_period') }}</label>
                                            <small class="text-muted">(1 - 12)</small>
                                        </div>
                                        <input class="form-control" type="number" min=1 max=12 id="on_period_jamsostek" name="deduction_on_period_jamsostek" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="work_insurance_remision_payment_percentage">{{ __('payroll_reference_payroll.label_work_insurance_remision_payment_percentage') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="work_insurance_remision_payment_percentage" name="work_insurance_remision_payment_percentage"
                                                placeholder="{{ __('payroll_reference_payroll.label_work_insurance_remision_payment_percentage') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="work_insurance_remision_end_period">{{ __('payroll_reference_payroll.label_work_insurance_remision_end_period') }}</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="work_insurance_remision_end_period" name="work_insurance_remision_end_period"
                                                placeholder="{{ __('payroll_reference_payroll.label_work_insurance_remision_end_period') }}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="work_insurance_remision_end_period_calendar"><span class="fa fa-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <a class="collapsed" data-toggle="collapse" href="#tax-calculation-data" aria-expanded="true"
                                aria-controls="tax-calculation-data">
                        <div class="card-header">
                            <div class="div-dropdown-title">
                                <span
                                    class="dropdown-title-text">{{ __('payroll_reference_payroll.label_tax_calculation_table') }}</span>
                                <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}"
                                    alt="Triangle">
                            </div>
                        </div>
                    </a>
                    <div id="tax-calculation-data" class="collapse show">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-3"> 
                                    <div class="form-group">
                                        <label for="tax_calculation_method">{{ __('payroll_reference_payroll.label_tax_calculation_method') }}</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" id="tax_calculation_method_annualized"
                                            name="tax_calculation_method" value="A" disabled checked>
                                        <label
                                            for="tax_calculation_method_annualized">{{ __('payroll_reference_payroll.label_tax_calculation_method_annualized') }}</label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input class="form-check-input" type="radio" id="tax_calculation_method_prorated"
                                            name="tax_calculation_method" value="P" disabled>
                                        <label
                                            for="tax_calculation_method_prorated">{{ __('payroll_reference_payroll.label_tax_calculation_method_prorated') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <br>
                                        <label for="non_taxable_income">{{ __('payroll_reference_payroll.label_non_taxable_income') }}</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="non_taxable_income_employee">{{ __('payroll_reference_payroll.label_non_taxable_income_employee') }}</label>
                                        <input type="number" class="form-control" id="non_taxable_income_employee" name="non_taxable_income_employee"
                                            placeholder="{{ __('payroll_reference_payroll.label_non_taxable_income_employee') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="non_taxable_income_each_dependent">{{ __('payroll_reference_payroll.label_non_taxable_income_each_dependent') }}</label>
                                        <input type="number" class="form-control" id="non_taxable_income_each_dependent" name="non_taxable_income_each_dependent"
                                            placeholder="{{ __('payroll_reference_payroll.label_non_taxable_income_each_dependent') }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <br>
                                        <label for="occupational">{{ __('payroll_reference_payroll.label_occupational') }}</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="occupational_percentage">{{ __('payroll_reference_payroll.label_occupational_percentage') }}</label>
                                        <input type="number" class="form-control" id="occupational_percentage" name="occupational_percentage"
                                            placeholder="{{ __('payroll_reference_payroll.label_occupational_percentage') }}" readonly>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="occupational_maximum">{{ __('payroll_reference_payroll.label_occupational_maximum') }}</label>
                                        <small class="text-muted">(0 - 100)</small>
                                        <div class="input-group">
                                            <input type="number" min=0 max=100 class="form-control" id="occupational_maximum" name="occupational_maximum"
                                                placeholder="{{ __('payroll_reference_payroll.label_occupational_maximum') }}" readonly>
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span>%</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 box">
                                    <div class="row">
                                        <div class="col-3">
                                            <h6 for="tax_rate">{{ __('payroll_reference_payroll.label_tax_rate') }}</h6>
                                        </div>
                                        <div class="col-3">
                                            <h6 for="taxable_income">{{ __('payroll_reference_payroll.label_taxable_income') }}</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="tax_rate1" name="tax_rate1" placeholder="{{ __('payroll_reference_payroll.label_tax_rate') }} 1" readonly />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><span>%</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="tax_rate2" name="tax_rate2" placeholder="{{ __('payroll_reference_payroll.label_tax_rate') }} 2" readonly />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><span>%</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="tax_rate3" name="tax_rate3" placeholder="{{ __('payroll_reference_payroll.label_tax_rate') }} 3" readonly />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><span>%</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="tax_rate4" name="tax_rate4" placeholder="{{ __('payroll_reference_payroll.label_tax_rate') }} 4" readonly />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><span>%</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="tax_rate5" name="tax_rate5" placeholder="{{ __('payroll_reference_payroll.label_tax_rate') }} 5" readonly />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><span>%</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="tax_rate6" name="tax_rate6" placeholder="{{ __('payroll_reference_payroll.label_tax_rate') }} 6" readonly />
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><span>%</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_from1" name="taxable_income_from1" data-seq=1 placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 1" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_from2" name="taxable_income_from2" data-seq=2 placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 2" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_from3" name="taxable_income_from3" data-seq=3 placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 3" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_from4" name="taxable_income_from4" data-seq=4 placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 4" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_from5" name="taxable_income_from5" data-seq=5 placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 5" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_from6" name="taxable_income_from6" data-seq=6 placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 6" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-0.5">
                                            <div class="form-group">
                                                <div id="div-grid-taxable-income-minus"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_to1" name="taxable_income_to1" placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 1" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_to2" name="taxable_income_to2" placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 2" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_to3" name="taxable_income_to3" placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 3" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_to4" name="taxable_income_to4" placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 4" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" id="taxable_income_to5" name="taxable_income_to5" placeholder="{{ __("payroll_reference_payroll.label_taxable_income") }} 5" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="and_on_taxable_income">{{ __('payroll_reference_payroll.label_and_on') }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nearest_taxable_income">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="check_nearest_taxable_income" name="check_nearest_taxable_income" value="true" disabled>
                                                    <label
                                                        for="nearest_taxable_income">{{ __('payroll_reference_payroll.label_nearest_taxable_income') }}</label>
                                                </div>
                                                <input type="number" class="form-control" id="nearest_taxable_income" name="nearest_taxable_income"
                                                        placeholder="{{ __('payroll_reference_payroll.label_nearest_taxable_income') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label
                                                    for="time_test">{{ __('payroll_reference_payroll.label_time_test') }}</label>
                                                <input type="number" class="form-control" id="time_test" name="time_test"
                                                    placeholder="{{ __('payroll_reference_payroll.label_time_test') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tax_rate_with_time_test">{{ __('payroll_reference_payroll.label_tax_rate_with_time_test') }}</label>
                                                <small class="text-muted">(0 - 100)</small>
                                                <div class="input-group">
                                                    <input type="number" min=0 max=100 class="form-control" id="tax_rate_with_time_test" name="tax_rate_with_time_test"
                                                        placeholder="{{ __('payroll_reference_payroll.label_tax_rate_with_time_test') }}" readonly>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span>%</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label
                                                    for="max_gross_income">{{ __('payroll_reference_payroll.label_max_gross_income') }}</label>
                                                <input type="number" class="form-control" id="max_gross_income" name="max_gross_income"
                                                    placeholder="{{ __('payroll_reference_payroll.label_max_gross_income') }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 box">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tax_by_government">{{ __('payroll_reference_payroll.label_tax_by_government') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tax_by_government_tk">T/K</label>
                                                <input type="number" class="form-control" id="tax_by_government_tk" name="tax_by_government_tk"
                                                    placeholder="T/K" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tax_by_government_k0">K/0</label>
                                                <input type="number" class="form-control" id="tax_by_government_k0" name="tax_by_government_k0"
                                                    placeholder="K/0" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tax_by_government_k1">K/1</label>
                                                <input type="number" class="form-control" id="tax_by_government_k1" name="tax_by_government_k1"
                                                    placeholder="K/1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tax_by_government_k2">K/2</label>
                                                <input type="number" class="form-control" id="tax_by_government_k2" name="tax_by_government_k2"
                                                    placeholder="K/2" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="tax_by_government_k3">K/3</label>
                                                <input type="number" class="form-control" id="tax_by_government_k3" name="tax_by_government_k3"
                                                    placeholder="K/3" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-4"> 
                                            <div class="form-group">
                                                <label for="deduction_on_period_tax_calculation_table">{{ __('payroll_reference_payroll.label_deduction_on_period') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="check_all_period_tax_calculation_table"
                                                        name="deduction_on_period_tax_calculation_table" value=0 disabled checked>
                                                    <label
                                                        for="check_all_period_tax_calculation_table">{{ __('payroll_reference_payroll.label_deduction_on_period_all_period') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="check_on_period_tax_calculation_table" name="deduction_on_period_tax_calculation_table" disabled>
                                                    <label
                                                        for="check_on_period_tax_calculation_table">{{ __('payroll_reference_payroll.label_deduction_on_period_period') }}</label>
                                                    <small class="text-muted">(1 - 12)</small>
                                                </div>
                                                <input class="form-control" type="number" min=1 max=12 id="on_period_tax_calculation_table" name="deduction_on_period_tax_calculation_table" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tax_penalties">{{ __('payroll_reference_payroll.label_tax_penalties') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tax_penalties_salary">{{ __('payroll_reference_payroll.label_tax_penalties_salary') }}</label>
                                                <small class="text-muted">(0 - 100)</small>
                                                <div class="input-group">
                                                    <input type="number" min=0 max=100 class="form-control" id="tax_penalties_salary" name="tax_penalties_salary"
                                                        placeholder="{{ __('payroll_reference_payroll.label_tax_penalties_salary') }}" readonly>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span>%</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tax_penalties_bonus">{{ __('payroll_reference_payroll.label_tax_penalties_bonus') }}</label>
                                                <small class="text-muted">(0 - 100)</small>
                                                <div class="input-group">
                                                    <input type="number" min=0 max=100 class="form-control" id="tax_penalties_bonus" name="tax_penalties_bonus"
                                                        placeholder="{{ __('payroll_reference_payroll.label_tax_penalties_bonus') }}" readonly>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span>%</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tax_penalties_thr">{{ __('payroll_reference_payroll.label_tax_penalties_thr') }}</label>
                                                <small class="text-muted">(0 - 100)</small>
                                                <div class="input-group">
                                                    <input type="number" min=0 max=100 class="form-control" id="tax_penalties_thr" name="tax_penalties_thr"
                                                        placeholder="{{ __('payroll_reference_payroll.label_tax_penalties_thr') }}" readonly>
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span>%</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 box">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <h6 for="severance_payment_rate">{{ __('payroll_reference_payroll.label_severance_payment_rate') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_from1" name="severance_payment_from1" data-seq="1" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 1" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_from2" name="severance_payment_from2" data-seq="2" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 2" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_from3" name="severance_payment_from3" data-seq="3" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 3" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_from4" name="severance_payment_from4" data-seq="4" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 4" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_from5" name="severance_payment_from5" data-seq="5" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 5" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-0.5">
                                            <div class="form-group">
                                                <div id="div-grid-severance-payment-minus"></div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_to1" name="severance_payment_to1" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 1" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_to2" name="severance_payment_to2" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 2" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_to3" name="severance_payment_to3" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 3" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_to4" name="severance_payment_to4" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 4" readonly />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" id="severance_payment_to5" name="severance_payment_to5" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 5" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-0.5">
                                            <div class="form-group">
                                                <div id="div-grid-severance-payment-equals"></div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="severance_payment_rate1" name="severance_payment_rate1" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 1" readonly />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span>%</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="severance_payment_rate2" name="severance_payment_rate2" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 2" readonly />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span>%</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="severance_payment_rate3" name="severance_payment_rate3" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 3" readonly />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span>%</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="severance_payment_rate4" name="severance_payment_rate4" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 4" readonly />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span>%</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="severance_payment_rate5" name="severance_payment_rate5" placeholder="{{ __("payroll_reference_payroll.label_severance_payment_rate") }} 5" readonly />
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><span>%</span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                        <span class="title-text-notification">{{ __('payroll_reference_payroll.alert_success') }}</span>
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

        var arrDataTM = @json($data_tm);
        var arrDataCPY = @json($data_cpy);
        var arrDataPR = @json($data_pr);
        var formTaxableIncomeMinus = $('#div-grid-taxable-income-minus');
        var formSeverancePaymentMinus = $('#div-grid-severance-payment-minus');
        var formSeverancePaymentEquals = $('#div-grid-severance-payment-equals');
        var taxableIncomeFrom = 0;
        var taxableIncomeFromSeq = 0;
        var severancePaymentFrom = 0;
        var severancePaymentFromSeq = 0;

        let pickerEndPeriod = $('#work_insurance_remision_end_period').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings("#work_insurance_remision_end_period_calendar").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        pickerEndPeriod._input.setAttribute("disabled", "disabled");

        if (arrDataTM) {
            $('#process_period_month').val((typeof arrDataTM[0].periodMonth !== 'undefined') ? arrDataTM[0].periodMonth : '');
            $('#process_period_year').val((typeof arrDataTM[0].periodYear !== 'undefined') ? arrDataTM[0].periodYear : '');
            $('#payroll_payment_period').val((typeof arrDataTM[0].statusPeriod !== 'undefined') ? arrDataTM[0].statusPeriod : '');
            $.ajax({
                type: 'GET',
                url: "{{ url('/process_status/detail/api') }}",
                data: {
                    'processStatus': ((typeof arrDataTM[0].statusProcess !== 'undefined') ? arrDataTM[0].statusProcess : '')
                }
            }).then(function (data) {
                var option = new Option(data[0].value, data[0].comGenCode, true, true);

                $('#process_status').append(option).trigger('change');

                $('#process_status').trigger({
                    type: 'select2:select',
                    params: {
                        id: data[0].comGenCode,
                        text: data[0].value,
                        data: data[0]
                    }
                });
            });
        }else{
            $('#process_period_month').val('');
            $('#process_period_year').val('');
            $('#payroll_payment_period').val('');
            $("#process_status").val(null).trigger('change');
            $('#notification_error').modal('show');
            $('#message-notification-error').html("{{ __('payroll_reference_payroll.error_tm') }}");
            window.location =
                "{{ url('time_management/reference_time_management') }}";
        }

        if (arrDataCPY) {
            $('#company_name').val((typeof arrDataCPY[0].companyName !== 'undefined') ? arrDataCPY[0].companyName : '');
            $('#address').val((typeof arrDataCPY[0].address !== 'undefined') ? arrDataCPY[0].address : '');
            $('#city').val((typeof arrDataCPY[0].locationCode !== 'undefined') ? arrDataCPY[0].locationCode : '');
        }else{
            $('#company_name').val('');
            $('#address').val('');
            $('#city').val('');
        }

        if (arrDataPR) {
            $("#toolbar-new").hide();
            $("#toolbar-edit").show();
            $('#tax_registered_no').val((typeof arrDataPR[0].taxRegisteredNo !== 'undefined') ? arrDataPR[0].taxRegisteredNo : '');
            $('#jamsostek_no').val((typeof arrDataPR[0].jamsostekNo !== 'undefined') ? arrDataPR[0].jamsostekNo : '');
            $('#pension_no').val((typeof arrDataPR[0].pensionNo !== 'undefined') ? arrDataPR[0].pensionNo : '');
            $('#retirement_age_limit').val((typeof arrDataPR[0].retirementAgeLimit !== 'undefined') ? arrDataPR[0].retirementAgeLimit : '');
            $('#prorate_method').val((typeof arrDataPR[0].prorateMethod !== 'undefined') ? arrDataPR[0].prorateMethod : '').trigger('change');
            $('#maximum_dependents').val((typeof arrDataPR[0].dependentsMax !== 'undefined') ? arrDataPR[0].dependentsMax : '');
            $('#take_home_pay_rounded_from').val((typeof arrDataPR[0].thpRoundedFrom !== 'undefined') ? arrDataPR[0].thpRoundedFrom : '');
            $('#take_home_pay_rounded_become').val((typeof arrDataPR[0].thpRoundedBecome !== 'undefined') ? arrDataPR[0].thpRoundedBecome : '');
            $('#transaction_rate_type').val((typeof arrDataPR[0].transRateType !== 'undefined') ? arrDataPR[0].transRateType : '').trigger('change');
            $('#tax_rate_type').val((typeof arrDataPR[0].taxRateType !== 'undefined') ? arrDataPR[0].taxRateType : '').trigger('change');
            $('#rounding_method_report').val((typeof arrDataPR[0].roundingMethodReport !== 'undefined') ? arrDataPR[0].roundingMethodReport : '').trigger('change');
            $('#rounding_decimal_report').val((typeof arrDataPR[0].roundingDecimalReport !== 'undefined') ? arrDataPR[0].roundingDecimalReport : '');
            $('#rounding_method_spt').val((typeof arrDataPR[0].roundingMethodSpt !== 'undefined') ? arrDataPR[0].roundingMethodSpt : '').trigger('change');
            $('#rounding_decimal_spt').val((typeof arrDataPR[0].roundingDecimalSpt !== 'undefined') ? arrDataPR[0].roundingDecimalSpt : '');
            if (typeof arrDataPR[0].appreciation !== 'undefined' && arrDataPR[0].appreciation == true) {
                $('#check_appreciation_and_employee_service').prop('checked', true);
            }
            $('#bonus_cooficient').val((typeof arrDataPR[0].bonusCooefficient !== 'undefined') ? arrDataPR[0].bonusCooefficient : '');
            if (typeof arrDataPR[0].taxAllowanceBonus !== 'undefined' && arrDataPR[0].taxAllowanceBonus == true) {
                $('#check_tax_allowance_bonus').prop('checked', true);
            }
            if (typeof arrDataPR[0].taxAllowanceTHR !== 'undefined' && arrDataPR[0].taxAllowanceTHR == true) {
                $('#check_tax_allowance_thr').prop('checked', true);
            }
            $('#pension_contribution_employee').val((typeof arrDataPR[0].pensionContributionEmployee !== 'undefined') ? arrDataPR[0].pensionContributionEmployee : '');
            $('#pension_contribution_employer').val((typeof arrDataPR[0].pensionContributionEmployer !== 'undefined') ? arrDataPR[0].pensionContributionEmployer : '');
            $('#work_related_accident_insurance_one').val((typeof arrDataPR[0].workRelateAccidentInsurance !== 'undefined') ? arrDataPR[0].workRelateAccidentInsurance : '');
            $('#work_related_accident_insurance_two').val((typeof arrDataPR[0].workRelateAccidentInsurance2 !== 'undefined') ? arrDataPR[0].workRelateAccidentInsurance2 : '');
            $('#work_related_accident_insurance_three').val((typeof arrDataPR[0].workRelateAccidentInsurance3 !== 'undefined') ? arrDataPR[0].workRelateAccidentInsurance3 : '');
            $('#non_accidental_death_insurance').val((typeof arrDataPR[0].nonAccidentalDeathInsurance !== 'undefined') ? arrDataPR[0].nonAccidentalDeathInsurance : '');
            $('#health_insurance_company').val((typeof arrDataPR[0].healthInsuranceCompany !== 'undefined') ? arrDataPR[0].healthInsuranceCompany : '');
            $('#health_insurance_employee').val((typeof arrDataPR[0].healthInsuranceEmployee !== 'undefined') ? arrDataPR[0].healthInsuranceEmployee : '');
            $('#min_calculation_health_insurance').val((typeof arrDataPR[0].minCalcBaseHealthIns !== 'undefined') ? arrDataPR[0].minCalcBaseHealthIns : '');
            $('#max_calculation_health_insurance').val((typeof arrDataPR[0].maxCalcBaseHealthIns !== 'undefined') ? arrDataPR[0].maxCalcBaseHealthIns : '');
            $('#pension_insurance_company').val((typeof arrDataPR[0].pensionInsuranceCompany !== 'undefined') ? arrDataPR[0].pensionInsuranceCompany : '');
            $('#pension_insurance_employee').val((typeof arrDataPR[0].pensionInsuranceEmployee !== 'undefined') ? arrDataPR[0].pensionInsuranceEmployee : '');
            $('#min_calculation_pension_insurance').val((typeof arrDataPR[0].minCalcBasePensionIns !== 'undefined') ? arrDataPR[0].minCalcBasePensionIns : '');
            $('#max_calculation_pension_insurance').val((typeof arrDataPR[0].maxCalcBasePensionIns !== 'undefined') ? arrDataPR[0].maxCalcBasePensionIns : '');
            $('#multiplication_factor_daily_worker').val((typeof arrDataPR[0].multiplicationFactorDailyWorkers !== 'undefined') ? arrDataPR[0].multiplicationFactorDailyWorkers : '');
            if (typeof arrDataPR[0].calculationMethod !== 'undefined' && arrDataPR[0].calculationMethod === 'A') {
                $('#calculation_method_actual').prop('checked', true);
            }
            else {
                $('#calculation_method_basic').prop('checked', true);
            }
            if (typeof arrDataPR[0].deductedOnPeriod !== 'undefined' && arrDataPR[0].deductedOnPeriod === 0) {
                $('#check_all_period_jamsostek').prop('checked', true);
            }
            else {
                $('#check_on_period_jamsostek').prop('checked', true);
                $('#on_period_jamsostek').prop('readonly', true);
                $('#on_period_jamsostek').val((typeof arrDataPR[0].deductedOnPeriod !== 'undefined') ? arrDataPR[0].deductedOnPeriod : '');
            }
            $('#work_insurance_remision_payment_percentage').val((typeof arrDataPR[0].remissionPaymentPercentage !== 'undefined') ? arrDataPR[0].remissionPaymentPercentage : '');
            pickerEndPeriod.setDate((typeof arrDataPR[0].remissionEndPeriod !== 'undefined') ? arrDataPR[0].remissionEndPeriod : '');
            if (typeof arrDataPR[0].taxCalculationMethod !== 'undefined' && arrDataPR[0].taxCalculationMethod === 'A') {
                $('#tax_calculation_method_annualized').prop('checked', true);
            }
            else {
                $('#tax_calculation_method_prorated').prop('checked', true);
            }
            $('#non_taxable_income_employee').val((typeof arrDataPR[0].nonTaxableIncomeEmployee !== 'undefined') ? arrDataPR[0].nonTaxableIncomeEmployee : '');
            $('#non_taxable_income_each_dependent').val((typeof arrDataPR[0].nonTaxableIncomeDependent !== 'undefined') ? arrDataPR[0].nonTaxableIncomeDependent : '');
            $('#occupational_percentage').val((typeof arrDataPR[0].occupationalPercentage !== 'undefined') ? arrDataPR[0].occupationalPercentage : '');
            $('#occupational_maximum').val((typeof arrDataPR[0].occupationalMaximum !== 'undefined') ? arrDataPR[0].occupationalMaximum : '');
            $('#tax_rate1').val((typeof arrDataPR[0].taxRate1 !== 'undefined') ? arrDataPR[0].taxRate1 : '');
            $('#tax_rate2').val((typeof arrDataPR[0].taxRate2 !== 'undefined') ? arrDataPR[0].taxRate2 : '');
            $('#tax_rate3').val((typeof arrDataPR[0].taxRate3 !== 'undefined') ? arrDataPR[0].taxRate3 : '');
            $('#tax_rate4').val((typeof arrDataPR[0].taxRate4 !== 'undefined') ? arrDataPR[0].taxRate4 : '');
            $('#tax_rate5').val((typeof arrDataPR[0].taxRate5 !== 'undefined') ? arrDataPR[0].taxRate5 : '');
            $('#tax_rate6').val((typeof arrDataPR[0].taxRate6 !== 'undefined') ? arrDataPR[0].taxRate6 : '');
            $('#taxable_income_from1').val((typeof arrDataPR[0].taxableIncome1 !== 'undefined') ? arrDataPR[0].taxableIncome1 : '');
            $('#taxable_income_from2').val((typeof arrDataPR[0].taxableIncome2 !== 'undefined') ? arrDataPR[0].taxableIncome2 : '');
            $('#taxable_income_from3').val((typeof arrDataPR[0].taxableIncome3 !== 'undefined') ? arrDataPR[0].taxableIncome3 : '');
            $('#taxable_income_from4').val((typeof arrDataPR[0].taxableIncome4 !== 'undefined') ? arrDataPR[0].taxableIncome4 : '');
            $('#taxable_income_from5').val((typeof arrDataPR[0].taxableIncome5 !== 'undefined') ? arrDataPR[0].taxableIncome5 : '');
            $('#taxable_income_from6').val((typeof arrDataPR[0].taxableIncome6 !== 'undefined') ? arrDataPR[0].taxableIncome6 : '');
            $('#taxable_income_to1').val((typeof arrDataPR[0].taxableIncome2 !== 'undefined') ? (arrDataPR[0].taxableIncome2 - 1) : '');
            $('#taxable_income_to2').val((typeof arrDataPR[0].taxableIncome3 !== 'undefined') ? (arrDataPR[0].taxableIncome3 - 1) : '');
            $('#taxable_income_to3').val((typeof arrDataPR[0].taxableIncome4 !== 'undefined') ? (arrDataPR[0].taxableIncome4 - 1) : '');
            $('#taxable_income_to4').val((typeof arrDataPR[0].taxableIncome5 !== 'undefined') ? (arrDataPR[0].taxableIncome5 - 1) : '');
            $('#taxable_income_to5').val((typeof arrDataPR[0].taxableIncome6 !== 'undefined') ? (arrDataPR[0].taxableIncome6 - 1) : '');
            if (typeof arrDataPR[0].flagtaxableIncomeRounded !== 'undefined' && arrDataPR[0].flagtaxableIncomeRounded == true) {
                $('#check_nearest_taxable_income').prop('checked', true);
                $('#nearest_taxable_income').prop('readonly', true);
            }
            $('#nearest_taxable_income').val((typeof arrDataPR[0].nearestTaxableIncomeRounded !== 'undefined') ? arrDataPR[0].nearestTaxableIncomeRounded : '');
            $('#time_test').val((typeof arrDataPR[0].timeTest !== 'undefined') ? arrDataPR[0].timeTest : '');
            $('#tax_rate_with_time_test').val((typeof arrDataPR[0].taxRateWithintimeTest !== 'undefined') ? arrDataPR[0].taxRateWithintimeTest : '');
            $('#max_gross_income').val((typeof arrDataPR[0].maxGrossIncome !== 'undefined') ? arrDataPR[0].maxGrossIncome : '');
            $('#tax_by_government_tk').val((typeof arrDataPR[0].taxGovernmentTK !== 'undefined') ? arrDataPR[0].taxGovernmentTK : '');
            $('#tax_by_government_k0').val((typeof arrDataPR[0].taxGovernmentK0 !== 'undefined') ? arrDataPR[0].taxGovernmentK0 : '');
            $('#tax_by_government_k1').val((typeof arrDataPR[0].taxGovernmentK1 !== 'undefined') ? arrDataPR[0].taxGovernmentK1 : '');
            $('#tax_by_government_k2').val((typeof arrDataPR[0].taxGovernmentK2 !== 'undefined') ? arrDataPR[0].taxGovernmentK2 : '');
            $('#tax_by_government_k3').val((typeof arrDataPR[0].taxGovernmentK3 !== 'undefined') ? arrDataPR[0].taxGovernmentK3 : '');
            if (typeof arrDataPR[0].taxDeductedOnPeriod !== 'undefined' && arrDataPR[0].taxDeductedOnPeriod === 0) {
                $('#check_all_period_tax_calculation_table').prop('checked', true);
            }
            else {
                $('#check_on_period_tax_calculation_table').prop('checked', true);
                $('#on_period_tax_calculation_table').prop('readonly', true);
                $('#on_period_tax_calculation_table').val((typeof arrDataPR[0].taxDeductedOnPeriod !== 'undefined') ? arrDataPR[0].taxDeductedOnPeriod : '');
            }
            $('#tax_penalties_salary').val((typeof arrDataPR[0].salaryTaxPenalties !== 'undefined') ? arrDataPR[0].salaryTaxPenalties : '');
            $('#tax_penalties_bonus').val((typeof arrDataPR[0].bonusTaxPenalties !== 'undefined') ? arrDataPR[0].bonusTaxPenalties : '');
            $('#tax_penalties_thr').val((typeof arrDataPR[0].thrTaxPenalties !== 'undefined') ? arrDataPR[0].thrTaxPenalties : '');
            $('#severance_payment_from1').val((typeof arrDataPR[0].pensionTaxableIncome1 !== 'undefined') ? arrDataPR[0].pensionTaxableIncome1 : '');
            $('#severance_payment_from2').val((typeof arrDataPR[0].pensionTaxableIncome2 !== 'undefined') ? arrDataPR[0].pensionTaxableIncome2 : '');
            $('#severance_payment_from3').val((typeof arrDataPR[0].pensionTaxableIncome3 !== 'undefined') ? arrDataPR[0].pensionTaxableIncome3 : '');
            $('#severance_payment_from4').val((typeof arrDataPR[0].pensionTaxableIncome4 !== 'undefined') ? arrDataPR[0].pensionTaxableIncome4 : '');
            $('#severance_payment_from5').val((typeof arrDataPR[0].pensionTaxableIncome5 !== 'undefined') ? arrDataPR[0].pensionTaxableIncome5 : '');
            $('#severance_payment_to1').val((typeof arrDataPR[0].pensionTaxableIncome2 !== 'undefined') ? (arrDataPR[0].pensionTaxableIncome2 - 1) : '');
            $('#severance_payment_to2').val((typeof arrDataPR[0].pensionTaxableIncome3 !== 'undefined') ? (arrDataPR[0].pensionTaxableIncome3 - 1) : '');
            $('#severance_payment_to3').val((typeof arrDataPR[0].pensionTaxableIncome4 !== 'undefined') ? (arrDataPR[0].pensionTaxableIncome4 - 1) : '');
            $('#severance_payment_to4').val((typeof arrDataPR[0].pensionTaxableIncome5 !== 'undefined') ? (arrDataPR[0].pensionTaxableIncome5 - 1) : '');
            $('#severance_payment_rate1').val((typeof arrDataPR[0].pensionTaxRate1 !== 'undefined') ? arrDataPR[0].pensionTaxRate1 : '');
            $('#severance_payment_rate2').val((typeof arrDataPR[0].pensionTaxRate2 !== 'undefined') ? arrDataPR[0].pensionTaxRate2 : '');
            $('#severance_payment_rate3').val((typeof arrDataPR[0].pensionTaxRate3 !== 'undefined') ? arrDataPR[0].pensionTaxRate3 : '');
            $('#severance_payment_rate4').val((typeof arrDataPR[0].pensionTaxRate4 !== 'undefined') ? arrDataPR[0].pensionTaxRate4 : '');
            $('#severance_payment_rate5').val((typeof arrDataPR[0].pensionTaxRate5 !== 'undefined') ? arrDataPR[0].pensionTaxRate5 : '');
        }else{
            $("#toolbar-new").show();
            $("#toolbar-edit").hide();
            $('#tax_registered_no').val('');
            $('#jamsostek_no').val('');
            $('#pension_no').val('');
            $('#retirement_age_limit').val('');
            $('#prorate_method').val(null).trigger('change');
            $('#maximum_dependents').val('');
            $('#take_home_pay_rounded_from').val('');
            $('#take_home_pay_rounded_become').val('');
            $('#transaction_rate_type').val(null).trigger('change');
            $('#tax_rate_type').val('').trigger('change');
            $('#rounding_method_report').val(null).trigger('change');
            $('#rounding_decimal_report').val('');
            $('#rounding_method_spt').val('').trigger('change');
            $('#rounding_decimal_spt').val('');
            $('#check_appreciation_and_employee_service').prop('checked', false);
            $('#bonus_cooficient').val('');
            $('#check_tax_allowance_bonus').prop('checked', false);
            $('#check_tax_allowance_thr').prop('checked', false);
            $('#pension_contribution_employee').val('');
            $('#pension_contribution_employer').val('');
            $('#work_related_accident_insurance_one').val('');
            $('#work_related_accident_insurance_two').val('');
            $('#work_related_accident_insurance_three').val('');
            $('#non_accidental_death_insurance').val('');
            $('#health_insurance_company').val('');
            $('#health_insurance_employee').val('');
            $('#min_calculation_health_insurance').val('');
            $('#max_calculation_health_insurance').val('');
            $('#pension_insurance_company').val('');
            $('#pension_insurance_employee').val('');
            $('#min_calculation_pension_insurance').val('');
            $('#max_calculation_pension_insurance').val('');
            $('#multiplication_factor_daily_worker').val('');
            $('#on_period_jamsostek').val('');
            $('#work_insurance_remision_payment_percentage').val('');
            $('#non_taxable_income_employee').val('');
            $('#non_taxable_income_each_dependent').val('');
            $('#occupational_percentage').val('');
            $('#occupational_maximum').val('');
            $('#tax_rate1').val('');
            $('#tax_rate2').val('');
            $('#tax_rate3').val('');
            $('#tax_rate4').val('');
            $('#tax_rate5').val('');
            $('#tax_rate6').val('');
            $('#taxable_income_from1').val('');
            $('#taxable_income_from2').val('');
            $('#taxable_income_from3').val('');
            $('#taxable_income_from4').val('');
            $('#taxable_income_from5').val('');
            $('#taxable_income_from6').val('');
            $('#taxable_income_to1').val('');
            $('#taxable_income_to2').val('');
            $('#taxable_income_to3').val('');
            $('#taxable_income_to4').val('');
            $('#taxable_income_to5').val('');
            $('#check_nearest_taxable_income').prop('checked', false);
            $('#nearest_taxable_income').val(0);
            $('#time_test').val('');
            $('#tax_rate_with_time_test').val('');
            $('#max_gross_income').val('');
            $('#tax_by_government_tk').val('');
            $('#tax_by_government_k0').val('');
            $('#tax_by_government_k1').val('');
            $('#tax_by_government_k2').val('');
            $('#tax_by_government_k3').val('');
            $('#on_period_tax_calculation_table').val('');
            $('#tax_penalties_salary').val('');
            $('#tax_penalties_bonus').val('');
            $('#tax_penalties_thr').val('');
            $('#severance_payment_from1').val('');
            $('#severance_payment_from2').val('');
            $('#severance_payment_from3').val('');
            $('#severance_payment_from4').val('');
            $('#severance_payment_from5').val('');
            $('#severance_payment_to1').val('');
            $('#severance_payment_to2').val('');
            $('#severance_payment_to3').val('');
            $('#severance_payment_to4').val('');
            $('#severance_payment_rate1').val('');
            $('#severance_payment_rate2').val('');
            $('#severance_payment_rate3').val('');
            $('#severance_payment_rate4').val('');
            $('#severance_payment_rate5').val('');
        }

        $('#toolbar-new').on('click', function () {
            $('#toolbar-save').show();
            $('#record_function').val("New");
            $('#process_period_month').prop('readonly', false);
            $('#process_period_year').prop('readonly', false);
            $('#process_status').prop('disabled', false);
            $('#payroll_payment_period').prop('readonly', false);
            $('#company_name').prop('readonly', true);
            $('#address').prop('readonly', true);
            $('#city').prop('readonly', true);
            $('#tax_registered_no').prop('readonly', false);
            $('#jamsostek_no').prop('readonly', false);
            $('#pension_no').prop('readonly', false);
            $('#retirement_age_limit').prop('readonly', false);
            $('#prorate_method').prop('disabled', false);
            $('#maximum_dependents').prop('readonly', false);
            $('#take_home_pay_rounded_from').prop('readonly', false);
            $('#take_home_pay_rounded_become').prop('readonly', false);
            $('#transaction_rate_type').prop('disabled', false);
            $('#tax_rate_type').prop('disabled', false);
            $('#rounding_method_report').prop('disabled', false);
            $('#rounding_decimal_report').prop('readonly', false);
            $('#rounding_method_spt').prop('disabled', false);
            $('#rounding_decimal_spt').prop('readonly', false);
            $('#rounding_method_spt').prop('disabled', false);
            $('#check_appreciation_and_employee_service').prop('disabled', false);
            $('#bonus_cooficient').prop('readonly', false);
            $('#check_tax_allowance_bonus').prop('disabled', false);
            $('#check_tax_allowance_thr').prop('disabled', false);
            $('#pension_contribution_employee').prop('readonly', false);
            $('#pension_contribution_employer').prop('readonly', false);
            $('#work_related_accident_insurance_one').prop('readonly', false);
            $('#work_related_accident_insurance_two').prop('readonly', false);
            $('#work_related_accident_insurance_three').prop('readonly', false);
            $('#non_accidental_death_insurance').prop('readonly', false);
            $('#health_insurance_company').prop('readonly', false);
            $('#health_insurance_employee').prop('readonly', false);
            $('#min_calculation_health_insurance').prop('readonly', false);
            $('#max_calculation_health_insurance').prop('readonly', false);
            $('#pension_insurance_company').prop('readonly', false);
            $('#pension_insurance_employee').prop('readonly', false);
            $('#min_calculation_pension_insurance').prop('readonly', false);
            $('#max_calculation_pension_insurance').prop('readonly', false);
            $('#multiplication_factor_daily_worker').prop('readonly', false);
            $('#calculation_method_actual').prop('disabled', false);
            $('#calculation_method_basic').prop('disabled', false);
            $('#check_all_period_jamsostek').prop('disabled', false);
            $('#check_on_period_jamsostek').prop('disabled', false);
            $('#work_insurance_remision_payment_percentage').prop('readonly', false);
            pickerEndPeriod._input.removeAttribute("disabled");
            $('#tax_calculation_method_annualized').prop('disabled', false);
            $('#tax_calculation_method_prorated').prop('disabled', false);
            $('#non_taxable_income_employee').prop('readonly', false);
            $('#non_taxable_income_each_dependent').prop('readonly', false);
            $('#occupational_percentage').prop('readonly', false);
            $('#occupational_maximum').prop('readonly', false);
            for (var i = 1; i < 7; i++) {
                $('#tax_rate' + i).prop('readonly', false);
                $('#taxable_income_from' + i).prop('readonly', false);
            }
            $('#time_test').prop('readonly', false);
            $('#tax_rate_with_time_test').prop('readonly', false);
            $('#max_gross_income').prop('readonly', false);
            $('#tax_by_government_tk').prop('readonly', false);
            $('#tax_by_government_k0').prop('readonly', false);
            $('#tax_by_government_k1').prop('readonly', false);
            $('#tax_by_government_k2').prop('readonly', false);
            $('#tax_by_government_k3').prop('readonly', false);
            $('#check_all_period_tax_calculation_table').prop('disabled', false);
            $('#check_on_period_tax_calculation_table').prop('disabled', false);
            $('#check_nearest_taxable_income').prop('disabled', false);
            $('#tax_penalties_salary').prop('readonly', false);
            $('#tax_penalties_bonus').prop('readonly', false);
            $('#tax_penalties_thr').prop('readonly', false);
            for (var i = 0; i < 6; i++) {
                $('#severance_payment_from' + i).prop('readonly', false);
                $('#severance_payment_rate' + i).prop('readonly', false);
            }
        });

        $('#toolbar-edit').on('click', function () {
            $('#toolbar-save').show();
            $('#modal_authentication').modal('show');
            // $('#record_function').val("Edit");
            // $('#process_period_month').prop('readonly', false);
            // $('#process_period_year').prop('readonly', false);
            // $('#process_status').prop('disabled', false);
            // $('#payroll_payment_period').prop('readonly', false);
            // $('#company_name').prop('readonly', true);
            // $('#address').prop('readonly', true);
            // $('#city').prop('readonly', true);
            // $('#tax_registered_no').prop('readonly', false);
            // $('#jamsostek_no').prop('readonly', false);
            // $('#pension_no').prop('readonly', false);
            // $('#retirement_age_limit').prop('readonly', false);
            // $('#prorate_method').prop('disabled', false);
            // $('#maximum_dependents').prop('readonly', false);
            // $('#take_home_pay_rounded_from').prop('readonly', false);
            // $('#take_home_pay_rounded_become').prop('readonly', false);
            // $('#transaction_rate_type').prop('disabled', false);
            // $('#tax_rate_type').prop('disabled', false);
            // $('#rounding_method_report').prop('disabled', false);
            // $('#rounding_decimal_report').prop('readonly', false);
            // $('#rounding_method_spt').prop('disabled', false);
            // $('#rounding_decimal_spt').prop('readonly', false);
            // $('#rounding_method_spt').prop('disabled', false);
            // $('#check_appreciation_and_employee_service').prop('disabled', false);
            // $('#bonus_cooficient').prop('readonly', false);
            // $('#check_tax_allowance_bonus').prop('disabled', false);
            // $('#check_tax_allowance_thr').prop('disabled', false);
            // $('#pension_contribution_employee').prop('readonly', false);
            // $('#pension_contribution_employer').prop('readonly', false);
            // $('#work_related_accident_insurance_one').prop('readonly', false);
            // $('#work_related_accident_insurance_two').prop('readonly', false);
            // $('#work_related_accident_insurance_three').prop('readonly', false);
            // $('#non_accidental_death_insurance').prop('readonly', false);
            // $('#health_insurance_company').prop('readonly', false);
            // $('#health_insurance_employee').prop('readonly', false);
            // $('#min_calculation_health_insurance').prop('readonly', false);
            // $('#max_calculation_health_insurance').prop('readonly', false);
            // $('#pension_insurance_company').prop('readonly', false);
            // $('#pension_insurance_employee').prop('readonly', false);
            // $('#min_calculation_pension_insurance').prop('readonly', false);
            // $('#max_calculation_pension_insurance').prop('readonly', false);
            // $('#multiplication_factor_daily_worker').prop('readonly', false);
            // $('#calculation_method_actual').prop('disabled', false);
            // $('#calculation_method_basic').prop('disabled', false);
            // $('#check_all_period_jamsostek').prop('disabled', false);
            // $('#check_on_period_jamsostek').prop('disabled', false);
            // $('#check_nearest_taxable_income').prop('disabled', false);
            // $('#work_insurance_remision_payment_percentage').prop('readonly', false);
            // pickerEndPeriod._input.removeAttribute("disabled");
            // $('#tax_calculation_method_annualized').prop('disabled', false);
            // $('#tax_calculation_method_prorated').prop('disabled', false);
            // $('#non_taxable_income_employee').prop('readonly', false);
            // $('#non_taxable_income_each_dependent').prop('readonly', false);
            // $('#occupational_percentage').prop('readonly', false);
            // $('#occupational_maximum').prop('readonly', false);
            // for (var i = 1; i < 7; i++) {
            //     $('#tax_rate' + i).prop('readonly', false);
            //     $('#taxable_income_from' + i).prop('readonly', false);
            // }
            // $('#time_test').prop('readonly', false);
            // $('#tax_rate_with_time_test').prop('readonly', false);
            // $('#max_gross_income').prop('readonly', false);
            // $('#tax_by_government_tk').prop('readonly', false);
            // $('#tax_by_government_k0').prop('readonly', false);
            // $('#tax_by_government_k1').prop('readonly', false);
            // $('#tax_by_government_k2').prop('readonly', false);
            // $('#tax_by_government_k3').prop('readonly', false);
            // $('#check_all_period_tax_calculation_table').prop('disabled', false);
            // $('#check_on_period_tax_calculation_table').prop('disabled', false);
            // $('#tax_penalties_salary').prop('readonly', false);
            // $('#tax_penalties_bonus').prop('readonly', false);
            // $('#tax_penalties_thr').prop('readonly', false);
            // for (var i = 0; i < 6; i++) {
            //     $('#severance_payment_from' + i).prop('readonly', false);
            //     $('#severance_payment_rate' + i).prop('readonly', false);
            // }
            // if (typeof arrDataPR[0].deductedOnPeriod !== 'undefined' && arrDataPR[0].deductedOnPeriod === 0) {
            //     $('#check_all_period_jamsostek').prop('checked', true);
            // }
            // else {
            //     $('#check_on_period_jamsostek').prop('checked', true);
            //     $('#on_period_jamsostek').prop('readonly', false);
            // }
            // if (typeof arrDataPR[0].flagtaxableIncomeRounded !== 'undefined' && arrDataPR[0].flagtaxableIncomeRounded == true) {
            //     $('#check_nearest_taxable_income').prop('checked', true);
            //     $('#nearest_taxable_income').prop('readonly', false);
            // }
            // if (typeof arrDataPR[0].taxDeductedOnPeriod !== 'undefined' && arrDataPR[0].taxDeductedOnPeriod === 0) {
            //     $('#check_all_period_tax_calculation_table').prop('checked', true);
            // }
            // else {
            //     $('#check_on_period_tax_calculation_table').prop('checked', true);
            //     $('#on_period_tax_calculation_table').prop('readonly', false);
            // }
        });

        $("#btn-ok").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#authentication_form").submit();
        });

        $("#btn-cncl").click(function () {
            $('#record_function').val("Edit");
            // $('#process_period_month').prop('readonly', false);
            // $('#process_period_year').prop('readonly', false);
            // $('#process_status').prop('disabled', false);
            $('#payroll_payment_period').prop('readonly', false);
            $('#company_name').prop('readonly', true);
            $('#address').prop('readonly', true);
            $('#city').prop('readonly', true);
            $('#tax_registered_no').prop('readonly', false);
            $('#jamsostek_no').prop('readonly', false);
            $('#pension_no').prop('readonly', false);
            $('#retirement_age_limit').prop('readonly', false);
            $('#prorate_method').prop('disabled', false);
            $('#maximum_dependents').prop('readonly', false);
            $('#take_home_pay_rounded_from').prop('readonly', false);
            $('#take_home_pay_rounded_become').prop('readonly', false);
            $('#transaction_rate_type').prop('disabled', false);
            $('#tax_rate_type').prop('disabled', false);
            $('#rounding_method_report').prop('disabled', false);
            $('#rounding_decimal_report').prop('readonly', false);
            $('#rounding_method_spt').prop('disabled', false);
            $('#rounding_decimal_spt').prop('readonly', false);
            $('#rounding_method_spt').prop('disabled', false);
            $('#check_appreciation_and_employee_service').prop('disabled', false);
            $('#bonus_cooficient').prop('readonly', false);
            $('#check_tax_allowance_bonus').prop('disabled', false);
            $('#check_tax_allowance_thr').prop('disabled', false);
            $('#pension_contribution_employee').prop('readonly', false);
            $('#pension_contribution_employer').prop('readonly', false);
            $('#work_related_accident_insurance_one').prop('readonly', false);
            $('#work_related_accident_insurance_two').prop('readonly', false);
            $('#work_related_accident_insurance_three').prop('readonly', false);
            $('#non_accidental_death_insurance').prop('readonly', false);
            $('#health_insurance_company').prop('readonly', false);
            $('#health_insurance_employee').prop('readonly', false);
            $('#min_calculation_health_insurance').prop('readonly', false);
            $('#max_calculation_health_insurance').prop('readonly', false);
            $('#pension_insurance_company').prop('readonly', false);
            $('#pension_insurance_employee').prop('readonly', false);
            $('#min_calculation_pension_insurance').prop('readonly', false);
            $('#max_calculation_pension_insurance').prop('readonly', false);
            $('#multiplication_factor_daily_worker').prop('readonly', false);
            $('#calculation_method_actual').prop('disabled', false);
            $('#calculation_method_basic').prop('disabled', false);
            $('#check_all_period_jamsostek').prop('disabled', false);
            $('#check_on_period_jamsostek').prop('disabled', false);
            $('#check_nearest_taxable_income').prop('disabled', false);
            $('#work_insurance_remision_payment_percentage').prop('readonly', false);
            pickerEndPeriod._input.removeAttribute("disabled");
            $('#tax_calculation_method_annualized').prop('disabled', false);
            $('#tax_calculation_method_prorated').prop('disabled', false);
            $('#non_taxable_income_employee').prop('readonly', false);
            $('#non_taxable_income_each_dependent').prop('readonly', false);
            $('#occupational_percentage').prop('readonly', false);
            $('#occupational_maximum').prop('readonly', false);
            for (var i = 1; i < 7; i++) {
                $('#tax_rate' + i).prop('readonly', false);
                $('#taxable_income_from' + i).prop('readonly', false);
            }
            $('#time_test').prop('readonly', false);
            $('#tax_rate_with_time_test').prop('readonly', false);
            $('#max_gross_income').prop('readonly', false);
            $('#tax_by_government_tk').prop('readonly', false);
            $('#tax_by_government_k0').prop('readonly', false);
            $('#tax_by_government_k1').prop('readonly', false);
            $('#tax_by_government_k2').prop('readonly', false);
            $('#tax_by_government_k3').prop('readonly', false);
            $('#check_all_period_tax_calculation_table').prop('disabled', false);
            $('#check_on_period_tax_calculation_table').prop('disabled', false);
            $('#tax_penalties_salary').prop('readonly', false);
            $('#tax_penalties_bonus').prop('readonly', false);
            $('#tax_penalties_thr').prop('readonly', false);
            for (var i = 0; i < 6; i++) {
                $('#severance_payment_from' + i).prop('readonly', false);
                $('#severance_payment_rate' + i).prop('readonly', false);
            }
            if (typeof arrDataPR[0].deductedOnPeriod !== 'undefined' && arrDataPR[0].deductedOnPeriod === 0) {
                $('#check_all_period_jamsostek').prop('checked', true);
            }
            else {
                $('#check_on_period_jamsostek').prop('checked', true);
                $('#on_period_jamsostek').prop('readonly', false);
            }
            if (typeof arrDataPR[0].flagtaxableIncomeRounded !== 'undefined' && arrDataPR[0].flagtaxableIncomeRounded == true) {
                $('#check_nearest_taxable_income').prop('checked', true);
                $('#nearest_taxable_income').prop('readonly', false);
            }
            if (typeof arrDataPR[0].taxDeductedOnPeriod !== 'undefined' && arrDataPR[0].taxDeductedOnPeriod === 0) {
                $('#check_all_period_tax_calculation_table').prop('checked', true);
            }
            else {
                $('#check_on_period_tax_calculation_table').prop('checked', true);
                $('#on_period_tax_calculation_table').prop('readonly', false);
            }
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
                                $('#modal_authentication').modal('hide');
								$('#record_function').val("Edit");
                                $('#process_period_month').prop('readonly', false);
                                $('#process_period_year').prop('readonly', false);
                                $('#process_status').prop('disabled', false);
                                $('#payroll_payment_period').prop('readonly', false);
                                $('#company_name').prop('readonly', true);
                                $('#address').prop('readonly', true);
                                $('#city').prop('readonly', true);
                                $('#tax_registered_no').prop('readonly', false);
                                $('#jamsostek_no').prop('readonly', false);
                                $('#pension_no').prop('readonly', false);
                                $('#retirement_age_limit').prop('readonly', false);
                                $('#prorate_method').prop('disabled', false);
                                $('#maximum_dependents').prop('readonly', false);
                                $('#take_home_pay_rounded_from').prop('readonly', false);
                                $('#take_home_pay_rounded_become').prop('readonly', false);
                                $('#transaction_rate_type').prop('disabled', false);
                                $('#tax_rate_type').prop('disabled', false);
                                $('#rounding_method_report').prop('disabled', false);
                                $('#rounding_decimal_report').prop('readonly', false);
                                $('#rounding_method_spt').prop('disabled', false);
                                $('#rounding_decimal_spt').prop('readonly', false);
                                $('#rounding_method_spt').prop('disabled', false);
                                $('#check_appreciation_and_employee_service').prop('disabled', false);
                                $('#bonus_cooficient').prop('readonly', false);
                                $('#check_tax_allowance_bonus').prop('disabled', false);
                                $('#check_tax_allowance_thr').prop('disabled', false);
                                $('#pension_contribution_employee').prop('readonly', false);
                                $('#pension_contribution_employer').prop('readonly', false);
                                $('#work_related_accident_insurance_one').prop('readonly', false);
                                $('#work_related_accident_insurance_two').prop('readonly', false);
                                $('#work_related_accident_insurance_three').prop('readonly', false);
                                $('#non_accidental_death_insurance').prop('readonly', false);
                                $('#health_insurance_company').prop('readonly', false);
                                $('#health_insurance_employee').prop('readonly', false);
                                $('#min_calculation_health_insurance').prop('readonly', false);
                                $('#max_calculation_health_insurance').prop('readonly', false);
                                $('#pension_insurance_company').prop('readonly', false);
                                $('#pension_insurance_employee').prop('readonly', false);
                                $('#min_calculation_pension_insurance').prop('readonly', false);
                                $('#max_calculation_pension_insurance').prop('readonly', false);
                                $('#multiplication_factor_daily_worker').prop('readonly', false);
                                $('#calculation_method_actual').prop('disabled', false);
                                $('#calculation_method_basic').prop('disabled', false);
                                $('#check_all_period_jamsostek').prop('disabled', false);
                                $('#check_on_period_jamsostek').prop('disabled', false);
                                $('#check_nearest_taxable_income').prop('disabled', false);
                                $('#work_insurance_remision_payment_percentage').prop('readonly', false);
                                pickerEndPeriod._input.removeAttribute("disabled");
                                $('#tax_calculation_method_annualized').prop('disabled', false);
                                $('#tax_calculation_method_prorated').prop('disabled', false);
                                $('#non_taxable_income_employee').prop('readonly', false);
                                $('#non_taxable_income_each_dependent').prop('readonly', false);
                                $('#occupational_percentage').prop('readonly', false);
                                $('#occupational_maximum').prop('readonly', false);
                                for (var i = 1; i < 7; i++) {
                                    $('#tax_rate' + i).prop('readonly', false);
                                    $('#taxable_income_from' + i).prop('readonly', false);
                                }
                                $('#time_test').prop('readonly', false);
                                $('#tax_rate_with_time_test').prop('readonly', false);
                                $('#max_gross_income').prop('readonly', false);
                                $('#tax_by_government_tk').prop('readonly', false);
                                $('#tax_by_government_k0').prop('readonly', false);
                                $('#tax_by_government_k1').prop('readonly', false);
                                $('#tax_by_government_k2').prop('readonly', false);
                                $('#tax_by_government_k3').prop('readonly', false);
                                $('#check_all_period_tax_calculation_table').prop('disabled', false);
                                $('#check_on_period_tax_calculation_table').prop('disabled', false);
                                $('#tax_penalties_salary').prop('readonly', false);
                                $('#tax_penalties_bonus').prop('readonly', false);
                                $('#tax_penalties_thr').prop('readonly', false);
                                for (var i = 0; i < 6; i++) {
                                    $('#severance_payment_from' + i).prop('readonly', false);
                                    $('#severance_payment_rate' + i).prop('readonly', false);
                                }
                                if (typeof arrDataPR[0].deductedOnPeriod !== 'undefined' && arrDataPR[0].deductedOnPeriod === 0) {
                                    $('#check_all_period_jamsostek').prop('checked', true);
                                }
                                else {
                                    $('#check_on_period_jamsostek').prop('checked', true);
                                    $('#on_period_jamsostek').prop('readonly', false);
                                }
                                if (typeof arrDataPR[0].flagtaxableIncomeRounded !== 'undefined' && arrDataPR[0].flagtaxableIncomeRounded == true) {
                                    $('#check_nearest_taxable_income').prop('checked', true);
                                    $('#nearest_taxable_income').prop('readonly', false);
                                }
                                if (typeof arrDataPR[0].taxDeductedOnPeriod !== 'undefined' && arrDataPR[0].taxDeductedOnPeriod === 0) {
                                    $('#check_all_period_tax_calculation_table').prop('checked', true);
                                }
                                else {
                                    $('#check_on_period_tax_calculation_table').prop('checked', true);
                                    $('#on_period_tax_calculation_table').prop('readonly', false);
                                }
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

        for (var i = 0; i < 6; i++) {
            if(i%10 == 0){
                j = i+1;
                formTaxableIncomeMinus.append(
                    '<div id="div-taxable-income-minus'+ (i+1) +'"></div>' 
                );
            }
            $('#div-taxable-income-minus'+ j).append(
                '<p class="pt-3" style="font-size: 1rem;"><b>-</b></p>'
            );
        }

        for (var i = 0; i < 5; i++) {
            if(i%5 == 0){
                j = i+1;
                formSeverancePaymentMinus.append(
                    '<div id="div-severance-payment-minus'+ (i+1) +'"></div>'
                );
            }
            $('#div-severance-payment-minus'+ j).append(
                '<p class="pt-3" style="font-size: 1rem;"><b>-</b></p>'
            );
        }

        for (var i = 0; i < 5; i++) {
            if(i%5 == 0){
                j = i+1;
                formSeverancePaymentEquals.append(
                    '<div id="div-severance-payment-equals'+ (i+1) +'"></div>'
                );
            }
            $('#div-severance-payment-equals'+ j).append(
                '<p class="pt-3" style="font-size: 1rem;"><b>=</b></p>'
            );
        }

        $('input[name="deduction_on_period_jamsostek"]').on('change', function () {
            if ($('#check_all_period_jamsostek').is(':checked')) {
                $('#on_period_jamsostek').prop('readonly', true);
            }
            else {
                $('#on_period_jamsostek').prop('readonly', false);
            }
        });

        $('input[name="deduction_on_period_tax_calculation_table"]').on('change', function () {
            if ($('#check_all_period_tax_calculation_table').is(':checked')) {
                $('#on_period_tax_calculation_table').prop('readonly', true);
            }
            else {
                $('#on_period_tax_calculation_table').prop('readonly', false);
            }
        });

        $('#check_nearest_taxable_income').on('change', function () {
            if ($(this).is(':checked')) {
                $('#nearest_taxable_income').prop('readonly', false);
            }
            else {
                $('#nearest_taxable_income').prop('readonly', true);
                $('#nearest_taxable_income').val(0);
            }
        });

        for (var i = 2; i < 7; i++) {
            $('#taxable_income_from' + i).on('input', function () {
                if ($(this).val() !== '') {
                    taxableIncomeFromSeq = parseInt($(this).attr('data-seq'));
                    taxableIncomeFrom = parseInt($(this).val());
                    for (var j = taxableIncomeFromSeq-1; j < taxableIncomeFromSeq; j++) {
                        $('#taxable_income_to' + j).val(taxableIncomeFrom - 1);
                    } 
                }
            });
        }

        for (var i = 2; i < 6; i++) {
            $('#severance_payment_from' + i).on('input', function () {
                if ($(this).val() !== '') {
                    severancePaymentFromSeq = parseInt($(this).attr('data-seq'));
                    severancePaymentFrom = parseInt($(this).val());
                    for (var j = severancePaymentFromSeq-1; j < severancePaymentFromSeq; j++) {
                        $('#severance_payment_to' + j).val(severancePaymentFrom - 1);
                    } 
                }
            });
        }

        loadDataProcessStatus();
        loadDataProrateMethod();
        loadDataRateType();
        loadDataRoundingMethod();

        function loadDataProcessStatus() {
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

            $('#process_status').select2({
                width: '100%',
                placeholder: 'Choose Process Status',
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
                    url: "{{ url('/process_status/api') }}",
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

        function loadDataProrateMethod() {
            var listProrateMethod = [
                { id: 'W', text: 'Working Days' },
                { id: 'C', text: 'Calendar Days' },
                { id: 'N', text: 'None' }
            ];

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#prorate_method').select2({
                data: listProrateMethod,
                width: '100%',
                placeholder: 'Choose Prorate Method',
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

        function loadDataRateType() {
            var listRateType = [
                { id: 'B', text: 'Book' },
                { id: 'S', text: 'Spot' },
                { id: 'T', text: 'Tax' }
            ];

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#transaction_rate_type').select2({
                data: listRateType,
                width: '100%',
                placeholder: 'Choose Transaction Rate Type',
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

            $('#tax_rate_type').select2({
                data: listRateType,
                width: '100%',
                placeholder: 'Choose Tax Rate Type',
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

        function loadDataRoundingMethod() {
            var listRoundingMethod = [
                { id: 'HA', text: 'Half Adjustment' },
                { id: 'INC', text: 'Increment' },
                { id: 'Trunc', text: 'Truncate' }
            ];

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#rounding_method_report').select2({
                data: listRoundingMethod,
                width: '100%',
                placeholder: 'Choose Rounding Method Report',
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

            $('#rounding_method_spt').select2({
                data: listRoundingMethod,
                width: '100%',
                placeholder: 'Choose Rounding Method SPT',
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

        $("#toolbar-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#reference_payroll_form").submit();
        });

        if ($("#reference_payroll_form").length > 0) {
            $("#reference_payroll_form").validate({
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
                        '<span>Save</span>'
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
                        url: "{{ url('payroll/reference_payroll/proses') }}",
                        type: "POST",
                        data: $('#reference_payroll_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('payroll/reference_payroll') }}";
                                }, 3000);
                            } else {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">'+
                                    '<img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
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
                                '<span>Save</span>'
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