(function ($) {
    $(document).ready(function(){
        if ($(this).scrollTop() > 10) {
            $('header.tastyheader').slideDown(500);
        }
        // fade in .navbar
        $(function () {
            $(window).scroll(function () {

                // set distance user needs to scroll before we start fadeIn
                if ($(this).scrollTop() > 10) {
                    $('header.tastyheader').slideDown(500);
                } else {
                    //todo: see if she wants to hide when you scroll all the way up
                    $('header.tastyheader').slideUp(500)
                }
            });
        });

    });
}(jQuery));
