/**
 * Andy Kemp Photography Theme JavaScript
 */

(function($) {
    'use strict';

    // Theme toggle functionality
    function initThemeToggle() {
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const themeText = document.getElementById('theme-text');
        const html = document.documentElement;

        // Check for saved theme preference or default to light mode
        const savedTheme = localStorage.getItem('theme') || html.getAttribute('data-theme') || 'light';
        html.setAttribute('data-theme', savedTheme);
        updateThemeToggle(savedTheme, themeIcon, themeText);

        // Theme toggle click handler
        if (themeToggle) {
            themeToggle.addEventListener('click', function() {
                const currentTheme = html.getAttribute('data-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                
                html.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateThemeToggle(newTheme, themeIcon, themeText);
                
                // Add transition effect
                document.body.style.transition = 'all 0.3s ease';
                setTimeout(() => {
                    document.body.style.transition = '';
                }, 300);
            });
        }
    }

    // Update theme toggle button appearance
    function updateThemeToggle(theme, icon, text) {
        if (theme === 'dark') {
            icon.className = 'fas fa-sun';
            text.textContent = 'Light';
        } else {
            icon.className = 'fas fa-moon';
            text.textContent = 'Dark';
        }
    }

    // Sticky Navigation
    function initStickyNavigation() {
        const nav = document.getElementById('main-nav');
        let lastScrollY = window.scrollY;
        let ticking = false;

        function updateNavigation() {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 100) {
                if (currentScrollY > lastScrollY && currentScrollY > 200) {
                    // Scrolling down - hide nav
                    nav.classList.add('nav-hidden');
                    nav.classList.remove('nav-visible');
                } else {
                    // Scrolling up - show nav
                    nav.classList.remove('nav-hidden');
                    nav.classList.add('nav-visible');
                }
            } else {
                // At top - show nav
                nav.classList.remove('nav-hidden');
                nav.classList.remove('nav-visible');
            }
            
            lastScrollY = currentScrollY;
            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateNavigation);
                ticking = true;
            }
        }

        window.addEventListener('scroll', requestTick);
    }

    // Mobile Menu
    function initMobileMenu() {
        const mobileToggle = document.getElementById('mobile-menu-toggle');
        const navMenu = document.querySelector('.nav-menu');
        const navContainer = document.querySelector('.nav-container');
        
        if (mobileToggle && navMenu) {
            // Ensure all sub-menus start closed when page loads
            navMenu.querySelectorAll('.sub-menu').forEach(submenu => {
                submenu.classList.remove('mobile-submenu-open');
                submenu.style.display = 'none';
            });
            
            navMenu.querySelectorAll('.mobile-submenu-toggle').forEach(toggle => {
                toggle.classList.remove('active');
            });
            
            // Main toggle handler
            mobileToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                
                const isOpen = navMenu.classList.contains('mobile-menu-open');
                
                if (isOpen) {
                    // Close menu
                    this.classList.remove('active');
                    navMenu.classList.remove('mobile-menu-open');
                    document.body.style.overflow = '';
                    // Close any open submenus
                    navMenu.querySelectorAll('.sub-menu.mobile-submenu-open').forEach(submenu => {
                        submenu.classList.remove('mobile-submenu-open');
                    });
                    navMenu.querySelectorAll('.mobile-submenu-toggle.active').forEach(toggle => {
                        toggle.classList.remove('active');
                    });
                } else {
                    // Open menu
                    this.classList.add('active');
                    navMenu.classList.add('mobile-menu-open');
                    document.body.style.overflow = 'hidden';
                }
            }, true);
            
            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (navMenu.classList.contains('mobile-menu-open')) {
                    if (!navContainer.contains(e.target)) {
                        mobileToggle.classList.remove('active');
                        navMenu.classList.remove('mobile-menu-open');
                        document.body.style.overflow = '';
                        // Close any open submenus
                        navMenu.querySelectorAll('.sub-menu.mobile-submenu-open').forEach(submenu => {
                            submenu.classList.remove('mobile-submenu-open');
                        });
                        navMenu.querySelectorAll('.mobile-submenu-toggle.active').forEach(toggle => {
                            toggle.classList.remove('active');
                        });
                    }
                }
            });
            
            // Prevent menu from closing when clicking inside the menu
            navMenu.addEventListener('click', function(e) {
                e.stopPropagation();
            });
            
            // Handle sub-menu toggles
            const submenuToggles = navMenu.querySelectorAll('.mobile-submenu-toggle');
            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const parentLi = this.closest('li');
                    const submenu = parentLi.querySelector('.sub-menu');
                    
                    if (submenu) {
                        const isOpen = submenu.classList.contains('mobile-submenu-open');
                        
                        // Close all other submenus
                        navMenu.querySelectorAll('.sub-menu.mobile-submenu-open').forEach(openSubmenu => {
                            if (openSubmenu !== submenu) {
                                openSubmenu.classList.remove('mobile-submenu-open');
                                const otherToggle = openSubmenu.closest('li').querySelector('.mobile-submenu-toggle');
                                if (otherToggle) otherToggle.classList.remove('active');
                            }
                        });
                        
                        // Toggle current submenu
                        if (isOpen) {
                            submenu.classList.remove('mobile-submenu-open');
                            this.classList.remove('active');
                        } else {
                            submenu.classList.add('mobile-submenu-open');
                            this.classList.add('active');
                        }
                    }
                });
            });
            
            // Close mobile menu when clicking on a link
            const menuLinks = navMenu.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    // Only close if it's not a hash link or if we're navigating away
                    const href = link.getAttribute('href');
                    if (!href || !href.startsWith('#') || href === '#') {
                        console.log('Menu link clicked, closing menu');
                        mobileToggle.classList.remove('active');
                        navMenu.classList.remove('mobile-menu-open');
                        document.body.style.overflow = '';
                    }
                });
            });
            
            // Close mobile menu on window resize if it's open
            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    console.log('Window resized, closing mobile menu');
                    mobileToggle.classList.remove('active');
                    navMenu.classList.remove('mobile-menu-open');
                    document.body.style.overflow = '';
                }
            });
        } else {
            console.error('Mobile menu elements not found!');
        }
    }

    // Navigation scroll effect
    function initNavigationScroll() {
        const nav = document.getElementById('main-nav');
        let lastScrollTop = 0;
        
        if (!nav) return;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Add/remove scrolled class based on scroll position
            if (scrollTop > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
            
            // Hide/show navigation on scroll (optional)
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                nav.style.transform = 'translateY(-100%)';
            } else {
                nav.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
        });
    }

    // Portfolio grid animations
    function initPortfolioAnimations() {
        const portfolioItems = document.querySelectorAll('.portfolio-item');
        
        if (portfolioItems.length === 0) return;

        // Intersection Observer for fade-in animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        portfolioItems.forEach((item, index) => {
            // Set initial styles
            item.style.opacity = '0';
            item.style.transform = 'translateY(30px)';
            item.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            
            observer.observe(item);
        });
    }

    // Smooth scrolling for anchor links
    function initSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]:not(.nav-menu a)').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                
                if (target) {
                    const navHeight = document.getElementById('main-nav').offsetHeight;
                    const targetPosition = target.offsetTop - navHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    // Hero parallax effect
    function initHeroParallax() {
        const heroSection = document.querySelector('.hero-section');
        
        if (!heroSection) return;

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset;
            const parallaxSpeed = 0.5;
            
            heroSection.style.transform = `translateY(${scrollTop * parallaxSpeed}px)`;
        });
    }

    // Image lazy loading enhancement
    function initLazyLoading() {
        const images = document.querySelectorAll('img[data-src]');
        
        if (images.length === 0) return;

        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }

    // Search functionality enhancement
    function initSearchEnhancement() {
        const searchForms = document.querySelectorAll('.search-form');
        
        searchForms.forEach(form => {
            const input = form.querySelector('input[type="search"]');
            
            if (input) {
                input.addEventListener('focus', function() {
                    form.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    form.classList.remove('focused');
                });
            }
        });
    }

    // Social media link tracking (for analytics)
    function initSocialTracking() {
        const socialLinks = document.querySelectorAll('.social-link, .footer-social-link');
        
        socialLinks.forEach(link => {
            link.addEventListener('click', function() {
                const platform = this.href.includes('instagram') ? 'Instagram' :
                               this.href.includes('facebook') ? 'Facebook' :
                               this.href.includes('twitter') ? 'Twitter' :
                               this.href.includes('linkedin') ? 'LinkedIn' :
                               this.href.includes('youtube') ? 'YouTube' :
                               this.href.includes('pinterest') ? 'Pinterest' : 'Unknown';
                
                // Track with Google Analytics if available
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'social_click', {
                        'platform': platform,
                        'page_location': window.location.href
                    });
                }
            });
        });
    }

    // Initialize all functions when DOM is ready
    $(document).ready(function() {
        initNavigationScroll();
        initStickyNavigation();
        initMobileMenu();
        initPortfolioAnimations();
        initSmoothScrolling();
        initHeroParallax();
        initLazyLoading();
        initSearchEnhancement();
        initSocialTracking();
    });

    // Add additional CSS for navigation scroll effect
    const additionalCSS = `
        .main-navigation.scrolled {
            background: var(--menu-bg);
            box-shadow: 0 2px 20px var(--shadow);
        }
        
        .main-navigation {
            transition: all 0.3s ease;
        }
        
        .portfolio-item {
            transition: all 0.3s ease;
        }
        
        .lazy {
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .search-form.focused input {
            transform: scale(1.05);
        }
        
        .search-form input {
            transition: transform 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .nav-menu {
                position: fixed;
                top: 70px;
                left: 0;
                right: 0;
                background: var(--menu-bg);
                backdrop-filter: blur(15px);
                border-bottom: 1px solid var(--border-color);
                flex-direction: column;
                padding: 20px;
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }
            
            .nav-menu.mobile-open {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .mobile-menu-toggle {
                display: block;
                background: none;
                border: none;
                color: var(--text-primary);
                font-size: 1.5rem;
                cursor: pointer;
                padding: 10px;
            }
            
            .mobile-menu-toggle.active {
                color: var(--accent-color);
            }
        }
    `;

    // Inject additional CSS
    const styleSheet = document.createElement('style');
    styleSheet.type = 'text/css';
    styleSheet.innerText = additionalCSS;
    document.head.appendChild(styleSheet);

})(jQuery);