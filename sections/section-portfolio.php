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

           <div class="baltec-products">
               <div class="baltec-product-ellipse hidden-xs hidden-sm">
                    <ul class="controllers-on-image">
                     <?php
					$args=array('post_type'=>'products');
					// The Query
					$the_query = new WP_Query( $args );
					
					// The Loop
					if ( $the_query->have_posts() ) {
						$counter=1;
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							$dupicate_title=get_the_title();
							?>

                    
                        <li id="products-<?=$counter?>"><a>+</a>
                            <span><? the_title(); ?></span>
                        </li>

                        
                        
                        <?php $counter++; }

					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					
					?>
                       <li id="products-7"><a>+</a>
                            <span><? echo $dupicate_title; ?></span>
                        </li> 
                        
                        
                    </ul>
                </div>
           </div>
           
        <div class="baltec-products-des">
              <div id="myCarousel" class="carousel slide">  
                <div class="carousel-inner">
                
                <?php
					$args=array('post_type'=>'products');
					// The Query
					$the_query = new WP_Query( $args );
					
					// The Loop
					if ( $the_query->have_posts() ) {
						$counter=1;
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							?>

                    
                   <div class="item <?php if($counter==1){ echo 'active'; } ?>">

                       <div class="product-sliders">
                             <section class="slider">
                                <div class="flexslider carousel">

                                  <?php
                                  $images = get_field('product_gallery');
								  
								  if( $images ): ?>
                                    <ul class="slides">
                                        <?php foreach( $images as $image ): ?>
                                            <li>
                                
                                                     <img class="thumbnail" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
								  

                                </div>
                              </section> 
                        </div>
                       <div class="product-details">
                          <h3><? the_title(); ?></h3>
                          <p>
                             <? echo get_the_content(); ?>
                          </p>
                      </div>
                  </div>

                        
                        
                        <?php $counter++; }

					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					
					?>
                
                
                  
                  
                </div>

                                
                <!-- Indicators -->
      <ol class="carousel-indicators" style="display:none;">
      
      <?php
					$args=array('post_type'=>'products');
					// The Query
					$the_query = new WP_Query( $args );
					
					// The Loop
					if ( $the_query->have_posts() ) {
						$counter=1;
						while ( $the_query->have_posts() ) {
							$the_query->the_post();
							?>

                    
                        <li data-target="#myCarousel" id="indicator<?=$counter?>" data-slide-to="<?=$counter-1?>" class="<?php if($counter==1){ echo 'active'; } ?>"></li>

                        
                        
                        <?php $counter++; }

					} else {
						// no posts found
					}
					/* Restore original Post Data */
					wp_reset_postdata();
					
					?>


      </ol>
                
                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="fa fa-chevron-left fa-2x"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="fa fa-chevron-right fa-2x"></span></a>  
            </div>
    <!-- /.carousel -->
        </div>
           
        </div>
        <div class="row download-br">
            <a href="<?php the_field('download_brochure', 'option'); ?>" class="btn block centered" target="_blank">Download our Latest Brochure</a>
        </div>
    </section>
<?php } ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css">
<script type="text/javascript" charset="utf-8">
var jq = jQuery.noConflict();
jq(document).ready(function(){
	
	function triggerscroll(){
		jq('html, body').animate({scrollTop: jq(".baltec-products-des").offset().top-150   }, 500);	
	}
		jq('.flexslider').flexslider();

		jq('#products-1').click(function(){
				jq('#indicator1').click();
				jq('.controllers-on-image li').removeClass('active');
				jq(this).addClass('active');
				
				triggerscroll();
				
		});
		jq('#products-2').click(function(){
				jq('#indicator2').click();
				jq('.controllers-on-image li').removeClass('active');
				jq(this).addClass('active');
				triggerscroll();
		});
		jq('#products-3').click(function(){
				jq('#indicator3').click();
				jq('.controllers-on-image li').removeClass('active');
				jq(this).addClass('active');
				triggerscroll();
		});
		jq('#products-4').click(function(){
				jq('#indicator4').click();
				jq('.controllers-on-image li').removeClass('active');
				jq(this).addClass('active');
				triggerscroll();
		});
		jq('#products-5').click(function(){
				jq('#indicator5').click();
				jq('.controllers-on-image li').removeClass('active');
				jq(this).addClass('active');
				triggerscroll();
		});
		jq('#products-6').click(function(){
				jq('#indicator6').click();
				jq('.controllers-on-image li').removeClass('active');
				jq(this).addClass('active');
				triggerscroll();
		});
		jq('#products-7').click(function(){
				jq('#indicator6').click();
				jq('.controllers-on-image li').removeClass('active');
				jq(this).addClass('active');
				triggerscroll();
		});


});


</script>