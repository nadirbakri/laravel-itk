<!DOCTYPE html>
<html>
<head>
	<title>Business Trip List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
            margin: 0;
            padding: 0;
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
		.table_detail td{
			border:1px solid #000;
			text-align:center;
		}
		.table_detail th{
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}

        @page { margin-bottom: 150px; size: auto; }
        /* header { position: fixed; left: 0px; top: -90px; right: 0px; height: 150px; text-align: center; } */
        footer { position: absolute; left: 25px; bottom: -85px; right: 0px; height: 110px; }
        table { page-break-inside:auto }
        tr{page-break-inside:avoid !important; page-break-after:auto }
        thead { display:table-header-group; }
        tfoot { display:table-footer-group; }
	</style>
</head>
<body>
 
    <h3 style="text-align:center">Business Trip Report</h3>
	<table style="width:100%; font-size: 12px;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Employee No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Ticket No</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Destination</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Purpose</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Project Name</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Customer Name</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Status</th>
                <th style="text-align:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">Full Name Requester</th>
            </tr>
        </thead>
        <tbody>
			@foreach($data[1]->responseBusinessTrip as $key => $dataTable)
			<tr>
				<td>{{ $key+1}}</td>
			</tr>
		</tbody>
    </table>

    <!-- <footer style="font-size:14px;">
        <br>
        <p>Report Parameter</p>
        <p>Employee No :<span style="display: inline-block; margin-left: 40px;"></span> : {{ $data_employee_no_from }} to {{ $data_employee_no_to }}</p>
        <p>Total Printed :<span style="display: inline-block; margin-left: 40px;"></span> : {{ count($data) }} Record{s}</p>
        <hr/>
      
    </footer> -->
<!-- 
    <script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $page = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.5;  //  default
            $char_space = 0.5;  //  default
            $angle = 0.5;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($page, $font, $size);

            $x = ($pdf->get_width() - $textWidth) - 75;
            $y = $pdf->get_height() - 45;

            $pdf->text($x, $y, $page, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script> -->
</body>
</html>