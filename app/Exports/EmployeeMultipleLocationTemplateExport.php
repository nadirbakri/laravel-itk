<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class EmployeeMultipleLocationTemplateExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {       
        return view('personel.personel_export_template_employee_multiple_location');
    }
}
