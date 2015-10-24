MetronicApp.controller('TableController', function($rootScope, $http, $log, $modal, $compile, $scope, DTOptionsBuilder, DTColumnBuilder){
    /*配置datatables*/
    $scope.dtInstance = {};
    $scope.animationsEnabled = true;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
             // Either you specify the AjaxDataProp here
             // dataSrc: 'data',
             url: '/api/nav/show',
             type: 'POST'
         })
         // or here
         .withDataProp('data')
            .withOption('serverSide', true)
            .withPaginationType('full_numbers')
            .withOption('createdRow', createdRow);

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('cata_name').withTitle('分类名称'),
        DTColumnBuilder.newColumn('cata_type').withTitle('分类类型'),
        DTColumnBuilder.newColumn('cata_status').withTitle('分类状态'),
        DTColumnBuilder.newColumn('cata_path').withTitle('分类路径').notVisible(),
        DTColumnBuilder.newColumn(null).withTitle('分类名称').renderWith(actionsHtml)
    ];

    function createdRow(row, data, dataIndex) {
        // Recompiling so we can bind Angular directive to the DT
        $compile(angular.element(row).contents())($scope);
    }

    /*修改*/
    $scope.edit = function(id) {
        // $scope.message = 'You are trying to edit the row with ID: ' + id;
        // Edit some data and call server to make changes...
        // Then reload the data so that DT is refreshed
        $scope.dtInstance.reloadData();
    }

    /*删除*/
    $scope.delete = function(id) {
        $http.post('/api/nav/delete', {id : id}).then(function(response){
            var data = response.data;
            if(data.status){
                $scope.dtInstance.reloadData();
            }else{
                alert(data.message);
            }
        }, function(response){});
    }

    // 操作按钮
    function actionsHtml(data, type, full, meta) {

        return '<button class="btn btn-warning" ng-click="open('+data.id+', lg)">' +
            '   <i class="fa fa-edit"></i>' +
            '</button>&nbsp;' +
            '<button class="btn btn-danger" ng-click="delete(' + data.id + ')">' +
            '   <i class="fa fa-trash-o"></i>' +
            '</button>';;
    }

    /*打开modal*/
    $scope.open = function (id, size) {
        var modalInstance = $modal.open({
            animation: $scope.animationsEnabled,
            templateUrl: '/admin/nav/edit/' + id,
            controller: 'ModalInstanceCtrl',
            size: size,
            resolve: {
                dtInstance: function(){
                    return $scope.dtInstance;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };

    /*添加分类*/
    $scope.addNav = function(size){
        var modalInstance = $modal.open({
            animation: $scope.animationsEnabled,
            // templateUrl: 'myModalContent.html',
            templateUrl: '/admin/nav/add/',
            controller: 'ModalInstanceCtrl',
            size: size,
            resolve: {
                dtInstance: function(){
                    return $scope.dtInstance;
                }
            }
        });

        modalInstance.result.then(function (selectedItem) {
            $scope.selected = selectedItem;
        }, function () {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };
}).controller('ModalInstanceCtrl', function ($http, $scope, $modalInstance, DTInstances) {

    $scope.cata_name = "";
    $scope.cata_type = {};
    $scope.cata_types = [];
    $scope.cata_status = "";
    $scope.cata_par = {};
    $scope.cata_pars = [];
    $scope.cata_sort = 0;
    // 初始化 cata_types
    $http.get('/admin/nav/navfrom', {responseType : 'json'}).then(function(response){
        console.log(response.data);
        $scope.cata_types = response.data;
    }, function(response){
        console.log(response);
    });

    // 初始化cata_paths
    $http.get('/api/nav/navlist', {responseType : 'json'}).then(function(response){
        console.log(response.data);
        $scope.cata_pars = response.data;
    }, function(response){
        console.log(response);
    });

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };

    // 修改
    $scope.save = function(){
        layer.load(2);
        if(!angular.isDefined($scope.cata_name)){
            alert("分类名称不能为空");
            return false;
        }
        if(!angular.isDefined($scope.cata_type.selected.value)){
            alert("分类类型不能为空");
            return false;
        }
        if(!angular.isDefined($scope.cata_par.selected.cata_name)){
            alert("分类父路径不能为空");
            return false;
        }

        // 封装传送数据
        var data = {
            id : $scope.id,
            cata_parent_name : $scope.cata_par.selected.cata_name,
            cata_parent_id : $scope.cata_par.selected.id,
            cata_name : $scope.cata_name,
            cata_type : $scope.cata_type.selected.value,
            cata_status : $scope.cata_status,
            cata_path : $scope.cata_par.selected.cata_path,
            cata_level : $scope.cata_par.selected.cata_level + 1,
            cata_sort : $scope.cata_sort,
        }
        $http.post('/api/nav/edit', data).then(function(response){
            $scope.cancel();  //取消模态框
            DTInstances.getLast().then(function(dtInstance){
                dtInstance.reloadData();  //重新加载datatables
            });
            layer.closeAll('loading');
        }, function(response){
            layer.closeAll('loading');
        });
    };

    // 添加
    $scope.add = function(){
        layer.load(2);
        if(!angular.isDefined($scope.cata_name)){
            alert("分类名称不能为空");
            return false;
        }
        if(!angular.isDefined($scope.cata_type.selected.value)){
            alert("分类类型不能为空");
            return false;
        }
        if(!angular.isDefined($scope.cata_par.selected.cata_name)){
            alert("分类父路径不能为空");
            return false;
        }

        // 封装传送数据
        var data = {
            cata_parent_name : $scope.cata_par.selected.cata_name,
            cata_parent_id : $scope.cata_par.selected.id,
            cata_name : $scope.cata_name,
            cata_type : $scope.cata_type.selected.value,
            cata_status : $scope.cata_status,
            cata_path : $scope.cata_par.selected.cata_path,
            cata_level : $scope.cata_par.selected.cata_level + 1,
            cata_sort : $scope.cata_sort,
        }
        $http.post('/api/nav/add', data).then(function(response){
            $scope.cancel();  //取消模态框
            DTInstances.getLast().then(function(dtInstance){
                dtInstance.reloadData();  //重新加载datatables
            });
            layer.closeAll('loading');
        }, function(response){
            layer.closeAll('loading');
        });
    }
});