<!DOCTYPE html>
<html>
<head>
    <title><?php echo e(__('utilities_user_security_maintenance.judul')); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo e(asset('pictures/favicon.png')); ?>" type="image/x-icon"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/personel_detail.css')); ?>">
    <style type="text/css">
        .div-utilities {
            max-width: 97%;
            margin: auto;
            /*margin-top: 1%;*/
        }
        .div-title {
            margin-top: 2%;
        }
    </style>
</head>

<body>
    <div class="div-personel">
        <div class="div-title">
            <a href="<?php echo e(url('utilities')); ?>" target="iframe_dashboard">
                <img src="<?php echo e(url('/pictures/arrow-square-left.png')); ?>" alt="Back">
                <span class="title-text"><?php echo e(__('utilities_user_security_maintenance.list')); ?></span>
            </a>
        </div>

        <div class="div-table">
            <table id="user_security_maintenance_table" class="table hover">
                <thead>
                    <tr>
                        <th>Record Status</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Employee Name</th>
                        <th>User Type</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.24/pagination/ellipses.js"></script>
<script src="https://cdn.rawgit.com/mgalante/jquery.redirect/master/jquery.redirect.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#user_security_maintenance_table thead tr').clone(true).appendTo('#user_security_maintenance_table thead');
    $('#user_security_maintenance_table thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html('<input class="form-control" type="text" placeholder="'+title+'" />');
 
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table
                    .column(i)
                    .search(this.value)
                    .draw();
            }
        } );
    });
    
    var table = $('#user_security_maintenance_table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: "<?php echo e(url('utilities/user_security_maintenance/table')); ?>",
        error: function(jqXHR, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
        },
        "sDom": 'lrtip',
        'sPaginationType': 'full_numbers',
        columns: [
            {data: 'recordStatus', name: 'recordStatus'},
            {data: 'userID', name: 'userID'},
            {data: 'userName', name: 'userName'},
            {data: 'fullName', name: 'fullName'},
            {data: 'userType', name: 'userType'},
        ]
    });

    $('#user_security_maintenance_table tbody').on('click', 'tr', function () {
        var data = table.row(this).data();
        $.redirect("<?php echo e(url('utilities/user_security_maintenance/detail_data')); ?>", { 'userID' : data.userID }, "GET", "iframe_dashboard");
    });
    
  });
</script>

</html><?php /**PATH C:\xampp\htdocs\laravel_project\resources\views/utilities/utilities_user_security_maintenance.blade.php ENDPATH**/ ?>