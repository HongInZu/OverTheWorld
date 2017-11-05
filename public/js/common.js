'use strict';

var breakpoint = {};
var modePc;
var modeMobile;

breakpoint.getValue = function () {
    this.value = window.getComputedStyle(document.querySelector('body'), ':before').getPropertyValue('content').replace(/\"/g, '');

    modePc = this.value == 'md' || this.value == 'lg';
    modeMobile = this.value == 'xs' || this.value == 'sm';
};

$(function () {

    breakpoint.getValue();

    // select
    $('.ih-select').select2({
        minimumResultsForSearch: Infinity
    });

    // datepicker
    $('.ih-datepicker').datetimepicker({
        format: 'Y/m/d',
        timepicker: false,
        minDate: 0,
        scrollMonth: false,
        scrollInput: false
    });

    if (modeMobile) {
        $("#search-toggle").click();
    }
});

$(window).on('load', function () {

    // Loading Page
    $('#loading-page').fadeOut('slow');
});

$(window).resize(function () {
    breakpoint.getValue();
});

// ===== Event =====

// toggle（有上下箭頭切換）
function toggle(element, target) {
    var icon = $(element).find('i');

    if ($(target).css('display') === 'none') {
        $(icon).removeClass('fa-angle-down').addClass('fa-angle-up');
    } else {
        $(icon).removeClass('fa-angle-up').addClass('fa-angle-down');
    }

    $(target).slideToggle();
}

// tab
function tab(element, tabItem) {
    var idx = $(element).index();
    var target = $(tabItem).eq(idx);

    $(element).addClass("ih-active").siblings().removeClass("ih-active");

    $(tabItem).hide();
    $(target).fadeIn();
}

// collapse
function collapse(element) {
    var target = $(element).next('.ih-content');
    var icon = $(element).find('i');

    if ($(target).css('display') === 'none') {
        $(icon).removeClass('fa-angle-down').addClass('fa-angle-up');
    } else {
        $(icon).removeClass('fa-angle-up').addClass('fa-angle-down');
    }

    $(target).slideToggle();
}

// header：手機版選單開關
function mobileMenuToggle() {
    if (modePc) {
        return;
    }

    $("#menu").slideToggle();
}

// footer：手機版 APP 下載
function mobileAppToggle(element, target) {
    if (modePc) {
        return;
    }

    toggle(element, target);
}

// footer：回到頂端
function goTop() {
    $('html,body').animate({
        scrollTop: 0
    }, 1000);
}