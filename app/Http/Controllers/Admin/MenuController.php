<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Contracts\MenuContract;
use App\Menu;
use Bican\Roles\Models\Permission;

use Debugbar;

class MenuController extends Controller
{
    protected $current_user;

	public function __construct(){
        $this->current_user = auth()->user();

        $this->middleware('permission:show.menu.manage');

        $this->middleware('permission:show.menu.list', ['only' => ['getIndex', 'getNgIndex', 'getList', 'getNgMenuList', 'getApimenulist', 'getApimenusonlist']]);

        $this->middleware('permission:update.menus', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:add.menus', ['only' => ['getAdd', 'postAdd']]);
        $this->middleware('permission:delete.menus', ['only' => ['postDelete']]);
	}
	
	/**
	 * 菜单起始页
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
    	return view('admin.menu.index');
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
     * 菜单列表
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-17 00:18:18
     * 
     * @return		
     */
    public function getList(){
    	return view('admin.menu.index');
    }
    
    /**
     * 菜单列表页的angular
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-17 00:19:36
     * 
     * @return		
     */
    public function getNgMenuList(){
        $returnData = [
            'is_add' => $this->current_user->can('add.menus')
        ];
    	return view('admin.menu.list')->with($returnData);
    }

    /**
     * 菜单列表的api
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-17 00:44:34
     * 
     * @return		
     */
    public function getApimenulist(MenuContract $menuCon){
        /*获取参数*/
        $draw = request('draw', 1);
        $start = request('start', 0);
        $length = request('length', 10);
        $search = request('search.value', '');

        /*获取菜单*/
        $obj_menus = new Menu;
        $count = $obj_menus->count();

        $obj_menus = $obj_menus->with('parentmenu')->where('parent_id', '=', '1');

        $filterCount = $obj_menus->count();

        if(!empty($search)){
            $obj_menus = $obj_menus->where('name', 'like', "%{$search}%");
        }

        /*分页*/
        if($length != -1){
            $obj_menus = $obj_menus->offset($start)->limit($length);
        }

        $result_menus = $obj_menus->get();

        $menus = $result_menus->toArray();

        foreach($result_menus as $key => $result_menu){
            $menus[$key]['update'] = $this->current_user->can('update.menus');
            $menus[$key]['delete'] = $this->current_user->can('delete.menus');
        }

    	$returnData = [
    		"draw" => $draw,
		    "recordsTotal" => $count,
		    "recordsFiltered" => $filterCount,
    		'data' => $menus
    	];
    	return response()->json($returnData);
    }

    /**
     * 获取菜单的子列表 api
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 13:23:10
     * 
     * @return        
     */
    public function getApimenusonlist(){
        /*获取参数*/
        $parent_id = request('parent_id', 0);

        /*返回参数*/
        $returnData = [];
        if(is_numeric($parent_id) && !empty($parent_id)){
            /*获取菜单*/
            $resutl_menus = Menu::with('parentmenu')->where('parent_id', '=', $parent_id)->get();

            $menus = $resutl_menus->toArray();

            foreach($resutl_menus as $key => $resutl_menu){
                $menus[$key]['update'] = $this->current_user->can('update.menus');
                $menus[$key]['delete'] = $this->current_user->can('delete.menus');
            }

            $returnData = [
                'data' => $menus,
                'length' => count($menus),
                'status' => true,
                'msg' => '获取数据成功'
            ];
        }else{
            $returnData = [
                'status' => false,
                'msg' => '获取数据失败'
            ];
        }
        return response()->json($returnData);
    }

    /**
     * 获取需要修改菜单的数据
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-17 08:09:32
     * 
     * @return		
     */
    public function getEdit(){
    	$id = request('id', 2);
    	
    	if(is_numeric($id) && !empty($id)){
    		$menu = Menu::find($id);

    		$parents = Menu::where('parent_id', '<=', 1)->get();
    		$permissions = Permission::all();

    		$returnData = [
    			'parents' => $parents,
    			'permissions' => $permissions,
    			'menu' => $menu,
                'current_permission' => $permissions->keyBy('slug')->get($menu->slug),
                'current_parent' => $parents->keyBy('id')->get($menu->parent_id),
    		];
	    	return view('admin.menu.edit')->with($returnData);
    	}
    }

    /**
     * 修改菜单内容
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 09:21:56
     * 
     * @return        
     */
    public function postEdit(){
        $id = request('id', 0);
        $returnData = [
            'status' => false,
            'msg' => '数据丢失'
        ];
        if(is_numeric($id) && !empty($id)){
            /*修改菜单*/
            $menu = Menu::find($id);
            $menu->name = request('name', $menu->name);
            $menu->description = request('description', $menu->description);
            $menu->slug = request('slug', $menu->slug);
            $menu->url = request('url', $menu->url);
            $menu->parent_id = request('parent_id', $menu->parent_id);
            $save_bool = $menu->save();

            if($save_bool){
                $returnData = [
                    'status' => true,
                    'msg' => '修改成功'
                ];
            }else{
                $returnData = [
                    'status' => true,
                    'msg' => '修改成功'
                ];
            }
        }

        return response()->json($returnData);
    }

    /**
     * 输出添加菜单界面
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 12:17:23
     * 
     * @return        
     */
    public function getAdd(){
        $parents = Menu::where('parent_id', '<=', 1)->get();
        $permissions = Permission::all();

        $returnData = [
            'parents' => $parents,
            'permissions' => $permissions,
        ];

        return view('admin.menu.add')->with($returnData);
    }

    /**
     * 添加菜单--入库
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 12:19:40
     * 
     * @return        
     */
    public function postAdd(){
        $returnData = [
            'status' => false,
            'msg' => '数据丢失'
        ];

        /*添加菜单*/
        $menu = new Menu;
        $menu->name = request('name', '');
        $menu->description = request('description', '');
        $menu->slug = request('slug', '');
        $menu->url = request('url', '');
        $menu->parent_id = request('parent_id', 0);
        $add_bool = $menu->save();

        if($add_bool){
            $returnData = [
                'status' => true,
                'msg' => '修改成功'
            ];
        }else{
            $returnData = [
                'status' => true,
                'msg' => '修改成功'
            ];
        }

        return response()->json($returnData);
    }

    /**
     * 删除菜单
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
            $menu = Menu::find($id);
            $delete_bool = $menu->delete();
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
