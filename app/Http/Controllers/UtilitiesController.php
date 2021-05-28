<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class UtilitiesController extends Controller
{
    public function pageUtilitiesMain()
    {
    	return view('utilities.utilities_main');
    }

    public function pageOrganizationStructureUtilities()
    {
    	return view('utilities.utilities_organization_structure');
    }

    public function pageUserSecurityMaintenanceUtilities()
    {
    	return view('utilities.utilities_user_security_maintenance');
    }

    public function pageMenuMasterUtilities()
    {
    	return view('utilities.utilities_menu_master');
    }

    public function pageAuthorizationCodeGroupUtilities()
    {
    	return view('utilities.utilities_authorization_code_group');
    }

    public function pageUserAccessGroupUtilities()
    {
    	return view('utilities.utilities_user_access_group');
    }

    public function pageChangeEmployeeNumberUtilities()
    {
    	return view('utilities.utilities_change_employee_number');
    }

    public function pageUserLogUtilities()
    {
    	return view('utilities.utilities_user_log');
    }

    public function pageAuditTrailUtilities()
    {
    	return view('utilities.utilities_audit_trail');
    }

    public function pageExportPersonalDataUtilities()
    {
    	return view('utilities.utilities_export_personal_data');
    }

    public function pageDashboardESSUtilities()
    {
    	return view('utilities.utilities_dashboard_ess');
    }

    public function tableUserSecurityMaintenanceCompanyUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'company_code' => 'Personel',
        			'company_name' => 'Pelaksana',
        			'set_default' => 'Pelaksana',
        			'status' => ''
        		],
        	]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableUserSecurityMaintenanceModuleUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'module_name' => 'Personel',
        			'group_authorization_name' => 'Pelaksana'
        		],
        	]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableMenuMasterModuleUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect();
            return Datatables::of($data)->make(true);
        }
    }

    public function tableAuthorizationCodeGroupUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'group_authorization_code' => '100',
        			'group_authorization_description' => 'Staff'
        		],
        		(object) [
        			'group_authorization_code' => '200',
        			'group_authorization_description' => 'Pelaksana'
        		],
        	]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableUserAccessGroupUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'group_id' => '001',
        			'group_name' => 'Admin',
        			'group_leader' => 'Admin',
        			'record_status' => 'Active'
        		],
        		(object) [
        			'group_id' => '002',
        			'group_name' => 'Guest',
        			'group_leader' => 'Test01',
        			'record_status' => 'Active'
        		],
        	]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableChangeEmployeeNumberEmployeeUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'employee_no' => 1110001,
        			'employee_name' => 'Joko Santoso',
        			'employee_nickname' => 'Joko'
        		],
        	]);
            return Datatables::of($data)->make(true);
        }
    }

    public function tableUserLogLogUtilities(Request $request)
    {
        if ($request->ajax()) {
        	$data = collect([
        		(object) [
        			'user_id' => 'admin',
        			'session_id' => 'abcabcbcdbcd',
        			'ip_address' => '110.xx.xx.xx',
        			'host_name' => '110.xx.xx.xx',
        			'log_date' => '11/07/2020',
        			'log_time' => '10:03:10',
        			'log_type' => 'IN'
        		],
        	]);
            return Datatables::of($data)->make(true);
        }
    }

    public function dataDetailUserAccessGroupUtilities(Request $request)
    {

        return view('personel.utilities_user_access_group_detail', ['group_id' => $request->group_id]);
    }

    public function tableUserAccessGroupUserUtilities(Request $request)
    {
        if ($request->ajax()) {
            $data = collect();
            return Datatables::of($data)
                ->make(true);
        }
    }
}
