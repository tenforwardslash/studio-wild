(function ($) {
    $(document).ready(function(){
        if ($(this).scrollTop() > 10) {
            $('div.logo-image img').hide();
        }

        // fade in .navbar
        $(function () {
            $(window).scroll(function () {
                // set distance user needs to scroll before we start fadeIn
                if ($(this).scrollTop() > 10) {
                    $('div.logo-image img').slideUp()
                }
            });
        });

    });
}(jQuery));
