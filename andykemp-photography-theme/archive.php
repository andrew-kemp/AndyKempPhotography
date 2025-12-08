<?php
/**
 * Template for displaying archive pages
 */

get_header(); ?>

<main id="primary" class="main-content">
    
    <header class="archive-header content-section" style="padding: 40px; margin-bottom: 40px; text-align: center;">
        <?php if (is_category()) : ?>
            <h1 class="archive-title">
                <?php printf(esc_html__('Category: %s', 'andykemp-photography'), single_cat_title('', false)); ?>
            </h1>
            <?php
            $category_description = category_description();
            if (!empty($category_description)) : ?>
                <div class="archive-description"><?php echo $category_description; ?></div>
            <?php endif; ?>
            
        <?php elseif (is_tag()) : ?>
            <h1 class="archive-title">
                <?php printf(esc_html__('Tag: %s', 'andykemp-photography'), single_tag_title('', false)); ?>
            </h1>
            <?php
            $tag_description = tag_description();
            if (!empty($tag_description)) : ?>
                <div class="archive-description"><?php echo $tag_description; ?></div>
            <?php endif; ?>
            
        <?php elseif (is_tax('portfolio_category')) : ?>
            <h1 class="archive-title">
                <?php printf(esc_html__('Portfolio: %s', 'andykemp-photography'), single_term_title('', false)); ?>
            </h1>
            <?php
            $term_description = term_description();
            if (!empty($term_description)) : ?>
                <div class="archive-description"><?php echo $term_description; ?></div>
            <?php endif; ?>
            
        <?php elseif (is_post_type_archive('portfolio')) : ?>
            <h1 class="archive-title"><?php _e('Portfolio', 'andykemp-photography'); ?></h1>
            <div class="archive-description">
                <p><?php _e('Browse through my collection of photography work.', 'andykemp-photography'); ?></p>
            </div>
            
        <?php elseif (is_author()) : ?>
            <h1 class="archive-title">
                <?php printf(esc_html__('Author: %s', 'andykemp-photography'), get_the_author()); ?>
            </h1>
            <?php
            $author_description = get_the_author_meta('description');
            if (!empty($author_description)) : ?>
                <div class="archive-description"><?php echo $author_description; ?></div>
            <?php endif; ?>
            
        <?php elseif (is_date()) : ?>
            <h1 class="archive-title">
                <?php
                if (is_year()) {
                    printf(esc_html__('Year: %s', 'andykemp-photography'), get_the_date('Y'));
                } elseif (is_month()) {
                    printf(esc_html__('Month: %s', 'andykemp-photography'), get_the_date('F Y'));
                } elseif (is_day()) {
                    printf(esc_html__('Day: %s', 'andykemp-photography'), get_the_date('F j, Y'));
                }
                ?>
            </h1>
            
        <?php else : ?>
            <h1 class="archive-title"><?php _e('Archives', 'andykemp-photography'); ?></h1>
        <?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>
    
        <?php if (is_post_type_archive('portfolio') || is_tax('portfolio_category')) : ?>
        <!-- Portfolio Grid Layout -->
        <div class="portfolio-archive-grid">
            <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-archive-item'); ?>>
                <?php if (has_post_thumbnail()) : ?>
                <div class="portfolio-archive-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('portfolio-large'); ?>
                    </a>
                    <div class="portfolio-archive-overlay">
                        <div class="portfolio-archive-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php if (has_excerpt()) : ?>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 12); ?></p>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="portfolio-view-link">
                                <?php _e('View Details', 'andykemp-photography'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </article>
            <?php endwhile; ?>
        </div>
        
        <?php else : ?>
        <!-- Standard Blog Archive Layout -->
        <div class="blog-archive-list">
            <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('blog-archive-item content-section'); ?>>
                <div class="blog-archive-content" style="padding: 40px;">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="blog-archive-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('portfolio-thumb'); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <div class="blog-archive-text">
                        <header class="blog-archive-header">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            
                            <div class="blog-archive-meta">
                                <span class="post-date">
                                    <i class="far fa-calendar"></i>
                                    <?php echo get_the_date(); ?>
                                </span>
                                <span class="post-author">
                                    <i class="far fa-user"></i>
                                    <?php the_author(); ?>
                                </span>
                                <?php if (has_category()) : ?>
                                <span class="post-categories">
                                    <i class="far fa-folder"></i>
                                    <?php the_category(', '); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </header>

                        <div class="blog-archive-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <footer class="blog-archive-footer">
                            <a href="<?php the_permalink(); ?>" class="read-more-link">
                                <?php _e('Read More', 'andykemp-photography'); ?> <i class="fas fa-arrow-right"></i>
                            </a>
                        </footer>
                    </div>
                </div>
            </article>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>

        <?php
        // Archive pagination
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('&larr; Previous', 'andykemp-photography'),
            'next_text' => __('Next &rarr;', 'andykemp-photography'),
        ));
        ?>

    <?php else : ?>

        <section class="no-results not-found content-section">
            <div style="padding: 60px 40px; text-align: center;">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing Found', 'andykemp-photography'); ?></h1>
                </header>

                <div class="page-content">
                    <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'andykemp-photography'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </section>

    <?php endif; ?>

