<?php
/**
 * Template Name: Galleries Page
 * Description: Custom template for displaying all gallery pages dynamically
 */

get_header(); ?>

<main id="primary" class="main-content">
    
    <?php while (have_posts()) : the_post(); ?>
    
    <article id="page-<?php the_ID(); ?>" <?php post_class('content-section'); ?>>
        <div class="page-content" style="padding: 60px 40px;">
            
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                
                <?php if (get_the_content()) : ?>
                <div class="page-intro">
                    <?php the_content(); ?>
                </div>
                <?php endif; ?>
            </header>

            <div class="featured-galleries">
            <?php
            // Query for all pages that are children of the current page (Portfolio)
            // Or you can specify a parent page ID if you prefer
            $galleries_query = new WP_Query(array(
                'post_type' => 'page',
                'post_parent' => get_the_ID(), // Gets child pages of current page
                'posts_per_page' => -1, // Get all galleries
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
                                <h3 class="gallery-card-title"><?php the_title(); ?></h3>
                                <?php if (has_excerpt()) : ?>
                                    <p class="gallery-card-description"><?php echo get_the_excerpt(); ?></p>
                                <?php else : ?>
                                    <p class="gallery-card-description">Explore this collection of photographs.</p>
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
                    <div class="setup-instructions">
                        <h4>Quick Setup:</h4>
                        <ol>
                            <li>Go to <strong>Pages → Add New</strong></li>
                            <li>Create pages like "Landscapes", "Portraits", "Street Photography"</li>
                            <li>In <strong>Page Attributes</strong>, set <strong>Parent</strong> to "<?php the_title(); ?>"</li>
                            <li>Set a <strong>Featured Image</strong> for each gallery</li>
                            <li>Publish the pages</li>
                        </ol>
                        <p>Your galleries will automatically appear here!</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </article>
    
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>