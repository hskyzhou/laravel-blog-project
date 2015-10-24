<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Bican\Roles\Models\Permission;

class PermissionController extends Controller
{
    protected $current_user;

    public function __construct(){
        $this->current_user = auth()->user();

        $this->middleware('permission:show.permission.manage');

        $this->middleware('permission:show.permission.list', ['only' => ['getIndex', 'getNgIndex', 'getList', 'getNgPermissionList', 'getApipermissionlist']]);

        $this->middleware('permission:update.permissions', ['only' => ['getEdit', 'postEdit']]);

        $this->middleware('permission:add.permissions', ['only' => ['getAdd', 'postAdd']]);

        $this->middleware('permission:delete.permissions', ['only' => ['postDelete']]);
    }

    public function getIndex(){
    	return view('admin.permission.index');
	}

	public function getNgIndex(){
		return '<div ui-view></div>';
	}

    /**
     * 获取权限列表
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 20:27:23
     * 
     * @return        
     */
    public function getList(){
    	return view('admin.permission.index');
    }

    /**
     * angular获取权限列表页
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 20:28:08
     * 
     * @return        
     */
    
    public function getNgPermissionList(){
    	return view('admin.permission.list');
    }

    /**
     * 权限列表的api
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-18 20:36:51
     * 
     * @return        
     */
    public function getApipermissionlist(){
        /*获取参数*/
        $draw = request('draw', 1);
        $start = request('start', 0);
        $length = request('length', 10);
        $search = request('search.value', '');

        /*获取菜单*/
        $obj_permission = new Permission;

        $count = $obj_permission->count();

        if(!empty($search)){
            $obj_permission = $obj_permission->where('name', 'like', "%{$search}%");
        }

        if($length != -1){
            $obj_permission = $obj_permission->offset($start)->limit($length);
        }

        $permissions = $obj_permission->get()->toArray();

        $returnData = [
            "draw" => $draw,
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            'data' => $permissions
        ];

        return response()->json($returnData);
    }

    /**
     * 获取需要修改菜单的数据
     * 
     * @param       
     * 
     * @author      wen.zhou@bioon.com
     * 
     * @date        2015-10-17 08:09:32
     * 
     * @return      
     */
    public function getEdit(){
        $id = request('id', 2);
        
        if(is_numeric($id) && !empty($id)){
            $permission = Permission::find($id);

            $returnData = [
                'permission' => $permission,
            ];
            return view('admin.permission.edit')->with($returnData);
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
            $permission = Permission::find($id);
            $permission->name = request('name', $permission->name);
            $permission->description = request('description', $permission->description);
            $permission->slug = request('slug', $permission->slug);
            $permission->model = request('model', $permission->model);
            $save_bool = $permission->save();

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
        return view('admin.permission.add');
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
        $permission = new Permission;
        $permission->name = request('name', '');
        $permission->description = request('description', '');
        $permission->slug = request('slug', '');
        $permission->model = request('model', '');
        $add_bool = $permission->save();

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
            $permission = Permission::find($id);
            $delete_bool = $permission->delete();
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
