<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Route Untuk Halaman Login */
Route::get('login', 'LoginController@pageLogin');
Route::post('login/proses', 'LoginController@prosesLogin');
Route::get('logout', 'LoginController@prosesLogout');

/* Route Untuk Halaman Reset Password */
Route::get('reset_password', 'ResetPasswordController@pageResetPassword');
Route::get('reset_password/success', 'ResetPasswordController@pageSuccessResetPassword');
Route::get('reset_password/send_otp', 'ResetPasswordController@pageSendOTPResetPassword');
Route::get('reset_password/resend', 'ResetPasswordController@pageResendResetPassword');
Route::post('reset_password/proses', 'ResetPasswordController@prosesResetPassword');
Route::post('reset_password/send_otp/proses', 'ResetPasswordController@prosesSendOTPResetPassword');

/* Route Untuk View Home */
Route::get('main', 'HomeController@pageMain')->name('main');
Route::get('home', 'DashboardController@pageHomeDashboard');
Route::get('home/breadcrumbs', 'HomeController@getURLBreadcrumbs');

/* Route Untuk Menu Personel */
Route::get('personel', 'PersonelController@pagePersonelMain');
Route::get('personel/personal_data', 'PersonelController@pagePersonalDataPersonel');
Route::get('personel/employee_performance', 'PersonelController@pageEmployeePerformancePersonel');
Route::get('personel/work_detail', 'PersonelController@pageWorkDetailPersonel');
Route::get('personel/competency', 'PersonelController@pageCompetencyPersonel');
Route::get('personel/other_information', 'PersonelController@pageOtherInformationPersonel');
Route::get('personel/payroll_data', 'PersonelController@pagePayrollDataPersonel');
Route::get('personel/employee_approval', 'PersonelController@pageEmployeeApprovalPersonel');
Route::get('personel/employee_attachment', 'PersonelController@pageEmployeeAttachmentPersonel');
Route::get('personel/employee_mutation', 'PersonelController@pageEmployeeMutationPersonel');
Route::get('personel/npwp_mutation', 'PersonelController@pageNPWPMutationPersonel');
Route::get('personel/termination_data_entry', 'PersonelController@pageTerminationDataEntryPersonel');
Route::get('personel/award_data_entry', 'PersonelController@pageAwardDataEntryPersonel');
Route::get('personel/evaluation_data_entry', 'PersonelController@pageEvaluationDataEntryPersonel');
Route::get('personel/sanction_data_entry', 'PersonelController@pageSanctionDataEntryPersonel');
Route::get('personel/print_letter', 'PersonelController@pagePrintLetterPersonel');
Route::get('personel/personel_reference', 'PersonelController@pagePersonelReferencePersonel');
Route::get('personel/data_format', 'PersonelController@pageDataFormatPersonel');
Route::get('personel/level', 'PersonelController@pageLevelPersonel');
Route::get('personel/source_document', 'PersonelController@pageSourceDocumentPersonel');
Route::get('personel/format_document', 'PersonelController@pageFormatDocumentPersonel');
Route::get('personel/job_description', 'PersonelController@pageJobDescriptionPersonel');
Route::get('personel/cost_center_code', 'PersonelController@pageCostCenterCodePersonel');
Route::get('personel/location_code', 'PersonelController@pageLocationCodePersonel');
Route::get('personel/position', 'PersonelController@pagePositionPersonel');
Route::get('personel/ranking_code', 'PersonelController@pageRankingCodePersonel');
Route::get('personel/grade_code', 'PersonelController@pageGradeCodePersonel');
Route::get('personel/group_code', 'PersonelController@pageGroupCodePersonel');
Route::get('personel/nature_of_work', 'PersonelController@pageNatureofWorkPersonel');

Route::get('personel/personal_data/table', 'PersonelController@tablePersonalDataPersonel');
Route::get('personel/employee_performance/table', 'PersonelController@tableEmployeePerformancePersonel');
Route::get('personel/work_detail/table', 'PersonelController@tableWorkDetailPersonel');
Route::get('personel/competency/table', 'PersonelController@tableCompetencyPersonel');
Route::get('personel/other_information/table', 'PersonelController@tableOtherInformationPersonel');
Route::get('personel/payroll_data/table', 'PersonelController@tablePayrollDataPersonel');
Route::get('personel/employee_approval/table', 'PersonelController@tableEmployeeApprovalPersonel');
Route::get('personel/employee_attachment/table', 'PersonelController@tableEmployeeAttachmentPersonel');
Route::get('personel/termination_data_entry/table', 'PersonelController@tableTerminationDataEntryPersonel');
Route::get('personel/award_data_entry/table', 'PersonelController@tableAwardDataEntryPersonel');
Route::get('personel/evaluation_data_entry/table', 'PersonelController@tableEvaluationDataEntryPersonel');
Route::get('personel/sanction_data_entry/table', 'PersonelController@tableSanctionDataEntryPersonel');
Route::get('personel/print_letter/table', 'PersonelController@tablePrintLetterPersonel');
Route::get('personel/level/table', 'PersonelController@tableLevelPersonel');
Route::get('personel/source_document/table', 'PersonelController@tableSourceDocumentPersonel');
Route::get('personel/format_document/table', 'PersonelController@tableFormatDocumentPersonel');
Route::get('personel/job_description/table', 'PersonelController@tableJobDescriptionPersonel');
Route::get('personel/cost_center_code/table', 'PersonelController@tableCostCenterCodePersonel');
Route::get('personel/location_code/table', 'PersonelController@tableLocationCodePersonel');
Route::get('personel/position/table', 'PersonelController@tablePositionPersonel');
Route::get('personel/ranking_code/table', 'PersonelController@tableRankingCodePersonel');
Route::get('personel/grade_code/table', 'PersonelController@tableGradeCodePersonel');
Route::get('personel/group_code/table', 'PersonelController@tableGroupCodePersonel');
Route::get('personel/nature_of_work/table', 'PersonelController@tableNatureofWorkPersonel');

