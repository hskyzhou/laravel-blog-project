/***
Metronic AngularJS App Main Script
***/

/* Metronic App */
var MetronicApp = angular.module("MetronicApp", [
    "ui.router", 
    "ui.bootstrap", 
    "oc.lazyLoad",  
    "ngSanitize"
]); 

/* Configure ocLazyLoader(refer: https://github.com/ocombe/ocLazyLoad) */
MetronicApp.config(['$ocLazyLoadProvider', function($ocLazyLoadProvider) {
    $ocLazyLoadProvider.config({
        // global configs go here
    });
}]);

/********************************************
 BEGIN: BREAKING CHANGE in AngularJS v1.3.x:
*********************************************/
/**
`$controller` will no longer look for controllers on `window`.
The old behavior of looking on `window` for controllers was originally intended
for use in examples, demos, and toy apps. We found that allowing global controller
functions encouraged poor practices, so we resolved to disable this behavior by
default.

To migrate, register your controllers with modules rather than exposing them
as globals:

Before:

```javascript
function MyController() {
  // ...
}
```

After:

```javascript
angular.module('myApp', []).controller('MyController', [function() {
  // ...
}]);

Although it's not recommended, you can re-enable the old behavior like this:

```javascript
angular.module('myModule').config(['$controllerProvider', function($controllerProvider) {
  // this option might be handy for migrating old apps, but please don't use it
  // in new ones!
  $controllerProvider.allowGlobals();
}]);
**/

//AngularJS v1.3.x workaround for old style controller declarition in HTML
MetronicApp.config(['$controllerProvider', function($controllerProvider) {
  // this option might be handy for migrating old apps, but please don't use it
  // in new ones!
  $controllerProvider.allowGlobals();
}]);

/********************************************
 END: BREAKING CHANGE in AngularJS v1.3.x:
*********************************************/

/* Setup global settings */
MetronicApp.factory('settings', ['$rootScope', function($rootScope) {
    // supported languages
    var settings = {
        layout: {
            pageSidebarClosed: false, // sidebar menu state
            pageBodySolid: false, // solid body color state
            pageAutoScrollOnLoad: 1000 // auto scroll to top on page load
        },
        layoutImgPath: Metronic.getAssetsPath() + 'admin/layout/img/',
        layoutCssPath: Metronic.getAssetsPath() + 'admin/layout/css/'
    };

    $rootScope.settings = settings;

    return settings;
}]);

/* Setup App Main Controller */
MetronicApp.controller('AppController', ['$scope', '$rootScope', function($scope, $rootScope) {
    $scope.$on('$viewContentLoaded', function() {
        Metronic.initComponents(); // init core components
        // Layout.init(); //  Init entire layout(header, footer, sidebar, etc) on page load if the partials included in server side instead of loading with ng-include directive 
    });
}]);

/***
Layout Partials.
By default the partials are loaded through AngularJS ng-include directive. In case they loaded in server side(e.g: PHP include function) then below partial 
initialization can be disabled and Layout.init() should be called on page load complete as explained above.
***/

/* Setup Layout Part - Header */
MetronicApp.controller('HeaderController', ['$scope', function($scope) {
    Layout.initHeader(); // init header
}]);

/* Setup Layout Part - Sidebar */
MetronicApp.controller('SidebarController', ['$scope', function($scope) {
    Layout.initSidebar(); // init sidebar
   
}]);

/* Setup Layout Part - Quick Sidebar */
MetronicApp.controller('QuickSidebarController', ['$scope', function($scope) {    
    setTimeout(function(){
        QuickSidebar.init(); // init quick sidebar        
    }, 2000)
}]);

/* Setup Layout Part - Theme Panel */
MetronicApp.controller('ThemePanelController', ['$scope', function($scope) {    
    Demo.init(); // init theme panel
}]);

/* Setup Layout Part - Footer */
MetronicApp.controller('FooterController', ['$scope', function($scope) {
    Layout.initFooter(); // init footer
}]);

