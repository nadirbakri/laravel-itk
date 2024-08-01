<!DOCTYPE html>
<html>
<head>
	<title>A1</title>
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
    @if(!empty($data))
	<table style="width:100%" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="background-color: #00B050;">&nbsp;</th>
                @foreach($data->column as $key => $value)
                    <th style="background-color: #00B050;">&nbsp;</th>
                @endforeach
            </tr>
            <tr>
                <th style="background-color: #EEECE1;">No</th>
                @foreach($data->column as $key => $value)
                    <th style="background-color: #EEECE1;">{{ $value }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data->value as $key => $value)
            <tr>
                <td>{{ ($key+1) }}</td>
                @foreach ($value as $key2 => $value2)
                    @if(is_numeric($value2))
                        <td data-format="#,##0" style="text-align:right;">{{ $value2 }}</td>
                    @else
                        <td data-format="@">{{ $value2 }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>