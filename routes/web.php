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
    return Redirect::to('/login');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

Route::get('/clear-config', function() {
    $exitCode = Artisan::call('config:clear');
    return '<h1>Config facade value cleared</h1>';
});

Route::get('/cache-config', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Config facade value cached</h1>';
});

Route::get('/cache-route', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Cache facade value cleared</h1>';
});


/* Route Untuk Halaman Login */
Route::get('login', 'LoginController@pageLogin')->name('login');
Route::post('login/proses', 'LoginController@prosesLogin');
Route::get('logout', 'LoginController@prosesLogout');
Route::post('authentication/proses', 'LoginController@prosesAuthentication');
Route::post('authentication/import_payroll/proses', 'LoginController@prosesAuthenticationImportPayroll');
Route::get('login-sso', 'LoginController@redirectToAzure');
Route::get('auth/sso', 'LoginController@handleAzureCallback');

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
Route::get('calendar/event', 'DashboardController@getEventCalendar');
Route::get('active_employee', 'DashboardController@getActiveEmployee');
Route::get('getOvertime', 'DashboardController@getOvertime');
Route::get('getPayroll', 'DashboardController@getPayroll');

/* Route Untuk Menu Personel */
Route::get('personnel', 'PersonelController@pagePersonelMain')->name('personnel');
Route::get('personnel/personal_data', 'PersonelController@pagePersonalDataPersonel');
Route::get('personnel/performance', 'PersonelController@pagePerformancePersonel');
Route::get('personnel/work_detail', 'PersonelController@pageWorkDetailPersonel');
Route::get('personnel/competency', 'PersonelController@pageCompetencyPersonel');
Route::get('personnel/other_information', 'PersonelController@pageOtherInformationPersonel');
Route::get('personnel/payroll_data', 'PersonelController@pagePayrollDataPersonel');
Route::get('personnel/employee_approval', 'PersonelController@pageEmployeeApprovalPersonel');
Route::get('personnel/employee_attachment', 'PersonelController@pageEmployeeAttachmentPersonel');
Route::get('personnel/import_export_personal_data', 'PersonelController@pageImportExportPersonel');
Route::get('personnel/import_master_data', 'PersonelController@pageImportMasterDataPersonel');
Route::get('personnel/import_update_personal_data', 'PersonelController@pageImportUpdatePersonel');
Route::get('personnel/employee_mutation', 'PersonelController@pageEmployeeMutationPersonel');
Route::get('personnel/npwp_mutation', 'PersonelController@pageNPWPMutationPersonel');
Route::get('personnel/termination_data_entry', 'PersonelController@pageTerminationDataEntryPersonel');
Route::get('personnel/award_data_entry', 'PersonelController@pageAwardDataEntryPersonel');
Route::get('personnel/evaluation_data_entry', 'PersonelController@pageEvaluationDataEntryPersonel');
Route::get('personnel/sanction_data_entry', 'PersonelController@pageSanctionDataEntryPersonel');
Route::get('personnel/print_letter', 'PersonelController@pagePrintLetterPersonel');
Route::get('personnel/personel_reference', 'PersonelController@pagePersonelReferencePersonel');
Route::get('personnel/data_format', 'PersonelController@pageDataFormatPersonel');
Route::get('personnel/level', 'PersonelController@pageLevelPersonel');
Route::get('personnel/source_document', 'PersonelController@pageSourceDocumentPersonel');
Route::get('personnel/format_document', 'PersonelController@pageFormatDocumentPersonel');
Route::get('personnel/job_description', 'PersonelController@pageJobDescriptionPersonel');
Route::get('personnel/cost_center', 'PersonelController@pageCostCenterCodePersonel');
Route::get('personnel/location', 'PersonelController@pageLocationCodePersonel');
Route::get('personnel/position', 'PersonelController@pagePositionPersonel');
Route::get('personnel/ranking', 'PersonelController@pageRankingPersonel');
Route::get('personnel/grade', 'PersonelController@pageGradeCodePersonel');
Route::get('personnel/group', 'PersonelController@pageGroupPersonel');
Route::get('personnel/nature_of_work', 'PersonelController@pageNatureofWorkPersonel');
Route::get('personnel/bpjs_group', 'PersonelController@pageBPJSGroupPersonel');
Route::get('personnel/npwp_group', 'PersonelController@pageNPWPGroupPersonel');
Route::get('personnel/bank', 'PersonelController@pageBankPersonel');
Route::get('personnel/company_bank', 'PersonelController@pageCompanyBankPersonel');
Route::get('personnel/source_bank', 'PersonelController@pageSourceBankPersonel');
Route::get('personnel/transfer_bank', 'PersonelController@pageTransferBankPersonel');
Route::get('personnel/currency_code', 'PersonelController@pageCurrencyCodePersonel');
Route::get('personnel/rate_type', 'PersonelController@pageRateTypePersonel');
Route::get('personnel/exchange_rate', 'PersonelController@pageExchangeRatePersonel');
Route::get('personnel/education_code', 'PersonelController@pageEducationCodePersonel');
Route::get('personnel/education_status_code', 'PersonelController@pageEducationStatusCodePersonel');
Route::get('personnel/institution', 'PersonelController@pageInstitutionPersonel');
Route::get('personnel/major', 'PersonelController@pageMajorPersonel');
Route::get('personnel/type_of_course', 'PersonelController@pageTypeofCoursePersonel');
Route::get('personnel/language_code', 'PersonelController@pageLanguageCodePersonel');
Route::get('personnel/language_ability_code', 'PersonelController@pageLanguageAbilityCodePersonel');
Route::get('personnel/city', 'PersonelController@pageCityPersonel');
Route::get('personnel/zip', 'PersonelController@pageZipCodePersonel');
Route::get('personnel/insurance_code', 'PersonelController@pageInsuranceCodePersonel');
Route::get('personnel/insurance_class_code', 'PersonelController@pageInsuranceClassCodePersonel');
Route::get('personnel/termination_code', 'PersonelController@pageTerminationCodePersonel');
Route::get('personnel/decree_code', 'PersonelController@pageDecreeCodePersonel');
Route::get('personnel/sanction_code', 'PersonelController@pageSanctionCodePersonel');
Route::get('personnel/evaluation_form', 'PersonelController@pageEvaluationFormPersonel');
Route::get('personnel/title', 'PersonelController@pageTitlePersonel');
Route::get('personnel/nationality_code', 'PersonelController@pageNationalityCodePersonel');
Route::get('personnel/religion_code', 'PersonelController@pageReligionCodePersonel');
Route::get('personnel/line_of_business', 'PersonelController@pageLineofBusinessPersonel');
Route::get('personnel/fringe_benefits_code', 'PersonelController@pageFringeBenefitsCodePersonel');
Route::get('personnel/final_performance_result', 'PersonelController@pageFinalPerformanceResultPersonel');
Route::get('personnel/skill', 'PersonelController@pageSkillPersonel');
Route::get('personnel/attachment_code', 'PersonelController@pageAttachmentCodePersonel');
Route::get('personnel/free_format_field', 'PersonelController@pageFreeFormatFieldPersonel');
Route::get('personnel/format_report', 'PersonelController@pageFormatReportPersonel');
Route::get('personnel/relation_code', 'PersonelController@pageRelationCodePersonel');
Route::get('personnel/employee_list', 'PersonelController@pageEmployeeListPersonel');
Route::get('personnel/employee_report_by_status', 'PersonelController@pageEmployeeReportByStatusPersonel');
Route::get('personnel/employee_dependents', 'PersonelController@pageEmployeeDependentsPersonel');
Route::get('personnel/employee_card', 'PersonelController@pageEmployeeCardPersonel');
Route::get('personnel/custom_report_employee', 'PersonelController@pageCustomReportEmployeePersonel');
Route::get('personnel/employee_notice_report', 'PersonelController@pageEmployeeNoticeReportPersonel');
Route::get('personnel/evaluation_report', 'PersonelController@pageEvaluationReportPersonel');
Route::get('personnel/employee_skill_report', 'PersonelController@pageEmployeeSkillReportPersonel');
Route::get('personnel/employee_turn_over_report', 'PersonelController@pageEmployeeTurnOverReportPersonel');

Route::get('personnel/personal_data/table', 'PersonelController@tablePersonalDataPersonel');
Route::get('personnel/performance/table', 'PersonelController@tablePerformancePersonel');
Route::get('personnel/work_detail/table', 'PersonelController@tableWorkDetailPersonel');
Route::get('personnel/competency/table', 'PersonelController@tableCompetencyPersonel');
Route::get('personnel/other_information/table', 'PersonelController@tableOtherInformationPersonel');
Route::get('personnel/payroll_data/table', 'PersonelController@tablePayrollDataPersonel');
Route::get('personnel/employee_approval/table', 'PersonelController@tableEmployeeApprovalPersonel');
Route::get('personnel/employee_attachment/table', 'PersonelController@tableEmployeeAttachmentPersonel');
Route::get('personnel/termination_data_entry/table', 'PersonelController@tableTerminationDataEntryPersonel');
Route::get('personnel/award_data_entry/table', 'PersonelController@tableAwardDataEntryPersonel');
Route::get('personnel/evaluation_data_entry/table', 'PersonelController@tableEvaluationDataEntryPersonel');
Route::get('personnel/sanction_data_entry/table', 'PersonelController@tableSanctionDataEntryPersonel');
Route::get('personnel/print_letter/table', 'PersonelController@tablePrintLetterPersonel');
Route::get('personnel/level/table', 'PersonelController@tableLevelPersonel');
Route::get('personnel/source_document/table', 'PersonelController@tableSourceDocumentPersonel');
Route::get('personnel/format_document/table', 'PersonelController@tableFormatDocumentPersonel');
Route::get('personnel/print_letter/table', 'PersonelController@tablePrintLetterPersonel');
Route::get('personnel/job_description/table', 'PersonelController@tableJobDescriptionPersonel');
Route::get('personnel/cost_center/table', 'PersonelController@tableCostCenterCodePersonel');
Route::get('personnel/location/table', 'PersonelController@tableLocationCodePersonel');
Route::get('personnel/position/table', 'PersonelController@tablePositionPersonel');
Route::get('personnel/ranking/table', 'PersonelController@tableRankingPersonel');
Route::get('personnel/grade/table', 'PersonelController@tableGradeCodePersonel');
Route::get('personnel/group/table', 'PersonelController@tableGroupPersonel');
Route::get('personnel/nature_of_work/table', 'PersonelController@tableNatureofWorkPersonel');
Route::get('personnel/bpjs_group/table', 'PersonelController@tableBPJSGroupPersonel');
Route::get('personnel/npwp_group/table', 'PersonelController@tableNPWPGroupPersonel');
Route::get('personnel/bank/table', 'PersonelController@tableBankPersonel');
Route::get('personnel/company_bank/table', 'PersonelController@tableCompanyBankPersonel');
Route::get('personnel/source_bank/table', 'PersonelController@tableSourceBankPersonel');
Route::get('personnel/transfer_bank/table', 'PersonelController@tableTransferBankPersonel');
Route::get('personnel/currency_code/table', 'PersonelController@tableCurrencyCodePersonel');
Route::get('personnel/rate_type/table', 'PersonelController@tableRateTypePersonel');
Route::get('personnel/exchange_rate/table', 'PersonelController@tableExchangeRatePersonel');
Route::get('personnel/education_code/table', 'PersonelController@tableEducationCodePersonel');
Route::get('personnel/education_status_code/table', 'PersonelController@tableEducationStatusCodePersonel');
Route::get('personnel/institution/table', 'PersonelController@tableInstitutionPersonel');
Route::get('personnel/major/table', 'PersonelController@tableMajorPersonel');
Route::get('personnel/type_of_course/table', 'PersonelController@tableTypeofCoursePersonel');
Route::get('personnel/language_code/table', 'PersonelController@tableLanguageCodePersonel');
Route::get('personnel/language_ability_code/table', 'PersonelController@tableLanguageAbilityCodePersonel');
Route::get('personnel/city/table', 'PersonelController@tableCityPersonel');
Route::get('personnel/zip/table', 'PersonelController@tableZipCodePersonel');
Route::get('personnel/insurance_code/table', 'PersonelController@tableInsuranceCodePersonel');
Route::get('personnel/insurance_class_code/table', 'PersonelController@tableInsuranceClassCodePersonel');
Route::get('personnel/termination_code/table', 'PersonelController@tableTerminationCodePersonel');
Route::get('personnel/decree_code/table', 'PersonelController@tableDecreeCodePersonel');
Route::get('personnel/sanction_code/table', 'PersonelController@tableSanctionCodePersonel');
Route::get('personnel/evaluation_form/table', 'PersonelController@tableEvaluationFormPersonel');
Route::get('personnel/title/table', 'PersonelController@tableTitlePersonel');
Route::get('personnel/nationality_code/table', 'PersonelController@tableNationalityCodePersonel');
Route::get('personnel/religion_code/table', 'PersonelController@tableReligionCodePersonel');
Route::get('personnel/line_of_business/table', 'PersonelController@tableLineofBusinessPersonel');
Route::get('personnel/fringe_benefits_code/table', 'PersonelController@tableFringeBenefitsCodePersonel');
Route::get('personnel/final_performance_result/table', 'PersonelController@tableFinalPerformanceResultPersonel');
Route::get('personnel/skill/table', 'PersonelController@tableSkillPersonel');
Route::get('personnel/attachment_code/table', 'PersonelController@tableAttachmentCodePersonel');
Route::get('personnel/free_format_field/table', 'PersonelController@tableFreeFormatFieldPersonel');
Route::get('personnel/format_report/table', 'PersonelController@tableFormatReportPersonel');
Route::get('personnel/relation_code/table', 'PersonelController@tableRelationCodePersonel');

