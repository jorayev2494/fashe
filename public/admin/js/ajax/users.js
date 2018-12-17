$( document ).ready(function() {

    // Variable to store your files
    // var token = $("[name='csrf-token']").attr("content");                // Получаем token из header

    var id = 0;

    // Редактировать Пользователя
    $(".edit_user").click(function (e) {
        id = $(this).attr("data-id");
        var token = $("[name='csrf-token']").attr("content");                // Получаем token из header
        e.preventDefault();
        var form = $("#form-edit-user").attr("action", "http://fashe.loc/admin/users/" + id).attr("method", "POST");
        console.log(form);

        $.ajax({
            type: "GET",
            url: "users/" + id,
            // url: "users/" + id + "/edit",
            data: {
                _token:token,
                id:id,
            },
            success: function (response) {
                // console.log(response);
                // console.log("****************************************************************");
                if (response) {

                    $(".edit-avatar").attr("src", response["avatar"]).attr("alt", response["avatar"]);

                    $("input[name='name']").attr("value", response["name"]);
                    $("input[name='lastname']").attr("value", response["lastname"]);
                    $("input[name='email']").attr("value", response["email"]);
                    $("input[name='site']").attr("value", response["site"]);
                    $("input[name='location']").attr("value", response["location"]);
                    $("input[name='profession']").attr("value", response["profession"]);

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


    // Удалить Пользователя
    $(".delete_user").click(function (e) {
        e.preventDefault();

        var token = $("[name='csrf-token']").attr("content");                // Получаем token из header
        var id = $(this).attr("data-id");

        $bool = confirm("Delete: " + id + " ?");

        if ($bool) {

            $('.line-user-' + id).fadeOut('slow', function(c) {         // Скрыть удаленного блока из корзины
                $('.line-user-' + id).remove();                         // Удалить удаленного блока из корзины
            });

            $.ajax({
                type: "POST",
                url: "users/" + id,
                data: { _token:token, _method:"DELETE", id:id },
                success: function (response) {
                    console.log(response);
                }
            });

        }
     })



    // $("#edit_user").click(function (e) {

        // e.preventDefault();
        // var id = $(this).attr("data-id");

        // console.log(this);

        // var form = $("#form-edit-user").attr("action", "http://fashe.loc/admin/users/" + id).attr("method", "POST");
        // console.log(id);
        // console.log(form);
    // })

    // var form = $("#form-edit-user");
    // var forq = form.attr("action", "http://fashe.loc/admin/users/" + id).attr("method", "POST");
    // console.log(forq);



});
