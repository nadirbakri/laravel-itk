<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PersonalDataTemplateExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets[] = new TemplatePersonalDataTemplateSheet();
        $sheets[] = new TemplatePersonalDataInfoSheet();

        return $sheets;
    }
}