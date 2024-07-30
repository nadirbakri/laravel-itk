<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ __('payroll_payment_slip.judul') }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
	<style type="text/css">
		@font-face {
            font-family: 'ArialAlternates';
            font-style: normal;
            font-weight: normal;
            src: url({{ storage_path('fonts/arial.ttf') }}) format('truetype');
        }

		@font-face {
            font-family: 'ArialCustomBold';
            font-style: normal;
            font-weight: 700;
            src: url({{ storage_path('fonts/arialbold.ttf') }}) format('truetype');
        }

		* { box-sizing: border-box; }
		html {
			margin: 5%;
		}
		.table_detail td{
			border:1px solid #000;
			text-align:center;
            padding:4px;
		}
		.table_detail th{
			border:1px solid #000;
            padding:4px;
            background-color:#84c2e0;
		}
		.table_detail{
			border-collapse:collapse;
		}	

		.page_break { page-break-before: always; }
	</style>
</head>
<body>
	@foreach($data as $key => $value)
    <table class="table" style="width:100%; padding-left:3%; padding-right:3%; padding-bottom:1%; font-family: 'ArialCustomBold', sans-serif;">
		<tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 14px;">
				{{ strtoupper($value->namaPerusahaan) }}
			</td>
		</tr>
		<tr>
			<td style="padding: 0; margin: 0; text-align:left; font-size: 14px;">
				@if($slip_code == 'Salary')
                BUKTI PENERIMAAN GAJI
                @elseif($slip_code == 'Bonus')
                BUKTI PENERIMAAN BONUS
                @elseif($slip_code == 'THR')
                BUKTI PENERIMAAN THR
                @endif
			</td>
		</tr>
	</table>
	<table class="table" style="width:100%; font-size: 12px; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'ArialCustomBold', sans-serif; border-bottom: 1px solid black;">
        <tr>
			<td colspan="3" width="50%">&nbsp;</td>
			<td width="15%" style="padding-left: 10px;">Email</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->email }}</td>
		</tr>
        <tr>
			<td width="15%" style="padding-left: 10px;">BULAN</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->payrollCutOff }}</td>
			<td width="15%" style="padding-left: 10px;">No. ID</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->nik }}</td>
		</tr>
		<tr>
			<td width="15%" style="padding-left: 10px;">NIK/Status Pjk</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->employeeNo }} / {{ $value->ptkp }}</td>
			<td width="15%" style="padding-left: 10px;">Dept</td>
			<td width="1%">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->level3 }}</td>
		</tr>
		<tr>
			<td width="15%" style="padding-left: 10px;">Nama</td>
			<td width="1%" style="">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->employeeName }}</td>
			<td width="15%" style="padding-left: 10px;">Cost Center</td>
			<td width="1%" style="">:</td>
			<td width="34%" style="padding-left: 10px;">{{ $value->level4 }}</td>
		</tr>
	</table>
	<?php
	$totalIncome = 0;
	$totalDeduction = 0;
	$totalDataIncome = 0;
	$totalDataDeduction = 0;
	?>
	<table class="table" style="width:100%; font-size: 12px; padding-left:3%; padding-right:3%; border-collapse: collapse; font-family: 'Arial Alternates', sans-serif;">
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    	<tr>
        	<td style="width:55%; vertical-align: top; padding-right: 50px;">
				<table style="width:100%; padding-bottom: 1%; border-collapse: collapse;">
                    <tr>
                        <td colspan="4">PENDAPATAN&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                    </tr>
					@foreach($value->a as $key2 => $value2)
						<?php
							$totalIncome += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
						<?php
							$totalDataIncome++;
						?>
						<tr>
							<td width="25%" style="padding-left: 20px;">{{ $value2->columnLabel }}</td>
                            <td width="1%">:</td>
							<td width="8%">Rp.</td>
							<td width="8%" style="text-align:right;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
                    <tr>
                        <td width="25%" style="padding-left: 20px;">Total Pendapatan</td>
                        <td width="1%">:</td>
                        <td width="8%" style="border-top: 1px solid black;">Rp.</td>
                        <td width="8%" style="text-align:right; border-top: 1px solid black;">{{ number_format((float) $totalIncome, 0, ',', '.')}}</td>
                    </tr>
				</table>
			</td>
			<td style="width:45%; vertical-align: top; padding-right: 10px;">
				<table style="width:100%; border-collapse: collapse;">
                    <tr>
                        <td colspan="4">POTONGAN&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                    </tr>
					@foreach($value->d as $key2 => $value2)
						<?php
							$totalDeduction += (float) $value2->columnValue;
						?>
						@if($value2->columnValue > 0)
						<?php
							$totalDataDeduction++;
						?>
						<tr>
							<td width="17%" style="padding-left: 20px;">{{ $value2->columnLabel }}</td>
                            <td width="1%">:</td>
							<td width="5%">Rp.</td>
							<td width="8%" style="text-align:left;">{{ number_format((float) $value2->columnValue, 0, ',', '.')}}</td>
						</tr>
						@endif
					@endforeach
					<tr>
                        <td width="17%" style="padding-left: 20px;">Total Potongan</td>
                        <td width="1%">:</td>
                        <td width="5%" style="border-top: 1px solid black;">Rp.</td>
                        <td width="8%" style="text-align:left; border-top: 1px solid black;">{{ number_format((float) $totalDeduction, 0, ',', '.')}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="17%" style="padding-left: 20px;">Total Diterima</td>
                        <td width="1%">:</td>
                        <td width="5%">Rp.</td>
                        <td width="8%" style="text-align:left;">{{ number_format($totalIncome - $totalDeduction, 0, ',', '.')}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">{{ $value->level2 }}, {{ date('d') }} {{ $periode }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">Yang Menerima</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="padding-left: 20px;">(&nbsp;&nbsp;&nbsp;&nbsp; {{ $value->employeeName }} &nbsp;&nbsp;&nbsp;&nbsp;)</td>
                    </tr>
				</table>
			</td>
		</tr>
	</table>

    @if($key != array_key_last($data))
		<div class="page_break"></div>
	@endif
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