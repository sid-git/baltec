<?php
/**
 * firebrick functions and definitions
 *
 * @package firebrick
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
global $themebucket_firebrick;
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/ReduxFramework/ReduxCore/framework.php')) {
    require_once(dirname(__FILE__) . '/ReduxFramework/ReduxCore/framework.php');
}
if (!isset($redux_demo) && file_exists(dirname(__FILE__) . '/ReduxFramework/admin.php')) {
    require_once(dirname(__FILE__) . '/ReduxFramework/admin.php');
}

define('ATTACHMENTS_DEFAULT_INSTANCE', false); // disable the Settings screen


if (!isset($content_width)) {
    $content_width = 640; /* pixels */
}

if (!function_exists('firebrick_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function firebrick_setup()
    {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on firebrick, use a find and replace
         * to change 'firebrick' to the name of your theme in all the template files
         */
        load_theme_textdomain('firebrick', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'firebrick'),
            'secondary' => __('Blog Menu', 'firebrick'),
        ));

        // Enable support for Post Formats.
        add_theme_support('post-formats', array( 'quote'));

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('firebrick_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Enable support for HTML5 markup.
        add_theme_support('html5', array('comment-list', 'search-form', 'comment-form',));
        add_image_size("portfolio-thumb", "577", "500", true);
        add_image_size("news-thumb", "122", "122", true);
        add_image_size("portfolio-items", "1200", "800", true);
        add_image_size("client-logo", "206", "999", false);
        add_image_size("blog-sidebar", "81", "81",true);
        add_image_size("home-blog-thumb", "336", "999");

        update_option("firebrick_sections",firebrick_get_enabled_sections());
    }
endif; // firebrick_setup
add_action('after_setup_theme', 'firebrick_setup');

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function firebrick_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'firebrick'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Blog Sidebar","firebrick")
    ));

    register_sidebar(array(
        'name' => __('Footer Left', 'firebrick'),
        'id' => 'sidebar-footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Footer Left Sidebar","firebrick")
    ));

    register_sidebar(array(
        'name' => __('Footer Middle', 'firebrick'),
        'id' => 'sidebar-footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Footer Middle Sidebar", "firebrick")
    ));

    register_sidebar(array(
        'name' => __('Footer Right', 'firebrick'),
        'id' => 'sidebar-footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
        'description'=>__("Footer Right Sidebar","firebrick")
    ));
}

