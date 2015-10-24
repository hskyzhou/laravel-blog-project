<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Nav;
use App\Article;

use Markdown;

class IndexController extends Controller
{
    public function index(){
        // /*1. 获取分类*/
        // $navs = Nav::getnav()->get()->toArray();
        // $navIndex = array();
        // // dd($navs);
        // $this->parseArray($navs);

        /*获取文章*/
        $articles = Article::all();

        $returnData = [
            'articles' => $articles,
        ];

        return view('index.index')->with($returnData);
    }

    /**
     * 文章详情页
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-09-04 23:34:23
     * 
     * @return        
     */
    public function detail($id){
        $article = Article::find($id);
        $returnData = [
            'article' => $article,
        ];
        return view('index.detail')->with($returnData);
    }

    /**
     * 文章列表页
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-09-04 23:34:33
     * 
     * @return        
     */
    public function listpage($id){
        return view('index.list');
    }
    /**
     * 解析数组
     * 
     * @param       
     * 
     * @author      wen.zhou@bioon.com
     * 
     * @date        2015-09-03 07:49:53
     * 
     * @return      
     */
    private function parseArray($navs){
        // dd($navs);
        $navs = Nav::indexGetnav()->get()->toArray();
        $navIndex = array();

        // dd($navs)
        // foreach($navs as $nav_key => $nav_val){
        //  $cata_path_arr = explode('-', $nav_val->cata_path);

        //  print_r($cata_path_arr);exit;
        // }
        // print_r($navs);exit;
        // foreach($navs as $nav){
        //     $navIndex[$nav['cata_parent_id']]['son'][$nav['id']] = &$navs[$nav['id']];
        // }
        // print_r($navIndex);exit;
        // foreach ($items as $item){
        //     $items[$item['pid']]['son'][$item['id']] = &$items[$item['id']];
        // }
        // return isset($items[0]['son']) ? $items[0]['son'] : array();

        // foreach($navs as $nav_key => $nav_val){

        //     $navIndex[$nav_val->cata_parent_id]['son'][$nav_val->id] = &$navIndex[$nav_val->id];
        //     // $cata_path_arrs = explode('-', $nav_val->cata_path);  // ?

        //     // print_r($cata_path_arr);exit;
        //     // foreach($cata_path_arrs as $cata_path_arr){
        //     //     $navIndex[$cata_path_arr] 
        //     // }
        //     // $navIndex[$nav_val->cata_path]['name'] = $nav_val->cata_parent_name;
        //     // $navIndex[$nav_val->cata_path]['son'][$nav_val->id] = $nav_val;
        // }

        foreach ($navs as $nav){
            if (isset($navs[$nav['cata_parent_id']])){
                $navs[$nav['cata_parent_id']]['son'][] = &$navs[$nav['id']];
            }
            else{
                $navIndex[] = &$navs[$nav['id']];
            }
        }
        return $navIndex;

        dd($navIndex);exit;

        return view('index.index')->with($navIndex);
    }

    public function markdown(){
        return Markdown::convertToHtml('#python测试1. python基础2. python语法3. python高级##python基础##python语法## python高级');
        // return view('test.markdown');
    }
}
