<!DOCTYPE html>
<html>
<head>
    <title>Yearly Jamsostek</title>
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
    @if(count($data) > 0)
        @foreach($data[0]->employeeData as $key => $value)
        <table>
            <tr>
                <td>&nbsp;</td>
                <td colspan="9"><b>{{ $data[0]->companyName }}</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="9"><b>{{ $data[0]->companyLocation }}</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="9" style="text-align: center;"><b>YEARLY_RECAP_JAMSOSTEK_REPORT</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="9">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="9" style="text-align: center;">Year : {{ $data[0]->periodYear }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="9" style="text-align: center;">Per Employee - Detail</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2"><b>Employee No</b></td>
                <td>{{ $value->employeeNo }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2"><b>Full Name</b></td>
                <td colspan="5">{{ $value->employeeName }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2"><b>Period</b></td>
                <td>&nbsp;</td>
                <td>JHT_PT</td>
                <td>JKM</td>
                <td>JKK</td>
                <td>BPJS Kes PT</td>
                <td>Iuran Pensiun</td>
                <td>Medical Insurance</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">January</td>
                <td data-format="@">{{ $value->january->period }}</td>
                <td data-format="#,##0">{{ $value->january->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->january->jkm }}</td>
                <td data-format="#,##0">{{ $value->january->jkk }}</td>
                <td data-format="#,##0">{{ $value->january->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->january->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->january->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">February</td>
                <td data-format="@">{{ $value->february->period }}</td>
                <td data-format="#,##0">{{ $value->february->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->february->jkm }}</td>
                <td data-format="#,##0">{{ $value->february->jkk }}</td>
                <td data-format="#,##0">{{ $value->february->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->february->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->february->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">March</td>
                <td data-format="@">{{ $value->march->period }}</td>
                <td data-format="#,##0">{{ $value->march->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->march->jkm }}</td>
                <td data-format="#,##0">{{ $value->march->jkk }}</td>
                <td data-format="#,##0">{{ $value->march->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->march->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->march->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">April</td>
                <td data-format="@">{{ $value->april->period }}</td>
                <td data-format="#,##0">{{ $value->april->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->april->jkm }}</td>
                <td data-format="#,##0">{{ $value->april->jkk }}</td>
                <td data-format="#,##0">{{ $value->april->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->april->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->april->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">May</td>
                <td data-format="@">{{ $value->may->period }}</td>
                <td data-format="#,##0">{{ $value->may->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->may->jkm }}</td>
                <td data-format="#,##0">{{ $value->may->jkk }}</td>
                <td data-format="#,##0">{{ $value->may->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->may->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->may->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">June</td>
                <td data-format="@">{{ $value->june->period }}</td>
                <td data-format="#,##0">{{ $value->june->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->june->jkm }}</td>
                <td data-format="#,##0">{{ $value->june->jkk }}</td>
                <td data-format="#,##0">{{ $value->june->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->june->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->june->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">July</td>
                <td data-format="@">{{ $value->july->period }}</td>
                <td data-format="#,##0">{{ $value->july->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->july->jkm }}</td>
                <td data-format="#,##0">{{ $value->july->jkk }}</td>
                <td data-format="#,##0">{{ $value->july->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->july->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->july->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">August</td>
                <td data-format="@">{{ $value->august->period }}</td>
                <td data-format="#,##0">{{ $value->august->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->august->jkm }}</td>
                <td data-format="#,##0">{{ $value->august->jkk }}</td>
                <td data-format="#,##0">{{ $value->august->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->august->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->august->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">September</td>
                <td data-format="@">{{ $value->september->period }}</td>
                <td data-format="#,##0">{{ $value->september->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->september->jkm }}</td>
                <td data-format="#,##0">{{ $value->september->jkk }}</td>
                <td data-format="#,##0">{{ $value->september->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->september->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->september->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">October</td>
                <td data-format="@">{{ $value->october->period }}</td>
                <td data-format="#,##0">{{ $value->october->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->october->jkm }}</td>
                <td data-format="#,##0">{{ $value->october->jkk }}</td>
                <td data-format="#,##0">{{ $value->october->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->october->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->october->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">November</td>
                <td data-format="@">{{ $value->november->period }}</td>
                <td data-format="#,##0">{{ $value->november->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->november->jkm }}</td>
                <td data-format="#,##0">{{ $value->november->jkk }}</td>
                <td data-format="#,##0">{{ $value->november->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->november->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->november->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">December</td>
                <td data-format="@">{{ $value->december->period }}</td>
                <td data-format="#,##0">{{ $value->december->jhT_Company }}</td>
                <td data-format="#,##0">{{ $value->december->jkm }}</td>
                <td data-format="#,##0">{{ $value->december->jkk }}</td>
                <td data-format="#,##0">{{ $value->december->bpjsKes_Company }}</td>
                <td data-format="#,##0">{{ $value->december->iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->december->medical_Insurance }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2" style="text-align: right;"><b>Total</b></td>
                <td data-format="@">&nbsp;</td>
                <td data-format="#,##0">{{ $value->total_JHT_Company }}</td>
                <td data-format="#,##0">{{ $value->total_JKM }}</td>
                <td data-format="#,##0">{{ $value->total_JKK }}</td>
                <td data-format="#,##0">{{ $value->total_BPJSKes_Company }}</td>
                <td data-format="#,##0">{{ $value->total_Iuran_Pensiun }}</td>
                <td data-format="#,##0">{{ $value->total_Medical_Insurance }}</td>
            </tr>
        </table>
        @endforeach
        <table>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2" style="text-align: right;"><b>Grand Total</b></td>
                <td data-format="@">&nbsp;</td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">Disetujui Oleh</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="2">Disetujui Oleh</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="2">Disiapkan Oleh</td>
            </tr>
        </table>
        <br><br><br><br>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">Bagian FIN/ACC</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="2">Bagian HRG/GA</td>
                <td colspan="2">&nbsp;</td>
                <td colspan="2">Bagian Payroll</td>
            </tr>
        </table>
        <br><br><br><br><br>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td><b>Report Parameters :</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="4">Report Name : {{ $data[0]->reportName }}</td>
                <td colspan="4">Employee No : {{ $data[0]->employeeNo }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="4">Report Status : {{ $data[0]->reportStatus }}</td>
                <td colspan="4">Report Type : {{ $data[0]->reportType }}</td>
            </tr>
            <tr>
                <td colspan="9">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="9">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>{{ date('d M Y', strtotime($data[0]->printDate)) }}</td>
                <td>{{ date('H:i:s', strtotime($data[0]->printDate)) }}</td>
            </tr>
        </table>
    @endif
</body>
</html>