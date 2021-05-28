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
Route::get('personel/bpjs_group', 'PersonelController@pageBPJSGroupPersonel');
Route::get('personel/npwp_group', 'PersonelController@pageNPWPGroupPersonel');
Route::get('personel/bank_code', 'PersonelController@pageBankCodePersonel');
Route::get('personel/bank_branch', 'PersonelController@pageBankBranchPersonel');
Route::get('personel/source_bank', 'PersonelController@pageSourceBankPersonel');
Route::get('personel/transfer_bank', 'PersonelController@pageTransferBankPersonel');
Route::get('personel/currency_code', 'PersonelController@pageCurrencyCodePersonel');
Route::get('personel/rate_type', 'PersonelController@pageRateTypePersonel');
Route::get('personel/exchange_rate', 'PersonelController@pageExchangeRatePersonel');
Route::get('personel/education_code', 'PersonelController@pageEducationCodePersonel');
Route::get('personel/education_status_code', 'PersonelController@pageEducationStatusCodePersonel');
Route::get('personel/institution_code', 'PersonelController@pageInstitutionCodePersonel');
Route::get('personel/major_code', 'PersonelController@pageMajorCodePersonel');
Route::get('personel/type_of_course_code', 'PersonelController@pageTypeofCourseCodePersonel');
Route::get('personel/language_code', 'PersonelController@pageLanguageCodePersonel');
Route::get('personel/language_ability_code', 'PersonelController@pageLanguageAbilityCodePersonel');
Route::get('personel/city_code', 'PersonelController@pageCityCodePersonel');
Route::get('personel/zip_code', 'PersonelController@pageZipCodePersonel');
Route::get('personel/insurance_code', 'PersonelController@pageInsuranceCodePersonel');
Route::get('personel/insurance_class_code', 'PersonelController@pageInsuranceClassCodePersonel');
Route::get('personel/termination_code', 'PersonelController@pageTerminationCodePersonel');
Route::get('personel/decree_code', 'PersonelController@pageDecreeCodePersonel');
Route::get('personel/sanction_code', 'PersonelController@pageSanctionCodePersonel');
Route::get('personel/evaluation_code', 'PersonelController@pageEvaluationCodePersonel');
Route::get('personel/title_code', 'PersonelController@pageTitleCodePersonel');
Route::get('personel/nationality_code', 'PersonelController@pageNationalityCodePersonel');
Route::get('personel/religion_code', 'PersonelController@pageReligionCodePersonel');
Route::get('personel/line_of_business', 'PersonelController@pageLineofBusinessPersonel');
Route::get('personel/fringe_benefits_code', 'PersonelController@pageFringeBenefitsCodePersonel');
Route::get('personel/final_performance_result_code', 'PersonelController@pageFinalPerformanceResultCodePersonel');
Route::get('personel/skill_code', 'PersonelController@pageSkillCodePersonel');
Route::get('personel/attachment_code', 'PersonelController@pageAttachmentCodePersonel');
Route::get('personel/free_format_field', 'PersonelController@pageFreeFormatFieldPersonel');
Route::get('personel/format_report', 'PersonelController@pageFormatReportPersonel');
Route::get('personel/relation_code', 'PersonelController@pageRelationCodePersonel');

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
Route::get('personel/bpjs_group/table', 'PersonelController@tableBPJSGroupPersonel');
Route::get('personel/npwp_group/table', 'PersonelController@tableNPWPGroupPersonel');
Route::get('personel/bank_code/table', 'PersonelController@tableBankCodePersonel');
Route::get('personel/bank_branch/table', 'PersonelController@tableBankBranchPersonel');
Route::get('personel/source_bank/table', 'PersonelController@tableSourceBankPersonel');
Route::get('personel/transfer_bank/table', 'PersonelController@tableTransferBankPersonel');
Route::get('personel/currency_code/table', 'PersonelController@tableCurrencyCodePersonel');
Route::get('personel/rate_type/table', 'PersonelController@tableRateTypePersonel');
Route::get('personel/exchange_rate/table', 'PersonelController@tableExchangeRatePersonel');
Route::get('personel/education_code/table', 'PersonelController@tableEducationCodePersonel');
Route::get('personel/education_status_code/table', 'PersonelController@tableEducationStatusCodePersonel');
Route::get('personel/institution_code/table', 'PersonelController@tableInstitutionCodePersonel');
Route::get('personel/major_code/table', 'PersonelController@tableMajorCodePersonel');
Route::get('personel/type_of_course_code/table', 'PersonelController@tableTypeofCourseCodePersonel');
Route::get('personel/language_code/table', 'PersonelController@tableLanguageCodePersonel');
Route::get('personel/language_ability_code/table', 'PersonelController@tableLanguageAbilityCodePersonel');
Route::get('personel/city_code/table', 'PersonelController@tableCityCodePersonel');
Route::get('personel/zip_code/table', 'PersonelController@tableZipCodePersonel');
Route::get('personel/insurance_code/table', 'PersonelController@tableInsuranceCodePersonel');
Route::get('personel/insurance_class_code/table', 'PersonelController@tableInsuranceClassCodePersonel');
Route::get('personel/termination_code/table', 'PersonelController@tableTerminationCodePersonel');
Route::get('personel/decree_code/table', 'PersonelController@tableDecreeCodePersonel');
Route::get('personel/sanction_code/table', 'PersonelController@tableSanctionCodePersonel');
Route::get('personel/evaluation_code/table', 'PersonelController@tableEvaluationCodePersonel');
Route::get('personel/title_code/table', 'PersonelController@tableTitleCodePersonel');
Route::get('personel/nationality_code/table', 'PersonelController@tableNationalityCodePersonel');
Route::get('personel/religion_code/table', 'PersonelController@tableReligionCodePersonel');
Route::get('personel/line_of_business/table', 'PersonelController@tableLineofBusinessPersonel');
Route::get('personel/fringe_benefits_code/table', 'PersonelController@tableFringeBenefitsCodePersonel');
Route::get('personel/final_performance_result_code/table', 'PersonelController@tableFinalPerformanceResultCodePersonel');
Route::get('personel/skill_code/table', 'PersonelController@tableSkillCodePersonel');
Route::get('personel/attachment_code/table', 'PersonelController@tableAttachmentCodePersonel');
Route::get('personel/free_format_field/table', 'PersonelController@tableFreeFormatFieldPersonel');
Route::get('personel/format_report/table', 'PersonelController@tableFormatReportPersonel');
Route::get('personel/relation_code/table', 'PersonelController@tableRelationCodePersonel');

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
Route::get('personel/bpjs_group/detail_data', 'PersonelController@dataDetailBPJSGroupPersonel');
Route::get('personel/npwp_group/detail_data', 'PersonelController@dataDetailNPWPGroupPersonel');
Route::get('personel/bank_code/detail_data', 'PersonelController@dataDetailBankCodePersonel');
Route::get('personel/bank_branch/detail_data', 'PersonelController@dataDetailBankBranchPersonel');
Route::get('personel/source_bank/detail_data', 'PersonelController@dataDetailSourceBankPersonel');
Route::get('personel/transfer_bank/detail_data', 'PersonelController@dataDetailTransferBankPersonel');
Route::get('personel/currency_code/detail_data', 'PersonelController@dataDetailCurrencyCodePersonel');
Route::get('personel/rate_type/detail_data', 'PersonelController@dataDetailRateTypePersonel');
Route::get('personel/exchange_rate/detail_data', 'PersonelController@dataDetailExchangeRatePersonel');
Route::get('personel/education_code/detail_data', 'PersonelController@dataDetailEducationCodePersonel');
Route::get('personel/education_status_code/detail_data', 'PersonelController@dataDetailEducationStatusCodePersonel');
Route::get('personel/institution_code/detail_data', 'PersonelController@dataDetailInstitutionCodePersonel');
Route::get('personel/major_code/detail_data', 'PersonelController@dataDetailMajorCodePersonel');
Route::get('personel/type_of_course_code/detail_data', 'PersonelController@dataDetailTypeofCourseCodePersonel');
Route::get('personel/language_code/detail_data', 'PersonelController@dataDetailLanguageCodePersonel');
Route::get('personel/language_ability_code/detail_data', 'PersonelController@dataDetailLanguageAbilityCodePersonel');
Route::get('personel/city_code/detail_data', 'PersonelController@dataDetailCityCodePersonel');
Route::get('personel/zip_code/detail_data', 'PersonelController@dataDetailZipCodePersonel');
Route::get('personel/insurance_code/detail_data', 'PersonelController@dataDetailInsuranceCodePersonel');
Route::get('personel/insurance_class_code/detail_data', 'PersonelController@dataDetailInsuranceClassCodePersonel');
Route::get('personel/termination_code/detail_data', 'PersonelController@dataDetailTerminationCodePersonel');
Route::get('personel/decree_code/detail_data', 'PersonelController@dataDetailDecreeCodePersonel');
Route::get('personel/sanction_code/detail_data', 'PersonelController@dataDetailSanctionCodePersonel');
Route::get('personel/evaluation_code/detail_data', 'PersonelController@dataDetailEvaluationCodePersonel');
Route::get('personel/title_code/detail_data', 'PersonelController@dataDetailTitleCodePersonel');
Route::get('personel/nationality_code/detail_data', 'PersonelController@dataDetailNationalityCodePersonel');
Route::get('personel/religion_code/detail_data', 'PersonelController@dataDetailReligionCodePersonel');
Route::get('personel/line_of_business/detail_data', 'PersonelController@dataDetailLineofBusinessPersonel');
Route::get('personel/fringe_benefits_code/detail_data', 'PersonelController@dataDetailFringeBenefitsCodePersonel');
Route::get('personel/skill_code/detail_data', 'PersonelController@dataDetailSkillCodePersonel');
Route::get('personel/attachment_code/detail_data', 'PersonelController@dataDetailAttachmentCodePersonel');
Route::get('personel/free_format_field/detail_data', 'PersonelController@dataDetailFreeFormatFieldPersonel');
Route::get('personel/format_report/detail_data', 'PersonelController@dataDetailFormatReportPersonel');
Route::get('personel/relation_code/detail_data', 'PersonelController@dataDetailRelationCodePersonel');

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
Route::get('personel/format_document/format_document/table', 'PersonelController@tableFormatDocumentFormatDocumentPersonel');
Route::get('personel/exchange_rate/exchange_rate/table', 'PersonelController@tableExchangeRateExchangeRatePersonel');
Route::get('personel/evaluation_code/evaluation_code/table', 'PersonelController@tableEvaluationCodeEvaluationCodePersonel');
Route::get('personel/evaluation_code/evaluation_code/detail/table', 'PersonelController@tableDetailEvaluationCodeEvaluationCodePersonel');
Route::get('personel/free_format_field/field_list/table', 'PersonelController@tableFreeFormatFieldFieldListPersonel');
Route::get('personel/format_report/report_format/table', 'PersonelController@tableFormatReportReportFormatPersonel');
Route::get('personel/format_report/report_format_condition/table', 'PersonelController@tableFormatReportReportFormatConditionPersonel');

