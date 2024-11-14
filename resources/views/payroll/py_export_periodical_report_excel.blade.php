<!DOCTYPE html>
<html>
<head>
    <title>{{ __('payroll_periodical_report.judul') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 25px;
			margin-top: 25px;
		}
        .table_detail td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
		}
		.table_detail thead tr th{
            text-align:center;
			border:1px solid #000;
            padding:4px;
            background-color:#97d7f7;
		}
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    @if(count($data) > 0 && (count($data[0]->detail) > 0 || count($data[0]->summary) > 0))
    <?php
        $countcolspan = count($data[0]->detail[0]->field) + 3;
    ?>
    <table>
        <thead>
            <tr>
                <th colspan="{{ $countcolspan }}">{{ $data_company[0]->companyName }}</th>
            </tr>
            <tr>
                <th colspan="{{ $countcolspan }}">{{ $data_company[0]->address }}</th>
            </tr>
            <tr></tr>
            <tr>
                <th colspan="{{ $countcolspan }}" style="text-align:center; font-weight:bold;"><h3>{{ $report_name }}</h3></th>
            </tr>
            <tr>
                <th colspan="{{ $countcolspan }}" style="text-align:center; font-weight:bold;"><pre>Periode   :    {{ $data_period }}</pre></th>
            </tr>
            <tr></tr>
        </thead>
    </table>
    <?php
    $total = [];
    ?>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="display:flex; text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                @foreach($data[0]->detail[0]->field as $key => $dataTable)
                    @if(!is_string($dataTable->value) && ($dataTable->dataFormat == "#,##0" || $dataTable->dataFormat == "#,##0.00"))
                        <?php
                        $total[$dataTable->field] = 0;
                        ?>
                    @endif
                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7;">{{ $dataTable->tableName }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($data[0]->detail as $key => $dataTable)
            <tr>
                <td style="text-align:center; vertical-align:middle; border:1px solid #000;">{{ $key+1 }}</td>
                @foreach($dataTable->field as $key2 => $dataTable2)
                    <?php
                    $alignment = "center";
                    if($dataTable2->alignment == 1){
                        $alignment = "left";
                    }else if($dataTable2->alignment == 2){
                        $alignment = "center";
                    }else if($dataTable2->alignment == 3){
                        $alignment = "right";
                    }
                    ?>
                    @if(!empty($dataTable2->value) && !is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0")
                        <?php
                        $total[$dataTable2->field] += $dataTable2->value;
                        ?>
                        <td data-format="{{ $dataTable2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000;">{{ $dataTable2->value }}</td>
                    @elseif(!empty($dataTable2->value) && !is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0.00")
                        <?php
                        $total[$dataTable2->field] += $dataTable2->value;
                        ?>
                        <td data-format="{{ $dataTable2->dataFormat }}" style="text-align:right; border:1px solid #000;">{{ $dataTable2->value }}</td>
                    
                    @elseif(!empty($dataTable2->value) && $dataTable2->dataFormat == "dd/MM/YYYY")
                        <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ date('d/m/Y', strtotime($dataTable2->value)) }}</td>
                    @elseif(!empty($dataTable2->value) && $dataTable2->dataFormat == "dd MM YYYY")
                        <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ date('d m Y', strtotime($dataTable2->value)) }}</td>
                    @else
                        <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ $dataTable2->value }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
            @if($grand_total)
            <tr>
                <td colspan="3" style="background-color: yellow; text-align:center; border:1px solid #000;">Grand Total</td>
                @foreach($data[0]->detail[0]->field as $key3 => $dataTable3)
                    <?php
                    $alignment = "center";
                    if($dataTable3->alignment == 1){
                        $alignment = "left";
                    }else if($dataTable3->alignment == 2){
                        $alignment = "center";
                    }else if($dataTable3->alignment == 3){
                        $alignment = "right";
                    }
                    ?>
                    @if($loop->iteration > 2)
                        @if(!empty($total[$dataTable3->field]))
                            @if(!is_string($dataTable3->value) && $dataTable3->dataFormat == "#,##0")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ number_format($total[$dataTable3->field], 0, ',', '.') }}</td>
                            @elseif(!is_string($dataTable3->value) && $dataTable3->dataFormat == "#,##0.00")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ number_format($total[$dataTable3->field], 2, ',', '.') }}</td>
                            @else
                                <td style="text-align:{{ $alignment }}; border:1px solid #000;">-</td>
                            @endif
                        @else
                            <td style="text-align:{{ $alignment }}; border:1px solid #000;">-</td>
                        @endif
                    @endif
                @endforeach
            </tr>
            @endif
        </tbody>
    </table>
    @endif
</body>
</html>