Route::get('personnel/personal_data/detail_data', 'PersonelController@dataDetailPersonalDataPersonel');
Route::get('personnel/performance/detail_data', 'PersonelController@dataDetailPerformancePersonel');
Route::get('personnel/work_detail/detail_data', 'PersonelController@dataDetailWorkDetailPersonel');
Route::get('personnel/competency/detail_data', 'PersonelController@dataDetailCompetencyPersonel');
Route::get('personnel/other_information/detail_data', 'PersonelController@dataDetailOtherInformationPersonel');
Route::get('personnel/payroll_data/detail_data', 'PersonelController@dataDetailPayrollDataPersonel');
Route::get('personnel/employee_approval/detail_data', 'PersonelController@dataDetailPayrollDataPersonel');
Route::get('personnel/employee_attachment/detail_data', 'PersonelController@dataDetailEmployeeAttachmentPersonel');
Route::get('personnel/level/detail_data', 'PersonelController@dataDetailLevelPersonel');
Route::get('personnel/source_document/detail_data', 'PersonelController@dataDetailSourceDocumentPersonel');
Route::get('personnel/format_document/detail_data', 'PersonelController@dataDetailFormatDocumentPersonel');
Route::get('personnel/job_description/detail_data', 'PersonelController@dataDetailJobDescriptionPersonel');
Route::get('personnel/cost_center/detail_data', 'PersonelController@dataDetailCostCenterCodePersonel');
Route::get('personnel/location/detail_data', 'PersonelController@dataDetailLocationCodePersonel');
Route::get('personnel/position/detail_data', 'PersonelController@dataDetailPositionPersonel');
Route::get('personnel/ranking/detail_data', 'PersonelController@dataDetailRankingPersonel');
Route::get('personnel/grade/detail_data', 'PersonelController@dataDetailGradeCodePersonel');
Route::get('personnel/group/detail_data', 'PersonelController@dataDetailGroupPersonel');
Route::get('personnel/nature_of_work/detail_data', 'PersonelController@dataDetailNatureofWorkPersonel');
Route::get('personnel/bpjs_group/detail_data', 'PersonelController@dataDetailBPJSGroupPersonel');
Route::get('personnel/npwp_group/detail_data', 'PersonelController@dataDetailNPWPGroupPersonel');
Route::get('personnel/bank/detail_data', 'PersonelController@dataDetailBankPersonel');
Route::get('personnel/company_bank/detail_data', 'PersonelController@dataDetailCompanyBankPersonel');
Route::get('personnel/source_bank/detail_data', 'PersonelController@dataDetailSourceBankPersonel');
Route::get('personnel/transfer_bank/detail_data', 'PersonelController@dataDetailTransferBankPersonel');
Route::get('personnel/currency_code/detail_data', 'PersonelController@dataDetailCurrencyCodePersonel');
Route::get('personnel/rate_type/detail_data', 'PersonelController@dataDetailRateTypePersonel');
Route::get('personnel/exchange_rate/detail_data', 'PersonelController@dataDetailExchangeRatePersonel');
Route::get('personnel/education_code/detail_data', 'PersonelController@dataDetailEducationCodePersonel');
Route::get('personnel/education_status_code/detail_data', 'PersonelController@dataDetailEducationStatusCodePersonel');
Route::get('personnel/institution/detail_data', 'PersonelController@dataDetailInstitutionPersonel');
Route::get('personnel/major/detail_data', 'PersonelController@dataDetailMajorPersonel');
Route::get('personnel/type_of_course/detail_data', 'PersonelController@dataDetailTypeofCoursePersonel');
Route::get('personnel/language_code/detail_data', 'PersonelController@dataDetailLanguageCodePersonel');
Route::get('personnel/language_ability_code/detail_data', 'PersonelController@dataDetailLanguageAbilityCodePersonel');
Route::get('personnel/city/detail_data', 'PersonelController@dataDetailCityPersonel');
Route::get('personnel/zip/detail_data', 'PersonelController@dataDetailZipCodePersonel');
Route::get('personnel/insurance_code/detail_data', 'PersonelController@dataDetailInsuranceCodePersonel');
Route::get('personnel/insurance_class_code/detail_data', 'PersonelController@dataDetailInsuranceClassCodePersonel');
Route::get('personnel/termination_code/detail_data', 'PersonelController@dataDetailTerminationCodePersonel');
Route::get('personnel/decree_code/detail_data', 'PersonelController@dataDetailDecreeCodePersonel');
Route::get('personnel/sanction_code/detail_data', 'PersonelController@dataDetailSanctionCodePersonel');
Route::get('personnel/evaluation_form/detail_data', 'PersonelController@dataDetailEvaluationFormPersonel');
Route::get('personnel/title/detail_data', 'PersonelController@dataDetailTitlePersonel');
Route::get('personnel/nationality_code/detail_data', 'PersonelController@dataDetailNationalityCodePersonel');
Route::get('personnel/religion_code/detail_data', 'PersonelController@dataDetailReligionCodePersonel');
Route::get('personnel/line_of_business/detail_data', 'PersonelController@dataDetailLineofBusinessPersonel');
Route::get('personnel/fringe_benefits_code/detail_data', 'PersonelController@dataDetailFringeBenefitsCodePersonel');
Route::get('personnel/final_performance_result/detail_data', 'PersonelController@dataDetailFinalPerformanceResultPersonel');
Route::get('personnel/skill/detail_data', 'PersonelController@dataDetailSkillPersonel');
Route::get('personnel/attachment_code/detail_data', 'PersonelController@dataDetailAttachmentCodePersonel');
Route::get('personnel/free_format_field/detail_data', 'PersonelController@dataDetailFreeFormatFieldPersonel');
Route::get('personnel/format_report/detail_data', 'PersonelController@dataDetailFormatReportPersonel');
Route::get('personnel/relation_code/detail_data', 'PersonelController@dataDetailRelationCodePersonel');
Route::get('personnel/final_performance_result/detail_data', 'PersonelController@dataDetailFinalPerformanceResultPersonel');
Route::get('personnel/employee_mutation/detail_data', 'PersonelController@dataDetailEmployeeMutationPersonel');
Route::get('personnel/city_name/detail', 'PersonelController@dataDetailCityNamePersonel');
Route::get('personnel/zip_code/detail', 'PersonelController@dataDetailZipCodeDetailPersonel');

Route::get('personnel/personal_data/fringe_benefit/table', 'PersonelController@tableFringeBenefitPersonalDataPersonel');
Route::get('personnel/personal_data/dependent/table', 'PersonelController@tableDependentPersonalDataPersonel');
Route::get('personnel/family_dependent_data/table', 'PersonelController@tableFamilyDependentDataPersonel');
Route::get('personnel/personal_data/prefix_title', 'PersonelController@dataPrefixTitlePersonalDataPersonel');
Route::get('personnel/performance/award/table', 'PersonelController@tableAwardPerformancePersonel');
Route::get('personnel/performance/sanction/table', 'PersonelController@tableSanctionPerformancePersonel');
Route::get('personnel/performance/evaluation/table', 'PersonelController@tableEvaluationPerformancePersonel');
Route::get('personnel/performance/evaluation/form/table', 'PersonelController@tableEvaluationFormPerformancePersonel');
Route::get('personnel/work_detail/job_history/table', 'PersonelController@tableJobHistoryWorkDetailPersonel');
Route::get('personnel/work_detail/work_experience/table', 'PersonelController@tableWorkExperienceWorkDetailPersonel');
Route::get('personnel/work_detail/free_format_field/table', 'PersonelController@tableFreeFormatFieldWorkDetailPersonel');
Route::get('personnel/competency/formal_education/table', 'PersonelController@tableCompetencyFormalEducationPersonel');
Route::get('personnel/competency/language/table', 'PersonelController@tableCompetencyLanguagePersonel');
Route::get('personnel/competency/organization/table', 'PersonelController@tableCompetencyOrganizationPersonel');
Route::get('personnel/competency/reference/table', 'PersonelController@tableCompetencyReferencePersonel');
Route::get('personnel/competency/skill/table', 'PersonelController@tableCompetencySkillPersonel');
Route::get('personnel/competency/project_experience/table', 'PersonelController@tableCompetencyProjectExperiencePersonel');
Route::get('personnel/competency/training_list/table', 'PersonelController@tableCompetencyTrainingListPersonel');
Route::get('personnel/other_information/free_format_field/table', 'PersonelController@tableOtherInformationFreeFormatFieldPersonel');
Route::get('personnel/employee_attachment/attachment/table', 'PersonelController@tableEmployeeAttachmentAttachmentPersonel');
Route::get('personnel/format_document/format_document/table', 'PersonelController@tableFormatDocumentFormatDocumentPersonel');
Route::get('personnel/exchange_rate/exchange_rate/table', 'PersonelController@tableExchangeRateExchangeRatePersonel');
Route::get('personnel/evaluation_form/evaluation_aspect/table', 'PersonelController@tableEvaluationFormEvaluationAspectPersonel');
Route::get('personnel/evaluation_form/predicate/table', 'PersonelController@tableEvaluationFormPredicatePersonel');
Route::get('personnel/free_format_field/detail/table', 'PersonelController@tableFreeFormatFieldDetailPersonel');
Route::get('personnel/format_report/report_format/table', 'PersonelController@tableFormatReportReportFormatPersonel');
Route::get('personnel/format_report/report_format_condition/table', 'PersonelController@tableFormatReportReportFormatConditionPersonel');
Route::get('personnel/source_document/detail/table', 'PersonelController@tableSourceDocumentDetailPersonel');
Route::get('personnel/source_document/signer/table', 'PersonelController@tableSourceDocumentSignerPersonel');

Route::get('personnel/nature_of_work/status', 'PersonelController@statusNatureofWorkPersonel');
Route::get('personnel/grade/status', 'PersonelController@statusGradeCodePersonel');
Route::get('personnel/position/status', 'PersonelController@statusPositionPersonel');
Route::get('personnel/location/status', 'PersonelController@statusLocationCodePersonel');
Route::get('personnel/level/status', 'PersonelController@statusLevelPersonel');
Route::get('personnel/cost_center/status', 'PersonelController@statusCostCenterCodePersonel');
Route::get('personnel/performance/status', 'PersonelController@statusPerformancePersonel');
Route::get('personnel/competency/status', 'PersonelController@statusCompetencyPersonel');
Route::get('personnel/bank/status', 'PersonelController@statusBankPersonel');
Route::get('personnel/company_bank/status', 'PersonelController@statusCompanyBankPersonel');
Route::get('personnel/group/status', 'PersonelController@statusGroupPersonel');
Route::get('personnel/zip/status', 'PersonelController@statusZipCodePersonel');
Route::get('personnel/bpjs_group/status', 'PersonelController@statusBPJSGroupPersonel');
Route::get('personnel/npwp_group/status', 'PersonelController@statusNPWPGroupPersonel');
Route::get('personnel/ranking/status', 'PersonelController@statusRankingPersonel');
Route::get('personnel/institution/status', 'PersonelController@statusInstitutionPersonel');
Route::get('personnel/major/status', 'PersonelController@statusMajorPersonel');
Route::get('personnel/type_of_course/status', 'PersonelController@statusTypeofCoursePersonel');
Route::get('personnel/final_performance_result/status', 'PersonelController@statusFinalPerformanceResultPersonel');
Route::get('personnel/skill/status', 'PersonelController@statusSkillPersonel');
Route::get('personnel/source_document/status', 'PersonelController@statusSourceDocumentPersonel');
Route::get('personnel/evaluation_form/status', 'PersonelController@statusEvaluationFormPersonel');
Route::get('personnel/free_format_field/status', 'PersonelController@statusFreeFormatFieldPersonel');
Route::get('personnel/free_format_field/detail/status', 'PersonelController@statusFreeFormatFieldDetailPersonel');
Route::get('personnel/city/status', 'PersonelController@statusCityPersonel');
Route::get('personnel/title/status', 'PersonelController@statusTitlePersonel');
Route::get('personnel/personal_data/status', 'PersonelController@statusPersonalDataPersonel');

