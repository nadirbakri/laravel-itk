<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('payroll_overtime_detail_report.judul') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('pictures/favicon.png') }}" type="image/x-icon"/>
        <style type="text/css">
            * { box-sizing: border-box; }
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
        <table>
            <tr>
                <td colspan="7" style="text-align:center; font-weight:bold;">OVERTIME DETAIL REPORT</td>
            </tr>
            <tr>
                <td colspan="7" style="text-align:center; font-weight:bold;">Period : {{ date('d M Y', strtotime($period)) }}</td>
            </tr>
            <tr>
                <td style="text-align:left; font-weight:bold;">{{ $data[0]->groupData[0]->groupCode }}</td>
            </tr>
            <tr>
                <td style="text-align:left; font-weight:bold;">{{ $data[0]->groupData[0]->groupName }}</td>
            </tr>
        </table>
        <table class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Employee No</th>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Employee Name</th>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Date</th>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Actual</th>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Convert</th>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Tariff</th>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Nilai Lembur</th>
                    <th style="border: 1px solid black; font-weight: bold; text-align: center; vertical-align: middle;">Description</th>
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
                                @if ($loop->first)
                                    <td rowspan="{{ $rowSpanEmp }}" style="border: 1px solid black; text-align: left; vertical-align: top;">{{ $value->employeeNo }}</td>
                                    <td rowspan="{{ $rowSpanEmp }}" style="border: 1px solid black; text-align: left; vertical-align: top;">{{ $value->employeeName }}</td>
                                @endif
                                <td style="border: 1px solid black;">{{ $value2->date }}</td>
                                <td style="border: 1px solid black;">{{ $value2->hourOvt }}</td>
                                <td style="border: 1px solid black;">{{ $value2->hourOvtCvt }}</td>
                                <td data-format="#,##0" style="border: 1px solid black;">{{ $value2->overtimeTariff }}</td>
                                <td data-format="#,##0" style="border: 1px solid black;">{{ $value2->overtimeValue }}</td>
                                <td style="border: 1px solid black;">{{ $value2->description }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" style="border: 1px solid black; text-align: right; font-weight: bold;">Total</td>
                            <td style="border: 1px solid black; font-weight: bold;">{{ $totalHourOvt }}</td>
                            <td style="border: 1px solid black; font-weight: bold;">{{ $totalHourOvtCvt }}</td>
                            <td style="border: 1px solid black;">&nbsp;</td>
                            <td data-format="#,##0" style="border: 1px solid black; font-weight: bold;">{{ $totalOvertimeValue }}</td>
                            <td style="border: 1px solid black;">&nbsp;</td>
                        </tr>
                        <?php
                            $grandTotalHourOvt += $totalHourOvt;
                            $grandTotalHourOvtCvt += $totalHourOvtCvt;
                            $grandTotalOvertimeValue += $totalOvertimeValue;
                        ?>
                    @endforeach
                    <tr>
                        <td colspan="3" style="border: 1px solid black; text-align: right; font-weight: bold;">Grand Total</td>
                        <td style="border: 1px solid black; font-weight: bold;">{{ $grandTotalHourOvt }}</td>
                        <td style="border: 1px solid black; font-weight: bold;">{{ $grandTotalHourOvtCvt }}</td>
                        <td style="border: 1px solid black;">&nbsp;</td>
                        <td data-format="#,##0" style="border: 1px solid black; font-weight: bold;">{{ $grandTotalOvertimeValue }}</td>
                        <td style="border: 1px solid black;">&nbsp;</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </body>
</html>