<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>menu Test</title>
		<link rel="stylesheet" href="{{asset('components/bootstrap/dist/css/bootstrap.min.css')}}">

		<link rel="stylesheet" href="{{asset('test/styles.css')}}">
		<link rel="stylesheet" href="{{asset('test/hsky.css')}}">
		{{-- <link rel="stylesheet" href="{{asset('test/font-awesome.min.css')}}"> --}}

		<script src="{{asset('components/jquery/dist/jquery.min.js')}}"></script>
		<script src="{{asset('test/jquery.sticky.js')}}"></script>
		<script src="{{asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('components/angular/angular.min.js')}}"></script>
		<script src="{{asset('components/ngSticky/dist/sticky.min.js')}}"></script>
		<script src="{{asset('test/hsky.js')}}"></script>
	</head>
	<body ng-app="hsky" ng-class="bodyclass" ng-controller="MainContainer">
		<div class="hsky-searchscreen" ng-class="searchclass">
			<div class="close_search">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close" ng-click="close_search()"><i class="glyphicon glyphicon-remove"></i></button>
			</div>
			
			<div class="zl_formbox">
				<div class="text-center searched">
					<h3>Looking for something?</h3>
				</div>
				<form action="http://zatolab.com/acacia-wp">
					<div class="zl_srcinputbox">
						<input type="text" name="s" id="s" placeholder="Just Type and Hit Enter" autocomplete="off">
						<div class="loader" style="display: none;"></div>
						<a href="#" class="zl_ajaxsrcfire" style="display: block;">
							<i class="fa fa-search"></i>
						</a>
						<div class="clear"></div>
					</div>
				</form>
				<div class="clear"></div>
				<div class="ajaxsearchresult">
					<span class="result-total">14 Results</span>
					<div class="forsearch" style="display: block;">
						<ul class="resultlist">		
							<li class="fadeInUp animated" ng-repeat="result in results">
								<div class="row">
									<div class="col-md-2 column">
										<a href="@{{result.href}}">
										<img class="img-responsive" width="100" height="100" src="@{{result.imgs}}" alt="@{{result.alt}}">		</a>
									</div>
									<div class="col-md-10 column">
										<a href="@{{result.href}}" class="ajax_postlink">@{{result.title}}</a>
										<div class="clear"></div>
										<div class="zl_aj_src_meta">
											<i class="fa fa-folder-open-o"></i>
											<a href="@{{result.href}}" rel="category tag">Food</a>
												<i class="fa fa-calendar"></i>
												<a href="@{{result.href}}">@{{result.date}}</a>
										</div>
										<div class="clear"></div>
										@{{result.content}}
										<a href="@{{result.href}}" class="zl_ajax_src_rdmore">Read More</a>
									</div>
								</div>
							</li>
						</ul>
					</div><!-- pagination -->
					
					
					<div class="row">
						<div class="page">
							<div class="ts-pagi-wrapper">
								<div class="page-navi">
									<ul class="page-numbers">
										<li>
											<a href="#">
												<i class="fa fa-angle-left mt12"></i>
											</a>
										</li>
										<li class="active">
											<a href="http://swift.themestudio.net/?s">1</a>
										</li>
										<li>
											<span class="screen-reader-text">Link to page number 2</span>
											<a href="http://swift.themestudio.net/page/2/?s">2</a>
										</li> 
										<li>
											<span class="screen-reader-text">Link to page number 3</span>
											<a href="http://swift.themestudio.net/page/3/?s">3</a>
										</li>
										<li class="next-posts-link">
											<a href="http://swift.themestudio.net/page/2/?s">
												<i class="fa fa-angle-right mt12"></i>
											</a>
										</li>
										<li>
											<span class="screen-reader-text">Link to next posts</span>
											<a href="http://swift.themestudio.net/page/2/?s"><i class="fa fa-angle-right mt12"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="clear"></div>
		</div>

		<div id="main" class="site-main">
		    <header id="header" class="site-header sticky-header header_one_menu_center">
		    	<div class="logo-adv-wrap">
		    	    <div class="container">
		    	       <div class="logo">
		    	            <h1>
		    	                <a href="http://swift.themestudio.net/">
		    	                    <img alt="Swift - An Elegant Smooth WP Blog Theme" src="{{asset('test/logo.png')}}"/>
		    	                </a>
		    	            </h1>
		    	        </div>
		    	        <span class="ts-description">Hsky Blog &amp; Php Python</span>    
		    	        {{-- <span class="icon-head-one-menu"><i class="fa fa-bars"></i></span> --}}
		    	    </div>
		    	</div><!-- /.logo-adv-wrap -->

		    	<div id="sticky-wrapper" class="sticky-wrapper" style="height: 84px;" sticky disabled-sticky="disableSticking">
					<nav class="navbar navbar-default navbar-static-top main-nav" role="navigation">
						<div class="container">
							<div class="navbar-header">
							  	<button aria-controls="navbar" aria-expanded="true" data-target="#navbar" data-toggle="collapse" class="navbar-toggle" type="button">
								    <span class="sr-only">Toggle navigation</span>
								    <span class="icon-bar"></span>
								    <span class="icon-bar"></span>
								    <span class="icon-bar"></span>
							  	</button>
							</div>

							<div class="navbar-collapse collapse" id="navbar" role="menu" aria-expanded="true">
								<ul id="menu-main-menu-for-header-style-1-and-style-2" class="nav navbar-nav nav-primary">
									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown">
										<a title="开发语言" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">开发语言</a>
										<ul role="menu" class=" dropdown-menu">
										    <li class="menu-item menu-item-type-post_type menu-item-object-page">
										        <a title="Python" href="http://swift.themestudio.net/shop/">python</a>
										    </li>
										    <li class="menu-item menu-item-type-post_type menu-item-object-page">
										        <a title="Java" href="http://swift.themestudio.net/cart/">Java</a>
										    </li>
										    <li class="menu-item menu-item-type-post_type menu-item-object-page">
										        <a title="Php" href="http://swift.themestudio.net/checkout/">Php</a>
										    </li>
										</ul>
									</li>

									<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown">
										<a title="每日心得" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">每日心得</a>
									</li>
								</ul>
								
								<ul class="nav navbar-nav nav-primary navbar-right">
									<li class="search" ng-click="start_search()">
										<a><i class="glyphicon glyphicon-search"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
			</header>
		</div>

		<div class="hsky-body">
			<div class="container">
				<div class="col-md-9 blogger">
					<div class="row">
						<div class="col-md-4">
							<div class="row">
					        	<a class="" href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
					        		<img src="{{asset('test/t.jpg')}}" class="img-reponsive img-rounded" alt="paprika-733571_1280">
					        	</a>
							</div>
						</div>
						<div class="col-md-8 hsky-post-header">
						   	<div class="row">
								<p class="hsky-post-item">
									<span class="hsky-post-span"><i class="fa fa-clock-o"></i> Feb 11</span>
									<span class="hsky-post-span">
										<i class="fa fa-folder-o"></i>
										<a href="http://capethemes.com/demo/lines/alt/category/lifestyle/" rel="category tag">Lifestyle</a>
									</span>
							        <span class="hsky-post-span">
							        	<a href="#" class="jm-post-like" data-post_id="1328" title="Like"><i class="fa fa-heart-o"></i>&nbsp;5</a>
							        </span>
							    </p>
							    <h2 class="hsky-post-title">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
							    		<em>In outer aspect</em>, Pip and Dough-Boy made a match
							    	</a>
							    </h2>
						        <p class="teaser tranz">I opine, that it is plainly traceable to the first arrival of the Greenland whaling ships in London, more than two centuries ago. Because those whalemen did...</p>
						                    
						                         
								<p class="text-right hsky-post-more">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">Read more <i class="fa fa-long-arrow-right"></i></a>
							    </p>
						    </div><!-- end .item_inn -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="row">
					        	<a class="" href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
					        		<img src="{{asset('test/t.jpg')}}" class="img-reponsive img-rounded" alt="paprika-733571_1280">
					        	</a>
							</div>
						</div>
						<div class="col-md-8 hsky-post-header">
						   	<div class="row">
								<p class="hsky-post-item">
									<span class="hsky-post-span"><i class="fa fa-clock-o"></i> Feb 11</span>
									<span class="hsky-post-span">
										<i class="fa fa-folder-o"></i>
										<a href="http://capethemes.com/demo/lines/alt/category/lifestyle/" rel="category tag">Lifestyle</a>
									</span>
							        <span class="hsky-post-span">
							        	<a href="#" class="jm-post-like" data-post_id="1328" title="Like"><i class="fa fa-heart-o"></i>&nbsp;5</a>
							        </span>
							    </p>
							    <h2 class="hsky-post-title">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
							    		<em>In outer aspect</em>, Pip and Dough-Boy made a match
							    	</a>
							    </h2>
						        <p class="teaser tranz">I opine, that it is plainly traceable to the first arrival of the Greenland whaling ships in London, more than two centuries ago. Because those whalemen did...</p>
						                    
						                         
								<p class="text-right hsky-post-more">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">Read more <i class="fa fa-long-arrow-right"></i></a>
							    </p>
						    </div><!-- end .item_inn -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="row">
					        	<a class="" href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
					        		<img src="{{asset('test/t.jpg')}}" class="img-reponsive img-rounded" alt="paprika-733571_1280">
					        	</a>
							</div>
						</div>
						<div class="col-md-8 hsky-post-header">
						   	<div class="row">
								<p class="hsky-post-item">
									<span class="hsky-post-span"><i class="fa fa-clock-o"></i> Feb 11</span>
									<span class="hsky-post-span">
										<i class="fa fa-folder-o"></i>
										<a href="http://capethemes.com/demo/lines/alt/category/lifestyle/" rel="category tag">Lifestyle</a>
									</span>
							        <span class="hsky-post-span">
							        	<a href="#" class="jm-post-like" data-post_id="1328" title="Like"><i class="fa fa-heart-o"></i>&nbsp;5</a>
							        </span>
							    </p>
							    <h2 class="hsky-post-title">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
							    		<em>In outer aspect</em>, Pip and Dough-Boy made a match
							    	</a>
							    </h2>
						        <p class="teaser tranz">I opine, that it is plainly traceable to the first arrival of the Greenland whaling ships in London, more than two centuries ago. Because those whalemen did...</p>
						                    
						                         
								<p class="text-right hsky-post-more">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">Read more <i class="fa fa-long-arrow-right"></i></a>
							    </p>
						    </div><!-- end .item_inn -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="row">
					        	<a class="" href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
					        		<img src="{{asset('test/t.jpg')}}" class="img-reponsive img-rounded" alt="paprika-733571_1280">
					        	</a>
							</div>
						</div>
						<div class="col-md-8 hsky-post-header">
						   	<div class="row">
								<p class="hsky-post-item">
									<span class="hsky-post-span"><i class="fa fa-clock-o"></i> Feb 11</span>
									<span class="hsky-post-span">
										<i class="fa fa-folder-o"></i>
										<a href="http://capethemes.com/demo/lines/alt/category/lifestyle/" rel="category tag">Lifestyle</a>
									</span>
							        <span class="hsky-post-span">
							        	<a href="#" class="jm-post-like" data-post_id="1328" title="Like"><i class="fa fa-heart-o"></i>&nbsp;5</a>
							        </span>
							    </p>
							    <h2 class="hsky-post-title">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
							    		<em>In outer aspect</em>, Pip and Dough-Boy made a match
							    	</a>
							    </h2>
						        <p class="teaser tranz">I opine, that it is plainly traceable to the first arrival of the Greenland whaling ships in London, more than two centuries ago. Because those whalemen did...</p>
						                    
						                         
								<p class="text-right hsky-post-more">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">Read more <i class="fa fa-long-arrow-right"></i></a>
							    </p>
						    </div><!-- end .item_inn -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="row">
					        	<a class="" href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
					        		<img src="{{asset('test/t.jpg')}}" class="img-reponsive img-rounded" alt="paprika-733571_1280">
					        	</a>
							</div>
						</div>
						<div class="col-md-8 hsky-post-header">
						   	<div class="row">
								<p class="hsky-post-item">
									<span class="hsky-post-span"><i class="fa fa-clock-o"></i> Feb 11</span>
									<span class="hsky-post-span">
										<i class="fa fa-folder-o"></i>
										<a href="http://capethemes.com/demo/lines/alt/category/lifestyle/" rel="category tag">Lifestyle</a>
									</span>
							        <span class="hsky-post-span">
							        	<a href="#" class="jm-post-like" data-post_id="1328" title="Like"><i class="fa fa-heart-o"></i>&nbsp;5</a>
							        </span>
							    </p>
							    <h2 class="hsky-post-title">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">
							    		<em>In outer aspect</em>, Pip and Dough-Boy made a match
							    	</a>
							    </h2>
						        <p class="teaser tranz">I opine, that it is plainly traceable to the first arrival of the Greenland whaling ships in London, more than two centuries ago. Because those whalemen did...</p>
						                    
						                         
								<p class="text-right hsky-post-more">
							    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">Read more <i class="fa fa-long-arrow-right"></i></a>
							    </p>
						    </div><!-- end .item_inn -->
						</div>
					</div>
					<div class="row">
						<div class="page">
							<div class="ts-pagi-wrapper">
								<div class="page-navi">
									<ul class="page-numbers">
										<li>
											<a href="#">
												<i class="fa fa-angle-left mt12"></i>
											</a>
										</li>
										<li class="active">
											<a href="http://swift.themestudio.net/?s">1</a>
										</li>
										<li>
											<span class="screen-reader-text">Link to page number 2</span>
											<a href="http://swift.themestudio.net/page/2/?s">2</a>
										</li> 
										<li>
											<span class="screen-reader-text">Link to page number 3</span>
											<a href="http://swift.themestudio.net/page/3/?s">3</a>
										</li>
										<li class="next-posts-link">
											<a href="http://swift.themestudio.net/page/2/?s">
												<i class="fa fa-angle-right mt12"></i>
											</a>
										</li>
										<li>
											<span class="screen-reader-text">Link to next posts</span>
											<a href="http://swift.themestudio.net/page/2/?s"><i class="fa fa-angle-right mt12"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					
					<div id="text-5" class="sidebar-box widget_text">
						<div class="textwidget">
							<div class="feature-post">
					       		<figure>
					       			<img alt="Swift Blog" class="img-circle" src="{{asset('test/me.jpg')}}">
					       		</figure>
					       		
					       		<h5 class="aboutme-username">hsky zhou</h5>

					       		<h6 class="aboutme_userposition">designer</h6>

					       		<div class="aboutme_description"><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
					       		</div>
		
					        	<p style="text-align:center;margin:10px auto 0">
					        		<img alt="Swift Blog" src="{{asset('test/logo.png')}}">
					        	</p>
					        </div>
					    </div>
					</div>


					<div id="categories-4" class="sidebar-box widget_categories">
						<div class="ts-sidebar-widget">
							<div class="sidebar-title">
								<span>Categories</span>
							</div>
						</div>
						<ul>
							<li class="cat-item"><a href="http://swift.themestudio.net/category/digital/">Digital</a>
							</li>
								<li class="cat-item"><a href="http://swift.themestudio.net/category/discovery/">Discovery</a>
							</li>
								<li class="cat-item"><a href="http://swift.themestudio.net/category/fashion/">Fashion</a>
							</li>
								<li class="cat-item"><a href="http://swift.themestudio.net/category/love-life/">Love &amp; Life</a>
							</li>
								<li class="cat-item"><a href="http://swift.themestudio.net/category/photography/">Photography</a>
							</li>
								<li class="cat-item"><a href="http://swift.themestudio.net/category/photoshop/">Photoshop</a>
							</li>
								<li class="cat-item"><a href="http://swift.themestudio.net/category/web-design/">Web Design</a>
							</li>
						</ul>
					</div>
					
					<div id="ts_widget_new_posts-6" class="sidebar-box">
						<div class="ts-sidebar-widget">
							<h5 class="widget-title"><span>New Posts</span></h5>
						</div>
						<ul class="latest-post clearfix">
							<li>
								<a href="http://swift.themestudio.net/morbi-quis-neque-vitae-turpis-commodo/">
									<img src="{{asset('test/a.jpg')}}" alt="Morbi quis neque vitae turpis commodo">
								</a>
								<p>
									<a href="http://swift.themestudio.net/morbi-quis-neque-vitae-turpis-commodo/">Morbi quis neque vitae turpis commodo</a>
								</p>
								<div class="entry-meta">
									<span><i class="fa fa-clock-o"></i> September 21, 2015</span>
								</div>
					        </li>
					        <li>
					        	<a href="http://swift.themestudio.net/suspendisse-eget-nisl-nisl-duis-a-mattis-arcu/">
					        		<img src="{{asset('test/b.png')}}" alt="Suspendisse eget nisl nisl. Duis a mattis arcu.">
					        	</a>
					        	<p>
					        		<a href="http://swift.themestudio.net/suspendisse-eget-nisl-nisl-duis-a-mattis-arcu/">Suspendisse eget nisl nisl. Duis a mattis arcu.</a>
					        	</p>
					        	<div class="entry-meta">
					        		<span><i class="fa fa-clock-o"></i> September 21, 2015</span>
					        	</div>
					        </li>
					        <li>
					        	<a href="http://swift.themestudio.net/maecenas-hendrerit-dapibu-quam-lobortis-tempor/">
					        		<img src="{{asset('test/c.jpg')}}" alt="Maecenas hendrerit dapibu quam lobortis tempor.">
					        	</a>
					        	<p>
					        		<a href="http://swift.themestudio.net/maecenas-hendrerit-dapibu-quam-lobortis-tempor/">Maecenas hendrerit dapibu quam lobortis tempor.</a>
					        	</p>
					        	<div class="entry-meta">
					        		<span><i class="fa fa-clock-o"></i> September 21, 2015</span>
					        	</div>
					        </li>
				        	<li>
				        		<a href="http://swift.themestudio.net/ut-enim-ad-minim-veniamquis-nostrud-exercitation-ullamco/">
				        			<img src="{{asset('test/d.jpg')}}" alt="Ut enim ad minim veniam exercitation.">
				        		</a>
				        		<p>
				        			<a href="http://swift.themestudio.net/ut-enim-ad-minim-veniamquis-nostrud-exercitation-ullamco/">Ut enim ad minim veniam exercitation.</a>
				        		</p>
				        		<div class="entry-meta">
				        			<span><i class="fa fa-clock-o"></i> September 21, 2015</span>
				        		</div>
				            </li>
				        </ul>
				    </div>

					<div id="tag_cloud-2" class="sidebar-box widget_tag_cloud">
						<div class="ts-sidebar-widget">
							<div class="sidebar-title">
								<span>Tags cloud</span>
							</div>
						</div>
						<div class="tagcloud">
							<a href="http://swift.themestudio.net/tag/css3/" class="tag-link-19" title="1 topic" style="font-size: 8pt;">css3</a>
							<a href="http://swift.themestudio.net/tag/discovery/" class="tag-link-18" title="1 topic" style="font-size: 8pt;">Discovery</a>
							<a href="http://swift.themestudio.net/tag/jquery/" class="tag-link-14" title="1 topic" style="font-size: 8pt;">jQuery</a>
							<a href="http://swift.themestudio.net/tag/masonry/" class="tag-link-15" title="1 topic" style="font-size: 8pt;">Masonry</a>
							<a href="http://swift.themestudio.net/tag/photoshop/" class="tag-link-13" title="2 topics" style="font-size: 22pt;">Photoshop</a>
							<a href="http://swift.themestudio.net/tag/wordpress/" class="tag-link-12" title="2 topics" style="font-size: 22pt;">Wordpress</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="site-bottom">
			<div class="scroll-wrap">
				<a class="scroll-top" href="#">
					<span class="screen-reader-text">Back to top of Swift - An Elegant Smooth WP Blog Theme</span>
					<img alt="" src="http://swift.themestudio.net/wp-content/themes/swiftblog/assets/images/scroll.png">
				</a>
			</div>
			<div class="main-bottom">
				<div>
					<a href="http://swift.themestudio.net/">
						<img alt="Swift - An Elegant Smooth WP Blog Theme" src="{{asset('test/logo.png')}}">
					</a>
				</div>
					Copyright © 2015 
					<a href="#" target="_blank">Hsky Blog</a>
					. Development by 
					<a href="#" target="_blank">Hsky</a>
				<div class="social-icon">
					<a href="http://facebook.com" target="_blank">
						<span class="screen-reader-text">Share on fa-facebook</span>
						<i class="fa fa-facebook"></i>
					</a>
					<a href="http://twitter.com" target="_blank">
						<span class="screen-reader-text">Share on fa-twitter</span>
						<i class="fa fa-twitter"></i>
					</a>
					<a href="#" target="_blank">
						<span class="screen-reader-text">Share on fa-tumblr</span>
						<i class="fa fa-tumblr"></i>
					</a>
					<a href="#" target="_blank">
						<span class="screen-reader-text">Share on fa-github-alt</span>
						<i class="fa fa-github-alt"></i>
					</a>
		          	<a href="#" target="_blank">
		          		<span class="screen-reader-text">Share on fa-dribbble</span>
		          		<i class="fa fa-dribbble"></i>
		          	</a>
		        </div>
		    </div>
		</div>

		<a href="#" class="scroll_to_top icon-up show" title="Scroll to top">
			<i class="fa fa-arrow-up"></i>
		</a>
	</body>
</html>