Route::post('personnel/personal_data/proses', 'PersonelController@prosesPersonalDataPersonel');
Route::post('personnel/nature_of_work/proses', 'PersonelController@prosesNatureofWorkPersonel');
Route::post('personnel/grade/proses', 'PersonelController@prosesGradeCodePersonel');
Route::post('personnel/position/proses', 'PersonelController@prosesPositionPersonel');
Route::post('personnel/location/proses', 'PersonelController@prosesLocationCodePersonel');
Route::post('personnel/level/proses', 'PersonelController@prosesLevelPersonel');
Route::post('personnel/cost_center/proses', 'PersonelController@prosesCostCenterCodePersonel');
Route::post('personnel/performance/award/proses', 'PersonelController@prosesPerformanceAwardPersonel');
Route::post('personnel/performance/sanction/proses', 'PersonelController@prosesPerformanceSanctionPersonel');
Route::post('personnel/performance/evaluation/proses', 'PersonelController@prosesPerformanceEvaluationPersonel');
Route::post('personnel/work_detail/job_history/proses', 'PersonelController@prosesWorkDetailJobHistoryPersonel');
Route::post('personnel/work_detail/work_experience/proses', 'PersonelController@prosesWorkDetailWorkExperiencePersonel');
Route::post('personnel/work_detail/free_format_field/proses', 'PersonelController@prosesWorkDetailFreeFormatFieldPersonel');
Route::post('personnel/competency/formal_education/proses', 'PersonelController@prosesCompetencyFormalEducationPersonel');
Route::post('personnel/competency/language/proses', 'PersonelController@prosesCompetencyLanguagePersonel');
Route::post('personnel/competency/organization/proses', 'PersonelController@prosesCompetencyOrganizationPersonel');
Route::post('personnel/competency/reference/proses', 'PersonelController@prosesCompetencyReferencePersonel');
Route::post('personnel/competency/skill/proses', 'PersonelController@prosesCompetencySkillPersonel');
Route::post('personnel/competency/project_experience/proses', 'PersonelController@prosesCompetencyProjectExperiencePersonel');
Route::post('personnel/competency/training_list/proses', 'PersonelController@prosesCompetencyTrainingListPersonel');
Route::post('personnel/employee_approval/proses', 'PersonelController@prosesEmployeeApprovalPersonel');
Route::post('personnel/bank/proses', 'PersonelController@prosesBankPersonel');
Route::post('personnel/company_bank/proses', 'PersonelController@prosesCompanyBankPersonel');
Route::post('personnel/group/proses', 'PersonelController@prosesGroupPersonel');
Route::post('personnel/zip/proses', 'PersonelController@prosesZipCodePersonel');
Route::post('personnel/bpjs_group/proses', 'PersonelController@prosesBPJSGroupPersonel');
Route::post('personnel/npwp_group/proses', 'PersonelController@prosesNPWPGroupPersonel');
Route::post('personnel/ranking/proses', 'PersonelController@prosesRankingPersonel');
Route::post('personnel/institution/proses', 'PersonelController@prosesInstitutionPersonel');
Route::post('personnel/major/proses', 'PersonelController@prosesMajorPersonel');
Route::post('personnel/type_of_course/proses', 'PersonelController@prosesTypeofCoursePersonel');
Route::post('personnel/skill/proses', 'PersonelController@prosesSkillPersonel');
Route::post('personnel/source_document/proses', 'PersonelController@prosesSourceDocumentPersonel');
Route::post('personnel/source_document/detail/proses', 'PersonelController@prosesSourceDocumentDetailPersonel');
Route::post('personnel/source_document/signer/proses', 'PersonelController@prosesSourceDocumentSignerPersonel');
Route::post('personnel/final_performance_result/proses', 'PersonelController@prosesFinalPerformanceResultPersonel');
Route::post('personnel/evaluation_form/proses', 'PersonelController@prosesEvaluationFormPersonel');
Route::post('personnel/evaluation_form/evaluted_aspect/proses', 'PersonelController@prosesEvaluationFormEvaluatedAspectPersonel');
Route::post('personnel/personel_reference/proses', 'PersonelController@prosesPersonelReferencePersonel');
Route::post('personnel/free_format_field/proses', 'PersonelController@prosesFreeFormatFieldPersonel');
Route::post('personnel/free_format_field/detail/proses', 'PersonelController@prosesFreeFormatFieldDetailPersonel');
Route::post('personnel/city/proses', 'PersonelController@prosesCityPersonel');
Route::post('personnel/title/proses', 'PersonelController@prosesTitlePersonel');
Route::post('personnel/employee_mutation/proses', 'PersonelController@prosesEmployeeMutationPersonel');
Route::post('personnel/employee_attachment/proses', 'PersonelController@prosesEmployeeAttachmentPersonel');

Route::get('personnel/final_performance_result/remove', 'PersonelController@removeFinalPerformanceResultPersonel');
Route::get('personnel/evaluation_form/evaluated_aspect/remove', 'PersonelController@removeEvaluationFormEvaluatedAspectPersonel');
Route::get('personnel/performance/award/remove', 'PersonelController@removePerformanceAwardPersonel');
Route::get('personnel/performance/sanction/remove', 'PersonelController@removePerformanceSanctionPersonel');
Route::get('personnel/performance/evaluation/remove', 'PersonelController@removePerformanceEvaluationPersonel');
Route::get('personnel/work_detail/work_experience/remove', 'PersonelController@removeWorkDetailWorkExperiencePersonel');
Route::get('personnel/work_detail/free_format_field/remove', 'PersonelController@removeWorkDetailFreeFormatFieldPersonel');
Route::get('personnel/competency/formal_education/remove', 'PersonelController@removeCompetencyFormalEducationPersonel');
Route::get('personnel/competency/language/remove', 'PersonelController@removeCompetencyLanguagePersonel');
Route::get('personnel/competency/organization/remove', 'PersonelController@removeCompetencyOrganizationPersonel');
Route::get('personnel/competency/reference/remove', 'PersonelController@removeCompetencyReferencePersonel');
Route::get('personnel/competency/skill/remove', 'PersonelController@removeCompetencySkillPersonel');
Route::get('personnel/competency/project_experience/remove', 'PersonelController@removeCompetencyProjectExperiencePersonel');
Route::post('personnel/competency/training_list/remove', 'PersonelController@removeCompetencyTrainingListPersonel');
Route::post('personnel/employee_attachment/remove', 'PersonelController@removeEmployeeAttachmentPersonel');

Route::get('personnel/number/check', 'PersonelController@checkNumberPersonel');
Route::get('personel_data_detail/number/check', 'PersonelController@checkNumberPersonelDataDetail');
Route::get('personel_data_detail/auto_employee_no/check', 'PersonelController@checkAutoEmployeeNoPersonel');
Route::post('personnel/print_letter/print', 'PersonelController@printPrintLetterPersonel');
Route::post('personnel/employee_list/print', 'PersonelController@printEmployeeListPersonel');
Route::post('personnel/employee_turn_over_report/print', 'PersonelController@printEmployeeTurnOverReportPersonel');
Route::post('personnel/employee_skill_report/print', 'PersonelController@printEmployeeSkillReportPersonel');
Route::post('personnel/employee_report_by_status/print', 'PersonelController@printEmployeeReportByStatusPersonel');
Route::post('personnel/employee_card/print', 'PersonelController@printEmployeeCardPersonel');
Route::post('personnel/custom_report_employee/print', 'PersonelController@printCustomReportEmployee');
Route::post('personnel/evaluation_report/print', 'PersonelController@printEvaluationReportPersonel');
Route::post('personnel/employee_dependents/print', 'PersonelController@printEmployeeDependentsPersonel');
Route::post('personnel/personal_data/template', 'PersonelController@templatePersonalDataPersonel');
Route::post('personnel/personal_data/export', 'PersonelController@exportPersonalDataPersonel');
Route::post('personnel/personal_data/import', 'PersonelController@importPersonalDataPersonel');
Route::post('personnel/personal_data/import_update', 'PersonelController@importUpdatePersonalDataPersonel');
Route::get('personnel/report/level/check', 'PersonelController@checkReportLevelPersonel');
Route::post('personnel/employee/photo/proses', 'PersonelController@prosesEmployeePhotoPersonel');
Route::get('personnel/performance/result/check', 'PersonelController@checkResultPerformancePersonel');
Route::get('personnel/employee_attachment/view', 'PersonelController@viewEmployeeAttachmentPersonel');
Route::post('personnel/import_master_data/download_template', 'PersonelController@downloadTemplateMasterDataPersonel');
Route::post('personnel/import_master_data/import', 'PersonelController@importMasterDataPersonel');

/* Route Untuk Menu Time Management */
Route::get('time_management', 'TimeManagementController@pageTimeManagement')->name('time_management');
Route::get('time_management/time_recording_process_form', 'TimeManagementController@pageTimeRecordingProcessForm');
Route::get('time_management/update_absenteeism_data', 'TimeManagementController@pageUpdateAbsenteeismData');
Route::get('time_management/change_data_shift', 'TimeManagementController@pageChangeDataShift');
Route::get('time_management/update_absenteeism_process', 'TimeManagementController@pageUpdateAbsenteeismProcess');
Route::get('time_management/template_preparation', 'TimeManagementController@pageTemplatePreparation');
Route::get('time_management/absenteeism_data_entry_by_employee_no', 'TimeManagementController@pageAbsenteeismDataEntryByEmployeeNo');
Route::get('time_management/absenteeism_data_entry_by_date', 'TimeManagementController@pageAbsenteeismDataEntryByDate');
Route::get('time_management/update_shift_by_date', 'TimeManagementController@pageUpdateShiftByDate');
Route::get('time_management/overtime_spl', 'TimeManagementController@pageOvertimeSPL');
Route::get('time_management/company_working_calendar', 'TimeManagementController@pageCompanyWorkingCalendar');
Route::get('time_management/input_balance_leave', 'TimeManagementController@pageInputBalanceLeave');
Route::get('time_management/leave_transaction_by_employee_no', 'TimeManagementController@pageLeaveTransactionByEmployeeNo');
Route::get('time_management/time_recording_reference', 'TimeManagementController@pageTimeRecordingReference');
Route::get('time_management/period_maintenance', 'TimeManagementController@pagePeriodMaintenance');
Route::get('time_management/work_pattern', 'TimeManagementController@pageWorkPattern');
Route::get('time_management/reference_time_management', 'TimeManagementController@pageReferenceTimeManagement');
Route::get('time_management/shift_master_code', 'TimeManagementController@pageShiftMasterCode');
Route::get('time_management/absent_code', 'TimeManagementController@pageAbsentCode');
Route::get('time_management/monthly_absenteeism_analysis', 'TimeManagementController@pageMonthlyAbsenteeismAnalysis');
Route::get('time_management/monthly_absenteeism_detail', 'TimeManagementController@pageMonthlyAbsenteeismDetail');
Route::get('time_management/absenteeism_overtime_report', 'TimeManagementController@pageAbsenteeismOvertimeReport');
Route::get('time_management/monthly_leave_report', 'TimeManagementController@pageMonthlyLeaveReport');
Route::get('time_management/postpone_leave_report', 'TimeManagementController@pagePostponeLeaveReport');
Route::get('time_management/unpaid_leave_report', 'TimeManagementController@pageUnpaidLeaveReport');
Route::get('time_management/detail_absenteeism_report', 'TimeManagementController@pageDetailAbsenteeismReport');
Route::get('time_management/detail_rate_overtime_report', 'TimeManagementController@pageDetailRateOvertimeReport');
Route::get('time_management/detail_absenteeism_reason_report', 'TimeManagementController@pageDetailAbsenteeismReasonReport');

/* Route untuk Tabel Time Management */
Route::get('time_management/input_balance_leave/table', 'TimeManagementController@tableInputBalanceLeave');
Route::get('time_management/company_working_calendar/table', 'TimeManagementController@tableCompanyWorkingCalendar');
Route::get('time_management/work_pattern/table', 'TimeManagementController@tableWorkPatternTM');
Route::get('time_management/work_pattern/detail/table', 'TimeManagementController@tableWorkPatternDetailTM');
Route::get('time_management/overtime_spl/table', 'TimeManagementController@tableOvertimeSPL');
Route::get('time_management/period_maintenance/table', 'TimeManagementController@tablePeriodMaintenanceTM');
Route::get('time_management/absent_code/table', 'TimeManagementController@tableAbsentCodeTM');
Route::get('time_management/monthly_absenteeism_detail/table', 'TimeManagementController@tableMonthlyAbsenteeismDetail');
Route::get('time_management/time_recording_reference/table', 'TimeManagementController@tableTimeRecordingReferenceTM');
Route::get('time_management/overtime_code/table', 'TimeManagementController@tableOvertimeCodeTM');
Route::get('time_management/shift_master_code/table', 'TimeManagementController@tableShiftMasterCodeTM');
Route::get('time_management/absenteeism_data_entry_by_employee_no/table', 'TimeManagementController@tableAbsenteeismDataEntryByEmployeeNoTM');
Route::get('time_management/absenteeism_data_entry_by_date/table', 'TimeManagementController@tableAbsenteeismDataEntryByDateTM');
Route::get('time_management/reference_time_management/table', 'TimeManagementController@tableReferenceTimeManagementTM');

/* Route untuk data detail Time Management */
Route::get('time_management/detail_absenteeism_report', 'TimeManagementController@pageDetailAbsenteeismReport');
Route::get('time_management/detail_rate_overtime_report', 'TimeManagementController@pageDetailRateOvertimeReport');
Route::get('time_management/detail_absenteeism_reason_report', 'TimeManagementController@pageDetailAbsenteeismReasonReport');

/*Route untuk check bool Time Management */
Route::get('time_management/user_detail/check', 'TimeManagementController@checkAppTM');

/* Route untuk proses Time Management */
Route::post('time_management/company_working_calendar/proses','TimeManagementController@prosesCompanyWorkingCalendar');
Route::post('time_management/input_balance_leave/proses', 'TimeManagementController@prosesInputBalanceLeaveTM');
Route::post('time_management/update_shift_by_date/proses', 'TimeManagementController@prosesUpdateShiftByDateTM');
Route::post('time_management/overtime_spl/proses', 'TimeManagementController@prosesOvertimeSPLTM');
Route::post('time_management/work_pattern/proses', 'TimeManagementController@prosesWorkPatternTM');
Route::post('time_management/period_maintenance/proses', 'TimeManagementController@prosesPeriodMaintenanceTM');
Route::post('time_management/leave_transaction/proses', 'TimeManagementController@prosesLeaveTransactionTM');
Route::post('time_management/absent_code/proses', 'TimeManagementController@prosesAbsentCodeTM');
Route::post('time_management/shift_master_code/proses', 'TimeManagementController@prosesShiftMasterCodeTM');
Route::post('time_management/time_recording_process_form/proses', 'TimeManagementController@prosesTimeRecordingProcessFormTM');
Route::post('time_management/time_recording_reference/proses', 'TimeManagementController@prosesTimeRecordingReferenceTM');
Route::post('time_management/template_preparation/proses', 'TimeManagementController@prosesTemplatePreparationTM');
Route::post('time_management/reference_time_management/proses', 'TimeManagementController@prosesReferenceTimeManagementTM');
Route::post('time_management/reference_time_management/detail/proses', 'TimeManagementController@prosesReferenceTimeManagementDetailTM');
Route::post('time_management/absenteeism_data_entry_by_employee_no/proses', 'TimeManagementController@prosesAbsenteeismDataEntryByEmployeeNoTM');
Route::post('time_management/absenteeism_data_entry_by_date/proses', 'TimeManagementController@prosesAbsenteeismDataEntryByDateTM');
Route::post('time_management/update_absenteeism_process/proses', 'TimeManagementController@prosesUpdateAbsenteeismProcessTM');

