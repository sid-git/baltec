<?php
/**
 * The Template for displaying all single posts.
 *
 * @package firebrick
 */
?>
<?php get_header(); ?>
<?php
global $themebucket_firebrick, $post;
setup_postdata($post);
?>
    <nav id="top-bar" class="main clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <button class="navbar-toggle responsive-toggle" type="button" data-toggle="collapse" data-target=".bs-js-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a href="<?php echo site_url();?>" title="WordPress"><img src="<?php echo $themebucket_firebrick['section_header_nav_logo']['url']; ?>" alt="WordPress"></a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-9">
                    <div class="navigation collapse navbar-collapse bs-js-navbar-collapse clearfix" id="smoothmenu1" style="visibility:hidden">
                        <?php
                        $defaults = array(
                            'theme_location' => 'secondary',
                            'menu' => 'Blog Menu',
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
                </div>
                <div class="top-info">

                        <a class="linkedin" href="https://www.linkedin.com/company/baltec-inlet-&-exhaust-systems">linkedin</a>

                        <span>+61 3 9763 6711</span>

                        <span class="email"><a href="matilto:info@baltecies.com.au">info@baltecies.com.au</a></span>

                        

                    </div>
                
                
            </div>
        </div>
    </nav>
    <!--<section class="inner-page-header feature-header overlay-section">
        <div class="overlay-div">
        </div>
        <div class=" container">
            <h2 class="inner-page-title"><?php echo get_bloginfo("title"); ?></h2>
            <h2 class="section-subheading"><?php echo get_bloginfo("description"); ?></h2>

        </div>
    </section>-->

    <div class="blog-section">
        <div class="container">
            <div class="row blog">
                <div class="col-md-8">
                    <?php
                    while (have_posts()) {
                        the_post();

                        ?>
                        <div class="panel">
                            <div class="panel-body">
                                <h1 class="text-center mtop35"><a
                                        href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>

                                <p class="text-center auth-row">
                                    By <?php the_author(); ?> | <?php the_date(); ?> | <a
                                        href="<?php echo get_permalink(); ?>"><?php echo get_comments_number(); ?>
                                        Comment</a>
                                </p>

                                <div class="blog-img-wide">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <?php if (!is_single() && !is_page()) { ?>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php echo get_permalink(); ?>" class="more">Continue Reading</a>
                                <?php } else { ?>
                                    <?php the_content(); ?>
                                    <?php
                                    $defaults = array(
                                        'before'           => '<p>' . __( 'Pages:','firebrick' ),
                                        'after'            => '</p>',
                                        'link_before'      => '',
                                        'link_after'       => '',
                                        'next_or_number'   => 'number',
                                        'separator'        => ' ',
                                        'nextpagelink'     => __( 'Next page','firebrick' ),
                                        'previouspagelink' => __( 'Previous page','firebrick' ),
                                        'pagelink'         => '%',
                                        'echo'             => 1
                                    );
                                    wp_link_pages($defaults);
                                    ?>
                                    <div class="blog-tags">
                                        TAGS
                                        <?php echo get_the_tag_list("", "", "");; ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                    <?php } ?>
                    
                    <div class="text-center">
                        <ul class="pagination">
                            <?php
                            global $wp_query;

                            $big = 999999999; // need an unlikely integer

                            $links = paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, get_query_var('paged')),
                                'total' => $wp_query->max_num_pages,
                                'type' => 'array',
                                'prev_next' => true,
                                'prev_text' => '<i class="fa fa-angle-left"></i>',
                                "next_text" => '<i class="fa fa-angle-right"></i>',
                                'mid_size' => 3
                            ));
                            //print_r($links);
                            if ($links) {
                                foreach ($links as $link) {
                                    if (strpos($link, "current") !== false)
                                        echo '<li class="active"><a>' . $link . "</a></li>\n";
                                    else
                                        echo '<li>' . $link . "</li>\n";

                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if(!dynamic_sidebar("sidebar-1")){?>
                        <div class="panel">
                            <div class="panel-body">
                                <form action="<?php echo site_url(); ?>" method="GET"><input type="text" name="s"
                                                                                             placeholder="Search Blog"
                                                                                             class="form-control blog-search">
                                    <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                <div class="blog-post">
                                    <h3>Latest Blog Post</h3>

                                    <?php
                                    $posts = firebrick_get_custom_posts("post", 3);
                                    if ($posts) {
                                        foreach ($posts as $p) {

                                            ?>
                                            <div class="media">
                                                <a href="javascript:;" class="pull-left">
                                                    <?php if (get_the_post_thumbnail($p->ID, "blog-sidebar")) echo get_the_post_thumbnail($p->ID, "blog-sidebar"); else echo "<img width=81 height=81 src='" . get_template_directory_uri() . "/img/no_thumb.jpg'/>"; ?>
                                                </a>

                                                <div class="media-body">
                                                    <h5 class="media-heading"><a
                                                            href="<?php echo $p->guid; ?>"><?php echo $p->post_name; //echo date("d M, y" , strtotime($p->post_date));?></a>
                                                    </h5>

                                                    <?php
                                                    echo firebrick_truncate(strip_tags($p->post_content), 60, " ");
                                                    ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel">
                            <div class="panel-body">
                                <div class="blog-post">
                                    <h3>category</h3>
                                    <ul>
                                    <?php wp_list_categories(array("title_li" => "", "hierarchical" => false, "depth" => 0)); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                <div class="blog-post">
                                    <h3>blog archive</h3>
                                    <ul>
                                    <?php wp_get_archives(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php // get_template_part("blog", "footer"); ?>
<?php get_footer(); ?>