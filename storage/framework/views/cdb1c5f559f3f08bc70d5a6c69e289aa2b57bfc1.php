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
				<th>Employee No</th>
                <th>AbsenceType</th>
                <th>ShiftCode</th>
				<th>Date</th>
				<th>Duration</th>
				<th>CheckIn</th>
				<th>CheckOut</th>
				<th>AddressIn</th>
                <th>AddressOut</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($no++); ?></td>
                <td><?php echo e($value->employeeNo); ?></td>
                <td><?php echo e($value->absenceType); ?></td>
                <td><?php echo e($value->shiftCode); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->date)->format('Y-m-d')); ?></td>
				<td><?php echo e($value->duration); ?></td>
				<td><?php echo e(date('Y-m-d H:i:s', strtotime($value->checkInDate))); ?></td>
				<td><?php echo e(date('Y-m-d H:i:s', strtotime($value->checkOutDate))); ?></td>
				<td><?php echo e($value->address); ?></td>
				<td><?php echo e($value->addressOut); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/export_attendance_list.blade.php ENDPATH**/ ?>