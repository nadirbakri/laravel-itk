<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TemplatePayrollDataBonusTHRTemplateSheet implements FromView, WithTitle, WithEvents, ShouldAutoSize
{
    public function view(): View
    {
        return view('payroll.py_import_template_payroll_data_bonus_thr_template_sheet');
    }

    public function title(): string
    {
        return 'Template';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;

                $cells = $sheet->getDelegate()->getElementsByTagName('td');
                foreach ($cells as $cell) {
                    $dataFormat = $cell->getAttribute('data-format');

                    // Set format sel jika atribut data-format ditemukan
                    if (!empty($dataFormat)) {
                        $sheet->getStyle($cell->getCoordinate())->getNumberFormat()->setFormatCode($dataFormat);
                    }
                }
            },
        ];
    }
}
