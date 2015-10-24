{{-- 添加菜单界面 --}}
<div class="modal-header">
		<button type="button" class="close" aria-label="Close" ng-click="cancel()"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="exampleModalLabel">修改菜单</h4>
	</div>
<div class="modal-body">
	<form class="form-horizontal form-bordered ng-pristine ng-valid">
		<div class="form-body">
			{{-- 菜单名称 --}}
			<div class="form-group">
				<label class="control-label col-md-3">菜单名称</label>
				<div class="col-md-9">
					<input type="text" class="form-control" ng-model="name" maxlength="25" id="maxlength_alloptions">
					<span class="help-block">填写菜单的名称</span>
				</div>
			</div>
			{{-- 权限 --}}
			<div class="form-group">
				<label class="control-label col-md-3">权限</label>
				<div class="col-md-9">
					<div class="input-group">
			            <ui-select ng-model="permission.selected" theme="bootstrap" ng-init="permissions={{$permissions}}">
			              <ui-select-match placeholder="Select or search a permission in the list...">@{{$select.selected.slug}}</ui-select-match>
			              <ui-select-choices repeat="permission in permissions | filter: $select.search">
			                <span ng-bind-html="permission.slug | highlight: $select.search | highlight:$select.selected.slug"></span>
			              </ui-select-choices>
			            </ui-select>

			            <span class="input-group-btn">
			              <button ng-click="navfrom.selected = undefined" class="btn btn-default">
			                <span class="glyphicon glyphicon-trash"></span>
			              </button>
			            </span>
  					</div>
				</div>
			</div>
			{{-- 地址名称 --}}
			<div class="form-group">
				<label class="control-label col-md-3">地址名称</label>
				<div class="col-md-9">
					<input type="text" class="form-control" ng-model="url" maxlength="25" id="maxlength_alloptions">
					<span class="help-block">填写地址的名称</span>
				</div>
			</div>
			{{-- 父级菜单 --}}
			<div class="form-group">
				<label class="control-label col-md-3">父级菜单</label>
				<div class="col-md-9">
					<div class="input-group">
			            <ui-select ng-model="parent.selected" theme="bootstrap" ng-init="parents={{$parents}}">
			              <ui-select-match placeholder="Select or search a parent in the list...">@{{$select.selected.name}}</ui-select-match>
			              <ui-select-choices repeat="parent in parents | filter: $select.search">
			                <span ng-bind-html="parent.name | highlight: $select.search | highlight:$select.selected.name"></span>
			              </ui-select-choices>
			            </ui-select>

			            <span class="input-group-btn">
			              <button ng-click="navfrom.selected = undefined" class="btn btn-default">
			                <span class="glyphicon glyphicon-trash"></span>
			              </button>
			            </span>
  					</div>
				</div>
			</div>
			{{-- 描述 --}}
			<div class="form-group">
				<label class="control-label col-md-3">描述</label>
				<div class="col-md-9">
					<input type="text" class="form-control" ng-model="description" maxlength="25" id="maxlength_alloptions">
					<span class="help-block">填写描述</span>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" ng-click="cancel()">关闭</button>
	<button type="button" class="btn btn-primary" ng-click="add()">保存</button>
</div>