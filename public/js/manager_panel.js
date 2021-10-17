$(document).ready(function () {

    $("aside ul li:not(:last-child)").click(function () {
        $(this).addClass("active-aside-li").siblings().removeClass("active-aside-li")
        $('main aside').toggleClass('active-aside')
        var itemIndex = $(this).index()
        $('.panel-content > div').eq(itemIndex).css({ visibility: 'visible' }).siblings().css({ visibility: 'hidden' })
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $('main .panel-header').css({ position: 'fixed', marginTop: '-100px', zIndex: '4' })
            $('main aside').css({ position: 'fixed', marginTop: '-40px' })
            $('main .panel-content').css({ marginTop: '60px' })

        } else {
            $('main .panel-header').css({ position: 'unset', marginTop: 'unset', zIndex: 'unset' })
            $('main aside').css({ position: 'absolute', marginTop: '0' })
            $('main .panel-content').css({ marginTop: 'unset' })
        }
    }).scroll();

    $('.panel-header i').click(function (e) {
        e.preventDefault();
        $('main aside').toggleClass('active-aside')
    });


    var promodal = document.getElementById("proModal");
    var probtn = document.getElementById("btn-new-pro");
    var prospan = document.getElementsByClassName("pro-close")[0];
    probtn.onclick = function () {
        promodal.style.display = "block";
    }
    prospan.onclick = function () {
        promodal.style.display = "none";
    }







    var proeditmodal = document.getElementById("proEditModal");
    $('.pro-edit-close').click(function (e) { 
        e.preventDefault();
        proeditmodal.style.display = "none";
    });

    var weblogeditmodal = document.getElementById("weblogEditModal");
    $('.weblog-edit-close').click(function (e) { 
        e.preventDefault();
        weblogeditmodal.style.display = "none";
    });

















    var weblogmodal = document.getElementById("weblogModal");
    var weblogbtn = document.getElementById("btn-new-weblog");
    var weblogspan = document.getElementsByClassName("weblog-close")[0];
    weblogbtn.onclick = function () {
        weblogmodal.style.display = "block";
    }
    weblogspan.onclick = function () {
        weblogmodal.style.display = "none";
    }

    var commentmodal = document.getElementById("commentModal");
    var commentspan = document.getElementsByClassName("comment-close")[0];
    $('.all-comments-container tbody tr td:last-of-type a:last-of-type').click(function (e) { 
        e.preventDefault();
        commentmodal.style.display = "block";
    });
    commentspan.onclick = function () {
        commentmodal.style.display = "none";
    }

    

    window.onclick = function (event) {
        if (event.target == promodal) {
            promodal.style.display = "none";
        }else if (event.target == weblogmodal) {
            weblogmodal.style.display = "none";
        }else if (event.target == commentmodal) {
            commentmodal.style.display = "none";
        }else if (event.target == proeditmodal) {
            proeditmodal.style.display = "none";
        }else if (event.target == weblogeditmodal) {
            weblogeditmodal.style.display = "none";
        }
    }


    $('.all-orders-container tfoot tr:last-of-type td:last-of-type').click(function (e) { 
        e.preventDefault();
        if ($(this).hasClass("bg-success")){
            $(this).removeClass("bg-success").addClass("bg-warning").text("در انتظار بررسی")
        }else{
            $(this).removeClass("bg-warning").addClass("bg-success").text("بررسی شده")
        }
    });
    
    /*$('.all-users-container tbody tr td:last-of-type').click(function (e) { 
        e.preventDefault();
        if ($(this).hasClass("bg-success")){
            $(this).removeClass("bg-success").addClass("bg-warning").text("معلق")
        }else{
            $(this).removeClass("bg-warning").addClass("bg-success").text("آزاد")
        }
    });*/

    

});
function showproducteditmodal(pid){

    $.get("/get-product/"+pid, function(data, status){
        //alert("Data: " + data.name + "\nStatus: " + status);

        $('#proEditModal form').attr('action', "/product-detail/edit/"+pid);

        $('#proEditModal form input:nth-of-type(2):not(.pro-feature-row input)').val(data.name);
        $('#proEditModal form select option').eq(data.groupKind - 1).prop('selected', true);
        $('#proEditModal form input:nth-of-type(3)').val(data.price);
        $('#proEditModal form input:nth-of-type(4)').val(data.discountPercentage);
        $('#proEditModal form input:nth-of-type(5)').val(data.inventory);
        $('#proEditModal form textarea').val(data.description);

        $('#proEditModal form input:nth-of-type(10)').val(data.firstProp);
        $('#proEditModal form input:nth-of-type(11)').val(data.secondProp);
        $('#proEditModal form input:nth-of-type(12)').val(data.thirdProp);
        $('#proEditModal form input:nth-of-type(13)').val(data.fourthProp);
        $('#proEditModal form input:nth-of-type(14)').val(data.fifthProp);

        $('#proEditModal .pro-feature-row input[name="title1"]').val(data.title1);
        $('#proEditModal .pro-feature-row input[name="feature1"]').val(data.feature1);
        $('#proEditModal .pro-feature-row input[name="title2"]').val(data.title2);
        $('#proEditModal .pro-feature-row input[name="feature2"]').val(data.feature2);
        $('#proEditModal .pro-feature-row input[name="title3"]').val(data.title3);
        $('#proEditModal .pro-feature-row input[name="feature3"]').val(data.feature3);
        $('#proEditModal .pro-feature-row input[name="title4"]').val(data.title4);
        $('#proEditModal .pro-feature-row input[name="feature4"]').val(data.feature4);
        $('#proEditModal .pro-feature-row input[name="title5"]').val(data.title5);
        $('#proEditModal .pro-feature-row input[name="feature5"]').val(data.feature5);
        $('#proEditModal .pro-feature-row input[name="title6"]').val(data.title6);
        $('#proEditModal .pro-feature-row input[name="feature6"]').val(data.feature6);
      });

    document.getElementById("proEditModal").style.display = "block";
}

function showweblogeditmodal(wid)
{
    $.get("/get-weblog/"+wid, function(data, status){
        //alert("Data: " + data.title + "\nStatus: " + status);

        $('#weblogEditModal form').attr('action', "/weblog-detail/edit/"+wid);

        $('#weblogEditModal form input:nth-of-type(2)').val(data.title);
        $('#weblogEditModal form select option').eq(data.groupKind - 1).prop('selected', true);
        $('#weblogEditModal form textarea').val(data.description);
      });

    document.getElementById("weblogEditModal").style.display = "block";
}