<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EBupotCoretaxTemplateExport implements WithMultipleSheets
{
    public function __construct($format, $period, $rectification, $npwpGroup, $printDate, $groupAuthorizedCodeFrom, $groupAuthorizedCodeTo)
    {
        $this->format = $format;
        $this->period = $period;
        $this->rectification = $rectification;
        $this->npwpGroup = $npwpGroup;
        $this->printDate = $printDate;
        $this->groupAuthorizedCodeFrom = $groupAuthorizedCodeFrom;
        $this->groupAuthorizedCodeTo = $groupAuthorizedCodeTo;
    }

    public function sheets(): array
    {
        $sheets[] = new CoretaxEBupotSheet(
            $this->format, 
            $this->period,
            $this->rectification,
            $this->npwpGroup,
            $this->printDate,
            $this->groupAuthorizedCodeFrom,
            $this->groupAuthorizedCodeTo
        );

        return $sheets;
    }
}
