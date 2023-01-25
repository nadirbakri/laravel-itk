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
            $response = $client->post(env('API_URL') . '/news/getnews',
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
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            if($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = Session::get('companyCode') . '_' . $file->getClientOriginalName();
                $file->move(public_path('photo_profile'), $filename);
                $path = public_path('photo_profile/');
            }
                // var_dump(json_encode(
                //     [
                //         'companyCode' => Session::get('companyCode'),
                //         'languageCode' => App::getLocale(),
                //         'sessionID' => 0,
                //         'sessionUserID' => Session::get('userID'),
                //         'title' => $request->t_news,
                //         'category' => $request->n_category,
                //         'content' => $request->c_news,
                //         'recordStatus' => "A"
                //     ]
                //     ));
                if ($request->t_news2 == "new"){
                    $response = $client->post(env('API_URL') . '/news/insertnews',
                        ['body' => json_encode(
                            [
                                'companyCode' => Session::get('companyCode'),
                                'languageCode' => App::getLocale(),
                                'sessionID' => 0,
                                'sessionUserID' => Session::get('userID'),
                                'title' => $request->t_news,
                                'category' => $request->n_category,
                                'content' => $request->c_news,
                                'recordStatus' => "A",
                                'photo' => ($request->hasFile('photo')) ? base64_encode(file_get_contents($path . $filename)) : '',
                            ]
                        )]
                    );
                }else {
                    $response = $client->post(env('API_URL') . '/news/updatenews',
                    ['body' => json_encode(
                        [
                            'companyCode' => Session::get('companyCode'),
                            'languageCode' => App::getLocale(),
                            'sessionID' => 0,
                            'sessionUserID' => Session::get('userID'),
                            'title' => $request->t_news,
                            'category' => $request->n_category,
                            'content' => $request->c_news,
                            'recordStatus' => "A",
                            'photo' => ($request->hasFile('photo')) ? base64_encode(file_get_contents($path . $filename)) : '',
                        ]
                    )]
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
                'headers' => [ 'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);
            if($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = Session::get('companyCode') . '_' . $file->getClientOriginalName();
                $file->move(public_path('photo_profile'), $filename);
                $path = public_path('photo_profile/');
            }

            $response = $client->delete(env('API_URL') . '/news/deletenewscategory',
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
                        'photo' => ($request->hasFile('photo')) ? base64_encode(file_get_contents($path . $filename)) : '',
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
}