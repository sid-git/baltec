<?php

/**

 * The Header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="content">

 *

 * @package firebrick

 */

?>

<?php

global $themebucket_firebrick;

?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<script src="//use.typekit.net/lbg6atv.js"></script>

<script>try{Typekit.load();}catch(e){}</script>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

    <style type="text/css">

        <?php

            global $themebucket_firebrick;

            switch($themebucket_firebrick['firebrick_color']){

                case 1: //blue

                    $themebucket_firebrick_color = "#5bc7f6";

                    break;

                case 2: //green

                    $themebucket_firebrick_color = "#9cba30";

                    break;

                case 3: //navy

                    $themebucket_firebrick_color = "#7290ce";

                    break;

                case 4: //purple

                    $themebucket_firebrick_color = "#a48ad4";

                    break;

                case 5: //red

                    $themebucket_firebrick_color = "#fc6f5c";

                    break;

                case 6: //turquoise

                    $themebucket_firebrick_color = "#53bdbd";

                    break;

                case 7: //turquoise

                    $themebucket_firebrick_color = $themebucket_firebrick['firebrick_custom_color'];

                    break;

                default:

                    $themebucket_firebrick_color = "#5bc7f6";

                    break;

            }

        ?>

        .logo a span, .most-popular .pricing-head .p-title, .top-menu > li > a:hover, .top-menu li.active > a, .skill-lists li:hover > h3, .team-member:hover .team-member-info .team-member-name, .member-social-link li a:hover, .member-social-link li a:active, .member-social-link li a:focus, .testimonial-meta, .about-block .intro-icon, .testimonial-meta, .news-section h3 a:hover, .news-section h3 a:focus, .contact-form h3, .contact-address h3, .numeric-count, .post-content-meta ul li a, .read-more:hover, .read-more:focus, .comments-list li a:hover, .comments-list li a:focus, .category-list li a:hover, .comments-list li a:focus, .archieve-list li a:hover, .comments-list li a:focus, .filter:hover, .filter.selected, .post h3 a:hover, .service-icon i, .service-block:hover > .service-intro h4, .service-block:hover > .service-intro h4 a, .service-intro h4 a {

            color: <?php echo $themebucket_firebrick_color;?> !important;

        }



        .owl-theme .owl-controls.clickable .owl-buttons div:hover, .btn-view-all:hover, .member-skill .progress-bar, .btn-section:hover, .most-popular .price-actions .btn, .most-popular .pricing-head .p-value, .post-container, .about-block a:hover, .skill-lists li:hover > .skill-icon, .skillbar-bar, .btn-send:hover, .post blockquote, .post-meta ul li a:hover, .btn-search, div.jp-volume-bar-value, .sf-menu ul li a:hover, .gear-settings {

            background-color: <?php echo $themebucket_firebrick_color;?> !important;

        }



        .pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus, .pagination > li > a.active {

            background-color: <?php echo $themebucket_firebrick_color;?> !important;

            border: 1px solid <?php echo $themebucket_firebrick_color;?> !important;

            color: #FFFFFF !important;

        }



        .footer .widget .widget-title, .widget_rss ul li a, .footer .widget_rss ul li a {

            color: <?php echo $themebucket_firebrick_color;?>;

        }

    </style>

    <style type="text/css">

        .post-block {

            background:  <?php if ( isset($themebucket_firebrick['section_news_bg_color']) ) echo $themebucket_firebrick['section_news_bg_color']; ?>  <?php if ( isset($themebucket_firebrick['section_news_bg']) ) : ?> url(<?php echo $themebucket_firebrick['section_news_bg']['url'] ?>) <?php endif; ?> no-repeat fixed 0 0;

            background-size: cover !important;

        }

        .value {

            background:  <?php if ( isset($themebucket_firebrick['parallax_bg_color']) ) echo $themebucket_firebrick['parallax_bg_color']; ?>  <?php if ( isset($themebucket_firebrick['parallax_bg']) ) : ?> url(<?php echo $themebucket_firebrick['parallax_bg']['url'] ?>) <?php endif; ?> no-repeat fixed 0 0;

            background-size: cover !important;

        }

        .testimonial {

            background:  <?php if ( isset($themebucket_firebrick['section_testimonial_bg_color']) ) echo $themebucket_firebrick['section_testimonial_bg_color']; ?>  <?php if ( isset($themebucket_firebrick['section_testimonial_bg']) ) : ?> url(<?php echo $themebucket_firebrick['section_testimonial_bg']['url'] ?>) <?php endif; ?> no-repeat fixed 0 0;

            background-size: cover !important;

        }



        .post-block .section-header,.post-block .section-intro, .post-block h3 a,.post-block p{

            color:  <?php if ( isset($themebucket_firebrick['section_news_text_color']) ) echo $themebucket_firebrick['section_news_text_color']; ?>

        }



        .testimonial .section-header,.testimonial .section-intro, .testimonial h3 a,.testimonial p, testimonial-meta{

            color:  <?php if ( isset($themebucket_firebrick['section_testimonial_text_color']) ) echo $themebucket_firebrick['section_testimonial_text_color']; ?>

        }

    </style>

    <?php

    if (isset($themebucket_firebrick['custom_css'])) echo $themebucket_firebrick['custom_css'];

    if (isset($themebucket_firebrick['custom_ga'])) echo $themebucket_firebrick['custom_ga'];

    ?>