/* Route Untuk Menu Time Management */
Route::get('time_management', 'TimeManagementController@pageTimeManagement');

/* Route Untuk Menu Utilities */
Route::get('utilities', 'UtilitiesController@pageUtilitiesMain');
Route::get('utilities/organization_structure', 'UtilitiesController@pageOrganizationStructureUtilities');
Route::get('utilities/user_security_maintenance', 'UtilitiesController@pageUserSecurityMaintenanceUtilities');
Route::get('utilities/menu_master', 'UtilitiesController@pageMenuMasterUtilities');
Route::get('utilities/authorization_code_group', 'UtilitiesController@pageAuthorizationCodeGroupUtilities');
Route::get('utilities/user_access_group', 'UtilitiesController@pageUserAccessGroupUtilities');
Route::get('utilities/change_employee_number', 'UtilitiesController@pageChangeEmployeeNumberUtilities');
Route::get('utilities/user_log', 'UtilitiesController@pageUserLogUtilities');
Route::get('utilities/audit_trail', 'UtilitiesController@pageAuditTrailUtilities');
Route::get('utilities/export_personal_data', 'UtilitiesController@pageExportPersonalDataUtilities');
Route::get('utilities/dashboard_ess', 'UtilitiesController@pageDashboardESSUtilities');

Route::get('utilities/user_security_maintenance/company/table', 'UtilitiesController@tableUserSecurityMaintenanceCompanyUtilities');
Route::get('utilities/user_security_maintenance/module/table', 'UtilitiesController@tableUserSecurityMaintenanceModuleUtilities');
Route::get('utilities/menu_master/module/table', 'UtilitiesController@tableMenuMasterModuleUtilities');
Route::get('utilities/authorization_code_group/authorization_code_group/table', 'UtilitiesController@tableAuthorizationCodeGroupUtilities');
Route::get('utilities/user_access_group/table', 'UtilitiesController@tableUserAccessGroupUtilities');
Route::get('utilities/change_employee_number/employee/table', 'UtilitiesController@tableChangeEmployeeNumberEmployeeUtilities');
Route::get('utilities/user_log/log/table', 'UtilitiesController@tableUserLogLogUtilities');

Route::get('utilities/user_access_group/detail_data', 'UtilitiesController@dataDetailUserAccessGroupUtilities');

Route::get('utilities/user_access_group/user/table', 'UtilitiesController@tableUserAccessGroupUserUtilities');


/* Route Untuk Set Languange */
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguagesController@switchLang']);

/* Route Untuk Dropdown From API */
Route::get('gender/api', 'DataController@dataGenderAPI');
Route::get('blood/api', 'DataController@dataBloodAPI');
Route::get('religion/api', 'DataController@dataReligionAPI');
