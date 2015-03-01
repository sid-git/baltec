<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package firebrick
 */
?>
<style>
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
    .logo a span, .most-popular .pricing-head .p-title, .top-menu>li>a:hover,.top-menu li.active>a,.skill-lists li:hover>h3,.team-member:hover .team-member-info .team-member-name,.member-social-link li a:hover,.member-social-link li a:active,.member-social-link li a:focus,.testimonial-meta,.about-block .intro-icon,.testimonial-meta,.news-section h3 a:hover,.news-section h3 a:focus,.contact-form h3,.contact-address h3,.numeric-count,.post-content-meta ul li a,.read-more:hover,.read-more:focus,.comments-list li a:hover,.comments-list li a:focus,.category-list li a:hover,.comments-list li a:focus,.archieve-list li a:hover,.comments-list li a:focus,.filter:hover,.filter.selected,.post h3 a:hover,.service-icon i,.service-block:hover>.service-intro h4, .service-block:hover>.service-intro h4 a,.service-intro h4 a,  .blog h1 a:hover, .blog h1 a:focus, .auth-row a:hover, .auth-row a:hover, .tag-social ul li a:hover, .blog-cmnt .media-heading a:hover, .blog-tags a:hover, .blog .pagination > li.active > a, .blog .pagination > li > a:hover, .blog .pagination > li.active > a:hover {
        color:<?php echo $themebucket_firebrick_color;?> !important;
    }
    .owl-theme .owl-controls.clickable .owl-buttons div:hover,.btn-view-all:hover,.member-skill .progress-bar, .btn-section:hover, .most-popular .price-actions .btn, .most-popular .pricing-head .p-value, .post-container,.about-block a:hover,.skill-lists li:hover>.skill-icon,.skillbar-bar,.btn-send:hover,.post blockquote,.post-meta ul li a:hover,.btn-search,div.jp-volume-bar-value,.sf-menu ul li a:hover,.gear-settings {
        background-color:<?php echo $themebucket_firebrick_color;?> !important;
    }
    .form-submit input#submit, .pagination>li>a:hover,.pagination>li>span:hover,.pagination>li>a:focus,.pagination>li>span:focus,.pagination>li>a.active {
        background-color:<?php echo $themebucket_firebrick_color;?> !important;
        border:1px solid <?php echo $themebucket_firebrick_color;?> !important;
        color: #FFFFFF !important;
    }
    .footer .widget .widget-title, .widget_rss ul li a, .footer .widget_rss ul li a {
        color: <?php echo $themebucket_firebrick_color;?>;
    }


    .feature-header {
        background:  <?php if ( isset($themebucket_firebrick['section_blog_bg_color']) ) echo $themebucket_firebrick['section_blog_bg_color']; ?>  <?php if ( isset($themebucket_firebrick['section_blog_bg']['url']) ) : ?> url(<?php echo $themebucket_firebrick['section_blog_bg']['url'] ?>) <?php endif; ?> !important;

    }

    .inner-page-title {
        color: <?php if ( isset($themebucket_firebrick['section_blog_text_color'])) echo $themebucket_firebrick['section_blog_text_color']; else echo "#ffffff";?>
    }

    h2.section-subheading {
        color: <?php if ( isset($themebucket_firebrick['section_blog_text_color'])) echo $themebucket_firebrick['section_blog_text_color']; else echo "#ffffff";?>
    }

</style>
<?php wp_footer(); ?>
</body>
</html>