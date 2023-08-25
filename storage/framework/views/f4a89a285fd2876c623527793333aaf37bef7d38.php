<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('personel_employee_list.judul')); ?></title>
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
				<th>No</th>
				<th>Employee Number</th>
				<th>Employee Name</th>
                <th>Permit Start Date</th>
                <th>Permit End Date</th>
                <th>Permit Start Hour</th>
                <th>Permit End Hour</th>
				<th>Status</th>
                <th>Customer Name</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($no++); ?></td>
				<td><?php echo e($value->permitEntity->employeeNo); ?></td>
				<td><?php echo e($value->permitEntity->fullnameRequester); ?></td>
				<td><?php echo e(date('Y-m-d', strtotime($value->permitEntity->permitDateFrom))); ?></td>
				<td><?php echo e(date('Y-m-d', strtotime($value->permitEntity->permitDateTo))); ?></td>
				<td><?php echo e(date('H:i', strtotime($value->permitEntity->permitHourFrom))); ?></td>
				<td><?php echo e(date('H:i', strtotime($value->permitEntity->permitHourTo))); ?></td>
				<td><?php echo e($value->permitEntity->status); ?></td>
				<td><?php echo e($value->permitEntity->customerName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/export_workflow_list.blade.php ENDPATH**/ ?>