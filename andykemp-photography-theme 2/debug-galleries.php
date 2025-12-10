<?php
/**
 * Template Name: Debug Galleries Page
 * Description: Debug version to test page loading
 */

// Debug information
echo "<!-- Debug: Template is loading -->";
echo "<!-- Page ID: " . get_the_ID() . " -->";
echo "<!-- Template: " . get_page_template_slug() . " -->";

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <h1>DEBUG: Galleries Template Loading</h1>
        <p>Page ID: <?php echo get_the_ID(); ?></p>
        <p>Page Title: <?php echo get_the_title(); ?></p>
        <p>Template: <?php echo get_page_template_slug(); ?></p>
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="page-header">
                <h2 class="page-title"><?php the_title(); ?></h2>
                <div class="page-intro">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; endif; ?>

        <p>If you see this message, the template is working!</p>
    </div>
</main>

<?php get_footer(); ?>