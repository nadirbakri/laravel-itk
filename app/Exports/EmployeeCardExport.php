<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Validator;
use Session;
use App;

class EmployeeCardExport implements FromView, ShouldAutoSize
{
    // public function __construct($employeeNoFrom, $employeeNoTo, $includeResign, $position, $ranking, $location, $family, $training_records, $formal_education, $historical_jobs, $language, $work_experience, $organization, $award, $project_experience, $sanction)
    // {
    //     $this->employeeNoFrom = $employeeNoFrom;
    //     $this->employeeNoTo = $employeeNoTo;
    //     $this->includeResign = $includeResign;
    //     $this->position = $position;
    //     $this->ranking = $ranking;
    //     $this->location = $location;
    //     $this->family = $family;
    //     $this->training_records = $training_records;
    //     $this->formal_education = $formal_education;
    //     $this->historical_jobs = $historical_jobs;
    //     $this->language = $language;
    //     $this->work_experience = $work_experience;
    //     $this->organization = $organization;
    //     $this->award = $award;
    //     $this->project_experience = $project_experience;
    //     $this->sanction = $sanction;
    // }
    public function view(): View
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'recordStatus' => 'A', 
                'companyCode' => Session::get('companyCode'), 
                'employeeNo' => '0505',
                'languageID' => App::getLocale(), 
                'sessionID' => 0, 
                'sessionUserID' => Session::get('userID'),
                // 'includeResign' => $this->includeResign,
                // 'family' => $this->family,
                // 'training_records' => $this->training_records,
                // 'formal_education' => $this->formal_education,
                // 'historical_jobs' => $this->historical_jobs,
                // 'language' => $this->language,
                // 'work_experience' => $this->work_experience,
                // 'organization' => $this->organization,
                // 'award' => $this->award,
                // 'project_experience' => $this->project_experience,
                // 'sanction' => $this->sanction
            ];

            // if(!empty($this->employeeNoFrom) || !empty($this->employeeNoTo)){
            //     $param['employeeNoFrom'] = $this->employeeNoFrom;
            //     $param['employeeNoTo'] = $this->employeeNoTo;
            // }

            // if(!empty($this->position) && !is_null($this->position[0])){
            //     foreach($this->position as $value){
            //         $data_position[] = [
            //             'positionCode' => $value
            //         ];
            //     }
            //     $param['position'] = $data_position;
            // }

            // if(!empty($this->location) && !is_null($this->location[0])){
            //     foreach($this->location as $value){
            //         $data_location[] = [
            //             'locationCode' => $value
            //         ];
            //     }
            //     $param['location'] = $data_location;
            // }

            // if(!empty($this->ranking) && !is_null($this->ranking[0])){
            //     foreach($this->ranking as $value){
            //         $data_ranking[] = [
            //             'rankingCode' => $value
            //         ];
            //     }
            //     $param['ranking'] = $data_ranking;
            // }

            // var_dump(json_encode($param));

            $response = $client->post(env('API_URL') . '/pemaster/getpemasterdetail',
                ['body' => json_encode($param)]
            );
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());

        // var_dump($arrResult->dataListSet);

        if($arrResult->dataListSet == null){
            return view('personel.personel_export_employee_card', [
                'data' => []
            ]);
        }else{
            return view('personel.personel_export_employee_card', [
                'data' => $arrResult->dataListSet
            ]);
        }
    }
}
