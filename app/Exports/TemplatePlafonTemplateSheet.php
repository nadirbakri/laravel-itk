<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TemplatePlafonTemplateSheet implements FromView, WithTitle, ShouldAutoSize
{
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        return view('personel.personel_plafon_template_sheet',[
            'type' => $this->type
        ]);
    }

    public function title(): string
    {
        if ($this->type === 'MEDICAL') {
            return 'Template Plafon Medical';
        }
        else if ($this->type === 'BUSINESSTRIP') {
            return 'Template Plafon Business Trip';
        }
        else if ($this->type === 'TUNJANGAN') {
            return 'Template Plafon Tunjangan';
        }
        else {
            return 'Template Plafon Transport';
        }
    }
}
