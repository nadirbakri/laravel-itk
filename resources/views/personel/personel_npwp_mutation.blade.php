<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_npwp_mutation.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
        .div-title {
            margin-top: 8%;
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
		<div class="div-title">
			<a href="{{ url('/personnel') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_npwp_mutation.list') }}</span>
			</a>
		</div>
		<div class="div-form">
            <form>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_number">Employee Number</label>
                            <select class="form-control" id="employee_number" name="employee_number">
                                <option value="">Choose</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="employee_name">Employee Name</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-5">
                        <span class="div-title-text">Current</span>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="npwp_code_current">NPWP Code</label>
                                    <select class="form-control" id="npwp_code_current" name="npwp_code_current" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_code_current_select">Decree Code</label>
                                    <select class="form-control" id="decree_code_current_select" name="decree_code_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="decree_code_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="decree_code_current_text" name="decree_code_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="decree_no_current">Decree No</label>
                                    <input type="text" class="form-control" id="decree_no_current" name="decree_no_current" placeholder="Decree No" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="decree_date_current">Decree Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="decree_date_current" name="decree_date_current" placeholder="Decree Date" disabled>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="employee_no_current">Employee No</label>
                                    <input type="text" class="form-control" id="employee_no_current" name="employee_no_current" placeholder="Employee No" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <hr class="vertical" />
                    </div>
                    <div class="col-5">
                        <span class="div-title-text">New</span>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="npwp_code_new">NPWP Code</label>
                                    <select class="form-control" id="npwp_code_new" name="npwp_code_new">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_code_new_select">Decree Code</label>
                                    <select class="form-control" id="decree_code_new_select" name="decree_code_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="decree_code_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="decree_code_new_text" name="decree_code_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="decree_no_new">Decree No</label>
                                    <input type="text" class="form-control" id="decree_no_new" name="decree_no_new" placeholder="Decree No">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="decree_date_new">Decree Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="decree_date_new" name="decree_date_new" placeholder="Decree Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="employee_no_new">Employee No</label>
                                    <input type="text" class="form-control" id="employee_no_new" name="employee_no_new" placeholder="Employee No">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="work_location_new_select">Work Location</label>
                                    <select class="form-control" id="work_location_new_select" name="work_location_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="work_location_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="work_location_new_text" name="work_location_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="sub_ordinate_new">Sub Ordinate</label>
                                    <input type="text" class="form-control" id="sub_ordinate_new" name="sub_ordinate_new" placeholder="Sub Ordinate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-5">
                        <span class="div-title-text">Level</span>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_one_code_select_one">Level 1</label>
                                    <select class="form-control" id="level_one_code_select_one" name="level_one_code_select_one">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_one_code_text_one">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_one_code_text_one" name="level_one_code_text_one" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_two_code_select_one">Level 2</label>
                                    <select class="form-control" id="level_two_code_select_one" name="level_two_code_select_one">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_two_code_text_one">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_two_code_text_one" name="level_two_code_text_one" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_three_code_select_one">Level 3</label>
                                    <select class="form-control" id="level_three_code_select_one" name="level_three_code_select_one">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_three_code_text_one">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_three_code_text_one" name="level_three_code_text_one" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_four_code_select_one">Level 4</label>
                                    <select class="form-control" id="level_four_code_select_one" name="level_four_code_select_one">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_four_code_text_one">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_four_code_text_one" name="level_four_code_text_one" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5">
                        <span class="div-title-text">&nbsp;</span>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_one_code_select_two">Level 1</label>
                                    <select class="form-control" id="level_one_code_select_two" name="level_one_code_select_two">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_one_code_text_two">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_one_code_text_two" name="level_one_code_text_one" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_two_code_select_two">Level 2</label>
                                    <select class="form-control" id="level_two_code_select_two" name="level_two_code_select_two">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_two_code_text_two">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_two_code_text_two" name="level_two_code_text_two" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_three_code_select_two">Level 3</label>
                                    <select class="form-control" id="level_three_code_select_two" name="level_three_code_select_two">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_three_code_text_two">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_three_code_text_two" name="level_three_code_text_two" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_four_code_select_two">Level 4</label>
                                    <select class="form-control" id="level_four_code_select_two" name="level_four_code_select_two">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="level_four_code_text_two">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_four_code_text_two" name="level_four_code_text_two" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <span class="div-title-text">Current</span>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="group_code_current_select">Group Code</label>
                                    <select class="form-control" id="group_code_current_select" name="group_code_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="group_code_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="group_code_current_text" name="group_code_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="grade_code_current_select">Grade Code</label>
                                    <select class="form-control" id="grade_code_current_select" name="grade_code_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="grade_code_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="grade_code_current_text" name="grade_code_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="position_code_current_select">Position Code</label>
                                    <select class="form-control" id="position_code_current_select" name="position_code_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="position_code_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="position_code_current_text" name="position_code_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking_code_current_select">Ranking Code</label>
                                    <select class="form-control" id="ranking_code_current_select" name="ranking_code_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking_code_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="ranking_code_current_text" name="ranking_code_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nature_of_work_code_current_select">Nature of Work Code</label>
                                    <select class="form-control" id="nature_of_work_code_current_select" name="nature_of_work_code_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nature_of_work_code_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="nature_of_work_code_current_text" name="nature_of_work_code_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cost_center_code_current_select">Cost Center Code</label>
                                    <select class="form-control" id="cost_center_code_current_select" name="cost_center_code_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cost_center_code_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="cost_center_code_current_text" name="cost_center_code_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_current_select">Superior</label>
                                    <select class="form-control" id="superior_current_select" name="superior_current_select" disabled>
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_current_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="superior_current_text" name="superior_current_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_position_current_one">Superior Position</label>
                                    <input type="text" class="form-control" id="superior_position_current_one" name="superior_position_current_one" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_position_current_two">&nbsp;</label>
                                    <input type="text" class="form-control" id="superior_position_current_two" name="superior_position_current_two" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="start_date_current">Start Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date_current" name="start_date_current" placeholder="Start Date" disabled>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="direct_staff_checkbox_current" name="direct_staff_checkbox_current">
                                        <label class="form-check-label" for="expatriat_checkbox">Direct Staff</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="temporary_checkbox_current" name="temporary_checkbox_current">
                                        <label class="form-check-label" for="temporary_checkbox_current">Temporary</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="employment_status_current">Employment Status</label>
                                    <select class="form-control" id="employment_status_current" name="employment_status_current" disabled>
                                        <option value="">Choose Status</option>
                                        <option value="M">M - Monthly</option>
                                        <option value="D">D - Daily</option>
                                        <option value="C">C - Contract</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contract_start_date_month_current">Contract Start Date</label>
                                    <select class="form-control" id="contract_start_date_month_current" name="contract_start_date_month_current" disabled>
                                        <option value="">Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contract_start_date_year_current">&nbsp;</label>
                                    <select class="form-control" id="contract_start_date_year_current" name="contract_start_date_year_current" disabled>
                                        <option value="">Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <hr class="vertical" />
                    </div>
                    <div class="col-5">
                        <span class="div-title-text">New</span>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="group_code_new_select">Group Code</label>
                                    <select class="form-control" id="group_code_new_select" name="group_code_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="group_code_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="group_code_new_text" name="group_code_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="grade_code_new_select">Grade Code</label>
                                    <select class="form-control" id="grade_code_new_select" name="grade_code_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="grade_code_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="grade_code_new_text" name="grade_code_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="position_code_new_select">Position Code</label>
                                    <select class="form-control" id="position_code_new_select" name="position_code_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="position_code_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="position_code_new_text" name="position_code_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking_code_new_select">Ranking Code</label>
                                    <select class="form-control" id="ranking_code_new_select" name="ranking_code_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ranking_code_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="ranking_code_new_text" name="ranking_code_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nature_of_work_code_new_select">Nature of Work Code</label>
                                    <select class="form-control" id="nature_of_work_code_new_select" name="nature_of_work_code_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nature_of_work_code_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="nature_of_work_code_new_text" name="nature_of_work_code_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cost_center_code_new_select">Cost Center Code</label>
                                    <select class="form-control" id="cost_center_code_new_select" name="cost_center_code_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cost_center_code_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="cost_center_code_new_text" name="cost_center_code_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_new_select">Superior</label>
                                    <select class="form-control" id="superior_new_select" name="superior_new_select">
                                        <option value="">Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_new_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="superior_new_text" name="superior_new_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_position_new_one">Superior Position</label>
                                    <input type="text" class="form-control" id="superior_position_new_one" name="superior_position_new_one" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="superior_position_new_two">&nbsp;</label>
                                    <input type="text" class="form-control" id="superior_position_new_two" name="superior_position_new_two" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="start_date_new">Start Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date_new" name="start_date_new" placeholder="Start Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="direct_staff_checkbox_new" name="direct_staff_checkbox_new">
                                        <label class="form-check-label" for="expatriat_checkbox">Direct Staff</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="temporary_checkbox_new" name="temporary_checkbox_new">
                                        <label class="form-check-label" for="temporary_checkbox_new">Temporary</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="employment_status_new">Employment Status</label>
                                    <select class="form-control" id="employment_status_new" name="employment_status_new" disabled>
                                        <option value="">Choose Status</option>
                                        <option value="M">M - Monthly</option>
                                        <option value="D">D - Daily</option>
                                        <option value="C">C - Contract</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contract_start_date_month_new">Contract Start Date</label>
                                    <select class="form-control" id="contract_start_date_month_new" name="contract_start_date_month_new">
                                        <option value="">Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contract_start_date_year_new">&nbsp;</label>
                                    <select class="form-control" id="contract_start_date_year_new" name="contract_start_date_year_new">
                                        <option value="">Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Remarks"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-process-mutation" id="btn-process-mutation" style="width: 100%;">
                            <i class="fa fa-play-circle"></i> Process
                        </button>
                    </div>
                </div>
            </form>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function() {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function() {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });
    }
</script>

</html>