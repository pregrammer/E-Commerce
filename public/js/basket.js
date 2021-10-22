$(document).ready(function () {

    $('.number .minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.number .plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    $(".my_basket_alert").fadeTo(4000, 500).slideUp(500, function () {
        $(this).slideUp(500);
    });

    var paymentmodal = document.getElementById("paymentModal");
    var paymentspan = document.getElementsByClassName("payment-close")[0];
    paymentspan.onclick = function () {
        paymentmodal.style.display = "none";
    }

    window.onclick = function (event) {

        if (event.target == paymentmodal) {
            paymentmodal.style.display = "none";
        }

    }

    $('input[type=radio][name=postkind]').change(function() {
        if (this.value == 0) {
            if (tot_price > 200000) {
                $('.totall-prices span:nth-of-type(2)').text(' تومان ');
                $('.totall-prices span:nth-of-type(3)').text('');
                $('.totall-prices span:nth-of-type(4)').text(' + هزینه ی ارسال رایگان ');
                $('#paymentModal form').attr('action', "/basket/order/buy/" + tot_price);
            } else {
                $('.post-section div:first-of-type span').text('');
                $('.totall-prices span:nth-of-type(2)').text(' تومان +  ');
                $('.totall-prices span:nth-of-type(3)').text('5000');
                $('.totall-prices span:nth-of-type(4)').text(' تومان هزینه ی ارسال ');
                $('#paymentModal form').attr('action', "/basket/order/buy/" + (tot_price + 5000));
            }
        }
        else if (this.value == 1) {
            if (tot_price > 200000) {
                $('.totall-prices span:nth-of-type(2)').text(' تومان +  ');
                $('.totall-prices span:nth-of-type(3)').text('10000');
                $('.totall-prices span:nth-of-type(4)').text(' تومان هزینه ی ارسال ');
                $('#paymentModal form').attr('action', "/basket/order/buy/" + (tot_price + 10000));
            } else {
                $('.totall-prices span:nth-of-type(3)').text('10000');
                $('#paymentModal form').attr('action', "/basket/order/buy/" + (tot_price + 10000));
            }
        }
    });

});

var tot_price = 0

function showpaymentmodal() {
    var inputs = $(".number input");
    var inputs_values = []
    for (var i = 0; i < inputs.length; i++) {
        inputs_values[i] = $(inputs[i]).val();
    }
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.post("/basket/order/first-step",
        {
            numbers: inputs_values,
            _token: _token
        },
        function (data, status) {
            //alert("Data: " + data.name + "\nStatus: " + status);
            if (data.has_error) {
                $('.payment-list-container').addClass('d-none');
                $('.payment-modal-content form button:last-of-type').addClass('d-none');
                $('.al-mal').removeClass('d-none');
                $('.al-mal strong').text(' تعداد ' + ' " ' + data.name + ' " ' + ' از موجودی انبار فروشگاه بیشتر است! ');
                document.getElementById("paymentModal").style.display = "block";
            } else {
                $('.al-mal').addClass('d-none');
                $('.payment-modal-content form button:last-of-type').removeClass('d-none');
                $('.payment-list-container').removeClass('d-none');

                var counts = $(".second-div span");
                for (var i = 0; i < counts.length; i++) {
                    $(counts[i]).text(inputs_values[i]);
                }

                var prod_pri = $(".third-div span:first-of-type");
                tot_price = 0;
                for (var i = 0; i < prod_pri.length; i++) {
                    var ppp = (data.prod_prices[i] - (data.prod_prices[i] * (data.prod_discounts[i] / 100))) * inputs_values[i];
                    $(prod_pri[i]).text(ppp);
                    tot_price += ppp;
                }

                if (tot_price > 200000) {
                    $('.post-section div:first-of-type span').text(' ( رایگان ) ');
                    $('.totall-prices span:nth-of-type(2)').text(' تومان ');
                    $('.totall-prices span:nth-of-type(3)').text('');
                    $('.totall-prices span:nth-of-type(4)').text(' + هزینه ی ارسال رایگان ');
                    $('#paymentModal form').attr('action', "/basket/order/buy/" + tot_price);
                } else {
                    $('.post-section div:first-of-type span').text('');
                    $('.totall-prices span:nth-of-type(2)').text(' تومان +  ');
                    $('.totall-prices span:nth-of-type(3)').text('5000');
                    $('.totall-prices span:nth-of-type(4)').text(' تومان هزینه ی ارسال ');
                    $('#paymentModal form').attr('action', "/basket/order/buy/" + (tot_price + 5000));
                }



                $('.totall-prices span:first-of-type').text(tot_price);
                $("#sefareshipost").prop("checked", true);
                document.getElementById("paymentModal").style.display = "block";
            }

        });

}