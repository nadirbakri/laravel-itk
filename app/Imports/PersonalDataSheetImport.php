<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PersonalDataSheetImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new PersonalDataImport()
        ];
    }
}
