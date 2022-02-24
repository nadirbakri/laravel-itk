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
Route::get('calendar/event', 'DashboardController@getEventCalendar');

/* Route Untuk Menu Personel */
Route::get('personel', 'PersonelController@pagePersonelMain');
Route::get('personel/personal_data', 'PersonelController@pagePersonalDataPersonel');
Route::get('personel/performance', 'PersonelController@pagePerformancePersonel');
Route::get('personel/work_detail', 'PersonelController@pageWorkDetailPersonel');
Route::get('personel/competency', 'PersonelController@pageCompetencyPersonel');
Route::get('personel/other_information', 'PersonelController@pageOtherInformationPersonel');
Route::get('personel/payroll_data', 'PersonelController@pagePayrollDataPersonel');
Route::get('personel/employee_approval', 'PersonelController@pageEmployeeApprovalPersonel');
Route::get('personel/employee_attachment', 'PersonelController@pageEmployeeAttachmentPersonel');
Route::get('personel/import_export_personal_data', 'PersonelController@pageImportExportPersonel');
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
Route::get('personel/cost_center', 'PersonelController@pageCostCenterCodePersonel');
Route::get('personel/location', 'PersonelController@pageLocationCodePersonel');
Route::get('personel/position', 'PersonelController@pagePositionPersonel');
Route::get('personel/ranking', 'PersonelController@pageRankingPersonel');
Route::get('personel/grade', 'PersonelController@pageGradeCodePersonel');
Route::get('personel/group', 'PersonelController@pageGroupPersonel');
Route::get('personel/nature_of_work', 'PersonelController@pageNatureofWorkPersonel');
Route::get('personel/bpjs_group', 'PersonelController@pageBPJSGroupPersonel');
Route::get('personel/npwp_group', 'PersonelController@pageNPWPGroupPersonel');
Route::get('personel/bank', 'PersonelController@pageBankPersonel');
Route::get('personel/company_bank', 'PersonelController@pageCompanyBankPersonel');
Route::get('personel/source_bank', 'PersonelController@pageSourceBankPersonel');
Route::get('personel/transfer_bank', 'PersonelController@pageTransferBankPersonel');
Route::get('personel/currency_code', 'PersonelController@pageCurrencyCodePersonel');
Route::get('personel/rate_type', 'PersonelController@pageRateTypePersonel');
Route::get('personel/exchange_rate', 'PersonelController@pageExchangeRatePersonel');
Route::get('personel/education_code', 'PersonelController@pageEducationCodePersonel');
Route::get('personel/education_status_code', 'PersonelController@pageEducationStatusCodePersonel');
Route::get('personel/institution', 'PersonelController@pageInstitutionPersonel');
Route::get('personel/major', 'PersonelController@pageMajorPersonel');
Route::get('personel/type_of_course', 'PersonelController@pageTypeofCoursePersonel');
Route::get('personel/language_code', 'PersonelController@pageLanguageCodePersonel');
Route::get('personel/language_ability_code', 'PersonelController@pageLanguageAbilityCodePersonel');
Route::get('personel/city', 'PersonelController@pageCityPersonel');
Route::get('personel/zip', 'PersonelController@pageZipCodePersonel');
Route::get('personel/insurance_code', 'PersonelController@pageInsuranceCodePersonel');
Route::get('personel/insurance_class_code', 'PersonelController@pageInsuranceClassCodePersonel');
Route::get('personel/termination_code', 'PersonelController@pageTerminationCodePersonel');
Route::get('personel/decree_code', 'PersonelController@pageDecreeCodePersonel');
Route::get('personel/sanction_code', 'PersonelController@pageSanctionCodePersonel');
Route::get('personel/evaluation_form', 'PersonelController@pageEvaluationFormPersonel');
Route::get('personel/title', 'PersonelController@pageTitlePersonel');
Route::get('personel/nationality_code', 'PersonelController@pageNationalityCodePersonel');
Route::get('personel/religion_code', 'PersonelController@pageReligionCodePersonel');
Route::get('personel/line_of_business', 'PersonelController@pageLineofBusinessPersonel');
Route::get('personel/fringe_benefits_code', 'PersonelController@pageFringeBenefitsCodePersonel');
Route::get('personel/final_performance_result', 'PersonelController@pageFinalPerformanceResultPersonel');
Route::get('personel/skill', 'PersonelController@pageSkillPersonel');
Route::get('personel/attachment_code', 'PersonelController@pageAttachmentCodePersonel');
Route::get('personel/free_format_field', 'PersonelController@pageFreeFormatFieldPersonel');
Route::get('personel/format_report', 'PersonelController@pageFormatReportPersonel');
Route::get('personel/relation_code', 'PersonelController@pageRelationCodePersonel');
Route::get('personel/employee_list', 'PersonelController@pageEmployeeListPersonel');
Route::get('personel/employee_report_by_status', 'PersonelController@pageEmployeeReportByStatusPersonel');
Route::get('personel/employee_dependents', 'PersonelController@pageEmployeeDependentsPersonel');
Route::get('personel/employee_card', 'PersonelController@pageEmployeeCardPersonel');
Route::get('personel/custom_report_employee', 'PersonelController@pageCustomReportEmployeePersonel');
Route::get('personel/employee_notice_report', 'PersonelController@pageEmployeeNoticeReportPersonel');
Route::get('personel/evaluation_report', 'PersonelController@pageEvaluationReportPersonel');
Route::get('personel/employee_skill_report', 'PersonelController@pageEmployeeSkillReportPersonel');
Route::get('personel/employee_turn_over_report', 'PersonelController@pageEmployeeTurnOverReportPersonel');