add_action('widgets_init', 'firebrick_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function firebrick_scripts()
{
    global $themebucket_firebrick;
    wp_enqueue_style('firebrick-style', get_stylesheet_uri());
    wp_enqueue_script("jquery");
    if(!isset($themebucket_firebrick['firebrick_color'])) $themebucket_firebrick['firebrick_color']=0;
    switch($themebucket_firebrick['firebrick_color']){
        case 1: //blue
            $themebucket_firebrick_color = "#5bc7f6";
            break;
        case 2: //green
            $themebucket_firebrick_color = "#9cba30";
            break;
        case 3: //navy
            $themebucket_firebrick_color = "#7290ce";
            break;
        case 4: //purple
            $themebucket_firebrick_color = "#a48ad4";
            break;
        case 5: //red
            $themebucket_firebrick_color = "#fc6f5c";
            break;
        case 6: //turquoise
            $themebucket_firebrick_color = "#53bdbd";
            break;
        case 7: //turquoise
            $themebucket_firebrick_color = $themebucket_firebrick['firebrick_custom_color'];
            break;
        default:
            $themebucket_firebrick_color = "#ff6c5f";
            break;
    }

    if (is_page() && basename(get_page_template())=="landing-page.php") {
        wp_enqueue_style('fontawesome', "//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css");
        wp_enqueue_style('royal', get_template_directory_uri() . "/css/royal_preloader.css");
        wp_enqueue_style('firebrick', get_template_directory_uri() . "/css/styles.css", null, "12.0");
        //wp_enqueue_style('colio', get_template_directory_uri() . "/css/colio.css");
        wp_enqueue_style('megafolio', get_template_directory_uri() . "/css/megafolio-style.css",null,"1.0");
        wp_enqueue_style('megafoliosettings', get_template_directory_uri() . "/css/megafolio-settings.css",null,'2');
        wp_enqueue_style('animate', get_template_directory_uri() . "/css/animate.css");
        wp_enqueue_style('owlcss', get_template_directory_uri() . "/css/owl.carousel.css");
        wp_enqueue_style('owlthemecss', get_template_directory_uri() . "/css/owl.theme.css");
        wp_enqueue_style('superfish', get_template_directory_uri() . "/css/superfish.css");
        wp_enqueue_style('magnific-popup', get_template_directory_uri() . "/css/magnific-popup.css");
        //wp_enqueue_style('iconfont', get_template_directory_uri() . "/css/icons-font.css");
        wp_enqueue_style('prettify', get_template_directory_uri() . "/css/prettify.css");
        wp_enqueue_style('bs', get_template_directory_uri() . "/css/bootstrap.css");
        wp_enqueue_style('reset', get_template_directory_uri() . "/css/bootstrap-reset.css",null,"1.0");
        wp_enqueue_style('widget', get_template_directory_uri() . "/css/widget.css");
        wp_enqueue_style('default-theme', get_template_directory_uri() . "/css/default-theme.css");
        wp_enqueue_style('gf1', "//fonts.googleapis.com/css?family=Montserrat:400,700");
        wp_enqueue_style('gf2', "//fonts.googleapis.com/css?family=Roboto:400,500,700");
        wp_enqueue_style('gf3', "//fonts.googleapis.com/css?family=Alex+Brush");

        wp_enqueue_script('royaljs', get_template_directory_uri() . '/js/royal_preloader.min.js', array("jquery"), '1', true);
        wp_enqueue_script('royalinit', get_template_directory_uri() . '/js/royal-init.js', array("royaljs"), '3', true);
        wp_enqueue_script('modernizer', get_template_directory_uri() . '/js/modernizr.js', array("jquery"), '1', true);
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array("jquery"), '1', true);
        wp_enqueue_script('easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array("jquery"), '1', true);
        wp_enqueue_script('nav', get_template_directory_uri()."/js/jquery.nav.js", array("jquery"), '1', true);
        wp_enqueue_script('wow', get_template_directory_uri() . "/js/wow.js", array("jquery"), '1', false);
        wp_enqueue_script('isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array("jquery"), '1', true);

        wp_enqueue_script('mega1', get_template_directory_uri() . "/js/jquery.megafolio.plugins.min.js", array("jquery"), '1', true);
        wp_enqueue_script('mega2', get_template_directory_uri() . "/js/jquery.themepunch.megafoliopro.js", array("jquery"), '1', true);
        wp_enqueue_script('fittext', get_template_directory_uri() . '/js/jquery.fittext.js', array("jquery"), '1', true);
        wp_enqueue_script('owlcarousel', get_template_directory_uri() . "/js/owl.carousel.js", array("jquery"), '1', true);
        wp_enqueue_script('scrollto', get_template_directory_uri() . "/js/jquery.scrollTo.js", array("jquery"), '1', true);
        wp_enqueue_script('magnific', get_template_directory_uri() . "/js/jquery.magnific-popup.js", array("jquery"), '1', true);
        wp_enqueue_script('appear', get_template_directory_uri() . "/js/jquery.appear.js", array("jquery"), '1', true);
        wp_enqueue_script('hovereffect', get_template_directory_uri() . '/js/jquery-hover-effect.js', array("jquery"), '1', true);
        wp_enqueue_script('hoverintent', get_template_directory_uri() . "/js/hoverIntent.js", array("jquery"), '1', true);
        wp_enqueue_script('supersub', get_template_directory_uri() . '/js/supersubs.js', array("jquery"), '2', true);
        wp_enqueue_script('superfish', get_template_directory_uri() . "/js/superfish.js", array("jquery"), '1', true);
        wp_enqueue_script('map', "//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false", array(), '1', false);
        wp_enqueue_script('pretty', get_template_directory_uri() . "/js/prettify.js", array("jquery"), '1', true);
        wp_enqueue_script('html5shiv', "//html5shiv.googlecode.com/svn/trunk/html5.js", array("jquery"), '1', true);
        wp_enqueue_script('mapinit', get_template_directory_uri() . "/js/google.map.init.js", array("jquery"), '1', true);
        wp_enqueue_script('parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array("jquery"), '1', true);
        wp_enqueue_script('commons', get_template_directory_uri() . '/js/script.js', array("jquery","mega2"), '6', true);
        wp_localize_script("commons", "wpdata", array("url" => site_url("/"), "td" => get_template_directory_uri()));
        wp_localize_script("mapinit", "wpdata", array("url" => site_url("/"), "td" => get_template_directory_uri()));
        if (isset($themebucket_firebrick['section_contact_lat']) && isset($themebucket_firebrick['section_contact_lon']))
        wp_localize_script("mapinit", "geo", array("lat" => $themebucket_firebrick['section_contact_lat'], "lon" => $themebucket_firebrick['section_contact_lon']));
        if (isset($themebucket_firebrick['section_portfolio_mode']))
        wp_localize_script("commons", "mega", array("layout" => $themebucket_firebrick['section_portfolio_mode']));

    }else{
        //blog
        wp_enqueue_style('animate', get_template_directory_uri() . "/css/animate.css");
        wp_enqueue_style('pretify', get_template_directory_uri() . "/css/prettify.css");
        wp_enqueue_style('fontawesome', "//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css");

        wp_enqueue_style('superfish', get_template_directory_uri() . "/css/superfish.css");
        wp_enqueue_style('blog-style', get_template_directory_uri() . "/css/blog.css", null, "3.0");
        wp_enqueue_style('bs', get_template_directory_uri() . "/css/bootstrap.css");
        wp_enqueue_style('reset', get_template_directory_uri() . "/css/bootstrap-reset.css");
        wp_enqueue_style('widget', get_template_directory_uri() . "/css/widget.css");

        wp_enqueue_style('gf1', "//fonts.googleapis.com/css?family=Montserrat:400,700");
        wp_enqueue_style('gf2', "//fonts.googleapis.com/css?family=Roboto:400,500,700");

        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array("jquery"), '1', true);
        wp_enqueue_script('waypoint', get_template_directory_uri() . "/js/waypoints.js", array("jquery"), '1', true);
        wp_enqueue_script('waypointsticky', get_template_directory_uri() . "/js/waypoints-sticky.js", array("jquery"), '1', true);
        wp_enqueue_script('smoothscroll', get_template_directory_uri() . "/js/jquery.smooth-scroll.js", array("jquery"), '1', true);
        wp_enqueue_script('scrollup', get_template_directory_uri() . '/js/jquery.scrollUp.js', array("jquery"), '1', true);
        wp_enqueue_script('wow', get_template_directory_uri() . "/js/wow.js", array("jquery"), '1', false);
        wp_enqueue_script('superfish', get_template_directory_uri() . "/js/superfish.js", array("jquery"), '1', true);
        wp_enqueue_script('flickrfeed', get_template_directory_uri() . "/js/jflickrfeed.js", array("jquery"), '1', true);
        wp_enqueue_script('blog', get_template_directory_uri() . "/js/blog-init.js", array("jquery","flickrfeed"), '1', true);

    }
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'firebrick_scripts');

/**
 * Implement the Custom Header feature.
 */

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function resume_featured_icon_metaboxes()
{
    $prefix = "_firebrick_";
    $meta_boxes[] = array(
        'id' => 'teammember',
        'title' => __('Social Icons',"firebrick"),
        'pages' => array('teammember'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Order',
                'id' => $prefix . 'team_order',
                'type' => 'text_medium',
            ),
            array(
                'name' => __('Social Icon 1',"firebrick"),
                'id' => $prefix . 'social_icon_1',
                'type' => 'text_medium',
                'default'=>'fa fa-facebook'
            ),
            array(
                'name' => __('Social URL 1',"resui"),
                'id' => $prefix . 'social_url_1',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Social Icon 2',"firebrick"),
                'id' => $prefix . 'social_icon_2',
                'type' => 'text_medium',
                'default'=>'fa fa-twitter'
            ),
            array(
                'name' => __('Social URL 2',"firebrick"),
                'id' => $prefix . 'social_url_2',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Social Icon 3',"firebrick"),
                'id' => $prefix . 'social_icon_3',
                'type' => 'text_medium',
                'default'=>'fa fa-dribbble'
            ),
            array(
                'name' => __('Social URL 3',"firebrick"),
                'id' => $prefix . 'social_url_3',
                'type' => 'text_medium'
            ),

        )
    );



    $meta_boxes[] = array(
        'id' => 'testimonial',
        'title' => __('Testimonial Details (Latest testimonial will be displayed first)',"firebrick"),
        'pages' => array('testimonial'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Photo of the Person ',"firebrick"),
                'id' => $prefix . 'test_image',
                'type' => 'file'
            ),
            array(
                'name' => __('Name of the Person ',"firebrick"),
                'id' => $prefix . 'test_name',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Designation',"firebrick"),
                'id' => $prefix . 'test_designation',
                'type' => 'text_medium'
            ),
            array(
                'name' => __('Testimonial ',"firebrick"),
                'id' => $prefix . 'test_description',
                'type' => 'wysiwyg'
            ),
        )
    );
    $meta_boxes[] = array(
        'id' => 'featuredposts',
        'title' => __('Icon',"firebrick"),
        'pages' => array('featuredposts','service'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => __('Icon Code',"firebrick"),
                'id' => $prefix . 'icon_code',
                'type' => 'text_medium',
                'desc'=>"Font Awesome Icon Class, ex: fa-search. Get the full list <a href='http://fortawesome.github.io/Font-Awesome/cheatsheet/'>Here</a>"
            ),
            array(
                'name' => 'Animation Style',
                'id' => $prefix . 'object_animation',
                'type' => 'select',
                'options'=>array(
                    array("name"=>"No Animation","value"=>''),
                    array("name"=>"Animate from left","value"=>'slideInLeft'),
                    array("name"=>"Animate from right","value"=>'slideInRight'),
                    array("name"=>"Animate from top","value"=>'slideInUp'),
                    array("name"=>"Animate from bottom","value"=>'slideInDown'),
                    array("name"=>"Fade In","value"=>'fadeIn'),
                    array("name"=>"Fade from left","value"=>'fadeInLeft'),
                    array("name"=>"Fade from right","value"=>'fadeInRight'),
                    array("name"=>"Fade from top","value"=>'fadeInUp'),
                    array("name"=>"Fade from bottom","value"=>'fadeInDown'),

                )
            )
        )
    );



    $meta_boxes[] = array(
        'id' => 'pricingtabledetals',
        'title' => 'Pricing Table',
        'pages' => array('pricingtable'), // post type
        'context' => 'advanced',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
                'name' => 'Featured',
                'id' => $prefix . 'pricing_featured',
                'type' => 'checkbox',
            ),
            array(
                'name' => 'Order',
                'id' => $prefix . 'pricing_order',
                'type' => 'text_medium',
            ),
            array(
                'name' => 'Price',
                'id' => $prefix . 'pricing_price',
                'type' => 'text_medium',
            ),
            array(
                'name' => 'Table Elements (One in each line)',
                'id' => $prefix . 'pricing_elements',
                'type' => 'textarea',
            ),
            array(
                'name' => 'Button text',
                'id' => $prefix . 'pricing_button',
                'type' => 'text_medium',
                'std'=>"Get Now"

            ),
            array(
                'name' => 'Button link',
                'id' => $prefix . 'pricing_button_link',
                'type' => 'text_medium',
                'std'=>"#"
            ),
            array(
                'name' => 'Animation Style',
                'id' => $prefix . 'pricing_animation',
                'type' => 'select',
                'options'=>array(
                    array("name"=>"No Animation","value"=>''),
                    array("name"=>"Animate from left","value"=>'slideInLeft'),
                    array("name"=>"Animate from right","value"=>'slideInRight'),
                    array("name"=>"Animate from top","value"=>'slideInUp'),
                    array("name"=>"Animate from bottom","value"=>'slideInDown'),
                    array("name"=>"Fade In","value"=>'fadeIn'),
                    array("name"=>"Fade from left","value"=>'fadeInLeft'),
                    array("name"=>"Fade from right","value"=>'fadeInRight'),
                    array("name"=>"Fade from top","value"=>'fadeInUp'),
                    array("name"=>"Fade from bottom","value"=>'fadeInDown'),

                )
            )
        )
    );

    return $meta_boxes;
}

