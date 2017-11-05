'use strict';

$(function () {});

$(window).on('load', function () {
    $("#price").slider({
        min: 0,
        max: 10000,
        step: 1000,
        value: [1000, 3000]
    });
});

// ===== Event =====

// 篩選條件彈跳視窗（手機版）
function mobileConditionToggle(status) {
    if (modePc) {
        return;
    }

    if (status) {
        $('#form-condition').fadeIn();
    } else {
        $('#form-condition').css('display', 'none');
    }
}

// 排序
function sort(element) {
    var icon = $(element).children('i');

    if ($(icon).hasClass('fa-long-arrow-down')) {
        $(icon).removeClass('fa-long-arrow-down').addClass('fa-long-arrow-up');
    } else {
        $(icon).removeClass('fa-long-arrow-up').addClass('fa-long-arrow-down');
    }
}