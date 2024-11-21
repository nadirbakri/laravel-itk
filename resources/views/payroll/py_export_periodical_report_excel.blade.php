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
    @if(count($data) > 0 && (count($data[0]->detail) > 0))
        <?php
            $countcolspan = count($data[0]->detail[0]->field) + 3;
        ?>
        <table>
            <thead>
                <tr>
                    <th colspan="{{ $countcolspan }}">
                        @if($company == 'NMDI' || $company == 'CITROEN')
                        {{ ($level1[0] == "ALL") ? $data_company[0]->companyName : 'PT ' . $data[0]->detail[0]->companyName }}
                        @else
                        {{ $data_company[0]->companyName }}
                        @endif
                    </th>
                </tr>
                <tr>
                    <th colspan="{{ $countcolspan }}">
                        @if($company == 'NMDI' || $company == 'CITROEN')
                        {{ ($level1[0] == "ALL") ? $data_company[0]->address : $data[0]->detail[0]->companyLocation }}
                        @else
                        {{ $data_company[0]->address }}
                        @endif
                    </th>
                </tr>
                <tr>
                    <th colspan="{{ $countcolspan }}" style="text-align:left; font-weight:bold;">{{ $report_name }}</th>
                </tr>
                <tr>
                    <th colspan="{{ $countcolspan }}" style="text-align:left; font-weight:bold;"><pre>Periode   :    {{ $data_period }}</pre></th>
                </tr>
                <tr></tr>
            </thead>
        </table>
        <?php
        $total = [];
        ?>
        <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
            <thead style="font-weight: bold">
                <tr>
                    @foreach($data[0]->detail[0]->field as $key => $dataTable)
                        @if($loop->first)
                            <th style="display:flex; text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataTable->fontSize }}px !important; font-weight: bold;">No</th>
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
                        <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataTable->fontSize }}px !important; font-weight: bold;">{{ $dataTable->tableName }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($data[0]->detail as $key => $dataTable)
                <tr>
                    @foreach($dataTable->field as $key2 => $dataTable2)
                        @if($loop->first)
                            <td style="text-align:center; vertical-align:middle; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ $key+1 }}</td>
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
                                $total[$totalKey] += $dataTable2->value;
                            }
                            ?>
                            <td data-format="{{ $dataTable2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? 0 : $dataTable2->value }}</td>
                        @elseif(!is_string($dataTable2->value) && $dataTable2->dataFormat == "#,##0.00")
                            <?php
                            if(!empty($dataTable2->value)){
                                $totalKey = $dataTable2->field . '_' . $key2;
                                $total[$totalKey] += $dataTable2->value;
                            }
                            ?>
                            <td data-format="{{ $dataTable2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? 0 : $dataTable2->value }}</td>
                        
                        @elseif($dataTable2->dataFormat == "dd/MM/yyyy")
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : date('d/m/Y', strtotime($dataTable2->value)) }}</td>
                        @elseif($dataTable2->dataFormat == "dd MM yyyy")
                            <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : date('d m Y', strtotime($dataTable2->value)) }}</td>
                        @else
                            <td data-format="@" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $dataTable2->fontSize }}px !important;">{{ empty($dataTable2->value) ? "" : $dataTable2->value }}</td>
                        @endif
                    @endforeach
                </tr>
                @endforeach
                @if($grand_total)
                <tr>
                    @foreach(array_slice($data[0]->detail[0]->field, 2) as $key3 => $dataTable3)
                        @if($loop->first)
                            <td colspan="3" style="background-color: yellow; text-align:center; border:1px solid #000; font-size:{{ $dataTable3->fontSize }}px !important; font-weight: bold;">Grand Total</td>
                        @endif
                        <?php
                            $totalKey = $dataTable3->field . '_' . ($key3 + 2);
                        ?>
                        @if(!is_string($total[$totalKey]))
                            <td data-format="#,##0" style="text-align:right; border:1px solid #000; font-size:{{ $dataTable3->fontSize }}px !important;">{{ $total[$totalKey] }}</td>
                        @else
                            <td data-format="@" style="text-align:right; border:1px solid #000;">&nbsp;</td>
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
        ?>
        @if($company == 'NMDI' || $company == 'CITROEN')
        <?php
            $level = $data[0]->departementGroup[0]->data[0]->companyName;
        ?>
        <table style='width: 100%'>
            <tr>
                <td>Pay Cycle :</td>
                <td>REG - {{ $level }}</td>
                <td>Currency : Rupiah</td>
                <td>Report Gaji</td>
                <td>Date :</td>
                <td>{{ date('d M Y') }}</td>
            </tr>
            <tr>
                <td>Year / Month :</td>
                <td>{{ $formattedDate }}</td>
                <td></td>
                <td></td>
                <td>Time :</td>
                <td>{{ date('H:i:s') }}</td>
            </tr>
            <tr>
                <td>Company :</td>
                <td>{{ $level }}</td>
            </tr>
        </table>
        @endif
        @for($i = 0; $i < count($data[0]->departementGroup); $i++)
            <?php
                $dataTable = $data[0]->departementGroup[$i];
                $branch = null;
            ?>
            @if(!empty($dataTable->data))
                @if($company == 'NMDI' || $company == 'CITROEN')
                <table>
                    <?php
                        $totalEmployee += count($dataTable->data);
                        foreach($dataTable->data as $key => $dataRow) {
                            foreach($dataRow->field as $key2 => $dataRow2) {
                                if($dataRow2->tableName === 'Company') {
                                    $branch = $dataRow2->value;
                                }
                            }
                        }
                    ?>
                    <tr>
                        <td>Branch :</td>
                        <td>{{ $level }}</td>
                    </tr>
                    <tr>
                        <td>Cost Center :</td>
                        <td>{{ $dataTable->departement }}</td>
                    </tr>
                </table>
                @else
                <table>
                    <?php
                        $totalEmployee += count($dataTable->data);
                        $branch = $dataTable->departement;
                    ?>
                    <tr>
                        <th>{{ $dataTable->departement }}</th>
                    </tr>
                </table>
                @endif
            <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
                <thead>
                    <tr>
                        @if(!empty($dataTable->data[0]->field))
                            @foreach($dataTable->data[0]->field as $key_data => $dataRow)
                                @if($loop->first)
                                    <th style="text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataRow->fontSize }}px !important; font-weight: bold;">No</th>
                                @endif
                                @if(!is_string($dataRow->value))
                                    <?php
                                        $totalKey = $dataRow->field . '_' . $key_data;
                                        $total[$branch][$totalKey] = 0;
                                        $totalBranch[$branch] = 0;
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
                                <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataRow->fontSize }}px !important; font-weight: bold;">{{ $dataRow->tableName }}</th>
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
                                        $totalBranch[$branch] += $total[$branch][$totalKey];
                                    }
                                ?>
                                <td data-format="{{ $dataRow2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? 0 : $dataRow2->value }}</td>
                            @elseif(!is_string($dataRow2->value) && $dataRow2->dataFormat == "#,##0.00")
                                <?php
                                    if(!empty($dataRow2->value)){
                                        $totalKey = $dataRow2->field . '_' . $key2;
                                        $total[$branch][$totalKey] += $dataRow2->value;
                                        $totalBranch[$branch] += $total[$branch][$totalKey];
                                    }
                                ?>
                                <td data-format="{{ $dataRow2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? 0 : $dataRow2->value }}</td>
                            @elseif($dataRow2->dataFormat == "dd/MM/yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d/m/Y', strtotime($dataRow2->value)) }}</td>
                            @elseif($dataRow2->dataFormat == "dd MM yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d m Y', strtotime($dataRow2->value)) }}</td>
                            @else
                                <td data-format="@" style="text-align:{{ $alignment }}; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : $dataRow2->value }}</td>
                            @endif
                        @endforeach
                    </tr>
                    @endforeach
                    @if($grand_total)
                        <tr>
                            @foreach($total[$branch] as $key => $totalValue)
                                @if($loop->first)
                                    <td style="background-color: yellow; text-align:center; border:1px solid #000; font-size:{{ $fontSize }}px !important; font-weight: bold;">
                                        @if($company == 'NMDI' || $company == 'CITROEN')
                                        Total per Cost Center
                                        @else
                                        Total {{ $branch }}
                                        @endif
                                    </td>
                                @endif
                                <?php
                                    if(!is_string($totalValue)) {
                                        $totalCost = $totalValue;
                                    } else {
                                        $totalCost = '';
                                    }
                                ?>
                                @if($key == 'EmployeeNo_0')
                                <td data-format="#,##0" style="text-align:right; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $totalCost }}</td>
                                @else
                                <td data-format="#,##0" style="text-align:right; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $totalCost }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                </tbody>
            </table>
            @endif
        @endfor
        <br>
        @if($grand_total && isset($level1[0]))
            @if($level1[0] !== "ALL")
            <table style="width: 100%; marginY: 2" class="table table-bordered table-hover responsive table_detail">
                <tbody>
                    <tr>
                        <th style="background-color: yellow; text-align:center; border:1px solid #000; font-size:{{ $fontSize }}px !important;">Total per Company</th>
                        @foreach($grandTotal[$branch] as $key_total => $periodicalTotal)
                            @if($key_total == 'EmployeeNo')
                            <td data-format="#,##0" style="text-align:left; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $periodicalTotal }}</td>
                            @else
                            <td data-format="#,##0" style="text-align:right; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $periodicalTotal }}</td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
            @endif
        @else
            <table style="width: 100%; marginY: 2" class="table table-bordered table-hover responsive table_detail">
                <thead>
                    <tr>
                    @for($i = 0; $i < count($data[0]->departementGroup); $i++)
                        <?php
                            $dataTable = $data[0]->departementGroup[$i];
                            $branch = null;
                        ?>
                        @if(!empty($dataTable->data[0]->field))
                            @foreach($dataTable->data[0]->field as $key_data => $dataRow)
                                @if($loop->first)
                                    <th style="text-align:center; align-items:center; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataRow->fontSize }}px !important; font-weight: bold;">No</th>
                                @endif
                                <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataRow->fontSize }}px !important; font-weight: bold;">{{ $dataRow->tableName }}</th>
                            @endforeach
                            @break
                        @endif
                    @endfor
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="background-color: yellow; text-align:center; border:1px solid #000;">Grand Total</th>
                        @foreach($grandTotal as $key_total => $periodicalTotal)
                            @if($key_total == 'EmployeeNo')
                            <td data-format="#,##0" style="text-align:left; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $periodicalTotal }}</td>
                            @else
                            <td data-format="#,##0" style="text-align:right; border:1px solid #000; font-size:{{ $fontSize }}px !important;">{{ $periodicalTotal }}</td>
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
                                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size: {{ $dataRow->fontSize }}px !important; font-weight: bold;">No</th>
                                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size: {{ $dataRow->fontSize }}px !important; font-weight: bold;">Cost Center</th>
                                    <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size: {{ $dataRow->fontSize }}px !important; font-weight: bold;">Jumlah</th>
                                @endif
                                @if(!is_string($dataRow->value))
                                    <?php
                                        $total[$dataTable->data[0]->companyName][$key_data] = 0;
                                        $totalCompany[$dataTable->data[0]->companyName] = 0;
                                    ?>
                                @endif
                                <th style="text-align:center; vertical-align:middle; border:1px solid #000; padding:4px; background-color: #97d7f7; font-size:{{ $dataRow->fontSize }}px !important; font-weight: bold;">{{ $dataRow->tableName }}</th>
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
                                <td data-format="{{ $dataRow2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? 0 : $dataRow2->value }}</td>
                            @elseif(!is_string($dataRow2->value) && $dataRow2->dataFormat == "#,##0.00")
                                <?php
                                    if(!empty($dataRow2->value)){
                                        $total[$dataRow->companyName][$key2] += $dataRow2->value;
                                        $totalCompany[$dataRow->companyName] += $total[$dataRow->companyName][$key2];
                                    }
                                ?>
                                <td data-format="{{ $dataRow2->dataFormat }}" style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? 0 : $dataRow2->value }}</td>
                            @elseif($dataRow2->dataFormat == "dd/MM/yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d/m/Y', strtotime($dataRow2->value)) }}</td>
                            @elseif($dataRow2->dataFormat == "dd MM yyyy")
                                <td style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : date('d m Y', strtotime($dataRow2->value)) }}</td>
                            @else
                                <td data-format="@" style="text-align:{{ $alignment }}; border:1px solid #000; font-size: {{ $dataRow2->fontSize }}px !important;">{{ empty($dataRow2->value) ? "" : $dataRow2->value }}</td>
                            @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($grand_total)
                <br>
                <table style="width: 100%; marginY: 2" class="table table-bordered table-hover responsive table_detail">
                    <tr>
                        <td style="background-color: yellow; text-align:center; border:1px solid #000;">Total per Company</td>
                        <td style="background-color: yellow; text-align:center; border:1px solid #000;">&nbsp;</td>
                        <td style="background-color: yellow; text-align:center; border:1px solid #000;">{{ $totalJumlah }}</td>
                        @foreach($total[$dataTable->data[0]->companyName] as $key => $totalValue)
                            <td data-format="#,##0" style="text-align:right; border:1px solid #000;">{{ $totalValue }}</td>
                        @endforeach
                    </tr>
                </table>
            @endif
        @endforeach
    @endif
    @if($print_signature)
        <br>
        @if($company == 'NMDI')
        <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
            <tbody>
                @if($level1[0] == "ALL" || $level1[0] == "GIC" || $level1[0] == "NMDI")
                    <tr>
                        <td colspan="4">Jakarta, {{ date('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">Prepared By,</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td style="text-align: center;">Approved By,</td>
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
                        <td colspan="2" style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">Veronica Dian</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td style="text-align: center;">Evensius Go</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="7">Jakarta, {{ date('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td colspan="7">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">Prepared By,</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td style="text-align: center;">Approved By,</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td colspan="2" style="text-align: center;">Approved By,</td>
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
                        <td colspan="2" style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td colspan="2" style="text-align: center; border-bottom: 1px solid black">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">Veronica Dian</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td style="text-align: center;">Pius Edwin Pandu</td>
                        <td style="text-align: center;">&nbsp;</td>
                        <td colspan="2" style="text-align: center;">Evensius Go</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @elseif($company == 'CITROEN')
        <table style="width: 100%;" class="table table-bordered table-hover responsive table_detail">
            <tbody>
                <tr>
                    <td style="text-align: center;">&nbsp;</td>
                    <td colspan="4">Jakarta, {{ date('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="text-align: center;">&nbsp;</td>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center;">&nbsp;</td>
                    <td colspan="2" style="text-align: center;">Reviewed By,</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">Approved By,</td>
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
                    <td style="text-align: center;">&nbsp;</td>
                    <td colspan="2" style="text-align: center; border-bottom: 1px solid black">Tan Kim Piauw</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center; border-bottom: 1px solid black"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">&nbsp;</td>
                    <td colspan="2" style="text-align: center;">Chief Executive Officer</td>
                    <td style="text-align: center;">&nbsp;</td>
                    <td style="text-align: center;">BOD</td>
                </tr>
            </tbody>
        </table>
        @endif
    @endif
</body>
</html>