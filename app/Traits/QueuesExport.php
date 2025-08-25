<?php

namespace App\Traits;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

trait QueuesExport
{
    protected function queueExport($export, string $fileName): string
    {
        $company = Session::get('companyCode');
        $user = Session::get('userID');
        $path = "exports/$company/$user";
        Storage::makeDirectory($path);
        Excel::queue($export, "$path/$fileName");
        $jobId = (string) Str::uuid();
        Session::push('export_jobs', [
            'id' => $jobId,
            'filename' => $fileName,
            'path' => "$path/$fileName",
            'status' => 'queued',
            'progress' => 0,
        ]);
        return $jobId;
    }
}
