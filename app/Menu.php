<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * 获取关联父级菜单
     * 
     * @param		
     * 
     * @author		wen.zhou@bioon.com
     * 
     * @date		2015-10-17 20:10:59
     * 
     * @return		
     */
    public function parentmenu(){
    	return $this->hasOne('App\Menu', 'id', 'parent_id');
    }
}
