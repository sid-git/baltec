<?php
/**
  * Template Name: Career Page Template
 *
 */
 ?>
 
 <?php get_header(); ?>

<?php
global $themebucket_firebrick, $post;
setup_postdata($post);
?>
<?php while ( have_posts() ) : the_post(); ?>
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
    <section class="inner-page-header feature-header overlay-section">
        <div class="overlay-div">
        </div>
        <div class=" container">
            <h2 class="inner-page-title"><?php the_title(); ?></h2>
        </div>
    </section>
    
    <section class="career clearfix" id="career">    
        <div>   
            <h2 class="section-header wow bouneIn">Career    </h2> 
            <p class="section-intro"> </p>
            
            
        </div>
        <div class="col-md-5 col-centered">
        
         <? echo get_field('career_content'); ?> 
        
            <h3>Featured Job Opportunities:</h3> 
            
            <?php

			// check if the repeater field has rows of data
			if( have_rows('job_positions') ):
				echo ' <div class="jobs"> ';
				// loop through the rows of data
				while ( have_rows('job_positions') ) : the_row();
				
				$date = DateTime::createFromFormat('Ymd', get_sub_field('job_date'));

			
					?>
                     <li class="job-item">   
                        <span class="job-title"><a href="<? the_sub_field('job_pdf') ?>" target="_blank"><? the_sub_field('job_title') ?></a></span>
                        <span class="job-location"><? the_sub_field('job_location') ?></span>
                        <span class="job-date"><? echo $date->format('d-m-Y'); ?></span>
                	</li>
                    
                    
                    <?php

				endwhile;
				
				echo '</div>';
			else :
			
				the_field('job_replacement_content');
			
			endif;
			
			?>
            
            
           
              
                <?php
      the_content();
    ?>

        </div>
        
    </section>



<?php endwhile; ?>

<?php get_footer(); ?>