jQuery(document).ready(function($) {

    'use-strict';
    // Slider fullwidth posts
    $('.ts-posts-slide-fullwith').each(function(){            
            
               $(this).owlCarousel({
                    items: 4,
                    loop:false,
                    nav: false,
                    dots:false,
                    margin: 0,
                    autoplay:true,
                    lazyLoad:true,
                    lazyContent:true,
                    autoHeight: false,
                    responsiveClass: true,
                    responsive:{
                        0:{
                            items:1
                        },
                        480:{
                            items:1
                        },
                        768:{
                            items:3
                        },
                        992:{
                            items:4
                        }
                    }
                })

    });

  /** 
    * //Home Feature post slider        
    **/ 
    $('.featured-slides').each(function(){            

        $(this).owlCarousel({
    
            items: 1,
            loop: true,
            center: false,
            rewind: false,
            dots:true,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            freeDrag: false,

            margin: 0,
            stagePadding: 0,

            merge: false,
            mergeFit: true,
            autoWidth: false,

            startPosition: 0,
            rtl: false,

            smartSpeed: 250,
            fluidSpeed: false,
            dragEndSpeed: false,

            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:1
                },
                768:{
                    items:1
                },
                992:{
                    items:1
                }
            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,

            fallbackEasing: 'swing',

            info: false,

            nestedItemSelector: false,
            itemElement: 'div',
            stageElement: 'div',

            refreshClass: 'owl-refresh',
            loadedClass: 'owl-loaded',
            loadingClass: 'owl-loading',
            rtlClass: 'owl-rtl',
            responsiveClass: 'owl-responsive',
            dragClass: 'owl-drag',
            itemClass: 'owl-item',
            stageClass: 'owl-stage',
            stageOuterClass: 'owl-stage-outer',
            grabClass: 'owl-grab'

            })

    });


    // //Slider posts 
    $('.ts-posts-slide2').each(function(){            

     
        $('.ts-posts-slide2').owlCarousel({
            items: 3,
            loop: true,
            center: false,
            rewind: false,
            dots:true,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            freeDrag: false,

            margin: 30,
            stagePadding: 0,

            merge: false,
            mergeFit: true,
            autoWidth: false,

            startPosition: 0,
            rtl: false,

            smartSpeed: 250,
            fluidSpeed: false,
            dragEndSpeed: false,

            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:1
                },
                768:{
                    items:2
                },
                992:{
                    items:3
                }
            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,

            fallbackEasing: 'swing',

            info: false,

            nestedItemSelector: false,
            itemElement: 'div',
            stageElement: 'div',

            refreshClass: 'owl-refresh',
            loadedClass: 'owl-loaded',
            loadingClass: 'owl-loading',
            rtlClass: 'owl-rtl',
            responsiveClass: 'owl-responsive',
            dragClass: 'owl-drag',
            itemClass: 'owl-item',
            stageClass: 'owl-stage',
            stageOuterClass: 'owl-stage-outer',
            grabClass: 'owl-grab'

            })

    });

    // //Slider posts 
    $('.ts-single-slides').each(function(){            

     
        $('.ts-single-slides').owlCarousel({
            items: 1,
            loop: true,
            center: false,
            rewind: false,
            dots:true,
            mouseDrag: true,
            touchDrag: true,
            pullDrag: true,
            freeDrag: false,

            margin: 0,
            stagePadding: 0,

            merge: false,
            mergeFit: true,
            autoWidth: false,

            startPosition: 0,
            rtl: false,

            smartSpeed: 250,
            fluidSpeed: false,
            dragEndSpeed: false,

            responsive:{
                0:{
                    items:1
                },
                480:{
                    items:1
                },
                768:{
                    items:1
                },
                992:{
                    items:1
                }
            },
            responsiveRefreshRate: 200,
            responsiveBaseElement: window,

            fallbackEasing: 'swing',

            info: false,

            nestedItemSelector: false,
            itemElement: 'div',
            stageElement: 'div',

            refreshClass: 'owl-refresh',
            loadedClass: 'owl-loaded',
            loadingClass: 'owl-loading',
            rtlClass: 'owl-rtl',
            responsiveClass: 'owl-responsive',
            dragClass: 'owl-drag',
            itemClass: 'owl-item',
            stageClass: 'owl-stage',
            stageOuterClass: 'owl-stage-outer',
            grabClass: 'owl-grab'

            })

    });


    $('.site-footer .swift-instagram-slider ul.instargram').each(function(){    
            
            var $this = $(this);
            $this.find('li.clearfix').remove();
            
            $this.owlCarousel({
                items: 4,
                loop:false,
                nav: false,
                dots:false,
                margin: 0,
                autoplay:true,
                lazyLoad:true,
                lazyContent:true,
                autoHeight: false,
                responsiveClass: true,
                responsive:{
                    0:{
                        items:1
                    },
                    480:{
                        items:1
                    },
                    768:{
                        items:3
                    },
                    992:{
                        items:4
                    }
                }
            });

    });
    function swift_instagram_square() {        
        $('ul.instargram').each(function(){
            var thisWidth = $(this).find('li:first-child a').width();
            $(this).find('li a').css({
                'height' :  thisWidth + 'px'
            });
        });
    }
    swift_instagram_square();
    
    $(window).load(function(){
        swift_instagram_square();
    });

    //useful var
    var $window = $(window);
    
    //Sticky Header
    var $swift_body = $('body');
    if ($swift_body.hasClass('swift-enable-sticky-menu')) {
        
           var heightoff = 0;
            if($('#wpadminbar').length){
                heightoff = $('#wpadminbar').outerHeight();
            }
            $(window).load(function(){
                if($('.header_two_menus').length){
                    $(".sticky-header.header_two_menus").sticky({ topSpacing: heightoff});
                }
                if($('.header_one_menu_banner').length){
                    $(".sticky-header .navbar-static-top").sticky({ topSpacing: heightoff});
                }
                if($('.header_one_menu_center').length){
                    $(".sticky-header .navbar-static-top").sticky({ topSpacing: heightoff});
                }
                
            });
    };
    //End sticky header
    
    //Iframe
    $('iframe').each(function(){
        $(this).wrap( "<div class='js-video'></div>" );         
    });
    $(".js-video").fitVids();
    //Align Box
    var align_1 = $('.align-1').outerHeight();
    var align_2 = $('.align-2').outerHeight();
    var align_3 = $('.align-3').outerHeight();
    var max = align_1;
    
    if(align_2 > max){
        max =  align_2;
    }
    if(align_3 > max){
        max =  align_3;
    } 
    $('.align-1, .align-2, .align-3, .align-4').css('height', max);
    
    $( window ).resize(function(){
        //Align Box
        $('.align-1, .align-2, .align-3').css('height', 'auto');

        var align_1 = $('.align-1').outerHeight();
        var align_2 = $('.align-2').outerHeight();
        var align_3 = $('.align-3').outerHeight();
        var max = align_1;
        
        if(align_2 > max){
            max =  align_2;
        }
        if(align_3 > max){
            max =  align_3;
        } 
        $('.align-1, .align-2, .align-3').css('height', max);
        
    });
       
    //BACK TO TOP
    $('.scroll-top').on( "click", function() {
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
    
    // Quantity buttons
    $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );

    // Target quantity inputs on product pages
    $( 'input.qty:not(.product-quantity input.qty)' ).each( function() {
        var min = parseFloat( $( this ).attr( 'min' ) );

        if ( min && min > 0 && parseFloat( $( this ).val() ) < min ) {
            $( this ).val( min );
        }
    });

    $( document ).on( 'click', '.plus, .minus', function() {

        // Get values
        var $qty        = $( this ).closest( '.quantity' ).find( '.qty' ),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $( this ).is( '.plus' ) ) {

            if ( max && ( max == currentVal || currentVal > max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentVal || currentVal < min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }

        }

        // Trigger change event
        $qty.trigger( 'change' );
    });
    
    
    $('.ts-shop-item img').on( "hover", function() {
       var hover = $(this).attr('data-hover');
       var src = $(this).attr('src');
       
       $(this).attr('src', hover);
       $(this).attr('data-hover', src);
    },
    function(){
        var hover = $(this).attr('data-hover');
        var src = $(this).attr('src');
        $(this).attr('src', hover);
        $(this).attr('data-hover', src);
    });
    
    // Product thumbnail
    $('.images .thumbnails a').on( "click", function() {
        var url = $(this).attr('href');
        
        //$('.woocommerce-main-image img').attr('src',url);
        
        $('.woocommerce-main-image').html('<img style="opacity: 0.2;" src="'+url+'" alt="" class="opacity">');
        $('.woocommerce-main-image img').animate({
            'opacity': 1
        }, 50);
        
        return false;
    });
    
    // Product Description Tab
    
    $('.tab-title a').on( "click", function() {
        var active = $(this).attr('rel');
        $('.tab-title a').removeClass('current');
        $(this).addClass('current');
        
        $('.tab-content').removeClass('active');
        $('#'+active).addClass('active');
        
        return false;
    });
    
    // Select style
    $('.select-wrap select').change(function(){
        var val = $(this).find('option:selected').text();
        $(this).parent().find('.select-val').html( val );
    });
    
    // Shop detail banner
    var image_height = $('.shop-banner .woocommerce-main-image img').height();
    $('.shop-banner .images').css('height', image_height);
    
    
    
    $( window ).resize(function(){
        // Shop detail banner
        var image_height = $('.shop-banner .woocommerce-main-image img').height();
        $('.shop-banner .images').css('height', image_height);
    });
    
    //Pretty Photo
    $("a.lightbox").prettyPhoto();
    
    //Fixed Bar
    $('.fixed-bar-nav a').on( "hover", function() {
        
        var effect = 'slide';
 
        // Set the options for the effect type chosen
        var options = { direction: 'right' };
        
        // Set the duration (default: 400 milliseconds)
        var duration = 700;
        
        $('.fixed-bar-content').toggle(effect, options, duration);     
      
        
        return false; 
    });
    
    
    if ($('.shop-detail-title .add-cart select').val() == '' ) {
        $('.shop-detail-title .love-cart').hide();                
    } else {
        $('.shop-detail-title .love-cart').show(); 
    }
    
    $('.shop-detail-title .add-cart select').on('click', function(){
        //alert('aaaa');
        if( $(this).val() == '' ) {
            $('.shop-detail-title .love-cart').hide();
        } else {
            $('.shop-detail-title .love-cart').show();
        }
    });
    
    $('.widget_nav_menu .widgettitle').each(function(){
        var widget_content = $(this).text();
        $(this).html('<span>'+widget_content+'</span>');            
    });
    
    
    var grid_count = 1;
    $('.ts-article-grid').each(function(){
        if( grid_count%3 == 0 ){
            $(this).next().addClass('first-item');
            $(this).after( '<hr class="line">' );
        }
        
        grid_count+=1;
    });
    
    // Remove last line
    $( ".section-blog-grid .line" ).last().css('border','none');

    $( document ).ajaxStop(function() {
        $('body').find('.line').remove();
        var grid_count = 1;
        $('.ts-article-grid').each(function(){
            if( grid_count%3 == 0 ){
                $(this).next().addClass('first-item');
                $(this).after( '<hr class="line">' );
            }
            
            grid_count+=1;
        });
        
        //Hide w
        if( $('.product-header-overlay .add-to-cart').hasClass('added') ){
            $(this).parent().find('.add_to_wishlist').hide();
        }
    });
    
    /**
     * HTML5shiv
     */
    window.html5 = {
        'shivCSS': true
    };


      // Background for megamenu
    function ts_init_bg_for_mega_menu() {
        $('.megamenu-item .megamenu-background').each(function(){
            
            var $this = $(this);
            var thisMegaContent = $this.closest('.dropdown-menu');
            
            if ( $this.find('img').length ) {
                var bg_img_src = $this.find('img').attr('src');
                $this.css({
                    'display' : 'none'
                });
                
                thisMegaContent.css({
                    'background-image' : 'url("' + bg_img_src + '")'
                });   
            }
             
        });
    }
    
    ts_init_bg_for_mega_menu(); 
    
    //Add icon child
    $( ".navbar-nav > li.menu-item-has-children" ).append( "<span class='ts-has-children'><i class='fa fa-caret-down'></i></span>" );
    //Menu open mobile
    $('.ts-has-children').on( "click", function() {
        $('.navbar-nav > li.megamenu-item').removeClass("show-dropdown-menu");
        var $this=$(this).parent();
       if($this.hasClass('show-dropdown-menu'))
        {
          $this.removeClass("show-dropdown-menu");
        }else{
          $this.addClass("show-dropdown-menu");
        };

    });
    $('li.megamenu-item').on( "click", function() {
        $('.navbar-nav > li.menu-item-has-children').removeClass("show-dropdown-menu");
        if($(this).hasClass('show-dropdown-menu'))
            {
              $(this).removeClass("show-dropdown-menu");
            }else{
              $(this).addClass("show-dropdown-menu");
            };

    });
    $(".navbar-nav > li > a").removeAttr("data-toggle");
    $(".navbar-nav > li > a").removeAttr("aria-haspopup");


// Video background 
if ($('.full-screen-video').length) {
  $(".player").YTPlayer();
  $(".ts-content-background .full-screen-video .player").mb_YTPlayer();
};

// Lazy loading image
    var swift_lazy = $('.swift-lazy-loading-image');
        if (swift_lazy.length) {
            swift_lazy.show().lazy();
        };



// Infinite loading 
    /**
     * Infinite Scroll + Masonry + ImagesLoaded
     */
    // Main content container
    var $container = $('.blog-section');
    var $spinner = $('.infinite-loading-spinner');
    var $button_load = $('.load-more a.btn.white');
    var $next_page = $('span.next-loading-page a');

    if ( !$next_page.length ) {
        $button_load.html('No more posts');
        $button_load.addClass('disabled');
    }else{


    if ( $container.hasClass( "section-blog-masonry" ) ) {

        // Masonry + ImagesLoaded
        $container.imagesLoaded(function(){
            $container.masonry({
                // selector for entry content
                itemSelector: 'div.post',
                // columnWidth: 200
            });
        });
    }

    // Infinite Scroll
    $container.infinitescroll({

        // selector for the paged navigation (it will be hidden)
        nextSelector: $next_page,

        // selector for the NEXT link (to page 2)
        navSelector: $next_page,
        
        // selector for all items you'll retrieve
        itemSelector: "div.post",

        // finished message
        loading: {
            finishedMsg: function(){
                $button_load.html('No more posts');
                $button_load.addClass('disabled');
            },
            finished: undefined,
            img: 'data:image/gif;base64,R0lGODlhAQABAHAAACH5BAUAAAAALAAAAAABAAEAAAICRAEAOw==',
            msg: null,
            msgText: "<span class='screen-reader-text'>Loading posts</span>",
            selector: null,
            speed: 'fast',
            start: undefined,

            },
        },

        // Trigger Masonry as a callback
        function( newElements ) {
            // hide new items while they are loading
            var $newElems = $( newElements ).css({ opacity: 0 });
            // ensure that images load before adding to masonry layout
            $newElems.imagesLoaded(function(){
                // show elems now they're ready
                $newElems.animate({ opacity: 1 });
                
                if ( $container.hasClass( "section-blog-masonry" ) ) {
                    $container.masonry( 'appended', $newElems, true );
                };
            
                    $( ".section-blog-grid .line" ).last().css('border','none');
                    
                $spinner.css('display','none');
            });

    });
        
    }
    
    /**
     * OPTIONAL!
     * Load new pages by clicking a link
     */

    // Pause Infinite Scroll
    $(window).unbind('.infscr');

    // Resume Infinite Scroll
    $button_load.click(function(){
        
        $spinner.css('display','inline-block');
            $container.infinitescroll('retrieve');
        return false;
    });

    $(document).ajaxError(function(e, xhr, opt) {

        if (xhr.status == 404) $('.next-loading-page a').remove();
    });

});

/** Mailchimp **/

function sendmailchimp(elem)

{                    

    jQuery.ajax({

        type : "post",

        data : jQuery(elem).serialize(),

        url : jQuery(elem).attr("action"),

        success : function (resp){

            jQuery(elem).find(".ts-message").removeClass("ajax-loading");

            jQuery(elem).find(".ts-message").html(resp);

        }

    }).fail(function(err) {

        jQuery(elem).find(".ts-message").removeClass("ajax-loading");

    });

}