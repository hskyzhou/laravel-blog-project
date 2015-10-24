<!DOCTYPE html>
<html lang="en" ng-app="MetronicApp">
	<head>
		<title data-ng-bind="'hskyblog-' + $state.current.data.pageTitle"></title>

		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>

		<link href="{{asset('global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('global/plugins/typeahead/typeahead.css')}}" rel="stylesheet" type="text/css"/>
		<!-- BEGIN DYMANICLY LOADED CSS FILES(all plugin and page related styles must be loaded between GLOBAL and THEME css files ) -->
		<link id="ng_load_plugins_before"/>
		<!-- END DYMANICLY LOADED CSS FILES -->
		
		<link href="{{asset('global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="{{asset('global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
		<link href="{{asset('admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="{{asset('admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/>

		<link rel="shortcut icon" href="favicon.ico"/>
	</head>

	<body ng-controller="AppController" class="page-header-fixed page-sidebar-closed-hide-logo page-quick-sidebar-over-content page-on-load" ng-class="{'page-container-bg-solid': settings.layout.pageBodySolid, 'page-sidebar-closed': settings.layout.pageSidebarClosed}">
		
		<!-- BEGIN PAGE SPINNER -->
		<div ng-spinner-bar class="page-spinner-bar">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
		<!-- END PAGE SPINNER -->
	
		{{-- header start --}}
		<div ng-controller="HeaderController" class="page-header navbar navbar-fixed-top">
			@include('admin.header')
		</div>
		{{-- header end --}}

		<div class="clearfix"></div>

		<div class="page-container">
			<div ng-controller="SidebarController" class="page-sidebar-wrapper">			
				@include('admin.leftside')
			</div>

			<div class="page-content-wrapper">
				<div class="page-content">
					<div data-ng-controller="ThemePanelController" class="theme-panel hidden-xs hidden-sm" ng-view></div>
					<div ui-view class="fade-in-up"></div> 
				</div>	
			</div>
			
			<!-- BEGIN QUICK SIDEBAR -->
			<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
			<div data-ng-controller="QuickSidebarController" class="page-quick-sidebar-wrapper">
				@include('admin.quick-sidebar')
			</div>
			<!-- END QUICK SIDEBAR -->
		</div>
		<!-- END CONTAINER -->

		<!-- BEGIN FOOTER -->
		<div data-ng-controller="FooterController" class="page-footer">
			@include('admin.footer')
		</div>
		<!-- END FOOTER -->

		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

		<!-- BEGIN CORE JQUERY PLUGINS -->
		<script src="{{asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>	
		
		<!-- END CORE JQUERY PLUGINS -->

		<!-- BEGIN CORE ANGULARJS PLUGINS -->
		<script src="{{asset('global/plugins/angularjs/angular.min.js')}}" type="text/javascript"></script>	
		<script src="{{asset('global/plugins/angularjs/angular-sanitize.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/angularjs/angular-touch.min.js')}}" type="text/javascript"></script>	
		<script src="{{asset('global/plugins/angularjs/plugins/angular-ui-router.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/angularjs/plugins/ocLazyLoad.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/angularjs/plugins/ui-bootstrap-tpls.min.js')}}" type="text/javascript"></script>
		<!-- END CORE ANGULARJS PLUGINS -->
		
		<!-- BEGIN APP LEVEL ANGULARJS SCRIPTS -->
		<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
		<script src="{{asset('js/directives.js')}}" type="text/javascript"></script>
		<!-- END APP LEVEL ANGULARJS SCRIPTS -->

		<!-- BEGIN APP LEVEL JQUERY SCRIPTS -->
		<script src="{{asset('global/scripts/metronic.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/layout/scripts/layout.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/layout/scripts/quick-sidebar.js')}}" type="text/javascript"></script>
		<script src="{{asset('admin/layout/scripts/demo.js')}}" type="text/javascript"></script> 
		<script src="{{asset('components/layer/layer.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/typeahead/handlebars.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('global/plugins/typeahead/typeahead.bundle.min.js')}}" type="text/javascript"></script>
		<!-- END APP LEVEL JQUERY SCRIPTS -->

		<script type="text/javascript">
			/* Init Metronic's core jquery plugins and layout scripts */
			$(document).ready(function() {   
				Metronic.init(); // Run metronic theme
				Metronic.setAssetsPath(''); // Set the assets folder path			
			});
		</script>

		<script type="text/javascript">
			angular.element(document.getElementsByTagName('head')).append(angular.element('<base href="' + window.location.pathname + '" />'));
		</script>
	</body>
</html>