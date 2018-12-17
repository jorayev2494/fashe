$(document).ready(function() {

    function test(params) {
        alert(params);
    }

    $.fn.editable.defaults.mode = 'inline';

    // editables

    console.log($(".lastname").val());
    var test = $(".input-sm").val();

    // $('#editable-submit').onclick(function () {
    //     var t = this.val();
    //     console.log(t);
    // })
    // console.log(submit);
    console.dir(test);



    $('#username').editable({

        // headers: {
        //     'Content-Twwwwwype'
        // },

        url: "/admin/users/3",

        // Валидироваить данные
        validate:function(value) {
            if($.trim(value) === '')
            {
            return "@{{ trans('admin.empty') }}";
            //   return 'This field is required';
            }
        },

        // Отправить в сервер через Ajax
        ajaxOptions: {
            type: 'POST',               // Тип запроса
            pk: '3',
            data: {
                    value: settings,
                    name: "username",
                    _method: "PUT",
                    _token: $("[name='csrf-token']").attr("content"),   // Получаем token из header,
                },
            // response: function(settings) {
            //     this.responseText = 'Internal Server Error';
            //     log(settings, this);
            // },
        },

        title: 'Enter Country',

        // Ответ от сервера
        success: function(response) {
            console.dir(response);
            //  return response
        },

        error: function(response) {
            console.log(response);
        //     return response
        },
    });



    $('#firstname').editable({
        validate: function(value) {
           if($.trim(value) == '') return 'This field is required';
        }
    });

    // editables
    $('#lastname').editable({

        // headers: {
        //     'Content-Twwwwwype'
        // },

        url: "/admin/users/3",

        // Валидироваить данные
        validate:function(value) {
            if($.trim(value) === '')
            {
            return "@{{ trans('admin.empty') }}";
            //   return 'This field is required';
            }
        },

        // Отправить в сервер через Ajax
        ajaxOptions: {
            type: 'POST',
            pk: '3',
            // Тип запроса
            data: {
                name: "username",
                // value: $('#username').val(),
                // vakue:pk,
                // value :"superuserdwd",                                           // отправить данные в сервер
                _method: "PUT",
                _token: $("[name='csrf-token']").attr("content"),   // Получаем token из header,
            } ,
        },

        title: 'Enter Country',

        // Ответ от сервера
        success: function(response) {
            console.log(response);
            // console.log(pk);
            //  return response
        },
        error: function(response) {
            console.log(response);
        //     return response
        },
    });


})
