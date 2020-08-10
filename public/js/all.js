$(document).ready(function () {
    var span = $("#foodListCheckout");
    var ulList = span.next();
    ulList.css("display", "none");
    $("#foodListCheckout").click(function () {
        if (ulList.css("display") === "none") {
            ulList.slideDown();
            $(span.children("i")).css({transform: "rotate(180deg)", marginRight: 10});
        } else {
            ulList.slideUp();
            $(span.children("i")).css({transform: "rotate(0deg)", marginRight: 0});

        }
    });
    $("#loginTab").click(function () {
        $("#login").show();
        $("#register").hide();
    });
    $("#registerTab").click(function () {
        $("#login").hide();
        $("#register").show();
    });
    if ($(".auth-form").length) {
        $("header.bgImage").css("height", "750");
    }
    $('.panel_list_item').click(function () {
        var food_list = $(this).children('.food_list_item');
        var order_id = food_list.data('orderid');
        if (food_list.css("display") === "none") {
            food_list.slideDown();
            if ($(food_list).has('ul li').length <= 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'orders/foods',
                    type: 'post',
                    data: {order_id: order_id},
                    success: function (response) {
                        putFoodsInList(response,food_list);
                    },
                    error: function () {
                    }
                });
            }
        } else {
            food_list.slideUp();
        }
    });

    function putFoodsInList(response,food_list) {
        if(typeof response === 'object') {
            foods = response;
            food_list = food_list.children("ul");
            for (let food in Object.assign(foods)) {
                food_list.append("<li>" + foods[food] + "</li>");
            }
        }
    }
    $('.collectionBox li').mousedown(function (e) {
        $(this).css('opacity', '0.5');
        let food_id = $(this).data('foodid');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'addCart',
            type: 'post',
            data: {food_id: food_id},
            success: function (response) {
                if (response === 'false') {
                    alert("لطفا ابتدا وارد سایت شوید.")

                } else {
                    cartUpdate(response);
                }
            },
            error: function () {

            }
        });
    });
    $('.collectionBox li').mouseup(function (e) {
        $(this).css('opacity', '1');
    });

    function cartUpdate(response) {
        $('#cart #cartNumber').html(response);
    }

    $('#coupon').submit(function (e) {
        e.preventDefault();
        let coupon = $('#coupon input[type = text]').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'checkCoupon',
            type: 'post',
            data: {code: coupon},
            success: function (response) {
                if (typeof response === "object") {
                    $('#discount span:last-child').html(response[0] + " هزار تومان");
                    $('#finalPrice span:last-child').html(response[1] + " هزار تومان ");
                }
            },
            error: function () {

            }
        });
    });
    $('#checkCart .value_cart').change(function (e) {
        food_id = $(this).data('foodid');
        newValue = $(this).find('input[type=number]').val();
        let coupon = $('#coupon input[type = text]').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'cart/increase',
            type: 'post',
            data: {food_id: food_id, value: newValue, code: coupon},
            success: function (response) {
                if(response){
                    var totalPrice = response[0];
                    var discount = response[1];
                    var finalPrice = response[2];
                    $('#total_price span:last-child').html(totalPrice + ' هزار تومان');
                    $('#discount span:last-child').html(discount+ ' هزار تومان');
                    $('#finalPrice span:last-child').html(finalPrice + ' هزار تومان');
                }
            },
            error: function () {

            }
        });
    });
});

// var scroll = setInterval(function(){ window.scrollBy(0,10); }, 100);
window.addEventListener("scroll", scrollFunc);

function fadeInLeft() {
    document.getElementById('menuUl').style.right = '0px';
}

function exitMenu() {
    document.getElementById('menuUl').style.right = '-50%';
}

// Menu Scroll Fix

function scrollFunc() {
    if (document.documentElement.scrollTop >= 40) {
        fixMenu();
    } else {
        document.getElementById('MobileMenuIcon').style.color = '#fff';
        $('#logoImg').css('display','block');
        $('#logoFixImg').css('display','none');
        document.getElementById('menuNavi').classList.remove("whiteMenu");
        if ($('#login_menu').length > 0) {
            $('#login_menu').css('color', '#fff');
        }
        if ($('.logout').length > 0) {
            $('.logout a').css('color', '#fff');
        }
        if (window.innerWidth <= 768) {
            document.getElementById("cart").style.marginTop = "0px";
            document.getElementById("cart").style.color = "white";
        }
    }
}

function fixMenu() {
    document.getElementById('menuNavi').classList.add("whiteMenu");
    document.getElementById('MobileMenuIcon').style.color = '#be9d7a';
    $('#logoImg').css('display','none');
    $('#logoFixImg').css('display','block');
    if ($('#login_menu').length > 0) {
        $('#login_menu').css('color', '#be9d7a');
    }
    if ($('.logout').length > 0) {
        $('.logout a').css('color', '#be9d7a');
    }
    if (window.innerWidth <= 768) {
        document.getElementById("cart").style.marginTop = "10px";
        document.getElementById("cart").style.color = "#be9d7a";
    }
}
