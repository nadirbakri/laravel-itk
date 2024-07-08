<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TemplatePayrollDataBonusTHRTemplateSheet implements FromView, WithTitle, ShouldAutoSize
{
    public function view(): View
    {
        return view('payroll.py_import_template_payroll_data_bonus_thr_template_sheet');
    }

    public function title(): string
    {
        return 'Template';
    }
}