/* Route untuk remove Time Managemnet */
Route::get('time_management/time_recording_process_form/remove', 'TimeManagementController@removeTimeRecordingProcessFormTM');
Route::get('time_management/overtime_spl/remove', 'TimeManagementController@removeOvertimeSPLTM');
Route::get('time_management/period_maintenance/remove', 'TimeManagementController@removePeriodMaintenanceTM');
Route::get('time_management/company_working_calendar/remove','TimeManagementController@removeCompanyWorkingCalendar');
Route::get('time_management/reference_time_management/detail/remove','TimeManagementController@removeReferenceTimeManagementDetail');

/* Route untuk cek status Time Management */
Route::post('time_management/overtime_spl/status', 'TimeManagementController@statusOvertimeSPLTM');
Route::get('time_management/work_pattern/status', 'TimeManagementController@statusWorkPatternTM');
Route::get('time_management/absent_code/status', 'TimeManagementController@statusAbsentCodeTM');
Route::get('time_management/shift_master_code/status', 'TimeManagementController@statusShiftMasterCodeTM');

/* Route untuk detail Time Management */
Route::get('time_management/input_balance_leave/detail', 'TimeManagementController@dataDetailInputBalanceLeave');
Route::get('time_management/period/data/detail', 'TimeManagementController@dataDetailPeriodTM');
Route::get('time_management/employee_name/detail', 'TimeManagementController@dataDetailEmployeeNameTM');
Route::get('time_management/balance/detail', 'TimeManagementController@dataDetailBalanceTM');
Route::get('time_management/period_maintenance/data/detail', 'TimeManagementController@dataDetailPeriodMaintenanceTM');
Route::get('time_management/work_pattern/detail_data', 'TimeManagementController@dataDetailWorkPatternTM');
Route::get('time_management/absent_code/detail', 'TimeManagementController@dataDetailAbsentCodeTM');
Route::get('time_management/absent_code/detail_data', 'TimeManagementController@dataDetailDataAbsentCodeTM');
Route::get('time_management/shift_master_code/detail_data', 'TimeManagementController@dataDetailShiftMasterCodeTM');
Route::get('time_management/absenteeism_data_entry/detail', 'TimeManagementController@dataDetailAbsenteeismDataEntryTM');

/* Route untuk Report Time Management */
Route::post('time_management/unpaid_leave_report/print', 'TimeManagementController@printUnpaidLeaveReport');
Route::post('time_management/postpone_leave_report/print', 'TimeManagementController@printPostponeLeaveReport');
Route::post('time_management/monthly_leave_report/print', 'TimeManagementController@printMonthlyLeaveReport');
Route::post('time_management/monthly_absenteeism_analysis/print', 'TimeManagementController@printMonthlyAbsenteeismAnalysis');
Route::post('time_management/detail_absenteeism_report/print', 'TimeManagementController@printDetailAbsenteeismReport');
Route::post('time_management/monthly_absenteeism_detail/print', 'TimeManagementController@printMonthlyAbsenteeismDetail');
Route::post('time_management/detail_absenteeism_reason_report/print', 'TimeManagementController@printDetailAbsenteeismReasonReport');
Route::post('time_management/detail_rate_overtime_report/print', 'TimeManagementController@printDetailRateOvertimeReport');
Route::post('time_management/absenteeism_overtime_report/print', 'TimeManagementController@printAbsenteeismOvertimeReport');

Route::post('time_management/update_absenteeism_data/import', 'TimeManagementController@importUpdateAbsenteeismData');
Route::post('time_management/update_absenteeism_data/download', 'TimeManagementController@templateUpdateAbsenteeismData');
Route::post('time_management/change_data_shift/import', 'TimeManagementController@importChangeDataShift');
Route::post('time_management/change_data_shift/download', 'TimeManagementController@templateChangeDataShift');

/* Route Untuk Menu Payroll */
Route::get('payroll', 'PayrollController@pagePayroll')->name('payroll');
/* Payroll Data Entry Menu */
Route::get('payroll/salary_master', 'PayrollController@pageSalaryMaster');
Route::get('payroll/severance_data_entry', 'PayrollController@pageSeveranceDataEntry');
Route::get('payroll/salary_accumulation_data', 'PayrollController@pageSalaryAccumulationData');
Route::get('payroll/tarif_master', 'PayrollController@pageTarifMaster');
Route::get('payroll/import_data_from_excel', 'PayrollController@pageImportDataFromExcel');
Route::get('payroll/import_data_from_excel_bonus_thr', 'PayrollController@pageImportDataFromExcelBonusTHR');
Route::get('payroll/thr_data_entry', 'PayrollController@pageThrDataEntry');
Route::get('payroll/bonus_data_entry', 'PayrollController@pageBonusDataEntry');
Route::get('payroll/loan_master', 'PayrollController@pageLoanMaster');
Route::get('payroll/loan_data_entry', 'PayrollController@pageLoanDataEntry');
Route::get('payroll/full_partial_loan_payment', 'PayrollController@pagePartialFullLoanPayment');
Route::get('payroll/loan_payment', 'PayrollController@pageLoanPayment');
/* Payroll Maintenance Menu */
Route::get('payroll/payroll_calculation', 'PayrollController@pagePayrollCalculation');
Route::get('payroll/thr_formula', 'PayrollController@pageThrFormula');
Route::get('payroll/bonus_formula', 'PayrollController@pageBonusFormula');
Route::get('payroll/reference_payroll', 'PayrollController@pageReferencePayroll');
Route::get('payroll/account', 'PayrollController@pageAccount');
Route::get('payroll/jamsostek_percentage', 'PayrollController@pageJamsostekPercentage');
Route::get('payroll/tax_calculation_table', 'PayrollController@pageTaxCalculationTable');
Route::get('payroll/spt_format', 'PayrollController@pageSptFormat');
Route::get('payroll/slip_format', 'PayrollController@pageSlipFormat');
Route::get('payroll/salary_component_data', 'PayrollController@pageSalaryComponentForm');
Route::get('payroll/journal_template', 'PayrollController@pageJournalTemplate');
Route::get('payroll/report_format', 'PayrollController@pageReportFormat');
Route::get('payroll/multi_cost_center', 'PayrollController@pageMultiCostCenter');
/* Payroll Process Menu */
Route::get('payroll/year_end_process', 'PayrollController@pageYearEndProcess');
Route::get('payroll/spt_process', 'PayrollController@pageSptProcess');
Route::get('payroll/final_tax_process', 'PayrollController@pageFinalTaxProcess');
Route::get('payroll/monthly_payroll_closing_process', 'PayrollController@pageMonthlyPayrollClosingProcess');
Route::get('payroll/monthly_system_closing', 'PayrollController@pageMonthlySystemClosing');
// Route::get('payroll/transfer_data_to_bank', 'PayrollController@pageTransferDataToBank');
Route::get('payroll/transfer_data_to_bank', 'PayrollController@dataDetailTransferDataToBankPY');
Route::get('payroll/periodical_update_process', 'PayrollController@pagePeriodicalUpdateProcess');
Route::get('payroll/overtime_calculation_process', 'PayrollController@pageOvertimeCalculationProcess');
Route::get('payroll/journal_process', 'PayrollController@pageJournalProcess');
Route::get('payroll/salary_calculation_process', 'PayrollController@pageSalaryCalculationProcess');
Route::get('payroll/tax_calculation_process', 'PayrollController@pageTaxCalculationProcess');
Route::get('payroll/absenteeism_overtime_calculation_process', 'PayrollController@pageAbsenteeismOvertimeCalculationProcess');
Route::get('payroll/absenteeism_calculation_process', 'PayrollController@pageAbsenteeismCalculationProcess');
Route::get('payroll/transfer_data_to_bank/export_to_file', 'PayrollController@pageTransferDataToBankExportToFile');
Route::get('payroll/transfer_data_to_bank/api', 'PayrollController@pageTransferDataToBankApi');
/* Payroll Report Menu */
Route::get('payroll/dumtk', 'PayrollController@pageDUMTK');
Route::get('payroll/monthly_jamsostek_report', 'PayrollController@pageMonthlyJamsostekReport');
Route::get('payroll/loan_report', 'PayrollController@pageLoanReport');
Route::get('payroll/journal_report', 'PayrollController@pageJournalReport');
Route::get('payroll/bonus_thr_report', 'PayrollController@pageBonusTHRReport');
Route::get('payroll/periodical_report', 'PayrollController@pagePeriodicalReport');
Route::get('payroll/payment_slip', 'PayrollController@pagePaymentSlip');
Route::get('payroll/severance_report', 'PayrollController@pageSeveranceReport');
Route::get('payroll/salary_historical_report', 'PayrollController@pageSalaryHistoricalReport');
Route::get('payroll/csv_e-spt_report_form', 'PayrollController@pageCSVESPTReportForm');
Route::get('payroll/spt_pph_1721a1', 'PayrollController@pageSptPph1721a1');
Route::get('payroll/annual_report', 'PayrollController@pageAnnualReport');
Route::get('payroll/spt_report', 'PayrollController@pageSPTReport');
Route::get('payroll/spt_pph_report', 'PayrollController@pageSPTPPHReport');
Route::get('payroll/signature_list_report', 'PayrollController@pageSignatureListReport');
Route::get('payroll/retroactive_report', 'PayrollController@pageRetroactiveReport');
Route::get('payroll/export_data_kepesertaan_bpjs_tk_report', 'PayrollController@pageExportDataKepesertaanBPJSTKReport');
Route::get('payroll/export_sipp_online', 'PayrollController@pageExportSIPPOnline');

/* Route untuk tabel Payroll */
Route::get('payroll/account/table', 'PayrollController@tableAccountPY');
Route::get('payroll/salary_master/table', 'PayrollController@tableSalaryMasterPY');
Route::get('payroll/severance_data_entry/table', 'PayrollController@tableSeveranceDataEntryPY');
Route::get('payroll/tariff_master/table', 'PayrollController@tableTariffMasterPY');
Route::get('payroll/tariff_master_detail/table', 'PayrollController@tableTariffMasterDetailPY');
Route::get('payroll/salary_accumulation_data/table', 'PayrollController@tableSalaryAccumulationDataPY');
Route::get('payroll/thr_data_entry/table', 'PayrollController@tableTHRDataEntryPY');
Route::get('payroll/bonus_data_entry/table', 'PayrollController@tableBonusDataEntryPY');
Route::get('payroll/loan_master/table', 'PayrollController@tableLoanMasterPY');
Route::get('payroll/loan_data_entry/table', 'PayrollController@tableLoanDataEntryPY');
Route::get('payroll/full_partial_loan_payment/table', 'PayrollController@tableFullPartialLoanPaymentPY');
Route::get('payroll/loan_payment/table', 'PayrollController@tableLoanPaymentPY');
Route::get('payroll/thr_formula/table', 'PayrollController@tableTHRFormulaPY');
Route::get('payroll/thr_formula_detail/table', 'PayrollController@tableTHRFormulaDetailPY');
Route::get('payroll/bonus_formula/table', 'PayrollController@tableBonusFormulaPY');
Route::get('payroll/bonus_formula_detail/table', 'PayrollController@tableBonusFormulaDetailPY');
Route::get('payroll/multi_cost_center/table', 'PayrollController@tableMultiCostCenterPY');
Route::get('payroll/report_format/table', 'PayrollController@tableReportFormatPY');
Route::get('payroll/payroll_calculation/table', 'PayrollController@tablePayrollCalculationPY');
Route::get('payroll/payroll_calculation_detail/table', 'PayrollController@tablePayrollCalculationDetailPY');
Route::get('payroll/salary_component_data/table', 'PayrollController@tableSalaryComponentFormPY');
Route::get('payroll/journal_template/table', 'PayrollController@tableJournalTemplatePY');

