<?php
global $themebucket_firebrick;
?>
<section class="value">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="min-container">
                    <div class="secondary-section">
                        <div class="" style="<?php if(isset($themebucket_firebrick['parallax_text_color'])) echo "color: {$themebucket_firebrick['parallax_text_color']}" ;?>">
                            <?php if(isset($themebucket_firebrick['parallax_text'])) echo wpautop($themebucket_firebrick['parallax_text']) ;?>
                        </div>
                        <?php if(isset($themebucket_firebrick['parallax_url']) && trim($themebucket_firebrick['parallax_url'])!="") {?>
                        <a href="<?php echo ($themebucket_firebrick['parallax_url']) ;?>" class="btn btn-details btn-section"><?php echo $themebucket_firebrick['parallax_button_label'];?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>