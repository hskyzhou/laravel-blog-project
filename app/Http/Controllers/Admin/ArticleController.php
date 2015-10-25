<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Controllers\Controller;

use App\Article;

use App\Http\Requests\ArticleFormRequest;

class ArticleController extends Controller
{
    protected $current_user;

	public function __construct(){
        $this->current_user = auth()->user();

        $this->middleware('permission:show.article.manage');

        $this->middleware('permission:show.article.list', ['only' => ['getIndex', 'getNgIndex', 'getList', 'getNgarticleList', 'getApiarticlelist', 'getApiarticlesonlist']]);

        $this->middleware('permission:update.articles', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:add.articles', ['only' => ['getAdd', 'postAdd']]);
        $this->middleware('permission:delete.articles', ['only' => ['postDelete']]);
	}
	
	/**
	 * 文章起始页
	 * 
	 * @param		
	 * 
	 * @author		wen.zhou@bioon.com
	 * 
	 * @date		2015-10-17 00:18:04
	 * 
	 * @return		
	 */
    public function getIndex(){	
    	return view('admin.article.index');
    }

    /**
     * 文章列表
     * 
     * @param       
     * 
     * @author      wen.zhou@bioon.com
     * 
     * @date        2015-10-17 00:18:18
     * 
     * @return      
     */
    public function getList(){
        return view('admin.article.index');
    }

    /**
     * 文章添加
     * 
     * @param       
     * 
     * @author      wen.zhou@bioon.com
     * 
     * @date        2015-10-17 00:18:18
     * 
     * @return      
     */
    public function getAdd(){
        return view('admin.article.index');
    }

    /**
     * 文章修改
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-25 11:39:03
     * 
     * @return        
     */
    public function getUpdate(){
        return view('admin.article.index');
    }

    /**
     * 菜单起始页的angular
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-17 00:18:49
     * 
     * @return		
     */
    public function getNgIndex(){
    	return '<div ui-view></div>';
    }

    /**
     * 文章列表--ng
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-25 11:40:21
     * 
     * @return        
     */
    public function getNgList(){
    	$returnData = [
    		'is_add' => $this->current_user->can('add.articles'),
    	];
        return view('admin.article.list')->with($returnData);
    }

    /**
     * 获取添加界面--ng
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-25 10:39:01
     * 
     * @return		
     */
    public function getNgAdd(){
    	return view('admin.article.add');
    }

    /**
     * 获取添加界面--ng
     * 
     * @param       
     * 
     * @author      wen.zhou@bioon.com
     * 
     * @date        2015-10-25 10:39:01
     * 
     * @return      
     */
    public function getNgUpdate(){
    	$id = request('id', 0);
    	
    	if(is_numeric($id) && !empty($id)){
    		$article = Article::find($id);
    		if(! collect($article)->isEmpty()){
    			$returnData = [
    				'status' => true,
    				'msg' => '获取成功',
    				'article' => $article,
    			];
    		}else{
    			$returnData = [
    				'status' => false,
    				'msg' => '获取失败'
    			];
    		}
    	}else{
    		$returnData = [
    			'status' => false,
    			'msg' => '获取错误'
    		];
    	}

        return view('admin.article.update')->with($returnData);
    }

    /**
     * 获取文章列表  -- ajax
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-25 11:45:44
     * 
     * @return		
     */
    public function getApiarticlelist(){
    	/*获取参数*/
    	$draw = request('draw', 1);
    	$start = request('start', 0);
    	$length = request('length', 10);
    	$search = request('search.value', '');

    	/*获取菜单*/
    	$obj_article = new Article;

    	$count = $obj_article->count();

    	/*搜索*/
    	if(!empty($search)){
    	    $obj_article = $obj_article::where('name', 'like', '%{$search}%');
    	}

    	/*条数*/
    	if($length != -1){
    	    $obj_article = $obj_article->offset($start)->limit($length);
    	}

    	$result_articles = $obj_article->get();
    	$articles = $result_articles->toArray();

    	foreach($result_articles as $key => $result_article){
    		$articles[$key]['update'] = $this->current_user->can('update.articles');
    		$articles[$key]['delete'] = $this->current_user->can('delete.articles');
    	}

    	$returnData = [
    	    "draw" => $draw,
    	    "recordsTotal" => $count,
    	    "recordsFiltered" => $count,
    	    'data' => $articles
    	];
    	return response()->json($returnData);
    }
    

    /**
     * 添加文章 --post
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-25 10:40:15
     * 
     * @return		
     */
    public function postAdd(ArticleFormRequest $articleFormRequest){
    	$article = Article::create([
    	    'title' => request('title'),
    	    'catagory' => request('catagory'),
    	    'content' => request('content'),
    	    'html_content' => request('html_content'),
    	    'user_id' => $this->current_user->id,

    	]);

    	return response()->json([
    	    'msg' => '文章添加成功'
    	]);
    }

    /**
     * 修改文章内容--post
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-25 12:45:37
     * 
     * @return		
     */
    public function postUpdate(ArticleFormRequest $articleFormRequest){
    	$id = request('id', 0);

    	$obj_article = new Article;
    	if(is_numeric($id) && !empty($id)){
    		$obj_article = $obj_article->where('id', '=', $id);
    		if(! $obj_article->get()->isEmpty()){
    			$article = $obj_article->first();

    			$article->title = request('title');
    			$article->catagory = request('catagory');
    			$article->content = request('content');
    			$article->html_content = request('html_content');
    			$article->user_id = $this->current_user->id;
    			$update_bool = $article->save();

    			if($update_bool){
    				$returnData = [
    					'status' => true,
    					'success' => [
    						'修改成功'
    					]
    				];
    			}else{
    				$returnData = [
    					'status' => false,
    					'errors' => [
    						'修改失败'
    					]
    				];
    			}
    		}else{
    		$returnData = [
    			'status' => false,
    			'errors' => [
    				'获取错误'
    			],
    		];
    	}
    	}else{
    		$returnData = [
    			'status' => false,
    			'errors' => [
    				'获取错误'
    			],
    		];
    	}

    	return response()->json($returnData);
    }
    

    /**
     * 删除文章
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 19:27:43
     * 
     * @return        
     */
    public function postDelete(){
        $id = request('id', 0);
        $returnData = [];
        if(is_numeric($id) && !empty($id)){
            $article = Article::find($id);
            $delete_bool = $article->delete();
            if($delete_bool){
                $returnData = [
                    'status' => true,
                    'msg' => '删除成功',
                ];
            }else{
                $returnData = [
                    'status' => false,
                    'msg' => '删除失败',
                ];
            }
        }else{
            $returnData = [
                'status' => false,
                'msg' => '获取数据失败',
            ];
        }

        return response()->json($returnData);
    }
    
}
