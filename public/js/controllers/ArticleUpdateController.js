MetronicApp.controller('ArticleListController',['$rootScope', '$scope', '$http', '$timeout', 'DTOptionsBuilder', 'DTColumnBuilder', '$compile', '$stateParams', function($rootScope, $scope, $http, $timeout, DTOptionsBuilder, DTColumnBuilder, $compile, $stateParams) {
    $scope.$on('$viewContentLoaded', function() {   
        // initialize core components
        Metronic.initAjax();

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
    });

    // set sidebar closed and body solid layout mode
    $rootScope.settings.layout.pageBodySolid = true;
    $rootScope.settings.layout.pageSidebarClosed = false;


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
}]);