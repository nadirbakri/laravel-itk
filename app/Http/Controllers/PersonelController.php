<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', 180);

use App\Exports\EmployeeListExport;
use App\Exports\EmployeeReportByStatusExport;
use App\Exports\EmployeeTurnOverReportExport;
use App\Exports\EmployeeSkillReportExport;
use App\Exports\CustomReportEmployeeExport;
use App\Exports\EmployeeDependentsExport;
use App\Exports\EmployeeCardExport;
use App\Exports\PersonalDataExport;
use App\Exports\PersonalDataTemplateExport;
use App\Imports\PersonalDataImport;
use App\Imports\PersonalDataUpdateImport;
use App\Imports\PersonalDataSheetImport;
use App\Exports\MasterDataTemplateExport;
use App\Imports\LevelDataImport;
use App\Imports\CostCenterDataImport;
use App\Imports\LocationDataImport;
use App\Imports\PositionDataImport;
use App\Imports\RankingDataImport;
use App\Imports\GradeDataImport;
use App\Imports\GroupDataImport;
use App\Imports\NatureofWorkDataImport;
use App\Imports\InstitutionDataImport;
use App\Imports\MajorDataImport;
use App\Imports\CityDataImport;
use App\Imports\ZipCodeDataImport;
use App\Imports\AccountDataImport;
use App\Imports\JournalTemplateDataImport;

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
use PhpParser\Node\NullableType;

