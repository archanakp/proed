(function ($) {
    "use strict";

    $(document).ready(function () {
        let video_box = $('.bp-element-video-box');

        video_box.each(function () {
            if ($.magnificPopup) {
                $('.video-popup').magnificPopup({
                    type: 'iframe',
                    fixedContentPos: false,
                    removalDelay: 500,

                    // Class that is added to popup wrapper and background
                    // make it unique to apply your CSS animations just to this exact popup
                    mainClass: 'mfp-fade'
                });
            }
        });
    });

})(jQuery);