<?php
	namespace App\Services;

	use App\Services\Contracts\PermissionTreeContract;
	
	class PermissionTreeService implements PermissionTreeContract{
		/**
		 * 权限转换成jsTree数组格式
		 * 
		 * @param		$permissions  array
		 * 
		 * @author		wen.zhou@bioon.com
		 * 
		 * @date		2015-10-19 21:33:50
		 * 
		 * @return		
		 */
		public function permissionToTreeAdd($permissions, $parent='#'){
			$returnArr = [];
			
			foreach($permissions as $key => $val){
				if(is_array($val)){
					$returnArr[] =  [
						'text' => $key,
						'id' => $key,
						'parent' => $parent
					];
					$returnArr = array_merge($returnArr, $this->permissionToTreeAdd($val, $key));
				}else{
					$arr_val = json_decode($val, true);
					$returnArr[] = [
						'text' => $arr_val['val'],
						'id' => $arr_val['key'],
						'parent' => $parent
					];
				}
			}
			return $returnArr;
		}

		/**
		 * 权限转换成jstree数组格式--分离出已拥有的权限
		 * 
		 * @param		
		 * 
		 * @author		wen.zhou@bioon.com
		 * 
		 * @date		2015-10-19 21:34:19
		 * 
		 * @return		
		 */
		public function permissionToTreeUpdate($permissions, $has_permissions, $parent='#'){
			$returnArr = [];
			
			foreach($permissions as $key => $val){
				if(is_array($val)){
					$returnArr[] =  [
						'text' => $key,
						'id' => $key,
						'parent' => $parent,
					];
					$returnArr = array_merge($returnArr, $this->permissionToTreeUpdate($val, $has_permissions, $key));
				}else{
					$arr_val = json_decode($val, true);

					$selected = in_array($arr_val['key'], $has_permissions) ? true : false;
					
					$returnArr[] = [
						'text' => $arr_val['val'],
						'id' => $arr_val['key'],
						'parent' => $parent,
						'state' => [
							'selected' => $selected 
						],
					];
				}
			}
			return $returnArr;
		}
	}