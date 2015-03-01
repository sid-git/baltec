(function ($) {

    "use strict";
    $(document).ready(function () {
        $('.post-block').parallax("10%", 0.1);
        $('.value').parallax("10%", 0.1);
        $('.testimonial').parallax("10%", 0.1);
        $(".section-header").fitText(1, { minFontSize: '20px', maxFontSize: '48px' });
        $(".section-intro").fitText(1, { minFontSize: '14px', maxFontSize: '20px' });

        $('.top-menu').onePageNav({
            scrollOffset: 50,
            currentClass: 'active',
            easing: 'easeInExpo',
            filter: ':not(.top-menu li a[href*="http://"])'
        });

        /* megafolio */
        var defLayout = 11;
        if(mega.layout) defLayout = mega.layout;
        var api = $('.megafolio-container').megafoliopro({
            filterChangeAnimation: "fade", // fade, rotate, scale, rotatescale, pagetop, pagebottom,pagemiddle
            filterChangeSpeed: 600, // Speed of Transition
            filterChangeRotate: 10, // If you ue scalerotate or rotate you can set the rotation (99 = random !!)
            filterChangeScale: 0.6, // Scale Animation Endparameter
            delay: 20,
            defaultWidth: 980,
            paddingHorizontal: 10,
            paddingVertical: 10,
            layoutarray: [defLayout] // Defines the Layout Types which can be used in the Gallery. 2-9 or "random". You can define more than one, like {5,2,6,4} where the first items will be orderd in layout 5, the next comming items in layout 2, the next comming items in layout 6 etc... You can use also simple {9} then all item ordered in Layout 9 type.

        });

        // THE FILTER FUNCTION
        $('.filter').click(function (e) {
            jQuery('.filter').each(function () {
                jQuery(this).removeClass("selected")
            });
            api.megafilter(jQuery(this).data('category'));
            jQuery(this).addClass("selected");
            e.preventDefault();
        });

        /*===Magnific Popup===*/

        $(".mega-entry-innerwrap").bind("click",function(){
            $(this).find("a.image-link").trigger('click');
        })
        $('.image-link').bind("click", function () {
            var desc = $(this).find(".img-desc").html().trim();
            var title = $(this).find(".img-title").html().trim();
            var url = $(this).find(".img-url").html().trim();
            var src = $(this).attr("href");

            $("#modal-title").html(title);
            if (url != "") {
                $("#modal-url").attr("href", url);
                $("#modal-url").show();

            }
            else
                $("#modal-url").hide();
            $("#modal-desc").html(desc);
            $("#modal-img").attr("src", src);
            $('#portfolioModal').modal('show');
            return false;
        });
        /* megafolio end */

        $("#sendmail").on("click", function () {
            var params = {
                "name": $("#ename").val(),
                "email": $("#eemail").val(),
                "subject": $("#esubject").val(),
                "message": $("#emessage").val(),
                "action": "sendmail"
            }
            $.post("/wp-admin/admin-ajax.php", params, function (data) {
                alert(data);
            })
            return false;
        });

//        $(window).bind("resize",function(){
//            navFix();
//        });


        $(document).on('appear', function () {
            "use strict";
            jQuery('.skillbar').each(function () {
                jQuery(this).find('.skillbar-bar').animate({
                    width: jQuery(this).attr('data-percent')
                }, 6000);
            });
        });

        $(".testimonial-list").owlCarousel({

            navigation: false, // Show next and prev buttons
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });

        jQuery('.da-thumbs > .mega-list').hoverdir();
        $('.mega-list').magnificPopup({
            delegate: '.portfolio-popup-link', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {
                enabled: true
            }
            // other options
        });


        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,

            fixedContentPos: false
        });


        // initialise plugin
        var example = $('#topnav').superfish({
            //add options here if required
        });


        /*Skill Details*/
        $(document).on('appear', '.a-one', function () {
            jQuery(this).each(function () {
                jQuery(this).delay(150).animate({
                    opacity: 1,
                    left: "0px"
                }, 300);
            });
        });
        $(document).on('appear', '.a-two', function () {
            jQuery(this).each(function () {
                jQuery(this).delay(400).animate({
                    opacity: 1,
                    left: "0px"
                }, 300);
            });
        });
        $(document).on('appear', '.a-three', function () {
            jQuery(this).each(function () {
                jQuery(this).delay(650).animate({
                    opacity: 1,
                    left: "0px"
                }, 300);
            });
        });
        $(document).on('appear', '.a-four', function () {
            jQuery(this).each(function () {
                jQuery(this).delay(850).animate({
                    opacity: 1,
                    left: "0px"
                }, 300);
            });
        });


        $.fn.animateNumbers = function (stop, commas, duration, ease) {
            return this.each(function () {
                var $this = $(this);
                var start = parseInt($this.text().replace(/,/g, ""));
                commas = (commas === undefined) ? true : commas;
                $({
                    value: start
                }).animate({
                        value: stop
                    }, {
                        duration: duration == undefined ? 500 : duration,
                        easing: ease == undefined ? "swing" : ease,
                        step: function () {
                            $this.text(Math.floor(this.value));
                            if (commas) {
                                $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                            }
                        },
                        complete: function () {
                            if (parseInt($this.text()) !== stop) {
                                $this.text(stop);
                                if (commas) {
                                    $this.text($this.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                                }
                            }
                        }
                    });
            });
        };


        $('.number-animate').appear();
        $(document.body).on('appear', '.numeric-count', function () {
            $('.number-animate').each(function () {
                $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-animation-duration")));
            });
        });
        // make code pretty
        window.prettyPrint && prettyPrint();

        $('#myTab a:last').tab('show');




        var $container = $('.portfolio-container'),
            colWidthP = function () {
                var w = $container.width(),
                    columnNum = 1,
                    columnWidth = 0;
                if (w > 1200) {
                    columnNum = 4;
                } else if (w > 900) {
                    columnNum = 4;
                } else if (w > 600) {
                    columnNum = 3;
                } else if (w > 300) {
                    columnNum = 1;
                }
                columnWidth = Math.floor(w / columnNum);
                $container.find('.item').each(function () {
                    var $item = $(this),
                        width = columnWidth - 20;
                    $item.css({
                        width: width
                    });
                });
                return columnWidth;
            },
            isotopep = function () {
                $container.isotope({
                    resizable: true,
                    itemSelector: '.item',
                    masonry: {
                        columnWidth: colWidthP()

                    }
                });
            };
        isotopep();

        $(window).smartresize(isotopep);
        $(window).load(isotopep);

        var $containerblog = $('.blog-container'),
            colWidth = function () {
                var w = $containerblog.width(),
                    columnNum = 1,
                    columnWidth = 0;
                if (w > 1200) {
                    columnNum = 3;
                } else if (w > 900) {
                    columnNum = 3;
                } else if (w > 600) {
                    columnNum = 2;
                } else if (w > 300) {
                    columnNum = 1;
                }
                columnWidth = Math.floor(w / columnNum);
                $containerblog.find('.item-blog').each(function () {
                    var $item = $(this),
                        width = columnWidth - 30;
                    $item.css({
                        width: width
                    });
                });
                return columnWidth;
            },
            isotopeblog = function () {
                $containerblog.isotope({
                    resizable: true,
                    itemSelector: '.item-blog',
                    masonry: {
                        columnWidth: colWidth()
                    }
                });
            };
        isotopeblog();

        $(window).smartresize(isotopeblog);
        $(window).load(isotopeblog);

        $('.portfolio-container').isotope({
            filter: '.item'
        });
        $('.portfolio-filter ul li a').click(function () {
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector
            });
            return false;
        });


        $(".team-list").owlCarousel({
            items: 3,
            navigation: true
        });


//        $('.portfolio-container').colio({
//            id: 'portfolio_list',
//            theme: 'portfolio-theme',
//            placement: 'before',
//            scrollOffset: 90,
//            navigation: false,
//            closeText: '<span class="co-section-close"><img src="'+wpdata.td+'/img/cross.jpg" alt="close"></span>', // text/html for close button
//            nextText: '<span class="co-section-next"><i class="ico-chevron-right"></i></span>', // text/html for next button
//            prevText: '<span class="co-section-prev"><i class="ico-chevron-left"></i></span>' // text/html for previous button
//
//        });


    });

    var ww = jQuery(window).width();

    /*==WOW JS==*/
    if (ww > 480) {
        var wow = new WOW({
            animateClass: 'animated',
            offset: 0
        });
        wow.init();
    }

})(jQuery);


<!-- TOUCH FRIENDLY IN MOBILE DEVICES -->
document.addEventListener("touchstart", function () {
}, true);


function navFix(){
    "use strict";
    var $ = jQuery;
    $(window).unbind("scroll");
    $("#home").unbind("mousemove");
    var ww = $(window).width();
    if (ww > 768) {
        $(window).bind("scroll", function () {
            var sp = $(window).scrollTop();
            if (sp > 400) $("#top-bar").css("opacity", 1);
            if (sp < 400) $("#top-bar").css("opacity", 0);
        });


        $("#home").bind("mousemove", function (e) {
            var mvp = e.pageY;
            var sp = $(window).scrollTop();
            if (mvp < 300)
                $("#top-bar").css("opacity", 1);
            else {
                if (sp < 400)
                    $("#top-bar").css("opacity", 0);
            }

        });
    }else{
        $("#top-bar").css("opacity", 1);
    }
}