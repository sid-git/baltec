<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package firebrick
 */
?>
<?php
global $themebucket_firebrick;
?>
<section id="footer">
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if(!dynamic_sidebar("footer-sidebar-1")){?>
                <div class="contact-address wow bounceInLeft">
                    <?php if(isset($themebucket_firebrick['section_footer_left_text'])) echo wpautop($themebucket_firebrick['section_footer_left_text']);?>
                    <ul class="social-link clearfix">
                        <?php
                        if(isset($themebucket_firebrick['section_social_facebook']) && trim($themebucket_firebrick['section_social_facebook'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_facebook']}'><i class='fa fa-facebook'></i></a></li>";
                        ?>
                        <?php
                        if(isset($themebucket_firebrick['section_social_linkedin'])  && trim($themebucket_firebrick['section_social_linkedin'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_linkedin']}'><i class='fa fa-linkedin'></i></a></li>";
                        ?>
                        <?php
                        if(isset($themebucket_firebrick['section_social_github'])  && trim($themebucket_firebrick['section_social_github'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_github']}'><i class='fa fa-github'></i></a></li>";
                        ?>
                        <?php
                        if(isset($themebucket_firebrick['section_social_twitter']) && trim($themebucket_firebrick['section_social_twitter'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_twitter']}'><i class='fa fa-twitter'></i></a></li>";
                        ?>
                        <?php
                        if(isset($themebucket_firebrick['section_social_pinterest'])  && trim($themebucket_firebrick['section_social_pinterest'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_pinterest']}'><i class='fa fa-pinterest'></i></a></li>";
                        ?><?php
                        if(isset($themebucket_firebrick['section_social_googleplus']) && trim($themebucket_firebrick['section_social_google'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_google']}'><i class='fa fa-google-plus'></i></a></li>";
                        ?><?php
                        if(isset($themebucket_firebrick['section_social_dribbble']) && trim($themebucket_firebrick['section_social_dribbble'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_dribbble']}'><i class='fa fa-dribbble'></i></a></li>";
                        ?><?php
                        if(isset($themebucket_firebrick['section_social_flickr']) && trim($themebucket_firebrick['section_social_flickr'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_flickr']}'><i class='fa fa-flickr'></i></a></li>";
                        ?><?php
                        if(isset($themebucket_firebrick['section_social_instagram']) && trim($themebucket_firebrick['section_social_instagram'])!="") echo "<li><a href='{$themebucket_firebrick['section_social_instagram']}'><i class='fa fa-instagram'></i></a></li>";
                        ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <div class="contact-form wow bounceInRight">
                    <h3>Contact form</h3>
                    <div class="row">
                        <div class="col-xs-6 input-name">
                            <input name="ename" id="ename" type="text" class="input-field" placeholder="Name">
                        </div>
                        <div class="col-xs-6 input-email">
                            <input id="eemail" name="eemail" type="text" class="input-field " placeholder="Email Address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <input id="esubject" name="esubject" type="text" class=" input-field" placeholder="Subject">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea id="emessage" name="esubject" class="input-message" rows="4" cols="50" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="contact-form-action">
                                <button id="sendmail" class="btn btn-send">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="copyright">
        <div class="container">
            <?php if(isset($themebucket_firebrick['section_footer_bottom'])) echo $themebucket_firebrick['section_footer_bottom'];?>
        </div>
    </div>
</section>
</div>
<div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="container-fluid portfolio-modal">
        <a class="close modal-exit" data-dismiss="modal" aria-hidden="true">&times;</a>
        <div class="row">
            <div class="col-md-6">
                <div class="modal-img" id="modal-img-container">
                    <img id="modal-img" src= <?php echo get_template_directory_uri()."/img/logo.png";?> alt="img">
                </div>
            </div>
            <div class="col-md-6">
                <div class="portfolio-modal-content">
                    <h3 id="modal-title">This is title</h3>
                    <p id="modal-desc">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                    </p>
                    <a id="modal-url" href="#" target="_blank" class="btn btn-view-all">Live Demo</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>