Route::get('personel/personal_data/table', 'PersonelController@tablePersonalDataPersonel');
Route::get('personel/performance/table', 'PersonelController@tablePerformancePersonel');
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
Route::get('personel/print_letter/table', 'PersonelController@tablePrintLetterPersonel');
Route::get('personel/job_description/table', 'PersonelController@tableJobDescriptionPersonel');
Route::get('personel/cost_center/table', 'PersonelController@tableCostCenterCodePersonel');
Route::get('personel/location/table', 'PersonelController@tableLocationCodePersonel');
Route::get('personel/position/table', 'PersonelController@tablePositionPersonel');
Route::get('personel/ranking/table', 'PersonelController@tableRankingPersonel');
Route::get('personel/grade/table', 'PersonelController@tableGradeCodePersonel');
Route::get('personel/group/table', 'PersonelController@tableGroupPersonel');
Route::get('personel/nature_of_work/table', 'PersonelController@tableNatureofWorkPersonel');
Route::get('personel/bpjs_group/table', 'PersonelController@tableBPJSGroupPersonel');
Route::get('personel/npwp_group/table', 'PersonelController@tableNPWPGroupPersonel');
Route::get('personel/bank/table', 'PersonelController@tableBankPersonel');
Route::get('personel/company_bank/table', 'PersonelController@tableCompanyBankPersonel');
Route::get('personel/source_bank/table', 'PersonelController@tableSourceBankPersonel');
Route::get('personel/transfer_bank/table', 'PersonelController@tableTransferBankPersonel');
Route::get('personel/currency_code/table', 'PersonelController@tableCurrencyCodePersonel');
Route::get('personel/rate_type/table', 'PersonelController@tableRateTypePersonel');
Route::get('personel/exchange_rate/table', 'PersonelController@tableExchangeRatePersonel');
Route::get('personel/education_code/table', 'PersonelController@tableEducationCodePersonel');
Route::get('personel/education_status_code/table', 'PersonelController@tableEducationStatusCodePersonel');
Route::get('personel/institution/table', 'PersonelController@tableInstitutionPersonel');
Route::get('personel/major/table', 'PersonelController@tableMajorPersonel');
Route::get('personel/type_of_course/table', 'PersonelController@tableTypeofCoursePersonel');
Route::get('personel/language_code/table', 'PersonelController@tableLanguageCodePersonel');
Route::get('personel/language_ability_code/table', 'PersonelController@tableLanguageAbilityCodePersonel');
Route::get('personel/city/table', 'PersonelController@tableCityPersonel');
Route::get('personel/zip/table', 'PersonelController@tableZipCodePersonel');
Route::get('personel/insurance_code/table', 'PersonelController@tableInsuranceCodePersonel');
Route::get('personel/insurance_class_code/table', 'PersonelController@tableInsuranceClassCodePersonel');
Route::get('personel/termination_code/table', 'PersonelController@tableTerminationCodePersonel');
Route::get('personel/decree_code/table', 'PersonelController@tableDecreeCodePersonel');
Route::get('personel/sanction_code/table', 'PersonelController@tableSanctionCodePersonel');
Route::get('personel/evaluation_form/table', 'PersonelController@tableEvaluationFormPersonel');
Route::get('personel/title/table', 'PersonelController@tableTitlePersonel');
Route::get('personel/nationality_code/table', 'PersonelController@tableNationalityCodePersonel');
Route::get('personel/religion_code/table', 'PersonelController@tableReligionCodePersonel');
Route::get('personel/line_of_business/table', 'PersonelController@tableLineofBusinessPersonel');
Route::get('personel/fringe_benefits_code/table', 'PersonelController@tableFringeBenefitsCodePersonel');
Route::get('personel/final_performance_result/table', 'PersonelController@tableFinalPerformanceResultPersonel');
Route::get('personel/skill/table', 'PersonelController@tableSkillPersonel');
Route::get('personel/attachment_code/table', 'PersonelController@tableAttachmentCodePersonel');
Route::get('personel/free_format_field/table', 'PersonelController@tableFreeFormatFieldPersonel');
Route::get('personel/format_report/table', 'PersonelController@tableFormatReportPersonel');
Route::get('personel/relation_code/table', 'PersonelController@tableRelationCodePersonel');

