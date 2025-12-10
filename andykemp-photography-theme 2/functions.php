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
    
    // Enable excerpts for pages (for gallery descriptions)
    add_post_type_support('page', 'excerpt');
    
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
 * Include Custom Blocks
 */
require_once get_template_directory() . '/blocks/featured-galleries.php';

/**
 * Enqueue Scripts and Styles
 */
function andykemp_photography_scripts() {
    // Enqueue stylesheet
    wp_enqueue_style('andykemp-photography-style', get_stylesheet_uri(), array(), '1.0.9');
    
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
    
    register_sidebar(array(
        'name' => __('Homepage Content', 'andykemp-photography'),
        'id' => 'homepage-content',
        'description' => __('Add widgets here to appear on your homepage.', 'andykemp-photography'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
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
        'flickr' => 'Flickr',
        'youtube' => 'YouTube',
        'facebook' => 'Facebook',
        'twitter' => 'Twitter/X',
        'linkedin' => 'LinkedIn',
        'pinterest' => 'Pinterest',
        'behance' => 'Behance',
        'vimeo' => 'Vimeo'
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
        'flickr' => array('icon' => 'fab fa-flickr', 'label' => 'Flickr'),
        'youtube' => array('icon' => 'fab fa-youtube', 'label' => 'YouTube'),
        'facebook' => array('icon' => 'fab fa-facebook-f', 'label' => 'Facebook'),
        'twitter' => array('icon' => 'fab fa-x-twitter', 'label' => 'Twitter/X'),
        'linkedin' => array('icon' => 'fab fa-linkedin-in', 'label' => 'LinkedIn'),
        'pinterest' => array('icon' => 'fab fa-pinterest-p', 'label' => 'Pinterest'),
        'behance' => array('icon' => 'fab fa-behance', 'label' => 'Behance'),
        'vimeo' => array('icon' => 'fab fa-vimeo-v', 'label' => 'Vimeo')
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
        
        // Check if this item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
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
        
        // Add mobile sub-menu toggle button if this item has children
        if ($has_children) {
            $item_output .= '<button class="mobile-submenu-toggle" aria-label="Toggle ' . esc_attr($item->title) . ' submenu"><i class="fas fa-chevron-down"></i></button>';
        }
        
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Add gallery-specific image size for the galleries page
 */
function andykemp_photography_gallery_image_sizes() {
    add_image_size('gallery-thumb', 600, 375, true); // 16:10 aspect ratio for galleries page
}
add_action('after_setup_theme', 'andykemp_photography_gallery_image_sizes');

/**
 * Custom function to get gallery pages for easier management
 * You can use this to get all gallery pages programmatically
 */
function andykemp_get_gallery_pages($parent_id = null) {
    $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => array('page-gallery.php', 'page-galleries.php'),
                'compare' => 'NOT IN'
            )
        )
    );
    
    if ($parent_id) {
        $args['post_parent'] = $parent_id;
    }
    
    return get_posts($args);
}

/**
 * Get Latest Gallery Pages
 * Returns the most recently updated gallery pages with featured images
 */
function andykemp_photography_get_latest_galleries($limit = 3, $parent_id = 0) {
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'orderby' => 'modified',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
            )
        ),
        // Exclude main pages like home, about, contact
        'post__not_in' => array(
            get_option('page_on_front'), // Homepage
            get_option('page_for_posts'), // Blog page
        )
    );
    
    // If parent page is specified, get only child pages
    if ($parent_id > 0) {
        $args['post_parent'] = $parent_id;
        // Get child pages directly without filtering since we have a specific parent
        return get_posts($args);
    }
    
    // Original auto-detection logic for when no parent is specified
    $galleries = get_posts($args);
    
    // Filter out pages that don't look like galleries
    $filtered_galleries = array();
    foreach ($galleries as $gallery) {
        // Skip if it's a main navigation page or doesn't have content that suggests it's a gallery
        $slug = $gallery->post_name;
        $title = strtolower($gallery->post_title);
        
        // Skip common non-gallery pages
        if (in_array($slug, array('about', 'contact', 'home', 'blog'))) {
            continue;
        }
        
        // Include if it has gallery-like characteristics
        if (has_post_thumbnail($gallery->ID) && 
            (strpos($title, 'gallery') !== false || 
             strpos($title, 'collection') !== false || 
             strpos($slug, 'galleries') !== false ||
             get_post_meta($gallery->ID, '_wp_page_template', true) === 'page-galleries.php')) {
            $filtered_galleries[] = $gallery;
        }
    }
    
    return array_slice($filtered_galleries, 0, $limit);
}

