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
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
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
			<a class="collapsed" data-toggle="collapse" href="#master-data" aria-expanded="true" aria-controls="master-data">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="<?php echo e(url('/icons/master_data/master-data.svg')); ?>" alt="master data">
						<span class="dropdown-title-text">Master Data</span>
						<img class="dropdown-triangle" src="<?php echo e(url('/pictures/triangle.png')); ?>" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="master-data" class="collapse">
				<div class="card-block">
					<div class="row div-child-data">
					<?php $__currentLoopData = $dataParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col col-3">
							<a href="<?php echo e(url($value2->pageURL)); ?>" target="iframe_dashboard">
								<img src="<?php echo e(url('/icons/master_data/submenu-master-data.svg')); ?>" alt="Child master data">
								<span class="child-title-text"><?php echo e($value2->menuName); ?></span>
							</a>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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