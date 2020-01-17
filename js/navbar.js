(function ($) {
    $(document).ready(function(){
        if ($(this).scrollTop() > 10) {
            $('header.tastyheader').slideDown(500);
        }
        $(document).ready(function() {
            //toggle menu
            $(".hamburger-container").click(function() {
                $("#menu").slideToggle();
            });

            //to fix issue that toggle adds style(hides) to nav
            $(window).resize(function() {
                if (window.innerWidth > 1024) {
                    $("#menu").removeAttr("style");
                }
            });

            //icon animation
            var topBar = $(".hamburger li:nth-child(1)"),
                middleBar = $(".hamburger li:nth-child(2)"),
                bottomBar = $(".hamburger li:nth-child(3)");

            $(".hamburger-container").on("click", function() {
                if (middleBar.hasClass("rot-45deg")) {
                    topBar.removeClass("rot45deg");
                    middleBar.removeClass("rot-45deg");
                    bottomBar.removeClass("hidden");
                } else {
                    bottomBar.addClass("hidden");
                    topBar.addClass("rot45deg");
                    middleBar.addClass("rot-45deg");
                }
            });
        });

        // fade in .navbar
        $(function () {
            $(window).scroll(function () {
                // set distance user needs to scroll before we start fadeIn
                if ($(this).scrollTop() > 10) {
                    $('header.tastyheader').slideDown(500);
                } else {
                    //todo: see if she wants to hide when you scroll all the way up
                    // $('header.tastyheader').slideUp(500)
                }
            });
        });

        $(function() {
            // https://css-tricks.com/reading-position-indicator/

            var getMax = function(){
                return $(document).height() - $(window).height();
            }

            var getValue = function(){
                return $(window).scrollTop();
            }

            if ('max' in document.createElement('progress')) {
                // Browser supports progress element
                var progressBar = $('progress');

                // Set the Max attr for the first time
                progressBar.attr({ max: getMax() });

                $(document).on('scroll', function(){
                    // On scroll only Value attr needs to be calculated
                    progressBar.attr({ value: getValue() });
                });

                $(window).resize(function(){
                    // On resize, both Max/Value attr needs to be calculated
                    progressBar.attr({ max: getMax(), value: getValue() });
                });

            } else {

                //this is for unsupported browsers - TODO: should we even do this...
                var progressBar = $('.progress-bar'),
                    max = getMax(),
                    value, width;

                var getWidth = function() {
                    // Calculate width in percentage
                    value = getValue();
                    width = (value/max) * 100;
                    width = width + '%';
                    return width;
                }

                var setWidth = function(){
                    progressBar.css({ width: getWidth() });
                }

                $(document).on('scroll', setWidth);
                $(window).on('resize', function(){
                    // Need to reset the Max attr
                    max = getMax();
                    setWidth();
                });
            }
        });

    });
}(jQuery));
