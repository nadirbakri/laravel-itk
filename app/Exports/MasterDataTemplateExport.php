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

class MasterDataTemplateExport implements FromView, ShouldAutoSize
{
    public function __construct($type)
    {
        $this->type = $type;
    }

    public function view(): View
    {
        switch ($this->type) {
            case 'level':
                return view('personel.personel_export_level_master');
                break;
            case 'cost_center':
                return view('personel.personel_export_cost_center_master');
                break;
            case 'location':
            return view('personel.personel_export_location_master');
                break;
            case 'office_location':
                return view('personel.personel_export_office_location_master');
                break;
            case 'position':
                return view('personel.personel_export_position_master');
                break;
            case 'ranking':
                return view('personel.personel_export_ranking_master');
                break;
            case 'grade':
                return view('personel.personel_export_grade_master');
                break;
            case 'group':
                return view('personel.personel_export_group_master');
                break;
            case 'nature_of_work':
                return view('personel.personel_export_nature_of_work_master');
                break;
            case 'institution':
                return view('personel.personel_export_institution_master');
                break;
            case 'major':
                return view('personel.personel_export_major_master');
                break;
            case 'city':
                return view('personel.personel_export_city_master');
                break;
            case 'zip_code':
                return view('personel.personel_export_zip_code_master');
                break;
            case 'title':
                return view('personel.personel_export_title_master');
                break;
            case 'account':
                return view('personel.personel_export_account_master');
                break;
            case 'journal_template':
                return view('personel.personel_export_journal_template_master');
                break;
            default:
                return view('personel.personel_export_level_master');
        }
    }
}
