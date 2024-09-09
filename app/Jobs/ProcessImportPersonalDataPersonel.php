<?php

namespace App\Jobs;

use App\Imports\PersonalDataImport;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Excel;

class ProcessImportPersonalDataPersonel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $base64File = base64_decode($this->file);

            $tempFilePath = storage_path('app/temp/' . Str::random(10) . '.xlsx');
            Storage::disk('local')->put('temp/' . basename($tempFilePath), $base64File);

            $import = new PersonalDataImport;
            Excel::import($import, $tempFilePath, null, \Maatwebsite\Excel\Excel::XLSX);

            Storage::delete('temp/' . basename($tempFilePath));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $objError = (object) ['status' => false, 'message' => $failures[0]->errors()[0]];
            return array(0 => $objError);
        }

        if(empty($import->getArrResult())){
            $objError = (object) ['status' => false, 'message' => "The Uploaded File Doesn't Match The Template"];
            return array(0 => $objError);
        }
    }
}
