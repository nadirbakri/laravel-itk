<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

class ChangePasswordController extends Controller
{
    public function pageChangePassword()
    {
        if(Session::has('token')){
            return view('change_password');
        }else{
            return redirect()->route('login');
        }
    }

    public function prosesChangePassword(Request $request)
    {
        try {
            $client = new Client([
                'verify' => false,
                'headers' => [ 'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . Session::get('token') ]
            ]);

            $response = $client->put(env('API_URL') . '/mobile/Password/update',
                ['body' => json_encode(
                    [
                        'email' => Session::get('email'),
                        'userID' => Session::get('userID'),
                        'password' => $request->new_password,
                        'confirmpassword' => $request->confirm_new_password,
                        'oldpassword' => $request->old_password
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

        return response()->json(["status" => $arrResult->status, "message" => $arrResult->message]);
    }
}
