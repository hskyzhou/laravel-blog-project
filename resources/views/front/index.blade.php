@extends('front.layout')

@section('content')
	<div class="hsky-body">
		<div class="container">
			<div class="col-md-9 blogger">
				@if(!empty($articles))
					@foreach($articles as $article)
						<div class="row margin_bottom20">
							<div class="col-md-4">
								<div class="row">
						        	<a class="" href="{{route('articles.detail')}}/{{$article['id']}}">
						        		<img src="{{asset('hsky/t.jpg')}}" class="img-reponsive img-rounded" alt="paprika-733571_1280">
						        	</a>
								</div>
							</div>
							<div class="col-md-8 hsky-post-header">
							   	<div class="row">
									<p class="hsky-post-item">
										<span class="hsky-post-span"><i class="fa fa-clock-o"></i>{{$article['created_at']->toDateString()}}</span>
										<span class="hsky-post-span">
											<i class="fa fa-folder-o"></i>
											<a href="{{route('articles.list')}}" rel="category tag">{{$article['catagory']}}</a>
										</span>
								        <span class="hsky-post-span">
								        	<a href="#" class="jm-post-like" data-post_id="1328" title="Like"><i class="fa fa-heart-o"></i>&nbsp;0</a>
								        </span>
								    </p>
								    <h2 class="hsky-post-title">
								    	<a href="{{route('articles.detail')}}/{{$article['id']}}">
								    		{{$article['title']}}
								    	</a>
								    </h2>
							        <p class="teaser tranz">{{$article['content']}}</p>
							                    
							                         
									<p class="text-right hsky-post-more">
								    	<a href="http://capethemes.com/demo/lines/alt/nor-indeed-can-the-whale-possibly-be-otherwise-than-fragrant/">Read more <i class="fa fa-long-arrow-right"></i></a>
								    </p>
							    </div><!-- end .item_inn -->
							</div>
						</div>	
					@endforeach
				@endif
			</div>
			<div class="col-md-3">
				<div offset="100" sticky>
					<div scrollable style="height:700px;" parameters='{"mouseWheel":true}'>
						<div id="text-5" class="sidebar-box widget_text">
							<div class="textwidget">
								<div class="feature-post">
						       		<figure>
						       			<img alt="Swift Blog" class="img-circle" src="{{asset('hsky/me.jpg')}}">
						       		</figure>
						       		
						       		<h5 class="aboutme-username">hsky zhou</h5>

						       		<h6 class="aboutme_userposition">designer</h6>

						       		<div class="aboutme_description"><p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
						       		</div>

						        	<p style="text-align:center;margin:10px auto 0">
						        		<img alt="Swift Blog" src="{{asset('hsky/logo.png')}}">
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
							<ul class="lahsky-post clearfix">
								<li>
									<a href="http://swift.themestudio.net/morbi-quis-neque-vitae-turpis-commodo/">
										<img src="{{asset('hsky/a.jpg')}}" alt="Morbi quis neque vitae turpis commodo">
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
						        		<img src="{{asset('hsky/b.png')}}" alt="Suspendisse eget nisl nisl. Duis a mattis arcu.">
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
						        		<img src="{{asset('hsky/c.jpg')}}" alt="Maecenas hendrerit dapibu quam lobortis tempor.">
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
					        			<img src="{{asset('hsky/d.jpg')}}" alt="Ut enim ad minim veniam exercitation.">
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
		</div>
	</div>
@endsection

@section('other_js')
	<script type="text/javascript" src="{{asset('global/plugins/iscroll/build/iscroll.js')}}"></script>
	<script type="text/javascript" src="{{asset('global/plugins/angular-momentum-scroll/src/scrollable.js')}}"></script>
	<script src="{{asset('hsky/controllers/indexController.js')}}"></script>
@endsection