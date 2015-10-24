MetronicApp.controller('MenuListController', ['$scope', 'DTOptionsBuilder', 'DTColumnBuilder', '$compile', '$modal', '$log', '$http', '$rootScope' , function($scope, DTOptionsBuilder, DTColumnBuilder, $compile, $modal, $log, $http, $rootScope){
	$scope.$on('$viewContentLoaded', function() {   
        // initialize core components
        Metronic.initAjax();
    });

    // set sidebar closed and body solid layout mode
    $rootScope.settings.layout.pageBodySolid = true;
    $rootScope.settings.layout.pageSidebarClosed = false;

	/*配置datatables*/
	$scope.dtInstance = {};
	$scope.animationsEnabled = true;

	$scope.dtOptions = DTOptionsBuilder.newOptions()
	    .withOption('ajax', {
	         // Either you specify the AjaxDataProp here
	         dataSrc: 'data',
	         url: '/menu/apimenulist?r='+Math.random(),
	         type: 'GET'
	    })
	     // or here
	    // .withDataProp('data')
        .withOption('serverSide', true)
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('lengthMenu', [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]])

	$scope.dtColumns = [
	    DTColumnBuilder.newColumn('id').withTitle('').renderWith(expandMenu),
	    DTColumnBuilder.newColumn('id').withTitle('id'),
	    DTColumnBuilder.newColumn('name').withTitle('菜单名称'),
	    DTColumnBuilder.newColumn('slug').withTitle('权限'),
	    DTColumnBuilder.newColumn('url').withTitle('地址'),
	    DTColumnBuilder.newColumn('parentmenu.name').withTitle('父类菜单'),
	    DTColumnBuilder.newColumn('description').withTitle('描述'),
	    DTColumnBuilder.newColumn('created_at').withTitle('创建时间'),
	    DTColumnBuilder.newColumn('updated_at').withTitle('修改时间'),
	    DTColumnBuilder.newColumn(null).withTitle('操作').renderWith(actionsHtml),
	];

	$scope.reloadData = function(){
		$scope.dtInstance.reloadData();
	};

	function createdRow(row, data, dataIndex) {
        // Recompiling so we can bind Angular directive to the DT
        angular.element(row).attr('id', 'row_id_' + data.id);
        $compile(angular.element(row).contents())($scope);
    }

    // 操作按钮
    function actionsHtml(data, type, full, meta) {
    	var actionHtml = "";
    	if(full.update){
	    	actionHtml += '<button class="btn btn-warning" ng-click="update(' + data.id + ')"><i class="fa fa-edit"></i></button>';
    	}
    	if(full.delete){
	    	actionHtml += ' <button class="btn btn-danger" ng-click="delete(' + data.id + ')"><i class="fa fa-trash-o"></i></button>';
    	}
        return actionHtml;
    }

    // 显示展开父级菜单按钮
    function expandMenu(data, type, full, meta){
    	var expandHtml = "";
    	expandHtml += '<a ng-click=showSon('+data+')><i class="fa fa-plus"></i></a>';
    	return expandHtml
    }
	
	/*显示子菜单*/    
    $scope.showSon = function(parent_id){
    	/* 是显示子菜单还是隐藏子菜单*/
    	$menu_son = angular.element("#row_id_"+parent_id).find("td").first().find('i');
    	if($menu_son.hasClass('fa-plus')){
    		/*显示*/
    		$menu_son.removeClass('fa-plus').addClass('fa-minus');

    		var req = {
    			method : 'GET',
    			url : '/menu/apimenusonlist',
    			params : {
    				parent_id : parent_id
    			},
    			responseType : 'json'
    		};
    		$http(req).then(function(response){
    			var result = response.data;
    			var data = result.data;

    			if(result.length > 0){
	    			var content = "<tr id='row_son_id_"+parent_id+"'><td colspan='8'>";
	    			content += "<table>";
	    			content += "<tr>";
	    			content += "<th>名称</th>";
	    			content += "<th>权限</th>";
	    			content += "<th>地址</th>";
	    			content += "<th>描述</th>";
	    			content += "<th>操作</th>";
	    			content += "</tr>";
	    			for(i in data){
	    				content += "<tr>";
	    				content += "<td ng-click='add()'>"+data[i].name+"</td>";
	    				content += "<td>"+data[i].slug+"</td>";
	    				content += "<td>"+data[i].url+"</td>";
	    				content += "<td>"+data[i].description+"</td>";

	    				content += "<td>";
	    				if(data[i].update){
	    					content += '<button class="btn btn-warning" ng-click="update(' + data[i].id + ')"><i class="fa fa-edit"></i></button>';
	    				}
	    				if(data[i].delete){
	    					content += '<button class="btn btn-danger" ng-click="delete(' + data[i].id + ')"><i class="fa fa-trash-o"></i></button>';
	    				}
	    				content += "</td>";
	    				content += "</tr>";
	    			}

	    			content += "</table>";
	    			content += "</td></tr>";

	    			angular.element("#row_id_"+parent_id).after(content).find("td").first().find('i');

	    			$compile(angular.element("#row_son_id_"+parent_id).contents())($scope);
    			}
    		}, function(){
    			var data = response.data;
    			console.log('error', data);
    		});
    	}else{
    		/*隐藏*/
    		$menu_son.removeClass('fa-minus').addClass('fa-plus');

    		angular.element("#row_son_id_"+parent_id).remove();
    	}
    }

    /* 界面--修改菜单*/
    $scope.update = function(id){
    	var modalInstance = $modal.open({
    	    animation: $scope.animationsEnabled,
    	    templateUrl: '/menu/edit?r='+Math.random()+'&id='+id,
    	    controller: 'MenuModalInstance',
    	    size: 'lg',
    	    resolve: {
    	        
    	    }
    	});

    	modalInstance.result.then(function () {
    		$scope.reloadData();
    	}, function () {
    	    $log.info('Modal dismissed at: ' + new Date());
    	});
    };

    /*删除菜单*/
    $scope.delete = function(id){
    	layer.confirm("确定要删除吗?",function(index){
	    	var req = {
	    		method : 'POST',
	    		url : '/menu/delete',
	    		data : {
	    			id : id
	    		},
	    		responseType : 'json'
	    	}
	    	$http(req).then(function(response){
	    		result = response.data;
	    		if(result.status){
	    			layer.msg(result.msg);
	    			$scope.reloadData();
	    		}else{
	    			layer.msg(result.msg);
	    		}
	    	}, function(response){
	    		result = response.data;
	    	});

	    	layer.close(index);
    	});
    };

    /*界面--添加菜单*/
    $scope.add = function(){
    	var modalInstance = $modal.open({
    	    animation: $scope.animationsEnabled,
    	    templateUrl: '/menu/add?r=' + Math.random(),
    	    controller: 'MenuModalInstance',
    	    size: 'lg',
    	    resolve: {
    	        
    	    }
    	});

    	modalInstance.result.then(function () {
    		$scope.reloadData();
    	}, function () {
    	    $log.info('Modal dismissed at: ' + new Date());
    	});
    }
}])

