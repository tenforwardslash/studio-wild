(function ($) {

    $.fn.isInViewport = function() {
        //from here: https://stackoverflow.com/a/7557433
        var rect = $(this)[0].getBoundingClientRect();

        return (
            Math.round(rect.top) >= 0 &&
            Math.round(rect.left) >= 0 &&
            Math.round(rect.bottom) <= $(window).height() &&
            Math.round(rect.right) <= $(window).width()
        );
    };


    function checkAnimations(animationType) {
        var animationName = "sw-" + animationType + "-";

        $('*[class*="' + animationName + '"]').each(function(i, el) {
            var el = $(el);
            var className = el.attr('class').match(animationName + "\\d");
            if (className && className.length > 0) {
                if (el.isInViewport()) {
                    let animationSpeed = className[0].substring(className[0].lastIndexOf('-'));
                    el.addClass(animationName + 'animate' + animationSpeed);
                }
            }
        });
    }

    $(document).ready(function() {
        // initialize the parallax lib
        var rellax = new Rellax('.parallax', {
            center: true,
            speed: -3
        });

        $(function () {
            //animate if animated elements are visible in viewport
            checkAnimations('shift');
            checkAnimations('slide');

            $(window).on('resize scroll', function() {
                //animate if animated elements appear in viewport
                checkAnimations('shift');
                checkAnimations('slide');
            });
        });
    });
}(jQuery));
