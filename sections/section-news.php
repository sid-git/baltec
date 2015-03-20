<?php
global $themebucket_firebrick;
$news = firebrick_get_custom_posts("news",4);
$classes = array(0 => "", "1" => "col-md-12", "2" => "col-md-6", "3" => "col-md-6", "4" => "col-md-6");
$anims = array(1 => "slideInLeft", 2 => "fadeIn", 3 => "fadeIn", 4 => "slideInRight");
$class = $classes[count($news)];
?>
<?php if ($themebucket_firebrick['section_news_display']) { ?>
    <div class="post-block" id="news">
        <div class="container latest-news ">
            <div class="inner-block">
                <h2 class="section-header wow bounceIn"><?php if (isset($themebucket_firebrick['section_news_title'])) echo $themebucket_firebrick['section_news_title']; ?></h2>

                <p class="section-intro wow fadeInUp">
                    <?php if (isset($themebucket_firebrick['section_news_subtitle'])) echo $themebucket_firebrick['section_news_subtitle']; ?><br /><br />
                    <a href="news" class="btn btn-lg block centered" target="_blank">View More News ></a>
                </p>
            </div>

            <div class="row">
                <?php
                $i = 0;
				if ($i<4){
                foreach ($news as $post) {
                    setup_postdata($post);
                    $icon_code = get_post_meta($post->ID, "_firebrick_icon_code", 1);
                    $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),"news-thumb");
                    $i++;
                    ?>
                    <div class="<?php echo $class;?>">
                        <div class="news-section clearfix wow <?php if($i%2==1) echo "slideInLeft"; else echo "slideInRight" ;?>">
                            <img src="<?php if (isset($attachment[0])) echo $attachment[0]; ?>" alt="Determined">

                            <h3><a href="<?php echo get_permalink();?>" target="blank"><?php the_title();?></a></h3>

                            <?php the_excerpt();?>
                        </div>
                    </div>
                <?php } 
				
				}?>
            </div>
            
        </div>
    </div>
<?php } ?>