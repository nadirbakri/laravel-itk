<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_position.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('css/personel_detail.css') }}">
	<style type="text/css">
		.div-personel {
			max-width: 97%;
			margin: auto;
			margin-top: 1%;
		}
	</style>
</head>

<body>
	<div class="div-personel">
        <div class="div-navbar sticky-navbar">
            <a href="javascript:void(0)"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="javascript:void(0)"><i class="fa fa-arrow-right"></i> Next</a>
            <a href="javascript:void(0)"><i class="fa fa-plus-square"></i> New</a>
            <a href="javascript:void(0)"><i class="fa fa-edit"></i> Edit</a>
            <a href="javascript:void(0)"><i class="fa fa-floppy-o"></i> Save</a>
            <a href="javascript:void(0)"><i class="fa fa-check-circle-o"></i> Activate</a>
            <a href="javascript:void(0)"><i class="fa fa-stop-circle-o"></i> Deactivate</a>
            <a href="javascript:void(0)"><i class="fa fa-list-ul"></i> List</a>
        </div>
		<div class="div-title">
			<a href="{{ url('personel') }}" target="iframe_dashboard">
				<img src="{{ url('/pictures/arrow-square-left.png') }}" alt="Back">
				<span class="title-text">{{ __('personel_position.list') }}</span>
			</a>
		</div>

		<div class="div-table">
			<table id="position_table" class="table hover">
				<thead>
					<tr>
						<th>Position Code</th>
						<th>Position Name</th>
                        <th>Abbreviation</th>
						<th>Status</th>
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
  	$('#position_table thead tr').clone(true).appendTo('#position_table thead');
    $('#position_table thead tr:eq(1) th').each( function (i) {
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
    
    var table = $('#position_table').DataTable({
        processing: true,
        serverSide: true,
        orderCellsTop: true,
        ajax: "{{ url('personel/position/table') }}",
        error: function(jqXHR, ajaxOptions, thrownError) {
        	alert(thrownError + "\r\n" + jqXHR.statusText + "\r\n" + jqXHR.responseText + "\r\n" + ajaxOptions.responseText);
        },
        "sDom": 'lrtip',
        'sPaginationType': 'ellipses',
        columns: [
            {data: 'position_code', name: 'position_code'},
            {data: 'position_name', name: 'position_name'},
            {data: 'abbreviation', name: 'abbreviation'},
            {data: 'status', name: 'status'}
        ]
    });

    $('#position_table tbody').on('click', 'tr', function () {
    	var data = table.row(this).data();
    	$.redirect("{{ url('personel/position/detail_data') }}", { 'position_code' : data.position_code }, "GET", "iframe_dashboard");
    });
    
  });
</script>

</html>