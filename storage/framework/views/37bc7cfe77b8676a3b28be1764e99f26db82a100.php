<!DOCTYPE html>
<html>

<head>
    <title><?php echo e(__('personel_personel_reference.judul')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('css/personel_detail_data.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>">
    <style type="text/css">
        .div-personel {
            max-width: 100%;
            margin: auto;
            /*margin-top: 1%;*/
        }

        .div-title {
            margin-top: 5%;
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

        .modal-header-notification-success {
            border-bottom: 1px solid #eee;
            background-color: #00a862;
            -webkit-border-top-left-radius: 1rem;
            -webkit-border-top-right-radius: 1rem;
            -moz-border-radius-topleft: 1rem;
            -moz-border-radius-topright: 1rem;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .div-title-notification {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 5%;
            font-family: Monserrat;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .div-title-notification img {
            max-width: 100%;
            height: 6vh;
            margin-right: 5%;
        }

        .title-text-notification {
            font-family: Inter;
            font-weight: 700;
            font-size: 2.5vw;
            margin-left: 0.5%;
        }

    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)" style="display: none;" id="toolbar-back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-blue.svg')); ?>" alt="Back">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-back-white.svg')); ?>" class="functionbar-hover"
                    alt="Back">
                <span>Back</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-blue.svg')); ?>" alt="Next">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-next-white.svg')); ?>" class="functionbar-hover"
                    alt="Next">
                <span>Next</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-new" target="iframe_dashboard">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-blue.svg')); ?>" alt="New">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-new-white.svg')); ?>" class="functionbar-hover"
                    alt="New">
                <span>New</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-blue.svg')); ?>" alt="Edit">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-edit-white.svg')); ?>" class="functionbar-hover"
                    alt="Edit">
                <span>Edit</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover"
                    alt="Save">
                <span>Save</span>
            </a>
            <a class="list-functionbar-md" style="display: none;" href="javascript:void(0)" id="toolbar-active">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-checklist-blue.svg')); ?>" alt="Activate">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-checklist-white.svg')); ?>" class="functionbar-hover"
                    alt="Activate">
                <span>Activate</span>
            </a>
            <a class="list-functionbar-lg" style="display: none;" href="javascript:void(0)" id="toolbar-deactive">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-deactivate-blue.svg')); ?>" alt="Deactivate">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-deactivate-white.svg')); ?>" class="functionbar-hover"
                    alt="Deactivate">
                <span>Deactivate</span>
            </a>
            <a href="javascript:void(0)" style="display: none;" id="toolbar-list">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-blue.svg')); ?>" alt="List">
                <img src="<?php echo e(url('/icons/functionbar/functionbar-list-white.svg')); ?>" class="functionbar-hover"
                    alt="List">
                <span>List</span>
            </a>
        </div>
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard" id="toolbar-prev-page">
                <img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
                <span class="title-text"><?php echo e(__('personel_personel_reference.list')); ?></span>
            </a>
        </div>
        <div class="div-form">
            <form id="personel_reference_form" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="probation_period"><?php echo e(__('personel_personel_reference.label_probation_period')); ?></label>
                            <select class="form-control" id="probation_period" name="probation_period" disabled>
                                <option value=""><?php echo e(__('personel_personel_reference.label_select_probation_period')); ?>

                                </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <input type="hidden" class="form-control" id="record_function" name="record_function">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="cost_center_format"><?php echo e(__('personel_personel_reference.label_cost_center_format')); ?></label>
                            <input type="number" class="form-control" id="cost_center_format" name="cost_center_format"
                                placeholder="<?php echo e(__('personel_personel_reference.label_cost_center_format')); ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-12">
                        <span class="div-title-text"><?php echo e(__('personel_personel_reference.label_employee')); ?></span>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="need_approval_employee">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="need_approval_employee"
                                            name="need_approval_employee" value="true" disabled>
                                        <label class="form-check-label"
                                            for="need_approval_employee"><?php echo e(__('personel_personel_reference.label_need_approval_employee')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="auto_generate_employee">&nbsp;</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="auto_generate_employee"
                                            name="auto_generate_employee" value="true" disabled>
                                        <label class="form-check-label"
                                            for="auto_generate_employee"><?php echo e(__('personel_personel_reference.label_auto_generate_employee')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="max_dependent_medical"><?php echo e(__('personel_personel_reference.label_max_dependent_medical')); ?></label>
                                    <input type="number" class="form-control" id="max_dependent_medical"
                                        name="max_dependent_medical"
                                        placeholder="<?php echo e(__('personel_personel_reference.label_max_dependent_medical')); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label
                                        for="max_dependent_payroll"><?php echo e(__('personel_personel_reference.label_max_dependent_payroll')); ?></label>
                                    <input type="number" class="form-control" id="max_dependent_payroll"
                                        name="max_dependent_payroll"
                                        placeholder="<?php echo e(__('personel_personel_reference.label_max_dependent_payroll')); ?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <hr class="horizontal" />
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label
                                for="level_master_format"><?php echo e(__('personel_personel_reference.label_level_master_format')); ?></label>
                            <input type="number" class="form-control" id="level_master_format"
                                name="level_master_format"
                                placeholder="<?php echo e(__('personel_personel_reference.label_level_master_format')); ?>"
                                disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <table id="level_table" class="table hover">
                            <thead>
                                <tr>
                                    <th>Level Type</th>
                                    <th>Level Description</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_error">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="notification_success">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-notification-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div-title-notification">
                        <img src="<?php echo e(url('/pictures/checklist-green-confirm-password.svg')); ?>" alt="Password">
                        <span
                            class="title-text-notification"><?php echo e(__('personel_personel_reference.alert_success')); ?></span>
                    </div>
                    <div class="div-title-notification">
                        <span id="message-notification-success"></span>
                    </div>
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

<script type="text/javascript">
    function savePreviousURL() {
        if(!sessionStorage.getItem('previousURL')){
            const previousURL = document.referrer;
            sessionStorage.setItem('previousURL', previousURL);
        }
    }

    // Fungsi untuk menangani navigasi mundur
    function goBackWithModuleID() {
        let newURL = sessionStorage.getItem('previousURL');

        sessionStorage.removeItem('previousURL');

        window.location.href = newURL;
    }

    window.onload = function() {
        savePreviousURL();
    }
    
    $(document).ready(function () {
        var table = null;
        var arrData = <?php echo json_encode($data, 15, 512) ?>;
        var arrDataLevel = <?php echo json_encode($data_level, 15, 512) ?>;

        load_table_level();
        table.clear();

        function htmlDecode(value) {
            return $("<textarea/>").html(value).text();
        }

        if (arrData) {
            $('#probation_period').val(((typeof arrData[0].probationPeriod !== 'undefined') ? arrData[0]
                .probationPeriod : ''));
            $('#cost_center_format').val(((typeof arrData[0].costCenterFormat !== 'undefined') ? arrData[0]
                .costCenterFormat : ''));
            if (typeof arrData[0].flagAutoEmployeeNo !== 'undefined') {
                if (arrData[0].flagAutoEmployeeNo) {
                    $('#auto_generate_employee').prop('checked', true).trigger('change');
                } else {
                    $('#auto_generate_employee').prop('checked', false).trigger('change');
                }
            }
            if (typeof arrData[0].flagNeedApprovalEmployee !== 'undefined') {
                if (arrData[0].flagNeedApprovalEmployee) {
                    $('#need_approval_employee').prop('checked', true).trigger('change');
                } else {
                    $('#need_approval_employee').prop('checked', false).trigger('change');
                }
            }
            $('#max_dependent_medical').val(((typeof arrData[0].maxDependentMedical !== 'undefined') ? arrData[0]
                .maxDependentMedical : ''));
            $('#max_dependent_payroll').val(((typeof arrData[0].maxDependentPayroll !== 'undefined') ? arrData[0]
                .maxDependentPayroll : ''));
            $('#level_master_format').val(((typeof arrData[0].levelFormat !== 'undefined') ? arrData[0]
                .levelFormat : ''));
            $("#toolbar-new").hide();
            $("#toolbar-edit").show();

            if (arrDataLevel) {
                table.clear();

                for (var key in arrDataLevel) {
                    key++;
                    table.row.add([
                        '<input type="hidden" class="form-control level_type" id="level_type' + key +
                        '" name="level_type[]" value="' + key + '">' + key,
                        '<input type="text" class="form-control level_description" id="level_description' +
                        key + '" name="level_description[]" value="' + arrDataLevel[key - 1]
                        .levelDescription + '" disabled>'
                    ]).draw();
                }
            }
        } else {
            $('#probation_period').val("");
            $('#cost_center_format').val("");
            $('#need_approval_employee').prop('checked', true).trigger('change');
            $('#auto_generate_employee').prop('checked', true).trigger('change');
            $('#max_dependent_medical').val("");
            $('#max_dependent_payroll').val("");
            $('#level_master_format').val("");
            $("#toolbar-new").show();
            $("#toolbar-edit").hide();
        }

        function load_table_level() {
            table = $('#level_table').DataTable({
                "sDom": 'lrtip',
                'sPaginationType': 'full_numbers'
            });
        }

        $('#level_master_format').on('input', function () {
            var value = $(this).val();

            table.clear();

            if (arrDataLevel) {
                for (var i = 1; i <= value; i++) {
                    if ((i - 1) in arrDataLevel) {
                        table.row.add([
                            '<input type="hidden" class="form-control level_type" id="level_type' +
                            i + '" name="level_type[]" value="' + i + '">' + i,
                            '<input type="text" class="form-control level_description" id="level_description' +
                            i + '" name="level_description[]" value="' + arrDataLevel[i - 1]
                            .levelDescription + '">'
                        ]).draw();
                    } else {
                        table.row.add([
                            '<input type="hidden" class="form-control level_type" id="level_type' +
                            i + '" name="level_type[]" value="' + i + '">' + i,
                            '<input type="text" class="form-control level_description" id="level_description' +
                            i + '" name="level_description[]">'
                        ]).draw();
                    }
                }
            } else {
                for (var i = 1; i <= value; i++) {
                    table.row.add([
                        '<input type="hidden" class="form-control level_type" id="level_type' +
                        i + '" name="level_type[]" value="' + i + '">' + i,
                        '<input type="text" class="form-control level_description" id="level_description' +
                        i + '" name="level_description[]">'
                    ]).draw();
                }
            }
        });

        $('#auto_generate_employee').change(function () {
            if ($(this).is(':checked')) {
                $('#last_employee_no').prop('readonly', false);
            } else {
                $('#last_employee_no').prop('readonly', true);
            }
        });

        $('#notification_success').on('hide.bs.modal', function () {
            window.location = "<?php echo e(url('personnel/personel_reference')); ?>";
        })

        $("#toolbar-new").on('click', function () {
            $('#record_function').val("New");
            $('#probation_period').val("");
            $('#cost_center_format').val("");
            $('#need_approval_employee').prop('checked', true).trigger('change');
            $('#auto_generate_employee').prop('checked', true).trigger('change');
            $('#max_dependent_medical').val("");
            $('#max_dependent_payroll').val("");
            $('#level_master_format').val("");
            $('#level_table').DataTable().destroy();
            load_table_level();
            table.clear();
            $('#probation_period').prop('disabled', false);
            $('#cost_center_format').prop('disabled', false);
            $('#need_approval_employee').prop('disabled', false).trigger('change');
            $('#auto_generate_employee').prop('disabled', false).trigger('change');
            $('#max_dependent_medical').prop('disabled', false);
            $('#max_dependent_payroll').prop('disabled', false);
            $('#level_master_format').prop('disabled', false);
            $("#toolbar-save").show();
        });

        $("#toolbar-edit").on('click', function () {
            $('#record_function').val("Edit");
            $('#probation_period').prop('disabled', false);
            $('#cost_center_format').prop('disabled', false);
            $('#need_approval_employee').prop('disabled', false).trigger('change');
            $('#auto_generate_employee').prop('disabled', false).trigger('change');
            $('#max_dependent_medical').prop('disabled', false);
            $('#max_dependent_payroll').prop('disabled', false);
            $('#level_master_format').prop('disabled', false);
            $('.level_description').prop('disabled', false);
            $("#toolbar-save").show();
            $('#level_table').DataTable().destroy();
            load_table_level();
            table.clear();
        });

        $("#toolbar-save").on('click', function () {
            $(this).prop("disabled", true);
            $(this).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin: 0;"></span>'+
                '<span>Loading...</span>'
            );
            $("#personel_reference_form").submit();
        });

        if ($("#personel_reference_form").length > 0) {
            $("#personel_reference_form").validate({
                rules: {
                    probation_period: {
                        required: true,
                    },
                    level_master_format: {
                        required: true,
                    },
                    "level_description[]": {
                        required: true,
                    },
                },
                messages: {
                    probation_period: {
                        required: "<?php echo e(__('personel_personel_reference.probation_period_required')); ?>",
                    },
                    level_master_format: {
                        required: "<?php echo e(__('personel_personel_reference.level_master_format_required')); ?>",
                    },
                    "level_description[]": {
                        required: "<?php echo e(__('personel_personel_reference.level_description_required')); ?>",
                    },
                },
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                submitHandler: function (form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(url('personnel/personel_reference/proses')); ?>",
                        type: "POST",
                        data: $('#personel_reference_form').serialize(),
                        success: function (response) {
                            if (response.status == "true") {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">'+
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
                                );

                                $('#notification_success').modal('show');
                                $('#message-notification-success').html(response
                                    .message);
                                setTimeout(function () {
                                    window.location =
                                        "<?php echo e(url('personnel/personel_reference')); ?>";
                                }, 3000);
                            } else {
                                $("#toolbar-save").prop("disabled", false);
                                $("#toolbar-save").html(
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">'+
                                    '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">'+
                                    '<span>Save</span>'
                                );

                                $('#notification_error').modal('show');
                                if (response.message == null || response.message ==
                                    '') {
                                    $('#message-notification-error').html(
                                        "<?php echo e(__('login.error')); ?>");
                                } else {
                                    $('#message-notification-error').html(response
                                        .message);
                                }
                            }
                        },
                        error: function (response) {
                            $("#toolbar-save").prop("disabled", false);
                            $("#toolbar-save").html(
                                '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-blue.svg')); ?>" alt="Save">'+
                                '<img src="<?php echo e(url('/icons/functionbar/functionbar-save-white.svg')); ?>" class="functionbar-hover" alt="Save">'+
                                '<span>Save</span>'
                            );

                            $('#notification_error').modal('show');
                            $('#message-notification-error').html(response);
                        }
                    });
                }
            })
        }
    });

</script>

</html>
<?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/personel/personel_personel_reference.blade.php ENDPATH**/ ?>