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
			<a href="{{ url('personel/work_detail') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Work Detail List</span>
			</a>
		</div>

		<div class="div-form">
            <ul class="nav nav-tabs" id="tab-work-detail" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="job-history-tab" data-toggle="tab" href="#job_history" role="tab" aria-controls="job-history" aria-selected="true">Job History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="job-description-tab" data-toggle="tab" href="#job_description" role="tab" aria-controls="job-description" aria-selected="false">Job Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="work-experience-tab" data-toggle="tab" href="#work_experience" role="tab" aria-controls="work-experience" aria-selected="false">Work Experience</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-work-detail">
                <div class="tab-pane fade show active" id="job_history" role="tabpanel" aria-labelledby="job_history-tab">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sequence_number">Sequence Number</label>
                                    <input type="text" class="form-control" id="sequence_number" name="sequence_number" placeholder="Sequence Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="company_code_select">Company Code</label>
                                    <select class="form-control" id="company_code_select" name="company_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="company_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="company_code_text" name="company_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="balance">Balance</label>
                                    <input type="text" class="form-control" id="balance" name="balance" placeholder="Balance">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="decree_code_select">Decree Code</label>
                                    <select class="form-control" id="decree_code_select" name="decree_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="decree_code_text" name="decree_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="employment_status">Employment Status</label>
                                    <select class="form-control" id="employment_status" name="employment_status">
                                      <option value="">Choose Employment Status</option>
                                      <option value="Contract">Contract</option>
                                      <option value="Daily">Daily</option>
                                      <option value="Expatriat">Expatriat</option>
                                      <option value="Monthly">Monthly</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contract_start_date">Contract Start Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="contract_start_date" name="contract_start_date" placeholder="Contract Start Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="contract_end_date">Contract End Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="contract_end_date" name="contract_end_date" placeholder="Contract End Date">
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
                                    <label for="employment_type">Employment Type</label>
                                    <select class="form-control" id="employment_type" name="employment_type">
                                      <option value="">Choose Employment Type</option>
                                      <option value="Penjaja Barang Dagangan">Penjaja Barang Dagangan</option>
                                      <option value="Petugas Dinas Luar Asuransi">Petugas Dinas Luar Asuransi</option>
                                      <option value="Pegawai Tetap">Pegawai Tetap</option>
                                      <option value="Peserta Kegiatan">Peserta Kegiatan</option>
                                      <option value="Peserta Pensiun">Peserta Pensiun</option>
                                      <option value="Peserta Tidak Tetap atau Tenaga Kerja Lepas">Peserta Tidak Tetap atau Tenaga Kerja Lepas</option>
                                      <option value="Tenaga Ahli">Tenaga Ahli</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="decree_no">Decree No</label>
                                    <input type="text" class="form-control" id="decree_no" name="decree_no" placeholder="Decree No">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="decree_date">Decree Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="decree_date" name="decree_date" placeholder="Decree Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="level_one_code_select">Level 1 Code</label>
                                    <select class="form-control" id="level_one_code_select" name="level_one_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_one_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_one_code_text" name="level_one_code_text" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="position_code_select">Position Code</label>
                                    <select class="form-control" id="position_code_select" name="position_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="position_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="position_code_text" name="position_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="level_two_code_select">Level 2 Code</label>
                                    <select class="form-control" id="level_two_code_select" name="level_two_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_two_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_two_code_text" name="level_two_code_text" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="ranking_code_select">Ranking Code</label>
                                    <select class="form-control" id="ranking_code_select" name="ranking_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="ranking_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="ranking_code_text" name="ranking_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="level_three_code_select">Level 3 Code</label>
                                    <select class="form-control" id="level_three_code_select" name="level_three_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_three_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_three_code_text" name="level_three_code_text" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="group_code_select">Group Code</label>
                                    <select class="form-control" id="group_code_select" name="group_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="group_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="group_code_text" name="group_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="level_four_code_select">Level 4 Code</label>
                                    <select class="form-control" id="level_four_code_select" name="level_four_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="level_four_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="level_four_code_text" name="level_four_code_text" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="location_code_select">Location Code</label>
                                    <select class="form-control" id="location_code_select" name="location_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="location_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="location_code_text" name="location_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="grade_code_select">Grade Code</label>
                                    <select class="form-control" id="grade_code_select" name="grade_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="grade_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="grade_code_text" name="grade_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="nature_of_work_code_select">Nature of Work Code</label>
                                    <select class="form-control" id="nature_of_work_code_select" name="nature_of_work_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nature_of_work_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="nature_of_work_code_text" name="nature_of_work_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="number_of_subordinates">Number of Subordinates</label>
                                    <input type="text" class="form-control" id="number_of_subordinates" name="number_of_subordinates" placeholder="Number of Subordinates">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="superior_select">Superior</label>
                                    <select class="form-control" id="superior_select" name="superior_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="superior_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="superior_text" name="superior_text" disabled>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="approved_by_select">Approved By</label>
                                    <select class="form-control" id="approved_by_select" name="approved_by_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="approved_by_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="approved_by_text" name="approved_by_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="direct_staff_checkbox" name="direct_staff_checkbox">
                                    <label class="form-check-label" for="direct_staff_checkbox">Direct Staff</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="temporary_checkbox" name="temporary_checkbox">
                                    <label class="form-check-label" for="temporary_checkbox">Temporary</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Remarks"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="job_description" role="tabpanel" aria-labelledby="job-description-tab">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="position_job_description">Position Job Description</label>
                                    <textarea class="form-control" id="position_job_description" name="position_job_description" rows="3" placeholder="Position Job Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="additional_job_description">Additional Job Description</label>
                                    <textarea class="form-control" id="additional_job_description" name="additional_job_description" rows="3" placeholder="Additional Job Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-print-job-description" id="btn-print-job-description" style="width: 100%;">
                                    <i class="fa fa-print"></i> Print
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="work_experience" role="tabpanel" aria-labelledby="work-experience-tab">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <table id="work_experience_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Seq No</th>
                                            <th>Company Name</th>
                                            <th>Joining Date</th>
                                            <th>Termination Date</th>
                                            <th>Position</th>
                                            <th>Ranking</th>
                                            <th>Nature of Work</th>
                                            <th>Line of Business</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-work-experience" id="btn-add-work-experience" style="width: 100%;" data-toggle="modal" data-target="#modal_add_work_experience">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-work-experience" id="btn-remove-work-experience" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
    <div class="modal fade" id="modal_add_work_experience" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Work Experience</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_experience_sequence_number">Sequence Number</label>
                                    <input type="text" class="form-control" id="work_experience_sequence_number" name="work_experience_sequence_number" placeholder="Sequence Number">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_experience_company">Company</label>
                                    <input type="text" class="form-control" id="work_experience_company" name="work_experience_company" placeholder="Company">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_experience_joining_date">Joining Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="work_experience_joining_date" name="work_experience_joining_date" placeholder="Joining Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_experience_termination_date">Termination Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="work_experience_termination_date" name="work_experience_termination_date" placeholder="Termination Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="work_experience_position_code">Position Code</label>
                                    <input type="text" class="form-control" id="work_experience_position_code" name="work_experience_position_code" placeholder="Position Code">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="work_experience_ranking_code">Ranking Code</label>
                                    <input type="text" class="form-control" id="work_experience_ranking_code" name="work_experience_ranking_code" placeholder="Ranking Code">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="work_experience_nature_of_work_code_select">Nature of Work Code</label>
                                    <select class="form-control" id="work_experience_nature_of_work_code_select" name="work_experience_nature_of_work_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="work_experience_nature_of_work_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="work_experience_nature_of_work_code_text" name="work_experience_nature_of_work_code_text" disabled>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="work_experience_line_of_business_code_select">Line of Business Code</label>
                                    <select class="form-control" id="work_experience_line_of_business_code_select" name="work_experience_line_of_business_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="work_experience_line_of_business_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="work_experience_line_of_business_code_text" name="work_experience_line_of_business_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_experience_professional_experience">Professional Experience</label>
                                    <textarea class="form-control" id="work_experience_professional_experience" name="work_experience_professional_experience" rows="3" placeholder="Professional Experience"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="work_experience_remarks">Remarks</label>
                                    <textarea class="form-control" id="work_experience_remarks" name="work_experience_remarks" rows="3" placeholder="Remarks"></textarea>
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
    $('#work_experience_table thead tr').clone(true).appendTo('#work_experience_table thead');
    $('#work_experience_table thead tr:eq(1) th').each( function (i) {
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

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = e.target;

        if(target.id == "work-experience-tab"){
            $('#work_experience_table').DataTable().destroy();
            load_table_work_experience();
        }
    });

    function load_table_work_experience() {
        table = $('#work_experience_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: "{{ url('personel/work_detail/work_experience/table') }}",
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'ellipses',
            columns: [
                {data: 'seq_no', name: 'seq_no'},
                {data: 'company_name', name: 'company_name'},
                {data: 'joining_date', name: 'joining_date'},
                {data: 'termination_date', name: 'termination_date'},
                {data: 'position', name: 'position'},
                {data: 'ranking', name: 'ranking'},
                {data: 'nature_of_work', name: 'nature_of_work'},
                {data: 'line_of_business', name: 'line_of_business'},
            ]
        });
    }   
  });
</script>

</html>