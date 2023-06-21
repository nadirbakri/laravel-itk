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
	<?php if(!empty($data)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table ComGen</td>
			</tr>
			<tr>
				<th>Variable</th>
				<th>ComGen Code</th>
				<th>Value</th>
			</tr>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e(strtok($value->variable, '_')); ?></td>
				<td><?php echo e($value->comGenCode); ?></td>
				<td><?php echo e($value->value); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data2)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Cost Center</td>
			</tr>
			<tr>
				<th>Cost Center Code</th>
				<th>Description</th>
			</tr>
			<?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->costCenterCode); ?></td>
				<td><?php echo e($value->costCenterDescription); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data3)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Location</td>
			</tr>
			<tr>
				<th>Location Code</th>
				<th>Location Name</th>
			</tr>
			<?php $__currentLoopData = $data3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->locationCode); ?></td>
				<td><?php echo e($value->locationName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data4)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Grade</td>
			</tr>
			<tr>
				<th>Grade Code</th>
				<th>Grade Name</th>
			</tr>
			<?php $__currentLoopData = $data4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->gradeCode); ?></td>
				<td><?php echo e($value->gradeName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data5)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Position</td>
			</tr>
			<tr>
				<th>Position Code</th>
				<th>Position Name</th>
				<th>Supervisor Position Code</th>
			</tr>
			<?php $__currentLoopData = $data5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->positionCode); ?></td>
				<td><?php echo e($value->positionName); ?></td>
				<td><?php echo e($value->supervisorPositionCode); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data6)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Ranking</td>
			</tr>
			<tr>
				<th>Ranking Code</th>
				<th>Ranking Name</th>
			</tr>
			<?php $__currentLoopData = $data6; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->rankingCode); ?></td>
				<td><?php echo e($value->rankingName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data7)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Work Nature</td>
			</tr>
			<tr>
				<th>Work Nature Code</th>
				<th>Work Nature Name</th>
			</tr>
			<?php $__currentLoopData = $data7; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->workNatureCode); ?></td>
				<td><?php echo e($value->workNatureName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data8)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Group</td>
			</tr>
			<tr>
				<th>Group Code</th>
				<th>Group Name</th>
			</tr>
			<?php $__currentLoopData = $data8; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->groupCode); ?></td>
				<td><?php echo e($value->groupName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data9)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Group Authorize</td>
			</tr>
			<tr>
				<th>Group Authorize Code</th>
				<th>Group Authorize Description</th>
			</tr>
			<?php $__currentLoopData = $data9; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->groupAuthorizeCode); ?></td>
				<td><?php echo e($value->groupAuthorizeDesc); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data10)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Work Pattern</td>
			</tr>
			<tr>
				<th>Pattern Code</th>
				<th>Description</th>
			</tr>
			<?php $__currentLoopData = $data10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->patternCode); ?></td>
				<td><?php echo e($value->description); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data11)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table NPWP</td>
			</tr>
			<tr>
				<th>NPWP Code</th>
				<th>Pemotong Kuasa</th>
			</tr>
			<?php $__currentLoopData = $data11; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->npwpCode); ?></td>
				<td><?php echo e($value->pemotongKuasa); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data12)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table BPJS</td>
			</tr>
			<tr>
				<th>BPJS Code</th>
				<th>Signer Name</th>
			</tr>
			<?php $__currentLoopData = $data12; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->bpjsCode); ?></td>
				<td><?php echo e($value->signerName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data13)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Bank</td>
			</tr>
			<tr>
				<th>Bank Code</th>
				<th>Bank Name</th>
			</tr>
			<?php $__currentLoopData = $data13; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->bankCode); ?></td>
				<td><?php echo e($value->bankName); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
	<br>
	<?php if(!empty($data14)): ?>
	<table style="width: 100%; font-size: 14px;" class="table table-bordered table-hover responsive">
		<tbody>
            <tr>
				<td>Table Company Bank</td>
			</tr>
			<tr>
				<th>Bank Code</th>
				<th>Description</th>
			</tr>
			<?php $__currentLoopData = $data14; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->bankCode); ?></td>
				<td><?php echo e($value->description); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	<?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/personel/personel_export_template_personal_data_info_sheet.blade.php ENDPATH**/ ?>