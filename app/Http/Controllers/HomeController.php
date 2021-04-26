<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;

class HomeController extends Controller
{
    public function pageMain()
    {
        if(Session::has('token')){
    		return view('main');
    	}else{
    		return redirect('login');
    	}
    }

    public function getURLBreadcrumbs(Request $request)
    {
    	$path = array_filter(explode('/', parse_url($request->get('url_data'), PHP_URL_PATH)));

    	$breadcrumbs = array();

    	$pathkeys = array_keys($path);

    	$last = end($pathkeys);

    	foreach ($path AS $x => $crumb) {
    		$title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

    		if ($x != $last)
    			$breadcrumbs[] = "<a href=\"$crumb\" target=\"iframe_dashboard\">$title</a>";
    		else
    			$breadcrumbs[] = $title;
    	}

    	return implode('&nbsp; / &nbsp;', $breadcrumbs);
    }
}
