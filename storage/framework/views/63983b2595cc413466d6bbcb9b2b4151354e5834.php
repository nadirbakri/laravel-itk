<!DOCTYPE html>
<html>

<head>
    <title><?php echo e(__('payroll_report_format.judul')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('css/payroll_detail_data.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>">
    <style type="text/css">
        .div-payroll {
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

        .required {
            color: red;
        }

    </style>
</head>

<body>
    <div class="div-payroll">
        <div class="div-title">
            <a href="<?php echo e(url('payroll/report_format')); ?>" target="iframe_dashboard">
                <img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
                <span class="title-text"><?php echo e(__('payroll_report_format.list_detail')); ?></span>
            </a>
        </div>
        <div class="div-form">
            <form id="report_format_form" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="report_code"><?php echo e(__('payroll_report_format.label_report_code')); ?></label>
                            <span class="required">*</span>
                            <input type="text" class="form-control" id="report_code" name="report_code"
                                placeholder="<?php echo e(__('payroll_report_format.label_report_code')); ?>">
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="description"><?php echo e(__('payroll_report_format.label_description')); ?></label>
                            <input type="text" class="form-control" id="description" name="description"
                                placeholder="<?php echo e(__('payroll_report_format.label_description')); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="font_size"><?php echo e(__('payroll_report_format.label_font_size')); ?></label>
                            <input type="number" min="0" class="form-control" id="font_size" name="font_size"
                                placeholder="<?php echo e(__('payroll_report_format.label_font_size')); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="div-table">
                            <table id="report_format_detail_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th><?php echo e(__('payroll_report_format.label_column_no')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_table_name')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_field_name')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_column_header')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_alignment')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_data_format')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_display')); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-report-format-detail"
                            id="btn-add-report-format-detail" data-toggle="modal" style="width: 100%;"  data-target="#modal_add_report_format_detail">
                            <i class="fa fa-plus"></i> <?php echo e(__('payroll_report_format.btn_add')); ?>

                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-report-format-detail"
                            id="btn-remove-report-format-detail" style="width: 100%;">
                            <i class="fa fa-times"></i> <?php echo e(__('payroll_report_format.btn_remove')); ?>

                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="div-table">
                            <table id="report_format_condition_table" class="table hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th><?php echo e(__('payroll_report_format.label_seq_no')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_table_name')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_field_name')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_criteria')); ?></th>
                                        <th><?php echo e(__('payroll_report_format.label_value')); ?></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" name="btn-add-report-format-condition" 
                            id="btn-add-report-format-condition" data-toggle="modal" style="width: 100%;" data-target="#modal_add_report_format_condition">
                            <i class="fa fa-plus"></i> <?php echo e(__('payroll_report_format.btn_add')); ?>

                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-danger" name="btn-remove-report-format-condition"
                            id="btn-remove-report-format-condition" style="width: 100%;">
                            <i class="fa fa-times"></i> <?php echo e(__('payroll_report_format.btn_remove')); ?>

                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-save" id="btn-save"
                            style="width: 100%;">
                            <i class="fa fa-floppy-o"></i> <?php echo e(__('payroll_report_format.btn_save')); ?>

                        </button>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-outline-primary" href="<?php echo e(url('payroll/report_format')); ?>" target="iframe_dashboard"
                            name="btn-cancel" id="btn-cancel" style="width: 100%;">
                            <i class="fa fa-times-circle"></i> <?php echo e(__('payroll_report_format.btn_cancel')); ?>

                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="modal_add_report_format_detail" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('payroll_report_format.list')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="report_format_detail_form" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_no"><?php echo e(__('payroll_report_format.label_column_no')); ?></label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="column_no" name="column_no"
                                        placeholder="<?php echo e(__('payroll_report_format.label_column_no')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="table_name_detail"><?php echo e(__('payroll_report_format.label_table_name')); ?></label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="table_name_detail" name="table_name_detail">
                                        <option value="" disabled selected><?php echo e(__('payroll_report_format.label_select_table_name')); ?></option>
                                        <option value="PrSalaryMaster">PrSalaryMaster</option>
                                        <option value="PrSalaryActual">PrSalaryActual</option>
                                        <option value="PrYearly">PrYearly</option>
                                        <option value="PeMaster">PeMaster</option>
                                        <option value="TmFixedComponent">TmFixedComponent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="field_name_detail"><?php echo e(__('payroll_report_format.label_field_name')); ?></label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="field_name_detail" name="field_name_detail"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="column_header"><?php echo e(__('payroll_report_format.label_column_header')); ?></label>
                                    <div class='input-group'>
                                        <input type="text" class="form-control" id="column_header" name="column_header"
                                            placeholder="<?php echo e(__('payroll_report_format.label_column_header')); ?>">                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="alignment"><?php echo e(__('payroll_report_format.label_alignment')); ?></label>
                                        <select class="form-control select2" id="alignment" name="alignment">
                                        <option value="" disabled selected><?php echo e(__('payroll_report_format.label_select_alignment')); ?></option>
                                        <option value="1">1. Left</option>
                                        <option value="2">2. Center</option>
                                        <option value="3">3. Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="data_format"><?php echo e(__('payroll_report_format.label_data_format')); ?></label>
                                        <select class="form-control select2" id="data_format" name="data_format">
                                        <option value="" disabled selected><?php echo e(__('payroll_report_format.label_select_data_format')); ?></option>
                                        <option value="#,##0.00">#,##0.00</option>
                                        <option value="#,##0">#,##0</option>
                                        <option value="dd/MM/yyyy">dd/MM/yyyy</option>
                                        <option value="dd MM yyyy">dd MM yyyy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="display">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="display"
                                            name="display" value="true">
                                        <label class="form-check-label"
                                            for="display"><?php echo e(__('payroll_report_format.label_display')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-report-format-detail" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> <?php echo e(__('payroll_report_format.btn_save')); ?></button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> <?php echo e(__('payroll_report_format.btn_cancel')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_add_report_format_condition" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('payroll_report_format.list')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="report_format_condition_form" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="seq_no"><?php echo e(__('payroll_report_format.label_seq_no')); ?></label>
                                    <span class="required">*</span>
                                    <input type="text" class="form-control" id="seq_no" name="seq_no"
                                        placeholder="<?php echo e(__('payroll_report_format.label_seq_no')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="table_name_condition"><?php echo e(__('payroll_report_format.label_table_name')); ?></label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="table_name_condition" name="table_name_condition">
                                        <option value="" disabled selected><?php echo e(__('payroll_report_format.label_select_table_name')); ?></option>
                                        <option value="PrSalaryMaster">PrSalaryMaster</option>
                                        <option value="PrSalaryActual">PrSalaryActual</option>
                                        <option value="PrYearly">PrYearly</option>
                                        <option value="PeMaster">PeMaster</option>
                                        <option value="TmFixedComponent">TmFixedComponent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="field_name_condition"><?php echo e(__('payroll_report_format.label_field_name')); ?></label>
                                    <span class="required">*</span>
                                    <select class="form-control select2" id="field_name_condition" name="field_name_condition"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="criteria"><?php echo e(__('payroll_report_format.label_criteria')); ?></label>
                                        <select class="form-control select2" id="criteria" name="criteria">
                                        <option value="" disabled selected><?php echo e(__('payroll_report_format.label_select_criteria')); ?></option>
                                        <option value="=">=</option>
                                        <option value="<>"><></option>
                                        <option value=">=">>=</option>
                                        <option value="<="><=</option>
                                        <option value="like">like</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="value"><?php echo e(__('payroll_report_format.label_value')); ?></label>
                                    <input type="text" class="form-control" id="value" name="value"
                                        placeholder="<?php echo e(__('payroll_report_format.label_value')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-save-report-format-condition" class="btn btn-primary w-25"><i 
                                    class="fa fa-floppy-o"></i> <?php echo e(__('payroll_report_format.btn_save')); ?></button>
                            <button type="button" class="btn btn-primary w-25" data-dismiss="modal"><i
                                    class="fa fa-times-circle"></i> <?php echo e(__('payroll_report_format.btn_cancel')); ?></button>
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
                        <span class="title-text-notification"><?php echo e(__('payroll_report_format.alert_success')); ?></span>
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
        var func = "<?php echo e($func); ?>";
        var arrData = <?php echo json_encode($data, 15, 512) ?>;
        var tableName = null;
        var fieldName = null;
        var table1 = null;
        var table2 = null;
        var arrayReportFormatDetail = [];
        var arrayReportFormatCondition = [];


        if (func == 'new') {
            $('#record_function').val("New");
            $('#report_code').val("");
            $('#description').val("");
            $('#font_size').val("");
            $('#report_format_detail_table').DataTable().destroy();
            $('#report_format_condition_table').DataTable().destroy();
            load_table_report_format_detail();
            load_table_report_format_condition();
        }
        else if (func == 'edit') {
            $('#record_function').val("Edit");
            $('#report_code').val(((typeof arrData[0].reportCode !== 'undefined') ? arrData[0].reportCode : '')).prop('readonly', true);
            $('#description').val(htmlDecode(((typeof arrData[0].description !== 'undefined') ? arrData[0].description : '')));
            $('#font_size').val(((typeof arrData[0].fontSize !== 'undefined') ? arrData[0].fontSize : ''));

            load_table_report_format_detail();
            // console.log(arrData[0].detail);
            if (arrData[0].detail !== 'undefined' || arrData[0].detail !== null) {
                for (var i = 0; i < arrData[0].detail.length; i++) {
                    arrayReportFormatDetail.push({
                        "columnNo": ((typeof arrData[0].detail[i].columnNo !== 'undefined') ? arrData[0].detail[i].columnNo : ''),
                        "tableName": ((typeof arrData[0].detail[i].tableName !== 'undefined') ? arrData[0].detail[i].tableName : ''),
                        "fieldName": ((typeof arrData[0].detail[i].fieldName !== 'undefined') ? arrData[0].detail[i].fieldName : ''),
                        "columnHeader": ((typeof arrData[0].detail[i].columnHeader !== 'undefined') ? arrData[0].detail[i].columnHeader : ''),
                        "alignment": ((typeof arrData[0].detail[i].alignment !== 'undefined') ? arrData[0].detail[i].alignment : ''),
                        "dataFormat": ((typeof arrData[0].detail[i].dataFormat !== 'undefined') ? arrData[0].detail[i].dataFormat : ''),
                        "display": ((typeof arrData[0].detail[i].isDisplayed !== 'undefined') ? arrData[0].detail[i].isDisplayed : ''),
                    });
                    // console.log(arrayReportFormatDetail);
                }
            }
            $('#report_format_detail_table').DataTable().destroy();
            load_table_report_format_detail();

            load_table_report_format_condition();
            if (arrData[0].condition !== 'undefined' || arrData[0].condition !== null) {
                // console.log(arrData[0]);
                // console.log(arrData[1].condition);
                for (var i = 0; i < arrData[0].condition.length; i++) {
                    arrayReportFormatCondition.push({
                        "seqNo": ((typeof arrData[0].condition[i].seqNo !== 'undefined') ? arrData[0].condition[i].seqNo : i),
                        "tableName": ((typeof arrData[0].condition[i].tableName !== 'undefined') ? arrData[0].condition[i].tableName : ''),
                        "fieldName": ((typeof arrData[0].condition[i].fieldName !== 'undefined') ? arrData[0].condition[i].fieldName : ''),
                        "criteria": ((typeof arrData[0].condition[i].criteria !== 'undefined') ? arrData[0].condition[i].criteria : ''),
                        "value": ((typeof arrData[0].condition[i].value !== 'undefined') ? arrData[0].condition[i].value : ''),
                    });
                }
            }
            $('#report_format_condition_table').DataTable().destroy();
            load_table_report_format_condition();
        }

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        function load_table_report_format_detail() {
            table1 = $('#report_format_detail_table').DataTable({
                processing: true,
                // orderCellsTop: true,
                data: arrayReportFormatDetail,

                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',

                columns: [
                    {
                        orderable: false,
                        targets: 0,
                        "defaultContent": '',
                        render: function (data, type) {
                            return type === 'display' ?
                                '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {   
                        data: 'columnNo',
                        name: 'columnNo',
                        render: function (data, type, row, meta) {
                            return '<input type="hidden" class="form-control" name="column_no[]" value="' +
                            meta.row +'">' + (meta.row + 1);
                        }
                    },
                    {
                        data: 'tableName',
                        name: 'tableName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="table_name_detail[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'fieldName',
                        name: 'fieldName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="field_name_detail[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'columnHeader',
                        name: 'columnHeader',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="column_header[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'alignment',
                        name: 'alignment',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="alignment[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'dataFormat',
                        name: 'dataFormat',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="data_format[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'display',
                        name: 'display',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="display[]" value="' +
                                data + '">' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#report_format_detail_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#report_format_detail_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        function load_table_report_format_condition() {
            table2 = $('#report_format_condition_table').DataTable({
                data: arrayReportFormatCondition,
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers',
                columns: [
                    {
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
                        name: 'seqNo',
                        render: function (data, type, row, meta) {
                            console.log(data);
                            return '<input type="hidden" class="form-control" name="seq_no[]" value="' +
                            meta.row + '">' + (meta.row + 1);
                        }
                    },
                    {
                        data: 'tableName',
                        name: 'tableName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="table_name_condition[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'fieldName',
                        name: 'fieldName',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="field_name_condition[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'criteria',
                        name: 'criteria',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="criteria[]" value="' +
                                data + '">' + data;
                        }
                    },
                    {
                        data: 'value',
                        name: 'value',
                        render: function (data, type, row) {
                            return '<input type="hidden" class="form-control" name="value[]" value="' +
                                data + '">' + data;
                        }
                    },
                ],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#report_format_condition_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#report_format_condition_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $('#btn-add-report-format-detail').on('click', function () {
            $('#column_no').val("");
            $('#table_name_detail').val("");
            $('#field_name_detail').val("");
            $('#column_header').val("");
            $('#alignment').val("");
            $('#data_format').val("");
            (($("#display").val() !== null) ? $("#display").val() : false);

            $('#table_name_detail').on('change', function () {
                tableName = $('#table_name_detail').val();
                loadDataFieldName();
            });

            $('#field_name_detail').on('change', function () {
                fieldName = $('#field_name_detail').val();
            });
        });

        $('#btn-add-report-format-condition').on('click', function () {
            $('#seq_no').val("");
            $('#table_name_condition').val("");
            $('#field_name_condition').val("");
            $('#criteria').val("");
            $('#value').val("");

            $('#table_name_condition').on('change', function () {
                tableName = $('#table_name_condition').val();
                loadDataFieldName();
            });

            $('#field_name_condition').on('change', function () {
                fieldName = $('#field_name_condition').val();
            });
        });

        function loadDataFieldName(){
            function formatSelect(data) {
                if (data.loading) {
                    return $search
                }

                if (data.id) {
                    var $result2 = $('<div class="row">' + 
                        '<div class="col-6">' + data.data + '<div>' +
                        '</div>');

                    return $result2;
                }
            }

            var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

            $('#field_name_detail, #field_name_condition').select2({
                width: '100%',
                placeholder: 'Choose Field Name',
                allowClear: true,
                // multiple: true,
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
                    url: "<?php echo e(url('/field/api')); ?>",
                    dataType: 'json',
                    delay: 250,
                    type: "GET",
                    data: function (params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term,
                            tableName : tableName
                        };
                    },
                    processResults: function (data) {
                        // console.log(data);
                        return {
                            results: $.map(data, function (item) {
                                // console.log(item);
                                return {
                                    text: item,
                                    id: item,
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

        $("#btn-save-report-format-detail").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            // var arraypush = [];
            // arraypush["fieldName"] = $("#field_name").val();
            // arraypush["columnHeader"] = $("#column_header").val();
            arrayReportFormatDetail.push({
                "columnNo": $("#column_no").val() ? $("column_no").val() : "",
                "tableName": $("#table_name_detail").val(),
                "fieldName": $("#field_name_detail").val(),
                "columnHeader": $("#column_header").val(),
                "alignment": $("#alignment").val(),
                "dataFormat": $("#data_format").val(),
                "display": ($("#display").is(":checked") ? $("#display").val() : false)
            });
            // console.log($("#display").is(":checked"))
            // console.log(arrayReportFormatDetail);

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_report_format.btn_save")); ?>'
            );
            $('#modal_add_report_format_detail').modal('hide');
            // console.log(arrayReportFormatDetail);
            
            $('#report_format_detail_table').DataTable().destroy();
            load_table_report_format_detail();
            //$("#field_name_form").submit();
        });

        $("#report_format_detail_form").on("submit", function(){
            $("#report_format_detail_form").validate({
                rules: {
                    column_no: {
                        required: true
                    },
                    table_name_detail: {
                        required: true
                    },
                    field_name_detail: {
                        required: true
                    }
                },
                messages: {
                    column_no: {
                        required: "<?php echo e(__('payroll_report_format.field_mandatory')); ?>",
                    },
                    table_name_detail: {
                        required: "<?php echo e(__('payroll_report_format.field_mandatory')); ?>",
                    },
                    field_name_detail: {
                        required: "<?php echo e(__('payroll_report_format.field_mandatory')); ?>",
                    }
                }
            });
        });

        $("#btn-save-report-format-condition").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            arrayReportFormatCondition.push({
                "seqNo": $("#seq_no").val(),
                "tableName": $("#table_name_condition").val(),
                "fieldName": $("#field_name_condition").val(),
                "criteria": $("#criteria").val(),
                "value": $("#value").val(),
            });

            $(this).prop("disabled", false);
            $(this).html(
                '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_report_format.btn_save")); ?>'
            );

            $('#modal_add_report_format_condition').modal('hide');
            
            $('#report_format_condition_table').DataTable().destroy();
            load_table_report_format_condition();
        });

        $('#modal_add_report_format_detail').on('show.bs.modal', function () {
            var count = table1.rows().count();
            $('#column_no').val(count+1);
        });

        $('#modal_add_report_format_condition').on('show.bs.modal', function () {
            var count = table2.rows().count();
            $('#seq_no').val(count+1);
        });

        $("#btn-remove-report-format-detail").on('click', function() {
            var data = table1.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayReportFormatDetail.findIndex(x => x.columnNo == data[i].columnNo);
                    arrayReportFormatDetail.splice(index, 1);
                }
                $('#report_format_detail_table').DataTable().destroy();
                load_table_report_format_detail();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $("#btn-remove-report-format-condition").on('click', function() {
            var data = table2.rows('.selected').data().toArray();
            if(data.length > 0){
                for (var i = 0; i < data.length; i++) {
                    var index = arrayReportFormatCondition.findIndex(x => x.seqNo == data[i].seqNo);
                    arrayReportFormatCondition.splice(index, 1);
                }
                $('#report_format_condition_table').DataTable().destroy();
                load_table_report_format_condition();
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "<?php echo e(url('payroll/report_format')); ?>";
        });

        $("#btn-save").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );

            $("#report_format_form").submit();
        });

        if ($("#report_format_form").length > 0) {
            $("#report_format_form").validate({
            rules: {
                    report_code: {
                        required: true,
                    }
                },
                messages: {
                    report_code: {
                        required: "<?php echo e(__('payroll_report_format.field_mandatory')); ?>",
                    }
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    $("#btn-save").prop("disabled", false);
                    $("#btn-save").html(
                        '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_report_format.btn_save")); ?>'
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
                        url: "<?php echo e(url('payroll/report_format/proses')); ?>",
                        type: "POST",
                        data: $('#report_format_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_report_format.btn_save")); ?>'
                                );
                                
                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "<?php echo e(url('payroll/report_format')); ?>";
                                }, 3000);
                            } else {
                                $("#btn-save").prop("disabled", false);
                                $("#btn-save").html(
                                    '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_report_format.btn_save")); ?>'
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
                            $("#btn-save").prop("disabled", false);
                            $("#btn-save").html(
                                '<i class="fa fa-floppy-o"></i> <?php echo e(__("payroll_report_format.btn_save")); ?>'
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

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/payroll/py_report_format_detail.blade.php ENDPATH**/ ?>