/*Route untuk Proses Payroll*/
Route::post('payroll/salary_master/proses', 'PayrollController@prosesSalaryMasterPY');
Route::post('payroll/severance_data_entry/proses', 'PayrollController@prosesSeveranceDataEntryPY');
Route::post('payroll/tariff_master/proses', 'PayrollController@prosesTariffMasterPY');
Route::post('payroll/salary_accumulation_data/proses', 'PayrollController@prosesSalaryAccumulationDataPY');
Route::post('payroll/import_data_from_excel/import', 'PayrollController@importDataFromExcelPY');
Route::post('payroll/import_data_from_excel_bonus_thr/import', 'PayrollController@importDataFromExcelBonusTHRPY');
Route::post('payroll/import_data_from_excel/template', 'PayrollController@templateImportDataFromExcelPY');
Route::post('payroll/thr_bonus_data_entry/proses', 'PayrollController@prosesTHRBonusDataEntryPY');
Route::post('payroll/thr_data_entry_proses/proses', 'PayrollController@prosesTHRDataEntryProcessPY');
Route::post('payroll/bonus_data_entry_proses/proses', 'PayrollController@prosesBonusDataEntryProcessPY');
Route::post('payroll/loan_master/proses', 'PayrollController@prosesLoanMasterPY');
Route::post('payroll/loan_data_entry/proses', 'PayrollController@prosesLoanDataEntryPY');
Route::post('payroll/full_partial_loan_payment/proses', 'PayrollController@prosesFullPartialLoanPaymentPY');
Route::post('payroll/thr_formula/proses', 'PayrollController@prosesTHRFormulaPY');
Route::post('payroll/bonus_formula/proses', 'PayrollController@prosesBonusFormulaPY');
Route::post('payroll/account/proses','PayrollController@prosesAccountPY');
Route::post('payroll/report_format/proses','PayrollController@prosesReportFormatPY');
Route::post('payroll/payroll_calculation/proses','PayrollController@prosesPayrollCalculationPY');
Route::post('payroll/multi_cost_center/proses','PayrollController@prosesMultiCostCenterPY');
Route::post('payroll/salary_component_data/proses', 'PayrollController@prosesSalaryComponentDataPY');
Route::post('payroll/salary_component_data_process/proses', 'PayrollController@prosesSalaryComponentDataProcessPY');
Route::post('payroll/reference_payroll/proses', 'PayrollController@prosesReferencePayrollPY');
Route::post('payroll/year_end_process/proses', 'PayrollController@prosesYearEndProcessPY');
Route::post('payroll/spt_process/proses', 'PayrollController@prosesSPTProcessPY');
Route::post('payroll/final_tax_process/proses', 'PayrollController@prosesFinalTaxProcessPY');
Route::post('payroll/journal_template/proses', 'PayrollController@prosesJournalTemplatePY');
Route::post('payroll/spt_format/proses', 'PayrollController@prosesSptFormatPY');
Route::post('payroll/slip_format/proses', 'PayrollController@prosesSlipFormatPY');
Route::post('payroll/slip_format/custom/proses', 'PayrollController@prosesSlipFormatCustomPY');
Route::post('payroll/slip_format/allowance/proses', 'PayrollController@prosesSlipFormatAllowancePY');
Route::post('payroll/slip_format/deduction/proses', 'PayrollController@prosesSlipFormatDeductionPY');
Route::post('payroll/monthly_closing_process/proses', 'PayrollController@prosesMonthlyClosingProcessPY');
Route::post('payroll/salary_calculation_process/proses', 'PayrollController@prosesSalaryCalculationProcessPY');
Route::post('payroll/tax_calculation_process/proses', 'PayrollController@prosesTaxCalculationProcessPY');
Route::post('payroll/absenteeism_overtime_calculation_process/proses', 'PayrollController@prosesAbsenteeismOvertimeCalculationProcessPY');
Route::post('payroll/monthly_system_closing/proses', 'PayrollController@prosesMonthlySystemClosingPY');
Route::post('payroll/monthly_periodical_update_process/proses', 'PayrollController@prosesMonthlyPeriodicalUpdateProcessPY');
Route::post('payroll/journal_process/proses', 'PayrollController@prosesJournalProcessPY');
Route::post('payroll/transfer_data/proses', 'PayrollController@prosesTransferDataPY');

/*Route untuk remove Payroll*/
Route::get('payroll/thr_bonus_data_entry/remove', 'PayrollController@removeTHRBonusDataEntryPY');
Route::get('payroll/severance_data_entry/remove', 'PayrollController@removeSeveranceDataEntryPY');
Route::get('payroll/thr_formula/remove', 'PayrollController@removeTHRFormulaPY');
Route::get('payroll/bonus_formula/remove', 'PayrollController@removeBonusFormulaPY');
Route::get('payroll/payroll_calculation/remove', 'PayrollController@removePayrollCalculationPY');
Route::get('payroll/multi_cost_center/remove', 'PayrollController@removeMultiCostCenterPY');
Route::get('payroll/spt_format/remove', 'PayrollController@removeSptFormatPY');
Route::get('payroll/loan_payment/remove', 'PayrollController@removeLoanPaymentPY');

/*Route untuk detail Data Payroll*/
Route::get('payroll/account/detail', 'PayrollController@dataAccountPY');
Route::get('payroll/salary_master/detail_data', 'PayrollController@dataDetailSalaryMasterPY');
Route::get('payroll/severance_data_entry/detail_data', 'PayrollController@dataDetailSeveranceDataEntryPY');
Route::get('payroll/tariff_master/detail_data', 'PayrollController@dataDetailTariffMasterPY');
Route::get('payroll/salary_accumulation_data/detail_data', 'PayrollController@dataDetailSalaryAccumulationDataPY');
Route::get('payroll/bonus_data_entry/detail_data', 'PayrollController@dataDetailBonusDataEntryPY');
Route::get('payroll/thr_data_entry/detail_data', 'PayrollController@dataDetailTHRDataEntryPY');
Route::get('payroll/loan_master/detail_data', 'PayrollController@dataDetailLoanMasterPY');
Route::get('payroll/loan_data_entry/detail_data', 'PayrollController@dataDetailLoanDataEntryPY');
Route::get('payroll/full_partial_loan_payment/detail_data', 'PayrollController@dataDetailFullPartialLoanPaymentPY');
Route::get('payroll/loan_payment/detail_data', 'PayrollController@dataDetailLoanPaymentPY');
Route::get('payroll/thr_formula/detail_data', 'PayrollController@dataDetailTHRFormulaPY');
Route::get('payroll/bonus_formula/detail_data', 'PayrollController@dataDetailBonusFormulaPY');
Route::get('payroll/multi_cost_center/detail', 'PayrollController@dataMultiCostCenterPY');
Route::get('payroll/report_format/detail_data', 'PayrollController@dataDetailReportFormatPY');
Route::get('payroll/payroll_calculation/detail', 'PayrollController@dataPayrollCalculationPY');
Route::get('payroll/salary_component_data/detail_data', 'PayrollController@dataDetailSalaryComponentDataPY');
Route::get('payroll/reference_payroll/data_detail', 'PayrollController@dataDetailReferencePayroll');
Route::get('payroll/full_partial_loan_payment/data', 'PayrollController@dataFullPartialLoanPaymentPY');
Route::get('payroll/journal_template/detail_data', 'PayrollController@dataDetailJournalTemplatePY');
Route::get('payroll/spt_format/detail_data', 'PayrollController@dataDetailSptFormatPY');
Route::get('payroll/slip_format/detail_data', 'PayrollController@dataDetailSlipFormatPY');
Route::get('payroll/transfer_data_to_bank/detail_data', 'PayrollController@dataDetailTransferDataToBankPY');

/* Route untuk status Payroll */
Route::get('payroll/loan_master/status', 'PayrollController@statusLoanMasterPY');
Route::get('payroll/account/status', 'PayrollController@statusAccountPY');
Route::get('payroll/report_format/status', 'PayrollController@statusReportFormatPY');
Route::get('payroll/payroll_calculation/status', 'PayrollController@statusPayrollCalculationPY');
Route::get('payroll/journal_template/status', 'PayrollController@statusJournalTemplatePY');

/* Route untuk number checker Payroll */
Route::get('payroll_loan_no/number/check', 'PayrollController@checkNumberLoanNoPY');
Route::get('payroll/report_format_number/check', 'PayrollController@checkNumberReportFormatPY');
Route::get('payroll/payroll_calculation_number/check', 'PayrollController@checkNumberPayrollCalculationPY');

/* Route untuk print payroll */
Route::post('payroll/dumtk/print', 'PayrollController@printDUMTKPayroll');
Route::post('payroll/dumtk/print/excel', 'PayrollController@printDUMTKPayrollExcel');
Route::post('payroll/severance_report/print', 'PayrollController@printSeveranceReportPayroll');
Route::post('payroll/severance_report/print/excel', 'PayrollController@printSeveranceReportPayrollExcel');
Route::post('payroll/journal_report/print', 'PayrollController@printJournalReportPayroll');
Route::post('payroll/journal_report/print/excel', 'PayrollController@printJournalReportPayrollExcel');
Route::get('payroll/payment_slip/get', 'PayrollController@getPaymentSlipPayroll');
Route::post('payroll/payment_slip/print', 'PayrollController@printPaymentSlipPayroll');
Route::post('payroll/salary_historical_report/print', 'PayrollController@printSalaryHistoricalReportPayroll');
Route::post('payroll/salary_historical_report/print/excel', 'PayrollController@printSalaryHistoricalReportPayrollExcel');
Route::post('payroll/csv_espt_report_form/print/excel', 'PayrollController@printCSVESPTReportFormPayrollExcel');
Route::post('payroll/bonus_thr_report/print', 'PayrollController@printBonusTHRReportPayroll');
Route::post('payroll/bonus_thr_report/print/excel', 'PayrollController@printBonusTHRReportPayrollExcel');
Route::post('payroll/spt_pph_1721a1_report/print', 'PayrollController@printSPTPPH1721a1ReportPayroll');
Route::post('payroll/spt_pph_1721a_report/print', 'PayrollController@printSPTPPH1721aReportPayroll');
Route::post('payroll/signature_list_report/print', 'PayrollController@printSignatureListReportPayroll');
Route::post('payroll/retroactive_report/excel/print', 'PayrollController@printRetroactiveReportPayrollExcel');
Route::post('payroll/retroactive_report/print', 'PayrollController@printRetroactiveReportPayroll');
Route::post('payroll/export_data_kepesertaan_bpjs_tk_report/print', 'PayrollController@printExportDataKepesertaanBPJSTKReportPayroll');
Route::post('payroll/loan_report/print', 'PayrollController@printLoanReportPayroll');
Route::post('payroll/export_data_kepesertaan_bpjs_tk_report/print/excel', 'PayrollController@printExportDataKepesertaanBPJSTKReportPayrollExcel');
Route::post('payroll/loan_report/print/excel', 'PayrollController@printLoanReportPayrollExcel');
Route::post('payroll/export_sipp_online_report/print', 'PayrollController@printLoanReportPayroll');
Route::post('payroll/annual_report/print', 'PayrollController@printAnnualReportPayroll');
Route::post('payroll/annual_report/print/excel', 'PayrollController@printAnnualReportPayrollExcel');
Route::post('payroll/loan_report/print', 'PayrollController@printLoanReportPayroll');
Route::post('payroll/loan_report/print/excel', 'PayrollController@printLoanReportPayrollExcel');
Route::post('payroll/periodical_report/print', 'PayrollController@printPeriodicalReportPayroll');
Route::post('payroll/periodical_report/excel/print', 'PayrollController@printPeriodicalReportPayrollExcel');
Route::post('payroll/export_sipp_online/print', 'PayrollController@printExportSIPPOnlinePayroll');
Route::post('payroll/spt_pph_report/print', 'PayrollController@printSPTPPHReportPayroll');
Route::post('payroll/spt_pph_report/print/excel', 'PayrollController@printSPTPPHReportPayrollExcel');
Route::post('payroll/monthly_jamsostek_report/print', 'PayrollController@printMonthlyJamsostekReportPayroll');

/* Route Untuk Menu Medical */
Route::get('medical', 'MedicalController@pageMedical')->name('medical');
/* Medical Maintenance Menu */
Route::get('medical/medical_reference', 'MedicalController@pageMedicalReference');
Route::get('medical/claim_code', 'MedicalController@pageClaimCode');
Route::get('medical/disease_code', 'MedicalController@pageDiseaseCode');
Route::get('medical/insurance_code', 'MedicalController@pageInsuranceCode');
Route::get('medical/insurance_class', 'MedicalController@pageInsuranceClass');
Route::get('medical/input_limit', 'MedicalController@pageInputLimit');
Route::get('medical/input_personnel_limit', 'MedicalController@pageInputPersonnelLimit');
Route::get('medical/input_personnel_limit_all_employee', 'MedicalController@pageInputPersonnelLimitAllEmployee');
Route::get('medical/treatment_eligibility', 'MedicalController@pageTreatmentEligibility');
Route::get('medical/claim_list', 'MedicalController@pageClaimList');
Route::get('medical/claim_transaction', 'MedicalController@pageClaimTransaction');
Route::get('medical/claim_payment_transaction', 'MedicalController@pageClaimPaymentTransaction');
Route::get('medical/medical_facility_used_report', 'MedicalController@pageMedicalFacilityUsedReport');
Route::get('medical/claim_payment_transaction_report_slip', 'MedicalController@pageClaimPaymentTransactionReport');
Route::get('medical/medical_claim_report', 'MedicalController@pageMedicalClaimReport');
Route::get('medical/remaining_medical_limit_report', 'MedicalController@pageRemainingMedicalLimitReport');
Route::get('medical/outstanding_claim_report', 'MedicalController@pageOutstandingClaimReport');
Route::get('medical/disease_report', 'MedicalController@pageDiseaseReport');
Route::get('medical/transfer_payment_to_excel/monthly', 'MedicalController@pageTransferPaymentToExcelMonthly');
Route::get('medical/transfer_payment_to_excel/remaining_limit', 'MedicalController@pageTransferPaymentToExcelRemainingLimit');

/* Route untuk tabel Medical */
Route::get('medical/claim_code/table', 'MedicalController@tableClaimCodeMD');
Route::get('medical/disease_code/table', 'MedicalController@tableDiseaseCodeMD');
Route::get('medical/insurance_code/table', 'MedicalController@tableInsuranceCodeMD');
Route::get('medical/insurance_class/table', 'MedicalController@tableInsuranceClassMD');
Route::get('medical/input_limit/table', 'MedicalController@tableInputLimitMD');
Route::get('medical/input_personnel_limit/table', 'MedicalController@tableInputPersonnelLimitMD');
Route::get('medical/treatment_eligibility/table', 'MedicalController@tableTreatmentEligibilityMD');
Route::get('medical/claim_transaction/table', 'MedicalController@tableClaimTransactionMD');

