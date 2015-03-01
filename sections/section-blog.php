<?php
global $themebucket_firebrick;
$posts = firebrick_get_custom_posts("post", 3);
?>
<?php if ($themebucket_firebrick['section_blog_display']) { ?>
    <!--section works start-->
    <section id="blog" class="blog-section">
        <div class="container">
            <h2 class="section-header wow bounceIn"><?php if (isset($themebucket_firebrick['section_blog_title'])) echo $themebucket_firebrick['section_blog_title']; ?></h2>

            <p class="section-intro wow fadeInUp">
                <?php if (isset($themebucket_firebrick['section_blog_subtitle'])) echo $themebucket_firebrick['section_blog_subtitle']; ?>
            </p>

            <div class="blog-container">
                <?php
                $i = 0;
                foreach ($posts as $post) {
                    setup_postdata($post);
                    $meta = get_post_meta($post->ID);
                    $i++;
                    ?>
                    <div class="item-blog">
                        <div class="post-content">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="post-img">
                                    <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail("home-blog-thumb"); ?></a>
                                </div>
                            <?php } ?>
                            <div class="blog-post">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

                                <div class="post-meta">
                                    By <?php the_author(); ?>, <?php the_date(); ?>
                                </div>

                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12 btn-load">
                    <a href="<?php echo firebrick_get_blog_link(); ?>" class="btn btn-details btn-section">View All
                        Posts</a>
                </div>
            </div>
        </div>
    </section>
    <!--section works end-->
<?php } ?>