add_filter('cmb_meta_boxes', 'resume_featured_icon_metaboxes');

// Initialize the metabox class
add_action('init', 'resume_initialize_cmb_meta_boxes', 9999);
function resume_initialize_cmb_meta_boxes()
{
    if (!class_exists('cmb_Meta_Box')) {
        require_once('libs/cmb/init.php');
    }
}


function firebrick_custom_posts()
{

    $labels1 = array(
        'name' => _x('Featured posts', 'Post Type General Name', 'firebrick'),
        'singular_name' => _x('Featured posts', 'Post Type Singular Name', 'firebrick'),
        'menu_name' => __('Featured posts', 'firebrick'),
        'parent_item_colon' => __('Parent Featured posts:', 'firebrick'),
        'all_items' => __('All Featured posts', 'firebrick'),
        'view_item' => __('View Featured posts', 'firebrick'),
        'add_new_item' => __('Add New Featured posts', 'firebrick'),
        'add_new' => __('New Featured posts', 'firebrick'),
        'edit_item' => __('Edit Featured posts', 'firebrick'),
        'update_item' => __('Update Featured posts', 'firebrick'),
        'search_items' => __('Search Featured posts', 'firebrick'),
        'not_found' => __('No featured posts found', 'firebrick'),
        'not_found_in_trash' => __('No featured posts found in Trash', 'firebrick'),
    );
    $args1 = array(
        'label' => __('Featured posts', 'firebrick'),
        'description' => __('Featured posts', 'firebrick'),
        'labels' => $labels1,
        'supports' => array('title','thumbnail','editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/featuredposts.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('featuredposts', $args1);

    $labels2 = array(
        'name' => _x('Team members', 'Post Type General Name', 'firebrick'),
        'singular_name' => _x('Team member', 'Post Type Singular Name', 'firebrick'),
        'menu_name' => __('Team members', 'firebrick'),
        'parent_item_colon' => __('Parent Team member:', 'firebrick'),
        'all_items' => __('All Team members', 'firebrick'),
        'view_item' => __('View Team member', 'firebrick'),
        'add_new_item' => __('Add New Team member', 'firebrick'),
        'add_new' => __('New Team member', 'firebrick'),
        'edit_item' => __('Edit Team member', 'firebrick'),
        'update_item' => __('Update Team member', 'firebrick'),
        'search_items' => __('Search Team members', 'firebrick'),
        'not_found' => __('No team member found', 'firebrick'),
        'not_found_in_trash' => __('No team members found in Trash', 'firebrick'),
    );
    $args2 = array(
        'label' => __('Team member', 'firebrick'),
        'description' => __('Team member', 'firebrick'),
        'labels' => $labels2,
        'supports' => array('title','thumbnail','editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/teammember.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('teammember', $args2);

    $labels5 = array(
        'name' => _x('News', 'Post Type General Name', 'firebrick'),
        'singular_name' => _x('News', 'Post Type Singular Name', 'firebrick'),
        'menu_name' => __('News', 'firebrick'),
        'parent_item_colon' => __('Parent News:', 'firebrick'),
        'all_items' => __('All News', 'firebrick'),
        'view_item' => __('View News', 'firebrick'),
        'add_new_item' => __('Add New News', 'firebrick'),
        'add_new' => __('New News', 'firebrick'),
        'edit_item' => __('Edit News', 'firebrick'),
        'update_item' => __('Update News', 'firebrick'),
        'search_items' => __('Search News', 'firebrick'),
        'not_found' => __('No news found', 'firebrick'),
        'not_found_in_trash' => __('No news found in Trash', 'firebrick'),
    );
    $args5 = array(
        'label' => __('News', 'firebrick'),
        'description' => __('News', 'firebrick'),
        'labels' => $labels5,
        'supports' => array('title','thumbnail','editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/news.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('news', $args5);

    $labels3 = array(
        'name' => _x('Portfolios', 'Post Type General Name', 'firebrick'),
        'singular_name' => _x('Portfolio', 'Post Type Singular Name', 'firebrick'),
        'menu_name' => __('Portfolios', 'firebrick'),
        'parent_item_colon' => __('Parent Portfolio:', 'firebrick'),
        'all_items' => __('All Portfolios', 'firebrick'),
        'view_item' => __('View Portfolio', 'firebrick'),
        'add_new_item' => __('Add New Portfolio', 'firebrick'),
        'add_new' => __('New Portfolio', 'firebrick'),
        'edit_item' => __('Edit Portfolio', 'firebrick'),
        'update_item' => __('Update Portfolio', 'firebrick'),
        'search_items' => __('Search Portfolios', 'firebrick'),
        'not_found' => __('No portfolio found', 'firebrick'),
        'not_found_in_trash' => __('No portfolios found in Trash', 'firebrick'),
    );
    $args3 = array(
        'label' => __('Portfolio', 'firebrick'),
        'description' => __('Portfolio', 'firebrick'),
        'labels' => $labels3,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/portfolio.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('portfolio', $args3);

    $labels4 = array(
        'name' => _x('Testimonials', 'Post Type General Name', 'firebrick'),
        'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'firebrick'),
        'menu_name' => __('Testimonials', 'firebrick'),
        'parent_item_colon' => __('Parent Testimonial:', 'firebrick'),
        'all_items' => __('All Testimonials', 'firebrick'),
        'view_item' => __('View Testimonial', 'firebrick'),
        'add_new_item' => __('Add New Testimonial', 'firebrick'),
        'add_new' => __('New Testimonial', 'firebrick'),
        'edit_item' => __('Edit Testimonial', 'firebrick'),
        'update_item' => __('Update Testimonial', 'firebrick'),
        'search_items' => __('Search Testimonials', 'firebrick'),
        'not_found' => __('No testimonial found', 'firebrick'),
        'not_found_in_trash' => __('No testimonials found in Trash', 'firebrick'),
    );
    $args4 = array(
        'label' => __('Testimonial', 'firebrick'),
        'description' => __('Testimonial', 'firebrick'),
        'labels' => $labels4,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/testimonial.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('testimonial', $args4);

    $labels6 = array(
        'name' => _x('Services', 'Post Type General Name', 'firebrick'),
        'singular_name' => _x('Service', 'Post Type Singular Name', 'firebrick'),
        'menu_name' => __('Services', 'firebrick'),
        'parent_item_colon' => __('Parent Service:', 'firebrick'),
        'all_items' => __('All Services', 'firebrick'),
        'view_item' => __('View Service', 'firebrick'),
        'add_new_item' => __('Add New Service', 'firebrick'),
        'add_new' => __('New Service', 'firebrick'),
        'edit_item' => __('Edit Service', 'firebrick'),
        'update_item' => __('Update Service', 'firebrick'),
        'search_items' => __('Search Services', 'firebrick'),
        'not_found' => __('No service found', 'firebrick'),
        'not_found_in_trash' => __('No services found in Trash', 'firebrick'),
    );
    $args6 = array(
        'label' => __('Service', 'firebrick'),
        'description' => __('Service', 'firebrick'),
        'labels' => $labels6,
        'supports' => array('title','editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri() . '/img/menuicon/service.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('service', $args6);

    $labels7 = array(
        'name' => _x('Pricing tables', 'Post Type General Name', 'firebrick'),
        'singular_name' => _x('Pricing table', 'Post Type Singular Name', 'firebrick'),
        'menu_name' => __('Pricing tables', 'firebrick'),
        'parent_item_colon' => __('Parent Pricing table:', 'firebrick'),
        'all_items' => __('All Pricing tables', 'firebrick'),
        'view_item' => __('View Pricing table', 'firebrick'),
        'add_new_item' => __('Add New Pricing table', 'firebrick'),
        'add_new' => __('New Pricing table', 'firebrick'),
        'edit_item' => __('Edit Pricing table', 'firebrick'),
        'update_item' => __('Update Pricing table', 'firebrick'),
        'search_items' => __('Search Pricing tables', 'firebrick'),
        'not_found' => __('No Pricing table found', 'firebrick'),
        'not_found_in_trash' => __('No Pricing tables found in Trash', 'firebrick'),
    );
    $args7 = array(
        'label' => __('Pricing table', 'firebrick'),
        'description' => __('Pricing table', 'firebrick'),
        'labels' => $labels7,
        'supports' => array('title'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'menu_icon' => get_template_directory_uri().'/img/menuicon/pricingtable.png',
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('pricingtable', $args7);
}

add_action('init', 'firebrick_custom_posts', 0);


/**
 *  Attachments for Portfolio
 */

function firebrick_portfolio($attachments)
{
    $fields = array(
        array(
            'name' => 'title', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Title (optional)', 'attachments'), // label to display
        ),
        array(
            'name' => 'tags', // unique field name
            'type' => 'text', // registered field type
            'label' => __('Comma separated tags (optional)', 'attachments'), // label to display
        ),
        array(
            'name' => 'url', // unique field name
            'type' => 'text', // registered field type
            'label' => __('URL (optional)', 'attachments'), // label to display
        ),
        array(
            'name' => 'description', // unique field name
            'type' => 'textarea', // registered field type
            'label' => __('Desciption (optional)', 'attachments'), // label to display
        ),

    );

    $args = array(

        'label' => __('Add Gallery Items',"firebrick"),
        'post_type' => array('portfolio'),
        'position' => 'advanced',
        'priority' => 'high',
        'filetype' => array("image"), // no filetype limit
        'append' => true,
        'button_text' => __('Attach Images', 'attachments'),
        'fields' => $fields,
    );


    $attachments->register('firebrick_portfolio', $args); // unique instance name
}

add_action('attachments_register', 'firebrick_portfolio');


function firebrick_get_custom_posts($type, $limit = 20, $order = "DESC")
{
    //wp_reset_postdata();
    $args = array(
        "posts_per_page" => $limit,
        "post_type" => $type,
        "orderby" => "ID",
        "order" => $order,
    );
    $custom_posts = get_posts($args);
    return $custom_posts;
}

function firebrick_get_custom_posts_by_custom_order($type, $limit = 20, $meta_order_key = "_firebrick_section_order", $order = "ASC")
{
    $args = array(
        "posts_per_page" => $limit,
        "post_type" => $type,
        "orderby" => "meta_value_num",
        "order" => "ASC",
        "meta_key" => $meta_order_key
    );
    $custom_posts = get_posts($args);
    return $custom_posts;
}

function firebrick_truncate($string, $limit, $break=".", $pad="...")
{
    // return with no change if string is shorter than $limit
    if(strlen($string) <= $limit) return $string;

    // is $break present between $limit and the end of the string?
    if(false !== ($breakpoint = strpos($string, $break, $limit))) {
        if($breakpoint < strlen($string) - 1) {
            $string = substr($string, 0, $breakpoint) . $pad;
        }
    }

    return $string;
}


function firebrick_comment_author($id, $comment_id)
{
    $user = new WP_User($id);
    if ($user) {
        return $user->display_name;
    }
    return get_comment_author($comment_id);
}

function firebrick_user_display_name($id)
{
    $user = new WP_User($id);
    return $user->display_name;
}

/**
 * Add custom class to the comment reply link
 */
add_filter('comment_reply_link', 'firebrick_replace_reply_link_class');

function firebrick_replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link pull-right reply", $class);
    return $class;
}

function firebrick_get_latest_commented_posts($limit = 3){
    global $wpdb;
    $query = "select wp_posts.*, max(comment_date) as comment_date
                from {$wpdb->posts} wp_posts
                right join {$wpdb->comments}
                on id = comment_post_id
                group by ID
                order by comment_date desc
                limit {$limit}";
    $custom_posts = $wpdb->get_results($query, OBJECT);
    return $custom_posts;
}

function firebrick_get_blog_link(){
    $blog_post = get_option("page_for_posts");
    if($blog_post){
        $permalink = get_permalink($blog_post);
    }
    else
        $permalink = site_url();
    return $permalink;
}

function firebrick_get_rev_sliders(){
    global $wpdb;
    $sliders = array(0=>"Select a Revolution Slider");
    $query = "SELECT * FROM {$wpdb->prefix}revslider_sliders order by title";
    $custom_posts = $wpdb->get_results($query, OBJECT);
    foreach($custom_posts as $cs){
        $sliders[] = $cs->alias;
    }
    return $sliders;
}

function firebrick_get_enabled_sections(){
    global $themebucket_firebrick;
    $sections = array();
    if($themebucket_firebrick['section_abtme_display']) $sections['section-abtme'] = "About Me";
    if($themebucket_firebrick['section_parallax_display']) $sections['section-parallax'] = "Quote";
    if($themebucket_firebrick['section_team_display']) $sections['section-team'] = "Team";
    if($themebucket_firebrick['section_news_display']) $sections['section-news'] = "News";
    if($themebucket_firebrick['section_services_display']) $sections['section-services'] = "Services";
    if($themebucket_firebrick['section_pricing_display']) $sections['section-pricing'] = "Pricing";
    if($themebucket_firebrick['section_portfolio_display']) $sections['section-portfolio'] = "Portfolio";
    //if($themebucket_firebrick['section_parallax2_display']) $sections['section-parallax2'] = "Parallax 2";
    if($themebucket_firebrick['section_blog_display']) $sections['section-blog'] = "Blog";
    if($themebucket_firebrick['section_testimonial_display']) $sections['section-testimonial'] = "Testimonial";
    if($themebucket_firebrick['section_contact_display']) $sections['section-contact'] = "Contact";
    return ($sections);
}

function firebrick_get_all_sections(){
    $sections = array();
    $sections['section-abtme'] = "About Me";
    $sections['section-parallax'] = "Quote";
    $sections['section-team'] = "Team";
    $sections['section-news'] = "News";
    $sections['section-services'] = "Services";
    $sections['section-pricing'] = "Pricing";
    $sections['section-portfolio'] = "Portfolio";
    //$sections['section-parallax2'] = "Parallax 2";
    $sections['section-blog'] = "blog";
    $sections['section-testimonial'] = "testimonial";
    $sections['section-contact'] = "contact";
    return $sections;
}

//show_admin_bar(false);

add_action( 'wp_ajax_nopriv_sendmail', 'firebrick_sendmail' );
add_action( 'wp_ajax_sendmail', 'firebrick_sendmail' );

function firebrick_sendmail(){
    global $themebucket_firebrick;
    $receiver = $themebucket_firebrick['section_contact_receiver'];
    $message = $themebucket_firebrick['section_contact_message'];
    if(!$message) $message = "Your mesage was successfully sent";
    $headers = "From: {$_REQUEST['name']} <{$_REQUEST['email']}> \n";
    //print_r($_REQUEST);
    $res = wp_mail($receiver,$_POST['subject'],$_POST['message'],$headers);
    echo $message;
    die();
}

/**
 * TGMA
 */
add_action( 'tgmpa_register', 'firebrick_register_required_plugins' );

function firebrick_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name, slug and required.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'                  => 'Attachments', // The plugin name
            'slug'                  => 'attachments', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/attachments.zip', // The plugin source
            'required'              => true, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => false, // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'                  => 'Revolution Slider', // The plugin name
            'slug'                  => 'revslider', // The plugin slug (typically the folder name)
            'source'                => get_template_directory_uri() . '/plugins/revslider.zip', // The plugin source
            'required'              => false, // If false, the plugin is only 'recommended' instead of required
            'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'          => false, // If set, overrides default API URL and points to an external URL
        ),

    );

    // Change this to your theme text domain, used for internationalising strings
    $theme_text_domain = 'firebrick';

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'            => $theme_text_domain,           // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                           // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',         // Default parent menu slug
        'parent_url_slug'   => 'themes.php',         // Default parent URL slug
        'menu'              => 'install-required-plugins',   // Menu slug
        'has_notices'       => true,                         // Show admin notices or not
        'is_automatic'      => false,            // Automatically activate plugins after installation or not
        'message'           => '',               // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ) // %1$s = dashboard link
        )
    );

    tgmpa( $plugins, $config );

}

function firebrick_has_next($array, $pointer){
    if(isset($array[$pointer+1])) return true;
    return false;
}

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


add_filter( 'widget_posts_args', 'wp130512_recent_posts_args');

/**
 * Add CPTs to recent posts widget
 *
 * @param array $args default widget args.
 * @return array $args filtered args.
 */
function wp130512_recent_posts_args($args) {
    $args['post_type'] = array('news');
    return $args;
}