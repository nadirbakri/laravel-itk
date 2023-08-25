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
				<th><?php echo e(__('export_reimbursement.no')); ?></th>
				
				<th><?php echo e(__('export_reimbursement.status')); ?></th>
				<th><?php echo e(__('export_reimbursement.ticket')); ?></th>
				<th><?php echo e(__('export_reimbursement.rdate')); ?></th>
				<th><?php echo e(__('export_reimbursement.employee')); ?></th>
				<th><?php echo e(__('export_reimbursement.cname')); ?></th>
                <th><?php echo e(__('export_reimbursement.pname')); ?></th>
				
                <th><?php echo e(__('export_reimbursement.currency')); ?></th>
                <th><?php echo e(__('export_reimbursement.tcamount')); ?></th>
                <th><?php echo e(__('export_reimbursement.pamount')); ?></th>
                <th><?php echo e(__('export_reimbursement.pdate')); ?></th>
				
				
				<th><?php echo e(__('export_reimbursement.premarks')); ?></th>
			</tr>
		</thead>
		<tbody>
            <?php $no = 1; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
                <td><?php echo e($no++); ?></td> 
				
				<td><?php echo e($value->reimbursementEntity->reimbursementStatus); ?></td>
				<td><?php echo e($value->reimbursementEntity->ticketNo); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->reimbursementEntity->receiptDate)->format('Y-m-d')); ?></td> 
				<td><?php echo e($value->reimbursementEntity->employeeNo); ?></td>
				<td><?php echo e($value->reimbursementEntity->customerName); ?></td>
				<td><?php echo e($value->reimbursementEntity->projectName); ?></td>
				
				<td><?php echo e($value->reimbursementEntity->currency); ?></td>
				<td><?php echo e($value->reimbursementEntity->totalClaimAmount); ?></td>
				<td><?php echo e($value->reimbursementEntity->paidAmount); ?></td>
				<td><?php echo e(\Carbon\Carbon::parse($value->reimbursementEntity->paymentDate)->format('Y-m-d')); ?></td> 
				
				
				<td><?php echo e($value->reimbursementEntity->approvalRemarks); ?></td> 
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/export_reimbursement_list.blade.php ENDPATH**/ ?>