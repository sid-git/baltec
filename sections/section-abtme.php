<?php

global $themebucket_firebrick, $post;

$fp = firebrick_get_custom_posts("featuredposts",6);

$classes = array(0=>"","1"=>"col-md-12","2"=>"col-md-6","3"=>"col-md-4","4"=>"col-md-3 col-sm-12","6"=>"col-md-4");

$anims = array(1=>"slideInLeft",2=>"fadeIn",3=>"fadeIn",4=>"slideInRight");

$class = $classes[count($fp)];

?>

<?php if ($themebucket_firebrick['section_abtme_display']) { ?>

    <!-- about me section start -->

    <section id="about" class="about">

        <div class="container">

            <h2 class="section-header wow bounceIn"><?php if(isset($themebucket_firebrick['section_abtme_title'])) echo $themebucket_firebrick['section_abtme_title'];?></h2>

            <p class="section-intro wow fadeInUp">

                <?php if(isset($themebucket_firebrick['section_abtme_subtitle'])) echo $themebucket_firebrick['section_abtme_subtitle'];?>

            </p>

            <div class="about-container">

                <div class="row">

                    <?php

                    $i=0;

                    foreach($fp as $post){

                        setup_postdata($post);

                        $icon_code = get_post_meta($post->ID,"_firebrick_icon_code",1);

                        $anim = get_post_meta($post->ID, "_firebrick_object_animation", 1);

                        $i++;

                    ?>

                    <div class="<?php echo $class;?>">

                        <div class="about-block wow <?php echo $anim; ?>">

                            <a>

                                <span class="intro-icon"><i class="fa <?php echo $icon_code;?>"></i></span>

                                <span class="about-title"><?php the_title();?></span>

                            </a>

                        </div>

                        <div class="about-intro">

                            <?php the_content();?>

                        </div>

                    </div>

                    <?php } ?>

                </div>

            </div>

        </div>

    </section>

    <div class="clear">

    </div>

    <!-- about me section end-->

<?php } ?>