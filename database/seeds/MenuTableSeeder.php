<?php

use Illuminate\Database\Seeder;

use App\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $top = new Menu;
        $top->name = "顶级菜单";
        $top->parent_id = 0;
        $top->slug = "show.top.menu";
        $top->description = "显示顶级菜单";
        $top->url = "";
        $top->save();

        /*菜单*/
        $menu = new Menu;
        $menu->name = "菜单管理";
        $menu->parent_id = $top->id;
        $menu->slug = "show.menu.manage";
        $menu->description = "显示菜单管理";
        $menu->url = "";
        $menu->save();

        $menulist = new Menu;
        $menulist->name = "菜单列表";
        $menulist->parent_id = $menu->id;
        $menulist->slug = "show.menu.list";
        $menulist->description = "显示菜单列表";
        $menulist->url = "/menu/list";
        $menulist->save();

        /*角色*/
        $role = new Menu;
        $role->name = "角色管理";
        $role->parent_id = $top->id;
        $role->slug = "show.role.manage";
        $role->description = "显示角色管理";
        $role->url = "";
        $role->save();

        $rolelist = new Menu;
        $rolelist->name = "角色列表";
        $rolelist->parent_id = $role->id;
        $rolelist->slug = "show.role.list";
        $rolelist->description = "显示角色列表";
        $rolelist->url = "/role/list";
        $rolelist->save();

        /*权限*/
        $permission = new Menu; 
        $permission->name = "权限管理";
        $permission->parent_id = $top->id;
        $permission->slug = "show.permission.manage";
        $permission->description = "显示权限管理";
        $permission->url = "";
        $permission->save();

        $permissionlist = new Menu;
        $permissionlist->name = "权限列表";
        $permissionlist->parent_id = $permission->id;
        $permissionlist->slug = "show.permission.list";
        $permissionlist->description = "显示权限列表";
        $permissionlist->url = "/permission/list";
        $permissionlist->save();

        /*用户*/
        $user = new Menu;
        $user->name = "用户管理";
        $user->parent_id = $top->id;
        $user->slug = "show.user.manage";
        $user->description = "显示用户管理";
        $user->url = "";
        $user->save();

        $userlist = new Menu;
        $userlist->name = "用户列表";
        $userlist->parent_id = $user->id;
        $userlist->slug = "show.user.list";
        $userlist->description = "显示用户列表";
        $userlist->url = "/user/list";
        $userlist->save();
    }
}
