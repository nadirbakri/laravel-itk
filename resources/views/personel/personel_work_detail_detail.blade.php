<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_work_detail.judul') }}</title>
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
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 5px;
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
                        <img src="{{ '../../photo_profile/' . $photo }}" alt="Profile" class="photo rounded-circle" id="photo" name="photo">
                        <label class="btn btn-primary" id=""><i class="fa fa-edit"></i>
                            {{ __('personel_work_detail.btn_change_picture') }}
                            <input type="file" class="form-control" id="photo_profile" name="photo_profile" value="true" hidden>
                            <textarea name="photo_employee" id="photo_employee" cols="30" rows="10" hidden></textarea>
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
            <a href="{{ url('personnel/work_detail') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_work_detail.list_detail') }}</span>
            </a>
        </div>

        <div class="div-form">
            <ul class="nav nav-tabs" id="tab-work-detail" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="job-history-tab" data-toggle="tab" href="#job_history_tab" role="tab"
                        aria-controls="job-history"
                        aria-selected="true">{{ __('personel_work_detail.job_history_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="work-experience-tab" data-toggle="tab" href="#work_experience_tab"
                        role="tab" aria-controls="work-experience"
                        aria-selected="false">{{ __('personel_work_detail.work_experience_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="free-format-field-tab" data-toggle="tab" href="#free_format_field_tab"
                        role="tab" aria-controls="free-format-field"
                        aria-selected="false">{{ __('personel_work_detail.free_format_field_tab') }}</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-work-detail">
                <div class="tab-pane fade show active" id="job_history_tab" role="tabpanel"
                    aria-labelledby="job_history-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="job_history_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Company</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Employment Status</th>
                                        <th>Position</th>
                                        <th>Ranking</th>
                                        <th style="width: 20%;" id="div-table-level"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-warning" name="btn-edit-job-history"
                                id="btn-edit-job-history" style="width: 100%;">
                                <i class="fa fa-edit"></i> {{ __('personel_work_detail.btn_edit') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="work_experience_tab" role="tabpanel"
                    aria-labelledby="work-experience-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="work_experience_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Company</th>
                                        <th>Join Date</th>
                                        <th>Terminate Date</th>
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
                            <button type="button" class="btn btn-primary" name="btn-add-work-experience"
                                id="btn-add-work-experience" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_work_experience">
                                <i class="fa fa-plus"></i> {{ __('personel_work_detail.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-work-experience"
                                id="btn-remove-work-experience" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_work_detail.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="free_format_field_tab" role="tabpanel"
                    aria-labelledby="free-format-field-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="free_format_field_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Format Code</th>
                                        <th>Description</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-free-format-field"
                                id="btn-add-free-format-field" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_free_format_field">
                                <i class="fa fa-plus"></i> {{ __('personel_work_detail.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-free-format-field"
                                id="btn-remove-free-format-field" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_work_detail.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_job_history"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_work_detail.title_modal_job_history') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="job_history_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="seq_no_job_history">{{ __('personel_work_detail.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_job_history"
                                        name="seq_no_job_history"
                                        placeholder="{{ __('personel_work_detail.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_job_history"
                                    name="employee_no_job_history" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="company_job_history">{{ __('personel_work_detail.label_company') }}</label>
                                    <select class="form-control select2" id="company_job_history"
                                        name="company_job_history"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="start_date">{{ __('personel_work_detail.label_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date" name="start_date"
                                            placeholder="{{ __('personel_work_detail.label_start_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="end_date">{{ __('personel_work_detail.label_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="end_date" name="end_date"
                                            placeholder="{{ __('personel_work_detail.label_end_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="employment_status">{{ __('personel_work_detail.label_employment_status') }}</label>
                                    <select class="form-control" id="employment_status" name="employment_status">
                                        <option value="">{{ __('personel_work_detail.label_select_employment_status') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="employment_type">{{ __('personel_work_detail.label_employment_type') }}</label>
                                    <select class="form-control" id="employment_type" name="employment_type">
                                        <option value="">{{ __('personel_work_detail.label_select_employment_type') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="contract_start_date">{{ __('personel_work_detail.label_contract_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="contract_start_date"
                                            name="contract_start_date"
                                            placeholder="{{ __('personel_work_detail.label_contract_start_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="contract_end_date">{{ __('personel_work_detail.label_contract_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="contract_end_date"
                                            name="contract_end_date"
                                            placeholder="{{ __('personel_work_detail.label_contract_end_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_code">{{ __('personel_work_detail.label_decree_code') }}</label>
                                    <select class="form-control" id="decree_code" name="decree_code">
                                        <option value="">{{ __('personel_work_detail.label_select_decree_code') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_no">{{ __('personel_work_detail.label_decree_no') }}</label>
                                    <input type="text" class="form-control" id="decree_no" name="decree_no"
                                        placeholder="{{ __('personel_work_detail.label_decree_no') }}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_date">{{ __('personel_work_detail.label_decree_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="decree_date" name="decree_date"
                                            placeholder="{{ __('personel_work_detail.label_decree_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="position_job_history">{{ __('personel_work_detail.label_position') }}</label>
                                    <select class="form-control select2" id="position_job_history"
                                        name="position_job_history"></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="ranking_job_history">{{ __('personel_work_detail.label_ranking') }}</label>
                                    <select class="form-control select2" id="ranking_job_history"
                                        name="ranking_job_history"></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="grade_job_history">{{ __('personel_work_detail.label_grade') }}</label>
                                    <select class="form-control select2" id="grade_job_history"
                                        name="grade_job_history"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="location_job_history">{{ __('personel_work_detail.label_location') }}</label>
                                    <select class="form-control select2" id="location_job_history"
                                        name="location_job_history"></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="group_job_history">{{ __('personel_work_detail.label_group') }}</label>
                                    <select class="form-control select2" id="group_job_history"
                                        name="group_job_history"></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="nature_of_work_job_history">{{ __('personel_work_detail.label_nature_of_work') }}</label>
                                    <select class="form-control select2" id="nature_of_work_job_history"
                                        name="nature_of_work_job_history"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table id="level_job_history_table" class="table hover">
                                    <thead>
                                        <tr id="div-level-job-history-head">

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="div-level-job-history-body">

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="approved_by">{{ __('personel_work_detail.label_approved_by') }}</label>
                                    <select class="form-control select2" id="approved_by" name="approved_by"></select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="direct_staff">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="direct_staff"
                                            name="direct_staff" value="true">
                                        <label class="form-check-label"
                                            for="direct_staff">{{ __('personel_work_detail.label_direct_staff') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="temporary">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="temporary" name="temporary"
                                            value="true">
                                        <label class="form-check-label"
                                            for="temporary">{{ __('personel_work_detail.label_temporary') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="remarks_job_history">{{ __('personel_work_detail.label_remarks') }}</label>
                                    <textarea rows="3" class="form-control" id="remarks_job_history"
                                        name="remarks_job_history"
                                        placeholder="{{ __('personel_work_detail.label_remarks') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="position_job_description">{{ __('personel_work_detail.label_position_job_description') }}</label>
                                    <textarea rows="3" class="form-control" id="position_job_description"
                                        name="position_job_description"
                                        placeholder="{{ __('personel_work_detail.label_position_job_description') }}"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-job-history" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_work_detail.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_work_detail.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_work_experience"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_work_detail.title_modal_work_experience') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="work_experience_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="seq_no_work_experience">{{ __('personel_work_detail.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_work_experience"
                                        name="seq_no_work_experience"
                                        placeholder="{{ __('personel_work_detail.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_work_experience"
                                    name="employee_no_work_experience" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="company_name_work_experience">{{ __('personel_work_detail.label_company_name') }}</label>
                                    <input type="text" class="form-control" id="company_name_work_experience"
                                        name="company_name_work_experience"
                                        placeholder="{{ __('personel_work_detail.label_company_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="join_date">{{ __('personel_work_detail.label_join_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="join_date" name="join_date"
                                            placeholder="{{ __('personel_work_detail.label_join_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="terminate_date">{{ __('personel_work_detail.label_terminate_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="terminate_date"
                                            name="terminate_date"
                                            placeholder="{{ __('personel_work_detail.label_terminate_date') }}">
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
                                        for="position_name_work_experience">{{ __('personel_work_detail.label_position_name') }}</label>
                                    <input type="text" class="form-control" id="position_name_work_experience"
                                        name="position_name_work_experience"
                                        placeholder="{{ __('personel_work_detail.label_position_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="ranking_name_work_experience">{{ __('personel_work_detail.label_ranking_name') }}</label>
                                    <input type="text" class="form-control" id="ranking_name_work_experience"
                                        name="ranking_name_work_experience"
                                        placeholder="{{ __('personel_work_detail.label_ranking_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="nature_of_work_work_experience">{{ __('personel_work_detail.label_nature_of_work') }}</label>
                                    <input type="text" class="form-control" id="nature_of_work_work_experience"
                                        name="nature_of_work_work_experience"
                                        placeholder="{{ __('personel_work_detail.label_nature_of_work') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="line_of_business">{{ __('personel_work_detail.label_line_of_business') }}</label>
                                    <input type="text" class="form-control" id="line_of_business"
                                        name="line_of_business"
                                        placeholder="{{ __('personel_work_detail.label_line_of_business') }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-work-experience" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_work_detail.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_work_detail.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_free_format_field"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_work_detail.title_modal_free_format_field') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="free_format_field_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="format_code">{{ __('personel_work_detail.label_format_code') }}</label>
                                    <select class="form-control select2" id="format_code" name="format_code"></select>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_free_format_field"
                                    name="employee_no_free_format_field" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="description_free_format_field">{{ __('personel_work_detail.label_description') }}</label>
                                    <input type="text" class="form-control" id="description_free_format_field"
                                        name="description_free_format_field"
                                        placeholder="{{ __('utilities_audit_trail.label_user_name') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="value_free_format_field">{{ __('personel_work_detail.label_value') }}</label>
                                    <select class="form-control select2" id="value_free_format_field"
                                        name="value_free_format_field" disabled></select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-free-format-field" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_work_detail.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_work_detail.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('personel_work_detail.alert_success') }}</span>
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
                        <span class="title-text-notification">{{ __('personel_work_detail.alert_success') }}</span>
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
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="{{ asset('js/jquery.inputpicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        let pickerStartDate = $('#start_date').flatpickr({
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

        let pickerEndDate = $('#end_date').flatpickr({
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

        let pickerContractStartDate = $('#contract_start_date').flatpickr({
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

        let pickerContractEndDate = $('#contract_end_date').flatpickr({
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

        let pickerDecreeDate = $('#decree_date').flatpickr({
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

        $('#join_date').flatpickr({
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

        $('#terminate_date').flatpickr({
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

        var table = null;
        var target = $('.nav-tabs a.nav-link.active').attr('href');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        load_table_job_history('{{ $data[0]->employeeNo }}');

        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            target = $(e.target).attr('href');
            if (target == '#job_history_tab') {
                $('#job_history_data_table').DataTable().destroy();
                load_table_job_history('{{ $data[0]->employeeNo }}');
            } else if (target == '#work_experience_tab') {
                $('#work_experience_data_table').DataTable().destroy();
                load_table_work_experience('{{ $data[0]->employeeNo }}');
            } else if (target == '#free_format_field_tab') {
                $('#free_format_field_data_table').DataTable().destroy();
                load_table_free_format_field('{{ $data[0]->employeeNo }}');
            }
        });

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        $.ajax({
            url: "{{ url('personnel/report/level/check') }}",
            type: "GET",
            success: function (response) {
                var arrLevel = [];
                for (var i = 0; i < response.data_level.length; i++) {
                    arrLevel.push(response.data_level[i].levelDescription);
                }

                console.log(arrLevel);

                var strLevel = arrLevel.join(", ");
                $('#div-table-level').html(strLevel);
            },
            error: function (response) {
                $('#notification_error').modal('show');
                $('#message-notification-error').html(response);
            }
        });

        $('#job_history_data_table thead tr').clone(true).appendTo('#job_history_data_table thead');
        $('#job_history_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
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

        $('#work_experience_data_table thead tr').clone(true).appendTo('#work_experience_data_table thead');
        $('#work_experience_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
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

        $('#free_format_field_data_table thead tr').clone(true).appendTo('#free_format_field_data_table thead');
        $('#free_format_field_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
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

        function load_table_job_history(employeeNo = '') {
            table = $('#job_history_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/work_detail/job_history/table') }}",
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
                        data: 'historyCompanyCode',
                        name: 'historyCompanyCode'
                    },
                    {
                        data: 'startDate',
                        name: 'startDate',
                        render: function (data, type, row) {
                            if(data == null || data == ''){
                                return "";
                            }else{
                                return moment(data).format('DD-MMM-YYYY');
                            }
                        }
                    },
                    {
                        data: 'endDate',
                        name: 'endDate',
                        render: function (data, type, row) {
                            if(data == null || data == ''){
                                return "";
                            }else{
                                return moment(data).format('DD-MMM-YYYY');
                            }
                        }
                    },
                    {
                        data: 'employmentStatus',
                        name: 'employmentStatus'
                    },
                    {
                        data: 'positionName',
                        name: 'positionName'
                    },
                    {
                        data: 'rankingName',
                        name: 'rankingName'
                    },
                    {
                        data: 'levelName',
                        name: 'levelName'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_work_experience(employeeNo = '') {
            table = $('#work_experience_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/work_detail/work_experience/table') }}",
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
                        data: 'companyName',
                        name: 'companyName'
                    },
                    {
                        data: 'joinDate',
                        name: 'joinDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'terminateDate',
                        name: 'terminateDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'positionName',
                        name: 'positionName'
                    },
                    {
                        data: 'rankingName',
                        name: 'rankingName'
                    },
                    {
                        data: 'natureOfWork',
                        name: 'natureOfWork'
                    },
                    {
                        data: 'lineOfBusiness',
                        name: 'lineOfBusiness'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_free_format_field(employeeNo = '') {
            table = $('#free_format_field_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/work_detail/free_format_field/table') }}",
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
                        data: 'freeFormatCode',
                        name: 'freeFormatCode'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'value',
                        name: 'value'
                    }
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#job_history_data_table, #work_experience_data_table, #free_format_field_data_table').on('click', 'tbody input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#job_history_data_table, #work_experience_data_table, #free_format_field_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#photo_profile').change(function (e) {
            var fileExtension = ['jpeg', 'jpg', 'png'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Only formats are allowed : " + fileExtension.join(', '));
            } else {
                for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
                    var file = e.originalEvent.srcElement.files[i];
                    // console.log(file);
                    var img = $('#photo');
                    var reader = new FileReader();
                    reader.onloadend = function() {
                        img.attr('src', reader.result);
                        // console.log(reader.result);
                    }
                    reader.readAsDataURL(file);
                    // $("#photo_profile").after(img);
                }
            }
            // $('#photo_profile').val(file);
        });

        $.get("{{ url('employment/status/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#employment_status').append("<option value=" + v.comGenCode +
                    ">" + v
                    .value + "</option>");
            });
        });

        $.get("{{ url('employment/type/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#employment_type').append("<option value=" + v.comGenCode + ">" +
                    v
                    .value + "</option>");
            });
        });

        $.get("{{ url('decree/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#decree_code').append("<option value=" + v.comGenCode + ">" + v
                    .value + "</option>");
            });
        });

        loadDataPositionCode();
        loadDataRankingCode();
        loadDataGradeCode();
        loadDataLocationCode();
        loadDataGroupCode();
        loadDataNatureofWork();
        loadDataCompanyCode('#company_job_history');
        loadDataEmployeeNo();
        loadDataFreeFormat();

        $('body').on('click', '#btn-edit-job-history', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                console.log(moment(data[0].startDate).format('YYYY-MM-DD'));
                $('#modal_add_job_history').modal('show');
                $('#seq_no_job_history').val(data[0].seqNo);
                pickerStartDate.setDate(data[0].startDate);
                pickerEndDate.setDate(data[0].endDate);
                $('#employment_status').val(data[0].employmentStatus);
                $('#employment_type').val(data[0].employmentType);
                pickerContractStartDate.setDate(data[0].contractStartDate);
                pickerContractEndDate.setDate(data[0].contractEndDate);
                $('#decree_code').val(data[0].decreeCode);
                $('#decree_no').val(data[0].decreeNo);
                pickerDecreeDate.setDate(data[0].decreeDate);
                $('#remarks_job_history').val(htmlDecode(data[0].remarks));
                $('#position_job_description').val(data[0].jobDesc);
                if (data[0].flagisDirect) {
                    $('#direct_staff').prop('checked', true);
                } else {
                    $('#direct_staff').prop('checked', false);
                }
                if (data[0].flagisTemporary) {
                    $('#temporary').prop('checked', true);
                } else {
                    $('#temporary').prop('checked', false);
                }

                $('#div-level-job-history-head').html('');
                $('#div-level-job-history-body').html('')

                $.each(data[0].level, function (k, v) {
                    $('#div-level-job-history-head').append(
                        "<th>Level " + v.levelType + " </th>"
                    );
                    $('#div-level-job-history-body').append(
                        '<td><select class="form-control select2" id="level' + v.levelType +
                        '" name="level_code[]"></select></td>'
                    );

                    loadDataLevelCode('#level' + v.levelType, v.levelType);

                    $.ajax({
                        type: 'GET',
                        url: "{{ url('/level/detail/api') }}",
                        data: {
                            'levelType': v.levelType,
                            'levelCode': v.levelCode
                        }
                    }).then(function (response) {
                        var $newOption = $("<option selected='selected'></option>").val(
                            response[0]
                            .levelCode).text(response[0].levelName);
                        $('#level' + v.levelType).append($newOption).trigger('change');
                    });
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/company/detail/api') }}",
                    data: {
                        'companyCode': data[0].historyCompanyCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .companyCode).text(response[0].companyName);
                    $("#company_job_history").append($newOption).trigger('change');
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/employee_no/req_detail/api') }}",
                    data: {
                        'employeeNo' : data[0].approvedBy
                    }
                }).then(function (data2) {
                    var $newOption = $("<option selected='selected'></option>").val(data2
                        .employeeNo).text(data2.fullName);
                    $("#approved_by").append($newOption).trigger('change');
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/position/detail/api') }}",
                    data: {
                        'positionCode': data[0].positionCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .positionCode).text(response[0].positionName);
                    $("#position_job_history").append($newOption).trigger('change');
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/ranking/detail/api') }}",
                    data: {
                        'rankingCode': data[0].rankingCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .rankingCode).text(response[0].rankingName);
                    $("#ranking_job_history").append($newOption).trigger('change');
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/grade/detail/api') }}",
                    data: {
                        'gradeCode': data[0].gradeCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .gradeCode).text(response[0].gradeName);
                    $("#grade_job_history").append($newOption).trigger('change');
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/location/detail/api') }}",
                    data: {
                        'locationCode': data[0].locationCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .locationCode).text(response[0].locationName);
                    $("#location_job_history").append($newOption).trigger('change');
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/group/detail/api') }}",
                    data: {
                        'groupCode': data[0].groupCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .groupCode).text(response[0].groupName);
                    $("#group_job_history").append($newOption).trigger('change');
                });

                $.ajax({
                    type: 'GET',
                    url: "{{ url('/nature_of_work/detail/api') }}",
                    data: {
                        'workNatureCode': data[0].workNatureCode
                    }
                }).then(function (response) {
                    var $newOption = $("<option selected='selected'></option>").val(response[0]
                        .workNatureCode).text(response[0].workNatureName);
                    $("#nature_of_work_job_history").append($newOption).trigger('change');
                });
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#modal_add_work_experience').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/peworkexperience/getpeworkexperience',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_work_experience').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });
        
        $('#format_code').on("select2:select", function (e) {
            var data = $('#format_code').select2('data');
            $('#description_free_format_field').val(data[0].title);

            $('#value_free_format_field').prop('disabled', false);
            loadDataFreeFormatDetail(data[0].id);
        });

        $('#format_code').on("select2:unselecting", function (e) {
            $('#description_free_format_field').val('');

            $('#value_free_format_field').prop('disabled', true);
        });

        $("#btn-remove-job-history").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/work_detail/job_history/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#job_history_data_table').DataTable().destroy();
                            load_table_job_history(data[0].employeeNo);
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

        $("#btn-remove-work-experience").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/work_detail/work_experience/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#work_experience_data_table').DataTable().destroy();
                            load_table_work_experience(data[0].employeeNo);
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

        $("#btn-remove-free-format-field").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "{{ url('personnel/work_detail/free_format_field/remove') }}",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#free_format_field_data_table').DataTable().destroy();
                            load_table_free_format_field(data[0].employeeNo);
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

        function loadDataEmployeeNo() {
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
            $('#approved_by').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Employee Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            var $employeeNo = $('#approved_by').select2({
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
                                    text: item.fullName,
                                    id: item.employeeNo,
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

        function loadDataPositionCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.positionCode + '</div>' +
                        '<div class="col-6">' + data.data.positionName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#position_job_history').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Position Code</b></div>' +
                        '<div class="col-6"><b>Position Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#position_job_history').select2({
                width: '100%',
                placeholder: 'Choose Position',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/position/api') }}",
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
                                    text: item.positionName,
                                    id: item.positionCode,
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

        function loadDataRankingCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.rankingCode + '</div>' +
                        '<div class="col-6">' + data.data.rankingName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#ranking_job_history').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Ranking Code</b></div>' +
                        '<div class="col-6"><b>Ranking Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#ranking_job_history').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/ranking/api') }}",
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
                                    text: item.rankingName,
                                    id: item.rankingCode,
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

        function loadDataGradeCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.gradeCode + '</div>' +
                        '<div class="col-6">' + data.data.gradeName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#grade_job_history').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Grade Code</b></div>' +
                        '<div class="col-6"><b>Grade Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#grade_job_history').select2({
                width: '100%',
                placeholder: 'Choose Grade',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/grade/api') }}",
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
                                    text: item.gradeName,
                                    id: item.gradeCode,
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

        function loadDataLocationCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.locationCode + '</div>' +
                        '<div class="col-6">' + data.data.locationName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#location_job_history').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Location Code</b></div>' +
                        '<div class="col-6"><b>Location Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#location_job_history').select2({
                width: '100%',
                placeholder: 'Choose Location',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/location/api') }}",
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
                                    text: item.locationName,
                                    id: item.locationCode,
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

        function loadDataGroupCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.groupCode + '</div>' +
                        '<div class="col-6">' + data.data.groupName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#group_job_history').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Group Code</b></div>' +
                        '<div class="col-6"><b>Group Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#group_job_history').select2({
                width: '100%',
                placeholder: 'Choose Group',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/group/api') }}",
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
                                    text: item.groupName,
                                    id: item.groupCode,
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

        function loadDataNatureofWork() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.workNatureCode + '</div>' +
                        '<div class="col-6">' + data.data.workNatureName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#nature_of_work_job_history').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Work Nature Code</b></div>' +
                        '<div class="col-6"><b>Work Nature Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#nature_of_work_job_history').select2({
                width: '100%',
                placeholder: 'Choose Nature of Work',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/nature_of_work/api') }}",
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
                                    text: item.workNatureName,
                                    id: item.workNatureCode,
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

        function loadDataCompanyCode(field = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.companyCode + '</div>' +
                        '<div class="col-6">' + data.data.companyName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Company Code</b></div>' +
                        '<div class="col-6"><b>Company Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose Company',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/company/api') }}",
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
                                    text: item.companyName,
                                    id: item.companyCode,
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

        function loadDataFreeFormat() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.freeFormatCode + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#format_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Free Format Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#format_code').select2({
                width: '100%',
                placeholder: 'Choose Free Format Field',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/free_format_field/api') }}",
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
                                    id: item.freeFormatCode,
                                    title: item.description,
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

        function loadDataFreeFormatDetail(freeFormatCode = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.listCode + '</div>' +
                        '<div class="col-6">' + data.data.listValue + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#value_free_format_field').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>List Code</b></div>' +
                        '<div class="col-6"><b>List Value</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#value_free_format_field').select2({
                width: '100%',
                placeholder: 'Choose List',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/free_format_field/detail/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            freeFormatCode: freeFormatCode
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.listValue,
                                    id: item.listCode,
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

        function loadDataLevelCode(field = '', levelType = '') {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.levelCode + '</div>' +
                        '<div class="col-6">' + data.data.levelName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $(field).on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Level Code</b></div>' +
                        '<div class="col-6"><b>Level Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $(field).select2({
                width: '100%',
                placeholder: 'Choose List',
                allowClear: true,
                language: {
                    errorLoading: function () {
                        return $search;
                    },
                    searching: function () {
                        return $search;
                    }
                },
                ajax: {
                    url: "{{ url('/level/api') }}",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            levelType: levelType
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.levelName,
                                    id: item.levelCode,
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

        // if ($("#employee_profile_form").length > 0) {
        //     $("#employee_profile_form").validate({
        //         rules: {
        //             photo_profile: {
        //                 extension: "jpg|jpeg|png",
        //             },
        //         },
        //         messages: {
        //             photo_profile: {
        //                 extension: "{{ __('personel_performance.photo_profile_extension') }}",
        //             },
        //         },
        //         errorPlacement: function (error, element) {
        //             error.insertAfter(element);
        //             alert(error.html());
        //         },
        //         showErrors: function (errorMap, errorList) {
        //             this.defaultShowErrors();
        //         },
        //         submitHandler: function (form) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });

        //             var myform = document.getElementById("employee_profile_form");
        //             var formdata = new FormData(myform);

        //             $.ajax({
        //                 url: "{{ url('personnel/employee/photo/proses') }}",
        //                 type: "POST",
        //                 processData: false,
        //                 contentType: false,
        //                 data: formdata,
        //                 success: function (response) {
        //                     if (response.status == "true") {
        //                         $('#notification_success').modal('show');
        //                         $('#message-notification-success').html(response
        //                             .message);
        //                         setTimeout(function () {
        //                             window.location =
        //                                 "{{ url('personnel/work_detail') }}";
        //                         }, 3000);
        //                     } else {
        //                         $('#notification_error').modal('show');
        //                         if (response.message == null || response.message ==
        //                             '') {
        //                             $('#message-notification-error').html(
        //                                 "{{ __('login.error') }}");
        //                         } else {
        //                             $('#message-notification-error').html(response
        //                                 .message);
        //                         }
        //                     }
        //                 },
        //                 error: function (response) {
        //                     $('#notification_error').modal('show');
        //                     $('#message-notification-error').html(response);
        //                 }
        //             });
        //         }
        //     })
        // }

        $("#btn-save-job-history").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#job_history_form").submit();
        });

        $("#btn-save-work-experience").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#work_experience_form").submit();
        });

        $("#btn-save-free-format-field").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#free_format_field_form").submit();
        });

        if ($("#job_history_form").length > 0) {
            $("#job_history_form").validate({
                rules: {
                    seq_no_job_history: {
                        required: true,
                    },
                    company_job_history: {
                        required: true,
                    },
                    start_date: {
                        required: true,
                    },
                    end_date: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_job_history: {
                        required: "{{ __('personel_work_detail.seq_no_required') }}",
                    },
                    company_job_history: {
                        required: "{{ __('personel_work_detail.company_required') }}",
                    },
                    start_date: {
                        required: "{{ __('personel_work_detail.start_date_required') }}",
                    },
                    end_date: {
                        required: "{{ __('personel_work_detail.end_date_required') }}",
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
                    $("#btn-save-job-history").prop("disabled", false);
                    $("#btn-save-job-history").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
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
                        url: "{{ url('personnel/work_detail/job_history/proses') }}",
                        type: "POST",
                        data: $('#job_history_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-job-history").prop("disabled", false);
                                $("#btn-save-job-history").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
                                );

                                $('#modal_add_job_history').modal('hide');
                                $('#job_history_data_table').DataTable().destroy();
                                load_table_job_history(
                                    '{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-job-history").prop("disabled", false);
                                $("#btn-save-job-history").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
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
                            $("#btn-save-job-history").prop("disabled", false);
                            $("#btn-save-job-history").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#work_experience_form").length > 0) {
            $("#work_experience_form").validate({
                rules: {
                    seq_no_work_experience: {
                        required: true,
                    },
                    company_name_work_experience: {
                        required: true,
                    },
                    join_date: {
                        required: true,
                    },
                    terminate_date: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_work_experience: {
                        required: "{{ __('personel_work_detail.seq_no_required') }}",
                    },
                    company_name_work_experience: {
                        required: "{{ __('personel_work_detail.company_name_required') }}",
                    },
                    join_date: {
                        required: "{{ __('personel_work_detail.join_date_required') }}",
                    },
                    terminate_date: {
                        required: "{{ __('personel_work_detail.terminate_date_required') }}",
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
                    $("#btn-save-work-experience").prop("disabled", false);
                    $("#btn-save-work-experience").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
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
                        url: "{{ url('personnel/work_detail/work_experience/proses') }}",
                        type: "POST",
                        data: $('#work_experience_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-work-experience").prop("disabled", false);
                                $("#btn-save-work-experience").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
                                );

                                $('#modal_add_work_experience').modal('hide');
                                $('#work_experience_data_table').DataTable().destroy();
                                load_table_work_experience(
                                    '{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-work-experience").prop("disabled", false);
                                $("#btn-save-work-experience").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
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
                            $("#btn-save-work-experience").prop("disabled", false);
                            $("#btn-save-work-experience").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#free_format_field_form").length > 0) {
            $("#free_format_field_form").validate({
                rules: {
                    format_code: {
                        required: true,
                    },
                    value_free_format_field: {
                        required: true,
                    },
                },
                messages: {
                    format_code: {
                        required: "{{ __('personel_work_detail.format_code_required') }}",
                    },
                    value_free_format_field: {
                        required: "{{ __('personel_work_detail.value_required') }}",
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
                    $("#btn-save-free-format-field").prop("disabled", false);
                    $("#btn-save-free-format-field").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
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
                        url: "{{ url('personnel/work_detail/free_format_field/proses') }}",
                        type: "POST",
                        data: $('#free_format_field_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-free-format-field").prop("disabled",
                                false);
                                $("#btn-save-free-format-field").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
                                );

                                $('#modal_add_free_format_field').modal('hide');
                                $('#free_format_field_data_table').DataTable()
                                    .destroy();
                                load_table_free_format_field(
                                    '{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-free-format-field").prop("disabled",
                                false);
                                $("#btn-save-free-format-field").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
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
                            $("#btn-save-free-format-field").prop("disabled", false);
                            $("#btn-save-free-format-field").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_work_detail.btn_save") }}'
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
