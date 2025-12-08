<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

    <!-- Social Media Links -->
    <?php 
    $social_links = andykemp_photography_get_social_links();
    if (!empty($social_links)) : ?>
    <div class="social-media">
        <?php foreach ($social_links as $network => $data) : ?>
        <a href="<?php echo esc_url($data['url']); ?>" 
           class="social-link" 
           target="_blank" 
           rel="noopener noreferrer" 
           aria-label="<?php echo esc_attr($data['label']); ?>">
            <i class="<?php echo esc_attr($data['icon']); ?>"></i>
        </a>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Navigation -->
    <nav class="main-navigation" id="main-nav">
        <div class="nav-container">
            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle mobile menu">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
            
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'menu_class' => 'nav-menu',
                'container' => false,
                'fallback_cb' => 'andykemp_photography_fallback_menu',
                'walker' => new AndyKemp_Walker_Nav_Menu(),
            ));
            ?>
        </div>
    </nav>

    <?php if (is_front_page() || is_home()) : ?>
    <!-- Hero Section -->
    <section class="hero-section" <?php 
        $hero_image = get_theme_mod('hero_background_image');
        if ($hero_image) {
            echo 'style="background-image: url(' . esc_url($hero_image) . ');"';
        } elseif (has_custom_header()) {
            echo 'style="background-image: url(' . esc_url(get_header_image()) . ');"';
        } else {
            // Default hero image from your uploaded image
            echo 'style="background-image: url(' . get_template_directory_uri() . '/assets/images/hero-bg.jpg);"';
        }
    ?>>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="site-branding">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                    <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php endif; ?>
                </a>
                
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-link">
                    <div class="site-info">
                        <h1 class="site-title">
                            <?php
                            $site_title = get_bloginfo('name');
                            $parts = explode(' ', trim($site_title));
                            if (count($parts) >= 3) {
                                // Take last word for line 2, everything else for line 1
                                $last_word = array_pop($parts);
                                $first_part = implode(' ', $parts);
                                echo '<span class="line1">' . esc_html($first_part) . '</span>';
                                echo '<span class="line2">' . esc_html($last_word) . '</span>';
                            } elseif (count($parts) == 2) {
                                // Split evenly if only 2 words
                                echo '<span class="line1">' . esc_html($parts[0]) . '</span>';
                                echo '<span class="line2">' . esc_html($parts[1]) . '</span>';
                            } else {
                                // Single word goes on line 1
                                echo '<span class="line1">' . esc_html($site_title) . '</span>';
                            }
                            ?>
                        </h1>
                        <p class="tagline">
                            <?php 
                            $custom_tagline = get_theme_mod('custom_tagline', get_bloginfo('description'));
                            echo esc_html($custom_tagline);
                            ?>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <?php else : ?>
    <!-- Header Section for Interior Pages -->
    <section class="interior-header-section">
        <div class="site-branding">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link">
                <?php if (has_custom_logo()) : ?>
                <div class="site-logo">
                    <?php the_custom_logo(); ?>
                </div>
                <?php endif; ?>
            </a>
            
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-link">
                <div class="site-info">
                    <h1 class="site-title">
                        <?php
                        $site_title = get_bloginfo('name');
                        $parts = explode(' ', trim($site_title));
                        if (count($parts) >= 3) {
                            // Take last word for line 2, everything else for line 1
                            $last_word = array_pop($parts);
                            $first_part = implode(' ', $parts);
                            echo '<span class="line1">' . esc_html($first_part) . '</span>';
                            echo '<span class="line2">' . esc_html($last_word) . '</span>';
                        } elseif (count($parts) == 2) {
                            // Split evenly if only 2 words
                            echo '<span class="line1">' . esc_html($parts[0]) . '</span>';
                            echo '<span class="line2">' . esc_html($parts[1]) . '</span>';
                        } else {
                            // Single word goes on line 1
                            echo '<span class="line1">' . esc_html($site_title) . '</span>';
                        }
                        ?>
                    </h1>
                    <p class="tagline">
                        <?php 
                        $custom_tagline = get_theme_mod('custom_tagline', get_bloginfo('description'));
                        echo esc_html($custom_tagline);
                        ?>
                    </p>
                </div>
            </a>
        </div>
    </section>
    <?php endif; ?>

    <div id="content" class="site-content">

<?php
/**
 * Fallback menu for when no menu is assigned
 */
function andykemp_photography_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . __('Home', 'andykemp-photography') . '</a></li>';
    
    // Portfolio submenu
    echo '<li class="menu-item-has-children">';
    echo '<a href="' . esc_url(home_url('/portfolio/')) . '">' . __('Portfolio', 'andykemp-photography') . '</a>';
    echo '<ul class="sub-menu">';
    
    // Get portfolio categories
    $portfolio_terms = get_terms(array(
        'taxonomy' => 'portfolio_category',
        'hide_empty' => true,
    ));
    
    if (!empty($portfolio_terms) && !is_wp_error($portfolio_terms)) {
        foreach ($portfolio_terms as $term) {
            echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
        }
    } else {
        // Default gallery categories
        echo '<li><a href="#">' . __('Nature', 'andykemp-photography') . '</a></li>';
        echo '<li><a href="#">' . __('Landscape', 'andykemp-photography') . '</a></li>';
        echo '<li><a href="#">' . __('Wildlife', 'andykemp-photography') . '</a></li>';
    }
    
    echo '</ul>';
    echo '</li>';
    
    echo '<li><a href="' . esc_url(home_url('/prints/')) . '">' . __('Prints', 'andykemp-photography') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . __('About', 'andykemp-photography') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . __('Contact', 'andykemp-photography') . '</a></li>';
    echo '</ul>';
}
?>