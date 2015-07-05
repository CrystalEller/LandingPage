(function($){

    $( document ).ready(function() {

        $("#portfolio_grid").mixItUp();

        $(".top_text h1").animated("fadeInDown","fadeOutUp");
        $(".top_text p, .section_header").animated("fadeInUp","fadeOutDown");
        $(".animation_2").animated("fadeInLeft","fadeOutLeft");
        $(".animation_3").animated("fadeInRight","fadeOutRight");
        $(".animation_1").animated("flipInY","flipOutY");
        $(".left .resume_item").animated("fadeInLeft","fadeOutLeft");
        $(".right .resume_item").animated("fadeInRight","fadeOutRight");

        $(".s_portfolio li").click(function(){
            $(".s_portfolio li").removeClass('active');
            $(this).addClass('active');
        });

        $(".popup").magnificPopup({type:"image"});
        $(".popup_content").magnificPopup({type:"inline"});

        $(window).resize(function () {
            heightDetect();
        });

        $(".toggle_mnu, .menu_item").click(function() {
            $(".sandwich").toggleClass("active");
        });

        $(".top_mnu ul a").click(function() {
            $(".top_mnu").fadeOut(600);
            $(".sandwich").toggleClass("active");
        }).append('<span>');

        $(".toggle_mnu").click(function() {
            if ($(".top_mnu").is(":visible")) {
                $(".top_text").removeClass('h_opacity');
                $(".top_mnu").fadeOut(600);
                $(".top_mnu li a").removeClass("fadeInUp animated");
            } else {
                $(".top_text").addClass('h_opacity');
                $(".top_mnu").fadeIn(600);
                $(".top_mnu li a").addClass("fadeInUp animated");
            }
        });

        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();

        $("a[href*='#']").mPageScroll2id();

        heightDetect();

        function heightDetect() {
            $(".main_head").css("height", $(window).height());
        }
    });

    $(window).load(function () {
        $(".loader_inner").fadeOut();
        $(".loader").delay(400).fadeOut("slow");
    });

})(jQuery);