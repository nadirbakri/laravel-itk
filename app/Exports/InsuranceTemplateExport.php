<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InsuranceTemplateExport implements FromView, WithTitle, ShouldAutoSize
{
    public function view(): View
    {
        return view('personel.personel_insurance_template_sheet');
    }

    public function title(): string
    {
        return 'Template Insurance';
    }
}
