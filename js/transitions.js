(function ($) {

    $.fn.isInViewport = function() {
        var rect = $(this)[0].getBoundingClientRect();

        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && /*or $(window).height() */
            rect.right <= (window.innerWidth || document.documentElement.clientWidth) /*or $(window).width() */
        );
    };


    $(document).ready(function(){

        $(function () {
            const TOP_POS = 100;

            $(window).on('resize scroll', function() {
                $('*[class*="shift-in-"]').each(function(i, el) {
                    var el = $(el);
                    var className = this.className.match(/shift-in-\d+/);
                    if (className && className.length > 0) {
                        if (el.isInViewport()) {
                            let animationSpeed = className[0].substring(className[0].lastIndexOf('-'));
                            el.addClass('shift-animate' + animationSpeed);
                        }
                    }
                });

                //target all columns of slide-in parent
                $('*[class*="slide-in"]').each(function(i, el) {
                    var el = $(el);
                    var className = this.className.match(/slide-in-\d+/);
                    if (className && className.length > 0) {
                        if (el.isInViewport()) {
                            let animationSpeed = className[0].substring(className[0].lastIndexOf('-'));
                            el.addClass('slide-animate' + animationSpeed);
                        }
                    }
                });
            });

            $(window).scroll(function () {
                var element = $('.fixed-bg div.text-wrapper div.main-text');
                var topoff = element.offset().top;
                var topPos = element.position().top;
                // console.log('top pos', topoff);
                // console.log('top pos', topPos);
                if ($(window).scrollTop() > 100) {
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
