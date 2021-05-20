<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'position_code' => 'ASD',
                    'position_name' => 'ASSOCIATE DIRECTOR',
                    'abbreviation' => '',
                    'status' => 'Active'
                ],
                (object) [
                    'position_code' => 'ASDPH',
                    'position_name' => 'ASSISTANT DEP. HEAD',
                    'abbreviation' => '',
                    'status' => 'Active'
                ]
            ]);
            return Datatables::of($data)->make(true);
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
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'grade_code' => 'A3',
                    'grade_name' => 'A3',
                    'status' => 'Active'
                ],
                (object) [
                    'grade_code' => 'A4',
                    'grade_name' => 'A4',
                    'status' => 'Active'
                ],
            ]);
            return Datatables::of($data)->make(true);
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
        if ($request->ajax()) {
            $data = collect([
                (object) [
                    'nature_of_work_code' => 'SEC',
                    'nature_of_work_name' => 'SECURITY',
                    'status' => 'Active'
                ],
                (object) [
                    'nature_of_work_code' => 'ACC',
                    'nature_of_work_name' => 'ACCOUNTING',
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

        return view('personel.personel_position_detail', ['position_code' => $request->position_code]);
    }

    public function dataDetailRankingCodePersonel(Request $request)
    {

        return view('personel.personel_ranking_code_detail', ['ranking_code' => $request->ranking_code]);
    }

    public function dataDetailGradeCodePersonel(Request $request)
    {

        return view('personel.personel_grade_code_detail', ['grade_code' => $request->grade_code]);
    }

    public function dataDetailGroupCodePersonel(Request $request)
    {

        return view('personel.personel_group_code_detail', ['group_code' => $request->group_code]);
    }

    public function dataDetailNatureofWorkPersonel(Request $request)
    {

        return view('personel.personel_nature_of_work_detail', ['nature_of_work_code' => $request->nature_of_work_code]);
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
}
