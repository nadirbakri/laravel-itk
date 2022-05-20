<?php

namespace App\Http\Controllers;

use App\Imports\PayrollDataImport;
use App\Imports\PayrollBonusTHRDataImport;
use App\Exports\TemplatePayrollDataTemplateSheet;
use App\Http\Controllers\Redirect;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use File;
use DataTables;
use Excel;

class PayrollController extends Controller
{
    public function pagePayroll() 
    {
        return view ('payroll.py_main');
    }

    public function pageAccount()
    {
        return view ('payroll.py_account');
    }

    public function pageSalaryMaster()
    {
        return view ('payroll.py_salary_master');
    }

    public function pageSeveranceDataEntry()
    {
        return view ('payroll.py_severance_data_entry');
    }

    public function pageTarifMaster()
    {
        return view ('payroll.py_tariff_master');
    }

    public function pageSalaryAccumulationData()
    {
        return view ('payroll.py_salary_accumulation_data');
    }

    public function pageImportDataFromExcel() 
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult_tm = json_decode($response_tm->getBody()->getContents()); 

            if($arrResult_tm->dataListSet == null){
                $data = [];
            }else{
                $data = $arrResult_tm->dataListSet;
            }

            if($arrResult_tm->dataListSet[0]->statusProcess > '0'){
                return redirect()->back()->with(['msg', 'Invalid Status Process']);
            } else {
                $arrResult_tm = json_decode($response_tm->getBody()->getContents());
                return view ('payroll.py_import_data_from_excel', ['data_tm' => $data]);
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }
    }

    public function pageImportDataFromExcelBonusTHR()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult_tm = json_decode($response_tm->getBody()->getContents());

        if($arrResult_tm->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult_tm->dataListSet;
        }

        return view ('payroll.py_import_data_from_excel_bonus_thr', ['data_tm' => $data]);
    }

    public function pageBonusFormula()
    {
        return view ('payroll.py_bonus_formula');
    }
    
    public function pageThrFormula()
    {
        return view ('payroll.py_thr_formula');
    }

    public function pageBonusDataEntry()
    {
        return view ('payroll.py_bonus_data_entry');
    }

    public function pageThrDataEntry()
    {
        return view ('payroll.py_thr_data_entry');
    }

    public function pageLoanMaster()
    {
        return view ('payroll.py_loan_master');
    }

    public function pageLoanDataEntry()
    {
        return view ('payroll.py_loan_data_entry');
    }

    public function pagePartialFullLoanPayment()
    {
        return view ('payroll.py_full_partial_loan_payment');
    }

    public function pageLoanPayment()
    {
        return view ('payroll.py_loan_payment');
    }

    public function pageMultiCostCenter()
    {
        return view ('payroll.py_multi_cost_center');
    }

    public function pageReportFormat()
    {
        return view ('payroll.py_report_format');
    }

    public function pagePayrollCalculation()
    {
        return view ('payroll.py_payroll_calculation');
    }

    public function pageSlipFormat()
    {
        return view ('payroll.py_slip_format');
    }

    public function pageSalaryComponentForm()
    {
        return view ('payroll.py_salary_component_form');
    }

    public function pageReferencePayroll()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_cpy = $client->post(env('API_URL') . '/company/getcompany',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
	    				'recordStatus' => 'A'
                    ]
                )]
            );

            $response_pr = $client->post(env('API_URL') . '/referencepayroll/getreferencepayroll',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult_tm = json_decode($response_tm->getBody()->getContents());
        $arrResult_cpy = json_decode($response_cpy->getBody()->getContents()); 
        $arrResult_pr = json_decode($response_pr->getBody()->getContents()); 

        return view('payroll.py_reference_payroll', ['data_tm' => $arrResult_tm->dataListSet, 'data_cpy' => $arrResult_cpy->dataListSet, 'data_pr' => $arrResult_pr->dataListSet]);
    }

    public function pageYearEndProcess () {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_year_end_process', ['data' => $data]);
    }

    public function pageSptProcess() 
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_spt_process', ['data' => $data, "status" => "Final tax calculation not processed yet"]);
    }

    public function pageFinalTaxProcess() 
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_final_tax_process', ['data' => $data]);
    }

    public function pageJournalTemplate()
    {
        return view ('payroll.py_journal_template');
    }

    public function pageSptFormat()
    {
        return view ('payroll.py_spt_format');
    }

    public function pageMonthlyPayrollClosingProcess()
    {
        return view ('payroll.py_monthly_closing_process');
    }

    public function pageSeveranceReport()
    {
        return view('payroll.py_severance_report');
    }

    public function pageJournalReport()
    {
        return view('payroll.py_journal_report');
    }
     
    public function pageSalaryCalculationProcess()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view ('payroll.py_salary_calculation_process', ['data' => $data]);
    }

    public function pageTaxCalculationProcess()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view ('payroll.py_tax_calculation_process', ['data' => $data]);
    }

    public function pageAbsenteeismOvertimeCalculationProcess()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view ('payroll.py_absenteeism_overtime_calculation_process', ['data' => $data]);
    }

    public function tableAccountPY()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmaccount/getgmaccount',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableSalaryMasterPY() {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prsalarymaster/getprsalarymaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableSeveranceDataEntryPY() {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prpensionseverance/getprpensionseverance',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTariffMasterPY() {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prtariffmaster/getprtariffmaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTariffMasterDetailPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prtariffmaster/getprtariffmaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableSalaryAccumulationDataPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pryearly/getpryearly',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'periodYear' => (int) $request->periodYear
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTHRDataEntryPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'flagType' => 'T',
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableBonusDataEntryPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'flagType' => 'B',
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableLoanMasterPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloanmaster/getloanmaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableLoanDataEntryPY() {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableFullPartialLoanPaymentPY() {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloanpayment/getprloanpayment',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableLoanPaymentPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloanpayment/getemployeedetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableMultiCostCenterPY()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prmulticost/getprmulticost',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableReportFormatPY()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prreportformat/getreportformatlist',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTHRFormulaPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/comgen/getcomgen',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "variable" => "religion_",
                        "languageCode" => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTHRFormulaDetailPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/prformulathr/getprformulathr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "religionCode" => $request->religionCode,
                        "languageCode" => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableBonusFormulaDetailPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "bonusDate" => $request->bonusDate,
                        "languageCode" => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableBonusFormulaPY(Request $request) {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "languageCode" => App::getLocale(),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tablePayrollCalculationPY()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prcalculation/getprcalculationprocess',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableSalaryComponentFormPY()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/salarycomponentdata/getsalarycomponentdata',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tablePayrollCalculationDetailPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/prcalculation/getprcalculationdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "fieldName" => $request->fieldName,
                        "languageCode" => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableJournalTemplatePY()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prjournaltemplate/getprjournaltemplate',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function dataDetailSalaryMasterPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prsalarymaster/getprsalarymaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'statusPeriod' => $request->statusPeriod,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_salary_master_detail', ['data' => $data]);
    }

    public function dataDetailSeveranceDataEntryPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prpensionseverance/getprpensionseverance',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'paymentDate' => $request->paymentDate,
                        'paymentFor' => $request->paymentFor,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_severance_data_entry_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailTariffMasterPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prtariffmaster/getprtariffmaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'statusPeriod' => $request->statusPeriod,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_tariff_master_detail', ['data' => $data]);
    }

    public function dataDetailSalaryAccumulationDataPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pryearly/getpryearly',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'periodYear' => (int) $request->periodYear,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_salary_accumulation_data_detail', ['data' => $data]);
    }

    public function dataDetailTHRDataEntryPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func == 'new') {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
            else {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'receiptDate' => $request->receiptDate,
                            'flagType' => $request->type,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_thr_data_entry_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailBonusDataEntryPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func == 'new') {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
            else {
                $response = $client->post(env('API_URL') . '/prbonusthr/getprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'receiptDate' => $request->receiptDate,
                            'flagType' => $request->type,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_bonus_data_entry_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailLoanMasterPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloanmaster/getloanmaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'loanCode' => $request->loanCode,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_loan_master_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailFullPartialLoanPaymentPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloanpayment/getprloanpayment',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'loanNo' => (int) $request->loanNo,
                        'auditLoanSeqNo' => (int) $request->auditLoanSeqNo,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response2 = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'loanNo' => (int) $request->loanNo,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());  
        $arrResult2 = json_decode($response2->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
            $data2 = [];
        }else{
            $data = $arrResult->dataListSet;
            $data2 = $arrResult2->dataListSet;
        }

        return view('payroll.py_full_partial_loan_payment_detail', ['data' => $data, 'data2' => $data2, 'func' => $request->func]);
    }

    public function dataDetailLoanPaymentPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloanpayment/getemployeedetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'loanNo' => (int) $request->loanNo,
                        'paymentSeq' => (int) $request->paymentSeq,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response2 = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'loanNo' => (int) $request->loanNo,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());  
        $arrResult2 = json_decode($response2->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
            $data2 = [];
        }else{
            $data = $arrResult->dataListSet;
            $data2 = $arrResult2->dataListSet;
        }

        return view('payroll.py_loan_payment_detail', ['data' => $data, 'data2' => $data2]);
    }

    public function dataFullPartialLoanPaymentPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'loanNo' => (int) $request->loanNo,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json($arrResult->dataListSet);
    }

    public function dataDetailLoanDataEntryPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prloandataentry/getloanemployee',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'loanNo' => (int) $request->loanNo,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_loan_data_entry_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailTHRFormulaPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/comgen/getcomgen',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'variable' => 'religion_',
                        'comGenCode' => $request->religionCode,
                        'languageCode' => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_table = $client->post(env('API_URL') . '/prformulathr/getprformulathr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'religionCode' => $request->religionCode,
                        'languageCode' => App::getLocale(),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        $arrResult2 = json_decode($response_table->getBody()->getContents());
        
        if($arrResult->dataListSet == null || $arrResult2->dataListSet == null){
            $data = [];
            $data_table = [];
        }else{
            $data = $arrResult->dataListSet;
            $data_table = $arrResult->dataListSet;
        }

        return view('payroll.py_thr_formula_detail', ['data' => $data, 'data_table' => $data_table]);
    }

    public function dataDetailBonusFormulaPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func === 'new') {
                $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'languageCode' => App::getLocale(),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }

            else {
                $response = $client->post(env('API_URL') . '/prformulabonus/getformulabonus',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'bonusDate' => $request->bonusDate,
                            'languageCode' => App::getLocale(),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_bonus_formula_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataAccountPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmaccount/getgmaccount',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'accountNo' => $request->accountNo,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_account_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataMultiCostCenterPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prmulticost/getprmulticost',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('payroll.py_multi_cost_center_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataReportFormatPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prreportformat/getreportformatlist',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'reportCode' => $request->reportCode,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('payroll.py_report_format_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailSalaryComponentDataPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/salarycomponentdata/getsalarycomponentdata',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'fieldName' => $request->fieldName,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_salary_component_form_detail', ['data' => $data, 'func' => $request->func]);
    }

public function dataDetailReportFormatPY(Request $request)
{
    try {
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . Session::get('token') ]
        ]);

        // var_dump($request->reportCode);

        $response = $client->post(env('API_URL') . '/prreportformat/getreportformatlist',
            ['body' => json_encode(
                [
                    'companyCode' => Session::get('companyCode'),
                    'reportCode' => $request->reportCode,
                    'languageCode' => App::getLocale()
                ]
            )]
        );
    } catch (RequestException $e) {
        var_dump($e->getResponse());
    }

    $arrResult = json_decode($response->getBody()->getContents());  

    return view('payroll.py_report_format_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
}

    public function dataDetailJournalTemplatePY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prjournaltemplate/getprjournaltemplate',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'journalCode' => $request->journalCode,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_journal_template_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataPayrollCalculationPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prcalculation/getprcalculationprocess',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'fieldName' => $request->fieldName,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );

            $response_table = $client->post(env('API_URL') . '/prcalculation/getprcalculationdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'fieldName' => $request->fieldName,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );

        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        $arrResult2 = json_decode($response_table->getBody()->getContents());

        return view('payroll.py_payroll_calculation_detail', ['data' => $arrResult->dataListSet, 'data_table' => $arrResult2->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailSlipFormatPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prslipformat/getslipformat',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "slipCode" => $request->slipCode
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function prosesSalaryMasterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "employeeNo" => $request->employee_no_hidden,
                "fullName" => $request->employee_name,
                "periodYear" => (int) $request->year,
                "periodMonth" => (int) $request->month,
                "statusPeriod" => $request->period,
                "remark" => empty($request->remark) ? "NULL" : $request->remark,
                "changedNo" => 0,
                "changedBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "createdDate" => date("Y-m-d\TH:i:s"),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userID')
            ];

            if(isset($request->field_name)) {
                foreach($request->field_name as $key => $value) {
                    $data_grid[] = [
                        "fieldType" => $request->field_type[$key],
                        "fieldName" => $value,
                        "description" => $request->description[$key],
                        "amount" => (float) $request->amount[$key],
                        "currencyCode" => $request->currency_code[$key]
                    ];
                }
            } else {
                $data_grid[] = null;
            }

            $param['grid'] = $data_grid;

            $response = $client->put(env('API_URL') . '/prsalarymaster/updateprsalarymaster',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesAccountPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            // var_dump(Session::get('token'));

            $param = [
                'recordStatus' => "A",
                'companyCode' => Session::get('companyCode'),
                'accountNo' => $request->account_no,
                'accountDescription' => $request->account_description,
                'reference' => $request->reference,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale(),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')        
            ];

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmaccount/insertgmaccount',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/gmaccount/updategmaccount',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesReportFormatPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if (isset($request->column_no)) {
                foreach ($request->column_no as $key => $value) {
                    $data_detail [] = [
                        'companyCode' => Session::get('companyCode'),
                        "reportCode" => $request->report_code,
                        "columnNo" => (int) $value,
                        "tableName" => $request->table_name_detail[$key],
                        "fieldName" => $request->field_name_detail[$key],
                        "columnHeader" => $request->column_header[$key],
                        "alignment" => (int) $request->alignment[$key],
                        "dataFormat" => $request->data_format[$key],
                        "isDisplayed" => isset($request->display[$key]) ? (bool) $request->display[$key] : false,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID')
                    ];
                }
                // var_dump($request->table_name_detail[$value]);
                // var_dump($request->alignment[$value]);
            }
            else {
                $data_detail [] = null;
            }
            
            if (isset($request->seq_no)) {
                foreach ($request->seq_no as $key => $value1) {
                    $data_condition [] = [
                        'companyCode' => Session::get('companyCode'),
                        "reportCode" => $request->report_code,
                        "seqNo" => (int) $value1,
                        "tableName" => $request->table_name_condition[$key],
                        "fieldName" => $request->field_name_condition[$key],
                        "criteria" => $request->criteria[$key],
                        "value" => $request->value[$key],
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID')
                    ];
                    // var_dump($request->table_name_condition[$value1]);
                    // var_dump($request->criteria[$value1]);
                }
            }
            else {
                $data_condition [] = null;
            }

            // var_dump($data_detail);

            $param = [
                'recordStatus' => "A",
                'companyCode' => Session::get('companyCode'),
                'reportCode' => $request->report_code,
                'description' => $request->description,
                'fontSize' => (int) $request->font_size,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageID" => App::getLocale(),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')        
            ];
            $param['detail'] = $data_detail;
            $param['condition'] = $data_condition;

            // var_dump($param);


            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/prreportformat/insertreportformat',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/prreportformat/updatereportformat',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesSeveranceDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/prpensionseverance/insertprpensionseverance',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no,
                            "employeeName" => $request->employee_name,
                            "paymentDate" => $request->payment_date,
                            "resignDate" => date("Y-m-d", strtotime($request->resign_date)),
                            "paymentFor" => $request->payment_for,
                            "amount" => (float) $request->amount,
                            "adjustment" => (float) $request->adjustment,
                            "totalAmount" => (float) $request->total_amount,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
            else {
                $response = $client->put(env('API_URL') . '/prpensionseverance/updateprpensionseverance',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no_hidden,
                            "employeeName" => $request->employee_name,
                            "paymentDate" => $request->payment_date,
                            "resignDate" => date("Y-m-d", strtotime($request->resign_date)),
                            "paymentFor" => $request->payment_for,
                            "amount" => (float) $request->amount,
                            "adjustment" => (float) $request->adjustment,
                            "totalAmount" => (float) $request->total_amount,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesMultiCostCenterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if (isset($request->cost_center)) {
                foreach ($request->cost_center as $key => $value) {
                    $data_detail [] = [
                        'companyCode' => Session::get('companyCode'),
                        "employeeNo" => $request->employee_no,
                        "periodYear" => (int) date('Y', strtotime($request->month_year)),
                        "periodMonth" => (int) date('m', strtotime($request->month_year)),
                        "statusPeriod" => (int) $request->period,
                        "costCenterCode" => $value,
                        "percentage" => (int) $request->percentage[$key],
                        "isDefault" => isset($request->isDefault[$key]) ? (bool) $request->isDefault[$key] : false,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ];
                }
                // var_dump($request->cost_center);
                // var_dump($request->percentage[$key]);
            }
            else {
                $data_detail = null;
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                'employeeNo' => $request->employee_no,
                "periodYear" => (int) date('Y', strtotime($request->month_year)),
                "periodMonth" => (int) date('m', strtotime($request->month_year)),
                "statusPeriod" => (int) $request->period,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale(),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')        
            ];
            $param['detail'] = $data_detail;

            // var_dump($param);
            // var_dump($request->cost_center);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/prmulticost/insertprmulticost',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/prmulticost/updateprmulticostdetail',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        // var_dump($response);

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesTariffMasterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "employeeNo" => $request->employee_no_hidden,
                "fullName" => $request->employee_name,
                "periodYear" => (int) $request->year,
                "periodMonth" => (int) $request->month,
                "statusPeriod" => $request->period,
                "changedNo" => 0,
                "changedBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "createdDate" => date("Y-m-d\TH:i:s"),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userID')
            ];

            if(isset($request->field_name)) {
                foreach($request->field_name as $key => $value) {
                    $data_grid[] = [
                        "fieldType" => $request->field_type[$key],
                        "fieldName" => $value,
                        "description" => $request->description[$key],
                        "amount" => (float) $request->amount[$key],
                        "currencyCode" => $request->currency_code[$key]
                    ];
                }
            } else {
                $data_grid[] = null;
            }

            $param['grid'] = $data_grid;

            $response = $client->put(env('API_URL') . '/prtariffmaster/updateprtariffmaster',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesSalaryAccumulationDataPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "employeeNo" => $request->employee_no_hidden,
                "fullName" => $request->employee_name,
                "periodYear" => (int) $request->year,
                "changedNo" => 0,
                "changedBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "createdDate" => date("Y-m-d\TH:i:s"),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userID')
            ];

            if(isset($request->field_name)) {
                foreach($request->field_name as $key => $value) {
                    $data_grid[] = [
                        "fieldName" => $value,
                        "description" => $request->description[$key],
                        "amount" => (float) $request->amount[$key]
                    ];
                }
            } else {
                $data_grid[] = null;
            }

            $param['grid'] = $data_grid;

            $response = $client->put(env('API_URL') . '/pryearly/updatepryearly',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesTHRFormulaPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/prformulathr/insertprformulathr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'religionCode' => $request->religion_code,
                            'serviceMonthFrom' => (int) $request->service_month_from,
                            'serviceMonthTo' => (int) $request->service_month_to,
                            "formula" => $request->preview_formula,
                            "condition" => $request->preview_condition,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }

            else {
                $response = $client->put(env('API_URL') . '/prformulathr/updateprformulathr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'religionCode' => $request->religion_code,
                            'serviceMonthFrom' => (int) $request->service_month_from,
                            'serviceMonthTo' => (int) $request->service_month_to,
                            "formula" => $request->preview_formula,
                            "condition" => $request->preview_condition,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesBonusFormulaPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/prformulabonus/insertformulabonus',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'bonusDate' => $request->bonus_date,
                            'serviceMonthFrom' => (int) $request->service_month_from,
                            'serviceMonthTo' => (int) $request->service_month_to,
                            "performanceResult" => $request->performance_result,
                            "formula" => $request->preview_formula,
                            "condition" => $request->preview_condition,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }

            else {
                $response = $client->put(env('API_URL') . '/prformulabonus/updateformulabonus',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'bonusDate' => $request->bonus_date,
                            'serviceMonthFrom' => (int) $request->service_month_from,
                            'serviceMonthTo' => (int) $request->service_month_to,
                            "performanceResult" => $request->performance_result,
                            "formula" => $request->preview_formula,
                            "condition" => $request->preview_condition,
                            "changedNo" => 0,
                            "languageCode" => App::getLocale(),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesTHRBonusDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function == 'New') {
                $response = $client->post(env('API_URL') . '/prbonusthr/insertprbonusthr',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employee_no,
                            'receiptDate' => $request->payment_date,
                            'flagType' => $request->entry_type,
                            "currencyCode" => $request->currency_code,
                            "amount" => (int) $request->nominal,
                            "serviceMonth" => (int) $request->service_month,
                            "performanceResult" => $request->performance_result,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }else {
                $param[] = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no_hidden,
                    'receiptDate' => $request->payment_date_hidden,
                    'flagType' => $request->entry_type_hidden,
                    "currencyCode" => $request->currency_code,
                    "amount" => (int) $request->nominal,
                    "serviceMonth" => (int) $request->service_month,
                    "performanceResult" => $request->performance_result,
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => App::getLocale(),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userID')
                ];

                $response = $client->put(env('API_URL') . '/prbonusthr/updateprbonusthr',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesTHRDataEntryProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prbonusthr/processbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "processType" => $request->process_type,
                        "cutOffDate" => $request->thr_cut_off_date,
                        "religionCode" => $request->religion_code,
                        "rounded" => isset($request->service_month_rounded) ? (bool) $request->service_month_rounded : false,
                        "greaterThan" => (int) $request->greater_than,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesBonusDataEntryProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prbonusthr/processbonusthr',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "processType" => $request->process_type,
                        "cutOffDate" => $request->bonus_cut_off_date,
                        "rounded" => isset($request->service_month_rounded) ? (bool) $request->service_month_rounded : false,
                        "greaterThan" => (int) $request->greater_than,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesLoanMasterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/prloanmaster/insertloanmaster',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'loanCode' => $request->loan_code,
                            'loanDescription' => $request->loan_description,
                            'flagPlafond' => isset($request->check_plafond) ? (bool) $request->check_plafond : false,
                            "percentagePlafond" => (int) $request->percentage_plafond,
                            "flagIncludeOtherLoan" => isset($request->check_include_other_loan) ? (bool) $request->check_include_other_loan : false,
                            "flagCollateral" => isset($request->check_collateral) ? (bool) $request->check_collateral : false,
                            "serviceMonth" => (int) $request->service_month,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }else {
                $response = $client->put(env('API_URL') . '/prloanmaster/updateloanmaster',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'loanCode' => $request->loan_code,
                            'loanDescription' => $request->loan_description,
                            'flagPlafond' => isset($request->check_plafond) ? (bool) $request->check_plafond : false,
                            "percentagePlafond" => (int) $request->percentage_plafond,
                            "flagIncludeOtherLoan" => isset($request->check_include_other_loan) ? (bool) $request->check_include_other_loan : false,
                            "flagCollateral" => isset($request->check_collateral) ? (bool) $request->check_collateral : false,
                            "serviceMonth" => (int) $request->service_month,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesLoanDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            if ($request->record_function === 'New') {
                if(isset($request->seq_no_table)) {
                    foreach($request->seq_no_table as $key => $value) {
                        $paramDetail[] = [
                            "paymentSeq" => (int) $value,
                            "paymentDate" => $request->payment_date_table[$key],
                            "paymentType" => isset($request->payment_type[$key]) ? $request->payment_type[$key] : '',
                            "paymentPrincipal" => (float) $request->principal_table[$key],
                            "payment" => (float) $request->payment_table[$key],
                            "paymentInterest" => (float) $request->interest_table[$key],
                            "outStandingAmount" => (float) $request->outstanding_table[$key],
                            "flagStatus" => filter_var($request->paid_table[$key], FILTER_VALIDATE_BOOLEAN)
                        ];
                    }
                } else {
                    $paramDetail[] = null;
                }

                $response = $client->post(env('API_URL') . '/prloandataentry/insertloanemployee',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeName" => $request->employee_name,
                            "employeeNo" => $request->employee_no,
                            "loanNo" => (int) $request->loan_no,
                            "loanCode" => $request->loan_code,
                            "sourceDocument" => $request->source_document,
                            "description" => $request->loan_description,
                            "loanDate" => $request->loan_date,
                            "interestType" => $request->interest_type,
                            "firstPaymentDate" => $request->first_payment_date,
                            "currencyCode" => $request->currency_code,
                            "loanAmount" => (float) $request->loan_amount,
                            "noOfInstallment" => (int) $request->no_of_installment,
                            "ratePerYear" => (float) $request->rate_per_year,
                            "interest" => (float) $request->interest,
                            "installmentPerMonth" => (float) $request->installment_per_month,
                            "paymentAmount" => (float) $request->total_payment,
                            "loanEndDate" => date("Y-m-d", strtotime($request->termination_loan)),
                            "downPayment" => (float) $request->down_payment,
                            "loanBalance" => (float) $request->loan_amount_balance,
                            "paidOn" => $request->paid_on,
                            "principalPlusInterest" => (float) $request->principal_plus_interest,
                            "outstandingBalance" => (float) $request->outstanding_balance,
                            "detail" => $paramDetail,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }else {
                if(isset($request->seq_no_table)) {
                    foreach($request->seq_no_table as $key => $value) {
                        $paramDetail[] = [
                            "paymentSeq" => (int) $value,
                            "paymentDate" => $request->payment_date_table[$key],
                            "paymentType" => isset($request->payment_type_hidden[$key]) ? $request->payment_type_hidden[$key] : '',
                            "paymentPrincipal" => (float) $request->principal_table[$key],
                            "payment" => (float) $request->payment_table[$key],
                            "paymentInterest" => (float) $request->interest_table[$key],
                            "outStandingAmount" => (float) $request->outstanding_table[$key],
                            "flagStatus" => filter_var($request->paid_table[$key], FILTER_VALIDATE_BOOLEAN)
                        ];
                    }
                } else {
                    $paramDetail[] = null;
                }

                $response = $client->put(env('API_URL') . '/prloandataentry/updateloanemployee',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeName" => $request->employee_name,
                            "employeeNo" => $request->employee_no_hidden,
                            "loanNo" => (int) $request->loan_no,
                            "loanCode" => $request->loan_code_hidden,
                            "sourceDocument" => $request->source_document,
                            "description" => $request->loan_description,
                            "loanDate" => $request->loan_date,
                            "interestType" => $request->interest_type_hidden,
                            "firstPaymentDate" => $request->first_payment_date,
                            "currencyCode" => $request->currency_code_hidden,
                            "loanAmount" => (float) $request->loan_amount,
                            "noOfInstallment" => (int) $request->no_of_installment,
                            "ratePerYear" => (float) $request->rate_per_year,
                            "interest" => (float) $request->interest,
                            "installmentPerMonth" => (float) $request->installment_per_month,
                            "paymentAmount" => (float) $request->total_payment,
                            "loanEndDate" => date("Y-m-d", strtotime($request->termination_loan)),
                            "downPayment" => (float) $request->down_payment,
                            "loanBalance" => (float) $request->loan_amount_balance,
                            "paidOn" => $request->paid_on,
                            "principalPlusInterest" => (float) $request->principal_plus_interest,
                            "outstandingBalance" => (float) $request->outstanding_balance,
                            "detail" => $paramDetail,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesFullPartialLoanPaymentPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                if(isset($request->seq_no_table)) {
                    foreach($request->seq_no_table as $key => $value) {
                        $paramDetail[] = [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no_table[$key],
                            "employeeName" => $request->employee_name_table[$key],
                            "loanNo" => (int) $request->loan_no_table[$key],
                            "paymentSeq" => (int) $value,
                            "paymentDate" => date("Y-m-d", strtotime($request->payment_date_table[$key])),
                            "paymentType" => $request->payment_type_table[$key],
                            "paymentPrincipal" => (float) $request->principal_table[$key],
                            "paymentInterest" => (float) $request->interest_table[$key],
                            "outStandingAmount" => (float) $request->outstanding_table[$key],
                            "flagStatus" => filter_var($request->paid_table[$key], FILTER_VALIDATE_BOOLEAN),
                            "ratePerYear" => (float) $request->rate_per_year_table[$key],
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ];
                    }
                } else {
                    $paramDetail[] = null;
                }

                $response = $client->post(env('API_URL') . '/prloanpayment/insertprloanpayment',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no,
                            "employeeName" => $request->employee_name,
                            "loanNo" => (int) $request->loan_no,
                            "auditLoanSeqNo" => (int) $request->paid_loan_seq,
                            "paymentFlag" => $request->payment_method,
                            "ratePerYear" => (float) $request->rate_per_year,
                            "noOfInstallmentNotYetPaid" => (int) $request->no_of_installment_not_yet_paid,
                            "currencyCode" => $request->currency_code,
                            "periodYear" => (int) $request->period_year,
                            "periodMonth" => (int) $request->period_month,
                            "statusPeriod" => $request->status_period,
                            "principalAmount" => (float) $request->principal_amount_installment,
                            "interestAmount" => (float) $request->interest_amount_per_installment,
                            "outstandingAmount" => (float) $request->outstanding_amount,
                            "totalNotYetPaid" => (float) $request->total_not_yet_paid,
                            "paymentAmount" => (float) $request->payment_amount,
                            "paymentOtherCost" => (float) $request->other_cost,
                            "totalPayment" => (float) $request->total_payment,
                            "newOutstandingPaymentAmount" => (float) $request->new_outstanding_amount,
                            "newRatePerYear" => (float) $request->new_rate_per_year,
                            "newNoOfInstallmentNotYetPaid" => (int) $request->new_no_of_installment_not_yet_paid,
                            "employeeDetail" => $paramDetail,
                            "changeNo" => 0,
                            "changeBy" => Session::get('userID'),
                            "changeDate" => date("Y-m-d\TH:i:s"),
                            "createBy" => Session::get('userID'),
                            "createDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
            else {
                if(isset($request->seq_no_table)) {
                    foreach($request->seq_no_table as $key => $value) {
                        $paramDetail[] = [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no_table[$key],
                            "employeeName" => $request->employee_name_table[$key],
                            "loanNo" => (int) $request->loan_no_table[$key],
                            "paymentSeq" => (int) $value,
                            "paymentDate" => date("Y-m-d", strtotime($request->payment_date_table[$key])),
                            "paymentType" => $request->payment_type_table[$key],
                            "paymentPrincipal" => (float) $request->principal_table[$key],
                            "paymentInterest" => (float) $request->interest_table[$key],
                            "outStandingAmount" => (float) $request->outstanding_table[$key],
                            "flagStatus" => filter_var($request->paid_table[$key], FILTER_VALIDATE_BOOLEAN),
                            "ratePerYear" => (float) $request->rate_per_year_table[$key],
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ];
                    }
                } else {
                    $paramDetail[] = null;
                }

                $response = $client->put(env('API_URL') . '/prloanpayment/updateprloanpayment',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no_hidden,
                            "employeeName" => $request->employee_name,
                            "loanNo" => (int) $request->loan_no,
                            "auditLoanSeqNo" => (int) $request->paid_loan_seq,
                            "paymentFlag" => $request->payment_method,
                            "ratePerYear" => (float) $request->rate_per_year,
                            "noOfInstallmentNotYetPaid" => (int) $request->no_of_installment_not_yet_paid,
                            "currencyCode" => $request->currency_code,
                            "periodYear" => (int) $request->period_year,
                            "periodMonth" => (int) $request->period_month,
                            "statusPeriod" => $request->status_period,
                            "principalAmount" => (float) $request->principal_amount_installment,
                            "interestAmount" => (float) $request->interest_amount_per_installment,
                            "outstandingAmount" => (float) $request->outstanding_amount,
                            "totalNotYetPaid" => (float) $request->total_not_yet_paid,
                            "paymentAmount" => (float) $request->payment_amount,
                            "paymentOtherCost" => (float) $request->other_cost,
                            "totalPayment" => (float) $request->total_payment,
                            "newOutstandingPaymentAmount" => (float) $request->new_outstanding_amount,
                            "newRatePerYear" => (float) $request->new_rate_per_year,
                            "newNoOfInstallmentNotYetPaid" => (int) $request->new_no_of_installment_not_yet_paid,
                            "employeeDetail" => $paramDetail,
                            "changeNo" => 0,
                            "changeBy" => Session::get('userID'),
                            "changeDate" => date("Y-m-d\TH:i:s"),
                            "createBy" => Session::get('userID'),
                            "createDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesPayrollCalculationPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                // var_dump($request->record_function);
                if (isset($request->no)) {
                    foreach ($request->no as $key => $value) {
                        $data_detail [] = [
                            'companyCode' => Session::get('companyCode'),
                            "fieldName" => $request->field_name,
                            "seqNo" => (int) $value,
                            "condition" => $request->condition[$key],
                            "formula" => $request->formula[$key],
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "languageCode" => strtoupper(App::getLocale()),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ];
                        // var_dump($request->condition[$key]);
                        // var_dump($request->criteria[$value1]);
                    }
                }
                else {
                    $data_detail = null;
                }

                // var_dump($data_detail);

                $param = [
                    'recordStatus' => 'A',
                    'companyCode' => Session::get('companyCode'),
                    'fieldName' => $request->field_name,
                    'seqProcess' => (int) $request->sequence,
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => strtoupper(App::getLocale()),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userID')     
                ];
                $param['detail'] = $data_detail;

                // var_dump($param);
            }
            else {
                if (isset($request->no)) {
                    foreach ($request->no as $key => $value) {
                        $data_detail [] = [
                            'companyCode' => Session::get('companyCode'),
                            "fieldName" => $request->field_name_hidden,
                            "seqNo" => (int) $value,
                            "condition" => $request->condition[$key],
                            "formula" => $request->formula[$key],
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "languageCode" => strtoupper(App::getLocale()),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ];
                        // var_dump($request->condition[$key]);
                        // var_dump($request->criteria[$value1]);
                    }
                }
                else {
                    $data_detail = null;
                }

                // var_dump($data_detail);

                $param = [
                    'recordStatus' => 'A',
                    'companyCode' => Session::get('companyCode'),
                    'fieldName' => $request->field_name_hidden,
                    'seqProcess' => (int) $request->sequence,
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "languageCode" => strtoupper(App::getLocale()),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userID')     
                ];
                $param['detail'] = $data_detail;

                // var_dump($param);
            }

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/prcalculation/insertprcalculationprocess',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/prcalculation/updateprcalculationprocess',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesJournalTemplatePY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $param = [
                    'recordStatus' => $request->record_status,
                    'companyCode' => Session::get('companyCode'),
                    'journalCode' => $request->journal_code,
                    'fieldName' => $request->field_name,
                    'costCenter' => $request->cost_center,
                    'debitKredit' => $request->debit_kredit,
                    'account' => $request->account,
                    'description' => $request->description,
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    'sessionID' => 0, 
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')        
                ];
            }
            else {
                $param = [
                    'recordStatus' => $request->record_status,
                    'companyCode' => Session::get('companyCode'),
                    'journalCode' => $request->journal_code_hidden,
                    'fieldName' => $request->field_name,
                    'costCenter' => $request->cost_center,
                    'debitKredit' => $request->debit_kredit,
                    'account' => $request->account,
                    'description' => $request->description,
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    'sessionID' => 0, 
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')        
                ];
            }

            // var_dump($param);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/prjournaltemplate/insertprjournaltemplate',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/prjournaltemplate/updateprjournaltemplate',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeTHRBonusDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'employeeName' => $value['employeeName'],
                    'receiptDate' => $value['receiptDate'],
                    'flagType' => $value['flagType'],
                    'changedNo' => 0,
                    "changedBy" => Session::get('userID'),
                    "createdBy" => Session::get('userID'),
                    'languageCode' => App::getLocale(),
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }

            $response = $client->delete(env('API_URL') . '/prbonusthr/deleteprbonusthr',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeSeveranceDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/prpensionseverance/deleteprpensionseverance',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'employeeName' => $request->employeeName,
                        'paymentDate' => $request->paymentDate,
                        'paymentFor' => $request->paymentFor,
                        'totalAmount' => (int) $request->totalAmount,
                        'changedNo' => 0,
                        "changedBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedBy" => Session::get('userID'),
                        'languageCode' => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeTHRFormulaPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/prformulathr/deleteprformulathr',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "religionCode" => $request->religionCode,
                        "serviceMonthFrom" => (int) $request->serviceMonthFrom,
                        "serviceMonthTo" => (int) $request->serviceMonthTo,
                        "formula" => $request->formula,
                        "condition" => $request->condition,
                        "changedNo" => 0,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeBonusFormulaPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/prformulabonus/deleteformulabonus',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "bonusDate" => $request->bonusDate,
                        "serviceMonthFrom" => (int) $request->serviceMonthFrom,
                        "serviceMonthTo" => (int) $request->serviceMonthTo,
                        "performanceResult" => $request->performanceResult,
                        "formula" => $request->formula,
                        "condition" => $request->condition,
                        "changedNo" => 0,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userName')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removePayrollCalculationPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/prcalculation/deleteprcalculationdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'fieldName' => $request->field_name,
                        'seqNo' => (int) $request->no,
                        "condition" => $request->preview_condition,
                        "formula" => $request->preview_formula,
                        "changedNo" => 0,
                        "changedBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "languageCode" => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeMultiCostCenterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'periodYear' => (int) $value['periodYear'],
                    'periodMonth' => (int) $value['periodMonth'],
                    'statusPeriod' => (int) $value['statusPeriod'],
                    "changedNo" => 0,
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'languageCode' => App::getLocale(),
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }

            // var_dump(json_encode($param));

            $response = $client->delete(env('API_URL') . '/prmulticost/deletemulticost',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeSptFormatPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            var_dump((int) $request->column_no_hidden);

            $response = $client->delete(env('API_URL') . '/prformatspt/deleteprformatspt',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'columnNo' => (int) $request->column_no_hidden,
                        'fieldName' => $request->field_name,
                        "label" => $request->field_label,
                        "format" => $request->format,
                        "changedNo" => 0,
                        "changedBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "languageCode" => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function dataDetailSptFormatPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump((int)$request->columnNo);

            $response = $client->post(env('API_URL') . '/prformatspt/getprformatspt',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'columnNo' => (int) $request->columnNo
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json($arrResult->dataListSet);
    }

    public function statusLoanMasterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/prloanmaster/updateloanmaster',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'loanCode' => $request->loanCode,
                        'loanDescription' => $request->loanDescription,
                        'percentagePlafond' => (int) $request->percentagePlafond,
                        'serviceMonth' => (int) $request->serviceMonth,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
            
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusAccountPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmaccount/updategmaccount',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'accountNo' => $request->accountNo,
                        'accountDescription' => $request->accountDescription,
                        'reference' => $request->reference,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
            
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusReportFormatPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/prreportformat/updatestatus',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'reportCode' => $request->reportCode,
                        'description' => $request->description,
                        'fontSize' => (int) $request->fontSize
                    ]
                )]
            );
            
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusPayrollCalculationPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/prcalculation/updateprcalculationprocess',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'fieldName' => $request->fieldName,
                        'seqProcess' => (int) $request->seqProcess,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
            // var_dump($request->reportCode);
            
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusJournalTemplatePY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/prjournaltemplate/updateprjournaltemplate',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'journalCode' => $request->journalCode,
                        'fieldName' => $request->fieldName,
                        'costCenter' => $request->costCenter,
                        'debitKredit' => $request->debitKredit,
                        'account' => $request->account,
                        'description' => $request->description,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );
            // var_dump($request->reportCode);
            
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesSalaryComponentDataPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'fieldName' => $request->field_name,
                'description' => $request->description,
                'fieldWidth' => (int) $request->field_width,
                'decimalPoint' => (int) $request->decimal_point,
                'includeProrate' => isset($request->include_prorate) ? (bool) $request->include_prorate : false,
                'groupTakehomepay' => (int) $request->group_takehomepay,
                'displayIn' => $request->display_in,
                'fieldType' => $request->field_type,
                'flagTax' => $request->tax,
                'flagPension' => isset($request->pension) ? (bool) $request->pension : false,
                "flagRetroactive" => isset($request->retroactive) ? (bool) $request->retroactive : false,
                "flagCummulativeUpdate" => isset($request->cummulative_update) ? (bool) $request->cummulative_update : false,
                "flagYearlyUpdate" => isset($request->yearly_update) ? (bool) $request->yearly_update : false,
                "flagLimitMedical" => isset($request->for_limit_medical) ? (bool) $request->for_limit_medical : false,
                "flagTaxAllowance" => isset($request->tax_allowance) ? (bool) $request->tax_allowance : false,
                "flagJamsostek" => isset($request->jamsostek) ? (bool) $request->jamsostek : false,
                "flagOvtAlternative1" => isset($request->overtime_alternative_1) ? (bool) $request->overtime_alternative_1 : false,
                "flagOvtAlternative2" => isset($request->overtime_alternative_2) ? (bool) $request->overtime_alternative_2 : false,
                "flagHealthInsurance" => isset($request->health_insurance) ? (bool) $request->health_insurance : false,
                "flagPensionInsurance" => isset($request->pension_insurance) ? (bool) $request->pension_insurance : false,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale(),
                'sessionID' => 0, 
                'userID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')        
            ];

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/salarycomponentdata',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/salarycomponentdata',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSalaryComponentDataProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult_tm = json_decode($response_tm->getBody()->getContents()); 

            if($arrResult_tm->dataListSet == null){
                return response()->json(['status' => false, 'message' =>  'No Data Reference Time Management']);
            }else{  
                $response = $client->post(env('API_URL') . '/salarycomponentdata/processcomponent',
                    ['body' => json_encode(
                        [
                            "companyCode" => Session::get('companyCode'),
                            "periodMonth" => (int) $arrResult_tm->dataListSet[0]->periodMonth,
                            "periodYear" => (int) $arrResult_tm->dataListSet[0]->periodYear,
                            "period" => (int) $arrResult_tm->dataListSet[0]->statusPeriod,
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID'),
                            "logActionUserID" => Session::get('userName') 
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesReferencePayrollPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "paymentPeriod" => (int) $request->payroll_payment_period,
                "taxRegisteredNo" => $request->tax_registered_no,
                "jamsostekNo" => $request->jamsostek_no,
                "pensionNo" => $request->pension_no,
                "retirementAgeLimit" => (int) $request->retirement_age_limit,
                "dependentsMax" => (int) $request->maximum_dependents,
                "thpRoundedFrom" => (float) $request->take_home_pay_rounded_from,
                "thpRoundedBecome" => (float) $request->take_home_pay_rounded_become,
                "transRateType" => $request->transaction_rate_type,
                "taxRateType" => $request->tax_rate_type,
                "roundingMethodReport" => $request->rounding_method_report,
                "roundingDecimalReport" => (int) $request->rounding_decimal_report,
                "roundingMethodSpt" => $request->rounding_method_spt,
                "roundingDecimalSpt" => (int) $request->rounding_decimal_spt,
                "appreciation" => isset($request->check_appreciation_and_employee_service) ? (bool) $request->check_appreciation_and_employee_service : false,
                "bonusCooefficient" => (float) $request->bonus_cooficient,
                "taxAllowanceBonus" => isset($request->check_tax_allowance_bonus) ? (bool) $request->check_tax_allowance_bonus : false,
                "taxAllowanceTHR" => isset($request->check_tax_allowance_thr) ? (bool) $request->check_tax_allowance_thr : false,
                "pensionContributionEmployee" => (float) $request->pension_contribution_employee,
                "pensionContributionEmployer" => (float) $request->pension_contribution_employer,
                "workRelateAccidentInsurance" => (float) $request->work_related_accident_insurance_one,
                "workRelateAccidentInsurance2" => (float) $request->work_related_accident_insurance_two,
                "workRelateAccidentInsurance3" => (float) $request->work_related_accident_insurance_three,
                "nonAccidentalDeathInsurance" => (float) $request->non_accidental_death_insurance,
                "healthInsuranceCompany" => (float) $request->health_insurance_company,
                "healthInsuranceEmployee" => (float) $request->health_insurance_employee,
                "maxCalcBaseHealthIns" => (float) $request->max_calculation_health_insurance,
                "minCalcBaseHealthIns" => (float) $request->min_calculation_health_insurance,
                "pensionInsuranceCompany" => (float) $request->pension_insurance_company,
                "pensionInsuranceEmployee" => (float) $request->pension_insurance_employee,
                "maxCalcBasePensionIns" => (float) $request->max_calculation_pension_insurance,
                "minCalcBasePensionIns" => (float) $request->min_calculation_pension_insurance,
                "calculationMethod" => $request->calculation_method,
                "multiplicationFactorDailyWorkers" => (int) $request->multiplication_factor_daily_worker,
                "deductedOnPeriod" => (int) $request->deduction_on_period_jamsostek,
                "remissionPaymentPercentage" => (int) $request->work_insurance_remision_payment_percentage,
                "remissionEndPeriod" => $request->work_insurance_remision_end_period,
                "nonTaxableIncomeEmployee" => (float) $request->non_taxable_income_employee,
                "nonTaxableIncomeDependent" => (float) $request->non_taxable_income_each_dependent,
                "occupationalPercentage" => (float) $request->occupational_percentage,
                "occupationalMaximum" => (float) $request->occupational_maximum,
                "flagtaxableIncomeRounded" => isset($request->check_nearest_taxable_income) ? (bool) $request->check_nearest_taxable_income : false,
                "nearestTaxableIncomeRounded" => (float) $request->nearest_taxable_income,
                "timeTest" => (int) $request->time_test,
                "taxRateWithintimeTest" => (float) $request->tax_rate_with_time_test,
                "maxGrossIncome" => (float) $request->max_gross_income,
                "taxRate1" => (float) $request->tax_rate1,
                "taxableIncome1" => (float) $request->taxable_income_from1,
                "taxRate2" => (float) $request->tax_rate2,
                "taxableIncome2" => (float) $request->taxable_income_from2,
                "taxRate3" => (float) $request->tax_rate3,
                "taxableIncome3" => (float) $request->taxable_income_from3,
                "taxRate4" => (float) $request->tax_rate4,
                "taxableIncome4" => (float) $request->taxable_income_from4,
                "taxRate5" => (float) $request->tax_rate5,
                "taxableIncome5" => (float) $request->taxable_income_from5,
                "taxRate6" => (float) $request->tax_rate6,
                "taxableIncome6" => (float) $request->taxable_income_from6,
                "taxGovernmentTK" => (int) $request->tax_by_government_tk,
                "taxGovernmentK0" => (int) $request->tax_by_government_k0,
                "taxGovernmentK1" => (int) $request->tax_by_government_k1,
                "taxGovernmentK2" => (int) $request->tax_by_government_k2,
                "taxGovernmentK3" => (int) $request->tax_by_government_k3,
                "taxDeductedOnPeriod" => (int) $request->deduction_on_period_tax_calculation_table,
                "salaryTaxPenalties" => (int) $request->tax_penalties_salary,
                "bonusTaxPenalties" => (int) $request->tax_penalties_bonus,
                "thrTaxPenalties" => (int) $request->tax_penalties_thr,
                "pensionTaxableIncome1" => (float) $request->severance_payment_from1,
                "pensionTaxRate1" => (float) $request->severance_payment_rate1,
                "pensionTaxableIncome2" => (float) $request->severance_payment_from2,
                "pensionTaxRate2" => (float) $request->severance_payment_rate2,
                "pensionTaxableIncome3" => (float) $request->severance_payment_from3,
                "pensionTaxRate3" => (float) $request->severance_payment_rate3,
                "pensionTaxableIncome4" => (float) $request->severance_payment_from4,
                "pensionTaxRate4" => (float) $request->severance_payment_rate4,
                "pensionTaxableIncome5" => (float) $request->severance_payment_from5,
                "pensionTaxRate5" => (float) $request->severance_payment_rate5,
                "prorateMethod" => $request->prorate_method,
                "taxCalculationMethod" => $request->tax_calculation_method,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale(),
                'sessionID' => 0, 
                'userID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')        
            ];

            // var_dump(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/referencepayroll/insertrefrencepayroll',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/referencepayroll/updaterefrencepayroll',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesYearEndProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult_tm = json_decode($response_tm->getBody()->getContents()); 

            if($arrResult_tm->dataListSet == null){
                return response()->json(['status' => false, 'message' =>  'No Data Reference Time Management']);
            }else{  
                $response = $client->post(env('API_URL') . '/yearend/yearendprocess',
                    ['body' => json_encode(
                        [
                            "companyCode" => Session::get('companyCode'),
                            "periodYear" => (int) $arrResult_tm->dataListSet[0]->periodYear,
                            "languageCode" => App::getLocale(),
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID'),
                            "logActionUserID" => Session::get('userName') 
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSPTProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/prspt/insertprspt',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "groupNPWP" => isset($request->group_npwp) ? (bool) $request->group_npwp : false,
                        "groupNPWPCode" => $request->npwp,
                        "languageCode" => App::getLocale(),
                        "changedNo" => 0,
                        "changedBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID'),
                        "logActionUserID" => Session::get('userName') 
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesFinalTaxProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/referencetm/getreferencetm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult_tm = json_decode($response_tm->getBody()->getContents()); 

            if($arrResult_tm->dataListSet == null){
                return response()->json(['status' => false, 'message' =>  'No Data Reference Time Management']);
            } else{  
                $response = $client->post(env('API_URL') . '/finaltaxprocess/finaltaxprocess',
                    ['body' => json_encode(
                        [
                            "companyCode" => Session::get('companyCode'),
                            "employeeNoFrom" => $request->employee_no_from,
                            "employeeNoTo" => $request->employee_no_to,
                            "range" => isset($request->range_employee_no) ? (bool) $request->range_employee_no : false,
                            "periodYear" => (int) $arrResult_tm->dataListSet[0]->periodYear,
                            "languageCode" => App::getLocale(),
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID'),
                            "logActionUserID" => Session::get('userName') 
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function importDataFromExcelPY(Request $request)
    {
        try{
            $file = $request->file('import_file');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new PayrollDataImport(
                $request->process_period,
                $request->transfer_to,
                $request->column_a,
                $request->column_b,
                $request->column_c, 
                $request->column_c2, 
                $request->column_d, 
                $request->column_d2, 
                $request->column_e, 
                $request->column_e2, 
                $request->column_f,
                $request->column_f2,
                $request->column_g,
                $request->column_g2,
                $request->column_h,
                $request->column_h2,
                $request->column_i,
                $request->column_i2,
                $request->column_j,
                $request->column_j2,
                $request->column_k,
                $request->column_k2,
                $request->column_l,
                $request->column_l2
            );
            Excel::import($import, public_path('file_excel/'.$nama_file));
            File::delete('file_excel/'.$nama_file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }

        return $import->getArrResult();
    }

    public function importDataFromExcelBonusTHRPY(Request $request)
    {
        try{
            $file = $request->file('import_file');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new PayrollBonusTHRDataImport;
            Excel::import($import, public_path('file_excel/'.$nama_file));
            File::delete('file_excel/'.$nama_file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }

        return $import->getArrResult();
    }

    public function templateImportDataFromExcelPY(Request $request)
    {
        return Excel::download(new TemplatePayrollDataTemplateSheet(
            $request->column_a, 
            $request->column_b, 
            $request->column_c, 
            $request->column_d, 
            $request->column_e, 
            $request->column_f,
            $request->column_g,
            $request->column_h,
            $request->column_i,
            $request->column_j,
            $request->column_k,
            $request->column_l
        ), 'Template Payroll Data.xlsx');
    }
    public function prosesMonthlyClosingProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump((int) $request->period_month);

            $response = $client->post(env('API_URL') . '/prmonthlyclosingprocess/insertprmonthlyclosing',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "periodMonth" => (int) $request->period_month,
                        "periodYear" => (int) $request->period_year,
                        "languageCode" => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID'),
                        "logActionUserID" => Session::get('userName') 
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSptFormatPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            // var_dump(Session::get('token'));
            // var_dump($request->record_function);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'columnNo' => (int) $request->column_no_hidden,
                'fieldName' => $request->field_name,
                'label' => $request->field_label,
                "changedNo" => 0,
                'format' => $request->format,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "languageCode" => App::getLocale(),
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')        
            ];

            // var_dump($param);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/prformatspt/insertprformatspt',
                    ['body' => json_encode($param)]
                );
            }
            else if($request->record_function == 'Edit'){
                $response = $client->post(env('API_URL') . '/prformatspt/updateprformatspt',
                    ['body' => json_encode($param)]
                );
            }
            else{
                $response = $client->delete(env('API_URL') . '/prformatspt/deleteprformatspt',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSlipFormatCustomPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            // var_dump(Session::get('token'));
            // var_dump($request->slip_type_custom);

            if($request->custom_label == 'label1'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'slipCode' => $request->slip_type_custom,
                    'slipName' => $request->slip_name_custom,
                    'fontSize' => (int) $request->font_size_custom,
                    'formatNumber' => $request->number_format_custom,
                    'headerCustom1' => $request->custom,
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')
                ];
                // var_dump($param);
            }

            else if($request->custom_label == 'label2'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'slipCode' => $request->slip_type_custom,
                    'slipName' => $request->slip_name_custom,
                    'fontSize' => (int) $request->font_size_custom,
                    'formatNumber' => $request->number_format_custom,
                    'headerCustom2' => $request->custom,
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')
                ];
            }

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/prslipformat/insertslipformat',
                    ['body' => json_encode($param)]
                );
            }
            else{
                $response = $client->post(env('API_URL') . '/prslipformat/updateslipformat',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSlipFormatAllowancePY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            var_dump($request->record_function);

            if($request->number_allowance == '1'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'slipCode' => $request->slip_type_allowance,
                    'slipName' => $request->slip_name_allowance,
                    'fontSize' => (int) $request->font_size_allowance,
                    'formatNumber' => $request->number_format_allowance,
                    'allowance1Label' => $request->field_label_allowance,
                    'allowance1Field' => $request->field_name_allowance,
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    'sessionID' => 0, 
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')        
                ];
            }

            else if($request->number_allowance == '2'){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'slipCode' => $request->slip_type_allowance,
                    'slipName' => $request->slip_name_allowance,
                    'fontSize' => (int) $request->font_size_allowance,
                    'formatNumber' => $request->number_format_allowance,
                    'allowance2Label' => $request->field_label_allowance,
                    'allowance2Field' => $request->field_name_allowance,
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    "languageCode" => App::getLocale(),
                    'sessionID' => 0, 
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName')        
                ];
                // var_dump($param);
            }

            // $param = [
            //     'companyCode' => Session::get('companyCode'),
            //     'slipCode' => $request->slip_type_allowance,
            //     'slipName' => $request->slip_name_allowance,
            //     'fontSize' => (int) $request->font_size_allowance,
            //     'formatNumber' => $request->number_format_allowance,
            //     'allowance1Label' => $request->field_label_allowance,
            //     'allowance2Label' => $request->allowance2,
            //     'allowance3Label' => $request->allowance3,
            //     'allowance4Label' => $request->allowance4,
            //     'allowance5Label' => $request->allowance5,
            //     'allowance6Label' => $request->allowance6,
            //     'allowance7Label' => $request->allowance7,
            //     'allowance8Label' => $request->allowance8,
            //     'allowance9Label' => $request->allowance9,
            //     'allowance10Label' => $request->allowance10,
            //     'allowance1Field' => $request->allowance1,
            //     'allowance2Field' => $request->allowance2,
            //     'allowance3Field' => $request->allowance3,
            //     'allowance4Field' => $request->allowance4,
            //     'allowance5Field' => $request->allowance5,
            //     'allowance6Field' => $request->allowance6,
            //     'allowance7Field' => $request->allowance7,
            //     'allowance8Field' => $request->allowance8,
            //     'allowance9Field' => $request->allowance9,
            //     'allowance10Field' => $request->allowance10,
            //     'deduction1Label' => $request->deduction1,
            //     'deduction2Label' => $request->deduction2,
            //     'deduction3Label' => $request->deduction3,
            //     'deduction4Label' => $request->deduction4,
            //     'deduction5Label' => $request->deduction5,
            //     'deduction6Label' => $request->deduction6,
            //     'deduction7Label' => $request->deduction7,
            //     'deduction8Label' => $request->deduction8,
            //     'deduction9Label' => $request->deduction9,
            //     'deduction10Label' => $request->deduction10,
            //     'deduction1Field' => $request->deduction1,
            //     'deduction2Field' => $request->deduction2,
            //     'deduction3Field' => $request->deduction3,
            //     'deduction4Field' => $request->deduction4,
            //     'deduction5Field' => $request->deduction5,
            //     'deduction6Field' => $request->deduction6,
            //     'deduction7Field' => $request->deduction7,
            //     'deduction8Field' => $request->deduction8,
            //     'deduction9Field' => $request->deduction9,
            //     'deduction10Field' => $request->deduction10,
            //     "changedNo" => 0,
            //     "createdDate" => date("Y-m-d\TH:i:s"),
            //     "createdBy" => Session::get('userID'),
            //     "changedDate" => date("Y-m-d\TH:i:s"),
            //     "changedBy" => Session::get('userID'),
            //     "languageCode" => App::getLocale(),
            //     'sessionID' => 0, 
            //     'sessionUserID' => Session::get('userID'),
            //     'logActionUserID' => Session::get('userID'),
            //     'logActionUsername' => Session::get('userName')        
            // ];

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/prslipformat/insertslipformat',
                    ['body' => json_encode($param)]
                );
            }
            else{
                $response = $client->post(env('API_URL') . '/prslipformat/updateslipformat',
                    ['body' => json_encode($param)]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSalaryCalculationProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/salarycalculation/updatesalarycalculation',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNoFrom" => $request->employee_no_from,
                        "employeeNoTo" => $request->employee_no_to,
                        "periodMonth" => $request->process_period_month_hidden,
                        "periodYear" => $request->process_period_year_hidden,
                        "loanPaymentProcess" => isset($request->loan_payment_process) ? (bool) $request->loan_payment_process : false,
                        "retroactiveProcess" => isset($request->retroactive_process) ? (bool) $request->retroactive_process : false,
                        "retroactive" => $request->retroactive,
                        "includeProbationPerod" => isset($request->include_probation_period) ? (bool) $request->include_probation_period : false,
                        "includeJamsostekRetroactive" => isset($request->include_jamsostek_retroactive) ? (bool) $request->include_jamsostek_retroactive : false,
                        "range" => isset($request->range) ? (bool) $request->range : false,
                        "languageCode" => App::getLocale(),
                        "changedBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID'),
                        "logActionUserID" => Session::get('userName') 
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesAbsenteeismOvertimeCalculationProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/absenteeismcalculationprocess/inserttmfixedcomponent',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "periodMonth" => $request->process_period_month_hidden,
                        "periodYear" => $request->process_period_year,
                        "employeeNoFrom" => $request->employee_no_from,
                        "employeeNoTo" => $request->employee_no_to,
                        "range" => isset($request->range_employee_no) ? (bool) $request->range_employee_no : false,
                        "languageCode" => App::getLocale(),
                        "changedBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID'),
                        "logActionUsername" => Session::get('userID'),
                        "logActionUserID" => Session::get('userName') 
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function checkNumberReportFormatPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->reportCode)){
                $response = $client->post(env('API_URL') . $request->url,
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'reportCode' => $request->reportCode,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }else{
                $response = $client->post(env('API_URL') . $request->url,
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // var_dump($arrResult->dataListSet[0]->{$request->pemasterType});

        if($arrResult->dataListSet[0]->{$request->pemasterType} == null){
            $number = 1;
        }else{
            // $dataLevel[] = $request->{'level' . ($i+1)};
            if(isset($arrResult->dataListSet[0]->{$request->pemasterType}[0]->columnNo)){
                $number = max(array_column($arrResult->dataListSet[0]->{$request->pemasterType}, 'columnNo')) + 1;
            }else if(isset($arrResult->dataListSet[0]->{$request->pemasterType}[0]->seqNo)){
                $number = max(array_column($arrResult->dataListSet[0]->{$request->pemasterType}, 'seqNo')) + 1;
            }
        }

        return response()->json($number);

    }

    public function checkNumberPayrollCalculationPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->fieldName)){
                $response = $client->post(env('API_URL') . $request->url,
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'fieldName' => $request->fieldName,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }else{
                $response = $client->post(env('API_URL') . $request->url,
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $number = 1;
        }else{
            if(isset($arrResult->dataListSet[0]->seqProcess)){
                $number = max(array_column($arrResult->dataListSet, 'seqProcess')) + 1;
            }else if(isset($arrResult->dataListSet[0]->seqNo)){
                $number = max(array_column($arrResult->dataListSet, 'seqNo')) + 1;
            }
        }

        return response()->json($number);
    }

    public function checkNumberLoanNoPY(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->loanNo)){
                $response = $client->post(env('API_URL') . $request->url,
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->loanNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }else{
                $response = $client->post(env('API_URL') . $request->url,
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName')
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            $number = 1;
        }else{
            if(isset($arrResult->dataListSet[0]->loanNo)){
                $number = max(array_column($arrResult->dataListSet, 'loanNo')) + 1;
            }
        }

        return response()->json($number);
    }

    public function printSeveranceReportPayroll(Request $request){
        try{
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                'reportType' => isset($request->report_type)
            ];
    
            if(!empty($request->payment_date_from) || !empty($request->payment_date_to)){
                $param['paymentDateFrom'] = $request->payment_date_from;
                $param['paymentDateTo'] = $request->payment_date_to;
            }
    
            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }
    
            if(!empty($request->group_authorized_from) || !empty($request->group_authorized_to)){
                $param['groupAuthorizedFrom'] = $request->group_authorized_from;
                $param['groupAuthorizedTo'] = $request->group_authorized_to;
            }
    
            $reponse = $client->post(env('API_URL').'/PrPensionSeverance/gePrensionSeverance',[
                'body' => json_encode($param)
            ]);
        } catch (RequestException $e){
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }
    }

    public function printJournalReportPayroll(Request $request){
        try{
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'journalPeriod' => $request->journal_period,
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($request->group_authorized_from) || !empty($request->group_authorized_to)){
                $param['groupAuthorizeFrom'] = $request->group_authorized_from;
                $param['groupAuthorizeTo'] = $request->group_authorized_to;
            }
            var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/PrJournalReport/JournalReport', [
                'body' => json_encode($param)
            ]);
        }catch (RequestException $e){
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return view('personel.personel_export_employee_skill_report', [
                'data' => []
            ]);
        }else{
            return view('personel.personel_export_employee_skill_report', [
                'data' => $arrResult->dataListSet
            ]); 
        }
    }
}