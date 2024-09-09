<?php

namespace App\Jobs;

use App\Imports\PersonalDataUpdateImport;
use App\Imports\PersonalDataPartialUpdateImport;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Excel;

class ProcessImportUpdatePersonalDataPersonel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $maintenanceType;
    private $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($importType, $file)
    {
        $this->importType = $importType;
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

            if(isset($this->importType) && $this->importType == "PARTIAL"){
                $import = new PersonalDataPartialUpdateImport(
                    $request->transfer_to,
                    $request->column_a,
                    $request->column_b,
                    $request->column_c,
                    $request->column_d,
                    $request->column_e,
                    $request->column_f,
                    $request->column_g,
                    $request->column_h,
                    $request->column_i,
                    $request->column_j,
                    $request->column_k,
                    $request->column_l
                );
                Excel::import($import, $tempFilePath, null, \Maatwebsite\Excel\Excel::XLSX);
            }else{
                $import = new PersonalDataUpdateImport;
                Excel::import($import, $tempFilePath, null, \Maatwebsite\Excel\Excel::XLSX);
            }

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
