(function ($) {

    $.fn.isInViewport = function() {
        //from here: https://stackoverflow.com/a/7557433
        var rect = $(this)[0].getBoundingClientRect();

        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
            rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
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

    $(document).ready(function(){

        $(function () {
            const TOP_POS = 100;

            //animate if animated elements are visible in viewport
            checkAnimations('shift');
            checkAnimations('slide');

            $(window).on('resize scroll', function() {
                //animate if animated elements appear in viewport
                checkAnimations('shift');
                checkAnimations('slide');
            });

            $(window).scroll(function () {
                var element = $('.fixed-bg div.text-wrapper div.main-text');
                // var topoff = element.offset().top;
                // var topPos = element.position().top;
                // console.log('top pos', topoff);
                // console.log('top pos', topPos);
                if ($(window).scrollTop() > 100 && element && element.length > 0) {
                    $('.fixed-bg div.text-wrapper div.main-text').css({
                        position: 'relative',
                        top: TOP_POS
                    });
                } else {
                    $('.fixed-bg div.text-wrapper div.main-text').css({
                        position: 'fixed',
                        top: 'auto'
                    });
                }
            });
        });
    });
}(jQuery));
