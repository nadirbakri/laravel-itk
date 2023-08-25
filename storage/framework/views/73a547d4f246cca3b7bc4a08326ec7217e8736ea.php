<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(__('time_management.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/time_management.css')); ?>">
	<style type="text/css">
		.div-time_management {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>
<body>
	<div class="div-time_management">
		<div class="div-title">
			<img src="<?php echo e(url('icons/sidebar/time_management.png')); ?>" alt="Title">
			<span class="title-text"><?php echo e(__('time_management.judul')); ?></span>
		</div>

		<?php $__currentLoopData = $dataParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#<?php echo e($value->pageURL); ?>" aria-expanded="true" aria-controls="<?php echo e($value->pageURL); ?>">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="<?php echo e(url('/icons/time_management/' . $value->pageURL . '.svg')); ?>" alt="time management">
						<span class="dropdown-title-text"><?php echo e($value->menuName); ?></span>
						<img class="dropdown-triangle" src="<?php echo e(url('/pictures/triangle.png')); ?>" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="<?php echo e($value->pageURL); ?>" class="collapse">
				<div class="card-block">
					<?php
						$dataSubMenu = \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($dataMenu, $value->menuID)
					?>
					<?php $__currentLoopData = $dataSubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($value2->isHaveChild): ?>
							<div class="div-head-data">
								<span class="head-title-text"><?php echo e($value2->menuName); ?></span>
							</div>
							<div class="row div-child-data">
								<?php
									$dataSubSubMenu = \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($dataMenu, $value2->menuID)
								?>
								<?php $__currentLoopData = $dataSubSubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3 => $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col col-3">
									<a href="<?php echo e(url($value3->pageURL)); ?>" target="iframe_dashboard">
										<img src="<?php echo e(url('/icons/time_management/submenu-' . $value->pageURL . '.svg')); ?>" alt="Child Time Management">
										<span class="child-title-text"><?php echo e($value3->menuName); ?></span>
									</a>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="row div-child-data">
					<?php $__currentLoopData = $dataSubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(!$value2->isHaveChild): ?>
							<div class="col col-3">
								<a href="<?php echo e(url($value2->pageURL)); ?>" target="iframe_dashboard">
									<img src="<?php echo e(url('/icons/time_management/submenu-' . $value->pageURL . '.svg')); ?>" alt="Child Time Management">
									<span class="child-title-text"><?php echo e($value2->menuName); ?></span>
								</a>
							</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/time_management/tm_main.blade.php ENDPATH**/ ?>