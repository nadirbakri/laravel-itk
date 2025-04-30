<!DOCTYPE html>
<html>
<head>
    <title>Aktuaria Karyawan Resign</title>
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
		.table_detail{
			border-collapse:collapse;
		}
	</style>
</head>
<body>
    @if(count($data) > 0)
        <table>
            <tr>
                <td colspan="7"><b>{{ strtoupper($data[0]->companyName) }}</b></td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7" rowspan="3">{!! str_replace("\r\n", "<br>", $data[0]->reportDescription) !!}</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7">{!! str_replace("\r\n", "<br>", $data[0]->reportDescDetail) !!}</td>
            </tr>
        </table>
        @if(count($data[0]->detail) > 0)
        <?php
        $total = [];
        ?>
        <table>
            <thead>
                <tr>
                @foreach($data[0]->detail[0]->field as $key => $dataTable)
                    @if($loop->first)
                        <th style="text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #808080; font-size:{{ $dataTable->fontSize }}px !important; font-weight: bold;">No</th>
                    @endif
                    @if(!is_string($dataTable->value))
                        <?php
                        $totalKey = $dataTable->field . '_' . $key;
                        $total[$totalKey] = 0;
                        ?>
                    @else
                        <?php
                        $totalKey = $dataTable->field . '_' . $key;
                        $total[$totalKey] = '';
                        ?>
                    @endif
                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #808080; font-size:{{ $dataTable->fontSize }}px !important; font-weight: bold;">{{ $dataTable->tableName }}</th>
                @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data[0]->detail as $key1 => $dataTable1)
                <tr>
                    @foreach($dataTable1->field as $key2 => $dataTable2)
                        @if($loop->first)
                            <td style="text-align:center; vertical-align:middle; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ $key1+1 }}</td>
                        @endif
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
                            if(!empty($dataTable2->value)){
                                $totalKey = $dataTable2->field . '_' . $key2;
                                if (!isset($total[$totalKey])) {
                                    $total[$totalKey] = 0;
                                }
                                $total[$totalKey] += $dataTable2->value;
                            }
                            ?>
                            <td data-format="{{ $dataTable2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">
                                {{ empty($dataTable2->value) ? '-' : $dataTable2->value }}
                            </td>
                        @elseif(!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0.00")
                            <?php
                            if(!empty($dataTable2->value)){
                                $totalKey = $dataTable2->field . '_' . $key2;
                                if (!isset($total[$totalKey])) {
                                    $total[$totalKey] = 0;
                                }
                                $total[$totalKey] += $dataTable2->value;
                            }
                            ?>
                            <td data-format="{{ $dataTable2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">
                                {{ empty($dataTable2->value) ? '-' : $dataTable2->value }}
                            </td>
                        @elseif($dataTable2->dataFormat == "dd/MM/yyyy")
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">
                                {{ empty($dataTable2->value) ? '-' : date('d/m/Y', strtotime($dataTable2->value)) }}
                            </td>
                        @elseif($dataTable2->dataFormat == "dd MM yyyy")
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">
                                {{ empty($dataTable2->value) ? '-' : date('d m Y', strtotime($dataTable2->value)) }}
                            </td>
                        @else
                            <td data-format="@" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">
                                {{ empty($dataTable2->value) ? '-' : $dataTable2->value }}
                            </td>
                        @endif
                    @endforeach
                </tr>
                @endforeach
                <tr>
                    @foreach($data[0]->detail[0]->field as $key3 => $dataTable3)
                        @if($loop->first)
                            <td style="text-align:center; border:1px solid #000; font-size:{{ $dataTable3->fontSize }}px !important; font-weight: bold;">&nbsp;</td>
                        @endif
                        <?php
                            $totalKey = $dataTable3->field . '_' . $key3;

                            $alignment = "center";
                            if($dataTable3->alignment == 1){
                                $alignment = "left";
                            }else if($dataTable3->alignment == 2){
                                $alignment = "center";
                            }else if($dataTable3->alignment == 3){
                                $alignment = "right";
                            }
                        ?>
                        @if(!is_string($total[$totalKey]))
                            <td data-format="{{ $dataTable3->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable3->fontSize }}px !important;">{{ $total[$totalKey] }}</td>
                        @else
                            <td data-format="@" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable3->fontSize }}px !important;">&nbsp;</td>
                        @endif
                    @endforeach
                </tr>
            </tbody>
        </table>
        @endif
    @endif
</body>
</html>