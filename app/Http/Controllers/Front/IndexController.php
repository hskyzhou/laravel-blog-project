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
        /*获取文章*/
        $articles = Article::limit(4)->get();

        return view('front.index')->with(compact('articles'));
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
    public function getList($id){
        return view('index.list');
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
    public function getDetail($id){
        $article = Article::find($id);
        $returnData = [
            'article' => $article,
        ];
        return view('index.detail')->with($returnData);
    }
}
