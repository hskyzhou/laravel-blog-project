@extends('index.layout')

@section('css')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('index/css/owl.carousel.css') }}">
@endsection

@section('body-left')
  <div class="col-md-8">
    <!-- 内容 -->
    <div class="page-container">
      <section class="blog-standard">
      <!-- POST -->
      <div class="post">
          <div class="post-cat">
              <ul>
                  <li><a href="#">Python</a></li>
              </ul>
          </div>
          <div class="post-title">
              <h1>{{$article->title}}</h1>
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
          <div class="post-media">
              <div class="image-wrap">
                  <img alt="" src="http://xgio.net/html/bamboo/images/blog/1.jpg">
              </div>
          </div>
          <div class="post-body">
              <div class="post-entry">
                {!!$article->html_content!!}
              </div>
          </div>
          <div class="post-footer">
              <div class="post-tag">
                  <h5>Tag:</h5>
                  <a href="#">Travel</a>
                  <a href="#">Restaurant</a>
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
      <!-- END / POST -->

      <!-- ABOUT AUTHOR -->
      <div class="about-author">
          <div class="image-thumb fl">
              <img alt="" src="http://xgio.net/html/bamboo/images/author/2.jpg">
          </div>
          <div class="author-info">
              <div class="author-name">
                  <h4>Gary Neville</h4>
              </div>
              <div class="author-content">
                  <p>Phasellus facilisis convallis metus, ut imperdiet augue auctor nec. Duis at velit id augue lobortis porta. Sed varius, enim accumsan aliquam tincidunt, tortor urna vulputate quam, eget finibus urna est in augue.</p>
              </div>
              <div class="author-social">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-dribbble"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
              </div>
          </div>
      </div>
      <!-- END / ABOUT AUTHOR -->

      <!-- RELATED POSTS -->
      {{-- <div class="related-post">
        <h4>Related posts</h4>
        <div class="related-slider owl-carousel owl-theme" style="opacity: 1; display: block;">
          <div class="owl-wrapper-outer autoHeight" style="height: 272px;">
            <div class="owl-wrapper">
              <div class="owl-item" style="width: 362px;">
                <div class="related-post-item">
                  <div class="post-media">
                      <div class="image-wrap image-cover">
                          <img alt="" src="http://xgio.net/html/bamboo/images/blog/1.jpg" style="height: 100%; width: auto;">
                      </div>
                  </div>
                  <div class="post-body">
                      <div class="post-title">
                          <h2><a href="single.html">Nam commodo turpis sit amet magna</a></h2>
                      </div>
                      <span class="post-date">March 05, 2015</span>
                  </div>
                </div>
              </div>
              <div class="owl-item" style="width: 362px;">
                <div class="related-post-item">
                  <div class="post-media">
                    <div class="image-wrap image-cover">
                        <img alt="" src="http://xgio.net/html/bamboo/images/blog/2.jpg" style="height: 100%; width: auto;">
                    </div>
                  </div>
                  <div class="post-body">
                    <div class="post-title">
                        <h2><a href="single.html">Nam commodo turpis sit amet magna</a></h2>
                    </div>
                    <span class="post-date">March 05, 2015</span>
                  </div>
                </div>
              </div>
              <div class="owl-item" style="width: 362px;">
                <div class="related-post-item">
                  <div class="post-media">
                    <div class="image-wrap image-cover">
                      <img alt="" src="http://xgio.net/html/bamboo/images/blog/3.jpg" style="height: 100%; width: auto;">
                    </div>
                  </div>
                  <div class="post-body">
                    <div class="post-title">
                        <h2><a href="single.html">Ut sit amet massa</a></h2>
                    </div>
                    <span class="post-date">March 05, 2015</span>
                  </div>
                </div>
              </div>
              <div class="owl-item" style="width: 362px;">
                <div class="related-post-item">
                  <div class="post-media">
                      <div class="image-wrap image-cover">
                          <img alt="" src="http://xgio.net/html/bamboo/images/blog/4.jpg" style="height: 100%; width: auto;">
                      </div>
                  </div>
                  <div class="post-body">
                      <div class="post-title">
                          <h2><a href="single.html">Ut sit amet massa</a></h2>
                      </div>
                      <span class="post-date">March 05, 2015</span>
                  </div>
                </div>
              </div>
              <div class="owl-item" style="width: 362px;">
                <div class="related-post-item">
                  <div class="post-media">
                      <div class="image-wrap image-cover">
                          <img alt="" src="http://xgio.net/html/bamboo/images/blog/5.jpg" style="height: 100%; width: auto;">
                      </div>
                  </div>
                  <div class="post-body">
                      <div class="post-title">
                          <h2><a href="single.html">Ut sit amet massa</a></h2>
                      </div>
                      <span class="post-date">March 05, 2015</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- END / RELATED POSTS -->


      <!-- COMMENTS -->
      {{-- <div id="comments">
          <div class="comments-inner-wrap">
              <h3 class="h4" id="comments-title">( 3 ) Comments</h3>
              <ul class="commentlist">
                  <li class="comment">
                      <div class="comment-box">
                          <div class="comment-author">
                              <a href="#"><img alt="" src="http://xgio.net/html/bamboo/images/author/2.jpg"></a>
                          </div>
                          <div class="comment-body">
                              <cite class="fn"><a href="#">Xgio</a></cite>
                              <div class="comment-meta">
                                  <span>July 12, 2014</span>
                              </div>
                              <p>Mauris tincidunt, quam at feugiat efficitur, justo nunc efficitur justo, a hendrerit lectus neque eu nibh. Praesent eu sem erat. Fusce non sagittis lorem.</p>
                              <div class="comment-abs">
                                  <a class="comment-edit-link" href="#">Edit</a>
                                  <a class="comment-reply-link" href="#">Reply</a>
                              </div>
                          </div>
                      </div>
                      <ul class="children">
                          <li class="comment">
                              <div class="comment-box">
                                  <div class="comment-author">
                                      <a href="#"><img alt="" src="http://xgio.net/html/bamboo/images/author/2.jpg"></a>
                                  </div>
                                  <div class="comment-body">
                                      <cite class="fn"><a href="#">Xgio</a></cite>
                                      <div class="comment-meta">
                                          <span>July 12, 2014</span>
                                      </div>
                                      <p>Aliquam volutpat elit non urna faucibus condimentum. Pellentesque nibh libero, consequat at nibh a, tincidunt rutrum magna. Curabitur in posuere risus, dictum euismod dolor. Vestibulum auctor orci sed elit ultricies tempus. Praesent facilisis tellus turpis, ac congue lorem consectetur ac.</p>
                                      <div class="comment-abs">
                                          <a class="comment-edit-link" href="#">Edit</a>
                                          <a class="comment-reply-link" href="#">Reply</a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </li>

                  <li class="comment">
                      <div class="comment-box">
                          <div class="comment-author">
                              <a href="#"><img alt="" src="http://xgio.net/html/bamboo/images/author/2.jpg"></a>
                          </div>
                          <div class="comment-body">
                              <cite class="fn"><a href="#">Xgio</a></cite>
                              <div class="comment-meta">
                                  <span>July 12, 2014</span>
                              </div>
                              <p>Pellentesque nibh libero, consequat at nibh a, tincidunt rutrum magna. Curabitur in posuere risus, dictum euismod dolor. Vestibulum auctor orci sed elit ultricies tempus. Praesent facilisis tellus turpis, ac congue lorem consectetur ac.</p>
                              <div class="comment-abs">
                                  <a class="comment-edit-link" href="#">Edit</a>
                                  <a class="comment-reply-link" href="#">Reply</a>
                              </div>
                          </div>
                      </div>
                  </li>
              </ul>
          </div>
      </div> --}}
      <!-- END / COMMENTS -->

      <!-- LEAVER YOUR COMMENT -->
      <div id="respond">
          <div class="reply-title">
              <h3 class="h4">Leave your comment</h3>
          </div>
          <!-- COMMENT FORM -->
          <form>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-item form-name">
                          <input type="text" value="Your name *">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-item form-email">
                          <input type="text" value="Your email *">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-item">
                          <input type="text" value="Your website">
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-item form-textarea-wrapper">
                          <textarea>Message</textarea>
                      </div>
                  </div>
                  <div class="form-actions">
                      <input type="submit" class="pi-btn" value="Comment">
                  </div>
              </div>
          </form>
          <!-- END / COMMENT FORM -->
          
      </div>
      <!-- END / LEAVER YOUR COMMENT -->
    </section>
    </div>
    
    <div class="panel">
      <div id="pager"></div>
    </div>
  </div>
@endsection

@section('body-right')
  <div class="rightsidebar">
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