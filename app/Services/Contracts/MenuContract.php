<?php
	namespace App\Services\Contracts;
	interface MenuContract{
		public function getUserMenu();

		public function dealMenu($menu);

	}