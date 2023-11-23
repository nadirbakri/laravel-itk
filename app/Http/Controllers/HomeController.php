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
    		return redirect()->route('login');
    	}
    }

    public function getURLBreadcrumbs(Request $request)
    {
    	$path = array_filter(explode('/', parse_url($request->get('url_data'), PHP_URL_PATH)));
		// var_dump($path);
    	$breadcrumbs = array();
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $path[2]));
        $first = $path[2];
        $breadcrumbs[] = "<a href=\"$path[2]\" target=\"iframe_dashboard\">$title</a>";

        array_shift($path);
        $pathkeys = array_keys($path);
		$pertama = reset($pathkeys);
        $last = end($pathkeys);
    	foreach ($path AS $x => $crumb) {
			if($x != $pertama){
				$title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

				if ($x != $last)
					$breadcrumbs[] = "<a href=\"$first/$crumb\" target=\"iframe_dashboard\">$title</a>";
				else
					$breadcrumbs[] = $title;
			}
    	}

    	return implode('&nbsp; / &nbsp;', $breadcrumbs);
    }
}