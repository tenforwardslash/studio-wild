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
        var animationName = animationType + "-in-";

        $('*[class*="' + animationName + '"]').each(function(i, el) {
            var el = $(el);
            var className = el.attr('class').match(animationName + "\\d");
            if (className && className.length > 0) {
                if (el.isInViewport()) {
                    let animationSpeed = className[0].substring(className[0].lastIndexOf('-'));
                    el.addClass(animationType + '-animate' + animationSpeed);
                }
            }
        });
    }

    var testMobile;
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };
    var parallax = function() {
        testMobile = isMobile.any();
        if (testMobile == null) {
            console.log('jcalling parallax function');
            $(".parallax").parallax("40%", 0.3);
        }
    };

    $(document).ready(function(){

        $(function () {
            //todo: this is terrible - jquery parallax super laggy. HAVE to do css parallax
            parallax();

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
