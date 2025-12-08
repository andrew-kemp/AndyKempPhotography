<?php
/**
 * Template for displaying single posts and portfolio items
 */

get_header(); ?>

<main id="primary" class="main-content">
    
    <?php while (have_posts()) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class('content-section'); ?>>
        <div class="single-post-content" style="padding: 60px 40px;">
            
            <?php if (has_post_thumbnail()) : ?>
            <div class="post-featured-image">
                <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 10px; margin-bottom: 30px;')); ?>
            </div>
            <?php endif; ?>
            
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                
                <div class="entry-meta">
                    <span class="post-date">
                        <i class="far fa-calendar"></i>
                        <?php echo get_the_date(); ?>
                    </span>
                    
                    <?php if (get_post_type() === 'portfolio') : ?>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                        if ($terms && !is_wp_error($terms)) : ?>
                        <span class="portfolio-categories">
                            <i class="far fa-folder"></i>
                            <?php
                            $term_names = array();
                            foreach ($terms as $term) {
                                $term_names[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                            }
                            echo implode(', ', $term_names);
                            ?>
                        </span>
                        <?php endif; ?>
                    <?php else : ?>
                        <span class="post-author">
                            <i class="far fa-user"></i>
                            <?php _e('by', 'andykemp-photography'); ?> <?php the_author(); ?>
                        </span>
                        
                        <?php if (has_category()) : ?>
                        <span class="post-categories">
                            <i class="far fa-folder"></i>
                            <?php the_category(', '); ?>
                        </span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </header>

            <div class="entry-content">
                <?php 
                the_content();
                
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'andykemp-photography'),
                    'after'  => '</div>',
                ));
                ?>
            </div>

            <?php if (has_tag() && get_post_type() === 'post') : ?>
            <footer class="entry-footer">
                <div class="post-tags">
                    <i class="far fa-tags"></i>
                    <span class="tags-label"><?php _e('Tags:', 'andykemp-photography'); ?></span>
                    <?php the_tags('', ', ', ''); ?>
                </div>
            </footer>
            <?php endif; ?>
            
        </div>
    </article>

    <?php
    // Post navigation
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    
    if ($prev_post || $next_post) : ?>
    <nav class="post-navigation content-section" style="padding: 30px 40px; margin-top: 40px;">
        <div class="nav-links">
            <?php if ($prev_post) : ?>
            <div class="nav-previous">
                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" rel="prev">
                    <span class="nav-subtitle"><?php _e('Previous', 'andykemp-photography'); ?></span>
                    <span class="nav-title"><?php echo esc_html(get_the_title($prev_post->ID)); ?></span>
                </a>
            </div>
            <?php endif; ?>
            
            <?php if ($next_post) : ?>
            <div class="nav-next">
                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="next">
                    <span class="nav-subtitle"><?php _e('Next', 'andykemp-photography'); ?></span>
                    <span class="nav-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </nav>
    <?php endif; ?>

    <?php
    // Comments section
    if (comments_open() || get_comments_number()) : ?>
    <div class="comments-section content-section" style="padding: 40px; margin-top: 40px;">
        <?php comments_template(); ?>
    </div>
    <?php endif; ?>

    <?php endwhile; ?>

</main>

<style>
/* Single Post Styles */
.single-post-content {
    max-width: 800px;
    margin: 0 auto;
}

.entry-header {
    text-align: center;
    margin-bottom: 40px;
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 30px;
}

.entry-title {
    font-size: 2.5rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 20px;
    line-height: 1.2;
}

.entry-meta {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    color: var(--text-secondary);
    font-size: 14px;
}

.entry-meta span {
    display: flex;
    align-items: center;
    gap: 8px;
}

.entry-meta a {
    color: var(--accent-color);
    text-decoration: none;
}

.entry-meta a:hover {
    text-decoration: underline;
}

.entry-content {
    color: var(--text-primary);
    line-height: 1.8;
    font-size: 16px;
}

.entry-content h1,
.entry-content h2,
.entry-content h3,
.entry-content h4,
.entry-content h5,
.entry-content h6 {
    color: var(--text-primary);
    margin-top: 40px;
    margin-bottom: 20px;
    line-height: 1.3;
}

.entry-content h2 {
    font-size: 2rem;
}

.entry-content h3 {
    font-size: 1.5rem;
}

.entry-content p {
    margin-bottom: 20px;
}

.entry-content img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 30px 0;
    box-shadow: 0 5px 20px var(--shadow);
}

.entry-content blockquote {
    background: var(--secondary-bg);
    border-left: 4px solid var(--accent-color);
    padding: 20px;
    margin: 30px 0;
    border-radius: 5px;
    font-style: italic;
}

.entry-content ul,
.entry-content ol {
    margin: 20px 0;
    padding-left: 30px;
}

.entry-content li {
    margin-bottom: 10px;
}

.entry-footer {
    margin-top: 40px;
    padding-top: 30px;
    border-top: 1px solid var(--border-color);
}

.post-tags {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    color: var(--text-secondary);
    font-size: 14px;
}

.post-tags .tags-label {
    font-weight: 500;
}

.post-tags a {
    color: var(--accent-color);
    text-decoration: none;
    background: var(--secondary-bg);
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    transition: all 0.3s ease;
}

.post-tags a:hover {
    background: var(--accent-color);
    color: var(--primary-bg);
}

/* Post Navigation */
.post-navigation .nav-links {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.post-navigation .nav-previous,
.post-navigation .nav-next {
    display: block;
}

.post-navigation a {
    display: block;
    padding: 20px;
    background: var(--secondary-bg);
    border-radius: 10px;
    text-decoration: none;
    color: var(--text-primary);
    transition: all 0.3s ease;
    height: 100%;
}

.post-navigation a:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px var(--shadow);
}

.post-navigation .nav-subtitle {
    display: block;
    font-size: 12px;
    color: var(--text-secondary);
    margin-bottom: 5px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.post-navigation .nav-title {
    display: block;
    font-weight: 500;
    color: var(--text-primary);
}

.post-navigation .nav-next {
    text-align: right;
}

.page-links {
    margin: 30px 0;
    text-align: center;
}

.page-links a,
.page-links > span {
    display: inline-block;
    padding: 8px 12px;
    margin: 0 2px;
    background: var(--secondary-bg);
    border-radius: 5px;
    text-decoration: none;
    color: var(--text-primary);
}

.page-links a:hover {
    background: var(--accent-color);
    color: var(--primary-bg);
}

/* Responsive Design */
@media (max-width: 768px) {
    .single-post-content {
        padding: 40px 20px !important;
    }
    
    .entry-title {
        font-size: 2rem;
    }
    
    .entry-meta {
        flex-direction: column;
        gap: 10px;
    }
    
    .post-navigation .nav-links {
        grid-template-columns: 1fr;
    }
    
    .post-navigation .nav-next {
        text-align: left;
    }
    
    .post-tags {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .entry-title {
        font-size: 1.5rem;
    }
    
    .entry-content {
        font-size: 15px;
    }
}
</style>

<?php get_footer(); ?>