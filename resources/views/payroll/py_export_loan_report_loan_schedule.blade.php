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
            .page_break { page-break-before: always; }
        </style>
    </head>
    <body>
        @foreach($data as $key => $value)
            <p>{{ $data_company[0]->companyName }}</p>
            <p>{{ $data_company[0]->address }}</p>
            <h2 style="text-align:center; font-weight:bold;">LOAN SCHEDULE REPORT</h2>
            <table class="table table-bordered table-hover responsive table_detail">
                <thead>
                    <tr>
                        <th style="border-top:1px solid #000; font-weight: bold; text-align: left; padding:4px;">Employee No</th>
                        <td style="border-top:1px solid #000; text-align: left; padding:4px;">{{$value->employeeNo}}</td>
                        <td colspan="4" style="border-top:1px solid #000; padding: 4px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <th style="font-weight: bold; text-align: left; padding:4px;">Employee Name</th>
                        <td style="text-align: left; padding:4px;">{{$value->fullName}}</td>
                    </tr>
                    <tr>
                        <th style="font-weight: bold; text-align: left; padding:4px;">Seq</th>
                        <td style="text-align: left; padding:4px;">{{$value->loanNo}}</td>
                    </tr>
                    <tr>
                        <th style="font-weight: bold; text-align: left; padding:4px;">Loan Type</th>
                        <td style="text-align: left; padding:4px;">{{$value->loanCode}}</td>
                    </tr>
                    <tr>
                        <th style="border-bottom:1px solid #000; font-weight: bold; text-align: left; padding:4px;">Loan Description</th>
                        <td style="border-bottom:1px solid #000; text-align: left; padding:4px;">{{$value->loanName}}</td>
                        <td colspan="4" style="border-bottom:1px solid #000; padding: 4px;">&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($value->peminjaman as $key2 => $value2)
                        <tr>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Source Document</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->sourceDocument}}</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Loan Date</td>
                            <td style="text-align:right; padding: 4px;">{{date('d M Y', strtotime($value2->loanDate))}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Loan Amount</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->currencyCode}}</td>
                            <td style="text-align:right; padding: 4px;">{{number_format($value2->loanAmount, 2, '.', ',')}}</td>
                            <td>&nbsp;</td>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">First Payment Date</td>
                            <td style="text-align:right; padding: 4px;">{{date('d M Y', strtotime($value2->firstPaymentDate))}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Interest</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->currencyCode}}</td>
                            <td style="text-align:right; padding: 4px;">{{number_format($value2->interest, 2, '.', ',')}}</td>
                            <td>&nbsp;</td>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Rate / Year</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->ratePerYear}} %</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Principal + Interest</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->currencyCode}}</td>
                            <td style="text-align:right; padding: 4px;">{{number_format($value2->principalInterest, 2, '.', ',')}}</td>
                            <td>&nbsp;</td>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">No. of Installment</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->noOfInstallment}} Month(s)</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Total Payment</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->currencyCode}}</td>
                            <td style="text-align:right; padding: 4px;">{{number_format($value2->paymentAmount, 2, '.', ',')}}</td>
                            <td>&nbsp;</td>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Description</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->description}}</td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold; text-align: left; padding: 4px;">Outstanding Loan</td>
                            <td style="text-align:right; padding: 4px;">{{$value2->currencyCode}}</td>
                            <td style="text-align:right; padding: 4px;">{{number_format($value2->outstanding, 2, '.', ',')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            &nbsp;
            <table class="table table-bordered table-hover responsive table_detail">
                <thead>
                    <tr>
                        <th style="border-bottom:1px solid #000; font-weight: bold; text-align: center;">Date</th>
                        <th style="border-bottom:1px solid #000; font-weight: bold; text-align: center;">Seq</th>
                        <th style="border-bottom:1px solid #000; font-weight: bold; text-align: center;">Type</th>
                        <th style="border-bottom:1px solid #000; font-weight: bold; text-align: center;">Principal</th>
                        <th style="border-bottom:1px solid #000; font-weight: bold; text-align: center;">Interest</th>
                        <th style="border-bottom:1px solid #000; font-weight: bold; text-align: center;">Payment Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($value2->payment as $key3 => $value3)
                        <tr>
                            <td style="text-align:center;">{{date('d M Y', strtotime($value3->paymentDate))}}</td>
                            <td style="text-align:center;">{{$value3->paymentSeq}}</td>
                            <td style="text-align:center;">{{$value3->paymentType}}</td>
                            <td data-format="#,##0.00" style="text-align:center;">{{number_format($value3->paymentPrincipal, 2, '.', ',')}}</td>
                            <td data-format="#,##0.00" style="text-align:center;">{{number_format($value3->paymentInterest, 2, '.', ',')}}</td>
                            <td data-format="#,##0.00" style="text-align:center;">{{number_format($value3->totalPayment, 2, '.', ',')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($key != array_key_last($data))
                <div class="page_break"></div>
            @endif
        @endforeach

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