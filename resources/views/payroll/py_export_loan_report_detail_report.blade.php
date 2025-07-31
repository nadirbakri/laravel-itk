<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('payroll_loan_report.judul') }}</title>
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
        <p>{{ $data_company[0]->companyName }}</p>
        <p>{{ $data_company[0]->address }}</p>
        <h2 style="text-align:center; font-weight:bold;">OTHER LOAN DETAIL REPORT</h2>
        <p style="text-align: center">Period : {{date('F Y', strtotime($period))}}</p>
        <table class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                    <th colspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Employee</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Loan Type</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Outstanding Balance</th>
                    <th colspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Installment</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Total Payment</th>
                </tr>
                <tr>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Name</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Principal + Interest</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Principal</th>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Interest</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $value)
                    @foreach($value->loanEmployeeList as $key2 => $value2)
                    <tr>
                        <td style="text-align:center; padding:4px;">{{ $key2 + 1 }}</td>
                        <td style="text-align:center; padding:4px;">{{$value2->employeeNo}}</td>
                        <td style="text-align:left; padding:4px;">{{$value2->employeeName}}</td>
                        <td style="text-align:center; padding:4px;">{{$value2->loanCode}}</td>
                        <td style="text-align:center; padding:4px;">{{number_format($value2->principalInterest, 2, '.', ',')}}</td>
                        <td style="text-align:center; padding:4px;">{{number_format($value2->installmentPerMonth, 2, '.', ',')}}</td>
                        <td style="text-align:center; padding:4px;">{{number_format($value2->interest, 2, '.', ',')}}</td>
                        <td style="text-align:center; padding:4px;">{{number_format($value2->paymentAmount, 2, '.', ',')}}</td>
                    </tr>
                    @endforeach
                @endforeach
                <tr>
                    <td style="border-bottom: 1px solid black; font-weight:bold; text-align:left; padding:4px;" colspan="8">&nbsp;</td>
                </tr>
                @if(isset($value))
                    <tr>
                        <td colspan="4" style="text-align:left; padding:4px; font-weight:bold;">Grand Total</td>
                        <td style="font-weight:bold; text-align:center; padding:4px;">{{number_format($value->grandTotalPrincipalInterest, 2, '.', ',')}}</td>
                        <td style="font-weight:bold; text-align:center; padding:4px;">{{number_format($value->grandTotalInstallment, 2, '.', ',')}}</td>
                        <td style="font-weight:bold; text-align:center; padding:4px;">{{number_format($value->grandTotalInterest, 2, '.', ',')}}</td>
                        <td style="font-weight:bold; text-align:center; padding:4px;">{{number_format($value->grandTotalPaidAmount, 2, '.', ',')}}</td>
                    </tr>
                @endif
            </tbody>
        </table>

        @php
            date_default_timezone_set('Asia/Jakarta');
            $employeeNo = 'Employee No :' . $request->employee_no_from . ' to ' . $request->employee_no_to;
            $date = date("d M Y");
            $time = date("H:i:s A");
            $loanTypeList = implode(', ', $request->loan_type);
        @endphp

        <script type="text/php">
            if (isset($pdf)) {
                $pdf->page_script('
                    $font = $fontMetrics->get_font("Times-Roman", "normal");
                    $font_bold = $fontMetrics->get_font("Times-Roman", "bold");
                    $size = 10;
                    $text = "Page $PAGE_NUM of $PAGE_COUNT";
                    $width = $fontMetrics->getTextWidth($text, $font, $size);
                    $x = ($pdf->get_width() - $width) - 20;
                    $y = $pdf->get_height();

                    $pdf->text(20, $y - 80, "Report Parameters : ", $font_bold, $size);
                    $pdf->text(20, $y - 60, "Loan Type : {{ $loanTypeList }}", $font, $size);
                    $pdf->text(200, $y - 60, "{{ $employeeNo }}", $font, $size);
                    $pdf->line(20, $y - 40, $pdf->get_width() - 20, $y - 40, array(0,0,0), 0.5);
                    $pdf->text(20, $y - 30, "{{ $date }}", $font, $size);
                    $pdf->text(110, $y - 30, "{{ $time }}", $font, $size);
                    $pdf->text($x, $y - 30, $text, $font, $size);
                ');
            }
        </script>
    </body>
</html>