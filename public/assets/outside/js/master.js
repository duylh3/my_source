var tempIndex = 1;

window.onload = function () {
    $(".dotdotdot").dotdotdot();
    if (window.innerWidth > 767) {
        process();
    }

};
$(document).ready(function () {
    //fix-quang-cao
          $("#leftCol").stick_in_parent();
       

    iconLargeHide();


    $("#pagecontent iframe").attr('width', '100%');
    $("#pagecontent .sliderVideo iframe").attr('height', 'auto');
    $('#nut-hidden-more').hover(function () {
        $(this).toggleClass('open');
    });
    $('#nut-hidden-more').hover(function () {
        locationMenuChild();
    });
    $('#navbar-large li').hover(function () {
        $(this).toggleClass('open');
    });
    $('#navbar-large li').removeClass('open');
//    $("#navbar-large li .icon-more").on('touchstart', function (event) {
//        var obj = $(this).parents('.itemp-menu');
//        var objClass = obj.attr('class');
//        $('#navbar-large li').removeClass('open');
//        obj.removeClass().addClass(objClass);
//        obj.toggleClass("open");
//        event.stopPropagation();
//    });
    $("#navbar-large li .icon-more").on('click', function (event) {
        var obj = $(this).parents('.itemp-menu');
        var objClass = obj.attr('class');
        $('#navbar-large li').removeClass('open');
        obj.removeClass().addClass(objClass);
        obj.toggleClass("open");
        event.stopPropagation();
    });
    var hFooter = $('footer').height();

    $('#content-info').css('padding-bottom', hFooter);
    if (window.innerWidth > 767) {
        process();
    }
    if (window.innerWidth <= 767) {
        iconPhoneHide();
    }
});
function iconLargeHide() {
    //iLogout
    $("#wrapper-profile-large").on("click", function (event)
    {
        $("#wrapper-profile-large .wrapper-profile").toggle();
        event.stopPropagation();

    });
    $(document).on("click", function (event)
    {
        $("#wrapper-profile-large .wrapper-profile").hide();

    });
    //iLogout
}
function iconPhoneHide() {
    // iMenu
    $("button.navbar-toggle").on("click", function (event)
    {
        $("ul#navbar-large").toggle();
        $(".wrapper-profile").hide();
        event.stopPropagation();
    });
    $(document).on("click", function (event)
    {
        $("ul#navbar-large").hide();
    });
// iMenu
//iLogout
    $("#wrapper-profile-phone").on("click", function (event)
    {
        $("#wrapper-profile-phone .wrapper-profile").toggle();
        $("#wrapper-profile-large .wrapper-profile").toggle();
        event.stopPropagation();
        $("ul#navbar-large").hide();
    });
    $(document).on("click", function (event)
    {
        $("#wrapper-profile-phone .wrapper-profile").hide();
    });
    //iLogout
}
function process() {
    var wUl = $('ul#navbar-large').width();
    var numberli = $("ul#navbar-large>li").length;
    /*cắt li nếu dài quá kích thước ul*/
    $('.icon-hidden').css('display', 'block');
    var resultTotal = 200;
    $('ul#navbar-large>li').each(function (index) {
        var a = $(this).find('a');
        var wA = a.width();
        resultTotal = resultTotal + wA;
        if (resultTotal >= wUl) {
            var htmlContentLi = $('ul#navbar-large').find('li.itemp-menu').last().html();
            $('ul#navbar-large').find('li.itemp-menu').last().remove();
            $('ul#nut-hidden-more ul.dropdown-menu.list-hide-icon>li').first().before('<li>' + htmlContentLi + '</li>');
        }
    });
//    resultTotal = total + 200;
    if (resultTotal < wUl) {
        $('ul#nut-hidden-more').addClass('OpenOpacity');
        $('.list-hide-icon>li').each(function (index) {
            if ($(this).attr('class') !== 'hidden') {
                var a = $(this).find('a');
                var wLiMore = a.width() + 3;
                resultTotal += wLiMore;
                if (resultTotal < wUl) {
                    var getLiDel = $(this).html();
                    $(this).remove();
                    $('ul#navbar-large').append('<li class="itemp-menu">' + getLiDel + '</li>');
                }
            }
        });
        $('ul#nut-hidden-more').removeClass('OpenOpacity');
    }
    var countLiHidden = $('.list-hide-icon>li').length;
    if (countLiHidden > 1) {
        $('.icon-hidden').css('display', 'block');
    }
    else {
        $('.icon-hidden').css('display', 'none');
    }
    /*Gán pading cho li*/
    var total = 0;
    $('ul#navbar-large>li>a').each(function (index) {
        total += $(this).width();
    });
    numberli = $("ul#navbar-large>li.itemp-menu").length;
    var distancePadding = ((wUl - total - 20 - $('#nut-hidden-more').width()) / numberli) / 2;
    $('ul#navbar-large>li.itemp-menu').css('padding-left', distancePadding);
    $('ul#navbar-large>li.itemp-menu').css('padding-right', distancePadding);
}
function locationMenuChild() {
    $('#nut-hidden-more>li ul>li').each(function (index) {
        var objPosition = $(this).find('a.dropdown-toggle').position();
        if (typeof objPosition !== 'undefined') {
            var positionTop = objPosition.top;
            $(this).find('ul.dropdown-menu').css('top', positionTop);
        }
    });

}
$(window).resize(function () {
    var hFooter = $('footer').height();
    $('#content-info').css('padding-bottom', hFooter);
    $(".dotdotdot").dotdotdot();
    if (window.innerWidth > 767) {
        process();
    } else {
        $('ul#navbar-large>li').removeAttr('style');
        $('.list-hide-icon>li').each(function (index) {
            if ($(this).attr('class') !== 'hidden') {
                var getLiDel = $(this).html();
                $(this).remove();
                $('ul#navbar-large').append('<li class="itemp-menu">' + getLiDel + '</li>');
            }
        });
    }
    iconLargeHide();
    if (window.innerWidth <= 767) {
        iconPhoneHide();
    }

});

