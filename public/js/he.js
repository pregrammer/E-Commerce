$(document).ready(function () {

    $('.top-search-container input').focusin(function (e) {
        e.preventDefault();
        $('.top-logo a').animate({ marginLeft: '-320px' })
        $(this).css({ borderRadius: '10px 10px 0 0' })
        $('.search-content').css({ display: 'block' })
    });

    $('.top-search-container input').focusout(function (e) {
        e.preventDefault();
        $('.top-logo a').animate({ marginLeft: '0px' })
        $(this).css({ borderRadius: '10px' })
        $('.search-content').css({ display: 'none' })
    });


    var position = 0
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > position) {
            $('nav:first-child').slideUp(250);
        } else {
            $('nav:first-child').slideDown(250);
        }
        position = scroll;
    });




    $('#mobile-shpp-li').click(function (e) {
        e.preventDefault();
        if ($('.sub-mobile-menu').css('display') == 'none') {
            $('.mobile-menu ul li:first-child i:first-child').css({ transform: 'rotate(180deg)' })
            $('.sub-mobile-menu').slideDown(250)
            $('#sec-mobile-li').animate({ marginTop: '350px' }, 250)
        } else {
            $('.mobile-menu ul li:first-child i:first-child').css({ transform: 'rotate(0)' })
            $('.sub-mobile-menu').slideUp(250)
            $('#sec-mobile-li').animate({ marginTop: '10px' }, 250)
        }
    });

    $('header .ti-menu').click(function (e) {
        e.preventDefault();
        $('.modi').css({ display: 'block' })
        $('.mobile-menu').animate({ right: '0' }, function () {
            $('body').css({ position: 'fixed' })
        })
    });

    $('.modi').click(function (e) {
        e.preventDefault();
        $('.modi').css({ display: 'none' })
        $('body').css({ position: '' })
        $('.mobile-menu').animate({ right: '-85%' })
    });

    $('.mobile-nav input').focusin(function (e) {
        e.preventDefault();
        $(this).css({ borderRadius: '10px 10px 0 0' })
        $('.search-content').css({ display: 'block' })
    });
    $('.mobile-nav input').focusout(function (e) {
        e.preventDefault();
        $(this).css({ borderRadius: '10px' })
        $('.search-content').css({ display: 'none' })
    });

});