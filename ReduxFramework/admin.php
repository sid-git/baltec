<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit http://reduxframework.com/docs/
 **/


/**
 *
 * Most of your editing will be done in this section.
 *
 * Here you can override default values, uncomment args and change their values.
 * No $args are required, but they can be overridden if needed.
 **/
$args = array();


// For use with a tab example below
$tabs = array();

ob_start();

$ct = wp_get_theme();
$theme_data = $ct;
$item_name = $theme_data->get('Name');
$tags = $ct->Tags;
$screenshot = $ct->get_screenshot();
$class = $screenshot ? 'has-screenshot' : '';

$customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'firebrick-admin'), $ct->display('Name'));

?>
    <div id="current-theme" class="<?php echo esc_attr($class); ?>">
        <?php if ($screenshot) : ?>
            <?php if (current_user_can('edit_theme_options')) : ?>
                <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize"
                   title="<?php echo esc_attr($customize_title); ?>">
                    <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>"/>
                </a>
            <?php endif; ?>
            <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>"
                 alt="<?php esc_attr_e('Current theme preview'); ?>"/>
        <?php endif; ?>

        <h4>
            <?php echo $ct->display('Name'); ?>
        </h4>

        <div>
            <ul class="theme-info">
                <li><?php printf(__('By %s', 'firebrick-admin'), $ct->display('Author')); ?></li>
                <li><?php printf(__('Version %s', 'firebrick-admin'), $ct->display('Version')); ?></li>
                <li><?php echo '<strong>' . __('Tags', 'firebrick-admin') . ':</strong> '; ?><?php printf($ct->display('Tags')); ?></li>
            </ul>
            <p class="theme-description"><?php echo $ct->display('Description'); ?></p>
            <?php if ($ct->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>',
                    __('http://codex.wordpress.org/Child_Themes', 'firebrick-admin'),
                    $ct->parent()->display('Name'));
            } ?>

        </div>

    </div>

<?php
$item_info = ob_get_contents();

ob_end_clean();

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    /** @global WP_Filesystem_Direct $wp_filesystem */
    global $wp_filesystem;
    if (empty($wp_filesystem)) {
        require_once(ABSPATH . '/wp-admin/includes/file.php');
        WP_Filesystem();
    }
    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

$args['dev_mode'] = false;
$args['dev_mode_icon_class'] = 'icon-large';
$args['opt_name'] = 'themebucket_firebrick';
$theme = wp_get_theme();

$args['display_name'] = $theme->get('Name');
$args['display_version'] = $theme->get('Version');

// If you want to use Google Webfonts, you MUST define the api key.
$args['google_api_key'] = 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII';

$args['share_icons']['twitter'] = array(
    'link' => 'http://twitter.com/theme_bucket',
    'title' => 'Follow me on Twitter',
    'img' => ReduxFramework::$_url . 'assets/img/social/Twitter.png'
);

$args['import_icon_class'] = 'icon-large';

/**
 * Set default icon class for all sections and tabs
 * @since 3.0.9
 */
$args['default_icon_class'] = 'icon-large';


// Set a custom menu icon.
$args['menu_icon'] = get_template_directory_uri() . "/img/menuicon/setting.png";

// Set a custom title for the options page.
// Default: Options
$args['menu_title'] = __('firebrick Settings', 'firebrick-admin');

// Set a custom page title for the options page.
// Default: Options
$args['page_title'] = __('firebrick Settings', 'firebrick-admin');

// Set a custom page slug for options page (wp-admin/themes.php?page=***).
// Default: redux_options
$args['page_slug'] = 'firebrick_options';

$args['default_show'] = true;
$args['default_mark'] = '*';


if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace("-", "_", $args['opt_name']);
    }
} else {
}

$sections = array();

//Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) :

    if ($sample_patterns_dir = opendir($sample_patterns_path)) :
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode(".", $sample_patterns_file);
                $name = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
            }
        }
    endif;
endif;
global $themebucket_firebrick;