class PersonelController extends Controller
{
    public function pagePersonelMain(Request $request)
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
            return view ('personel.personel_main', ['dataMenu' => [], 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess([], null)]);
        }else{
            return view ('personel.personel_main', ['dataMenu' => $arrResult->dataListSet, 'dataParent' => \App\Helpers\ArrayHelper::getKeysWithParentIDAndAllowAccess($arrResult->dataListSet, null)]);
        }

        // return view('personel.personel_main');
    }

    public function pagePersonalDataPersonel()
    {
    	return view('personel.personel_personal_data');
    }

    public function pagePerformancePersonel()
    {
    	return view('personel.personel_employee_performance');
    }

    public function pageWorkDetailPersonel()
    {
    	return view('personel.personel_work_detail');
    }

    public function pageCompetencyPersonel()
    {
        return view('personel.personel_competency');
    }

    public function pageOtherInformationPersonel()
    {
        return view('personel.personel_other_information');
    }

    public function pagePayrollDataPersonel()
    {
        return view('personel.personel_payroll_data');
    }

    public function pageEmployeeApprovalPersonel()
    {
        return view('personel.personel_employee_approval');
    }

    public function pageEmployeeAttachmentPersonel()
    {
        return view('personel.personel_employee_attachment');
    }

    public function pageImportExportPersonel()
    {
         return view('personel.personel_import_export_personal_data');
    }

    public function pageImportMasterDataPersonel()
    {
         return view('personel.personel_import_master_data');
    }

    public function pageImportUpdatePersonel()
    {
         return view('personel.personel_import_update_personal_data');
    }

    public function pageEmployeeMutationPersonel()
    {
        return view('personel.personel_employee_mutation');
    }

    public function pageNPWPMutationPersonel()
    {
        return view('personel.personel_npwp_mutation');
    }

    public function pageTerminationDataEntryPersonel()
    {
        return view('personel.personel_termination_data_entry');
    }

    public function pageAwardDataEntryPersonel()
    {
        return view('personel.personel_award_data_entry');
    }

    public function pageEvaluationDataEntryPersonel()
    {
        return view('personel.personel_evaluation_data_entry');
    }

    public function pageSanctionDataEntryPersonel()
    {
        return view('personel.personel_sanction_data_entry');
    }

    public function pagePrintLetterPersonel()
    {
        return view('personel.personel_print_letter');
    }

    public function pagePersonelReferencePersonel()
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ReferencePersonnel/getReferencePersonnel',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_level = $client->post(env('API_URL') . '/personel/LevelMaster/getLevelMaster',
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
        $arrResult_level = json_decode($response_level->getBody()->getContents());  

        // var_dump($arrResult->dataListSet[0]->levelMaster);

        return view('personel.personel_personel_reference', ['data' => $arrResult->dataListSet, 'data_level' => $arrResult_level->dataListSet]);
    }

    public function pageDataFormatPersonel()
    {
        return view('personel.personel_data_format');
    }

    public function pageLevelPersonel()
    {
        return view('personel.personel_level');
    }

    public function pageSourceDocumentPersonel()
    {
        return view('personel.personel_source_document');
    }

    public function pageFormatDocumentPersonel()
    {
        return view('personel.personel_format_document');
    }

    public function pageJobDescriptionPersonel()
    {
        return view('personel.personel_job_description');
    }

    public function pageCostCenterCodePersonel()
    {
        return view('personel.personel_cost_center_code');
    }

    public function pageLocationCodePersonel()
    {
        return view('personel.personel_location_code');
    }

    public function pagePositionPersonel()
    {
        return view('personel.personel_position');
    }

    public function pageRankingPersonel()
    {
        return view('personel.personel_ranking_code');
    }

    public function pageGradeCodePersonel()
    {
        return view('personel.personel_grade_code');
    }

    public function pageGroupPersonel()
    {
        return view('personel.personel_group_code');
    }

    public function pageNatureofWorkPersonel()
    {
        return view('personel.personel_nature_of_work');
    }

    public function pageBPJSGroupPersonel()
    {
        return view('personel.personel_bpjs_group');
    }

    public function pageNPWPGroupPersonel()
    {
        return view('personel.personel_npwp_group');
    }

    public function pageBankPersonel()
    {
        return view('personel.personel_bank_code');
    }

    public function pageCompanyBankPersonel()
    {
        return view('personel.personel_company_bank');
    }

    public function pageSourceBankPersonel()
    {
        return view('personel.personel_source_bank');
    }

    public function pageTransferBankPersonel()
    {
        return view('personel.personel_transfer_bank');
    }

    public function pageCurrencyCodePersonel()
    {
        return view('personel.personel_currency_code');
    }

    public function pageRateTypePersonel()
    {
        return view('personel.personel_rate_type');
    }

    public function pageExchangeRatePersonel()
    {
        return view('personel.personel_exchange_rate');
    }

    public function pageEducationCodePersonel()
    {
        return view('personel.personel_education_code');
    }

    public function pageEducationStatusCodePersonel()
    {
        return view('personel.personel_education_status_code');
    }

    public function pageInstitutionPersonel()
    {
        return view('personel.personel_institution_code');
    }

    public function pageMajorPersonel()
    {
        return view('personel.personel_major_code');
    }

    public function pageTypeofCoursePersonel()
    {
        return view('personel.personel_type_of_course_code');
    }

    public function pageLanguageCodePersonel()
    {
        return view('personel.personel_language_code');
    }

    public function pageLanguageAbilityCodePersonel()
    {
        return view('personel.personel_language_ability_code');
    }

    public function pageCityPersonel()
    {
        return view('personel.personel_city_code');
    }

    public function pageZipCodePersonel()
    {
        return view('personel.personel_zip_code');
    }

    public function pageInsuranceCodePersonel()
    {
        return view('personel.personel_insurance_code');
    }

    public function pageInsuranceClassCodePersonel()
    {
        return view('personel.personel_insurance_class_code');
    }

    public function pageTerminationCodePersonel()
    {
        return view('personel.personel_termination_code');
    }

    public function pageDecreeCodePersonel()
    {
        return view('personel.personel_decree_code');
    }

    public function pageSanctionCodePersonel()
    {
        return view('personel.personel_sanction_code');
    }

    public function pageEvaluationFormPersonel()
    {
        return view('personel.personel_evaluation_code');
    }

    public function pageTitlePersonel()
    {
        return view('personel.personel_title_code');
    }

    public function pageNationalityCodePersonel()
    {
        return view('personel.personel_nationality_code');
    }

    public function pageReligionCodePersonel()
    {
        return view('personel.personel_religion_code');
    }

    public function pageLineofBusinessPersonel()
    {
        return view('personel.personel_line_of_business');
    }

    public function pageFringeBenefitsCodePersonel()
    {
        return view('personel.personel_fringe_benefits_code');
    }

    public function pageFinalPerformanceResultPersonel()
    {
        return view('personel.personel_final_performance_result_code');
    }

    public function pageSkillPersonel()
    {
        return view('personel.personel_skill_code');
    }

    public function pageAttachmentCodePersonel()
    {
        return view('personel.personel_attachment_code');
    }

    public function pageFreeFormatFieldPersonel()
    {
        return view('personel.personel_free_format_field');
    }

    public function pageFormatReportPersonel()
    {
        return view('personel.personel_format_report');
    }

    public function pageRelationCodePersonel()
    {
        return view('personel.personel_relation_code');
    }

    public function pageEmployeeListPersonel()
    {
        return view('personel.personel_employee_list');
    }

    public function pageEmployeeReportByStatusPersonel()
    {
        return view('personel.personel_employee_report_by_status');
    }

    public function pageEmployeeDependentsPersonel()
    {
        return view('personel.personel_employee_dependents');
    }

    public function pageEmployeeCardPersonel()
    {
        return view('personel.personel_employee_card');
    }

    public function pageCustomReportEmployeePersonel()
    {
        return view('personel.personel_custom_report_employee');
    }

    public function pageEmployeeNoticeReportPersonel()
    {
        return view('personel.personel_employee_notice_report');
    }

    public function pageEvaluationReportPersonel()
    {
        return view('personel.personel_evaluation_report');
    }

    public function pageEmployeeSkillReportPersonel()
    {
        return view('personel.personel_employee_skill_report');
    }

    public function pageEmployeeTurnOverReportPersonel()
    {
        return view('personel.personel_employee_turn_over_report');
    }

    public function tablePersonalDataPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAuthorizeCodeMax' => Session::get('groupAuthorizePersonnel'),
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

    public function tablePerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAuthorizeCodeMax' => Session::get('groupAuthorizePersonnel'),
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

    public function tableWorkDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAuthorizeCodeMax' => Session::get('groupAuthorizePersonnel'),
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

    public function tableCompetencyPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterGrid',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupAuthorizeCodeMax' => Session::get('groupAuthorizePersonnel'),
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

    public function tableOtherInformationPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'employee_no' => 1110002,
                    'employee_name' => 'Lina Sudrajat',
                    'level_one_name' => 'FINANCE ACCOUNTING INVESTMENT',
                    'group_authorization' => 'Staff'
                ],
                (object) [
                    'employee_no' => 1111111,
                    'employee_name' => 'Dodo',
                    'level_one_name' => 'HC/GAF/LEGAL',
                    'group_authorization' => 'Staff'
                ]
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tablePayrollDataPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'employee_no' => 1110002,
                    'employee_name' => 'Lina Sudrajat',
                    'level_one_name' => 'FINANCE ACCOUNTING INVESTMENT',
                    'group_authorization' => 'Staff'
                ],
                (object) [
                    'employee_no' => 1111111,
                    'employee_name' => 'Dodo',
                    'level_one_name' => 'HC/GAF/LEGAL',
                    'group_authorization' => 'Staff'
                ]
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableEmployeeApprovalPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/employeeapproval/getemployeeapprovallist',
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

    public function tableEmployeeAttachmentPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeAttachment/getPeAttachment',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function tableTerminationDataEntryPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'employee_no' => 1112003,
                    'employee_name' => 'Dony Putra',
                    'termination_date' => '10 Jul 2016',
                    'termination_code' => '01',
                    'special_reason' => 'False'
                ],
                (object) [
                    'employee_no' => 1201010,
                    'employee_name' => 'Fifi Aprilianti',
                    'termination_date' => '05 Dec 2016',
                    'termination_code' => '01',
                    'special_reason' => 'False'
                ]
            ]);
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
    }

    public function tableAwardDataEntryPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'employee_no' => 1110002,
                    'award_date' => '01 Feb 2016',
                    'award_type' => 'EMPLOYEE OF THE YEAR',
                    'award_name' => 'EMPLOYEE OF THE YEAR 2015',
                    'event_name' => 'INTIKOM BIRTHDAY'
                ]
            ]);
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
    }

    public function tableEvaluationDataEntryPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'employee_no' => 1110002,
                    'employee_name' => 'Lina Sudrajat',
                    'period_from' => 20121,
                    'period_to' => 20122,
                    'evaluation_date' => '04 Apr 2017',
                    'form_code' => '01',
                    'eval_id' => '41'
                ],
                (object) [
                    'employee_no' => 1110002,
                    'employee_name' => 'Lina Sudrajat',
                    'period_from' => 20181,
                    'period_to' => 20186,
                    'evaluation_date' => '29 Jun 2018',
                    'form_code' => '01',
                    'eval_id' => '42'
                ]
            ]);
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
    }

    public function tableSanctionDataEntryPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'employee_no' => 1201013,
                    'employee_name' => 'Kasiman',
                    'decree_code' => 'SK-HRD',
                    'decree_no' => 'SK-HRD/2015-23-SP1',
                    'decree_date' => '01 Jul 2015',
                    'sanction_code' => 'SP1',
                    'sanction_start_date' => '01 Jul 2015',
                    'sanction_end_date' => '31 Jul 2015',
                    'sanction_remarks' => 'Mangkir 3 Hari'
                ]
            ]);
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
    }

    public function tablePrintLetterPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/getlettermaster',
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
            foreach($arrResult->dataListSet as $value){
                $filename = Session::get('companyCode') . '_' . $value->letterType . '.docx';
                file_put_contents(public_path('letter_table_files/') . $filename, base64_decode($value->letter64));
                $value->letter64 = $filename;
            }

            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableLevelPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Level/getLevel',
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

    public function tableSourceDocumentPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/Personel/printletter/getlettertemplate',
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
            foreach($arrResult->dataListSet as $value){
                $filename = Session::get('companyCode') . '_' . $value->letterType . '.docx';
                file_put_contents(public_path('letter_template/') . $filename, base64_decode($value->letterFile64));
                $value->letterFile = $filename;
            }
            
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableFormatDocumentPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableJobDescriptionPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableCostCenterCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/CostCenter/getCostCenter',
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

    public function tableLocationCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Location/getLocation',
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

    public function tablePositionPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmPosition/getgmPosition',
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

    public function tableRankingPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmRanking/getgmRanking',
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

    public function tableGradeCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Grade/getGrade',
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

    public function tableGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Group/getGroup',
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

    public function tableNatureofWorkPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/WorkNature/getWorkNature',
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

    public function tableBPJSGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/BPJS/getBPJS',
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

    public function tableNPWPGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/NPWP/getNPWP',
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

    public function tableBankPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmBank/getGmBank',
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

    public function tableCompanyBankPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/CompanyBank/getCompanyBank',
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

    public function tableSourceBankPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableTransferBankPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableCurrencyCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'currency_code' => 'AUD',
                    'currency_description' => 'Australian Dollar',
                    'division' => 'N',
                    'sub_division' => 'N',
                    'rounding_method' => '0',
                    'decimal_point' => '0',
                    'status' => 'Active'
                ],
                (object) [
                    'currency_code' => 'IDR',
                    'currency_description' => 'Indonesia Rupiah',
                    'division' => 'N',
                    'sub_division' => 'N',
                    'rounding_method' => '0',
                    'decimal_point' => '0',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableRateTypePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'rate_type' => 'feee',
                    'rate_description' => 'feee',
                    'record_status' => 'Active'
                ],
                (object) [
                    'rate_type' => 'tes',
                    'rate_description' => 'tes',
                    'record_status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableExchangeRatePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableEducationCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'education_code' => 'D1',
                    'education_name' => 'Diploma Degree',
                    'status' => 'Active'
                ],
                (object) [
                    'education_code' => 'D3',
                    'education_name' => 'Diploma Degree',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableEducationStatusCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'education_status_code' => 'PASSED',
                    'education_status_description' => 'Certified',
                    'status' => 'Active'
                ],
                (object) [
                    'education_code' => 'NON',
                    'education_name' => 'NONE',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableInstitutionPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmInstitution/getgmInstitution',
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

    public function tableMajorPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmMajor/getgmMajor',
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

    public function tableTypeofCoursePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmCourseType/getgmCourseType',
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

    public function tableLanguageCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'language_code' => 'ENG',
                    'language_name' => 'English',
                    'record_status' => 'Active'
                ],
                (object) [
                    'language_code' => 'FRC',
                    'language_name' => 'French',
                    'record_status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableLanguageAbilityCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'language_ability_code' => 'EXCL',
                    'language_ability_description' => 'Excellent',
                    'status' => 'Active'
                ],
                (object) [
                    'language_ability_code' => 'FAIR',
                    'language_ability_description' => 'Fair',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableCityPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/City/getCity',
                ['body' => json_encode(
                    [
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

    public function tableZipCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
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

    public function tableInsuranceCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'insurance_code' => 'NONE',
                    'insurance_description' => 'NONE',
                    'record_status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableInsuranceClassCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'insurance_class_code' => 'NONE',
                    'insurance_class_description' => 'NONE',
                    'premium_per_year' => '0',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableTerminationCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'termination_code' => '01',
                    'termination_name' => 'Resign',
                    'report_code' => '',
                    'status' => 'Active'
                ],
                (object) [
                    'termination_code' => '02',
                    'termination_name' => 'End of Contract',
                    'report_code' => '',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableDecreeCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'decree_code' => '100',
                    'decree_name' => 'Interview',
                    'report_code' => '',
                    'status' => 'Active'
                ],
                (object) [
                    'decree_code' => '104',
                    'decree_name' => 'Karyawan',
                    'report_code' => '',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableSanctionCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'sanction_code' => 'NON',
                    'sanction_name' => 'Interview',
                    'status' => 'Active'
                ],
                (object) [
                    'sanction_code' => 'PHK',
                    'sanction_name' => 'Pemutusan Hubungan Kerja',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableEvaluationFormPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/EvaluationForm/getEvaluationForm',
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

    public function tableTitlePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmTitle/getgmTitle',
                ['body' => json_encode(
                    [
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

    public function tableNationalityCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'nationality_code' => 'WNA',
                    'nationality_name' => 'WNA',
                    'status' => 'Active'
                ],
                (object) [
                    'nationality_code' => 'WNI',
                    'nationality_name' => 'WNI',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableReligionCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'religion_code' => 'BU',
                    'religion_name' => 'Budhist',
                    'thr_date' => 'W',
                    'status' => 'Active'
                ],
                (object) [
                    'religion_code' => 'HI',
                    'religion_name' => 'Hinduist',
                    'thr_date' => 'I',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableLineofBusinessPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'line_of_business_code' => 'BANK',
                    'line_of_business_name' => 'BANKING',
                    'status' => 'Active'
                ],
                (object) [
                    'line_of_business_code' => 'CON',
                    'line_of_business_name' => 'CONSUMER GOODS',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableFringeBenefitsCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableFinalPerformanceResultPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmPerformanceResult/getGmPerformanceResult',
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

    public function tableSkillPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmSkill/getgmSkill',
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

    public function tableAttachmentCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'attachment_code' => 'BPJS',
                    'description' => 'Kartu BPJS'
                ],
                (object) [
                    'attachment_code' => 'KK',
                    'description' => 'Kartu Keluarga'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableFreeFormatFieldPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/freeformatfield/getgmfreeformatfield',
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

    public function tableFormatReportPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'report_code' => 'a',
                    'report_name' => 'a',
                    'font_size' => '7',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableRelationCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'relation_code' => '01',
                    'relation_description' => 'WIFE',
                    'relation_type' => 'W',
                    'status' => 'Active'
                ],
                (object) [
                    'relation_code' => '02',
                    'relation_description' => 'CHILD',
                    'relation_type' => 'I',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function dataDetailPersonalDataPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->employeeNo !== null) {
                $response = $client->post(env('API_URL') . '/personel/pemasterview/getpemasterview',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            'languageCode' => App::getLocale()
                        ]
                    )]
                );

                $response2 = $client->post(env('API_URL') . '/personel/PeMaster/getPeMasterDetail',
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

                $arrResult = json_decode($response->getBody()->getContents());
                $arrResult2 = json_decode($response2->getBody()->getContents());  

                if($arrResult->dataListSet == null){
                    $data = [];
                }
                else {
                    $data = $arrResult->dataListSet;
                    $data2 = $arrResult2->dataListSet;
                    // var_dump($data[0]->photo);
                    if ($data[0]->photo == null){
                        $filename = 'profile-picture.png';
                    }
                    else {
                        $filename = Session::get('companyCode') . '_' . $data[0]->employeeNo . '.jpg';
                        file_put_contents(("photo_profile/") . $filename, base64_decode($data[0]->photo));
                    }
                }

                if($arrResult2->dataListSet == null){
                    $data2 = [];
                }else{
                    $data2 = $arrResult2->dataListSet;
                }

                // dd($arrResult2->dataListSet);

                return view('personel.personel_personal_data_detail', ['data' => $data, 'data2' => $data2, 'photo' => $filename, 'func' => $request->func]);
            }

            else {
                $filename = 'profile-picture.png';
                return view('personel.personel_personal_data_detail', ['data' => '', 'data2' => '', 'photo' => $filename, 'func' => $request->func]);
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
    }

    public function dataDetailPerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->employeeNo !== null) {
                $response = $client->post(env('API_URL') . '/personel/user/getuserdetail',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            'languageCode' => App::getLocale()
                        ]
                    )]
                );

                $arrResult = json_decode($response->getBody()->getContents());  

                if($arrResult->dataListSet == null){
                    $data = [];
                }
                else {
                    $data = $arrResult->dataListSet;
                    // var_dump($data[0]->photo);
                    if ($data[0]->detailList[0]->photo == null){
                        $filename = 'profile-picture.png';
                    }
                    else {
                        $filename = Session::get('companyCode') . '_' . $data[0]->employeeNo . '.jpg';
                        file_put_contents(("photo_profile/") . $filename, base64_decode($data[0]->detailList[0]->photo));
                    }
                }

                return view('personel.personel_employee_performance_detail', ['data' => $data, 'photo' => $filename, 'func' => $request->func]);
            }

            else {
                $filename = 'profile-picture.png';
                return view('personel.personel_employee_performance_detail', ['data' => '', 'photo' => $filename]);
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
            $data = [];
        }else{
            $data = $arrResult->dataListSet;
        }

        return view('personel.personel_employee_performance_detail', ['data' => $data, 'photo' => '']);
    }

    public function dataDetailWorkDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if ($request->employeeNo !== null) {
                $response = $client->post(env('API_URL') . '/personel/user/getuserdetail',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employeeNo,
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            'languageCode' => App::getLocale()
                        ]
                    )]
                );

                $arrResult = json_decode($response->getBody()->getContents());  

                if($arrResult->dataListSet == null){
                    $data = [];
                }
                else {
                    $data = $arrResult->dataListSet;
                    // var_dump($data[0]->photo);
                    if ($data[0]->detailList[0]->photo == null){
                        $filename = 'profile-picture.png';
                    }
                    else {
                        $filename = Session::get('companyCode') . '_' . $data[0]->employeeNo . '.jpg';
                        file_put_contents(("photo_profile/") . $filename, base64_decode($data[0]->detailList[0]->photo));
                    }
                }

                return view('personel.personel_work_detail_detail', ['data' => $data, 'photo' => $filename, 'func' => $request->func]);
            }

            else {
                $filename = 'profile-picture.png';
                return view('personel.personel_work_detail_detail', ['data' => '', 'photo' => $filename]);
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

    public function dataDetailCompetencyPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/getuserdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

        return view('personel.personel_competency_detail', ['data' => $data, 'photo' => '']);
    }

    public function dataDetailOtherInformationPersonel(Request $request)
    {

        return view('personel.personel_other_information_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
    }

    public function dataDetailPayrollDataPersonel(Request $request)
    {

        return view('personel.personel_payroll_data_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
    }

    public function dataDetailEmployeeApprovalPersonel(Request $request)
    {

        return view('personel.personel_employee_approval_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
    }

    public function dataDetailEmployeeAttachmentPersonel(Request $request)
    {

        return view('personel.personel_employee_attachment_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
    }

    public function dataDetailLevelPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Level/getLevel',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'levelType' => $request->levelType,
                        'levelCode' => $request->levelCode,
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

        return view('personel.personel_level_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailSourceDocumentPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/getlettertemplate',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letterType,
                        'languageID' => $request->languageID,
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

        return view('personel.personel_source_document_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailFormatDocumentPersonel(Request $request)
    {

        return view('personel.personel_format_document_detail', ['document_code' => $request->document_code]);
    }

    public function dataDetailJobDescriptionPersonel(Request $request)
    {

        return view('personel.personel_job_description_detail', ['position_code' => $request->position_code]);
    }

    public function dataDetailCostCenterCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/CostCenter/getCostCenter',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'costCenterCode' => $request->costCenterCode,
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

        return view('personel.personel_cost_center_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailLocationCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Location/getLocation',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'locationCode' => $request->locationCode,
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

        return view('personel.personel_location_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailPositionPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmPosition/getgmPosition',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'positionCode' => $request->positionCode,
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

        return view('personel.personel_position_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailRankingPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmRanking/getgmRanking',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'rankingCode' => $request->rankingCode,
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

        return view('personel.personel_ranking_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailGradeCodePersonel(Request $request)
    {

        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Grade/getGrade',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'gradeCode' => $request->gradeCode,
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

        return view('personel.personel_grade_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/Group/getGroup',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'groupCode' => $request->groupCode,
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

        return view('personel.personel_group_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailNatureofWorkPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/WorkNature/getWorkNature',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'workNatureCode' => $request->workNatureCode,
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
        
        return view('personel.personel_nature_of_work_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);   
    }

    public function dataDetailBPJSGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/BPJS/getBPJS',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'bpjsCode' => $request->bpjsCode,
                        'bpjsNo' => $request->bpjsNo,
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
        
        return view('personel.personel_bpjs_group_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailNPWPGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/NPWP/getNPWP',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'npwpCode' => $request->npwpCode,
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
        
        return view('personel.personel_npwp_group_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailBankPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmBank/getGmBank',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'bankCode' => $request->bankCode,
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
        
        return view('personel.personel_bank_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailCompanyBankPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/CompanyBank/getCompanyBank',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'bankCode' => $request->bankCode,
                        'accountNo' => $request->accountNo,
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
        
        return view('personel.personel_company_bank_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailSourceBankPersonel(Request $request)
    {

        return view('personel.personel_source_bank_detail', ['source_bank_code' => $request->source_bank_code]);
    }

    public function dataDetailTransferBankPersonel(Request $request)
    {

        return view('personel.personel_transfer_bank_detail', ['source_bank_code' => $request->source_bank_code]);
    }

    public function dataDetailCurrencyCodePersonel(Request $request)
    {

        return view('personel.personel_currency_code_detail', ['currency_code' => $request->currency_code]);
    }

    public function dataDetailRateTypePersonel(Request $request)
    {

        return view('personel.personel_rate_type_detail', ['rate_type' => $request->rate_type]);
    }

    public function dataDetailExchangeRatePersonel(Request $request)
    {

        return view('personel.personel_exchange_rate_detail', ['currency_from' => $request->currency_from, 'currency_to' => $request->currency_to]);
    }

    public function dataDetailEducationCodePersonel(Request $request)
    {

        return view('personel.personel_education_code_detail', ['education_code' => $request->education_code]);
    }

    public function dataDetailEducationStatusCodePersonel(Request $request)
    {

        return view('personel.personel_education_status_code_detail', ['education_status_code' => $request->education_status_code]);
    }

    public function dataDetailInstitutionPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmInstitution/getgmInstitution',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'institutionCode' => $request->institutionCode,
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

        return view('personel.personel_institution_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);    }

    public function dataDetailMajorPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmMajor/getgmMajor',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'majorCode' => $request->majorCode,
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

        return view('personel.personel_major_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailTypeofCoursePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmCourseType/getgmCourseType',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'courseTypeCode' => $request->courseTypeCode,
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

        return view('personel.personel_type_of_course_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailLanguageCodePersonel(Request $request)
    {

        return view('personel.personel_language_code_detail', ['language_code' => $request->language_code]);
    }

    public function dataDetailLanguageAbilityCodePersonel(Request $request)
    {

        return view('personel.personel_language_ability_code_detail', ['language_ability_code' => $request->language_ability_code]);
    }

    public function dataDetailCityPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/City/getCity',
                ['body' => json_encode(
                    [
                        'cityCode' => $request->cityCode,
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
        
        return view('personel.personel_city_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailZipCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'zipCode' => $request->zipCode,
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
        
        return view('personel.personel_zip_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailInsuranceCodePersonel(Request $request)
    {

        return view('personel.personel_insurance_code_detail', ['insurance_code' => $request->insurance_code]);
    }

    public function dataDetailInsuranceClassCodePersonel(Request $request)
    {

        return view('personel.personel_insurance_class_code_detail', ['insurance_class_code' => $request->insurance_class_code]);
    }

    public function dataDetailTerminationCodePersonel(Request $request)
    {

        return view('personel.personel_termination_code_detail', ['termination_code' => $request->termination_code]);
    }

    public function dataDetailDecreeCodePersonel(Request $request)
    {

        return view('personel.personel_decree_code_detail', ['decree_code' => $request->decree_code]);
    }

    public function dataDetailSanctionCodePersonel(Request $request)
    {

        return view('personel.personel_sanction_code_detail', ['sanction_code' => $request->sanction_code]);
    }

    public function dataDetailEvaluationFormPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/EvaluationForm/getEvaluationForm',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->formCode,
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
        
        return view('personel.personel_evaluation_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailTitlePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmTitle/getgmTitle',
                ['body' => json_encode(
                    [
                        'titleCode' => $request->titleCode,
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

        return view('personel.personel_title_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailNationalityCodePersonel(Request $request)
    {

        return view('personel.personel_nationality_code_detail', ['nationality_code' => $request->nationality_code]);
    }

    public function dataDetailReligionCodePersonel(Request $request)
    {

        return view('personel.personel_religion_code_detail', ['religion_code' => $request->religion_code]);
    }

    public function dataDetailLineofBusinessPersonel(Request $request)
    {

        return view('personel.personel_line_of_business_detail', ['line_of_business_code' => $request->line_of_business_code]);
    }

    public function dataDetailFringeBenefitsCodePersonel(Request $request)
    {

        return view('personel.personel_fringe_benefits_code_detail', ['fringe_benefits_code' => $request->fringe_benefits_code]);
    }

    public function dataDetailSkillPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmSkill/getgmSkill',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'skillCode' => $request->skillCode,
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

        return view('personel.personel_skill_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailAttachmentCodePersonel(Request $request)
    {

        return view('personel.personel_attachment_code_detail', ['attachment_code' => $request->attachment_code]);
    }

    public function dataDetailFreeFormatFieldPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/freeformatfield/getgmfreeformatfield',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'freeFormatCode' => $request->freeFormatCode,
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

        return view('personel.personel_free_format_field_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailFormatReportPersonel(Request $request)
    {

        return view('personel.personel_format_report_detail', ['report_code' => $request->report_code]);
    }

    public function dataDetailRelationCodePersonel(Request $request)
    {

        return view('personel.personel_relation_code_detail', ['relation_code' => $request->relation_code]);
    }

    public function dataDetailFinalPerformanceResultPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmPerformanceResult/getGmPerformanceResult',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'sequenceNo' => (int) $request->sequenceNo,
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

        return view('personel.personel_final_performance_result_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailEmployeeMutationPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/MutationEmployee/getMutationView',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
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

        return response()->json($data);
    }

    public function dataDetailCityNamePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/City/getCity',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'cityCode' => $request->cityCode,
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

        return response()->json($data);
    }

    public function dataDetailZipCodeDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ZipCode/getZipCode',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'zipCode' => $request->zipCode,
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

        return response()->json($data);
    }

    public function tableFringeBenefitPersonalDataPersonel(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect();
            return Datatables::of($data)
            ->make(true);
        }
    }

    public function tableDependentPersonalDataPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeDependents/getPeDependents',
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

    public function tableAwardPerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeAward/getPeAward',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableSanctionPerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeSanction/getPeSanction',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableEvaluationPerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeEvaluation/getPeEvaluation',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableEvaluationFormPerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/EvaluationForm/getEvaluationDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->formCode,
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

        if(!isset($request->formCode)){
            return Datatables::of([])->make(true);
        }else{
            if($arrResult->dataListSet == null){
                return Datatables::of([])->make(true);
            }else{
                return Datatables::of($arrResult->dataListSet)->make(true);
            }
        }
    }

    public function tableJobHistoryWorkDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeMasterHistoryJob/getPeMasterHistoryJob',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'level' => [],
                        'userID' => Session::get('userID'),
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }   
    }

    public function tableWorkExperienceWorkDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeWorkExperience/getPeWorkExperience',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableFreeFormatFieldWorkDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeFreeFormat/getPeFreeFormat',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableCompetencyFormalEducationPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeEducation/getCompetencyEducationGridView',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'languageID' => strtoupper(App::getLocale()),
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

    public function tableCompetencyLanguagePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeLanguage/getCompetencyLanguageGridView',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'languageID' => strtoupper(App::getLocale()),
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

    public function tableCompetencyOrganizationPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeOrganization/getPeOrganization',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableCompetencyReferencePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeReference/getPeReference',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableCompetencySkillPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeSkill/getCompetencySkillGridView',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'languageID' => strtoupper(App::getLocale()),
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

    public function tableCompetencyProjectExperiencePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeProjectExperience/getPeProjectExperience',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableCompetencyTrainingListPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeTraining/getPeTraining',
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
        } catch (RequestException $e) {
            $response = $e->getResponse();
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

    public function tableOtherInformationFreeFormatFieldPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'description' => 'No Sepatu',
                    'value' => '38',
                ]
            ]);
            return Datatables::of($data)
            ->make(true);
        }
    }

    public function dataPrefixTitlePersonalDataPersonel(Request $request)
    {
        if ($request->ajax()) {
        	$data_detail = collect([
        		(object) [
        			'title_code' => 'A.Ma.',
        			'description' => 'Ahli Muda',
        		],
        		(object) [
        			'title_code' => 'A.Md.',
        			'description' => 'Ahli Madya',
        		],
        		(object) [
        			'title_code' => 'A.P.',
        			'description' => 'Ahli Pratama',
        		],
        		(object) [
        			'title_code' => 'M.AB.',
        			'description' => 'Magister Administrasi Bisnis',
        		],
        		(object) [
        			'title_code' => 'M.Ag.',
        			'description' => 'Magister Agama',
        		],
        		(object) [
        			'title_code' => 'M.Ak.',
        			'description' => 'Magister Akuntansi',
        		],
        		(object) [
        			'title_code' => 'M.AP.',
        			'description' => 'Magister Administrasi Publik',
        		],
        		(object) [
        			'title_code' => 'M.Cs.',
        			'description' => 'Magister of Computer Science',
        		],
        		(object) [
        			'title_code' => 'M.H.',
        			'description' => 'Magister Hukum',
        		],
        		(object) [
        			'title_code' => 'M.Hum.',
        			'description' => 'Magister Humaniora',
        		],
        		(object) [
        			'title_code' => 'S.T.',
        			'description' => 'Sarjana Teknik',
        		],
        		(object) [
        			'title_code' => 'S.Kom.',
        			'description' => 'Sarjana Komputer',
        		],
        	]);

        	$data = array(
        		'msg' => '',
        		'count' => count($data_detail),
        		'data' => $data_detail
        	);

            // dd($data);

            return response()->json($data);
        }
    }

    public function tableEmployeeAttachmentAttachmentPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'file_name' => 'KK',
                    'attachment_code' => 'Active',
                ],
                (object) [
                    'file_name' => 'KTP',
                    'attachment_code' => 'Active',
                ],
                (object) [
                    'file_name' => 'BPJS',
                    'attachment_code' => 'Active',
                ],
                (object) [
                    'file_name' => 'NPWP',
                    'attachment_code' => 'Active',
                ]
            ]);
            return Datatables::of($data)
            ->make(true);
        }
    }

    public function tableFormatDocumentFormatDocumentPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)
            ->make(true);
        }
    }

    public function tableExchangeRateExchangeRatePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)
            ->make(true);
        }
    }

    public function tableEvaluationFormEvaluationAspectPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/EvaluationForm/getEvaluationDetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->formCode,
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

        if(!isset($request->formCode)){
            return Datatables::of([])->make(true);
        }else{
            if($arrResult->dataListSet == null){
                return Datatables::of([])->make(true);
            }else{
                return Datatables::of($arrResult->dataListSet)->make(true);
            }
        }
    }

    public function tableEvaluationFormPredicatePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/EvaluationForm/getEvaluationDetailPoint',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->formCode,
                        'sequenceNo' => (int) $request->sequenceNo,
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

        if(!isset($request->sequenceNo)){
            return Datatables::of([])->make(true);
        }else{
            if($arrResult->dataListSet == null){
                return Datatables::of([])->make(true);
            }else{
                return Datatables::of($arrResult->dataListSet)->make(true);
            }
        }
    }

    public function tableFreeFormatFieldDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/freeformatfield/getgmfreeformatdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'freeFormatCode' => $request->freeFormatCode,
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

    public function tableFormatReportReportFormatPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'column_name' => '0',
                    'table_name' => 'PeMasterBank',
                    'field_name' => 'BankAccountNo',
                    'column_header' => 'No. Rek',
                    'alignment' => '0',
                    'width' => '1',
                    'data_format' => '',
                    'display' => '1'
                ],
            ]);
            return Datatables::of($data)
            ->make(true);
        }
    }

    public function tableFormatReportReportFormatConditionPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)
            ->make(true);
        }
    }

    public function tableSourceDocumentDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/getletterdetail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letterType,
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

        if(!isset($request->letterType)){
            return Datatables::of([])->make(true);
        }else{
            if($arrResult->dataListSet == null){
                return Datatables::of([])->make(true);
            }else{
                return Datatables::of($arrResult->dataListSet)->make(true);
            }
        }
    }

    public function tableSourceDocumentSignerPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/getlettersigner',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letterType,
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

        if(!isset($request->letterType)){
            return Datatables::of([])->make(true);
        }else{
            if($arrResult->dataListSet == null){
                return Datatables::of([])->make(true);
            }else{
                return Datatables::of($arrResult->dataListSet)->make(true);
            }
        }
    }

    public function statusNatureofWorkPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/WorkNature',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'workNatureCode' => $request->workNatureCode,
                        'workNatureName' => $request->workNatureName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusGradeCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/Grade',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'gradeCode' => $request->gradeCode,
                        'gradeName' => $request->gradeName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusPositionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmPosition',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'positionCode' => $request->positionCode,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusLocationCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/Location',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'locationCode' => $request->locationCode,
                        'locationName' => $request->locationName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusLevelPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/Level',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'levelType' => $request->levelType,
                        'levelCode' => $request->levelCode,
                        'levelName' => $request->levelName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusCostCenterCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/CostCenter',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'costCenterCode' => $request->costCenterCode,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusPerformancePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/PeMaster/PutPeMaster',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'fullName' => $request->fullName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusCompetencyPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/PeMaster/PutPeMaster',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'fullName' => $request->fullName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmBank/updateGmBank',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'bankCode' => $request->bankCode,
                        'bankName' => $request->bankName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusCompanyBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/CompanyBank',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'bankCode' => $request->bankCode,
                        'accountNo' => $request->accountNo,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/Group',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'groupCode' => $request->groupCode,
                        'groupName' => $request->groupName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusZipCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/ZipCode',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'zipCode' => $request->zipCode,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusBPJSGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/BPJS',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'bpjsCode' => $request->bpjsCode,
                        'bpjsNo' => $request->bpjsNo,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusNPWPGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/NPWP',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'npwpCode' => $request->npwpCode,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusRankingPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmRanking',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'rankingCode' => $request->rankingCode,
                        'rankingName' => $request->rankingName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusInstitutionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmInstitution',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'institutionCode' => $request->institutionCode,
                        'institutionName' => $request->institutionName,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusMajorPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmMajor',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'majorCode' => $request->majorCode,
                        'majorName' => $request->majorName,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusTypeofCoursePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmCourseType/UpdategmCourseType',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'courseTypeCode' => $request->courseTypeCode,
                        'courseTypeName' => $request->courseTypeName,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusSkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmSkill/UpdategmSkill',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'skillCode' => $request->skillCode,
                        'skillName' => $request->skillName,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusSourceDocumentPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/printletter/updatetemplate',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letterType,
                        'languageID' => $request->languageID,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
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

    public function statusEvaluationFormPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/EvaluationForm',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->formCode,
                        'formName' => $request->formName,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/freeformatfield/updategmfreeformatfield',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'freeFormatCode' => $request->freeFormatCode,
                        'description' => $request->description,
                        'freeFormatFieldType' => $request->freeFormatFieldType,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusFreeFormatFieldDetailPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/freeformatfield/updategmfreeformatdetail',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'freeFormatCode' => $request->freeFormatCode,
                        'listCode' => (int) $request->listCode,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusCityPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/City',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'cityCode' => $request->cityCode,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusTitlePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmTitle/UpdategmTitle',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'titleCode' => $request->titleCode,
                        'titleName' => $request->titleName,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'sessionID' => 0,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusFinalPerformanceResultPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/GmPerformanceResult',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'sequenceNo' => (int) $request->sequenceNo,
                        'value' => $request->value,
                        'from' => (int) $request->from,
                        'to' => (int) $request->to,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function statusPersonalDataPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/personel/PeMaster/UpdateRecordStatus',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'changeNo' => 0,
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageID" => App::getLocale()
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

    public function prosesPersonalDataPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $data_level = [];

            $param = [
                'recordStatus' => $request->record_status,
                'companyCode' => Session::get('companyCode'),
                'employeeNo' => $request->employee_no_info,
                'title' => $request->title_info,
                'fullName' => $request->fullname_info,
                'birthPlace' => $request->birth_place_info,
                'birthDate' => $request->birth_date_info,
                "age" => 0,
                "gender" => $request->gender_info,
                "educationCode" => null,
                "maritalStatus" => $request->marital_status_info,
                "taxRegisteredNo" => $request->tax_registered_no_info,
                "taxRegisteredDate" => $request->tax_registered_date_info,
                "taxRegisteredPlaceRegistration" => $request->tax_office_info,
                "taxRegisteredExpiryDate" => $request->tax_expiry_date_info,
                "religionCode" => $request->religion_info,
                "nationalityCode" => $request->nationality_info,
                "costCenterCode" => $request->cost_center_code_employment,
                "employmentStatus" => $request->employment_status_employment,
                "flagIsExpat" => isset($request->expatriat_employment) ? (bool) $request->expatriat_employment : false,
                "expatLicenseNo" => $request->license_no_employment,
                "expatLicenseStartDate" => $request->start_date_employment,
                "expatLicenseEndDate" => $request->end_date_employment,
                "joinDate" => $request->joining_date_employment,
                "probationEndDate" => $request->probation_end_date_employment,
                "contractStartDate" => $request->contract_start_date_employment,
                "contractEndDate" => $request->contract_end_date_employment,
                "terminationDate" => $request->termination_date_employment,
                "terminationCode" => $request->termination_code_employment,
                "terminationRemarks" => $request->termination_remarks_employment,
                "effectiveTerminationDate" => $request->effective_terminated_employment,
                "officeCode" => $request->office_location_employment,
                "pensionDate" => null,
                "serviceYear" => 0,
                "employmentType" => $request->employment_type_employment,
                // "locationCode" => $request->location_code_employment,
                "gradeCode" => $request->grade_code_employment,
                "positionCode" => $request->position_code_employment,
                "rankingCode" => $request->ranking_code_employment,
                "workNatureCode" => null,
                "groupCode" => null,
                "groupAuthorizeCode" => (int) $request->group_authorize_payroll,
                "specialResign" => isset($request->special_reason_resign_employment) ? (bool) $request->special_reason_resign_employment : false,
                "npwpMutationCode" => null,
                "npwpMutationDate" => null,
                "flagMutationNPWPFrom" => false,
                "flagMutationNPWPTo" => false,
                "flagMutationToSameGroup" => false,
                "flagMutationToOtherDirectory" => false,
                "auditLastSequenceNo" => 0,
                "flagIsDirect" => false,
                "flagIsTemporary" => false,
                "flagIsCommissioner" => isset($request->commisioner_employment) ? (bool) $request->commisioner_employment : false,
                "motherName" => $request->mother_name_info,
                "absenteeismType" => $request->absenteeism_type_absenteeism,
                "workPatternCode" => $request->work_pattern_code_absenteeism,
                "startAtDay" => (int) $request->starting_day_absenteeism,
                "flagNotAbsent" => isset($request->absent_not_required_absenteeism) ? (bool) $request->absent_not_required_absenteeism : false,
                "taxCalculationMethod" => $request->tax_calculation_method_payroll,
                "flagAstekDeathNonAccident" => isset($request->non_accidental_death_insurance_tenaga_kerja) ? (bool) $request->non_accidental_death_insurance_tenaga_kerja : false,
                "flagAstekWorkAccident" => isset($request->work_related_accident_insurance_tenaga_kerja) ? (bool) $request->work_related_accident_insurance_tenaga_kerja : false,
                "flagAstekWorkAccident2" => isset($request->work_related_accident_insurance_two_tenaga_kerja) ? (bool) $request->work_related_accident_insurance_two_tenaga_kerja : false,
                "flagAstekWorkAccident3" => isset($request->work_related_accident_insurance_three_tenaga_kerja) ? (bool) $request->work_related_accident_insurance_three_tenaga_kerja : false,
                "flagAstekPensionEmployee" => isset($request->pension_by_employee_tenaga_kerja) ? (bool) $request->pension_by_employee_tenaga_kerja : false,
                "flagAstekPensionEmployer" => isset($request->pension_by_employer_tenaga_kerja) ? (bool) $request->pension_by_employer_tenaga_kerja : false,
                "flagAstekHealthInsurance" => false,
                "flagTaxByGovernment" => false,
                "groupNpwp" => $request->group_npwp_payroll,
                "groupBpjs" => $request->group_bpjs_payroll,
                "flagPensionInsurance" => isset($request->pension_insurance_tenaga_kerja) ? (bool) $request->pension_insurance_tenaga_kerja : false,
                "flagBPJSKesehatan" => isset($request->join_kesehatan) ? (bool) $request->join_kesehatan : false,
                "bpjsKesehatanNo" => $request->bpjs_number_kesehatan,
                "bpjsKesehatanJoinDate" => $request->joining_date_kesehatan,
                "bpjsKesehatanPeriodStartDate" => $request->payment_period_start_date_kesehatan,
                "flagBPJSTenagaKerja" => isset($request->join_tenaga_kerja) ? (bool) $request->join_tenaga_kerja : false,
                "bpjsTenagaKerjaNo" => $request->bpjs_number_tenaga_kerja,
                "bpjsTenagaKerjaJoinDate" => $request->joining_date_tenaga_kerja,
                "bpjsTenagaKerjaPeriodStartDate" => $request->payment_period_start_date_tenaga_kerja,
                "employeeBankCode1" => $request->employee_bank_code_primary,
                "employeeBankCode2" => $request->employee_bank_code_optional_one,
                "employeeBankCode3" => $request->employee_bank_code_optional_two,
                "companyBankCode1" => $request->company_bank_code_primary,
                "companyBankCode2" => $request->company_bank_code_optional_one,
                "companyBankCode3" => $request->company_bank_code_optional_two,
                "bankAccountNo1" => $request->account_number_primary,
                "beneficiaryName1" => $request->beneficiary_name_primary,
                "bankPercentageSalary1" => (int) $request->percentage_primary,
                "currencyCode1" => $request->currency_primary,
                "bankAccountNo2" => $request->account_number_optional_one,
                "beneficiaryName2" => $request->beneficiary_name_optional_one,
                "bankPercentageSalary2" => (int) $request->percentage_optional_one,
                "currencyCode2" => $request->currency_optional_one,
                "bankAccountNo3" => $request->account_number_optional_two,
                "beneficiaryName3" => $request->beneficiary_name_optional_two,
                "bankPercentageSalary3" => (int) $request->percentage_optional_two,
                "currencyCode3" => $request->currency_optional_two,
                "originJoinDate" => $request->origin_join_date_employment,
                "flagNotFinger" => isset($request->finger_not_required_absenteeism) ? (bool) $request->finger_not_required_absenteeism : false,
                "taxStatus" => $request->tax_status_payroll,
                "taxStatusNextYear" => $request->tax_status_next_year_payroll,
                "flagExcludePayroll" => isset($request->exclude_payroll_process_payroll) ? (bool) $request->exclude_payroll_process_payroll : false,
                "flagTemp" => "string",
                "changedNo" => 0,
                "token" => Session::get('token'),
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName'),
                "languageCode" => App::getLocale()
            ];

            if($request->hasFile('photo_profile')) {
                $file = $request->file('photo_profile');
                $filename = Session::get('companyCode') . '_' . $file->getClientOriginalName();
                $file->move(public_path('photo_profile'), $filename);
                $path = public_path('photo_profile/');
                $param["photo"] = ($request->hasFile('photo_profile')) ? base64_encode(file_get_contents($path . $filename)) : '';
            }
            else {
                $param["photo"] = isset($request->photo_employee) ? $request->photo_employee : '';
            }

            $datauser = [
                "recordStatus" => $request->record_status,
                "userID" => null,
                "email" => null,
                "userName" => null,
                "token" => null,
                "photo" => ($request->hasFile('photo_profile')) ? base64_encode(file_get_contents($path . $filename)) : '',
                "keyPass" => null,
                "hashPass" => null,
                "changedNo" => 0,
                "createdBy" => Session::get('userID'),
                "createdDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "companyCode" => Session::get('companyCode'),
                "logActionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "languageCode" => App::getLocale()
            ];

            $param['user'] = $datauser;

            $datauserDetail = [
                "recordStatus" => $request->record_status,
                "userID" => null,
                "userName" => null,
                "employeeNo" => $request->employee_no_info,
                "email" => null,
                "companyCode" => Session::get('companyCode'),
                "companyName" => $request->company_name_profile,
                "keyPass" => null,
                "hashPass" => null,
                "token" => null,
                "defaultCompany" => false,
                "flagAppLead" => false,
                "flagAppHRD" => false,
                "userType" => null,
                "changedNo" => 0,
                "createdBy" => Session::get('userID'),
                "createdDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "moduleID" => null,
                "groupAuthorizeCode" => (int) $request->group_authorize_payroll,
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $param['userDetail'] = $datauserDetail;

            $datauserAkses = [
                "companyCode" => Session::get('companyCode'),
                "userID" => null,
                "moduleID" => null,
                "modulename" => null,
                "groupAuthorizeCode" => (int) $request->group_authorize_payroll,
                "groupAuthorizeDesc" => null,
                "changedNo" => 0,
                "createdBy" => Session::get('userID'),
                "createdDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "languageCode" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            $param['userAkses'] = $datauserAkses;

            if(!empty($request->level_format) && !is_null($request->level_format)){
                for($i = 0; $i < $request->level_format; $i++){
                    $data_level[] = [
                        "companyCode" => Session::get('companyCode'),
                        "levelType" => (string) ($i + 1),
                        "levelCode" => $request->{'level' . ($i+1)},
                        "employeeNo" => $request->employee_no_info,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                    ];
                }
                $param['peMasterLevel'] = $data_level;
            }

            $datapeMasterInfo = [
                'companyCode' => Session::get('companyCode'),
                'employeeNo' => $request->employee_no_info,
                "nickName" => $request->fullname_info,
                "bloodType" => $request->blood_type_info,
                "passportNo" => $request->passport_no_info,
                "passportDate" => $request->passport_date_info,
                "passportPlaceRegistration" => null,
                "passportExpiryDate" => null,
                "drivingLicenseMobilNo" => $request->driving_license_car_no_info,
                "drivingLicenseMobilType" => $request->driving_license_car_type_info,
                "drivingLicenseMobilNoDate" => $request->driving_license_car_date_info,
                "drivingLicenseMobilNoPlaceRegistration" => $request->driving_license_car_registration_place_info,
                "drivingLicenseMobilNoExpiryDate" => $request->driving_license_car_expiry_date_info,
                "drivingLicenseMotorNo" => $request->driving_license_motorcycle_no_info,
                "drivingLicenseMotorNoDate" => $request->driving_license_motorcycle_date_info,
                "drivingLicenseMotorNoPlaceRegistration" => $request->driving_license_motorcycle_registration_place_info,
                "drivingLicenseMotorNoExpiryDate" => $request->driving_license_motorcycle_expiry_date_info,
                "employeeCardId" => $request->company_card_id_other,
                "idNo" => $request->id_no_info,
                "idNoDate" => null,
                "idNoPlaceRegistration" => null,
                "idNoExpiryDate" => null,                
                "homeAddress" => $request->address_home,
                "homeCityCode" => $request->city_select_home,
                "homeZipCode" => $request->zip_code_select_home,
                "homePhone" => $request->phone_number_home,
                "homeDistrictCode" => $request->district_select_home,
                "homeSubDistrictCode" => $request->subdistrict_select_home,
                "otherDistrictCode" => $request->district_select_other,
                "otherSubDistrictCode" => $request->subdistrict_select_other,
                "otherAddress" => $request->address_other,
                "otherCityCode" => $request->city_select_other,
                "otherZipCode" => $request->zip_code_select_other,
                "otherPhone" => $request->phone_number_other,
                "workAddress" => $request->address_work,
                "workCityCode" => $request->city_select_work,
                "workZipCode" => $request->zip_code_select_work,
                "workPhone" => $request->phone_number_work,
                "correspondenceAddress" => $request->address_correspondence,
                "correspondenceCityCode" => $request->city_select_correspondence,
                "correspondenceZipCode" => $request->zip_code_select_correspondence,
                "correspondencePhone" => $request->phone_number_correspondence,
                "personalHandphone" => $request->handphone_no_other,
                "personalEmailAddress" => $request->personal_email_other,
                "companyEmailAddress" => $request->company_email_other,
                "emergencyName" => $request->name_emergency,
                "emergencyAddress" => $request->address_emergency,
                "emergencyPhone" => $request->phone_number_emergency,
                "emergencyRelation" => $request->relation_emergency,
                "emergencyEmailAddress" => $request->email_emergency,
                "jobDesc" => null,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                "sessionID" => 0,
                'sessionUserID' => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')
            ];
            $param['peMasterInfo'] = $datapeMasterInfo;

            $datapeMasterInsurance = [
                'companyCode' => Session::get('companyCode'),
                'employeeNo' => $request->employee_no_info,
                "insuranceCode" => $request->insurance_code_insurance,
                "insuranceClassCode" => $request->insurance_class_insurance,
                "insuranceStartDate" => $request->insurance_date_insurance,
                "insuranceEndDate" => null,
                "insurancePolicyNo" => $request->insurance_policy_no_insurance,
                "insuranceRemark" => $request->remarks_insurance,
                "changedNo" => 0,
                "createdDate" => date("Y-m-d\TH:i:s"),
                "createdBy" => Session::get('userID'),
                "changedDate" => date("Y-m-d\TH:i:s"),
                "changedBy" => Session::get('userID'),
                'logActionUserID' => Session::get('userID'),
                'logActionUsername' => Session::get('userName')
            ];
            $param['peMasterInsurance'] = $datapeMasterInsurance;

            if(isset($request->fringe_benefits)){
                foreach($request->seq_no_fringe_benefit as $value){
                    // var_dump($request->fringe_benefits[$value]);
                    $datapeMasterFringeBenefit[] = [
                        'companyCode' => Session::get('companyCode'),
                        "employeeNo" => $request->employee_no_info,
                        "seqNo" => (int) $value,
                        "benefits" => $request->fringe_benefits[$value],
                        "description" => $request->description[$value],
                        "startDate" => $request->start_date[$value],
                        "endDate" => $request->end_date[$value],
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ];
                }
                $param['peMasterFringeBenefit'] = $datapeMasterFringeBenefit;
            }

            if(isset($request->family_name)){
                foreach($request->seq_no_family_dependent as $value){
                    $datapeMasterFamily[] = [
                        'companyCode' => Session::get('companyCode'),
                        "employeeNo" => $request->employee_no_info,                        
                        "seqNo" => (int) $value,
                        "familyName" => $request->family_name[$value],
                        "relationCode" => $request->relation_code[$value],
                        "birthDate" => $request->birth_date[$value],
                        "birthPlace" => $request->birth_place[$value],
                        "gender" => $request->gender[$value],
                        "occupation" => $request->occupation[$value],
                        "flagMedical" => (bool) $request->flag_medical[$value],
                        "flagPayroll" => (bool) $request->flag_payroll[$value],
                        "bloodType" => $request->blood_type[$value],
                        "familyCardNumber" => $request->family_card_number[$value],
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ];
                }
                $param['peMasterFamily'] = $datapeMasterFamily;
            }

            // var_dump(json_encode($param));
            // exit;

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/PeMaster/insertPeMaster',
                    ['body' => json_encode($param)]
                );
            }
            else{
                $response = $client->put(env('API_URL') . '/personel/PeMaster/PutPeMaster',
                    ['body' => json_encode($param)]
                );
            }  
        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
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

        // var_dump($arrResult->dataListSet);

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesEmployeeApprovalPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => Session::get('companyCode'),
                    'runningNo' => (int) $value['runningNo'],
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    'userID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    "languageCode" => App::getLocale()
                ];
            }

            $response = $client->post(env('API_URL') . '/employeeapproval/employeeapproval',
                ['body' => json_encode($data)]
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

    public function prosesNatureofWorkPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/WorkNature',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'workNatureCode' => $request->nature_of_work_code,
                            'workNatureName' => $request->nature_of_work_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/WorkNature',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'workNatureCode' => $request->nature_of_work_code,
                            'workNatureName' => $request->nature_of_work_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesGradeCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/Grade',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'gradeCode' => $request->grade_code,
                            'gradeName' => $request->grade_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/Grade',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'gradeCode' => $request->grade_code,
                            'gradeName' => $request->grade_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesPositionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmPosition',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => $request->position_code,
                            'positionName' => $request->position_name,
                            'supervisorPositionCode' => $request->supervisor_position_code,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmPosition',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'positionCode' => $request->position_code,
                            'positionName' => $request->position_name,
                            'supervisorPositionCode' => $request->supervisor_position_code,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesLocationCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/Location',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'locationCode' => $request->location_code,
                            'locationName' => $request->location_name,
                            'bpjsLocationCode' => $request->bpjs_location_code,
                            'latitudeTop' => 0,
                            'latitudeBot' => 0,
                            'longitudeTop' => 0,
                            'longitudeBot' => 0,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/Location',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'locationCode' => $request->location_code,
                            'locationName' => $request->location_name,
                            'bpjsLocationCode' => $request->bpjs_location_code,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesLevelPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/Level',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'levelType' => $request->level_type,
                            'levelCode' => $request->level_code,
                            'levelName' => $request->level_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/Level',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'levelType' => $request->level_type_text,
                            'levelCode' => $request->level_code,
                            'levelName' => $request->level_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesCostCenterCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/CostCenter',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'costCenterCode' => $request->cost_center_code,
                            'costCenterDescription' => $request->cost_center_description,
                            'accountNo' => $request->account_no,
                            'contraAccountNo' => $request->contra_account_no,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/CostCenter',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'costCenterCode' => $request->cost_center_code,
                            'costCenterDescription' => $request->cost_center_description,
                            'accountNo' => $request->account_no,
                            'contraAccountNo' => $request->contra_account_no,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesPerformanceAwardPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeAward',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_award,
                        'seqNo' => (int) $request->seq_no_award,
                        'awardType' => $request->award_type,
                        'awardName' => $request->award_name,
                        'awardDate' => date('Y-m-d\TH:i:s', strtotime($request->award_date)),
                        'eventName' => $request->event_name,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesPerformanceSanctionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeSanction',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_sanction,
                        'seqNo' => (int) $request->seq_no_sanction,
                        'sanctionCode' => $request->sanction_code,
                        'startDate' => date('Y-m-d\TH:i:s', strtotime($request->sanction_start_date)),
                        'endDate' => date('Y-m-d\TH:i:s', strtotime($request->sanction_end_date)),
                        'decreeNo' => $request->decree_no,
                        'decreeCode' => $request->decree_code,
                        'decreeDate' => $request->decree_date,
                        'sanctionRemarks' => $request->sanction_remarks,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesPerformanceEvaluationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(!empty($request->evaluated_aspect) && !is_null($request->evaluated_aspect[0])){
                foreach($request->evaluated_aspect as $key => $value){
                    $dataEvaluationDetail[] = [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_evaluation,
                        'seqNo' => (int) $request->seq_no_evaluation,
                        'detailSeqNo' => (int) $request->sequence_no[$key],
                        'evaluatedAspect' => $value,
                        'calculation' => $request->calculation[$key],
                        'predicate' => $request->predicate[$key],
                        'value' => $request->result_value[$key],
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                    ];
                }
            }

            $response = $client->post(env('API_URL') . '/personel/PeEvaluation/InsertPeEvaluation',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_evaluation,
                        'seqNo' => (int) $request->seq_no_evaluation,
                        'evaluationFormCode' => $request->evaluation_form_code,
                        'evaluationPeriodFrom' => $request->evaluation_period_from,
                        'evaluationPeriodTo' => $request->evaluation_period_to,
                        'evaluationDate' => $request->evaluation_date,
                        'evaluator' => $request->evaluator,
                        'result' => $request->result,
                        'evaluationDetail' => $dataEvaluationDetail,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCompetencyFormalEducationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeEducation',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_formal_education,
                        'seqNo' => (int) $request->seq_no_formal_education,
                        'institutionCode' => $request->institution,
                        'educationCode' => $request->education,
                        'majorCode' => $request->major,
                        'educationStatusCode' => $request->education_status,
                        'graduateYear' => $request->graduate_year,
                        'titleCode' => $request->title,
                        'cityCode' => $request->city,
                        'educationGpa' => (float) $request->gpa,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCompetencyLanguagePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeLanguage',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_language,
                        'seqNo' => (int) $request->seq_no_language,
                        'language' => $request->language,
                        'read' => $request->read,
                        'speak' => $request->speak,
                        'write' => $request->write,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCompetencyOrganizationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeOrganization',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_organization,
                        'seqNo' => (int) $request->seq_no_organization,
                        'organizationName' => $request->organization_name,
                        'position' => $request->position_organization,
                        'startDate' => date('Y-m-d\TH:i:s', strtotime($request->organization_start_date)),
                        'endDate' => date('Y-m-d\TH:i:s', strtotime($request->organization_end_date)),
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCompetencyReferencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeReference',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_reference,
                        'seqNo' => (int) $request->seq_no_reference,
                        'referenceName' => $request->reference_name,
                        'phoneNo' => $request->phone_number,
                        'companyName' => $request->company_name,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCompetencySkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeSkill',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_skill,
                        'seqNo' => (int) $request->seq_no_skill,
                        'skill' => $request->skill,
                        'description' => $request->description_skill,
                        'proficiency' => $request->proficiency,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCompetencyProjectExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeProjectExperience/InsertPeProjectExperience',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_project_experience,
                        'seqNo' => (int) $request->seq_no_project_experience,
                        'client' => $request->client,
                        'position' => $request->position_project_experience,
                        'location' => $request->location,
                        'startDate' => date('Y-m-d\TH:i:s', strtotime($request->project_experience_start_date)),
                        'endDate' => date('Y-m-d\TH:i:s', strtotime($request->project_experience_end_dates)),
                        'description' => $request->description_project_experience,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCompetencyTrainingListPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->hasFile('certificate_attachment')) {
                $file = $request->file('certificate_attachment');
                $filename = Session::get('companyCode') . '_' . $request->employee_no_training_list . '_' . $file->getClientOriginalName();
                $file->move(public_path('certificate'), $filename);
                $path = public_path('certificate/');
            }

            $response = $client->post(env('API_URL') . '/personel/PeTraining',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_training_list,
                        'seqNo' => (int) $request->seq_no_training_list,
                        'trainingName' => $request->training_name,
                        'organizer' => $request->organizer,
                        'startDate' => date('Y-m-d\TH:i:s', strtotime($request->training_list_start_date)),
                        'endDate' => date('Y-m-d\TH:i:s', strtotime($request->training_list_end_date)),
                        'certificateName' => $request->certificate_name,
                        'certificateNo' => $request->certificate_no,
                        'certificateDate' => date('Y-m-d\TH:i:s', strtotime($request->certificate_date)),
                        'expiredDate' => $request->expired_date,
                        "certificateDescription" => $request->certificate_description,
                        'certificateAttachment' => ($request->hasFile('certificate_attachment')) ? base64_encode(file_get_contents($path . $filename)) : '',
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmBank/insertGmBank',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'bankCode' => $request->bank_code,
                            'bankName' => $request->bank_name,
                            'biCode' => $request->bi_code,
                            'accountFormat' => (int) $request->account_format,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmBank/updateGmBank',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'bankCode' => $request->bank_code,
                            'bankName' => $request->bank_name,
                            'biCode' => $request->bi_code,
                            'accountFormat' => (int) $request->account_format,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesCompanyBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/CompanyBank',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'bankCode' => $request->bank_code,
                            'accountNo' => $request->account_no,
                            'description' => $request->description,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/CompanyBank',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'bankCode' => $request->bank_code,
                            'accountNo' => $request->account_no,
                            'description' => $request->description,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/Group',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'groupCode' => $request->group_code,
                            'groupName' => $request->group_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/Group',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'groupCode' => $request->group_code,
                            'groupName' => $request->group_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesZipCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/ZipCode',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'zipCode' => $request->zip_code,
                            'kelurahan' => $request->village,
                            'kecamatan' => $request->subdistrict,
                            'kabupaten' => $request->district,
                            'propinsi' => $request->province,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/ZipCode',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'zipCode' => $request->zip_code,
                            'kelurahan' => $request->village,
                            'kecamatan' => $request->subdistrict,
                            'kabupaten' => $request->district,
                            'propinsi' => $request->province,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesBPJSGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/BPJS',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'bpjsCode' => $request->bpjs_code,
                            'bpjsNo' => $request->no_bpjs,
                            'signerName' => $request->signer_name,
                            'title' => $request->title,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/BPJS',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'bpjsCode' => $request->bpjs_code,
                            'bpjsNo' => $request->no_bpjs,
                            'signerName' => $request->signer_name,
                            'title' => $request->title,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesNPWPGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/NPWP',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'npwpCode' => $request->npwp_code,
                            'pemotongKuasa' => $request->pemotong_kuasa,
                            'printDate' => $request->print_date,
                            'signerName' => $request->signer_name,
                            'signerNPWP' => $request->signer_npwp,
                            'companyName' => $request->company_name,
                            'companyAddress' => $request->company_address,
                            'companyNPWP' => $request->company_npwp,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/NPWP',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'npwpCode' => $request->npwp_code,
                            'pemotongKuasa' => $request->pemotong_kuasa,
                            'printDate' => $request->print_date,
                            'signerName' => $request->signer_name,
                            'signerNPWP' => $request->signer_npwp,
                            'companyName' => $request->company_name,
                            'companyAddress' => $request->company_address,
                            'companyNPWP' => $request->company_npwp,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesRankingPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmRanking',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'rankingCode' => $request->ranking_code,
                            'rankingName' => $request->ranking_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmRanking',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'rankingCode' => $request->ranking_code,
                            'rankingName' => $request->ranking_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesInstitutionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmInstitution',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'institutionCode' => $request->institution_code,
                            'institutionName' => $request->institution_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmInstitution',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'institutionCode' => $request->institution_code,
                            'institutionName' => $request->institution_name,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesMajorPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmMajor',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'majorCode' => $request->major_code,
                            'majorName' => $request->major_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmMajor',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'majorCode' => $request->major_code,
                            'majorName' => $request->major_name,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesTypeofCoursePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmCourseType/InsertgmCourseType',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'courseTypeCode' => $request->type_of_course_code,
                            'courseTypeName' => $request->type_of_course_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmCourseType/UpdategmCourseType',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'courseTypeCode' => $request->type_of_course_code,
                            'courseTypeName' => $request->type_of_course_name,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesSkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmSkill/InsertgmSkill',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'skillCode' => $request->skill_code,
                            'skillName' => $request->skill_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmSkill/UpdategmSkill',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'skillCode' => $request->skill_code,
                            'skillName' => $request->skill_name,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesSourceDocumentPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                if($request->hasFile('letter_file')) {
                    $file = $request->file('letter_file');
                    $filename = Session::get('companyCode') . '_' . $file->getClientOriginalName();
                    $file->move(public_path('letter_template'), $filename);
                    $path = public_path('letter_template/');

                    $response = $client->post(env('API_URL') . '/printletter/inserttemplate',
                        ['body' => json_encode(
                            [
                                'recordStatus' => $request->record_status,
                                'companyCode' => Session::get('companyCode'),
                                'letterType' => $request->letter_type,
                                'letterFile64' => ($request->hasFile('letter_file')) ? base64_encode(file_get_contents($path . $filename)) : '',
                                'languageID' => $request->language_id,
                                "changedNo" => 0,
                                "createdDate" => date("Y-m-d\TH:i:s"),
                                "createdBy" => Session::get('userID'),
                                "changedDate" => date("Y-m-d\TH:i:s"),
                                "changedBy" => Session::get('userID'),
                                'sessionUserID' => Session::get('userID'),
                                'logActionUserID' => Session::get('userID'),
                                'logActionUsername' => Session::get('userName'),
                                "languageCode" => strtoupper(App::getLocale())
                            ]
                        )]
                    );
                }else{
                    $response = $client->post(env('API_URL') . '/printletter/inserttemplate',
                        ['body' => json_encode(
                            [
                                'recordStatus' => $request->record_status,
                                'companyCode' => Session::get('companyCode'),
                                'letterType' => $request->letter_type,
                                'languageID' => $request->language_id,
                                "changedNo" => 0,
                                "createdDate" => date("Y-m-d\TH:i:s"),
                                "createdBy" => Session::get('userID'),
                                "changedDate" => date("Y-m-d\TH:i:s"),
                                "changedBy" => Session::get('userID'),
                                'sessionUserID' => Session::get('userID'),
                                'logActionUserID' => Session::get('userID'),
                                'logActionUsername' => Session::get('userName'),
                                "languageCode" => strtoupper(App::getLocale())
                            ]
                        )]
                    );
                }
                
            }else{
                if($request->hasFile('letter_file')) {
                    $file = $request->file('letter_file');
                    $filename = Session::get('companyCode') . '_' . $file->getClientOriginalName();
                    $file->move(public_path('letter_template'), $filename);
                    $path = public_path('letter_template/');

                    $response = $client->put(env('API_URL') . '/printletter/updatetemplate',
                        ['body' => json_encode(
                            [
                                'recordStatus' => $request->record_status,
                                'companyCode' => Session::get('companyCode'),
                                'letterType' => $request->letter_type,
                                'letterFile64' => base64_encode(file_get_contents($path . $filename)),
                                'languageID' => $request->language_id,
                                "createdDate" => date("Y-m-d\TH:i:s"),
                                "createdBy" => Session::get('userID'),
                                "changedDate" => date("Y-m-d\TH:i:s"),
                                "changedBy" => Session::get('userID'),
                                'sessionUserID' => Session::get('userID'),
                                'logActionUserID' => Session::get('userID'),
                                'logActionUsername' => Session::get('userName'),
                                "languageCode" => strtoupper(App::getLocale())
                            ]
                        )]
                    );
                }else{
                    $response = $client->put(env('API_URL') . '/printletter/updatetemplate',
                        ['body' => json_encode(
                            [
                                'recordStatus' => $request->record_status,
                                'companyCode' => Session::get('companyCode'),
                                'letterType' => $request->letter_type,
                                'languageID' => $request->language_id,
                                "createdDate" => date("Y-m-d\TH:i:s"),
                                "createdBy" => Session::get('userID'),
                                "changedDate" => date("Y-m-d\TH:i:s"),
                                "changedBy" => Session::get('userID'),
                                'sessionUserID' => Session::get('userID'),
                                'logActionUserID' => Session::get('userID'),
                                'logActionUsername' => Session::get('userName'),
                                "languageCode" => strtoupper(App::getLocale())
                            ]
                        )]
                    );
                }
                
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
        // return response()->json($request->record_status);
    }

    public function prosesSourceDocumentDetailPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/insertdetail',
                ['body' => json_encode(
                    [[
                        'recordStatus' => "A",
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letter_type_detail,
                        'detailField' => $request->detail_field,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
                    ]]
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

    public function prosesSourceDocumentSignerPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/insertsigner',
                ['body' => json_encode(
                    [[
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letter_type_signer,
                        'signerSequence' => (int) $request->seq_no,
                        'signerPositionCode' => $request->position_code,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
                    ]]
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

    public function printPrintLetterPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/createletter',
                ['body' => json_encode(
                    [
                        'recordStatus' => "A",
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letter_type,
                        'letterReference' => (int) $request->reference,
                        'letterDate' => $request->letter_date,
                        'employeeNo' => $request->employee_no,
                        "languageID" => strtoupper(App::getLocale()),
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "sessionID" => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
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

        if($arrResult->dataListSet != null){
            $filename = Session::get('companyCode') . '_' . $request->employee_no . "_" . $request->letter_type . '.docx';
            file_put_contents(public_path('print_letter/') . $filename, base64_decode($arrResult->dataListSet[0]->letter64));
            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message, 'letter' => $filename]);
        }else{

            return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
        }
    }

    public function prosesFinalPerformanceResultPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmPerformanceResult',
                    ['body' => json_encode(
                        [
                            'recordStatus' => "A",
                            'companyCode' => Session::get('companyCode'),
                            'sequenceNo' => (int) $request->number,
                            'value' => $request->value,
                            'from' => (int) $request->from,
                            'to' => (int) $request->to,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmPerformanceResult',
                    ['body' => json_encode(
                        [
                            'recordStatus' => "A",
                            'companyCode' => Session::get('companyCode'),
                            'sequenceNo' => (int) $request->number,
                            'value' => $request->value,
                            'from' => (int) $request->from,
                            'to' => (int) $request->to,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesEvaluationFormPersonel(Request $request)
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
            //         'recordStatus' => $request->record_status,
            //         'companyCode' => Session::get('companyCode'),
            //         'formCode' => $request->form_code,
            //         'formName' => $request->form_name,
            //         "changedNo" => 0,
            //         "createdDate" => date("Y-m-d\TH:i:s"),
            //         "createdBy" => Session::get('userID'),
            //         "changedDate" => date("Y-m-d\TH:i:s"),
            //         "changedBy" => Session::get('userID'),
            //         'userID' => Session::get('userID'),
            //         'logActionUserID' => Session::get('userID'),
            //         'logActionUsername' => Session::get('userName'),
            //         "languageCode" => App::getLocale()
            //     ]
            //     ));

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/EvaluationForm',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'formCode' => $request->form_code,
                            'formName' => $request->form_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/EvaluationForm',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'formCode' => $request->form_code,
                            'formName' => $request->form_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesEvaluationFormEvaluatedAspectPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/EvaluationForm/Detail',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->form_code_evaluated_aspect,
                        'sequenceNo' => (int) $request->sequence,
                        'evaluatedAspect' => $request->evaluated_aspect,
                        'calculation' => (int) $request->calculation,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ]
                )]
            );

            if(!empty($request->predicate) && !is_null($request->predicate[0])){
                foreach($request->predicate as $key => $value){
                    $data_point[] = [
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->form_code_evaluated_aspect,
                        'sequenceNo' => (int) $request->sequence,
                        'predicate' => $value,
                        'resultValue' => floatval($request->result_value[$key]),
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
                    ];
                }

                $response_point = $client->post(env('API_URL') . '/personel/EvaluationForm/DetailPoint',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            "languageCode" => App::getLocale(),
                            "evaluationDetailPoint" => $data_point
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

    public function prosesPersonelReferencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/ReferencePersonnel',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'probationPeriod' => (int) $request->probation_period,
                            'flagNeedApprovalEmployee' => ($request->need_approval_employee == 'true') ? true : false,
                            'flagAutoEmployeeNo' => ($request->auto_generate_employee == 'true') ? true : false,
                            'maxDependentMedical' => (int) $request->max_dependent_medical,
                            'maxDependentPayroll' => (int) $request->max_dependent_payroll,
                            'levelFormat' => (int) $request->level_master_format,
                            'costCenterFormat' => (int) $request->cost_center_format,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );

                $response_delete_level = $client->delete(env('API_URL') . '/personel/LevelMaster',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );

                if(!empty($request->level_description) && !is_null($request->level_description[0])){
                    foreach($request->level_description as $key => $value){
                        $data_level[] = [
                            'companyCode' => Session::get('companyCode'),
                            'levelType' => $request->level_type[$key],
                            'levelDescription' => $value,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ];
                    }

                    $response_level = $client->post(env('API_URL') . '/personel/LevelMaster',
                        ['body' => json_encode(
                            [
                                'companyCode' => Session::get('companyCode'),
                                'userID' => Session::get('userID'),
                                "languageCode" => App::getLocale(),
                                "levelMasterList" => $data_level
                            ]
                        )]
                    );
                }
            }else{
                $response = $client->put(env('API_URL') . '/personel/ReferencePersonnel',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'probationPeriod' => (int) $request->probation_period,
                            'flagNeedApprovalEmployee' => ($request->need_approval_employee == 'true') ? true : false,
                            'flagAutoEmployeeNo' => ($request->auto_generate_employee == 'true') ? true : false,
                            'maxDependentMedical' => (int) $request->max_dependent_medical,
                            'maxDependentPayroll' => (int) $request->max_dependent_payroll,
                            'levelFormat' => (int) $request->level_master_format,
                            'costCenterFormat' => (int) $request->cost_center_format,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );

                $response_delete_level = $client->delete(env('API_URL') . '/personel/LevelMaster',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );

                if(!empty($request->level_description) && !is_null($request->level_description[0])){
                    foreach($request->level_description as $key => $value){
                        $data_level[] = [
                            'companyCode' => Session::get('companyCode'),
                            'levelType' => $request->level_type[$key],
                            'levelDescription' => $value,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ];
                    }

                    $response_level = $client->post(env('API_URL') . '/personel/LevelMaster',
                        ['body' => json_encode(
                            [
                                'companyCode' => Session::get('companyCode'),
                                'userID' => Session::get('userID'),
                                "languageCode" => App::getLocale(),
                                "levelMasterList" => $data_level
                            ]
                        )]
                    );
                }
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

    public function prosesFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/freeformatfield/insertgmfreeformatfield',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'freeFormatCode' => $request->free_format_code,
                            'freeFormatFieldType' => $request->field_type,
                            'description' => $request->description,
                            'length' => (int) $request->length,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/freeformatfield/updategmfreeformatfield',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'freeFormatCode' => $request->free_format_code,
                            'freeFormatFieldType' => $request->field_type,
                            'description' => $request->description,
                            'length' => (int) $request->length,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesFreeFormatFieldDetailPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/freeformatfield/insertgmfreeformatdetail',
                ['body' => json_encode(
                    [
                        'recordStatus' => 'A',
                        'companyCode' => Session::get('companyCode'),
                        'freeFormatCode' => $request->free_format_code_field_list,
                        'listCode' => (int) $request->list_code,
                        'listValue' => $request->list_value,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesCityPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/City',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'cityCode' => $request->city_code,
                            'cityName' => $request->city_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'userID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/City',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'cityCode' => $request->city_code,
                            'cityName' => $request->city_name,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesTitlePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/personel/GmTitle/InsertgmTitle',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'titleCode' => $request->title_code,
                            'titleName' => $request->title_name,
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'sessionID' => 0,
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/personel/GmTitle/UpdategmTitle',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'titleCode' => $request->title_code,
                            'titleName' => $request->title_name,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => App::getLocale()
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

    public function prosesWorkDetailFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeFreeFormat/InsertPeFreeFormat',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_free_format_field,
                        'freeFormatCode' => $request->format_code,
                        'value' => $request->value_free_format_field,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesWorkDetailWorkExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeWorkExperience/InsertPeWorkExperience',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_work_experience,
                        'seqNo' => (int) $request->seq_no_work_experience,
                        'companyName' => $request->company_name_work_experience,
                        'lineOfBusiness' => $request->line_of_business,
                        'natureOfWork' => $request->nature_of_work_work_experience,
                        'positionName' => $request->position_name_work_experience,
                        'rankingName' => $request->ranking_name_work_experience,
                        'joinDate' => $request->join_date,
                        'terminateDate' => $request->terminate_date,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function prosesWorkDetailJobHistoryPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->level_code)){
                foreach($request->level_code as $key => $value){
                    $data_level[] = [
                        'levelType' => $request->level_code[$key],
                        'levelCode' => $value
                    ];
                }
            }else{
                $data_level = [];
            }

            $response = $client->put(env('API_URL') . '/personel/PeMasterHistoryJob',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no_job_history,
                        'seqNo' => (int) $request->seq_no_job_history,
                        'historyCompanyCode' => $request->company_job_history,
                        'startDate' => $request->start_date,
                        'endDate' => $request->end_date,
                        'employmentStatus' => $request->employment_status,
                        'employmentType' => $request->employment_type,
                        'contractStartDate' => $request->contract_start_date,
                        'contractEndDate' => $request->contract_end_date,
                        'decreeCode' => $request->decree_code,
                        'decreeNo' => $request->decree_no,
                        'decreeDate' => $request->decree_date,
                        'positionCode' => $request->position_job_history,
                        'rankingCode' => $request->ranking_job_history,
                        'gradeCode' => $request->grade_job_history,
                        'groupCode' => $request->group_job_history,
                        'locationCode' => $request->location_job_history,
                        'workNatureCode' => $request->nature_of_work_job_history,
                        'remarks' => $request->remarks_job_history,
                        'jobDesc' => $request->position_job_description,
                        'approvedBy' => $request->approved_by,
                        'flagisDirect' => ($request->direct_staff == 'true') ? true : false,
                        'flagisTemporary' => ($request->temporary == 'true') ? true : false,
                        "level" => $data_level,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageID" => App::getLocale(),
                        "languageCode" => App::getLocale()
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

    public function prosesEmployeeMutationPersonel(Request $request)
    {
        $param = [];
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(!empty($request->level_new)){
                foreach($request->level_new as $key => $value){
                    $data_level[] = [
                        'levelType' => $request->level_type_new[$key],
                        'levelCode' => $value
                    ];
                }
            }

            if($request->mutation_type == "N"){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no,
                    'transactionType' => $request->mutation_type,
                    'npwpMutationCode' => $request->npwp_code_new,
                    'startDate' => $request->period_start_date_new,
                    'remarks' => $request->remarks,
                    'changedNo' => 0,
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }else if($request->mutation_type == "M"){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no,
                    'transactionType' => $request->mutation_type,
                    'companyCodeMutation' => $request->company_code_new,
                    'changeEmployeeNo' => isset($request->change_employee_no_new) ? (bool) $request->change_employee_no_new : false,
                    'newEmployeeNo' => $request->updated_employee_no_new,
                    'startDate' => $request->start_date_new,
                    'costCenterCode' => $request->cost_center_code_new,
                    'locationCode' => $request->work_location_new,
                    'gradeCode' => $request->grade_code_new,
                    'positionCode' =>$request->position_new ,
                    'rankingCode' => $request->ranking_new,
                    'workNatureCode' => $request->nature_of_work_new,
                    'groupCode' => $request->group_code_new,
                    'level' => $data_level,
                    'remarks' => $request->remarks,
                    'changedNo' => 0,
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }else if($request->mutation_type == "P" || $request->mutation_type == "D"){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no,
                    'transactionType' => $request->mutation_type,
                    'startDate' => $request->start_date_new,
                    'costCenterCode' => $request->cost_center_code_new,
                    'locationCode' => $request->work_location_new,
                    'gradeCode' => $request->grade_code_new,
                    'positionCode' =>$request->position_new ,
                    'rankingCode' => $request->ranking_new,
                    'workNatureCode' => $request->nature_of_work_new,
                    'groupCode' => $request->group_code_new,
                    'level' => $data_level,
                    'remarks' => $request->remarks,
                    'changedNo' => 0,
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }else if($request->mutation_type == "O"){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no,
                    'transactionType' => $request->mutation_type,
                    'startDate' => $request->contract_start_date_new,
                    'employmentStatus' => $request->employment_status_new,
                    'contractStartDate' => $request->contract_start_date_new,
                    'contractEndDate' => $request->contract_end_date_new,
                    'effectivePermanentDate' => $request->effective_permanent_date_new,
                    'remarks' => $request->remarks,
                    'changedNo' => 0,
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }else if($request->mutation_type == "T"){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no,
                    'transactionType' => $request->mutation_type,
                    'terminationDate' => $request->termination_date_new,
                    'terminationRemarks' => $request->termination_reason_new,
                    'effectiveTerminationDate' => $request->effective_termination_date_new,
                    'remarks' => $request->remarks,
                    'changedNo' => 0,
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }else if($request->mutation_type == "PE"){
                $param = [
                    'companyCode' => Session::get('companyCode'),
                    'employeeNo' => $request->employee_no,
                    'transactionType' => $request->mutation_type,
                    'peMasterInfo' => [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employee_no,
                        'homeAddress' => $request->home_address_new,
                        'homeCityCode' => $request->home_city_code_new,
                        'homeZipCode' => $request->home_zip_code_new,
                        'homePhone' => $request->home_phone_new,
                        'otherAddress' => $request->other_address_new,
                        'otherCityCode' => $request->other_city_code_new,
                        'otherZipCode' => $request->other_zip_code_new,
                        'otherPhone' => $request->other_phone_new,
                        'emergencyName' => $request->emergency_contact_name_new,
                        'emergencyAddress' => $request->emergency_contact_address_new,
                        'emergencyPhone' => $request->emergency_contact_phone_new,
                        'emergencyRelation' => $request->emergency_contact_relation_new,
                        'personalEmailAddress' => $request->personal_email_address_new,
                        'companyEmailAddress' => $request->company_email_address_new,
                    ],
                    'changedNo' => 0,
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    "languageCode" => strtoupper(App::getLocale()),
                    "changedBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                ];
            }

            // dd(json_encode($param));
            // exit;

            $response = $client->post(env('API_URL') . '/personel/mutationemployee/executemutation',
                ['body' => json_encode($param)]
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function removeFinalPerformanceResultPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/personel/GmPerformanceResult',
                ['body' => json_encode(
                    [
                        'recordStatus' => "A",
                        'companyCode' => Session::get('companyCode'),
                        'sequenceNo' => (int) $request->sequenceNo,
                        'value' => $request->value,
                        'from' => (int) $request->from,
                        'to' => (int) $request->to,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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
    
    public function removeEvaluationFormEvaluatedAspectPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/personel/EvaluationForm/Detail',
                ['body' => json_encode(
                    [
                        'recordStatus' => "A",
                        'companyCode' => Session::get('companyCode'),
                        'formCode' => $request->formCode,
                        'sequenceNo' => (int) $request->sequenceNo,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function removePerformanceAwardPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/personel/PeAward',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'seqNo' => (int) $request->seqNo,
                        'awardType' => $request->awardType,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function removePerformanceSanctionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/personel/PeSanction',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'seqNo' => (int) $request->seqNo,
                        'sanctionCode' => $request->sanctionCode,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function removePerformanceEvaluationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/personel/PeEvaluation/deletePeEvaluation',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'seqNo' => (int) $request->seqNo,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

    public function removeCompetencyFormalEducationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'languageID' => $value['languageID'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeEducation/BulkDeletePeEducation',
                ['body' => json_encode($data)]
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

    public function removeCompetencyLanguagePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeLanguage/BulkDeletePeLanguage',
                ['body' => json_encode($data)]
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

    public function removeCompetencyOrganizationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeOrganization/BulkDeletePeOrganization',
                ['body' => json_encode($data)]
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

    public function removeCompetencyReferencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeReference/BulkDeletePeReference',
                ['body' => json_encode($data)]
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

    public function removeCompetencySkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeSkill/BulkDeletePeSkill',
                ['body' => json_encode($data)]
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

    public function removeCompetencyProjectExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeProjectExperience/BulkDeletePeProjectExperience',
                ['body' => json_encode($data)]
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

    public function removeCompetencyTrainingListPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeTraining/BulkDeletePeTraining',
                ['body' => json_encode($data)]
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

    public function removeWorkDetailWorkExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeWorkExperience/DeletePeWorkExperience',
                ['body' => json_encode(
                    [
                        "workExperienceList" => $data,
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'companyCode' => Session::get('companyCode'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function removeWorkDetailFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'freeFormatCode' => $value['freeFormatCode'],
                    'value' => $value['value'],
                    'sessionID' => 0,
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];
            }

            $response = $client->delete(env('API_URL') . '/personel/PeFreeFormat/DeletePeFreeFormat',
                ['body' => json_encode(
                    [
                        "freeFormatList" => $data,
                        "languageCode" => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'companyCode' => Session::get('companyCode'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
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

    public function removeEmployeeAttachmentPersonel(Request $request)
    {
        $mime_map = [
            'video/3gpp2'                                                               => '3g2',
            'video/3gp'                                                                 => '3gp',
            'video/3gpp'                                                                => '3gp',
            'application/x-compressed'                                                  => '7zip',
            'audio/x-acc'                                                               => 'aac',
            'audio/ac3'                                                                 => 'ac3',
            'application/postscript'                                                    => 'ai',
            'audio/x-aiff'                                                              => 'aif',
            'audio/aiff'                                                                => 'aif',
            'audio/x-au'                                                                => 'au',
            'video/x-msvideo'                                                           => 'avi',
            'video/msvideo'                                                             => 'avi',
            'video/avi'                                                                 => 'avi',
            'application/x-troff-msvideo'                                               => 'avi',
            'application/macbinary'                                                     => 'bin',
            'application/mac-binary'                                                    => 'bin',
            'application/x-binary'                                                      => 'bin',
            'application/x-macbinary'                                                   => 'bin',
            'image/bmp'                                                                 => 'bmp',
            'image/x-bmp'                                                               => 'bmp',
            'image/x-bitmap'                                                            => 'bmp',
            'image/x-xbitmap'                                                           => 'bmp',
            'image/x-win-bitmap'                                                        => 'bmp',
            'image/x-windows-bmp'                                                       => 'bmp',
            'image/ms-bmp'                                                              => 'bmp',
            'image/x-ms-bmp'                                                            => 'bmp',
            'application/bmp'                                                           => 'bmp',
            'application/x-bmp'                                                         => 'bmp',
            'application/x-win-bitmap'                                                  => 'bmp',
            'application/cdr'                                                           => 'cdr',
            'application/coreldraw'                                                     => 'cdr',
            'application/x-cdr'                                                         => 'cdr',
            'application/x-coreldraw'                                                   => 'cdr',
            'image/cdr'                                                                 => 'cdr',
            'image/x-cdr'                                                               => 'cdr',
            'zz-application/zz-winassoc-cdr'                                            => 'cdr',
            'application/mac-compactpro'                                                => 'cpt',
            'application/pkix-crl'                                                      => 'crl',
            'application/pkcs-crl'                                                      => 'crl',
            'application/x-x509-ca-cert'                                                => 'crt',
            'application/pkix-cert'                                                     => 'crt',
            'text/css'                                                                  => 'css',
            'text/x-comma-separated-values'                                             => 'csv',
            'text/comma-separated-values'                                               => 'csv',
            'application/vnd.msexcel'                                                   => 'csv',
            'application/x-director'                                                    => 'dcr',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
            'application/x-dvi'                                                         => 'dvi',
            'message/rfc822'                                                            => 'eml',
            'application/x-msdownload'                                                  => 'exe',
            'video/x-f4v'                                                               => 'f4v',
            'audio/x-flac'                                                              => 'flac',
            'video/x-flv'                                                               => 'flv',
            'image/gif'                                                                 => 'gif',
            'application/gpg-keys'                                                      => 'gpg',
            'application/x-gtar'                                                        => 'gtar',
            'application/x-gzip'                                                        => 'gzip',
            'application/mac-binhex40'                                                  => 'hqx',
            'application/mac-binhex'                                                    => 'hqx',
            'application/x-binhex40'                                                    => 'hqx',
            'application/x-mac-binhex40'                                                => 'hqx',
            'text/html'                                                                 => 'html',
            'image/x-icon'                                                              => 'ico',
            'image/x-ico'                                                               => 'ico',
            'image/vnd.microsoft.icon'                                                  => 'ico',
            'text/calendar'                                                             => 'ics',
            'application/java-archive'                                                  => 'jar',
            'application/x-java-application'                                            => 'jar',
            'application/x-jar'                                                         => 'jar',
            'image/jp2'                                                                 => 'jp2',
            'video/mj2'                                                                 => 'jp2',
            'image/jpx'                                                                 => 'jp2',
            'image/jpm'                                                                 => 'jp2',
            'image/jpeg'                                                                => 'jpeg',
            'image/pjpeg'                                                               => 'jpeg',
            'application/x-javascript'                                                  => 'js',
            'application/json'                                                          => 'json',
            'text/json'                                                                 => 'json',
            'application/vnd.google-earth.kml+xml'                                      => 'kml',
            'application/vnd.google-earth.kmz'                                          => 'kmz',
            'text/x-log'                                                                => 'log',
            'audio/x-m4a'                                                               => 'm4a',
            'audio/mp4'                                                                 => 'm4a',
            'application/vnd.mpegurl'                                                   => 'm4u',
            'audio/midi'                                                                => 'mid',
            'application/vnd.mif'                                                       => 'mif',
            'video/quicktime'                                                           => 'mov',
            'video/x-sgi-movie'                                                         => 'movie',
            'audio/mpeg'                                                                => 'mp3',
            'audio/mpg'                                                                 => 'mp3',
            'audio/mpeg3'                                                               => 'mp3',
            'audio/mp3'                                                                 => 'mp3',
            'video/mp4'                                                                 => 'mp4',
            'video/mpeg'                                                                => 'mpeg',
            'application/oda'                                                           => 'oda',
            'audio/ogg'                                                                 => 'ogg',
            'video/ogg'                                                                 => 'ogg',
            'application/ogg'                                                           => 'ogg',
            'font/otf'                                                                  => 'otf',
            'application/x-pkcs10'                                                      => 'p10',
            'application/pkcs10'                                                        => 'p10',
            'application/x-pkcs12'                                                      => 'p12',
            'application/x-pkcs7-signature'                                             => 'p7a',
            'application/pkcs7-mime'                                                    => 'p7c',
            'application/x-pkcs7-mime'                                                  => 'p7c',
            'application/x-pkcs7-certreqresp'                                           => 'p7r',
            'application/pkcs7-signature'                                               => 'p7s',
            'application/pdf'                                                           => 'pdf',
            'application/octet-stream'                                                  => 'pdf',
            'application/x-x509-user-cert'                                              => 'pem',
            'application/x-pem-file'                                                    => 'pem',
            'application/pgp'                                                           => 'pgp',
            'application/x-httpd-php'                                                   => 'php',
            'application/php'                                                           => 'php',
            'application/x-php'                                                         => 'php',
            'text/php'                                                                  => 'php',
            'text/x-php'                                                                => 'php',
            'application/x-httpd-php-source'                                            => 'php',
            'image/png'                                                                 => 'png',
            'image/x-png'                                                               => 'png',
            'application/powerpoint'                                                    => 'ppt',
            'application/vnd.ms-powerpoint'                                             => 'ppt',
            'application/vnd.ms-office'                                                 => 'ppt',
            'application/msword'                                                        => 'doc',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'application/x-photoshop'                                                   => 'psd',
            'image/vnd.adobe.photoshop'                                                 => 'psd',
            'audio/x-realaudio'                                                         => 'ra',
            'audio/x-pn-realaudio'                                                      => 'ram',
            'application/x-rar'                                                         => 'rar',
            'application/rar'                                                           => 'rar',
            'application/x-rar-compressed'                                              => 'rar',
            'audio/x-pn-realaudio-plugin'                                               => 'rpm',
            'application/x-pkcs7'                                                       => 'rsa',
            'text/rtf'                                                                  => 'rtf',
            'text/richtext'                                                             => 'rtx',
            'video/vnd.rn-realvideo'                                                    => 'rv',
            'application/x-stuffit'                                                     => 'sit',
            'application/smil'                                                          => 'smil',
            'text/srt'                                                                  => 'srt',
            'image/svg+xml'                                                             => 'svg',
            'application/x-shockwave-flash'                                             => 'swf',
            'application/x-tar'                                                         => 'tar',
            'application/x-gzip-compressed'                                             => 'tgz',
            'image/tiff'                                                                => 'tiff',
            'font/ttf'                                                                  => 'ttf',
            'text/plain'                                                                => 'txt',
            'text/x-vcard'                                                              => 'vcf',
            'application/videolan'                                                      => 'vlc',
            'text/vtt'                                                                  => 'vtt',
            'audio/x-wav'                                                               => 'wav',
            'audio/wave'                                                                => 'wav',
            'audio/wav'                                                                 => 'wav',
            'application/wbxml'                                                         => 'wbxml',
            'video/webm'                                                                => 'webm',
            'image/webp'                                                                => 'webp',
            'audio/x-ms-wma'                                                            => 'wma',
            'application/wmlc'                                                          => 'wmlc',
            'video/x-ms-wmv'                                                            => 'wmv',
            'video/x-ms-asf'                                                            => 'wmv',
            'font/woff'                                                                 => 'woff',
            'font/woff2'                                                                => 'woff2',
            'application/xhtml+xml'                                                     => 'xhtml',
            'application/excel'                                                         => 'xl',
            'application/msexcel'                                                       => 'xls',
            'application/x-msexcel'                                                     => 'xls',
            'application/x-ms-excel'                                                    => 'xls',
            'application/x-excel'                                                       => 'xls',
            'application/x-dos_ms_excel'                                                => 'xls',
            'application/xls'                                                           => 'xls',
            'application/x-xls'                                                         => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
            'application/vnd.ms-excel'                                                  => 'xlsx',
            'application/xml'                                                           => 'xml',
            'text/xml'                                                                  => 'xml',
            'text/xsl'                                                                  => 'xsl',
            'application/xspf+xml'                                                      => 'xspf',
            'application/x-compress'                                                    => 'z',
            'application/x-zip'                                                         => 'zip',
            'application/zip'                                                           => 'zip',
            'application/x-zip-compressed'                                              => 'zip',
            'application/s-compressed'                                                  => 'zip',
            'multipart/x-zip'                                                           => 'zip',
            'text/x-scriptzsh'                                                          => 'zsh',
        ];

        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->data as $key => $value){
                $data[] = [
                    'companyCode' => $value['companyCode'],
                    'employeeNo' => $value['employeeNo'],
                    'seqNo' => (int) $value['seqNo'],
                    "fileName" => $value['fileName'],
                    "attachmentCode" => $value['attachmentCode'],
                    'sessionID' => 0,
                    "changedNo" => 0,
                    "createdDate" => date("Y-m-d\TH:i:s"),
                    "createdBy" => Session::get('userID'),
                    "changedDate" => date("Y-m-d\TH:i:s"),
                    "changedBy" => Session::get('userID'),
                    'sessionUserID' => Session::get('userID'),
                    'logActionUserID' => Session::get('userID'),
                    'logActionUsername' => Session::get('userName'),
                    'languageCode' => App::getLocale()
                ];

                $imgdata = base64_decode($value['attachmentFile']);
                $f = finfo_open();
                $mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);

                $filename = $value['companyCode'] . '_' . $value['employeeNo'] . '_' . $value['attachmentCode'] . '_' . $value['fileName'] . '.' . $mime_map[$mime_type];
                File::delete('attachment/'.$filename);
            }

            $response = $client->delete(env('API_URL') . '/personel/PeAttachment/bulkDeletePeAttachment',
                ['body' => json_encode($data)]
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

    public function checkNumberPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if(isset($request->employeeNo)){
                $response = $client->post(env('API_URL') . $request->url,
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

    public function checkNumberPersonelDataDetail(Request $request)
    {
        // $pemasterType = 
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump($request->employeeNo);

            if(isset($request->employeeNo)){
                $response = $client->post(env('API_URL') . $request->url,
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
            if(isset($arrResult->dataListSet[0]->{$request->pemasterType}[0]->sequenceNo)){
                $number = max(array_column($arrResult->dataListSet[0]->{$request->pemasterType}, 'sequenceNo')) + 1;
            }else if(isset($arrResult->dataListSet[0]->{$request->pemasterType}[0]->seqNo)){
                $number = max(array_column($arrResult->dataListSet[0]->{$request->pemasterType}, 'seqNo')) + 1;
            }
        }

        return response()->json($number);

    }

    public function checkReportLevelPersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ReferencePersonnel/getReferencePersonnel',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_level = $client->post(env('API_URL') . '/personel/LevelMaster/getLevelMaster',
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
        $arrResult_level = json_decode($response_level->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return response()->json(['data' => [], 'data_level' => '']);
        }else{
            return response()->json(['data' => $arrResult->dataListSet, 'data_level' => $arrResult_level->dataListSet]);
        }
    }

    public function checkAutoEmployeeNoPersonel(Request $request)
    {
        $number = "";
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/ReferencePersonnel/getReferencePersonnel',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $arrResult = json_decode($response->getBody()->getContents());

            if(isset($arrResult->dataListSet[0]->flagAutoEmployeeNo)){
                if ($arrResult->dataListSet[0]->flagAutoEmployeeNo == true) {
                    $response2 = $client->post(env('API_URL') . $request->url,
                        ['body' => json_encode(
                            [
                                'companyCode' => Session::get('companyCode'),
                                'userID' => Session::get('userID'),
                                'logActionUserID' => Session::get('userID'),
                                'logActionUsername' => Session::get('userName')
                            ]
                        )]
                    );
    
                    $arrResult2 = json_decode($response2->getBody()->getContents());
    
                    if($arrResult2->dataListSet == null){
                        $number = 1;
                    }else{
                        // var_dump($arrResult2->dataListSet);
                        if(isset($arrResult2->dataListSet[0]->employeeNo)){
                            $number = max(array_column($arrResult2->dataListSet, 'employeeNo')) + 1;
                        }
                    }
                }
            }else{
                $number = 0;
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

        return response()->json($number);
    }

    public function printEmployeeListPersonel(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->input_type);
        try{
            return Excel::download(new EmployeeListExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->input_type, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Employee List Report.xlsx');
        }catch (\Maatwebsite\Excel\Validators\ValidationException $failures)
        {
            // dd($failures);
            // return view('welcome', compact('failures'));
        }
    }

    public function printEmployeeTurnOverReportPersonel(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new EmployeeTurnOverReportExport($request->employee_no_from, $request->employee_no_to, $request->period_from, $request->period_to, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Employee Turn Over Report.xlsx');
    }

    public function printEmployeeSkillReportPersonel(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new EmployeeSkillReportExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Employee Skill Report.xlsx');
    }

    public function printEmployeeCardPersonel(Request $request){
        try{
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'companyCode' => Session::get('companyCode'),
                'includeResign' => isset($request->include_resign) ? (bool) $request->include_resign : false,
                'includeFamily' => isset($request->family) ? (bool) $request->family : false,
                'includeSkill' => isset($request->skill) ? (bool) $request->skill : false,
                'includeFormalEducation' => isset($request->formal_education) ? (bool) $request->formal_education : false,
                'includeOrganization' => isset($request->organization) ? (bool) $request->organization : false,
                'includeProjectExperience' => isset($request->project_experience) ? (bool) $request->project_experience : false,
                'includeTrainingRecords' => isset($request->training_records) ? (bool) $request->training_records : false,
                'includeHistoricalJobs' => isset($request->historical_jobs) ? (bool) $request->historical_jobs : false,
                'includeWorkExperience' => isset($request->work_experience) ? (bool) $request->work_experience : false,
                'includeAward' => isset($request->award) ? (bool) $request->award : false,
                'includeSanction' => isset($request->sanction) ? (bool) $request->sanction : false,
                "languageID" => App::getLocale(),
                "sessionID" => 0,
                "sessionUserID" => Session::get('userID'),
                "logActionUsername" => Session::get('userName'),
                "logActionUserID" => Session::get('userID')
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->ranking) && !is_null($request->ranking[0])){
                foreach($request->ranking as $value){
                    $data_ranking[] = $value;
                }
                $param['ranking'] = $data_ranking;
            }

            if(!empty($request->position) && !is_null($request->position[0])){
                foreach($request->position as $value){
                    $data_position[] = $value;
                }
                $param['position'] = $data_position;
            }

            if(!empty($request->location) && !is_null($request->location[0])){
                foreach($request->location as $value){
                    $data_location[] = $value;
                }
                $param['location'] = $data_location;
            }

            // dd(json_encode($param));

            $response = $client->post(env('API_URL').'/employeecard/getemployeecard', [
                'body' => json_encode($param)
            ]);
        }catch (RequestException $e){
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
            $pdf = PDF::loadView('personel.personel_export_employee_card', ['data' => []])->setPaper('a4', 'portrait')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Employee Card Report.pdf');
        }else{
            $pdf = PDF::loadView('personel.personel_export_employee_card', ['data' => $arrResult->dataListSet])->setPaper('a4', 'portrait')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Employee Card Report.pdf');
        }
    }

    public function printEvaluationReportPersonel(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [ 
                'companyCode' => Session::get('companyCode'), 
                'languageID' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                'includeResign' => isset($request->include_resign) ? (bool) $request->include_resign : false
            ];

            if(!empty($request->employee_no_from) || !empty($request->employee_no_to)){
                $param['employeeNoFrom'] = $request->employee_no_from;
                $param['employeeNoTo'] = $request->employee_no_to;
            }

            if(!empty($request->period_from) || !empty($request->period_to)){
                $param['evaluationPeriodFrom'] = $request->period_from;
                $param['evaluationPeriodTo'] = $request->period_to;
            }

            if(!empty($request->group_authorize_from) || !empty($request->group_authorize_to)){
                $param['groupAuthorizeCodeFrom'] = $request->group_authorize_from;
                $param['groupAuthorizeCodeTo'] = $request->group_authorize_to;
            }

            if(!empty($request->position) && !is_null($request->position[0])){
                foreach($request->position as $value){
                    $data_position[] = $value;
                }
                $param['position'] = $data_position;
            }

            if(!empty($request->location) && !is_null($request->location[0])){
                foreach($request->location as $value){
                    $data_location[] = $value;
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
                        $data_level_detail[] = $value2;
                    }
                    $data_level[] = [
                        "levelType" => (string) ($key + 1),
                        "levelCode" => $data_level_detail
                    ];
                }

                $param['levelMaster'] = $data_level;
            }
            // if(!empty($request->dataLevel) && !is_null($request->dataLevel[0])){
            //     foreach($request->dataLevel as $key => $value){
            //         $data_level_detail = [];
            //         foreach($request->dataLevel[$key] as $value2){
            //             $data_level_detail[] = [
            //                 'levelCode' => $value2
            //             ];
            //         }
            //         $data_level[] = [
            //             "companyCode" => Session::get('companyCode'),
            //             "levelType" => (string) ($key + 1),
            //             "level" => $data_level_detail
            //         ];
            //     }
            //     $param['levelMaster'] = $data_level;
            // }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . '/evaluationreport/getevaluationreport',
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

        // var_dump($arrResult->dataListSet[0]);

        if($arrResult->dataListSet == null){
            $pdf = PDF::loadView('personel.personel_export_evaluation_report', ['data' => []])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Evaluation Report.pdf');
        }else{
            $pdf = PDF::loadView('personel.personel_export_evaluation_report', ['data' => $arrResult->dataListSet])->setPaper('a4', 'landscape')->setOptions(['defaultFont' => 'arial']);
            return $pdf->stream('Evaluation Report.pdf');
        }

        // var_dump($request->period);

    }

    public function printEmployeeReportByStatusPersonel(Request $request)
    {
        return Excel::download(new EmployeeReportByStatusExport($request->employee_no_from, $request->employee_no_to, $request->period_from, $request->period_to, $request->report_type, isset($request->include_resign) ? (bool) $request->include_resign : false), 'Employee Report By Status.xlsx');
    }

    public function checkResultPerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/GmPerformanceResult/GetResult',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'result' => (int) $request->valueSum,
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

        return response()->json($arrResult->dataListSet);
    }

    public function prosesEmployeePhotoPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $file = $request->file('photo_profile');
            $filename = Session::get('companyCode') . '_' . $file->getClientOriginalName();
            $file->move(public_path('letter_template'), $filename);
            $path = public_path('letter_template/');

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/pemaster/putlevelmaster',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'employeeNo' => $request->employee_no_profile,
                            'photo' => base64_encode(file_get_contents($path . $filename)),
                            "changedNo" => 0,
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => strtoupper(App::getLocale())
                        ]
                    )]
                );
            }else{
                $response = $client->put(env('API_URL') . '/printletter/updatetemplate',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'letterType' => $request->letter_type,
                            'letterFile64' => base64_encode(file_get_contents($path . $filename)),
                            "createdDate" => date("Y-m-d\TH:i:s"),
                            "createdBy" => Session::get('userID'),
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
                            'sessionUserID' => Session::get('userID'),
                            'logActionUserID' => Session::get('userID'),
                            'logActionUsername' => Session::get('userName'),
                            "languageCode" => strtoupper(App::getLocale())
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
        // return response()->json($request->record_status);
    }

    public function viewEmployeeAttachmentPersonel(Request $request)
    {
        $mime_map = [
            'video/3gpp2'                                                               => '3g2',
            'video/3gp'                                                                 => '3gp',
            'video/3gpp'                                                                => '3gp',
            'application/x-compressed'                                                  => '7zip',
            'audio/x-acc'                                                               => 'aac',
            'audio/ac3'                                                                 => 'ac3',
            'application/postscript'                                                    => 'ai',
            'audio/x-aiff'                                                              => 'aif',
            'audio/aiff'                                                                => 'aif',
            'audio/x-au'                                                                => 'au',
            'video/x-msvideo'                                                           => 'avi',
            'video/msvideo'                                                             => 'avi',
            'video/avi'                                                                 => 'avi',
            'application/x-troff-msvideo'                                               => 'avi',
            'application/macbinary'                                                     => 'bin',
            'application/mac-binary'                                                    => 'bin',
            'application/x-binary'                                                      => 'bin',
            'application/x-macbinary'                                                   => 'bin',
            'image/bmp'                                                                 => 'bmp',
            'image/x-bmp'                                                               => 'bmp',
            'image/x-bitmap'                                                            => 'bmp',
            'image/x-xbitmap'                                                           => 'bmp',
            'image/x-win-bitmap'                                                        => 'bmp',
            'image/x-windows-bmp'                                                       => 'bmp',
            'image/ms-bmp'                                                              => 'bmp',
            'image/x-ms-bmp'                                                            => 'bmp',
            'application/bmp'                                                           => 'bmp',
            'application/x-bmp'                                                         => 'bmp',
            'application/x-win-bitmap'                                                  => 'bmp',
            'application/cdr'                                                           => 'cdr',
            'application/coreldraw'                                                     => 'cdr',
            'application/x-cdr'                                                         => 'cdr',
            'application/x-coreldraw'                                                   => 'cdr',
            'image/cdr'                                                                 => 'cdr',
            'image/x-cdr'                                                               => 'cdr',
            'zz-application/zz-winassoc-cdr'                                            => 'cdr',
            'application/mac-compactpro'                                                => 'cpt',
            'application/pkix-crl'                                                      => 'crl',
            'application/pkcs-crl'                                                      => 'crl',
            'application/x-x509-ca-cert'                                                => 'crt',
            'application/pkix-cert'                                                     => 'crt',
            'text/css'                                                                  => 'css',
            'text/x-comma-separated-values'                                             => 'csv',
            'text/comma-separated-values'                                               => 'csv',
            'application/vnd.msexcel'                                                   => 'csv',
            'application/x-director'                                                    => 'dcr',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'   => 'docx',
            'application/x-dvi'                                                         => 'dvi',
            'message/rfc822'                                                            => 'eml',
            'application/x-msdownload'                                                  => 'exe',
            'video/x-f4v'                                                               => 'f4v',
            'audio/x-flac'                                                              => 'flac',
            'video/x-flv'                                                               => 'flv',
            'image/gif'                                                                 => 'gif',
            'application/gpg-keys'                                                      => 'gpg',
            'application/x-gtar'                                                        => 'gtar',
            'application/x-gzip'                                                        => 'gzip',
            'application/mac-binhex40'                                                  => 'hqx',
            'application/mac-binhex'                                                    => 'hqx',
            'application/x-binhex40'                                                    => 'hqx',
            'application/x-mac-binhex40'                                                => 'hqx',
            'text/html'                                                                 => 'html',
            'image/x-icon'                                                              => 'ico',
            'image/x-ico'                                                               => 'ico',
            'image/vnd.microsoft.icon'                                                  => 'ico',
            'text/calendar'                                                             => 'ics',
            'application/java-archive'                                                  => 'jar',
            'application/x-java-application'                                            => 'jar',
            'application/x-jar'                                                         => 'jar',
            'image/jp2'                                                                 => 'jp2',
            'video/mj2'                                                                 => 'jp2',
            'image/jpx'                                                                 => 'jp2',
            'image/jpm'                                                                 => 'jp2',
            'image/jpeg'                                                                => 'jpeg',
            'image/pjpeg'                                                               => 'jpeg',
            'application/x-javascript'                                                  => 'js',
            'application/json'                                                          => 'json',
            'text/json'                                                                 => 'json',
            'application/vnd.google-earth.kml+xml'                                      => 'kml',
            'application/vnd.google-earth.kmz'                                          => 'kmz',
            'text/x-log'                                                                => 'log',
            'audio/x-m4a'                                                               => 'm4a',
            'audio/mp4'                                                                 => 'm4a',
            'application/vnd.mpegurl'                                                   => 'm4u',
            'audio/midi'                                                                => 'mid',
            'application/vnd.mif'                                                       => 'mif',
            'video/quicktime'                                                           => 'mov',
            'video/x-sgi-movie'                                                         => 'movie',
            'audio/mpeg'                                                                => 'mp3',
            'audio/mpg'                                                                 => 'mp3',
            'audio/mpeg3'                                                               => 'mp3',
            'audio/mp3'                                                                 => 'mp3',
            'video/mp4'                                                                 => 'mp4',
            'video/mpeg'                                                                => 'mpeg',
            'application/oda'                                                           => 'oda',
            'audio/ogg'                                                                 => 'ogg',
            'video/ogg'                                                                 => 'ogg',
            'application/ogg'                                                           => 'ogg',
            'font/otf'                                                                  => 'otf',
            'application/x-pkcs10'                                                      => 'p10',
            'application/pkcs10'                                                        => 'p10',
            'application/x-pkcs12'                                                      => 'p12',
            'application/x-pkcs7-signature'                                             => 'p7a',
            'application/pkcs7-mime'                                                    => 'p7c',
            'application/x-pkcs7-mime'                                                  => 'p7c',
            'application/x-pkcs7-certreqresp'                                           => 'p7r',
            'application/pkcs7-signature'                                               => 'p7s',
            'application/pdf'                                                           => 'pdf',
            'application/octet-stream'                                                  => 'pdf',
            'application/x-x509-user-cert'                                              => 'pem',
            'application/x-pem-file'                                                    => 'pem',
            'application/pgp'                                                           => 'pgp',
            'application/x-httpd-php'                                                   => 'php',
            'application/php'                                                           => 'php',
            'application/x-php'                                                         => 'php',
            'text/php'                                                                  => 'php',
            'text/x-php'                                                                => 'php',
            'application/x-httpd-php-source'                                            => 'php',
            'image/png'                                                                 => 'png',
            'image/x-png'                                                               => 'png',
            'application/powerpoint'                                                    => 'ppt',
            'application/vnd.ms-powerpoint'                                             => 'ppt',
            'application/vnd.ms-office'                                                 => 'ppt',
            'application/msword'                                                        => 'doc',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'application/x-photoshop'                                                   => 'psd',
            'image/vnd.adobe.photoshop'                                                 => 'psd',
            'audio/x-realaudio'                                                         => 'ra',
            'audio/x-pn-realaudio'                                                      => 'ram',
            'application/x-rar'                                                         => 'rar',
            'application/rar'                                                           => 'rar',
            'application/x-rar-compressed'                                              => 'rar',
            'audio/x-pn-realaudio-plugin'                                               => 'rpm',
            'application/x-pkcs7'                                                       => 'rsa',
            'text/rtf'                                                                  => 'rtf',
            'text/richtext'                                                             => 'rtx',
            'video/vnd.rn-realvideo'                                                    => 'rv',
            'application/x-stuffit'                                                     => 'sit',
            'application/smil'                                                          => 'smil',
            'text/srt'                                                                  => 'srt',
            'image/svg+xml'                                                             => 'svg',
            'application/x-shockwave-flash'                                             => 'swf',
            'application/x-tar'                                                         => 'tar',
            'application/x-gzip-compressed'                                             => 'tgz',
            'image/tiff'                                                                => 'tiff',
            'font/ttf'                                                                  => 'ttf',
            'text/plain'                                                                => 'txt',
            'text/x-vcard'                                                              => 'vcf',
            'application/videolan'                                                      => 'vlc',
            'text/vtt'                                                                  => 'vtt',
            'audio/x-wav'                                                               => 'wav',
            'audio/wave'                                                                => 'wav',
            'audio/wav'                                                                 => 'wav',
            'application/wbxml'                                                         => 'wbxml',
            'video/webm'                                                                => 'webm',
            'image/webp'                                                                => 'webp',
            'audio/x-ms-wma'                                                            => 'wma',
            'application/wmlc'                                                          => 'wmlc',
            'video/x-ms-wmv'                                                            => 'wmv',
            'video/x-ms-asf'                                                            => 'wmv',
            'font/woff'                                                                 => 'woff',
            'font/woff2'                                                                => 'woff2',
            'application/xhtml+xml'                                                     => 'xhtml',
            'application/excel'                                                         => 'xl',
            'application/msexcel'                                                       => 'xls',
            'application/x-msexcel'                                                     => 'xls',
            'application/x-ms-excel'                                                    => 'xls',
            'application/x-excel'                                                       => 'xls',
            'application/x-dos_ms_excel'                                                => 'xls',
            'application/xls'                                                           => 'xls',
            'application/x-xls'                                                         => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'         => 'xlsx',
            'application/vnd.ms-excel'                                                  => 'xlsx',
            'application/xml'                                                           => 'xml',
            'text/xml'                                                                  => 'xml',
            'text/xsl'                                                                  => 'xsl',
            'application/xspf+xml'                                                      => 'xspf',
            'application/x-compress'                                                    => 'z',
            'application/x-zip'                                                         => 'zip',
            'application/zip'                                                           => 'zip',
            'application/x-zip-compressed'                                              => 'zip',
            'application/s-compressed'                                                  => 'zip',
            'multipart/x-zip'                                                           => 'zip',
            'text/x-scriptzsh'                                                          => 'zsh',
        ];

        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/personel/PeAttachment/getPeAttachment',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'employeeNo' => $request->employeeNo,
                        'attachmentCode' => $request->attachmentCode,
                        'fileName' => $request->fileName,
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => App::getLocale()
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

        // $extension = explode('/', mime_content_type($arrResult->dataListSet[0]->attachmentFile))[1];
        $imgdata = base64_decode($arrResult->dataListSet[0]->attachmentFile);
        $f = finfo_open();
        $mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);

        $filename = Session::get('companyCode') . '_' . $arrResult->dataListSet[0]->employeeNo . '_' . $arrResult->dataListSet[0]->attachmentCode . '_' . $arrResult->dataListSet[0]->fileName . '.' . $mime_map[$mime_type];
        file_put_contents(public_path('attachment/') . $filename, base64_decode($arrResult->dataListSet[0]->attachmentFile));

        return response()->json(['filename' => $filename]);
    }

    public function prosesEmployeeAttachmentPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->hasFile('attachment_file')) {
                $file = $request->file('attachment_file');
                $filename = Session::get('companyCode') . '_' . $request->employee_no_detail . '_' . $request->attachment_code . '_' . $request->file_name;
                $file->move(public_path('attachment'), $filename);
                $path = public_path('attachment/');
            }

            $response = $client->post(env('API_URL') . '/personel/PeAttachment',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'seqNo' => (int) $request->seq_no,
                        'employeeNo' => $request->employee_no_detail,
                        'fileName' => $request->file_name,
                        'attachmentCode' => $request->attachment_code,
                        'attachmentFile' => ($request->hasFile('attachment_file')) ? base64_encode(file_get_contents($path . $filename)) : '',
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        "languageCode" => App::getLocale()
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

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message, 'employeeNo' => $request->employee_no_detail]);
    }

    // public function prosesCustomReportEmployeePersonel(Request $request)
    // {
    //     date_default_timezone_set('Asia/Jakarta');
    //     try {
    //         $client = new Client([
    //             'headers' => [ 'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer ' . Session::get('token') ]
    //         ]);

    //         $response = $client->post(env('API_URL') . '/reportformatemployee/getreportformatemployee',
    //             ['body' => json_encode(
    //                 [[
    //                     'companyCode' => Session::get('companyCode'),
    //                     'employeeNoFrom' => $request->data->employee_no_from,
    //                     'employeeNoTo' => $request->data->employee_no_to,
    //                     'absenDateFrom' => date("Y-m-d\TH:i:s"),
    //                     'absenDateTo' => date("Y-m-d\TH:i:s"),
    //                     'incResign' => true,
    //                     "groupAuthorizeFrom" => $request->data->group_authorize_from,
    //                     "groupAuthorizeTo" => $request->data->group_authorize_to
    //                 ]]
    //             )]
    //         );
    //     } catch (RequestException $e) {
    //         $response = $e->getResponse();
            // if($response->getStatusCode() == 401){
            //     return view('error.login');
            // }else if($response->getStatusCode() == 404){
            //     return view('error.not_found');
            // }else{
            //     return view('error.bad_request');
            // }
    //     }

    //     $arrResult = json_decode($response->getBody()->getContents());

    //     return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    // }

    public function printCustomReportEmployee(Request $request)
    {
        parse_str($request->field, $arrData);

        $arrData2 = json_decode($request->field_name);

        return Excel::download(new CustomReportEmployeeExport($arrData['employee_no_from'], $arrData['employee_no_to'], $arrData['employment_status'], isset($arrData['include_resign']) ? (bool) $arrData['include_resign'] : false, $arrData['group_authorize_from'], $arrData['group_authorize_to'], $arrData2), 'Custom Report Employee.xlsx');
    }

    public function printEmployeeDependentsPersonel(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        return Excel::download(new EmployeeDependentsExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, isset($request->include_medical) ? (bool) $request->include_medical : false, isset($request->include_payroll) ? (bool) $request->include_payroll : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Employee Dependents Report.xlsx');
    }

    public function templatePersonalDataPersonel()
    {
        return Excel::download(new PersonalDataTemplateExport, 'Template Personel Data.xlsx');
    }

    public function exportPersonalDataPersonel(Request $request)
    {
        return Excel::download(new PersonalDataExport, 'Personel Data.xlsx');
    }

    public function importPersonalDataPersonel(Request $request)
    {
        try{
            $file = $request->file('import_export');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new PersonalDataImport;
            Excel::import($import, public_path('file_excel/'.$nama_file), null, \Maatwebsite\Excel\Excel::XLSX);
            File::delete('file_excel/'.$nama_file);
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

    public function importUpdatePersonalDataPersonel(Request $request)
    {
        try{
            $file = $request->file('import_update');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            $import = new PersonalDataUpdateImport;
            Excel::import($import, public_path('file_excel/'.$nama_file), null, \Maatwebsite\Excel\Excel::XLSX);
            File::delete('file_excel/'.$nama_file);
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

    public function importMasterDataPersonel(Request $request)
    {
        try{
            $file = $request->file('import_export');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_excel', $nama_file);
            switch ($request->maintenance_type) {
                case 'level':
                    $import = new LevelDataImport;
                    break;
                case 'cost_center':
                    $import = new CostCenterDataImport;
                    break;
                case 'location':
                    $import = new LocationDataImport;
                    break;
                case 'position':
                    $import = new PositionDataImport;
                    break;
                case 'ranking':
                    $import = new RankingDataImport;
                    break;
                case 'grade':
                    $import = new GradeDataImport;
                    break;
                case 'group':
                    $import = new GroupDataImport;
                    break;
                case 'nature_of_work':
                    $import = new NatureofWorkDataImport;
                    break;
                case 'institution':
                    $import = new InstitutionDataImport;
                    break;
                case 'major':
                    $import = new MajorDataImport;
                    break;
                case 'city':
                    $import = new CityDataImport;
                    break;
                case 'zip_code':
                    $import = new ZipCodeDataImport;
                    break;
                case 'account':
                    $import = new AccountDataImport;
                    break;
                case 'journal_template':
                    $import = new JournalTemplateDataImport;
                    break;
                default:
                    $import = new PersonalDataImport;
            }
            Excel::import($import, public_path('file_excel/'.$nama_file), null, \Maatwebsite\Excel\Excel::XLSX);
            File::delete('file_excel/'.$nama_file);
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

    public function downloadTemplateMasterDataPersonel(Request $request)
    {
        $fileName = null;
        switch ($request->maintenance_type) {
            case 'level':
                $fileName = "Template Level Master.xlsx";
                break;
            case 'cost_center':
                $fileName = "Template Cost Center Master.xlsx";
                break;
            case 'location':
                $fileName = "Template Location Master.xlsx";
                break;
            case 'position':
                $fileName = "Template Position Master.xlsx";
                break;
            case 'ranking':
                $fileName = "Template Ranking Master.xlsx";
                break;
            case 'grade':
                $fileName = "Template Grade Master.xlsx";
                break;
            case 'group':
                $fileName = "Template Group Master.xlsx";
                break;
            case 'nature_of_work':
                $fileName = "Template Nature of Work Master.xlsx";
                break;
            case 'institution':
                $fileName = "Template Institution Master.xlsx";
                break;
            case 'major':
                $fileName = "Template Major Master.xlsx";
                break;
            case 'city':
                $fileName = "Template City Master.xlsx";
                break;
            case 'zip_code':
                $fileName = "Template Zip Code Master.xlsx";
                break;
            case 'account':
                $fileName = "Template Account Master.xlsx";
                break;
            case 'journal_template':
                $fileName = "Template Journal Master.xlsx";
                break;
            default:
                $fileName = "Template Master.xlsx";
        }
        return Excel::download(new MasterDataTemplateExport($request->maintenance_type), $fileName);
    }
}