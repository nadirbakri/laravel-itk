<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('payroll_salary_component_data.judul')); ?></title>
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
	<link rel="stylesheet" href="<?php echo e(asset('css/payroll_detail.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>">
	<style type="text/css">
		.div-payroll {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
        .modal-header-notification-error {
            border-bottom:1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        .modal-header-notification-success {
            border-bottom:1px solid #eee;
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
	<div class="div-payroll">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-blue.svg')); ?>" alt="Back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-white.svg')); ?>" class="functionbar-hover" alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-blue.svg')); ?>" alt="Next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-white.svg')); ?>" class="functionbar-hover" alt="Next">
                <span>Next</span>
            </a>
            <a class="list-functionbar-xl" href="javascript:void(0)" id="toolbar-process" data-toggle="modal" data-target="#modal_process_salary_component_data">
                <img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" alt="Process">
                <img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" class="functionbar-hover" alt="Process">
                <span>Process New Component / Employee</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-new" target="iframe_dashboard">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-blue.svg')); ?>" alt="New">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-white.svg')); ?>" class="functionbar-hover" alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" id="toolbar-edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-blue.svg')); ?>" alt="Edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-white.svg')); ?>" class="functionbar-hover" alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-active">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-checklist-blue.svg')); ?>" alt="Activate">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-checklist-white.svg')); ?>" class="functionbar-hover" alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" style="display: none;" href="javascript:void(0)" id="toolbar-deactive">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-deactivate-blue.svg')); ?>" alt="Deactivate">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-deactivate-white.svg')); ?>" class="functionbar-hover" alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-blue.svg')); ?>" alt="List">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-white.svg')); ?>" class="functionbar-hover" alt="List">
                <span>List</span>
            </a>
            <a class="list-functionbar-sm" style="display: none;" href="javascript:void(0)" id="toolbar-delete">
                <img src="<?php echo e(url('/icons/functionbar/remove.svg')); ?>" alt="Delete">
                <img src="<?php echo e(url('/icons/functionbar/remove.svg')); ?>" class="functionbar-hover" alt="Delete">
                <span>Delete</span>
            </a>
        </div>
        <div class="div-title">
			<a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
				<img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
				<span class="title-text"><?php echo e(__('payroll_salary_component_data.list')); ?></span>
			</a>
		</div>
        <div class="div-table">
			<table id="salary_component_data_table" class="table hover" style="width: 100%">
				<thead>
					<tr>
                        <th></th>
						<th>Field Name</th>
						<th>Description</th>
                        <th>Display In</th>
                        <th>Field Type</th>
                        <th>Tax</th>
					</tr>
				</thead>
			</table>
		</div>
        <div class="div-form">
            <form id="salary_component_data_process_form" method="post">
                <?php echo csrf_field(); ?>
                <input type="text" class="form-control" id="period_month" name="period_month" hidden>
                <input type="text" class="form-control" id="period_year" name="period_year" hidden>
                <input type="text" class="form-control" id="period" name="period" hidden>
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
                        <span class="title-text-notification"><?php echo e(__('payroll_salary_component_data.alert_success')); ?></span>
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
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURL')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURL', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURL');

        sessionStorage.removeItem('previousURL');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        var table = null;
        $('.div-navbar a.disabled').attr('onclick', 'return false;');

        $('#salary_component_data_table thead tr').clone(true).appendTo('#salary_component_data_table thead');
        $('#salary_component_data_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
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

        $.ajax({
            url: "<?php echo e(url('/time_management/period/data/detail')); ?>",
            type: "GET",
            success: function (response) {
                isData = Object.keys(response).length;
                if (isData !== 0) {
                    $('#period_month').val((typeof response[0].periodMonth !== 'undefined') ? response[0].periodMonth : '');
                    $('#period_year').val((typeof response[0].periodYear !== 'undefined') ? response[0].periodYear : '');
                    $('#period').val((typeof response[0].statusProcess !== 'undefined') ? response[0].statusProcess : '');
                }
            }
        });

        load_data_table_salary_component_data();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function load_data_table_salary_component_data() {
            table = $('#salary_component_data_table').DataTable({
                processing: true,
                serverSide: true,
                orderCellsTop: true,
                ajax: "<?php echo e(url('payroll/salary_component_data/table')); ?>",
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
                        render: function(data, type) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                        }
                    },
                    {data: 'fieldName', name: 'fieldName'},
                    {data: 'description', name: 'description'},
                    {
                        data: 'displayIn', 
                        name: 'displayIn',
                        render: function (data, type, row) {
                            if (data === 'M') {
                                return 'Salary Master';
                            } else if (data === 'T') {
                                return 'Annual Data Entry';
                            } else if (data === 'F') {
                                return 'Tariff Master';
                            } else {
                                return 'Not Display';
                            }
                        }
                    },
                    {
                        data: 'fieldType', 
                        name: 'fieldType',
                        render: function (data, type, row) {
                            if (data === 'T') {
                                return 'Fixed Allowance';
                            } else if (data === 'N') {
                                return 'Non Fixed Allowance';
                            } else if (data === 'L') {
                                return 'Others';
                            } else if (data === 'P') {
                                return 'Fixed Deduction';
                            } else if (data === 'A') {
                                return 'Non Fixed Deduction';
                            } else {
                                return 'Flag';
                            }
                        }
                    },
                    {
                        data: 'flagTax', 
                        name: 'flagTax',
                        render: function (data, type, row) {
                            if (data === 'T') {
                                return 'Increase Tax';
                            } else if (data === 'N') {
                                return 'Non Taxable';
                            } else {
                                return 'Decrease Tax';
                            }
                        }
                    },
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }
            });
        }

        $('#salary_component_data_table tbody').on('click', 'input[type="checkbox"]', function(e){
            var $row = $(this).closest('tr');

            if(this.checked){
                $row.addClass('selected');
            } else {
                $row.removeClass('selected');
            }

            // Prevent click event from propagating to parent
            e.stopPropagation();
        });

        $('#salary_component_data_table').on('click', 'tr td:first-child', function(e){
            $(this).parent().find('input[type="checkbox"]').trigger('click');
        });

        $("#toolbar-new").on('click', function() {
            $.redirect("<?php echo e(url('payroll/salary_component_data/detail_data')); ?>", 
            { 
                'fieldName' : null,
                'func' : 'new' 
            }, 
            "GET", "iframe_dashboard");
        });

        $("#toolbar-edit").on('click', function() {
            var data = table.rows('.selected').data();
            if(data.count() > 0){
                $.redirect("<?php echo e(url('payroll/salary_component_data/detail_data')); ?>", 
                { 
                    'fieldName' : data[0].fieldName,
                    'func' : 'edit' 
                }, 
                "GET", "iframe_dashboard");
            }else{
                $('#notification_error').modal('show');
                $('#message-notification-error').html('No Data Selected');
            }
        });

        $('#salary_component_data_table tbody').on('click', 'tr td:not(:first-child)', function () {
            var data = table.row(this).data();
            $.redirect("<?php echo e(url('payroll/salary_component_data/detail_data')); ?>", 
            {   
                'fieldName' : data.fieldName,
                'func' : 'edit' 
            }, 
            "GET", "iframe_dashboard");
        });

        $("#toolbar-process").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#salary_component_data_process_form").submit();
        });

        if ($("#salary_component_data_process_form").length > 0) {
            $("#salary_component_data_process_form").validate({
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(url('payroll/salary_component_data_process/proses')); ?>",
                        type: "POST",
                        data: $('#salary_component_data_process_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#toolbar-process").prop("disabled", false);
                                $("#toolbar-process").html(
                                    '<img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" alt="Process">' +
                                    '<img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" class="functionbar-hover" alt="Process">' +
                                    '<span>Process New Component / Employee</span>'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    $('#notification_success').modal('hide');
                                }, 3000);
                            } else {
                                $("#toolbar-process").prop("disabled", false);
                                $("#toolbar-process").html(
                                    '<img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" alt="Process">' +
                                    '<img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" class="functionbar-hover" alt="Process">' +
                                    '<span>Process New Component/Employee</span>'
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
                            $("#toolbar-process").prop("disabled", false);
                            $("#toolbar-process").html(
                                '<img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" alt="Process">' +
                                '<img src="<?php echo e(url('/icons/functionbar/process.svg')); ?>" class="functionbar-hover" alt="Process">' +
                                '<span>Process New Component/Employee</span>'
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

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/payroll/py_salary_component_form.blade.php ENDPATH**/ ?>