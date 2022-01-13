<!DOCTYPE html>
<html>
<head>
	<title>{{ __('personel_employee_evaluation_report.judul') }}</title>
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
	</style>
</head>
<body>
	<?php 
	
	?>
	<h2 style="text-align:center">Evaluation Report</h2>
	<p style="text-align:center">Period : {{ \Carbon\Carbon::parse($data->evaluationPeriodFrom)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($data->evaluationPeriodTo)->format('d/m/Y') }} <p><br>
	<table style="width: 100%;">
		<thead>
			<tr>
				<td>Employee No</td>
				<td> : </td>
				<td>{{ $data->employeeNo }}</td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>Joining Date</td>
				<td> : </td>
				<td>{{ \Carbon\Carbon::parse($data->joinDate)->format('d/m/Y') }}</td>
			</tr>
			<tr>
				<td>Name</td>
				<td> : </td>
				<td>{{ $data->fullName }}</td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>Evaluation Date</td>
				<td> : </td>
				<td>{{ \Carbon\Carbon::parse($data->evaluationDate)->format('d/m/Y') }}</td>
			</tr>
			<tr>
				<td>Ranking</td>
				<td> : </td>
				<td>{{ $data->ranking }}</td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>Evaluator Name</td>
				<td> : </td>
				<td>{{ $data->evaluator }}</td>
			</tr>
			<tr>
				<td>Position</td>
				<td> : </td>
				<td>{{ $data->position }}</td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>  </td>
				<td>Evaluator Form</td>
				<td> : </td>
				<td>{{ $data->evaluationFormCode }}</td>
			</tr>
			<tr>
				<td>Location</td>
				<td> : </td>
				<td>{{ $data->location }}</td>
			</tr>
	</table>
	<br><br>
	<table style="width: 100%; font-size: 14px; border: 1px;" class="table table-bordered table-hover responsive">
		<thead>
			<tr>
				<th>Evaluated Aspect</th>
				<th>Predicate</th>
				<th>Value</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data->detail as $detail)
			<tr>
				<td>{{ $detail->evaluatedAspect }}</td>
				<td>{{ $detail->predicate }}</td>
                <td>{{ $detail->value }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<table>
		<thead>
			<tr>
				<th>Total :</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data->detail as $detail)
			<tr>
				<th>{{ $detail->total }}</th>
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