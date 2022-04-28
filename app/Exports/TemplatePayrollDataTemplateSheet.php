<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TemplatePayrollDataTemplateSheet implements FromView, WithTitle, ShouldAutoSize
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
    public function view(): View
    {
        return view('payroll.py_import_template_payroll_data_template_sheet', [
            'column_a' => $this->columnA,
            'column_b' => $this->columnB,
            'column_c' => $this->columnC,
            'column_d' => $this->columnD,
            'column_e' => $this->columnE,
            'column_f' => $this->columnF,
            'column_g' => $this->columnG,
            'column_h' => $this->columnH,
            'column_i' => $this->columnI,
            'column_j' => $this->columnJ,
            'column_k' => $this->columnK,
            'column_l' => $this->columnL,
        ]);
    }

    public function title(): string
    {
        return 'Template';
    }
}
