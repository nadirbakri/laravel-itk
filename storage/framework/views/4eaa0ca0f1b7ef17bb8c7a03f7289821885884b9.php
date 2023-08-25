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
				<th>Leave Type</th>
                <th>Leave Time</th>
                <th>Leave Start</th>
				<th>Leave End</th>
				<th>Leave Duration</th>
				<th>Approve Date</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($no++); ?></td>
				<td><?php echo e($value->leaveEntity->employeeNo); ?></td>
				<td><?php echo e($value->leaveEntity->fullnameRequester); ?></td>
				<td><?php echo e($value->leaveEntity->leaveName); ?></td>
				<td><?php echo e($value->leaveEntity->leaveTime); ?></td>
				<td><?php echo e(date('Y-m-d', strtotime($value->leaveEntity->leaveDateFrom))); ?></td>
				<td><?php echo e(date('Y-m-d', strtotime($value->leaveEntity->leaveDateTo))); ?></td>
				<td><?php echo e($value->leaveEntity->leaveDuration); ?></td>
				<td><?php echo e(date('Y-m-d', strtotime($value->leaveEntity->changedDate))); ?></td>
				<td><?php echo e($value->leaveEntity->leaveRemarks); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/exp_workflow_list_leave.blade.php ENDPATH**/ ?>