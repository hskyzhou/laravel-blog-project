<div class="page-sidebar navbar-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->
	<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
	<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
	<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
	<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" ng-class="{'page-sidebar-menu-closed': settings.layout.pageSidebarClosed}">
		<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
		<li class="sidebar-search-wrapper">
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
			<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
			<form class="sidebar-search sidebar-search-bordered" action="extra_search.html" method="POST">
				<a href="javascript:;" class="remove">
				<i class="icon-close"></i>
				</a>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
		</li>
		
		{{--
		<li class="start">
			<a href="javascript:;">
			<i class="icon-settings"></i>
			<span class="title">AngularJS Features</span>
			<span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li>
					<a href="/admin/menu1">
					<i class="icon-puzzle"></i> UI Bootstrap</span>
					</a>
				</li>
				<li>
					<a href="/admin/menu2">
					<i class="icon-paper-clip"></i> File Upload</span>
					</a>
				</li>
				<li>
					<a href="/admin/menu3">
					<i class="icon-check"></i> UI Select</span>
					</a>
				</li>
			</ul>
		</li>
		--}}
		<li class="start">
			<a href="/admin/nav">
			<i class="icon-home"></i>
			<span class="title">导航管理</span>
			</a>
		</li>

		<li class="start">
			<a href="javascript:;">
			<i class="icon-settings"></i>
			<span class="title">文章管理</span>
			<span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li>
					<a href="/article/add">
					<i class="icon-puzzle"></i>添加文章</span>
					</a>
				</li>
				<li>
					<a href="/article/list">
					<i class="icon-paper-clip"></i>文章列表</span>
					</a>
				</li>
			</ul>
		</li>

		<li class="start">
			<a href="javascript:;">
			<i class="icon-settings"></i>
			<span class="title">菜单管理</span>
			<span class="arrow "></span>
			</a>
			<ul class="sub-menu">
				<li>
					<a href="/article/add">
					<i class="icon-puzzle"></i>菜单列表</span>
					</a>
				</li>
			</ul>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>	