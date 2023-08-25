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
                <th>Status</th>
				<th>Ticket No</th>
                <th>Name</th>
				<th>Employee No</th>
				<th>Project Name</th>
				<th>Overtime Date</th>
                <th>Overtime Hour From</th>
                <th>Overtime Hour To</th>
                <th>Overtime Remarks</th>
                <th>Project Name</th>
                <th>Customer Name</th>
                <th>Total Paid</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($no++); ?></td>
				<td><?php echo e($value->overtimeEntity->status); ?></td>
				<td><?php echo e($value->overtimeEntity->ticketNo); ?></td>
				<td><?php echo e($value->overtimeEntity->fullnameRequester); ?></td>
				<td><?php echo e($value->overtimeEntity->employeeNo); ?></td>
				<td><?php echo e($value->overtimeEntity->projectName); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->overtimeEntity->overtimeDate)->format('Y-m-d')); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->overtimeEntity->overtimeHourFrom)->format('H:i:s')); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->overtimeEntity->overtimeHourTo)->format('H:i:s')); ?></td>
				<td><?php echo e($value->overtimeEntity->overtimeRemarks); ?></td>
				<td><?php echo e($value->overtimeEntity->projectName); ?></td>
				<td><?php echo e($value->overtimeEntity->customerName); ?></td>
				<td></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/export_overtime_list.blade.php ENDPATH**/ ?>