Route::get('personel/personal_data/detail_data', 'PersonelController@dataDetailPersonalDataPersonel');
Route::get('personel/performance/detail_data', 'PersonelController@dataDetailPerformancePersonel');
Route::get('personel/work_detail/detail_data', 'PersonelController@dataDetailWorkDetailPersonel');
Route::get('personel/competency/detail_data', 'PersonelController@dataDetailCompetencyPersonel');
Route::get('personel/other_information/detail_data', 'PersonelController@dataDetailOtherInformationPersonel');
Route::get('personel/payroll_data/detail_data', 'PersonelController@dataDetailPayrollDataPersonel');
Route::get('personel/employee_approval/detail_data', 'PersonelController@dataDetailPayrollDataPersonel');
Route::get('personel/employee_attachment/detail_data', 'PersonelController@dataDetailEmployeeAttachmentPersonel');
Route::get('personel/level/detail_data', 'PersonelController@dataDetailLevelPersonel');
Route::get('personel/source_document/detail_data', 'PersonelController@dataDetailSourceDocumentPersonel');
Route::get('personel/format_document/detail_data', 'PersonelController@dataDetailFormatDocumentPersonel');
Route::get('personel/job_description/detail_data', 'PersonelController@dataDetailJobDescriptionPersonel');
Route::get('personel/cost_center/detail_data', 'PersonelController@dataDetailCostCenterCodePersonel');
Route::get('personel/location/detail_data', 'PersonelController@dataDetailLocationCodePersonel');
Route::get('personel/position/detail_data', 'PersonelController@dataDetailPositionPersonel');
Route::get('personel/ranking/detail_data', 'PersonelController@dataDetailRankingPersonel');
Route::get('personel/grade/detail_data', 'PersonelController@dataDetailGradeCodePersonel');
Route::get('personel/group/detail_data', 'PersonelController@dataDetailGroupPersonel');
Route::get('personel/nature_of_work/detail_data', 'PersonelController@dataDetailNatureofWorkPersonel');
Route::get('personel/bpjs_group/detail_data', 'PersonelController@dataDetailBPJSGroupPersonel');
Route::get('personel/npwp_group/detail_data', 'PersonelController@dataDetailNPWPGroupPersonel');
Route::get('personel/bank/detail_data', 'PersonelController@dataDetailBankPersonel');
Route::get('personel/company_bank/detail_data', 'PersonelController@dataDetailCompanyBankPersonel');
Route::get('personel/source_bank/detail_data', 'PersonelController@dataDetailSourceBankPersonel');
Route::get('personel/transfer_bank/detail_data', 'PersonelController@dataDetailTransferBankPersonel');
Route::get('personel/currency_code/detail_data', 'PersonelController@dataDetailCurrencyCodePersonel');
Route::get('personel/rate_type/detail_data', 'PersonelController@dataDetailRateTypePersonel');
Route::get('personel/exchange_rate/detail_data', 'PersonelController@dataDetailExchangeRatePersonel');
Route::get('personel/education_code/detail_data', 'PersonelController@dataDetailEducationCodePersonel');
Route::get('personel/education_status_code/detail_data', 'PersonelController@dataDetailEducationStatusCodePersonel');
Route::get('personel/institution/detail_data', 'PersonelController@dataDetailInstitutionPersonel');
Route::get('personel/major/detail_data', 'PersonelController@dataDetailMajorPersonel');
Route::get('personel/type_of_course/detail_data', 'PersonelController@dataDetailTypeofCoursePersonel');
Route::get('personel/language_code/detail_data', 'PersonelController@dataDetailLanguageCodePersonel');
Route::get('personel/language_ability_code/detail_data', 'PersonelController@dataDetailLanguageAbilityCodePersonel');
Route::get('personel/city/detail_data', 'PersonelController@dataDetailCityPersonel');
Route::get('personel/zip/detail_data', 'PersonelController@dataDetailZipCodePersonel');
Route::get('personel/insurance_code/detail_data', 'PersonelController@dataDetailInsuranceCodePersonel');
Route::get('personel/insurance_class_code/detail_data', 'PersonelController@dataDetailInsuranceClassCodePersonel');
Route::get('personel/termination_code/detail_data', 'PersonelController@dataDetailTerminationCodePersonel');
Route::get('personel/decree_code/detail_data', 'PersonelController@dataDetailDecreeCodePersonel');
Route::get('personel/sanction_code/detail_data', 'PersonelController@dataDetailSanctionCodePersonel');
Route::get('personel/evaluation_form/detail_data', 'PersonelController@dataDetailEvaluationFormPersonel');
Route::get('personel/title/detail_data', 'PersonelController@dataDetailTitlePersonel');
Route::get('personel/nationality_code/detail_data', 'PersonelController@dataDetailNationalityCodePersonel');
Route::get('personel/religion_code/detail_data', 'PersonelController@dataDetailReligionCodePersonel');
Route::get('personel/line_of_business/detail_data', 'PersonelController@dataDetailLineofBusinessPersonel');
Route::get('personel/fringe_benefits_code/detail_data', 'PersonelController@dataDetailFringeBenefitsCodePersonel');
Route::get('personel/final_performance_result/detail_data', 'PersonelController@dataDetailFinalPerformanceResultPersonel');
Route::get('personel/skill/detail_data', 'PersonelController@dataDetailSkillPersonel');
Route::get('personel/attachment_code/detail_data', 'PersonelController@dataDetailAttachmentCodePersonel');
Route::get('personel/free_format_field/detail_data', 'PersonelController@dataDetailFreeFormatFieldPersonel');
Route::get('personel/format_report/detail_data', 'PersonelController@dataDetailFormatReportPersonel');
Route::get('personel/relation_code/detail_data', 'PersonelController@dataDetailRelationCodePersonel');
Route::get('personel/final_performance_result/detail_data', 'PersonelController@dataDetailFinalPerformanceResultPersonel');
Route::get('personel/employee_mutation/detail_data', 'PersonelController@dataDetailEmployeeMutationPersonel');
Route::get('personel/city_name/detail', 'PersonelController@dataDetailCityNamePersonel');
Route::get('personel/zip_code/detail', 'PersonelController@dataDetailZipCodeDetailPersonel');

