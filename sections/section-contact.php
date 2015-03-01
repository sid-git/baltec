<?php
global $themebucket_firebrick;
?>
<?php if ($themebucket_firebrick['section_contact_display']) { ?>
    <!--section contact start-->
    <section id="contact" class="contact">
        <div>
            <h2 class="section-header contact-header wow bounceIn"><?php if (isset($themebucket_firebrick['section_contact_title'])) echo $themebucket_firebrick['section_contact_title']; ?></h2>

            <p class="section-intro wow fadeInUp">
                <?php if (isset($themebucket_firebrick['section_contact_subtitle'])) echo $themebucket_firebrick['section_contact_subtitle']; ?>
            </p>
        </div>
        <!-- <div id="location-map">
            <div id="map">
            </div>
            <div id="marker-content">
                <?php if (isset($themebucket_firebrick['section_contact_description'])) echo wpautop($themebucket_firebrick['section_contact_description']); ?>
            </div>
        </div> -->
        <div class="container">
             <div class="contact-map ">
                    <div class="col-sm-12"> 
                         <img class="map-large"src="<?php echo bloginfo('template_url'); ?>/img/worldmap.jpg" alt=""/>
                 <img class="map-small" src="<?php echo bloginfo('template_url'); ?>/img/worldmap-mobile.jpg " alt=""/>
                    </div>
                
             </div>
             <div class="location-pins ">
                    <div class="col-md-9">  
<ul>
                <li class="location-1"><span>North America</span></li>
                <li class="location-2"><span>South America / Caribbean</span></li>
                <li class="location-3"><span>Mexico / Central America</span></li>
                <li class="location-4"><span>Europe</span></li>
                <li class="location-5"><span>Russia</span></li>
                <li class="location-6"><span>China/Taiwan</span></li>
                <li class="location-7"><span>India</span></li>
                <li class="location-8 small"><span>Korea</span></li>
                <li class="location-9 small"><span>Japan</span></li>
                <li class="location-10 small"><span>Thailand</span></li>
                <li class="location-11 small"><span>Indonesia</span></li>
                <li class="location-12 "><span>Middle East</span></li>
                <li class="location-13 small"><span>Malaysia</span></li>
                <li class="location-14 small"><span>Vietnam</span></li>
                

            </ul>
                    </div>
            
        </div>
        <div class="col-md-3 ">  
                <div class="wow bounceInRight">
         <?php if(isset($themebucket_firebrick['section_footer_left_text'])) echo wpautop($themebucket_firebrick['section_footer_left_text']);?>
         </div>
        </div>
        </div>
       
    </section>
    <!--section contact end-->
<?php } ?>

    <section class="career clearfix" id="career">    
        <div>   
            <h2 class="section-header wow bouneIn">Career    </h2> 
            <p class="section-intro"> </p>
            
            
        </div>
        <div class="col-md-5 col-centered">
        
         <? echo get_field('career_content','option'); ?> 
        
            <h3>Featured Job Opportunities:</h3> 
            
            <?php

			// check if the repeater field has rows of data
			if( have_rows('job_positions','option') ):
				echo ' <div class="jobs"> ';
				// loop through the rows of data
				while ( have_rows('job_positions','option') ) : the_row();
				
				$date = DateTime::createFromFormat('Ymd', get_sub_field('job_date','option'));

			
					?>
                     <li class="job-item">   
                        <span class="job-title"><a href="<? the_sub_field('job_pdf','option') ?>" target="_blank"><? the_sub_field('job_title','option') ?></a></span>
                        <span class="job-location"><? the_sub_field('job_location','option') ?></span>
                        <span class="job-date"><? echo $date->format('d-m-Y'); ?></span>
                	</li>
                    
                    
                    <?php

				endwhile;
				
				echo '</div>';
			else :
			
				the_field('job_replacement_content','option');
			
			endif;
			
			?>
            
            
           
              
                <?php
       echo do_shortcode('[contact-form-7 id="241" title="Job Application"]');
    ?>

        </div>
        
    </section>