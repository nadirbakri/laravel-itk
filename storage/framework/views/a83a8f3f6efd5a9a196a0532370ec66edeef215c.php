<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(__('payroll.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/payroll.css')); ?>">
	<style type="text/css">
		.div-payroll {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
		.modal-content {
			border-radius: 1rem;
		}
		.modal-header-notification-error {
            border-bottom: 1px solid #eee;
            background-color: #f44336;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
		.modal-header-authentication {
            border-bottom: 1px solid #eee;
            background-color: #004883;
            color: white;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
	</style>
</head>
<body>
	<div class="div-payroll">
		<div class="div-title">
			<img src="<?php echo e(url('icons/sidebar/payroll.png')); ?>" alt="Title">
			<span class="title-text"><?php echo e(__('payroll.judul')); ?></span>
		</div>
		<?php $__currentLoopData = $dataParent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="card">
			<a class="collapsed" data-toggle="collapse" href="#<?php echo e($value->pageURL); ?>" aria-expanded="true" aria-controls="<?php echo e($value->pageURL); ?>">
				<div class="card-header">
					<div class="div-dropdown-title">
						<img class="dropdown-logo" src="<?php echo e(url('/icons/payroll/' . $value->pageURL . '.svg')); ?>" alt="payroll">
						<span class="dropdown-title-text"><?php echo e($value->menuName); ?></span>
						<img class="dropdown-triangle" src="<?php echo e(url('/pictures/triangle.png')); ?>" alt="Triangle">
					</div>
				</div>
			</a>
			<div id="<?php echo e($value->pageURL); ?>" class="collapse">
				<div class="card-block">
					<?php
						$dataSubMenu = \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($dataMenu, $value->menuID)
					?>
					<?php $__currentLoopData = $dataSubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($value2->isHaveChild): ?>
							<div class="div-head-data">
								<span class="head-title-text"><?php echo e($value2->menuName); ?></span>
							</div>
							<div class="row div-child-data">
								<?php
									$dataSubSubMenu = \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($dataMenu, $value2->menuID)
								?>
								<?php $__currentLoopData = $dataSubSubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3 => $value3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col col-3">
									<a href="<?php echo e(url($value3->pageURL)); ?>" target="iframe_dashboard">
										<img src="<?php echo e(url('/icons/payroll/submenu-' . $value->pageURL . '.svg')); ?>" alt="Child payroll">
										<span class="child-title-text"><?php echo e($value3->menuName); ?></span>
									</a>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="row div-child-data">
					<?php $__currentLoopData = $dataSubMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(!$value2->isHaveChild): ?>
							<div class="col col-3">
								<a href="<?php echo e(url($value2->pageURL)); ?>" target="iframe_dashboard">
									<img src="<?php echo e(url('/icons/payroll/submenu-' . $value->pageURL . '.svg')); ?>" alt="Child payroll">
									<span class="child-title-text"><?php echo e($value2->menuName); ?></span>
								</a>
							</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="modal fade" id="modal_authentication"  role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header modal-header-authentication text-center">
                    <h5 class="modal-title w-100 title-text-authentication"><?php echo e(__('payroll_salary_accumulation_data.header_password_form')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="authentication_form" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label
                                        for="user_id"><?php echo e(__('payroll_salary_accumulation_data.label_user_id')); ?></label>
                                    <input type="text" class="form-control" id="user_id" name="user_id"
                                        placeholder="<?php echo e(__('payroll_salary_accumulation_data.label_user_id')); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password"><?php echo e(__('payroll_salary_accumulation_data.label_password')); ?></label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="<?php echo e(__('payroll_salary_accumulation_data.label_password')); ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary rounded-right" type="button" id="show_password"><i id="icon_show_password"
                                                class="fa fa-eye" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" id="btn-ok" name="btn-ok" class="btn btn-primary w-25"><i>
                                </i> <?php echo e(__('payroll_salary_accumulation_data.btn_ok')); ?></button>
                            <button type="button" id="btn-cncl" class="btn btn-primary w-25" data-dismiss="modal"><i
                                class="fa fa-times-circle"></i> <?php echo e(__('payroll_salary_accumulation_data.btn_cancel')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<?php if($errors->any()): ?>
	<div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" data-toggle="modal" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-error">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification-error"><?php echo e($errors->first()); ?></span>
                </div>
				<div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary w-25 ml-auto" data-dismiss="modal"><?php echo e(__('personel_print_letter.btn_back')); ?></button>
                </div>
            </div>
        </div>
    </div>

	<?php endif; ?>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		var error = "<?php echo e($errors->any()); ?>";
		if (error) {
			$('#notification_error').modal('show');
		}

		$('#notification_error').on('hide.bs.modal', function () {
            $('#modal_authentication').modal('show');
        });

		$("#btn-ok").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $("#authentication_form").submit();
        });

		if ($("#authentication_form").length > 0) {
            $("#authentication_form").validate({
                rules: {
                    user_id: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    user_id: {
                        required: "<?php echo e(__('payroll_salary_accumulation_data.userid_required')); ?>",
                    },
                    password: {
                        required: "<?php echo e(__('payroll_salary_accumulation_data.password_required')); ?>",
                    },
                },
                highlight: function (element) {
                    jQuery(element).closest('.form-control').addClass('is-invalid');
                    $('#show_password').addClass('danger');
                },
                unhighlight: function (element) {
                    jQuery(element).closest('.form-control').removeClass('is-invalid');
                    $('#show_password').removeClass('danger');
                },
                errorElement: 'label',
                errorClass: 'text-danger',
                errorPlacement: function (error, element) {
					$("#btn-ok").prop("disabled", false);
                    $("#btn-ok").html('<?php echo e(__("payroll_salary_accumulation_data.btn_ok")); ?>');

                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
					$("#btn-ok").prop("disabled", true);
                    $("#btn-ok").html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                    );

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "<?php echo e(url('authentication/proses')); ?>",
                        type: "POST",
                        data: $('#authentication_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
								$("#btn-ok").prop("disabled", false);
								$("#btn-ok").html('<?php echo e(__("payroll_salary_accumulation_data.btn_ok")); ?>');
                                $('#modal_authentication').modal('hide');
								window.location =
									"<?php echo e(url('payroll/import_data_from_excel')); ?>";
                            } else {
								$("#btn-ok").prop("disabled", false);
								$("#btn-ok").html('<?php echo e(__("payroll_salary_accumulation_data.btn_ok")); ?>');
                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "<?php echo e(__('login.error')); ?>");
                                } else {
                                    $('#message-notification-error').html(response.message);
                                }
                            }
                        },
                        error: function (response) {
							$("#btn-ok").prop("disabled", false);
							$("#btn-ok").html('<?php echo e(__("payroll_salary_accumulation_data.btn_ok")); ?>');
                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }

                    });
                }
            })
        }
	})
</script>

</html><?php /**PATH D:\File Kerja\Front End\laravel_project_azure\resources\views/payroll/py_main.blade.php ENDPATH**/ ?>