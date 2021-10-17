$(document).ready(function () {
    $('#reg').click(function (e) {
        e.preventDefault();
        $('main:first-child').css({ display: 'none' })
        $('main:nth-of-type(2)').css({ display: 'block' })
    });
    $('#forget').click(function (e) {
        e.preventDefault();
        $('main:first-child').css({ display: 'none' })
        $('main:last-child').css({ display: 'block' })
    });
    $('.register-container .logo i').click(function (e) {
        e.preventDefault();
        if ($('main:first-child').hasClass('d-none')) {
            $('main:first-child').removeClass('d-none')
            $('main:nth-of-type(2)').removeClass('d-block')
        } else {
            $('main:nth-of-type(2)').css({ display: 'none' })
            $('main:first-child').css({ display: 'block' })
        }
    });
    $('.reset-pass-container .logo i').click(function (e) {
        e.preventDefault();
        if ($('main:first-child').hasClass('d-none')) {
            $('main:first-child').removeClass('d-none')
            $('main:last-child').removeClass('d-block')
        } else {
            $('main:last-child').css({ display: 'none' })
            $('main:first-child').css({ display: 'block' })
        }

    });
});