<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;

class TemplatePersonalDataTemplateSheet implements FromView, WithTitle
{
    public function view(): View
    {
        return view('personel.personel_export_template_personal_data_template_sheet');
    }

    public function title(): string
    {
        return 'Template';
    }
}
