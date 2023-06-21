<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ExportSIPPOnlineFile1Export implements FromArray
{
    public function __construct($file1)
    {
        $this->file1 = $file1;
    }

    public function array(): array
    {
        $array = explode("\r\n", $this->file1);
        foreach($array as $key => $value){
            $arrayTwo = explode(";", $value);
            $array[$key] = $arrayTwo;
        }
        
        return $array;
    }
}
