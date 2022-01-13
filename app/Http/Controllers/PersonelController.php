<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeListExport;
use App\Exports\EmployeeReportByStatusExport;
use App\Exports\EmployeeTurnOverReportExport;
use App\Exports\EmployeeSkillReportExport;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use DataTables;
use Excel;
use PDF;

class PersonelController extends Controller
{
    public function pagePersonelMain()
    {
    	return view('personel.personel_main');
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencepersonnel/getreferencepersonnel',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_level = $client->post(env('API_URL') . '/levelmaster/getlevelmaster',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemaster/getpemastergrid',
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
            var_dump($e->getResponse());
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
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableEmployeeAttachmentPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'employee_no' => 1304020,
                    'employee_name' => 'Yudha Nugraha'
                ]
            ]);
            return Datatables::of($data)->make(true);
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            foreach($arrResult->dataListSet as $value){
                $filename = Session::get('companyCode') . '_' . $value->letterType . '.docx';
                file_put_contents(public_path('letter_master/') . $filename, base64_decode($value->letter));
                $value->letter = $filename;
            }

            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function tableLevelPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/level/getlevel',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/getlettertemplate',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/costcenter/getcostcenter',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/location/getlocation',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/position/getposition',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmranking/getgmranking',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/grade/getgrade',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/group/getgroup',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/worknature/getworknature',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/bpjs/getbpjs',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/npwp/getnpwp',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmbank/getgmbank',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/companybank/getcompanybank',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gminstitution/getgminstitution',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmmajor/getgmmajor',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmcoursetype/getgmcoursetype',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/city/getcity',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
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

    public function tableZipCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/zipcode/getzipcode',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/evaluationform/getevaluationform',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmtitle/getgmtitle',
                ['body' => json_encode(
                    [
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmperformanceresult/getgmperformanceresult',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmskill/getgmskill',
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
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
                        'logActionUsername' => Session::get('userName')
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

        return view('personel.personel_personal_data_detail', ['data' => $data, 'photo' => '']);
    }

    public function dataDetailPerformancePersonel(Request $request)
    {
        try {
            $client = new Client([
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
                        'logActionUsername' => Session::get('userName')
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

        return view('personel.personel_employee_performance_detail', ['data' => $data, 'photo' => '']);
    }

    public function dataDetailWorkDetailPersonel(Request $request)
    {
        try {
            $client = new Client([
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
                        'logActionUsername' => Session::get('userName')
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

        return view('personel.personel_work_detail_detail', ['data' => $data, 'photo' => '']);
    }

    public function dataDetailCompetencyPersonel(Request $request)
    {
        try {
            $client = new Client([
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
                        'logActionUsername' => Session::get('userName')
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/level/getlevel',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_level_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailSourceDocumentPersonel(Request $request)
    {
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/costcenter/getcostcenter',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_cost_center_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailLocationCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/location/getlocation',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_location_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailPositionPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/position/getposition',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_position_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailRankingPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmranking/getgmranking',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_ranking_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailGradeCodePersonel(Request $request)
    {

        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/grade/getgrade',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_grade_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/group/getgroup',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_group_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailNatureofWorkPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/worknature/getworknature',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        return view('personel.personel_nature_of_work_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);   
    }

    public function dataDetailBPJSGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/bpjs/getbpjs',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        return view('personel.personel_bpjs_group_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailNPWPGroupPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/npwp/getnpwp',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        return view('personel.personel_npwp_group_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailBankPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmbank/getgmbank',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        return view('personel.personel_bank_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailCompanyBankPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/companybank/getcompanybank',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gminstitution/getgminstitution',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_institution_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);    }

    public function dataDetailMajorPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmmajor/getgmmajor',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_major_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailTypeofCoursePersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmcoursetype/getgmcoursetype',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/city/getcity',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        return view('personel.personel_city_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailZipCodePersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/zipcode/getzipcode',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/evaluationform/getevaluationform',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());
        
        return view('personel.personel_evaluation_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailTitlePersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmtitle/getgmtitle',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmskill/getgmskill',
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmperformanceresult/getgmperformanceresult',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_final_performance_result_code_detail', ['data' => $arrResult->dataListSet, 'func' => $request->func]);
    }

    public function dataDetailEmployeeMutationPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/mutation/getmutationview',
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pedependents/getpedependents',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peaward/getpeaward',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pesanction/getpesanction',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peevaluation/getpeevaluation',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/evaluationform/getevaluationdetail',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pemasterhistoryjob/getpemasterhistoryjob',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peworkexperience/getpeworkexperience',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pefreeformat/getpefreeformat',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peeducation/getcompetencyeducationgridview',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pelanguage/getcompetencylanguagegridview',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peorganization/getpeorganization',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pereference/getpereference',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peskill/getcompetencyskillgridview',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peprojectexperience/getpeprojectexperience',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/petraining/getpetraining',
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
            var_dump($e->getResponse());
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

            dd($data);

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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/evaluationform/getevaluationdetail',
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/evaluationform/getevaluationdetailpoint',
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/worknature',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusGradeCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/grade',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusPositionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/position',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusLocationCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/location',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusLevelPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/level',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusCostCenterCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/costcenter',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusPerformancePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/pemaster',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusCompetencyPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/pemaster',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmbank',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusCompanyBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/companybank',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/group',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusZipCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/zipcode',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusBPJSGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/bpjs',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusNPWPGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/npwp',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusRankingPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmranking',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusInstitutionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gminstitution',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusMajorPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmmajor',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusTypeofCoursePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmcoursetype/updategmcoursetype',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusSkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmskill/updategmskill',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusSourceDocumentPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusEvaluationFormPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/evaluationform',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/freeformatfield/updategmfreeformatfield',
                ['body' => json_encode(
                    [
                        'recordStatus' => $request->func,
                        'companyCode' => Session::get('companyCode'),
                        'freeFormatCode' => $request->freeFormatCode,
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusFreeFormatFieldDetailPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusCityPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/city',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusTitlePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmtitle/updategmtitle',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusFinalPerformanceResultPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/gmperformanceresult',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function statusPersonalDataPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/pemaster/updaterecordstatus',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesNatureofWorkPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/worknature',
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
                $response = $client->put(env('API_URL') . '/worknature',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesGradeCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/grade',
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
                $response = $client->put(env('API_URL') . '/grade',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesPositionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/position',
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
                $response = $client->put(env('API_URL') . '/position',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesLocationCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/location',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'locationCode' => $request->location_code,
                            'locationName' => $request->location_name,
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
                $response = $client->put(env('API_URL') . '/location',
                    ['body' => json_encode(
                        [
                            'recordStatus' => $request->record_status,
                            'companyCode' => Session::get('companyCode'),
                            'locationCode' => $request->location_code,
                            'locationName' => $request->location_name,
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesLevelPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/level',
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
                $response = $client->put(env('API_URL') . '/level',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCostCenterCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/costcenter',
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
                $response = $client->put(env('API_URL') . '/costcenter',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesPerformanceAwardPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peaward',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesPerformanceSanctionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pesanction',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesPerformanceEvaluationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->post(env('API_URL') . '/peevaluation/insertpeevaluation',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompetencyFormalEducationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peeducation',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompetencyLanguagePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pelanguage',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompetencyOrganizationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peorganization',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompetencyReferencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pereference',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompetencySkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peskill',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompetencyProjectExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peprojectexperience/insertpeprojectexperience',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompetencyTrainingListPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->hasFile('certificate_attachment')) {
                $file = $request->file('certificate_attachment');
                $filename = Session::get('companyCode') . '_' . $request->employee_no_training_list . '_' . $file->getClientOriginalName();
                $file->move(public_path('certificate'), $filename);
                $path = public_path('certificate/');
            }

            $response = $client->post(env('API_URL') . '/petraining',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmbank',
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
                $response = $client->put(env('API_URL') . '/gmbank',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesCompanyBankPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/companybank',
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
                $response = $client->put(env('API_URL') . '/companybank',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/group',
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
                $response = $client->put(env('API_URL') . '/group',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesZipCodePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/zipcode',
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
                $response = $client->put(env('API_URL') . '/zipcode',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesBPJSGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/bpjs',
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
                $response = $client->put(env('API_URL') . '/bpjs',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesNPWPGroupPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/npwp',
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
                $response = $client->put(env('API_URL') . '/npwp',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesRankingPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmranking',
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
                $response = $client->put(env('API_URL') . '/gmranking',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesInstitutionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gminstitution',
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
                $response = $client->put(env('API_URL') . '/gminstitution',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesMajorPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmmajor',
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
                $response = $client->put(env('API_URL') . '/gmmajor',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesTypeofCoursePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmcoursetype/insertgmcoursetype',
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
                $response = $client->put(env('API_URL') . '/gmcoursetype/updategmcoursetype',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmskill/insertgmskill',
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
                $response = $client->put(env('API_URL') . '/gmskill/updategmskill',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSourceDocumentPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesSourceDocumentSignerPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function printPrintLetterPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/printletter/createletter',
                ['body' => json_encode(
                    [[
                        'companyCode' => Session::get('companyCode'),
                        'letterType' => $request->letter_type,
                        'letterReference' => $request->reference,
                        'letterDate' => $request->letter_date,
                        'employeeNo' => $request->employee_no,
                        "changedNo" => 0,
                        "createdDate" => date("Y-m-d\TH:i:s"),
                        "createdBy" => Session::get('userID'),
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
                    ]]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesFinalPerformanceResultPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmperformanceresult',
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
                $response = $client->put(env('API_URL') . '/gmperformanceresult',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesEvaluationFormPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/evaluationform',
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
                $response = $client->put(env('API_URL') . '/evaluationform',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesEvaluationFormEvaluatedAspectPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/evaluationform/detail',
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

                $response_point = $client->post(env('API_URL') . '/evaluationform/detailpoint',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesPersonelReferencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/referencepersonnel',
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

                $response_delete_level = $client->delete(env('API_URL') . '/levelmaster',
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

                    $response_level = $client->post(env('API_URL') . '/levelmaster',
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
                $response = $client->put(env('API_URL') . '/referencepersonnel',
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

                $response_delete_level = $client->delete(env('API_URL') . '/levelmaster',
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

                    $response_level = $client->post(env('API_URL') . '/levelmaster',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function prosesFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/freeformatfield/insertgmfreeformatdetail',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesFreeFormatFieldDetailPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesCityPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/city',
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
                $response = $client->put(env('API_URL') . '/city',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesTitlePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->record_function == 'New'){
                $response = $client->post(env('API_URL') . '/gmtitle/insertgmtitle',
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
                $response = $client->put(env('API_URL') . '/gmtitle/updategmtitle',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesWorkDetailFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/pefreeformat/insertpefreeformat',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesWorkDetailWorkExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/peworkexperience/insertpeworkexperience',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesWorkDetailJobHistoryPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->level_code as $key => $value){
                $data_level[] = [
                    'levelType' => $request->level_code[$key],
                    'levelCode' => $value
                ];
            }

            $response = $client->put(env('API_URL') . '/pemasterhistoryjob',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function prosesEmployeeMutationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            foreach($request->level_new as $key => $value){
                $data_level[] = [
                    'levelType' => $request->level_type[$key],
                    'levelCode' => $value
                ];
            }

            $response = $client->post(env('API_URL') . '/mutation/executemutation',
                ['body' => json_encode(
                    [
                        'mutationType' => $request->mutation_type,
                        'employeeNo' => $request->employee_no,
                        'remarks' => $request->remarks,
                        'peMaster' => [
                            'decreeCode' => $request->decree_code_new,
                            'decreeNo' => $request->decree_no_new,
                            'decreeDate' => $request->decree_date_new,
                            'workLocation' => $request->work_location_new,
                            'gradeCode' => $request->grade_code_new,
                            'groupCode' => $request->group_code_new,
                            'position' => $request->position_new,
                            'ranking' => $request->ranking_new,
                            'workNature' => $request->nature_of_work_new,
                            'costCenterCode' => $request->cost_center_code_new,
                            'startDate' => $request->start_date_new,
                            'employmentStatus' => $request->employment_status_new,
                            'contractDateStart' => $request->contract_start_date_new,
                            'contractDateEnd' => $request->contract_end_date_new
                        ],
                        "masterLevel" => $data_level,
                        'companyCode' => Session::get('companyCode'),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName'),
                        "languageCode" => strtoupper(App::getLocale())
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }

    public function removeFinalPerformanceResultPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/gmperformanceresult',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeEvaluationFormEvaluatedAspectPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/evaluationform/detail',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removePerformanceAwardPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/peaward',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removePerformanceSanctionPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/pesanction',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removePerformanceEvaluationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->delete(env('API_URL') . '/peevaluation/deletepeevaluation',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeCompetencyFormalEducationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/peeducation/bulkdeletepeeducation',
                ['body' => json_encode($data)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeCompetencyLanguagePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/pelanguage/bulkdeletepelanguage',
                ['body' => json_encode($data)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeCompetencyOrganizationPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/peorganization/bulkdeletepeorganization',
                ['body' => json_encode($data)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeCompetencyReferencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/pereference/bulkdeletepereference',
                ['body' => json_encode($data)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeCompetencySkillPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/peskill/bulkdeletepeskill',
                ['body' => json_encode($data)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeCompetencyProjectExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/peprojectexperience/bulkdeletepeprojectexperience',
                ['body' => json_encode($data)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeCompetencyTrainingListPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/petraining/bulkdeletepetraining',
                ['body' => json_encode($data)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeWorkDetailWorkExperiencePersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/peworkexperience/deletepeworkexperience',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function removeWorkDetailFreeFormatFieldPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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

            $response = $client->delete(env('API_URL') . '/pefreeformat/deletepefreeformat',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function checkNumberPersonel(Request $request)
    {
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
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

    public function checkReportLevelPersonel(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/referencepersonnel/getreferencepersonnel',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'),
                        'userID' => Session::get('userID'),
                        'logActionUserID' => Session::get('userID'),
                        'logActionUsername' => Session::get('userName')
                    ]
                )]
            );

            $response_level = $client->post(env('API_URL') . '/levelmaster/getlevelmaster',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());
        $arrResult_level = json_decode($response_level->getBody()->getContents());

        if($arrResult->dataListSet == null){
            return response()->json(['data' => [], 'data_level' => '']);
        }else{
            return response()->json(['data' => $arrResult->dataListSet, 'data_level' => $arrResult_level->dataListSet]);
        }
    }

    public function printEmployeeListPersonel(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        // var_dump($request->period);

        return Excel::download(new EmployeeListExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Employee List Report.xlsx');
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

    public function printEvaluationReportPersonel(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }
        try {
            $client = new Client([
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

            // var_dump($param);

            $response = $client->post(env('API_URL') . '/evaluationreport/getevaluationreport',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // var_dump($arrResult->dataListSet[0]);

        if($arrResult->dataListSet[0] == null){
            $pdf = PDF::loadView('personel.personel_export_evaluation_report', ['data' => []])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
            return $pdf->stream('Evaluation Report.pdf');
        }else{
            $pdf = PDF::loadView('personel.personel_export_evaluation_report', ['data' => $arrResult->dataListSet[0]])->setPaper('a4', 'landscape')->setOptions(['isPhpEnabled' => true]);
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->post(env('API_URL') . '/gmperformanceresult/getresult',
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return response()->json($arrResult->dataListSet);
    }

    public function prosesEmployeePhotoPersonel(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        try {
            $client = new Client([
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
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
        // return response()->json($request->record_status);
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
    //         var_dump($e->getResponse());
    //     }

    //     $arrResult = json_decode($response->getBody()->getContents());

    //     return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    // }

    public function printCustomReportEmployee(Request $request)
    {
        $dataLevel = [];

        for($i = 0; $i < $request->level_format; $i++){
            $dataLevel[] = $request->{'level' . ($i+1)};
        }

        var_dump (json_decode($request->field_name));

        // return Excel::download(new EmployeeListExport($request->employee_no_from, $request->employee_no_to, $request->period, isset($request->include_resign) ? (bool) $request->include_resign : false, $request->group_authorize_from, $request->group_authorize_to, $request->position, $request->ranking, $request->location, $dataLevel), 'Employee List Report.xlsx');
    }
}
