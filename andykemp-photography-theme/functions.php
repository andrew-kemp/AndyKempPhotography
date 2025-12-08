<?php
/**
 * Andy Kemp Photography Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function andykemp_photography_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('customize-selective-refresh-widgets');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'andykemp-photography'),
        'portfolio' => __('Portfolio Menu', 'andykemp-photography'),
    ));
    
    // Add image sizes for portfolio
    add_image_size('portfolio-thumb', 400, 300, true);
    add_image_size('portfolio-large', 800, 600, true);
    add_image_size('hero-image', 1920, 1080, true);
}
add_action('after_setup_theme', 'andykemp_photography_setup');

/**
 * Enqueue Scripts and Styles
 */
function andykemp_photography_scripts() {
    // Enqueue stylesheet
    wp_enqueue_style('andykemp-photography-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', false);
    
    // Enqueue Font Awesome for social icons
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', false);
    
    // Enqueue custom JavaScript
    wp_enqueue_script('andykemp-photography-script', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '1.0.0', true);
    
    // Localize script for theme customizer options
    wp_localize_script('andykemp-photography-script', 'themeOptions', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('theme_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'andykemp_photography_scripts');

/**
 * Register Widget Areas
 */
function andykemp_photography_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'andykemp-photography'),
        'id' => 'footer-widgets',
        'description' => __('Add widgets here to appear in your footer.', 'andykemp-photography'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'andykemp_photography_widgets_init');

/**
 * Customizer Settings
 */
function andykemp_photography_customize_register($wp_customize) {
    
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'andykemp-photography'),
        'priority' => 30,
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => __('Hero Background Image', 'andykemp-photography'),
        'section' => 'hero_section',
        'settings' => 'hero_background_image',
    )));
    
    // Site Tagline Override
    $wp_customize->add_setting('custom_tagline', array(
        'default' => get_bloginfo('description'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('custom_tagline', array(
        'label' => __('Custom Tagline', 'andykemp-photography'),
        'section' => 'hero_section',
        'type' => 'text',
    ));
    
    // Social Media Section
    $wp_customize->add_section('social_media', array(
        'title' => __('Social Media', 'andykemp-photography'),
        'priority' => 40,
    ));
    
    // Social media links
    $social_networks = array(
        'instagram' => 'Instagram',
        'facebook' => 'Facebook',
        'twitter' => 'Twitter/X',
        'linkedin' => 'LinkedIn',
        'youtube' => 'YouTube',
        'pinterest' => 'Pinterest'
    );
    
    foreach ($social_networks as $network => $label) {
        $wp_customize->add_setting('social_' . $network, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control('social_' . $network, array(
            'label' => sprintf(__('%s URL', 'andykemp-photography'), $label),
            'section' => 'social_media',
            'type' => 'url',
        ));
    }
    
    // Theme Options
    $wp_customize->add_section('theme_options', array(
        'title' => __('Theme Options', 'andykemp-photography'),
        'priority' => 50,
    ));
    
    // Default Theme Mode
    $wp_customize->add_setting('default_theme_mode', array(
        'default' => 'light',
        'sanitize_callback' => 'andykemp_photography_sanitize_theme_mode',
    ));
    
    $wp_customize->add_control('default_theme_mode', array(
        'label' => __('Default Theme Mode', 'andykemp-photography'),
        'section' => 'theme_options',
        'type' => 'select',
        'choices' => array(
            'light' => __('Light Mode', 'andykemp-photography'),
            'dark' => __('Dark Mode', 'andykemp-photography'),
        ),
    ));
}
add_action('customize_register', 'andykemp_photography_customize_register');

/**
 * Sanitize theme mode
 */
function andykemp_photography_sanitize_theme_mode($input) {
    $valid = array('light', 'dark');
    return in_array($input, $valid) ? $input : 'light';
}

/**
 * Get Social Media Links
 */
function andykemp_photography_get_social_links() {
    $social_networks = array(
        'instagram' => array('icon' => 'fab fa-instagram', 'label' => 'Instagram'),
        'facebook' => array('icon' => 'fab fa-facebook-f', 'label' => 'Facebook'),
        'twitter' => array('icon' => 'fab fa-x-twitter', 'label' => 'Twitter/X'),
        'linkedin' => array('icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'),
        'youtube' => array('icon' => 'fab fa-youtube', 'label' => 'YouTube'),
        'pinterest' => array('icon' => 'fab fa-pinterest-p', 'label' => 'Pinterest')
    );
    
    $social_links = array();
    foreach ($social_networks as $network => $data) {
        $url = get_theme_mod('social_' . $network);
        if (!empty($url)) {
            $social_links[$network] = array(
                'url' => $url,
                'icon' => $data['icon'],
                'label' => $data['label']
            );
        }
    }
    
    return $social_links;
}

/**
 * Custom Walker for Navigation Menu
 */
class AndyKemp_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
        $attributes .= ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) .'"' : '';
        $attributes .= ! empty($item->url) ? ' href="' . esc_attr($item->url) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Portfolio Post Type (if you want to use custom post types instead of pages)
 */
function andykemp_photography_portfolio_post_type() {
    $args = array(
        'public' => true,
        'label' => 'Portfolio',
        'labels' => array(
            'name' => 'Portfolio Items',
            'singular_name' => 'Portfolio Item',
            'add_new' => 'Add New Portfolio Item',
            'add_new_item' => 'Add New Portfolio Item',
            'edit_item' => 'Edit Portfolio Item',
            'new_item' => 'New Portfolio Item',
            'view_item' => 'View Portfolio Item',
            'search_items' => 'Search Portfolio Items',
            'not_found' => 'No portfolio items found',
            'not_found_in_trash' => 'No portfolio items found in Trash'
        ),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-camera'
    );
    register_post_type('portfolio', $args);
}
add_action('init', 'andykemp_photography_portfolio_post_type');

/**
 * Portfolio Taxonomy
 */
function andykemp_photography_portfolio_taxonomy() {
    $args = array(
        'hierarchical' => true,
        'labels' => array(
            'name' => 'Portfolio Categories',
            'singular_name' => 'Portfolio Category',
            'search_items' => 'Search Portfolio Categories',
            'all_items' => 'All Portfolio Categories',
            'parent_item' => 'Parent Portfolio Category',
            'parent_item_colon' => 'Parent Portfolio Category:',
            'edit_item' => 'Edit Portfolio Category',
            'update_item' => 'Update Portfolio Category',
            'add_new_item' => 'Add New Portfolio Category',
            'new_item_name' => 'New Portfolio Category Name',
            'menu_name' => 'Portfolio Categories'
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'portfolio-category'),
        'show_in_rest' => true,
    );
    register_taxonomy('portfolio_category', 'portfolio', $args);
}
add_action('init', 'andykemp_photography_portfolio_taxonomy');