$('.my-form').submit(function (e){
    e.preventDefault();
    let th = $(this);
    let mess = $('.mess');
    let btn = th.find('.contact');
    mess.addClass('green');
    $.ajax({
        url: '/views/support/foo.php',
        type: 'POST',
        data: th.serialize(),
        success: function (data){
            if (data == 1){
                mess.removeClass('green');
                mess.addClass('red');
                mess.html('<div>Email введен неверно!</div>');
                setTimeout(function (){
                    th.trigger('reset');
                    mess.html('');
                    mess.removeClass('red');
                }, 5000)
                return false;
            }else {
                mess.removeClass('red');
                mess.html('<div>Собщение успешно отправлено!</div>');
                setTimeout(function (){
                    th.trigger('reset');
                    mess.html('');
                    mess.removeClass('green');
                }, 5000)
            }
        },error: function (){
            mess.removeClass('green');
            mess.addClass('red');
            mess.html('<div>Ошибка отправки!</div>');
            setTimeout(function (){
                th.trigger('reset');
                mess.html('');
                mess.removeClass('red');
            }, 5000)
        }
    })
})