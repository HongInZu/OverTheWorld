'use strict';

$(function () {});

$(window).on('load', function () {

    // Banner
    $('#carousel-banner').owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        navText: ['<i class="fa fa-caret-left" aria-hidden="true"></i>', '<i class="fa fa-caret-right" aria-hidden="true"></i>'],
        dots: false,
        autoplay: true,
        autoplayHoverPause: true
    });
});

// ===== Event =====