<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VaccinationScheduleTemplateExport implements FromView, WithTitle, ShouldAutoSize
{
    public function view(): View
    {
        return view('medical.md_vaccination_schedule_template_sheet');
    }

    public function title(): string
    {
        return 'Vaccination Schedule Template';
    }
}
