<?php
	namespace App\Services;
	use App\Services\Contracts\MenuContract;

	use Auth;
	use App\Menu;
	class MenuService implements MenuContract{

		public function getUserMenu(){
			$user = Auth::user(); //获取当前登录用户

			$all_menus = Menu::all();

			$user_menus = [];
			foreach($all_menus as $all_menu){
				if($user->can($all_menu->slug)){
					$user_menus[$all_menu->id] = $all_menu->toArray();
				}
			}

			return $this->dealMenu($user_menus, 1);
		}

		public function dealMenu($menus, $parent_id = 0){
			foreach ($menus as $menu){
				$menus[$menu['parent_id']]['son'][$menu['id']] = &$menus[$menu['id']];
			}
			return isset($menus[$parent_id]['son']) ? $menus[$parent_id]['son'] : array();
		}
	}