$sections[] = array(
    'title' => __('Global Management', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-globe',
    'fields' => array(
        $fields = array(
            'id' => 'firebrick_sections_order',
            'type' => 'sortable',
            'title' => __('Sort Sections', 'redux-framework-demo'),
            'subtitle' => __('Define and reorder these sections however you want.', 'redux-framework-demo'),
            'mode' => 'text',
            'options' => get_option("firebrick_sections"),
        ),
        array(
            'id' => 'firebrick_color',
            'type' => 'image_select',
            'title' => __('Color Scheme', 'firebrick-admin'),
            'subtitle' => __('Select Predefined Color Schemes or your Own', 'redux-framework-demo'),
            'options' => array(
                '1' => array(
                    'alt' => 'Blue',
                    'img' => get_template_directory_uri() . '/img/colors/blue.png'
                ),
                '2' => array(
                    'alt' => 'Green',
                    'img' => get_template_directory_uri() . '/img/colors/green.png'
                ),
                '3' => array(
                    'alt' => 'Navy',
                    'img' => get_template_directory_uri() . '/img/colors/navy.png'
                ),
                '4' => array(
                    'alt' => 'Purple',
                    'img' => get_template_directory_uri() . '/img/colors/purple.png'
                ),
                '5' => array(
                    'alt' => 'Red',
                    'img' => get_template_directory_uri() . '/img/colors/red.png'
                ),
                '6' => array(
                    'alt' => 'Turquoise',
                    'img' => get_template_directory_uri() . '/img/colors/turquoise.png'
                ),
                '7' => array(
                    'alt' => 'Choose Your One',
                    'img' => get_template_directory_uri() . '/img/colors/white.png'
                )
            ),
            'default' => '6'
        ),
        array(
            'id' => 'firebrick_custom_color',
            'type' => 'color',
            'title' => __('Your Own Theme Color', 'firebrick-admin'),
            'subtitle' => __('Pick a custom color', 'redux-framework-demo'),
            'default' => '#FFFFFF',
            'validate' => 'color',
            'required' => array("firebrick_color", "=", "7")
        ),
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('Custom CSS', 'firebrick-admin'),
            'description' => 'Write your custom CSS code inside &lt;style> &lt;/style> block'
        ),

        array(
            'id' => 'custom_ga',
            'type' => 'ace_editor',
            'title' => __('Google Analytics Code', 'firebrick-admin'),
            'description' => 'Write your custom google analytics code inside &lt;script> &lt;/script> block'

        ),
        array(
            'id' => 'custom_main_title_fonts',
            'type' => 'typography',
            'title' => __('Google Font for Main Title', 'firebrick-admin'),
            'google'      => true,
            'color' => false,
            'word-spacing'=>false,
            'text-align'=>false,
            'update-weekly'=>false,
            'line-height'=>false,
            'subsets'=>false,
            'letter-spacing'=>false,
            'font-style'=>false,
            'font-backup' => false,
            'font-size'=>false,
            'font-weight'=>true,
            'output'      => array('.logo a, .post-list li p, .section-header, .secondary-header, .about-title, .skill-lists li h3, .team-member-name, .member-name, .service-intro h4, .contact-form h3, .contact-address h3, .skill-bar-percent, .numeric-factor, .numeric-factor-header, .inner-page-title, .post h3 a, .post blockquote, .comments-title, .comments-header h3, .comment-author, .comments-count, .comments-header, .reply-header, .sidebar h3, .da-thumbs .mega-list article h3, .text-slider li, .banner-tag-lines li, .secondary-section-h h3, .pricing-head .p-value, .pricing-head .p-title'),
            'units'       =>'px',
            'default'     => array(
                'font-family' => 'Montserrat',
                'google'      => true,
            ),
        ),
        array(
            'id' => 'custom_main_body_fonts',
            'type' => 'typography',
            'title' => __('Google Font for Main Sub Title', 'firebrick-admin'),
            'google'      => true,
            'color' => false,
            'word-spacing'=>false,
            'text-align'=>false,
            'update-weekly'=>false,
            'line-height'=>false,
            'subsets'=>false,
            'letter-spacing'=>false,
            'font-style'=>false,
            'font-backup' => false,
            'font-size'=>false,
            'font-weight'=>true,
            'output'      => array('body'),
            'units'       =>'px',
            'default'     => array(
                'font-family' => 'Roboto',
                'google'      => true,
            ),
        ),

    )
); //global

