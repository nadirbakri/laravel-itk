<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class EmployeeGroupTemplateExport implements FromView, ShouldAutoSize
{
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        switch ($this->type) {
            case 'BUSINESS_TRIP':
                return view('master_data.master_data_export_template_employee_group_business_trip');
                break;
            case 'REIMBURSEMENT':
                return view('master_data.master_data_export_template_employee_group_reimbursement');
                break;
            case 'LEAVE':
                return view('master_data.master_data_export_template_employee_group_leave');
                break;
            case 'PERMIT':
                return view('master_data.master_data_export_template_employee_group_permit');
                break;
            case 'OVERTIME':
                return view('master_data.master_data_export_template_employee_group_overtime');
                break;
            case 'MULTIPLE_CHECK_IN':
                return view('master_data.master_data_export_template_employee_group_multiple_checkin');
                break;
            default:
                return view('master_data.master_data_export_template_employee_group_business_trip');
        }
    }
}
