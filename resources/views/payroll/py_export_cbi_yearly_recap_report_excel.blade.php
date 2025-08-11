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
                <td colspan="25"><b>{{ $data[0]->companyName }}</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="25"><b>{{ $data[0]->companyLocation }}</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="25" style="text-align: center;"><b>YEARLY RECAP REPORT</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="25">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="25" style="text-align: center;">Year : {{ $data[0]->periodYear }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="25" style="text-align: center;">Per Employee - Detail</td>
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
                <td>Gaji Pokok</td>
                <td>Rapel Gaji</td>
                <td>Overtime</td>
                <td>Standby Allow</td>
                <td>Daily Allow</td>
                <td>Insentive OB</td>
                <td>Monthly Allow</td>
                <td>Medical_OP</td>
                <td>Gym</td>
                <td>Home Internet</td>
                <td>Salary Adjust Plus</td>
                <td>Salary Adjust Minus</td>
                <td>Bonus</td>
                <td>THR</td>
                <td>Tax Allowance</td>
                <td>Salary Tax</td>
                <td>Bonus Tax</td>
                <td>THR Tax</td>
                <td>JHT Ky</td>
                <td>BPJS Kes Ky</td>
                <td>BPJS Pens Ky</td>
                <td>THP Salary</td>
                <td>THP Bonus</td>
                <td>THP THR</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">January</td>
                <td data-format="@">{{ $value->january->period }}</td>
                <td data-format="#,##0">{{ $value->january->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->january->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->january->overtime }}</td>
                <td data-format="#,##0">{{ $value->january->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->january->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->january->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->january->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->january->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->january->gym }}</td>
                <td data-format="#,##0">{{ $value->january->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->january->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->january->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->january->bonus }}</td>
                <td data-format="#,##0">{{ $value->january->thr }}</td>
                <td data-format="#,##0">{{ $value->january->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->january->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->january->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->january->thrTax }}</td>
                <td data-format="#,##0">{{ $value->january->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->january->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->january->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->january->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->january->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->january->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">February</td>
                <td data-format="@">{{ $value->february->period }}</td>
                <td data-format="#,##0">{{ $value->february->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->february->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->february->overtime }}</td>
                <td data-format="#,##0">{{ $value->february->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->february->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->february->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->february->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->february->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->february->gym }}</td>
                <td data-format="#,##0">{{ $value->february->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->february->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->february->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->february->bonus }}</td>
                <td data-format="#,##0">{{ $value->february->thr }}</td>
                <td data-format="#,##0">{{ $value->february->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->february->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->february->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->february->thrTax }}</td>
                <td data-format="#,##0">{{ $value->february->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->february->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->february->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->february->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->february->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->february->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">March</td>
                <td data-format="@">{{ $value->march->period }}</td>
                <td data-format="#,##0">{{ $value->march->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->march->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->march->overtime }}</td>
                <td data-format="#,##0">{{ $value->march->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->march->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->march->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->march->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->march->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->march->gym }}</td>
                <td data-format="#,##0">{{ $value->march->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->march->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->march->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->march->bonus }}</td>
                <td data-format="#,##0">{{ $value->march->thr }}</td>
                <td data-format="#,##0">{{ $value->march->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->march->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->march->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->march->thrTax }}</td>
                <td data-format="#,##0">{{ $value->march->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->march->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->march->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->march->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->march->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->march->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">April</td>
                <td data-format="@">{{ $value->april->period }}</td>
                <td data-format="#,##0">{{ $value->april->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->april->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->april->overtime }}</td>
                <td data-format="#,##0">{{ $value->april->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->april->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->april->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->april->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->april->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->april->gym }}</td>
                <td data-format="#,##0">{{ $value->april->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->april->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->april->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->april->bonus }}</td>
                <td data-format="#,##0">{{ $value->april->thr }}</td>
                <td data-format="#,##0">{{ $value->april->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->april->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->april->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->april->thrTax }}</td>
                <td data-format="#,##0">{{ $value->april->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->april->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->april->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->april->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->april->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->april->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">May</td>
                <td data-format="@">{{ $value->may->period }}</td>
                <td data-format="#,##0">{{ $value->may->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->may->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->may->overtime }}</td>
                <td data-format="#,##0">{{ $value->may->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->may->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->may->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->may->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->may->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->may->gym }}</td>
                <td data-format="#,##0">{{ $value->may->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->may->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->may->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->may->bonus }}</td>
                <td data-format="#,##0">{{ $value->may->thr }}</td>
                <td data-format="#,##0">{{ $value->may->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->may->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->may->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->may->thrTax }}</td>
                <td data-format="#,##0">{{ $value->may->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->may->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->may->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->may->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->may->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->may->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">June</td>
                <td data-format="@">{{ $value->june->period }}</td>
                <td data-format="#,##0">{{ $value->june->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->june->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->june->overtime }}</td>
                <td data-format="#,##0">{{ $value->june->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->june->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->june->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->june->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->june->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->june->gym }}</td>
                <td data-format="#,##0">{{ $value->june->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->june->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->june->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->june->bonus }}</td>
                <td data-format="#,##0">{{ $value->june->thr }}</td>
                <td data-format="#,##0">{{ $value->june->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->june->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->june->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->june->thrTax }}</td>
                <td data-format="#,##0">{{ $value->june->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->june->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->june->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->june->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->june->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->june->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">July</td>
                <td data-format="@">{{ $value->july->period }}</td>
                <td data-format="#,##0">{{ $value->july->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->july->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->july->overtime }}</td>
                <td data-format="#,##0">{{ $value->july->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->july->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->july->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->july->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->july->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->july->gym }}</td>
                <td data-format="#,##0">{{ $value->july->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->july->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->july->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->july->bonus }}</td>
                <td data-format="#,##0">{{ $value->july->thr }}</td>
                <td data-format="#,##0">{{ $value->july->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->july->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->july->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->july->thrTax }}</td>
                <td data-format="#,##0">{{ $value->july->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->july->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->july->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->july->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->july->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->july->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">August</td>
                <td data-format="@">{{ $value->august->period }}</td>
                <td data-format="#,##0">{{ $value->august->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->august->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->august->overtime }}</td>
                <td data-format="#,##0">{{ $value->august->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->august->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->august->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->august->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->august->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->august->gym }}</td>
                <td data-format="#,##0">{{ $value->august->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->august->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->august->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->august->bonus }}</td>
                <td data-format="#,##0">{{ $value->august->thr }}</td>
                <td data-format="#,##0">{{ $value->august->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->august->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->august->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->august->thrTax }}</td>
                <td data-format="#,##0">{{ $value->august->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->august->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->august->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->august->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->august->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->august->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">September</td>
                <td data-format="@">{{ $value->september->period }}</td>
                <td data-format="#,##0">{{ $value->september->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->september->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->september->overtime }}</td>
                <td data-format="#,##0">{{ $value->september->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->september->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->september->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->september->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->september->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->september->gym }}</td>
                <td data-format="#,##0">{{ $value->september->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->september->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->september->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->september->bonus }}</td>
                <td data-format="#,##0">{{ $value->september->thr }}</td>
                <td data-format="#,##0">{{ $value->september->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->september->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->september->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->september->thrTax }}</td>
                <td data-format="#,##0">{{ $value->september->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->september->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->september->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->september->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->september->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->september->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">October</td>
                <td data-format="@">{{ $value->october->period }}</td>
                <td data-format="#,##0">{{ $value->october->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->october->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->october->overtime }}</td>
                <td data-format="#,##0">{{ $value->october->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->october->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->october->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->october->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->october->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->october->gym }}</td>
                <td data-format="#,##0">{{ $value->october->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->october->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->october->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->october->bonus }}</td>
                <td data-format="#,##0">{{ $value->october->thr }}</td>
                <td data-format="#,##0">{{ $value->october->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->october->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->october->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->october->thrTax }}</td>
                <td data-format="#,##0">{{ $value->october->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->october->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->october->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->october->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->october->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->october->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">November</td>
                <td data-format="@">{{ $value->november->period }}</td>
                <td data-format="#,##0">{{ $value->november->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->november->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->november->overtime }}</td>
                <td data-format="#,##0">{{ $value->november->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->november->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->november->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->november->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->november->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->november->gym }}</td>
                <td data-format="#,##0">{{ $value->november->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->november->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->november->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->november->bonus }}</td>
                <td data-format="#,##0">{{ $value->november->thr }}</td>
                <td data-format="#,##0">{{ $value->november->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->november->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->november->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->november->thrTax }}</td>
                <td data-format="#,##0">{{ $value->november->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->november->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->november->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->november->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->november->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->november->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">December</td>
                <td data-format="@">{{ $value->december->period }}</td>
                <td data-format="#,##0">{{ $value->december->basicSalary }}</td>
                <td data-format="#,##0">{{ $value->december->rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->december->overtime }}</td>
                <td data-format="#,##0">{{ $value->december->standbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->december->dailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->december->insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->december->monthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->december->medical_OP }}</td>
                <td data-format="#,##0">{{ $value->december->gym }}</td>
                <td data-format="#,##0">{{ $value->december->home_Internet }}</td>
                <td data-format="#,##0">{{ $value->december->salaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->december->salaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->december->bonus }}</td>
                <td data-format="#,##0">{{ $value->december->thr }}</td>
                <td data-format="#,##0">{{ $value->december->taxAllowance }}</td>
                <td data-format="#,##0">{{ $value->december->salaryTax }}</td>
                <td data-format="#,##0">{{ $value->december->bonusTax }}</td>
                <td data-format="#,##0">{{ $value->december->thrTax }}</td>
                <td data-format="#,##0">{{ $value->december->jhT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->december->bpjsKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->december->bpjsPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->december->takeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->december->takeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->december->takeHomePayTHR }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2" style="text-align: right;"><b>Total</b></td>
                <td data-format="@">&nbsp;</td>
                <td data-format="#,##0">{{ $value->total_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->total_Rapel_BasicSalary }}</td>
                <td data-format="#,##0">{{ $value->total_Overtime }}</td>
                <td data-format="#,##0">{{ $value->total_StandbyAllowance }}</td>
                <td data-format="#,##0">{{ $value->total_DailyAllowance }}</td>
                <td data-format="#,##0">{{ $value->total_MonthlyAllowance }}</td>
                <td data-format="#,##0">{{ $value->total_Medical_OP }}</td>
                <td data-format="#,##0">{{ $value->total_Insentive_OB }}</td>
                <td data-format="#,##0">{{ $value->total_Gym }}</td>
                <td data-format="#,##0">{{ $value->total_Home_Internet }}</td>
                <td data-format="#,##0">{{ $value->total_SalaryAdjustPlus }}</td>
                <td data-format="#,##0">{{ $value->total_SalaryAdjustMinus }}</td>
                <td data-format="#,##0">{{ $value->total_Bonus }}</td>
                <td data-format="#,##0">{{ $value->total_THR }}</td>
                <td data-format="#,##0">{{ $value->total_TaxAllowance }}</td>
                <td data-format="#,##0">{{ $value->total_SalaryTax }}</td>
                <td data-format="#,##0">{{ $value->total_BonusTax }}</td>
                <td data-format="#,##0">{{ $value->total_THRTax }}</td>
                <td data-format="#,##0">{{ $value->total_JHT_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->total_BPJSKes_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->total_BPJSPensiun_Karyawan }}</td>
                <td data-format="#,##0">{{ $value->total_TakeHomePaySalary }}</td>
                <td data-format="#,##0">{{ $value->total_TakeHomePayBonus }}</td>
                <td data-format="#,##0">{{ $value->total_TakeHomePayTHR }}</td>
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
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
                <td data-format="#,##0"></td>
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