Route::get('personel/personal_data/detail_data', 'PersonelController@dataDetailPersonalDataPersonel');
Route::get('personel/employee_performance/detail_data', 'PersonelController@dataDetailEmployeePerformancePersonel');
Route::get('personel/work_detail/detail_data', 'PersonelController@dataDetailWorkDetailPersonel');
Route::get('personel/competency/detail_data', 'PersonelController@dataDetailCompetencyPersonel');
Route::get('personel/other_information/detail_data', 'PersonelController@dataDetailOtherInformationPersonel');
Route::get('personel/payroll_data/detail_data', 'PersonelController@dataDetailPayrollDataPersonel');
Route::get('personel/employee_approval/detail_data', 'PersonelController@dataDetailPayrollDataPersonel');
Route::get('personel/employee_attachment/detail_data', 'PersonelController@dataDetailEmployeeAttachmentPersonel');
Route::get('personel/source_document/detail_data', 'PersonelController@dataDetailSourceDocumentPersonel');
Route::get('personel/format_document/detail_data', 'PersonelController@dataDetailFormatDocumentPersonel');
Route::get('personel/job_description/detail_data', 'PersonelController@dataDetailJobDescriptionPersonel');
Route::get('personel/cost_center_code/detail_data', 'PersonelController@dataDetailCostCenterCodePersonel');
Route::get('personel/location_code/detail_data', 'PersonelController@dataDetailLocationCodePersonel');
Route::get('personel/position/detail_data', 'PersonelController@dataDetailPositionPersonel');
Route::get('personel/ranking_code/detail_data', 'PersonelController@dataDetailRankingCodePersonel');
Route::get('personel/grade_code/detail_data', 'PersonelController@dataDetailGradeCodePersonel');
Route::get('personel/group_code/detail_data', 'PersonelController@dataDetailGroupCodePersonel');
Route::get('personel/nature_of_work/detail_data', 'PersonelController@dataDetailNatureofWorkPersonel');

Route::get('personel/personal_data/fringe_benefit/table', 'PersonelController@tableFringeBenefitPersonalDataPersonel');
Route::get('personel/personal_data/dependent/table', 'PersonelController@tableDependentPersonalDataPersonel');
Route::get('personel/personal_data/prefix_title', 'PersonelController@dataPrefixTitlePersonalDataPersonel');
Route::get('personel/employee_performance/award/table', 'PersonelController@tableAwardEmployeePerformancePersonel');
Route::get('personel/work_detail/work_experience/table', 'PersonelController@tableWorkExperienceWorkDetailPersonel');
Route::get('personel/competency/formal_education/table', 'PersonelController@tableCompetencyFormalEducationPersonel');
Route::get('personel/competency/language/table', 'PersonelController@tableCompetencyLanguagePersonel');
Route::get('personel/competency/organization/table', 'PersonelController@tableCompetencyOrganizationPersonel');
Route::get('personel/competency/reference/table', 'PersonelController@tableCompetencyReferencePersonel');
Route::get('personel/competency/skill/table', 'PersonelController@tableCompetencySkillPersonel');
Route::get('personel/other_information/free_format_field/table', 'PersonelController@tableOtherInformationFreeFormatFieldPersonel');
Route::get('personel/employee_attachment/attachment/table', 'PersonelController@tableEmployeeAttachmentAttachmentPersonel');

/* Route Untuk Menu Time Management */
Route::get('time_management', 'TimeManagementController@pageTimeManagement');

/* Route Untuk Set Languange */
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguagesController@switchLang']);

/* Route Untuk Dropdown From API */
Route::get('gender/api', 'DataController@dataGenderAPI');
Route::get('blood/api', 'DataController@dataBloodAPI');
Route::get('religion/api', 'DataController@dataReligionAPI');
