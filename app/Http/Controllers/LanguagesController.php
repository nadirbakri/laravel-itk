<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguagesController extends Controller
{
	public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }

        return Redirect::back();
    }

    public function prosesChangeLanguage(Request $request)
    {
        $lang = strtoupper($request->change_language);
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);

            return response()->json(["status" => true]);
        }else{
            return response()->json(["status" => false, "message" => 'Something Went Wrong.']);
        }
    }
}
