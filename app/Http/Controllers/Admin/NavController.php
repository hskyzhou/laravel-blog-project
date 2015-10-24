<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nav;

class NavController extends Controller
{
    public function getIndex(){
        return view('admin.index');
    }

    public function getNavindex(){
        return view('nav.index');
    }

    /**
     * 显示修改分类的数据
     * 
     * @author wen.zhou@bioon.com 2015-08-04 11:05:37
     * 
     * @return 
     */
    public function getEdit($id){
    	$navInfo = Nav::where('id', $id)->first();
    	// dd($navInfo);
    	$navArray = $navInfo->toArray();
    	return view('nav.edit', $navArray);
    }

    /**
     * 显示添加分类的数据
     * 
     * @author wen.zhou@bioon.com 2015-08-04 11:05:37
     * 
     * @return 
     */
    public function getAdd(){
        return view('nav.add');
    }

    /**
     * 显示nav分类数据
     * 
     * @author wen.zhou@bioon.com 2015-08-04 11:05:54
     * 
     * @return 
     */
    public function getShow(Request $request){
        $draw = $request->input('draw', 1);

        $navList = Nav::select('cata_id', 'cata_name', 'cata_type', 'cata_status', 'cata_path')->get();

        return array(
            "draw" => $draw,
            "recordsTotal" => $navList->count(),
            "recordsFiltered" => $navList->count(),
            "data" => $navList->toArray(),
        );
    }

    /**
     * 显示分类的来源
     * 
     * @author wen.zhou@bioon.com 2015-08-04 11:06:18
     * @param $content 内容
     * @return 
     */
    public function getNavfrom($content=''){
        $navFrom = array(
            array(
                'value' => 'admin',
                'desc' => '后台nav分类',
            ),
            array(
                'value' => 'index',
                'desc' => '前台分类',
            ),
        );
        return response()->json($navFrom);
    }
    
    
}
