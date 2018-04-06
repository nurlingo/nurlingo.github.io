$(document).ready(function () {

    $(".form-element").submit(function () {

        var formID = $(this).attr('id');
        var formNm = $('#' + formID);

        var message = $(formNm).find(".form-message");
        var formTitle = $(formNm).find(".form-title");

        var token = "567654300:AAEbiO3kpQ_vMC1E-YqjSX8OtnsE8BWASLI";
        var chat_id = "-294056907";

        var name = $('#name').val();
        var phone = $('#phone').val();

        var name2 = $('#name2').val();
        var phone2 = $('#phone2').val();


        var postMessage = "Name: " + name + "%0APhone: " + phone + "%0AName2: " + name2 + "%0APhone2: " + phone2;

        // alert(postMessage);

        $.ajax({
            type: "POST",
            url: 'https://api.telegram.org/bot' + token + '/sendMessage?chat_id=' + chat_id + '&parse_mode=html&text=' + postMessage,
            data: formNm.serialize(),
            success: function (data) {
              // Вывод сообщения об успешной отправке
              alert("Заявка успешно выслана!");
              message.html(data);
              formTitle.css("display","none");
              setTimeout(function(){
                formTitle.css("display","block");
                message.html('');
                $('input').not(':input[type=submit], :input[type=hidden]').val('');
              }, 3000);
            },
            error: function (jqXHR, text, error) {
                // Вывод сообщения об ошибке отправки
                console.log(error);
                message.html(error);
                formTitle.css("display","none");
                setTimeout(function(){
                  formTitle.css("display","block");
                  message.html('');
                  $('input').not(':input[type=submit], :input[type=hidden]').val('');
                }, 3000);
            }
        });
        return false;
    });
});