/* Route untuk Detail Tabel Transaction */
Route::get('transaction/list/table', 'TransactionController@tableDetailTransactionList');
Route::get('trans/medical_history/table', 'TransactionController@tableDetailTransactionMedical');
Route::get('trans/transport/table', 'TransactionController@tableDetailTransport');
Route::get('trans/reimbursement/table', 'TransactionController@tableDetailReimbursement');
Route::get('trans/attendance/table', 'TransactionController@tableDetailAttendance');
Route::get('trans/overtime/table', 'TransactionController@tableDetailOvertime');
Route::get('trans/businesstrip/table', 'TransactionController@tableDetailBusinesstrip');
Route::get('trans/workflow/table', 'TransactionController@tableDetailWorkflow');
Route::get('trans/update/table', 'TransactionController@tableUpdateTrans');
Route::get('trans/update_transport/table', 'TransactionController@tableUpdateTransTransport');
Route::get('trans/update_approvalbusinesstrip/table', 'TransactionController@tableUpdateApprovalBusinesstrip');
Route::get('trans/trans_active_document/detail_data', 'TransactionController@tableUpdateListBusinesstrip');
Route::get('trans/update_medical/table', 'TransactionController@tableUpdateTransMedical');
Route::get('trans/update_overtime/table', 'TransactionController@tableUpdateOvertime');
Route::get('adm/checkinlist/table', 'TransactionController@tableDetailCheckinList');
Route::get('adm/checkinlistmaps/table', 'TransactionController@tableDetailMapsCheckinList');
Route::get('adm/checkinlist_mapsall/table', 'TransactionController@tableDetailCheckinListAll');

Route::post('transaction/update_reimbursement/import', 'TransactionController@importUpdateReimbursement');
Route::post('transaction/update_transport/import', 'TransactionController@importUpdateTransport');
Route::post('transaction/update_medical/import', 'TransactionController@importUpdateMedical');
Route::post('transaction/update_overtime/import', 'TransactionController@importUpdateOvertime');
Route::post('transaction/update_businesstrip/import', 'TransactionController@importUpdateBusinesstrip');

/*Route untuk detail Data Medical*/
Route::get('medical/claim_code/detail_data', 'MedicalController@dataDetailClaimCodeMD');
Route::get('medical/disease_code/detail_data', 'MedicalController@dataDetailDiseaseCodeMD');
Route::get('medical/insurance_code/detail_data', 'MedicalController@dataDetailInsuranceCodeMD');
Route::get('medical/insurance_class/detail_data', 'MedicalController@dataDetailInsuranceClass');
Route::get('medical/input_limit/detail_data', 'MedicalController@dataDetailInputLimit');
Route::get('medical/input_personnel_limit/detail_data', 'MedicalController@dataDetailInputPersonnelLimit');
Route::get('medical/treatment_eligibility/detail_data', 'MedicalController@dataDetailTreatmentEligibility');
Route::get('medical/claim_transaction/detail_data', 'MedicalController@dataDetailClaimTransaction');

/*Route untuk Proses Medical*/
Route::post('medical/medical_reference/proses', 'MedicalController@prosesMedicalReferenceMD');
Route::post('medical/claim_code/proses', 'MedicalController@prosesClaimCodeMD');
Route::post('medical/disease_code/proses', 'MedicalController@prosesDiseaseCodeMD');
Route::post('medical/insurance_code/proses', 'MedicalController@prosesInsuranceCodeMD');
Route::post('medical/insurance_class/proses', 'MedicalController@prosesInsuranceClassMD');
Route::post('medical/input_limit/proses', 'MedicalController@prosesInputLimitMD');
Route::post('medical/input_personnel_limit/proses', 'MedicalController@prosesInputPersonnelLimitMD');
Route::post('medical/input_personnel_limit_all_employee/proses', 'MedicalController@prosesInputPersonnelLimitAllEmployeeMD');
Route::post('medical/treatment_eligibility/proses', 'MedicalController@prosesTreatmentEligibilityMD');
Route::post('medical/claim_list/proses', 'MedicalController@prosesClaimListMD');
Route::post('medical/claim_transaction/proses', 'MedicalController@prosesClaimTransactionMD');

Route::post('medical/medical_facility_used_report/print', 'MedicalController@printMedicalFacilityUsedReport');
Route::post('medical/medical_facility_used_report/print/excel', 'MedicalController@printMedicalFacilityUsedReportExcel');
Route::post('medical/claim_report/print', 'MedicalController@printClaimReport');
Route::post('medical/claim_report/print/excel', 'MedicalController@printClaimReportExcel');
Route::post('medical/remaining_medical_limit_report/print/excel', 'MedicalController@printRemainingMedicalLimitReportExcel');
Route::post('medical/disease_report/print', 'MedicalController@printDiseaseReport');
Route::post('medical/disease_report/print/excel', 'MedicalController@printDiseaseReportExcel');
Route::post('medical/claim_payment_transaction_report_slip/print/excel', 'MedicalController@printClaimPaymentTransactionReportSlipExcel');
Route::post('medical/outstanding_claim_report/print', 'MedicalController@printOutstandingClaimReport');
Route::post('medical/outstanding_claim_report/print/excel', 'MedicalController@printOutstandingClaimReportExcel');
Route::post('medical/transfer_payment_to_excel/monthly/print/excel', 'MedicalController@printTransferPaymentToExcelMonthlyExcel');
Route::post('medical/transfer_payment_to_excel/remaining_limit/print/excel', 'MedicalController@printTransferPaymentToExcelRemainingLimitExcel');

/* Route untuk status Medical */
Route::get('medical/claim_code/status', 'MedicalController@statusClaimCodeMD');
Route::get('medical/disease_code/status', 'MedicalController@statusDiseaseCodeMD');
Route::get('medical/insurance_code/status', 'MedicalController@statusInsuranceCodeMD');
Route::get('medical/insurance_class/status', 'MedicalController@statusInsuranceClassMD');
Route::get('medical/input_limit/status', 'MedicalController@statusInputLimitMD');
Route::get('medical/input_personnel_limit/status', 'MedicalController@statusInputPersonnelLimitMD');
Route::get('medical/treatment_eligibility/status', 'MedicalController@statusTreatmentEligibilityMD');

/* Route Untuk Menu Utilities */
Route::get('utilities', 'UtilitiesController@pageUtilitiesMain')->name('utilities');
Route::get('utilities/organization_chart', 'UtilitiesController@pageOrganizationStructureUtilities');
Route::get('utilities/user_security_maintenance', 'UtilitiesController@pageUserSecurityMaintenanceUtilities');
Route::get('utilities/menu_master', 'UtilitiesController@pageMenuMasterUtilities');
Route::get('utilities/group_authorization', 'UtilitiesController@pageAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access', 'UtilitiesController@pageUserAccessGroupUtilities');
Route::get('utilities/change_employee_no', 'UtilitiesController@pageChangeEmployeeNumberUtilities');
Route::get('utilities/user_log', 'UtilitiesController@pageUserLogUtilities');
Route::get('utilities/audit_trail', 'UtilitiesController@pageAuditTrailUtilities');
Route::get('utilities/export_personal_data', 'UtilitiesController@pageExportPersonalDataUtilities');
Route::get('utilities/dashboard_admin_ess', 'UtilitiesController@pageDashboardESSUtilities');
Route::get('utilities/news_master', 'UtilitiesController@pageNewsMasterUtilities');
Route::get('utilities/announcement', 'UtilitiesController@pageAnnouncementUtilities');
Route::get('utilities/company', 'UtilitiesController@pageCompanyUtilities');
Route::get('utilities/process_user_id', 'UtilitiesController@pageProcessUserIDUtilities');

Route::get('utilities/user_security_maintenance/table', 'UtilitiesController@tableUserSecurityMaintenanceUtilities');
Route::get('utilities/group_authorization/table', 'UtilitiesController@tableAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access/table', 'UtilitiesController@tableUserAccessGroupUtilities');
Route::get('utilities/user_log/table', 'UtilitiesController@tableUserLogUtilities');
Route::get('utilities/menu_master/table', 'UtilitiesController@tableMenuMasterUtilities');
Route::get('utilities/change_password/employee/table', 'UtilitiesController@tableChangeEmployeeNumberEmployeeUtilities');
Route::get('utilities/company/table', 'UtilitiesController@tableCompanyUtilities');

Route::get('utilities/group_authorization/detail_data', 'UtilitiesController@dataDetailAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access/detail_data', 'UtilitiesController@dataDetailUserAccessGroupUtilities');
Route::get('utilities/user_security_maintenance/detail_data', 'UtilitiesController@dataDetailUserSecurityMaintenanceUtilities');
Route::get('utilities/company/detail_data', 'UtilitiesController@dataDetailCompanyUtilities');

Route::get('utilities/user_security_maintenance/level/table', 'UtilitiesController@tableUserSecurityMaintenanceLevelUtilities');
Route::get('utilities/user_security_maintenance/company/table', 'UtilitiesController@tableUserSecurityMaintenanceCompanyUtilities');
Route::get('utilities/user_security_maintenance/module/table', 'UtilitiesController@tableUserSecurityMaintenanceModuleUtilities');
Route::get('utilities/user_security_maintenance/level_authorization/table', 'UtilitiesController@tableUserSecurityMaintenanceLevelAuthorizationUtilities');
Route::get('utilities/group_user_access/user/table', 'UtilitiesController@tableUserAccessGroupUserUtilities');
Route::get('utilities/menu_master/configure_menu/table', 'UtilitiesController@tableMenuMasterConfigureMenuUtilities');

Route::get('utilities/group_authorization/status', 'UtilitiesController@statusAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access/status', 'UtilitiesController@statusUserAccessGroupUtilities');
Route::get('utilities/user/status', 'UtilitiesController@statusUserUtilities');
Route::get('utilities/company/status', 'UtilitiesController@statusCompanyUtilities');

Route::post('utilities/group_authorization/proses', 'UtilitiesController@prosesAuthorizationCodeGroupUtilities');
Route::post('utilities/group_user_access/proses', 'UtilitiesController@prosesUserAccessGroupUtilities');
Route::post('utilities/menu_master/proses', 'UtilitiesController@prosesMenuMasterUtilities');
Route::post('utilities/menu_master/configure_menu/proses', 'UtilitiesController@prosesMenuMasterConfigureMenuUtilities');
Route::post('utilities/menu_master/copy_to_another_group/proses', 'UtilitiesController@prosesMenuMasterCopyToAnotherGroupUtilities');
Route::post('utilities/user/proses', 'UtilitiesController@prosesUserUtilities');
Route::post('utilities/user_security_maintenance/level/proses', 'UtilitiesController@prosesUserSecurityMaintenanceLevelUtilities');
Route::post('utilities/user_security_maintenance/company/proses', 'UtilitiesController@prosesUserSecurityMaintenanceCompanyUtilities');
Route::post('utilities/user_security_maintenance/module/proses', 'UtilitiesController@prosesUserSecurityMaintenanceModuleUtilities');
Route::post('utilities/change_employee_no/proses', 'UtilitiesController@prosesChangeEmployeeNumberUtilities');
Route::post('utilities/company/proses', 'UtilitiesController@prosesCompanyUtilities');
Route::post('utilities/process_user_id/proses', 'UtilitiesController@prosesProcessUserIDUtilities');

Route::post('utilities/audit_trail/export', 'UtilitiesController@exportAuditTrailUtilities');

Route::post('utilities/group_user_access/user/add', 'UtilitiesController@addUserAccessGroupUserUtilities');
Route::get('utilities/group_user_access/user/remove', 'UtilitiesController@removeUserAccessGroupUserUtilities');
Route::get('utilities/user_security_maintenance/module/remove', 'UtilitiesController@removeUserSecurityMaintenanceModuleUtilities');

/* Route Untuk Data Utilities - Organization Structure */
Route::get('utilities/organization_chart/get/position', 'OrganizationStructureController@getDataPosition');


/* Route Untuk Menu Export MOB */
Route::get('export', 'ExportController@pageExport');
Route::get('export/export_medical', 'ExportController@pageExportMedical');
Route::get('export/export_reimbursement', 'ExportController@pageExportReimbursement');
Route::get('export/export_workflow', 'ExportController@pageExportWorkflow');
Route::get('export/export_transport', 'ExportController@pageExportTransport');
Route::get('export/export_attendance', 'ExportController@pageExportAttendance');
Route::get('export/export_business_trip', 'ExportController@pageExportBusinessTrip');
Route::get('export/export_overtime', 'ExportController@pageExportOvertime');
Route::get('export/export_pdf_business_trip', 'ExportController@pageExportPDFBusinessTrip');
Route::get('export/export_business_trip_checking', 'ExportController@pageExportBusinessTripChecking');


Route::post('export/export_workflow/print', 'ExportController@printExportWorkflow');
Route::post('export/export_medical/print', 'ExportController@printExportMedical');
Route::post('export/export_reimbursement/print', 'ExportController@printExportReimbursement');
Route::post('export/export_transport/print', 'ExportController@printExportTransport');
Route::post('export/export_overtime/print', 'ExportController@printExportOvertime');
Route::post('export/export_businesstrip/print', 'ExportController@printExportBusinessTrip');
Route::post('export/export_businesstrip_pdf/print', 'ExportController@printExportBusinessTripPDF');
Route::post('export/business_trip_checking/print', 'ExportController@printExportBusinessTripChecking');
Route::post('export_attendance/print', 'ExportController@printAttendanceExport');

