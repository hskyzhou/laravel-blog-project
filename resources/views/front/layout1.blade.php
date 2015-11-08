
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Morbi quis neque vitae turpis commodo | Swift &#8211; An Elegant Smooth WP Blog Theme</title>
  
  @section('common_css')
    <link rel="stylesheet" href="{{asset('front/css/contact.styles.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/woocommerce-layout.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/woocommerce-smallscreen.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/woocommerce.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/frontend.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/colorbox.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/woocommerce.prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.selectBox.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/checkbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.mb.YTPlayer.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/woocommerce.swift.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/admin.ajax.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/form.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font.google.css')}}">
  @show
  
  @section('custom_css')
    <style type="text/css" title="dynamic-css" class="options-output">
      body{font-family:Roboto;font-weight:normal;font-style:normal;color:#4d4d4d;}
      ul.nav > li > a{font-family:Roboto;font-weight:400;font-style:normal;}
      h1{font-family:"Playfair Display";font-weight:normal;font-style:normal;}
      h2{font-family:"Playfair Display";font-weight:normal;font-style:normal;}
      h3{font-family:"Playfair Display";font-weight:normal;font-style:normal;}
      h4{font-family:"Playfair Display";font-weight:normal;font-style:normal;}
      h5{font-family:"Playfair Display";font-weight:normal;font-style:normal;}
      h6{font-family:"Playfair Display";font-weight:normal;font-style:normal;}
    </style>

    <link rel="stylesheet" href="{{asset('front/css/js_composer.css')}}">
  @show
  
  @yield('other_css')
  

  <body class="single single-post postid-612 single-format-standard swift-enable-sticky-menu wpb-js-composer js-comp-ver-4.7.4 vc_responsive">
    <div id="main" class="site-main swift-standard-model">
      {{-- header --}}
      @include('front.header1')
      {{-- header end --}}
      

      <!-- Content -->
      @yield('content')
      <!-- End / Content -->
      
      {{-- footer --}}
      @include('front.footer1')
      {{-- footer end --}}
    </div>
    <!--/#main-->

    <!-- End / Page wrap -->
    @section('common_js')
      <script type="text/javascript" src="{{asset('front/js/jquery.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery-migrate.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/add-to-cart.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/woocommerce-add-to-cart.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.prettyPhoto.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.fitvids.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.mb.YTPlayer.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/owl.carousel.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/main.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.lazy.min.js')}}"></script>
    @show
    
    @section('custom_js')  
      <script type="text/javascript" src="{{asset('front/js/jquery.form.min.js')}}"></script>
      
      <script type="text/javascript" src="{{asset('front/js/scripts.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.blockUI.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/woocommerce.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.cookie.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/cart-fragments.min.js')}}"></script>
      {{-- <script type="text/javascript" src="{{asset('front/js/yith-wcan-frontend.min.js')}}"></script> --}}
      <script type="text/javascript" src="{{asset('front/js/woocompare.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.colorbox-min.js')}}"></script>

      <script type="text/javascript" src="{{asset('front/js/jquery.prettyPhoto.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.prettyPhoto.init.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.selectBox.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.yith-wcwl.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/imagesloaded.pkgd.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/chosen.jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/jquery.sticky.js')}}"></script>
      <script type="text/javascript" src="{{asset('front/js/js_composer_front.js')}}"></script>
    @show

    @yield('other_js')
  </body>
</html>