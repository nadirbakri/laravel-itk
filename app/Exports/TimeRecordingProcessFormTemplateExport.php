<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TimeRecordingProcessFormTemplateExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('time_management.tm_export_template_time_recording_process_form');
    }
}
