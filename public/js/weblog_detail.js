$(document).ready(function () {

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 150) {
            $('main aside').css({ position: 'fixed', width: '25.6%', marginTop: '-20px' })
        } else {
            $('main aside').css({ position: 'static', width: '30%', marginTop: 'unset' })
        }

        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 450) {
            $('main aside').css({ display: 'none'})
        } 
        if ($(window).scrollTop() <= $(document).height() - $(window).height() - 450) {
            $('main aside').css({ display: 'block'})
        }

    }).scroll();

});