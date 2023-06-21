<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo e(__('payroll_payment_slip.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 20px;
			margin-right: 20px;
			margin-bottom: 5px;
			margin-top: 5px;
		}
		.table_detail td{
			border:1px solid #000;
			text-align:center;
            padding:4px;
		}
		.table_detail th{
			border:1px solid #000;
            padding:4px;
            background-color:#84c2e0;
		}
		.table_detail{
			border-collapse:collapse;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- START HEADER -->
    <table style="width:100%; border:1px solid #000; padding:2%;">
        <thead style="border-bottom:1px solid #000;">
            <tr>
                <?php if($display_logo == "1"): ?>
                <td colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 3 : 2); ?>" style="text-align:left; font-size: 30px; font-weight: 700;"><?php echo e($value->slipName); ?></td>
                <td colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 3 : 2); ?>" style="text-align:right;"><img src="data:image/png;base64,<?php echo e(base64_encode(file_get_contents(public_path('/pictures/logo_intikom.png')))); ?>" style="width: 180px; height: 60px" alt="Logo"></td>
                <?php else: ?>
                <td colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 6 : 4); ?>" style="text-align:left; font-size: 30px; font-weight: 700;"><?php echo e($value->slipName); ?></td>
                <?php endif; ?>
            </tr>
            <br>
            <tr>
                <?php if($value->custom1 != null): ?>
                <td width="15%" style="font-size: 20px; font-weight: 600;">Employee No</td>
                <td width="17%" style="border-bottom: 1px dashed black;"><?php echo e($value->employeeNo); ?></td>
                <td width="15%" style="font-size: 17px; font-weight: 600; padding-left: 10px;">Join Date</td>
                <td width="17%" style="border-bottom: 1px dashed black;"><?php echo e(date('d F Y', strtotime($value->joinDate))); ?></td>
                <td width="15%" style="font-size: 17px; font-weight: 600; padding-left: 10px;">Custom 1</td>
                <td width="17%" style="border-bottom: 1px dashed black;"><?php echo e($value->custom1); ?></td>
                <?php else: ?>
                <td width="15%" style="font-size: 17px; font-weight: 600;">Employee No</td>
                <td width="35%" style="border-bottom: 1px dashed black;"><?php echo e($value->employeeNo); ?></td>
                <td width="15%" style="font-size: 17px; font-weight: 600; padding-left: 10px;">Join Date</td>
                <td width="40%" style="border-bottom: 1px dashed black;"><?php echo e($value->joinDate); ?></td>
                <?php endif; ?>
            </tr>
            <tr>
                <?php if($value->custom2 != null): ?>
                <td style="font-size: 17px; font-weight: 600;">Employee Name</td>
                <td style="border-bottom: 1px dashed black;"><?php echo e($value->employeeName); ?></td>
                <td style="font-size: 17px; font-weight: 600; padding-left: 10px;">Position</td>
                <td style="border-bottom: 1px dashed black;"><?php echo e($value->position); ?></td>
                <td style="font-size: 17px; font-weight: 600; padding-left: 10px;">Custom 2</td>
                <td style="border-bottom: 1px dashed black;"><?php echo e($value->custom2); ?></td>
                <?php else: ?>
                <td style="font-size: 17px; font-weight: 600;">Employee Name</td>
                <td style="border-bottom: 1px dashed black;"><?php echo e($value->employeeName); ?></td>
                <td style="font-size: 17px; font-weight: 600; padding-left: 10px;">Position</td>
                <td style="border-bottom: 1px dashed black;"><?php echo e($value->position); ?></td>
                <?php endif; ?>
            </tr>
            <br>
        </thead>
        <tbody>
            <br>
            <tr>
                <td colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 3 : 2); ?>" style="vertical-align:top">
                    <!-- <div style="width:100%; height:100px;"> -->
                    <table style="width:100%;">
                        <tr>
                            <td colspan="3" style="font-size: 22px; font-weight: 600;">Allowance</td> 
                        </tr>
                        <br>
                        <?php if($value->allowance1Label != null): ?>
                        <tr>
                            <td width="40%"><?php echo e(($value->allowance1Label != null) ? $value->allowance1Label : 'Allowance 1'); ?></td>
                            <td width="15%" style="text-align:center;">IDR</td>
                            <td width="30%" style="text-align:right;"><?php echo e(number_format($value->allowance1Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance2Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance2Label != null) ? $value->allowance2Label : 'Allowance 2'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance2Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance3Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance3Label != null) ? $value->allowance3Label : 'Allowance 3'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance3Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance4Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance4Label != null) ? $value->allowance4Label : 'Allowance 4'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance4Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance5Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance5Label != null) ? $value->allowance5Label : 'Allowance 5'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance5Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance6Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance6Label != null) ? $value->allowance6Label : 'Allowance 6'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance6Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance7Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance7Label != null) ? $value->allowance7Label : 'Allowance 7'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance3Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance8Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance8Label != null) ? $value->allowance8Label : 'Allowance 8'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance3Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance9Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance9Label != null) ? $value->allowance9Label : 'Allowance 9'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance9Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->allowance10Label != null): ?>
                        <tr>
                            <td><?php echo e(($value->allowance10Label != null) ? $value->allowance10Label : 'Allowance 10'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->allowance10Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td>Total Allowance</td>
                            <td style="text-align:center; border-top: 1px solid black;">IDR</td>
                            <td style="text-align:right; border-top: 1px solid black;"><?php echo e(number_format($value->totalAllowance, 2, ',', '.')); ?></td>
                        </tr>
                    </table>
                    <!-- </div> -->
                </td>
                <td colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 3 : 2); ?>" style="vertical-align:top">
                    <!-- <div style="width:100%; height:100px;"> -->
                    <table style="width:100%;">
                        <tr>
                            <td colspan="3" style="font-size: 22px; font-weight: 600; padding-left: 10px;">Deduction</td>    
                        </tr>
                        <br>
                        <?php if($value->deduction1Label != null): ?>
                        <tr>
                            <td width="40%" style="padding-left: 10px;"><?php echo e(($value->deduction1Label != null) ? $value->deduction1Label : 'Deduction 1'); ?></td>
                            <td width="15%" style="text-align:center;">IDR</td>
                            <td width="30%" style="text-align:right;"><?php echo e(number_format($value->deduction1Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction2Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction2Label != null) ? $value->deduction2Label : 'Deduction 2'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction2Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction3Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction3Label != null) ? $value->deduction3Label : 'Deduction 3'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction3Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction4Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction4Label != null) ? $value->deduction4Label : 'Deduction 4'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction4Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction5Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction5Label != null) ? $value->deduction5Label : 'Deduction 5'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction5Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction6Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction6Label != null) ? $value->deduction6Label : 'Deduction 6'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction6Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction7Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction7Label != null) ? $value->deduction7Label : 'Deduction 7'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction7Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction8Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction8Label != null) ? $value->deduction8Label : 'Deduction 8'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction8Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction9Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction9Label != null) ? $value->deduction9Label : 'Deduction 9'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction9Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <?php if($value->deduction10Label != null): ?>
                        <tr>
                            <td style="padding-left: 10px;"><?php echo e(($value->deduction10Label != null) ? $value->deduction10Label : 'Deduction 10'); ?></td>
                            <td style="text-align:center;">IDR</td>
                            <td style="text-align:right;"><?php echo e(number_format($value->deduction10Field, 2, ',', '.')); ?></td></tr>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td style="padding-left: 10px;">Total Deduction</td>
                            <td style="text-align:center; border-top: 1px solid black;">IDR</td>
                            <td style="text-align:right; border-top: 1px solid black;"><?php echo e(number_format($value->totalDeduction, 2, ',', '.')); ?></td>
                        </tr>
                        <br>
                        <tr>
                            <td style="padding-left: 10px;">Take Home Pay</td>
                            <td style="text-align:center; border-bottom: 1px solid black;">IDR</td>
                            <td style="text-align:right; border-bottom: 1px solid black;"><?php echo e(number_format($value->takeHomePay, 2, ',', '.')); ?></td>
                        </tr>
                    </table>
                    <!-- </div> -->
                </td>
            </tr>
            <br>
            <tr>
                <td colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 4 : 3); ?>"> </td>
                <td style="text-align:right;" colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 2 : 1); ?>"><?php echo e($value->location); ?>, <?php echo e(date('d F Y', strtotime($value->printDate))); ?></td>
            </tr>
            <br><br>
            <tr>
                <td colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 4 : 3); ?>"> </td>
                <td style="text-align:right;" colspan="<?php echo e(($value->custom1 != null || $value->custom2 != null) ? 2 : 1); ?>"><?php echo e($value->employeeName); ?></td>
            </tr>
        </tbody>
    </table>    
    <!-- END HEADER -->

    <?php if($key != array_key_last($data)): ?>
		<div class="page_break"></div>
	<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $text = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.5;  //  default
            $char_space = 0.5;  //  default
            $angle = 0.5;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 35;

            $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/payroll/py_export_payment_slip_landscape.blade.php ENDPATH**/ ?>