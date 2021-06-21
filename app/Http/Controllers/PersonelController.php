<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use DataTables;

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

    public function pageEmployeePerformancePersonel()
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
        return view('personel.personel_personel_reference');
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

    public function pageRankingCodePersonel()
    {
        return view('personel.personel_ranking_code');
    }

    public function pageGradeCodePersonel()
    {
        return view('personel.personel_grade_code');
    }

    public function pageGroupCodePersonel()
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

    public function pageBankCodePersonel()
    {
        return view('personel.personel_bank_code');
    }

    public function pageBankBranchPersonel()
    {
        return view('personel.personel_bank_branch');
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

    public function pageInstitutionCodePersonel()
    {
        return view('personel.personel_institution_code');
    }

    public function pageMajorCodePersonel()
    {
        return view('personel.personel_major_code');
    }

    public function pageTypeofCourseCodePersonel()
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

    public function pageCityCodePersonel()
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

    public function pageEvaluationCodePersonel()
    {
        return view('personel.personel_evaluation_code');
    }

    public function pageTitleCodePersonel()
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

    public function pageFinalPerformanceResultCodePersonel()
    {
        return view('personel.personel_final_performance_result_code');
    }

    public function pageSkillCodePersonel()
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

    public function tablePersonalDataPersonel(Request $request)
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
            return Datatables::of($data)
                    // ->addIndexColumn()
                    // ->addColumn('action', function($row){
                    // 	$btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                    // 	return $btn;
                    // })
                    // ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function tableEmployeePerformancePersonel(Request $request)
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

    public function tableWorkDetailPersonel(Request $request)
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

    public function tableCompetencyPersonel(Request $request)
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
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->addIndexColumn()->make(true);
        }
    }

    public function tableLevelPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableSourceDocumentPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)->make(true);
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
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'cost_center_code' => 'MK',
                    'cost_center_description' => 'MARKETING',
                    'account_no' => '',
                    'contra_account_no' => '',
                    'status' => 'Active'
                ],
                (object) [
                    'cost_center_code' => 'NN',
                    'cost_center_description' => 'NONE',
                    'account_no' => '',
                    'contra_account_no' => '',
                    'status' => 'Active'
                ]
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableLocationCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'location_code' => 'MK',
                    'location_name' => 'MARKETING',
                    'status' => 'Active'
                ],
                (object) [
                    'location_code' => 'NN',
                    'location_name' => 'NONE',
                    'status' => 'Active'
                ]
            ]);
            return Datatables::of($data)->make(true);
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

    public function tableRankingCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'ranking_code' => '1',
                    'ranking_name' => '1',
                    'group_authorize' => '',
                    'status' => 'Active'
                ],
                (object) [
                    'ranking_code' => '2',
                    'ranking_name' => '2',
                    'group_authorize' => '',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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

    public function tableGroupCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'group_code' => '1',
                    'group_name' => 'OVERTIME STAFF',
                    'record_status' => 'Active'
                ],
                (object) [
                    'group_code' => '2',
                    'group_name' => 'NON OVERTIME STAFF',
                    'record_status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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

    public function tableBPJSGroupPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'bpjs_code' => 'A',
                    'bpjs_no' => '123',
                    'signer_name' => 'Joko Setiawan',
                    'title' => 'Finance Head',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableNPWPGroupPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'npwp_code' => 'CAF',
                    'pemotong_kuasa' => 'KUASA',
                    'print_date' => '12/31/2019',
                    'signer_name' => 'Lina Susanti',
                    'signer_npwp' => '08.842.140.9-506.000',
                    'company_name'=> 'PT Intikom Berlian Mustika',
                    'company_npwp' => '03.093.891.4-031.000',
                    'status' => 'Active',
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableBankCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'bank_code' => 'BCA',
                    'bank_name' => 'Bank Central Asia',
                    'number_of_digits' => '',
                    'record_status' => 'Active'
                ],
                (object) [
                    'bank_code' => 'BII',
                    'bank_name' => 'Bank International Indonesia',
                    'number_of_digits' => '',
                    'record_status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableBankBranchPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'bank_code' => 'BCA',
                    'bank_name' => 'Bank Central Asia',
                    'address' => '',
                    'phone' => '',
                    'fax_no' => '',
                    'bi_code' => '',
                    'status' => 'Active'
                ],
                (object) [
                    'bank_code' => 'BII',
                    'bank_name' => 'Bank International Indonesia',
                    'address' => '',
                    'phone' => '',
                    'fax_no' => '',
                    'bi_code' => '',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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

    public function tableInstitutionCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'institution_code' => 'AKADEM',
                    'institution_name' => 'Akademi',
                    'record_status' => 'Active'
                ],
                (object) [
                    'institution_code' => 'NONE',
                    'institution_name' => 'None',
                    'record_status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableMajorCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'major_code' => 'BIOLO',
                    'major_name' => 'Zoology',
                    'record_status' => 'Active'
                ],
                (object) [
                    'major_code' => 'ECOBFN',
                    'major_name' => 'Finance & Banking',
                    'record_status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableTypeofCourseCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'course_type_code' => 'ALPRO',
                    'course_type_name' => 'Algorithm Programming',
                    'status' => 'Active'
                ],
                (object) [
                    'course_type_code' => 'ELECTR',
                    'course_type_name' => 'Advanced Electrical Safety No. 68',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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

    public function tableCityCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'city_code' => 'ACE',
                    'city_name' => 'Aceh',
                    'status' => 'Active'
                ],
                (object) [
                    'city_code' => 'AMB',
                    'city_name' => 'Ambon',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableZipCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'zip_code' => '10110',
                    'kelurahan' => 'Gambir',
                    'kecamatan' => 'Gambir',
                    'kota' => 'Jakarta Pusat',
                    'provinsi' => 'DKI Jakarta',
                    'status' => 'Active'
                ],
                (object) [
                    'zip_code' => '12201',
                    'kelurahan' => 'Kebon Kacang',
                    'kecamatan' => 'Gambir',
                    'kota' => 'Jakarta Pusat',
                    'provinsi' => 'DKI Jakarta',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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

    public function tableEvaluationCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'form_code' => '01',
                    'form_description' => 'Penilaian Tahunan',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableTitleCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'title_code' => 'A.Ma.',
                    'description' => 'Ahli Muda',
                ],
                (object) [
                    'title_code' => 'A.Md.',
                    'description' => 'Ahli Madya',
                ],
            ]);
            return Datatables::of($data)->make(true);
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

    public function tableFinalPerformanceResultCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'no' => '1',
                    'value' => 'A',
                    'from' => '27',
                    'to' => '30'
                ],
                (object) [
                    'no' => '2',
                    'value' => 'B',
                    'from' => '21',
                    'to' => '26'
                ],
            ]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableSkillCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'skill_code' => 'PHG',
                    'skill_description' => 'Photography',
                    'status' => 'Active'
                ],
                (object) [
                    'skill_code' => 'PS',
                    'skill_description' => 'Photoshop',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'free_format_code' => 'SH',
                    'free_format_field_type' => 'String',
                    'description' => 'No Sepatu',
                    'length' => '5',
                    'format' => '',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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

    	return view('personel.personel_personal_data_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
    }

    public function dataDetailEmployeePerformancePersonel(Request $request)
    {

    	return view('personel.personel_employee_performance_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
    }

    public function dataDetailWorkDetailPersonel(Request $request)
    {

    	return view('personel.personel_work_detail_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
    }

    public function dataDetailCompetencyPersonel(Request $request)
    {

        return view('personel.personel_competency_detail', ['employee_no' => $request->employee_no, 'employee_name' => $request->employee_name]);
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

    public function dataDetailSourceDocumentPersonel(Request $request)
    {

        return view('personel.personel_source_document_detail', ['source_document' => $request->source_document]);
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

        return view('personel.personel_cost_center_code_detail', ['cost_center_code' => $request->cost_center_code]);
    }

    public function dataDetailLocationCodePersonel(Request $request)
    {

        return view('personel.personel_location_code_detail', ['location_code' => $request->location_code]);
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
                        'positionCode' => $request->positionCode
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_position_detail', ['data' => $arrResult->dataListSet[0], 'func' => $request->func]);
    }

    public function dataDetailRankingCodePersonel(Request $request)
    {

        return view('personel.personel_ranking_code_detail', ['ranking_code' => $request->ranking_code]);
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
                        'gradeCode' => $request->gradeCode
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());  

        return view('personel.personel_grade_code_detail', ['data' => $arrResult->dataListSet[0], 'func' => $request->func]);
    }

    public function dataDetailGroupCodePersonel(Request $request)
    {

        return view('personel.personel_group_code_detail', ['group_code' => $request->group_code]);
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
                        'workNatureCode' => $request->workNatureCode
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        return view('personel.personel_nature_of_work_detail', ['data' => $arrResult->dataListSet[0], 'func' => $request->func]);
    }

    public function dataDetailBPJSGroupPersonel(Request $request)
    {

        return view('personel.personel_bpjs_group_detail', ['bpjs_code' => $request->bpjs_code]);
    }

    public function dataDetailNPWPGroupPersonel(Request $request)
    {

        return view('personel.personel_npwp_group_detail', ['npwp_code' => $request->npwp_code]);
    }

    public function dataDetailBankCodePersonel(Request $request)
    {

        return view('personel.personel_bank_code_detail', ['bank_code' => $request->bank_code]);
    }

    public function dataDetailBankBranchPersonel(Request $request)
    {

        return view('personel.personel_bank_branch_detail', ['bank_code' => $request->bank_code]);
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

    public function dataDetailInstitutionCodePersonel(Request $request)
    {

        return view('personel.personel_institution_code_detail', ['institution_code' => $request->institution_code]);
    }

    public function dataDetailMajorCodePersonel(Request $request)
    {

        return view('personel.personel_major_code_detail', ['major_code' => $request->major_code]);
    }

    public function dataDetailTypeofCourseCodePersonel(Request $request)
    {

        return view('personel.personel_type_of_course_code_detail', ['type_of_course_code' => $request->type_of_course_code]);
    }

    public function dataDetailLanguageCodePersonel(Request $request)
    {

        return view('personel.personel_language_code_detail', ['language_code' => $request->language_code]);
    }

    public function dataDetailLanguageAbilityCodePersonel(Request $request)
    {

        return view('personel.personel_language_ability_code_detail', ['language_ability_code' => $request->language_ability_code]);
    }

    public function dataDetailCityCodePersonel(Request $request)
    {

        return view('personel.personel_city_code_detail', ['city_code' => $request->city_code]);
    }

    public function dataDetailZipCodePersonel(Request $request)
    {

        return view('personel.personel_zip_code_detail', ['zip_code' => $request->zip_code]);
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

    public function dataDetailEvaluationCodePersonel(Request $request)
    {

        return view('personel.personel_evaluation_code_detail', ['form_code' => $request->form_code]);
    }

    public function dataDetailTitleCodePersonel(Request $request)
    {

        return view('personel.personel_title_code_detail', ['title_code' => $request->title_code]);
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

    public function dataDetailSkillCodePersonel(Request $request)
    {

        return view('personel.personel_skill_code_detail', ['skill_code' => $request->skill_code]);
    }

    public function dataDetailAttachmentCodePersonel(Request $request)
    {

        return view('personel.personel_attachment_code_detail', ['attachment_code' => $request->attachment_code]);
    }

    public function dataDetailFreeFormatFieldPersonel(Request $request)
    {

        return view('personel.personel_free_format_field_detail', ['free_format_code' => $request->free_format_code]);
    }

    public function dataDetailFormatReportPersonel(Request $request)
    {

        return view('personel.personel_format_report_detail', ['report_code' => $request->report_code]);
    }

    public function dataDetailRelationCodePersonel(Request $request)
    {

        return view('personel.personel_relation_code_detail', ['relation_code' => $request->relation_code]);
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
        if ($request->ajax()) {
        	$data = collect();
            return Datatables::of($data)
            	->make(true);
        }
    }

    public function tableAwardEmployeePerformancePersonel(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'award_type' => 'EMPLOYEE OF THE YEAR',
        			'employee_no' => 1110002,
        			'award_name' => 'EMPLOYEE OF THE YEAR 2015',
        			'award_date' => '01 FEB 2016',
        			'event_name' => 'INTIKOM BIRTHDAY'
        		]
        	]);
            return Datatables::of($data)
            	->make(true);
        }
    }

    public function tableWorkExperienceWorkDetailPersonel(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'seq_no' => '1',
        			'company_name' => 'PT Intikom Berlian Mustika',
        			'joining_date' => '01/02/2000',
        			'termination_date' => '03/06/2004',
        			'position' => '',
        			'ranking' => '',
        			'nature_of_work' => 'NONE',
        			'line_of_business' => 'INFORMATION TECHNOLOGY',
        		],
        		(object) [
        			'seq_no' => '2',
        			'company_name' => 'PT ABADI BERSAMA',
        			'joining_date' => '12/07/2004',
        			'termination_date' => '31/07/2009',
        			'position' => '',
        			'ranking' => '',
        			'nature_of_work' => 'NONE',
        			'line_of_business' => 'INFORMATION TECHNOLOGY',
        		]
        	]);
            return Datatables::of($data)
            	->make(true);
        }
    }

    public function tableCompetencyFormalEducationPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'education' => 'Bachelor Degree',
                    'institution_code' => 'Universitas',
                    'major_code' => 'Accounting',
                    'education_status_code' => 'Certified',
                    'graduate_year' => '1980',
                    'title' => 'SE',
                    'city' => 'Bandung',
                    'gpa' => '3.32',
                ]
            ]);
            return Datatables::of($data)
                ->make(true);
        }
    }

    public function tableCompetencyLanguagePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'language' => 'English',
                    'reading_ability' => 'Fair',
                    'spoken_ability' => 'Excellent',
                    'written_ability' => 'Fair',
                ]
            ]);
            return Datatables::of($data)
                ->make(true);
        }
    }

    public function tableCompetencyOrganizationPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'organization_name' => 'Forum Finance Indonesia',
                    'position' => 'Member',
                    'start_date' => '01 Jan 2010',
                    'end_date' => '12 Mar 2017',
                ]
            ]);
            return Datatables::of($data)
                ->make(true);
        }
    }

    public function tableCompetencyReferencePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)
                ->make(true);
        }
    }

    public function tableCompetencySkillPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'skill_code' => 'Sing',
                    'skill_description' => 'Singing',
                    'skill_ability' => 'Intermediate',
                ]
            ]);
            return Datatables::of($data)
                ->make(true);
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

    public function tableEvaluationCodeEvaluationCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'seq' => '1',
                    'evaluated_aspect' => 'Absensi',
                    'calculation' => '1'
                ],
                (object) [
                    'seq' => '2',
                    'evaluated_aspect' => 'Management Skill',
                    'calculation' => '1'
                ],
                (object) [
                    'seq' => '3',
                    'evaluated_aspect' => 'Personality',
                    'calculation' => '2'
                ],
            ]);
            return Datatables::of($data)
                ->make(true);
        }
    }

    public function tableDetailEvaluationCodeEvaluationCodePersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'seq' => '1',
                    'predicate' => '1',
                    'value' => '9'
                ],
                (object) [
                    'seq' => '1',
                    'predicate' => '2',
                    'value' => '7'
                ],
                (object) [
                    'seq' => '1',
                    'predicate' => '3',
                    'value' => '5'
                ],
            ]);
            return Datatables::of($data)
                ->make(true);
        }
    }

    public function tableFreeFormatFieldFieldListPersonel(Request $request)
    {
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'field_list' => '37',
                    'status' => 'Active',
                ],
                (object) [
                    'field_list' => '38',
                    'status' => 'Active',
                ],
                (object) [
                    'field_list' => '39',
                    'status' => 'Active',
                ],
                (object) [
                    'field_list' => '36',
                    'status' => 'Active',
                ],
            ]);
            return Datatables::of($data)
                ->make(true);
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
                        "changedDate" => date("Y-m-d\TH:i:s"),
                        "changedBy" => Session::get('userID'),
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
                            'gradeCode' => $request->nature_of_work_code,
                            'gradeName' => $request->nature_of_work_name,
                            "changedDate" => date("Y-m-d\TH:i:s"),
                            "changedBy" => Session::get('userID'),
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
}
