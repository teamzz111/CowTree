$(document).ready(function () {
    $('#form').submit(function (e) {
        $.ajax({
            type: 'POST',
            url: 'backend/login.php',
            data: $('#form').serialize(),
            success: function (data) {
                if (data == 'true') {
                    location.href = "app/index.php";
                } else if (data == 'false') {
                    $('#form .exito').fadeIn(500);
                    setTimeout(function () {
                        $('#pass, #user').val("");
                        $('#form .exito').fadeOut(1000);
                    }, 1500);
                } else {
                    $('#form .exito').html('¡Lo sentimos! Tus datos se han quedado en el limbo, reinicia la página e intenta de nuevo.');
                    $('#form .exito').css('display', 'block');
                    setTimeout(function () {
                        $('#pass').val("");

                    }, 2200);
                }
            },
            error: function (data) {
                $('#form .exito').html('¡Lo sentimos! Tus datos se han quedado en el limbo, reinicia la página e intenta de nuevo.');
                $('#form .exito').css('display', 'block');
            }
        });
        e.preventDefault();
    });
});