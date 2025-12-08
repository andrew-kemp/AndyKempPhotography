    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-content">
            <?php if (is_active_sidebar('footer-widgets')) : ?>
            <div class="footer-widgets">
                <?php dynamic_sidebar('footer-widgets'); ?>
            </div>
            <?php endif; ?>
            
            <div class="footer-info">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'andykemp-photography'); ?></p>
                <p><?php _e('Exploring nature, one frame at a time.', 'andykemp-photography'); ?></p>
            </div>
            
            <?php 
            $social_links = andykemp_photography_get_social_links();
            if (!empty($social_links)) : ?>
            <div class="footer-social">
                <?php foreach ($social_links as $network => $data) : ?>
                <a href="<?php echo esc_url($data['url']); ?>" 
                   class="footer-social-link" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   aria-label="<?php echo esc_attr($data['label']); ?>">
                    <i class="<?php echo esc_attr($data['icon']); ?>"></i>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<style>
/* Footer Styles */
.site-footer {
    background: var(--secondary-bg);
    color: var(--text-secondary);
    text-align: center;
    padding: 40px 20px;
    border-top: 1px solid var(--border-color);
    margin-top: 60px;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
}

.footer-widgets {
    margin-bottom: 30px;
}

.footer-info p {
    margin: 5px 0;
    font-size: 14px;
}

.footer-social {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 15px;
}

.footer-social-link {
    width: 40px;
    height: 40px;
    background: var(--menu-bg);
    border: 1px solid var(--border-color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: var(--text-primary);
    transition: all 0.3s ease;
}

.footer-social-link:hover {
    background: var(--accent-color);
    color: var(--primary-bg);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .footer-social {
        flex-wrap: wrap;
    }
}
</style>

</body>
</html>