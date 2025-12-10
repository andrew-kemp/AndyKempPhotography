<?php
/**
 * Featured Galleries Block
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Featured Galleries Block
 */
function register_featured_galleries_block() {
    // Register the block
    register_block_type('andykemp/featured-galleries', array(
        'attributes' => array(
            'title' => array(
                'type' => 'string',
                'default' => 'Latest Galleries'
            ),
            'subtitle' => array(
                'type' => 'string',
                'default' => 'Discover my most recent photographic work'
            ),
            'numberOfGalleries' => array(
                'type' => 'number',
                'default' => 3
            ),
            'parentPage' => array(
                'type' => 'number',
                'default' => 0
            ),
            'showButton' => array(
                'type' => 'boolean',
                'default' => true
            ),
            'buttonText' => array(
                'type' => 'string',
                'default' => 'View All Galleries'
            ),
            'buttonUrl' => array(
                'type' => 'string',
                'default' => ''
            )
        ),
        'render_callback' => 'render_featured_galleries_block'
    ));
}
add_action('init', 'register_featured_galleries_block');

/**
 * Render Featured Galleries Block
 */
function render_featured_galleries_block($attributes) {
    $title = $attributes['title'] ?? 'Latest Galleries';
    $subtitle = $attributes['subtitle'] ?? 'Discover my most recent photographic work';
    $number = $attributes['numberOfGalleries'] ?? 3;
    $parent_page = $attributes['parentPage'] ?? 0;
    $show_button = $attributes['showButton'] ?? true;
    $button_text = $attributes['buttonText'] ?? 'View All Galleries';
    $button_url = $attributes['buttonUrl'] ?? home_url('/galleries/');

    ob_start();
    ?>
    
    <div style="max-width: 1200px; margin: 0 auto;">
        <header class="page-header">
            <h1 class="page-title"><?php echo esc_html($title); ?></h1>
            
            <?php if ($subtitle) : ?>
            <div class="page-intro">
                <p><?php echo esc_html($subtitle); ?></p>
            </div>
            <?php endif; ?>
        </header>

        <div class="featured-galleries" style="display: grid; grid-template-columns: repeat(3, minmax(320px, 400px)); gap: 2rem; padding: 2rem 0; justify-items: center; justify-content: center;">
    <?php
    // Simple query like page-galleries.php
    $galleries_query = new WP_Query(array(
        'post_type' => 'page',
        'post_parent' => $parent_page,
        'posts_per_page' => $number,
        'orderby' => 'menu_order title',
        'order' => 'ASC',
        'post_status' => 'publish'
    ));

    if ($galleries_query->have_posts()) :
        while ($galleries_query->have_posts()) : $galleries_query->the_post(); ?>
                <div class="gallery-card">
                    <a href="<?php the_permalink(); ?>" class="gallery-card-link">
                        <div class="gallery-card-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'gallery-thumbnail-img')); ?>
                            <?php else : ?>
                                <div class="gallery-card-placeholder">
                                    <i class="fas fa-camera"></i>
                                    <span>No Image</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="gallery-card-content">
                            <div class="gallery-card-title"><?php the_title(); ?></div>
                            <?php if (has_excerpt()) : ?>
                                <div class="gallery-card-description"><?php echo get_the_excerpt(); ?></div>
                            <?php else : ?>
                                <div class="gallery-card-description">Explore this collection of photographs.</div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <div class="no-galleries">
                <h3>Getting Started</h3>
                <p>To display your photo galleries here, create new pages and set this page as their parent.</p>
            </div>
        <?php endif; ?>
    </div>
    </div>
    
    <?php
    return ob_get_clean();
}

/**
 * Enqueue Block Editor Assets
 */
function featured_galleries_block_editor_assets() {
    wp_enqueue_script(
        'featured-galleries-block',
        get_template_directory_uri() . '/assets/js/featured-galleries-block.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'),
        '1.0.0',
        true
    );

    // Localize script with pages data for parent page selection
    $pages = get_pages(array('sort_column' => 'post_title'));
    $pages_data = array();
    $pages_data[] = array('value' => 0, 'label' => 'All pages (auto-detect galleries)');
    
    foreach ($pages as $page) {
        $pages_data[] = array(
            'value' => $page->ID,
            'label' => $page->post_title
        );
    }
    
    wp_localize_script('featured-galleries-block', 'featuredGalleriesData', array(
        'pages' => $pages_data
    ));
}
add_action('enqueue_block_editor_assets', 'featured_galleries_block_editor_assets');