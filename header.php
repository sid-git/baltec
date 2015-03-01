<?php

/**

 * The Header for our theme.

 *

 * Displays all of the <head> section and everything up till <div id="content">

 *

 * @package firebrick

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

<script src="//use.typekit.net/lbg6atv.js"></script>

<script>try{Typekit.load();}catch(e){}</script>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); ?></title>

	

    <?php

    if (isset($themebucket_firebrick['custom_css'])) echo $themebucket_firebrick['custom_css'];

    if (isset($themebucket_firebrick['custom_ga'])) echo $themebucket_firebrick['custom_ga'];

    ?>



    <?php wp_head(); ?>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css">


</head>



<body class="blog-body">