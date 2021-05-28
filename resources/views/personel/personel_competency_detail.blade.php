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
			<a href="{{ url('personel/competency') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Competency List</span>
			</a>
		</div>

		<div class="div-form">
            <ul class="nav nav-tabs" id="tab-competency" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="formal-education-tab" data-toggle="tab" href="#formal_education" role="tab" aria-controls="formal-education" aria-selected="true">Formal Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="language-tab" data-toggle="tab" href="#language" role="tab" aria-controls="language" aria-selected="false">Language</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">Organization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="reference-tab" data-toggle="tab" href="#reference" role="tab" aria-controls="reference" aria-selected="false">Reference</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="skill-tab" data-toggle="tab" href="#skill" role="tab" aria-controls="skill" aria-selected="false">Skill</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-competency">
                <div class="tab-pane fade show active" id="formal_education" role="tabpanel" aria-labelledby="formal-education-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="formal_education_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Education</th>
                                            <th>Institution Code</th>
                                            <th>Major Code</th>
                                            <th>Education Status Code</th>
                                            <th>Graduate Year</th>
                                            <th>Title</th>
                                            <th>City</th>
                                            <th>GPA</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-formal-education" id="btn-add-formal-education" style="width: 100%;" data-toggle="modal" data-target="#modal_add_formal_education">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-formal-education" id="btn-remove-formal-education" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="language" role="tabpanel" aria-labelledby="language-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="language_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Language</th>
                                            <th>Reading Ability</th>
                                            <th>Spoken Ability</th>
                                            <th>Written Ability</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-language" id="btn-add-language" style="width: 100%;" data-toggle="modal" data-target="#modal_add_language">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-language" id="btn-remove-language" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="organization_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Organization Name</th>
                                            <th>Position</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-organization" id="btn-add-organization" style="width: 100%;" data-toggle="modal" data-target="#modal_add_organization">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-organization" id="btn-remove-organization" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="reference" role="tabpanel" aria-labelledby="reference-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="reference_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Reference Name</th>
                                            <th>Phone No</th>
                                            <th>Company Name</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-reference" id="btn-add-reference" style="width: 100%;" data-toggle="modal" data-target="#modal_add_reference">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-reference" id="btn-remove-reference" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="skill" role="skill" aria-labelledby="skill-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="skill_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Skill Code</th>
                                            <th>Skill Description</th>
                                            <th>Skill Ability</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-skill" id="btn-add-skill" style="width: 100%;" data-toggle="modal" data-target="#modal_add_skill">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-skill" id="btn-remove-skill" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
    <div class="modal fade" id="modal_add_formal_education" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Formal Education</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_education_select">Education</label>
                                    <select class="form-control" id="formal_education_education_select" name="formal_education_education_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_education_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="formal_education_education_text" name="formal_education_education_text" disabled>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_institution_code_select">Institution Code</label>
                                    <select class="form-control" id="formal_education_institution_code_select" name="formal_education_institution_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_institution_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="formal_education_institution_code_text" name="formal_education_institution_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_major_code_select">Major Code</label>
                                    <select class="form-control" id="formal_education_major_code_select" name="formal_education_major_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_major_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="formal_education_major_code_text" name="formal_education_major_code_text" disabled>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_education_status_code_select">Education Status Code</label>
                                    <select class="form-control" id="formal_education_education_status_code_select" name="formal_education_education_status_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_education_status_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="formal_education_education_status_code_text" name="formal_education_education_status_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="formal_education_graduate_year">Graduate Year</label>
                                    <select class="form-control" id="formal_education_graduate_year" name="formal_education_graduate_year">
                                      <option value="" selected>Choose Year</option>
                                      <option value="2023">2023</option>
                                      <option value="2022">2022</option>
                                      <option value="2021">2021</option>
                                      <option value="2020">2020</option>
                                      <option value="2019">2019</option>
                                      <option value="2018">2018</option>
                                      <option value="2017">2017</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_city_select">City</label>
                                    <select class="form-control" id="formal_education_city_select" name="formal_education_city_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="formal_education_city_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="formal_education_city_text" name="formal_education_city_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="formal_education_title">Title</label>
                                    <input type="text" class="form-control" id="formal_education_title" name="formal_education_title" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="formal_education_gpa">GPA</label>
                                    <input type="text" class="form-control" id="formal_education_gpa" name="formal_education_gpa" placeholder="GPA">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_language" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="language_language_select">Language</label>
                                    <select class="form-control" id="language_language_select" name="language_language_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="language_language_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="language_language_text" name="language_language_text" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="language_spoken_ability_select">Spoken Ability</label>
                                    <select class="form-control" id="language_spoken_ability_select" name="language_spoken_ability_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="language_spoken_ability_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="language_spoken_ability_text" name="language_spoken_ability_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="language_reading_ability_select">Reading Ability</label>
                                    <select class="form-control" id="language_reading_ability_select" name="language_reading_ability_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="language_reading_ability_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="language_reading_ability_text" name="language_reading_ability_text" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="language_written_ability_select">Written Ability</label>
                                    <select class="form-control" id="language_written_ability_select" name="language_written_ability_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="language_written_ability_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="language_written_ability_text" name="language_written_ability_text" disabled>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_organization" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Organization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="organization_organization_name">Organization Name</label>
                                    <input type="text" class="form-control" id="organization_organization_name" name="organization_organization_name" placeholder="Organization Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="organization_position">Position</label>
                                    <input type="text" class="form-control" id="organization_position" name="organization_position" placeholder="Position">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="organization_period_start_date">Period Start Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="organization_period_start_date" name="organization_period_start_date" placeholder="Period Start Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="organization_period_end_date">Period End Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="organization_period_end_date" name="organization_period_end_date" placeholder="Period End Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_reference" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Reference</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="reference_reference_name">Reference Name</label>
                                    <input type="text" class="form-control" id="reference_reference_name" name="reference_reference_name" placeholder="Reference Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="reference_phone_number">Phone Number</label>
                                    <input type="text" class="form-control" id="reference_phone_number" name="reference_phone_number" placeholder="Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="reference_company_name">Company Name</label>
                                    <input type="text" class="form-control" id="reference_company_name" name="reference_company_name" placeholder="Company Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="reference_remarks">Remarks</label>
                                    <input type="text" class="form-control" id="reference_remarks" name="reference_remarks" placeholder="Remarks">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_skill" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="skill_skill_code_select">Skill Code</label>
                                    <select class="form-control" id="skill_skill_code_select" name="skill_skill_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="skill_skill_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="skill_skill_code_text" name="skill_skill_code_text" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="skill_skill_description">Skill Description</label>
                                    <input type="text" class="form-control" id="skill_skill_description" name="skill_skill_description" placeholder="Skill Description">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="skill_skill_ability_select">Skill Ability</label>
                                    <select class="form-control" id="skill_skill_ability_select" name="skill_skill_ability_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="skill_skill_ability_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="skill_skill_ability_text" name="skill_skill_ability_text" disabled>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary w-25"><i class="fa fa-check"></i> OK</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancel</button>
                </div>
                </form>
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

