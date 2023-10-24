<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(__('data_employee_master.judul_employee_group_multiple_checkin')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('css/payroll_detail_data.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery.inputpicker.css')); ?>">
    <style type="text/css">
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

        .modal-header-notification-warning {
            border-bottom: 1px solid #eee;
            background-color: #f0bd18;
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

        .div-title-notification-warning {
            margin: 1.5%;
            margin-top: 2%;
            margin-bottom: 2%;
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

        .title-text-notification-warning {
            font-family: Inter;
            font-weight: 500;
            font-size: 2.5vw;
        }
        .row .button {
            background-color: #1E90FF;
            border: none;
            color: white;
            padding: 5px 11px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            }

        .btn{
            margin-top:10px;
            /* margin: 20px 40px; */
        }
        .card{
            max-width: 1200px;
            border-radius: 0.3rem;
            margin-left: 4%;
            margin-right: 2%;
            margin-top:15px
       }
       .judul h1{
            font-size: 25px;
            margin-left: 4%;
            margin-right: 2%;
            margin-top:50px
        }
        .judul hr{
            max-width:1200px;
            margin-left:4%;
            margin-right: 2%;
        }
        .buttonadd{
            width: 40px;
            height: 40px;
            background: #dac52c;
            border-radius: 100%;
        }

        .col-12-level {
            height: 2.4rem;
        }

        .select2-dropdown .select2-results__option {
            font-size: 11px; /* Adjust the desired font size */
        }

        .select2-dropdown {
            width: 20rem !important; /* Adjust the desired width */
        }

        .select2-container--open .select2-dropdown--below {
            border-radius: 4px;
            border-top: 1px solid #aaa;
        }
    </style>
</head>

<body>
    <div class="div-form">
        <div class="div-title">
            <a href="javascript:void(0);" onclick="goBackWithModuleID()" target="iframe_dashboard">
                <img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
                <span class="title-text"><?php echo e(__('data_employee_group.judul_employee_group_multiple_checkin')); ?></span>
            </a>
        </div>
        <div class="row">
            <div class="col-3">
                <form id="select_level_form" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-12">
                            <h5 class="">Select Level</h5>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="level_format" name="level_format">
                    <div class="row" id="div-level" style="overflow-y: scroll; height: 16rem;">
                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="btn-add-to-list" id="btn-add-to-list"
                                style="width: 100%;">
                                <?php echo e(__('md_claim_transaction.btn_add_to_list')); ?>

                            </button>
                        </div>       
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-outline-primary mb-2" name="btn-clear" id="btn-clear"
                                style="width: 100%;">
                                <?php echo e(__('md_claim_transaction.btn_clear')); ?>

                            </button>
                        </div>       
                    </div>
                </form>
            </div>
            <div class="col-9">
                <form id="multiple_checkin_form" method="post">
                    <?php echo csrf_field(); ?>
                    <table id="multiple_checkin_table" class="display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee No</th>
                                <!-- <th>Employee Name</th>
                                <th>Position</th>
                                <th>Ranking</th>
                                <th>Group Authorization</th> -->
                                <th>Record Status</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="row">
                        <div class="col-3">
                            <button type="submit" class="btn btn-outline-primary" name="btn-save" id="btn-save"
                                style="width: 100%;">
                                <i class="fa fa-floppy-o"></i> <?php echo e(__('md_claim_transaction.btn_save')); ?>

                            </button>
                        </div>       
                    </div>
                </form>
            </div>
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
                        <span class="title-text-notification"><?php echo e(__('trans_mass_leave.alert_success')); ?></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
<script src="<?php echo e(asset('js/jquery.inputpicker.js')); ?>"></script>
<script>
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
        $('table.display').DataTable();

        // $('#exampletwo').DataTable().destroy();
        // load_data_approval_table();
    });
    
    // $('#btn-add').click(e=>{
    //     e.prefentDefault()
    // })
