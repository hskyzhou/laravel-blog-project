<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use App\Article;

class AdminController extends Controller
{
    /**
     * 显示首页
     * 
     * @author wen.zhou@bioon.com 2015-07-21 16:47:20
     * 
     * @return 
     */
    public function getIndex(){
        // $user = Auth::user();
        // $permissions = $user->getPermissions();

        // dd($permissions);
        // if($user->can(['create.users', 'delete.users', 'update.users'])){
        //     echo '可以创建用户';
        //     echo '可以删除用户';
        //     echo '可以修改用户';
        // }

        // if($user->can(['update.users'])){
        //     echo '可以修改用户';
        // }else{
        //     echo '不可以修改用户';
        // }

        // if($user->can('delete.users')){
        // }

        // if($user->is(['admin'])){
        //     echo 'admin';
        // }else{
        //     echo 'member';
        // }
        // dd($user);

        return view('admin.index');
    }
    
    /**
     * 显示 angular 首页
     * 
     * @param        
     * 
     * @author        wen.zhou@bioon.com
     * 
     * @date        2015-09-24 17:52:17
     * 
     * @return        
     */
    public function getNgIndex(){
        return "welcome to my admin page";
    }
}
