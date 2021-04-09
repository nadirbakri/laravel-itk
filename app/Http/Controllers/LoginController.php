<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Validator;
use Session;
use App;

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
	    				'languageCode' => App::getLocale()
	    			]
	    		)]
	    	);
	    } catch (RequestException $e) {
	    	var_dump($e->getResponse());
	    }

	    $arrResult = json_decode($response->getBody()->getContents());

	    if($arrResult->status == "true"){
	    	return view('home', ['data' => $arrResult->dataListSet]);
	    }else{
	    	return redirect()->back()->withErrors(['message' => $arrResult->message]);
	    }
    }
}