</script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var table = null;
    var table5 = null;
    var arrApproval = [];
    var arrEmailSettings = [];

    $('#multiple_checkin_table thead tr').clone(true).appendTo('#multiple_checkin_table thead');
    $('#multiple_checkin_table thead tr:eq(1) th:not(:first-child)').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');

        $('input', this).on('keyup change', function () {
            if (table.column(i + 1).search() !== this.value) {
                table
                    .column(i + 1)
                    .search(this.value)
                    .draw();
            }
        } );
    });

    $('#notification_success').on('hide.bs.modal', function () {
            window.location = "<?php echo e(url('master_data/employee_group_multiple_checkin')); ?>";
        })
    
    load_data_table_multiple_checkin();

    $.ajax({
        url: "<?php echo e(url('personnel/report/level/check')); ?>",
        type: "GET",
        success: function (response) {
            $('#level_format').val(response.data[0].levelFormat);
            for (var i = 1; i <= response.data[0].levelFormat; i++) {
                $('#div-level').append(
                    '<div class="col-12 col-12-level">' +
                    '<div class="form-group">' +
                    '<select class="form-control select2 select_level" id="level' + i + '" name="level' +
                    i + '" data-id="' + i + '"></select>' +
                    '</div></div>'
                );

                loadDataLevelCode('#level' + i, i);
            }
        },
        error: function (response) {
            $('#notification_error').modal('show');
            $('#message-notification-error').html(response);
        }
    });

    function load_data_table_multiple_checkin(levelType = '', levelCode = '') {
        table = $('#multiple_checkin_table').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "<?php echo e(url('master_data/employee_group_multiple_checkin/table')); ?>",
                data: {
                    'levelType' : levelType,
                    'levelCode': levelCode
                }
            },
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {
                    orderable: false,
                    targets: 0, 
                    "defaultContent": '',
                    render: function (data, type, row) {
                        var check = '<input class="chk-select" name="wfa[]" type="checkbox" value="true">';
                        if(row.wfa){
                            check = '<input class="chk-select" name="wfa[]" type="checkbox" value="true" checked>';
                        }
                        return type === 'display' ? check + '<input type="hidden" class="form-control" name="employeeNo[]" value="'+ row.employeeNo +'">' : '';
                    }
                },
                {data: 'employeeNo', name: 'employeeNo'},
                // {data: 'fullName', name: 'fullName'},
                // {data: 'position', name: 'position'},
                // {data: 'ranking', name: 'ranking'},
                // {data: 'groupAuthorization', name: 'groupAuthorization'},
                {data: 'recordStatus', name: 'recordStatus'}
            ],
            select: {
                style:    'single',
                selector: 'td:first-child'
            }
        });
    }

    $('#multiple_checkin_table tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#competency_table').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });

    function loadDataLevelCode(field = '', levelType = '') {
        function formatSelect(data) {
            if (data.loading) {
                return $search
            }

            if (data.id) {
                var $result2 = $('<div class="row">' +
                    '<div class="col-6">' + data.data.levelCode + '</div>' +
                    '<div class="col-6">' + data.data.levelName + '</div>' +
                    '</div>');

                return $result2;
            }
        }

        var headerIsAppend = false;
        $(field).on('select2:open', function (e) {
            if (!headerIsAppend) {
                html = '<div class="row">' +
                    '<div class="col-6" style="font-size: 11px;"><b>Level Code</b></div>' +
                    '<div class="col-6" style="font-size: 11px;"><b>Level Name</b></div>' +
                    '</div>';
                $('.select2-search--dropdown').append(html);
                headerIsAppend = true;
            }
        });

        var $search = $('<div class="spinner-border spinner-border-sm"></div><span> Updating...</span>');

        $(field).select2({
            width: '100%',
            placeholder: 'Choose Level ' + levelType,
            allowClear: true,
            language: {
                errorLoading: function () {
                    return $search;
                },
                searching: function () {
                    return $search;
                }
            },
            ajax: {
                url: "<?php echo e(url('/level/all/api')); ?>",
                dataType: 'json',
                delay: 250,
                type: "GET",
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term,
                        levelType: levelType
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.levelName,
                                id: item.levelCode,
                                data: item
                            }
                        })
                    };
                },
                cache: true,
            },
            templateResult: formatSelect
        });
    }

    if($("#select_level_form").length > 0) {
        $("#select_level_form").validate({
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(url('master_data/employee_group_multiple_checkin/select_level')); ?>",
                    type: "POST",
                    data: $('#select_level_form').serialize(),
                    success: function(response) {
                        $('#multiple_checkin_table').DataTable().destroy();
                        load_data_table_multiple_checkin(response.noLevel, response.dataLevel);
                    },
                    error: function(response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }

                });
            }
        })
    }

    if($("#multiple_checkin_form").length > 0) {
        $("#multiple_checkin_form").validate({
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "<?php echo e(url('master_data/employee_group_multiple_checkin/proses')); ?>",
                    type: "POST",
                    contentType: 'application/json', // Set content type to JSON
                    data: jsonData,
                    success: function(response) {
                        if (response.status == "true") {
                            $('#notification_success').modal('show');
                            $('#message-notification-success').html(response
                                .message);
                            setTimeout(function () {
                                window.location =
                                    "<?php echo e(url('master_data/employee_group_multiple_checkin')); ?>";
                            }, 3000);
                        } else {
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
                    error: function(response) {
                        $('#notification_error').modal('show');
                        $('#message-notification-error').html(response);
                    }

                });
            }
        })
    }
     
