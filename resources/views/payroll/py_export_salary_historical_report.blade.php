<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_salary_historical_report.judul') }}</title>
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
		}
		.table_detail td{
			text-align:center;
            padding: 3px;
		}
		.table_detail th{
            padding:4px;
		}
		.table_detail{
			border-collapse:collapse;
		}

        @page { margin-left: 0px; margin-right: 0px; margin-bottom: 150px; size: auto; }
        /* header { position: fixed; left: 0px; top: -90px; right: 0px; height: 150px; text-align: center; } */
        footer { position: absolute; left: 25px; bottom: -85px; right: 0px; height: 150px; }
        table { page-break-inside:auto }
        tr    { page-break-inside:avoid; page-break-after:auto; margin: 4px 0 4px 0; }
        td    { page-break-inside:avoid; page-break-after:auto }
        thead { display:table-header-group }
	</style>
</head>
<body>
    <h3 style="text-align:center; background-color:lightblue; padding:7px">{{ __('payroll_salary_historical_report.list') }}</h3>
    @foreach($data as $key => $dataTables)
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead style="background-color: lightgray; padding:5px">
            <tr>
                <th>{{ __('payroll_salary_historical_report.header_no') }}</th>
                <th>{{ $dataTables->employeeNo }} - {{ $dataTables->employeeName }}</th>
                <th>{{ date('m F Y', strtotime($dataTables->joinDate)) }}</th>
                <th>{{ $dataTables->position }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTables->detail as $key => $dataTable)
            <?php
            list($str1, $str2) = explode(' - ', $dataTable->period);
            ?>
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ date('M', mktime(0, 0, 0, $str1, 10)) . " - " . $str2 }}</td>
                <td>{{ number_format($dataTable->basicSalary, 2, '.', ',') }}</td>
                <td>{{ $dataTable->remark }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach

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

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 45;

            $pdf->text($x, $y, $page, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html>