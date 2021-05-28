<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
	</style>
</head>

<body>
	<div class="div-personel">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-back-blue.svg') }}" alt="Back">
                <img src="{{ url('/icons/functionbar/functionbar-back-white.svg') }}" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-next-blue.svg') }}" alt="Next">
                <img src="{{ url('/icons/functionbar/functionbar-next-white.svg') }}" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-new-blue.svg') }}" alt="New">
                <img src="{{ url('/icons/functionbar/functionbar-new-white.svg') }}" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-edit-blue.svg') }}" alt="Edit">
                <img src="{{ url('/icons/functionbar/functionbar-edit-white.svg') }}" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-save-blue.svg') }}" alt="Save">
                <img src="{{ url('/icons/functionbar/functionbar-save-white.svg') }}" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-blue.svg') }}" alt="Activate">
                <img src="{{ url('/icons/functionbar/functionbar-checklist-white.svg') }}" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-blue.svg') }}" alt="Deactivate">
                <img src="{{ url('/icons/functionbar/functionbar-deactivate-white.svg') }}" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)">
                <img src="{{ url('/icons/functionbar/functionbar-list-blue.svg') }}" alt="List">
                <img src="{{ url('/icons/functionbar/functionbar-list-white.svg') }}" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
        </div>
        <div class="div-profile">
            <div class="row div-row-profile">
                <div class="col-2 subdiv-profile-image">
                    <img src="{{ url('/pictures/profile-picture.png') }}" alt="Profile">
                    <label class="btn btn-primary"><i class="fa fa-edit"></i> Change Picture
                        <input type="file" hidden>
                    </label>
                </div>
                <div class="col-9 subdiv-profile">
                    <p>{{ $employee_name }} &emsp; | &emsp; {{ $employee_no }}</p>
                    <p class="small">Director &emsp; | &emsp; Finance Accounting & Investment &emsp; | &emsp; Pegawai Tetap</p>
                    <p class="small">PT Intikom Berlian Mustika &emsp; | &emsp; Jakarta</p>
                    <p class="small">lina.sudrajat@intikom.co.id &emsp; | &emsp; 08111010101</p>
                </div>
            </div>
        </div>
		<div class="div-title">
			<a href="{{ url('personel/payroll_data') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Payroll Data List</span>
			</a>
		</div>

		<div class="div-form">
            <ul class="nav nav-tabs" id="tab-payroll" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="absenteeism-tab" data-toggle="tab" href="#absenteeism" role="tab" aria-controls="absenteeism" aria-selected="true">Absenteeism</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="payroll-tab" data-toggle="tab" href="#payroll" role="tab" aria-controls="payroll" aria-selected="false">Payroll</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-payroll">
                <div class="tab-pane fade show active" id="absenteeism" role="tabpanel" aria-labelledby="absenteeism-tab">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="absenteeism_type">Absenteeism Type</label>
                                    <select class="form-control" id="absenteeism_type" name="absenteeism_type">
                                      <option value="">Choose Absenteeism</option>
                                      <option value="Month">Month</option>
                                      <option value="Daily">Daily</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="work_pattern_code_select">Work Pattern Code</label>
                                    <select class="form-control" id="work_pattern_code_select" name="work_pattern_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="work_pattern_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="work_pattern_code_text" name="work_pattern_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="starting_day">Starting Day</label>
                                    <input type="text" class="form-control" id="starting_day" name="starting_day" placeholder="Starting Day">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="absent_not_required_checkbox" name="absent_not_required_checkbox">
                                    <label class="form-check-label" for="absent_not_required_checkbox">Absent Not Required</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="tax_file_not_required_checkbox" name="tax_file_not_required_checkbox">
                                    <label class="form-check-label" for="tax_file_not_required_checkbox">Tax File Not Required</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="payroll" role="tabpanel" aria-labelledby="payroll-tab">
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#marital-status" aria-expanded="true" aria-controls="marital-status">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Marital Status</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="marital-status" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="marital_status_for_payroll">Marital Status For Payroll</label>
                                                <select class="form-control" id="marital_status_for_payroll" name="marital_status_for_payroll">
                                                    <option value="">Choose Status</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Widow">Widow</option>
                                                    <option value="Widower">Widower</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="no_of_dependents_for_payroll">No of Dependents For Payroll</label>
                                                <input type="text" class="form-control" id="no_of_dependents_for_payroll" name="no_of_dependents_for_payroll" placeholder="No of Dependents For Payroll">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="next_year_marital_status_for_payroll">Next Year Marital Status For Payroll</label>
                                                <select class="form-control" id="next_year_marital_status_for_payroll" name="nex_year_marital_status_for_payroll">
                                                    <option value="">Choose Status</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Widow">Widow</option>
                                                    <option value="Widower">Widower</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="next_year_no_of_dependents_for_payroll">Next Year No of Dependents For Payroll</label>
                                                <input type="text" class="form-control" id="next_year_no_of_dependents_for_payroll" name="next_year_no_of_dependents_for_payroll" placeholder="Next Year No of Dependents For Payroll">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#tax" aria-expanded="true" aria-controls="tax">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Tax</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="tax" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tax_calculation_method">Tax Calculation Method</label>
                                                <select class="form-control" id="tax_calculation_method" name="tax_calculation_method">
                                                    <option value="">Choose Method</option>
                                                    <option value="Gross Net Employee">Gross Net Employee</option>
                                                    <option value="Gross Net Employeer">Gross Net Employeer</option>
                                                    <option value="Gross Up">Gross Up</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tax_article_26_checkbox">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="tax_article_26_checkbox" name="tax_article_26_checkbox">
                                                    <label class="form-check-label" for="tax_article_26_checkbox">Tax Article 26</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tax_number">Tax Number</label>
                                                <input type="text" class="form-control" id="tax_number" name="tax_number" placeholder="Tax Number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="tax_date">Tax Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="tax_date" name="tax_date" placeholder="Tax Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#bpjs" aria-expanded="true" aria-controls="bpjs">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">BPJS</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="bpjs" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <span class="dropdown-title-text">BPJS Ketenagakerjaan</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_ketenagakerjaan_number">BPJS Number</label>
                                                <input type="text" class="form-control" id="bpjs_ketenagakerjaan_number" name="bpjs_ketenagakerjaan_number" placeholder="BPJS Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_ketenagakerjaan_joining_date">Joining Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="bpjs_ketenagakerjaan_joining_date" name="bpjs_ketenagakerjaan_joining_date" placeholder="Joining Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_ketenagakerjaan_period_start_date">Period Start Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="bpjs_ketenagakerjaan_period_start_date" name="bpjs_ketenagakerjaan_period_start_date" placeholder="Period Start Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="non_accidental_death_insurance_checkbox" name="non_accidental_death_insurance_checkbox">
                                                <label class="form-check-label" for="non_accidental_death_insurance_checkbox">Non-Accidental Death Insurance</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="pension_by_employer_checkbox" name="pension_by_employer_checkbox">
                                                <label class="form-check-label" for="pension_by_employer_checkbox">Pension by Employer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="work_related_accident_insurance_checkbox" name="work_related_accident_insurance_checkbox">
                                                <label class="form-check-label" for="work_related_accident_insurance_checkbox">Work Related Accident Insurance</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="pension_by_employee_checkbox" name="pension_by_employee_checkbox">
                                                <label class="form-check-label" for="pension_by_employee_checkbox">Pension by Employee</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="accident_insurance_two_checkbox" name="accident_insurance_two_checkbox">
                                                <label class="form-check-label" for="accident_insurance_two_checkbox">Accident Insurance 2</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="pension_insurance_checkbox" name="pension_insurance_checkbox">
                                                <label class="form-check-label" for="pension_insurance_checkbox">Pension Insurance</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="accident_insurance_three_checkbox" name="accident_insurance_three_checkbox">
                                                <label class="form-check-label" for="accident_insurance_three_checkbox">Accident Insurance 3</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <span class="dropdown-title-text">BPJS Kesehatan</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_kesehatan_number">BPJS Number</label>
                                                <input type="text" class="form-control" id="bpjs_kesehatan_number" name="bpjs_kesehatan_number" placeholder="BPJS Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_kesehatan_joining_date">Joining Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="bpjs_kesehatan_joining_date" name="bpjs_kesehatan_joining_date" placeholder="Joining Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_kesehatan_period_start_date">Period Start Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="bpjs_kesehatan_period_start_date" name="bpjs_kesehatan_period_start_date" placeholder="Period Start Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#bank-data" aria-expanded="true" aria-controls="bank-data">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Bank</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="bank-data" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="bank_code_select">Bank Code</label>
                                                <select class="form-control" id="bank_code_select" name="bank_code_select">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="bank_code_text">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_code_text" name="bank_code_text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="branch_code_select">Branch Code</label>
                                                <select class="form-control" id="branch_code_select" name="branch_code_select">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="branch_code_text">&nbsp;</label>
                                                <input type="text" class="form-control" id="branch_code_text" name="branch_code_text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="source_bank_select">Source Bank</label>
                                                <select class="form-control" id="source_bank_select" name="source_bank_select">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="source_bank_text">&nbsp;</label>
                                                <input type="text" class="form-control" id="source_bank_text" name="source_bank_text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="bank_account_number_one">Account Number</label>
                                                <input type="text" class="form-control" id="bank_account_number_one" name="bank_account_number_one" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="bank_account_number_two">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_account_number_two" name="bank_account_number_two">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="beneficiary_name">Beneficiary Name</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="beneficiary_name" name="beneficiary_name" placeholder="Beneficiary Name">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr class="horizontal" />
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="bank_code_select_opt_one">Option Bank Code - 1</label>
                                                <select class="form-control" id="bank_code_select_opt_one" name="bank_code_select_opt_one">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="bank_code_text_opt_one">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_code_text_opt_one" name="bank_code_text_opt_one" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="branch_code_select_opt_one">Branch Code</label>
                                                <select class="form-control" id="branch_code_select_opt_one" name="branch_code_select_opt_one">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="branch_code_text_opt_one">&nbsp;</label>
                                                <input type="text" class="form-control" id="branch_code_text_opt_one" name="branch_code_text_opt_one" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="source_bank_select_opt_one">Source Bank</label>
                                                <select class="form-control" id="source_bank_select_opt_one" name="source_bank_select_opt_one">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="source_bank_text_opt_one">&nbsp;</label>
                                                <input type="text" class="form-control" id="source_bank_text_opt_one" name="source_bank_text_opt_one" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="bank_account_number_one_opt_one">Account Number</label>
                                                <input type="text" class="form-control" id="bank_account_number_one_opt_one" name="bank_account_number_one_opt_one" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="bank_account_number_two_opt_one">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_account_number_two_opt_one" name="bank_account_number_two_opt_one" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="beneficiary_name_opt_one">Beneficiary Name</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="beneficiary_name_opt_one" name="beneficiary_name_opt_one" placeholder="Beneficiary Name">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <hr class="horizontal" />
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="bank_code_select_opt_two">Option Bank Code - 2</label>
                                                <select class="form-control" id="bank_code_select_opt_two" name="bank_code_select_opt_two">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="bank_code_text_opt_two">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_code_text_opt_two" name="bank_code_text_opt_two" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="branch_code_select_opt_two">Branch Code</label>
                                                <select class="form-control" id="branch_code_select_opt_two" name="branch_code_select_opt_two">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="branch_code_text_opt_two">&nbsp;</label>
                                                <input type="text" class="form-control" id="branch_code_text_opt_two" name="branch_code_text_opt_two" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="source_bank_select_opt_two">Source Bank</label>
                                                <select class="form-control" id="source_bank_select_opt_two" name="source_bank_select_opt_two">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="source_bank_text_opt_two">&nbsp;</label>
                                                <input type="text" class="form-control" id="source_bank_text_opt_two" name="source_bank_text_opt_two" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="bank_account_number_one_opt_two">Account Number</label>
                                                <input type="text" class="form-control" id="bank_account_number_one_opt_two" name="bank_account_number_one_opt_two" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="bank_account_number_two_opt_two">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_account_number_two_opt_two" name="bank_account_number_two_opt_two" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="beneficiary_name_opt_two">Beneficiary Name</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="beneficiary_name_opt_two" name="beneficiary_name_opt_two" placeholder="Beneficiary Name">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#other-data" aria-expanded="true" aria-controls="other-data">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Other</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="other-data" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="performance_result">Performance Result</label>
                                                <input type="text" class="form-control" id="performance_result" name="performance_result" placeholder="Performance Result">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="ump_checkbox">&nbsp;</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="ump_checkbox" name="ump_checkbox">
                                                    <label class="form-check-label" for="ump_checkbox">UMP</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="group_authorization_select">Group Authorization</label>
                                                <select class="form-control" id="group_authorization_select" name="group_authorization_select">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="group_authorization_text">&nbsp;</label>
                                                <input type="text" class="form-control" id="group_authorization_text" name="group_authorization_text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="group_npwp_select">Group NPWP</label>
                                                <select class="form-control" id="group_npwp_select" name="group_npwp_select">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="group_npwp_text">&nbsp;</label>
                                                <input type="text" class="form-control" id="group_npwp_text" name="group_npwp_text" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="group_bpjs_select">Group BPJS</label>
                                                <select class="form-control" id="group_bpjs_select" name="group_bpjs_select">
                                                    <option value="">Choose</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="group_bpjs_text">&nbsp;</label>
                                                <input type="text" class="form-control" id="group_bpjs_text" name="group_bpjs_text" disabled>
                                            </div>
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
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

</html>