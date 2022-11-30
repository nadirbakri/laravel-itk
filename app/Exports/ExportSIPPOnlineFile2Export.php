<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ExportSIPPOnlineFile2Export implements FromArray
{
    public function __construct($file2)
    {
        $this->file2 = $file2;
    }

    public function array(): array
    {
        $array = explode("\r\n", $this->file2);
        foreach($array as $key => $value){
            $arrayTwo = explode(";", $value);
            $array[$key] = $arrayTwo;
        }
        
        return $array;
    }
}
