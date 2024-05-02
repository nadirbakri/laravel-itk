<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_competency.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
        rel="stylesheet" />
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/personel_detail_data.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.inputpicker.css') }}">
    <style type="text/css">
        .div-personel {
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

    </style>
</head>

<body>
    <div class="div-personel">
        <form id="employee_profile_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="div-profile">
                <div class="row div-row-profile">
                    <div class="col-2 subdiv-profile-image">
                        <!-- <img src="{{ isset($data[0]->photo) ? $photo : url('/pictures/profile-picture.png') }}"
                            alt="Profile"> -->
                        <img src="{{ url('/pictures/profile-picture.png') }}" alt="Profile">
                        <label class="btn btn-primary" id=""><i class="fa fa-edit"></i>
                            {{ __('personel_competency.btn_change_picture') }}
                            <input type="file" class="form-control" id="photo_profile" name="photo_profile" hidden>
                        </label>
                    </div>
                    <div class="col-9 subdiv-profile">
                        <p>{{ isset($data[0]->fullName) ? $data[0]->fullName : '-' }} &emsp; | &emsp;
                            {{ isset($data[0]->employeeNo) ? $data[0]->employeeNo : '-' }}</p>
                        <p class="small">{{ isset($data[0]->companyName) ? $data[0]->companyName : '-' }} &emsp; |
                            &emsp; {{ isset($data[0]->positionName) ? $data[0]->positionName : '-' }}</p>
                        <p class="small">
                            {{ isset($data[0]->companyEmailAddress) ? $data[0]->companyEmailAddress : '-' }} &emsp; |
                            &emsp; {{ isset($data[0]->personalHandphone) ? $data[0]->personalHandphone : '-' }}</p>
                    </div>
                </div>
            </div>
        </form>
        <div class="div-title">
            <a href="{{ url()->previous() }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_competency.list_detail') }}</span>
            </a>
        </div>

        <div class="div-form">
            <ul class="nav nav-tabs" id="tab-competency" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="formal-education-tab" data-toggle="tab" href="#formal_education_tab"
                        role="tab" aria-controls="formal-education"
                        aria-selected="true">{{ __('personel_competency.formal_education_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="language-tab" data-toggle="tab" href="#language_tab" role="tab"
                        aria-controls="language" aria-selected="false">{{ __('personel_competency.language_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization_tab" role="tab"
                        aria-controls="organization"
                        aria-selected="false">{{ __('personel_competency.organization_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="reference-tab" data-toggle="tab" href="#reference_tab" role="tab"
                        aria-controls="reference"
                        aria-selected="false">{{ __('personel_competency.reference_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="skill-tab" data-toggle="tab" href="#skill_tab" role="tab"
                        aria-controls="skill" aria-selected="false">{{ __('personel_competency.skill_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="project-experience-tab" data-toggle="tab" href="#project_experience_tab"
                        role="tab" aria-controls="skill"
                        aria-selected="false">{{ __('personel_competency.project_experience_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="training-list-tab" data-toggle="tab" href="#training_list_tab" role="tab"
                        aria-controls="skill"
                        aria-selected="false">{{ __('personel_competency.training_list_tab') }}</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-competency">
                <div class="tab-pane fade show active" id="formal_education_tab" role="tabpanel"
                    aria-labelledby="formal-education-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="formal_education_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Education</th>
                                        <th>Institution</th>
                                        <th>Major</th>
                                        <th>Education Status</th>
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
                            <button type="button" class="btn btn-primary" name="btn-add-formal-education"
                                id="btn-add-formal-education" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_formal_education">
                                <i class="fa fa-plus"></i> {{ __('personel_competency.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-formal-education"
                                id="btn-remove-formal-education" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_competency.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="language_tab" role="tabpanel" aria-labelledby="language-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="language_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Language</th>
                                        <th>Read</th>
                                        <th>Speak</th>
                                        <th>Write</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-language" id="btn-add-language"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_language">
                                <i class="fa fa-plus"></i> {{ __('personel_competency.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-language"
                                id="btn-remove-language" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_competency.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="organization_tab" role="tabpanel" aria-labelledby="organization-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="organization_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
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
                            <button type="button" class="btn btn-primary" name="btn-add-organization"
                                id="btn-add-organization" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_organization">
                                <i class="fa fa-plus"></i> {{ __('personel_competency.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-organization"
                                id="btn-remove-organization" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_competency.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="reference_tab" role="tabpanel" aria-labelledby="reference-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="reference_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
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
                            <button type="button" class="btn btn-primary" name="btn-add-reference"
                                id="btn-add-reference" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_reference">
                                <i class="fa fa-plus"></i> {{ __('personel_competency.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-reference"
                                id="btn-remove-reference" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_competency.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="skill_tab" role="tabpanel" aria-labelledby="skill-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="skill_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Skill</th>
                                        <th>Description</th>
                                        <th>Proficiency</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-skill" id="btn-add-skill"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_skill">
                                <i class="fa fa-plus"></i> {{ __('personel_competency.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-skill" id="btn-remove-skill"
                                style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_competency.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="project_experience_tab" role="tabpanel"
                    aria-labelledby="project-experience-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="project_experience_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Client</th>
                                        <th>Position</th>
                                        <th>Location</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-project-experience"
                                id="btn-add-project-experience" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_project_experience">
                                <i class="fa fa-plus"></i> {{ __('personel_competency.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-project-experience"
                                id="btn-remove-project-experience" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_competency.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="training_list_tab" role="tabpanel" aria-labelledby="training-list-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="training_list_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Training Name</th>
                                        <th>Organizer</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Certificate Name</th>
                                        <th>Certificate No</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-training-list"
                                id="btn-add-training-list" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_training_list">
                                <i class="fa fa-plus"></i> {{ __('personel_competency.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-training-list"
                                id="btn-remove-training-list" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_competency.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_formal_education"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_competency.title_modal_formal_education') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formal_education_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no_formal_education">{{ __('personel_competency.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_formal_education"
                                        name="seq_no_formal_education"
                                        placeholder="{{ __('personel_competency.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_formal_education"
                                    name="employee_no_formal_education" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="education">{{ __('personel_competency.label_education') }}</label>
                                    <select class="form-control" id="education" name="education">
                                        <option value="">{{ __('personel_competency.label_select_education') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="institution">{{ __('personel_competency.label_institution') }}</label>
                                    <select class="form-control select2" id="institution" name="institution"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="major">{{ __('personel_competency.label_major') }}</label>
                                    <select class="form-control select2" id="major" name="major"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="education_status">{{ __('personel_competency.label_education_status') }}</label>
                                    <select class="form-control" id="education_status" name="education_status">
                                        <option value="">{{ __('personel_competency.label_select_education_status') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="graduate_year">{{ __('personel_competency.label_graduate_year') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="graduate_year" name="graduate_year"
                                            placeholder="{{ __('personel_competency.label_graduate_year') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">{{ __('personel_competency.label_title') }}</label>
                                    <select class="form-control select2" id="title" name="title"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="city">{{ __('personel_competency.label_city') }}</label>
                                    <select class="form-control select2" id="city" name="city"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gpa">{{ __('personel_competency.label_gpa') }}</label>
                                    <input type="text" class="form-control" id="gpa" name="gpa"
                                        placeholder="{{ __('personel_competency.label_gpa') }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-formal-education" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_competency.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_competency.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_language"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_competency.title_modal_language') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="language_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no_language">{{ __('personel_competency.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_language" name="seq_no_language"
                                        placeholder="{{ __('personel_competency.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_language"
                                    name="employee_no_language" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="language">{{ __('personel_competency.label_language') }}</label>
                                    <select class="form-control" id="language" name="language">
                                        <option value="">{{ __('personel_competency.label_select_language') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="read">{{ __('personel_competency.label_read') }}</label>
                                    <select class="form-control" id="read" name="read">
                                        <option value="">{{ __('personel_competency.label_select_read') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="speak">{{ __('personel_competency.label_speak') }}</label>
                                    <select class="form-control" id="speak" name="speak">
                                        <option value="">{{ __('personel_competency.label_select_speak') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="write">{{ __('personel_competency.label_write') }}</label>
                                    <select class="form-control" id="write" name="write">
                                        <option value="">{{ __('personel_competency.label_select_write') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-language" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_competency.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_competency.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_organization" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_competency.title_modal_organization') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="organization_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no_organization">{{ __('personel_competency.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_organization"
                                        name="seq_no_organization"
                                        placeholder="{{ __('personel_competency.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_organization"
                                    name="employee_no_organization" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="organization_name">{{ __('personel_competency.label_organization_name') }}</label>
                                    <input type="text" class="form-control" id="organization_name"
                                        name="organization_name"
                                        placeholder="{{ __('personel_competency.label_organization_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="position_organization">{{ __('personel_competency.label_position') }}</label>
                                    <input type="text" class="form-control" id="position_organization"
                                        name="position_organization"
                                        placeholder="{{ __('personel_competency.label_position') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="organization_start_date">{{ __('personel_competency.label_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="organization_start_date"
                                            name="organization_start_date"
                                            placeholder="{{ __('personel_competency.label_start_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="organization_end_date">{{ __('personel_competency.label_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="organization_end_date"
                                            name="organization_end_date"
                                            placeholder="{{ __('personel_competency.label_end_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" id="btn-save-organization" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_competency.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_competency.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_reference"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_competency.title_modal_reference') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reference_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no_reference">{{ __('personel_competency.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_reference"
                                        name="seq_no_reference"
                                        placeholder="{{ __('personel_competency.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_reference"
                                    name="employee_no_reference" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="reference_name">{{ __('personel_competency.label_reference_name') }}</label>
                                    <input type="text" class="form-control" id="reference_name" name="reference_name"
                                        placeholder="{{ __('personel_competency.label_reference_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="phone_number">{{ __('personel_competency.label_phone_number') }}</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        placeholder="{{ __('personel_competency.label_phone_number') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="company_name">{{ __('personel_competency.label_company_name') }}</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        placeholder="{{ __('personel_competency.label_company_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="remarks_reference">{{ __('personel_competency.label_remarks') }}</label>
                                    <input type="text" class="form-control" id="remarks_reference"
                                        name="remarks_reference"
                                        placeholder="{{ __('personel_competency.label_remarks') }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-reference" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_competency.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_competency.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_skill"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_competency.title_modal_skill') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="skill_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no_skill">{{ __('personel_competency.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_skill" name="seq_no_skill"
                                        placeholder="{{ __('personel_competency.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_skill"
                                    name="employee_no_skill" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="skill">{{ __('personel_competency.label_skill') }}</label>
                                    <select class="form-control select2" id="skill" name="skill"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="description_skill">{{ __('personel_competency.label_description') }}</label>
                                    <input type="text" class="form-control" id="description_skill"
                                        name="description_skill"
                                        placeholder="{{ __('personel_competency.label_description') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="proficiency">{{ __('personel_competency.label_proficiency') }}</label>
                                    <select class="form-control" id="proficiency" name="proficiency">
                                        <option value="">{{ __('personel_competency.label_select_proficiency') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-skill" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_competency.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_competency.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_project_experience" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_competency.title_modal_project_experience') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="project_experience_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no_project_experience">{{ __('personel_competency.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_project_experience"
                                        name="seq_no_project_experience"
                                        placeholder="{{ __('personel_competency.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_project_experience"
                                    name="employee_no_project_experience" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="client">{{ __('personel_competency.label_client') }}</label>
                                    <input type="text" class="form-control" id="client" name="client"
                                        placeholder="{{ __('personel_competency.label_client') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="position_project_experience">{{ __('personel_competency.label_position') }}</label>
                                    <input type="text" class="form-control" id="position_project_experience"
                                        name="position_project_experience"
                                        placeholder="{{ __('personel_competency.label_position') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="location">{{ __('personel_competency.label_location') }}</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="{{ __('personel_competency.label_location') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="description_project_experience">{{ __('personel_competency.label_description') }}</label>
                                    <input type="text" class="form-control" id="description_project_experience"
                                        name="description_project_experience"
                                        placeholder="{{ __('personel_competency.label_description') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="project_experience_start_date">{{ __('personel_competency.label_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="project_experience_start_date"
                                            name="project_experience_start_date"
                                            placeholder="{{ __('personel_competency.label_start_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="project_experience_end_date">{{ __('personel_competency.label_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="project_experience_end_date"
                                            name="project_experience_end_date"
                                            placeholder="{{ __('personel_competency.label_end_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-project-experience" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_competency.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_competency.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_training_list" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_competency.title_modal_training_list') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="training_list_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no_training_list">{{ __('personel_competency.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_training_list"
                                        name="seq_no_training_list"
                                        placeholder="{{ __('personel_competency.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_training_list"
                                    name="employee_no_training_list" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="training_name">{{ __('personel_competency.label_training_name') }}</label>
                                    <input type="text" class="form-control" id="training_name" name="training_name"
                                        placeholder="{{ __('personel_competency.label_training_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="organizer">{{ __('personel_competency.label_organizer') }}</label>
                                    <input type="text" class="form-control" id="organizer" name="organizer"
                                        placeholder="{{ __('personel_competency.label_organizer') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="training_list_start_date">{{ __('personel_competency.label_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="training_list_start_date"
                                            name="training_list_start_date"
                                            placeholder="{{ __('personel_competency.label_start_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="training_list_end_date">{{ __('personel_competency.label_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="training_list_end_date"
                                            name="training_list_end_date"
                                            placeholder="{{ __('personel_competency.label_end_date') }}">
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
                                    <label
                                        for="certificate_name">{{ __('personel_competency.label_certificate_name') }}</label>
                                    <input type="text" class="form-control" id="certificate_name"
                                        name="certificate_name"
                                        placeholder="{{ __('personel_competency.label_certificate_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="certificate_no">{{ __('personel_competency.label_certificate_no') }}</label>
                                    <input type="text" class="form-control" id="certificate_no" name="certificate_no"
                                        placeholder="{{ __('personel_competency.label_certificate_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="certificate_date">{{ __('personel_competency.label_certificate_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="certificate_date"
                                            name="certificate_date"
                                            placeholder="{{ __('personel_competency.label_certificate_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="expired_date">{{ __('personel_competency.label_expired_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="expired_date" name="expired_date"
                                            placeholder="{{ __('personel_competency.label_expired_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="certificate_description">{{ __('personel_competency.label_certificate_description') }}</label>
                                    <textarea rows="3" class="form-control" id="certificate_description"
                                        name="certificate_description"
                                        placeholder="{{ __('personel_competency.label_certificate_description') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="certificate_attachment">{{ __('personel_competency.label_certificate_attachment') }}</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="certificate_attachment"
                                            id="certificate_attachment">
                                        <label class="custom-file-label" for="certificate_attachment">Choose
                                            file</label>
                                    </div>
                                    <small id="certificate_attachment_help" class="text-muted">
                                        {{ __('personel_competency.help_certificate_attachment') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-training-list" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_competency.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_competency.btn_cancel') }}</button>
                </div>
                </form>
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
                        <span class="title-text-notification">{{ __('personel_competency.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success_detail">
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
                        <span class="title-text-notification">{{ __('personel_competency.alert_success') }}</span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success-detail"></span>
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
<script src="{{ asset('js/jquery.redirect.js') }}""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        // $('.input-group input').flatpickr({
        //     altInput: true,
        //     allowInput: true,
        //     altFormat: "j-M-y",
        //     dateFormat: "Y-m-d",
        //     defaultDate: "today",
        //     onReady: function () {
        //         var flatPickrInstance = this;
        //         var $flatPickrInput = $(flatPickrInstance.element);
        //         $flatPickrInput.siblings(".input-group-prepend").click(function () {
        //             flatPickrInstance.toggle();
        //         });
        //     },
        //     onChange: function(selectedDates, dateStr, instance) {
        //         // console.log(dateStr);
        //         if (!/Invalid|NaN/.test(new Date(value))) {
        //             return new Date(value) > new Date($(params).val());
        //         }

        //         // return isNaN(value) && isNaN($(params).val()) 
        //         //     || (Number(value) > Number($(params).val()));
        //     },
        // });

        $('#organization_start_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        $('#organization_end_date').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            },
            onChange: function(selectedDates, dateStr, instance) {
                // console.log(new Date(dateStr) > new Date($('#organization_start_date').val()));
                // if (!/Invalid|NaN/.test(new Date(dateStr))) {
                //     return new Date(dateStr) > new Date($('#organization_start_date').val());
                // }

                // return isNaN(dateStr) && isNaN($('#organization_start_date').val()) 
                //     || (Number(dateStr) > Number($('#organization_start_date').val()));

                jQuery.validator.addMethod("greaterThan", 
                function(value, element, params) {
                    if (!/Invalid|NaN/.test(new Date(dateStr))) {
                        return new Date(dateStr) > new Date($('#organization_start_date').val());
                    }

                    return isNaN(dateStr) && isNaN($('#organization_start_date').val()) 
                        || (Number(dateStr) > Number($('#organization_start_date').val()));
                },'Must be greater than {0}.');

                $("#myform").validate().element("#organization_end_date");
            },
        });

        $('.input-group #graduate_year').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            plugins: [
                new monthSelectPlugin({
                    shorthand: true, //defaults to false
                    dateFormat: "Y-01-01", //defaults to "F Y"
                    altFormat: "Y", //defaults to "F Y"
                })
            ],
            onReady: function () {
                var flatPickrInstance = this;
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

    }

</script>

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURLTwo')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURLTwo', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURLTwo');

        sessionStorage.removeItem('previousURLTwo');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        var table = null;
        var target = $('.nav-tabs a.nav-link.active').attr('href');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        load_table_formal_education('{{ $data[0]->employeeNo }}');

        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            target = $(e.target).attr('href');
            if (target == '#formal_education_tab') {
                $('#formal_education_data_table').DataTable().destroy();
                load_table_formal_education('{{ $data[0]->employeeNo }}');
            } else if (target == '#language_tab') {
                $('#language_data_table').DataTable().destroy();
                load_table_language('{{ $data[0]->employeeNo }}');
            } else if (target == '#organization_tab') {
                $('#organization_data_table').DataTable().destroy();
                load_table_organization('{{ $data[0]->employeeNo }}');
            } else if (target == '#reference_tab') {
                $('#reference_data_table').DataTable().destroy();
                load_table_reference('{{ $data[0]->employeeNo }}');
            } else if (target == '#skill_tab') {
                $('#skill_data_table').DataTable().destroy();
                load_table_skill('{{ $data[0]->employeeNo }}');
            } else if (target == '#project_experience_tab') {
                $('#project_experience_data_table').DataTable().destroy();
                load_table_project_experience('{{ $data[0]->employeeNo }}');
            } else if (target == '#training_list_tab') {
                $('#training_list_data_table').DataTable().destroy();
                load_table_training_list('{{ $data[0]->employeeNo }}');
            }
        });

        $('#formal_education_data_table thead tr').clone(true).appendTo('#formal_education_data_table thead');
        $('#formal_education_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#language_data_table thead tr').clone(true).appendTo('#language_data_table thead');
        $('#language_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#organization_data_table thead tr').clone(true).appendTo('#organization_data_table thead');
        $('#organization_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#reference_data_table thead tr').clone(true).appendTo('#reference_data_table thead');
        $('#reference_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#skill_data_table thead tr').clone(true).appendTo('#skill_data_table thead');
        $('#skill_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#project_experience_data_table thead tr').clone(true).appendTo(
            '#project_experience_data_table thead');
        $('#project_experience_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#training_list_data_table thead tr').clone(true).appendTo('#training_list_data_table thead');
        $('#training_list_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="' + title + '" />');

            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            });
        });

        function load_table_formal_education(employeeNo = '') {
            table = $('#formal_education_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/competency/formal_education/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'seqNo',
                        name: 'seqNo'
                    },
                    {
                        data: 'educationName',
                        name: 'educationName'
                    },
                    {
                        data: 'institutionName',
                        name: 'institutionName'
                    },
                    {
                        data: 'majorName',
                        name: 'majorName'
                    },
                    {
                        data: 'educationStatus',
                        name: 'educationStatus'
                    },
                    {
                        data: 'graduateYear',
                        name: 'graduateYear'
                    },
                    {
                        data: 'titleName',
                        name: 'titleName'
                    },
                    {
                        data: 'cityName',
                        name: 'cityName'
                    },
                    {
                        data: 'educationGPA',
                        name: 'educationGPA'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#formal_education_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#formal_education_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_language(employeeNo = '') {
            table = $('#language_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/competency/language/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'seqNo',
                        name: 'seqNo'
                    },
                    {
                        data: 'languageName',
                        name: 'languageName'
                    },
                    {
                        data: 'readValue',
                        name: 'readValue'
                    },
                    {
                        data: 'speakValue',
                        name: 'speakValue'
                    },
                    {
                        data: 'writeValue',
                        name: 'writeValue'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#language_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#language_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_organization(employeeNo = '') {
            table = $('#organization_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/competency/organization/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'seqNo',
                        name: 'seqNo'
                    },
                    {
                        data: 'organizationName',
                        name: 'organizationName'
                    },
                    {
                        data: 'position',
                        name: 'position'
                    },
                    {
                        data: 'startDate',
                        name: 'startDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'endDate',
                        name: 'endDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#organization_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#organization_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_reference(employeeNo = '') {
            table = $('#reference_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/competency/reference/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'seqNo',
                        name: 'seqNo'
                    },
                    {
                        data: 'referenceName',
                        name: 'referenceName'
                    },
                    {
                        data: 'phoneNo',
                        name: 'phoneNo'
                    },
                    {
                        data: 'companyName',
                        name: 'companyName'
                    },
                    {
                        data: 'remarks',
                        name: 'remarks'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#reference_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#reference_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_skill(employeeNo = '') {
            table = $('#skill_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/competency/skill/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'seqNo',
                        name: 'seqNo'
                    },
                    {
                        data: 'skillName',
                        name: 'skillName'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'proficiencyLevel',
                        name: 'proficiencyLevel'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#skill_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#skill_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_project_experience(employeeNo = '') {
            table = $('#project_experience_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/competency/project_experience/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'seqNo',
                        name: 'seqNo'
                    },
                    {
                        data: 'client',
                        name: 'client'
                    },
                    {
                        data: 'position',
                        name: 'position'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'startDate',
                        name: 'startDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'endDate',
                        name: 'endDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'description',
                        name: 'description'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#project_experience_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#project_experience_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_training_list(employeeNo = '') {
            table = $('#training_list_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/competency/training_list/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [{
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {
                        data: 'seqNo',
                        name: 'seqNo'
                    },
                    {
                        data: 'trainingName',
                        name: 'trainingName'
                    },
                    {
                        data: 'organizer',
                        name: 'organizer'
                    },
                    {
                        data: 'startDate',
                        name: 'startDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'endDate',
                        name: 'endDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'certificateName',
                        name: 'certificateName'
                    },
                    {
                        data: 'certificateNo',
                        name: 'certificateNo'
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#training_list_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#training_list_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#formal_education_data_table, #language_data_table, #organization_data_table, #reference_data_table, #skill_data_table, #project_experience_data_table, #training_list_data_table').on('click', 'tbody input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#formal_education_data_table, #language_data_table, #organization_data_table, #reference_data_table, #skill_data_table, #project_experience_data_table, #training_list_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#photo_profile').change(function (e) {
            var fileExtension = ['jpeg', 'jpg', 'png'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Only formats are allowed : " + fileExtension.join(', '));
            } else {
                $('#employee_profile_form').submit();
            }
        });

        $('#certificate_attachment').change(function (e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });

        $.get("{{ url('proficiency/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#proficiency').append("<option value=" + v.comGenCode + ">" + v
                    .value +
                    "</option>");
                $('#read').append("<option value=" + v.comGenCode + ">" + v.value +
                    "</option>");
                $('#speak').append("<option value=" + v.comGenCode + ">" + v.value +
                    "</option>");
                $('#write').append("<option value=" + v.comGenCode + ">" + v.value +
                    "</option>");
            });
        });

        $.get("{{ url('education/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#education').append("<option value=" + v.comGenCode + ">" + v
                    .value + "</option>");
            });
        });

        $.get("{{ url('education_status/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#education_status').append("<option value=" + v.comGenCode +
                    ">" + v
                    .value + "</option>");
            });
        });

        $.get("{{ url('language/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#language').append("<option value=" + v.comGenCode + ">" + v
                    .value + "</option>");
            });
        });

        loadDataInstitution();
        loadDataMajor();
        loadDataTitle();
        loadDataCity();
        loadDataSkill();

        $('#modal_add_formal_education').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeEducation/getPeEducation',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_formal_education').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_language').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeLanguage/getPeLanguage',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_language').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_organization').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeOrganization/getPeOrganization',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_organization').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_reference').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeReference/getPeReference',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_reference').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_skill').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeSkill/getPeSkill',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_skill').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_project_experience').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeProjectExperience/getPeProjectExperience',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_project_experience').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_training_list').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/personel/PeTraining/getPeTraining',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_training_list').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $("#btn-remove-formal-education").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/competency/formal_education/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#formal_education_data_table').DataTable().destroy();
                            load_table_formal_education(data[0].employeeNo);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-language").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/competency/language/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#language_data_table').DataTable().destroy();
                            load_table_language(data[0].employeeNo);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-organization").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/competency/organization/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#organization_data_table').DataTable().destroy();
                            load_table_organization(data[0].employeeNo);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-reference").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/competency/reference/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#reference_data_table').DataTable().destroy();
                            load_table_reference(data[0].employeeNo);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-skill").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/competency/skill/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#skill_data_table').DataTable().destroy();
                            load_table_skill(data[0].employeeNo);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-project-experience").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/competency/project_experience/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#project_experience_data_table').DataTable().destroy();
                            load_table_project_experience(data[0].employeeNo);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-training-list").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/competency/training_list/remove') }}",
                    type: "POST",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#training_list_data_table').DataTable().destroy();
                            load_table_training_list(data[0].employeeNo);
                            setTimeout(function () {
                                $('#notification_success_detail').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "{{ __('login.error') }}");
                            } else {
                                $('#message-notification-error').html(response.message);
                            }
                        }
                    },
                    error: function (response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        function loadDataInstitution() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.institutionCode + '</div>' +
                        '<div class="col-6">' + data.data.institutionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#institution').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Institution Code</b></div>' +
                        '<div class="col-6"><b>Institution Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#institution').select2({
                width: '100%',
                placeholder: 'Choose Institution',
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
                    url: "{{ url('/institution/api') }}",
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
                                    text: item.institutionName,
                                    id: item.institutionCode,
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

        function loadDataMajor() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.majorCode + '</div>' +
                        '<div class="col-6">' + data.data.majorName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#major').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Major Code</b></div>' +
                        '<div class="col-6"><b>Major Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#major').select2({
                width: '100%',
                placeholder: 'Choose Major',
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
                    url: "{{ url('/major/api') }}",
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
                                    text: item.majorName,
                                    id: item.majorCode,
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

        function loadDataTitle() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.titleCode + '</div>' +
                        '<div class="col-6">' + data.data.titleName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#title').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Title Code</b></div>' +
                        '<div class="col-6"><b>Title Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#title').select2({
                width: '100%',
                placeholder: 'Choose Title',
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
                    url: "{{ url('/title/api') }}",
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
                                    text: item.titleName,
                                    id: item.titleCode,
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

        function loadDataCity() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.cityCode + '</div>' +
                        '<div class="col-6">' + data.data.cityName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#city').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>City Code</b></div>' +
                        '<div class="col-6"><b>City Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#city').select2({
                width: '100%',
                placeholder: 'Choose City',
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
                    url: "{{ url('/city/api') }}",
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
                                    text: item.cityName,
                                    id: item.cityCode,
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

        function loadDataSkill() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.skillCode + '</div>' +
                        '<div class="col-6">' + data.data.skillName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#skill').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Skill Code</b></div>' +
                        '<div class="col-6"><b>Skill Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#skill').select2({
                width: '100%',
                placeholder: 'Choose Skill',
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
                    url: "{{ url('/skill/api') }}",
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
                                    text: item.skillName,
                                    id: item.skillCode,
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

        $("#btn-save-formal-education").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#formal_education_form").submit();
        });

        $("#btn-save-language").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#language_form").submit();
        });

        $("#btn-save-organization").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#organization_form").submit();
        });

        $("#btn-save-reference").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#reference_form").submit();
        });

        $("#btn-save-skill").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#skill_form").submit();
        });

        $("#btn-save-project-experience").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#project_experience_form").submit();
        });

        $("#btn-save-training-list").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#training_list_form").submit();
        });

        jQuery.validator.addMethod("greaterThan", 
            function(value, element, params) {

                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) > new Date($(params).val());
                }

                return isNaN(value) && isNaN($(params).val()) 
                    || (Number(value) > Number($(params).val())); 
            },'Must be greater than {0}.');

        if ($("#employee_profile_form").length > 0) {
            $("#employee_profile_form").validate({
                rules: {
                    photo_profile: {
                        extension: "jpg|jpeg|png",
                    },
                },
                messages: {
                    photo_profile: {
                        extension: "{{ __('personel_performance.photo_profile_extension') }}",
                    },
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                    alert(error.html());
                },
                showErrors: function (errorMap, errorList) {
                    this.defaultShowErrors();
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var myform = document.getElementById("employee_profile_form");
                    var formdata = new FormData(myform);

                    $.ajax({
                        url: "{{ url('personnel/employee/photo/proses') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response.status == "true") {
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "{{ url('personnel/competency') }}";
                                }, 3000);
                            } else {
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
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#formal_education_form").length > 0) {
            $("#formal_education_form").validate({
                rules: {
                    seq_no_formal_education: {
                        required: true,
                    },
                    education: {
                        required: true,
                    },
                    institution: {
                        required: true,
                    },
                    major: {
                        required: true,
                    },
                    education_status: {
                        required: true,
                    },
                    graduate_year: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    gpa: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_formal_education: {
                        required: "{{ __('personel_competency.seq_no_required') }}",
                    },
                    education: {
                        required: "{{ __('personel_competency.education_required') }}",
                    },
                    institution: {
                        required: "{{ __('personel_competency.institution_required') }}",
                    },
                    major: {
                        required: "{{ __('personel_competency.major_required') }}",
                    },
                    education_status: {
                        required: "{{ __('personel_competency.education_status_required') }}",
                    },
                    graduate_year: {
                        required: "{{ __('personel_competency.graduate_year_required') }}",
                    },
                    title: {
                        required: "{{ __('personel_competency.title_required') }}",
                    },
                    city: {
                        required: "{{ __('personel_competency.city_required') }}",
                    },
                    gpa: {
                        required: "{{ __('personel_competency.gpa_required') }}",
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
                    $("#btn-save-formal-education").prop("disabled", false);
                    $("#btn-save-formal-education").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                        url: "{{ url('personnel/competency/formal_education/proses') }}",
                        type: "POST",
                        data: $('#formal_education_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-formal-education").prop("disabled", false);
                                $("#btn-save-formal-education").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                                );

                                $('#modal_add_formal_education').modal('hide');
                                $('#formal_education_data_table').DataTable().destroy();
                                load_table_formal_education(
                                    '{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-formal-education").prop("disabled", false);
                                $("#btn-save-formal-education").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                            $("#btn-save-formal-education").prop("disabled", false);
                            $("#btn-save-formal-education").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#language_form").length > 0) {
            $("#language_form").validate({
                rules: {
                    seq_no_language: {
                        required: true,
                    },
                    language: {
                        required: true,
                    },
                    read: {
                        required: true,
                    },
                    speak: {
                        required: true,
                    },
                    write: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_language: {
                        required: "{{ __('personel_competency.seq_no_required') }}",
                    },
                    language: {
                        required: "{{ __('personel_competency.language_required') }}",
                    },
                    read: {
                        required: "{{ __('personel_competency.read_required') }}",
                    },
                    speak: {
                        required: "{{ __('personel_competency.speak_required') }}",
                    },
                    write: {
                        required: "{{ __('personel_competency.write_required') }}",
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
                    $("#btn-save-language").prop("disabled", false);
                    $("#btn-save-language").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                        url: "{{ url('personnel/competency/language/proses') }}",
                        type: "POST",
                        data: $('#language_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-language").prop("disabled", false);
                                $("#btn-save-language").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                                );

                                $('#modal_add_language').modal('hide');
                                $('#language_data_table').DataTable().destroy();
                                load_table_language('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-language").prop("disabled", false);
                                $("#btn-save-language").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                            $("#btn-save-language").prop("disabled", false);
                            $("#btn-save-language").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#organization_form").length > 0) {
            $("#organization_form").validate({
                rules: {
                    seq_no_organization: {
                        required: true,
                    },
                    organization_name: {
                        required: true,
                    },
                    position_organization: {
                        required: true,
                    },
                    organization_start_date: {
                        required: true,
                    },
                    organization_end_date: {
                        greaterThan: "#organization_start_date",
                        required: true,
                    },
                },
                messages: {
                    seq_no_organization: {
                        required: "{{ __('personel_competency.seq_no_required') }}",
                    },
                    organization_name: {
                        required: "{{ __('personel_competency.organization_name_required') }}",
                    },
                    position_organization: {
                        required: "{{ __('personel_competency.position_required') }}",
                    },
                    organization_start_date: {
                        required: "{{ __('personel_competency.start_date_required') }}",
                    },
                    organization_end_date: {
                        required: "{{ __('personel_competency.end_date_required') }}",
                        greaterThan: "A",
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
                    $("#btn-save-organization").prop("disabled", false);
                    $("#btn-save-organization").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                        url: "{{ url('personnel/competency/organization/proses') }}",
                        type: "POST",
                        data: $('#organization_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-organization").prop("disabled", false);
                                $("#btn-save-organization").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                                );

                                $('#modal_add_organization').modal('hide');
                                $('#organization_data_table').DataTable().destroy();
                                load_table_organization('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-organization").prop("disabled", false);
                                $("#btn-save-organization").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                            $("#btn-save-organization").prop("disabled", false);
                            $("#btn-save-organization").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#reference_form").length > 0) {
            $("#reference_form").validate({
                rules: {
                    seq_no_reference: {
                        required: true,
                    },
                    reference_name: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                    },
                    company_name: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_reference: {
                        required: "{{ __('personel_competency.seq_no_required') }}",
                    },
                    reference_name: {
                        required: "{{ __('personel_competency.reference_name_required') }}",
                    },
                    phone_number: {
                        required: "{{ __('personel_competency.phone_number_required') }}",
                    },
                    company_name: {
                        required: "{{ __('personel_competency.company_name_required') }}",
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
                    $("#btn-save-reference").prop("disabled", false);
                    $("#btn-save-reference").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                        url: "{{ url('personnel/competency/reference/proses') }}",
                        type: "POST",
                        data: $('#reference_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-reference").prop("disabled", false);
                                $("#btn-save-reference").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                                );

                                $('#modal_add_reference').modal('hide');
                                $('#reference_data_table').DataTable().destroy();
                                load_table_reference('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-reference").prop("disabled", false);
                                $("#btn-save-reference").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                            $("#btn-save-reference").prop("disabled", false);
                            $("#btn-save-reference").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#skill_form").length > 0) {
            $("#skill_form").validate({
                rules: {
                    seq_no_skill: {
                        required: true,
                    },
                    skill: {
                        required: true,
                    },
                    proficiency: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_skill: {
                        required: "{{ __('personel_competency.seq_no_required') }}",
                    },
                    skill: {
                        required: "{{ __('personel_competency.skill_required') }}",
                    },
                    proficiency: {
                        required: "{{ __('personel_competency.proficiency_required') }}",
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
                    $("#btn-save-skill").prop("disabled", false);
                    $("#btn-save-skill").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                        url: "{{ url('personnel/competency/skill/proses') }}",
                        type: "POST",
                        data: $('#skill_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-skill").prop("disabled", false);
                                $("#btn-save-skill").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                                );

                                $('#modal_add_skill').modal('hide');
                                $('#skill_data_table').DataTable().destroy();
                                load_table_skill('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-skill").prop("disabled", false);
                                $("#btn-save-skill").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                            $("#btn-save-skill").prop("disabled", false);
                            $("#btn-save-skill").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#project_experience_form").length > 0) {
            $("#project_experience_form").validate({
                rules: {
                    seq_no_project_experience: {
                        required: true,
                    },
                    client: {
                        required: true,
                    },
                    position_project_experience: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    project_experience_start_date: {
                        required: true,
                    },
                    project_experience_end_date: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_project_experience: {
                        required: "{{ __('personel_competency.seq_no_required') }}",
                    },
                    client: {
                        required: "{{ __('personel_competency.client_required') }}",
                    },
                    position_project_experience: {
                        required: "{{ __('personel_competency.position_required') }}",
                    },
                    location: {
                        required: "{{ __('personel_competency.location_required') }}",
                    },
                    project_experience_start_date: {
                        required: "{{ __('personel_competency.start_date_required') }}",
                    },
                    project_experience_end_date: {
                        required: "{{ __('personel_competency.end_date_required') }}",
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
                    $("#btn-save-project-experience").prop("disabled", false);
                    $("#btn-save-project-experience").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                        url: "{{ url('personnel/competency/project_experience/proses') }}",
                        type: "POST",
                        data: $('#project_experience_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-project-experience").prop("disabled",
                                    false);
                                $("#btn-save-project-experience").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                                );
                                $('#modal_add_project_experience').modal('hide');
                                $('#project_experience_data_table').DataTable()
                                    .destroy();
                                load_table_project_experience(
                                    '{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-project-experience").prop("disabled",
                                    false);
                                $("#btn-save-project-experience").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                            $("#btn-save-project-experience").prop("disabled", false);
                            $("#btn-save-project-experience").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                            );
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#training_list_form").length > 0) {
            $("#training_list_form").validate({
                rules: {
                    seq_no_training_list: {
                        required: true,
                    },
                    training_name: {
                        required: true,
                    },
                    organizer: {
                        required: true,
                    },
                    training_list_start_date: {
                        required: true,
                    },
                    training_list_end_date: {
                        required: true,
                    },
                    certificate_name: {
                        required: true,
                    },
                    certificate_no: {
                        required: true,
                    },
                    certificate_date: {
                        required: true,
                    },
                    expired_date: {
                        required: true,
                    },
                    certificate_attachment: {
                        extension: "jpg|jpeg|pdf",
                    },
                },
                messages: {
                    seq_no_training_list: {
                        required: "{{ __('personel_competency.seq_no_required') }}",
                    },
                    training_name: {
                        required: "{{ __('personel_competency.training_name_required') }}",
                    },
                    organizer: {
                        required: "{{ __('personel_competency.organizer_required') }}",
                    },
                    training_list_start_date: {
                        required: "{{ __('personel_competency.start_date_required') }}",
                    },
                    training_list_end_date: {
                        required: "{{ __('personel_competency.end_date_required') }}",
                    },
                    certificate_name: {
                        required: "{{ __('personel_competency.certificate_name_required') }}",
                    },
                    certificate_no: {
                        required: "{{ __('personel_competency.certificate_no_required') }}",
                    },
                    certificate_date: {
                        required: "{{ __('personel_competency.certificate_date_required') }}",
                    },
                    expired_date: {
                        required: "{{ __('personel_competency.expired_date_required') }}",
                    },
                    certificate_attachment: {
                        extension: "{{ __('personel_competency.certificate_attachment_extension') }}",
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
                    $("#btn-save-training-list").prop("disabled", false);
                    $("#btn-save-training-list").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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

                    var myform = document.getElementById("training_list_form");
                    var formdata = new FormData(myform);


                    $.ajax({
                        url: "{{ url('personnel/competency/training_list/proses') }}",
                        type: "POST",
                        processData: false,
                        contentType: false,
                        data: formdata,
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-training-list").prop("disabled", false);
                                $("#btn-save-training-list").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                                );

                                $('#modal_add_training_list').modal('hide');
                                $('#training_list_data_table').DataTable().destroy();
                                load_table_training_list('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-training-list").prop("disabled", false);
                                $("#btn-save-training-list").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
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
                            $("#btn-save-training-list").prop("disabled", false);
                            $("#btn-save-training-list").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_competency.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }
    });

</script>

</html>
