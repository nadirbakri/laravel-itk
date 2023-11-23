

<?php $__env->startSection('title-content'); ?>
<title><?php echo e(__('login.judul')); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css-content'); ?>
<style type="text/css">
    @media  only screen and (max-width: 2600px) {
        body {
            padding-top: 6%;
        }

        a {
            width: -webkit-fill-available;
        }

        .img-login {
            max-width: 40%; 
            position: absolute; 
            right: 10%;
            top: 7%;
            /* bottom: 1%; */
        }

        .right-content {
            margin-left: 6%;
            max-width: 24%;
            display: block;
        }

        .right-content img {
            max-width: 18%;
        }

        .logo-text {
            font-size: 6.5vh;
        }

        .judul-text {
            font-size: 4.7vh;
        }

        #pilih_bahasa {
            max-width: 45%;
        }

        footer {
            position: fixed;
            margin-left: 4.8%;
        }
    }

    @media  only screen and (max-width: 1390px) {
        body {
            padding-top: 4%;
        }

        .img-login {
            max-width: 40%; 
            position: absolute; 
            right: 10%;
            top: 7%;
            /* bottom: 1%; */
        }

        .right-content {
            margin-left: 6%;
            max-width: 25%;
            display: block;
        }

        .right-content img {
            max-width: 13%;
        }

        .logo-text {
            font-size: 6.5vh;
        }

        .judul-text {
            font-size: 4.7vh;
        }

        #pilih_bahasa {
            max-width: 45%;
        }

        footer {
            position: unset;
            margin-left: 4.8%;
        }
    }

    @media  only screen and (max-width: 990px) {
        body {
            margin-left: 25%;
            padding-top: 4%;
        }

        .img-login {
            display: none;
        }

        .right-content {
            margin-left: 6%;
            max-width: 50%;
            display: block;
            align-items: center;
            text-align: center;
            vertical-align: middle;
        }

        .image-logo {
            padding-left: 30%;
            align-items: center;
            text-align: center;
            vertical-align: middle;
        }

        a {
            align-items: center;
            text-align: center;
            vertical-align: middle;
        }

        .right-content img {
            max-width: 12%;
        }

        .logo-text {
            font-size: 5vh;
        }

        .judul-text {
            font-size: 4vh;
        }

        #pilih_bahasa {
            max-width: 100%;
        }

        footer {
            position: unset;
            margin-left: 6%;
            align-items: center;
            text-align: center;
            vertical-align: middle;
        }

        label,
        input {
            display: inline-block;
            text-align: left;
        }

        .label-checkbox {
            display: inline-block;
            text-align: center;
        }
    }

    .bawah-judul-text {
        display: block;
        font-size: 2.3vh;
    }

    .judul-text {
        padding-top: 1%;
    }

    .modal-header {
        padding: 2%;
    }

    #loading {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
    }

    .spinner {
        margin-left: 45%;
        margin-top: 20%;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 5px solid #ccc;
        border-top-color: #333;
        animation: spin 1s infinite linear;
    }

    @keyframes  spin {
    to { transform: rotate(360deg); }
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main role="main">
    <div id="loading">
        <div class="spinner"></div>
    </div>
    <div>
        <lottie-player class="img-login" src="<?php echo e(asset('pictures/login.json')); ?>"  background="transparent"  speed="1" loop autoplay></lottie-player>
    </div>
    <div class='right-content'>
        <a class="image-logo">
            <img src="<?php echo e(url('/pictures/logo.png')); ?>" alt="Logo">
            <h4 class="logo-text">Stream</h4>
        </a>
        <p class="judul-text"><?php echo e(__('login.judul')); ?></p>
        <p class="bawah-judul-text"><?php echo e(__('login.bawah_judul')); ?></p>
        
        <form id="login_form" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group form-invalid">
                <label><?php echo e(__('login.label_username')); ?></label>
                <input type="text" class="form-control" name="username_login" id="username_login"
                    value="<?php echo e(old('username_login')); ?>" placeholder="<?php echo e(__('login.placeholder_username')); ?>">
                <label class="text-danger">&nbsp</label>
            </div>
            <div class="form-group form-invalid">
                <label><?php echo e(__('login.label_password')); ?></label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password_login" id="password_login"
                        placeholder="<?php echo e(__('login.placeholder_password')); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary rounded-right" type="button" id="show_password"><i id="icon_show_password"
                                class="fa fa-eye" aria-hidden="true"></i></button>
                    </div>
                </div>
                <label class="text-danger">&nbsp</label>
            </div>
            <p class="forgot-password-text"><a
                    href="<?php echo e(url('reset_password')); ?>"><?php echo e(__('login.label_forgot_password')); ?></a></p>
            <div class="row">
                <div class="col-6 form-group">
                    <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit"
                        style="width: 100%;">
                        <i class="fa fa-sign-in"></i> <?php echo e(__('login.button_login')); ?>

                    </button>
                </div>
                <div class="col-6 form-group">
                    <button type="button" class="btn btn-primary" name="btn_clear" id="btn_clear" style="width: 100%;"
                        disabled="true">
                        <?php echo e(__('login.button_clear')); ?>

                    </button>
                </div>
            </div>
            <p class="bawah-judul-text" style="text-align:center; font-size: 2.5vh"><?php echo e(__('login.login_with')); ?></p>
            <div class="row">
                <!-- <div class="col-2 form-group">&nbsp;</div> -->
                <div class="col-12 form-group">
                    <a href="<?php echo e(url('login-sso')); ?>" class="btn btn-outline-secondary" name="btn_sso" id="btn_sso" style="width: 100%;">
                        <img src="<?php echo e(url('/pictures/microsoft.svg')); ?>" style="display: inline-block; float: none; margin: 0px 0px 1% 0px; max-width: 8%;"> <?php echo e(__('login.button_sso')); ?>

                    </a>
                </div>
            </div>
            <div class="form-group">
                <label class="label-checkbox" for="chk_demo_account"><input type="checkbox" name="chk_demo_account"
                        id="chk_demo_account" /> <span><?php echo e(__('login.label_demo_account')); ?></span></label>
            </div>

            <div class="form-group">
                <select class="form-control" name="pilih_bahasa" id="pilih_bahasa">
                    <?php $__currentLoopData = Config::get('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($lang == App::getLocale()): ?>
                    <option value="<?php echo e(route('lang.switch', $lang)); ?>" selected><?php echo e($language); ?></option>
                    <?php else: ?>
                    <option value="<?php echo e(route('lang.switch', $lang)); ?>"><?php echo e($language); ?></option>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </form>
    </div>
</main>
<footer class="footer">
    <div class="container">
        <span class="text-muted">© Copyright PT Intikom Berlian Mustika <?php echo e(date('Y')); ?></span>
    </div>
</footer>
<div class="modal fade" role="dialog" id="notification">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-content'); ?>
<script>
	var msg = '<?php echo e(Session::get('alert')); ?>';
	var exist = '<?php echo e(Session::has('alert')); ?>';
	if(exist){
		alert(msg);
	}
</script>

<script>
    var exist = '<?php echo e($errors->any()); ?>';
    var message = '<?php echo e(Session::get('
    message ')); ?>';

    if (exist) {
        $('#notification').modal('show');
    }

    if (message) {
        $('notification').modal('show');
        $('#message-notification').html(message);
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#notification').on('hidden.bs.modal', function () {
            $('#notification').modal('hide');
        })

        $("#show_password").on('click', function (event) {
            event.preventDefault();
            if ($('#password_login').attr("type") == "text") {
                $('#password_login').attr('type', 'password');
                $('#icon_show_password').addClass("fa-eye");
                $('#icon_show_password').removeClass("fa-eye-slash");
            } else if ($('#password_login').attr("type") == "password") {
                $('#password_login').attr('type', 'text');
                $('#icon_show_password').removeClass("fa-eye");
                $('#icon_show_password').addClass("fa-eye-slash");
            }
        });

        $('#pilih_bahasa').on('change', function () {
            var url = $(this).val();
            if (url) {
                window.location = url;
            }
            return false;
        });

        // $("#btn_submit").click(function () {
            
        //     $("#login_form").submit();
        // });

        $("#btn_sso").click(function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
        });

        $("#btn_clear").click(function () {
            $('#login_form').trigger("reset");
            $("#btn_clear").prop('disabled', true);
        });

        $('#login_form input').focus(function() {
            if(!$(this).val()) {
                $("#btn_clear").prop('disabled', false);
            }
        });

        if ($("#login_form").length > 0) {
            $("#login_form").validate({
                rules: {
                    username_login: {
                        required: true,
                    },
                    password_login: {
                        required: true,
                    },
                },
                messages: {
                    username_login: {
                        required: "<?php echo e(__('login.username_required')); ?>",
                    },
                    password_login: {
                        required: "<?php echo e(__('login.password_required')); ?>",
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
                    $("#btn_submit").prop("disabled", false);
                    $("#btn_submit").html(
                        '<i class="fa fa-sign-in"></i> <?php echo e(__("login.button_login")); ?>'
                    );

                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
                    $("#btn_submit").prop("disabled", true);
                    $("#btn_submit").html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                    );

                    // $('#loading').show();
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(url('login/proses')); ?>",
                        type: "POST",
                        data: $('#login_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                window.location = "<?php echo e(url('main')); ?>";
                            } else {
                                // $('#loading').hide();
                                $('#notification').modal('show');
								$("#btn_submit").prop("disabled", false);
								$("#btn_submit").html(
									'<i class="fa fa-sign-in"></i> <?php echo e(__("login.button_login")); ?>'
								);
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification').html(
                                        "<?php echo e(__('login.error')); ?>");
                                } else {
                                    $('#message-notification').html(response.message);
                                }
                            }
                        },
                        error: function (response) {
                            // $('#loading').hide();
                            $("#btn_submit").prop("disabled", false);
                            $("#btn_submit").html(
                                '<i class="fa fa-sign-in"></i> <?php echo e(__("login.button_login")); ?>'
                            );
                            $('#notification').modal('show');
                            $('#message-notification').html(response);
                        }

                    });
                }
            })
        }
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('login.template_login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_project_azure\resources\views/login/login.blade.php ENDPATH**/ ?>