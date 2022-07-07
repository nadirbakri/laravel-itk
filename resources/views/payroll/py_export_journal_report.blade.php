<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_journal_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
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

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
    @foreach($data as $key => $value)
    <h3 style="text-align:left">{{ $value->headerA }}</h3>
    <h3 style="text-align:left; padding: 0;">{{ __('payroll_journal_report.judul') }} <br> For : {{ $value->headerC }}</h3>
	<table style="width:100%; font-size:14px;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th>Account No</th>
                <th>Name of Account</th>
                <th>Cost Center</th>
                <th>Cost Center Name</th>
                <th>Description</th>
                <th>Debit</th>
                <th>Credit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($value->excelColumns as $dataTables)
            <tr>
                <td>{{ $dataTables->accountNo }}</td>
                <td>{{ $dataTables->nameOfAccount }}</td>
                <td>{{ $dataTables->costCenter }}</td>
                <td>{{ $dataTables->costCenterName }}</td>
                <td>{{ $dataTables->description }}</td>
                <td>{{ $dataTables->debit }}</td>
                <td>{{ $dataTables->credit }}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="font-weight:200;">Total</td>
                <td>{{ $value->totalDebit }}</td>
                <td>{{ $value->totalKredit }}</td>
            </tr>
        </tbody>
    </table>
    @endforeach

    <script type="text/php">
    if (isset($pdf)) {
        $pdf->page_script('
            $text = sprintf(_("Page %d/%d"),  $PAGE_NUM, $PAGE_COUNT);
            // Uncomment the following line if you use a Laravel-based i18n
            //$text = __("Page :pageNum/:pageCount", ["pageNum" => $PAGE_NUM, "pageCount" => $PAGE_COUNT]);
            $font = null;
            $size = 9;
            $color = array(0,0,0);
            $word_space = 0.5;  //  default
            $char_space = 0.5;  //  default
            $angle = 0.5;   //  default

            // Compute text width to center correctly
            $textWidth = $fontMetrics->getTextWidth($text, $font, $size);

            $x = ($pdf->get_width() - $textWidth) / 2;
            $y = $pdf->get_height() - 35;

            $pdf->text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        '); // End of page_script
    }
    </script>
</body>
</html>