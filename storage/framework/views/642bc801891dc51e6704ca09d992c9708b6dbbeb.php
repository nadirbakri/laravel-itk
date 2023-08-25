<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(__('data_employee_master.judul')); ?></title>
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
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>"> 
    <link rel="stylesheet" href="<?php echo e(asset('css/data_employee_master.css')); ?>"> 
    <style type="text/css">
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

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
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

        .div-title-notification-warning {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 2%;
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

        .title-text-notification-warning {
            font-family: Inter;
            font-weight: 500;
            font-size: 2.5vw;
        }
        .row button {
            background-color: #1E90FF;
            border: none;
            color: white;
            padding: 5px 11px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            }

        .btn{
            margin-top:10px;
            margin: 20px 40px;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <form id="master_data_employee_master" method="post">
            <?php echo csrf_field(); ?>
            <div class="div-employee-master">
                <div class="div-title">
                    <a href="<?php echo e(url()->previous()); ?>" target="iframe_dashboard">
                        <img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
                        <span class="title-text"><?php echo e(__('data_employee_master.subjudul')); ?></span>
                    </a>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="status form-check-label"><?php echo e(__('data_employee_master.status')); ?></label>
                        </div>
                        <input type="text" class="form-control" id="status" name="status" value="A" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="user_id form-check-label"><?php echo e(__('data_employee_master.userid')); ?></label>
                        </div>
                        <input type="text" class="form-control" id="user_id" name="user_id" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="employee_no form-check-label"><?php echo e(__('data_employee_master.employeeno')); ?></label>
                        </div>
                        <input type="text" class="form-control" id="employee_no" name="employee_no">
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="join_date form-check-label"><?php echo e(__('data_employee_master.label_claim_date_join')); ?></label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="join_date" name="join_date"
                                placeholder="<?php echo e(__('trans_mass_leave.label_claim_date_start')); ?>">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="join_date_calendar"><span class="fa fa-calendar"></span></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="join_date_hidden" name="join_date_hidden" hidden>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="company_code form-check-label"><?php echo e(__('data_employee_master.companycode')); ?></label>
                        </div>
                        <select class="form-control select2" id="company_code" name="company_code" disabled></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="office_location form-check-label"><?php echo e(__('data_employee_master.location')); ?></label>
                        </div>
                        <select class="form-control select2" id="office_location" name="office_location" disabled></select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="full_name form-check-label"><?php echo e(__('data_employee_master.name')); ?></label>
                        </div>
                        <input type="text" class="form-control" id="full_name" name="full_name" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="password form-check-label"><?php echo e(__('data_employee_master.password')); ?></label>
                        </div>
                        <input type="text" class="form-control" id="password" name="password" readonly>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="phone form-check-label"><?php echo e(__('data_employee_master.phone')); ?></label>
                        </div>
                        <input type="text" class="form-control" id="phone" name="phone" readonly>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="address form-check-label"><?php echo e(__('data_employee_master.addres')); ?>s</label>
                        </div>
                        <input type="text" class="form-control" id="address" name="address" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="leave_time form-check-label"><?php echo e(__('data_employee_master.division')); ?></label>
                        </div>
                        <select class="form-control select2" id="leave_time" name="leave_time" disabled></select>
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                             <label for="leave_time form-check-label"><?php echo e(__('data_employee_master.photo')); ?></label>
                        </div>
                        <form action="aksi.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="file">
	                    </form>
                    </div>
                </div>

                <!-- TABLE -->
                <div class="card" style="display: block">
                    <a class="collapsed" data-toggle="collapse" href="#employee_leave" aria-expanded="true" aria-controls="employee_leave">
                        <div class="card-header">
                            <div class="div-dropdown-title">
                                <span class="dropdown-title-text"><?php echo e(__('data_employee_master.formemployee')); ?></span>
                            </div>
                        </div>
                    </a>
                    <div id="employee_leave" class="collapse">
                        <div class="card-block">
                            <table id="leave_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Leave Type</th>
                                        <th>Leave Balance</th>
                                    </tr>
                                </thead>
                                <tbody id="body_leave_table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card" style="display: block">
                    <a class="collapsed" data-toggle="collapse" href="#employee_plafon" aria-expanded="true" aria-controls="employee_leave">
                        <div class="card-header">
                            <div class="div-dropdown-title">
                                <span class="dropdown-title-text"><?php echo e(__('data_employee_master.formemployee1')); ?></span>
                            </div>
                        </div>
                    </a>
                    <div id="employee_plafon" class="collapse">
                        <div class="card-block">
                            <table id="plafon_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reimbursement Type</th>
                                        <th>Reimbursement Plafon Balance</th>
                                    </tr>
                                </thead>
                                <tbody id="body_plafon_table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card" style="display: block">
                    <a class="collapsed" data-toggle="collapse" href="#dependent_list" aria-expanded="true" aria-controls="employee_leave">
                        <div class="card-header">
                            <div class="div-dropdown-title">
                                <span class="dropdown-title-text"><?php echo e(__('data_employee_master.formemployee2')); ?></span>
                            </div>
                        </div>
                    </a>
                    <div id="dependent_list" class="collapse">
                        <div class="card-block">
                            <table id="dependent_table" class="table table-bordered">
                                <!-- <button type="button" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg> Add Dependant</button> -->
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Relation</th>
                                            <th>Dependant Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="body_dependent_table">
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>

                <div class="card" style="display: block">
                    <a class="collapsed" data-toggle="collapse" href="#workflow_approval" aria-expanded="true" aria-controls="employee_leave">
                        <div class="card-header">
                            <div class="div-dropdown-title">
                                <span class="dropdown-title-text"><?php echo e(__('data_employee_master.formemployee3')); ?></span>
                            </div>
                        </div>
                    </a>
                    <div id="workflow_approval" class="collapse">
                        <div class="card-block">
                            <table id="workflow_table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Employee Group</th>
                                        <th>Approval</th>
                                        <th>Employee Supervisor Group</th>
                                        <th>Supervisor Name</th>
                                    </tr>
                                </thead>
                                <tbody id="body_workflow_table">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="row">
                    
                        <!-- <button type="button" class="btn btn-primary" name="btn-save" id="btn-save" value="save">
                            <?php echo e(__('trans_mass_leave.btn_save')); ?>

                        </button> -->
                        
                        <button type="button" class="btn btn-primary" name="btn-cancel" id="btn-cancel" value="cancel">
                            Cancel
                        </button>
                  
                    
                        <button type="button" class="btn btn-primary" name="btn-list" id="btn-list" value="list"
                            data-toggle="modal" data-target="#modal_list">
                            <?php echo e(__('trans_mass_leave.btn_list')); ?>

                        </button>
                  
                    
                        <button type="button" class="btn btn-primary" name="btn-reset" id="btn-reset" value="reset password">
                            Reset Password
                        </button>
                  
                    
                        <button type="button" class="btn btn-primary" name="btn-active" id="btn-active" value="active">
                            Active
                        </button>
                    
                        <button type="button" class="btn btn-primary" name="btn-deactive" id="btn-deactive" value="deactive">
                            Deactive
                        </button>
                  
                        <button type="button" class="btn btn-primary" name="btn-invoice" id="btn-invoice" value="invoice">
                            Invoice
                        </button>

                        <button type="button" class="btn btn-primary" name="btn-export" id="btn-export" value="export">
                            Export Emp
                        </button>
                </div>
            </div>
        </form>
    </div>

    
    <div class="div-form">
        <form id="payroll_calculation_detail_modal_form" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal fade" id="modal_list">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-little">List User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body table-responsive">
                        <table id="example" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee No</th>
                                    <th>Full Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>        
                                    <td></td>        
                                    <td></td>       
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                    
            </div>
        </form>
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
                        <span class="title-text-notification"><?php echo e(__('trans_mass_leave.alert_success')); ?></span>
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
    let pickerJoinDate = $('#join_date').flatpickr({
        altInput: true,
        allowInput: true,
        altFormat: "j-M-y",
        dateFormat: "Y-m-d",
        defaultDate: "today",
        onReady: function () {
            var flatPickrInstance = this;
            var $flatPickrInput = $(flatPickrInstance.element);
            $flatPickrInput.siblings("#join_date_calendar").click(function () {
                flatPickrInstance.toggle();
            });
        }
    });

    pickerJoinDate._input.setAttribute('disabled', 'disalbed');
        
    $('#btn-list').click(()=> {
        $('#example').DataTable().destroy();
        table2 = $('#example').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "<?php echo e(url('master_data/employee_list/table')); ?>"             
            },
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {
                    orderable: false,
                    targets: 0, 
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<button type="button"  onclick="klik(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
                            }
                },
                {data: 'employeeNo', name: 'employeeNo'},
                {data: 'fullName', name: 'fullName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    });

    const klik = (element) => {
        let data = table2.row($(element).parent()).data();
        $.ajax({
            type: 'GET',
            url: "<?php echo e(url('/master_data/employee_master/get')); ?>",
            data: {
                'employeeNo': data.employeeNo
            }
        }).then(function (data) {
            console.log(data);
            // $('#user_id').val((typeof data[0].userDetail.userID !== 'undefined') ? data[0].userDetail.userID : '');
            $('#employee_no').val(data[0].employeeNo);
            $('#full_name').val(data[0].fullName);
            pickerJoinDate.setDate(((typeof data[0].joinDate !== 'undefined') ? data[0].joinDate : ''));
            $('#join_date_hidden').val(((typeof data[0].joinDate !== 'undefined') ? data[0].joinDate : ''));
            $('#phone').val(data[0].peMasterInfo.personalHandphone);
            $('#company_code').val(data[0].companyCode).trigger('change');
            $('#office_location').val(data[0].officeLocation).trigger('change');
            $('#address').val(data[0].peMasterInfo.homeAddress);
            $('#employee_no').prop('readonly', true);

            if(data[0].peMasterFamily.length > 0){
                $('#body_dependent_table').append('');
            }else{
                $('#body_dependent_table').append(
                    '<tr><td colspan="6" style="text-align: center;">No Data</td></tr>'
                );
            }

            if(data[0].pePlafon.length > 0){
                $('#body_plafon_table').append('');
            }else{
                $('#body_plafon_table').append(
                    '<tr><td colspan="3" style="text-align: center;">No Data</td></tr>'
                );
            }

            if(data[0].peMasterLeave != null){
                $('#body_leave_table').append('');
            }else{
                $('#body_leave_table').append(
                    '<tr><td colspan="3" style="text-align: center;">No Data</td></tr>'
                );
            }
        });

        $('.close').click();
    }

    $('#employee_no').blur(function () {
        if($(this).val() != null && $(this).val() != ''){
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('/master_data/employee_master/get')); ?>",
                data: {
                    'employeeNo': $(this).val()
                }
            }).then(function (data) {
                // $('#user_id').val((typeof data[0].userDetail.userID !== 'undefined') ? data[0].userDetail.userID : '');
                $('#employee_no').val(data[0].employeeNo);
                $('#full_name').val(data[0].fullName);
                pickerJoinDate.setDate(((typeof data[0].joinDate !== 'undefined') ? data[0].joinDate : ''));
                $('#join_date_hidden').val(((typeof data[0].joinDate !== 'undefined') ? data[0].joinDate : ''));
                $('#user_id').prop('readonly', true);
                $('#employee_no').prop('readonly', true);
                $('#password').prop('readonly', true);
            });
        }
    });

    loadDataCompanyCode();
    loadDataOfficeLocation();

    $.get("<?php echo e(url('company_under_holding/api')); ?>", function (data) {
            $.each(data, function (k, v) {
                $('#company_code').append("<option value=" + v.companyCode + ">" + v.companyName +
                    "</option>");
            });
        });

    $.get("<?php echo e(url('office_location/api')); ?>", function (data) {
        $.each(data, function (k, v) {
            $('#office_location').append("<option value=" + v.officeCode + ">" + v.officeDesc +
                "</option>");
        });
    });

    $('#select').focus(function (event) {
            var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
    });

    $('#select').click(function (event) {
        var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
        $searchfield.prop('disabled', true);
    });

    $('#select').change(function (event) {
        var $searchfield = $('#' + event.target.id).parent().find('.select2-search__field');
        $searchfield.prop('disabled', true);
    });

    $('select').on('select2:close', function (e) {
        $('.header-select').remove();
    });

    function loadDataCompanyCode(){
        function formatSelect(data) {
            if (data.loading) {
                return $search
            }

            if (data.id) {
                var $result2 = $('<div class="row">' + 
                    '<div class="col-6">' + data.data.companyName + '<div>' +
                    '</div>');

                return $result2;
            }
        }

        var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
        
        $('#company_code').select2({
            width: '100%',
            placeholder: 'Choose Company Code',
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
                url: "<?php echo e(url('/company_under_holding/api')); ?>",
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function (params) {
                    return {
                        _token: $('meta[name="csrf-token"]').attr('content'),
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

    function loadDataOfficeLocation(){
        function formatSelect(data) {
            if (data.loading) {
                return $search
            }

            if (data.id) {
                var $result2 = $('<div class="row">' + 
                    '<div class="col-6">' + data.data.officeDesc + '<div>' +
                    '</div>');

                return $result2;
            }
        }

        var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');
        
        $('#office_location').select2({
            width: '100%',
            placeholder: 'Choose Office Location',
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
                url: "<?php echo e(url('/office_location/api')); ?>",
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function (params) {
                    return {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        search: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.officeDesc,
                                id: item.officeCode,
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
</script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/master_data/master_data_employee_master.blade.php ENDPATH**/ ?>