</head>



<body class="royal_loader">

<div class="page-container">

    <nav id="top-bar" class="main clearfix">

        <div class="container mobile-no-pad">

            <div class="row">

                <div class="col-md-3 col-sm-3">

                    <button class="navbar-toggle responsive-toggle" type="button" data-toggle="collapse"

                            data-target=".bs-js-navbar-collapse">

                        <span class="sr-only">Toggle navigation</span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                        <span class="icon-bar"></span>

                    </button>

                    <div class="logo">

                        <a href="<?php echo site_url(); ?>" title=""><img

                                src="<?php echo $themebucket_firebrick['section_header_nav_logo']['url']; ?>"

                                alt=""></a>

                    </div>

                </div>

                <div class="col-md-7 col-sm-9">

                    <?php if (!has_nav_menu("primary")) {

                        ; ?>

                        <div class="navigation collapse navbar-collapse bs-js-navbar-collapse clearfix">

                            <ul id="topnav" class="sf-menu top-menu ">

                                <!--<li class="active"><a href="#home" title="Home">Home</a></li>-->

                                <?php

                                $sections = $themebucket_firebrick['firebrick_sections_order'];

                                if (!is_array($sections)) {

                                    $sections = firebrick_get_enabled_sections();

                                }

                                if (empty($sections)) {

                                    $sections = firebrick_get_all_sections();

                                }

								

                   

                                $section_ids = array(

                                    "section_abtme" => "#about",

                                    "section_blog" => "#blog",

                                    "section_contact" => "#contact",

                                    "section_team" => "#team",

                                    "section_services" => "#services",

                                    "section_portfolio" => "#portfolio",

                                    "section_pricing" => "#pricing",

                                    "section_testimonial" => "#testimonial",

                                    "section_news" => "#news"

                                );

                                foreach ($sections as $section => $name) {

                                    $ssection = str_replace("section-", "section_", $section);

                                    if($ssection=="section_services")

                                        $menu_key = "section_service_menu_text";

                                    else

                                        $menu_key = "{$ssection}_menu_text";

                                    if ($ssection !== "section_parallax") {

                                        $section_id = $section_ids[$ssection];

                                        ?>

                                        <?php if ($themebucket_firebrick["{$ssection}_display_menu"]) { ?>

                                            <li>

                                                <a href="<?php echo $section_id; ?>"><?php echo $themebucket_firebrick[$menu_key]; ?></a>

                                            </li>

                                        <?php

                                        }

                                    }

                                }

                                ?>
                                <li>

                                    <a href="#career">Career</a>

                                </li>
                                

                            </ul>

                        </div>

                    <?php } else { ?>

                        <div class="navigation collapse navbar-collapse bs-js-navbar-collapse clearfix"

                             id="smoothmenu1">

                            <?php

                            $defaults = array(

                                'theme_location' => 'primary',

                                'menu' => 'Primary Menu',

                                'container' => "div",

                                'container_class' => 'sf-menu top-menu pull-right',

                                'container_id' => false,

                                'menu_class' => 'sf-menu top-menu pull-right',

                                'menu_id' => false,

                                'echo' => false,

                                'fallback_cb' => 'wp_page_menu',

                                'before' => '',

                                'after' => '',

                                'link_before' => '',

                                'link_after' => '',

                                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                                'depth' => 0,

                                'walker' => '',

                                'exclude' => "'" . get_option("ticket_page_id") . "," . get_option("product_page_id") . "," . get_option("registration_page_id") . "," . get_option("signin_page_id") . "," . get_option("purchase_verification_page") . "," . get_option("user_all_ticket") . "," . get_option("user_open_ticket") . "," . get_option("user_closed_ticket") . "," . get_option("user_notifications") . "," . get_option("knowledgebase_home") . "," . get_option("knowledgebase_listings") . "," . get_option("landing_page") . "," . get_option("home_page_id") . "'"

                            );



                            $menu = wp_nav_menu($defaults);

                            $menu = str_replace('<div class="sf-menu top-menu pull-right">', "", $menu);

                            $menu = str_replace('<div class="sf-menu top-menu pull-right">', "", $menu);

                            $menu = str_replace("</div>", "", $menu);

                            $menu = str_replace("<ul>", '<ul class="sf-menu top-menu pull-right">', $menu);

                            echo $menu;



                            ?>

                        </div>

                    <?php } ?>



                    

                </div>

                <div class="top-info">

                        <a class="linkedin" target="blank" href="https://www.linkedin.com/company/baltec-inlet-&-exhaust-systems">linkedin</a>

                        <span>+61 3 9763 6711</span>

                        <span class="email"><a href="matilto:info@baltecies.com.au">info@baltecies.com.au</a></span>

                        

                    </div>

            </div>

        </div>

    </nav>

    <?php if ($themebucket_firebrick['section_header_standard_display']) { ?>

        <section id="home" class="start">

            <div id="slides">

                <?php if (isset($themebucket_firebrick['section_rev_slider'])) putRevSlider($themebucket_firebrick['section_rev_slider']) ?>

            </div>

        </section>

    <?php } ?>



