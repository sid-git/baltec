<?php
global $themebucket_firebrick;
$sp = firebrick_get_custom_posts("service", 4);
$classes = array(0 => "", "1" => "col-md-12", "2" => "col-md-6", "3" => "col-md-4", "4" => "col-md-3");
$anims = array(0=>"",1 => "slideInLeft", 2 => "slideInRight");
?>
<?php if ($themebucket_firebrick['section_services_display']) { ?>
    <section id="services" class="services">
        <div class="container">
            <div class="col-md-8 col-centered">
            <span class="heading-logo"></span>
             <h2 class="section-header wow bounceIn"><?php if (isset($themebucket_firebrick['section_service_title'])) echo $themebucket_firebrick['section_service_title']; ?></h2>

        <p class="section-intro wow fadeInUp">
            <?php if (isset($themebucket_firebrick['section_service_subtitle'])) echo $themebucket_firebrick['section_service_subtitle']; ?>
        </p>
               <?
			   $page = get_post('119');
			   if($page){
					echo $page->post_content;   
			   }
			   
			   ?>

            </div>
              
        </div>
      











       <!-- 

        <div class="container">
            <?php
            $i = 0;
            foreach ($sp as $post) {
                setup_postdata($post);
                $icon_code = get_post_meta($post->ID, "_firebrick_icon_code", 1);
                $anim = get_post_meta($post->ID, "_firebrick_object_animation", 1);
                $i++;
                ?>
                <?php if ($i % 2 == 1) { ?><div class="row"><?php } ?>
                <div class="<?php if($i%2==1 && !firebrick_has_next($sp,$i-1)) echo "col-md-12"; else echo "col-md-6"; ?> wow <?php echo $anim; ?>">
                    <div class="service-block clearfix">
                        <div class="service-icon">
                            <i class="fa <?php echo $icon_code;?>"></i>
                        </div>
                        <div class="service-intro">
                            <h4><a href='<?php echo get_permalink();?>'><?php the_title();?></a></h4>

                            <?php the_excerpt();?>
                        </div>
                    </div>
                </div>

                <?php if ($i % 2 == 0 || !firebrick_has_next($sp,$i-1))  { ?></div><?php } ?>

            <?php } ?>

        </div> -->
    </section>
<?php } ?>