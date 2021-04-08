<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class LoginController extends Controller
{
    public function pageLogin()
    {
        return view('login.login');
    }

    public function prosesLogin(Request $request)
    {
    	try {
	    	$client = new Client([
	    		'headers' => [ 'Content-Type' => 'application/json' ]
	    	]);

	    	$response = $client->post(env('API_URL') . '/auth',
	    		['body' => json_encode(
	    			[
	    				'username' => $request->username_login,
	    				'password' => $request->password_login,
	    				'languageCode' => $request->pilih_bahasa
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($arrResult->status == "true"){
	    	return redirect()->route('home')->with('alert', $arrResult->message);
	    }else{
	    	return redirect()->back()->with('alert', $arrResult->message);
	    }
    }
}