Route::get('personel/personal_data/fringe_benefit/table', 'PersonelController@tableFringeBenefitPersonalDataPersonel');
Route::get('personel/personal_data/dependent/table', 'PersonelController@tableDependentPersonalDataPersonel');
Route::get('personel/family_dependent_data/table', 'PersonelController@tableFamilyDependentDataPersonel');
Route::get('personel/personal_data/prefix_title', 'PersonelController@dataPrefixTitlePersonalDataPersonel');
Route::get('personel/performance/award/table', 'PersonelController@tableAwardPerformancePersonel');
Route::get('personel/performance/sanction/table', 'PersonelController@tableSanctionPerformancePersonel');
Route::get('personel/performance/evaluation/table', 'PersonelController@tableEvaluationPerformancePersonel');
Route::get('personel/performance/evaluation/form/table', 'PersonelController@tableEvaluationFormPerformancePersonel');
Route::get('personel/work_detail/job_history/table', 'PersonelController@tableJobHistoryWorkDetailPersonel');
Route::get('personel/work_detail/work_experience/table', 'PersonelController@tableWorkExperienceWorkDetailPersonel');
Route::get('personel/work_detail/free_format_field/table', 'PersonelController@tableFreeFormatFieldWorkDetailPersonel');
Route::get('personel/competency/formal_education/table', 'PersonelController@tableCompetencyFormalEducationPersonel');
Route::get('personel/competency/language/table', 'PersonelController@tableCompetencyLanguagePersonel');
Route::get('personel/competency/organization/table', 'PersonelController@tableCompetencyOrganizationPersonel');
Route::get('personel/competency/reference/table', 'PersonelController@tableCompetencyReferencePersonel');
Route::get('personel/competency/skill/table', 'PersonelController@tableCompetencySkillPersonel');
Route::get('personel/competency/project_experience/table', 'PersonelController@tableCompetencyProjectExperiencePersonel');
Route::get('personel/competency/training_list/table', 'PersonelController@tableCompetencyTrainingListPersonel');
Route::get('personel/other_information/free_format_field/table', 'PersonelController@tableOtherInformationFreeFormatFieldPersonel');
Route::get('personel/employee_attachment/attachment/table', 'PersonelController@tableEmployeeAttachmentAttachmentPersonel');
Route::get('personel/format_document/format_document/table', 'PersonelController@tableFormatDocumentFormatDocumentPersonel');
Route::get('personel/exchange_rate/exchange_rate/table', 'PersonelController@tableExchangeRateExchangeRatePersonel');
Route::get('personel/evaluation_form/evaluation_aspect/table', 'PersonelController@tableEvaluationFormEvaluationAspectPersonel');
Route::get('personel/evaluation_form/predicate/table', 'PersonelController@tableEvaluationFormPredicatePersonel');
Route::get('personel/free_format_field/detail/table', 'PersonelController@tableFreeFormatFieldDetailPersonel');
Route::get('personel/format_report/report_format/table', 'PersonelController@tableFormatReportReportFormatPersonel');
Route::get('personel/format_report/report_format_condition/table', 'PersonelController@tableFormatReportReportFormatConditionPersonel');
Route::get('personel/source_document/detail/table', 'PersonelController@tableSourceDocumentDetailPersonel');
Route::get('personel/source_document/signer/table', 'PersonelController@tableSourceDocumentSignerPersonel');

Route::get('personel/nature_of_work/status', 'PersonelController@statusNatureofWorkPersonel');
Route::get('personel/grade/status', 'PersonelController@statusGradeCodePersonel');
Route::get('personel/position/status', 'PersonelController@statusPositionPersonel');
Route::get('personel/location/status', 'PersonelController@statusLocationCodePersonel');
Route::get('personel/level/status', 'PersonelController@statusLevelPersonel');
Route::get('personel/cost_center/status', 'PersonelController@statusCostCenterCodePersonel');
Route::get('personel/performance/status', 'PersonelController@statusPerformancePersonel');
Route::get('personel/competency/status', 'PersonelController@statusCompetencyPersonel');
Route::get('personel/bank/status', 'PersonelController@statusBankPersonel');
Route::get('personel/company_bank/status', 'PersonelController@statusCompanyBankPersonel');
Route::get('personel/group/status', 'PersonelController@statusGroupPersonel');
Route::get('personel/zip/status', 'PersonelController@statusZipCodePersonel');
Route::get('personel/bpjs_group/status', 'PersonelController@statusBPJSGroupPersonel');
Route::get('personel/npwp_group/status', 'PersonelController@statusNPWPGroupPersonel');
Route::get('personel/ranking/status', 'PersonelController@statusRankingPersonel');
Route::get('personel/institution/status', 'PersonelController@statusInstitutionPersonel');
Route::get('personel/major/status', 'PersonelController@statusMajorPersonel');
Route::get('personel/type_of_course/status', 'PersonelController@statusTypeofCoursePersonel');
Route::get('personel/final_performance_result/status', 'PersonelController@statusFinalPerformanceResultPersonel');
Route::get('personel/skill/status', 'PersonelController@statusSkillPersonel');
Route::get('personel/source_document/status', 'PersonelController@statusSourceDocumentPersonel');
Route::get('personel/evaluation_form/status', 'PersonelController@statusEvaluationFormPersonel');
Route::get('personel/free_format_field/status', 'PersonelController@statusFreeFormatFieldPersonel');
Route::get('personel/free_format_field/detail/status', 'PersonelController@statusFreeFormatFieldDetailPersonel');
Route::get('personel/city/status', 'PersonelController@statusCityPersonel');
Route::get('personel/title/status', 'PersonelController@statusTitlePersonel');
Route::get('personel/personal_data/status', 'PersonelController@statusPersonalDataPersonel');

