<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_monthly_jamsostek_report.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		* { box-sizing: border-box; }
		html, body, #header {
            margin-top: 1%;
            margin-bottom: 0;
            margin-left: 1%;
            margin-right: 1%;
            padding: 0 !important;
            font-family: Arial, Helvetica, sans-serif;
        }
		.table_detail td{
			border:1px solid #000;
            padding: 4px;
		}
		.table_detail th{
			border:1px solid #000;
		}
		.table_detail{
			border-collapse:collapse;
		}
        label,input{
            display: inline-block;
            vertical-align: middle;
        }

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	<table style="width:100%; padding-bottom: 7px;">
		<tr>
			<td width="17%"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/pictures/bpjs.png'))) }}" style="width: 170px; height: 50px;" alt="Logo"></td>
            <td colspan="2" style="font-size: 16px; font-weight: 700; text-align:left; padding-left: 50px;">FORM 1B DAFTAR TENAGA KERJA KELUAR</td>
		</tr>
        <br>
        <tr>
			<td colspan="2" style="font-size: 10px; font-weight: 700; text-align:left;">Nama Perusahaan :</td>
            <td width="10%" style="font-size: 10px; font-weight: 700; padding-left: 20px;">NPP</td>
            <td width="2%" style="font-size: 10px;">:</td>
            <td width="20%" style="font-size: 10px; font-weight: 700; padding-left: 20px;"></td>
        </tr>
        <tr>
			<td colspan="2" style="font-size: 10px; font-weight: 700; text-align:left;">{{ $data[0]->companyName }}</td>
            <td width="10%" style="font-size: 10px; font-weight: 700; padding-left: 20px;">Unit</td>
            <td width="2%" style="font-size: 10px;">:</td>
            <td width="20%" style="font-size: 10px; font-weight: 700; padding-left: 20px;"></td>
        </tr>
        <tr>
			<td colspan="2" style="font-size: 10px; font-weight: 700; text-align:center;">&nbsp;</td>
            <td width="10%" style="font-size: 10px; font-weight: 700; padding-left: 20px;">Bulan</td>
            <td width="2%" style="font-size: 10px;">:</td>
            <td width="20%" style="font-size: 10px; font-weight: 700; padding-left: 20px;">{{ $period }}</td>
        </tr>
	</table>
    <table class="table_detail" style="width:100%;">
        <tr style="background-color: grey;">
            <td width="3%" style="font-size: 10px; text-align: center;">No.</td>
            <td width="12%" style="font-size: 10px; text-align: center;">Nama TK</td>
			<td width="12%" style="font-size: 10px; text-align: center;">Tgl Lahir</td>
            <td width="12%" style="font-size: 10px; text-align: center;">NIK</td>
            <td width="12%" style="font-size: 10px; text-align: center;">KPJ</td>
			<td width="12%" style="font-size: 10px; text-align: center;">KTP</td>
            <td width="12%" style="font-size: 10px; text-align: center;">Upah</td>
        </tr>
        @foreach($data as $key => $value)
        <tr>
            <td style="font-size: 10px; text-align: center;">{{ ($key + 1) }}</td>
            <td style="font-size: 10px; text-align: left;">{{ $value->fullName }}</td>
			<td style="font-size: 10px; text-align: left;">{{ date('d-m-Y', strtotime($value->birthDate)) }}</td>
            <td style="font-size: 10px; text-align: center;">{{ $value->employeeNo }}</td>
            <td style="font-size: 10px; text-align: center;">{{ $value->bpjsTenagaKerjaNo }}</td>
			<td style="font-size: 10px; text-align: center;">{{ $value->idNo }}</td>
            <td style="font-size: 10px; text-align: right;">{{ number_format($value->jamsostekSalary, 2, '.', ',') }}</td>
        </tr>
        @endforeach
        @if($key != array_key_last($data))
        <div class="page_break"></div>
        @endif
    </table>
    <br><br><br><br>
    <table style="width:100%; padding-bottom: 7px;">
		<tr>
			<td width="60%">&nbsp;</td>
            <td width="25%" style="font-size: 10px; font-weight: 700; text-align:center; padding-left: 50px;">{{ date('d F Y') }}</td>
            <td width="15%">&nbsp;</td>
		</tr>
        <br><br>
        <tr>
            <td width="60%">&nbsp;</td>
            <td width="25%" style="font-size: 10px; font-weight: 700; text-align:center; padding-left: 50px;">{{ $data[0]->title . " " . $data[0]->signerName }}</td>
            <td width="15%">&nbsp;</td>
        </tr>
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