$(function () {
    "use strict";
    $(function () {
            $(".preloader").fadeOut();
        }),

        jQuery(document).on("click", ".mega-dropdown", function (i) {
            i.stopPropagation();
        });


    var i = function () {
        (window.innerWidth > 0 ? window.innerWidth : this.screen.width) < 1170 ? ($("body").addClass("mini-sidebar"),
            $(".navbar-brand span").hide(), $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow-y", "auto"),
            $(".sidebartoggler i").addClass("ti-menu")) : ($("body").removeClass("mini-sidebar"),
            $(".navbar-brand span").show());
        var i = (window.innerHeight > 0 ? window.innerHeight : this.screen.height) - 1;
        (i -= 70) < 1 && (i = 1), i > 70 && $(".page-wrapper").css("min-height", i + "px");
    };


    $(window).ready(i), $(window).on("resize", i), $(".sidebartoggler").on("click", function () {
            $("body").hasClass("mini-sidebar") ? ($("body").trigger("resize"), $(".scroll-sidebar, .slimScrollDiv").css("overflow", "hidden").parent().css("overflow", "visible"),
                $("body").removeClass("mini-sidebar"), $(".navbar-brand span").show()) : ($("body").trigger("resize"),
                $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible"),
                $("body").addClass("mini-sidebar"), $(".navbar-brand span").hide());
        }),



        $(".fix-header .header").stick_in_parent({}), $(".nav-toggler").click(function () {
            $("body").toggleClass("show-sidebar"), $(".nav-toggler i").toggleClass("mdi mdi-menu"),
                $(".nav-toggler i").addClass("mdi mdi-close");
        }),



        $(".search-box a, .search-box .app-search .srh-btn").on("click", function () {
            $(".app-search").slideToggle(200);
        }),



        $(".floating-labels .form-control").on("focus blur", function (i) {
            $(this).parents(".form-group").toggleClass("focused", "focus" === i.type || this.value.length > 0);
        }).trigger("blur"), $(function () {
            for (var i = window.location, o = $("ul#sidebarnav a").filter(function () {
                    return this.href == i;
                }).addClass("active").parent().addClass("active");;) {
                if (!o.is("li")) break;
                o = o.parent().addClass("in").parent().addClass("active");
            }
        }),
        $('#Registro').submit(function (e) {
            $.ajax({
                type: 'POST',
                url: '../backend/NuevoUsuario.php',
                data: $(this).serialize(),
                success: function (data) {
                    if (data == 'true') {
                        $(".exito").text("¡REGISTRO EXITOSO!");
                        $('.exito').fadeIn(2000, function () {
                            window.location.reload(true);
                        });

                    } else if (data == 'false') {
                        $(".exito").text("¡REGISTRO SIN ÉXITO, NO TENEMOS MÁS INFORMACIÓN");
                        $('.exito').fadeIn(2000, function () {
                            window.location.reload(true);
                        });

                    } else {
                        $(".exito").text("EL USUARIO YA SE ENCUENTRA REGISTRADO");
                        $('.exito').fadeIn(2000, function () {
                            window.location.reload(true);
                        });
                    }
                },
                error: function (data) {
                    $(".exito").text("¡REGISTRO SIN ÉXITO, NO TENEMOS MÁS INFORMACIÓN");
                    $('.exito').fadeIn(2000, function () {
                        window.location.reload(true);
                    });
                }
            });

            e.preventDefault();
        });
    $('#RegistroVacas').submit(function (e) {
        $.ajax({
            type: 'POST',
            url: '../backend/Nuevaca.php',
            data: $(this).serialize(),
            success: function (data) {
                if (data == 'true') {
                    $(".exito").text("¡REGISTRO EXITOSO!");
                    $('.exito').fadeIn(2000, function () {
                        window.location.reload(true);
                    });

                } else if (data == 'false') {
                    $(".exito").text("¡REGISTRO SIN ÉXITO, NO TENEMOS MÁS INFORMACIÓN");
                    $('.exito').fadeIn(2000, function () {
                        //window.location.reload(true);
                    });

                } else {
                    $(".exito").text("EL EJEMPLAR YA SE ENCUENTRA REGISTRADO");
                    $('.exito').fadeIn(2000, function () {
                       // window.location.reload(true);
                    });
                }
            },
            error: function (data) {
                $(".exito").text("¡REGISTRO SIN ÉXITO, NO TENEMOS MÁS INFORMACIÓN");
                $('.exito').fadeIn(2000, function () {
                    window.location.reload(true);
                });
            }
        });

        e.preventDefault();
    });
    $('#registroGanaderos').submit(function (e) {
        $.ajax({
            type: 'POST',
            url: '../backend/nuevaGanaderia.php',
            data: $(this).serialize(),
            success: function (data) {
                if (data == 'true') {
                    $(".exito").text("¡REGISTRO EXITOSO!");
                    $('.exito').fadeIn(2000, function () {
                        window.location.reload(true);
                    });

                } else if (data == 'false') {
                    $(".exito").text("¡REGISTRO SIN ÉXITO, NO TENEMOS MÁS INFORMACIÓN");
                    $('.exito').fadeIn(2000, function () {
                        window.location.reload(true);
                    });

                } else {
                    $(".exito").text("LA GANADERÍA YA SE ENCUENTRA REGISTRADA");
                    $('.exito').fadeIn(2000, function () {
                       // window.location.reload(true);
                    });
                }
            },
            error: function (data) {
                $(".exito").text("¡REGISTRO SIN ÉXITO, NO TENEMOS MÁS INFORMACIÓN");
                $('.exito').fadeIn(2000, function () {
                  //  window.location.reload(true);
                });
            }
        });

        e.preventDefault();
    });
});