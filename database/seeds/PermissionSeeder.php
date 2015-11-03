<?php

use Illuminate\Database\Seeder;

use Bican\Roles\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*顶级菜单*/
        $topMenu = Permission::create([
            'name' => 'Show Top Menus',
            'slug' => 'show.top.menu',
            'description' => '显示顶级菜单', // optional
        ]);

        /*菜单*/
        $menuManage = Permission::create([
            'name' => 'Show Menus Manage',
            'slug' => 'show.menu.manage',
            'description' => '显示菜单管理', // optional
        ]);

        $menuList = Permission::create([
            'name' => 'Show Menus List',
            'slug' => 'show.menu.list',
            'description' => '显示菜单列表', // optional
        ]);

        $menuUpdate = Permission::create([
            'name' => 'Update Menus',
            'slug' => 'update.menus',
            'description' => '修改菜单',
        ]);
        $menuAdd = Permission::create([
            'name' => 'Add Menus',
            'slug' => 'add.menus',
            'description' => '添加菜单',
        ]);
        $menuDelete = Permission::create([
            'name' => 'Delete Menus',
            'slug' => 'delete.menus',
            'description' => '删除菜单',
        ]);

        /*角色*/
        $roleManage = Permission::create([
            'name' => 'Show Roles Manage',
            'slug' => 'show.role.manage',
            'description' => '显示角色管理', // optional
        ]);

        $roleList = Permission::create([
            'name' => 'Show Roles List',
            'slug' => 'show.role.list',
            'description' => '显示角色列表', // optional
        ]);

        $roleUpdate = Permission::create([
            'name' => 'Update Roles',
            'slug' => 'update.roles',
            'description' => '修改角色', // optional
        ]);

        $roleAdd = Permission::create([
            'name' => 'Add Roles',
            'slug' => 'add.roles',
            'description' => '添加角色', // optional
        ]);

        $roleDelete = Permission::create([
            'name' => 'Delete Roles',
            'slug' => 'delete.roles',
            'description' => '删除角色', // optional
        ]);
        

        /*权限*/
        $permissionManage = Permission::create([
            'name' => 'Show Permissions Manage',
            'slug' => 'show.permission.manage',
            'description' => '显示权限管理', // optional
        ]);

        $permissionList = Permission::create([
            'name' => 'Show Permissions List',
            'slug' => 'show.permission.list',
            'description' => '显示权限列表', // optional
        ]);

        $permissionUpdate = Permission::create([
            'name' => 'Update Permissions',
            'slug' => 'update.permissions',
            'description' => '修改权限', // optional
        ]);

        $permissionAdd = Permission::create([
            'name' => 'Add Permissions',
            'slug' => 'add.permissions',
            'description' => '添加权限', // optional
        ]);

        $permissionDelete = Permission::create([
            'name' => 'Delete Permissions',
            'slug' => 'delete.permissions',
            'description' => '删除权限', // optional
        ]);

        /*用户*/
        $userManage = Permission::create([
            'name' => 'Show Users Manage',
            'slug' => 'show.user.manage',
            'description' => '显示用户管理', // optional
        ]);

        $userList = Permission::create([
            'name' => 'Show Users List',
            'slug' => 'show.user.list',
            'description' => '显示用户列表', // optional
        ]);

        $userUpdate = Permission::create([
            'name' => 'Update Users',
            'slug' => 'update.users',
            'description' => '修改用户', // optional
        ]);

        $userAdd = Permission::create([
            'name' => 'Add Users',
            'slug' => 'add.users',
            'description' => '添加用户', // optional
        ]);

        $userDelete = Permission::create([
            'name' => 'Delete Users',
            'slug' => 'delete.users',
            'description' => '删除用户', // optional
        ]);

        /*登录后台权限*/
        $loginBackend = Permission::create([
            'name' => 'Login Backend',
            'slug' => 'login.backend',
            'description' => '登录后台', // optional
        ]);

        /*文章*/
        $articleManage = Permission::create([
            'name' => 'Show Articles Manage',
            'slug' => 'show.article.manage',
            'description' => '显示文章管理', // optional
        ]);

        $userList = Permission::create([
            'name' => 'Show Article List',
            'slug' => 'show.article.list',
            'description' => '显示文章列表', // optional
        ]);

        $articleUpdate = Permission::create([
            'name' => 'Update Articles',
            'slug' => 'update.articles',
            'description' => '修改文章', // optional
        ]);

        $articleAdd = Permission::create([
            'name' => 'Add Articles',
            'slug' => 'add.articles',
            'description' => '添加文章', // optional
        ]);

        $articleDelete = Permission::create([
            'name' => 'Delete Articles',
            'slug' => 'delete.articles',
            'description' => '删除文章', // optional
        ]);

        /*日志*/
        $logManage = Permission::create([
            'name' => 'Show Log Manage',
            'slug' => 'show.log.manage',
            'description' => '日志管理', // optional
        ]);

        $logOverall = Permission::create([
            'name' => 'Show Log List',
            'slug' => 'show.log.list',
            'description' => '日志总览', // optional
        ]);

        $logDetail = Permission::create([
            'name' => 'show Log Detail',
            'slug' => 'show.log.detail',
            'description' => '日志详情', // optional
        ]);
    }
}