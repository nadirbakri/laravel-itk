<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
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
        
        if($arrResult->dataListSet == null || $arrResult2->dataListSet == null){
            $data = [];
            $data2 = [];
        }else{
            $data = $arrResult->dataListSet;
            $data2 = $arrResult->dataListSet;
        }

        return view('payroll.py_full_partial_loan_payment_detail', ['data' => $data, 'data2' => $data2, 'func' => $request->func]);
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
                        'fieldName' => $request->field_name,
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

        return view('payroll.py_payroll_calculation_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
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
                "remark" => $request->remark,
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

            if (isset($request->cost_center_code)) {
                foreach ($request->cost_center_code as $key => $value) {
                    $data_detail [] = [
                        'companyCode' => Session::get('companyCode'),
                        "employeeNo" => $request->employee_no,
                        "periodYear" => (int) date('Y', strtotime($request->month_year)),
                        "periodMonth" => (int) date('m', strtotime($request->month_year)),
                        "statusPeriod" => $request->period,
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
                // var_dump($request->table_name_detail[$value]);
                // var_dump($request->alignment[$value]);
            }
            else {
                $data_detail [] = null;
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                'employeeNo' => $request->employee_no,
                "periodYear" => (int) date('Y', strtotime($request->month_year)),
                "periodMonth" => (int) date('m', strtotime($request->month_year)),
                "statusPeriod" => $request->period,
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

            var_dump($data_detail);


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

            $paramDetail[] = [
                "paymentSeq" => (int) $request->seq_no_table[0],
                "paymentDate" => $request->payment_date_table[0],
                "paymentType" => isset($request->payment_type[0]) ? $request->payment_type[0] : '',
                "paymentPrincipal" => (float) $request->principal_table[0],
                "payment" => (float) $request->payment_table[0],
                "paymentInterest" => (float) $request->interest_table[0],
                "outStandingAmount" => (float) $request->outstanding_table[0],
                "flagStatus" => (bool) $request->paid_table[0]
            ];

            if ($request->record_function === 'New') {
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
                            "downPayment" => (float) $request->down_payment,
                            "paidOn" => $request->paid_on,
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
                $response = $client->put(env('API_URL') . '/prloandataentry/updateloanemployee',
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
                            "downPayment" => (float) $request->down_payment,
                            "paidOn" => $request->paid_on,
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

    public function prosesPayrollCalculationPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/prcalculation/insertprcalculationprocess',
                    ['body' => json_encode(
                        [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'fieldName' => $request->field_name,
                            'seqProcess' => (int) $request->sequence,
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
                $response = $client->put(env('API_URL') . '/prcalculation/updateprcalculationprocess',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'fieldName' => $request->field_name,
                            'seqProcess' => (int) $request->sequence,
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

    public function prosesPayrollCalculationDetailPY(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/prcalculation/insertprcalculationdetail',
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
            }

            else {
                $response = $client->put(env('API_URL') . '/prcalculation/updateprcalculationdetail',
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('payroll.py_report_format_detail', ['data' => $data, 'func' => $request->func]);
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

            $response = $client->post(env('API_URL') . '/salarycomponentdata/processcomponent',
                ['body' => json_encode(
                    [
                        "companyCode" => Session::get('companyCode'),
                        "periodMonth" => (int) $request->period_month,
                        "periodYear" => (int) $request->period_year,
                        "period" => (int) $request->period,
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
            if(isset($arrResult->dataListSet[0]->sequenceNo)){
                $number = max(array_column($arrResult->dataListSet, 'sequenceNo')) + 1;
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
}