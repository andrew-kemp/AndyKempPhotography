# Andy Kemp Photography WordPress Theme

[![WordPress](https://img.shields.io/badge/WordPress-5.0+-blue.svg)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4+-purple.svg)](https://php.net/)
[![License](https://img.shields.io/badge/License-GPL%20v2+-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)

A modern, elegant WordPress theme designed specifically for photography websites. Features a stunning hero section with parallax effects, dual color schemes, custom gallery blocks, and performance-optimized animations. Perfect for photographers looking to showcase their work with a professional, distraction-free design.

![Theme Preview](andykemp-photography-theme/screenshot.png)

## ✨ Key Features

### 🎨 Modern Design
- **Hero Section**: Full-viewport parallax hero with floating description overlay
- **Custom Gallery Block**: WordPress block editor integration for featured galleries
- **Responsive Grid**: CSS Grid and Flexbox layouts optimized for all devices
- **Smooth Animations**: Hardware-accelerated transitions with accessibility support

### 📸 Photography-Focused
- **Gallery Templates**: Custom page templates for photography galleries
- **Featured Galleries Block**: Gutenberg block for showcasing portfolio highlights
- **Image Optimization**: Responsive images with lazy loading
- **Portfolio Organization**: Child page structure for gallery categorization
- **Professional Layout**: Clean, minimal design that lets photography shine

### 🚀 Performance & UX
- **Parallax Effects**: Synchronized hero background and text scrolling
- **Smooth Scrolling**: Hardware-accelerated animations at 60fps
- **Loading States**: Progressive content loading with fade-in animations
- **Accessibility**: WCAG compliant with reduced motion support
- **Mobile Optimized**: Touch-friendly interface with optimized interactions

### 🛠️ Developer-Friendly
- **Modern CSS**: CSS Grid, Flexbox, and Custom Properties
- **Vanilla JavaScript**: No framework dependencies, optimized performance
- **WordPress Standards**: Follows WordPress coding standards and best practices
- **Customizer Integration**: Easy theme customization through WordPress
- **Block Editor Ready**: Full Gutenberg support with custom blocks

## 🚀 Quick Start

### Installation

1. **Download** the theme files
2. **Upload** to your WordPress site:
   ```
   Via Admin: Appearance → Themes → Add New → Upload Theme
   Via FTP: Upload to /wp-content/themes/
   ```
3. **Activate** the theme in Appearance → Themes
4. **Customize** through Appearance → Customize

### Essential Setup

1. **Create Homepage**:
   - Create a new page titled "Home"
   - Set as static homepage in Settings → Reading

2. **Configure Hero Section**:
   - Upload hero image in Customizer → Hero Section
   - Add custom tagline (optional)

3. **Set Up Galleries**:
   - Create main "Galleries" page
   - Add child pages for each gallery category
   - Add Featured Galleries block to homepage

## 📖 Detailed Setup Guide

### Hero Section Configuration

The hero section is the focal point of your homepage:

```php
// Customizer Options Available:
- Hero Background Image
- Custom Tagline
- Social Media Links
```

1. Navigate to **Appearance → Customize → Hero Section**
2. Upload a high-resolution image (recommended: 1920x1080px or larger)
3. Add your custom tagline or leave empty to use site tagline
4. Preview changes in real-time

### Gallery Structure

The theme uses a hierarchical page structure for galleries:

```
📁 Galleries (parent page)
├── 📸 Landscape Photography
├── 📸 Wildlife Photography
├── 📸 Aviation Heritage
└── 📸 Motorsport Action
```

**Setup Process**:
1. Create a main "Galleries" page
2. Create child pages for each gallery category
3. Add images using WordPress media gallery
4. Use the Featured Galleries block to highlight galleries on homepage

### Featured Galleries Block

The custom Gutenberg block allows you to showcase selected galleries:

1. **Add Block**: In page editor, add "Featured Galleries" block
2. **Configure Settings**:
   - Title and subtitle
   - Button text and URL
   - Displays child pages of the galleries page automatically

### Navigation Setup

Recommended menu structure:
```
🏠 Home
📁 Galleries
   ├── Nature
   ├── Landscape  
   ├── Wildlife
   └── (Your categories)
🖼️ Prints
ℹ️ About
📧 Contact
```

## 🎨 Customization

### WordPress Customizer

Access through **Appearance → Customize**:

#### Site Identity
- Custom logo upload
- Site title and tagline
- Site icon (favicon)

#### Hero Section
- Background image upload
- Custom tagline

#### Social Media
Configure social media links that appear in the header:
- Instagram
- Facebook  
- Twitter
- LinkedIn
- YouTube
- Pinterest

#### Theme Options
- Default color scheme (light/dark)

### CSS Custom Properties

The theme uses CSS variables for easy color customization:

```css
:root {
    --primary-bg: #1a1a1a;
    --secondary-bg: #2a2a2a;
    --text-primary: #ffffff;
    --text-secondary: #cccccc;
    --accent-color: #3498db;
    --signature-color: #8a2be2;
    --border-color: rgba(255, 255, 255, 0.1);
    --shadow: rgba(0, 0, 0, 0.3);
}
```

Override these in your child theme or custom CSS to match your brand colors.

## 📁 File Structure

```
andykemp-photography-theme/
├── 📄 style.css                 # Main stylesheet with theme information
├── ⚙️ functions.php             # Theme functionality and WordPress hooks
├── 🏠 index.php                 # Main template file (homepage)
├── 📄 page.php                  # Static page template
├── 📄 page-galleries.php        # Custom galleries page template
├── 📄 single.php                # Single post template
├── 📄 archive.php               # Archive template
├── 🔝 header.php                # Header with navigation and hero
├── 🔚 footer.php                # Footer template
├── 📁 assets/
│   ├── 🎨 css/                  # Additional stylesheets
│   ├── 🖼️ images/               # Theme images and assets
│   └── ⚡ js/
│       ├── theme.js             # Main theme JavaScript
│       └── featured-galleries-block.js
├── 🧩 blocks/
│   └── featured-galleries.php   # Custom Gutenberg block
├── 🗂️ template-parts/           # Reusable template components
└── 📸 screenshot.png            # Theme preview image
```

## 🔧 Technical Specifications

### Requirements
- **WordPress**: 5.0 or higher
- **PHP**: 7.4 or higher
- **MySQL**: 5.6 or higher

### Browser Support
- ✅ Chrome (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Edge (latest)
- ✅ Mobile browsers (iOS Safari, Chrome Mobile)

### Performance Features
- **Lazy Loading**: Images load as they enter viewport
- **Hardware Acceleration**: CSS transforms use GPU acceleration
- **Optimized Assets**: Minified CSS and JavaScript
- **Reduced HTTP Requests**: Efficient asset loading
- **Responsive Images**: Multiple sizes for different screen densities

### Accessibility
- **WCAG 2.1 AA Compliant**
- **Keyboard Navigation**: Full keyboard accessibility
- **Screen Reader Support**: Proper ARIA labels and semantic markup
- **Color Contrast**: Meets accessibility contrast requirements
- **Reduced Motion**: Respects user's motion preferences

## 🎯 Use Cases

This theme is perfect for:

### Professional Photographers
- Portfolio showcase websites
- Client galleries and proofing
- Print sales integration
- Brand presentation

### Photography Businesses
- Studio websites
- Event photography services
- Stock photography portfolios
- Photography blogs

### Creative Professionals
- Digital artists
- Graphic designers
- Visual content creators
- Creative agencies

## 📱 Responsive Design

The theme is built mobile-first with breakpoints:

```css
/* Mobile First Approach */
@media (min-width: 768px)  { /* Tablet */ }
@media (min-width: 1024px) { /* Desktop */ }
@media (min-width: 1200px) { /* Large Desktop */ }
```

### Mobile Optimizations
- Touch-friendly navigation
- Optimized image sizes
- Simplified layouts
- Fast loading times

## 🔒 Security Features

- **Sanitized Inputs**: All user inputs properly sanitized
- **Nonce Verification**: CSRF protection for forms
- **Escape Outputs**: All outputs properly escaped
- **WordPress Standards**: Follows WordPress security best practices

## 🔄 Updates & Maintenance

### Version History
- **v1.0.0**: Initial release
- Theme follows semantic versioning

### Getting Updates
Currently distributed as a standalone theme. Updates will be available through:
- GitHub releases
- Direct download from developer

## 🤝 Contributing

Contributions are welcome! Please:

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

### Development Setup
```bash
# Clone the repository
git clone https://github.com/andrew-kemp/AndyKempPhotography.git

# Navigate to theme directory
cd AndyKempPhotography/andykemp-photography-theme

# Make your changes and test
```

## 🔌 Recommended Plugins

This theme works best with the following WordPress plugins for enhanced functionality, security, and performance:

### Essential Plugins

#### **NextGEN Gallery** (Required for advanced galleries)
- **Purpose**: Professional gallery management with advanced features
- **Benefits**: Enhanced gallery layouts, image management, and display options
- **Version**: 4.0.0+ recommended
- **Status**: Over 30 million downloads - industry standard

#### **Contact Form 7** (Required for contact functionality)
- **Purpose**: Simple, flexible contact form management
- **Benefits**: Easy contact form creation and spam protection
- **Version**: 6.1.4+ recommended
- **Note**: Simple but highly customizable

### Security & Performance

#### **Two Factor** (Highly Recommended)
- **Purpose**: Enhanced WordPress security with 2FA
- **Benefits**: Time-based authentication, email verification, backup codes
- **Version**: 0.14.1+ recommended

#### **WebAuthn Provider for Two Factor** (Optional)
- **Purpose**: Modern passwordless authentication
- **Benefits**: Biometric login support for enhanced security
- **Version**: 2.5.4+ recommended

#### **WP Content Copy Protection & No Right Click** (Content Protection)
- **Purpose**: Protect your photography from unauthorized copying
- **Benefits**: Disable right-click, text selection, and image saving
- **Version**: 3.6.5+ recommended
- **Note**: Essential for protecting your photography work

### File Management & SEO

#### **Big File Uploads** (Recommended)
- **Purpose**: Upload large, high-resolution photography files
- **Benefits**: Bypass WordPress file size limits for professional images
- **Version**: 2.1.7+ recommended

#### **Broken Link Checker by AIOSEO** (SEO)
- **Purpose**: Monitor and fix broken links automatically
- **Benefits**: Maintain SEO health and user experience
- **Version**: 1.2.7+ recommended

### Analytics & Insights

#### **Google Analytics for WordPress by MonsterInsights** (Optional)
- **Purpose**: Track website performance and visitor behavior
- **Benefits**: Understand your audience and optimize content
- **Version**: 9.10.1+ recommended

#### **Site Kit by Google** (Alternative Analytics)
- **Purpose**: Official Google integration for WordPress
- **Benefits**: Unified dashboard for Google services
- **Version**: 1.167.0+ recommended

### Authentication (Optional)

#### **WP-WebAuthn** (Advanced Security)
- **Purpose**: Passwordless login with modern web standards
- **Benefits**: Enhanced security without passwords
- **Version**: 1.3.4+ recommended

### Plugin Installation Notes

1. **Install through WordPress Admin**: Plugins → Add New → Search
2. **Configure after installation**: Each plugin includes setup wizards
3. **Regular updates**: Keep plugins updated for security and compatibility
4. **Backup before installation**: Always backup your site before installing new plugins

### Plugin Compatibility

All listed plugins have been tested with this theme and WordPress 5.0+. The theme's custom CSS accommodates common plugin styling to ensure seamless integration.

### Alternative Plugins

If you prefer different solutions:

- **Contact Forms**: Gravity Forms, WPForms, Ninja Forms
- **Galleries**: FooGallery, Envira Gallery, Modula
- **Security**: Wordfence, Sucuri, iThemes Security
- **Analytics**: Jetpack, Google Analytics Dashboard Plugin

## 📄 License

This theme is licensed under the **GPL v2.0 or later**.

```
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

## 🙏 Credits

### Technologies
- **WordPress**: Content management system
- **CSS Grid & Flexbox**: Modern layout techniques
- **Intersection Observer API**: Performance optimizations
- **CSS Custom Properties**: Dynamic theming

### Resources
- **Fonts**: System fonts for optimal performance
- **Icons**: Custom SVG icons and social media integration

## 📞 Support

For support, questions, or custom development:

- **GitHub Issues**: Report bugs and request features
- **Email**: Contact developer directly
- **Documentation**: Refer to this README for setup guidance

## 🌟 Showcase

Using this theme? We'd love to see your site! Share your photography website and get featured in our showcase.

---

**Built with ❤️ for photographers who demand excellence.**

*Exploring nature, one frame at a time.*