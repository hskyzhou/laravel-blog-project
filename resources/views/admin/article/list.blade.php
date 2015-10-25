<div ng-controller="ArticleListController">
	@if($is_add)
		<p>
			<a type="button" class="btn btn-success" href="{{url('article/add')}}"><i class="fa fa-plus"></i>添加文章</a>
		</p>
	@endif
	<table id="foobar" datatable dt-options="dtOptions" dt-columns="dtColumns" dt-instance="dtInstance"></table>
</div>