</main>

<style>
/* Archive Styles */
.archive-header {
    background: var(--secondary-bg);
    border-radius: 10px;
}

.archive-title {
    font-size: 2.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 15px;
}

.archive-description {
    color: var(--text-secondary);
    font-size: 1.1rem;
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
}

/* Portfolio Archive Grid */
.portfolio-archive-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 30px;
    margin-bottom: 60px;
}

.portfolio-archive-item {
    background: var(--primary-bg);
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px var(--shadow);
    transition: all 0.3s ease;
    position: relative;
}

.portfolio-archive-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px var(--shadow);
}

.portfolio-archive-image {
    position: relative;
    overflow: hidden;
    aspect-ratio: 4/3;
}

.portfolio-archive-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.portfolio-archive-item:hover .portfolio-archive-image img {
    transform: scale(1.1);
}

.portfolio-archive-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.8) 100%);
    display: flex;
    align-items: flex-end;
    padding: 30px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.portfolio-archive-item:hover .portfolio-archive-overlay {
    opacity: 1;
}

.portfolio-archive-content {
    color: white;
    text-align: left;
}

.portfolio-archive-content h3 {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.portfolio-archive-content h3 a {
    color: white;
    text-decoration: none;
}

.portfolio-archive-content p {
    font-size: 14px;
    opacity: 0.9;
    margin-bottom: 15px;
    line-height: 1.5;
}

.portfolio-view-link {
    display: inline-block;
    background: var(--accent-color);
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.portfolio-view-link:hover {
    background: var(--primary-bg);
    color: var(--text-primary);
}

/* Blog Archive List */
.blog-archive-list {
    display: flex;
    flex-direction: column;
    gap: 40px;
    margin-bottom: 60px;
}

.blog-archive-item {
    transition: all 0.3s ease;
}

.blog-archive-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px var(--shadow);
}

.blog-archive-content {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 30px;
    align-items: flex-start;
}

.blog-archive-image {
    border-radius: 8px;
    overflow: hidden;
}

.blog-archive-image img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-archive-item:hover .blog-archive-image img {
    transform: scale(1.05);
}

.blog-archive-header h2 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 15px;
    line-height: 1.3;
}

.blog-archive-header h2 a {
    color: var(--text-primary);
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-archive-header h2 a:hover {
    color: var(--accent-color);
}

.blog-archive-meta {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 15px;
    color: var(--text-secondary);
    font-size: 13px;
}

.blog-archive-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.blog-archive-meta a {
    color: var(--accent-color);
    text-decoration: none;
}

.blog-archive-meta a:hover {
    text-decoration: underline;
}

.blog-archive-excerpt {
    color: var(--text-primary);
    line-height: 1.6;
    margin-bottom: 20px;
}

.read-more-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--accent-color);
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s ease;
}

.read-more-link:hover {
    gap: 12px;
    color: var(--text-primary);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 60px;
}

.pagination a,
.pagination span {
    display: inline-block;
    padding: 10px 16px;
    background: var(--secondary-bg);
    border: 1px solid var(--border-color);
    border-radius: 5px;
    color: var(--text-primary);
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination a:hover {
    background: var(--accent-color);
    color: var(--primary-bg);
    transform: translateY(-2px);
}

.pagination .current {
    background: var(--accent-color);
    color: var(--primary-bg);
}

/* Responsive Design */
@media (max-width: 768px) {
    .archive-title {
        font-size: 2rem;
    }
    
    .portfolio-archive-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .blog-archive-content {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .blog-archive-image {
        order: -1;
    }
    
    .blog-archive-image img {
        height: 200px;
    }
    
    .blog-archive-meta {
        flex-direction: column;
        gap: 8px;
    }
    
    .pagination {
        flex-wrap: wrap;
    }
}

@media (max-width: 480px) {
    .archive-title {
        font-size: 1.7rem;
    }
    
    .archive-description {
        font-size: 1rem;
    }
    
    .portfolio-archive-grid {
        grid-template-columns: 1fr;
    }
    
    .portfolio-archive-overlay {
        opacity: 1;
        background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.9) 100%);
    }
    
    .blog-archive-content {
        padding: 30px 20px !important;
    }
}
</style>

<?php get_footer(); ?>