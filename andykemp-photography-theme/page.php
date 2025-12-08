<?php
/**
 * Template for displaying pages
 */

get_header(); ?>

<main id="primary" class="main-content">
    
    <?php while (have_posts()) : the_post(); ?>
    
    <article id="page-<?php the_ID(); ?>" <?php post_class('content-section'); ?>>
        <div class="page-content" style="padding: 60px 40px;">
            
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
                
                <?php if (has_excerpt()) : ?>
                <div class="page-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <?php endif; ?>
            </header>

            <?php if (has_post_thumbnail()) : ?>
            <div class="page-featured-image">
                <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 10px; margin-bottom: 40px;')); ?>
            </div>
            <?php endif; ?>

            <div class="page-body">
                <?php 
                the_content();
                
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'andykemp-photography'),
                    'after'  => '</div>',
                ));
                ?>
            </div>
            
        </div>
    </article>

    <?php
    // Comments section for pages (if enabled)
    if (comments_open() || get_comments_number()) : ?>
    <div class="comments-section content-section" style="padding: 40px; margin-top: 40px;">
        <?php comments_template(); ?>
    </div>
    <?php endif; ?>

    <?php endwhile; ?>

</main>

<style>
/* Page Styles */
.page-content {
    max-width: 900px;
    margin: 0 auto;
}

.page-header {
    text-align: center;
    margin-bottom: 50px;
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 30px;
}

.page-title {
    font-size: 3rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 20px;
    line-height: 1.2;
}

.page-excerpt {
    font-size: 1.2rem;
    color: var(--text-secondary);
    line-height: 1.6;
    max-width: 600px;
    margin: 0 auto;
    font-style: italic;
}

.page-body {
    color: var(--text-primary);
    line-height: 1.8;
    font-size: 16px;
}

.page-body h1,
.page-body h2,
.page-body h3,
.page-body h4,
.page-body h5,
.page-body h6 {
    color: var(--text-primary);
    margin-top: 40px;
    margin-bottom: 20px;
    line-height: 1.3;
}

.page-body h2 {
    font-size: 2.2rem;
    font-weight: 500;
}

.page-body h3 {
    font-size: 1.8rem;
    font-weight: 500;
}

.page-body h4 {
    font-size: 1.4rem;
    font-weight: 500;
}

.page-body p {
    margin-bottom: 25px;
}

.page-body img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 30px 0;
    box-shadow: 0 5px 20px var(--shadow);
}

.page-body blockquote {
    background: var(--secondary-bg);
    border-left: 4px solid var(--accent-color);
    padding: 25px;
    margin: 40px 0;
    border-radius: 8px;
    font-style: italic;
    font-size: 1.1rem;
}

.page-body ul,
.page-body ol {
    margin: 25px 0;
    padding-left: 30px;
}

.page-body li {
    margin-bottom: 12px;
}

.page-body table {
    width: 100%;
    border-collapse: collapse;
    margin: 30px 0;
    background: var(--primary-bg);
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px var(--shadow);
}

.page-body th,
.page-body td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

.page-body th {
    background: var(--secondary-bg);
    font-weight: 600;
    color: var(--text-primary);
}

.page-body td {
    color: var(--text-primary);
}

/* Contact Form Styles (if using contact forms) */
.page-body .contact-form {
    background: var(--secondary-bg);
    padding: 30px;
    border-radius: 10px;
    margin: 40px 0;
}

.page-body .contact-form .form-row {
    margin-bottom: 20px;
}

.page-body .contact-form label {
    display: block;
    margin-bottom: 8px;
    color: var(--text-primary);
    font-weight: 500;
}

.page-body .contact-form input,
.page-body .contact-form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--border-color);
    border-radius: 5px;
    background: var(--primary-bg);
    color: var(--text-primary);
    font-family: inherit;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.page-body .contact-form input:focus,
.page-body .contact-form textarea:focus {
    outline: none;
    border-color: var(--accent-color);
}

.page-body .contact-form textarea {
    height: 120px;
    resize: vertical;
}

.page-body .contact-form button {
    background: var(--accent-color);
    color: var(--primary-bg);
    border: none;
    padding: 12px 30px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.page-body .contact-form button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px var(--shadow);
}

/* Gallery Styles (for portfolio pages) */
.page-body .gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin: 40px 0;
}

.page-body .gallery-item {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    aspect-ratio: 4/3;
    background: var(--secondary-bg);
}

.page-body .gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
    margin: 0;
    box-shadow: none;
    border-radius: 0;
}

.page-body .gallery-item:hover img {
    transform: scale(1.05);
}

/* About page specific styles */
.about-section {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 40px;
    align-items: center;
    margin: 60px 0;
}

.about-image {
    text-align: center;
}

.about-image img {
    border-radius: 50%;
    max-width: 250px;
    width: 100%;
}

.about-text h3 {
    margin-top: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-content {
        padding: 40px 20px !important;
    }
    
    .page-title {
        font-size: 2.2rem;
    }
    
    .page-excerpt {
        font-size: 1.1rem;
    }
    
    .page-body .gallery {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }
    
    .about-section {
        grid-template-columns: 1fr;
        gap: 30px;
        text-align: center;
    }
    
    .page-body table {
        font-size: 14px;
    }
    
    .page-body th,
    .page-body td {
        padding: 10px 8px;
    }
}

@media (max-width: 480px) {
    .page-title {
        font-size: 1.8rem;
    }
    
    .page-excerpt {
        font-size: 1rem;
    }
    
    .page-body {
        font-size: 15px;
    }
    
    .page-body h2 {
        font-size: 1.8rem;
    }
    
    .page-body h3 {
        font-size: 1.5rem;
    }
    
    .page-body .gallery {
        grid-template-columns: 1fr;
    }
}
</style>

<?php get_footer(); ?>