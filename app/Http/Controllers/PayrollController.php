<?php

namespace App\Http\Controllers;
// ini_set('memory_limit', '4096M');

use App\Imports\PayrollDataImport;
use App\Imports\PayrollBonusTHRDataImport;
use App\Exports\TemplatePayrollDataTemplateSheet;
use App\Exports\TemplatePayrollDataBonusTHRTemplateSheet;
use App\Exports\SeveranceReportExcel;
use App\Exports\JournalReportExcel;
use App\Exports\MonthlyJamsostekReportExport;
use App\Exports\DUMTKReportExport;
use App\Exports\SalaryHistoricalReportExport;
use App\Exports\CSVESPTReportFormExport;
use App\Exports\RetroactiveReportExport;
use App\Exports\PeriodicalReportExport;
use App\Exports\BonusTHRReportExport;
use App\Exports\AnnualReportExcel;
use App\Exports\LoanReportExport;
use App\Exports\ExportDataKepesertaanBPJSReportExport;
use App\Exports\ExportSIPPOnlineFile1Export;
use App\Exports\ExportSIPPOnlineFile2Export;
use App\Exports\ExportSIPPOnlineFile3Export;
use App\Exports\ExportSIPPOnlineFile4Export;
use App\Exports\CSVTransferBankMCMExport;
use App\Exports\CSVTransferBankBOTExport;
use App\Exports\CSVTransferBankBTPNExport;
use App\Exports\CSVTransferBankINAExport;
use App\Exports\ExcelTransferBankCIMBExport;
use App\Exports\EBupotPeriodicalTemplateExport;
use App\Exports\EBupotA1TemplateExport;
use App\Exports\PensionFundReportExport;
use App\Exports\CBIReportExport;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;


