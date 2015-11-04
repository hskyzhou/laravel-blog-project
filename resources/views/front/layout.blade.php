<html ng-app="hsky">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>首页</title>

		@section('common_css')
			<link rel="stylesheet" href="{{asset('components/bootstrap/dist/css/bootstrap.min.css')}}">
		
		@show
		
		@section('custom_css')
			<link rel="stylesheet" href="{{asset('hsky/hsky.css')}}">
			<link rel="stylesheet" href="{{asset('hsky/styles.css')}}">
		@show

		@yield('other_css')

		
	</head>
	<body  ng-class="bodyclass">
		<div ng-controller="MainController">
			@section('search')
				@include('front.search')
			@show

			<div id="main" class="site-main">
				@section('header')
					@include('front.header')
				@show
			</div>

			@yield('content')

			<div class="site-bottom">
				@section('footer')
					@include('front.footer')
				@show
			</div>
		</div>
		
	
		
		<a ng-controller="ScrollController" href='#' class="scroll_to_top icon-up show" title="Scroll to top" ng-click="back_to_top()">
			<i class="fa fa-arrow-up"></i>
		</a>

		@section('common_js')
			<script src="{{asset('components/jquery/dist/jquery.min.js')}}"></script>
			<script src="{{asset('components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

			<script src="{{asset('components/angular/angular.min.js')}}"></script>
			<script src="{{asset('hsky/jquery.sticky.js')}}"></script>
			<script src="{{asset('components/ngSticky/dist/sticky.min.js')}}"></script>
			<script src="{{asset('components/angular-scroll/angular-scroll.min.js')}}"></script>
		@show

		@section('custom_js')
			
		@show

		@yield('other_js')

	</body>
</html>



