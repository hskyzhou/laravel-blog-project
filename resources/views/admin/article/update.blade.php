@if($status)
	<div ng-controller="ArticleListController">
		<ul>
			<li ng-repeat="error in errors">
				@{{error}}
			</li>
		</ul>
		<div ng-init="id='{{$article['id']}}'"></div>
		<form method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>修改文章</legend>
			</div>

			<div class="form-group">
				<label for="" class="label-control col-md-1">标题</label>
				<div class="col-md-4">
					<input type="text" class="form-control" id="" placeholder="输入标题" name="title" ng-model="title" ng-init="title='{{$article['title']}}'">
				</div>
				<div class="col-md-4">
					<button type="submit" class="btn btn-success" ng-click="update()">提交</button>
				</div>
			</div>

			<div class="form-group">
				<label for="" class="label-control col-md-1">文章分类</label>
				<div class="col-md-4">
					<input type="text" class="form-control" id="" placeholder="文章分类" ng-model="catagory" name="catagory" ng-init="catagory='{{$article['catagory']}}'">
				</div>
			</div>
			
			<div class="form-group">
				<label for="" class="col-md-1 label-control">内容</label>
				<div id="editormd" class="col-md-4">
					<textarea style="display:none;" name="content">{{$article['content']}}</textarea>
				</div>
			</div>
		</form>
	</div>
@else
	<p>{{$msg}}</p>
@endif