/**
 * Latest Galleries Widget
 */
class Latest_Galleries_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'latest_galleries_widget',
            __('Latest Galleries', 'andykemp-photography'),
            array('description' => __('Display your latest gallery pages with featured images.', 'andykemp-photography'))
        );
    }

    public function widget($args, $instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Latest Galleries', 'andykemp-photography');
        $subtitle = !empty($instance['subtitle']) ? $instance['subtitle'] : __('Discover my most recent photographic work', 'andykemp-photography');
        $number = !empty($instance['number']) ? absint($instance['number']) : 3;
        $parent_page = !empty($instance['parent_page']) ? absint($instance['parent_page']) : 0;
        $show_cta = !empty($instance['show_cta']) ? $instance['show_cta'] : true;
        $cta_text = !empty($instance['cta_text']) ? $instance['cta_text'] : __('View All Galleries', 'andykemp-photography');
        $cta_url = !empty($instance['cta_url']) ? $instance['cta_url'] : home_url('/galleries/');

        echo $args['before_widget'];

        $latest_galleries = andykemp_photography_get_latest_galleries($number, $parent_page);

        if (!empty($latest_galleries)) : ?>

        <div class="latest-galleries-widget">
            <div class="container">
                <?php if ($title) : ?>
                <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($subtitle) : ?>
                <p class="section-subtitle"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
                
                <div class="galleries-grid">
                    <?php foreach ($latest_galleries as $gallery) : 
                        $gallery_url = get_permalink($gallery->ID);
                        $gallery_title = get_the_title($gallery->ID);
                        $gallery_excerpt = get_the_excerpt($gallery->ID);
                        $featured_image_url = get_the_post_thumbnail_url($gallery->ID, 'portfolio-large');
                        
                        // Fallback excerpt if none exists
                        if (empty($gallery_excerpt)) {
                            $content = wp_trim_words(strip_tags($gallery->post_content), 20, '...');
                            $gallery_excerpt = !empty($content) ? $content : 'Explore this stunning collection of photographs.';
                        }
                    ?>
                    
                    <article class="gallery-card">
                        <a href="<?php echo esc_url($gallery_url); ?>" class="gallery-card-link">
                            <?php if ($featured_image_url) : ?>
                            <div class="gallery-card-image">
                                <img src="<?php echo esc_url($featured_image_url); ?>" 
                                     alt="<?php echo esc_attr($gallery_title); ?>" 
                                     loading="lazy">
                                <div class="gallery-card-overlay">
                                    <span class="view-gallery">View Gallery</span>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <div class="gallery-card-content">
                                <h3 class="gallery-card-title"><?php echo esc_html($gallery_title); ?></h3>
                                <p class="gallery-card-excerpt"><?php echo esc_html($gallery_excerpt); ?></p>
                                <span class="gallery-card-date">Updated: <?php echo get_the_modified_date('M j, Y', $gallery->ID); ?></span>
                            </div>
                        </a>
                    </article>
                    
                    <?php endforeach; ?>
                </div>
                
                <?php if ($show_cta && $cta_text && $cta_url) : ?>
                <div class="galleries-cta">
                    <a href="<?php echo esc_url($cta_url); ?>" class="btn btn-primary"><?php echo esc_html($cta_text); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php else : ?>

        <!-- Fallback if no galleries found -->
        <div class="latest-galleries-widget">
            <div class="container">
                <?php if ($title) : ?>
                <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                
                <p class="section-subtitle">Gallery setup in progress</p>
                
                <div class="gallery-setup-notice">
                    <h3>Getting Started with Galleries</h3>
                    <p>To display your latest galleries here:</p>
                    <ol>
                        <li>Create new pages for each gallery collection</li>
                        <li>Add featured images to each gallery page</li>
                        <li>Add excerpts describing each collection</li>
                        <li>Your most recently updated galleries will automatically appear here</li>
                    </ol>
                    <a href="<?php echo admin_url('edit.php?post_type=page'); ?>" class="btn btn-primary">Create Gallery Pages</a>
                </div>
            </div>
        </div>

        <?php endif;

        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : __('Latest Galleries', 'andykemp-photography');
        $subtitle = !empty($instance['subtitle']) ? $instance['subtitle'] : __('Discover my most recent photographic work', 'andykemp-photography');
        $number = !empty($instance['number']) ? absint($instance['number']) : 3;
        $parent_page = !empty($instance['parent_page']) ? absint($instance['parent_page']) : 0;
        $show_cta = !empty($instance['show_cta']) ? $instance['show_cta'] : true;
        $cta_text = !empty($instance['cta_text']) ? $instance['cta_text'] : __('View All Galleries', 'andykemp-photography');
        $cta_url = !empty($instance['cta_url']) ? $instance['cta_url'] : home_url('/galleries/');
        ?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'andykemp-photography'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php _e('Subtitle:', 'andykemp-photography'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>">
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('parent_page')); ?>"><?php _e('Parent Page (optional):', 'andykemp-photography'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('parent_page')); ?>" name="<?php echo esc_attr($this->get_field_name('parent_page')); ?>">
                <option value="0" <?php selected($parent_page, 0); ?>><?php _e('All pages (auto-detect galleries)', 'andykemp-photography'); ?></option>
                <?php
                $pages = get_pages(array('sort_column' => 'post_title'));
                foreach ($pages as $page) {
                    echo '<option value="' . $page->ID . '"' . selected($parent_page, $page->ID, false) . '>' . esc_html($page->post_title) . '</option>';
                }
                ?>
            </select>
            <small><?php _e('Select a parent page to show only its child pages (e.g., select "Galleries" to show only gallery child pages)', 'andykemp-photography'); ?></small>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of galleries to show:', 'andykemp-photography'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" max="6" value="<?php echo esc_attr($number); ?>">
        </p>
        
        <p>
            <input class="checkbox" type="checkbox" <?php checked($show_cta); ?> id="<?php echo esc_attr($this->get_field_id('show_cta')); ?>" name="<?php echo esc_attr($this->get_field_name('show_cta')); ?>">
            <label for="<?php echo esc_attr($this->get_field_id('show_cta')); ?>"><?php _e('Show "View All" button', 'andykemp-photography'); ?></label>
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cta_text')); ?>"><?php _e('Button Text:', 'andykemp-photography'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('cta_text')); ?>" name="<?php echo esc_attr($this->get_field_name('cta_text')); ?>" type="text" value="<?php echo esc_attr($cta_text); ?>">
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cta_url')); ?>"><?php _e('Button URL:', 'andykemp-photography'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('cta_url')); ?>" name="<?php echo esc_attr($this->get_field_name('cta_url')); ?>" type="url" value="<?php echo esc_attr($cta_url); ?>">
        </p>
        
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['subtitle'] = (!empty($new_instance['subtitle'])) ? sanitize_text_field($new_instance['subtitle']) : '';
        $instance['number'] = (!empty($new_instance['number'])) ? absint($new_instance['number']) : 3;
        $instance['parent_page'] = (!empty($new_instance['parent_page'])) ? absint($new_instance['parent_page']) : 0;
        $instance['show_cta'] = (!empty($new_instance['show_cta'])) ? 1 : 0;
        $instance['cta_text'] = (!empty($new_instance['cta_text'])) ? sanitize_text_field($new_instance['cta_text']) : '';
        $instance['cta_url'] = (!empty($new_instance['cta_url'])) ? esc_url_raw($new_instance['cta_url']) : '';
        
        return $instance;
    }
}

// Register the widget
function register_latest_galleries_widget() {
    register_widget('Latest_Galleries_Widget');
}
add_action('widgets_init', 'register_latest_galleries_widget');