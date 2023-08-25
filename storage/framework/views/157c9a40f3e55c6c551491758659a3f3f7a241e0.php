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
				<th>Employee Name</th>
				<th>Request Date</th>
				<th>Status</th>
				<th>Ticket Number</th>
				<th>Claim Type</th>
                
                <th>Company Customer</th>
                <th>Remarks</th>
                <th>Start Location</th>
                <th>End Location</th>
                
                <th>Total Request (Rp)</th>
                <th>Total per Employee (Rp)</th>
                <th>No Rekening</th>
                <th>Total Approve HRD (Rp)</th>
                <th>Paid Remarks (Rp)</th>
                <th>Parking</th>
                <th>Toll</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 0; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($no++); ?></td>
				<td><?php echo e($value->transportEntity->fullnameRequester); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->transportEntity->receiptDate)->format('Y-m-d')); ?></td>
				<td><?php echo e($value->transportEntity->status); ?></td>
				<td><?php echo e($value->transportEntity->ticketNo); ?></td>
				<td><?php echo e($value->transportEntity->type); ?></td>
				<td><?php echo e($value->transportEntity->customerName); ?></td>
				<td><?php echo e($value->transportEntity->remarks); ?></td>
				<td><?php echo e($value->transportEntity->startLocation); ?></td>
				<td><?php echo e($value->transportEntity->endLocation); ?></td>
				<td><?php echo e($value->transportEntity->totalAmount); ?></td>
				<td></td>
				<td></td>
				<td><?php echo e($value->transportEntity->paidAmount); ?></td>
				<td><?php echo e($value->transportEntity->paidRemarks); ?></td>
				<td><?php echo e($value->transportEntity->amountToll); ?></td>
				<td><?php echo e($value->transportEntity->amountParkir); ?></td>
				
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/transport_export.blade.php ENDPATH**/ ?>