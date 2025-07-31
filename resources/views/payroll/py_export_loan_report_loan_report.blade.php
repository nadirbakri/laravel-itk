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
        <h2 style="text-align:center; font-weight:bold;">LOAN REPORT</h2>
        <table class="table table-bordered table-hover responsive table_detail">
            <thead>
                <tr>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                    <th colspan="3" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Employee</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Seq</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Source Document</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Loan Date</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">First Payment</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Currency</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Loan Amount</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">No of Installment</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Rate / Year</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Interest</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Installment / Period</th>
                    <th rowspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Description</th>
                </tr>
                <tr>
                    <th style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">No</th>
                    <th colspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; padding:4px; font-weight: bold; text-align: center; vertical-align: middle;">Name</th>
                </tr>
            </thead>
            @if(count($data) > 0)
                <tbody>
                    @foreach($data[0]->loanReportData as $key => $value)
                        <tr>
                            <td colspan="2" style="font-weight:bold; text-align:center; padding:4px;">Loan Type</td>
                            <td style="font-weight:bold; text-align:center; padding:4px;">{{$value->loanCode}}</td>
                            <td style="font-weight:bold; text-align:center; padding:4px;">{{$value->loanDescription}}</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                        </tr>
                        @foreach($value->listData as $key2 => $value2)
                        <tr>
                            <td style="text-align:center; padding:4px;">{{ $key2 + 1 }}</td>
                            <td style="text-align:center; padding:4px;">{{$value2->employeeNo}}</td>
                            <td colspan="2" style="text-align:left; padding:4px;">{{$value2->fullName}}</td>
                            <td style="text-align:center; padding:4px;">{{$value2->loanNo}}</td>
                            <td style="text-align:center; padding:4px;">{{$value2->sourceDocument}}</td>
                            <td style="text-align:right; padding:4px;">{{date('d M Y', strtotime($value2->loanDate))}}</td>
                            <td style="text-align:right; padding:4px;">{{date('d M Y', strtotime($value2->firstPaymentDate))}}</td>
                            <td style="text-align:center; padding:4px;">{{$value2->currencyCode}}</td>
                            <td style="text-align:right; padding:4px;">{{number_format($value2->loanAmount, 2, '.', ',')}}</td>
                            <td style="text-align:right; padding:4px;">{{$value2->noOfInstallment}}</td>
                            <td style="text-align:right; padding:4px;">{{$value2->ratePerYear}}%</td>
                            <td style="text-align:right; padding:4px;">{{number_format($value2->paymentInterest, 2, '.', ',')}}</td>
                            <td style="text-align:right; padding:4px;">{{number_format($value2->installmentPerMonth, 2, '.', ',')}}</td>
                            <td style="text-align:left; padding:4px;">{{$value2->description}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="font-weight:bold; text-align:left; padding:4px;">Total Loan</td>
                            <td style="font-weight:bold; text-align:center; padding:4px;">{{$value->loanCode}}</td>
                            <td style="font-weight:bold; text-align:center; padding:4px;">{{$value->loanDescription}}</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="text-align:center; padding:4px;">&nbsp;</td>
                            <td style="border-top: 1px solid black; font-weight:bold; text-align:right; padding:4px;">{{number_format($value->totalLoan, 2, '.', ',')}}</td>
                            <td colspan="2" style="border-top: 1px solid black; text-align:center; padding:4px;">&nbsp;</td>
                            <td style="border-top: 1px solid black; font-weight:bold; text-align:right; padding:4px;">{{number_format($value->totalInterest, 2, '.', ',')}}</td>
                            <td style="border-top: 1px solid black; font-weight:bold; text-align:right; padding:4px;">{{number_format($value->totalInstallment, 2, '.', ',')}}</td>
                            <td style="border-top: 1px solid black; text-align:center; padding:4px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid black; font-weight:bold; text-align:left; padding:4px;" colspan="15">&nbsp;</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="9" style="text-align:left; padding:4px; font-weight:bold;">Grand Total</td>
                        <td style="font-weight:bold; text-align:right; padding:4px;">{{number_format($data[0]->grandTotalLoan ?? 0, 2, '.', ',')}}</td>
                        <td style="text-align:center; padding:4px;">&nbsp;</td>
                        <td style="text-align:center; padding:4px;">&nbsp;</td>
                        <td style="font-weight:bold; text-align:right; padding:4px;">{{number_format($data[0]->grandTotalInterest ?? 0, 2, '.', ',')}}</td>
                        <td style="font-weight:bold; text-align:right; padding:4px;">{{number_format($data[0]->grandTotalInstallment ?? 0, 2, '.', ',')}}</td>
                        <td style="text-align:center; padding:4px;">&nbsp;</td>
                    </tr>
                </tbody>
            @endif
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