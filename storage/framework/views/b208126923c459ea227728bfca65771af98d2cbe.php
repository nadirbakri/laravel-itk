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
				<th>Request Date</th>
				<th>Status</th>
				<th>Ticket Number</th>
				<th>Claim Type</th>
				<th>Employee No</th>
				<th>Receipt Date</th>
				
				<th>Remarks</th>
				
				<th>Total Paid</th>
				<th>Paid Remarks</th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($no++); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->reimbursementEntity->createdDate)->format('Y-m-d')); ?></td>
				<td><?php echo e($value->reimbursementEntity->reimbursementStatus); ?></td>
				<td><?php echo e($value->reimbursementEntity->ticketNo); ?></td>
				<td><?php echo e($value->reimbursementEntity->medicalType1); ?></td>
				<td><?php echo e($value->reimbursementEntity->employeeNo); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->reimbursementEntity->receiptDate)->format('Y-m-d')); ?></td>
				
				<td><?php echo e($value->reimbursementEntity->reimbursementRemarks); ?></td>
				
				<td><?php echo e($value->reimbursementEntity->paidAmount); ?></td>
				<td><?php echo e($value->reimbursementEntity->approvalRemarks); ?></td>
				
				
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html>

<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/export_medical_list.blade.php ENDPATH**/ ?>