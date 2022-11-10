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
}