Route::post('personel/personal_data/proses', 'PersonelController@prosesPersonalDataPersonel');
Route::post('personel/nature_of_work/proses', 'PersonelController@prosesNatureofWorkPersonel');
Route::post('personel/grade/proses', 'PersonelController@prosesGradeCodePersonel');
Route::post('personel/position/proses', 'PersonelController@prosesPositionPersonel');
Route::post('personel/location/proses', 'PersonelController@prosesLocationCodePersonel');
Route::post('personel/level/proses', 'PersonelController@prosesLevelPersonel');
Route::post('personel/cost_center/proses', 'PersonelController@prosesCostCenterCodePersonel');
Route::post('personel/performance/award/proses', 'PersonelController@prosesPerformanceAwardPersonel');
Route::post('personel/performance/sanction/proses', 'PersonelController@prosesPerformanceSanctionPersonel');
Route::post('personel/performance/evaluation/proses', 'PersonelController@prosesPerformanceEvaluationPersonel');
Route::post('personel/work_detail/job_history/proses', 'PersonelController@prosesWorkDetailJobHistoryPersonel');
Route::post('personel/work_detail/work_experience/proses', 'PersonelController@prosesWorkDetailWorkExperiencePersonel');
Route::post('personel/work_detail/free_format_field/proses', 'PersonelController@prosesWorkDetailFreeFormatFieldPersonel');
Route::post('personel/competency/formal_education/proses', 'PersonelController@prosesCompetencyFormalEducationPersonel');
Route::post('personel/competency/language/proses', 'PersonelController@prosesCompetencyLanguagePersonel');
Route::post('personel/competency/organization/proses', 'PersonelController@prosesCompetencyOrganizationPersonel');
Route::post('personel/competency/reference/proses', 'PersonelController@prosesCompetencyReferencePersonel');
Route::post('personel/competency/skill/proses', 'PersonelController@prosesCompetencySkillPersonel');
Route::post('personel/competency/project_experience/proses', 'PersonelController@prosesCompetencyProjectExperiencePersonel');
Route::post('personel/competency/training_list/proses', 'PersonelController@prosesCompetencyTrainingListPersonel');
Route::post('personel/bank/proses', 'PersonelController@prosesBankPersonel');
Route::post('personel/company_bank/proses', 'PersonelController@prosesCompanyBankPersonel');
Route::post('personel/group/proses', 'PersonelController@prosesGroupPersonel');
Route::post('personel/zip/proses', 'PersonelController@prosesZipCodePersonel');
Route::post('personel/bpjs_group/proses', 'PersonelController@prosesBPJSGroupPersonel');
Route::post('personel/npwp_group/proses', 'PersonelController@prosesNPWPGroupPersonel');
Route::post('personel/ranking/proses', 'PersonelController@prosesRankingPersonel');
Route::post('personel/institution/proses', 'PersonelController@prosesInstitutionPersonel');
Route::post('personel/major/proses', 'PersonelController@prosesMajorPersonel');
Route::post('personel/type_of_course/proses', 'PersonelController@prosesTypeofCoursePersonel');
Route::post('personel/skill/proses', 'PersonelController@prosesSkillPersonel');
Route::post('personel/source_document/proses', 'PersonelController@prosesSourceDocumentPersonel');
Route::post('personel/source_document/detail/proses', 'PersonelController@prosesSourceDocumentDetailPersonel');
Route::post('personel/source_document/signer/proses', 'PersonelController@prosesSourceDocumentSignerPersonel');
Route::post('personel/final_performance_result/proses', 'PersonelController@prosesFinalPerformanceResultPersonel');
Route::post('personel/evaluation_form/proses', 'PersonelController@prosesEvaluationFormPersonel');
Route::post('personel/evaluation_form/evaluted_aspect/proses', 'PersonelController@prosesEvaluationFormEvaluatedAspectPersonel');
Route::post('personel/personel_reference/proses', 'PersonelController@prosesPersonelReferencePersonel');
Route::post('personel/free_format_field/proses', 'PersonelController@prosesFreeFormatFieldPersonel');
Route::post('personel/free_format_field/detail/proses', 'PersonelController@prosesFreeFormatFieldDetailPersonel');
Route::post('personel/city/proses', 'PersonelController@prosesCityPersonel');
Route::post('personel/title/proses', 'PersonelController@prosesTitlePersonel');
Route::post('personel/employee_mutation/proses', 'PersonelController@prosesEmployeeMutationPersonel');

Route::get('personel/final_performance_result/remove', 'PersonelController@removeFinalPerformanceResultPersonel');
Route::get('personel/evaluation_form/evaluated_aspect/remove', 'PersonelController@removeEvaluationFormEvaluatedAspectPersonel');
Route::get('personel/performance/award/remove', 'PersonelController@removePerformanceAwardPersonel');
Route::get('personel/performance/sanction/remove', 'PersonelController@removePerformanceSanctionPersonel');
Route::get('personel/performance/evaluation/remove', 'PersonelController@removePerformanceEvaluationPersonel');
Route::get('personel/work_detail/work_experience/remove', 'PersonelController@removeWorkDetailWorkExperiencePersonel');
Route::get('personel/work_detail/free_format_field/remove', 'PersonelController@removeWorkDetailFreeFormatFieldPersonel');
Route::get('personel/competency/formal_education/remove', 'PersonelController@removeCompetencyFormalEducationPersonel');
Route::get('personel/competency/language/remove', 'PersonelController@removeCompetencyLanguagePersonel');
Route::get('personel/competency/organization/remove', 'PersonelController@removeCompetencyOrganizationPersonel');
Route::get('personel/competency/reference/remove', 'PersonelController@removeCompetencyReferencePersonel');
Route::get('personel/competency/skill/remove', 'PersonelController@removeCompetencySkillPersonel');
Route::get('personel/competency/project_experience/remove', 'PersonelController@removeCompetencyProjectExperiencePersonel');
Route::post('personel/competency/training_list/remove', 'PersonelController@removeCompetencyTrainingListPersonel');

