<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;
use File;
use DataTables;
use Excel;
use PDF;
use PhpParser\Node\NullableType;

class AdminMenuController extends Controller
{
    public function pageAdminMenu(){
        return view('admin_menu.admin_main');
    }
    public function pageMaps(){
        return view('admin_menu.maps');
    }
    public function pageMapsAll(){
        return view('admin_menu.mapsall');
    }
    
    public function pageAdminMenuUserMaster(){
        return view('admin_menu.admin_main_user_master');
    }
    
    public function pageAdminMenuUserGroup(){
        return view('admin_menu.admin_main_user_group');
    }
    
    public function pageAdminMenuMaster(){
        return view('admin_menu.admin_main_menu_master');
    }
    
    public function pageAdminMenuCheckinList(){
        return view('admin_menu.admin_main_menu_checkin_list');
    }
    
    public function pageAdminMenuNewsMaster(){
        return view('admin_menu.admin_main_menu_news_master');
    }

    public function pageAdminNewsList(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID'),
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/mobile/News/getNews',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function pageAdminMenuNews(Request $request)
    {
        $pathImage = "";
        $pathFile = "";
        $imageName = "";
        $fileName = "";

        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            if($request->hasFile('image_attachment')) {
                $file = $request->file('image_attachment');
                $imageName = Session::get('companyCode') . '_News_' . $file->getClientOriginalName();
                $file->move(public_path('photo_news'), $imageName);
                $pathImage = public_path('photo_news/');
            }

            if($request->hasFile('file_attachment')) {
                $file2 = $request->file('file_attachment');
                $fileName = Session::get('companyCode') . '_News_' . $file2->getClientOriginalName();
                $file2->move(public_path('file_news'), $fileName);
                $pathFile = public_path('file_news/');
            }

            $param = [
                'companyCode' => Session::get('companyCode'),
                'languageCode' => App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                'title' => $request->t_news,
                'category' => $request->n_category,
                'content' => $request->c_news,
                'recordStatus' => "A"
            ];

            if($request->hasFile('image_attachment')){
                $param['photo'] = base64_encode(file_get_contents($pathImage . $imageName));
            }

            if($request->hasFile('file_attachment')){
                $param['pdfFile'] = base64_encode(file_get_contents($pathFile . $fileName));
            }

            // var_dump(json_encode($param));

            if ($request->t_news2 == "new"){
                $response = $client->post(env('API_URL') . '/mobile/News/insertNews',
                    ['body' => json_encode($param)]
                );
            }else {
                if(isset($request->sysno)){
                    $param['sysNo'] = (int) $request->sysno;
                }

                $response = $client->put(env('API_URL') . '/mobile/News/updateNews',
                    ['body' => json_encode($param)]
                );
            }
              

        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
 
    public function pageNewsMasterRemove(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            
            $imgdata = base64_decode($value['attachmentFile']);
            $f = finfo_open();
            $mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);

            $filename = $value['companyCode'] . '_' . $value['employeeNo'] . '_' . $value['attachmentCode'] . '_' . $value['fileName'] . '.' . $mime_map[$mime_type];
            File::delete('attachment/'.$filename);

            $response = $client->delete(env('API_URL') . '/mobile/News/deleteNewsCategory',
                ['body' => json_encode(
                    [
                        'recordStatus' => "A",
                        'companyCode' => Session::get('companyCode'),
                        'categoryName' => $request->n_category,
                        'languageCode' => App::getLocale(),
                        'sessionID' => 0,
                        'sessionUserID' => Session::get('userID'),
                        'title' => $request->t_news,
                        'content' => $request->c_news,
                        'sysNo' => (int) $request->sysno
                    ]
                )]
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

        return response()->json(['status' => $arrResult->status, 'message' =>  $arrResult->message]);
    }

    public function listAnnouncementAdminMenu(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            // var_dump(json_encode(
            //     [
            //         'companyCode' => Session::get('companyCode'), 
            //         'languageCode' => App::getLocale(), 
            //         'sessionID' => 0, 
            //         'sessionUserID' => Session::get('userID'),
            //     ]
            //     ));
            $response = $client->post(env('API_URL') . '/payroll/Announcement/getAnnouncement',
                ['body' => json_encode(
                    [
                        'companyCode' => Session::get('companyCode'), 
                        'languageCode' => App::getLocale(), 
                        'sessionID' => 0, 
                        'sessionUserID' => Session::get('userID'),
                    ]
                )]
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

        if($arrResult->dataListSet == null){
            return Datatables::of([])->make(true);
        }else{
            return Datatables::of($arrResult->dataListSet)->make(true);
        }
    }

    public function prosesAnnouncementAdminMenu(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $param = [
                'recordStatus' => "A",
                'companyCode' => Session::get('companyCode'),
                'languageCode' => App::getLocale(),
                'sessionID' => 0,
                'sessionUserID' => Session::get('userID'),
                'title' => $request->t_announcement,
                'category' => $request->n_announcement,
                'content' => $request->c_announcement,
                'pinned' => isset($request->pinned_announcement) ? (bool) $request->pinned_announcement : false
            ];

            if ($request->status == "new"){
                $response = $client->post(env('API_URL') . '/payroll/Announcement/insertAnnouncement',
                    ['body' => json_encode($param)]
                );
            }else {
                if(isset($request->seq_no)){
                    $param['seqNo'] = (int) $request->seq_no;
                }

                $response = $client->put(env('API_URL') . '/payroll/Announcement/updateAnnouncement',
                    ['body' => json_encode($param)]
                );
            }
              

        } catch (RequestException $e) {
            $response = $e->getResponse();
            // var_dump($response);
            if($response->getStatusCode() == 401){
                return view('error.login');
            }else if($response->getStatusCode() == 404){
                return view('error.not_found');
            }else{
                return view('error.bad_request');
            }
        }

        $arrResult = json_decode($response->getBody()->getContents());
        return response()->json(['status' => $arrResult->status, 'message' => $arrResult->message]);
    }
}