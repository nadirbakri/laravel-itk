<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PersonalDataPartialTemplateExport implements WithMultipleSheets
{
    public function __construct($columnA, $columnB, $columnC, $columnD, $columnE, $columnF, $columnG, $columnH, $columnI, $columnJ, $columnK, $columnL)
    {
        $this->columnA = $columnA;
        $this->columnB = $columnB;
        $this->columnC = $columnC;
        $this->columnD = $columnD;
        $this->columnE = $columnE;
        $this->columnF = $columnF;
        $this->columnG = $columnG;
        $this->columnH = $columnH;
        $this->columnI = $columnI;
        $this->columnJ = $columnJ;
        $this->columnK = $columnK;
        $this->columnL = $columnL;
    }

    public function sheets(): array
    {
        $sheets[] = new TemplatePersonalDataPartialTemplateSheet(
            $this->columnA,
            $this->columnB,
            $this->columnC,
            $this->columnD,
            $this->columnE,
            $this->columnF,
            $this->columnG,
            $this->columnH,
            $this->columnI,
            $this->columnJ,
            $this->columnK,
            $this->columnL
        );
        $sheets[] = new TemplatePersonalDataInfoSheet();

        return $sheets;
    }
}
