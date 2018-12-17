$( document ).ready(function() {


    // Автоматический Получение цены в Корзины
    (function() {

        restartCart();

    }());


    /**
     * Добавить товар в Корзину
     */
    $(".btn-add-cart").click(function (e) {
        e.preventDefault();

        var token = $("[name='csrf-token']").attr("content");       // Получаем token из header

        var data_id  =  $(this).attr("data-id");                     // Получить ID этой кнопки
        var id       =  $("#count-" + data_id).val();
        var count    =  $("#count-" + data_id).val();                          // Получить Количеству  этой кнопки
        var maxCount =  $("#count-" + data_id).attr("data-max");
        var price    =  $(this).attr("data-price");                  // Получить ЦЕНУ этой кнопки

        console.log("token: " + token);

        console.log("data_id: " + data_id);

        if (id == undefined) {
            id = false;
        }
        console.log("id: " + id);


        if (count == undefined) {
            count = 1;
        }
        console.log("count: " + count);


        if (maxCount == undefined) {
            maxCount = 100;
        }
        console.log("maxCount:" + maxCount);


        console.log("priсe: " + price);

        if (count == undefined) {
            console.log("answer: " + count);
            count = 1;
        }

        $.ajax({
            method: "POST",
            url:    "/cart/add/" + data_id,
            data:   {
                _token:      token,
                id_prod:     data_id,
                count_prod:  count,
                price_prod:  price,
            },
            success: function(data) {
                console.log(data);
                console.log("Count: " + data[0]);
                console.log("Sum: " + data[1]);

                $('.header-cart-summa').html(data[1]);                  // меняем общую сумму на кнопке корзины

                $('.header-cart-count').html(data[0]);                  // меняем количество товаров на кнопке корзины
                $('#header-cart-count').html(data[0]);                  // меняем количество товаров на кнопке корзины

                $('.thisCount-' + data[2]["id"]).html(data["thisData"]["thisSumma"]);

            },
            error: function (info) {
                console.log("Error: " + info);
            }
        })
    });


    // Показать Корзину
    $(".show-header-cart").click(function (e) {
        e.preventDefault();

        var cart_view_li = $(".cart-product-view");


        if(cart_view_li) {
            for (var i = 0; i < cart_view_li.length; i++) {
                cart_view_li.remove();
            }
        }

        var token = $("[name='csrf-token']").attr("content");       // Получаем token из header

        $.ajax({
            method: "POST",
            url:    "/cart/show_header",
            data:   {
                _token:      token,
            },
            success: function(data) {
                console.log(data);


                $('.header-cart-summa').html(data["summa"]);                  // меняем общую сумму на кнопке корзины
                $('.header-cart-count').html(data["count"]);                  // меняем количество товаров на кнопке корзины
                $('#header-cart-count').html(data["count"]);                  // меняем количество товаров на кнопке корзины

                var cart_view = $(".header-cart-wrapitem-cart");                // .attr("data-has-view");

                data["products"].forEach(function(product) {

                    cart_view.after(
                            "<li class=\"header-cart-item cart-product-view clear_cart_prod data-prod-" + product["id"] + "\" data-has-prod=\"yes\" id=" + "del-prod-" + product["id"] + " \>"
                        // +       "<div class=\"btn-delete\" style=\"border: 1px solid red;\" data-prod-id=" + product["id"] + "\>"
                        +           "<div class=\"header-cart-item-img btn-delete\"  data-prod-id=\"" + product["id"] + "\"\>"
                        +               "<img src=" + product["img"] + " alt=\"IMG\"\>"
                        +           "</div\>"
                        // +       "</div\>"
                        +       "<div class=\"header-cart-item-txt\"\>"
                        +           "<a href=\"http://fashe.loc/product/show/" + product["id"] + "\" class=\"header-cart-item-name\"\>" + product["product_info"]["name"] + "</a\>"
                        +           "<span class=\"header-cart-item-info\"  class=\"btn-del\"\>" + product["price"] + " x " + product["count"] + "<span style=\"float: right;\"\>$ " + product["summa"] + "</span\></span\>"
                        +       "</div\>"
                        +   "</li\>"
                    );

                });

                btn_del = $(".btn-del").attr("data-prod-id");

            },
            error: function (info) {
                console.log("Error: " + info);
            }
        })
    });

    /**
     * Удаление Товара
     */
    $(".btn-delete").click(function (e) {                             // клик на кнопку (.btn-del) Удалить (X) из корзины
        e.preventDefault();

        var token = $("[name='csrf-token']").attr("content");       // Получаем token из header
        var id = $(this).attr('data-prod-id');                      // получаем id этой кнопки

        console.log(this);

        $('.del-prod-' + id).fadeOut('slow', function(c){          // Скрыть или Удалить удаленного блока из корзины

            $.ajax({                                                // передаем ajax-запрос
                type: "POST",                                       // метод передачи данных
                url: '/cart/destroy/' + id,                                   // URL для обработки данных Контроллеру и его методу
                data: {                                             // передаем наши данные в Серьверь
                    _token:token,
                    id_prod:id,
                },
                success: function(dataq) {                           // Получаем ответ от серьвера
                        console.log(dataq);
                            restartCart();                              // Вызываем функыю getCart() чтобы получить нащи данные из Сесси Корзины
                        }
                },
            );
        });

        // Чтобы увидет полученные данные в консоле
        console.log( 'Токен: ' + token );
        console.log('Получен: ' + 'id = ' + id );

    });


    // Получение данные с корзины и отправить к пользователю
    function restartCart() {
        var token = $("[name='csrf-token']").attr("content");       // Получаем token из header

        $.ajax({
            method: "POST",
            url:    "/cart/auto_price",
            data:   {
                _token: token,
            },
            success: function(data) {
                console.log(data);

                console.log("Count: " + data["count"]);
                console.log("Sum: " + data["summa"]);


                $('.header-cart-summa').html(data["summa"]);                    // меняем общую сумму на кнопке корзины
                $('#header-cart-summa').html(data["summa"]);                    // меняем общую сумму на кнопке корзины
                $('#header-cart-total').html(data["summa"]);                    // меняем общую сумму на кнопке корзины

                $('.header-cart-count').html(data["count"]);                    // меняем количество товаров на кнопке корзины
                $('#header-cart-count').html(data["count"]);                    // меняем количество товаров на кнопке корзины

            },
            error: function (info) {
                console.log("Error: " + info);
            }
        })
    }


    // Очистит корзину
    $('.clear_cart').on('click', function(c) {                      // клик на кнопку (.empty_cart) Удалить (X) из корзины

        var token = $("[name='csrf-token']").attr("content");       // Получаем token из header

        $('.clear_cart_prod').fadeOut('slow', function(c) {         // Скрыть удаленного блока из корзины
            $('.clear_cart_prod').remove();                         // Удалить удаленного блока из корзины
        });

        $.ajax({                                                    // передаем ajax-запросом данные
            type: "POST",                                           // метод передачи данных
            url: '/cart/clear_cart',                                     // URL для обработки данных Контроллеру и его методу
            data: {                                                 // передаем наши данные
                _token:token,
                clear_cart:true,
            },
            success: function(data) {                            // Получаем ответ от серьвера
                restartCart();                                       // Вызываем функыю getCart() чтобы получить нащи данные из Сесси Корзины
                // Чтобы увидет полученные данные в консоле
                // console.log(data);
            },
            error: function () {
                console.log("Error!");
            }
        });

        // Чтобы увидет полученные данные в консоле
        console.log( 'Токен: ' + token );
        console.log(' Корзина очищен! ');

    });

    console.log("Cart start!");

});
