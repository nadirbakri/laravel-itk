<!DOCTYPE html>
<html>
<head>
<title><?php echo e(__('master_data.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/master_data.css')); ?>">
	<style type="text/css">
		.div-master_data {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
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
	</style>
</head>

<body>
    <div class="div-master_data">
        <div class="div-title">
			<img src="<?php echo e(url('icons/mob/sidebar/streammobportal-navbar-masterdata.svg')); ?>" alt="Title">
			<span class="title-text"><?php echo e(__('master_data.judul')); ?></span>
		</div>
        <div class="card">
            <a class="collapsed" data-toggle="collapse"  href="#master_data-master_data-data" aria-expanded="true" aria-controls="master_data-master_data-data">
                <div class="card-header">
                    <div class="div-dropdown-title">
                        <img class="dropdown-logo" src="<?php echo e(url('icons/mob/sidebar/streammobportal-navbar-masterdata.svg')); ?>" alt="master_data">
                        <span class="dropdown-title-text"><?php echo e(__('master_data.master_data_data')); ?></span>
                        <img class="dropdown-triangle" src="<?php echo e(url('/pictures/triangle.png')); ?>" alt="Triangle">
                    </div>
                </div>
            </a>
            <div id="master_data-master_data-data" class="collapse">
                <div class="card-block">
                    <div class="row div-child-data">
                        <!-- <div class="col col-3">
                            <a href="<?php echo e(url('master_data/employee_master')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.employee_master')); ?></span>
                            </a>
                        </div> -->
                        <div class="col col-3">
                            <a href="<?php echo e(url('master_data/employee_group')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.employee_group')); ?></span>
                            </a>
                        </div>
                       
                        <div class="col col-3">
                            <a href="<?php echo e(url('master_data/employee_group_leave')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.employee_group_leave')); ?></span>
                            </a>
                        </div>
                      
                        <div class="col col-3">
                            <a href="<?php echo e(url('master_data/employee_group_overtime')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.employee_group_overtime')); ?></span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="<?php echo e(url('master_data/employee_group_detail')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.employee_group_detail')); ?></span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="<?php echo e(url('master_data/employee_group_reimbursement')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.employee_group_reimbursement')); ?></span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="<?php echo e(url('master_data/holiday_calender')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.holiday_calendar')); ?></span>
                            </a>
                        </div>
                        <div class="col col-3">
                            <a href="<?php echo e(url('master_data/bussines_trip')); ?>" target="iframe_dashboard">
                                <img src="<?php echo e(url('/icons/mob/submenu/submenu-masterdata.svg')); ?>" alt="Child master_data">
                                <span class="child-title-text"><?php echo e(__('master_data.employee_group_business_trip')); ?></span>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
	<div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" data-toggle="modal" role="document">
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

	<?php endif; ?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		var error = "<?php echo e($errors->any()); ?>";
		if (error) {
			$('#notification_error').modal('show');
		}
	})
</script>


</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/master_data/master_data_main.blade.php ENDPATH**/ ?>