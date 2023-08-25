<!DOCTYPE html>
<html>
<head>
    <title>Periodical Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
            font-size: 14px;
		}
        .table_detail td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
            padding:2px;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    <h3><?php echo e($data_company[0]->companyName); ?> <br> <?php echo e($data_company[0]->address); ?></h3>
    <h3 style="text-align:center">Periodical Report</h3>
    <h4 style="text-align:center">Period : <?php echo e(date('F Y', strtotime($data_period))); ?></h4>
    <?php
    $total = [];
    ?>
    <?php if(count($data) > 0 && (count($data[0]->detail) > 0 || count($data[0]->summary) > 0)): ?>
    <?php
        $countcolspan = count($data[0]->detail[0]->field) + 3;
    ?>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <?php $__currentLoopData = $data[0]->detail[0]->field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dataTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!is_string($dataTable->value)): ?>
                        <?php
                        $total[$dataTable->field] = 0;
                        ?>
                    <?php endif; ?>
                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;"><?php echo e($dataTable->tableName); ?></th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data[0]->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dataTable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="text-align:center; vertical-align:middle; border:1px solid #000;"><?php echo e($key+1); ?></td>
                <?php $__currentLoopData = $dataTable->field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $dataTable2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $alignment = "center";
                    if($dataTable2->alignment == 1){
                        $alignment = "left";
                    }else if($dataTable2->alignment == 2){
                        $alignment = "center";
                    }else if($dataTable2->alignment == 3){
                        $alignment = "right";
                    }
                    ?>
                    <?php if($dataTable2->dataFormat == "#,##0"): ?>
                        <?php
                        $total[$dataTable2->field] += $dataTable2->value;
                        ?>
                        <td style="text-align:<?php echo e($alignment); ?>; border:1px solid #000;">Rp <?php echo e(number_format($dataTable2->value, 2, ',', '.')); ?></td>
                    <?php elseif($dataTable2->dataFormat == "dd/MM/YYYY"): ?>
                        <td style="text-align:<?php echo e($alignment); ?>; border:1px solid #000;"><?php echo e(date('d/m/Y', strtotime($dataTable2->value))); ?></td>
                    <?php elseif($dataTable2->dataFormat == "dd MM YYYY"): ?>
                        <td style="text-align:<?php echo e($alignment); ?>; border:1px solid #000;"><?php echo e(date('d m Y', strtotime($dataTable2->value))); ?></td>
                    <?php else: ?>
                        <td style="text-align:<?php echo e($alignment); ?>; border:1px solid #000;"><?php echo e($dataTable2->value); ?></td>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($grand_total): ?>
            <tr>
                <td colspan="3" style="background-color: yellow; text-align:center; border:1px solid #000;">Grand Total</td>
                <?php $__currentLoopData = $data[0]->detail[0]->field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3 => $dataTable3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td style="text-align:right; border:1px solid #000;">Rp <?php echo e(number_format($total[$dataTable3->field], 2, ',', '.')); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/payroll/py_export_periodical_report.blade.php ENDPATH**/ ?>