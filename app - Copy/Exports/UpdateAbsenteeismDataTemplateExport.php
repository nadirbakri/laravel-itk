<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UpdateAbsenteeismDataTemplateExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('time_management.tm_export_template_update_absenteeism_data');
    }
}
