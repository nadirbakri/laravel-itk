<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('utilities.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/utilities.css')); ?>">
	<style type="text/css">
		.div-utilities {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>

<body>
	<div class="div-utilities">
		<div class="div-title">
			<img src="<?php echo e(url('/icons/utilities/utilities.png')); ?>" alt="Title">
			<span class="title-text"><?php echo e(__('utilities.judul')); ?></span>
		</div>

		<div class="div-menu">
			<?php
				$menuChunks = array_chunk($dataParent, 2);
			?>
			<?php $__currentLoopData = $menuChunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="row div-child-data">
					<div class="col col-4">
						<a href="<?php echo e(url($value[0]->pageURL)); ?>" target="iframe_dashboard">
							<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" style="max-width: 7.5%;" alt="Child Utilities">
							<span class="child-title-text"><?php echo e($value[0]->menuName); ?></span>
						</a>
					</div>
					<?php if(count($value) > 1): ?>
					<div class="col col-6">
						<a href="<?php echo e(url($value[1]->pageURL)); ?>" target="iframe_dashboard">
							<img src="<?php echo e(url('/icons/utilities/submenu-utilities.png')); ?>" alt="Child Utilities">
							<span class="child-title-text"><?php echo e($value[1]->menuName); ?></span>
						</a>
					</div>
					<?php endif; ?>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/utilities/utilities_main.blade.php ENDPATH**/ ?>