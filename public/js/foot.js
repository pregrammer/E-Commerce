$(document).ready(function () {

    $('footer .scroll-to-top').click(function (e) {
        e.preventDefault();
        $("html").animate({ scrollTop: 0 })
    });

});