use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use File;
use DataTables;
use Excel;
use PDF;
use Zip;
use ZipArchive;
use PhpParser\Node\NullableType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PayrollController extends Controller
{
    public function pagePayroll(Request $request) 
    {
        try {
	    	$client = new Client([
                'verify' => false,
	    		'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ],
	    	]);

	    	$response = $client->post(env('API_URL') . '/personel/MenuMasterWebDetail/getMenuMasterWebDetail',
	    		['body' => json_encode(
	    			[
	    				'companyCode' => Session::get('companyCode'),
                        'groupAccessID' => Session::get('groupAccessID'),
                        'moduleID' => $request->moduleID,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
	    			]
	    		)]
	    	);

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

        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return view ('payroll.py_main', ['dataMenu' => [], 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess([], null)]);
        }else{
            return view ('payroll.py_main', ['dataMenu' => $arrResult->dataListSet, 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($arrResult->dataListSet, null)]);
        }
        
        // return view ('payroll.py_main');
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                return redirect()->back()->withErrors(['msg' => 'There is no TM Reference Data']);
            }else{
                $data = $arrResult_tm->dataListSet;
            }

            if($arrResult_tm->dataListSet[0]->statusProcess > '0' && Session::get('accessReference') != "true"){
                return redirect()->route('payroll', ['moduleID' => 'PY'])->withErrors(['msg' => 'Invalid Status Process']);
            } else {
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_cpy = $client->post(env('API_URL') . '/personel/Company/getcompany',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
	    				'recordStatus' => 'A'
                    ]
                )]
            );

            $response_pr = $client->post(env('API_URL') . '/payroll/getReferencePR',
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

        // dd($arrResult_pr->dataListSet);

        return view('payroll.py_reference_payroll', ['data_tm' => $arrResult_tm->dataListSet, 'data_cpy' => $arrResult_cpy->dataListSet, 'data_pr' => $arrResult_pr->dataListSet]);
    }

    public function pageYearEndProcess () {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

    public function pageMonthlySystemClosing()
    {
        return view ('payroll.py_monthly_system_closing');
    }

    public function pagePeriodicalUpdateProcess()
    {
        return view ('payroll.py_monthly_periodical_update_process');
    }

    public function pageTransferDataToBank()
    {
        return view ('payroll.py_transfer_data_to_bank_menu');
    }

    public function pageTransferDataToBankExportToFile()
    {
        return view ('payroll.py_transfer_data_to_bank_export_to_file');
    }

    public function pageFinalTaxProcess() 
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

    public function pagePaymentSlip()
    {
        return view('payroll.py_payment_slip');
    }

    public function pageJournalReport()
    {
        return view('payroll.py_journal_report');
    }

    public function pageExportSIPPOnline()
    {
        return view('payroll.py_export_sipp_online');
    }

    public function pageJournalProcess()
    {
        return view('payroll.py_journal_process');
    }

    public function pageMonthlyJamsostekReport(){
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view ('payroll.py_monthly_jamsostek_report', ['data' => $data]);
    }

    public function pagePensionFundReport(){
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view ('payroll.py_pension_fund_report', ['data' => $data]);
    }

    public function pageCBIReport(){
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view ('payroll.py_cbi_report', ['data' => $data]);
    }
     
    public function pageSalaryCalculationProcess()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

    public function pageMonthlyProcess()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        return view ('payroll.py_monthly_process', ['data' => $data]);
    }

    public function pageDUMTK() 
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        return view ('payroll.py_dumtk', ['data' => $data]);
    }

    public function pageSalaryHistoricalReport() 
    {
        return view ('payroll.py_salary_historical_report');
    }

    public function pageCSVESPTReportForm() 
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        return view ('payroll.py_csv_espt_report_form', ['data' => $data]);
    }

    public function pageBonusTHRReport()
    {
        return view('payroll.py_bonus_thr_report');
    }

    public function pagePeriodicalReport()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        return view('payroll.py_periodical_report', ['data' => $data, 'companyCode' => Session::get('companyCode')]);
    }

    public function pageSignatureListReport()
    {
        return view('payroll.py_signature_list');
    }

    public function pageRetroactiveReport()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        return view('payroll.py_retroactive_report', ['data' => $data]);
    }

    public function pageExportDataKepesertaanBPJSTKReport()
    {
        return view('payroll.py_export_data_kepesertaan_bpjs_tk');
    }

    public function pageAnnualReport()
    {
        return view('payroll.py_annual_report');
    }

    public function pageLoanReport()
    {
        return view('payroll.py_loan_report');
    }

    public function pageSPTReport()
    {
        return view('payroll.py_spt_report');
    }

    public function pageSPTPPHReport()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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

        return view('payroll.py_spt_pph_report', ['data' => $data]);
    }

    public function tableAccountPY()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getgmAccount',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                $response = $client->post(env('API_URL') . '/payroll/getPrSalaryMaster',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'groupAuthorizeCode' => Session::get('groupAuthorizePayroll'),
                            "periodMonth" => (int) $arrResult_tm->dataListSet[0]->periodMonth,
                            "periodYear" => (int) $arrResult_tm->dataListSet[0]->periodYear
                        ]
                    )]
                );
            }
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrPensionSeverance',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                $response = $client->post(env('API_URL') . '/payroll/getPrTariffMaster',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'groupAuthorizeCode' => Session::get('groupAuthorizePayroll'),
                            "periodMonth" => (int) $arrResult_tm->dataListSet[0]->periodMonth,
                            "periodYear" => (int) $arrResult_tm->dataListSet[0]->periodYear
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableTariffMasterDetailPY(Request $request) {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrTariffMaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'groupAuthorizeCode' => Session::get('groupAuthorizePayroll'),
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrYearly',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getLoanMaster',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrLoanPayment',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrPayment',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrMultiCost',
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

    public function tableReportFormatPY()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getReportFormatList',
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

    public function tableTHRFormulaPY(Request $request) {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        "variable" => "Religion_",
                        "languageCode" => strtoupper(App::getLocale()),
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/payroll/getPrFormulaTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/payroll/getFormulaBonus',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getListBonus',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrCalculationProcess',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode')
                    ]
                )]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
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

    public function tableSalaryComponentFormPY()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getSalaryComponentData',
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

    public function tablePayrollCalculationDetailPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->religionCode);

            $response = $client->post(env('API_URL') . '/payroll/getPrCalculationDetail',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getJournalTemplate',
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

    public function dataDetailSalaryMasterPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                return redirect()->back()->withErrors(['msg' => 'There is no TM Reference Data']);
            }else{
                $response = $client->post(env('API_URL') . '/payroll/getPrSalaryMaster',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'statusPeriod' => $request->statusPeriod,
                            'groupAuthorizeCode' => Session::get('groupAuthorizePayroll'),
                            "periodMonth" => (int) $arrResult_tm->dataListSet[0]->periodMonth,
                            "periodYear" => (int) $arrResult_tm->dataListSet[0]->periodYear,
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

        // dd($data);

        return view('payroll.py_salary_master_detail', ['data' => $data]);
    }

    public function dataDetailSeveranceDataEntryPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrPensionSeverance',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrTariffMaster',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'statusPeriod' => $request->statusPeriod,
                        'groupAuthorizeCode' => Session::get('groupAuthorizePayroll'),
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrYearly',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func == 'new') {
                $response = $client->post(env('API_URL') . '/payroll/getPrBonusTHR',
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
                $response = $client->post(env('API_URL') . '/payroll/getPrBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func == 'new') {
                $response = $client->post(env('API_URL') . '/payroll/getPrBonusTHR',
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
                $response = $client->post(env('API_URL') . '/payroll/getPrBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getLoanMaster',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrLoanPayment',
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

            $response2 = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getEmployeeDetail',
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

            $response2 = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getLoanEmployee',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ComGen/getComGen',
                ['body' => json_encode(
                    [
                        // 'companyCode' => Session::get('companyCode'),
                        'variable' => 'Religion_',
                        'comGenCode' => $request->religionCode,
                        'languageCode' => strtoupper(App::getLocale()),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_table = $client->post(env('API_URL') . '/payroll/getPrFormulaTHR',
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        if($arrResult2->dataListSet == null){
            $data_table = [];
        }else{
            $data_table = $arrResult->dataListSet;
        }

        return view('payroll.py_thr_formula_detail', ['data' => $data, 'data_table' => $data_table]);
    }

    public function dataDetailBonusFormulaPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->func === 'new') {
                $response = $client->post(env('API_URL') . '/payroll/getFormulaBonus',
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
                $response = $client->post(env('API_URL') . '/payroll/getFormulaBonus',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getgmAccount',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrMultiCost',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'periodYear' => (int) $request->year,
                        'periodMonth' => (int) $request->month,
                        'statusPeriod' => (int) $request->period,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );

            $response_det = $client->post(env('API_URL') . '/payroll/getPrMultiCostDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'periodYear' => (int) $request->year,
                        'periodMonth' => (int) $request->month,
                        'statusPeriod' => (int) $request->period,
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
        $arrResult_det = json_decode($response_det->getBody()->getContents());

        return view('payroll.py_multi_cost_center_detail', ['data' => $arrResult->dataListSet, 'data_det' => $arrResult_det->dataListSet, 'func' => $request->func]);
    }

    public function dataReportFormatPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getReportFormatList',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'reportCode' => $request->reportCode,
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

        return view('payroll.py_report_format_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailSalaryComponentDataPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // dd(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //         'fieldName' => $request->fieldName,
            //         'sessionUserID' => Session::get('userID'),
            //         'logActionUserID' => Session::get('userID'),
            //         'logActionUsername' => Session::get('userName')
            //     ]
            //     ));

            $response = $client->post(env('API_URL') . '/payroll/getSalaryComponentData',
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
            // dd($response);
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
                'verify' => false,
            'headers' => [ 'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . Session::get('token') ]
        ]);

        // var_dump($request->reportCode);

        $response = $client->post(env('API_URL') . '/payroll/getReportFormatList',
            ['body' => json_encode(
                [
                    'companyCode' => Session::get('companyCode'),
                    'reportCode' => $request->reportCode,
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

    // usort($arrResult->dataListSet[0]->detail, function ($a, $b) {
    //     return (int) $a->columnNo - (int) $b->columnNo;
    // });

    // dd($arrResult->dataListSet);
    
    if($arrResult->dataListSet !== null){
        $data = array_map(function($item) {
            $itemClone = clone $item;
            $itemClone->detail = array_filter($itemClone->detail, function($detailItem) {
                return isset($detailItem->fieldFormula) && ($detailItem->fieldFormula === '' || is_null($detailItem->fieldFormula));
            });
            return $itemClone;
        }, $arrResult->dataListSet);
    
        $dataFormula = array_map(function($item) {
            $itemClone = clone $item;
            $itemClone->detail = array_filter($itemClone->detail, function($detailItem) {
                return isset($detailItem->fieldFormula) && ($detailItem->fieldFormula !== '' && !is_null($detailItem->fieldFormula));
            });
            return $itemClone;
        }, $arrResult->dataListSet);
    
        $data = array_map(function ($item) {
            $item->detail = array_values($item->detail);
            return $item;
        }, $data);
    
        $dataFormula = array_map(function ($item) {
            $item->detail = array_values($item->detail);
            return $item;
        }, $dataFormula);
    }else{
        $data = [];
        $dataFormula = [];
    }

    return view('payroll.py_report_format_detail', ['data' => $data, 'dataFormula' => $dataFormula, 'func' => $request->func]);
}

    public function dataDetailJournalTemplatePY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getJournalTemplate',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getPrCalculationProcess',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'fieldName' => $request->fieldName,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );

            $response_table = $client->post(env('API_URL') . '/payroll/getPrCalculationDetail',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/getSlipFormat',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        "slipCode" => $request->slipCode,
                        "type" => $request->columnType,
                        'languageCode' => App::getLocale(),
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
        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return response()->json([]);
        }else{
            usort($arrResult->dataListSet, function ($a, $b) {
                return (int) $a->seqNo - (int) $b->seqNo;
            });
        
            return response()->json($arrResult->dataListSet);
        }
    }

    public function dataDetailTransferDataToBankPY(Request $request)
    {
        return view('payroll.py_transfer_data_to_bank_form', ['bankType' => $request->bankType]);
    }

    public function prosesSalaryMasterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
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

            $response = $client->put(env('API_URL') . '/payroll/updatePrSalaryMaster',
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
                'verify' => false,
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
                'grouping1' => $request->grouping_one,
                'grouping2' => $request->grouping_two,
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
                $response = $client->post(env('API_URL') . '/payroll/InsertgmAccount',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/payroll/updategmAccount',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $data_detail = [];

            if (isset($request->column_no)) {
                foreach ($request->column_no as $key => $value) {
                    $data_detail[] = [
                        'companyCode' => Session::get('companyCode'),
                        "reportCode" => $request->report_code,
                        "columnNo" => (int) $value,
                        "tableName" => (isset($request->table_name_detail[$key]) && ($request->table_name_detail[$key] !== '' && $request->table_name_detail[$key] !== 'null' && !is_null($request->table_name_detail[$key]))) ? $request->table_name_detail[$key] : '',
                        "fieldName" => (isset($request->field_name_detail[$key]) && ($request->field_name_detail[$key] !== '' && $request->field_name_detail[$key] !== 'null' && !is_null($request->field_name_detail[$key]))) ? $request->field_name_detail[$key] : '',
                        "columnHeader" => $request->column_header[$key],
                        "alignment" => (int) $request->alignment[$key],
                        "dataFormat" => $request->data_format[$key],
                        "isDisplayed" => ($request->display[$key] === "true") ? true : false,
                        // "fieldFormula" => (isset($request->field_formula[$key]) && ($request->field_formula[$key] !== '' && $request->field_formula[$key] !== 'null' && !is_null($request->field_formula[$key]))) ? $request->field_formula[$key] : '',
                        "fieldFormula" => "",
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID')
                    ];
                }
            }

            if (isset($request->column_no_formula)) {
                foreach ($request->column_no_formula as $key => $value) {
                    $data_detail[] = [
                        'companyCode' => Session::get('companyCode'),
                        "reportCode" => $request->report_code,
                        "columnNo" => (int) $value,
                        // "tableName" => (isset($request->table_name_formula[$key]) && ($request->table_name_formula[$key] !== '' && $request->table_name_formula[$key] !== 'null' && !is_null($request->table_name_formula[$key])) && !isset($request->field_formula_formula[$key]) && ($request->field_formula_formula[$key] === '' && $request->field_formula_formula[$key] === 'null' && is_null($request->field_formula_formula[$key]))) ? $request->table_name_formula[$key] : '',
                        // "fieldName" => (isset($request->field_name_formula[$key]) && ($request->field_name_formula[$key] !== '' && $request->field_name_formula[$key] !== 'null' && !is_null($request->field_name_formula[$key])) && !isset($request->field_formula_formula[$key]) && ($request->field_formula_formula[$key] === '' && $request->field_formula_formula[$key] === 'null' && is_null($request->field_formula_formula[$key]))) ? $request->field_name_formula[$key] : '',
                        "tableName" => "",
                        "fieldName" => "",
                        "columnHeader" => $request->column_header_formula[$key],
                        "alignment" => (int) $request->alignment_formula[$key],
                        "dataFormat" => $request->data_format_formula[$key],
                        "isDisplayed" => ($request->display_formula[$key] === "true") ? true : false,
                        "fieldFormula" => (isset($request->field_formula_formula[$key]) && ($request->field_formula_formula[$key] !== '' && $request->field_formula_formula[$key] !== 'null' && !is_null($request->field_formula_formula[$key]))) ? $request->field_formula_formula[$key] : '',
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID')
                    ];
                }
            }
            
            if (isset($request->seq_no)) {
                foreach ($request->seq_no as $key => $value1) {
                    $data_condition[] = [
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
                }
            }
            else {
                $data_condition = [];
            }

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

            // dd(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/InsertReportFormat',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/payroll/UpdateReportFormat',
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

    public function prosesSeveranceDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'),
            //         "employeeNo" => $request->employee_no,
            //         "employeeName" => $request->employee_name,
            //         "paymentDate" => date("Y-m-d", strtotime($request->payment_date)),
            //         "resignDate" => date("Y-m-d", strtotime($request->resign_date)),
            //         "paymentFor" => $request->payment_for,
            //         "amount" => (float) $request->amount,
            //         "adjustment" => (float) $request->adjustment,
            //         "totalAmount" => (float) $request->total_amount,
            //         "changedNo" => 0,
            //         "changedBy" => Session::get('userID'),
            //         "changedDate" => date("Y-m-d\TH:i:s"),
            //         "createdBy" => Session::get('userID'),
            //         "createdDate" => date("Y-m-d\TH:i:s"),
            //         "languageCode" => App::getLocale(),
            //         "sessionID" => 0,
            //         "sessionUserID" => Session::get('userID'),
            //         "logActionUserID" => Session::get('userID'),
            //         "logActionUsername" => Session::get('userID')
            //     ]
            //     ));

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/payroll/insertPrPensionSeverance',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no,
                            "employeeName" => $request->employee_name,
                            "paymentDate" => date("Y-m-d", strtotime($request->payment_date)),
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
                $response = $client->put(env('API_URL') . '/payroll/UpdatePrPensionSeverance',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            "employeeNo" => $request->employee_no_hidden,
                            "employeeName" => $request->employee_name,
                            "paymentDate" => date("Y-m-d", strtotime($request->payment_date)),
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if (isset($request->cost_center)) {
                foreach ($request->cost_center as $key => $value) {
                    $data_detail [] = [
                        'companyCode' => Session::get('companyCode'),
                        "employeeNo" => $request->employee_no_det,
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
            }
            else {
                $data_detail = null;
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                'employeeNo' => $request->employee_no_det,
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

            // var_dump(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/InsertPrMultiCost',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/payroll/UpdatePrMultiCost',
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesTariffMasterPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
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

            $response = $client->put(env('API_URL') . '/payroll/updatePrTariffMaster',
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
                'verify' => false,
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

            // var_dump(json_encode($param));

            $response = $client->put(env('API_URL') . '/payroll/updatePrYearly',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/payroll/insertPrFormulaTHR',
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
                $response = $client->put(env('API_URL') . '/payroll/UpdatePrFormulaTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/payroll/insertFormulaBonus',
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
                $response = $client->put(env('API_URL') . '/payroll/updateFormulaBonus',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function == 'New') {
                $response = $client->post(env('API_URL') . '/payroll/InsertPrBonusTHR',
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

                $response = $client->put(env('API_URL') . '/payroll/UpdatePrBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/ProcessBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/ProcessBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/payroll/insertLoanMaster',
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
                $response = $client->put(env('API_URL') . '/payroll/updateLoanMaster',
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
                'verify' => false,
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

                $response = $client->post(env('API_URL') . '/payroll/insertLoanEmployee',
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

                $response = $client->put(env('API_URL') . '/payroll/updateLoanEmployee',
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
                'verify' => false,
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

                $response = $client->post(env('API_URL') . '/payroll/InsertPrLoanPayment',
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

                // var_dump(json_encode(
                //     [
                //         'companyCode' => Session::get('companyCode'),
                //         "employeeNo" => $request->employee_no_hidden,
                //         "employeeName" => $request->employee_name,
                //         "loanNo" => (int) $request->loan_no,
                //         "auditLoanSeqNo" => (int) $request->paid_loan_seq,
                //         "paymentFlag" => $request->payment_method,
                //         "ratePerYear" => (float) $request->rate_per_year,
                //         "noOfInstallmentNotYetPaid" => (int) $request->no_of_installment_not_yet_paid,
                //         "currencyCode" => $request->currency_code,
                //         "periodYear" => (int) $request->period_year,
                //         "periodMonth" => (int) $request->period_month,
                //         "statusPeriod" => $request->status_period,
                //         "principalAmount" => (float) $request->principal_amount_installment,
                //         "interestAmount" => (float) $request->interest_amount_per_installment,
                //         "outstandingAmount" => (float) $request->outstanding_amount,
                //         "totalNotYetPaid" => (float) $request->total_not_yet_paid,
                //         "paymentAmount" => (float) $request->payment_amount,
                //         "paymentOtherCost" => (float) $request->other_cost,
                //         "totalPayment" => (float) $request->total_payment,
                //         "newOutstandingPaymentAmount" => (float) $request->new_outstanding_amount,
                //         "newRatePerYear" => (float) $request->new_rate_per_year,
                //         "newNoOfInstallmentNotYetPaid" => (int) $request->new_no_of_installment_not_yet_paid,
                //         "employeeDetail" => $paramDetail,
                //         "changeNo" => 0,
                //         "changeBy" => Session::get('userID'),
                //         "changeDate" => date("Y-m-d\TH:i:s"),
                //         "createBy" => Session::get('userID'),
                //         "createDate" => date("Y-m-d\TH:i:s"),
                //         "languageCode" => App::getLocale(),
                //         "sessionID" => 0,
                //         "sessionUserID" => Session::get('userID'),
                //         "logActionUserID" => Session::get('userID'),
                //         "logActionUsername" => Session::get('userID')
                //     ]
                //     ));

                $response = $client->put(env('API_URL') . '/payroll/UpdatePrLoanPayment',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
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
                    }
                }
                else {
                    $data_detail = null;
                }

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
                    }
                }
                else {
                    $data_detail = null;
                }

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
            }

            // dd(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/insertPrCalculationProcess',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/payroll/updatePrCalculationProcess',
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

    public function prosesJournalTemplatePY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
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
                    'grouping1' => $request->grouping_one,
                    'grouping2' => $request->grouping_two,
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
                    'grouping1' => $request->grouping1,
                    'grouping2' => $request->grouping2,
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
                $response = $client->post(env('API_URL') . '/payroll/InsertPrJournalTemplate',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/payroll/UpdatePrJournalTemplate',
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

    public function prosesTransferDataPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $levelMaster = null;
            $dataLevel = [];

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            if(!empty($dataLevel) && !is_null($dataLevel[0])){
                foreach($dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($dataLevel[$key] as $value2){
                        $data_level_detail[] = [
                            'levelCode' => $value2
                        ];
                    }
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($key + 1),
                        "level" => $data_level_detail
                    ];
                }
                $levelMaster = $data_level;
            }

            $response = $client->post(env('API_URL') . '/payroll/TransferAmountProcess',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'outputFile' => $request->output_file,
                        'sourceBank' => $request->source_bank,
                        'accountNo' => $request->account_number,
                        'transferDate' => $request->transfer_date,
                        'transferCode' => $request->transfer_code,
                        'transferType' => (empty($request->transfer_type) ? "" : $request->transfer_type),
                        'businessType' => (empty($request->business_type) ? "" : $request->business_type),
                        'effectiveTime' => (empty($request->effective_time) ? "" : $request->effective_time),
                        'employeeNoFrom' => $request->employee_no_from,
                        'employeeNoTo' => $request->employee_no_to,
                        'groupAuthorizeCodeFrom' => $request->group_authorized_code_from,
                        'groupAuthorizeCodeTo' => $request->group_authorized_code_to,
                        'levelMaster' => $levelMaster,
                        'transferAmount' => ($request->data_to_transfer == 'transfer_amount') ? true : false,
                        'takeHomePayGroup' => ($request->data_to_transfer == 'take_homepay_group') ? true : false,
                        'salary' => isset($request->check_transfer_amount_salary) ? (bool) $request->check_transfer_amount_salary : false,
                        'bonus' => isset($request->check_transfer_amount_bonus) ? (bool) $request->check_transfer_amount_bonus : false,
                        'thr' => isset($request->check_transfer_amount_thr) ? (bool) $request->check_transfer_amount_thr : false,
                        'pension' => isset($request->check_transfer_amount_pension) ? (bool) $request->check_transfer_amount_pension : false,
                        'severance' => isset($request->check_transfer_amount_severance) ? (bool) $request->check_transfer_amount_severance : false,
                        'one' => ($request->take_homepay_group == "one") ? true : false,
                        'two' => ($request->take_homepay_group == "two") ? true : false,
                        'three' => ($request->take_homepay_group == "three") ? true : false,
                        'none' => ($request->take_homepay_group == "none") ? true : false,
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
                    ])
                ]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // dd($response);
            // exit;
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // dd($arrResult->dataListSet);
        // exit;

        if($arrResult->dataListSet != null){
            if($request->source_bank == 'BCA' || $request->source_bank == 'JAGO'){
                $fullPath = storage_path('app/');
                array_map('unlink', glob( "$fullPath*.txt"));
                $namaFile = $arrResult->dataListSet[0]->namaFile;
                if(!str_contains($arrResult->dataListSet[0]->namaFile, '.txt')){
                    $namaFile = $arrResult->dataListSet[0]->namaFile . '.txt';
                }
                Storage::put($namaFile, $arrResult->dataListSet[0]->transferBank);

                return Storage::download($namaFile);
            }else if($request->source_bank == 'MCM'){
                return Excel::download(new CSVTransferBankMCMExport($arrResult->dataListSet[0]->transferBank), $arrResult->dataListSet[0]->namaFile);
            }else if($request->source_bank == 'BOT'){
                return Excel::download(new CSVTransferBankBOTExport($arrResult->dataListSet[0]->transferBank), $arrResult->dataListSet[0]->namaFile);
            }else if(str_contains($request->source_bank, 'BTPN')){
                if($request->output_file == 'txt'){
                    $fullPath = storage_path('app/');
                    array_map('unlink', glob( "$fullPath*.txt"));
                    $namaFile = $arrResult->dataListSet[0]->namaFile;
                    if(!str_contains($arrResult->dataListSet[0]->namaFile, '.txt')){
                        $namaFile = $arrResult->dataListSet[0]->namaFile . '.txt';
                    }
                    Storage::put($namaFile, $arrResult->dataListSet[0]->transferBank);

                    return Storage::download($namaFile);
                }else if($request->output_file == 'csv'){
                    $array = explode("\r\n", $arrResult->dataListSet[0]->transferBank);
                    foreach($array as $key => $value){
                        $arrayTwo = explode(",", $value);
                        if(count($arrayTwo) > 1){
                            $array[$key] = $arrayTwo;
                        }
                    }
    
                    $array = array_filter($array, function($value) {
                        return !empty($value);
                    });
    
                    $csvHeader = $array[0];
    
                    $tempFile = fopen('php://temp', 'w+');
    
                    foreach ($array as $row) {
                        $row = array_pad($row, count($csvHeader), '');
    
                        fputcsv($tempFile, $row);
                    }
    
                    rewind($tempFile);
                    $csvContent = str_replace('"', '', stream_get_contents($tempFile));
                    
                    fclose($tempFile);
    
                    return Response::make($csvContent, 200, [
                        'Content-Type' => 'text/csv',
                        'Content-Disposition' => 'attachment; filename="' . $arrResult->dataListSet[0]->namaFile . '"',
                    ]);

                    // return Excel::download(new CSVTransferBankBTPNExport($arrResult->dataListSet[0]->transferBank), $arrResult->dataListSet[0]->namaFile);
                }
            }else if($request->source_bank == 'BANK INA' || $request->source_bank == 'BANK INA MULTI ACCOUNT'){
                return Excel::download(new CSVTransferBankINAExport($arrResult->dataListSet[0]->transferBank), $arrResult->dataListSet[0]->namaFile);
            }else if($request->source_bank == 'BNI'){
                return Excel::download(new CSVTransferBankBNIExport($arrResult->dataListSet[0]->transferBank), $arrResult->dataListSet[0]->namaFile);
            }else if($request->source_bank == 'CIMB'){
                $array = explode("\r\n", $arrResult->dataListSet[0]->transferBank);
                foreach($array as $key => $value){
                    $arrayTwo = explode(";", $value);
                    if(count($arrayTwo) > 1){
                        $array[$key] = $arrayTwo;
                    }
                }

                $array = array_filter($array, function($value) {
                    return !empty($value);
                });

                return Excel::download(new ExcelTransferBankCIMBExport($array), $arrResult->dataListSet[0]->namaFile);
            }else if($request->source_bank == 'PERMATA'){
                if($request->output_file == 'csv'){
                    $array = explode("\r\n", $arrResult->dataListSet[0]->transferBank);
                    foreach($array as $key => $value){
                        $arrayTwo = explode(",", $value);
                        if(count($arrayTwo) > 1){
                            $array[$key] = $arrayTwo;
                        }
                    }

                    $array = array_filter($array, function($value) {
                        return !empty($value);
                    });

                    $csvHeader = $array[0];

                    $tempFile = fopen('php://temp', 'w+');

                    foreach ($array as $row) {
                        $row = array_pad($row, count($csvHeader), '');

                        fputcsv($tempFile, $row);
                    }

                    rewind($tempFile);
                    $csvContent = str_replace('"', '', stream_get_contents($tempFile));
                    
                    fclose($tempFile);

                    return Response::make($csvContent, 200, [
                        'Content-Type' => 'text/csv',
                        'Content-Disposition' => 'attachment; filename="' . $arrResult->dataListSet[0]->namaFile . '"',
                    ]);
                }else if($request->output_file == 'xlsx'){
                    $array = explode("\r\n", $arrResult->dataListSet[0]->transferBank);
                    foreach($array as $key => $value){
                        $arrayTwo = explode(",", $value);
                        if(count($arrayTwo) > 1){
                            $array[$key] = $arrayTwo;
                        }
                    }

                    $array = array_filter($array, function($value) {
                        return !empty($value);
                    });

                    return Excel::download(new ExcelTransferBankCIMBExport($array), $arrResult->dataListSet[0]->namaFile);
                }
            }
        }
    }

    public function removeTHRBonusDataEntryPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
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

            $response = $client->delete(env('API_URL') . '/payroll/deletePrBonusTHR',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/payroll/DeletePrPensionSeverance',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/payroll/deletePrFormulaTHR',
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

    public function removeBonusFormulaPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/payroll/deleteFormulaBonus',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/payroll/deletePrCalculationDetail',
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
                'verify' => false,
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

            $response = $client->delete(env('API_URL') . '/payroll/DeleteMultiCost',
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

    public function removeSptFormatPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump((int) $request->column_no_hidden);

            $response = $client->delete(env('API_URL') . '/payroll/DeletePrFormatSPT',
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

    public function removeLoanPaymentPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $param = [];

            foreach($request->data as $value){
                $param[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'loanNo' => $value['loanNo'],
                    'paymentSeq' => $value['paymentSeq'],
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }

            $response = $client->delete(env('API_URL') . '/payroll/deleteprpayment',
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

    public function dataDetailSptFormatPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump((int)$request->columnNo);

            $response = $client->post(env('API_URL') . '/payroll/getPrFormatSPT',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/payroll/updateLoanMaster',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/payroll/updategmAccount',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/payroll/UpdateStatus',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/payroll/updatePrCalculationProcess',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/payroll/UpdatePrJournalTemplate',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'fieldName' => $request->field_name,
                'description' => $request->description,
                'fieldWidth' => (int) $request->field_width,
                'decimalPoint' => (int) $request->decimal_point,
                'sptColumn' => $request->spt_column,
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
                "flagNetCalculation" => isset($request->tax_netto_calculation) ? (bool) $request->tax_netto_calculation : false,
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

            // dd(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/InsertSalaryComponentData',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/payroll/UpdateSalaryComponentData',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                $response = $client->post(env('API_URL') . '/payroll/ProcessComponent',
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
                'verify' => false,
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
                "FlagTaxAllowance" => isset($request->check_tax_allowance_custom_set_up) ? (bool) $request->check_tax_allowance_custom_set_up : false,
                "FlagNetCalculation" => isset($request->check_tax_netto_calculation_custom_set_up) ? (bool) $request->check_tax_netto_calculation_custom_set_up : false,
                "FlagIteratif" => isset($request->check_tax_allowance_custom_set_up) ? filter_var($request->tax_allowance_custom_set_up_detail, FILTER_VALIDATE_BOOLEAN) : false,
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

            // dd(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/InsertRefrencePayroll',
                    ['body' => json_encode($param)]
                );
            }else{
                $response = $client->put(env('API_URL') . '/payroll/UpdateRefrencePayroll',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                $response = $client->post(env('API_URL') . '/payroll/YearEndProcess',
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $groupNPWP = filter_var($request->group_npwp, FILTER_VALIDATE_BOOLEAN);

            $response = $client->post(env('API_URL') . '/payroll/prspt/insertprspt',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "groupNPWP" => $groupNPWP,
                        "groupNPWPCode" => ($groupNPWP) ? $request->npwp : "ALL",
                        "employeeNoFrom" => $request->employee_no_from,
                        "employeeNoTo" => $request->employee_no_to,
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_tm = $client->post(env('API_URL') . '/mobile/ReferenceTM/getReferenceTM',
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
                $response = $client->post(env('API_URL') . '/payroll/FinalTaxProcess',
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
            Excel::import($import, $file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
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
            $import = new PayrollBonusTHRDataImport;
            Excel::import($import, $file->getRealPath(), null, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }

        if(empty($import->getArrResult())){
            $objError = (object) ['status' => false, 'message' => "The Uploaded File Doesn't Match The Template"];
            return array(0 => $objError);
        }else{
            return $import->getArrResult();
        }
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

    public function templateImportDataFromExcelBonusTHRPY(Request $request)
    {
        return Excel::download(new TemplatePayrollDataBonusTHRTemplateSheet(), 'Template Payroll Data Bonus THR.xlsx');
    }

    public function prosesSptFormatPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
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

            // dd(json_encode($param));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/InsertPrFormatSPT',
                    ['body' => json_encode($param)]
                );
            }
            else if($request->record_function == 'Edit'){
                $response = $client->post(env('API_URL') . '/payroll/UpdatePrFormatSPT',
                    ['body' => json_encode($param)]
                );
            }
            else if($request->record_function == 'Remove'){
                $response = $client->delete(env('API_URL') . '/payroll/DeletePrFormatSPT',
                    ['body' => json_encode([$param])]
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSlipFormatPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                if (isset($request->no)) {
                    foreach ($request->no as $key => $value) {
                        $data_detail [] = [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            "slipCode" => $request->slip_code,
                            "type" => $request->column_type,
                            "seqNo" => (int) $value,
                            "columnName" => $request->column_name[$key],
                            "header" => $request->header[$key],
                            "changedNo" => 1,
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
                    }
                }
                else {
                    $data_detail = null;
                }

                $param = [
                    'companyCode' => Session::get('companyCode'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userID')     
                ];
                $param['slipList'] = $data_detail;
            }
            else {
                if (isset($request->no)) {
                    foreach ($request->no as $key => $value) {
                        $data_detail [] = [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            "slipCode" => $request->slip_code,
                            "type" => $request->column_type,
                            "seqNo" => (int) $value,
                            "columnName" => $request->column_name[$key],
                            "header" => $request->header[$key],
                            "changedNo" => 1,
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
                    }
                }
                else {
                    $data_detail = null;
                }

                $param = [
                    'companyCode' => Session::get('companyCode'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "sessionID" => 0,
                    "sessionUserID" => Session::get('userID'),
                    "logActionUserID" => Session::get('userID'),
                    "logActionUsername" => Session::get('userID')     
                ];
                $param['slipList'] = $data_detail;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL') . '/payroll/insertUpdateSlipFormat',
                ['body' => json_encode($param)]
            );
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

    public function prosesSlipFormatCustomPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            // var_dump(Session::get('token'));
            // var_dump($request->slip_type_custom);

            if($request->custom_label == 'custom1'){
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
            } else if($request->custom_label == 'custom2'){
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

            $param2 = [
                'companyCode' => Session::get('companyCode'),
                'slipCode' => $request->slip_type_custom,
                'slipName' => $request->slip_name_custom,
            ];

            if($request->record_function_custom == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/insertUpdateSlipFormat',
                    ['body' => json_encode($param)]
                );
            }
            else{
                $response = $client->post(env('API_URL') . '/payroll/insertUpdateSlipFormat',
                    ['body' => json_encode($param)]
                );
            }

            $response2 = $client->post(env('API_URL') . '/payroll/getSlipFormat',
                ['body' => json_encode($param2)]
            );
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
        $arrResult2 = json_decode($response2->getBody()->getContents());

        if($arrResult2->dataListSet == null){
            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message, 'data' => '']);
        }else{
            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message, 'data' => $arrResult2->dataListSet[0]]);
        }
    }

    public function prosesSlipFormatAllowancePY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $varAllowanceLabel = 'allowance' . $request->number_allowance . 'Label';
            $varAllowanceField = 'allowance' . $request->number_allowance . 'Field';

            $param = [
                'companyCode' => Session::get('companyCode'),
                'slipCode' => $request->slip_type_allowance,
                'slipName' => $request->slip_name_allowance,
                'fontSize' => (int) $request->font_size_allowance,
                'formatNumber' => $request->number_format_allowance,
                $varAllowanceLabel => $request->field_label_allowance,
                $varAllowanceField => $request->field_name_allowance,
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

            $param2 = [
                'companyCode' => Session::get('companyCode'),
                'slipCode' => $request->slip_type_allowance,
                'slipName' => $request->slip_name_allowance,
            ];

            // dd(json_encode($param));

            if($request->record_function_allowance == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/insertSlipFormat',
                    ['body' => json_encode($param)]
                );
            }
            else{
                $response = $client->put(env('API_URL') . '/payroll/updateSlipFormat',
                    ['body' => json_encode($param)]
                );
            }

            $response2 = $client->post(env('API_URL') . '/payroll/getSlipFormat',
                ['body' => json_encode($param2)]
            );
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
        $arrResult2 = json_decode($response2->getBody()->getContents());

        if($arrResult2->dataListSet == null){
            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message, 'data' => '']);
        }else{
            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message, 'data' => $arrResult2->dataListSet[0]]);
        }
    }

    public function prosesSlipFormatDeductionPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->slip_type_deduction);

            $varDeductionLabel = 'deduction' . $request->number_deduction . 'Label';
            $varDeductionField = 'deduction' . $request->number_deduction . 'Field';

            $param = [
                'companyCode' => Session::get('companyCode'),
                'slipCode' => $request->slip_type_deduction,
                'slipName' => $request->slip_name_deduction,
                'fontSize' => (int) $request->font_size_deduction,
                'formatNumber' => $request->number_format_deduction,
                $varDeductionLabel => $request->field_label_deduction,
                $varDeductionField => $request->field_name_deduction,
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

            $param2 = [
                'companyCode' => Session::get('companyCode'),
                'slipCode' => $request->slip_type_deduction,
                'slipName' => $request->slip_name_deduction,
            ];

            if($request->record_function_deduction == 'New'){
                $response = $client->post(env('API_URL') . '/payroll/insertSlipFormat',
                    ['body' => json_encode($param)]
                );
            }
            else{
                $response = $client->put(env('API_URL') . '/payroll/updateSlipFormat',
                    ['body' => json_encode($param)]
                );
            }

            $response2 = $client->post(env('API_URL') . '/payroll/getSlipFormat',
                ['body' => json_encode($param2)]
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

        if($arrResult2->dataListSet == null){
            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message, 'data' => '']);
        }else{
            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message, 'data' => $arrResult2->dataListSet[0]]);
        }
    }

    public function prosesSalaryCalculationProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/payroll/UpdateSalaryCalculation',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "employeeNoFrom" => $request->employee_no_from,
                        "employeeNoTo" => $request->employee_no_to,
                        "periodMonth" => (int) $request->process_period_month_hidden,
                        "periodYear" => (int) $request->process_period_year_hidden,
                        "loanPaymentProcess" => isset($request->loan_payment_process) ? (bool) $request->loan_payment_process : false,
                        "retroactiveProcess" => isset($request->retroactive_process) ? (bool) $request->retroactive_process : false,
                        "retroactive" => (int) $request->retroactive,
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/insertTmFixedComponent',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "periodMonth" => (int) $request->process_period_month_hidden,
                        "periodYear" => (int) $request->process_period_year,
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

    public function prosesMonthlyClosingProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/InsertPrMonthlyClosing',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "periodMonth" => (int) $request->period_month,
                        "periodYear" => (int) $request->period_year,
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
                'verify' => false,
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

    public function prosesMonthlySystemClosingPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/payroll/UpdatePrMonthlyEndProcess',
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

    public function prosesMonthlyPeriodicalUpdateProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            // var_dump(Session::get('token'));

            $response = $client->post(env('API_URL') . '/payroll/InsertPrMonthlyClosing',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "periodMonth" => (int) $request->period_month,
                        "periodYear" => (int) $request->period_year,
                        "languageCode" => App::getLocale(),
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
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

    public function prosesJournalProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            // var_dump(json_encode(
            //     [
            //         "companyCode" => Session::get('companyCode'),
            //         "periodMonth" => (int) $request->period_month,
            //         "periodYear" => (int) $request->period_year,
            //         "languageCode" => App::getLocale(),
            //         "sessionID" => 0,
            //         "sessionUserID" => Session::get('userID'),
            //         "logActionUsername" => Session::get('userID'),
            //         "logActionUserID" => Session::get('userName') 
            //     ]
            // ));

            $response = $client->put(env('API_URL') . '/prmonthlyendprocess/updateprmonthlyendprocess',
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

    public function prosesTaxCalculationProcessPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/payroll/PrTaxCalculationProcess',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "periodProcess" => $request->process_period_det,
                        "recalculateTHRTax" => isset($request->recalculate_thr_tax) ? (bool) $request->recalculate_thr_tax : false,
                        "recalculateBonusTax" => isset($request->recalculate_bonus_tax) ? (bool) $request->recalculate_bonus_tax : false,
                        "range" => isset($request->range) ? (bool) $request->range : false,
                        "employeeNoFrom" => $request->employee_no_from,
                        "employeeNoTo" => $request->employee_no_to,
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

    // public function prosesSptFormatPY(Request $request)
    // {
    //     try {
    //         $client = new Client([
    //             'headers' => [ 'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer ' . Session::get('token') ]
    //         ]);
    //         // var_dump(Session::get('token'));
    //         // var_dump((int)$request->column_no_hidden);

    //         $param = [
    //             'companyCode' => Session::get('companyCode'),
    //             'columnNo' => (int) $request->column_no_hidden,
    //             'fieldName' => $request->field_name,
    //             'label' => $request->field_label,
    //             "changedNo" => 0,
    //             'format' => $request->format,
    //             "createdDate" => date("Y-m-d\TH:i:s"),
    //             "createdBy" => Session::get('userID'),
    //             "changedDate" => date("Y-m-d\TH:i:s"),
    //             "changedBy" => Session::get('userID'),
    //             "languageCode" => App::getLocale(),
    //             'sessionID' => 0, 
    //             'sessionUserID' => Session::get('userID'),
    //             'logActionUserID' => Session::get('userID'),
    //             'logActionUsername' => Session::get('userName')        
    //         ];
    //         // var_dump(json_encode($param));

    //     // var_dump($arrResult->dataListSet[0]->{$request->pemasterType});

    //     if($arrResult->dataListSet[0]->{$request->pemasterType} == null){
    //         $number = 1;
    //     }else{
    //         // $dataLevel[] = $request->{'level' . ($i+1)};
    //         if(isset($arrResult->dataListSet[0]->{$request->pemasterType}[0]->columnNo)){
    //             $number = max(array_column($arrResult->dataListSet[0]->{$request->pemasterType}, 'columnNo')) + 1;
    //         }else if(isset($arrResult->dataListSet[0]->{$request->pemasterType}[0]->seqNo)){
    //             $number = max(array_column($arrResult->dataListSet[0]->{$request->pemasterType}, 'seqNo')) + 1;
    //         }
    //     }
    //     return response()->json($number);
    //     }
    // }

    public function checkNumberPayrollCalculationPY(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
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
                'verify' => false,
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
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'languageCode' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];
    
            if(!empty($request->payment_date_from) || !empty($request->payment_date_to)){
                $param['paymentdateFrom'] = $request->payment_date_from;
                $param['paymentDateTo'] = $request->payment_date_to;
            }
    
            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }
    
            if(!empty($request->group_authorized_from) || !empty($request->group_authorized_to)){
                $param['groupAuthorizedCodeFrom'] = intval($request->group_authorized_from);
                $param['groupAuthorizedCodeTo'] = intval($request->group_authorized_to);
            }

            //  var_dump(json_encode($param));

            if($request->report_type == "report"){
                $response = $client->post(env('API_URL').'/payroll/GetSeveranceReport',[
                    'body' => json_encode($param)
                ]);
            }else{
                $response = $client->post(env('API_URL').'/payroll/GetSeveranceSlip',[
                    'body' => json_encode($param)
                ]);
            }
            
            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
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

        $arrResult = json_decode($response->getBody()->getContents());
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());
        // var_dump($arrResult->dataListSet);
        
        $arraySend[] = $arrCompany->dataListSet[0];

        // var_dump($arraySend);

        if($arrResult->dataListSet == null){
            if($request->report_type == "report"){
                $pdf = PDF::loadView('payroll.py_export_severance_report', ['data' => []])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Severance Report.pdf');
            }else{
                $pdf = PDF::loadView('payroll.py_export_severance_slip', ['data' => []])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Severance Slip.pdf');
            }
        }else{
            $arraySend[] = $arrResult->dataListSet[0];

            if($request->report_type == "report"){
                $pdf = PDF::loadView('payroll.py_export_severance_report', ['data' => [$arraySend]])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Severance Report.pdf');
            }else{
                $pdf = PDF::loadView('payroll.py_export_severance_slip', ['data' => $arrResult->dataListSet])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Severance Slip.pdf');
            }
        }
    }

    public function printSeveranceReportPayrollExcel(Request $request){
        return Excel::download(new SeveranceReportExcel($request->payment_date_from, $request->payment_date_to, $request->employee_no_from, $request->employee_no_to, intval($request->group_authorized_from), intval($request->group_authorized_to)), 'Severance Report.xlsx');
    }

    public function printJournalReportPayroll(Request $request){
        try{
            $client = new Client([
                'verify' => false,
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

            $response = $client->post(env('API_URL').'/payroll/JournalReport', [
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

        // var_dump($arrResult->dataListSet[0]);

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('payroll.py_export_journal_report', ['data' => []])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Journal Report.pdf');
        }else{
            $pdf = PDF::loadView('payroll.py_export_journal_report', ['data' => [$arrResult->dataListSet[0]]])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Journal Report.pdf');
        }
    }

    public function printJournalReportPayrollExcel(Request $request){
        // var_dump($request->journal_period, $request->group_authorized_from, $request->group_authorized_to);
        return Excel::download(new JournalReportExcel($request->journal_period, $request->group_authorized_from, $request->group_authorized_to), 'Journal Report.xlsx');
    }

    public function printAnnualReportPayrollExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }
        // var_dump($request->journal_period, $request->group_authorized_from, $request->group_authorized_to);
        return Excel::download(new AnnualReportExcel($request->year, $request->report_name, ($request->report_status == "annualy") ? true : false, ($request->report_type == "summary") ? true : false, $request->employee_no_from, $request->employee_no_to, $request->group_authorized_code_from, $request->group_authorized_code_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Annual Report.xlsx');
    }

    public function printLoanReportPayrollExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }
        return Excel::download(new LoanReportExport($request->employee_no_from, $request->employee_no_to, $request->loan_type_from, $request->loan_type_to, $request->report_type, $request->loan_type_one, $request->loan_type_two, $request->loan_type_three, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorized_code_from, $request->group_authorized_code_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Loan Report.xlsx');
    }

    public function getPaymentSlipPayroll(Request $request){
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
         
            return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        if(isset($request->reqData)){
            $reqData = $request->reqData;
            $strDecr = openssl_decrypt($reqData, "AES-128-CBC", "AESMobileMob1234", 0, "AESMobileMob1234");
            $data = json_decode($strDecr);
        }else{
            $data = [];
        }

        // dd($data);

        try{
            
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $data->token ]
            ]);

            $userID = null;

            $param = [
                'companyCode' => $data->companyCode,
                'languageCode' => $data->languageCode,
                'sessionID' => 0,
                'sessionUserID' => $data->sessionUserID
            ];

            if(!empty($data->slip_type)){
                $param['slipCode'] = $data->slip_type;
            }

            if(!empty($data->period)){
                $param['period'] = date('Y-m-d', strtotime($data->period));
            }

            if(!empty($data->format_type)){
                $param['format'] = $data->format_type;
                $formatType = $request->format_type;
            }

            if(!empty($data->print_date)){
                $param['printDate'] = date('Y-m-d', strtotime($data->print_date));
            }

            if(!empty($data->employee_no_from) || isset($data->employee_no_to)){
                $param['employeeNoFrom'] = $data->employee_no_from;
                $param['employeeNoTo'] = $data->employee_no_to;
                $userID = $data->employee_no_to;
            }

            if(!empty($data->sort_by) || isset($data->level)){
                $param['level'] = $data->level;
                $param['sortByEmployee'] = $data->sort_by == "by_employee_no" ? true : false;
                $param['sortByLevel'] = $data->sort_by == "by_level" ? true : false;
            }

            if(!empty($data->group_authorized_from) || isset($data->group_authorized_to)){
                $param['groupAuthorizedFrom'] = intval($data->group_authorized_from);
                $param['groupAuthorizedTo'] = intval($data->group_authorized_to);
            }

            if(!empty($data->display_logo)){
                $param['displayCompanyLogo'] = $data->display_logo == "0" ? false : true;
            }

            if(!empty($data->user_id)){
                $userID = $data->user_id;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL').'/payroll/GetPaymentSlipReportV2', [
                'body' => json_encode($param)
            ]);

            // var_dump($request->format_type);
        }catch(Exception $e){
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

        $firstDayOfPreviousMonth = date("01-M-Y", strtotime($data->period));
        $lastDayOfPreviousMonth = date("t-M-Y", strtotime($data->period));

        // dd($arrResult->dataListSet);
        if($data->companyCode == 'DAA'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_digima';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_digima';
        }else if($data->companyCode == 'KNM' || $data->companyCode == 'KTL'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_sayurbox';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_sayurbox';
        }else if($data->companyCode == 'FFS'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_fitra_fajar';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_fitra_fajar';
        }else if($data->companyCode == 'IAT'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_indogal';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_indogal';
        }else if($data->companyCode == 'MAT'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_mega_antusias';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_mega_antusias';
        }else if($data->companyCode == 'ITK'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_intikom';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_intikom';
        }else{
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape';
        }

        if($arrResult->dataListSet == null){
            if($data->format_type == "portrait"){
                $pdf = PDF::loadView($viewNamePortrait, [
                    'data' => [], 
                    'display_logo' => $data->display_logo,
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($data->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($data->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($data->period))),
                    'transfer_date' => date('d-M-Y', strtotime($data->print_date))
                ])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                // if($data->mobile){
                //     return $pdf->stream('Payment Slip.pdf');
                // }else{
                    $pdf->setEncryption($userID, $userID, array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                // }
            }else{
                $pdf = PDF::loadView($viewNameLandscape, [
                    'data' => [], 
                    'display_logo' => $data->display_logo,
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($data->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($data->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($data->period))),
                    'transfer_date' => date('d-M-Y', strtotime($data->print_date))
                ])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                // if($data->mobile){
                //     return $pdf->stream('Payment Slip.pdf');
                // }else{
                    $pdf->setEncryption($userID, $userID, array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                // }
            }
        }else{
            if($data->format_type == "portrait"){
                $pdf = PDF::loadView($viewNamePortrait, [
                    'data' => $arrResult->dataListSet, 
                    'display_logo' => $data->display_logo,
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($data->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($data->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($data->period))),
                    'transfer_date' => date('d-M-Y', strtotime($data->print_date))
                ])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                // if($data->mobile){
                //     return $pdf->stream('Payment Slip.pdf');
                // }else{
                    $pdf->setEncryption($userID, $userID, array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                // }
            }else{
                $pdf = PDF::loadView($viewNameLandscape, [
                    'data' => $arrResult->dataListSet, 
                    'display_logo' => $data->display_logo,
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($data->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($data->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($data->period))),
                    'transfer_date' => date('d-M-Y', strtotime($data->print_date))
                ])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                // if($data->mobile){
                //     return $pdf->stream('Payment Slip.pdf');
                // }else{
                    $pdf->setEncryption($userID, $userID, array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                // }
            }
        }
    }

    public function printPaymentSlipPayroll(Request $request){
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
         
            return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        try{
            $dataLevel = [];

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . (isset($request->token) ? $request->token : Session::get('token')) ]
            ]);

            $param = [
                'companyCode' => (empty(Session::get('companyCode')) ? $request->companyCode : Session::get('companyCode')),
                'languageCode' => (!empty($request->languageCode) ? $request->languageCode : App::getLocale()),
                'sessionID' => 0,
                'sessionUserID' => (empty(Session::get('userID')) ? $request->sessionUserID : Session::get('userID'))
            ];

            if(!empty($request->mobile)){
                $request->mobile = false;
            }

            if(!empty($request->slip_type)){
                $param['slipCode'] = $request->slip_type;
            }

            if(!empty($request->period)){
                $param['period'] = $request->period;
            }

            if(!empty($request->format_type)){
                $param['format'] = $request->format_type;
                $formatType = $request->format_type;
            }

            if(!empty($request->print_date)){
                $param['printDate'] = $request->print_date;
            }

            if(!empty($request->employee_no_from) || isset($data->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->sort_by) || isset($data->level)){
                $param['level'] = $request->level;
                $param['sortByEmployee'] = $request->sort_by == "by_employee_no" ? true : false;
                $param['sortByLevel'] = $request->sort_by == "by_level" ? true : false;
            }

            if(!empty($request->group_authorized_from) || isset($data->group_authorized_to)){
                $param['groupAuthorizedFrom'] = intval($request->group_authorized_from);
                $param['groupAuthorizedTo'] = intval($request->group_authorized_to);
            }

            if(!empty($request->display_logo)){
                $param['displayCompanyLogo'] = $request->display_logo == "0" ? false : true;
            }

            if(!empty($request->position) && !is_null($request->position[0])){
                foreach($request->position as $value){
                    $data_position[] = [
                        'positionCode' => $value
                    ];
                }
                $param['position'] = $data_position;
            }

            if(!empty($request->location) && !is_null($request->location[0])){
                foreach($request->location as $value){
                    $data_location[] = [
                        'locationCode' => $value
                    ];
                }
                $param['location'] = $data_location;
            }

            if(!empty($request->ranking) && !is_null($request->ranking[0])){
                foreach($request->ranking as $value){
                    $data_ranking[] = [
                        'rankingCode' => $value
                    ];
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($dataLevel) && !is_null($dataLevel[0])){
                foreach($dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($dataLevel[$key] as $value2){
                        $data_level_detail[] = [
                            'levelCode' => $value2
                        ];
                    }
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($key + 1),
                        "level" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            // dd(json_encode($param));
            // exit;

            $response = $client->post(env('API_URL').'/payroll/GetPaymentSlipReport', [
                'body' => json_encode($param)
            ]);

            // var_dump($request->format_type);
        }catch(Exception $e){
            $response = $e->getResponse();
            // dd($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        // dd($arrResult->dataListSet);

        $firstDayOfPreviousMonth = date("01-M-Y", strtotime($request->period));
        $lastDayOfPreviousMonth = date("t-M-Y", strtotime($request->period));

        $companyCode = empty(Session::get('companyCode')) ? $request->companyCode : Session::get('companyCode');

        if($companyCode == 'DAA'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_digima';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_digima';
        }else if($companyCode == 'KNM' || $companyCode == 'KTL'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_sayurbox';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_sayurbox';
        }else if($companyCode == 'FFS'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_fitra_fajar';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_fitra_fajar';
        }else if($companyCode == 'IAT'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_indogal';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_indogal';
        }else if($companyCode == 'MAT'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_mega_antusias';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_mega_antusias';
        }else if($companyCode == 'ITK'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_intikom';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_intikom';
        }else if($companyCode == 'CBI'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_ciboodle';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_ciboodle';
        }else{
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape';
        }

        if($arrResult->dataListSet == null){
            if($request->format_type == "portrait"){
                $pdf = PDF::loadView($viewNamePortrait, [
                    'data' => [], 
                    'display_logo' => $request->display_logo, 
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($request->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($request->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($request->period))),
                    'transfer_date' => date('d-M-Y', strtotime($request->print_date))
                ])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }else{
                $pdf = PDF::loadView($viewNameLandscape, [
                    'data' => [], 
                    'display_logo' => $request->display_logo, 
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($request->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($request->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($request->period))),
                    'transfer_date' => date('d-M-Y', strtotime($request->print_date))
                ])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }
        }else{
            // set_time_limit(-1);
            if($request->format_type == "portrait"){
                $pdf = PDF::loadView($viewNamePortrait, [
                    'data' => $arrResult->dataListSet, 
                    'display_logo' => $request->display_logo, 
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($request->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($request->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($request->period))),
                    'transfer_date' => date('d-M-Y', strtotime($request->print_date))
                ])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }else{
                $pdf = PDF::loadView($viewNameLandscape, [
                    'data' => $arrResult->dataListSet, 
                    'display_logo' => $request->display_logo, 
                    'slip_code' => $request->slip_type,
                    'no' => date('m', strtotime($request->period)), 
                    'first_day' => $firstDayOfPreviousMonth,
                    'last_day' => $lastDayOfPreviousMonth,
                    'period' => date('d-M-Y', strtotime($request->period)),
                    'periode' => tgl_indo(date('Y-m-d', strtotime($request->period))),
                    'transfer_date' => date('d-M-Y', strtotime($request->print_date))
                ])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }
        }
    }

    public function getURLPaymentSlipPayroll(Request $request){
        try{
            // var_dump(json_encode($request->all()));
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . (isset($request->token) ? $request->token : Session::get('token')) ]
            ]);

            $param = [
                'companyCode' => (empty(Session::get('companyCode')) ? $request->companyCode : Session::get('companyCode')),
                'languageCode' => (empty(App::getLocale()) ? $request->languageCode : App::getLocale()),
                'sessionID' => 0,
                'sessionUserID' => (empty(Session::get('userID')) ? $request->sessionUserID : Session::get('userID'))
            ];

            if(!isset($request->mobile)){
                $request->mobile = false;
            }

            if(!empty($request->slip_type)){
                $param['slipCode'] = $request->slip_type;
            }

            if(!empty($request->period)){
                $param['periode'] = $request->period;
            }

            if(!empty($request->format_type)){
                $param['format'] = $request->format_type;
            }

            if(!empty($request->print_date)){
                $param['printDate'] = $request->print_date;
            }

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->sort_by) || !empty($request->level)){
                $param['level'] = $request->level;
                $param['sortByEmployee'] = $request->sort_by == "by_employee_no" ? true : false;
                $param['sortByLevel'] = $request->sort_by == "by_level" ? true : false;
            }

            if(!empty($request->group_authorized_from) || !empty($request->group_authorized_to)){
                $param['groupAuthorizedFrom'] = intval($request->group_authorized_from);
                $param['groupAuthorizedTo'] = intval($request->group_authorized_to);
            }

            if(isset($request->display_logo)){
                $param['displayCompanyLogo'] = $request->display_logo == "0" ? false : true;
            }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/payroll/GetPaymentSlipReport', [
                'body' => json_encode($param)
            ]);

            // var_dump($request->format_type);
        }catch(Exception $e){
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

        // var_dump($arrResult->dataListSet == null);

        $companyCode = empty(Session::get('companyCode')) ? $request->companyCode : Session::get('companyCode');

        if($companyCode == 'DAA'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_digima';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_digima';
        }else if($companyCode == 'KNM' || $companyCode == 'KTL'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_sayurbox';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_sayurbox';
        }else if($companyCode == 'FFS'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_fitra_fajar';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_fitra_fajar';
        }else if($companyCode == 'IAT'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_indogal';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_indogal';
        }else if($companyCode == 'MAT'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_mega_antusias';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_mega_antusias';
        }else if($companyCode == 'ITK'){
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait_intikom';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape_intikom';
        }else{
            $viewNamePortrait = 'payroll.py_export_payment_slip_portrait';
            $viewNameLandscape = 'payroll.py_export_payment_slip_landscape';
        }

        if($arrResult->dataListSet == null){
            if($request->format_type == "portrait"){
                $pdf_url = PDF::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf');
                $pdf = PDF::loadView($viewNamePortrait, ['data' => [], 'display_logo' => $request->display_logo])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }else{
                $pdf = PDF::loadView($viewNameLandscape, ['data' => [], 'display_logo' => $request->display_logo])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }
        }else{
            if($request->format_type == "portrait"){
                $pdf = PDF::loadView($viewNamePortrait, ['data' => $arrResult->dataListSet, 'display_logo' => $request->display_logo])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }else{
                $pdf = PDF::loadView($viewNameLandscape, ['data' => $arrResult->dataListSet, 'display_logo' => $request->display_logo])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
                if($request->mobile){
                    return base64_encode($pdf->stream('Payment Slip.pdf'));
                }else{
                    $pdf->setEncryption(Session::get('userID'), Session::get('userID'), array('print', 'copy'));
                    return $pdf->stream('Payment Slip.pdf');
                }
            }
        }
    }

    public function prosesPaymentSlipPayroll(Request $request){
        try{
            $dataLevel = [];

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => (empty(Session::get('companyCode')) ? $request->companyCode : Session::get('companyCode')),
                'range' => true,
                'languageCode' => (!empty($request->languageCode) ? $request->languageCode : App::getLocale()),
                'sessionID' => 0,
                'sessionUserID' => (empty(Session::get('userID')) ? $request->sessionUserID : Session::get('userID'))
            ];

            if(!empty($request->slip_type)){
                $param['slipCode'] = $request->slip_type;
            }

            if(!empty($request->period)){
                $param['period'] = $request->period;
            }

            if(!empty($request->print_date)){
                $param['printDate'] = $request->print_date;
            }

            if(!empty($request->employee_no_from) || isset($data->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->group_authorized_from) || isset($data->group_authorized_to)){
                $param['groupAuthorizedFrom'] = intval($request->group_authorized_from);
                $param['groupAuthorizedTo'] = intval($request->group_authorized_to);
            }

            // dd(json_encode($param));
            // exit;

            $response = $client->post(env('API_URL').'/payroll/FixedSlip', [
                'body' => json_encode($param)
            ]);

            // var_dump($request->format_type);
        }catch(Exception $e){
            $response = $e->getResponse();
            // dd($response);
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

    public function printSPTPPHReportPayroll(Request $request){
        try{
            
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'languageCode' => App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            if($request->spt_type == 'pph_1721i'){
                $param['format'] = $request->report_format;
                $param['periodMonth'] = (int) $request->period_month_det;
                $param['periodYear'] = (int) $request->period_year_det;
                $param['groupNPWP'] = $request->npwp_group;
                $param['groupAuthorizationCodeFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizationCodeTo'] = (int) $request->group_authorized_code_to;

                // var_dump(json_encode($param));

                $response = $client->post(env('API_URL').'/payroll/getAnnualReportSPT', [
                    'body' => json_encode($param)
                ]);
            }else{
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
                $param['npwpCode'] = $request->npwp_group;
                $param['groupAuthorizeFrom'] = $request->group_authorized_code_from;
                $param['groupAuthorizeTo'] = $request->group_authorized_code_to;

                // var_dump(json_encode($param));

                $response = $client->post(env('API_URL').'/payroll/getReportSPTPPH1721A1', [
                    'body' => json_encode($param)
                ]);
            }

            // var_dump(json_encode($param));

        }catch(Exception $e){
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            if($request->spt_type == 'pph_1721i'){
                $pdf = PDF::loadView('payroll.py_export_spt_pph_1721i', ['data' => [], 'type' => $request->report_format])->setPaper('letter', 'landscape')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('SPT PPh 1721I.pdf');
            }else{
                $pdf = PDF::loadView('payroll.py_export_spt_pph_1721a1', ['data' => [], 'type' => $request->report_format])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('SPT PPh 1721A1.pdf');
            }
        }else{
            if($request->spt_type == 'pph_1721i'){
                $pdf = PDF::loadView('payroll.py_export_spt_pph_1721i', ['data' => $arrResult->dataListSet, 'type' => $request->report_format])->setPaper('letter', 'landscape')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('SPT PPh 1721I.pdf');
            }else{
                $pdf = PDF::loadView('payroll.py_export_spt_pph_1721a1', ['data' => $arrResult->dataListSet, 'type' => $request->report_format])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('SPT PPh 1721A1.pdf');
            }
        }
    }

    public function printMonthlyJamsostekReportPayroll(Request $request){
        $response = null;

        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
         
            return $bulan[ (int)$pecahkan[1] ];
        }

        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                // 'jamsostekPeriod' => $request->jamsostek_period_year . '-' . $request->jamsostek_period_month . '-01',
                // 'iuranPeriod' => $request->kekurangan_kelebihan_period_year . '-' . $request->kekurangan_kelebihan_period_month . '-01',
                // 'jkk' => $request->jkk,
                // 'jht' => $request->jht,
                // 'jk' => $request->jk,
                // 'jp' => $request->jp,
                // 'jk' => $request->jk,
                // 'jdi' => $request->jdi,
                "periodYear" => (int) date('Y', strtotime($request->jamsostek_period)),
                "periodMonth" => (int) date('m', strtotime($request->jamsostek_period)),
                'gAuthFrom' => $request->group_authorize_code_from,
                'gAuthTo' => $request->group_authorize_code_to,
                'groupBPJS' => $request->group_bpjs_code,
                'languageID' => App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                // "logActionUsername" => Session::get('userName'),
                // "logActionUserID" => Session::get('userID')
            ];

            // dd(json_encode($param));

            if($request->jamsostek_report_type == 'formulir2'){
                $response = $client->post(env('API_URL').'/payroll/getRincianIuran', [
                    'body' => json_encode($param)
                ]);
            }else if($request->jamsostek_report_type == 'formulir1a'){
                $response = $client->post(env('API_URL').'/payroll/getDaftarTenagaKerja', [
                    'body' => json_encode($param)
                ]);
            }else if($request->jamsostek_report_type == 'formulir1b'){
                $response = $client->post(env('API_URL').'/payroll/getDaftarTenagaKerjaKeluar', [
                'body' => json_encode($param)
                ]);
            }else if($request->jamsostek_report_type == 'formulir2a'){
                $response = $client->post(env('API_URL').'/payroll/getPerubahanUpahTenagaKerja', [
                    'body' => json_encode($param)
                ]);
            }
        } catch (ClientException $e) {
            $response = $e->getResponse();
            $errorBody = (string) $response->getBody();
            return response()->json(['status' => 'error', 'message' => $errorBody], 400);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $errorBody = (string) $response->getBody();
            return response()->json(['status' => 'error', 'message' => $errorBody], 400);
        }catch(Exception $e){
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }

        $arrResult = json_decode($response->getBody()->getContents());
        // dd($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            if($request->jamsostek_report_type == 'formulir2'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir2_report', 
                [
                    'data' => [], 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 2.pdf');
            }else if($request->jamsostek_report_type == 'formulir1a'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir1a_report', 
                [
                    'data' => [], 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 1A.pdf');
            }else if($request->jamsostek_report_type == 'formulir1b'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir1b_report', 
                [
                    'data' => [], 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 1B.pdf');
            }else if($request->jamsostek_report_type == 'formulir2a'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir2a_report', 
                [
                    'data' => [], 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 2A.pdf');
            }
        }else{
            if($request->jamsostek_report_type == 'formulir2'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir2_report', 
                [
                    'data' => $arrResult->dataListSet, 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 2.pdf');
            }else if($request->jamsostek_report_type == 'formulir1a'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir1a_report', 
                [
                    'data' => $arrResult->dataListSet, 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 1A.pdf');
            }else if($request->jamsostek_report_type == 'formulir1b'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir1b_report', 
                [
                    'data' => $arrResult->dataListSet, 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 1B.pdf');
            }else if($request->jamsostek_report_type == 'formulir2a'){
                $pdf = PDF::loadView('payroll.py_export_monthly_jamsostek_formulir2a_report', 
                [
                    'data' => $arrResult->dataListSet, 
                    'period' => $request->jamsostek_period,
                    'bulan' => tgl_indo(date('Y-m-d', strtotime($request->jamsostek_period))),
                    'companyName' => Session::get('companyName'),
                    'bpjsNo' => $request->group_bpjs_name,
                    'grandTotal' => isset($request->grand_total) ? (bool) $request->grand_total : false
                ])->setPaper('letter', 'portrait')->setOptions(['defaultFont' => 'arial']);
                return $pdf->stream('Jamsostek Formulir 2A.pdf');
            }
        }
    }

    public function printMonthlyJamsostekReportPayrollExcel(Request $request){
        $fileName = "Monthly Jamsostek Report.xlsx";

        if($request->jamsostek_report_type == 'formulir2'){
            $fileName = "Jamsostek Formulir 2.xlsx";
        }else if($request->jamsostek_report_type == 'formulir1a'){
            $fileName = "Jamsostek Formulir 1A.xlsx";
        }else if($request->jamsostek_report_type == 'formulir1b'){
            $fileName = "Jamsostek Formulir 1B.xlsx";
        }else if($request->jamsostek_report_type == 'formulir2a'){
            $fileName = "Jamsostek Formulir 2A.xlsx";
        }

        return Excel::download(new MonthlyJamsostekReportExport(
            $request->jamsostek_report_type,
            $request->jamsostek_period,
            isset($request->grand_total) ? (bool) $request->grand_total : false,
            $request->group_authorize_code_from, 
            $request->group_authorize_code_to,
            $request->group_bpjs_code,
            $request->group_bpjs_name), 
            $fileName
        );
    }
    
    public function printDUMTKPayroll(Request $request){
        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "asOfPeriod" => $request->as_of_period,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }
    
            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizedCodeFrom'] = $request->group_authorized_code_from;
                $param['groupAuthorizedCodeTo'] = $request->group_authorized_code_to;
            }

            if(!empty($request->bpjs_group_from) || !empty($request->bpjs_group_to)){
                $param['bpjsGroupFrom'] = $request->bpjs_group_from;
                $param['bpjsGroupTo'] = $request->bpjs_group_to;
            }

            $response = $client->post(env('API_URL').'/payroll/getDUMTKReport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
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
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());

        if ($arrResult->dataListSet !== null)
        {
            $arraySend[] = $arrCompany->dataListSet[0];
            $arraySend[] = $arrResult->dataListSet[0];
        } else {
            $arraySend[] = [];
        }

        $paramSend[] = (object) $param;

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('payroll.py_export_dumtk', ['data' => []])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('DUMTK Report.pdf');
        }else{
            $pdf = PDF::loadView('payroll.py_export_dumtk', ['data' => $arraySend, 'data2' => $paramSend])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('DUMTK Report.pdf');
        }
    }

    public function printDUMTKPayrollExcel(Request $request){
        return Excel::download(new DUMTKReportExport(
            $request->as_of_period,
            $request->employee_no_from, 
            $request->employee_no_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to,
            $request->bpjs_group_from,
            $request->bpjs_group_to), 
            'DUMTK Report Form.xlsx'
        );
    }

    public function printSalaryHistoricalReportPayroll(Request $request){
        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }
    
            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizedFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizedTo'] = (int) $request->group_authorized_code_to;
            }

            $response = $client->post(env('API_URL').'/payroll/GetPrSalaryHistoricalReport', [
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

        if ($arrResult->dataListSet !== null)
        {
            $arraySend[] = $arrResult->dataListSet[0];
        } else {
            $arraySend[] = [];
        }

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('payroll.py_export_salary_historical_report', ['data' => []])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Salary Historical Report.pdf');
        }else{
            $pdf = PDF::loadView('payroll.py_export_salary_historical_report', ['data' => $arraySend])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Salary Historical Report.pdf');
        }
    }

    public function printSalaryHistoricalReportPayrollExcel(Request $request){
        return Excel::download(new SalaryHistoricalReportExport(
            $request->employee_no_from, 
            $request->employee_no_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to), 
            'Salary Historical Report.xlsx'
        );
    }

    public function printCSVESPTReportFormPayrollExcel(Request $request){
        $namaFile = "EsptMasa.xlsx";
        if($request->format == "periodical"){
            $namaFile = "EsptMasa" . date('n', strtotime($request->period)) . date('Y', strtotime($request->period)) . "-" . $request->rectification . "-" . $request->npwp_group . ".xlsx";
            return Excel::download(new EBupotPeriodicalTemplateExport(
                $request->format, 
                $request->period,
                $request->rectification,
                $request->npwp_group,
                $request->print_date,
                $request->group_authorized_code_from,
                $request->group_authorized_code_to), 
                $namaFile
            );
        }else if($request->format == "annual"){
            $namaFile = "EsptA1" . date('Y', strtotime($request->period)) . "-" . $request->rectification . "-" . $request->npwp_group . ".xlsx";
            return Excel::download(new EBupotA1TemplateExport(
                $request->format, 
                $request->period,
                $request->rectification,
                $request->npwp_group,
                $request->print_date,
                $request->group_authorized_code_from,
                $request->group_authorized_code_to), 
                $namaFile
            );
        }else if($request->format == "final"){
            $namaFile = "EsptFinal-" . date('n', strtotime($request->period)) . date('Y', strtotime($request->period)) . "-" . $request->rectification . "-" . $request->npwp_group . ".xlsx";
        }
        // return Excel::download(new CSVESPTReportFormExport(
        //     $request->format, 
        //     $request->period,
        //     $request->rectification,
        //     $request->npwp_group,
        //     $request->print_date,
        //     $request->group_authorized_code_from,
        //     $request->group_authorized_code_to), 
        //     $namaFile
        // );
    }

    public function printBonusTHRReportPayroll(Request $request){
        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "reportType" => $request->report,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }
    
            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizedCodeFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizedCodeTo'] = (int) $request->group_authorized_code_to;
            }

            if(!empty($request->payment_date_from) || !empty($request->payment_date_to)){
                $param['paymentDateFrom'] = $request->payment_date_from;
                $param['paymentDateTo'] = $request->payment_date_to;
            }

            $response = $client->post(env('API_URL').'/payroll/getBonusTHRReport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
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
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());

        if ($arrResult->dataListSet !== null)
        {
            $arraySend[] = $arrCompany->dataListSet[0];
            $arraySend[] = $arrResult->dataListSet[0];
        } else {
            $arraySend[] = [];
        }

        $pdf = PDF::loadView('payroll.py_export_bonus_thr_report', ['data' => $arraySend])->setPaper('a4', 'portrait')->setOptions(['defaultFont' => 'arial']);
        return $pdf->stream('Bonus & THR Report.pdf');
    }

    public function printBonusTHRReportPayrollExcel(Request $request){
        return Excel::download(new BonusTHRReportExport(
            $request->report, 
            $request->payment_date_from,
            $request->payment_date_to,
            $request->employee_no_from,
            $request->employee_no_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to), 
            'Bonus & THR Report.xlsx'
        );
    }

    public function printExportDataKepesertaanBPJSTKReportPayroll(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->position) && !is_null($request->position[0])){
                foreach($request->position as $value){
                    $data_position[] = $value;
                }
                $param['position'] = $data_position;
            }

            if(!empty($request->location) && !is_null($request->location[0])){
                foreach($request->location as $value){
                    $data_location[] =$value;
                }
                $param['location'] = $data_location;
            }

            if(!empty($request->ranking) && !is_null($request->ranking[0])){
                foreach($request->ranking as $value){
                    $data_ranking[] = $value;
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($dataLevel) && !is_null($dataLevel[0])){
                foreach($dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($dataLevel[$key] as $value2){
                        $data_level_detail[] =$value2;
                    }
                    $data_level[] = [
                        "levelType" => (string) ($key + 1),
                        "levelCode" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/personel/BPJS/getBPJSLIST', [
                'body' => json_encode($param)
            ]);
        }catch (RequestException $e){
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
        $customPaper = array(0,0,792.00,1224.00);
        
        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('payroll.py_export_kepesertaan_bpjs_tk_report', ['data' => []])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Export Data Kepesertaan BPJS TK.pdf');
        }else{
            $pdf = PDF::loadView('payroll.py_export_kepesertaan_bpjs_tk_report', ['data' => $arrResult->dataListSet])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Export Data Kepesertaan BPJS TK.pdf');
        }
    }

    public function printExportDataKepesertaanBPJSTKReportPayrollExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new ExportDataKepesertaanBPJSReportExport(
            $request->employee_no_from,
            $request->employee_no_to,
            $request->position, 
            $request->ranking, 
            $request->location, 
            $dataLevel), 
            'Export Data Kepesertaan BPJS TK Report.xlsx'
        );
    }

    public function printRetroactiveReportPayrollExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new RetroactiveReportExport(
            $request->as_of_period, 
            $request->employee_no_from,
            $request->employee_no_to,
            $request->position, 
            $request->ranking, 
            $request->location, 
            $dataLevel), 
            'Retroactive Report.xlsx'
        );
    }

    public function printRetroactiveReportPayroll(Request $request){
        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $dataLevel = [];

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                "period" => $request->as_of_period,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->position) && !is_null($request->position[0])){
                foreach($request->position as $value){
                    $data_position[] = [
                        'positionCode' => $value
                    ];
                }
                $param['position'] = $data_position;
            }

            if(!empty($request->location) && !is_null($request->location[0])){
                foreach($request->location as $value){
                    $data_location[] = [
                        'locationCode' => $value
                    ];
                }
                $param['location'] = $data_location;
            }

            if(!empty($request->ranking) && !is_null($request->ranking[0])){
                foreach($request->ranking as $value){
                    $data_ranking[] = [
                        'rankingCode' => $value
                    ];
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($dataLevel) && !is_null($dataLevel[0])){
                foreach($dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($dataLevel[$key] as $value2){
                        $data_level_detail[] = [
                            'levelCode' => $value2
                        ];
                    }
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($key + 1),
                        "level" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            $response = $client->post(env('API_URL').'/payroll/GetRetroactiveReport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
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
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());
        $customPaper = array(0,0,792.00,1224.00);

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('payroll.py_export_retroactive_report', ['data' => [], 'data_company' => $arrCompany->dataListSet, 'data_period' => $request->as_of_period, 'data_employee_no_from' => $request->employee_no_from, 'data_employee_no_to' => $request->employee_no_to])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Retroactive Report.pdf');
        }else{
            $pdf = PDF::loadView('payroll.py_export_retroactive_report', ['data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'data_period' => $request->as_of_period, 'data_employee_no_from' => $request->employee_no_from, 'data_employee_no_to' => $request->employee_no_to])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Retroactive Report.pdf');
        }
    }

    public function printPeriodicalReportPayroll(Request $request){
        try{
            $dataLevel = [];

            for($i = 0; $i < ((Session::get('companyCode') == 'NMDI' || Session::get('companyCode') == 'CITROEN') ? 1 : $request->level_format); $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "reportCode" => $request->report_name,
                "employeeNoFrom" => $request->employee_no_from,
                "employeeNoTo" => $request->employee_no_to,
                "period" => $request->period,
                "statusPeriod" => 0,
                "multiCostCenter" => isset($request->multi_cost_center) ? (bool) $request->multi_cost_center : false,
                "deptGroup" => isset($request->group_department) ? (bool) $request->group_department : false,
                "reportStatus" => $request->report_status,
                "reportType" => $request->report_type,
                "displayLine" => isset($request->display_line) ? (bool) $request->display_line : false,
                "printSignature" => isset($request->print_signature) ? (bool) $request->print_signature : false,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $paramGetCompany = [
                'companyCode' => Session::get('companyCode'),
                'languageID' =>App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID')
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->cost_center_code_from) || !empty($request->cost_center_code_to)){
                $param['costCenterFrom'] = $request->cost_center_code_from;
                $param['costCenterTo'] = $request->cost_center_code_to;
            }

            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizedCodeFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizedCodeTo'] = (int) $request->group_authorized_code_to;
            }

            if(!empty($request->position) && !is_null($request->position[0])){
                foreach($request->position as $value){
                    $data_position[] = [
                        'positionCode' => $value
                    ];
                }
                $param['position'] = $data_position;
            }

            if(!empty($request->location) && !is_null($request->location[0])){
                foreach($request->location as $value){
                    $data_location[] = [
                        'locationCode' => $value
                    ];
                }
                $param['location'] = $data_location;
            }

            if(!empty($request->ranking) && !is_null($request->ranking[0])){
                foreach($request->ranking as $value){
                    $data_ranking[] = [
                        'rankingCode' => $value
                    ];
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($dataLevel) && !is_null($dataLevel[0])){
                foreach($dataLevel as $key => $value){
                    $data_level_detail = [];
                    foreach($dataLevel[$key] as $value2){
                        $data_level_detail[] = [
                            'levelCode' => $value2
                        ];
                    }
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($key + 1),
                        "level" => $data_level_detail
                    ];
                }
                $param['levelMaster'] = $data_level;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL').'/payroll/GetPeriodicalReport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
            ]);
            
        } catch (RequestException $e){
            $response = $e->getResponse();
            // dd($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());

        // dd($arrResult->dataListSet);

        $customPaper = array(0,0,792.00,1224.00);
        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('payroll.py_export_periodical_report', ['param' => $param, 'grandTotal' => [], 'data' => [], 'data_company' => $arrCompany->dataListSet, 'data_period' => $request->period, 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false, 'report_name' => $request->report_name_detail, 'print_signature' => isset($request->print_signature) ? (bool) $request->print_signature : false, 'level1' => $dataLevel[0], 'company' => Session::get('companyCode')])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream($request->report_name_detail . '.pdf');
        }else{
            $total = [];
            
            if(Session::get('companyCode') == 'NMDI' || Session::get('companyCode') == 'CITROEN'){
                if(isset($arrResult->dataListSet[0]->detail) && count($arrResult->dataListSet[0]->detail) > 1){
                    usort($arrResult->dataListSet[0]->detail, function ($a, $b) {
                        return (int) $a->employeeNo - (int) $b->employeeNo;
                    });
                }

                if(isset($arrResult->dataListSet[0]->summary) && count($arrResult->dataListSet[0]->summary) > 1){
                    usort($arrResult->dataListSet[0]->summary, function ($a, $b) {
                        return (int) $a->employeeNo - (int) $b->employeeNo;
                    });
                }

                $branch = null;
                
                foreach ($arrResult->dataListSet[0]->departementGroup as $key => $dept) {
                    $totalEmployee = count($dept->data);
                    foreach ($dept->data as $key => $value) {
                        foreach ($value->field as $v) {
                            if ($v->tableName === 'Company') {
                                $branch = $v->value;
                                if (!isset($total[$branch])) {
                                    $total[$branch] = [];
                                }
                            }
                            if (!is_string($v->value)) {
                                $total[$branch][$v->field] = isset($total[$branch][$v->field]) ? $total[$branch][$v->field] + $v->value : $v->value;
                            }else{
                                if($v->field == 'EmployeeNo'){
                                    $total[$branch][$v->field] = isset($total[$branch][$v->field]) ? $total[$branch][$v->field] + $totalEmployee : $totalEmployee;
                                    $totalEmployee = 0;
                                }else{
                                    $total[$branch][$v->field] = '';
                                }
                            }
                        }
                    }
                }
            }
            // dd($total);

            $pdf = PDF::loadView('payroll.py_export_periodical_report', ['param' => $param, 'grandTotal' => $total, 'data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'data_period' => $request->period, 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false, 'report_name' => $request->report_name_detail, 'print_signature' => isset($request->print_signature) ? (bool) $request->print_signature : false, 'level1' => $dataLevel[0], 'company' => Session::get('companyCode')])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream($request->report_name_detail . '.pdf');
        }
    }

    public function printPeriodicalReportPayrollExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < ((Session::get('companyCode') == 'NMDI' || Session::get('companyCode') == 'CITROEN') ? 1 : $request->level_format); $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new PeriodicalReportExport(
            $request->report_name, 
            isset($request->grand_total) ? (bool) $request->grand_total : false,
            $request->employee_no_from,
            $request->employee_no_to, 
            $request->period, 
            $request->cost_center_code_from, 
            $request->cost_center_code_to, 
            isset($request->group_department) ? (bool) $request->group_department : false,
            isset($request->multi_cost_center) ? (bool) $request->multi_cost_center : false,
            $request->report_status, 
            $request->report_type, 
            $request->group_authorized_code_from, 
            $request->group_authorized_code_to, 
            isset($request->display_line) ? (bool) $request->display_line : false,
            isset($request->print_signature) ? (bool) $request->print_signature : false,
            $request->position, 
            $request->ranking,
            $request->location,
            $dataLevel,
            $request->report_name_detail), 
            $request->report_name_detail . '.xlsx'
        );
    }

    public function printExportSIPPOnlinePayroll(Request $request){
        // return Excel::download(new ExportSIPPOnlineExcel($request->group_bpjs_code)), 'Severance Report.xlsx');
        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                "bpjsGroup" => $request->group_bpjs_code,
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $response = $client->post(env('API_URL').'/payroll/getExportSIPPOnline', [
                'body' => json_encode($param)
            ]);
        }catch (RequestException $e){
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

        if($arrResult->dataListSet != null){
            unlink(public_path() . '/' . $arrResult->dataListSet[0]->filenamezip . '.zip');
            $file1 = Excel::raw(new ExportSIPPOnlineFile1Export($arrResult->dataListSet[0]->file1), \Maatwebsite\Excel\Excel::XLSX);
            $file2 = Excel::raw(new ExportSIPPOnlineFile2Export($arrResult->dataListSet[0]->file2), \Maatwebsite\Excel\Excel::XLSX);
            $file3 = Excel::raw(new ExportSIPPOnlineFile3Export($arrResult->dataListSet[0]->file3), \Maatwebsite\Excel\Excel::XLSX);
            $file4 = Excel::raw(new ExportSIPPOnlineFile4Export($arrResult->dataListSet[0]->file4), \Maatwebsite\Excel\Excel::XLSX);
            $zip = Zip::create($arrResult->dataListSet[0]->filenamezip . '.zip');
            $zip->addFromString($arrResult->dataListSet[0]->file1name . '.xlsx', $file1);
            $zip->addFromString($arrResult->dataListSet[0]->file2name . '.xlsx', $file2);
            $zip->addFromString($arrResult->dataListSet[0]->file3name . '.xlsx', $file3);
            $zip->addFromString($arrResult->dataListSet[0]->file4name . '.xlsx', $file4);
            $zip->close();
            // $headers = array(
            //     'Content-Type' => 'application/octet-stream',
            // );
            return response()->download(public_path() . '/' . $arrResult->dataListSet[0]->filenamezip . '.zip', $arrResult->dataListSet[0]->filenamezip . '.zip');
            // return response()->json(file_get_contents($zip->getArchive()->filename));
        }
    }

    public function printPensionFundReportPayrollExcel(Request $request){
        return Excel::download(new PensionFundReportExport(
            $request->period,
            $request->group_department,
            $request->print_date, 
            $request->denda_bulan, 
            $request->kelebihan_bayar, 
            $request->kurang_bayar, 
            $request->pengurangan_iuran, 
            $request->materai), 
            'Pension Fund Report.xlsx'
        );
    }

    public function printCBIReportPayrollExcel(Request $request){
        if($request->report_type == 'MEDICAL_REIMBURSEMENT_LIMIT'){
            $filename = 'Medical Reimbursement Limit.xlsx';
        }else if($request->report_type == 'UNUSED_LEAVE'){
            $filename = 'Unused Leave.xlsx';
        }else{
            $filename = 'CBI Report.xlsx';
        }
        
        return Excel::download(new CBIReportExport(
            $request->period,
            $request->report_type), 
            $filename
        );
    }

}