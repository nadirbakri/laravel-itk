<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSIPPOnlineFile1Export implements FromCollection
{
    public function __construct($file1)
    {
        $this->file1 = $file1;
    }

    public function collection()
    {
        $array = explode('\r\n', $this->file1);
        var_dump($array);
        // return Invoice::all();
    }
}
