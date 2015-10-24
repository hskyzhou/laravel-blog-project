<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Controllers\Controller;

use App\Article;

class ArticleController extends Controller
{
    /**
     * ajax添加文章
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-09-20 05:59:09
     * 
     * @return        
     */
    public function store(StoreArticleRequest $request){
        $article = Article::create([
            'title' => $request->input('title'),
            'catagory' => $request->input('catagory'),
            'content' => $request->input('content'),
            'html_content' => $request->input('html_content'),

        ]);

        return response()->json([
            'msg' => '文章添加成功'
        ]);
    }

    /**
     * 
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-09-20 05:59:20
     * 
     * @return        
     */
    public function add(){
        return view('admin.layout');
    }

    /**
     * angular 添加文章界面
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-09-20 05:59:28
     * 
     * @return        
     */
    public function ng_add(){
        return view('admin.article.add');
    }

    public function show(){
        return 'aa';
    }
}