MetronicApp.controller('MenuModalInstance', ['$scope', '$modalInstance', '$http', function($scope, $modalInstance, $http){
	$scope._token = '';
	$scope.id = '';
	$scope.name = "";
	$scope.description = "";
	$scope.url = "";
	$scope.permissions = [];
	$scope.permission = {};
	$scope.parents = [];
	$scope.parent = {};

	/*取消*/
	$scope.cancel = function () {
	  	$modalInstance.dismiss('cancel');
	};

	/*保存*/
	$scope.save = function(){
		var data = {
			id : $scope.id,
			name : $scope.name,
			description : $scope.description,
			url : $scope.url,
			slug : $scope.permission.selected.slug,
			parent_id : $scope.parent.selected.id
		};

		var req = {
			method : 'POST',
			url : '/menu/edit',
			data : data,
			responseType : 'json'
		};
		$http(req).then(function(response){
			var data = response.data;
			$modalInstance.close();
		}, function(response){
			var data = response.data;
			alert(data.msg);
		})
	}

	/*添加*/
	$scope.add = function(){
		var data = {
			name : $scope.name,
			description : $scope.description,
			url : $scope.url,
			slug : $scope.permission.selected.slug,
			parent_id : $scope.parent.selected.id
		};

		var req = {
			method : 'POST',
			url : '/menu/add',
			data : data,
			responseType : 'json'
		};
		$http(req).then(function(response){
			var data = response.data;
			$modalInstance.close();
		}, function(response){
			var data = response.data;
			alert(data.msg);
		})
	}
}]);