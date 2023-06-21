<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ExportSIPPOnlineFile3Export implements FromArray
{
    public function __construct($file3)
    {
        $this->file3 = $file3;
    }

    public function array(): array
    {
        $array = explode("\r\n", $this->file3);
        foreach($array as $key => $value){
            $arrayTwo = explode(";", $value);
            $array[$key] = $arrayTwo;
        }
        
        return $array;
    }
}
