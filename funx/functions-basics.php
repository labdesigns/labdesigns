<?php


/**
 * Enqueue scripts and styles.
 */
function labdesigns_scripts()
{
    wp_enqueue_style('labdesigns-style-override', get_stylesheet_uri(), array());
    wp_enqueue_style('labdesigns-mainstyle', get_template_directory_uri() . '/css/styles.css', array());


    wp_enqueue_script('labdesigns-custom', get_template_directory_uri() . '/js/custom.js', array(), false, true);
    wp_localize_script('labdesigns-custom', 'WPURLS', array('siteurl' => get_option('siteurl')));




    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_front_page()) {
        wp_enqueue_style('glideCSS', get_template_directory_uri() . '/css/libs/glide.core.min.css', array());
        wp_enqueue_script('glideJS', get_template_directory_uri() . '/js/glide.min.js', array(), true);
    }
}
add_action('wp_enqueue_scripts', 'labdesigns_scripts');



if (!function_exists('labdesigns_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function labdesigns_setup()
    {
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'labdesigns'),
                'footer_bottom_menu'  => __('Footer bottom Menu', 'labdesigns'),
                'expertise_submenu' => esc_html__('Expertise submenu', 'labdesigns'),

            )
        );

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        // activate featured images
        add_theme_support('post-thumbnails');
    }
endif;
add_action('after_setup_theme', 'labdesigns_setup');


//////////////////////////////////        Disable xmlrpc

add_filter('xmlrpc_enabled', '__return_false');

//////////////////////////////////        Disable Post revisions

define('WP_POST_REVISIONS', false);


//////////////////////////////////        Disable Gutenberg
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
    return false;
}


//////////////////////////////////        Disable Gutenberg Css loading

function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);







//////////////////////////////////        Disable  wp scripts 


function deregister_wp_scripts()
{
    if (!is_admin()) {
        wp_deregister_script('wp-polyfill');
        wp_deregister_script('wp-emoji-release');
    }
}
add_action('init', 'deregister_wp_scripts');
