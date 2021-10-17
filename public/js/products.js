$(document).ready(function () {

    var rangeElement = $('.form-range')
    var priceElement = $('.range-price span:nth-child(3)')
    var taElement = $('.range-price span:nth-child(2)')
    rangeElement.on("input", function () {
        if (rangeElement.val() == 0) {
            taElement.text("")
            priceElement.text("کمتر از 50")
        } else if (rangeElement.val() == 1) {
            taElement.text("تا")
            priceElement.text("100")
        } else if (rangeElement.val() == 2) {
            taElement.text("تا")
            priceElement.text("200")
        } else if (rangeElement.val() == 3) {
            taElement.text("تا")
            priceElement.text("300")
        } else if (rangeElement.val() == 4) {
            taElement.text("تا")
            priceElement.text("400")
        } else if (rangeElement.val() == 5) {
            taElement.text("")
            priceElement.text("بیشتر از 400")
        }
    })

    
    
});