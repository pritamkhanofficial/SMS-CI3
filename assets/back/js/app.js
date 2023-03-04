!(function (a) {
    "use strict";
    var b,
        g,
        f,
        d = localStorage.getItem("language");
    function h(b) {
        document.getElementById("header-lang-img") &&
            ("en" == b
                ? (document.getElementById("header-lang-img").src = "assets/images/flags/us.jpg")
                : "sp" == b
                ? (document.getElementById("header-lang-img").src = "assets/images/flags/spain.jpg")
                : "gr" == b
                ? (document.getElementById("header-lang-img").src = "assets/images/flags/germany.jpg")
                : "it" == b
                ? (document.getElementById("header-lang-img").src = "assets/images/flags/italy.jpg")
                : "ru" == b && (document.getElementById("header-lang-img").src = "assets/images/flags/russia.jpg"),
            localStorage.setItem("language", b),
            "null" == (d = localStorage.getItem("language")) && h("en"),
            a.getJSON("assets/lang/" + d + ".json", function (b) {
                a("html").attr("lang", d),
                    a.each(b, function (b, c) {
                        "head" === b && a(document).attr("title", c.title), a("[key='" + b + "']").text(c);
                    });
            }));
    }
    function i() {
        for (var b = document.getElementById("topnav-menu-content").getElementsByTagName("a"), a = 0, c = b.length; a < c; a++)
            "nav-item dropdown active" === b[a].parentElement.getAttribute("class") && (b[a].parentElement.classList.remove("active"), b[a].nextElementSibling.classList.remove("show"));
    }
    function c(a) {
        document.getElementById(a) && (document.getElementById(a).checked = !0);
    }
    function e() {
        document.webkitIsFullScreen || document.mozFullScreen || document.msFullscreenElement || (console.log("pressed"), a("body").removeClass("fullscreen-enable"));
    }
    a("#side-menu").metisMenu(),
        document.querySelectorAll(".counter-value").forEach(function (a) {
            !(function e() {
                var b = +a.getAttribute("data-target"),
                    d = +a.innerText,
                    c = b / 250;
                c < 1 && (c = 1), d < b ? ((a.innerText = (d + c).toFixed(0)), setTimeout(e, 1)) : (a.innerText = b);
            })();
        }),
        (g = document.body.getAttribute("data-sidebar-size")),
        a(window).on("load", function () {
            a(".switch").on("switch-change", function () {
                toggleWeather();
            }),
                1024 <= window.innerWidth && window.innerWidth <= 1366 && (document.body.setAttribute("data-sidebar-size", "lg"), c("sidebar-size-small"));
        }),
        a("#vertical-menu-btn").on("click", function (b) {
            b.preventDefault(),
                a("body").toggleClass("sidebar-enable"),
                992 <= a(window).width() &&
                    (null == g
                        ? null == document.body.getAttribute("data-sidebar-size") || "lg" == document.body.getAttribute("data-sidebar-size")
                            ? document.body.setAttribute("data-sidebar-size", "sm")
                            : document.body.setAttribute("data-sidebar-size", "lg")
                        : "md" == g
                        ? "md" == document.body.getAttribute("data-sidebar-size")
                            ? document.body.setAttribute("data-sidebar-size", "sm")
                            : document.body.setAttribute("data-sidebar-size", "md")
                        : "sm" == document.body.getAttribute("data-sidebar-size")
                        ? document.body.setAttribute("data-sidebar-size", "lg")
                        : document.body.setAttribute("data-sidebar-size", "sm"));
        }),
        a("#sidebar-menu a").each(function () {
            var b = window.location.href.split(/[?#]/)[0];
            this.href == b &&
                (a(this).addClass("active"),
                a(this).parent().addClass("mm-active"),
                a(this).parent().parent().addClass("mm-show"),
                a(this).parent().parent().prev().addClass("mm-active"),
                a(this).parent().parent().parent().addClass("mm-active"),
                a(this).parent().parent().parent().parent().addClass("mm-show"),
                a(this).parent().parent().parent().parent().parent().addClass("mm-active"));
        }),
        a(document).ready(function () {
            var b;
            0 < a("#sidebar-menu").length &&
                0 < a("#sidebar-menu .mm-active .active").length &&
                300 < (b = a("#sidebar-menu .mm-active .active").offset().top) &&
                ((b -= 300), a(".vertical-menu .simplebar-content-wrapper").animate({ scrollTop: b }, "slow"));
        }),
        a(".navbar-nav a").each(function () {
            var b = window.location.href.split(/[?#]/)[0];
            this.href == b &&
                (a(this).addClass("active"),
                a(this).parent().addClass("active"),
                a(this).parent().parent().addClass("active"),
                a(this).parent().parent().parent().addClass("active"),
                a(this).parent().parent().parent().parent().addClass("active"),
                a(this).parent().parent().parent().parent().parent().addClass("active"),
                a(this).parent().parent().parent().parent().parent().parent().addClass("active"));
        }),
        a('[data-toggle="fullscreen"]').on("click", function (b) {
            b.preventDefault(),
                a("body").toggleClass("fullscreen-enable"),
                document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement
                    ? document.cancelFullScreen
                        ? document.cancelFullScreen()
                        : document.mozCancelFullScreen
                        ? document.mozCancelFullScreen()
                        : document.webkitCancelFullScreen && document.webkitCancelFullScreen()
                    : document.documentElement.requestFullscreen
                    ? document.documentElement.requestFullscreen()
                    : document.documentElement.mozRequestFullScreen
                    ? document.documentElement.mozRequestFullScreen()
                    : document.documentElement.webkitRequestFullscreen && document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }),
        document.addEventListener("fullscreenchange", e),
        document.addEventListener("webkitfullscreenchange", e),
        document.addEventListener("mozfullscreenchange", e),
        (function () {
            if (document.getElementById("topnav-menu-content")) {
                for (var b = document.getElementById("topnav-menu-content").getElementsByTagName("a"), a = 0, c = b.length; a < c; a++)
                    b[a].onclick = function (a) {
                        "#" === a.target.getAttribute("href") && (a.target.parentElement.classList.toggle("active"), a.target.nextElementSibling.classList.toggle("show"));
                    };
                window.addEventListener("resize", i);
            }
        })(),
        [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function (a) {
            return new bootstrap.Tooltip(a);
        }),
        [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]')).map(function (a) {
            return new bootstrap.Popover(a);
        }),
        [].slice.call(document.querySelectorAll(".toast")).map(function (a) {
            return new bootstrap.Toast(a);
        }),
        window.sessionStorage && ((f = sessionStorage.getItem("is_visited")) ? a("#" + f).prop("checked", !0) : sessionStorage.setItem("is_visited", "layout-ltr")),
        a("#password-addon").on("click", function () {
            0 < a(this).siblings("input").length && ("password" == a(this).siblings("input").attr("type") ? a(this).siblings("input").attr("type", "input") : a(this).siblings("input").attr("type", "password"));
        }),
        "null" != d && "en" !== d && h(d),
        a(".language").on("click", function (b) {
            h(a(this).attr("data-lang"));
        }),
        a(window).on("load", function () {
            a("#status").fadeOut(), a("#preloader").delay(350).fadeOut("slow");
        }),
        a(".right-bar-toggle").on("click", function (b) {
            a("body").toggleClass("right-bar-enabled");
        }),
        a(document).on("click", "body", function (b) {
            0 < a(b.target).closest(".right-bar-toggle, .right-bar").length || a("body").removeClass("right-bar-enabled");
        }),
        (b = document.getElementsByTagName("body")[0]).hasAttribute("data-layout") && "horizontal" == b.getAttribute("data-layout") ? (c("layout-horizontal"), a(".sidebar-setting").hide()) : c("layout-vertical"),
        b.hasAttribute("data-layout-mode") && "dark" == b.getAttribute("data-layout-mode") ? c("layout-mode-dark") : c("layout-mode-light"),
        b.hasAttribute("data-layout-size") && "boxed" == b.getAttribute("data-layout-size") ? c("layout-width-boxed") : c("layout-width-fuild"),
        b.hasAttribute("data-layout-scrollable") && "true" == b.getAttribute("data-layout-scrollable") ? c("layout-position-scrollable") : c("layout-position-fixed"),
        b.hasAttribute("data-topbar") && "dark" == b.getAttribute("data-topbar") ? c("topbar-color-dark") : c("topbar-color-light"),
        b.hasAttribute("data-sidebar-size") && "sm" == b.getAttribute("data-sidebar-size")
            ? c("sidebar-size-small")
            : b.hasAttribute("data-sidebar-size") && "md" == b.getAttribute("data-sidebar-size")
            ? c("sidebar-size-compact")
            : c("sidebar-size-default"),
        b.hasAttribute("data-sidebar") && "brand" == b.getAttribute("data-sidebar")
            ? c("sidebar-color-brand")
            : b.hasAttribute("data-sidebar") && "dark" == b.getAttribute("data-sidebar")
            ? c("sidebar-color-dark")
            : c("sidebar-color-light"),
        document.getElementsByTagName("html")[0].hasAttribute("dir") && "rtl" == document.getElementsByTagName("html")[0].getAttribute("dir") ? c("layout-direction-rtl") : c("layout-direction-ltr"),
        a("input[name='layout']").on("change", function () {
            window.location.href = "vertical" == a(this).val() ? "index.html" : "layouts-horizontal.html";
        }),
        a("input[name='layout-mode']").on("change", function () {
            "light" == a(this).val()
                ? (document.body.setAttribute("data-layout-mode", "light"),
                  document.body.setAttribute("data-topbar", "light"),
                  (b.hasAttribute("data-layout") && "horizontal" == b.getAttribute("data-layout")) || (document.body.setAttribute("data-sidebar", "dark"), c("sidebar-color-dark")))
                : (document.body.setAttribute("data-layout-mode", "dark"),
                  document.body.setAttribute("data-topbar", "dark"),
                  (b.hasAttribute("data-layout") && "horizontal" == b.getAttribute("data-layout")) || document.body.setAttribute("data-sidebar", "dark"));
        }),
        a("input[name='layout-direction']").on("change", function () {
            "ltr" == a(this).val()
                ? (document.getElementsByTagName("html")[0].removeAttribute("dir"),
                  document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap.min.css"),
                  document.getElementById("app-style").setAttribute("href", "assets/css/app.min.css"))
                : (document.getElementById("bootstrap-style").setAttribute("href", "assets/css/bootstrap-rtl.min.css"),
                  document.getElementById("app-style").setAttribute("href", "assets/css/app-rtl.min.css"),
                  document.getElementsByTagName("html")[0].setAttribute("dir", "rtl"));
        }),
        //Waves.init(),
        a("#checkAll").on("change", function () {
            a(".table-check .form-check-input").prop("checked", a(this).prop("checked"));
        }),
        a(".table-check .form-check-input").change(function () {
            a(".table-check .form-check-input:checked").length == a(".table-check .form-check-input").length ? a("#checkAll").prop("checked", !0) : a("#checkAll").prop("checked", !1);
        });

        if ($(".target_blank").length) {
            //alert();
            // $(".target_blank").css("background","black");

            //$('.target_blank').each(function(i, obj) {
                // alert();
                $(".target_blank").attr("target" , "_blank");
            //});
        }
})(jQuery);
