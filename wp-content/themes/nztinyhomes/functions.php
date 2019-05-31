<?php
require_once('modal/class.Base.php');
require_once('modal/class.Plan.php');
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css?' . filemtime(get_stylesheet_directory() . '/css/bootstrap.min.css'));
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css?' . filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style( 'google_font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Libre+Franklin:400,600,700|Caveat');
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.css');
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.js');
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_image_size( 'feature', 575, 575, true);
add_image_size( 'plans', 1200);
add_image_size( 'gallery', 575, 383, true);
add_image_size( 'gallery_thumb', 174, 115, true);
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
function dg_remove_page_templates( $templates ) {
    unset( $templates['page-templates/blank.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );
    unset( $templates['page-templates/both-sidebarspage.php'] );
    unset( $templates['page-templates/empty.php'] );
    unset( $templates['page-templates/fullwidthpage.php'] );
    unset( $templates['page-templates/left-sidebarpage.php'] );
    unset( $templates['page-templates/right-sidebarpage.php'] );

    return $templates;
}
add_filter( 'theme_page_templates', 'dg_remove_page_templates' );

add_action('admin_init', 'my_general_section');
function my_general_section() {
    add_settings_section(
        'my_settings_section', // Section ID
        'Custom Website Settings', // Section Title
        'my_section_options_callback', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'phone', // Option ID
        'Phone Number', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'phone' // Should match Option ID
        )
    );
    add_settings_field( // Option 1
        'mobile', // Option ID
        'Mobile Number', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'mobile' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'email', // Option ID
        'Email', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'email' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'address', // Option ID
        'Address', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'address' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'facebook', // Option ID
        'Facebook Link', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'facebook' // Should match Option ID
        )
    );
    add_settings_field( // Option 2
        'instagram', // Option ID
        'Instagram Link', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed
        'my_settings_section', // Name of our section (General Settings)
        array( // The $args
            'instagram' // Should match Option ID
        )
    );

    register_setting('general','phone', 'esc_attr');
    register_setting('general','mobile', 'esc_attr');
    register_setting('general','email', 'esc_attr');
    register_setting('general','address', 'esc_attr');
    register_setting('general','facebook', 'esc_attr');
    register_setting('general','instagram', 'esc_attr');
}

function my_section_options_callback() { // Section Callback
    echo '';
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

function formatPhoneNumber($ph) {
    $ph = str_replace('(', '', $ph);
    $ph = str_replace(')', '', $ph);
    $ph = str_replace(' ', '', $ph);
    $ph = str_replace('+64', '0', $ph);

    return $ph;
}
function getImageID($image_url)
{
    global $wpdb;
    $sql = 'SELECT ID FROM ' . $wpdb->prefix . 'posts WHERE guid = "' . $image_url . '"';
    $result = $wpdb->get_results($sql);

    return $result[0]->ID;
}
add_action('init', 'dt_register_menus');
function dt_register_menus() {
    register_nav_menus(
        Array(
            'footer-menu' => __('Footer Menu'),
        )
    );
}
function template_widgets_init()
{
    register_sidebar( array(
        'name'          => __( 'Footer Widget', 'understrap' ),
        'id'            => 'footerwidget',
        'description'   => 'Widget area in the footer',
        'before_widget'  => '<div class="footer-widget-wrapper">',
        'after_widget'   => '</div><!-- .footer-widget -->',
        'before_title'   => '<h3 class="widget-title">',
        'after_title'    => '</h3>',
    ) );
}
add_action( 'widgets_init', 'template_widgets_init' );
function getPlans() {
    $projects = Array();
    $posts_array = get_posts([
        'post_type' => 'plan',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'menu_order',
        'order' => 'asc'
    ]);
    foreach ($posts_array as $post) {
        $project = new Plan($post);
        $projects[] = $project;
    }
    return $projects;
}
function plans_shortcode() {
    $html = '
    <div class="row plans-wrapper justify-content-center">';
        foreach(getPlans() as $plan) {
            $imageid = getImageID($plan->getFeatureImage());
            $img = wp_get_attachment_image_src($imageid, 'feature');
            $html .= '
            <div class="col-12 col-sm-6 col-md-4 plan-panel">
                <div class="inner-wrapper">          
                    <div class="image-wrapper">
                        <img src="' . $img[0] . '" alt="' . $plan->getTitle() . '" />
                    </div>
                    <div class="content-wrapper">
                        <div class="title">' . $plan->getTitle() . '</div>
                        <ul>
                            <li>Length ' . $plan->getLength() . '</li>
                            <li>Width ' . $plan->getWidth() . '</li>
                            <li>Height ' . $plan->getHeight() . '</li>
                        </ul>
                        <div class="price">' . $plan->getPrice() . '</div>
                        <a href="' . $plan->link() . '" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>';
        }
    $html .= '    
    </div>';

    return $html;
}
add_shortcode('plans', 'plans_shortcode');