</script>
<script>
 $('#btn-add2').click(()=> {
        $('#modalexampleemail').DataTable().destroy();
        tableemail = $('#modalexampleemail').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            ajax: {
                url : "<?php echo e(url('master_data/list/table')); ?>"             
            },
            error: function(jqXHR, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
            },
            "sDom": 'lfrtip',
            'sPaginationType': 'full_numbers',
            "order": [[ 1, "asc" ]],
            columns: [
                {
                    orderable: false,
                    targets: 0, 
                    "defaultContent": '',
                    render: function(data, type) {
                        return type === 'display'? '<button type="button"  onclick="klikemail(this)" class="btn btn-primary" id="btnaja" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button>' : '';
                             }
                },
                {data: 'groupCode', name: 'groupCode'},
                {data: 'groupName', name: 'groupName'},
            ],
            select: {
                style:    'multi',
                selector: 'td:first-child'
            }, 
            
        });        
    })

    function load_data_email_table(){
        $('#exampleemail').DataTable().destroy();
        table5 = $('#exampleemail').DataTable({
                processing: true,
                data: arrEmailSettings,
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
                },
                "sDom": 'lrtip',
                "order": [[ 1, "asc" ]],
                paging: false,
                columns: [
                    {
                        orderable: false,
                        targets: 0, 
                        "defaultContent": '',
                        render: function(data, type) {
                            return type === 'display'? '<input class="chk-select" type="checkbox">' : '';
                                }
                    },
                    {data: 'groupID', name: 'groupID',
                    render: function (data, type, row) {

                        return '<input type="hidden" class="form-control" name="groupID[]" value="' +

                            data + '">' + data;

                        }
                    },
                    {data: 'groupName', name: 'groupName',
                    render: function (data, type, row) {

                    return '<input type="hidden" class="form-control" name="groupName[]" value="' +

                        data + '">' + data;

                    }}
                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                }, 
                
            }); 
        } 
    const klikemail = (element) => {
        var count = table5.data().count();
        var groupid = $(element).parent().siblings('.sorting_1').text();
        let groupname = $(element).parent().siblings('td').eq(1).text();
        // console.log(appCode);
        $('.close').click();
        table5.row.add({
            'no' : '<input class="chk-select" type="checkbox">',
            'groupID' : groupid,
            'groupName' : groupname
        }).draw();
        // arrApproval = table4.row($(element).parent()).data().directApproval;
        // load_data_approval_table();
    }

    $('#exampleemail tbody').on('click', 'input[type="checkbox"]', function(e){
        var $row = $(this).closest('tr');

        if(this.checked){
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        // Prevent click event from propagating to parent
        e.stopPropagation();
    });

    $('#exampleemail').on('click', 'tr td:first-child', function(e){
        $(this).parent().find('input[type="checkbox"]').trigger('click');
    });
     
</script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/master_data/master_data_employee_group_multiple_checkin.blade.php ENDPATH**/ ?>