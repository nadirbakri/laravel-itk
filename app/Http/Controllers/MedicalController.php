<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use File;
use DataTables;
use Excel;

class MedicalController extends Controller
{
    public function pageMedical() 
    {
        return view ('medical.md_main');
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencemedical/getreferencemedical',
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

    public function tableClaimCodeMD()
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/claimcode/getclaimcode',
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/diseasecode/getdiseasecode',
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

    public function dataDetailClaimCodeMD(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/claimcode/getclaimcode',
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/diseasecode/getdiseasecode',
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

    public function dataDetailInputPersonnelLimit(Request $request)
    {
        try {
            $client = new Client([
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response_ref = $client->post(env('API_URL') . '/referencemedical/getreferencemedical',
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
        
        if($arrResult->dataListSet == null){
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('medical.md_treatment_eligibility_detail', ['data' => $data, 'data_ref' => $data_ref, 'func' => $request->func]);
    }

    public function prosesClaimCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/claimcode/insertclaimcode',
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
                            "flagAllowClaimForInsurance" => isset($request->check_allow_claim_to_insurance) ? (bool) $request->check_allow_claim_to_insurance : false,
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
                $response = $client->put(env('API_URL') . '/claimcode/updateclaimcode',
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
                            "flagAllowClaimForInsurance" => isset($request->check_allow_claim_to_insurance) ? (bool) $request->check_allow_claim_to_insurance : false,
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/diseasecode/insertdiseasecode',
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
                $response = $client->put(env('API_URL') . '/diseasecode/updatediseasecode',
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->record_function === 'New') {
                $response = $client->post(env('API_URL') . '/referencemedical/insertreferencemedical',
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
                $response = $client->put(env('API_URL') . '/referencemedical/updatereferencemedical',
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

    public function prosesInputPersonnelLimitMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

    public function statusClaimCodeMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/claimcode/updateclaimcode',
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/diseasecode/updatediseasecode',
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

    public function statusInputPersonnelLimitMD(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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
}
