<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PersonalDataTemplateExport implements WithMultipleSheets, ShouldQueue
{
    public function sheets(): array
    {
        $sheets[] = new TemplatePersonalDataTemplateSheet();
        $sheets[] = new TemplatePersonalDataInfoSheet();

        return $sheets;
    }
}
