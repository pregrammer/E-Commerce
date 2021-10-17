$(document).ready(function () {

    var width = $(window).width();
    if (width >= 600) {
        $('aside a').hover(function () {
            // over
            $(this).siblings('i').css({ visibility: 'visible' })
            $(this).siblings('span').css({ color: 'rgb(37, 201, 37)' })
        }, function () {
            // out
            if ($(this).css('color') != 'rgb(37, 201, 37)') {
                $(this).siblings('i').css({ visibility: 'hidden' })
            }
            $(this).siblings('span').css({ color: 'gray' })
        }
        );

        $(window).scroll(function () {

            if ($(window).scrollTop() >= 150) {
                if ($(window).scrollTop() >= 1800) {
                    $('main aside').css({ position: 'static', paddingTop: '0' })
                    $('footer').css({ top: '1870px' })
                }
                else {
                    $('main aside').css({ position: 'fixed', width: '34.7%', marginTop: '-100px', paddingTop: '70px' })
                    $('footer').css({ top: '2170px' })
                }
            } else {
                $('main aside').css({ position: 'static', width: '40%', marginTop: 'unset' })
            }
        }).scroll();

    } else {
        $('aside h5').click(function (e) {
            e.preventDefault();
            if ($('aside ul').css('display') == 'none') {
                $('aside ul').slideDown()
                $('main i:first-child').css({ transform: 'rotate(180deg)' })
            } else {
                $('aside ul').slideUp()
                $('main i:first-child').css({ transform: 'rotate(0)' })
            }
        });

    }

});