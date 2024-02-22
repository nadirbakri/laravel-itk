<!DOCTYPE html>
<html>
<head>
    <title>Periodical Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
	<style type="text/css">
		* { box-sizing: border-box; }
		body{
			margin-left: 0;
			margin-right: 0;
			margin-bottom: 0;
			margin-top: 0;
            font-size: 8px;
		}
        .table_detail td{
            text-align:center;
			border:1px solid #000;
			text-align:center;
            padding:2px;
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
    <h3>{{ $data_company[0]->companyName }} <br> {{ $data_company[0]->address }}</h3>
    <h3 style="text-align:center">Periodical Report</h3>
    <h4 style="text-align:center">Period : {{ date('F Y', strtotime($data_period)) }}</h4>
    <?php
    $total = [];
    ?>
    @if(count($data) > 0 && (count($data[0]->detail) > 0 || count($data[0]->summary) > 0))
    <?php
        $countcolspan = count($data[0]->detail[0]->field) + 3;
    ?>
    <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
        <thead>
            <tr>
                <th style="text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7;">No</th>
                @foreach($data[0]->detail[0]->field as $key => $dataTable)
                    @if(!is_string($dataTable->value))
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
                    @if(!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0")
                        <?php
                        $total[$dataTable2->field] += $dataTable2->value;
                        ?>
                        <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ number_format($dataTable2->value, 0, '.', ',') }}</td>
                    @elseif(!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0.00")
                        <?php
                        $total[$dataTable2->field] += $dataTable2->value;
                        ?>
                        <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ number_format($dataTable2->value, 2, '.', ',') }}</td>
                    
                    @elseif($dataTable2->dataFormat == "dd/MM/YYYY")
                        <td style="text-align:{{ $alignment }}; border:1px solid #000;">{{ date('d/m/Y', strtotime($dataTable2->value)) }}</td>
                    @elseif($dataTable2->dataFormat == "dd MM YYYY")
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
                <td style="text-align:right; border:1px solid #000;">{{ number_format($total[$dataTable3->field], 2, ',', '.') }}</td>
                @endforeach
            </tr>
            @endif
        </tbody>
    </table>
    @endif
    @if($print_signature)
    <br>
    <br>
    <br>
    @if($level1[0] == "ALL" || $level1[0] == "GIC" || $level1[0] == "NMDI")
    <table style="width: 40%;" class="table table-hover responsive">
        <tbody>
            <tr>
                <td colspan="3">Jakarta, {{ date('d F Y') }}</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 100px; text-align: center;">Prepared By,</td>
                <td style="width: 5px; text-align: center;">&nbsp;</td>
                <td style="width: 100px; text-align: center;">Approved By,</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center;">Veronica Dian</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">Evensius Go</td>
            </tr>
        </tbody>
    </table>
    @else
    <table style="width: 60%;" class="table table-hover responsive">
        <tbody>
            <tr>
                <td colspan="5">Jakarta, {{ date('d F Y') }}</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 100px; text-align: center;">Prepared By,</td>
                <td style="width: 5px; text-align: center;">&nbsp;</td>
                <td style="width: 100px; text-align: center;">Approved By,</td>
                <td style="width: 5px; text-align: center;">&nbsp;</td>
                <td style="width: 100px; text-align: center;">Approved By,</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center;">Veronica Dian</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">Pius Edwin Pandu</td>
                <td style="text-align: center;">&nbsp;</td>
                <td style="text-align: center;">Evensius Go</td>
            </tr>
            
        </tbody>
    </table>
    @endif
    @endif
</body>
</html>