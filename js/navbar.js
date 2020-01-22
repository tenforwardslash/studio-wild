(function ($) {
    $(document).ready(function(){
        if ($(this).scrollTop() > 10) {
            $('header.tastyheader').slideDown(500);
        }
        $(document).ready(function() {
            //toggle menu
            $('#menu-btn').click(function(){
                $('.navicon').toggleClass('close');
                $('header.sw-header').toggleClass('mobile-opened');
                $('progress#progressBar').toggle();
            })
        });

        // fade in .navbar
        $(function () {
            $(window).scroll(function () {
                // set distance user needs to scroll before we start fadeIn
                if ($(this).scrollTop() > 10) {
                    $('header.tastyheader').slideDown(500);
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
