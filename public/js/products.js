$(document).ready(function () {

    var rangeElement = $('.form-range')
    rangeElement.val(0).trigger("input")
    var priceElement = $('.range-price span:nth-child(2)')
    var taElement = $('.range-price span:nth-child(1)')
    var filterButton = $('.range-price a')
    var pathname = window.location.pathname;
    filterButton.attr('href', pathname.substr(0, 11) + '/0');
    rangeElement.on("input", function () {

        pathname = window.location.pathname;
        if (rangeElement.val() == 0) {
            taElement.text("")
            priceElement.text("کمتر از 50")
            filterButton.attr('href', pathname.substr(0, 11) + '/0');
        } else if (rangeElement.val() == 1) {
            taElement.text("تا")
            priceElement.text("100")
            filterButton.attr('href', pathname.substr(0, 11) + '/1');
        } else if (rangeElement.val() == 2) {
            taElement.text("تا")
            priceElement.text("200")
            filterButton.attr('href', pathname.substr(0, 11) + '/2');
        } else if (rangeElement.val() == 3) {
            taElement.text("تا")
            priceElement.text("300")
            filterButton.attr('href', pathname.substr(0, 11) + '/3');
        } else if (rangeElement.val() == 4) {
            taElement.text("تا")
            priceElement.text("400")
            filterButton.attr('href', pathname.substr(0, 11) + '/4');
        } else if (rangeElement.val() == 5) {
            taElement.text("")
            priceElement.text("بیشتر از 400")
            filterButton.attr('href', pathname.substr(0, 11) + '/5');
        }
    });



});