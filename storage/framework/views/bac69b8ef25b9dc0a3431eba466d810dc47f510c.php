<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('error_page.judul2')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php echo e(asset('css/time_management_detail.css')); ?>">
	<style type="text/css">
		.div-time_management {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
        .col-4, img {
            margin-left: auto;
            margin-right: auto;
            display: block;
        }
        img {
            max-width: 23%;
            margin-top: 3%;
        }
        p {
            margin-bottom: 0.1rem;
        }
	</style>
</head>

<body>
	<div class="div-time_management">
        <img src="<?php echo e(asset('pictures/404.svg')); ?>" alt="Toogle">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6" style="text-align: center; font-size: 1.5rem; font-family: Montserrat;"><?php echo e(__('error_page.subjudul2')); ?></div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6" style="text-align: center; font-size: 1rem;">
                <p><?php echo e(__('error_page.text5')); ?></p>
                <p><?php echo e(__('error_page.text6')); ?></p>
                <br>
                <p><?php echo e(__('error_page.text7')); ?></p>
                <p><?php echo e(__('error_page.text4')); ?></p>
                <p><a href="mailto:support@intikom.com">support@intikom.com</a></p>
                <br><br>
                <p class="text-muted">© Copyright PT Intikom Berlian Mustika <?php echo e(date('Y')); ?></p>
            </div>
            <div class="col-3"></div>
        </div>
	</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/error/not_found.blade.php ENDPATH**/ ?>