/* Setup Rounting For All Pages */
MetronicApp.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function($stateProvider, $urlRouterProvider, $locationProvider) {
    $locationProvider.html5Mode(true);
    $locationProvider.hashPrefix('!');
    // Redirect any unmatched url
    $urlRouterProvider.otherwise("/test");

    $stateProvider
        .state('admin', {
            url: "/admin",
            templateUrl: "/admin/ng-index",            
            data: {pageTitle: 'index page'},
            controller: "",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load({
                        name: 'MetronicApp',
                        insertBefore: '#ng_load_plugins_before', // load the above css files before a LINK element with this ID. Dynamic CSS files must be loaded between core and theme css files
                        files: [
                        ] 
                    });
                }]
            }
        })

        .state('menu', {
            url: "/menu",
            templateUrl: "/menu/ng-index",
            data: {pageTitle: 'AngularJS File Upload'},
            // controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                    {
                        name: 'MetronicApp',
                        files: [
                            // '/js/controllers/GeneralPageController.js'
                        ]
                    }]);
                }]
            }
        })

        .state('menu.list', {
            url: "/list",
            templateUrl: "/menu/ng-menu-list",
            data: {pageTitle: 'AngularJS File Upload'},
            controller: "MenuListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'ui.select',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../global/plugins/angularjs/plugins/ui-select/select.min.css',
                                '../../../global/plugins/angularjs/plugins/ui-select/select.min.js',
                                // '../../../global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
                                // '../../../global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
                                
                            ]   
                        },
                        {
                            name: 'datatables',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files: [
                                '../../../components/datatables/media/css/jquery.dataTables.min.css',
                                '../../../components/datatables/media/css/dataTables.bootstrap.min.css',
                                // '../../../components/datatables/media/css/dataTables.responsive.css',

                                '../../../components/datatables/media/js/jquery.dataTables.min.js',
                                '../../../components/angular-datatables/dist/angular-datatables.min.js',
                                '../../../components/datatables/media/js/dataTables.bootstrap.min.js',
                                // '../../../components/datatables/media/js/dataTables.responsive.js',
                            ] 
                        },
                        {
                            name: 'MetronicApp',
                            files: [
                                '../../../global/plugins/select2/select2.css',                             
                                '../../../global/plugins/select2/select2.min.js',

                                '../../../components/layer/layer.js',

                                '/js/controllers/MenuListController.js'
                            ]
                    }]);
                }]
            }
        })

        .state('role', {
            url: "/role",
            templateUrl: "/role/ng-index",
            data: {pageTitle: '用户权限'},
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                    {
                        name: 'MetronicApp',
                        files: [
                        
                        ]
                    }]);
                }]
            }
        })

        .state('role.list', {
            url: "/list",
            templateUrl: "/role/ng-role-list",
            data: {pageTitle: '权限列表'},
            controller: "RoleListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'ui.select',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../global/plugins/angularjs/plugins/ui-select/select.min.css',
                                '../../../global/plugins/angularjs/plugins/ui-select/select.min.js',
                                
                            ]   
                        },
                        {
                            name: 'datatables',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files: [
                                '../../../components/datatables/media/css/jquery.dataTables.min.css',
                                '../../../components/datatables/media/css/dataTables.bootstrap.min.css',

                                '../../../components/datatables/media/js/jquery.dataTables.min.js',
                                '../../../components/angular-datatables/dist/angular-datatables.min.js',
                                '../../../components/datatables/media/js/dataTables.bootstrap.min.js',
                            ] 
                        },
                        {
                            name : 'jsTree.directive',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files : [
                                '../../../components/angular-jstree/jsTree.directive.js',
                            ]
                        },
                        {
                            name: 'MetronicApp',
                            files: [
                                '../../../global/plugins/select2/select2.css',
                                '../../../components/jstree/dist/themes/default/style.min.css',

                                '../../../global/plugins/select2/select2.min.js',

                                '../../../components/jstree/dist/jstree.min.js',

                                '/js/controllers/RoleListController.js'
                            ]
                    }]);
                }]
            }
        })

        .state('permission', {
            url: "/permission",
            templateUrl: "/permission/ng-index",
            data: {pageTitle: 'AngularJS File Upload'},
            // controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                    {
                        name: 'MetronicApp',
                        files: [
                            // '/js/controllers/GeneralPageController.js'
                        ]
                    }]);
                }]
            }
        })

        .state('permission.list', {
            url: "/list",
            templateUrl: "/permission/ng-permission-list",
            data: {pageTitle: 'AngularJS File Upload'},
            controller: "PermissionListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'ui.select',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../global/plugins/angularjs/plugins/ui-select/select.min.css',
                                '../../../global/plugins/angularjs/plugins/ui-select/select.min.js',
                                
                            ]   
                        },
                        {
                            name: 'datatables',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files: [
                                '../../../components/datatables/media/css/jquery.dataTables.min.css',
                                '../../../components/datatables/media/css/dataTables.bootstrap.min.css',

                                '../../../components/datatables/media/js/jquery.dataTables.min.js',
                                '../../../components/angular-datatables/dist/angular-datatables.min.js',
                                '../../../components/datatables/media/js/dataTables.bootstrap.min.js',
                            ] 
                        },
                        {
                            name: 'MetronicApp',
                            files: [
                                '../../../global/plugins/select2/select2.css',                             
                                '../../../global/plugins/select2/select2.min.js',

                                '/js/controllers/PermissionListController.js'
                            ]
                    }]);
                }]
            }
        })
    
        /*user*/
        .state('user', {
            url: "/user",
            templateUrl: "/user/ng-index",
            data: {pageTitle: 'AngularJS File Upload'},
            // controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                    {
                        name: 'MetronicApp',
                        files: [
                            // '/js/controllers/GeneralPageController.js'
                        ]
                    }]);
                }]
            }
        })

        .state('user.list', {
            url: "/list",
            templateUrl: "/user/ng-user-list",
            data: {pageTitle: 'AngularJS File Upload'},
            controller: "UserListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name : 'jsTree.directive',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files : [
                                '../../../components/angular-jstree/jsTree.directive.js',
                            ]
                        },
                        {
                            name: 'ui.select',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../components/angular-ui-select/dist/select.min.js',
                                '../../../components/angular-ui-select/dist/select.min.css'
                            ]   
                        },
                        {
                            name: 'datatables',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files: [
                                '../../../components/datatables/media/css/jquery.dataTables.min.css',
                                '../../../components/datatables/media/css/dataTables.bootstrap.min.css',

                                '../../../components/datatables/media/js/jquery.dataTables.min.js',
                                '../../../components/angular-datatables/dist/angular-datatables.min.js',
                                '../../../components/datatables/media/js/dataTables.bootstrap.min.js',
                            ] 
                        },
                        {
                            name: 'MetronicApp',
                            files: [
                                '../../../components/jstree/dist/themes/default/style.min.css',
                                '../../../components/jstree/dist/jstree.min.js',

                                '../../../global/plugins/select2/select2.css',        
                                '../../../global/plugins/select2/select2.min.js',

                                '/js/controllers/UserListController.js'
                            ]
                    }]);
                }]
            }
        })
        // article
        .state('article', {
            url: "/article",
            templateUrl: "/article/ng-index",
            data: {pageTitle: 'AngularJS File Upload'},
            // controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                    {
                        name: 'MetronicApp',
                        files: [
                            
                        ]
                    }]);
                }]
            }
        })

        .state('article.add', {
            url: "/add",
            templateUrl: "/article/ng-add",
            data: {pageTitle: '文章管理'},
            controller: "ArticleListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'ui.select',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../components/angular-ui-select/dist/select.min.js',
                                '../../../components/angular-ui-select/dist/select.min.css'
                            ]   
                        },
                        {
                            name: 'datatables',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files: [
                                '../../../components/datatables/media/css/jquery.dataTables.min.css',
                                '../../../components/datatables/media/css/dataTables.bootstrap.min.css',

                                '../../../components/datatables/media/js/jquery.dataTables.min.js',
                                '../../../components/angular-datatables/dist/angular-datatables.min.js',
                                '../../../components/datatables/media/js/dataTables.bootstrap.min.js',
                            ] 
                        },
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../editor.md-master/css/editormd.min.css',
                                '../../../editor.md-master/editormd.min.js',
                                '../../../js/controllers/ArticleListController.js',
                            ]   
                        },
                    ]);
                }] 
            }
        })
        .state('article.update', {
            url: "/update?id",
            templateUrl: function(stateParams){
                return "/article/ng-update?id=" + stateParams.id;
            },
            data: {pageTitle: '文章修改'},
            controller: "ArticleListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'ui.select',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../components/angular-ui-select/dist/select.min.js',
                                '../../../components/angular-ui-select/dist/select.min.css'
                            ]   
                        },
                        {
                            name: 'datatables',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files: [
                                '../../../components/datatables/media/css/jquery.dataTables.min.css',
                                '../../../components/datatables/media/css/dataTables.bootstrap.min.css',

                                '../../../components/datatables/media/js/jquery.dataTables.min.js',
                                '../../../components/angular-datatables/dist/angular-datatables.min.js',
                                '../../../components/datatables/media/js/dataTables.bootstrap.min.js',
                            ] 
                        },
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../editor.md-master/css/editormd.min.css',
                                '../../../editor.md-master/editormd.min.js',
                                '../../../js/controllers/ArticleListController.js',
                            ]
                        },
                    ]);
                }] 
            }
        })
        .state('article.list', {
            url: "/list",
            templateUrl: "/article/ng-list",
            data: {pageTitle: '文章列表'},
            controller: "ArticleListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'ui.select',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../components/angular-ui-select/dist/select.min.js',
                                '../../../components/angular-ui-select/dist/select.min.css'
                            ]   
                        },
                        {
                            name: 'datatables',
                            insertBefore: '#ng_load_plugins_before', // load 
                            files: [
                                '../../../components/datatables/media/css/jquery.dataTables.min.css',
                                '../../../components/datatables/media/css/dataTables.bootstrap.min.css',

                                '../../../components/datatables/media/js/jquery.dataTables.min.js',
                                '../../../components/angular-datatables/dist/angular-datatables.min.js',
                                '../../../components/datatables/media/js/dataTables.bootstrap.min.js',
                            ] 
                        },
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../editor.md-master/css/editormd.min.css',
                                '../../../editor.md-master/editormd.min.js',
                                '../../../js/controllers/ArticleListController.js',
                            ]   
                        },
                    ]);
                }] 
            }
        })
        .state('log', {
            url: "/log",
            templateUrl: "/log/ng-index",
            data: {pageTitle: 'AngularJS File Upload'},
            // controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                    {
                        name: 'MetronicApp',
                        files: [
                            
                        ]
                    }]);
                }]
            }
        })
        .state('log.list', {
            url: "/list",
            templateUrl: "/log-viewer/logs",
            data: {pageTitle: '日志列表'},
            controller: "LogListController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../js/controllers/LogListController.js'
                            ]   
                        },
                    ]);
                }] 
            }
        })
        .state('log.overall', {
            url: "/overall",
            templateUrl: "/log-viewer",
            data: {pageTitle: '日志总览'},
            controller: "LogOverallController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../../components/Chart.js/Chart.min.js',
                                '../../js/controllers/LogOverallController.js',
                            ]   
                        },
                    ]);
                }] 
            }
        })
        .state('log.detail', {
            url: "/detail/:date",
            templateUrl: function(stateParams){
                return "/log-viewer/logs/" + stateParams.date;
            },
            data: {pageTitle: '日志详情'},
            controller: "LogDetailController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../js/controllers/LogDetailController.js'
                            ]
                        },
                    ]);
                }] 
            }
        })
        .state('log.type', {
            url: "/type/:date/:type",
            templateUrl: function(stateParams){
                return "/log-viewer/logs/" + stateParams.date + "/"+ stateParams.type;
            },
            data: {pageTitle: '日志详情'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../js/controllers/GeneralPageController.js'
                            ]
                        },
                    ]);
                }] 
            }
        })
        .state('log.download', {
            url: "/download/:date",
            templateUrl: function(stateParams){
                return "/log-viewer/logs/" + stateParams.date + "/download";
            },
            data: {pageTitle: '日志详情'},
            controller: "GeneralPageController",
            resolve: {
                deps: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            name: 'MetronicApp',
                            insertBefore: '#ng_load_plugins_before', // load the above css files before '#ng_load_plugins_before'
                            files: [
                                '../../js/controllers/GeneralPageController.js'
                            ]
                        },
                    ]);
                }] 
            }
        });
        
}]);

/* Init global settings and run the app */
MetronicApp.run(["$rootScope", "settings", "$state", function($rootScope, settings, $state) {
    $rootScope.$state = $state; // state to be accessed from view
}]);