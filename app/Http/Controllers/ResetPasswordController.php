<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

class ResetPasswordController extends Controller
{
    public function pageResetPassword()
    {
        return view('login.reset_password');
    }

    public function pageSendOTPResetPassword()
    {
        if(Session::has('email_reset_password')){
            return view('login.send_otp_reset_password');
        }else{
            return redirect()->back();
        }
    }

    public function pageSuccessResetPassword()
    {
        return view('login.success_reset_password');
    }

    public function pageResendResetPassword()
    {
        if(Session::has('email_reset_password')){
            return view('login.resend_reset_password');
        }else{
            return redirect()->back();
        }

        // return view('login.resend_reset_password');
    }

    public function prosesResetPassword(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json' ]
            ]);

            $response = $client->post(env('API_URL') . '/password',
                ['body' => json_encode(
                    [
                        'email' => $request->email_reset_password,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->status == "true"){
            Session::put('email_reset_password', $request->email_reset_password);

            return response()->json(["status" => $arrResult->status, "message" => "/reset_password/send_otp"]);
        }else{
            return response()->json(["status" => $arrResult->status, "message" => $arrResult->message]);
        }
    }

    public function prosesSendOTPResetPassword(Request $request)
    {
        try {
            $client = new Client([
                'headers' => [ 'Content-Type' => 'application/json' ]
            ]);

            $response = $client->put(env('API_URL') . '/password/reset',
                ['body' => json_encode(
                    [
                        'email' => $request->email_otp,
                        'codeOTP' => $request->enter_otp,
                        'languageCode' => App::getLocale()
                    ]
                )]
            );
        } catch (RequestException $e) {
            var_dump($e->getResponse());
        }

        $arrResult = json_decode($response->getBody()->getContents());

        if($arrResult->status == "true"){
            Session::forget('email_reset_password');

            return response()->json(["status" => $arrResult->status, "message" => "/reset_password/success"]);
        }else{
            return response()->json(["status" => $arrResult->status, "message" => $arrResult->message]);
        }
    }
}
