<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use App\Http\Requests\UserFormRequest;

use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

use App\Services\Contracts\PermissionTreeContract;

use Log;

class UserController extends Controller
{
    protected $current_user;

    public function __construct(){
        $this->current_user = auth()->user();

        $this->middleware('permission:show.user.manage');

        $this->middleware('permission:show.user.list', ['only' => ['getIndex', 'getNgIndex', 'getList', 'getNgRoleList', 'getApirolelist']]);
        $this->middleware('permission:update.roles', ['only' => ['getEdit', 'postEdit']]);
        $this->middleware('permission:add.roles', ['only' => ['getAdd', 'postAdd']]);
        $this->middleware('permission:delete.roles', ['only' => ['postDelete']]);
    }

	public function getIndex(){
    	return view('admin.user.index');
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
    	return view('admin.user.index');
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
    
    public function getNgUserList(){
    	return view('admin.user.list');
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
    public function getApiuserlist(){
        /*获取参数*/
        $draw = request('draw', 1);
        $start = request('start', 0);
        $length = request('length', 10);
        $search = request('search.value', '');

        /*获取菜单*/
        $obj_user = new User;

        $count = $obj_user->count();

        /*搜索*/
        if(!empty($search)){
            $obj_user = $obj_user::where('name', 'like', '%{$search}%');
        }

        /*条数*/
        if($length != -1){
            $obj_user = $obj_user->offset($start)->limit($length);
        }

        $users = $obj_user->with('roles')->get()->toArray();

        $returnData = [
            "draw" => $draw,
            "recordsTotal" => $count,
            "recordsFiltered" => $count,
            'data' => $users
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
            $user = User::find($id);

            if(!$user->get()->isEmpty()){
            	/*用户所拥有的角色*/
            	$user_roles = $user->getRoles();
            	/*用户所拥有的权限*/
            	$user_permissions = $user->userPermissions()->get()->keyBy('slug')->keys()->toArray();

            	/*所有角色*/
            	$all_roles = Role::all();

                /*所有权限*/
                $all_permissions = Permission::all();
                $deal_permissions = [];
                foreach($all_permissions as $all_permission){
                    array_set($deal_permissions, $all_permission->slug, json_encode([
                        'key' => $all_permission->slug,
                        'val' => $all_permission->name . ':' . $all_permission->description
                    ]));
                }
                $permissions = $perCon->permissionToTreeUpdate($deal_permissions, $user_permissions, '#');

                $returnData['status'] = true;
                $returnData['msg'] = "获取成功";
                $returnData['user'] = $user;
                $returnData['permissions'] = collect($permissions);
                $returnData['user_permissions'] = collect($user_permissions);
                $returnData['user_roles'] = $user_roles;
                $returnData['all_roles'] = $all_roles;
            }else{
                $returnData['status'] = false;
                $returnData['msg'] = "获取失败";
            }
        }else{
            $returnData['status'] = false;
            $returnData['msg'] = "获取数据错误";
        }
        return view('admin.user.edit')->with($returnData);
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
    public function postEdit(UserFormRequest $userFormRequest){
        $id = request('id', 0);
        $returnData = [
            'status' => false,
            'msg' => '数据丢失'
        ];
        if(is_numeric($id) && !empty($id)){
            /*修改菜单*/
            $user = User::find($id);
            $user->name = request('name');
            $user->email = request('email');
            $save_bool = $user->save();

            if($save_bool){
            	/*重设角色*/
            	$user->detachAllRoles();
            	$add_roles = request('roles', []);
            	if(!empty($add_roles)){
            		/*获取前台传递的角色数组*/
            		$add_roles_ids = collect($add_roles)->keyBy('id')->keys()->toArray();

            		$selected_roles = Role::whereIn('id', $add_roles_ids)->get();

            		foreach($selected_roles as $selected_role){
            			$user->attachRole($selected_role);	
            		}
            	}
                /*重设权限*/
                $user->detachAllPermissions();
                $permissions = request('permissions', '');
                if(!empty($permissions)){
                    $selected_permissions = Permission::whereIn('slug', $permissions)->get();
                    foreach($selected_permissions as $selected_permission){
                        $user->attachPermission($selected_permission);
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
    	/*获取角色*/
    	$roles = Role::all();
    	/*获取权限*/
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
            'permissions' => collect($permissions),
            'roles' => $roles
        ];

        return view('admin.user.add')->with($returnData);
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
    public function postAdd(UserFormRequest $userFormRequest){
        $returnData = [
            'status' => false,
            'msg' => '数据丢失'
        ];

        /*添加角色*/
        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password', '123456'));
        $add_bool = $user->save();

        if($add_bool){
            Log::info('add user: '. $user->id);
        	/*添加角色*/
        	$add_roles = request('roles', []);
        	if(!empty($add_roles)){
        		/*获取前台传递的角色数组*/
        		$add_roles_ids = collect($add_roles)->keyBy('id')->keys()->toArray();

        		$selected_roles = Role::whereIn('id', $add_roles_ids)->get();

        		foreach($selected_roles as $selected_role){
        			$user->attachRole($selected_role);	
        		}
        	}
            /*添加权限*/
            $permissions = request('permissions', '');
            if(!empty($permissions)){
                $user->detachAllPermissions();
                $selected_permissions = Permission::whereIn('slug', $permissions)->get();
                foreach($selected_permissions as $selected_permission){
                    $user->attachPermission($selected_permission);
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
            $user = User::find($id);
            $delete_bool = $user->delete();
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
            /*获取用户*/
            $user = User::find($id);

            if(!$user->get()->isEmpty()){
                /*用户不为空*/
                /*获取当前用户的权限*/
                $permissions = $user->getPermissions();

                $returnData = [
                    'status' => true,
                    'msg' => '获取数据成功',
                    'user' => $user,
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
        return view('admin.user.permission')->with($returnData);
    }
}
