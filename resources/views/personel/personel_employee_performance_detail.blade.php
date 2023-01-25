<!DOCTYPE html>
<html>

<head>
    <title>{{ __('personel_performance.judul') }}</title>
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
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
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
                            {{ __('personel_performance.btn_change_picture') }}
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
            <a href="{{ url('personnel/performance') }}" target="iframe_dashboard">
                <img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
                <span class="title-text">{{ __('personel_performance.list_detail') }}</span>
            </a>
        </div>

        <div class="div-form">
            <ul class="nav nav-tabs" id="tab-performance" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="award-tab" data-toggle="tab" href="#award_tab" role="tab"
                        aria-controls="award" aria-selected="true">{{ __('personel_performance.award_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sanction-tab" data-toggle="tab" href="#sanction_tab" role="tab"
                        aria-controls="sanction" aria-selected="false">{{ __('personel_performance.sanction_tab') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="evaluation-tab" data-toggle="tab" href="#evaluation_tab" role="tab"
                        aria-controls="evaluation"
                        aria-selected="false">{{ __('personel_performance.evaluation_tab') }}</a>
                </li>
            </ul>
            <div class="tab-content" id="tab-content-performance">
                <div class="tab-pane fade show active" id="award_tab" role="tabpanel" aria-labelledby="award-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="award_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Event Name</th>
                                        <th>Award Type</th>
                                        <th>Award Date</th>
                                        <th>Award Name</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-award" id="btn-add-award"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_award">
                                <i class="fa fa-plus"></i> {{ __('personel_performance.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-award" id="btn-remove-award"
                                style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_performance.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="sanction_tab" role="tabpanel" aria-labelledby="sanction-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="sanction_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Decree Code</th>
                                        <th>Decree Date</th>
                                        <th>Sanction Name</th>
                                        <th>Sanction Start Date</th>
                                        <th>Sanction End Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-sanction" id="btn-add-sanction"
                                style="width: 100%;" data-toggle="modal" data-target="#modal_add_sanction">
                                <i class="fa fa-plus"></i> {{ __('personel_performance.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-sanction"
                                id="btn-remove-sanction" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_performance.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="evaluation_tab" role="tabpanel" aria-labelledby="evaluation-tab">
                    <div class="row">
                        <div class="col-12">
                            <table id="evaluation_data_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Seq No</th>
                                        <th>Form Name</th>
                                        <th>Evaluation Period From</th>
                                        <th>Evaluation Period To</th>
                                        <th>Evaluation Date</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button type="button" class="btn btn-primary" name="btn-add-evaluation"
                                id="btn-add-evaluation" style="width: 100%;" data-toggle="modal"
                                data-target="#modal_add_evaluation">
                                <i class="fa fa-plus"></i> {{ __('personel_performance.btn_add') }}
                            </button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-danger" name="btn-remove-evaluation"
                                id="btn-remove-evaluation" style="width: 100%;">
                                <i class="fa fa-times"></i> {{ __('personel_performance.btn_remove') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_award" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_performance.title_modal_award') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="award_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no_award">{{ __('personel_performance.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_award" name="seq_no_award"
                                        placeholder="{{ __('personel_performance.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_award"
                                    name="employee_no_award" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="event_name">{{ __('personel_performance.label_event_name') }}</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name"
                                        placeholder="{{ __('personel_performance.label_event_name') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="award_date">{{ __('personel_performance.label_award_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="award_date" name="award_date"
                                            placeholder="{{ __('personel_performance.label_award_date') }}">
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
                                    <label for="award_type">{{ __('personel_performance.label_award_type') }}</label>
                                    <input type="text" class="form-control" id="award_type" name="award_type"
                                        placeholder="{{ __('personel_performance.label_award_type') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="award_name">{{ __('personel_performance.label_award_name') }}</label>
                                    <input type="text" class="form-control" id="award_name" name="award_name"
                                        placeholder="{{ __('personel_performance.label_award_name') }}">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-award" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_performance.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_performance.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_sanction" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_performance.title_modal_sanction') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="sanction_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="seq_no_sanction">{{ __('personel_performance.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_sanction" name="seq_no_sanction"
                                        placeholder="{{ __('personel_performance.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_sanction"
                                    name="employee_no_sanction" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_code">{{ __('personel_performance.label_decree_code') }}</label>
                                    <select class="form-control" id="decree_code" name="decree_code">
                                        <option value="">{{ __('personel_performance.label_select_decree_code') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_date">{{ __('personel_performance.label_decree_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="decree_date" name="decree_date"
                                            placeholder="{{ __('personel_performance.label_decree_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="decree_no">{{ __('personel_performance.label_decree_no') }}</label>
                                    <input type="text" class="form-control" id="decree_no" name="decree_no"
                                        placeholder="{{ __('personel_performance.label_decree_no') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="sanction_code">{{ __('personel_performance.label_sanction_code') }}</label>
                                    <select class="form-control" id="sanction_code" name="sanction_code">
                                        <option value="">{{ __('personel_performance.label_select_sanction_code') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="sanction_start_date">{{ __('personel_performance.label_sanction_start_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="sanction_start_date"
                                            name="sanction_start_date"
                                            placeholder="{{ __('personel_performance.label_sanction_start_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label
                                        for="sanction_end_date">{{ __('personel_performance.label_sanction_end_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="sanction_end_date"
                                            name="sanction_end_date"
                                            placeholder="{{ __('personel_performance.label_sanction_end_date') }}">
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
                                        for="sanction_remarks">{{ __('personel_performance.label_sanction_remarks') }}</label>
                                    <textarea rows="3" class="form-control" id="sanction_remarks"
                                        name="sanction_remarks"
                                        placeholder="{{ __('personel_performance.label_sanction_remarks') }}"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-sanction" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_performance.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_performance.btn_cancel') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_evaluation" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('personel_performance.title_modal_evaluation') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="evaluation_form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no_evaluation">{{ __('personel_performance.label_seq_no') }}</label>
                                    <input type="text" class="form-control" id="seq_no_evaluation"
                                        name="seq_no_evaluation"
                                        placeholder="{{ __('personel_performance.label_seq_no') }}" readonly>
                                </div>
                                <input type="hidden" class="form-control" id="employee_no_evaluation"
                                    name="employee_no_evaluation" value="{{ $data[0]->employeeNo }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="evaluation_period_from">{{ __('personel_performance.label_evaluation_period_from') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="evaluation_period_from"
                                            name="evaluation_period_from"
                                            placeholder="{{ __('personel_performance.label_evaluation_period_from') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="evaluation_period_to">{{ __('personel_performance.label_evaluation_period_to') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="evaluation_period_to"
                                            name="evaluation_period_to"
                                            placeholder="{{ __('personel_performance.label_evaluation_period_to') }}">
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
                                        for="evaluation_date">{{ __('personel_performance.label_evaluation_date') }}</label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="evaluation_date"
                                            name="evaluation_date"
                                            placeholder="{{ __('personel_performance.label_evaluation_date') }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="evaluator">{{ __('personel_performance.label_evaluator') }}</label>
                                    <select class="form-control select2" id="evaluator" name="evaluator"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="evaluation_form_code">{{ __('personel_performance.label_evaluation_form_code') }}</label>
                                    <select class="form-control select2" id="evaluation_form_code"
                                        name="evaluation_form_code"></select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="result">{{ __('personel_performance.label_result') }}</label>
                                    <input type="text" class="form-control" id="result" name="result"
                                        placeholder="{{ __('personel_performance.label_result') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table id="evaluation_form_code_table" class="table hover">
                                    <thead>
                                        <tr>
                                            <th>Seq No</th>
                                            <th>Evaluated Aspect</th>
                                            <th>Calculation</th>
                                            <th>Predicate</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" id="btn-save-evaluation" class="btn btn-primary w-25"><i
                            class="fa fa-floppy-o"></i>
                        {{ __('personel_performance.btn_save') }}</button>
                    <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                            class="fa fa-times-circle"></i> {{ __('personel_performance.btn_cancel') }}</button>
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
                        <span class="title-text-notification">{{ __('personel_performance.alert_success') }}</span>
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
                        <span class="title-text-notification">{{ __('personel_performance.alert_success') }}</span>
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
    $(function () {
        initDatePicker();
    });

    function initDatePicker() {
        $('.input-group input').flatpickr({
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
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        var table = null;
        var table_detail = null;
        var target = $('.nav-tabs a.nav-link.active').attr('href');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        load_table_award('{{ $data[0]->employeeNo }}');

        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            target = $(e.target).attr('href');
            if (target == '#award_tab') {
                $('#award_data_table').DataTable().destroy();
                load_table_award('{{ $data[0]->employeeNo }}');
            } else if (target == '#sanction_tab') {
                $('#sanction_data_table').DataTable().destroy();
                load_table_sanction('{{ $data[0]->employeeNo }}');
            } else if (target == '#evaluation_tab') {
                $('#evaluation_data_table').DataTable().destroy();
                load_table_evaluation('{{ $data[0]->employeeNo }}');
            }
        });

        $('#award_data_table thead tr').clone(true).appendTo('#award_data_table thead');
        $('#award_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
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

        $('#sanction_data_table thead tr').clone(true).appendTo('#sanction_data_table thead');
        $('#sanction_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
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

        $('#evaluation_data_table thead tr').clone(true).appendTo('#evaluation_data_table thead');
        $('#evaluation_data_table thead tr:eq(1) th:not(:first-child)').each(function (i) {
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

        function load_table_award(employeeNo = '') {
            table = $('#award_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/performance/award/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
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
                        data: 'eventName',
                        name: 'eventName'
                    },
                    {
                        data: 'awardType',
                        name: 'awardType'
                    },
                    {
                        data: 'awardDate',
                        name: 'awardDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'awardName',
                        name: 'awardName'
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_sanction(employeeNo = '') {
            table = $('#sanction_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/performance/sanction/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
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
                        data: 'decreeCode',
                        name: 'decreeCode'
                    },
                    {
                        data: 'decreeDate',
                        name: 'decreeDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'sanctionName',
                        name: 'sanctionName'
                    },
                    {
                        data: 'sanctionStartDate',
                        name: 'sanctionStartDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'sanctionEndDate',
                        name: 'sanctionEndDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'sanctionRemarks',
                        name: 'sanctionRemarks'
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_evaluation(employeeNo = '') {
            table = $('#evaluation_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/performance/evaluation/table') }}",
                    data: {
                        'employeeNo': employeeNo
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
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
                        data: 'evaluationName',
                        name: 'evaluationName'
                    },
                    {
                        data: 'evaluationPeriodFrom',
                        name: 'evaluationPeriodFrom',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'evaluationPeriodTo',
                        name: 'evaluationPeriodTo',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'evaluationDate',
                        name: 'evaluationDate',
                        render: function (data, type, row) {
                            return moment(data).format('DD-MMM-YYYY');
                        }
                    },
                    {
                        data: 'result',
                        name: 'result'
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        function load_table_evaluation_form_code(formCode = '') {
            table_detail = $('#evaluation_form_code_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: {
                    url: "{{ url('personnel/performance/evaluation/form/table') }}",
                    data: {
                        'formCode': formCode
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText +
                        "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'ellipses',
                "order": [
                    [0, "asc"]
                ],
                columns: [{
                        data: 'sequenceNo',
                        name: 'sequenceNo',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="sequence_no[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'evaluatedAspect',
                        name: 'evaluatedAspect',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="evaluated_aspect[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'calculation',
                        name: 'calculation',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="calculation[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: null,
                        name: null,
                        render: function (data, type, row) {
                            return '<select class="form-control predicate" name="predicate[]"></select>';
                        }
                    },
                    {
                        data: null,
                        name: null,
                        render: function (data, type, row) {
                            return '<select class="form-control result_value" name="result_value[]"></select>';
                        }
                    }
                ]
            });
        }

        $('#award_data_table, #sanction_data_table, #evaluation_data_table').on('click', ' tbody input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#award_data_table, #sanction_data_table, #evaluation_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');

            e.stopPropagation();
        });

        $('#photo_profile').change(function (e) {
            var fileExtension = ['jpeg', 'jpg', 'png'];
            if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Only formats are allowed : " + fileExtension.join(', '));
            } else {
                $('#employee_profile_form').submit();
            }
        });

        $.get("{{ url('decree/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#decree_code').append("<option value=" + v.comGenCode + ">" + v
                    .value + "</option>");
            });
        });

        $.get("{{ url('sanction/api') }}", function (data) {
            $.each(data, function (k, v) {
                $('#sanction_code').append("<option value=" + v.comGenCode + ">" + v
                    .value + "</option>");
            });
        });

        loadDataEmployeeNo();
        loadDataEvaluationForm();

        $('#modal_add_award').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/peaward/getpeaward',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_award').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_sanction').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/pesanction/getpesanction',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_sanction').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#modal_add_evaluation').on('show.bs.modal', function () {
            $.ajax({
                url: "{{ url('personnel/number/check') }}",
                type: "GET",
                data: {
                    'url': '/peevaluation/getpeevaluation',
                    'employeeNo': "{{ $data[0]->employeeNo }}"
                },
                success: function (response) {
                    $('#seq_no_evaluation').val(response);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });

            $('result').val('');
            $('#evaluator').val('').trigger('change');
            $('#evaluation_form_code').val('').trigger('change');
            $('#evaluation_form_code_table').DataTable().clear().destroy();
        });

        $('#evaluation_form_code').on("select2:select", function (e) {
            var data = $('#evaluation_form_code').select2('data');

            $('#evaluation_form_code_table').DataTable().destroy();
            load_table_evaluation_form_code(data[0].id);

            var url = "{{ url('evaluation_form/detail/api/formCode') }}";
            url = url.replace("formCode", data[0].id);
            $.get(url, function (data) {
                $.each(data, function (k, v) {
                    // console.log(v);
                    if (k == 0) {
                        $('.predicate').append("<option value=" + v.predicate +
                            " data-id=" + v.resultValue + " selected>" + v
                            .predicate + "</option>");
                        $('.result_value').append("<option value=" + v.resultValue +
                            " data-id=" + v.predicate + " selected>" + v
                            .resultValue + "</option>");
                    } else {
                        $('.predicate').append("<option value=" + v.predicate +
                            " data-id=" + v.resultValue + ">" + v
                            .predicate + "</option>");
                        $('.result_value').append("<option value=" + v.resultValue +
                            " data-id=" + v.predicate + ">" + v
                            .resultValue + "</option>");
                    }
                });
                $('.result_value').trigger('change');
            });
        });

        $('#evaluation_form_code').on("select2:unselecting", function (e) {
            $('#evaluation_form_code_table').DataTable().clear().destroy();
        });

        function calculateSumValue() {
            var sum = 0;
            //iterate through each textboxes and add the values
            $(".result_value").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                }
            });

            $.ajax({
                url: "{{ url('personnel/performance/result/check') }}",
                type: "GET",
                data: {
                    'valueSum': sum
                },
                success: function (response) {
                    $('#result').val(response[0].value);
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        }

        $(document).on("change", "select[name='predicate[]']", function () {
            var dataVal = $(this).val();
            var dataID = $(this).find(':selected').attr('data-id');
            // var data = table_detail.row(this.closest('tr')).data();
            var row = $(this).closest("tr");
            var select = row.find("select.result_value");
            select.val(dataID).trigger('change');
        });

        $(document).on("change", "select[name='result_value[]']", function () {
            calculateSumValue();
            var dataVal = $(this).val();
            var dataID = $(this).find(':selected').attr('data-id');
            // var data = table_detail.row(this.closest('tr')).data();
            var row = $(this).closest("tr");
            var select = row.find("select.predicate");
            select.val(dataID);
        });

        $("#btn-remove-award").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('personnel/performance/award/remove') }}",
                    type: "GET",
                    data: {
                        'employeeNo': data[0].employeeNo,
                        'seqNo': data[0].seqNo,
                        'awardType': data[0].awardType
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#award_data_table').DataTable().destroy();
                            load_table_award(data[0].employeeNo);
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

        $("#btn-remove-sanction").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('personnel/performance/sanction/remove') }}",
                    type: "GET",
                    data: {
                        'employeeNo': data[0].employeeNo,
                        'seqNo': data[0].seqNo,
                        'sanctionCode': data[0].sanctionCode
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#sanction_data_table').DataTable().destroy();
                            load_table_sanction(data[0].employeeNo);
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

        $("#btn-remove-evaluation").on('click', function () {
            var data = table.rows('.selected').data();
            if (data.count() > 0) {
                $.ajax({
                    url: "{{ url('personnel/performance/evaluation/remove') }}",
                    type: "GET",
                    data: {
                        'employeeNo': data[0].employeeNo,
                        'seqNo': data[0].seqNo
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success_detail').modal('show');
                            $('#message-notification-success-detail').html(response
                                .message);
                            $('#evaluation_data_table').DataTable().destroy();
                            load_table_evaluation(data[0].employeeNo);
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
            $('#evaluator').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Employee No</b></div>' +
                        '<div class="col-6"><b>Employee Name</b></div>' +
                        '</div>';
                    $('.select2-search').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#evaluator').select2({
                width: '100%',
                placeholder: 'Choose Employee No',
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

        function loadDataEvaluationForm() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.formCode + '</div>' +
                        '<div class="col-6">' + data.data.formName + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#evaluation_form_code').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Form Code</b></div>' +
                        '<div class="col-6"><b>Form Name</b></div>' +
                        '</div>';
                    $('.select2-search').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#evaluation_form_code').select2({
                width: '100%',
                placeholder: 'Choose Evaluation Form',
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
                    url: "{{ url('/evaluation_form/api') }}",
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
                                    text: item.formName,
                                    id: item.formCode,
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

        $("#btn-save-award").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#award_form").submit();
        });

        $("#btn-save-sanction").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#sanction_form").submit();
        });

        $("#btn-save-evaluation").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#evaluation_form").submit();
        });

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
                                        "{{ url('personnel/performance') }}";
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

        if ($("#award_form").length > 0) {
            $("#award_form").validate({
                rules: {
                    seq_no_award: {
                        required: true,
                    },
                    event_name: {
                        required: true,
                    },
                    award_date: {
                        required: true,
                    },
                    award_type: {
                        required: true,
                    },
                    award_name: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_award: {
                        required: "{{ __('personel_performance.seq_no_required') }}",
                    },
                    event_name: {
                        required: "{{ __('personel_performance.event_name_required') }}",
                    },
                    award_date: {
                        required: "{{ __('personel_performance.award_date_required') }}",
                    },
                    award_type: {
                        required: "{{ __('personel_performance.award_type_required') }}",
                    },
                    award_name: {
                        required: "{{ __('personel_performance.award_name_required') }}",
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
                    $("#btn-save-award").prop("disabled", false);
                    $("#btn-save-award").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
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
                        url: "{{ url('personnel/performance/award/proses') }}",
                        type: "POST",
                        data: $('#award_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-award").prop("disabled", false);
                                $("#btn-save-award").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
                                );
                                $('#modal_add_award').modal('hide');
                                $('#award_data_table').DataTable().destroy();
                                load_table_award('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-award").prop("disabled", false);
                                $("#btn-save-award").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
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
                            $("#btn-save-award").prop("disabled", false);
                            $("#btn-save-award").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
                            );
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#sanction_form").length > 0) {
            $("#sanction_form").validate({
                rules: {
                    seq_no_sanction: {
                        required: true,
                    },
                    decree_code: {
                        required: true,
                    },
                    decree_date: {
                        required: true,
                    },
                    decree_no: {
                        required: true,
                    },
                    sanction_code: {
                        required: true,
                    },
                    sanction_start_date: {
                        required: true,
                    },
                    sanction_end_date: {
                        required: true,
                    },
                    sanction_remarks: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_sanction: {
                        required: "{{ __('personel_performance.seq_no_required') }}",
                    },
                    decree_code: {
                        required: "{{ __('personel_performance.decree_code_required') }}",
                    },
                    decree_date: {
                        required: "{{ __('personel_performance.decree_date_required') }}",
                    },
                    decree_no: {
                        required: "{{ __('personel_performance.decree_no_required') }}",
                    },
                    sanction_code: {
                        required: "{{ __('personel_performance.sanction_code_required') }}",
                    },
                    sanction_start_date: {
                        required: "{{ __('personel_performance.sanction_start_date_required') }}",
                    },
                    sanction_end_date: {
                        required: "{{ __('personel_performance.sanction_end_date_required') }}",
                    },
                    sanction_remarks: {
                        required: "{{ __('personel_performance.sanction_remarks_required') }}",
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
                    $("#btn-save-sanction").prop("disabled", false);
                    $("#btn-save-sanction").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
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
                        url: "{{ url('personnel/performance/sanction/proses') }}",
                        type: "POST",
                        data: $('#sanction_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-sanction").prop("disabled", false);
                                $("#btn-save-sanction").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
                                );
                                $('#modal_add_sanction').modal('hide');
                                $('#sanction_data_table').DataTable().destroy();
                                load_table_sanction('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-sanction").prop("disabled", false);
                                $("#btn-save-sanction").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
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
                            $("#btn-save-sanction").prop("disabled", false);
                            $("#btn-save-sanction").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
                            );
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }

        if ($("#evaluation_form").length > 0) {
            $("#evaluation_form").validate({
                rules: {
                    seq_no_evaluation: {
                        required: true,
                    },
                    evaluation_period_from: {
                        required: true,
                    },
                    evaluation_period_to: {
                        required: true,
                    },
                    evaluation_date: {
                        required: true,
                    },
                    evaluator: {
                        required: true,
                    },
                    evaluation_form_code: {
                        required: true,
                    },
                    result: {
                        required: true,
                    },
                },
                messages: {
                    seq_no_evaluation: {
                        required: "{{ __('personel_performance.seq_no_required') }}",
                    },
                    evaluation_period_from: {
                        required: "{{ __('personel_performance.evaluation_period_from_required') }}",
                    },
                    evaluation_period_to: {
                        required: "{{ __('personel_performance.evaluation_period_to_required') }}",
                    },
                    evaluation_date: {
                        required: "{{ __('personel_performance.evaluation_date_required') }}",
                    },
                    evaluator: {
                        required: "{{ __('personel_performance.evaluator_required') }}",
                    },
                    evaluation_form_code: {
                        required: "{{ __('personel_performance.evaluation_form_code_required') }}",
                    },
                    result: {
                        required: "{{ __('personel_performance.result_required') }}",
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
                    $("#btn-save-evaluation").prop("disabled", false);
                    $("#btn-save-evaluation").html(
                        '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
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
                        url: "{{ url('personnel/performance/evaluation/proses') }}",
                        type: "POST",
                        data: $('#evaluation_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-evaluation").prop("disabled", false);
                                $("#btn-save-evaluation").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
                                );
                                $('#modal_add_evaluation').modal('hide');
                                $('#evaluation_data_table').DataTable().destroy();
                                load_table_evaluation('{{ $data[0]->employeeNo }}');
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-evaluation").prop("disabled", false);
                                $("#btn-save-evaluation").html(
                                    '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
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
                            $("#btn-save-evaluation").prop("disabled", false);
                            $("#btn-save-evaluation").html(
                                '<i class="fa fa-floppy-o"></i> {{ __("personel_performance.btn_save") }}'
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
