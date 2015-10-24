@if($status)
	{{-- 修改角色内容 --}}
	<div class="init" ng-init="id='{{$role->id}}'"></div>
	<div class="modal-header">
			<button type="button" class="close" aria-label="Close" ng-click="cancel()"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="exampleModalLabel">修改角色</h4>
		</div>
	<div class="modal-body">
		<form class="form-horizontal form-bordered ng-pristine ng-valid">
			<div class="form-body">
				{{-- 角色名称 --}}
				<div class="form-group">
					<label class="control-label col-md-3">角色名称</label>
					<div class="col-md-9">
						<input type="text" class="form-control" ng-model="name" maxlength="25" id="maxlength_alloptions" ng-init="name='{{$role->name}}'">
						<span class="help-block">填写角色名称</span>
					</div>
				</div>
				{{-- 角色 --}}
				<div class="form-group">
					<div class="form-group">
						<label class="control-label col-md-3">角色</label>
						<div class="col-md-9">
							<input type="text" class="form-control" ng-model="slug" maxlength="25" id="maxlength_alloptions" ng-init="slug='{{$role->slug}}'">
							<span class="help-block">填写角色</span>
						</div>
					</div>
				</div>
				{{-- 描述 --}}
				<div class="form-group">
					<label class="control-label col-md-3">描述</label>
					<div class="col-md-9">
						<input type="text" class="form-control" ng-model="description" maxlength="25" id="maxlength_alloptions"  ng-init="description='{{$role->description}}'">
						<span class="help-block">填写描述</span>
					</div>
				</div>
				{{-- 级别 --}}
				<div class="form-group">
					<label class="control-label col-md-3">级别</label>
					<div class="col-md-9">
						<input type="text" class="form-control" ng-model="level" maxlength="25" id="maxlength_alloptions"  ng-init="level='{{$role->level}}'">
						<span class="help-block">填写级别</span>
					</div>
				</div>
				
				{{-- 权限 --}}
				<div class="form-group">
					<label class="control-label col-md-3">权限</label>
					<div class="col-md-9">
						<div id="tree_2" class="tree-demo"></div>
						<js-tree tree-data="scope" tree-events="ready:ready; changed:changed" tree-plugins="checkbox,types,wholerow" tree-types="typesConfig" tree-model="jstree" ng-init="jstree={{$permissions}}; permissions={{$role_permissions}}"></js-tree>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" ng-click="cancel()">关闭</button>
		<button type="button" class="btn btn-primary" ng-click="save()">保存</button>
	</div>
@else
	<p>{{$msg}}</p>
@endif