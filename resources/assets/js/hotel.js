$(function() {

    $.fn.tinyMapConfigure({
        "api": "//maps.googleapis.com/maps/api/js",
        "v": "3.26",
        "key": "AIzaSyBQuSrStCHz4RyW9NCa_qVOjoQy40IhT6E",
        "language": "zh‐TW"
    });

});

$(window).on('load', function() {

    // 相簿
    let vertical;
    let buttonPrev;
    let buttonNext;

    if (modePc) {
        vertical = true;
        buttonPrev = 'up';
        buttonNext = 'down';
    } else {
        vertical = false;
        buttonPrev = 'left';
        buttonNext = 'right';
    }

    $('#carousel-album').slick({
        prevArrow: '<button type="button" class="ih-prev ih-button"><i class="fa fa-angle-' + buttonPrev + '" aria-hidden="true"></i></button>',
        nextArrow: '<button type="button" class="ih-next ih-button"><i class="fa fa-angle-' + buttonNext + '" aria-hidden="true"></i></button>',
        slidesToShow: 4,
        infinite: false,
        vertical: vertical
    });

    // 地圖
    $("#map").tinyMap({
        "center": "新北市中和區景德街",
        "zoom": 16,
        'scrollwheel': false
    });

});

// ===== Event =====

// 點小圖秀大圖
function album(element) {
    let img = $(element).children('img').attr('src');

    $('#album').css('background-image', 'url(' + img + ')');
}

// 飯店介紹開關
function mobileInformationToggle(element) {
    if (modePc) {
        return;
    }

    collapse(element);
}
