/*global $,owl,smoothScroll,AOS,alert,nextTab,prevTab*/
$(document).ready(function () {
    "use strict";

    $(window).load(function () {
        $("body").css('overflow-y', 'auto');
        $('#loading').fadeOut(1000);
    });

    $('[data-tool="tooltip"]').tooltip({
        trigger: 'hover',
        animate: true,
        delay: 50,
        container: 'body'
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $(".toTop").css("right", "20px");
        } else {
            $(".toTop").css("right", "-100px");
        }
    });

    $(".toTop").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    //customize the header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.main-head').addClass('sticky');
        } else {
            $('.main-head').removeClass('sticky');
        }
    });

    $('[data-fancybox]').fancybox();

    if ($('select').length) {
        $('select').niceSelect();
    }

    $('.op-menu').click(function () {
        $('.nav-menu').addClass('active');
        $('html').addClass('off');
    });

    $('.cl-menu').click(function () {
        $('.nav-menu').removeClass('active');
        $('html').removeClass('off');
    });

    $('.op-search').click(function () {
        $('.search-area').slideToggle();
        $('.search-area .form-control').focus();
    });

    // Register Steps
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        var $target = $(e.target);
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {
        var $active = $('.nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

        $("html,body").animate({
            scrollTop: 100
        }, 500);
        return false;

    });

    $(".prev-step").click(function (e) {
        var $active = $('.nav-tabs li.active');
        prevTab($active);
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

    // for upload file
    $(document).on('change', ':file', function () {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
    $(':file').on('fileselect', function (event, numFiles, label) {

        var input = $(this).parents('.f-upload').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) {
                // alert(log);
            }
        }
    });

    $(".show-pass").click(function () {
        $(this).find('i').toggleClass("la-eye la-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
        $(this).toggleClass('active');
    });

    $('.auth-wrap').height(window.innerHeight - 60);

    (function () {
        var materialForm;

        materialForm = function () {
            return $('.material-field').focus(function () {
                return $(this).closest('.form-group-material').addClass('focused has-value');
            }).focusout(function () {
                return $(this).closest('.form-group-material').removeClass('focused');
            }).blur(function () {
                if (!this.value) {
                    $(this).closest('.form-group-material').removeClass('has-value');
                }
                return $(this).closest('.form-group-material').removeClass('focused');
            });
        };

        $(function () {
            return materialForm();
        });

    }).call(this);

    $(".hero-slider").owlCarousel({
        nav: false,
        loop: true,
        dots: true,
        autoplay: 5000,
        center: true,
        autoplaySpeed: 1000,
        autoplayHoverPause: true,
        items: 1,
        navText: ["<i class='la la-angle-left'></i>", "<i class='la la-angle-right'></i>"],
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    });

    $(".gallery-slider").owlCarousel({
        nav: true,
        loop: true,
        navText: ["<i class='la la-angle-left'></i>", "<i class='la la-angle-right'></i>"],
        dots: true,
        autoplay: 5000,
        items: 3,
        autoplayHoverPause: true,
        center: true,
        responsiveClass: true,
        rtl: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            },
            1300: {
                items: 3
            }
        }
    });

    AOS.init({
        once: true
    });
});