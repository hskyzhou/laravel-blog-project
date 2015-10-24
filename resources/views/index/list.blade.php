@extends('index.layout')

@section('css')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('index/css/owl.carousel.css') }}">
@endsection

@section('body-left')
  <div class="col-md-8">
    <!-- 内容 -->
    <section class="blog-content blog-standard" style="margin-bottom:40px;">
      <div class="post">
          <div class="post-title">
              <h2><a href="single.html">Nam commodo turpis sit amet magna</a></h2>
          </div>
          <div class="post-meta">
              <span class="author">
                  <i class="pi-icon pi-icon-user"></i>
                  By <a href="#">Admin</a>
              </span>
              <span class="date">
                  <i class="pi-icon pi-icon-clock"></i>
                  <a href="#">Jan 10, 2014</a>
              </span>
              <span class="comment">
                  <i class="pi-icon pi-icon-comment"></i>
                  <a href="#">05 Comments</a>
              </span>
          </div>
          <div class="post-media">
              <div class="image-wrap">
                  <img alt="" src="http://xgio.net/html/bamboo/images/blog/1.jpg">
              </div>
          </div>
          <div class="post-body">
              <div class="post-entry">
                  <p>Cras blandit dolor eu sapien fringilla scelerisque. Etiam quis magna scelerisque, efficitur tortor sagittis, lacinia dui. Suspendisse fermentum molestie eros. Aenean ultrices laoreet diam facilisis vestibulum. Donec tincidunt, tortor in congue consectetur, eros velit cursus ex, sit amet luctus diam ipsum in magna. Donec neque risus, lacinia et ipsum non, mollis scelerisque neque. Nulla eu tristique magna. Phasellus egestas rhoncus est, a pharetra odio congue quis.</p>
                  <ol>
                      <li>Duis blandit quis augue sit amet scelerisque.</li>
                      <li>Nullam eget tellus pellentesque, egestas lacus ut, tempus metus.</li>
                  </ol>
              </div>
          </div>
          <div class="post-footer">
              <div class="post-link">
                  <a href="single.html">Continue Reading...</a>
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
      </div>
    </section>
    <div class="panel">
      <div id="pager"></div>
    </div>
  </div>
@endsection

@section('body-right')
  <div class="rightsidebar">
    #aaa
    @parent
  </div>
@endsection

@section('js')
  @parent
  <script src="{{asset('index/vendor/jquery.owl.carousel.js')}}"></script>
  <script src="{{asset('index/vendor/jquery.pin.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      var paginationSlider = ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'];
      $('.owl-wrapper').owlCarousel({
        autoPlay: false,
        slideSpeed: 300,
        items: 3,
        itemsCustom: [[0, 1], [600, 2], [870, 3]],
        navigation: true,
        pagination: false,
        autoHeight: true,
        itemsScaleUp: true,
        navigationText: paginationSlider
      });

      {{-- 
        $(".rightsidebar").pin({
          containerSelector: ".content-wrap",
          padding:{
            top: 80,
          },
          minWidth:940
        });
      --}}
    });
  </script>
@endsection