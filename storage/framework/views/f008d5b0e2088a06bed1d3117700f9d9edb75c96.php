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
				<th>Ticket Number</th>
				<th>Employee Name</th>
				<th>Customer Name</th>
                <th>Claim Type</th>
                
                <th>Destination</th>
                <th>Customer Name</th>
				<th>Project Name</th>
				<th>Currency</th>
				<th>Total Paid</th>
				<th>Total Request</th>
				
				<th>Total Approve HRD</th>
				<th>Tujuan</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $value->responseSettlement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					
					<td><?php echo e($no++); ?></td>
					
					<td><?php echo e($value2->ticketNo); ?></td>
					<td><?php echo e($value2->fullnameRequester); ?></td>
					<td><?php echo e($value2->customerName); ?></td>
					<td><?php echo e($value2->status); ?></td>
					<td><?php echo e($value3->typeClaim); ?></td>
					
					<td><?php echo e($value2->destination); ?></td>
					<td><?php echo e($value2->customerName); ?></td>
					<td><?php echo e($value2->projectName); ?></td>
					<td>IDR</td>
					<td><?php echo e($value2->total); ?></td>
					<td><?php echo e($value2->totalClaimAmount); ?></td>
					
					<td><?php echo e($value3->sequence); ?></td>
					<td><?php echo e($value2->purpose); ?></td>
					
				</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/exp_businesstripsettlement_list.blade.php ENDPATH**/ ?>