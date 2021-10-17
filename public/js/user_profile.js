$(document).ready(function () {
    
    $("aside ul li:not(:last-child)").click(function () {
        $(this).addClass("active-aside-li").siblings().removeClass("active-aside-li")
        var itemIndex = $(this).index()
        $('.profile-content > div').eq(itemIndex).css({visibility: 'visible'}).siblings().css({visibility: 'hidden'})
    });

    /*var position = 0
    $(window).scroll(function () {

        if ($(window).scrollTop() >= 100) {
            $('main .profile-header').css({ position: 'fixed', width: '86.8%', marginTop: '-50px', zIndex: '1' })
            $('main aside').css({ position: 'fixed', width: '26.1%', marginTop: '10px', right: '100px' })
            $('.profile-content').css({marginTop: '60px'})

        } else {
            $('main .profile-header').css({ position: 'unset', width: '100%', marginTop: 'unset', zIndex: 'unset' })
            $('main aside').css({ position: 'absolute', width: '30%', marginTop: '0', right: '0' })
            $('.profile-content').css({marginTop: 'unset'})
        }

    });*/

    

});