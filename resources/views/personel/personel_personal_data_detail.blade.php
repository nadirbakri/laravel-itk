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
			<a href="{{ url('personel/personal_data') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">Personal Data List</span>
			</a>
		</div>

		<div class="div-form">
            <ul class="nav nav-tabs" id="tab-personal" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="personal1-tab" data-toggle="tab" href="#personal1" role="tab" aria-controls="personal1" aria-selected="true">Personal 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="personal2-tab" data-toggle="tab" href="#personal2" role="tab" aria-controls="personal2" aria-selected="false">Personal 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="personal3-tab" data-toggle="tab" href="#personal3" role="tab" aria-controls="personal3" aria-selected="false">Personal 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dependent-tab" data-toggle="tab" href="#dependent" role="tab" aria-controls="dependent" aria-selected="false">Dependent</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-personal">
                <div class="tab-pane fade show active" id="personal1" role="tabpanel" aria-labelledby="personal1-tab">
                    <form>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="prefix_title_one">Prefix Title</label>
                                    <input class="form-control" id="prefix_title_one" name="prefix_title_one" value="" placeholder="Choose Prefix">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="prefix_title_two">&nbsp;</label>
                                    <input class="form-control" id="prefix_title_two" name="prefix_title_two" value="" placeholder="Choose Prefix">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="prefix_title_three">&nbsp;</label>
                                    <input class="form-control" id="prefix_title_three" name="prefix_title_three" value="" placeholder="Choose Prefix">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="suffix_title_one">Suffix Title</label>
                                    <input class="form-control" id="suffix_title_one" name="suffix_title_one" value="" placeholder="Choose Suffix">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="suffix_title_two">&nbsp;</label>
                                    <input class="form-control" id="suffix_title_two" name="suffix_title_two" value="" placeholder="Choose Suffix">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="suffix_title_three">&nbsp;</label>
                                    <input class="form-control" id="suffix_title_three" name="suffix_title_three" value="" placeholder="Choose Suffix">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nick_name">Nick Name</label>
                                    <input type="text" class="form-control" id="nick_name" name="nick_name" placeholder="Nick Name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="birth_place">Birth Place</label>
                                    <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="Birth Place">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="birth_date">Birth Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="birth_date" name="birth_date" placeholder="Birth Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr class="horizontal" />
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                      <option value="">Choose Gender</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tax_registered_number">Tax Registered No.</label>
                                    <input type="text" class="form-control" id="tax_registered_number" name="tax_registered_number" placeholder="Tax Registered No.">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="tax_registered_date">Tax Registered Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="tax_registered_date" name="tax_registered_date" placeholder="Tax Registered Date">
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
                                    <label for="blood_type">Blood Type</label>
                                    <select class="form-control" id="blood_type" name="blood_type">
                                      <option value="">Choose Blood Type</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tax_office">Tax Office</label>
                                    <input type="text" class="form-control" id="tax_office" name="tax_office" placeholder="Tax Office">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="marital_status">Marital Status</label>
                                    <select class="form-control" id="marital_status" name="marital_status">
                                      <option value="">Choose Marital Status</option>
                                      <option value="Married">Married</option>
                                      <option value="Single">Single</option>
                                      <option value="Widow">Widow</option>
                                      <option value="Widower">Widower</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="id_number">ID Number</label>
                                    <input type="text" class="form-control" id="id_number" name="id_number" placeholder="ID Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="family_number">Family Member(s)</label>
                                    <input type="text" class="form-control" id="family_number" name="family_number" placeholder="Family Number(s)">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="personal1_dependent">Dpendent(s)</label>
                                    <input type="text" class="form-control" id="personal1_dependent" name="personal1_dependent" placeholder="Dependent(s)">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="driving_license_car_type">Driving License Car</label>
                                    <select class="form-control" id="driving_license_car_type" name="driving_license_car_type">
                                      <option value="">Choose Type</option>
                                      <option value="A">A</option>
                                      <option value="B1">B1</option>
                                      <option value="B2">B2</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="driving_license_car_number">&nbsp;</label>
                                    <input type="text" class="form-control" id="driving_license_car_number" name="driving_license_car_number" placeholder="Driving License Car Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="no_of_main_family">No. of Main Family</label>
                                    <input type="text" class="form-control" id="no_of_main_family" name="no_of_main_family" placeholder="No. of Main Family">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="driving_license_motorcycle_number">Driving License Motorcycle</label>
                                    <input type="text" class="form-control" id="driving_license_motorcycle_number" name="driving_license_motorcycle_number" placeholder="Driving License Motorcycle">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="religion">Religion</label>
                                    <select class="form-control" id="religion" name="religion">
                                      <option value="">Choose Religion</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="passport_number">Passport Number</label>
                                    <input type="text" class="form-control" id="passport_number" name="passport_number" placeholder="Passport Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nationality">Nationality</label>
                                    <select class="form-control" id="nationality" name="nationality">
                                      <option value="">Choose Nationality</option>
                                      <option value="WNI">WNI</option>
                                      <option value="WNA">WNA</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="passport_date">Passport Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="passport_date" name="passport_date" placeholder="Passport Date">
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
                                    <label for="card_id">Card ID</label>
                                    <input type="text" class="form-control" id="card_id" name="card_id" placeholder="Card ID">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mother_name">Mother Name</label>
                                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Mother Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr class="horizontal" />
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
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="cost_center_code_select">Cost Center Code</label>
                                    <select class="form-control" id="cost_center_code_select" name="cost_center_code_select">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cost_center_code_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="cost_center_code_text" name="cost_center_code_text" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="level_1_code">Level 1 Code</label>
                                    <select class="form-control" id="level_1_code" name="level_1_code">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                           <div class="col-3">
                                <div class="form-group">
                                    <label for="level_2_code">Level 2 Code</label>
                                    <select class="form-control" id="level_2_code" name="level_2_code">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="level_3_code">Level 3 Code</label>
                                    <select class="form-control" id="level_3_code" name="level_3_code">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="level_4_code">Level 4 Code</label>
                                    <select class="form-control" id="level_4_code" name="level_4_code">
                                      <option value="">Choose</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="personal2" role="tabpanel" aria-labelledby="personal2-tab">
                    <form>
                        <div class="row">
                            <div class="col-5">
                                <span class="div-title-text">Home Address</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="home_address">Address</label>
                                            <textarea class="form-control" id="home_address" name="home_address" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="home_city_select">City</label>
                                            <select class="form-control" id="home_city_select" name="home_city_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="home_city_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="home_city_text" name="home_city_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="home_zip_code_select">Zip Code</label>
                                            <select class="form-control" id="home_zip_code_select" name="home_zip_code_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="home_zip_code_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="home_zip_code_text" name="home_zip_code_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="home_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="home_phone_number" name="home_phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <hr class="vertical" />
                            </div>
                            <div class="col-5">
                                <span class="div-title-text">Other Address</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other_address">Address</label>
                                            <textarea class="form-control" id="other_address" name="other_address" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="other_city_select">City</label>
                                            <select class="form-control" id="other_city_select" name="other_city_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="other_city_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="other_city_text" name="other_city_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="other_zip_code_select">Zip Code</label>
                                            <select class="form-control" id="other_zip_code_select" name="other_zip_code_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="other_zip_code_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="other_zip_code_text" name="other_zip_code_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="other_phone_number" name="other_phone_number" placeholder="Phone Number">
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
                                <span class="div-title-text">Work Address</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="work_address">Address</label>
                                            <textarea class="form-control" id="work_address" name="work_address" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="work_city_select">City</label>
                                            <select class="form-control" id="work_city_select" name="work_city_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="work_city_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="work_city_text" name="work_city_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="work_zip_code_select">Zip Code</label>
                                            <select class="form-control" id="work_zip_code_select" name="work_zip_code_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="work_zip_code_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="work_zip_code_text" name="work_zip_code_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="work_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="work_phone_number" name="work_phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <hr class="vertical" />
                            </div>
                            <div class="col-5">
                                <span class="div-title-text">Correspondence Address</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="correspondence_address">Address</label>
                                            <textarea class="form-control" id="correspondence_address" name="correspondence_address" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="correspondence_city_select">City</label>
                                            <select class="form-control" id="correspondence_city_select" name="correspondence_city_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="correspondence_city_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="correspondence_city_text" name="correspondence_city_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="correspondence_zip_code_select">Zip Code</label>
                                            <select class="form-control" id="correspondence_zip_code_select" name="correspondence_zip_code_select">
                                                <option value="">Choose</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="correspondence_zip_code_text">&nbsp;</label>
                                            <input type="text" class="form-control" id="correspondence_zip_code_text" name="correspondence_zip_code_text" disabled>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="correspondence_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="correspondence_phone_number" name="correspondence_phone_number" placeholder="Phone Number">
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
                                <span class="div-title-text">Emergency Contact</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="emergency_contact_name">Name</label>
                                            <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="emergency_contact_address">Address</label>
                                            <textarea class="form-control" id="emergency_contact_address" name="emergency_contact_address" rows="3" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="emergency_contact_phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="emergency_contact_phone_number" name="emergency_contact_phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="emergency_contact_relation">Relation</label>
                                            <input type="text" class="form-control" id="emergency_contact_relation" name="emergency_contact_relation" placeholder="Relation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <hr class="vertical" />
                            </div>
                            <div class="col-5">
                                <span class="div-title-text">Other</span>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other_handphone_no">Handphone No</label>
                                            <input type="text" class="form-control" id="other_handphone_no" name="other_handphone_no" placeholder="Handphone No">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other_personal_email">Personal Email</label>
                                            <input type="text" class="form-control" id="other_personal_email" name="other_personal_email" placeholder="Personal Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other_company_email">Company Email</label>
                                            <input type="text" class="form-control" id="other_company_email" name="other_company_email" placeholder="Company Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="other_personal_website">Personal Website</label>
                                            <input type="text" class="form-control" id="other_personal_website" name="other_personal_website" placeholder="Personal Website">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="personal3" role="tabpanel" aria-labelledby="personal3-tab">
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#employment-data" aria-expanded="true" aria-controls="employment-data">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Employment</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="employment-data" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="employment_status">Employment Status</label>
                                                <select class="form-control" id="employment_status" name="employment_status">
                                                    <option value="">Choose Status</option>
                                                    <option value="Contract">Contract</option>
                                                    <option value="Daily">Daily</option>
                                                    <option value="Expatriat">Expatriat</option>
                                                    <option value="Monthly">Monthly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="employment_date">Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="employment_date" name="employment_date" placeholder="Passport Date">
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
                                                    <option value="">Choose Type</option>
                                                    <option value="Penerima Penghasilan Berkesinambungan">Penerima Penghasilan Berkesinambungan</option>
                                                    <option value="Penerima Penghasilan Tidak Berkesinambungan">Penerima Penghasilan Tidak Berkesinambungan</option>
                                                    <option value="Distributor Multi Level Marketing (MLM)">Distributor Multi Level Marketing (MLM)</option>
                                                    <option value="Dewan Komisaris sebagai Pegawai">Dewan Komisaris sebagai Pegawai</option>
                                                    <option value="Mantan Pegawai">Mantan Pegawai</option>
                                                    <option value="Penjaja Barang Dagangan">Penjaja Barang Dagangan</option>
                                                    <option value="Lain-lain">Lain-lain</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="employment_joining_date">Joining Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="employment_joining_date" name="employment_joining_date" placeholder="Joining Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="employment_probation_end_date">Probation End Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="employment_probation_end_date" name="employment_probation_end_date" placeholder="Probation End Date">
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
                                                <label for="employment_contract_start_date">Contract Start Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="employment_contract_start_date" name="employment_contract_start_date" placeholder="Contract Start Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="employment_contract_end_date">Contract End Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="employment_contract_end_date" name="employment_contract_end_date" placeholder="Contract End Date">
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
                                                <label for="employment_termination_date">Termination Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="employment_termination_date" name="employment_termination_date" placeholder="Termination Date">
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
                                                <label for="termination_code_one">Termination Code</label>
                                                <input type="text" class="form-control" id="termination_code_one" name="termination_code_one" placeholder="Termination Code">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="termination_code_two">Termination Code</label>
                                                <input type="text" class="form-control" id="termination_code_two" name="termination_code_two" placeholder="Termination Code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="termination_remarks">Termination Remarks</label>
                                                <textarea class="form-control" id="termination_remarks" name="termination_remarks" rows="3" placeholder="Termination Remarks"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#expatriat-data" aria-expanded="true" aria-controls="expatriat-data">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Expatriat</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="expatriat-data" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="expatriat_checkbox" name="expatriat_checkbox">
                                                <label class="form-check-label" for="expatriat_checkbox">Expatriat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="expatriat_license_number">License Number</label>
                                                <input type="text" class="form-control" id="expatriat_license_number" name="expatriat_license_number" placeholder="License Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="expatriat_start_date">Start Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="expatriat_start_date" name="expatriat_start_date" placeholder="Start Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="expatriat_end_date">End Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="expatriat_end_date" name="expatriat_end_date" placeholder="End Date">
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
                        <a class="collapsed" data-toggle="collapse" href="#bpjs-data" aria-expanded="true" aria-controls="bpjs-data">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">BPJS</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="bpjs-data" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_ketenagakerjaan_number">BPJS Ketenagakerjaan Number</label>
                                                <input type="text" class="form-control" id="bpjs_ketenagakerjaan_number" name="bpjs_ketenagakerjaan_number" placeholder="BPJS Ketenagakerjaan Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_joining_date">Joining Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="bpjs_joining_date" name="bpjs_joining_date" placeholder="Joining Date">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bpjs_period_start_date">Period Start Date</label>
                                                <div class='input-group'>
                                                    <input type="text" class="form-control" id="bpjs_period_start_date" name="bpjs_period_start_date" placeholder="Period Start Date">
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
                                                <label for="bank_account_number_one">Account Number</label>
                                                <input type="text" class="form-control" id="bank_account_number_one" name="bank_account_number_one" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="bank_account_number_two">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_account_number_two" name="bank_account_number_two" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bank_account_name">Account Name</label>
                                                <input type="text" class="form-control" id="bank_account_name" name="bank_account_name" placeholder="Account Name">
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
                                                <label for="bank_account_number_one_opt_one">Account Number</label>
                                                <input type="text" class="form-control" id="bank_account_number_one_opt_one" name="bank_account_number_one_opt_one" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="bank_account_number_two_opt_one">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_account_number_two_opt_one" name="bank_account_number_two_opt_one" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bank_account_name_opt_one">Account Name</label>
                                                <input type="text" class="form-control" id="bank_account_name_opt_one" name="bank_account_name_opt_one" placeholder="Account Name">
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
                                                <label for="bank_account_number_one_opt_two">Account Number</label>
                                                <input type="text" class="form-control" id="bank_account_number_one_opt_two" name="bank_account_number_one_opt_two" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="bank_account_number_two_opt_two">&nbsp;</label>
                                                <input type="text" class="form-control" id="bank_account_number_two_opt_two" name="bank_account_number_two_opt_two" placeholder="Account Number">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="bank_account_name_opt_two">Account Name</label>
                                                <input type="text" class="form-control" id="bank_account_name_opt_two" name="bank_account_name_opt_two" placeholder="Account Name">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#fringe-benefit-data" aria-expanded="true" aria-controls="fringe-benefit-data">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Fringe Benefit</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="fringe-benefit-data" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-12">
                                            <table id="fringe_benefit_data_table" class="table hover">
                                                <thead>
                                                    <tr>
                                                        <th>Seq No</th>
                                                        <th>Benefits</th>
                                                        <th>Description</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary" name="btn-add-fringe-benefit" id="btn-add-fringe-benefit" style="width: 100%;" data-toggle="modal" data-target="#modal_add_fridge_benefit">
                                                <i class="fa fa-plus"></i> Add
                                            </button>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-danger" name="btn-remove-fringe-benefit" id="btn-remove-fringe-benefit" style="width: 100%;">
                                                <i class="fa fa-times"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <a class="collapsed" data-toggle="collapse" href="#commissioner-data" aria-expanded="true" aria-controls="commissioner-data">
                            <div class="card-header">
                                <div class="div-dropdown-title">
                                    <span class="dropdown-title-text">Commissioner</span>
                                    <img class="dropdown-triangle" src="{{ url('/pictures/triangle.png') }}" alt="Triangle">
                                </div>
                            </div>
                        </a>
                        <div id="commissioner-data" class="collapse">
                            <div class="card-block">
                                <form>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="commissioner_checkbox" name="commissioner_checkbox">
                                                <label class="form-check-label" for="commissioner_checkbox">Is Commissioner</label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="dependent" role="tabpanel" aria-labelledby="dependent-tab">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_no_of_family">No of Family</label>
                                    <input type="text" class="form-control" id="dependent_no_of_family" name="dependent_no_of_family" placeholder="No of Family">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_no_of_dependent_for_payroll">No of Dependent For Payroll</label>
                                    <input type="text" class="form-control" id="dependent_no_of_dependent_for_payroll" name="dependent_no_of_dependent_for_payroll" placeholder="No of Dependent For Payroll">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_no_of_dependent">No of Dependent</label>
                                    <input type="text" class="form-control" id="dependent_no_of_dependent" name="dependent_no_of_dependent" placeholder="No of Dependent">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_no_of_main_family">No of Main Family</label>
                                    <input type="text" class="form-control" id="dependent_no_of_main_family" name="dependent_no_of_main_family" placeholder="No of Main Family">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table id="dependent_data_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Dependent Name</th>
                                            <th>Relation</th>
                                            <th>Birth Date</th>
                                            <th>Gender</th>
                                            <th>Blood Type</th>
                                            <th>Family Card Number</th>
                                            <th>Occupation</th>
                                            <th>Medical Claim</th>
                                            <th>Tax</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <button type="button" class="btn btn-primary" name="btn-add-dependent" id="btn-add-dependent" style="width: 100%;" data-toggle="modal" data-target="#modal_add_dependent">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger" name="btn-remove-dependent" id="btn-remove-dependent" style="width: 100%;">
                                    <i class="fa fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
    <div class="modal fade" id="modal_add_fridge_benefit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Report Format Condition</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fringe_benefit_seq_no">Seq No</label>
                                    <input type="text" class="form-control" id="fringe_benefit_seq_no" name="fringe_benefit_seq_no" placeholder="Seq No">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fringe_benefit_table_name">Table Name</label>
                                    <select class="form-control" id="fringe_benefit_table_name" name="fringe_benefit_table_name">
                                      <option value="">Choose Table Name</option>
                                      <option value="PeMaster">PeMaster</option>
                                      <option value="PeMasterInfo">PeMasterInfo</option>
                                      <option value="PeMasterAddress">PeMasterAddress</option>
                                      <option value="PeMasterBank">PeMasterBank</option>
                                      <option value="PeHistoryJob">PeHistoryJob</option>
                                      <option value="PeFreeFormat">PeFreeFormat</option>
                                      <option value="PeMasterPayroll">PeMasterPayroll</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fringe_benefit_field_name">Field Name</label>
                                    <select class="form-control" id="fringe_benefit_field_name" name="fringe_benefit_field_name">
                                      <option value="">Choose Field Name</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fringe_benefit_operator">Operator</label>
                                    <select class="form-control" id="fringe_benefit_operator" name="fringe_benefit_operator">
                                      <option value="">Choose Operator</option>
                                      <option value="=">=</option>
                                      <option value="<>"><></option>
                                      <option value="<="><=</option>
                                      <option value=">=">>=</option>
                                      <option value="Between">Between</option>
                                      <option value="Like">Like</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fringe_benefit_value_from">Value From</label>
                                    <input type="text" class="form-control" id="fringe_benefit_value_from" name="fringe_benefit_value_from" placeholder="Value From">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fringe_benefit_value_to">Value To</label>
                                    <input type="text" class="form-control" id="fringe_benefit_value_to" name="fringe_benefit_value_to" placeholder="Value To">
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
    <div class="modal fade" id="modal_add_dependent" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Dependent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_name">Dependent Name</label>
                                    <input type="text" class="form-control" id="dependent_name" name="dependent_name" placeholder="Dependent Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_relation_select">Relation</label>
                                    <select class="form-control" id="dependent_relation_select" name="dependent_relation_select">
                                      <option value="">Choose Relation</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_relation_text">&nbsp;</label>
                                    <input type="text" class="form-control" id="dependent_relation_text" name="dependent_relation_text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_birth_date">Birth Date</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="dependent_birth_date" name="dependent_birth_date" placeholder="Birth Date">
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
                                    <label for="dependent_gender">Gender</label>
                                    <select class="form-control" id="dependent_gender" name="dependent_gender">
                                      <option value="">Choose Gender</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_blood_type">Blood Type</label>
                                    <select class="form-control" id="dependent_blood_type" name="dependent_blood_type">
                                      <option value="">Choose Blood Type</option>
                                      <option value="A">A</option>
                                      <option value="AB">AB</option>
                                      <option value="B">B</option>
                                      <option value="O">O</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_family_card_number">Family Card Number</label>
                                    <input type="text" class="form-control" id="dependent_family_card_number" name="dependent_family_card_number" placeholder="Family Card Number">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dependent_occupation">Occupation</label>
                                    <input type="text" class="form-control" id="dependent_occupation" name="dependent_occupation" placeholder="Occupation">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="dependent_medical_claim" name="dependent_medical_claim">
                                    <label class="form-check-label" for="dependent_medical_claim">Medical Claim</label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="dependent_tax" name="dependent_tax">
                                    <label class="form-check-label" for="dependent_tax">Tax</label>
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

        $('#fringe_benefit_data_table thead tr').clone(true).appendTo('#fringe_benefit_data_table thead');
        $('#fringe_benefit_data_table thead tr:eq(1) th').each( function (i) {
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

        $('#dependent_data_table thead tr').clone(true).appendTo('#dependent_data_table thead');
        $('#dependent_data_table thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table
                    .column(i)
                    .search(this.value)
                    .draw();
                }
            });
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var target = e.target;

            if(target.id == "personal3-tab"){
                $('#fringe_benefit_data_table').DataTable().destroy();
                load_table_fringe_benefit();
            }else if(target.id == "dependent-tab"){
                $('#dependent_data_table').DataTable().destroy();
                load_table_dependent();
            }
        });

        $.get("{{ url('gender/api') }}", function( data ) {
            $.each(data, function(k, v){
                $('#gender').append("<option value=" + v.variable + ">" + v.value + "</option>");
            });    
        });

        $.get("{{ url('blood/api') }}", function( data ) {
            $.each(data, function(k, v){
                $('#blood_type').append("<option value=" + v.variable + ">" + v.value + "</option>");
            });    
        });

        $.get("{{ url('religion/api') }}", function( data ) {
            $.each(data, function(k, v){
                $('#religion').append("<option value=" + v.variable + ">" + v.value + "</option>");
            });    
        });

        $('#prefix_title_one, #prefix_title_two, #prefix_title_three, #suffix_title_one, #suffix_title_two, #suffix_title_three').inputpicker({
            url: "{{ url('personel/personal_data/prefix_title') }}",
            fields:[
            {name:'title_code',text:'Title Code'},
            {name:'description',text:'Description'},
            ],
            headShow: true,
            fieldText:'description',
            fieldValue:'title_code',
            filterOpen: true,
            autoOpen: true,
            pagination: true,
            urlDelay: 1,
            pageMode: '',
            pageField: 'p',
            pageLimitField: 'per_page',
            limit: 5,
            pageCurrent: 1,
        });

        function load_table_fringe_benefit() {
            table = $('#fringe_benefit_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('personel/personal_data/fringe_benefit/table') }}",
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                columns: [
                {data: 'seq_no', name: 'seq_no'},
                {data: 'benefits', name: 'benefits'},
                {data: 'description', name: 'description'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                ]
            });
        }

        function load_table_dependent() {
            table = $('#dependent_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "{{ url('personel/personal_data/dependent/table') }}",
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                columns: [
                {data: 'dependent_name', name: 'dependent_name'},
                {data: 'relation', name: 'relation'},
                {data: 'birth_date', name: 'birth_date'},
                {data: 'gender', name: 'gender'},
                {data: 'blood_type', name: 'blood_type'},
                {data: 'family_card_number', name: 'family_card_number'},
                {data: 'occupation', name: 'occupation'},
                {data: 'medical_claim', name: 'medical_claim'},
                {data: 'tax', name: 'tax'},
                ]
            });
        }   
    });
</script>

</html>