$sections[] = array(
    'title' => __('Header Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'id' => 'section_header_standard_display',
            'type' => 'switch',
            'title' => __('Display Revolution Slider', 'firebrick-admin'),
            'default' => 0,
        ),
        array(
            'id' => 'section_header_nav_logo',
            'type' => 'media',
            'title' => __('Main Logo', 'firebrick-admin'),
            'default' => array("url" => get_template_directory_uri() . "/img/logo.png"),
            'preview' => true,
            "url" => true,
            'required' => array('section_header_standard_display', '=', '1')
        ),
        array(
            'id' => 'section_rev_slider',
            'type' => 'text',
            'title' => __('Slider Alias', 'firebrick-admin'),
            'desc' => __('Create one from <a href="' . site_url() . '/wp-admin/admin.php?page=revslider">here</a>', 'firebrick-admin'),
            'required' => array('section_header_standard_display', '=', '1')

        ),
    )
); //header

$sections[] = array(
    'title' => __('About Us Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-user',
    'fields' => array(

        array(
            'id' => 'section_abtme_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_abtme_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_abtme_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "ABOUT US",
            'required' => array('section_abtme_display_menu', '=', '1')
        ),

        array(
            'id' => "section_abtme_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "ABOUT ME",
        ),
        array(
            'id' => "section_abtme_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "Everything about our journey goes here",
        ),

        array(
            'id' => 'section_abtme_info',
            'type' => 'info',
            'title' => __('Create new content for this section from <a href="'.site_url().'/wp-admin/post-new.php?post_type=featuredposts">here</a>', 'firebrick-admin'),
        ),

    )
); //about me

$sections[] = array(
    'title' => __('Quote Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-quotes',
    'fields' => array(
        array(
            'id' => 'section_parallax_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'parallax_text',
            'type' => 'editor',
            'title' => __('Quote Text', 'firebrick-admin'),
            'required'=>array('section_parallax_display','=','1')
        ),
        array(
            'id' => 'parallax_bg',
            'type' => 'media',
            'title' => __('Section Background Image', 'firebrick-admin'),
            'default' => array("url" => get_template_directory_uri() . "/img/banner-img/business_value.jpg"),
            'preview' => true,
            "url" => true
        ),
        array(
            'id'=>'parallax_bg_color',
            'type'=>'color',
            'title'=>__('Section Background Color','firebrick-admin'),
            'default'=>'#444'
        ),
        array(
            'id'=>'parallax_text_color',
            'type'=>'color',
            'title'=>__('Section Text Color','firebrick-admin'),
            'default'=>'#fff'
        ),
        array(
            'id' => 'parallax_url',
            'type' => 'text',
            'title' => __('Quote Button URL', 'firebrick-admin'),
            'required'=>array('section_parallax_display','=','1')
        ),

        array(
            'id' => 'parallax_button_label',
            'type' => 'text',
            'title' => __('Quote Button Label', 'firebrick-admin'),
            'required'=>array('section_parallax_display','=','1'),
            'default'=>"Read Details"
        ),
    )
); //parallax

$sections[] = array(
    'title' => __('Team Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-group',
    'fields' => array(
        array(
            'id' => 'section_team_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_team_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_team_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "TEAMS",
            'required' => array('section_team_display_menu', '=', '1')

        ),
        array(
            'id' => "section_team_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "TEAMS",
        ),
        array(
            'id' => "section_team_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "I AM REALLY GOOD AT THE FOLLOWING TECHNICAL TEAMS",
        ),

        array(
            'id' => 'section_team_counter_display',
            'type' => 'switch',
            'title' => __('Display Counters', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => "section_team_counter_header",
            'type' => 'text',
            'title' => __('Counter Section Title', 'firebrick-admin'),
            'default' => "Numeric Factor",
            'required' => array('section_team_counter_display', '=', '1')
        ),
        array(
            'id' => 'section_team_counter_bgcolor',
            'type' => 'color',
            'title' => __('Counter Background', 'firebrick-admin'),
            'default'=>'#f5f5f5',
            'required' => array('section_team_counter_display', '=', '1')

        ),
        array(
            'id' => 'section_team_counters',
            'type' => 'multi_text',
            'title' => __('Counters with Values & Labels', 'firebrick-admin'),
            'description' => __('Add up to three counters, separate value & label by a comma, ex: 12, Years Experience', 'firebrick-admin'),
            'required' => array('section_team_counter_display', '=', '1')
        ),
        array(
            'id' => 'section_team_info',
            'type' => 'info',
            'title' => __('Create new content for this section from <a href="'.site_url().'/wp-admin/post-new.php?post_type=teammember">here</a>', 'firebrick-admin'),
        ),
    )
); //team

$sections[] = array(
    'title' => __('News Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => ' el-icon-file-edit',
    'fields' => array(
        array(
            'id' => 'section_news_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_news_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_news_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "NEWS",
            'required' => array('section_news_display_menu', '=', '1')

        ),
        array(
            'id' => "section_news_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "NEWS",
        ),
        array(
            'id' => "section_news_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "Celery seakale desert raisin taro wakame pea sprouts. Broccoli rabe courgette rock melon cress epazotebell",
        ),
        array(
            'id' => 'section_news_bg',
            'type' => 'media',
            'title' => __('News Background', 'firebrick-admin'),
            'default' => array("url" => get_template_directory_uri() . "/img/banner-img/parallax_img2.jpg"),
            'preview' => true,
            "url" => true,
            'required' => array('section_news_display', '=', '1')

        ),
        array(
            'id' => 'section_news_bg_color',
            'type' => 'color',
            'title' => __('News section background color', 'firebrick-admin'),
            'default'=>'#3bd1e1'
        ),
        array(
            'id' => 'section_news_text_color',
            'type' => 'color',
            'title' => __('News section text color', 'firebrick-admin'),
            'default'=>'#fff'
        ),
        array(
            'id' => 'section_news_info',
            'type' => 'info',
            'title' => __('Create new content for this section from <a href="'.site_url().'/wp-admin/post-new.php?post_type=news">here</a>', 'firebrick-admin'),
        ),
    )
); //news

$sections[] = array(
    'title' => __('Services Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-wrench-alt',
    'fields' => array(
        array(
            'id' => 'section_services_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_service_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_service_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "SERVICE",
            'required' => array('section_service_display_menu', '=', '1')

        ),

        array(
            'id' => "section_service_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "SERVICE",
        ),
        array(
            'id' => "section_service_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "Celery seakale desert raisin taro wakame pea sprouts. Broccoli rabe courgette rock melon cress epazotebell",
        ),
        array(
            'id' => 'section_service_info',
            'type' => 'info',
            'title' => __('Create new content for this section from <a href="'.site_url().'/wp-admin/post-new.php?post_type=service">here</a>', 'firebrick-admin'),
        ),

    )
); //services

$sections[] = array(
    'title' => __('Pricing Table Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-th-list',
    'fields' => array(
        array(
            'id' => 'section_pricing_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_pricing_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_pricing_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "Pricing",
            'required' => array('section_pricing_display_menu', '=', '1')

        ),

        array(
            'id' => "section_pricing_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "Pricing",
        ),
        array(
            'id' => "section_pricing_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "Celery seakale desert raisin taro wakame pea sprouts. Broccoli rabe courgette rock melon cress epazotebell",
        ),
        array(
            'id' => 'section_pricing_info',
            'type' => 'info',
            'title' => __('Create new content for this section from <a href="'.site_url().'/wp-admin/post-new.php?post_type=pricingtable">here</a>', 'firebrick-admin'),
        ),
    )
); //pricing

$sections[] = array(
    'title' => __('Portfolio Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-th-large',
    'fields' => array(
        array(
            'id' => 'section_portfolio_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_portfolio_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_portfolio_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "PORTFOLIO",
            'required' => array('section_portfolio_display_menu', '=', '1')
        ),
        array(
            'id' => "section_portfolio_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "PORTFOLIO",
        ),
        array(
            'id' => "section_portfolio_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_portfolio_gallery',
            'type' => 'select',
            'title' => __('Select Portfolio', 'firebrick-admin'),
            'desc' => __('Or create one from <a href="' . site_url() . '/wp-admin/post-new.php?post_type=portfolio">here</a>', 'firebrick-admin'),
            'data' => 'post',
            'args' => array('post_type' => 'portfolio')
        ),
        array(
            'id' => "section_portfolio_mode",
            'type' => 'select',
            'title' => __('Portfolio Mode', 'firebrick-admin'),
            'default' => "11",
            'options'=> range(1,13),
        ),
        array(
            'id' => 'section_portfolio_info',
            'type' => 'info',
            'title' => __('Create new content for this section from <a href="'.site_url().'/wp-admin/post-new.php?post_type=portfolio">here</a>', 'firebrick-admin'),
        ),
    )
); //portfolio

$sections[] = array(
    'title' => __('Blog Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-comment-alt',
    'fields' => array(
        array(
            'id' => 'section_blog_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_blog_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_blog_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "BLOG",
            'required' => array('section_blog_display_menu', '=', '1')
        ),
        array(
            'id' => "section_blog_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "BLOG",
        ),
        array(
            'id' => "section_blog_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_blog_bg',
            'type' => 'media',
            'title' => __('Blog banner background', 'firebrick-admin'),
            'url'=>'true',
            'preview'=>'true',
            'default' => get_template_directory_uri()."/img/blog_inner_banner.jpg"
        ),
        array(
            'id' => 'section_blog_bg_color',
            'type' => 'color',
            'title' => __('Blog banner background color', 'firebrick-admin'),
            'default'=>'#3bd1e1'
        ),array(
            'id' => 'section_blog_text_color',
            'type' => 'color',
            'title' => __('Blog banner text color', 'firebrick-admin'),
            'default'=>'#fff'
        ),
    )
); //blog

$sections[] = array(
    'title' => __('Testimonial Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-certificate',
    'fields' => array(
        array(
            'id' => 'section_testimonial_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_testimonial_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_testimonial_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "TESTIMONIAL",
            'required' => array('section_testimonial_display_menu', '=', '1')
        ),

        array(
            'id' => "section_testimonial_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "TESTIMONIAL",
        ),
        array(
            'id' => "section_testimonial_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_testimonial_bg',
            'type' => 'media',
            'title' => __('Testimonial Section Background', 'firebrick-admin'),
            'default' => array("url" => get_template_directory_uri() . "/img/banner-img/parallax_img3.jpg"),
            'preview' => true,
            "url" => true,
            'required' => array('section_testimonial_display', '=', '1')

        ),
        array(
            'id' => 'section_testimonial_bg_color',
            'type' => 'color',
            'title' => __('Testimonial section background color', 'firebrick-admin'),
            'default'=>'#3bd1e1'
        ),
        array(
            'id' => 'section_testimonial_text_color',
            'type' => 'color',
            'title' => __('Testimonial section background color', 'firebrick-admin'),
            'default'=>'#fff'
        ),
        array(
            'id' => 'section_testimonial_clients_display',
            'type' => 'switch',
            'title' => __('Display Clients Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => "section_testimonial_clients",
            'type' => 'gallery',
            'title' => __('Prospective Clients', 'firebrick-admin'),
            'required' => array("section_testimonial_clients_display", "=", '1')
        ),
        array(
            'id' => 'section_testimonial_info',
            'type' => 'info',
            'title' => __('Create new content for this section from <a href="'.site_url().'/wp-admin/post-new.php?post_type=testimonial">here</a>', 'firebrick-admin'),
        ),

    )
); //testimonial

$sections[] = array(
    'title' => __('Contact Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-phone-alt',
    'fields' => array(
        array(
            'id' => 'section_contact_display',
            'type' => 'switch',
            'title' => __('Display Section', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_contact_display_menu',
            'type' => 'switch',
            'title' => __('Display In Menubar', 'firebrick-admin'),
            'default' => 1,
        ),
        array(
            'id' => 'section_contact_menu_text',
            'type' => 'text',
            'title' => __('Section Title in Menubar', 'firebrick-admin'),
            'default' => "CONTACT",
            'required' => array('section_contact_display_menu', '=', '1')
        ),

        array(
            'id' => "section_contact_title",
            'type' => 'text',
            'title' => __('Section Title', 'firebrick-admin'),
            'default' => "CONTACT",
        ),
        array(
            'id' => "section_contact_subtitle",
            'type' => 'text',
            'title' => __('Section Subtitle', 'firebrick-admin'),
            'default' => "PREVIOUS ASSOCIATIONS THAT HELPED TO GATHER EXPERIENCE",
        ),
        array(
            'id' => 'section_contact_lat',
            'type' => 'text',
            'title' => __('Latitude', 'firebrick-admin'),
            'default' => "-37.817314",
        ),
        array(
            'id' => 'section_contact_lon',
            'type' => 'text',
            'title' => __('Longitude', 'firebrick-admin'),
            'default' => "144.955431",
        ),
        array(
            'id' => 'section_contact_description',
            'type' => 'editor',
            'title' => __('Marker Details', 'firebrick-admin'),
            'default'=>'<h3 id="firstHeading" class="firstHeading">Local Address</h3>
            <div id="bodyContent"><p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large Heritage Site.</p><p>Attribution: Uluru, <a href="http://en.wikipedia.org/w/index.php?title=Uluru&amp;oldid=297882194">http://en.wikipedia.org/w/index.php?title=Uluru</a> (last visited June 22, 2009).</p></div>',
        ),
        array(
            'id' => 'section_contact_receiver',
            'type' => 'text',
            'title' => __('Contact Email Receiver', 'firebrick-admin'),
        ),
        array(
            'id' => 'section_contact_message',
            'type' => 'text',
            'title' => __('Contact Successful Message', 'firebrick-admin'),
            'default'=>"Thank you for contacting us"
        ),

    )
); //contact

$sections[] = array(
    'title' => __('Footer Section', 'firebrick-admin'),
    'icon_class' => 'icon-large',
    'icon' => 'el-icon-edit',
    'fields' => array(
        array(
            'id' => 'section_footer_left_text',
            'type' => 'editor',
            'title' => __('Footer Left Text', 'firebrick-admin'),
            'default' => '<h3>Address</h3>
<p>
    Creative Laboratory<br>
    77 New York Avenue, New York, USA 10000<br>
    Phone: (+453) 443 11 23<br>
    Email: info@yoursite.com<br>
</p>
<h3>Call us</h3>
<span>
012.345.678 </span>
<h3>Write to us</h3>
<span>
support@xyz.com </span>'
        ),
        array(
            'id' => 'section_social_facebook',
            'type' => 'text',
            'title' => __('Facebook', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_linkedin',
            'type' => 'text',
            'title' => __('Linked In', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_google',
            'type' => 'text',
            'title' => __('Google Plus', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_dribbble',
            'type' => 'text',
            'title' => __('Dribbble', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_flickr',
            'type' => 'text',
            'title' => __('Flickr', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_youtube',
            'type' => 'text',
            'title' => __('Youtube', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_instagram',
            'type' => 'text',
            'title' => __('Instagram', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_twitter',
            'type' => 'text',
            'title' => __('Twitter', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_pinterest',
            'type' => 'text',
            'title' => __('Pinterest', 'firebrick-admin'),
            'default' => "",
        ),
        array(
            'id' => 'section_social_github',
            'type' => 'text',
            'title' => __('Github', 'firebrick-admin'),
            'default' => "",
        ),

        array(
            'id' => 'section_footer_bottom',
            'type' => 'text',
            'title' => __('Footer bottom text', 'firebrick-admin'),
            'default' => '© 2014 firebrick. All Rights Reserved.'
        ),
    )
); //footer

$sections[] = array(
    'icon' => 'el-icon-cogs',
    'icon_class' => 'icon-large',
    'title' => __('404 Settings', 'firebrick-admin'),
    'fields' => array(
        array(
            'id'=>'settings_404_heading',
            'type' => 'text',
            'title' => __('404  Title', 'firebrick-admin'),
            'default'=>'Whoops'
        ),
        array(
            'id'=>'settings_404_subheading',
            'type' => 'text',
            'title' => __('404 Sub Title', 'firebrick-admin'),
            'default'=>'BAD TRIP, MAN!'
        ),
        array(
            'id'=>'settings_404_text',
            'type' => 'text',
            'title' => __('404 Text', 'firebrick-admin'),
            'default'=>'The page you are looking for doesn’t exit.'
        ),
    )
); //404

global $ReduxFramework;
$ReduxFramework = new ReduxFramework($sections, $args, $tabs);







