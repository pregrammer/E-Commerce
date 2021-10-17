// start of header js

$(document).ready(function () {


  // end of header js
  //****************************************

  // start of main js



  $('.wow-cards button:first-child').click(function (e) {
    e.preventDefault();
    let f = $('.wow-cards').scrollLeft() - 840;
    $('.wow-cards').animate({ scrollLeft: f }, 600)
    if ($('.wow-cards').scrollLeft() <= 840) {
      $('.wow-cards button:first-child').prop("disabled", true)
    }
    $('.wow-cards button:last-child').prop("disabled", false)
  });

  var wow_overflow;
  $('.wow-cards').css({ overflowX: 'unset' });
  wow_overflow = $(document).width()
  $('.wow-cards').css({ overflowX: 'hidden' });
  wow_overflow = wow_overflow - 51

  $('.wow-cards button:last-child').click(function (e) {
    e.preventDefault();
    let f = $('.wow-cards').scrollLeft() + 840;
    $('.wow-cards').animate({ scrollLeft: f }, 600)
    $('.wow-cards button:first-child').prop("disabled", false)
    if (($('.wow-cards').scrollLeft() + $('.wow-cards').width()) + 840 >= wow_overflow) {
      $('.wow-cards button:last-child').prop("disabled", true)
    }
  });

  if ($(document).width() < wow_overflow + 51) {
    $('.wow-cards button').css({ display: 'block' })
  } else {
    $('.wow-cards').css({ justifyContent: 'center' })
  }





  $('.new-product-cards button:first-child').click(function (e) {
    e.preventDefault();
    let f = $('.new-product-cards').scrollLeft() - 770;
    $('.new-product-cards').animate({ scrollLeft: f }, 600)
    if ($('.new-product-cards').scrollLeft() <= 770) {
      $('.new-product-cards button:first-child').prop("disabled", true)
    }
    $('.new-product-cards button:last-child').prop("disabled", false)
  });

  var new_products_overflow;
  $('.new-product-cards').css({ overflowX: 'unset' });
  new_products_overflow = $(document).width()
  $('.new-product-cards').css({ overflowX: 'hidden' });
  new_products_overflow = new_products_overflow

  $('.new-product-cards button:last-child').click(function (e) {
    e.preventDefault();
    let f = $('.new-product-cards').scrollLeft() + 770;
    $('.new-product-cards').animate({ scrollLeft: f }, 600)
    $('.new-product-cards button:first-child').prop("disabled", false)
    if (($('.new-product-cards').scrollLeft() + $('.new-product-cards').width()) + 900 >= new_products_overflow) {
      $('.new-product-cards button:last-child').prop("disabled", true)
    }
  });

  if ($(document).width() < new_products_overflow) {
    $('.new-product-cards button').css({ display: 'block' })
  } else {
    $('.new-product-cards').css({ justifyContent: 'center' })
  }





  $('.most-sale-product-cards button:first-child').click(function (e) {
    e.preventDefault();
    let f = $('.most-sale-product-cards').scrollLeft() - 770;
    $('.most-sale-product-cards').animate({ scrollLeft: f }, 600)
    if ($('.most-sale-product-cards').scrollLeft() <= 770) {
      $('.most-sale-product-cards button:first-child').prop("disabled", true)
    }
    $('.most-sale-product-cards button:last-child').prop("disabled", false)
  });

  var most_sale_overflow;
  $('.most-sale-product-cards').css({ overflowX: 'unset' });
  most_sale_overflow = $(document).width()
  $('.most-sale-product-cards').css({ overflowX: 'hidden' });
  most_sale_overflow = most_sale_overflow

  $('.most-sale-product-cards button:last-child').click(function (e) {
    e.preventDefault();
    let f = $('.most-sale-product-cards').scrollLeft() + 770;
    $('.most-sale-product-cards').animate({ scrollLeft: f }, 600)
    $('.most-sale-product-cards button:first-child').prop("disabled", false)
    if (($('.most-sale-product-cards').scrollLeft() + $('.most-sale-product-cards').width()) + 900 >= most_sale_overflow) {
      $('.most-sale-product-cards button:last-child').prop("disabled", true)
    }
  });

  if ($(document).width() < most_sale_overflow) {
    $('.most-sale-product-cards button').css({ display: 'block' })
  } else {
    $('.most-sale-product-cards').css({ justifyContent: 'center' })
  }
  // end of main js

});