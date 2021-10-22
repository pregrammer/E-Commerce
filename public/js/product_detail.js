$(document).ready(function () {

    $(".images .item").click(function(){
        var itemIndex = $(this).index()
        var activeItem = $(".slider .item.active-image")

        console.log(itemIndex)

        activeItem.removeClass("active-image")
        $(".slider .item").eq(itemIndex).addClass("active-image")
    })

    /**************************************** */

    $(".my_pd_alert").fadeTo(4000, 500).slideUp(500, function () {
      $(this).slideUp(500);
    });

    $('.related-product-cards button:first-child').click(function (e) {
      e.preventDefault();
      let f = $('.related-product-cards').scrollLeft() - 770;
      $('.related-product-cards').animate({ scrollLeft: f }, 600)
      if ($('.related-product-cards').scrollLeft() <= 770) {
        $('.related-product-cards button:first-child').prop("disabled", true)
      }
      $('.related-product-cards button:last-child').prop("disabled", false)
    });
  
    var related_products_overflow;
    $('.related-product-cards').css({ overflowX: 'unset' });
    related_products_overflow = $(document).width()
    $('.related-product-cards').css({ overflowX: 'hidden' });
    related_products_overflow = related_products_overflow
  
    $('.related-product-cards button:last-child').click(function (e) {
      e.preventDefault();
      let f = $('.related-product-cards').scrollLeft() + 770;
      $('.related-product-cards').animate({ scrollLeft: f }, 600)
      $('.related-product-cards button:first-child').prop("disabled", false)
      if (($('.related-product-cards').scrollLeft() + $('.related-product-cards').width()) + 900 >= related_products_overflow) {
        $('.related-product-cards button:last-child').prop("disabled", true)
      }
    });
  
    if ($(document).width() < related_products_overflow) {
      $('.related-product-cards button').css({ display: 'block' })
    } else {
      $('.related-product-cards').css({ justifyContent: 'center' })
    }

    /**************************************** */

      $(".tab-heading span").click(function () {
        $(this).addClass("active-tab").css({ opacity: 1 }).siblings().removeClass("active-tab").css({ opacity: 0.3 })
        var index = $(this).index();
        $(".tab-content > div").css({ display: 'none' }).eq(index).css({ display: 'block' })
    })

    /**************************************** */

});