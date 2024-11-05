<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PlafonTemplateExport implements WithMultipleSheets
{
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function sheets(): array
    {
        $sheets[] = new TemplatePlafonTemplateSheet($this->type);
        $sheets[] = new TemplatePlafonInfoTemplateSheet($this->type);

        return $sheets;
    }
}
