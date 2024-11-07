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
            font-size: 12px;
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
        th {
            font-size: 12px;
        }
	</style>
</head>
<body>
    @if(count($data) > 0 && (count($data[0]->detail) > 0))
        <h3>
            @if($company == 'NMDI' || $company == 'CITROEN')
            {{ ($level1[0] == "ALL") ? $data_company[0]->companyName : 'PT ' . $data[0]->detail[0]->companyName }}
            @else
            {{ $data_company[0]->companyName }}
            @endif
        <br> 
            @if($company == 'NMDI' || $company == 'CITROEN')
            {{ ($level1[0] == "ALL") ? $data_company[0]->address : $data[0]->detail[0]->companyLocation }}
            @else
            {{ $data_company[0]->address }}
            @endif
        </h3>
        <h3 style="text-align:center">{{ $report_name }}</h3>
        <h4 style="text-align:center">Period : {{ date('F Y', strtotime($data_period)) }}</h4>
        <?php
            $total = [];
        ?>
        <?php
            $countcolspan = count($data[0]->detail[0]->field) + 3;
        ?>
        <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    @foreach($data[0]->detail[0]->field as $key => $dataTable)
                        @if($loop->first)
                            <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataTable->fontSize }}px !important;">No</th>
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
                        <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataTable->fontSize }}px !important;">{{ $dataTable->tableName }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data[0]->detail as $key => $dataTable)
                <tr>
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
                        @if($loop->first)
                            <td style="text-align:center; vertical-align:middle; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ $key+1 }}</td>
                        @endif
                        @if(!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0")
                            <?php
                            if(!empty($dataTable2->value)){
                                $totalKey = $dataTable2->field . '_' . $key2;
                                $total[$totalKey] += $dataTable2->value;
                            }
                            ?>
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : number_format($dataTable2->value, 0, '.', ',') }}</td>
                        @elseif(!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0.00")
                            <?php
                            if(!empty($dataTable2->value)){
                                $totalKey = $dataTable2->field . '_' . $key2;
                                $total[$totalKey] += $dataTable2->value;
                            }
                            ?>
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : number_format($dataTable2->value, 2, '.', ',') }}</td>
                        
                        @elseif($dataTable2->dataFormat == "dd/MM/yyyy")
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : date('d/m/Y', strtotime($dataTable2->value)) }}</td>
                        @elseif($dataTable2->dataFormat == "dd MM yyyy")
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : date('d m Y', strtotime($dataTable2->value)) }}</td>
                        @else
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : $dataTable2->value }}</td>
                        @endif
                    @endforeach
                </tr>
                @endforeach
                @if($grand_total)
                    <tr>
                        <td colspan="3" style="background-color: yellow; text-align:center; border:1px solid #000; font-weight: bold;">Grand Total</td>
                        @foreach(array_slice($data[0]->detail[0]->field, 2) as $key3 => $dataTable3)
                            <?php
                                $totalKey = $dataTable3->field . '_' . ($key3 + 2);
                            ?>
                            @if(!is_string($total[$totalKey]))
                                <td style="text-align:right; border:1px solid #000; font-size:{{ $dataTable3->fontSize }}px !important;">{{ number_format($total[$totalKey], 0, ',', '.') }}</td>
                            @else
                                <td style="text-align:right; border:1px solid #000; font-size:{{ $dataTable3->fontSize }}px !important;">&nbsp;</td>
                            @endif
                        @endforeach
                    </tr>
                @endif
            </tbody>
        </table>
    @elseif(count($data) > 0 && (count($data[0]->departementGroup) > 0))
        <?php
            date_default_timezone_set('Asia/Jakarta');
            $dateString = $param["period"];
            $dateTime = strtotime($dateString);
            $formattedDate = date('Y / F', $dateTime);

            $total = [];
            $totalEmployee = 0;
            $level = $data[0]->departementGroup[0]->data[0]->companyName
        ?>
        <table style='width: 100%; font-size: 8px'>
            <tr>
                <td style='width: 8%'><h1 style="font-weight: normal;">Pay Cycle</h1></td>
                <td style='width: 2%'><h1 style="font-weight: normal;">:</h1></td>
                <td style='width: 20%'><h1 style="font-weight: normal;">REG - {{ $level }}</h1></td>
                <td style='width: 20%'><h1 style="font-weight: normal;">Currency : Rupiah</h1></td>
                <td style='width: 30%'><h1 style="font-weight: normal;">Report Gaji</h1></td>
                <td style='width: 6%; align-items:right;'><h1 style="font-weight: normal;">Date</h1></td>
                <td style='width: 2%; align-items:right;'><h1 style="font-weight: normal;">:</h1></td>
                <td style='width: 12%; align-items:right;'><h1 style="font-weight: normal;">{{ date('d M Y') }}</h1></td>
            </tr>
            <tr>
                <td style='width: 8%'><h1 style="font-weight: normal;">Year / Month</h1></td>
                <td style='width: 2%'><h1 style="font-weight: normal;">:</h1></td>
                <td style='width: 20%'><h1 style="font-weight: normal;">{{ $formattedDate }}</h1></td>
                <td style='width: 20%'><h1 style="font-weight: normal;"></h1></td>
                <td style='width: 30%'><h1 style="font-weight: normal;"></h1></td>
                <td style='width: 6%; align-items:right;'><h1 style="font-weight: normal;">Time</h1></td>
                <td style='width: 2%; align-items:right;'><h1 style="font-weight: normal;">:</h1></td>
                <td style='width: 12%; align-items:right;'><h1 style="font-weight: normal;">{{ date('H:i:s') }}</h1></td>
            </tr>
            <tr>
                <td><h1 style="font-weight: normal;">Company</h1></td>
                <td><h1 style="font-weight: normal;">:</h1></td>
                <td><h1 style="font-weight: normal;">{{ $level }}</h1></td>
            </tr>
        </table>
        @for($i = 0; $i < count($data[0]->departementGroup); $i++)
            <?php
                $dataTable = $data[0]->departementGroup[$i];
                $branch = null;
            ?>
            @if(!empty($dataTable->data))
            <table style="font-size: 8px">
                <?php
                    foreach($dataTable->data as $key => $dataRow) {
                        foreach($dataRow->field as $key2 => $dataRow2) {
                            if($dataRow2->tableName === 'Company') {
                                $branch = $dataRow2->value;
                            }
                        }
                    }
                ?>
                <tr>
                    <td><h1 style="font-weight: normal;">Branch</h1></td>
                    <td><h1 style="font-weight: normal;">:</h1></td>
                    <td><h1 style="font-weight: normal;">{{ $level }}</h1></td>
                </tr>
                <tr>
                    <td><h1 style="font-weight: normal;">Cost Center</h1></td>
                    <td><h1 style="font-weight: normal;">:</h1></td>
                    <td><h1 style="font-weight: normal;">{{ $dataTable->departement }}</h1></td>
                </tr>
            </table>
            <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
                <thead>
                    <tr>
                        @if(!empty($dataTable->data[0]->field))
                            @foreach($dataTable->data[0]->field as $key_data => $dataRow)
                                @if($loop->first)
                                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataRow->fontSize }}px !important;">No</th>
                                @endif
                                @if(!is_string($dataRow->value))
                                    <?php
                                        $totalKey = $dataRow->field . '_' . $key_data;
                                        $total[$branch][$totalKey] = 0;
                                    ?>
                                @else
                                    <?php
                                        $totalKey = $dataRow->field . '_' . $key_data;
                                        if($totalKey == 'EmployeeNo_0'){
                                            $total[$branch][$totalKey] = count($dataTable->data);
                                        }else{
                                            $total[$branch][$totalKey] = '';
                                        }
                                    ?>
                                @endif
                                <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataRow->fontSize }}px !important;">{{ $dataRow->tableName }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?php $fontSize = 0 ?>
                    @foreach($dataTable->data as $key => $dataRow)
                    <tr>
                        @foreach($dataRow->field as $key2 => $dataRow2)
                            <?php
                                $fontSize = $dataRow2->fontSize;
                                $alignment = "center";
                                if($dataRow2->alignment == 1){
                                    $alignment = "left";
                                }else if($dataRow2->alignment == 2){
                                    $alignment = "center";
                                }else if($dataRow2->alignment == 3){
                                    $alignment = "right";
                                }
                            ?>
                            @if($loop->first)
                                <td style="text-align:center; vertical-align:middle; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $key+1 }}</td>
                            @endif
                            @if(!is_string($dataRow2->value) && $dataRow2->dataFormat == "#,##0")
                                <?php
                                if(!empty($dataRow2->value)){
                                    $totalKey = $dataRow2->field . '_' . $key2;
                                    $total[$branch][$totalKey] += $dataRow2->value;
                                }
                                ?>
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : number_format($dataRow2->value, 0, '.', ',') }}</td>
                            @elseif(!is_string($dataRow2->value) && $dataRow2->dataFormat == "#,##0.00")
                                <?php
                                if(!empty($dataRow2->value)){
                                    $totalKey = $dataRow2->field . '_' . $key2;
                                    $total[$branch][$totalKey] += $dataRow2->value;
                                }
                                ?>
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : number_format($dataRow2->value, 2, '.', ',') }}</td>
                            @elseif($dataRow2->dataFormat == "dd/MM/yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d/m/Y', strtotime($dataRow2->value)) }}</td>
                            @elseif($dataRow2->dataFormat == "dd MM yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d m Y', strtotime($dataRow2->value)) }}</td>
                            @else
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : $dataRow2->value }}</td>
                            @endif
                        @endforeach
                    </tr>
                    @endforeach
                    @if($grand_total)
                        <tr>
                            @foreach($total[$branch] as $key => $totalValue)
                                @if($loop->first)
                                    <td style="background-color: yellow; text-align:center; border:1px solid #000; font-size:{{ $fontSize }}px !important; font-weight: bold;">Total per Cost Center</td>
                                @endif
                                <?php
                                    if(!is_string($totalValue)) {
                                        $totalCost = number_format($totalValue, 0, ',', '.');
                                    } else {
                                        $totalCost = '';
                                    }
                                ?>
                                @if($key == 'EmployeeNo_0')
                                <td style="text-align:right; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $totalCost }}</td>
                                @else
                                <td style="text-align:right; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $totalCost }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                </tbody>
            </table>
            @endif
        @endfor
        <br>
        @if($grand_total && $level1[0] !== "ALL")
            <table style="width: 100%; marginY: 2" class="table table-bordered table-hover responsive table_detail">
                <tbody>
                    <tr>
                        <td style="background-color: yellow; text-align:center; border:1px solid #000;">Total per Company</td>
                        @foreach($grandTotal[$branch] as $key_total => $periodicalTotal)
                            @if(!is_string($periodicalTotal))
                                @if($key_total == 'EmployeeNo')
                                    <td style="text-align:left; border:1px solid #000;">{{ number_format($periodicalTotal, 0, ',', '.') }}</td>
                                @else
                                    <td style="text-align:right; border:1px solid #000;">{{ number_format($periodicalTotal, 0, ',', '.') }}</td>
                                @endif
                            @else
                                <td style="text-align:right; border:1px solid #000;">&nbsp;</td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        @endif
    @elseif(count($data) > 0 && (count($data[0]->summary) > 0))
        @foreach($data[0]->summary as $no => $dataTable)            
            <?php
                date_default_timezone_set('Asia/Jakarta');
                $dateString = $param["period"];
                $dateTime = strtotime($dateString);
                $formattedDate = date('F Y', $dateTime);

                $total = [];
                $totalJumlah = 0;
            ?>
            <table style='width: 100%'>
                <tr>
                    <td>Pay Cycle</td>
                    <td>:</td>
                    <td>REG - {{ $dataTable->data[0]->companyName }}</td>
                </tr>
                <tr>
                    <td>Month / Year</td>
                    <td>:</td>
                    <td>{{ $formattedDate }}</td>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>:</td>
                    <td>{{ $dataTable->data[0]->companyName }}</td>
                </tr>
            </table>
            <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
                <thead>
                    <tr>
                        @if(!empty($dataTable->data[0]->field))
                            @foreach($dataTable->data[0]->field as $key_data => $dataRow)
                                @if($loop->first)
                                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size: {{ $dataRow->fontSize }}px !important;">No</th>
                                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size: {{ $dataRow->fontSize }}px !important;">Cost Center</th>
                                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size: {{ $dataRow->fontSize }}px !important;">Jumlah</th>
                                @endif 
                                @if(!is_string($dataRow->value))
                                    <?php
                                        $total[$dataTable->data[0]->companyName][$key_data] = 0;
                                        $totalCompany[$dataTable->data[0]->companyName] = 0;
                                    ?>
                                @endif
                                <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size: {{ $dataRow->fontSize }}px !important;">{{ $dataRow->tableName }}</th>
                            @endforeach
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataTable->data as $key => $dataRow)  
                    <tr>
                        <td style="text-align:center; vertical-align:middle; border:1px solid #000; font-size: {{ $dataRow->field[0]->fontSize }}px !important;">{{ $key+1 }}</td>
                        <td style="text-align:center; vertical-align:middle; border:1px solid #000; font-size: {{ $dataRow->field[0]->fontSize }}px !important;">{{ $dataRow->levelCode }}</td>
                        <td style="text-align:center; vertical-align:middle; border:1px solid #000; font-size: {{ $dataRow->field[0]->fontSize }}px !important;">{{ $dataRow->total }}</td>
                        <?php $totalJumlah += $dataRow->total; ?>
                        @foreach($dataRow->field as $key2 => $dataRow2)
                            <?php
                                $alignment = "center";
                                if($dataRow2->alignment == 1){
                                    $alignment = "left";
                                }else if($dataRow2->alignment == 2){
                                    $alignment = "center";
                                }else if($dataRow2->alignment == 3){
                                    $alignment = "right";
                                }
                            ?>
                            @if(!is_string($dataRow2->value) && $dataRow2->dataFormat == "#,##0")
                                <?php
                                if(!empty($dataRow2->value)){
                                    $total[$dataRow->companyName][$key2] += $dataRow2->value;
                                    $totalCompany[$dataRow->companyName] += $total[$dataRow->companyName][$key2];
                                }
                                ?>
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : number_format($dataRow2->value, 0, '.', ',') }}</td>
                            @elseif(!is_string($dataRow2->value) && $dataRow2->dataFormat == "#,##0.00")
                                <?php
                                if(!empty($dataRow2->value)){
                                    $total[$dataRow->companyName][$key2] += $dataRow2->value;
                                    $totalCompany[$dataRow->companyName] += $total[$dataRow->companyName][$key2];
                                }
                                ?>
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : number_format($dataRow2->value, 2, '.', ',') }}</td>
                            @elseif($dataRow2->dataFormat == "dd/MM/yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d/m/Y', strtotime($dataRow2->value)) }}</td>
                            @elseif($dataRow2->dataFormat == "dd MM yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d m Y', strtotime($dataRow2->value)) }}</td>
                            @else
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : $dataRow2->value }}</td>
                            @endif
                        @endforeach
                    </tr>
                    @endforeach
                    <tr>
                        <td style="text-align:center; vertical-align:middle; border:1px solid #000;">&nbsp;</td>
                        <td style="text-align:center; vertical-align:middle; border:1px solid #000;">&nbsp;</td>
                        <td style="text-align:center; vertical-align:middle; border:1px solid #000;">&nbsp;</td>
                        @foreach($dataTable->data[0]->field as $key2 => $dataRow2)
                            <td style="border:1px solid #000;">&nbsp;</td>
                        @endforeach
                    </tr>
                    @if($grand_total)
                        <tr>
                            <td style="background-color: yellow; text-align:center; border:1px solid #000;">Total per Company</td>
                            <td style="background-color: yellow; text-align:center; border:1px solid #000;">&nbsp;</td>
                            <td style="background-color: yellow; text-align:center; border:1px solid #000;">{{ $totalJumlah }}</td>
                            @foreach($total[$dataTable->data[0]->companyName] as $key => $totalValue)
                                <td style="text-align:right; border:1px solid #000;">{{ number_format($totalValue, 0, ',', '.') }}</td>
                            @endforeach
                        </tr>
                    @endif
                </tbody>
            </table>
        @endforeach
    @endif
    @if($print_signature)
        <br>
        <br>
        <br>
        @if($company == 'NMDI')
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
        @elseif($company == 'CITROEN')
        <table style="width: 40%;" class="table table-hover responsive">
            <tbody>
                <tr>
                    <td colspan="3">Jakarta, {{ date('d F Y') }}</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td style="width: 100px; text-align: center;">Reviewed By,</td>
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
                    <td style="text-align: center; border-bottom: 1px solid black">Tan Kim Piauw</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center; border-bottom: 1px solid black"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">Chief Executive Officer</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">BOD</td>
                </tr>
            </tbody>
        </table>
        @endif
    @endif
</body>
</html>