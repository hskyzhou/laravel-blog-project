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