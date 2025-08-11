<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MedicalCheckupScheduleExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets[] = new MedicalCheckupScheduleTemplateExport();
        $sheets[] = new MedicalCheckupSheet();

        return $sheets;
    }
}