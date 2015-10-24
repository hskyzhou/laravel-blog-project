@if($status)
	{{-- 修改角色内容 --}}
	<div class="init" ng-init="id='{{$user->id}}';"></div>
	<div class="modal-header">
			<button type="button" class="close" aria-label="Close" ng-click="cancel()"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel">修改用户</h4>
		</div>
	<div class="modal-body">
		<form class="form-horizontal form-bordered ng-pristine ng-valid">
			<div class="form-body">
				{{-- 用户名称 --}}
				<div class="form-group">
					<label class="control-label col-md-3">用户名称</label>
					<div class="col-md-9">
						<input type="text" class="form-control" ng-model="name" maxlength="25" id="maxlength_alloptions" ng-init="name='{{$user->name}}'">
						<span class="help-block">填写用户名称</span>
					</div>
				</div>
				{{-- 邮箱 --}}
				<div class="form-group">
					<label class="control-label col-md-3">邮箱</label>
					<div class="col-md-9">
						<input type="text" class="form-control" ng-model="email" maxlength="25" id="maxlength_alloptions" ng-init="email='{{$user->email}}'">
						<span class="help-block">填写邮箱</span>
					</div>
				</div>
				{{-- 角色 --}}
				<div class="form-group">
					<label class="control-label col-md-3">角色</label>
					<div class="col-md-9">
						<div class="input-group">
							<ui-select multiple ng-model="role.selected" theme="bootstrap" ng-init='roles={{$all_roles}};role.selected={{$user_roles}}'>
				        <ui-select-match placeholder="Select or search a role in the list...">@{{$item.name}}</ui-select-match>
	              <ui-select-choices repeat="role in roles | filter: $select.search">
	                <span ng-bind-html="role.name | highlight: $select.search"></span>
	              </ui-select-choices>
				      </ui-select>
	            <span class="input-group-btn">
	              <button ng-click="role.selected = undefined" class="btn btn-default">
	                <span class="glyphicon glyphicon-trash"></span>
	              </button>
	            </span>
						</div>
						<span class="help-block">填写角色</span>
					</div>
				</div>
				{{-- 权限 --}}
				<div class="form-group">
					<label class="control-label col-md-3">权限</label>
					<div class="col-md-9">
						<div id="tree_2" class="tree-demo"></div>
						<js-tree tree-data="scope" tree-events="ready:ready; changed:changed" tree-plugins="checkbox,types,wholerow" tree-types="typesConfig" tree-model="jstree" ng-init="jstree={{$permissions}}; permissions={{$user_permissions}}"></js-tree>
					</div>
				</div>
			</div>
		</form>

		@{{userRole.selected}}
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" ng-click="cancel()">关闭</button>
		<button type="button" class="btn btn-primary" ng-click="save()">保存</button>
	</div>
@else
	<p>{{$msg}}</p>
@endif