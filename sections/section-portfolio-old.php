<?php
global $themebucket_firebrick;
?>
<?php
if ($themebucket_firebrick['section_portfolio_display'] && isset($themebucket_firebrick['section_portfolio_gallery'])) {
    $portfolio_post = $themebucket_firebrick['section_portfolio_gallery'];
    $tags = array();
    $attachments = new Attachments('firebrick_portfolio', $portfolio_post);
    if ($attachments->exist()) {
        while ($attachment = $attachments->get()) {
            $_tag = str_replace(", ", ",", $attachments->field("tags"));
            $atags = explode(",", $_tag);
            $tags = array_unique(array_merge($tags, $atags));
        }
    }
    ?>

    <!--section portfolio start-->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <h2 class="section-header wow bounceIn"><?php if (isset($themebucket_firebrick['section_portfolio_title'])) echo $themebucket_firebrick['section_portfolio_title']; ?></h2>

            <p class="section-intro wow fadeInUp">
                <?php if (isset($themebucket_firebrick['section_portfolio_subtitle'])) echo $themebucket_firebrick['section_portfolio_subtitle']; ?>
            </p>
            <!-- THE FILTER STYLED FOR MEGAFOLIO -->
            <div class=" tags portfolio-filter filter-nav">
                <ul>
                    <li class="filter selected" data-category="cat-all"><?php _e("ALL", "resumi"); ?></li>
                    <?php
                    foreach ($tags as $tag) {
                        if (trim($tag) != "")
                            echo "<li class='filter' data-category='{$tag}'>{$tag}</li>";
                    }
                    ?>

                </ul>
            </div>

            <div class="clear">
            </div>
            <?php
            $attachments = new Attachments('firebrick_portfolio', $portfolio_post);
            if ($attachments->exist()) {
                ?>
                <!-- The GRID System -->
                <div class="megafolio-container light-bg-entries">
                    <?php
                    while ($attachment = $attachments->get()) {
                        $atags = explode(",", $attachments->field("tags"));
                        $tags = array_unique(array_merge($tags, $atags));
                        $_tag = str_replace(", ", " ", $attachments->field("tags"));
                        $_tag = str_replace(",", " ", $attachments->field("tags"));
                        //get_template_part("section-templates/portfolio", "item");
                        {
                            ?>
                            <!-- A GALLERY ENTRY -->

                            <div class="mega-entry <?php echo $_tag; ?> cat-all"
                                 data-src="<?php echo $attachments->src('portfolio-thumb'); ?>" data-width="577"
                                 data-height="500">
                                <div class="mega-hover alone">
                                    <div class="mega-hovertitle"><?php echo $attachments->field("title"); ?></div>

                                    <a href="<?php echo $attachments->src('portfolio-items'); ?>" class="image-link">
                                        <div class="mega-hoverview"></div>
                                        <div class="img-desc">
                                            <?php echo $attachments->field("description"); ?>
                                        </div>
                                        <div class="img-title">
                                            <?php echo $attachments->field("title"); ?>
                                        </div>
                                        <div class="img-url">
                                            <?php echo $attachments->field("url"); ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>

                </div>
            <?php } ?>

            <!-- colio-content # colio_c1 -->
        </div>
    </section>
<?php } ?>