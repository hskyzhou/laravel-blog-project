<!DOCTYPE html>
<html lang="en">
 	<head>
    <meta charset="utf-8">
    <title>{{$title or 'hsky'}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- css --}}
    @section('css')
      <link href="{{asset('index/css/bootstrap.min.css')}}" rel="stylesheet">

      <!-- buttons -->
      <link rel="stylesheet" href="{{ asset('index/css/buttons.css') }}">

      <link rel="stylesheet" href="{{ asset('index/css/font-awesome.min.css') }}">

      <link rel="stylesheet" href="{{ asset('index/css/sky-mega-menu.css') }}">

      <!-- index css -->
      <link href="{{ asset('index/css/common.css') }}" rel="stylesheet">
      <link href="{{ asset('index/css/timeline.css') }}" rel="stylesheet">
      <link href="{{ asset('index/css/index.css') }}" rel="stylesheet">
      <!-- PAGE STYLE -->
      <link rel="stylesheet" type="text/css" href="{{ asset('index/css/customer.css') }}">
    @show
 	</head>

 	<body>
 		{{-- nav --}}
 		<nav class="main-navigation">
 		 	<div class="container">
 		   	@include('index.header')
 		  </div>
 		</nav>

 		{{-- body --}}
 		<section class="content-wrap">
 		  <div class="container" style="max-width:1500px;">
 		    <div class="row">
 		    	@section('body-left')
 		    	@show

 		    	@section('body-right')
 		    		<div class="col-md-4">
 		    		  <div class="panel widget search-form">
 		    		    <form action="" class="">
 		    		      <div class="form-group clearfix">
 		    		        <label for="search">Search</label>
 		    		        <input type="text" id="search" class="pull-left" placeholder="搜索..."/>
 		    		        <button class="fa fa-search search-submit btn btn-default pull-right" type="submit"></button>
 		    		      </div>
 		    		    </form>
 		    		  </div>
 		    		  <div class="panel widget">
 		    		    <h4 class="title">挨踢江湖</h4>
 		    		    <div id="vertical-timeline" class="vertical-container light-timeline">
 		    		      <div class="vertical-timeline-block">
 		    		        <div class="vertical-timeline-title">
 		    		        </div>
 		    		      </div>
 		    		      <div class="vertical-timeline-block">
 		    		        <div class="vertical-timeline-icon navy-bg">
 		    		          <i class='fa fa-briefcase'></i>
 		    		        </div>
 		    		        <div class="vertical-timeline-content">
 		    		          <h2>会议</h2>
 		    		          <p>上一年的销售业绩发布会。总结产品营销和销售趋势及销售的现状。</p>
 		    		          <a href="" class="btn btn-sm btn-primary"> 更多信息</a>
 		    		          <span class="vertical-date"><small>2月3日</small></span>
 		    		        </div>
 		    		      </div>
 		    		      <div class="vertical-timeline-block">
 		    		        <div class="vertical-timeline-icon navy-bg">
 		    		          <i class='fa fa-briefcase'></i>
 		    		        </div>
 		    		        <div class="vertical-timeline-content">
 		    		          <h2>会议</h2>
 		    		          <p>上一年的销售业绩发布会。总结产品营销和销售趋势及销售的现状。</p>
 		    		          <a href="" class="btn btn-sm btn-primary"> 更多信息</a>
 		    		          <span class="vertical-date">今天<br><small>2月3日</small></span>
 		    		        </div>
 		    		      </div>
 		    		      <div class="vertical-timeline-block">
 		    		        <div class="vertical-timeline-icon navy-bg">
 		    		          <i class='fa fa-briefcase'></i>
 		    		        </div>
 		    		        <div class="vertical-timeline-content">
 		    		          <h2>会议</h2>
 		    		          <p>上一年的销售业绩发布会。总结产品营销和销售趋势及销售的现状。</p>
 		    		          <a href="" class="btn btn-sm btn-primary"> 更多信息</a>
 		    		          <span class="vertical-date">今天<br><small>2月3日</small></span>
 		    		        </div>
 		    		      </div>
 		    		      <div class="vertical-timeline-block">
 		    		        <div class="vertical-timeline-icon navy-bg">
 		    		          <i class='fa fa-briefcase'></i>
 		    		        </div>
 		    		        <div class="vertical-timeline-content">
 		    		          <h2>会议</h2>
 		    		          <p>上一年的销售业绩发布会。总结产品营销和销售趋势及销售的现状。</p>
 		    		          <a href="" class="btn btn-sm btn-primary"> 更多信息</a>
 		    		          <span class="vertical-date">今天<br><small>2月3日</small></span>
 		    		        </div>
 		    		      </div>
 		    		    </div>
 		    		  </div>
 		    		</div>
 		    	@show
 		    </div>
 		  </div>
 		</section>
	
		{{-- footer --}}
 		<footer class="main-footer">
 		  <div class="container">
 		    @include('index.footer')
 		  </div>
 		</footer>

 		{{-- copy right --}}
 		<div class="copyright">
 		    <div class="container">
 		        <div class="row">
 		            <div class="rol-sm-12">
 		                  ©2015 <a href="#">hsky</a>.&nbsp;<span>All Right Reserved.</span>        
 		            </div>
 		        </div>
 		    </div>
 		</div>
		
		{{-- js --}}
    @section('js')
     	<script src="{{asset('components/jquery/dist/jquery.min.js')}}"></script>
     	<script src="{{asset('index/vendor/laypage/laypage.js')}}"></script>
     	<script src="{{asset('components/jquery.nicescroll/dist/jquery.nicescroll.min.js')}}"></script>
     	<script src="{{asset('index/js/common.js')}}"></script>
    @show
	</body>
</html>
