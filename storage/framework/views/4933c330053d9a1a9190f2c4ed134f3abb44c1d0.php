<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
	</style>
</head>

<body>
<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
    <thead>
        <tr>
            <th>EmployeeNo</th>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th><?php echo e($value); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    </thead>
</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/time_management/tm_export_template_change_data_shift.blade.php ENDPATH**/ ?>