/* Route Untuk Proses Menu Export MOB */
Route::post('export/company_working_calendar/proses','ExportController@prosesCompanyWorkingCalendar');

/* Route untuk Menu Transaction MOB */
Route::get('transaction', 'TransactionController@pageTransaction')->name('transaction');
Route::get('transaction/transaction_reimbursement', 'TransactionController@pageTransactionReimbursement');
Route::get('transaction/transaction_mass_leave', 'TransactionController@pageTransactionMassLeave');
Route::get('transaction/transaction_workflow', 'TransactionController@pageTransactionWorkflow');
Route::get('transaction/transaction_transport', 'TransactionController@pageTransactionTransport');
Route::get('transaction/transaction_medical_history', 'TransactionController@pageTransactionMedicalHistory');
Route::get('transaction/transaction_attendance', 'TransactionController@pageTransactionAttendance');
Route::get('transaction/transaction_business_trip', 'TransactionController@pageTransactionBusinessTrip');
Route::get('transaction/transaction_overtime', 'TransactionController@pageTransactionOvertime');
Route::get('transaction/transaction_active_document', 'TransactionController@pageTransactionActiveDocument');
Route::post('transaction/transaction_active_document/proses', 'TransactionController@prosesTransactionActiveDocument');
Route::get('transaction/checkin_list', 'TransactionController@pageTransactionCheckinList');
Route::get('transaction/mapscheckin_list', 'TransactionController@pageTransactionMapsCheckinList');

/* Route untuk Menu Master Data MOB */
Route::get('master_data', 'MasterDataController@pageMasterData');
Route::get('master_data/employee_master', 'MasterDataController@pageMasterDataEmployeeMaster');
Route::get('master_data/employee_group_permit', 'MasterDataController@pageMasterDataEmployeeGroup');
Route::get('master_data/employee_group_leave', 'MasterDataController@pageMasterDataEmployeeGroupLeave');
Route::get('master_data/employee_group_overtime', 'MasterDataController@pageMasterDataEmployeeGroupOvertime');
Route::get('master_data/employee_group_detail', 'MasterDataController@pageMasterDataEmployeeGroupDetail');
Route::get('master_data/employee_group_multiple_checkin', 'MasterDataController@pageMasterDataEmployeeGroupMultipleCheckin');
Route::get('master_data/employee_group_reimbursement', 'MasterDataController@pageMasterDataEmployeeGroupReimbursement');
Route::get('master_data/employee_group_reimbursement_detail', 'MasterDataController@pageMasterDataEmployeeGroupReimbursementDetail');
Route::get('master_data/holiday_calender', 'MasterDataController@pageMasterDataHolidayCalender');
Route::get('master_data/bussines_trip', 'MasterDataController@pageMasterDataBussinesTrip');
Route::get('master_data/bussines_trip_detail', 'MasterDataController@pageMasterDataBussinesTripDetail');
Route::get('master_data/list/table', 'MasterDataController@tabelDetailEmployee');
Route::get('master_data/employee_list/table', 'MasterDataController@tabelDetailEmployeeMaster');
Route::get('master_data_leave/list/table', 'MasterDataController@tabelDetailEmployeeLeave');
Route::get('master_data_overtime/list/table', 'MasterDataController@tabelDetailEmployeeOvertime');
Route::get('master_data/list_reimbursement/table', 'MasterDataController@tabelDetailReimbursement');
Route::get('master_data/employee_group_multiple_checkin/table', 'MasterDataController@tabelEmployeeGroupMultipleCheckin');
Route::get('master_data/list_businesstrip/table', 'MasterDataController@tabelDetailBusinessTrip');
Route::get('master_data/list_detail/table', 'MasterDataController@tabelDetailEmployeeGroup');
Route::get('master_data/list_email/table', 'MasterDataController@tabelDetailEmail');
Route::get('master_data/direct_approval/table', 'MasterDataController@tableDirectApproval');
Route::get('master_data/employee_group_detail/table', 'MasterDataController@tableEmployeeGroupDetail');
Route::get('master_data/tambah_user/table', 'MasterDataController@tableEmployeeGroupTambahUser');
Route::get('master_data/holiday_calendar/table', 'MasterDataController@tableHolidayCalendar');
Route::get('master_data/email_settings/table', 'MasterDataController@tableEmailSettings');
Route::get('master_data/get', 'MasterDataController@getMasterData');
Route::get('master_data/employee_master/get', 'MasterDataController@getEmployeeMasterData');
Route::get('master_data/employee_group_detail/get', 'MasterDataController@getMasterDataEmployeeGroupDetail');
Route::get('master_data/leave/get', 'MasterDataController@getLeaveMasterData');
Route::get('master_data/overtime/get', 'MasterDataController@getOvertimeMasterData');
Route::get('master_data/detail/get', 'MasterDataController@getDetailMasterData');
Route::get('master_data/reimbursement/get', 'MasterDataController@getReimbursementMasterData');
Route::get('master_data/holiday_calendar/get', 'MasterDataController@getHolidayCalendarMasterData');
Route::get('master_data/business_trip/get', 'MasterDataController@getBusinessTripMasterData');
Route::post('master_data/employee_group/proses', 'MasterDataController@prosesEmployeeGroup');
Route::post('master_data/employee_group_leave/proses', 'MasterDataController@prosesEmployeeGroupLeave');
Route::post('master_data/employee_group_overtime/proses', 'MasterDataController@prosesEmployeeGroupOvertime');
Route::post('master_data/employee_reimbursement/proses', 'MasterDataController@prosesEmployeeReimbursement');
Route::post('master_data/holiday_calendar/proses', 'MasterDataController@prosesEmployeeHolidayCalendar');
Route::post('master_data/employee_businesstrip/proses', 'MasterDataController@prosesEmployeeBusinessTrip');
Route::post('master_data/employee_group_detail/proses', 'MasterDataController@prosesEmployeeGroupDetail');
Route::post('master_data/employee_group_multiple_checkin/select_level', 'MasterDataController@selectLevelEmployeeGroupMultipleCheckin');
Route::post('master_data/employee_group_multiple_checkin/proses', 'MasterDataController@prosesEmployeeGroupMultipleCheckin');

/* Route untuk Menu Admin MOB */
Route::get('admin_menu', 'AdminMenuController@pageAdminMenu');
Route::get('admin_menu/user_master', 'AdminMenuController@pageAdminMenuUserMaster');
Route::get('admin_menu/user_group', 'AdminMenuController@pageAdminMenuUserGroup');
Route::get('admin_menu/menu_master', 'AdminMenuController@pageAdminMenuMaster');
Route::get('admin_menu/checkin_list', 'AdminMenuController@pageAdminMenuCheckinList');
Route::get('admin_menu/news_master', 'AdminMenuController@pageAdminMenuNewsMaster');
Route::get('maps/location', 'AdminMenuController@pageMaps');
Route::get('mapsall/location', 'AdminMenuController@pageMapsAll');
Route::get('adm_main_menu/news_master/list', 'AdminMenuController@pageAdminNewsList');
Route::get('admin_menu/news_master/remove', 'AdminMenuController@pageNewsMasterRemove');
Route::post('admin_menu/news_master/proses', 'AdminMenuController@pageAdminMenuNews');
Route::get('adm_main_menu/announcement/list', 'AdminMenuController@listAnnouncementAdminMenu');
Route::post('admin_menu/announcement/proses', 'AdminMenuController@prosesAnnouncementAdminMenu');

/* Route Untuk Change Password */
Route::get('change_password', 'ChangePasswordController@pageChangePassword');
Route::post('change_password/proses', 'ChangePasswordController@prosesChangePassword');

/* Route Untuk Change Language */
Route::post('change_language/proses', 'LanguagesController@prosesChangeLanguage');

/* Route Untuk Set Languange */
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguagesController@switchLang']);

