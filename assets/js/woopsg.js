(function ($) {
	"use strict";

    /**
     * Product Zoom
     */
    $('.product-details-for').each(function(){
        $(this).find('img').zoomIt();
    });


    /**
     * Video Popup
     */
    $('.video_box').magnificPopup({
        disableOn: 200,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });

    /**
     * popup Gallery
     */
    $('.zoom-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        preloader: true,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom',
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: false,
            duration: 300, 
            opener: function(element) {
                return element.find('img');
            }
        }
    });

})(jQuery);