<?php
	namespace App\Services\Contracts;

	interface PermissionTreeContract{
		public function permissionToTreeAdd($permissions, $parent);
		public function permissionToTreeUpdate($permissions, $has_permissions, $parent);
	}