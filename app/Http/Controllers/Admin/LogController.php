<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function getNgIndex(){
        return '<div ui-view></div>';
    }
    
    public function getList(){
        return view('admin.log.index');
    }


    public function getOverall(){
        return view('admin.log.index');

    }

    public function getDetail(){
        return view('admin.log.index');
    }

    public function getType(){
        return view('admin.log.index');
    }

    public function getDownload(){
        return view('admin.log.index');
    }

}
