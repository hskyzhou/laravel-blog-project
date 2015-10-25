MetronicApp.controller('ArticleListController',['$rootScope', '$scope', '$http', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', '$compile', function($rootScope, $scope, $http, $timeout, DTOptionsBuilder, DTColumnBuilder, $compile) {
    $scope.$on('$viewContentLoaded', function() {   
        // initialize core components
        Metronic.initAjax();
    });

    // set sidebar closed and body solid layout mode
    $rootScope.settings.layout.pageBodySolid = true;
    $rootScope.settings.layout.pageSidebarClosed = false;

    /*设置参数*/
    $scope.id = '';
    $scope.title = '';
    $scope.catagory = '';
    $scope.content = "#aaaa";
    $scope.html_content = '';
    $scope.editor = editormd("editormd", {
        // width   : "90%",
        saveHTMLToTextarea : true,
        height  : 640,
        syncScrolling : "single",
        path : "../../editor.md-master/lib/" // Autoload modules mode, codemirror, marked... dependents libs path
    });

    /*配置datatables*/
    $scope.dtInstance = {};
    $scope.animationsEnabled = true;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withOption('ajax', {
             // Either you specify the AjaxDataProp here
             dataSrc: 'data',
             url: '/article/apiarticlelist?r='+Math.random(),
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
        DTColumnBuilder.newColumn('title').withTitle('文章标题'),
        DTColumnBuilder.newColumn('content').withTitle('内容'),
        DTColumnBuilder.newColumn('html_content').withTitle('html内容'),
        DTColumnBuilder.newColumn('catagory').withTitle('分类'),
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
            actionHtml += '<a class="btn btn-warning" href="/article/update?id='+data.id+'"><i class="fa fa-edit"></i></a>';
        }
        if(full.delete){
            actionHtml += ' <a class="btn btn-danger" ng-click="delete(' + data.id + ')"><i class="fa fa-trash-o"></i></a>';
        }
        return actionHtml;
    }

    /*删除菜单*/
    $scope.delete = function(id){
        layer.confirm("确定要删除吗?",function(index){
            var req = {
                method : 'POST',
                url : '/article/delete',
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

    /*提交--添加文章*/
    $scope.add = function(){
        data = {
            title : $scope.title,
            catagory : $scope.catagory,
            content : $scope.editor.getMarkdown(),
            html_content : $scope.editor.getHTML(),
        };

        $http.post('/article/add', data).
          then(function(response) {
            $scope.errors = response.data;
            // this callback will be called asynchronously
            // when the response is available
          }, function(response) {
            $scope.errors = response.data;
            // called asynchronously if an error occurs
            // or server returns response with an error status.
          });
    }

    /*提交--修改文章*/
    $scope.update = function(){
        data = {
            id : $scope.id,
            title : $scope.title,
            catagory : $scope.catagory,
            content : $scope.editor.getMarkdown(),
            html_content : $scope.editor.getHTML(),
        };

        $http.post('/article/update', data).
          then(function(response) {
            var data = response.data;
            if(data.status){
                console.log(data);
                $scope.errors = data.success;
            }else{
                $scope.errors = data.errors;
            }
            // this callback will be called asynchronously
            // when the response is available
          }, function(response) {
            var data = response.data;
            if(data.status){
                $scope.errors = data.success;
            }else{
                $scope.errors = data.errors;
            }
            // called asynchronously if an error occurs
            // or server returns response with an error status.
          });
    }
}]);