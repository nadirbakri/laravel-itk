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
    	$breadcrumbs = array();
        $title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $path[1]));
        $first = $path[1];
		if($path[1] == "personnel"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=PE\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "time_management"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=TM\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "payroll"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=PY\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "medical"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=MD\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "utilities"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=UTI\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "report"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=REP\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "export"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=RPT\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "transaction"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=TRX\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "master_data"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=MOB\" target=\"iframe_dashboard\">$title</a>";
		} else if($path[1] == "darwin_integration"){
			$breadcrumbs[] = "<a href=\"$path[1]?moduleID=IDB\" target=\"iframe_dashboard\">$title</a>";
		}else{
			$breadcrumbs[] = "<a href=\"$path[1]\" target=\"iframe_dashboard\">$title</a>";
		}

        array_shift($path);
        $pathkeys = array_keys($path);
		$pertama = reset($pathkeys);
        $last = end($pathkeys);
    	foreach ($path AS $x => $crumb) {
			$title = ucwords(str_replace(Array('.php', '_'), Array('', ' '), $crumb));

			if ($x != $last)
				$breadcrumbs[] = "<a href=\"$first/$crumb\" target=\"iframe_dashboard\">$title</a>";
			else
				$breadcrumbs[] = $title;
    	}

    	return implode('&nbsp; / &nbsp;', $breadcrumbs);
    }
}