Route::get('personel/number/check', 'PersonelController@checkNumberPersonel');
Route::get('personel_data_detail/number/check', 'PersonelController@checkNumberPersonelDataDetail');
Route::get('personel_data_detail/auto_employee_no/check', 'PersonelController@checkAutoEmployeeNoPersonel');
Route::post('personel/print_letter/print', 'PersonelController@printPrintLetterPersonel');
Route::post('personel/employee_list/print', 'PersonelController@printEmployeeListPersonel');
Route::post('personel/employee_turn_over_report/print', 'PersonelController@printEmployeeTurnOverReportPersonel');
Route::post('personel/employee_skill_report/print', 'PersonelController@printEmployeeSkillReportPersonel');
Route::post('personel/employee_report_by_status/print', 'PersonelController@printEmployeeReportByStatusPersonel');
Route::post('personel/custom_report_employee/print', 'PersonelController@printCustomReportEmployee');
Route::post('personel/evaluation_report/print', 'PersonelController@printEvaluationReportPersonel');
Route::get('personel/report/level/check', 'PersonelController@checkReportLevelPersonel');
Route::post('personel/employee/photo/proses', 'PersonelController@prosesEmployeePhotoPersonel');
Route::get('personel/performance/result/check', 'PersonelController@checkResultPerformancePersonel');

/* Route Untuk Menu Time Management */
Route::get('time_management', 'TimeManagementController@pageTimeManagement');
Route::get('time_management/time_recording_process_form', 'TimeManagementController@pageTimeRecordingProcessForm');
Route::get('time_management/update_absenteeism_data', 'TimeManagementController@pageUpdateAbsenteeismData');
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

/* Route untuk remove Time Managemnet */
Route::get('time_management/time_recording_process_form/remove', 'TimeManagementController@removeTimeRecordingProcessFormTM');
Route::get('time_management/overtime_spl/remove', 'TimeManagementController@removeOvertimeSPLTM');
Route::get('time_management/period_maintenance/remove', 'TimeManagementController@removePeriodMaintenanceTM');

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
Route::post('time_management/detail_absenteeism_reason_report/print', 'TimeManagementController@PrintDetailAbsenteeismReasonReport');
Route::post('time_management/absenteeism_overtime_report/print', 'TimeManagementController@printAbsenteeismOvertimeReport');

Route::post('time_management/update_absenteeism_data/import', 'TimeManagementController@importUpdateAbsenteeismData');

/* Route Untuk Menu Payroll */
Route::get('payroll', 'PayrollController@pagePayroll');
/* Payroll Data Entry Menu */
Route::get('payroll/salary_master_data', 'PayrollController@pageSalaryMasterData');
Route::get('payroll/severance_data_entry', 'PayrollController@pageSeveracneDataEntry');
Route::get('payroll/thr_formula', 'PayrollController@pageThrFormula');
Route::get('payroll/thr_data_entry', 'PayrollController@pageThrDataEntry');
Route::get('payroll/thr_calculation', 'PayrollController@pageThrCalculation');
Route::get('payroll/bonus_formula', 'PayrollController@pageBonusFormula');
Route::get('payroll/bonus_data_entry', 'PayrollController@pageBonusDataEntry');
Route::get('payroll/bonus_calculation', 'PayrollController@pageBonusCalculation');
Route::get('payroll/loan_master', 'PayrollController@pageLoanMaster');
Route::get('payroll/loan_data_entry', 'PayrollController@pageLoanDataEntry');
Route::get('payroll/loan_payment', 'PayrollController@pageLoanPayment');
Route::get('payroll/partial_full_loan_payment', 'PayrollController@pagePartialFullLoanPayment');
/* Payroll Maintenance Menu */
Route::get('payroll/payroll_calculation', 'PayrollController@pagePayrollCalculation');
Route::get('payroll/reference_form', 'PayrollController@pageReferenceForm');
Route::get('payroll/account', 'PayrollController@pageAccount');
Route::get('payroll/jamsostek_percentage', 'PayrollController@pageJamsostekPercentage');
Route::get('payroll/tax_calculation_table', 'PayrollController@pageTaxCalculationTable');
Route::get('payroll/spt_format', 'PayrollController@pageSptFormat');
Route::get('payroll/salary_component_form', 'PayrollController@pageSalaryComponentForm');
Route::get('payroll/slip_format_salary_slip', 'PayrollController@pageSlipFormatSalarySlip');
Route::get('payroll/slip_format_bonus_slip', 'PayrollController@pageSlipFormatBonusSlip');
Route::get('payroll/slip_format_thr_slip', 'PayrollController@pageSlipFormatThrSlip');
Route::get('payroll/journal_template', 'PayrollController@pageJournalTemplate');
Route::get('payroll/report_format', 'PayrollController@pageReportFormat');
Route::get('payroll/tarif_master', 'PayrollController@pageTarifMaster');
Route::get('payroll/multi_cost_center', 'PayrollController@pageMultiCostCenter');
/* Payroll Process Menu */
Route::get('payroll/import_data_from_excel', 'PayrollController@pageImportDataFromExcel');
Route::get('payroll/year_end_process', 'PayrollController@pageYearEndProcess');
Route::get('payroll/yearly_adjusment', 'PayrollController@pageYearlyAdjusment');
Route::get('payroll/spt_process', 'PayrollController@pageSptProcess');
Route::get('payroll/final_tax_process', 'PayrollController@pageFinalTaxProcess');
Route::get('payroll/periodical_update_process', 'PayrollController@pagePeriodicalUpdateProcess');
Route::get('payroll/transfer_data_to_bank', 'PayrollController@pageTransferDataToBank');
Route::get('payroll/overtime_calculation_process', 'PayrollController@pageOvertimeCalculationProcess');
Route::get('payroll/journal_process', 'PayrollController@pageJournalProcess');
Route::get('payroll/salary_calculation_process', 'PayrollController@pageSalaryCalculationProcess');
Route::get('payroll/tax_calculation_process', 'PayrollController@pageTaxCalculationProcess');
/* Payroll Report Menu */
Route::get('payroll/dumtk', 'PayrollController@pageDumtk');
Route::get('payroll/monthly_jamsostek_report', 'PayrollController@pageMonthlyJamsostekReport');
Route::get('payroll/export_sipp_online', 'PayrollController@pageExportSippOnline');
Route::get('payroll/loan_report', 'PayrollController@pageLoanReport');
Route::get('payroll/journal_report', 'PayrollController@pageJournalReport');
Route::get('payroll/retroactive_report', 'PayrollController@pageRetroactiveReport');
Route::get('payroll/signature_list', 'PayrollController@pageSignatureList');
Route::get('payroll/thr_report', 'PayrollController@pageThrReport');
Route::get('payroll/export_data_kepesertaan_bpjs-tk', 'PayrollController@pageExportDataKepesertaanBpjk-Tk');
Route::get('payroll/periodical_report', 'PayrollController@pagePeriodicalReport');
Route::get('payroll/payment_slip', 'PayrollController@pagePaymentSlip');
Route::get('payroll/severance_report', 'PayrollController@pageSeveranceReport');
Route::get('payroll/salary_historical_report', 'PayrollController@pageSalaryHistoricalReport');
Route::get('payroll/csv_e-spt_report_form', 'PayrollController@pageCsvE-SptReportForm');
Route::get('payroll/spt_pph_1721a1', 'PayrollController@pageSptPph1721a1');
Route::get('payroll/annual_report', 'PayrollController@pageAnnualReport');
Route::get('payroll/spt_pph_1721a1_report', 'PayrollController@pageSptPph1721a1Report');

