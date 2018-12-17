$( document ).ready(function() {

    // Variable to store your files
    // var token = $("[name='csrf-token']").attr("content");                // Получаем token из header

    var id = 0;

    // Редактировать Пользователя
    $(".edit_product").click(function (e) {
        id = $(this).attr("data-id");
        var token = $("[name='csrf-token']").attr("content");                // Получаем token из header

        var form = $("#form-edit-product").attr("action", "http://fashe.loc/admin/products/" + id).attr("method", "POST");
        console.log(form);

        $.ajax({
            type: "GET",
            url: "products/" + id + "/edit",
            data: {
                _token:token,
                id:id,
            },
            success: function (response) {
                console.log(response);
                // console.log("****************************************************************");
                if (response) {

                    // $(".edit-product-photo").attr("src", response["img"]).attr("alt", response["img"]);
                    $(".edit-product-photo").html(
                        "<img src=\"\" style=\"margin: -15px 40% 15px 40%;\" class=\"user-profile-image img-circle\" alt=\"\">"
                    );

                    // $("input[name='product_name']").attr("value", response["name"]);
                    // $("input[name='lastname']").attr("value", response["lastname"]);
                    // $("input[name='email']").attr("value", response["email"]);
                    // $("input[name='site']").attr("value", response["site"]);
                    // $("input[name='location']").attr("value", response["location"]);
                    // $("input[name='profession']").attr("value", response["profession"]);

                } else {

                    $.ajax({
                        type: "POST",
                        url: "/logout",
                        data: { _token:token },
                    });

                    location.reload();
                }
            }
        });
    })
});
