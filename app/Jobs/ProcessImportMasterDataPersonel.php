<?php

namespace App\Jobs;

use App\Imports\LevelDataImport;
use App\Imports\CostCenterDataImport;
use App\Imports\LocationDataImport;
use App\Imports\PositionDataImport;
use App\Imports\RankingDataImport;
use App\Imports\GradeDataImport;
use App\Imports\GroupDataImport;
use App\Imports\NatureofWorkDataImport;
use App\Imports\InstitutionDataImport;
use App\Imports\MajorDataImport;
use App\Imports\CityDataImport;
use App\Imports\ZipCodeDataImport;
use App\Imports\AccountDataImport;
use App\Imports\JournalTemplateDataImport;
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

class ProcessImportMasterDataPersonel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $maintenanceType;
    private $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($maintenanceType, $file)
    {
        $this->maintenanceType = $maintenanceType;
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

            switch ($this->maintenanceType) {
                case 'level':
                    $import = new LevelDataImport;
                    break;
                case 'cost_center':
                    $import = new CostCenterDataImport;
                    break;
                case 'location':
                    $import = new LocationDataImport;
                    break;
                case 'position':
                    $import = new PositionDataImport;
                    break;
                case 'ranking':
                    $import = new RankingDataImport;
                    break;
                case 'grade':
                    $import = new GradeDataImport;
                    break;
                case 'group':
                    $import = new GroupDataImport;
                    break;
                case 'nature_of_work':
                    $import = new NatureofWorkDataImport;
                    break;
                case 'institution':
                    $import = new InstitutionDataImport;
                    break;
                case 'major':
                    $import = new MajorDataImport;
                    break;
                case 'city':
                    $import = new CityDataImport;
                    break;
                case 'zip_code':
                    $import = new ZipCodeDataImport;
                    break;
                case 'account':
                    $import = new AccountDataImport;
                    break;
                case 'journal_template':
                    $import = new JournalTemplateDataImport;
                    break;
                default:
                    $import = new PersonalDataImport;
            }
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
