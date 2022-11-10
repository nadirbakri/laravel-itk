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
use PDF;
use PhpParser\Node\NullableType;

class MasterDataController extends Controller
{
    public function pageMasterData(){
        return view('master_data.master_data_main');
    }

    public function pageMasterDataEmployeeMaster(){
        return view('master_data.master_data_employee_master');
    }

    public function pageMasterDataEmployeeGroup(){
        return view('master_data.master_data_employee_group');
    }

    public function pageMasterDataEmployeeGroupDetail(){
        return view('master_data.master_data_employee_group_detail');
    }
   
    public function pageMasterDataEmployeeGroupReimbursement(){
        return view('master_data.master_data_employee_group_reimbursement');
    }
    
    public function pageMasterDataHolidayCalender(){
        return view('master_data.master_data_holiday_calender');
    }
    
    public function pageMasterDataBussinesTrip(){
        return view('master_data.master_data_bussines_trip');
    }
    
    public function pageMasterDataBussinesTripDetail(){
        return view('master_data.master_data_bussines_trip_detail');
    }
  
    public function pageMasterDataEmployeeGroupReimbursementDetail(){
        return view('master_data.master_data_reimbursement_detail');
    }

}