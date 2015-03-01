<?php
/**
 * @todo: Display standard image if no featured thumbnail
 */
global $themebucket_firebrick;
$teammembers = firebrick_get_custom_posts_by_custom_order("teammember", 20, "_firebrick_team_order");
?>
<?php if ($themebucket_firebrick['section_team_display']) { ?>
    <section id="team" class="team">
        <h2 class="section-header wow bounceIn"><?php if (isset($themebucket_firebrick['section_team_title'])) echo $themebucket_firebrick['section_team_title']; ?></h2>

        <p class="section-intro wow fadeInUp">
            <?php if (isset($themebucket_firebrick['section_team_subtitle'])) echo $themebucket_firebrick['section_team_subtitle']; ?>
        </p>

        <div class="container">
            <div class="row team-list">
                <?php
                foreach ($teammembers as $post) {
                    setup_postdata($post);
                    $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID));
                    ?>
                    <div>
                        <div class="team-member">
                            <div class="team-member-thumb">
                                <img src="<?php if (isset($attachment[0])) echo $attachment[0]; ?>" alt="team member"
                                     class="img-circle">
                            </div>
                            <div class="team-member-info">
                                <div class="team-member-name">
                                    <?php the_title(); ?>
                                </div>
                                <ul class="member-social-link">
                                    <?php
                                    $meta = get_post_meta($post->ID);
                                    for ($i = 1; $i < 4; $i++) {
                                        ?>
                                        <li><a href="<?php echo $meta["_firebrick_social_url_{$i}"][0]; ?>"><i
                                                    class="fa <?php echo $meta["_firebrick_social_icon_{$i}"][0]; ?>"></i></a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                                <?php the_content(); ?>
                                <?php
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php if (isset($themebucket_firebrick['section_team_counter_display']) && $themebucket_firebrick['section_team_counter_display'] == 1) { ?>
        <div class="numeric-factor" style="background-color: <?php echo $themebucket_firebrick['section_team_counter_bgcolor'];?>">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="numeric-factor-header">
                            <?php if(isset($themebucket_firebrick['section_team_counter_header'])) echo $themebucket_firebrick['section_team_counter_header'];?>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <?php if (isset($themebucket_firebrick['section_team_counters']) && count($themebucket_firebrick['section_team_counters']) > 0) {
                        $i = 0;
                        foreach ($themebucket_firebrick['section_team_counters'] as $counter) {
                            $cparts = explode(",", $counter);
                            if (count($cparts) > 1) {
                                $i++;
                                ?>
                                <div class="col-md-4">
                        <span class="numeric-count number-animate" data-value="<?php echo $cparts[0]; ?>"
                              data-animation-duration="1500">0</span>
                                    <span class="factor-title"><?php echo $cparts[1]; ?></span>
                                </div>
                            <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>