/* Route untuk tabel Payroll */
Route::get('payroll/account/table', 'PayrollController@tableAccount');
Route::get('payroll/bonus_data_entry/table', 'PayrollController@tableBonusDataEntryPY');

/* Route untuk detail Payroll */
Route::get('payroll/account/detail', 'PayrollController@dataAccount');
Route::get('payroll/bonus_data_entry/detail_data', 'PayrollController@dataDetailBonusDataEntryPY');

/* Route untuk status Payroll */
Route::get('payroll/account/status', 'PayrollController@statusAccount');

/* Route untuk proses Time Management */
Route::post('payroll/account/proses','PayrollController@prosesAccount');

/* Route Untuk Menu Utilities */
Route::get('utilities', 'UtilitiesController@pageUtilitiesMain');
Route::get('utilities/organization_chart', 'UtilitiesController@pageOrganizationStructureUtilities');
Route::get('utilities/user_security_maintenance', 'UtilitiesController@pageUserSecurityMaintenanceUtilities');
Route::get('utilities/menu_master', 'UtilitiesController@pageMenuMasterUtilities');
Route::get('utilities/group_authorization', 'UtilitiesController@pageAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access', 'UtilitiesController@pageUserAccessGroupUtilities');
Route::get('utilities/change_password', 'UtilitiesController@pageChangeEmployeeNumberUtilities');
Route::get('utilities/user_log', 'UtilitiesController@pageUserLogUtilities');
Route::get('utilities/audit_trail', 'UtilitiesController@pageAuditTrailUtilities');
Route::get('utilities/export_personal_data', 'UtilitiesController@pageExportPersonalDataUtilities');
Route::get('utilities/dashboard_admin_ess', 'UtilitiesController@pageDashboardESSUtilities');

Route::get('utilities/user_security_maintenance/table', 'UtilitiesController@tableUserSecurityMaintenanceUtilities');
Route::get('utilities/group_authorization/table', 'UtilitiesController@tableAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access/table', 'UtilitiesController@tableUserAccessGroupUtilities');
Route::get('utilities/user_log/table', 'UtilitiesController@tableUserLogUtilities');
Route::get('utilities/menu_master/table', 'UtilitiesController@tableMenuMasterUtilities');
Route::get('utilities/change_password/employee/table', 'UtilitiesController@tableChangeEmployeeNumberEmployeeUtilities');

Route::get('utilities/group_authorization/detail_data', 'UtilitiesController@dataDetailAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access/detail_data', 'UtilitiesController@dataDetailUserAccessGroupUtilities');
Route::get('utilities/user_security_maintenance/detail_data', 'UtilitiesController@dataDetailUserSecurityMaintenanceUtilities');

