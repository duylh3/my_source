$(document).ready(function () {
    $(".kc-content .title").dotdotdot();
    $('.sliderPhoto').bxSlider({
        mode: 'fade',
        captions: true,
        pager: false,
        infiniteLoop: true,
        auto: true
    });
    var sliderVideo = $('.sliderVideo').bxSlider({
        mode: 'fade',
        captions: true,
        pager: false,
        infiniteLoop: true,
        auto: true,
        pause: 6000,
        onSlideBefore: function ($slideElement, oldIndex, newIndex) {
            stopVideo(oldIndex);
            sliderVideo.startAuto();
        },
        onSliderLoad: function (idx) {
            $(".sliderVideo iframe").iframeTracker({
                blurCallback: function () {
                    sliderVideo.stopAuto();
                }
            });
        }
    });
    var md = new MobileDetect(window.navigator.userAgent);
    if (md.phone() == null) {
        $('.mobile').remove();
        $('.kc-wrap').KillerCarousel({
            // Default natural width of carousel.
            width: 1000,
            // Item spacing in 3d (has CSS3 3d) mode.
            spacing3d: 160,
            // Item spacing in 2d (no CSS3 3d) mode. 
            spacing2d: 160,
            // Looping mode.
            infiniteLoop: true,
            // Scale at 85% of parent element.
            autoScale: 85,
            itemAlign: "middle",
            autoChangeDelay: 4000,
            useMouseWheel: false,
            autoChangeDirection: 1
        });
    }
    else {
        $('.mobile').toggle();
        $('.kc-wrap').remove();
        $('.kc-wrap-mobile').bxSlider({
            mode: 'fade',
            captions: true,
            pager: false,
            infiniteLoop: true,
            auto: true
        });
    }
    function stopVideo(iSlide) {
        $('.iframe-youtube').each(function (index) {
            if (index == iSlide) {
                $(this)[0].src += "&autoplay=0";
            }
        });
    }

});
