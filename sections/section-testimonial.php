<?php
global $themebucket_firebrick;
$testimonials = firebrick_get_custom_posts("testimonial");
?>
<?php if ($themebucket_firebrick['section_testimonial_display']) { ?>
    <!--section testimonial start-->
    <section id="testimonial">
        <div class="testimonial" >
            <div class="container">
                <div class="testimonial-header">
                    <h2 class="section-header wow bounceIn"><?php if (isset($themebucket_firebrick['section_testimonial_title'])) echo $themebucket_firebrick['section_testimonial_title']; ?></h2>

                    <p class="section-intro wow fadeInUp">
                        <?php if (isset($themebucket_firebrick['section_testimonial_subtitle'])) echo $themebucket_firebrick['section_testimonial_subtitle']; ?>
                    </p>
                </div>
                <div class="testimonial-list">
                    <?php
                    $i = 0;
                    foreach ($testimonials as $post) {
                        setup_postdata($post);
                        $meta = get_post_meta($post->ID);
                        $i++;
                        ?>
                        <div class="testimonial-wrap clearfix">
                            <div class="thumb">
                                <img src="<?php echo $meta['_firebrick_test_image'][0]; ?>" alt="<?php echo $meta['_firebrick_test_name'][0]; ?>"
                                     class="img-circle">
                            </div>
                            <div class="testimonial-text">
                                <?php if (isset($meta['_firebrick_test_description'][0])) echo wpautop($meta['_firebrick_test_description'][0]); ?>
                                <span class="testimonial-meta"><?php if (isset($meta['_firebrick_test_name'][0])) echo $meta['_firebrick_test_name'][0]; ?> - <span><?php if (isset($meta['_firebrick_test_designation'][0])) echo $meta['_firebrick_test_designation'][0]; ?></span></span>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>


        <!--section testimonial end-->
        <?php if ($themebucket_firebrick['section_testimonial_clients_display']) { ?>
            <div class="clients">
                <?php
                if (isset($themebucket_firebrick['section_testimonial_clients']) && trim($themebucket_firebrick['section_testimonial_clients']) != "") {
                    $cimages = explode(",", trim($themebucket_firebrick['section_testimonial_clients']));
                    if (count($cimages) > 0) {
                        ?>
                        <ul class="clients-list clearfix">
                            <?php
                            foreach ($cimages as $aid) {
                                $logo = wp_get_attachment_image_src($aid, "client-logo");
                                ?>
                                <li>
                                    <img src="<?php echo $logo[0]; ?> "
                                         alt="client">
                                </li>
                            <?php } ?>
                        </ul>
                    <?php
                    }
                }
                ?>
            </div>
        <?php } ?>
    </section>
<?php } ?>