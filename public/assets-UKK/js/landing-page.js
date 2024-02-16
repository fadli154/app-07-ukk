$(document).ready(function () {
    /*----- Navbar Shrink -----*/
    $(".navbar-toggler").on("click", function () {
        $(".navbar").addClass("navbar-shrink").removeClass("bg-transparent");
    });

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 50) {
            $(".navbar")
                .addClass("navbar-shrink")
                .removeClass("bg-transparent");
        } else if ($(this).scrollTop() <= 50) {
            $(".navbar")
                .removeClass("navbar-shrink")
                .addClass("bg-transparent");
        }
    });
});
