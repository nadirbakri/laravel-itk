<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('tm_reference_time_management.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php echo e(asset('css/time_management_detail.css')); ?>">
	<style type="text/css">
		.div-time_management {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
        .modal-header-notification-error {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-notification-success {
            border-bottom:1px solid #eee;
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
            align-items:center;
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
	<div class="div-time_management">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-blue.svg')); ?>" alt="Back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-white.svg')); ?>" class="functionbar-hover" alt="Back">
                <span><?php echo e(__('tm_reference_time_management.label_back')); ?></span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-blue.svg')); ?>" alt="Next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-white.svg')); ?>" class="functionbar-hover" alt="Next">
                <span><?php echo e(__('tm_reference_time_management.label_next')); ?></span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-new" target="iframe_dashboard">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-blue.svg')); ?>" alt="New">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-white.svg')); ?>" class="functionbar-hover" alt="New">
                <span><?php echo e(__('tm_reference_time_management.label_new')); ?></span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-blue.svg')); ?>" alt="Edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-white.svg')); ?>" class="functionbar-hover" alt="Edit">
                <span><?php echo e(__('tm_reference_time_management.label_edit')); ?></span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">
                <span><?php echo e(__('tm_reference_time_management.btn_save')); ?></span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-blue.svg')); ?>" alt="List">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-white.svg')); ?>" class="functionbar-hover" alt="List">
                <span><?php echo e(__('tm_reference_time_management.label_list')); ?></span>
            </a>
        </div>
        <div class="div-title">
			<a href="<?php echo e(url('/time_management')); ?>" target="iframe_dashboard">
				<img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
				<span class="title-text"><?php echo e(__('tm_reference_time_management.list')); ?></span>
			</a>
        </div>
        <div class="div-form">
            <form id="reference_time_management_form" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="processing_period_month"><?php echo e(__('tm_reference_time_management.label_processing_period')); ?></label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="processing_period_month" name="processing_period_month"
                                    placeholder="<?php echo e(__('tm_reference_time_management.label_month')); ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-0.5">
                        <div class="form-group">
                            <label class="pt-1"><br></label>
                            <p style="font-size: 1.5rem;"><b>/</b></p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label><br></label>
                            <div class='input-group'>
                                <input type="text" class="form-control" id="processing_period_year" name="processing_period_year"
                                    placeholder="<?php echo e(__('tm_reference_time_management.label_year')); ?>" disabled>
                            </div>
                            <input type="hidden" class="form-control" id="record_function" name="record_function">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="period_status"><?php echo e(__('tm_reference_time_management.label_period_status')); ?></label>
                            <input type="number" class="form-control" id="period_status" name="period_status"
                                placeholder="<?php echo e(__('tm_reference_time_management.label_period_status')); ?>" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="process_status"><?php echo e(__('tm_reference_time_management.label_process_status')); ?></label>
                            <select class="form-control select2" id="process_status" name="process_status" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="template_preparation_process"><?php echo e(__('tm_reference_time_management.label_template_preparation_process')); ?></label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="template_preparation_process_shift"
                                    name="template_preparation_process" value="shift" disabled>
                                <label class="form-radio-label"
                                    for="template_preparation_process"><?php echo e(__('tm_reference_time_management.label_by_shift')); ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="template_preparation_process_blank"
                                    name="template_preparation_process" value="blank" disabled> 
                                <label class="form-radio-label"
                                    for="template_preparation_process"><?php echo e(__('tm_reference_time_management.label_blank')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="attendance_absent_code"><?php echo e(__('tm_reference_time_management.label_attendance')); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_in"><?php echo e(__('tm_reference_time_management.label_not_clock_in')); ?></label>
                            <select class="form-control select2" id="not_clock_in" name="not_clock_in" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="late"><?php echo e(__('tm_reference_time_management.label_late')); ?></label>
                            <select class="form-control select2" id="late" name="late" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_out"><?php echo e(__('tm_reference_time_management.label_not_clock_out')); ?></label>
                            <select class="form-control select2" id="not_clock_out" name="not_clock_out" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="early_back"><?php echo e(__('tm_reference_time_management.label_early_back')); ?></label>
                            <select class="form-control select2" id="early_back" name="early_back" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_in_early_back"><?php echo e(__('tm_reference_time_management.label_not_clock_in_early_back')); ?></label>
                            <select class="form-control select2" id="not_clock_in_early_back" name="not_clock_in_early_back" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="late_early_back"><?php echo e(__('tm_reference_time_management.label_late_early_back')); ?></label>
                            <select class="form-control select2" id="late_early_back" name="late_early_back" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="not_clock_out_late"><?php echo e(__('tm_reference_time_management.label_not_clock_out_late')); ?></label>
                            <select class="form-control select2" id="not_clock_out_late" name="not_clock_out_late" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="unpaid_leave"><?php echo e(__('tm_reference_time_management.label_unpaid_leave')); ?></label>
                            <select class="form-control select2" id="unpaid_leave" name="unpaid_leave" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="absent"><?php echo e(__('tm_reference_time_management.label_absent')); ?></label>
                            <select class="form-control select2" id="absent" name="absent" disabled></select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="overtime"><?php echo e(__('tm_reference_time_management.label_overtime')); ?></label>
                            <select class="form-control select2" id="overtime" name="overtime" disabled></select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="calculate_hour"><?php echo e(__('tm_reference_time_management.label_calculate_hour')); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="late_hour"><?php echo e(__('tm_reference_time_management.label_late_hour')); ?></label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="late_hour_normal_in"
                                    name="late_hour" value="normal" disabled>
                                <label class="form-radio-label"
                                    for="late_hour"><?php echo e(__('tm_reference_time_management.label_normal_in')); ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="late_hour_tolerance"
                                    name="late_hour" value="tolerance" disabled>
                                <label class="form-radio-label"
                                    for="late_hour"><?php echo e(__('tm_reference_time_management.label_normal_in_time_tolerance')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="early_back_hour"><?php echo e(__('tm_reference_time_management.label_early_back_hour')); ?></label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="early_back_normal_out"
                                    name="early_back_hour" value="normal" disabled>
                                <label class="form-radio-label"
                                    for="early_back_hour"><?php echo e(__('tm_reference_time_management.label_normal_out')); ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="early_back_hour_tolerance"
                                    name="early_back_hour" value="tolerance" disabled>
                                <label class="form-radio-label"
                                    for="early_back_hour"><?php echo e(__('tm_reference_time_management.label_normal_out_time_tolerance')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="overtime"><?php echo e(__('tm_reference_time_management.label_overtime')); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="default_calculation" disabled><?php echo e(__('tm_reference_time_management.label_default_calculation')); ?></label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="default_calculation_blank"
                                    name="default_calculation" value="blank" disabled>
                                <label class="form-radio-label"
                                    for="default_calculation"><?php echo e(__('tm_reference_time_management.label_blank')); ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="default_calculation_system"
                                    name="default_calculation" value="system" disabled>
                                <label class="form-radio-label"
                                    for="default_calculation"><?php echo e(__('tm_reference_time_management.label_calculated_by_system')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="overtime_before_from"><?php echo e(__('tm_reference_time_management.label_overtime_before_from')); ?></label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_before_from_normal"
                                    name="overtime_before_from" value="normal" disabled>
                                <label class="form-radio-label"
                                    for="overtime_before_from"><?php echo e(__('tm_reference_time_management.label_normal_in')); ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-3">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_before_from_overtime"
                                    name="overtime_before_from" value="overtime" disabled>
                                <label class="form-radio-label"
                                    for="overtime_before_from"><?php echo e(__('tm_reference_time_management.label_overtime_before')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label
                                for="overtime_after_from"><?php echo e(__('tm_reference_time_management.label_overtime_after_from')); ?></label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_after_from_normal"
                                    name="overtime_after_from" value="normal" disabled>
                                <label class="form-radio-label"
                                    for="overtime_after_from"><?php echo e(__('tm_reference_time_management.label_normal_out')); ?></label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-2">
                        <div class="form-group">
                            <div class="form-radio">
                                <input class="form-radio-input" type="radio" id="overtime_after_from_overtime"
                                    name="overtime_after_from" value="overtime" disabled>
                                <label class="form-radio-label"
                                    for="overtime_after_from"><?php echo e(__('tm_reference_time_management.label_overtime_after')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="minute_rounded"><?php echo e(__('tm_reference_time_management.label_minute_rounded')); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="div-table col-6">
                    <table id="minutes_rounded_table" class="table hover  width: 100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?php echo e(__('tm_reference_time_management.label_from')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_to')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_become')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-minutes-rounded" id="btn-add-minutes-rounded"
                            style="width: 100%;" data-toggle="modal" data-target="#modal_add_minutes_rounded" disabled>
                            <i class="fa fa-plus"></i> <?php echo e(__('tm_reference_time_management.btn_add')); ?>

                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-minutes-rounded" id="btn-remove-minutes-rounded"
                            style="width: 100%;" disabled>
                            <i class="fa fa-times"></i> <?php echo e(__('tm_reference_time_management.btn_remove')); ?>

                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <h5
                                for="hour_deduction"><?php echo e(__('tm_reference_time_management.label_hour_deduction')); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="div-table col-12">
                    <table id="reference_time_management_table" class="table hover  width: 100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th><?php echo e(__('tm_reference_time_management.label_day')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_description')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_from1')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_to1')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_hour1')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_from2')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_to2')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_hour2')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_every')); ?></th>
                                <th><?php echo e(__('tm_reference_time_management.label_hour')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-reference-time-management" id="btn-add-reference-time-management"
                            style="width: 100%;" data-toggle="modal" data-target="#modal_add_reference_time_management" disabled>
                            <i class="fa fa-plus"></i> <?php echo e(__('tm_reference_time_management.btn_add')); ?>

                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-data" id="btn-remove-data"
                            style="width: 100%;" disabled>
                            <i class="fa fa-times"></i> <?php echo e(__('tm_reference_time_management.btn_remove')); ?>

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_add_minutes_rounded"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('tm_reference_time_management.list_minutes_rounded')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="minutes_rounded_form" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="minute_rounded_from"><?php echo e(__('tm_reference_time_management.label_from')); ?></label>
                                    <div class='input-group'>
                                        <input type="number" class="form-control" id="minute_rounded_from" name="minute_rounded_from"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_from')); ?>" min="0" max="60">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="minute_rounded_to"><?php echo e(__('tm_reference_time_management.label_to')); ?></label>
                                    <div class='input-group'>
                                        <input type="number" class="form-control" id="minute_rounded_to" name="minute_rounded_to"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_to')); ?>" min="0" max="60">                          
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="minute_rounded_become"><?php echo e(__('tm_reference_time_management.label_become')); ?></label>
                                    <div class='input-group'>
                                        <input type="number" class="form-control" id="minute_rounded_become" name="minute_rounded_become"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_become')); ?>" min="0" max="60">                              
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" id="btn-save-minutes-rounded" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> <?php echo e(__('tm_reference_time_management.btn_save')); ?></button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> <?php echo e(__('tm_reference_time_management.btn_cancel')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_reference_time_management"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('tm_reference_time_management.list_ovt_deduct')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reference_time_management_detail_form" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="deduct_day"><?php echo e(__('tm_reference_time_management.label_deduct_day')); ?></label>
                                    <select class="form-control select2" id="deduct_day" name="deduct_day"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <h6
                                        for="deduction1"><?php echo e(__('tm_reference_time_management.label_deduction1')); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction1_from"><?php echo e(__('tm_reference_time_management.label_from')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction1_from" name="deduction1_from"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_from')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction1_to"><?php echo e(__('tm_reference_time_management.label_to')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction1_to" name="deduction1_to"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_to')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction1_deduct"><?php echo e(__('tm_reference_time_management.label_deduct')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction1_deduct" name="deduction1_deduct"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_deduct')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <h6
                                        for="deduction2"><?php echo e(__('tm_reference_time_management.label_deduction2')); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction2_from"><?php echo e(__('tm_reference_time_management.label_from')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction2_from" name="deduction2_from"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_from')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction2_to"><?php echo e(__('tm_reference_time_management.label_to')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction2_to" name="deduction2_to"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_to')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction2_deduct"><?php echo e(__('tm_reference_time_management.label_deduct')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction2_deduct" name="deduction2_deduct"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_deduct')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <h6
                                        for="deduction3"><?php echo e(__('tm_reference_time_management.label_deduction3')); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction3_every"><?php echo e(__('tm_reference_time_management.label_every')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction3_every" name="deduction3_every"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_to')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="deduction3_deduct"><?php echo e(__('tm_reference_time_management.label_deduct')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control deduct_timepicker" id="deduction3_deduct" name="deduction3_deduct"
                                            placeholder="<?php echo e(__('tm_reference_time_management.label_deduct')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="submit" id="btn-save-overtime-spl" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> <?php echo e(__('tm_reference_time_management.btn_save')); ?></button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> <?php echo e(__('tm_reference_time_management.btn_cancel')); ?></button>
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
                        <span class="title-text-notification"><?php echo e(__('tm_reference_time_management.alert_success')); ?></span>
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
                        <img src="<?php echo e(url('/pictures/checklist-green-confirm-password.svg')); ?>" alt="Password">
                        <span class="title-text-notification"><?php echo e(__('tm_reference_time_management.alert_success')); ?></span>
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="<?php echo e(asset('js/jquery.inputpicker.js')); ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var table = null;
        var table_minutes = null;
        var arrData = <?php echo json_encode($data, 15, 512) ?>;
        var arrayMinutesRounded = [];

        let deduction1_from = $('#deduction1_from').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        let deduction1_to = $('#deduction1_to').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        let deduction1_deduct = $('#deduction1_deduct').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        let deduction2_from = $('#deduction2_from').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        let deduction2_to = $('#deduction2_to').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        let deduction2_deduct = $('#deduction2_deduct').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        let deduction3_every = $('#deduction3_every').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        let deduction3_deduct = $('#deduction3_deduct').flatpickr({
            enableTime: true,
            noCalendar: true,
            altInput: true,
            // static: true,
            allowInput: true,
            time_24hr: true,
            minuteIncrement: 1,
            defaultDate: "today",
            altFormat: "H:i",
            dateFormat: "H:i:ss"
        });

        // var attrMinuteRoundedFrom = $('#minute_rounded_from');
        // var attrMinuteRoundedTo = $('#minute_rounded_to');
        // var attrMinuteRoundedBecome = $('#minute_rounded_become');

        // for (var i = 0; i <= 60; i++){
        //     if(i == 0){
        //         attrMinuteRoundedFrom.append($('<option/>').val(i).text(i));
        //     }else if(i == 60){
        //         attrMinuteRoundedTo.append($('<option/>').val(i).text(i));
        //     }else{
        //         attrMinuteRoundedFrom.append($('<option/>').val(i).text(i));
        //         attrMinuteRoundedTo.append($('<option/>').val(i).text(i));
        //     }
        //     attrMinuteRoundedBecome.append($('<option/>').val(i).text(i));
        // }

        loadDataProcessStatus();
        loadDataAbsent();
        loadDataDeductDay();

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        if (arrData) {
            $('#processing_period_month').val(((typeof arrData[0].periodMonth !== 'undefined') ? arrData[0].periodMonth : ''));
            $('#processing_period_year').val(((typeof arrData[0].periodYear !== 'undefined') ? arrData[0].periodYear : ''));
            $('#period_status').val(((typeof arrData[0].statusPeriod !== 'undefined') ? arrData[0].statusPeriod : ''));
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/process_status/detail/api')); ?>",
                data: {
                    'processStatus' : arrData[0].statusProcess
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .comGenCode).text(data2[0].value);
                $("#process_status").append($newOption).trigger('change');
            });
            if (typeof arrData[0].templatePreparation !== 'undefined') {
                if(arrData[0].templatePreparation.toLowerCase() == "shift") {
                    $('#template_preparation_process_shift').prop('checked', true).trigger('change');
                } else if(arrData[0].templatePreparation.toLowerCase() == "blank") {
                    $('#template_preparation_process_blank').prop('checked', true).trigger('change');
                }
            }
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].noTimeInCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#not_clock_in").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].noTimeOutCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#not_clock_out").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].lateCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#late").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].earlybackCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#early_back").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].noTimeInEarlybackCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#not_clock_in_early_back").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].lateEarlybackCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#late_early_back").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].lateNoTimeOutCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#not_clock_out_late").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].unpaidLeaveCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#unpaid_leave").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].absentCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#absent").append($newOption).trigger('change');
            });
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/absent_code/func/api')); ?>",
                data: {
                    'absentCode' : arrData[0].overtimeCode
                }
            }).then(function (data2) {
                var $newOption = $("<option selected='selected'></option>").val(data2[0]
                    .absentCode).text(data2[0].absentCode);
                $("#overtime").append($newOption).trigger('change');
            });
            if (typeof arrData[0].calculateLateHour !== 'undefined') {
                if(arrData[0].calculateLateHour.toLowerCase() == "normal") {
                    $('#late_hour_normal_in').prop('checked', true).trigger('change');
                } else if(arrData[0].calculateLateHour.toLowerCase() == "tolerance") {
                    $('#late_hour_tolerance').prop('checked', true).trigger('change');
                }
            }
            if (typeof arrData[0].calculateEarlyBackHour !== 'undefined') {
                if(arrData[0].calculateEarlyBackHour.toLowerCase() == "normal") {
                    $('#early_back_normal_out').prop('checked', true).trigger('change');
                } else if(arrData[0].calculateEarlyBackHour.toLowerCase() == "tolerance") {
                    $('#early_back_hour_tolerance').prop('checked', true).trigger('change');
                }
            }
            if (typeof arrData[0].calculateOvertime !== 'undefined') {
                if(arrData[0].calculateOvertime.toLowerCase() == "blank") {
                    $('#default_calculation_blank').prop('checked', true).trigger('change');
                } else if(arrData[0].calculateOvertime.toLowerCase() == "system") {
                    $('#default_calculation_system').prop('checked', true).trigger('change');
                }
            }
            if (typeof arrData[0].ovtBeforeHourFrom !== 'undefined') {
                if(arrData[0].ovtBeforeHourFrom.toLowerCase() == "normal") {
                    $('#overtime_before_from_normal').prop('checked', true).trigger('change');
                } else if(arrData[0].ovtBeforeHourFrom.toLowerCase() == "overtime") {
                    $('#overtime_before_from_overtime').prop('checked', true).trigger('change');
                }
            }
            if (typeof arrData[0].ovtAfterHourFrom !== 'undefined') {
                if(arrData[0].ovtAfterHourFrom.toLowerCase() == "normal") {
                    $('#overtime_after_from_normal').prop('checked', true).trigger('change');
                } else if(arrData[0].ovtAfterHourFrom.toLowerCase() == "overtime") {
                    $('#overtime_after_from_overtime').prop('checked', true).trigger('change');
                }
            }
            if(arrData[0].ovtRounded.length > 0){
                for (const obj of arrData[0].ovtRounded) {
                    arrayMinutesRounded.push({
                        "from": obj.minutesFrom,
                        "to": obj.minutesTo,
                        "become": obj.become
                    });
                }
            }
            // load_data_table_minutes_rounded();
            // var minuteRoundedFrom = parseInt(moment(arrData[0].ovtRoundedFrom).format('mm'));
            // $('#minute_rounded_from').val(minuteRoundedFrom.toString()).trigger('change');
            // var minuteRoundedTo = parseInt(moment(arrData[0].ovtRoundedTo).format('mm'));
            // $('#minute_rounded_to').val(minuteRoundedTo.toString()).trigger('change');
            // var minuteRoundedBecome = parseInt(moment(arrData[0].ovtRoundedBecome).format('mm'));
            // $('#minute_rounded_become').val(minuteRoundedBecome.toString()).trigger('change');
            $("#toolbar-new").hide();
            $("#toolbar-edit").show();
        } else {
            $('#processing_period_month').val("");
            $('#processing_period_year').val("");
            $('#period_status').val("");
            $('#template_preparation_process_shift').prop('checked', true).trigger('change');
            $('#late_hour_normal_in').prop('checked', true).trigger('change');
            $('#early_back_normal_out').prop('checked', true).trigger('change');
            $('#default_calculation_blank').prop('checked', true).trigger('change');
            $('#overtime_before_from_normal').prop('checked', true).trigger('change');
            $('#overtime_after_from_normal').prop('checked', true).trigger('change');
            $('#minute_rounded_from').val("0");
            $('#minute_rounded_to').val("1");
            $('#minute_rounded_become').val("0");
            $('#minutes_rounded_table').DataTable().destroy();
            load_data_table_minutes_rounded();
            $("#toolbar-new").show();
            $("#toolbar-edit").hide();
        }

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

            var headerIsAppend = false;
            $('#process_status').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-12"><b>Process Status</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

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
                    url: "<?php echo e(url('/process_status/api')); ?>",
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

        function loadDataAbsent() {
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' +
                        '<div class="col-6">' + data.data.absentCode + '</div>' +
                        '<div class="col-6">' + data.data.description + '</div>' +
                        '</div>');

                    return $result2;
                }
            }

            var headerIsAppend = false;
            $('#not_clock_in, #not_clock_out, #late, #early_back, #not_clock_in_early_back, #late_early_back, #not_clock_out_late, #unpaid_leave, #absent, #overtime').on('select2:open', function (e) {
                if (!headerIsAppend) {
                    html = '<div class="row">' +
                        '<div class="col-6"><b>Absent Code</b></div>' +
                        '<div class="col-6"><b>Description</b></div>' +
                        '</div>';
                    $('.select2-search--dropdown').append(html);
                    headerIsAppend = true;
                }
            });

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#not_clock_in, #not_clock_out, #late, #early_back, #not_clock_in_early_back, #late_early_back, #not_clock_out_late, #unpaid_leave, #absent, #overtime').select2({
                width: '100%',
                placeholder: 'Choose Absent',
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
                    url: "<?php echo e(url('/absent_code/api')); ?>",
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
                                    text: item.absentCode,
                                    id: item.absentCode,
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

        $('.div-navbar a.disabled').attr('onclick', 'return false;');

        $('#reference_time_management_table thead tr').clone(true).appendTo('#reference_time_management_table thead');
        $('#reference_time_management_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
    
            $('input', this).on('keyup change', function () {
                if (table.column(i + 1).search() !== this.value) {
                    table
                        .column(i + 1)
                        .search(this.value)
                        .draw();
                }
            } );
        });

        $('#minutes_rounded_table').DataTable().destroy();
        $('#reference_time_management_table').DataTable().destroy();
        load_data_table_minutes_rounded();
        load_data_table_reference_time_management();

        function load_data_table_minutes_rounded() {
            table_minutes = $('#minutes_rounded_table').DataTable({
                processing: true,
                data: arrayMinutesRounded,
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [
                    [1, "asc"]
                ],
                columns: [
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'from',
                        name: 'from'
                    },
                    {
                        data: 'to',
                        name: 'to'
                    },
                    {
                        data: 'become',
                        name: 'become'
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#minutes_rounded_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#minutes_rounded_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_data_table_reference_time_management() {
            table = $('#reference_time_management_table').DataTable({
                processing: true,
                orderCellsTop: true,
                ajax: "<?php echo e(url('time_management/reference_time_management/table')); ?>",
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                "order": [[ 1, "asc" ]],
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type, row) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'deductOvtDay', name: 'deductOvtDay'},
                    {data: 'description', name: 'description'},
                    {
                        data: 'deductFrom1', 
                        name: 'deductFrom1',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'deductTo1', 
                        name: 'deductTo1',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'deductHour1', 
                        name: 'deductHour1',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'deductFrom2', 
                        name: 'deductFrom2',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'deductTo2', 
                        name: 'deductTo2',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'deductHour2', 
                        name: 'deductHour2',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'deductEvery3', 
                        name: 'deductEvery3',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    },
                    {
                        data: 'deductHour3', 
                        name: 'deductHour3',
                        render: function (data, type, row) {
                            return moment(data).format('HH:mm');
                        }
                    }
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#reference_time_management_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#reference_time_management_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function loadDataDeductDay() {
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

            $('#deduct_day').select2({
                width: '100%',
                placeholder: 'Choose Deduct Day',
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
                    url: "<?php echo e(url('/deduct_day/api')); ?>",
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

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "<?php echo e(url('time_management/reference_time_management')); ?>";
        })

        $("#toolbar-new").on('click', function() {
            $('#record_function').val("New");
            $('#processing_period_month').val("");
            $('#processing_period_year').val("");
            $('#period_status').val("");
            $('#template_preparation_process_shift').prop('checked', true).trigger('change');
            $('#late_hour_normal_in').prop('checked', true).trigger('change');
            $('#early_back_normal_out').prop('checked', true).trigger('change');
            $('#default_calculation_blank').prop('checked', true).trigger('change');
            $('#overtime_before_from_normal').prop('checked', true).trigger('change');
            $('#overtime_after_from_normal').prop('checked', true).trigger('change');
            $('#minutes_rounded_table').DataTable().destroy();
            load_data_table_minutes_rounded();
            $('#reference_time_management_table').DataTable().destroy();
            load_data_table_reference_time_management();
            $('#processing_period_month').prop('disabled', false);
            $('#processing_period_year').prop('disabled', false);
            $('#period_status').prop('disabled', false);
            $('#process_status').prop('disabled', false);
            $('#template_preparation_process_shift').prop('disabled', false).trigger('change');
            $('#template_preparation_process_blank').prop('disabled', false).trigger('change');
            $('#not_clock_in').prop('disabled', false);
            $('#late').prop('disabled', false);
            $('#not_clock_out').prop('disabled', false);
            $('#early_back').prop('disabled', false);
            $('#not_clock_in_early_back').prop('disabled', false);
            $('#late_early_back').prop('disabled', false);
            $('#not_clock_out_late').prop('disabled', false);
            $('#unpaid_leave').prop('disabled', false);
            $('#absent').prop('disabled', false);
            $('#overtime').prop('disabled', false);
            $('#late_hour_normal_in').prop('disabled', false).trigger('change');
            $('#late_hour_tolerance').prop('disabled', false).trigger('change');
            $('#early_back_normal_out').prop('disabled', false).trigger('change');
            $('#early_back_hour_tolerance').prop('disabled', false).trigger('change');
            $('#default_calculation_blank').prop('disabled', false).trigger('change');
            $('#default_calculation_system').prop('disabled', false).trigger('change');
            $('#overtime_before_from_normal').prop('disabled', false).trigger('change');
            $('#overtime_before_from_overtime').prop('disabled', false).trigger('change');
            $('#overtime_after_from_normal').prop('disabled', false).trigger('change');
            $('#overtime_after_from_overtime').prop('disabled', false).trigger('change');
            $('#btn-add-minutes-rounded').prop('disabled', false);
            $('#btn-remove-minutes-rounded').prop('disabled', false);
            $('#btn-add-reference-time-management').prop('disabled', false);
            $('#btn-remove-data').prop('disabled', false);
            $("#toolbar-save").show();
        });

        $("#toolbar-edit").on('click', function() {
            $('#record_function').val("Edit");
            $('#processing_period_month').prop('disabled', false);
            $('#processing_period_year').prop('disabled', false);
            $('#period_status').prop('disabled', false);
            $('#process_status').prop('disabled', false);
            $('#template_preparation_process_shift').prop('disabled', false).trigger('change');
            $('#template_preparation_process_blank').prop('disabled', false).trigger('change');
            $('#not_clock_in').prop('disabled', false);
            $('#late').prop('disabled', false);
            $('#not_clock_out').prop('disabled', false);
            $('#early_back').prop('disabled', false);
            $('#not_clock_in_early_back').prop('disabled', false);
            $('#late_early_back').prop('disabled', false);
            $('#not_clock_out_late').prop('disabled', false);
            $('#unpaid_leave').prop('disabled', false);
            $('#absent').prop('disabled', false);
            $('#overtime').prop('disabled', false);
            $('#late_hour_normal_in').prop('disabled', false).trigger('change');
            $('#late_hour_tolerance').prop('disabled', false).trigger('change');
            $('#early_back_normal_out').prop('disabled', false).trigger('change');
            $('#early_back_hour_tolerance').prop('disabled', false).trigger('change');
            $('#default_calculation_blank').prop('disabled', false).trigger('change');
            $('#default_calculation_system').prop('disabled', false).trigger('change');
            $('#overtime_before_from_normal').prop('disabled', false).trigger('change');
            $('#overtime_before_from_overtime').prop('disabled', false).trigger('change');
            $('#overtime_after_from_normal').prop('disabled', false).trigger('change');
            $('#overtime_after_from_overtime').prop('disabled', false).trigger('change');
            $('#btn-add-minutes-rounded').prop('disabled', false);
            $('#btn-remove-minutes-rounded').prop('disabled', false);
            $('#btn-add-reference-time-management').prop('disabled', false);
            $('#btn-remove-data').prop('disabled', false);
            $("#toolbar-save").show();
            $('#reference_time_management_table').DataTable().destroy();
            load_data_table_reference_time_management();
        });

        $("#toolbar-save").on('click', function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#reference_time_management_form").submit();
        });

        $("#btn-save-minutes-rounded").on('click', function() {
            
        });

        $("#btn-add-minutes-rounded").on('click', function() {
            $('#minute_rounded_from').val("0");
            $('#minute_rounded_to').val("1");
            $('#minute_rounded_become').val("0");
        });

        $("#btn-remove-minutes-rounded").on('click', function () {
            var data = table_minutes.rows('.selected').data();
            if (data.length > 0) {
                for (var i = 0; i < data.length; i++) {
                    var index = arrayMinutesRounded.findIndex(function(itm) {
                        return itm.from === data[i].from && itm.to === data[i].to && itm.become === data[i].become;
                    });
                    // console.log(index);
                    arrayMinutesRounded.splice(index, 1);
                }
                $('#minutes_rounded_table').DataTable().destroy();
                load_data_table_minutes_rounded();
            } else {
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-add-reference-time-management").on('click', function() {
            deduction1_from.setDate("00:00");
            deduction1_to.setDate("00:00");
            deduction1_deduct.setDate("00:00");
            deduction2_from.setDate("00:00");
            deduction2_to.setDate("00:00");
            deduction2_deduct.setDate("00:00");
            deduction3_every.setDate("00:00");
            deduction3_deduct.setDate("00:00");
        });

        $("#btn-remove-data").on('click', function () {
            var data = table.rows('.selected').data().toArray();
            if (data.length > 0) {
                $.ajax({
                    url: "<?php echo e(url('time_management/reference_time_management/detail/remove')); ?>",
                    type: "GET",
                    data: {
                        'data': data
                    },
                    success: function (response) {
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                    .message);
                            $('#reference_time_management_table').DataTable().destroy();
                            load_data_table_reference_time_management();
                            setTimeout(function () {
                                $('#notification_success').modal('hide');
                            }, 3000);
                        } else {
                            $('#notification_error').modal('show');
                            if (response.message == null || response.message == '') {
                                $('#message-notification-error').html(
                                    "<?php echo e(__('login.error')); ?>");
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

        if ($("#minutes_rounded_form").length > 0) {
            $("#minutes_rounded_form").validate({
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
                    $(this).prop("disabled", true);
                    $(this).html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                    );

                    arrayMinutesRounded.push({
                        "from": $("#minute_rounded_from").val(),
                        "to": $("#minute_rounded_to").val(),
                        "become": $("#minute_rounded_become").val()
                    });

                    $('#minute_rounded_from').val("0");
                    $('#minute_rounded_to').val("1");
                    $('#minute_rounded_become').val("0");

                    $(this).prop("disabled", false);
                    $(this).html(
                        '<i class="fa fa-floppy-o"></i> <?php echo e(__("tm_reference_time_management.btn_save")); ?>'
                    );
                    $('#modal_add_minutes_rounded').modal('hide');
                    
                    $('#minutes_rounded_table').DataTable().destroy();
                    load_data_table_minutes_rounded();
                }
            })
        }

        if ($("#reference_time_management_detail_form").length > 0) {
            $("#reference_time_management_detail_form").validate({
                rules: {
                    deduct_day: {
                        required: true,
                    },
                },
                messages: {
                    deduct_day: {
                        required: "<?php echo e(__('tm_reference_time_management.deduct_day_required')); ?>",
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
                        url: "<?php echo e(url('time_management/reference_time_management/detail/proses')); ?>",
                        type: "POST",
                        data: $('#reference_time_management_detail_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save-overtime-spl").prop("disabled", false);
                                $("#btn-save-overtime-spl").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("tm_reference_time_management.btn_save")); ?>'
                                );

                                $('#modal_add_reference_time_management').modal('hide');
                                $('#notification_success_detail').modal('show');
                                $('#message-notification-success-detail').html(response
                                    .message);

                                $('#reference_time_management_table').DataTable().destroy();
                                load_data_table_reference_time_management();

                                setTimeout(function () {
                                    $('#notification_success_detail').modal('hide');
                                }, 3000);
                            } else {
                                $("#btn-save-overtime-spl").prop("disabled", false);
                                $("#btn-save-overtime-spl").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("tm_reference_time_management.btn_save")); ?>'
                                );

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
                            $("#btn-save-overtime-spl").prop("disabled", false);
                            $("#btn-save-overtime-spl").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("tm_reference_time_management.btn_save")); ?>'
                                );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }

        if ($("#reference_time_management_form").length > 0) {
            $("#reference_time_management_form").validate({
                rules: {
                    processing_period_month: {
                        required: true,
                    },
                    processing_period_year: {
                        required: true,
                    },
                    period_status: {
                        required: true,
                    },
                    process_status: {
                        required: true,
                    },
                    not_clock_in: {
                        required: true,
                    },
                    late: {
                        required: true,
                    },
                    not_clock_out: {
                        required: true,
                    },
                    early_back: {
                        required: true,
                    },
                    not_clock_in_early_back: {
                        required: true,
                    },
                    late_early_back: {
                        required: true,
                    },
                    not_clock_out_late: {
                        required: true,
                    },
                    absent: {
                        required: true,
                    },
                },
                messages: {
                    processing_period_month: {
                        required: "<?php echo e(__('tm_reference_time_management.processing_period_month_required')); ?>",
                    },
                    processing_period_year: {
                        required: "<?php echo e(__('tm_reference_time_management.processing_period_year_required')); ?>",
                    },
                    period_status: {
                        required: "<?php echo e(__('tm_reference_time_management.period_status_required')); ?>",
                    },
                    process_status: {
                        required: "<?php echo e(__('tm_reference_time_management.process_status_required')); ?>",
                    },
                    not_clock_in: {
                        required: "<?php echo e(__('tm_reference_time_management.not_clock_in_required')); ?>",
                    },
                    late: {
                        required: "<?php echo e(__('tm_reference_time_management.late_required')); ?>",
                    },
                    not_clock_out: {
                        required: "<?php echo e(__('tm_reference_time_management.not_clock_out_required')); ?>",
                    },
                    early_back: {
                        required: "<?php echo e(__('tm_reference_time_management.early_back_required')); ?>",
                    },
                    not_clock_in_early_back: {
                        required: "<?php echo e(__('tm_reference_time_management.not_clock_in_early_back_required')); ?>",
                    },
                    late_early_back: {
                        required: "<?php echo e(__('tm_reference_time_management.late_early_back_required')); ?>",
                    },
                    not_clock_out_late: {
                        required: "<?php echo e(__('tm_reference_time_management.not_clock_out_late_required')); ?>",
                    },
                    absent: {
                        required: "<?php echo e(__('tm_reference_time_management.absent_required')); ?>",
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
                    $("#toolbar-save").prop("disabled", false);
                    $("#toolbar-save").html(
                        '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">'+
                        '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">'+
                        '<span><?php echo e(__("tm_reference_time_management.btn_save")); ?></span>'
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
                        url: "<?php echo e(url('time_management/reference_time_management/proses')); ?>",
                        type: "POST",
                        data: { 'field' : $('#reference_time_management_form').serialize(), 'field_name' : JSON.stringify(arrayMinutesRounded) },
                        success: function (response) {
                            if (response.status == "true") {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">'+
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">'+
                                    '<span><?php echo e(__("tm_reference_time_management.btn_save")); ?></span>'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "<?php echo e(url('time_management/reference_time_management')); ?>";
                                }, 3000);
                            } else {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">'+
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">'+
                                    '<span><?php echo e(__("tm_reference_time_management.btn_save")); ?></span>'
                                );

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
                            $("#toolbar-save").prop("disabled", false);
                            $("#toolbar-save").html(
                                '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">'+
                                '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">'+
                                '<span><?php echo e(__("tm_reference_time_management.btn_save")); ?></span>'
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

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/time_management/tm_reference_time_management.blade.php ENDPATH**/ ?>