/* Route Untuk Dropdown Form API */
Route::get('gender/api', 'DataController@dataGenderAPI');
Route::get('blood/api', 'DataController@dataBloodAPI');
Route::get('marital_status/api', 'DataController@dataMaritalStatusAPI');
Route::get('nationality/api', 'DataController@dataNationalityAPI');
Route::get('driving_license_car_type/api', 'DataController@dataDrivingLicenseCarTypeAPI');
Route::get('relation/api', 'DataController@dataRelationAPI');
Route::get('termination_code/api', 'DataController@dataTerminationCodeAPI');
Route::get('benefits/api', 'DataController@dataBenefitsAPI');
Route::get('tax_status/api', 'DataController@dataTaxStatusAPI');
Route::get('tax_office/api', 'DataController@dataTaxOfficeAPI');
Route::get('tax_calculation_method/api', 'DataController@dataTaxCalculationMethodAPI');
Route::get('absenteeism_type/api', 'DataController@dataAbsenteeismTypeAPI');
Route::get('absenteeism_type/func/api', 'DataController@dataAbsenteeismTypeFuncAPI');
Route::get('currency/api', 'DataController@dataCurrencyAPI');
Route::get('currency/func/api', 'DataController@dataCurrencyFunctionAPI');
Route::get('zip_code/api', 'DataController@dataZipCodeAPI');
Route::get('zip_code/personal_data/api', 'DataController@dataZipCodePersonalDataAPI');
Route::get('district/api', 'DataController@dataDistrictAPI');
Route::get('district/personal_data/api', 'DataController@dataDistrictPersonalDataAPI');
Route::get('subdistrict/api', 'DataController@dataSubdistrictAPI');
Route::get('work_pattern_code/api', 'DataController@dataWorkPatternCodeAPI');
Route::get('work_pattern/personal_data/api', 'DataController@dataWorkPatternPersonalDataAPI');
Route::get('company_bank_code/api', 'DataController@dataCompanyBankCodeAPI');
Route::get('company_bank_code/personal_data/api', 'DataController@dataCompanyBankCodePersonalDataAPI');
Route::get('employee_bank_code/api', 'DataController@dataEmployeeBankCodeAPI');
Route::get('employee_bank_code/personal_data/api', 'DataController@dataEmployeeBankCodePersonalDataAPI');
Route::get('religion/api', 'DataController@dataReligionAPI');
Route::get('religion/all/api', 'DataController@dataReligionAllAPI');
Route::get('religion/func/api', 'DataController@dataReligionFunctionAPI');
Route::get('religion_code/api', 'DataController@dataReligionCodeAPI');
Route::get('reimbursement_type/api', 'DataController@dataReimbursementTypeAPI');
Route::get('reimbursement_type/medical/api', 'DataController@dataReimbursementTypeMedicalAPI');
Route::get('reimbursement_type/export/api', 'DataController@dataReimbursementTypeExportAPI');
// buat bikin select ALL     
Route::get('reimbursement_type/all/api', 'DataController@dataReimbursementTypeAllAPI');
Route::get('reimbursement_type/medical/all/api', 'DataController@dataReimbursementTypeMedicalAllAPI');
Route::get('reimbursement_type/reimbursement/api', 'DataController@dataReimbursementTypeReimbursementAPI');
Route::get('reimbursement_type/reimbursement/func/api', 'DataController@dataReimbursementTypeReimbursementFunctionAPI');
Route::get('news_category/api', 'DataController@dataNewsCategory');
Route::get('news_category/detail/api', 'DataController@dataNewsCategoryDetail');
Route::get('announcement_category/api', 'DataController@dataAnnouncementCategory');
Route::get('announcement_category/detail/api', 'DataController@dataAnnouncementCategoryDetail');
Route::get('reimbursement_type_medical/all/api', 'DataController@dataReimbursementTypeMedicalFunctionAPI');
Route::get('transport_type/all/api', 'DataController@dataTransportAll');
Route::get('travel_type/all/api', 'DataController@dataTravelTypeAllAPI');
// diatas buat bikin select ALL
Route::get('reimbursement_type/transport/api', 'DataController@dataReimbursementTypeTransportAPI');
Route::get('reimbursement_type/transport/func/api', 'DataController@dataReimbursementTypeTransportFunctionAPI');
Route::get('transport_type/api', 'DataController@dataTransportType');
Route::get('reimbursement_type/transport/all/api', 'DataController@dataReimbursementTypeTransportAllAPI');
Route::get('reimbursement_type/overtime/api', 'DataController@dataReimbursementTypeOvertimeAPI');
Route::get('reimbursement_type/overtime_all/api', 'DataController@dataReimbursementOvertimeAPI');
Route::get('business_unit/function/api', 'DataController@dataBusinessUnitFunctionAPI');
Route::get('travel_type/api', 'DataController@dataTravelTypeAPI');
// Route::get('reimbursement_type/overtime/api', 'DataController@dataReimbursementOvertimeAPI');
Route::get('workflow/api', 'DataController@dataWorkFlowAPI');
Route::get('status/api', 'DataController@dataStatusAPI');
Route::get('status/func/api', 'DataController@dataStatusFunctionAPI');
Route::get('status_trans/api', 'DataController@dataStatusTransactionAPI');
Route::get('leave_type/api', 'DataController@dataLeaveTypeAPI');
Route::get('leave_type/func/api', 'DataController@dataLeaveTypeFunctionAPI');
Route::get('submit_type/api', 'DataController@dataSubmitTypeAPI');
Route::get('employee_no/api', 'DataController@dataEmployeeNoAPI');
Route::get('employee_no/api2', 'DataController@dataEmployeeNoAPI2');
Route::get('employee_no/req/api2', 'DataController@dataEmployeeNoReqAPI2');
Route::get('employee_no/func/api', 'DataController@dataEmployeeNoFunctionAPI');
Route::get('employee_no/req_detail/api', 'DataController@dataEmployeeNoReqDetailAPI');
Route::get('employee_no_term_date/api', 'DataController@dataEmployeeNoTermDateNotNullAPI');
Route::get('employee_no_full_partial_loan_payment/api', 'DataController@dataEmployeeNoFullPartialLoanPaymentAPI');
Route::get('employee_no_loan_payment/api', 'DataController@dataEmployeeNoLoanPaymentAPI');
Route::get('company/api', 'DataController@dataCompanyAPI');
Route::get('company_under_holding/api', 'DataController@dataCompanyUnderHoldingAPI');
Route::get('company/detail/api', 'DataController@dataCompanyDetailAPI');
Route::get('session_company/api', 'DataController@dataSessionCompanyAPI');
Route::post('session_company/change', 'DataController@changeSessionCompanyAPI');
Route::get('module/api', 'DataController@dataModuleAPI');
Route::get('group_authorize/api', 'DataController@dataGroupAuthorizeAPI');
Route::get('group_authorize/func/api', 'DataController@dataGroupAuthorizeFunctionAPI');
Route::get('group_authorize/group/api', 'DataController@dataGroupAuthorizeGroupAPI');
Route::get('group_authorize/personal_data/api', 'DataController@dataGroupAuthorizePersonalDataAPI');
Route::get('position/api', 'DataController@dataPositionAPI');
Route::get('position/detail/api', 'DataController@dataPositionDetailAPI');
Route::get('position/all/api', 'DataController@dataPositionAllAPI');
Route::get('position/func/api', 'DataController@dataPositionFunctionAPI');
Route::get('supervisor/position/api', 'DataController@dataSupervisorPositionAPI');
Route::get('employee_no/position/api', 'DataController@dataEmployeeNoPositionAPI');
Route::get('employee_no/supervisor/position/api', 'DataController@dataEmployeeNoSupervisorPositionAPI');
Route::get('level_type/api', 'DataController@dataLevelTypeAPI');
Route::get('level_type/type/api', 'DataController@dataLevelTypeTypeAPI');
Route::get('group_user_access/api', 'DataController@dataUserAccessGroupAPI');
Route::get('group_user_access/id/api', 'DataController@dataUserAccessGroupIDAPI');
Route::get('user/api', 'DataController@dataUserAPI');
Route::get('user_detail/api', 'DataController@dataUserDetailAPI');
Route::get('decree/api', 'DataController@dataDecreeAPI');
Route::get('sanction/api', 'DataController@dataSanctionAPI');
Route::get('education/api', 'DataController@dataEducationAPI');
Route::get('institution/api', 'DataController@dataInstitutionAPI');
Route::get('major/api', 'DataController@dataMajorAPI');
Route::get('education_status/api', 'DataController@dataEducationStatusAPI');
Route::get('title/api', 'DataController@dataTitleAPI');
Route::get('city/api', 'DataController@dataCityAPI');
Route::get('city/personal_data/api', 'DataController@dataCityPersonalDataAPI');
Route::get('language/api', 'DataController@dataLanguageAPI');
Route::get('proficiency/api', 'DataController@dataProficiencyAPI');
Route::get('skill/api', 'DataController@dataSkillAPI');
Route::get('table/log/api', 'DataController@dataTableLogAPI');
Route::get('detail_field/api', 'DataController@dataDetailFieldAPI');
Route::get('letter_type/api', 'DataController@dataLetterTypeAPI');
Route::get('module/user_security_maintenance/api', 'DataController@dataModuleUserSecurityMaintenanceAPI');
Route::get('location/api', 'DataController@dataLocationAPI');
Route::get('location/detail/api', 'DataController@dataLocationDetailAPI');
Route::get('location/all/api', 'DataController@dataLocationAllAPI');
Route::get('location/func/api', 'DataController@dataLocationFunctionAPI');
Route::get('holding_company/api', 'DataController@dataHoldingCompanyAPI');
Route::get('holding_company/detail/api', 'DataController@dataHoldingCompanyDetailAPI');
Route::get('ranking/api', 'DataController@dataRankingAPI');
Route::get('ranking/detail/api', 'DataController@dataRankingDetailAPI');
Route::get('ranking/all/api', 'DataController@dataRankingAllAPI');
Route::get('ranking/func/api', 'DataController@dataRankingFunctionAPI');
Route::get('level/api', 'DataController@dataLevelAPI');
Route::get('level/detail/api', 'DataController@dataLevelDetailAPI');
Route::get('level/all/api', 'DataController@dataLevelAllAPI');
Route::get('level/func/api', 'DataController@dataLevelFunctionAPI');
Route::get('level/select/func/api', 'DataController@dataLevelSelectFunctionAPI');
Route::get('evaluation_form/api', 'DataController@dataEvaluationFormAPI');
Route::get('evaluation_form/detail/api/{formCode}', 'DataController@dataEvaluationFormDetailAPI');
Route::get('grade/api', 'DataController@dataGradeAPI');
Route::get('grade/func/api', 'DataController@dataGradeFunctionAPI');
Route::get('grade/detail/api', 'DataController@dataGradeDetailAPI');
Route::get('group/api', 'DataController@dataGroupAPI');
Route::get('group/detail/api', 'DataController@dataGroupDetailAPI');
Route::get('nature_of_work/api', 'DataController@dataNatureofWorkAPI');
Route::get('nature_of_work/detail/api', 'DataController@dataNatureofWorkDetailAPI');
Route::get('free_format_field/api', 'DataController@dataFreeFormatFieldAPI');
Route::get('free_format_field/detail/api', 'DataController@dataFreeFormatFieldDetailAPI');
Route::get('employment_status/all/api', 'DataController@dataEmploymentStatusAllAPI');
Route::get('employment_status/func/api', 'DataController@dataEmploymentStatusFunctionAPI');
Route::get('employment/status/api', 'DataController@dataEmploymentStatusAPI');
Route::get('employment/type/api', 'DataController@dataEmploymentTypeAPI');
Route::get('mutation/type/api', 'DataController@dataMutationTypeAPI');
Route::get('termination/reason/api', 'DataController@dataTerminationReasonAPI');
Route::get('npwp/api', 'DataController@dataNPWPAPI');
Route::get('npwp/personal_data/api', 'DataController@dataNPWPPersonalDataAPI');
Route::get('bpjs/api', 'DataController@dataBPJSAPI');
Route::get('bpjs/func/api', 'DataController@dataBPJSFunctionAPI');
Route::get('bpjs/personal_data/api', 'DataController@dataBPJSPersonalDataAPI');
Route::get('cost_center/api', 'DataController@dataCostCenterAPI');
Route::get('cost_center/func/api', 'DataController@dataCostCenterFunctionAPI');
Route::get('cost_center/all/api', 'DataController@dataCostCenterAllAPI');
Route::get('field_name/api', 'DataController@dataFieldNameListAPI');
Route::get('calendar_type/api', 'DataController@dataCompanyWorkingCalendarAPI');
Route::get('calendar_type/edit/api', 'DataController@dataCalendarTypeAPI');
Route::get('shift_code/api', 'DataController@dataShiftAPI');
Route::get('shift_code/func/api', 'DataController@dataShiftCodeFunctionAPI');
Route::get('leave_code/api', 'DataController@dataLeaveCodeAPI');
Route::get('absent_code/api', 'DataController@dataAbsentCodeAPI');
Route::get('absent_code/func/api', 'DataController@dataAbsentCodeFunctionAPI');
Route::get('code/api', 'DataController@dataCodeAPI');
Route::get('day_code/api', 'DataController@dataDayCodeAPI');
Route::get('day_code/func/api', 'DataController@dataDayCodeFunctionAPI');
Route::get('insurance_class/api', 'DataController@dataInsuranceClassAPI');
Route::get('insurance_code/api', 'DataController@dataInsuranceCodeAPI');
Route::get('insurance_class/func2/api', 'DataController@dataInsuranceClassFunction2API');
Route::get('insurance_code/func2/api', 'DataController@dataInsuranceCodeFunction2API');
Route::get('comgen/api', 'DataController@dataComGenAPI');
Route::get('shift_master_code/api', 'DataController@dataShiftMasterCodeAPI');
Route::get('shift_master_code/func/api', 'DataController@dataShiftMasterCodeFunctionAPI');
Route::get('performance_result/api', 'DataController@dataPerformanceResultAPI');
Route::get('performance_result/bonus_thr_data_entry/api', 'DataController@dataPerformanceResultBonusTHRAPI');
Route::get('process_status/api', 'DataController@dataProcessStatusAPI');
Route::get('process_status/detail/api', 'DataController@dataProcessStatusDetailAPI');
Route::get('deduct_day/api', 'DataController@dataDeductDayAPI');
Route::get('field/api', 'DataController@dataFieldAPI');
Route::get('field/slip/api', 'DataController@dataFieldSlipAPI');
Route::get('deduct_leave/api', 'DataController@dataDeductLeaveAPI');
Route::get('deduct_leave/func/api', 'DataController@dataDeductLeaveFuncAPI');
Route::get('loan_code/api', 'DataController@dataLoanCodeAPI');
Route::get('loan_code/func/api', 'DataController@dataLoanCodeFuncAPI');
Route::get('field_name_salary_component/api', 'DataController@dataFieldNameSalaryComponentAPI');
Route::get('employee_no/severance/api', 'DataController@dataEmployeeNoSeveranceAPI');
Route::get('employee_no/loan_data_entry/api', 'DataController@dataEmployeeNoLoanDataEntryAPI');
Route::get('loan_code/loan_data_entry/api', 'DataController@dataLoanCodeLoanDataEntryAPI');
Route::get('currency_code/loan_data_entry/api', 'DataController@dataCurrencyCodeLoanDataEntryAPI');
Route::get('currency_code_full_partial_loan_payment/api', 'DataController@dataCurrencyCodeFullPartialLoanPaymentAPI');
Route::get('field_name_edit_salary_component/api', 'DataController@dataEditFieldNameSalaryComponentAPI');
Route::get('employee_no_slip_format/api', 'DataController@dataEmployeeNoSlipFormatAPI');
Route::get('attachment_code/api', 'DataController@dataAttachmentCodeAPI');
Route::get('payment_method_full_partial_loan_payment/api', 'DataController@dataPaymentMethodFullPartialLoanPaymentAPI');
Route::get('column/api', 'DataController@dataColumnAPI');
Route::get('medical_limit_type/api', 'DataController@dataMedicalLimitTypeAPI');
Route::get('medical_limit_type/func/api', 'DataController@dataMedicalLimitTypeFunctionAPI');
Route::get('limit_eligible/api', 'DataController@dataLimitEligibleAPI');
Route::get('limit_eligible/func/api', 'DataController@dataLimitEligibleFunctionAPI');
Route::get('minimum_service_length/api', 'DataController@dataMinimumServiceLengthAPI');
Route::get('minimum_service_length/func/api', 'DataController@dataMinimumServiceLengthFunctionAPI');
Route::get('default_medical_payment_bank_type/api', 'DataController@dataDefaultMedicalPaymentBankTypeAPI');
Route::get('default_medical_payment_bank_type/func/api', 'DataController@dataDefaultMedicalPaymentBankTypeFunctionAPI');
Route::get('rate_type/api', 'DataController@dataRateTypeAPI');
Route::get('rate_type/func/api', 'DataController@dataRateTypeFunctionAPI');
Route::get('rounding_method/api', 'DataController@dataRoundingMethodAPI');
Route::get('rounding_method/func/api', 'DataController@dataRoundingMethodFunctionAPI');
Route::get('account/api', 'DataController@dataAccountAPI');
Route::get('account_edit/api', 'DataController@dataEditAccountAPI');
Route::get('claim_code/api', 'DataController@dataClaimCodeAPI');
Route::get('claim_code/func/api', 'DataController@dataClaimCodeFunctionAPI');
Route::get('claim_code/func2/api', 'DataController@dataClaimCodeFunction2API');
Route::get('report_format/api', 'DataController@dataReportFormatAPI');
Route::get('claim_to/api', 'DataController@dataClaimToAPI');
Route::get('claim_to/func/api', 'DataController@dataClaimToFunctionAPI');
Route::get('claim_for/api', 'DataController@dataClaimForAPI');
Route::get('claim_for/func/api', 'DataController@dataClaimForFunctionAPI');
Route::get('dependents/api', 'DataController@dataDependentsAPI');
Route::get('dependents/func/api', 'DataController@dataDependentsFunctionAPI');
Route::get('disease_code/api', 'DataController@dataDiseaseCodeAPI');
Route::get('disease_code/func/api', 'DataController@dataDiseaseCodeFunctionAPI');
Route::get('disease_code/func2/api', 'DataController@dataDiseaseCodeFunction2API');
Route::get('report_code/api', 'DataController@dataReportCodeAPI');
Route::get('employee_company_code/api', 'DataController@dataEmployeeCompanyCodeAPI');
Route::get('employee/status/api', 'DataController@dataEmployeeStatusAPI');
Route::get('employee/status/all/api', 'DataController@dataEmployeeStatusAllAPI');
Route::get('office_location/api', 'DataController@dataOfficeLocationAPI');
Route::get('office_location/func/api', 'DataController@dataOfficeLocationFunctionAPI');
Route::get('output_file/api', 'DataController@dataOutputFileAPI');
Route::get('sasa', 'DataController@dataBusinessUnitAPI');
Route::get('leave_hour/api', 'DataController@dataLeaveHourAPI');

/* Route Untuk Save Token Device dan Notification Firebase */
Route::get('save-token', 'DashboardController@saveToken');
Route::get('send-notification', 'DashboardController@sendNotification');

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});