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

class EmployeeGroupMemberTemplateExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('master_data.master_data_export_template_employee_group_member');
    }
}