<script type="text/javascript">
  $(document).ready(function() {
    var table = null;
    $('#formal_education_data_table thead tr').clone(true).appendTo('#formal_education_data_table thead');
    $('#formal_education_data_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    $('#language_data_table thead tr').clone(true).appendTo('#language_data_table thead');
    $('#language_data_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    $('#organization_data_table thead tr').clone(true).appendTo('#organization_data_table thead');
    $('#organization_data_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    $('#reference_data_table thead tr').clone(true).appendTo('#reference_data_table thead');
    $('#reference_data_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    $('#skill_data_table thead tr').clone(true).appendTo('#skill_data_table thead');
    $('#skill_data_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    load_table_formal_education();

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = e.target;

        if(target.id == "formal-education-tab"){
            $('#formal_education_data_table').DataTable().destroy();
            load_table_formal_education();
        }else if(target.id == "language-tab"){
            $('#language_data_table').DataTable().destroy();
            load_table_language();
        }else if(target.id == "organization-tab"){
            $('#organization_data_table').DataTable().destroy();
            load_table_organization();
        }else if(target.id == "reference-tab"){
            $('#reference_data_table').DataTable().destroy();
            load_table_reference();
        }else if(target.id == "skill-tab"){
            $('#skill_data_table').DataTable().destroy();
            load_table_skill();
        }
    });

    function load_table_formal_education() {
        table = $('#formal_education_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/competency/formal_education/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'education', name: 'education'},
                {data: 'institution_code', name: 'institution_code'},
                {data: 'major_code', name: 'major_code'},
                {data: 'education_status_code', name: 'education_status_code'},
                {data: 'graduate_year', name: 'graduate_year'},
                {data: 'title', name: 'title'},
                {data: 'city', name: 'city'},
                {data: 'gpa', name: 'gpa'}
            ]
        });
    }

    function load_table_language() {
        table = $('#language_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/competency/language/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'language', name: 'language'},
                {data: 'reading_ability', name: 'reading_ability'},
                {data: 'spoken_ability', name: 'spoken_ability'},
                {data: 'written_ability', name: 'written_ability'}
            ]
        });
    }

    function load_table_organization() {
        table = $('#organization_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/competency/organization/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'organization_name', name: 'organization_name'},
                {data: 'position', name: 'position'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'}
            ]
        });
    }

    function load_table_reference() {
        table = $('#reference_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/competency/reference/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'reference_name', name: 'reference_name'},
                {data: 'phone_no', name: 'phone_no'},
                {data: 'company_name', name: 'company_name'},
                {data: 'remarks', name: 'remarks'}
            ]
        });
    }

    function load_table_skill() {
        table = $('#skill_data_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/competency/skill/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'skill_code', name: 'skill_code'},
                {data: 'skill_description', name: 'skill_description'},
                {data: 'skill_ability', name: 'skill_ability'}
            ]
        });
    }
  });
</script>

</html>