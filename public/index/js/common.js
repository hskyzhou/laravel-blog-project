$(function() {

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    $('#back-to-top').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({scrollTop : 0},1200);
        return false;
    });

    $('html').niceScroll({
        scrollspeed: 60,
        mousescrollstep: 38,
        cursorwidth: 4,
        cursorborder: 0,
        autohidemode: false,
        zindex: 99999999,
        horizrailenabled: false,
        cursorborderradius: 20,
        cursorcolor: "rgba(0, 173, 167, 0.6)"
    });


	//setTimeout(function(){
		$('.loader').hide();
	//},3000);
    laypage({
        cont: 'pager', //容器。值支持id名、原生dom对象，jquery对象,
        pages: 11, //总页数
        skin: 'pager', //皮肤
        first: '« 首页', //若不显示，设置false即可
        last: '尾页 »', //若不显示，设置false即可
        prev: '‹ 上一页', //若不显示，设置false即可
        next: '下一页 ›' //若不显示，设置false即可
    });
});