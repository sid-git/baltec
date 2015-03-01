(function ($) {
    "use strict";
    $(document).ready(function () {
        $(function () {
            $('.top-nav').superfish();
            /*==Syntax Higlighter ===*/
            window.prettyPrint && prettyPrint();

        });

    });

})(jQuery);

/*==WOW JS==*/
wow = new WOW({
    animateClass: 'animated',
    offset: 0
});
wow.init();