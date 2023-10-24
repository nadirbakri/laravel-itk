<!DOCTYPE html>
<html>
<head>
	<title><?php echo e(__('change_password.judul')); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?php echo e(asset('css/personel_detail_data.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>">
	<style type="text/css">
		.div-utilities {
			max-width: 100%;
			margin: auto;
			/*margin-top: 1%;*/
		}
        .form-group {
            margin-bottom: 0;
        }
        .row {
            margin: 1%;
        }
        .div-title a {
            text-decoration: none;
            display: flex;
            align-items:center;
        }
        .div-title img {
            height: 3.5vh;
        }
        .modal-header-notification {
            border-bottom:1px solid #eee;
            background-color: #f44336;
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
	<div class="div-utilities">
		<div class="div-title">
            <img src="<?php echo e(url('/pictures/password.png')); ?>" alt="Password">
            <span class="title-text"><?php echo e(__('change_password.judul')); ?></span>
		</div>
		<div class="div-form">
            <form id="change_password_form" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group form-invalid">
                            <label><?php echo e(__('change_password.old_password')); ?></label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="<?php echo e(__('change_password.old_password_placeholder')); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded-right" type="button" id="show_old_password"><i id="icon_show_old_password" class="fa fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <label class="text-danger">&nbsp</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group form-invalid">
                            <label><?php echo e(__('change_password.new_password')); ?></label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="<?php echo e(__('change_password.new_password_placeholder')); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded-right" type="button" id="show_new_password"><i id="icon_show_new_password" class="fa fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <label class="text-danger">&nbsp</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group form-invalid">
                            <label><?php echo e(__('change_password.confirm_new_password')); ?></label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="<?php echo e(__('change_password.confirm_new_password_placeholder')); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rounded-right" type="button" id="show_confirm_new_password"><i id="icon_show_confirm_new_password" class="fa fa-eye" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <label class="text-danger">&nbsp</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" name="btn-submit" id="btn-submit" style="width: 100%;">
                            <i class="fa fa-check"></i> Confirm
                        </button>
                    </div>
                </div>
            </form>
		</div>
	</div>
    <div class="modal fade" role="dialog" id="notification">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification">
                    <h5 class="modal-title">Error!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="message-notification"><?php echo e($errors->first()); ?></span>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="<?php echo e(asset('js/jquery.inputpicker.js')); ?>"></script>

<script>
    var exist = '<?php echo e($errors->any()); ?>';
    if(exist){
        $('#notification').modal('show');
    }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#notification').on('hidden.bs.modal', function () {
        $('#notification').modal('hide');
    })

    $("#show_old_password").on('click', function(event) {
        event.preventDefault();
        if($('#old_password').attr("type") == "text"){
            $('#old_password').attr('type', 'password');
            $('#icon_show_old_password').addClass( "fa-eye" );
            $('#icon_show_old_password').removeClass( "fa-eye-slash" );
        }else if($('#old_password').attr("type") == "password"){
            $('#old_password').attr('type', 'text');
            $('#icon_show_old_password').removeClass( "fa-eye" );
            $('#icon_show_old_password').addClass( "fa-eye-slash" );
        }
    });

    $("#show_new_password").on('click', function(event) {
        event.preventDefault();
        if($('#new_password').attr("type") == "text"){
            $('#new_password').attr('type', 'password');
            $('#icon_show_new_password').addClass( "fa-eye" );
            $('#icon_show_new_password').removeClass( "fa-eye-slash" );
        }else if($('#new_password').attr("type") == "password"){
            $('#new_password').attr('type', 'text');
            $('#icon_show_new_password').removeClass( "fa-eye" );
            $('#icon_show_new_password').addClass( "fa-eye-slash" );
        }
    });

    $("#show_confirm_new_password").on('click', function(event) {
        event.preventDefault();
        if($('#confirm_new_password').attr("type") == "text"){
            $('#confirm_new_password').attr('type', 'password');
            $('#icon_show_confirm_new_password').addClass( "fa-eye" );
            $('#icon_show_confirm_new_password').removeClass( "fa-eye-slash" );
        }else if($('#confirm_new_password').attr("type") == "password"){
            $('#confirm_new_password').attr('type', 'text');
            $('#icon_show_confirm_new_password').removeClass( "fa-eye" );
            $('#icon_show_confirm_new_password').addClass( "fa-eye-slash" );
        }
    });

    if($("#change_password_form").length > 0) {
        $("#change_password_form").validate({
            rules: {
                old_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                },
                confirm_new_password: {
                    required: true,
                },
            },
            messages: {
                old_password: {
                    required: "<?php echo e(__('change_password.old_password_required')); ?>",
                },
                new_password: {
                    required: "<?php echo e(__('change_password.new_password_required')); ?>",
                },
                confirm_new_password: {
                    required: "<?php echo e(__('change_password.confirm_new_password_required')); ?>",
                },
            },
            highlight: function(element) {
                jQuery(element).closest('.form-control').addClass('is-invalid');
            },
            unhighlight: function(element) {
                jQuery(element).closest('.form-control').removeClass('is-invalid');
            },
            errorElement: 'label',
            errorClass: 'text-danger',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(url('change_password/proses')); ?>",
                    type: "POST",
                    data: $('#change_password_form').serialize(),
                    success: function(response) {
                        if(response.status == "true"){
                            window.location = response.message;
                        }else{
                            $('#notification').modal('show');
                            if(response.message == null || response.message == ''){
                                $('#message-notification').html("<?php echo e(__('change_password.error')); ?>");
                            }else{
                                $('#message-notification').html(response.message);
                            }
                        }
                    },
                    error: function(response) {
                        $('#notification').modal('show');
                        $('#message-notification').html(response);
                    }

                });
            }
        })
    }
  });
</script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/change_password.blade.php ENDPATH**/ ?>