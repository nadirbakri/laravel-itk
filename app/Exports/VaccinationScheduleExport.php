<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class VaccinationScheduleExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets[] = new VaccinationScheduleTemplateExport();
        $sheets[] = new VaccineSheet();

        return $sheets;
    }
}