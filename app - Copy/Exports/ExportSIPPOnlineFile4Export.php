<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ExportSIPPOnlineFile4Export implements FromArray
{
    public function __construct($file4)
    {
        $this->file4 = $file4;
    }

    public function array(): array
    {
        $array = explode("\r\n", $this->file4);
        foreach($array as $key => $value){
            $arrayTwo = explode(";", $value);
            $array[$key] = $arrayTwo;
        }
        
        return $array;
    }
}