Route::get('utilities/user_security_maintenance/level/table', 'UtilitiesController@tableUserSecurityMaintenanceLevelUtilities');
Route::get('utilities/user_security_maintenance/company/table', 'UtilitiesController@tableUserSecurityMaintenanceCompanyUtilities');
Route::get('utilities/user_security_maintenance/module/table', 'UtilitiesController@tableUserSecurityMaintenanceModuleUtilities');
Route::get('utilities/user_security_maintenance/level_authorization/table', 'UtilitiesController@tableUserSecurityMaintenanceLevelAuthorizationUtilities');
Route::get('utilities/group_user_access/user/table', 'UtilitiesController@tableUserAccessGroupUserUtilities');
Route::get('utilities/menu_master/configure_menu/table', 'UtilitiesController@tableMenuMasterConfigureMenuUtilities');

Route::get('utilities/group_authorization/status', 'UtilitiesController@statusAuthorizationCodeGroupUtilities');
Route::get('utilities/group_user_access/status', 'UtilitiesController@statusUserAccessGroupUtilities');
Route::get('utilities/user/status', 'UtilitiesController@statusUserUtilities');

Route::post('utilities/group_authorization/proses', 'UtilitiesController@prosesAuthorizationCodeGroupUtilities');
Route::post('utilities/group_user_access/proses', 'UtilitiesController@prosesUserAccessGroupUtilities');
Route::post('utilities/menu_master/proses', 'UtilitiesController@prosesMenuMasterUtilities');
Route::post('utilities/menu_master/configure_menu/proses', 'UtilitiesController@prosesMenuMasterConfigureMenuUtilities');
Route::post('utilities/menu_master/copy_to_another_group/proses', 'UtilitiesController@prosesMenuMasterCopyToAnotherGroupUtilities');
Route::post('utilities/user/proses', 'UtilitiesController@prosesUserUtilities');
Route::post('utilities/user_security_maintenance/level/proses', 'UtilitiesController@prosesUserSecurityMaintenanceLevelUtilities');
Route::post('utilities/user_security_maintenance/company/proses', 'UtilitiesController@prosesUserSecurityMaintenanceCompanyUtilities');
Route::post('utilities/user_security_maintenance/module/proses', 'UtilitiesController@prosesUserSecurityMaintenanceModuleUtilities');

Route::post('utilities/audit_trail/export', 'UtilitiesController@exportAuditTrailUtilities');

Route::post('utilities/group_user_access/user/add', 'UtilitiesController@addUserAccessGroupUserUtilities');
Route::get('utilities/group_user_access/user/remove', 'UtilitiesController@removeUserAccessGroupUserUtilities');
Route::get('utilities/user_security_maintenance/module/remove', 'UtilitiesController@removeUserSecurityMaintenanceModuleUtilities');

/* Route Untuk Data Utilities - Organization Structure */
Route::get('utilities/organization_chart/get/position', 'OrganizationStructureController@getDataPosition');

/* Route Untuk Change Password */
Route::get('change_password', 'ChangePasswordController@pageChangePassword');
Route::post('change_password/proses', 'ChangePasswordController@prosesChangePassword');

/* Route Untuk Change Language */
Route::post('change_language/proses', 'LanguagesController@prosesChangeLanguage');

/* Route Untuk Set Languange */
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguagesController@switchLang']);

/* Route Untuk Dropdown From API */
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
Route::get('currency/api', 'DataController@dataCurrencyAPI');
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
Route::get('status/api', 'DataController@dataStatusAPI');
Route::get('employee_no/api', 'DataController@dataEmployeeNoAPI');
Route::get('employee_no/api2', 'DataController@dataEmployeeNoAPI2');
Route::get('employee_no/req/api2', 'DataController@dataEmployeeNoReqAPI2');
Route::get('employee_no/func/api', 'DataController@dataEmployeeNoFunctionAPI');
Route::get('company/api', 'DataController@dataCompanyAPI');
Route::get('company/detail/api', 'DataController@dataCompanyDetailAPI');
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
Route::get('ranking/api', 'DataController@dataRankingAPI');
Route::get('ranking/detail/api', 'DataController@dataRankingDetailAPI');
Route::get('ranking/all/api', 'DataController@dataRankingAllAPI');
Route::get('ranking/func/api', 'DataController@dataRankingFunctionAPI');
Route::get('level/api', 'DataController@dataLevelAPI');
Route::get('level/detail/api', 'DataController@dataLevelDetailAPI');
Route::get('level/all/api', 'DataController@dataLevelAllAPI');
Route::get('level/func/api', 'DataController@dataLevelFunctionAPI');
Route::get('evaluation_form/api', 'DataController@dataEvaluationFormAPI');
Route::get('evaluation_form/detail/api/{formCode}', 'DataController@dataEvaluationFormDetailAPI');
Route::get('grade/api', 'DataController@dataGradeAPI');
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
Route::get('npwp/api', 'DataController@dataNPWPAPI');
Route::get('npwp/personal_data/api', 'DataController@dataNPWPPersonalDataAPI');
Route::get('bpjs/api', 'DataController@dataBPJSAPI');
Route::get('bpjs/personal_data/api', 'DataController@dataBPJSPersonalDataAPI');
Route::get('cost_center/api', 'DataController@dataCostCenterAPI');
Route::get('cost_center/func/api', 'DataController@dataCostCenterFunctionAPI');
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
Route::get('comgen/api', 'DataController@dataComGenAPI');
Route::get('shift_master_code/api', 'DataController@dataShiftMasterCodeAPI');
Route::get('process_status/api', 'DataController@dataProcessStatusAPI');
Route::get('deduct_day/api', 'DataController@dataDeductDayAPI');

/* Route Untuk Save Token Device dan Notification Firebase */
Route::get('save-token', 'DashboardController@saveToken');
Route::get('send-notification', 'DashboardController@sendNotification');