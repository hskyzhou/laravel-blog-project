MetronicApp.controller('RoleListController', ['$scope', 'DTOptionsBuilder', 'DTColumnBuilder', '$compile', '$modal', '$log', '$http', '$rootScope' , function($scope, DTOptionsBuilder, DTColumnBuilder, $compile, $modal, $log, $http, $rootScope){

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
	         url: '/role/apirolelist?r='+Math.random(),
	         type: 'GET'
	    })
	     // or here
	    // .withDataProp('data')
        .withOption('serverSide', true)
        .withPaginationType('full_numbers')
        .withOption('createdRow', createdRow)
        .withOption('lengthMenu', [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]])

	$scope.dtColumns = [
	    DTColumnBuilder.newColumn('id').withTitle('id'),
	    DTColumnBuilder.newColumn('name').withTitle('角色名称'),
	    DTColumnBuilder.newColumn('slug').withTitle('角色'),
	    DTColumnBuilder.newColumn('description').withTitle('描述'),
	    DTColumnBuilder.newColumn('id').withTitle('权限').renderWith(showPermissionHtml),
	    DTColumnBuilder.newColumn('level').withTitle('级别'),
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

    /*返回显示权限html*/
    function showPermissionHtml(data, type, full, meta){
    	return '<a ng-click="showPermission('+data+')">查看权限</a>';
    }
    // 操作按钮
    function actionsHtml(data, type, full, meta) {
        return '<button class="btn btn-warning" ng-click="update(' + data.id + ')"><i class="fa fa-edit"></i></button> <button class="btn btn-danger" ng-click="delete(' + data.id + ')"><i class="fa fa-trash-o"></i></button>';
    }

    /* 界面--修改菜单*/
    $scope.update = function(id){
    	var modalInstance = $modal.open({
    	    animation: $scope.animationsEnabled,
    	    templateUrl: '/role/edit?r='+Math.random()+'&id='+id,
    	    controller: 'RoleControllerInstance',
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
    	layer.confirm("确定要删除吗?", function(index){
    		var req = {
    			method : 'POST',
    			url : '/role/delete',
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
    			layer.msg('删除失败');
    		});

    		layer.close(index);
    	});
    	
    };

    /*界面--添加菜单*/
    $scope.add = function(){
    	var modalInstance = $modal.open({
    	    animation: $scope.animationsEnabled,
    	    templateUrl: '/role/add?r='+Math.random(),
    	    controller: 'RoleControllerInstance',
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

    /*显示权限*/
    $scope.showPermission = function(id){
    	var modalInstance = $modal.open({
    	    animation: $scope.animationsEnabled,
    	    templateUrl: '/role/permission?id='+id+'&r='+Math.random(),
    	    controller: 'RoleControllerInstance',
    	    size: 'lg',
    	    resolve: {
    	        
    	    }
    	});
    };
}])

MetronicApp.controller('RoleControllerInstance', ['$scope', '$modalInstance', '$http', function($scope, $modalInstance, $http){
	$scope._token = '';
	$scope.id = '';
	$scope.name = "";
	$scope.description = "";
	$scope.slug = "";
	$scope.level = "";
	$scope.permissions = [];
	$scope.jstree = [];
	$scope.typeConfig = {
		"default" : {
            // "icon" : "fa fa-folder icon-state-warning icon-lg"
            "icon" : ""
        },
        "file" : {
            // "icon" : "fa fa-file icon-state-warning icon-lg"
        }
	}

	/*取消*/
	$scope.cancel = function () {
	  	$modalInstance.dismiss('cancel');
	};

	/*保存*/
	$scope.save = function(){
		var data = {
			id : $scope.id,
			name : $scope.name,
			slug : $scope.slug,
			description : $scope.description,
			level : $scope.level,
			permissions : $scope.permissions
		};

		var req = {
			method : 'POST',
			url : '/role/edit',
			data : data,
			responseType : 'json'
		};
		$http(req).then(function(response){
			var data = response.data;
			$modalInstance.close();
		}, function(response){
			var data = response.data;
			layer.msg(data.msg);
		})
	}

	/*添加*/
	$scope.add = function(){
		var data = {
			name : $scope.name,
			slug : $scope.slug,
			description : $scope.description,
			level : $scope.level,
			permissions : $scope.permissions
		};

		var req = {
			method : 'POST',
			url : '/role/add',
			data : data,
			responseType : 'json'
		};
		$http(req).then(function(response){
			var data = response.data;
			$modalInstance.close();
		}, function(response){
			var data = response.data;
			layer.msg(data.msg);
		})
	}

	/*tree ready*/
	$scope.ready = function(node, action, selected, event){
	};
	$scope.changed = function(node, action, selected, event){
		$scope.permissions = action.selected;
	};
}]);