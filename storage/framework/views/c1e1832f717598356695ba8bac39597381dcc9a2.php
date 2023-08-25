<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('payroll_retroactive_report.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
            margin: 0;
            padding: 0;
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}, 
        
		.table_detail td{
			border:1px solid #000;
			text-align:center;
		}
		.table_detail th{
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}

        @page  { margin-bottom: 150px; size: auto; }
        /* header { position: fixed; left: 0px; top: -90px; right: 0px; height: 150px; text-align: center; } */
        footer { position: absolute; left: 25px; bottom: -85px; right: 0px; height: 110px; }
        table { page-break-inside:auto }
        tr{page-break-inside:avoid !important; page-break-after:auto }
        thead { display:table-header-group; }
        tfoot { display:table-footer-group; }
	</style>
</head>
<body>
    <h3 style="text-align:center">Business Trip Report</h3>
	<table style="width:100%; font-size: 12px;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Ticket No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Destination</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Purpose</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Project Name</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Customer Name</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Status</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #b5f797;">Full Name Requester</th>
            </tr>
        </thead>
        <tbody>
			<?php $no = 1; ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $__currentLoopData = $value->responseSettlement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<?php if($value->responseSettlement =! null): ?>
					<td><?php echo e($no++); ?></td>
					<td><?php echo e($value2->ticketNo); ?></td>
					<td><?php echo e($value2->fullnameRequester); ?></td>
					<td><?php echo e($value2->customerName); ?></td>
					<td><?php echo e($value2->status); ?></td>
					<td><?php echo e($value3->typeClaim); ?></td>
					<td><?php echo e($value2->destination); ?></td>
					<td><?php echo e($value2->customerName); ?></td>
					<td><?php echo e($value2->projectName); ?></td>
					<?php else: ?>
					<td><?php echo e($value2->responseSettlement); ?></td>
					<?php endif; ?>
				</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
    </table>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/export/exp_businesstripsettlementpdf.blade.php ENDPATH**/ ?>