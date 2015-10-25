<div ng-controller="ArticleListController">
	<ul>
		<li ng-repeat="error in errors">
			@{{error}}			
		</li>
	</ul>
	<form method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<legend>添加文章</legend>
		</div>

		<div class="form-group">
			<label for="" class="label-control col-md-1">标题</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="" placeholder="输入标题" name="title" ng-model="title" value="{{old('title')}}">
			</div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-success" ng-click="add()">提交</button>
			</div>
		</div>

		<div class="form-group">
			<label for="" class="label-control col-md-1">文章分类</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="" placeholder="文章分类" ng-model="catagory" name="catagory">
			</div>
		</div>
		
		<div class="form-group">
			<label for="" class="col-md-1 label-control">内容</label>
			<div id="editormd" class="col-md-4">
				<textarea style="display:none;" name="content">### Hello Editor.md !</textarea>
			</div>
		</div>
	</form>
</div>