<?php
/**
 * The main template file
 */

get_header(); ?>

<main id="primary" class="main-content">
    
    <?php if (is_home() && !is_front_page()) : ?>
    <header class="page-header">
        <h1 class="page-title"><?php _e('Latest Posts', 'andykemp-photography'); ?></h1>
    </header>
    <?php endif; ?>

    <?php if (have_posts()) : ?>

        <?php if (is_home() || is_archive()) : ?>
        <div class="portfolio-grid">
        <?php endif; ?>

        <?php
        while (have_posts()) :
            the_post();
            
            if (is_home() || is_archive()) {
                // Grid layout for home and archive pages
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-item'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="portfolio-item-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('portfolio-thumb'); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <div class="portfolio-item-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <?php if (has_excerpt()) : ?>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <?php else : ?>
                        <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                        <?php endif; ?>
                        
                        <div class="portfolio-item-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <?php if (get_post_type() === 'portfolio') : ?>
                                <?php
                                $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                                if ($terms && !is_wp_error($terms)) {
                                    echo '<span class="portfolio-category">';
                                    $term_names = array();
                                    foreach ($terms as $term) {
                                        $term_names[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                    }
                                    echo implode(', ', $term_names);
                                    echo '</span>';
                                }
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                <?php
            } else {
                // Full content layout for single posts
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('content-section'); ?>>
                    <div class="entry-content" style="padding: 40px;">
                        <?php if (has_post_thumbnail() && !is_singular()) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                        <?php endif; ?>
                        
                        <header class="entry-header">
                            <?php
                            if (is_singular()) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                            endif;
                            ?>
                            
                            <div class="entry-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                                <?php if (!is_singular()) : ?>
                                <span class="post-author"><?php _e('by', 'andykemp-photography'); ?> <?php the_author(); ?></span>
                                <?php endif; ?>
                            </div>
                        </header>

                        <div class="entry-body">
                            <?php
                            if (is_singular()) {
                                the_content();
                            } else {
                                the_excerpt();
                            }
                            ?>
                        </div>

                        <?php if (is_singular()) : ?>
                        <footer class="entry-footer">
                            <?php
                            $categories_list = get_the_category_list(esc_html__(', ', 'andykemp-photography'));
                            if ($categories_list) {
                                printf('<span class="cat-links">' . esc_html__('Categories: %1$s', 'andykemp-photography') . '</span>', $categories_list);
                            }

                            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'andykemp-photography'));
                            if ($tags_list) {
                                printf('<span class="tags-links">' . esc_html__('Tags: %1$s', 'andykemp-photography') . '</span>', $tags_list);
                            }
                            ?>
                        </footer>
                        <?php endif; ?>
                    </div>
                </article>
                <?php
            }
        endwhile;
        ?>

        <?php if (is_home() || is_archive()) : ?>
        </div><!-- .portfolio-grid -->
        <?php endif; ?>

        <?php
        // Pagination
        the_posts_navigation(array(
            'prev_text' => __('&larr; Older posts', 'andykemp-photography'),
            'next_text' => __('Newer posts &rarr;', 'andykemp-photography'),
        ));
        ?>

    <?php else : ?>

        <section class="no-results not-found content-section">
            <div style="padding: 40px; text-align: center;">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing here', 'andykemp-photography'); ?></h1>
                </header>

                <div class="page-content">
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        <p><?php
                        printf(
                            wp_kses(
                                __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'andykemp-photography'),
                                array(
                                    'a' => array(
                                        'href' => array(),
                                    ),
                                )
                            ),
                            esc_url(admin_url('post-new.php'))
                        );
                        ?></p>
                    <?php elseif (is_search()) : ?>
                        <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'andykemp-photography'); ?></p>
                        <?php get_search_form(); ?>
                    <?php else : ?>
                        <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'andykemp-photography'); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

    <?php endif; ?>

</main><!-- #main -->

<style>
/* Additional styles for index layout */
.entry-content {
    background: var(--primary-bg);
    border-radius: 10px;
    box-shadow: 0 5px 20px var(--shadow);
    margin-bottom: 40px;
    overflow: hidden;
}

.entry-header {
    margin-bottom: 20px;
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 20px;
}

.entry-title {
    color: var(--text-primary);
    font-size: 2rem;
    font-weight: 600;
    margin-bottom: 10px;
    line-height: 1.3;
}

.entry-title a {
    color: var(--text-primary);
    text-decoration: none;
    transition: color 0.3s ease;
}

.entry-title a:hover {
    color: var(--accent-color);
}

.entry-meta {
    color: var(--text-secondary);
    font-size: 14px;
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.entry-body {
    color: var(--text-primary);
    line-height: 1.7;
}

.entry-body img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 20px 0;
}

.entry-footer {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
    color: var(--text-secondary);
    font-size: 14px;
}

.entry-footer span {
    display: block;
    margin-bottom: 5px;
}

.entry-footer a {
    color: var(--accent-color);
    text-decoration: none;
}

.entry-footer a:hover {
    text-decoration: underline;
}

.post-thumbnail {
    margin-bottom: 20px;
}

.post-thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 8px;
}

.portfolio-item-meta {
    margin-top: 15px;
    font-size: 12px;
    color: var(--text-secondary);
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 10px;
}

.portfolio-item-meta a {
    color: var(--accent-color);
    text-decoration: none;
}

.portfolio-item-meta a:hover {
    text-decoration: underline;
}

/* Navigation */
.posts-navigation {
    margin-top: 40px;
    padding: 20px 0;
}

.nav-links {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

.nav-links a {
    color: var(--accent-color);
    text-decoration: none;
    padding: 10px 20px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    transition: all 0.3s ease;
}

.nav-links a:hover {
    background: var(--secondary-bg);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .entry-meta {
        flex-direction: column;
        gap: 5px;
    }
    
    .portfolio-item-meta {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .nav-links {
        flex-direction: column;
    }
}
</style>

<?php
get_footer();
?>