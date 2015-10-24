{{-- 继承index/layout.blade.php --}}
@extends('index.layout')

@section('css')
	@parent
@endsection

@section('body-left')
	<div class="col-md-8">
	  <!-- 内容 -->
	  <section class="blog-content blog-grid">
	    <div class="row">

	        <!-- POST -->
	        @forelse($articles as $article)
	        	<div class="col-sm-6 col-md-6">
	        	    <div class="post">
	        	        <div class="post-cat">
	        	            <ul>
	        	                <li><a href="#">Python</a></li>
	        	            </ul>
	        	        </div>
	        	        <div class="post-format">
	        	            <a href="#">
	        	                {{-- <i class="fa fa-video-camera"></i> --}}
	        	            </a>
	        	        </div>
	        	        <div class="post-media">
	        	            <div class="image-wrap">
	        	                <a href="/hsky/detail/{{$article->id}}"><img alt="" src="http://xgio.net/html/bamboo/images/blog/1.jpg" style="height: 100%; width: auto;"></a>
	        	            </div>
	        	            <div class="post-share">
	        	                <div class="share">
	        	                    <a href="#">
	        	                        <i class="fa fa-facebook"></i>
	        	                        <span class="count">500</span>
	        	                    </a>
	        	                    <a href="#">
	        	                        <i class="fa fa-twitter"></i>
	        	                        <span class="count">320</span>
	        	                    </a>
	        	                    <a href="#">
	        	                        <i class="fa fa-dribbble"></i>
	        	                        <span class="count">400</span>
	        	                    </a>
	        	                    <a href="#">
	        	                        <i class="fa fa-instagram"></i>
	        	                        <span class="count">150</span>
	        	                    </a>
	        	                </div>
	        	            </div>
	        	        </div>
	        	        <div class="post-title">
	        	            <h2><a href="/hsky/detail/{{$article->id}}">{{$article->title}}</a></h2>
	        	        </div>
	        	        <div class="post-meta">
	        	            <span class="author">
	        	                <i class="pi-icon pi-icon-user"></i>
	        	                By <a href="#">hsky</a>
	        	            </span>
	        	            <span class="date">
	        	                <i class="pi-icon pi-icon-clock"></i>
	        	                <a href="#">{{$article->created_at}}</a>
	        	            </span>
	        	            <span class="comment">
	        	                <i class="pi-icon pi-icon-comment"></i>
	        	                <a href="#">05 Comments</a>
	        	            </span>
	        	        </div>
	        	    </div>
	        	</div>
	        @empty
	        <div>很懒。都没有留下</div>
	        @endforelse
	        <!-- END / POST -->
	    </div>
	    
	    <div class="pi-loadmore">
	        <span class="item"></span>
	        <span class="item"></span>
	        <span class="item"></span>
	    </div>
	  </section>
	  <div class="panel">
	    <div id="pager"></div>
	  </div>
	</div>
@endsection

@section('body-right')
	@parent
@endsection


@section('js')
	@parent
@endsection