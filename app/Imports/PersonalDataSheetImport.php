<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class w implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new PersonalDataImport()
        ];
    }
}
