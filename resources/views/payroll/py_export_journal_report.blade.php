<!DOCTYPE html>
<html>
<head>
	<title>{{ __('payroll_journal_report.judul') }}</title>
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
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}

        .table_detail{
			border-collapse:collapse;
		}

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
    <table style="width:100%; font-size:14px;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td colspan="7" style="text-align: left; font-weight: 700;">{{ $companyCode }}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan="7" style="text-align: left; font-weight: 700;">Jurnal Salary For {{ $period }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid black;">Doc. No.</th>
                <th style="border: 1px solid black;">Company Code</th>
                <th style="border: 1px solid black;">Month-Year of Payroll</th>
                <th style="border: 1px solid black;">SAP GL Account</th>
                <th style="border: 1px solid black;">SAP GL Account Description</th>
                <th style="border: 1px solid black;">AmountD</th>
                <th style="border: 1px solid black;">AmountK</th>
                <th style="border: 1px solid black;"></th>
                <th style="border: 1px solid black;">SAP Cost Center</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)
            <tr>
                <td style="border: 1px solid black;">{{ $value->DocNo }}</td>
                <td style="border: 1px solid black;">{{ $value->Company }}</td>
                <td style="border: 1px solid black;">{{ $value->MonthYearOfPayroll }}</td>
                <td style="border: 1px solid black;">{{ $value->SAPGLAccount }}</td>
                <td style="border: 1px solid black;">{{ $value->SAPGLAccountDescription }}</td>
                <td style="border: 1px solid black;">{{ $value->AmountD }}</td>
                <td style="border: 1px solid black;">{{ $value->AmountK }}</td>
                <td style="border: 1px solid black;">{{ $value->TotalEmployee }}</td>
                <td style="border: 1px solid black;">{{ $value->SAPCostCenter }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

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