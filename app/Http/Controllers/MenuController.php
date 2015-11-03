<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function getIndex(){
        // echo 'aaaa';
        return view('front.index');
    }

    public function getTest(){
        return view('front.test');
    }

    public function getDemo(){
        return view('front.demo');
    }
}
