<!DOCTYPE html>
<html>

<head>
    <title><?php echo e(__('personel_employee_mutation.judul')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('css/personel_detail_data.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>">
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .div-title {
            margin-top: 8%;
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
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-blue.svg')); ?>" alt="Back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-white.svg')); ?>" class="functionbar-hover"
                    alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-blue.svg')); ?>" alt="Next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-white.svg')); ?>" class="functionbar-hover"
                    alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-new" target="iframe_dashboard">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-blue.svg')); ?>" alt="New">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-white.svg')); ?>" class="functionbar-hover"
                    alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-blue.svg')); ?>" alt="Edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-white.svg')); ?>" class="functionbar-hover"
                    alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover"
                    alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-active">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-checklist-blue.svg')); ?>" alt="Activate">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-checklist-white.svg')); ?>" class="functionbar-hover"
                    alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" style="display: none;" href="javascript:void(0)" id="toolbar-deactive">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-deactivate-blue.svg')); ?>" alt="Deactivate">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-deactivate-white.svg')); ?>" class="functionbar-hover"
                    alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-blue.svg')); ?>" alt="List">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-white.svg')); ?>" class="functionbar-hover"
                    alt="List">
                <span>List</span>
            </a>
        </div>
        <div class="div-title">
            <a href="<?php echo e(url()->previous()); ?>" target="iframe_dashboard">
                <img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
                <span class="title-text"><?php echo e(__('personel_employee_mutation.list')); ?></span>
            </a>
        </div>
        <div class="div-form">
            <form id="mutation_form" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="employee_no"><?php echo e(__('personel_employee_mutation.label_employee_no')); ?></label>
                            <select class="form-control select2" id="employee_no" name="employee_no" disabled></select>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5">
                        <div class="form-group">
                            <label
                                for="employee_name"><?php echo e(__('personel_employee_mutation.label_employee_name')); ?></label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name"
                                placeholder="<?php echo e(__('personel_employee_mutation.label_employee_name')); ?>" disabled>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label
                                for="attachment_code"><?php echo e(__('personel_employee_mutation.label_attachment_code')); ?></label>
                            <select class="form-control" id="attachment_code" name="attachment_code" disabled>
                                <option value=""><?php echo e(__('personel_employee_mutation.label_attachment_code')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label
                                for="attachment_no"><?php echo e(__('personel_employee_mutation.label_attachment_no')); ?></label>
                            <input type="text" class="form-control" id="attachment_no" name="attachment_no"
                                placeholder="<?php echo e(__('personel_employee_mutation.label_attachment_no')); ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label
                                for="attachment_date"><?php echo e(__('personel_employee_mutation.label_attachment_date')); ?></label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="attachment_date"
                                    name="attachment_date"
                                    placeholder="<?php echo e(__('personel_employee_mutation.label_attachment_date')); ?>">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label
                                for="mutation_type"><?php echo e(__('personel_employee_mutation.label_mutation_type')); ?></label>
                            <select class="form-control" id="mutation_type" name="mutation_type" disabled>
                                <option value=""><?php echo e(__('personel_employee_mutation.label_select_mutation_type')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-5">
                        <span class="div-title-text"><?php echo e(__('personel_employee_mutation.label_current')); ?></span>
                        <div class="row">
                            <div class="col-12" id="div_npwp_code_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="npwp_code_current"><?php echo e(__('personel_employee_mutation.label_npwp_code')); ?></label>
                                    <input type="text" class="form-control" id="npwp_code_current"
                                        name="npwp_code_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_npwp_code')); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_company_code_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="company_code_current"><?php echo e(__('personel_employee_mutation.label_company_code')); ?></label>
                                    <input type="text" class="form-control" id="company_code_current"
                                        name="company_code_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_company_code')); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_work_location_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="work_location_current"><?php echo e(__('personel_employee_mutation.label_work_location')); ?></label>
                                    <input type="text" class="form-control" id="work_location_current"
                                        name="work_location_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_work_location')); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_group_code_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="group_code_current"><?php echo e(__('personel_employee_mutation.label_group_code')); ?></label>
                                    <input type="text" class="form-control" id="group_code_current"
                                        name="group_code_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_group_code')); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_grade_code_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="grade_code_current"><?php echo e(__('personel_employee_mutation.label_grade_code')); ?></label>
                                    <input type="text" class="form-control" id="grade_code_current"
                                        name="grade_code_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_grade_code')); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_position_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="position_current"><?php echo e(__('personel_employee_mutation.label_position')); ?></label>
                                    <input type="text" class="form-control" id="position_current"
                                        name="position_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_position')); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_ranking_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="ranking_current"><?php echo e(__('personel_employee_mutation.label_ranking')); ?></label>
                                    <input type="text" class="form-control" id="ranking_current" name="ranking_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_ranking')); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_nature_of_work_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="nature_of_work_current"><?php echo e(__('personel_employee_mutation.label_nature_of_work')); ?></label>
                                    <input type="text" class="form-control" id="nature_of_work_current"
                                        name="nature_of_work_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_nature_of_work')); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_cost_center_code_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="cost_center_code_current"><?php echo e(__('personel_employee_mutation.label_cost_center_code')); ?></label>
                                    <input type="text" class="form-control" id="cost_center_code_current"
                                        name="cost_center_code_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_cost_center_code')); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-12" id="div_level_current" style="display: none;">
                                <span class="div-title-text">Level</span>
                                <div class="row" id="div-level-current">
                                </div>
                            </div>
                            <div class="col-12" id="div_initial_date_current" style="display: none;">
                                <div class="form-group">
                                    <label for="initial_date_current"><?php echo e(__('personel_employee_mutation.label_initial_date')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="initial_date_current"
                                            name="initial_date_current"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_initial_date')); ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="div_employment_status_current" style="display: none;">
                                <div class="form-group">
                                    <label
                                        for="employment_status_current"><?php echo e(__('personel_employee_mutation.label_employment_status')); ?></label>
                                    <input type="text" class="form-control" id="employment_status_current"
                                        name="employment_status_current"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_employment_status')); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="row" id="div_contract_date_current" style="display: none;">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label
                                            for="contract_start_date_current"><?php echo e(__('personel_employee_mutation.label_initial_contract_date')); ?></label>
                                        <input type="text" class="form-control" id="contract_start_date_current"
                                            name="contract_start_date_current"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_contract_start_date')); ?>"
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="contract_start_date_current">&nbsp;</label>
                                        <hr class="horizontal" />
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="contract_end_date_current">&nbsp;</label>
                                        <input type="text" class="form-control" id="contract_end_date_current"
                                            name="contract_end_date_current"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_contract_end_date')); ?>"
                                            disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <hr class="vertical" />
                    </div>
                    <div class="col-5">
                        <span class="div-title-text"><?php echo e(__('personel_employee_mutation.label_new')); ?></span>
                        <div class="row">
                            <div class="col-12" id="div_npwp_code_new" style="display: none;">
                                <div class="form-group">
                                    <label for="npwp_code_new"><?php echo e(__('personel_employee_mutation.label_npwp_code')); ?></label>
                                    <select class="form-control select2" id="npwp_code_new" name="npwp_code_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_period_start_date_new" style="display: none;">
                                <div class="form-group">
                                    <label for="period_start_date_new"><?php echo e(__('personel_employee_mutation.label_period_start_date')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="period_start_date_new"
                                            name="period_start_date_new"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_period_start_date')); ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="div_company_code_new" style="display: none;">
                                <div class="form-group">
                                    <label for="company_code_new"><?php echo e(__('personel_employee_mutation.label_company_code')); ?></label>
                                    <select class="form-control select2" id="company_code_new"
                                        name="company_code_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_change_employee_no_new" style="display: none;">
                                <div class="form-group">
                                    <label for="change_employee_no_new"><?php echo e(__('personel_employee_mutation.label_change_employee_no')); ?></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="change_employee_no_new"
                                            name="change_employee_no_new" value="true">
                                        <label
                                            for="change_employee_no_new"><?php echo e(__('personel_employee_mutation.label_change_employee_no')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="div_updated_employee_no_new" style="display: none;">
                                <div class="form-group">
                                    <label for="updated_employee_no_new"><?php echo e(__('personel_employee_mutation.label_updated_employee_no')); ?></label>
                                    <input type="text" class="form-control" id="updated_employee_no_new"
                                        name="updated_employee_no_new"
                                        placeholder="<?php echo e(__('personel_employee_mutation.label_updated_employee_no')); ?>">
                                </div>
                            </div>
                            <div class="col-12" id="div_work_location_new" style="display: none;">
                                <div class="form-group">
                                    <label for="work_location_new"><?php echo e(__('personel_employee_mutation.label_work_location')); ?></label>
                                    <select class="form-control select2" id="work_location_new" name="work_location_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_group_code_new" style="display: none;">
                                <div class="form-group">
                                    <label for="group_code_new"><?php echo e(__('personel_employee_mutation.label_group_code')); ?></label>
                                    <select class="form-control select2" id="group_code_new" name="group_code_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_grade_code_new" style="display: none;">
                                <div class="form-group">
                                    <label for="grade_code_new"><?php echo e(__('personel_employee_mutation.label_grade_code')); ?></label>
                                    <select class="form-control select2" id="grade_code_new" name="grade_code_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_position_new" style="display: none;">
                                <div class="form-group">
                                    <label for="position_new"><?php echo e(__('personel_employee_mutation.label_position')); ?></label>
                                    <select class="form-control select2" id="position_new" name="position_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_ranking_new" style="display: none;">
                                <div class="form-group">
                                    <label for="ranking_new"><?php echo e(__('personel_employee_mutation.label_ranking')); ?></label>
                                    <select class="form-control select2" id="ranking_new" name="ranking_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_nature_of_work_new" style="display: none;">
                                <div class="form-group">
                                    <label for="nature_of_work_new"><?php echo e(__('personel_employee_mutation.label_nature_of_work')); ?></label>
                                    <select class="form-control select2" id="nature_of_work_new"
                                        name="nature_of_work_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_cost_center_code_new" style="display: none;">
                                <div class="form-group">
                                    <label for="cost_center_code_new"><?php echo e(__('personel_employee_mutation.label_cost_center_code')); ?></label>
                                    <select class="form-control select2" id="cost_center_code_new"
                                        name="cost_center_code_new"></select>
                                </div>
                            </div>
                            <div class="col-12" id="div_level_new" style="display: none;">
                                <span class="div-title-text">Level</span>
                                <div class="row" id="div-level-new">
                                </div>
                            </div>
                            <div class="col-12" id="div_start_date_new" style="display: none;">
                                <div class="form-group">
                                    <label for="start_date_new"><?php echo e(__('personel_employee_mutation.label_start_date')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="start_date_new"
                                            name="start_date_new"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_start_date')); ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="div_employment_status_new" style="display: none;">
                                <div class="form-group">
                                    <label for="employment_status_new"><?php echo e(__('personel_employee_mutation.label_employment_status')); ?></label>
                                    <select class="form-control" id="employment_status_new" name="employment_status_new">
                                        <option value="">
                                            <?php echo e(__('personel_employee_mutation.label_select_employment_status')); ?>

                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="div_contract_date_new" style="display: none;">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="contract_start_date_new"><?php echo e(__('personel_employee_mutation.label_contract_date')); ?></label>
                                        <div class='input-group'>
                                            <input type="text" class="form-control" id="contract_start_date_new"
                                                name="contract_start_date_new"
                                                placeholder="<?php echo e(__('personel_employee_mutation.label_contract_start_date')); ?>">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <label for="contract_date_current">&nbsp;</label>
                                        <hr class="horizontal" />
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="contract_end_date_new">&nbsp;</label>
                                        <div class='input-group'>
                                            <input type="text" class="form-control" id="contract_end_date_new"
                                                name="contract_end_date_new"
                                                placeholder="<?php echo e(__('personel_employee_mutation.label_contract_end_date')); ?>">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="div_effective_permanent_date_new" style="display: none;">
                                <div class="form-group">
                                    <label for="effective_permanent_date_new"><?php echo e(__('personel_employee_mutation.label_effective_permanent_date')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="effective_permanent_date_new"
                                            name="effective_permanent_date_new"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_effective_permanent_date')); ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="div_termination_reason_new" style="display: none;">
                                <div class="form-group">
                                    <label for="termination_reason_new"><?php echo e(__('personel_employee_mutation.label_termination_reason')); ?></label>
                                    <select class="form-control" id="termination_reason_new" name="termination_reason_new">
                                        <option value="">
                                            <?php echo e(__('personel_employee_mutation.label_termination_reason')); ?>

                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12" id="div_termination_date_new" style="display: none;">
                                <div class="form-group">
                                    <label for="termination_date_new"><?php echo e(__('personel_employee_mutation.label_termination_date')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="termination_date_new"
                                            name="termination_date_new"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_termination_date')); ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="div_effective_termination_date_new" style="display: none;">
                                <div class="form-group">
                                    <label for="effective_termination_date_new"><?php echo e(__('personel_employee_mutation.label_effective_termination_date')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="effective_termination_date_new"
                                            name="effective_termination_date_new"
                                            placeholder="<?php echo e(__('personel_employee_mutation.label_effective_termination_date')); ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fa fa-calendar"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea rows="3" class="form-control" id="remarks" name="remarks"
                                placeholder="<?php echo e(__('personel_employee_mutation.label_remarks')); ?>" disabled></textarea>
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
                    <span id="message-notification-error"><?php echo e($errors->first()); ?></span>
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
                        <img src="<?php echo e(url('/pictures/checklist-green-confirm-password.svg')); ?>" alt="Password">
                        <span
                            class="title-text-notification"><?php echo e(__('personel_employee_mutation.alert_success')); ?></span>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="<?php echo e(asset('js/jquery.inputpicker.js')); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var employmentStatus;

        // let pickerAttachmentDate = $('#attachment_date').flatpickr({
        //     altInput: true,
        //     allowInput: true,
        //     altFormat: "j-M-y",
        //     dateFormat: "Y-m-d",
        //     defaultDate: "today",
        //     onReady: function () {
        //         var flatPickrInstance = this;
        //         console.log(flatPickrInstance);
        //         var $flatPickrInput = $(flatPickrInstance.element);
        //         $flatPickrInput.siblings(".input-group-prepend").click(function () {
        //             flatPickrInstance.toggle();
        //         });
        //     }
        // });

        let pickerPeriodStartDate = $('#period_start_date_new').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerStartDate = $('#start_date_new').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerInitialDate = $('#initial_date_current').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerContractStartDateCurrent = $('#contract_start_date_current').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerContractEndDateCurrent = $('#contract_end_date_current').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerContractStartDateNew = $('#contract_start_date_new').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerContractEndDateNew = $('#contract_end_date_new').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        let pickerEffectivePermanentDate = $('#effective_permanent_date_new').flatpickr({
            altInput: true,
            allowInput: true,
            altFormat: "j-M-y",
            dateFormat: "Y-m-d",
            defaultDate: "today",
            onReady: function () {
                var flatPickrInstance = this;
                console.log(flatPickrInstance);
                var $flatPickrInput = $(flatPickrInstance.element);
                $flatPickrInput.siblings(".input-group-prepend").click(function () {
                    flatPickrInstance.toggle();
                });
            }
        });

        // pickerAttachmentDate._input.setAttribute("disabled", "disabled");
        pickerInitialDate._input.setAttribute("disabled", "disabled");
        pickerContractEndDateCurrent._input.setAttribute("disabled", "disabled");
        pickerContractStartDateCurrent._input.setAttribute("disabled", "disabled");
        // pickerStartDate._input.setAttribute("disabled", "disabled");
        // pickerEffectivePermanentDate._input.setAttribute("disabled", "disabled");

        function htmlDecode(value) {
    	    return $("<textarea/>").html(value).text();
	    }

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "<?php echo e(url('personnel/employee_mutation')); ?>";
        })

        $.get("<?php echo e(url('mutation/type/api')); ?>", function (data) {
            $.each(data, function (k, v) {
                $('#mutation_type').append("<option value=" + v.comGenCode +
                    ">" + v
                    .value + "</option>");
            });
        });

        $.get("<?php echo e(url('termination/reason/api')); ?>", function (data) {
            $.each(data, function (k, v) {
                $('#termination_reason_new').append("<option value=" + v.comGenCode +
                    ">" + v
                    .value + "</option>");
            });
        });

        $.get("<?php echo e(url('employment/status/api')); ?>", function (data) {
            $.each(data, function (k, v) {
                $('#employment_status_new').append("<option value=" + v.comGenCode +
                    ">" + v
                    .value + "</option>");
            });
        });

        loadDataNPWPCode();
        loadDataEmployeeNo();
        loadDataCompanyCode();
        loadDataLocation();
        loadDataGroup();
        loadDataGrade();
        loadDataPosition();
        loadDataRanking();
        loadDataNatureofWork();
        loadDataCostCenter();

        $('#mutation_type').on('change', function () {
            if(this.value == "N"){
                $('#div_npwp_code_current').show();
                $('#div_npwp_code_new').show();
                $('#div_period_start_date_new').show();
                $('#div_company_code_current').hide();
                $('#div_company_code_new').hide();
                $('#div_work_location_current').hide();
                $('#div_work_location_new').hide();
                $('#div_group_code_current').hide();
                $('#div_group_code_new').hide();
                $('#div_grade_code_current').hide();
                $('#div_grade_code_new').hide();
                $('#div_position_current').hide();
                $('#div_position_new').hide();
                $('#div_ranking_current').hide();
                $('#div_ranking_new').hide();
                $('#div_nature_of_work_current').hide();
                $('#div_nature_of_work_new').hide();
                $('#div_cost_center_code_current').hide();
                $('#div_cost_center_code_new').hide();
                $('#div_level_current').hide();
                $('#div_level_new').hide();
                $('#div_employment_status_current').hide();
                $('#div_employment_status_new').hide();
                $('#div_contract_date_current').hide();
                $('#div_contract_date_new').hide();
                $('#div_initial_date_current').hide();
                $('#div_start_date_new').hide();
                $('#div_effective_permanent_date_new').hide();
                $('#div_change_employee_no_new').hide();
                $('#div_updated_employee_no_new').hide();
                $('#div_termination_reason_new').hide();
                $('#div_termination_date_new').hide();
                $('#div_effective_termination_date_new').hide();
            }else if(this.value == "M"){
                $('#div_company_code_current').show();
                $('#div_company_code_new').show();
                $('#div_start_date_new').show();
                $('#div_change_employee_no_new').show();
                $('#div_updated_employee_no_new').show();
                $('#div_work_location_current').show();
                $('#div_work_location_new').show();
                $('#div_group_code_current').show();
                $('#div_group_code_new').show();
                $('#div_grade_code_current').show();
                $('#div_grade_code_new').show();
                $('#div_position_current').show();
                $('#div_position_new').show();
                $('#div_ranking_current').show();
                $('#div_ranking_new').show();
                $('#div_nature_of_work_current').show();
                $('#div_nature_of_work_new').show();
                $('#div_cost_center_code_current').show();
                $('#div_cost_center_code_new').show();
                $('#div_level_current').show();
                $('#div_level_new').show();
                $('#div_npwp_code_current').hide();
                $('#div_npwp_code_new').hide();
                $('#div_period_start_date_new').hide();
                $('#div_employment_status_current').hide();
                $('#div_employment_status_new').hide();
                $('#div_contract_date_current').hide();
                $('#div_contract_date_new').hide();
                $('#div_initial_date_current').hide();
                $('#div_effective_permanent_date_new').hide();
                $('#div_termination_reason_new').hide();
                $('#div_termination_date_new').hide();
                $('#div_effective_termination_date_new').hide();
            }else if(this.value == "P" || this.value == "D"){
                $('#div_start_date_new').show();
                $('#div_initial_date_current').show();
                $('#div_work_location_current').show();
                $('#div_work_location_new').show();
                $('#div_group_code_current').show();
                $('#div_group_code_new').show();
                $('#div_grade_code_current').show();
                $('#div_grade_code_new').show();
                $('#div_position_current').show();
                $('#div_position_new').show();
                $('#div_ranking_current').show();
                $('#div_ranking_new').show();
                $('#div_nature_of_work_current').show();
                $('#div_nature_of_work_new').show();
                $('#div_cost_center_code_current').show();
                $('#div_cost_center_code_new').show();
                $('#div_level_current').show();
                $('#div_level_new').show();
                $('#div_company_code_current').hide();
                $('#div_company_code_new').hide();
                $('#div_change_employee_no_new').hide();
                $('#div_updated_employee_no_new').hide();
                $('#div_npwp_code_current').hide();
                $('#div_npwp_code_new').hide();
                $('#div_period_start_date_new').hide();
                $('#div_employment_status_current').hide();
                $('#div_employment_status_new').hide();
                $('#div_contract_date_current').hide();
                $('#div_contract_date_new').hide();
                $('#div_effective_permanent_date_new').hide();
                $('#div_termination_reason_new').hide();
                $('#div_termination_date_new').hide();
                $('#div_effective_termination_date_new').hide();
            }else if(this.value == "O"){
                $('#div_employment_status_current').show();
                $('#div_employment_status_new').show();
                if(employmentStatus == 'C'){
                    $('#div_contract_date_current').show();
                } else if(employmentStatus == 'P'){
                    $('#div_contract_date_current').show();
                } else{
                    $('#div_contract_date_current').hide();
                }
                $('#div_start_date_new').hide();
                $('#div_initial_date_current').hide();
                $('#div_work_location_current').hide();
                $('#div_work_location_new').hide();
                $('#div_group_code_current').hide();
                $('#div_group_code_new').hide();
                $('#div_grade_code_current').hide();
                $('#div_grade_code_new').hide();
                $('#div_position_current').hide();
                $('#div_position_new').hide();
                $('#div_ranking_current').hide();
                $('#div_ranking_new').hide();
                $('#div_nature_of_work_current').hide();
                $('#div_nature_of_work_new').hide();
                $('#div_cost_center_code_current').hide();
                $('#div_cost_center_code_new').hide();
                $('#div_level_current').hide();
                $('#div_level_new').hide();
                $('#div_company_code_current').hide();
                $('#div_company_code_new').hide();
                $('#div_change_employee_no_new').hide();
                $('#div_updated_employee_no_new').hide();
                $('#div_npwp_code_current').hide();
                $('#div_npwp_code_new').hide();
                $('#div_period_start_date_new').hide();
                $('#div_contract_date_new').hide();
                $('#div_effective_permanent_date_new').hide();
                $('#div_termination_reason_new').hide();
                $('#div_termination_date_new').hide();
                $('#div_effective_termination_date_new').hide();
            }else if(this.value == "T"){
                $('#div_employment_status_current').show();
                $('#div_termination_reason_new').show();
                $('#div_termination_date_new').show();
                $('#div_effective_termination_date_new').show();
                $('#div_employment_status_new').hide();
                $('#div_start_date_new').hide();
                $('#div_initial_date_current').hide();
                $('#div_work_location_current').hide();
                $('#div_work_location_new').hide();
                $('#div_group_code_current').hide();
                $('#div_group_code_new').hide();
                $('#div_grade_code_current').hide();
                $('#div_grade_code_new').hide();
                $('#div_position_current').hide();
                $('#div_position_new').hide();
                $('#div_ranking_current').hide();
                $('#div_ranking_new').hide();
                $('#div_nature_of_work_current').hide();
                $('#div_nature_of_work_new').hide();
                $('#div_cost_center_code_current').hide();
                $('#div_cost_center_code_new').hide();
                $('#div_level_current').hide();
                $('#div_level_new').hide();
                $('#div_company_code_current').hide();
                $('#div_company_code_new').hide();
                $('#div_change_employee_no_new').hide();
                $('#div_updated_employee_no_new').hide();
                $('#div_npwp_code_current').hide();
                $('#div_npwp_code_new').hide();
                $('#div_period_start_date_new').hide();
                $('#div_contract_date_current').hide();
                $('#div_contract_date_new').hide();
                $('#div_effective_permanent_date_new').hide();
            }else{
                $('#div_start_date_new').hide();
                $('#div_initial_date_current').hide();
                $('#div_work_location_current').hide();
                $('#div_work_location_new').hide();
                $('#div_group_code_current').hide();
                $('#div_group_code_new').hide();
                $('#div_grade_code_current').hide();
                $('#div_grade_code_new').hide();
                $('#div_position_current').hide();
                $('#div_position_new').hide();
                $('#div_ranking_current').hide();
                $('#div_ranking_new').hide();
                $('#div_nature_of_work_current').hide();
                $('#div_nature_of_work_new').hide();
                $('#div_cost_center_code_current').hide();
                $('#div_cost_center_code_new').hide();
                $('#div_level_current').hide();
                $('#div_level_new').hide();
                $('#div_company_code_current').hide();
                $('#div_company_code_new').hide();
                $('#div_change_employee_no_new').hide();
                $('#div_updated_employee_no_new').hide();
                $('#div_npwp_code_current').hide();
                $('#div_npwp_code_new').hide();
                $('#div_period_start_date_new').hide();
                $('#div_employment_status_current').hide();
                $('#div_employment_status_new').hide();
                $('#div_contract_date_current').hide();
                $('#div_contract_date_new').hide();
                $('#div_effective_permanent_date_new').hide();
                $('#div_termination_reason_new').hide();
                $('#div_termination_date_new').hide();
                $('#div_effective_termination_date_new').hide();
            }
        });
        
        $('#employment_status_new').on('change', function () {
            if(this.value == "C"){
                $('#div_contract_date_new').show();
                $('#div_effective_permanent_date_new').hide();
            }else{
                $('#div_contract_date_new').hide();
                $('#div_effective_permanent_date_new').show();
            }
        });

        $("#toolbar-new").on('click', function () {
            $("#toolbar-save").show();
            $("#toolbar-new").hide();
            $('#employee_no').prop('disabled', false);
            $('#mutation_type').prop('disabled', false);
            $('#attachment_code').prop('disabled', false);
            $('#attachment_no').prop('disabled', false);
            // pickerAttachmentDate._input.removeAttribute('disabled');
            $('#remarks').prop('disabled', false);
        });

        $('#employee_no').on("select2:select", function (e) {
            var data = $('#employee_no').select2('data');
            $('#employee_name').val(htmlDecode(data[0].title));

            $.ajax({
                url: "<?php echo e(url('personnel/employee_mutation/detail_data')); ?>",
                type: "GET",
                data: {
                    'employeeNo': data[0].id
                },
                success: function (response) {
                    $('#npwp_code_current').val(htmlDecode(response[0].mutationView.groupNPWP));
                    $('#company_code_current').val(htmlDecode(response[0].mutationView.companyCode));
                    $('#work_location_current').val(htmlDecode(response[0].mutationView.locationName));
                    $('#group_code_current').val(htmlDecode(response[0].mutationView.groupName));
                    $('#grade_code_current').val(htmlDecode(response[0].mutationView.gradeName));
                    $('#position_current').val(htmlDecode(response[0].mutationView.positionName));
                    $('#ranking_current').val(htmlDecode(response[0].mutationView.rankingName));
                    $('#nature_of_work_current').val(htmlDecode(response[0].mutationView
                        .workNatureName));
                    $('#cost_center_code_current').val(htmlDecode(response[0].mutationView
                        .costCenterDescription));
                    $('#initial_date_current').val(htmlDecode(response[0].mutationView.startDate));
                    $('#employment_status_current').val(htmlDecode(response[0].mutationView
                        .employmentStatusVal));
                    employmentStatus = response[0].mutationView.employmentStatus;
                    if(employmentStatus == 'C' && $('#mutation_type').val() == 'O'){
                        $('#div_contract_date_current').show();
                    } else if(employmentStatus == 'P' && $('#mutation_type').val() == 'O'){
                        $('#div_contract_date_current').show();
                    } else{
                        $('#div_contract_date_current').hide();
                    }
                    $('#contract_start_date_current').val(htmlDecode(response[0].mutationView
                        .contractStartDate));
                    $('#contract_end_date_current').val(htmlDecode(response[0].mutationView
                        .contractEndDate));
                    $('#div-level-current').html('');
                    $('#div-level-new').html('');

                    $.each(response[0].lastHistoryLevel, function (k, v) {
                        $('#div-level-current').append(
                            '<div class="col-12">' +
                            '<div class="form-group">' +
                            '<label for="level' + (k + 1) + '_current">Level ' +
                            v.levelType + ' Code</label>' +
                            '<input type="text" class="form-control" id="level' +
                            (k + 1) +
                            '_current" name="level_current[]" value="' + v
                            .levelCode + '" disabled>' +
                            '</div></div>'
                        );

                        loadDataLevelCode('#level' + v.levelType + '_new', v
                            .levelType);
                    });
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });

            $.ajax({
                url: "<?php echo e(url('personnel/report/level/check')); ?>",
                type: "GET",
                success: function (response) {
                    for (var i = 1; i <= response.data[0].levelFormat; i++) {
                        $('#div-level-new').append(
                            '<div class="col-12">' +
                            '<div class="form-group">' +
                            '<label for="level' + i +
                            '_new">Level ' + i + ' Code</label>' +
                            '<select class="form-control select2" id="level' + response.data_level[i - 1].levelType + '_new" name="level_new[]"></select>' +
                            '<input type="hidden" class="form-control" id="level_type' +
                            i +
                            '" name="level_type_new[]" value="' + response.data_level[i - 1].levelType + '">' +
                            '</div></div>'
                        );

                        loadDataLevelCode('#level' + response.data_level[i - 1].levelType + '_new', response.data_level[i - 1].levelType);
                    }
                },
                error: function (response) {
                    $('#notification_error').modal('show');
                    $('#message-notification-error').html(response);
                }
            });
        });

        $('#employee_no').on("select2:unselecting", function (e) {
            $('#employee_name').val('');
        });

        function loadDataNPWPCode() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-12">' + data.data.npwpCode + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#npwp_code_new').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-12"><b>NPWP Code</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#npwp_code_new').select2({
                width: '100%',
                placeholder: 'Choose NPWP',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/npwp/api')); ?>",
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
                                    text: item.npwpCode,
                                    id: item.npwpCode,
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

        function loadDataCompanyCode() {
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
            $('#company_code_new').on('select2:open', function (e) {
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

            $('#company_code_new').select2({
                width: '100%',
                placeholder: 'Choose Company',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/company/api')); ?>",
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
            $('#employee_no').on('select2:open', function (e) {
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

            $('#employee_no').select2({
                width: '100%',
                placeholder: 'Choose Employee',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/employee_no/api')); ?>",
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
                                    text: item.employeeNo,
                                    id: item.employeeNo,
                                    title: item.fullName,
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

        function loadDataLocation() {
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
            $('#work_location_new').on('select2:open', function (e) {
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

            $('#work_location_new').select2({
                width: '100%',
                placeholder: 'Choose Location',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/location/api')); ?>",
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

        function loadDataGroup() {
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
            $('#group_code_new').on('select2:open', function (e) {
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

            $('#group_code_new').select2({
                width: '100%',
                placeholder: 'Choose Group',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/group/api')); ?>",
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

        function loadDataGrade() {
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
            $('#grade_code_new').on('select2:open', function (e) {
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

            $('#grade_code_new').select2({
                width: '100%',
                placeholder: 'Choose Grade',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/grade/api')); ?>",
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

        function loadDataPosition() {
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
            $('#position_new').on('select2:open', function (e) {
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

            $('#position_new').select2({
                width: '100%',
                placeholder: 'Choose Position',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/position/api')); ?>",
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

        function loadDataRanking() {
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
            $('#ranking_new').on('select2:open', function (e) {
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

            $('#ranking_new').select2({
                width: '100%',
                placeholder: 'Choose Ranking',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/ranking/api')); ?>",
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
            $('#nature_of_work_new').on('select2:open', function (e) {
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

            $('#nature_of_work_new').select2({
                width: '100%',
                placeholder: 'Choose Work Nature',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/nature_of_work/api')); ?>",
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

        function loadDataCostCenter() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.costCenterCode + '</div>' +
                        '<div class="col-6">' + data.data.costCenterDescription + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#cost_center_code_new').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Cost Center Code</b></div>' +
                        '<div class="col-6"><b>Cost Center Name</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#cost_center_code_new').select2({
                width: '100%',
                placeholder: 'Choose Cost Center',
                allowClear: true,
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/cost_center/api')); ?>",
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
                                    text: item.costCenterDescription,
                                    id: item.costCenterCode,
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
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                language: {
                    errorLoading: function() {
                        return $search;
                    },
                    searching: function() {
                        return $search;
                    }
                },
                ajax: {
                    url: "<?php echo e(url('/level/api')); ?>",
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

        $("#toolbar-save").on('click', function () {
            $("#mutation_form").submit();
        });

        if ($("#mutation_form").length > 0) {
            $("#mutation_form").validate({
                rules: {
                    employee_no: {
                        required: true,
                    },
                    mutation_type: {
                        required: true,
                    },
                },
                messages: {
                    employee_no: {
                        required: "<?php echo e(__('personel_employee_mutation.employee_no_required')); ?>",
                    },
                    mutation_type: {
                        required: "<?php echo e(__('personel_employee_mutation.mutation_type_required')); ?>",
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
                        url: "<?php echo e(url('personnel/employee_mutation/proses')); ?>",
                        type: "POST",
                        data: $('#mutation_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "<?php echo e(url('personnel/employee_mutation')); ?>";
                                }, 3000);
                            } else {
                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "<?php echo e(__('login.error')); ?>");
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
    });

</script>

</html>
<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/personel/personel_employee_mutation.blade.php ENDPATH**/ ?>