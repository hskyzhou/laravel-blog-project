MetronicApp.controller('ArticleController', function($rootScope, $scope, $http, $timeout) {
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

    $scope.add = function(){
        data = {
            title : $scope.title,
            catagory : $scope.catagory,
            content : $scope.editor.getMarkdown(),
            html_content : $scope.editor.getHTML(),
        };

        // console.log(data);
        // $http.post('/article/add', data).then(function(response){
        //     layer.msg('fail');
        // }).when(function(response){
        //     layer.msg('success');
        // });

        $http.post('/article/store', data).
          then(function(response) {
            $scope.errors = response.data;
            // this callback will be called asynchronously
            // when the response is available
          }, function(response) {
            $scope.errors = response.data;
            // console.log('success', response);
            // called asynchronously if an error occurs
            // or server returns response with an error status.
          });
    }
});