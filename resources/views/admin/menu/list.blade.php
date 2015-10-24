<div ng-controller="MenuListController">
	@if($is_add)
		<p>
			<button type="button" class="btn btn-success" ng-click="add()"><i class="fa fa-plus"></i>添加菜单</button>
		</p>
	@endif
	<table id="foobar" datatable dt-options="dtOptions" dt-columns="dtColumns" dt-instance="dtInstance"></table>
</div>
