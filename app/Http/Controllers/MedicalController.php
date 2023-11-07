<?php

namespace App\Http\Controllers;

use App\Exports\MedicalFacilityUsedReportExport;
use App\Exports\DiseaseReportExport;
use App\Exports\MedicalClaimReportExport;
use App\Exports\RemainingMedicalLimitReportExport;
use App\Exports\ClaimPaymentTransactionReportSlipExport;
use App\Exports\OutstandingClaimReportExport;
use App\Exports\TransferPaymentToExcelMonthlyExport;
use App\Exports\TransferPaymentToExcelRemainingLimitExport;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use File;
use DataTables;
use Excel;
use PDF;

class MedicalController extends Controller
{
    public function pageMedical(Request $request) 
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
            return view ('medical.md_main', ['dataMenu' => [], 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess([], null)]);
        }else{
            return view ('medical.md_main', ['dataMenu' => $arrResult->dataListSet, 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($arrResult->dataListSet, null)]);
        }

        // return view ('medical.md_main');
    }

    public function pageClaimCode() 
    {
        return view ('medical.md_claim_code');
    }

    public function pageDiseaseCode() 
    {
        return view ('medical.md_disease_code');
    }

    public function pageInsuranceCode() 
    {
        return view ('medical.md_insurance_code');
    }

    public function pageInsuranceClass() 
    {
        return view ('medical.md_insurance_class');
    }

    public function pageMedicalReference()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/controller/getReferenceMedical',
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

        return view('medical.md_medical_reference', ['data' => $arrResult->dataListSet]);
    }

    public function pageInputLimit() 
    {
        return view ('medical.md_input_limit');
    }

    public function pageInputPersonnelLimit() 
    {
        return view ('medical.md_input_personnel_limit');
    }

    public function pageInputPersonnelLimitAllEmployee() 
    {
        return view ('medical.md_input_personnel_limit_all_employee');
    }

    public function pageTreatmentEligibility() 
    {
        return view ('medical.md_treatment_eligibility');
    }

    public function pageClaimList() 
    {
        return view ('medical.md_claim_list');
    }

    public function pageClaimTransaction() 
    {
        return view ('medical.md_claim_transaction');
    }

    public function pageClaimPaymentTransaction() 
    {
        return view ('medical.md_claim_payment_transaction');
    }

    public function pageMedicalFacilityUsedReport()
    {
        return view('medical.md_medical_facility_used_report');
    }

    public function pageClaimPaymentTransactionReport()
    {
        return view('medical.md_claim_payment_transaction_report');
    }

    public function pageMedicalClaimReport()
    {
        return view('medical.md_claim_report');
    }

    public function pageRemainingMedicalLimitReport()
    {
        return view('medical.md_remaining_medical_limit_report');
    }

    public function pageOutstandingClaimReport()
    {
        return view('medical.md_outstanding_claim_report');
    }

    public function pageDiseaseReport()
    {
        return view('medical.md_disease_report');
    }
    
    public function pageTransferPaymentToExcelMonthly()
    {
        return view('medical.md_transfer_payment_to_excel_monthly');
    }

    public function pageTransferPaymentToExcelRemainingLimit()
    {
        return view('medical.md_transfer_payment_to_excel_remaining_limit');
    }

    public function tableClaimCodeMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ClaimCode/GetClaimCode',
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

    public function tableDiseaseCodeMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/DiseaseCode/GetDiseaseCode',
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

    public function tableInsuranceCodeMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/cdinsurance/getcdinsurance',
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

    public function tableInsuranceClassMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/cdinsuranceclass/getcdinsuranceclass',
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
    
    public function tableInputLimitMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mdcompanyinputlimit/getmdcompanyinputlimit',
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

    public function tableInputPersonnelLimitMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/inputpersonnellimit/getlimitpersonnel',
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

    public function tableTreatmentEligibilityMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mdcompanyeligibility/getmdcompanyeligibility',
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

    public function tableClaimTransactionMD()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mdclaimtransaction/getclaimtransaction',
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function dataDetailClaimCodeMD(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ClaimCode/GetClaimCode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'claimCode' => $request->claimCode,
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

        return view('medical.md_claim_code_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailDiseaseCodeMD(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/DiseaseCode/GetDiseaseCode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'diseaseCode' => $request->diseaseCode,
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

        return view('medical.md_disease_code_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailInsuranceCodeMD(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/cdinsurance/getcdinsurance',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'insuranceCode' => $request->insuranceCode,
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

        return view('medical.md_insurance_code_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailInsuranceClass(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/cdinsuranceclass/getcdinsuranceclass',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'insuranceClassCode' => $request->insuranceClassCode,
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

        return view('medical.md_insurance_class_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailInputLimit(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_ref = $client->post(env('API_URL') . '/personel/controller/getReferenceMedical',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response = $client->post(env('API_URL') . '/mdcompanyinputlimit/getmdcompanyinputlimit',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'positionCode' => $request->positionCode,
                        'rankingCode' => $request->rankingCode,
                        'serviceMonth' => (int) $request->serviceMonth,
                        'claimCode' => $request->claimCode,
                        'serviceCode' => $request->serviceCode,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult_ref = json_decode($response_ref->getBody()->getContents()); 

            if($arrResult_ref->dataListSet == null){
                $data_ref = [];
            }else{
                $data_ref = $arrResult_ref->dataListSet;
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('medical.md_input_limit_detail', ['data' => $data, 'data_ref' => $data_ref, 'func' => $request->func]);
    }

    public function dataDetailInputPersonnelLimit(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/inputpersonnellimit/getlimitpersonnel',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'claimCode' => $request->claimCode,
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

        return view('medical.md_input_personnel_limit_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function dataDetailTreatmentEligibility(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_ref = $client->post(env('API_URL') . '/personel/controller/getReferenceMedical',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response = $client->post(env('API_URL') . '/mdcompanyeligibility/getmdcompanyeligibility',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'positionCode' => $request->positionCode,
                        'rankingCode' => $request->rankingCode,
                        'serviceMonth' => (int) $request->serviceMonth,
                        'claimCode' => $request->claimCode,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult_ref = json_decode($response_ref->getBody()->getContents()); 

            if($arrResult_ref->dataListSet == null){
                $data_ref = [];
            }else{
                $data_ref = $arrResult_ref->dataListSet;
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('medical.md_treatment_eligibility_detail', ['data' => $data, 'data_ref' => $data_ref, 'func' => $request->func]);
    }

    public function dataDetailClaimTransaction(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mdclaimtransaction/getclaimtransaction',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'claimDate' => $request->claimDate,
                        'seqNo' => (int) $request->seqNo,
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

        return view('medical.md_claim_transaction_detail', ['data' => $data, 'func' => $request->func]);
    }

    public function prosesClaimCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/personel/ClaimCode/InsertClaimCode',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'claimCode' => $request->claim_code,
                            'claimName' => $request->claim_name,
                            'flagDisease' => isset($request->check_include_disease) ? (bool) $request->check_include_disease : false,
                            'flagPayroll' => isset($request->check_process_to_payroll) ? (bool) $request->check_process_to_payroll : false,
                            "flagMustHaveFamily" => isset($request->check_must_have_family) ? (bool) $request->check_must_have_family : false,
                            "flagAllowClaimForFamily" => isset($request->check_allow_claim_to_family) ? (bool) $request->check_allow_claim_to_family : false,
                            "flagAllowClaimForCompany" => isset($request->check_allow_claim_to_company) ? (bool) $request->check_allow_claim_to_company : false,
                            "companyMedicalLimitType" => $request->limit_type,
                            "paymentFromRemainingLimit" => (int) $request->payment,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }

            else {
                $response = $client->put(env('API_URL') . '/personel/ClaimCode/UpdateClaimCode',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'claimCode' => $request->claim_code,
                            'claimName' => $request->claim_name,
                            'flagDisease' => isset($request->check_include_disease) ? (bool) $request->check_include_disease : false,
                            'flagPayroll' => isset($request->check_process_to_payroll) ? (bool) $request->check_process_to_payroll : false,
                            "flagMustHaveFamily" => isset($request->check_must_have_family) ? (bool) $request->check_must_have_family : false,
                            "flagAllowClaimForFamily" => isset($request->check_allow_claim_to_family) ? (bool) $request->check_allow_claim_to_family : false,
                            "flagAllowClaimForCompany" => isset($request->check_allow_claim_to_company) ? (bool) $request->check_allow_claim_to_company : false,
                            "companyMedicalLimitType" => $request->limit_type,
                            "paymentFromRemainingLimit" => (int) $request->payment,
                            "changedNo" => 0,
                            "languageCode" => App::getLocale(),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
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

    public function prosesDiseaseCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/personel/DiseaseCode/InsertDiseaseCode',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'diseaseCode' => $request->disease_code,
                            'description' => $request->description,
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
                $response = $client->put(env('API_URL') . '/personel/DiseaseCode/UpdateDiseaseCode',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'diseaseCode' => $request->disease_code,
                            'description' => $request->description,
                            "changedNo" => 0,
                            "languageCode" => App::getLocale(),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "sessionCompanyCode" => Session::get('companyCode'),
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

    public function prosesInsuranceCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/cdinsurance/insertcdinsurance',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'insuranceCode' => $request->insurance_code,
                            'insuranceDescription' => $request->insurance_description,
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
                $response = $client->put(env('API_URL') . '/cdinsurance/updatecdinsurance',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'insuranceCode' => $request->insurance_code,
                            'insuranceDescription' => $request->insurance_description,
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

    public function prosesInsuranceClassMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/cdinsuranceclass/insertcdinsuranceclass',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'insuranceClassCode' => $request->insurance_code,
                            'insuranceClassDescription' => $request->insurance_description,
                            'premiumPerYear' => (int) $request->premium_per_year,
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
                $response = $client->put(env('API_URL') . '/cdinsuranceclass/updatecdinsuranceclass',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'insuranceClassCode' => $request->insurance_code,
                            'insuranceClassDescription' => $request->insurance_description,
                            'premiumPerYear' => (int) $request->premium_per_year,
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

    public function prosesMedicalReferenceMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/personel/controller/InsertReferenceMedical',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'processingPeriod' => $request->processing_period,
                            'limitBy' => $request->limit_by,
                            'eligibleBy' => $request->eligible_by,
                            'minServiceLengthBy' => $request->minimum_service_length_by,
                            'flagInsurance' => ($request->join_insurance == "true") ? (bool) $request->join_insurance : false,
                            'policyNo' => $request->insurance_policy_no,
                            'insurancePeriodStart' => $request->insurance_period_from,
                            'insurancePeriodEnd' => $request->insurance_period_to,
                            'flagProportionalLimitForNewEmployee' => ($request->proportional_limit_for_new_employee == "true") ? (bool) $request->proportional_limit_for_new_employee : false,
                            'maxDependents' => (int) $request->maximum_dependents,
                            'expiredReceiptPeriodTypeCompany' => $request->for_company,
                            'expiredReceiptPeriodLengthCompany' => (int) $request->for_company_length,
                            'expiredReceiptPeriodTypeInsurance' => $request->for_insurance,
                            'expiredReceiptPeriodLengthInsurance' => (int) $request->for_insurance_length,
                            'flagTransferSalaryFromPayroll' => isset($request->check_transfer_salary_from_payroll) ? (bool) $request->check_transfer_salary_from_payroll : false,
                            'transactionRateTypeCode' => $request->transaction_rate_type_code,
                            'roundingMethod' => $request->rounding_method_code,
                            'roundingDecimal' => (int) $request->rounding_method_decimal,
                            'periodStartMonth' => (int) $request->period_start_month,
                            'defaultPaymentPlanForMultipleMonth' => isset($request->check_default_multiple_month_for_payment_plan) ? (bool) $request->check_default_multiple_month_for_payment_plan : false,
                            'lastConfirmDate' => $request->last_transaction_date_for_process_payroll,
                            'childMaxAge' => (int) $request->maximum_child_age,
                            'defaultMedicalPaymentBankType' => $request->default_medical_payment_bank_type,
                            'flagContractEmployee' => isset($request->check_contract_employee) ? (bool) $request->check_contract_employee : false,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
            else {
                $response = $client->put(env('API_URL') . '/personel/controller/UpdateReferenceMedical',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'processingPeriod' => $request->processing_period,
                            'limitBy' => $request->limit_by,
                            'eligibleBy' => $request->eligible_by,
                            'minServiceLengthBy' => $request->minimum_service_length_by,
                            'flagInsurance' => ($request->join_insurance == "true") ? (bool) $request->join_insurance : false,
                            'policyNo' => $request->insurance_policy_no,
                            'insurancePeriodStart' => $request->insurance_period_from,
                            'insurancePeriodEnd' => $request->insurance_period_to,
                            'flagProportionalLimitForNewEmployee' => ($request->proportional_limit_for_new_employee == "true") ? (bool) $request->proportional_limit_for_new_employee : false,
                            'maxDependents' => (int) $request->maximum_dependents,
                            'expiredReceiptPeriodTypeCompany' => $request->for_company,
                            'expiredReceiptPeriodLengthCompany' => (int) $request->for_company_length,
                            'expiredReceiptPeriodTypeInsurance' => $request->for_insurance,
                            'expiredReceiptPeriodLengthInsurance' => (int) $request->for_insurance_length,
                            'flagTransferSalaryFromPayroll' => isset($request->check_transfer_salary_from_payroll) ? (bool) $request->check_transfer_salary_from_payroll : false,
                            'transactionRateTypeCode' => $request->transaction_rate_type_code,
                            'roundingMethod' => $request->rounding_method_code,
                            'roundingDecimal' => (int) $request->rounding_method_decimal,
                            'periodStartMonth' => (int) $request->period_start_month,
                            'defaultPaymentPlanForMultipleMonth' => isset($request->check_default_multiple_month_for_payment_plan) ? (bool) $request->check_default_multiple_month_for_payment_plan : false,
                            'lastConfirmDate' => $request->last_transaction_date_for_process_payroll,
                            'childMaxAge' => (int) $request->maximum_child_age,
                            'defaultMedicalPaymentBankType' => $request->default_medical_payment_bank_type,
                            'flagContractEmployee' => isset($request->check_contract_employee) ? (bool) $request->check_contract_employee : false,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
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

    public function prosesInputLimitMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/mdcompanyinputlimit/insertmdcompanyinputlimit',
                    ['body' => json_encode(
                        [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => isset($request->position_det) ? $request->position_det : '',
                            'rankingCode' => isset($request->ranking_det) ? $request->ranking_det : '',
                            'serviceMonth' => (int) $request->service_month,
                            'currencyCode' => $request->currency_code_det,
                            'claimCode' => $request->claim_code_det,
                            'maxLimitPerYear' => (int) $request->limit_per_year,
                            'maxPctOfSalaryPerYear' => (int) $request->limit_per_year_salary,
                            'additionalLimitForWife' => (int) $request->additional_for_wife,
                            'additionalLimitForChild1' => (int) $request->additional_for_child1,
                            'additionalLimitForChild2' => (int) $request->additional_for_child2,
                            'additionalLimitForChild3' => (int) $request->additional_for_child3,
                            'additionalLimitForChild4' => (int) $request->additional_for_child4,
                            'additionalLimitForChild5' => (int) $request->additional_for_child5,
                            'maxLimitPerClaim' => (int) $request->limit_per_claim,
                            'maxPctOfSalaryPerClaim' => (int) $request->limit_per_claim_salary,
                            'maxLimitPerMonthForSingleEmployee' => (int) $request->for_single_employee,
                            'maxPctOfSalaryPerMonthForSingleEmployee' => (int) $request->for_single_employee_salary,
                            'maxLimitPerMonthForMarriedEmployee' => (int) $request->for_married_employee,
                            'maxPctOfSalaryPerMonthForMarriedEmployee' => (int) $request->for_married_employee_salary,
                            'flagLimitByFrequency' => ($request->check_limit_by_frequency == "true") ? (bool) $request->check_limit_by_frequency : false,
                            'frequencyClaim' => (int) $request->claim_frequency,
                            'frequencyClaimPeriod' => (int) $request->claim_frequency_year,
                            'negativeTolerancePercentage' => (int) $request->minus_percentage,
                            'positiveTolerancePercentage' => (int) $request->plus_percentage,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
            else {
                $response = $client->put(env('API_URL') . '/mdcompanyinputlimit/updatemdcompanyinputlimit',
                    ['body' => json_encode(
                        [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => isset($request->position_det) ? $request->position_det : '',
                            'rankingCode' => isset($request->ranking_det) ? $request->ranking_det : '',
                            'serviceMonth' => (int) $request->service_month,
                            'currencyCode' => $request->currency_code_det,
                            'claimCode' => $request->claim_code_det,
                            'maxLimitPerYear' => (int) $request->limit_per_year,
                            'maxPctOfSalaryPerYear' => (int) $request->limit_per_year_salary,
                            'additionalLimitForWife' => (int) $request->additional_for_wife,
                            'additionalLimitForChild1' => (int) $request->additional_for_child1,
                            'additionalLimitForChild2' => (int) $request->additional_for_child2,
                            'additionalLimitForChild3' => (int) $request->additional_for_child3,
                            'additionalLimitForChild4' => (int) $request->additional_for_child4,
                            'additionalLimitForChild5' => (int) $request->additional_for_child5,
                            'maxLimitPerClaim' => (int) $request->limit_per_claim,
                            'maxPctOfSalaryPerClaim' => (int) $request->limit_per_claim_salary,
                            'maxLimitPerMonthForSingleEmployee' => (int) $request->for_single_employee,
                            'maxPctOfSalaryPerMonthForSingleEmployee' => (int) $request->for_single_employee_salary,
                            'maxLimitPerMonthForMarriedEmployee' => (int) $request->for_married_employee,
                            'maxPctOfSalaryPerMonthForMarriedEmployee' => (int) $request->for_married_employee_salary,
                            'flagLimitByFrequency' => ($request->check_limit_by_frequency == "true") ? (bool) $request->check_limit_by_frequency : false,
                            'frequencyClaim' => (int) $request->claim_frequency,
                            'frequencyClaimPeriod' => (int) $request->claim_frequency_year,
                            'negativeTolerancePercentage' => (int) $request->minus_percentage,
                            'positiveTolerancePercentage' => (int) $request->plus_percentage,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
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

    public function prosesInputPersonnelLimitMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            

            if ($request->record_function === 'New') {
                if($request->input_type == "one"){
                    $response = $client->post(env('API_URL') . '/inputpersonnellimit/insertpersonnellimit',
                        ['body' => json_encode(
                            [
                                'recordStatus' => "A",
                                'companyCode' => Session::get('companyCode'),
                                'employeeNo' => $request->employee_no_det,
                                'claimCode' => $request->claim_code_det,
                                'expiredDate' => $request->expired_date,
                                'maxLimitPerYear' => (int) $request->max_limit_per_year,
                                'maxLimitPerClaim' => (int) $request->max_limit_per_claim,
                                'maxLimitPerMonth' => (int) $request->max_limit_per_month,
                                "changedNo" => 0,
                                "changedBy" => Session::get('userID'),
                                "changedDate" => date("Y-m-d\TH:i:s"),
                                "createdBy" => Session::get('userID'),
                                "createdDate" => date("Y-m-d\TH:i:s"),
                                "languageCode" => App::getLocale(),
                                "sessionID" => 0,
                                "sessionUserID" => Session::get('userID'),
                                "sessionCompanyCode" => Session::get('companyCode'),
                                "logActionUserID" => Session::get('userID'),
                                "logActionUsername" => Session::get('userID')
                            ]
                        )]
                    );
                }else{
                    $response = $client->post(env('API_URL') . '/inputpersonnellimit/insertpersonnellimitforallemployee',
                        ['body' => json_encode(
                            [
                                'recordStatus' => "A",
                                'companyCode' => Session::get('companyCode'),
                                'processDate' => $request->process_date,
                                'claimCode' => $request->claim_code_det,
                                'expiredDate' => $request->expired_date,
                                'maxLimitPerYear' => (int) $request->max_limit_per_year,
                                'maxLimitPerClaim' => (int) $request->max_limit_per_claim,
                                'maxLimitPerMonth' => (int) $request->max_limit_per_month,
                                "changedNo" => 0,
                                "changedBy" => Session::get('userID'),
                                "changedDate" => date("Y-m-d\TH:i:s"),
                                "createdBy" => Session::get('userID'),
                                "createdDate" => date("Y-m-d\TH:i:s"),
                                "languageCode" => App::getLocale(),
                                "sessionID" => 0,
                                "sessionUserID" => Session::get('userID'),
                                "sessionCompanyCode" => Session::get('companyCode'),
                                "logActionUserID" => Session::get('userID'),
                                "logActionUsername" => Session::get('userID')
                            ]
                        )]
                    );
                }
            } else {
                $response = $client->put(env('API_URL') . '/inputpersonnellimit/updatepersonnellimit',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employee_no_det,
                            'claimCode' => $request->claim_code_det,
                            'expiredDate' => $request->expired_date,
                            'maxLimitPerYear' => (int) $request->max_limit_per_year,
                            'maxLimitPerClaim' => (int) $request->max_limit_per_claim,
                            'maxLimitPerMonth' => (int) $request->max_limit_per_month,
                            "changedNo" => 0,
                            "languageCode" => App::getLocale(),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            "sessionID" => 0,
                            "sessionUserID" => Session::get('userID'),
                            "sessionCompanyCode" => Session::get('companyCode'),
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

    public function prosesTreatmentEligibilityMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/mdcompanyeligibility/insertmdcompanyeligibility',
                    ['body' => json_encode(
                        [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => isset($request->position) ? $request->position : '',
                            'rankingCode' => isset($request->ranking) ? $request->ranking : '',
                            'serviceMonth' => (int) $request->service_month,
                            'claimCode' => $request->claim_code,
                            'minAge' => (int) $request->minimum_age,
                            'paymentPctForEmployee' => (int) $request->payment_for_employee,
                            'paymentPctForFamily' => (int) $request->payment_for_family,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }
            else {
                $response = $client->put(env('API_URL') . '/mdcompanyeligibility/updatemdcompanyeligibility',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => isset($request->position) ? $request->position : '',
                            'rankingCode' => isset($request->ranking) ? $request->ranking : '',
                            'serviceMonth' => (int) $request->service_month,
                            'claimCode' => $request->claim_code,
                            'minAge' => (int) $request->minimum_age,
                            'paymentPctForEmployee' => (int) $request->payment_for_employee,
                            'paymentPctForFamily' => (int) $request->payment_for_family,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
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

    public function prosesClaimListMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $claimStatus = [];
            if($request->check_claim_status_not_processed == "true"){
                $claimStatus[] = 'N';
            }
            if($request->check_claim_status_rejected == "true"){
                $claimStatus[] = 'R';
            }
            if($request->check_claim_status_accepted == "true"){
                $claimStatus[] = 'A';
            }
            if($request->check_claim_status_full_paid == "true"){
                $claimStatus[] = 'P';
            }

            $response = $client->post(env('API_URL') . '/mdclaimlist/getclaimlist',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNoFrom' => $request->employee_no_from,
                        'employeeNoTo' => $request->employee_no_to,
                        'claimDateFrom' => $request->claim_date_from,
                        'claimDateTo' => $request->claim_date_to,
                        'claimStatus' => $claimStatus,
                        "languageCode" => App::getLocale(),
                        "sessionID" => 0,
                        "sessionUserID" => Session::get('userID')
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

        return response()->json($arrResult->dataListSet);
        // if($arrResult->dataListSet == null){
        //     return Datatables::of([])->make(true);
        // }else{
        //     return Datatables::of($arrResult->dataListSet)->make(true);
        // }
    }

    public function prosesClaimTransactionMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/mdclaimtransaction/insertclaimtransaction',
                    ['body' => json_encode(
                        [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employee_no_det,
                            'claimDate' => $request->claim_date,
                            'seqNo' => (int) $request->seq_no,
                            'receiptDate' => $request->receipt_date,
                            'claimTo' => $request->claim_to ,
                            'claimCode' => $request->claim_code,
                            'claimFor' => $request->claim_for,
                            'dependentName' => $request->dependent_name,
                            'claimCurrencyCode' => $request->claim_currency,
                            'claimAmount' => (int) $request->claim_amount,
                            'diseaseCode' => $request->disease_code,
                            'claimRemarks' => $request->claim_remarks,
                            'claimStatus' => $request->claim_status,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/mdclaimtransaction/updateclaimtransaction',
                    ['body' => json_encode(
                        [
                            'recordStatus' => 'A',
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employee_no_det,
                            'claimDate' => $request->claim_date,
                            'seqNo' => (int) $request->seq_no,
                            'receiptDate' => $request->receipt_date,
                            'claimTo' => $request->claim_to ,
                            'claimCode' => $request->claim_code,
                            'claimFor' => $request->claim_for,
                            'dependentName' => $request->dependent_name,
                            'claimCurrencyCode' => $request->claim_currency,
                            'claimAmount' => (int) $request->claim_amount,
                            'diseaseCode' => $request->disease_code,
                            'claimRemarks' => $request->claim_remarks,
                            'claimStatus' => $request->claim_status,
                            "changedNo" => 0,
                            "changedBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "languageCode" => App::getLocale(),
                            "sessionID" => 0,
                            "sessionCompanyCode" => Session::get('companyCode'),
                            "sessionUserID" => Session::get('userID'),
                            "logActionUserID" => Session::get('userID'),
                            "logActionUsername" => Session::get('userID')
                        ]
                    )]
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

    public function printMedicalFacilityUsedReport(Request $request){
        $dataLevel = [];

        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                "reportType" => $request->report_type,
                "claimTo" => $request->claim_to,
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

            if(!empty($request->period_payment_from) || !empty($request->period_payment_to)){
                $param['periodPaymentFrom'] = $request->period_payment_from;
                $param['periodPaymentTo'] = $request->period_payment_to;
            }

            if(!empty($request->currency_code_from) || !empty($request->currency_code_to)){
                $param['currencyCodeFrom'] = $request->currency_code_from;
                $param['currencyCodeTo'] = $request->currency_code_to;
            }
    
            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizedCodeFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizedCodeTo'] = (int) $request->group_authorized_code_to;
            }

            if(!empty($request->claim_code_from) || !empty($request->claim_code_to)){
                $param['claimCodeFrom'] = $request->claim_code_from;
                $param['claimCodeTo'] = $request->claim_code_to;
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

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/mdfacilityusedreport/getmedicalfacilityusedreport', [
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('medical.md_export_medical_facility_used_report', ['data' => [], 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false, 'type' => $request->report_type, 'period' => date('d M Y', strtotime($request->period_payment_from)) . ' - ' . date('d M Y', strtotime($request->period_payment_to))])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Medical Facility Used ' . ucfirst($request->report_type) . '.pdf');
        }else{
            $pdf = PDF::loadView('medical.md_export_medical_facility_used_report', ['data' => $arrResult->dataListSet, 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false, 'type' => $request->report_type, 'period' => date('d M Y', strtotime($request->period_payment_from)) . ' - ' . date('d M Y', strtotime($request->period_payment_to))])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Medical Facility Used ' . ucfirst($request->report_type) . '.pdf');
        }
    }

    public function printMedicalFacilityUsedReportExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new MedicalFacilityUsedReportExport(
            $request->report_type,
            isset($request->grand_total) ? (bool) $request->grand_total : false, 
            $request->employee_no_from,
            $request->employee_no_to,
            $request->claim_code_from,
            $request->claim_code_to,
            $request->claim_to,
            $request->period_payment_from,
            $request->period_payment_to,
            $request->currency_code_from,
            $request->currency_code_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to,
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Medical Facility Used Report.xlsx'
        );
    }

    public function printDiseaseReport(Request $request){
        $dataLevel = [];

        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                "reportType" => $request->report_type,
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

            if(!empty($request->period_claim_from) || !empty($request->period_claim_to)){
                $param['periodClaimFrom'] = $request->period_claim_from;
                $param['periodClaimTo'] = $request->period_claim_to;
            }
    
            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizedCodeFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizedCodeTo'] = (int) $request->group_authorized_code_to;
            }

            if(!empty($request->disease_from) || !empty($request->disease_to)){
                $param['diseaseFrom'] = $request->disease_from;
                $param['diseaseTo'] = $request->disease_to;
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

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/mddiseasesreport/getdiseasereport', [
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            if($request->report_type == 'detail'){
                $pdf = PDF::loadView('medical.md_export_disease_detail_report', ['data' => [], 'data_company' => $arrCompany->dataListSet, 'type' => $request->report_type, 'period' => date('d M Y', strtotime($request->period_claim_from)) . ' - ' . date('d M Y', strtotime($request->period_claim_to))])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
                return $pdf->stream(ucfirst($request->report_type) . ' Disease Report.pdf');
            }else{
                $pdf = PDF::loadView('medical.md_export_disease_summary_report', ['data' => [], 'data_company' => $arrCompany->dataListSet, 'type' => $request->report_type, 'period' => date('d M Y', strtotime($request->period_claim_from)) . ' - ' . date('d M Y', strtotime($request->period_claim_to))])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
                return $pdf->stream(ucfirst($request->report_type) . ' Disease Report.pdf');
            }
        }else{
            if($request->report_type == 'detail'){
                $pdf = PDF::loadView('medical.md_export_disease_detail_report', ['data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'type' => $request->report_type, 'period' => date('d M Y', strtotime($request->period_claim_from)) . ' - ' . date('d M Y', strtotime($request->period_claim_to))])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
                return $pdf->stream(ucfirst($request->report_type) . ' Disease Report.pdf');
            }else{
                $pdf = PDF::loadView('medical.md_export_disease_summary_report', ['data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'type' => $request->report_type, 'period' => date('d M Y', strtotime($request->period_claim_from)) . ' - ' . date('d M Y', strtotime($request->period_claim_to))])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
                return $pdf->stream(ucfirst($request->report_type) . ' Disease Report.pdf');
            }
        }
    }

    public function printDiseaseReportExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new DiseaseReportExport(
            $request->report_type,
            $request->employee_no_from,
            $request->employee_no_to,
            $request->disease_from,
            $request->disease_to,
            $request->period_claim_from,
            $request->period_claim_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to,
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Disease Report.xlsx'
        );
    }

    public function printClaimReport(Request $request){
        $dataLevel = [];

        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                "sortByAmount" => isset($request->sort_by_amount) ? (bool) $request->sort_by_amount : false,
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

            if(!empty($request->claim_date_from) || !empty($request->claim_date_to)){
                $param['claimDateFrom'] = $request->claim_date_from;
                $param['claimDateTo'] = $request->claim_date_to;
            }
    
            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizedCodeFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizedCodeTo'] = (int) $request->group_authorized_code_to;
            }

            if(!empty($request->currency_code_from) || !empty($request->currency_code_to)){
                $param['currencyCodeFrom'] = $request->currency_code_from;
                $param['currencyCodeTo'] = $request->currency_code_to;
            }

            if(!empty($request->claim_code_from) || !empty($request->claim_code_to)){
                $param['claimCodeFrom'] = $request->claim_code_from;
                $param['claimCodeTo'] = $request->claim_code_to;
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

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/mdclaimreport/getclaimreport', [
                'body' => json_encode($param)
            ]);

            $responseGetCompany = $client->post(env('API_URL').'/personel/Company/getcompany', [
                'body' => json_encode($paramGetCompany)
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
        $arrCompany = json_decode($responseGetCompany->getBody()->getContents());

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('medical.md_export_medical_claim_report', ['data' => [], 'data_company' => $arrCompany->dataListSet, 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Medical Claim Report.pdf');
        }else{
            $pdf = PDF::loadView('medical.md_export_medical_claim_report', ['data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Medical Claim Report.pdf');
        }
    }

    public function printClaimReportExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new MedicalClaimReportExport(
            isset($request->grand_total) ? (bool) $request->grand_total : false, 
            $request->employee_no_from,
            $request->employee_no_to,
            $request->claim_code_from,
            $request->claim_code_to,
            $request->claim_date_from,
            $request->claim_date_to,
            $request->currency_code_from,
            $request->currency_code_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to,
            isset($request->sort_by_amount) ? (bool) $request->sort_by_amount : false, 
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Medical Claim Report.xlsx'
        );
    }

    public function printRemainingMedicalLimitReportExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new RemainingMedicalLimitReportExport(
            isset($request->grand_total) ? (bool) $request->grand_total : false, 
            isset($request->include_resign) ? (bool) $request->include_resign : false, 
            $request->employee_no_from,
            $request->employee_no_to,
            $request->claim_code_from,
            $request->claim_code_to,
            $request->currency_code_from,
            $request->currency_code_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to,
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Remaining Medical Limit Report.xlsx'
        );
    }

    public function printClaimPaymentTransactionReportSlipExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new ClaimPaymentTransactionReportSlipExport(
            $request->employee_no_from,
            $request->employee_no_to,
            $request->payment_date_from,
            $request->payment_date_to,
            $request->currency_code_from,
            $request->currency_code_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to,
            $request->report_type,
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Claim Payment Transaction Report and Slip.xlsx'
        );
    }

    public function printOutstandingClaimReport(Request $request){
        $dataLevel = [];

        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            for($i = 0; $i < $request->level_format; $i++){
                $dataLevel[] = $request->{'level' . ($i+1)};
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                "claimFor" => $request->claim_for,
                "claimTo" => $request->claim_to,
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

            if(!empty($request->insurance_code_from) || !empty($request->insurance_code_to)){
                $param['insuranceCodeFrom'] = $request->insurance_code_from;
                $param['insuranceCodeTo'] = $request->insurance_code_to;
            }

            if(!empty($request->insurance_class_from) || !empty($request->insurance_class_to)){
                $param['insuranceClassFrom'] = $request->insurance_class_from;
                $param['insuranceClassTo'] = $request->insurance_class_to;
            }

            if(!empty($request->claim_code_from) || !empty($request->claim_code_to)){
                $param['claimCodeFrom'] = $request->claim_code_from;
                $param['claimCodeTo'] = $request->claim_code_to;
            }

            if(!empty($request->currency_code_from) || !empty($request->currency_code_to)){
                $param['currencyCodeFrom'] = $request->currency_code_from;
                $param['currencyCodeTo'] = $request->currency_code_to;
            }
    
            if(!empty($request->group_authorized_code_from) || !empty($request->group_authorized_code_to)){
                $param['groupAuthorizeCodeFrom'] = (int) $request->group_authorized_code_from;
                $param['groupAuthorizeCodeTo'] = (int) $request->group_authorized_code_to;
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

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL').'/mdoutstandingclaimreport/getmdoutstandingclaimreport', [
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

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('medical.md_export_outstanding_claim_report', ['data' => [], 'data_company' => $arrCompany->dataListSet, 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false, 'claim_to' => $request->claim_to])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Outstanding Claim Report.pdf');
        }else{
            $pdf = PDF::loadView('medical.md_export_outstanding_claim_report', ['data' => $arrResult->dataListSet, 'data_company' => $arrCompany->dataListSet, 'grand_total' => isset($request->grand_total) ? (bool) $request->grand_total : false, 'claim_to' => $request->claim_to])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Outstanding Claim Report.pdf');
        }
    }

    public function printOutstandingClaimReportExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new OutstandingClaimReportExport(
            $request->employee_no_from,
            $request->employee_no_to,
            isset($request->grand_total) ? (bool) $request->grand_total : false, 
            $request->insurance_code_from,
            $request->insurance_code_to,
            $request->insurance_class_from,
            $request->insurance_class_to,
            $request->claim_code_from,
            $request->claim_code_to,
            $request->claim_for,
            $request->claim_to,
            $request->currency_code_from,
            $request->currency_code_to,
            $request->group_authorized_code_from,
            $request->group_authorized_code_to,
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Outstanding Claim Report.xlsx'
        );
    }

    public function printTransferPaymentToExcelMonthlyExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new TransferPaymentToExcelMonthlyExport(
            $request->period,
            $request->employee_no_from,
            $request->employee_no_to,
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Transfer Payment To Excel Monthly.xlsx'
        );
    }

    public function printTransferPaymentToExcelRemainingLimitExcel(Request $request){
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new TransferPaymentToExcelRemainingLimitExport(
            $request->period,
            $request->claim_code_from,
            $request->claim_code_to,
            isset($request->include_resign) ? (bool) $request->include_resign : false, 
            $request->position,
            $request->ranking,
            $request->location,
            $dataLevel),
            'Transfer Payment To Excel Remaining Limit.xlsx'
        );
    }

    public function statusClaimCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/ClaimCode/UpdateClaimCode',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'claimCode' => $request->claimCode,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        "sessionCompanyCode" => Session::get('companyCode'),
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

    public function statusDiseaseCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/DiseaseCode/UpdateDiseaseCode',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'diseaseCode' => $request->diseaseCode,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        "sessionCompanyCode" => Session::get('companyCode'),
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

    public function statusInsuranceCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/cdinsurance/updatecdinsurance',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'insuranceCode' => $request->insuranceCode,
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

    public function statusInsuranceClassMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/cdinsuranceclass/updatecdinsuranceclass',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'insuranceClassCode' => $request->insuranceClassCode,
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

    public function statusInputLimitMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mdcompanyinputlimit/updatemdcompanyinputlimit',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'positionCode' => isset($request->positionCode) ? $request->positionCode : '',
                        'rankingCode' => isset($request->rankingCode) ? $request->rankingCode : '',
                        'serviceMonth' => (int) $request->serviceMonth,
                        'claimCode' => $request->claimCode,
                        'currencyCode' => $request->currencyCode,
                        "changedNo" => 0,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'sessionCompanyCode' => Session::get('companyCode'),
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

    public function statusInputPersonnelLimitMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/inputpersonnellimit/updatepersonnellimit',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'claimCode' => $request->claimCode,
                        'expiredDate' => $request->expiredDate,
                        "changedNo" => 0,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'sessionCompanyCode' => Session::get('companyCode'),
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

    public function statusTreatmentEligibilityMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mdcompanyeligibility/updatemdcompanyeligibility',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'positionCode' => isset($request->positionCode) ? $request->positionCode : '',
                        'rankingCode' => isset($request->rankingCode) ? $request->rankingCode : '',
                        'serviceMonth' => (int) $request->serviceMonth,
                        'claimCode' => $request->claimCode,
                        "changedNo" => 0,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                        'sessionCompanyCode' => Session::get('companyCode'),
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

    public function checkNumberClaimTransactionMedical(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->employeeNo)){
                $response = $client->post(env('API_URL') . "/claimtransaction/getclaimtransaction",
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'claimDate' => $request->claimDate,
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
}
