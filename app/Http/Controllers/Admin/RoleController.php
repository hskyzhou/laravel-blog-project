<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

use App\Services\Contracts\PermissionTreeContract;

class RoleController extends Controller
{
    protected $current_user;

    public function __construct(){
        $this->current_user = auth()->user();

        $this->middleware('permission:show.role.manage');

        $this->middleware('permission:show.role.list', ['only' => ['getIndex', 'getNgIndex', 'getList', 'getNgRoleList', 'getApirolelist']]);
        $this->middleware('permission:update.roles', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:add.roles', ['only' => ['getAdd', 'postAdd']]);
        $this->middleware('permission:delete.roles', ['only' => ['postDelete']]);
    }

	public function getIndex(){
    	return view('admin.role.index');
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
    	return view('admin.role.index');
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
    
    public function getNgRoleList(){
    	return view('admin.role.list');
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
    public function getApirolelist(){
        /*获取参数*/
        $draw = request('draw', 1);
        $start = request('start', 0);
        $length = request('length', 10);
        $search = request('search.value', '');

        /*获取菜单*/
        $obj_role = new Role;

        $count = $obj_role->count();

        /*搜索*/
        if(!empty($search)){
            $obj_role = $obj_role::where('name', 'like', '%{$search}%');
        }

        /*条数*/
        if($length != -1){
            $obj_role = $obj_role->offset($start)->limit($length);
        }

        $roles = $obj_role->get()->toArray();

        $returnData = [
            "draw" => $draw,
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            'data' => $roles
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
    public function getEdit(PermissionTreeContract $perCon){
        $id = request('id', 2);
        $returnData = [];
        if(is_numeric($id) && !empty($id)){
            $role = Role::find($id);

            if(!$role->get()->isEmpty()){
                /*所有权限*/
                $all_permissions = Permission::all();
                /*该角色的所有权限*/
                $role_permissions = $role->permissions()->get()->keyBy('slug')->keys()->toArray();

                $deal_permissions = [];
                foreach($all_permissions as $all_permission){
                    array_set($deal_permissions, $all_permission->slug, json_encode([
                        'key' => $all_permission->slug,
                        'val' => $all_permission->name . ':' . $all_permission->description
                    ]));
                }
                $permissions = $perCon->permissionToTreeUpdate($deal_permissions, $role_permissions, '#');

                $returnData['status'] = true;
                $returnData['msg'] = "获取成功";
                $returnData['role'] = $role;
                $returnData['permissions'] = json_encode($permissions);
                $returnData['role_permissions'] = json_encode($role_permissions);

            }else{
                $returnData['status'] = false;
                $returnData['msg'] = "获取失败";
            }
        }else{
            $returnData['status'] = false;
            $returnData['msg'] = "获取数据错误";
        }
        return view('admin.role.edit')->with($returnData);
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
            $role = Role::find($id);
            $role->name = request('name', $role->name);
            $role->slug = request('slug', $role->slug);
            $role->description = request('description', $role->description);
            $role->level = request('level', $role->level);
            $save_bool = $role->save();

            if($save_bool){
                /*添加权限*/
                $permissions = request('permissions', '');
                if(!empty($permissions)){
                    $role->detachAllPermissions();
                    $selected_permissions = Permission::whereIn('slug', $permissions)->get();
                    foreach($selected_permissions as $selected_permission){
                        $role->attachPermission($selected_permission);
                    }
                }
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
    public function getAdd(PermissionTreeContract $perCon){
        $all_permissions = Permission::all();

        $deal_permissions = [];
        foreach($all_permissions as $all_permission){
            array_set($deal_permissions, $all_permission->slug, json_encode([
                'key' => $all_permission->slug,
                'val' => $all_permission->name . ':' . $all_permission->description
            ]));
        }
        $permissions = $perCon->permissionToTreeAdd($deal_permissions);

        $returnData = [
            'permissions' => json_encode($permissions),
        ];

        return view('admin.role.add')->with($returnData);
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

        /*添加角色*/
        $role = new Role;
        $role->name = request('name', '');
        $role->description = request('description', '');
        $role->slug = request('slug', '');
        $role->level = request('level', 1);
        $add_bool = $role->save();

        if($add_bool){
            /*添加权限*/
            $permissions = request('permissions', '');
            if(!empty($permissions)){
                $role->detachAllPermissions();
                $selected_permissions = Permission::whereIn('slug', $permissions)->get();
                foreach($selected_permissions as $selected_permission){
                    $role->attachPermission($selected_permission);
                }
            }
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
            $role = Role::find($id);
            $delete_bool = $role->delete();
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

    /**
     * 显示传递角色id的角色所拥有的权限
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-10-20 08:56:24
     * 
     * @return        
     */
    public function getPermission(){
        $id = request('id', 0);
        $returnData  = [];
        if(is_numeric($id) && !empty($id)){
            /*获取角色*/
            $role = Role::find($id);

            if(!$role->get()->isEmpty()){
                /*角色不为空*/
                /*获取当前角色的权限*/
                $permissions = $role->permissions()->get();

                $returnData = [
                    'status' => true,
                    'msg' => '获取数据成功',
                    'role' => $role,
                    'permissions' => $permissions
                ];
            }else{
                $returnData['status'] = false;
                $returnData['msg'] = "获取数据失败";    
            }
        }else{
            $returnData['status'] = false;
            $returnData['msg'] = "获取错误";
        }
        return view('admin.role.permission')->with($returnData);
    }
}
