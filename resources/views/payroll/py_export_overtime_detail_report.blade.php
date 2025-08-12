<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('payroll_overtime_detail_report.judul') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
        <style type="text/css">
            * { 
                box-sizing: border-box; 
                font-weight: 12px;
            }
            body {
                margin-bottom: 100px;
            }
            .table_detail{
                width: 100%;
                border-collapse:collapse;
                border-spacing: 0;
            }
        </style>
    </head>
    <body>
        <h5 style="text-align:center; font-weight:bold; margin: 6px;">OVERTIME DETAIL REPORT</h5>
        <h5 style="text-align:center; font-weight:bold; margin: 6px;">Period : {{ date('d M Y', strtotime($period)) }}</h5>
        <h6 style="text-align:left; font-weight:bold; margin: 4px;">{{ $data[0]->groupData[0]->groupCode }}</h6>
        <h6 style="text-align:left; font-weight:bold; margin: 4px;">{{ $data[0]->groupData[0]->groupName }}</h6>
        <table class="font-size: 12px; table-hover responsive table_detail">
            <thead>
                <tr>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Employee No</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Employee Name</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Date</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Actual</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Convert</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Tariff</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Nilai Lembur</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding: 4px; font-size: 12px; font-weight: bold; text-align: left; vertical-align: middle;">Description</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data[0]->groupData[0]->reportData) > 0)
                    <?php
                        $grandTotalHourOvt = 0;
                        $grandTotalHourOvtCvt = 0;
                        $grandTotalOvertimeValue = 0;
                    ?>
                    @foreach ($data[0]->groupData[0]->reportData as $key => $value)
                        <?php
                            $rowSpanEmp = count($value->overtimeDetail) ?? 1;
                            $totalHourOvt = 0;
                            $totalHourOvtCvt = 0;
                            $totalOvertimeValue = 0;
                        ?>
                        @foreach ($value->overtimeDetail as $key2 => $value2)
                            <?php 
                                $totalHourOvt += (float) $value2->hourOvt;
                                $totalHourOvtCvt += (float) $value2->hourOvtCvt;
                                $totalOvertimeValue += (float) $value2->overtimeValue;
                            ?>
                            <tr>
                                {{-- @if ($loop->first) --}}
                                    <td style="font-size: 12px; text-align: left; vertical-align: top;">{{ $value->employeeNo }}</td>
                                    <td style="font-size: 12px; text-align: left; vertical-align: top;">{{ $value->employeeName }}</td>
                                {{-- @endif --}}
                                <td style="font-size: 12px;">{{ $value2->date }}</td>
                                <td style="font-size: 12px; text-align: right;">{{ $value2->hourOvt }}</td>
                                <td style="font-size: 12px; text-align: right;">{{ $value2->hourOvtCvt }}</td>
                                <td style="font-size: 12px; text-align: right;" data-format="#,##0">{{ number_format((float)$value2->overtimeTariff, 0, '.', ',') }}</td>
                                <td style="font-size: 12px; text-align: right;" data-format="#,##0">{{ number_format((float)$value2->overtimeValue, 0, '.', ',') }}</td>
                                <td style="font-size: 12px;">{{ $value2->description }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="font-size: 12px; text-align: right; font-weight: bold;">Total</td>
                            <td style="font-size: 12px; font-weight: bold; text-align: right;">{{ $totalHourOvt }}</td>
                            <td style="font-size: 12px; font-weight: bold; text-align: right;">{{ $totalHourOvtCvt }}</td>
                            <td>&nbsp;</td>
                            <td data-format="#,##0" style="font-size: 12px; font-weight: bold; text-align: right;">{{ number_format($totalOvertimeValue, 0, '.', ',') }}</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php
                            $grandTotalHourOvt += $totalHourOvt;
                            $grandTotalHourOvtCvt += $totalHourOvtCvt;
                            $grandTotalOvertimeValue += $totalOvertimeValue;
                        ?>
                    @endforeach
                    <tr>
                        <td colspan="3" style="font-size: 12px; text-align: right; font-weight: bold;">Grand Total</td>
                        <td style="font-size: 12px; font-weight: bold; text-align: right;">{{ $grandTotalHourOvt }}</td>
                        <td style="font-size: 12px; font-weight: bold; text-align: right;">{{ $grandTotalHourOvtCvt }}</td>
                        <td>&nbsp;</td>
                        <td data-format="#,##0" style="font-size: 12px; font-weight: bold; text-align: right;">{{ number_format($grandTotalOvertimeValue, 0, '.', ',') }}</td>
                        <td>&nbsp;</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </body>
</html>