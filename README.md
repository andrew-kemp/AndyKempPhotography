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



# Andy Kemp Photography WordPress Theme

A comprehensive, feature-rich WordPress theme designed specifically for professional photography websites. Features a complete e-commerce solution for print sales, Azure blob storage integration, dynamic galleries, favorites system, email automation, and custom Gutenberg blocks.

---

## Table of Contents

1. [Overview](#overview)
2. [Key Features](#key-features)
3. [Architecture](#architecture)
4. [Database Structure](#database-structure)
5. [Page Templates](#page-templates)
6. [Custom Gutenberg Blocks](#custom-gutenberg-blocks)
7. [Store & E-Commerce](#store--e-commerce)
8. [Photo Management](#photo-management)
9. [Favorites System](#favorites-system)
10. [Gallery System](#gallery-system)
11. [Azure Integration](#azure-integration)
12. [AJAX Endpoints](#ajax-endpoints)
13. [JavaScript Components](#javascript-components)
14. [Email System](#email-system)
15. [Admin Features](#admin-features)
16. [Installation & Setup](#installation--setup)
17. [Configuration](#configuration)
18. [Development](#development)
19. [Troubleshooting](#troubleshooting)

---

## Overview

The Andy Kemp Photography theme is a complete photography website solution that combines portfolio management, e-commerce functionality, and cloud storage integration. Built for WordPress, it provides photographers with tools to showcase their work, sell prints (physical and digital), and manage orders efficiently.

### Technology Stack
- **WordPress**: Core CMS platform
- **PHP 7.4+**: Server-side logic
- **MySQL**: Database storage
- **JavaScript/jQuery**: Client-side interactivity
- **Azure Blob Storage**: Cloud photo storage
- **CSS Grid/Flexbox**: Responsive layouts
- **Font Awesome**: Icon library

---

## Key Features

### Design & User Experience
- ✅ **Dual Color Schemes**: Light and dark modes with smooth transitions
- ✅ **Responsive Design**: Mobile-first, optimized for all devices
- ✅ **Dynamic Pagination**: Auto-adjusting based on view size (small/medium/large)
- ✅ **View Controls**: Users can switch between grid sizes (4×4, 3×3, 2×3)
- ✅ **Carousel Views**: Horizontal scrolling photo galleries with navigation
- ✅ **Lightbox Modals**: Full-screen image viewing with keyboard navigation
- ✅ **Semi-transparent Navigation**: Fixed header with backdrop blur

### E-Commerce Capabilities
- ✅ **Print Sales**: Physical prints in multiple sizes (A3, A4, 8×10)
- ✅ **Digital Downloads**: Sell digital versions of photos
- ✅ **Frame Options**: Optional framing for physical prints
- ✅ **Shopping Basket**: Session-based cart with localStorage persistence
- ✅ **Dynamic Pricing**: Automatic calculation with postage
- ✅ **Order Management**: Complete admin interface for order processing
- ✅ **Order Tracking**: Status updates (pending, processing, dispatched, completed)
- ✅ **Email Notifications**: Automated emails for order confirmation, updates, and dispatch

### Photo Management
- ✅ **Azure Integration**: Cloud storage with SAS token authentication
- ✅ **Multiple Resolutions**: Thumbnail, display (watermarked), original
- ✅ **Metadata Management**: Captions, tags, orientation per photo
- ✅ **Watermarking**: Custom watermark overlay on display images
- ✅ **Gallery Assignment**: Tag-based photo-to-gallery relationships
- ✅ **Batch Operations**: Bulk upload and management

### Social Features
- ✅ **Favorites System**: Users can favorite photos (tracked in database)
- ✅ **Favorite Counter**: Shows popularity with red heart badges
- ✅ **Top 10 Filter**: View most favorited photos
- ✅ **My Favorites**: Personal collection (localStorage + database)
- ✅ **Recent Ordered**: Display recently purchased photos
- ✅ **Popular Photos**: Show most favorited images

### Custom Blocks (Gutenberg)
- ✅ **Featured Galleries**: Display gallery collections
- ✅ **Latest Photos**: Carousel of newest uploads
- ✅ **Recent Ordered Photos**: Showcase recently purchased images
- ✅ **Most Popular Photos**: Display fan favorites
- ✅ **About Section**: Customizable about content block

---

## Architecture

### Directory Structure

```
andykemp-photography-theme/
├── assets/
│   ├── css/
│   │   └── admin.css              # Admin panel styling
│   ├── images/
│   │   └── watermark-instructions.txt
│   └── js/
│       ├── featured-galleries-block.js
│       ├── galleries.js            # Gallery page functionality
│       ├── latest-photos-block.js
│       ├── popular-photos-block.js
│       ├── recent-ordered-photos-block.js
│       ├── store.js                # Store page functionality
│       └── theme.js                # Global theme JavaScript
├── blocks/
│   ├── about-block.js              # About Gutenberg block
│   └── featured-galleries.php     # Block registration & render callbacks
├── archive.php                     # Archive template
├── footer.php                      # Site footer
├── functions.php                   # Core theme functions (11,585+ lines)
├── header.php                      # Site header
├── index.php                       # Main template
├── page-about.php                  # About page template
├── page-contact.php                # Contact page template
├── page-gallery.php                # Gallery listing template
├── page-portfolio.php              # Portfolio page template
├── page-store.php                  # Store page template
├── page.php                        # Generic page template
├── single-gallery.php              # Individual gallery template
├── single.php                      # Single post template
├── style.css                       # Main stylesheet
├── composer.json                   # PHP dependencies
├── AZURE-INTEGRATION.md            # Azure setup documentation
├── email-templates-integration.md  # Email system documentation
└── README.md                       # This file
```

### Core Files Overview

#### `functions.php` (11,585 lines)
The heart of the theme containing:
- Theme setup and configuration
- Custom post type registration
- AJAX endpoint handlers
- Azure integration functions
- Order processing logic
- Email template system
- Admin panel pages
- Database table management
- Photo utility functions
- Watermarking functions
- SAS token generation

#### `style.css`
- CSS Grid layouts for responsive galleries
- View size classes (small, medium, large)
- Blue signature color scheme (#4a90e2)
- Responsive breakpoints
- Animation and transitions
- Print-specific styles

#### JavaScript Files
- **theme.js**: Global functionality, dark mode toggle
- **store.js**: Shopping basket, pagination, favorites, filtering
- **galleries.js**: Gallery page interactions
- Block-specific JS for Gutenberg editor

---

## Database Structure

### Custom Tables

#### `wp_photo_orders`
Stores all order information.

```sql
CREATE TABLE wp_photo_orders (
    id BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    order_id VARCHAR(50) NOT NULL UNIQUE,
    customer_name VARCHAR(200) NOT NULL,
    customer_email VARCHAR(200) NOT NULL,
    customer_phone VARCHAR(50),
    customer_address TEXT,
    order_data LONGTEXT NOT NULL,        -- JSON encoded order items
    status VARCHAR(20) DEFAULT 'pending', -- pending, processing, dispatched, completed, cancelled
    archived TINYINT(1) DEFAULT 0,
    deleted TINYINT(1) DEFAULT 0,
    subtotal DECIMAL(10,2) DEFAULT 0,
    postage DECIMAL(10,2) DEFAULT 0,
    total DECIMAL(10,2) DEFAULT 0,
    special_instructions TEXT,
    tracking_info TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    fulfilled_at DATETIME DEFAULT NULL,
    KEY status (status),
    KEY archived (archived),
    KEY deleted (deleted),
    KEY created_at (created_at),
    KEY fulfilled_at (fulfilled_at)
);
```

**order_data JSON Structure:**
```json
{
    "items": [
        {
            "uniqueName": "photo-short-id",
            "title": "Photo Title",
            "printType": "physical-print|digital",
            "printSize": "A3|A4|8x10",
            "framed": true|false,
            "price": 25.00
        }
    ],
    "customer": {
        "name": "Customer Name",
        "email": "email@example.com",
        "phone": "1234567890",
        "address": {
            "line1": "123 Street",
            "line2": "",
            "city": "City",
            "county": "County",
            "postcode": "AB12 3CD",
            "country": "United Kingdom"
        }
    },
    "specialInstructions": "Optional notes"
}
```

#### `wp_photo_favorites`
Tracks photo popularity via favorites.

```sql
CREATE TABLE wp_photo_favorites (
    id BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    photo_id VARCHAR(50) NOT NULL UNIQUE,
    favorite_count INT(11) DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    KEY photo_id (photo_id),
    KEY favorite_count (favorite_count)
);
```

### WordPress Options

#### `store_photo_meta`
Array storing photo metadata:
```php
[
    'photo-unique-id' => [
        'caption' => 'Photo caption text',
        'tags' => ['Gallery Name', 'Another Gallery'],
        'orientation' => 'landscape|portrait'
    ]
]
```

#### Azure Configuration Options
- `azure_storage_account`: Storage account name
- `azure_storage_key`: Access key
- `azure_storage_container`: Container name
- `azure_storage_sas_token`: SAS token (with expiry)
- `azure_sas_token_expiry`: Token expiration timestamp

#### Email Template Options
- `email_order_confirmation_subject`
- `email_order_confirmation_body`
- `email_order_update_subject`
- `email_order_update_body`
- `email_order_dispatched_subject`
- `email_order_dispatched_body`

---

## Page Templates

### Store Page (`page-store.php`)
**Purpose**: Main e-commerce interface for browsing and purchasing photos.

**Features**:
- Grid view with 3 size options (small 4×4, medium 3×3, large 2×3)
- Filter buttons: All, My Favorites, Top 10
- Dynamic pagination (16/9/6 photos per page based on view)
- Shopping basket sidebar
- Real-time favorite tracking
- Lightbox image viewing
- Add to basket functionality
- localStorage for preferences and basket persistence

**Template Variables**:
```php
$all_photos = get_store_photos(); // Array of photo objects
```

### Individual Gallery (`single-gallery.php`)
**Purpose**: Display photos within a specific gallery.

**Features**:
- Same filtering and view controls as Store
- Gallery-specific photo filtering via tags
- Inline JavaScript for interactions
- AJAX favorite tracking
- Modal image viewing
- Responsive pagination

**Data Flow**:
```php
$gallery_slug = get_post_field('post_name'); // Current gallery
$photo_meta = get_option('store_photo_meta');
// Filter photos by gallery tag
```

### Gallery Listing (`page-gallery.php`)
**Purpose**: Display all available galleries as cards.

**Features**:
- Grid layout of gallery cards
- Featured image thumbnails
- Gallery titles and descriptions
- Links to individual galleries
- Hierarchical page structure (child pages become galleries)

### Portfolio Page (`page-portfolio.php`)
**Purpose**: Overview of all photography work.

### About Page (`page-about.php`)
**Purpose**: Photographer biography and information.

### Contact Page (`page-contact.php`)
**Purpose**: Contact form and information.

---

## Custom Gutenberg Blocks

All blocks registered in `blocks/featured-galleries.php` with JavaScript in `assets/js/`.

### 1. Featured Galleries (`andykemp/featured-galleries`)

**Purpose**: Display a selection of galleries on any page.

**Attributes**:
- `title` (string): Block heading
- `subtitle` (string): Block subheading
- `numberOfGalleries` (number): How many galleries to show (default: 3)
- `parentPage` (number): Filter galleries by parent page
- `showButton` (boolean): Display "View All" button
- `buttonText` (string): Button label
- `buttonUrl` (string): Button destination

**Render**: Queries child pages, displays as grid of cards with thumbnails.

### 2. Latest Photos (`andykemp/latest-photos`)

**Purpose**: Showcase recently uploaded photos in a carousel.

**Attributes**:
- `title` (string): Default "Latest Photos"
- `subtitle` (string): Descriptive text
- `numberOfPhotos` (number): 3-12 photos (default: 6)
- `showButton` (boolean): Show button
- `buttonText` (string): Button label
- `buttonUrl` (string): Button link

**Render**: Horizontal scrolling carousel with navigation arrows, sorted by upload date.

### 3. Recent Ordered Photos (`andykemp/recent-ordered-photos`)

**Purpose**: Display photos from recent customer orders.

**Attributes**:
- `title` (string): Default "Recently Ordered"
- `subtitle` (string): Default "Photos that customers love"
- `numberOfPhotos` (number): 1-5 photos (default: 3)

**Data Source**: Queries `wp_photo_orders` table, extracts `uniqueName` from order items.

**Render**: Carousel view of photos, limited to 5 maximum.

### 4. Most Popular Photos (`andykemp/popular-photos`)

**Purpose**: Show photos with the highest favorite counts.

**Attributes**:
- `title` (string): Default "Most Popular"
- `subtitle` (string): Default "Fan favorites from the collection"
- `numberOfPhotos` (number): 1-5 photos (default: 3)

**Data Source**: Queries `wp_photo_favorites` table, sorted by `favorite_count DESC`.

**Render**: Carousel with red heart badges showing favorite counts.

### 5. About Section (`andykemp/about-section`)

**Purpose**: Display customizable about content.

**Attributes**:
- `showImage` (boolean): Display profile image
- `showExcerpt` (boolean): Display about text
- `alignment` (string): left|center|right

**Data Source**: WordPress Customizer settings.

---

## Store & E-Commerce

### Product Types

#### Physical Prints
Sizes and pricing:
- **A3** (297mm × 420mm): £25.00
- **A4** (210mm × 297mm): £15.00
- **8×10** (203mm × 254mm): £12.00

#### Frame Option
- **Additional Cost**: +£15.00 per print
- **Available for**: All physical print sizes

#### Digital Downloads
- **Price**: £5.00
- **Delivery**: Instant (email link after order confirmation)

### Postage Calculation

**Rules**:
- Digital only orders: £0.00 (no postage)
- 1-3 physical items: £3.50
- 4+ physical items: £7.00

**Implementation**:
```javascript
// In store.js
function calculatePostage(items) {
    const physicalItems = items.filter(item => item.printType !== 'digital');
    if (physicalItems.length === 0) return 0;
    return physicalItems.length <= 3 ? 3.50 : 7.00;
}
```

### Order Flow

1. **Browse**: Customer views photos in Store or Galleries
2. **Add to Basket**: Click "Add to Basket", select print type/size/frame
3. **Basket Review**: Sidebar shows items, quantities, prices
4. **Checkout**: Click "Proceed to Checkout"
5. **Customer Info**: Fill in name, email, phone, address (if physical)
6. **Order Submission**: Creates order in database with unique ID
7. **Confirmation Email**: Automated email sent to customer
8. **Admin Notification**: Admin receives email about new order
9. **Order Management**: Admin updates status via dashboard
10. **Status Emails**: Customer receives updates on order progress
11. **Completion**: Order marked as completed/dispatched

### Basket Persistence

**Storage Mechanism**: localStorage + sessionStorage

```javascript
// Save basket
localStorage.setItem('photoBasket', JSON.stringify(basket));

// Load basket
const basket = JSON.parse(localStorage.getItem('photoBasket')) || [];
```

**Basket Item Structure**:
```javascript
{
    uniqueName: 'photo-id-123',
    title: 'Sunset Landscape',
    thumbnailUrl: 'https://...',
    printType: 'physical-print',
    printSize: 'A3',
    framed: true,
    price: 40.00,
    quantity: 1
}
```

---

## Photo Management

### Photo Storage Architecture

#### Local Storage (Fallback)
```
/wp-content/uploads/store-photos/
├── photo-id-123.jpg          # Original
├── photo-id-123-thumb.jpg    # Thumbnail (300px)
├── photo-id-123-display.jpg  # Watermarked display version
└── photo-id-456.jpg
```

#### Azure Blob Storage (Primary)
```
Container: photos/
├── originals/
│   └── photo-id-123.jpg      # Full resolution
├── thumbnails/
│   └── photo-id-123.jpg      # 300px width
└── display/
    └── photo-id-123.jpg      # Watermarked, 1200px width
```

### Photo Object Structure

```php
[
    'unique_name' => 'photo-short-id',
    'title' => 'Formatted Title',
    'upload_time' => 1735200000,
    'thumbnail_url' => 'https://blob.../thumbnails/photo-id.jpg?sas_token',
    'display_url' => 'https://blob.../display/photo-id.jpg?sas_token',
    'original_url' => 'https://blob.../originals/photo-id.jpg?sas_token',
    'is_azure' => true
]
```

### Watermarking

**Function**: `apply_watermark_to_image()`

**Process**:
1. Load original image
2. Load watermark PNG (transparent background)
3. Position watermark (bottom-right with padding)
4. Blend with 50% opacity
5. Save as display version

**Watermark Settings**:
- Format: PNG with transparency
- Position: Bottom-right corner
- Padding: 20px from edges
- Opacity: 50%
- Size: Auto-scaled to 20% of image width

### Photo Functions

#### `get_store_photos()`
Returns array of all photos with metadata.

```php
function get_store_photos() {
    $azure_enabled = get_option('azure_storage_enabled');
    if ($azure_enabled) {
        return get_azure_photos_with_sas();
    } else {
        return get_local_store_photos();
    }
}
```

#### `get_azure_photos_with_sas()`
Fetches photos from Azure with SAS token URLs.

#### `generate_sas_token()`
Creates time-limited SAS tokens for secure Azure access.

**Token Permissions**:
- Read (r): Allow photo viewing
- List (l): Allow directory listing
- Valid for: 7 days from generation

---

## Favorites System

### Client-Side (localStorage)

**Storage**:
```javascript
const favorites = JSON.parse(localStorage.getItem('photoFavorites')) || [];
// Array of photo unique names: ['photo-123', 'photo-456']
```

**Functions**:
```javascript
function toggleFavorite(photoId) {
    const favorites = getFavorites();
    const index = favorites.indexOf(photoId);
    if (index > -1) {
        favorites.splice(index, 1); // Remove
    } else {
        favorites.push(photoId); // Add
    }
    localStorage.setItem('photoFavorites', JSON.stringify(favorites));
    updateFavoriteDisplay(photoId);
}
```

### Server-Side (Database)

**AJAX Endpoint**: `ajax_track_photo_favorite`

**Action**: `wp_ajax_track_photo_favorite` and `wp_ajax_nopriv_track_photo_favorite`

**Process**:
```php
function ajax_track_photo_favorite() {
    $photo_id = $_POST['photo_id'];
    $is_favorite = $_POST['is_favorite'];
    
    // Convert JavaScript boolean string to PHP boolean
    $is_favorite = in_array($is_favorite, ['true', true, 1, '1'], true);
    
    global $wpdb;
    $table = $wpdb->prefix . 'photo_favorites';
    
    if ($is_favorite) {
        // Increment
        $wpdb->query($wpdb->prepare(
            "INSERT INTO $table (photo_id, favorite_count) 
             VALUES (%s, 1) 
             ON DUPLICATE KEY UPDATE favorite_count = favorite_count + 1",
            $photo_id
        ));
    } else {
        // Decrement (minimum 0)
        $wpdb->query($wpdb->prepare(
            "UPDATE $table 
             SET favorite_count = GREATEST(favorite_count - 1, 0) 
             WHERE photo_id = %s",
            $photo_id
        ));
    }
    
    // Return new count
    $count = $wpdb->get_var($wpdb->prepare(
        "SELECT favorite_count FROM $table WHERE photo_id = %s",
        $photo_id
    ));
    
    wp_send_json_success(['count' => $count]);
}
```

### Display

**Badge HTML**:
```html
<div class="favorite-count" style="color: #e74c3c;">
    <i class="fas fa-heart"></i> 
    <span class="count">42</span>
</div>
```

**CSS**:
```css
.favorite-count {
    background: #ffe6e6;
    color: #e74c3c;
    padding: 5px 12px;
    border-radius: 20px;
    font-weight: 600;
}
```

---

## Gallery System

### Gallery Structure

Galleries are implemented as WordPress **Pages** in a parent-child hierarchy:

```
Portfolio (page-portfolio.php)
└── Galleries (page-gallery.php)
    ├── Landscape Photography (single-gallery.php)
    ├── Wildlife (single-gallery.php)
    ├── Urban Scenes (single-gallery.php)
    └── Portraits (single-gallery.php)
```

### Photo-to-Gallery Assignment

**Mechanism**: Tag-based system using `store_photo_meta`

**Assignment**:
```php
$photo_meta['photo-id-123']['tags'] = ['Landscape Photography', 'Featured'];
```

**Filtering**:
```php
function get_gallery_photos($gallery_slug) {
    $all_photos = get_store_photos();
    $gallery_title = get_the_title();
    
    $filtered = array_filter($all_photos, function($photo) use ($gallery_title, $photo_meta) {
        $tags = $photo_meta[$photo['unique_name']]['tags'] ?? [];
        return in_array($gallery_title, $tags);
    });
    
    return $filtered;
}
```

### Gallery Page Features

**single-gallery.php includes**:
- Filter tabs: All, My Favorites, Top 10
- View size controls: Small (4×4), Medium (3×3), Large (2×3)
- Dynamic pagination
- AJAX favorite tracking
- Lightbox modal viewing
- Responsive grid layout

---

## Azure Integration

See **AZURE-INTEGRATION.md** for detailed setup instructions.

### Configuration

**Admin Panel**: WordPress Admin → Andy Kemp Photos → Azure Settings

**Required Settings**:
1. Storage Account Name
2. Storage Access Key
3. Container Name
4. SAS Token (optional, auto-generated if blank)

### SAS Token Management

**Auto-Generation**: When Azure is enabled, tokens are auto-generated with 7-day validity.

**Token Check**: Before each request, token expiry is checked:
```php
$expiry = get_option('azure_sas_token_expiry');
if (time() > $expiry - 86400) { // Refresh 1 day before expiry
    regenerate_sas_token();
}
```

**Token Structure**:
```
?sv=2021-06-08&ss=b&srt=sco&sp=rl&se=2025-12-31T23:59:59Z&st=2025-12-25T00:00:00Z&spr=https&sig=...
```

### Upload Process

**Function**: `upload_photo_to_azure($file_path, $unique_name)`

**Steps**:
1. Upload original to `originals/`
2. Generate thumbnail (300px) → upload to `thumbnails/`
3. Apply watermark → create display version (1200px) → upload to `display/`

**API Calls**:
```php
$blob_url = "https://{account}.blob.core.windows.net/{container}/{path}?{sas_token}";
$response = wp_remote_request($blob_url, [
    'method' => 'PUT',
    'headers' => [
        'x-ms-blob-type' => 'BlockBlob',
        'Content-Type' => 'image/jpeg'
    ],
    'body' => file_get_contents($file_path)
]);
```

---

## AJAX Endpoints

All AJAX handlers in `functions.php` registered with:
```php
add_action('wp_ajax_{action}', 'handler_function');
add_action('wp_ajax_nopriv_{action}', 'handler_function'); // For non-logged-in users
```

### 1. `track_photo_favorite`
**Purpose**: Update favorite count for a photo.

**Parameters**:
- `photo_id` (string): Photo unique name
- `is_favorite` (string): "true" or "false"

**Response**:
```json
{
    "success": true,
    "data": {
        "count": 42
    }
}
```

### 2. `get_most_favorited`
**Purpose**: Retrieve top 10 most favorited photos.

**Parameters**: None

**Response**:
```json
{
    "success": true,
    "data": {
        "photos": [
            {
                "photo_id": "photo-123",
                "favorite_count": 42
            }
        ]
    }
}
```

### 3. `submit_order`
**Purpose**: Process new customer order.

**Parameters**:
- `order_data` (JSON string): Complete order information

**Process**:
1. Validate order data
2. Generate unique order ID
3. Insert into `wp_photo_orders` table
4. Send confirmation email to customer
5. Send notification email to admin

**Response**:
```json
{
    "success": true,
    "data": {
        "order_id": "ORD-20251226-ABC123",
        "message": "Order placed successfully"
    }
}
```

### JavaScript AJAX Example

```javascript
jQuery.post(ajaxData.ajaxUrl, {
    action: 'track_photo_favorite',
    nonce: ajaxData.nonce,
    photo_id: 'photo-123',
    is_favorite: 'true'
}, function(response) {
    if (response.success) {
        console.log('New count:', response.data.count);
    }
});
```

---

## JavaScript Components

### store.js

**Initialization**:
```javascript
jQuery(document).ready(function($) {
    initStore();
    loadBasket();
    loadViewPreference();
    initPagination();
});
```

**Key Functions**:

#### `initStore()`
Sets up event listeners for:
- Filter buttons (All, My Favorites, Top 10)
- View size controls
- Add to basket buttons
- Favorite toggles

#### `updatePagination(visiblePhotos, allPhotosCount)`
Manages pagination dropdown and photo visibility.

**Logic**:
```javascript
const photosPerPage = getPhotosPerPage(); // 16, 9, or 6
const totalPages = Math.ceil(visiblePhotos.length / photosPerPage);
const startIndex = (currentPage - 1) * photosPerPage;
const endIndex = startIndex + photosPerPage;

// Show/hide photos
$('.photo-thumbnail').each(function(index) {
    $(this).toggle(index >= startIndex && index < endIndex);
});
```

#### `changeViewSize(size)`
Updates grid layout and pagination.

```javascript
function changeViewSize(size) {
    $('.store-gallery')
        .removeClass('view-small view-medium view-large')
        .addClass('view-' + size);
    
    localStorage.setItem('preferredViewSize', size);
    
    const photosPerPage = size === 'small' ? 16 : (size === 'medium' ? 9 : 6);
    updatePagination(getVisiblePhotos(), getTotalPhotoCount());
}
```

#### `addToBasket(photoData)`
Adds photo to shopping basket.

**Process**:
1. Show modal with print options
2. User selects type/size/frame
3. Calculate price
4. Add to basket array
5. Save to localStorage
6. Update basket UI
7. Update basket count badge

#### Basket Item Addition

```javascript
const item = {
    uniqueName: photoData.uniqueName,
    title: photoData.title,
    thumbnailUrl: photoData.thumbnailUrl,
    printType: selectedType,
    printSize: selectedSize,
    framed: isFramed,
    price: calculatePrice(),
    quantity: 1
};

let basket = JSON.parse(localStorage.getItem('photoBasket')) || [];
basket.push(item);
localStorage.setItem('photoBasket', JSON.stringify(basket));
updateBasketDisplay();
```

### galleries.js

**Purpose**: Handle gallery-specific interactions.

**Features**:
- Photo lightbox modal
- Keyboard navigation (arrow keys, escape)
- Responsive image loading

---

## Email System

See **email-templates-integration.md** for full documentation.

### Email Types

#### 1. Order Confirmation
**Trigger**: New order submitted
**Recipients**: Customer + Admin
**Variables**:
- `{customer_name}`
- `{order_id}`
- `{order_date}`
- `{order_items}` (HTML table)
- `{order_total}`

#### 2. Order Update
**Trigger**: Admin changes order status
**Recipients**: Customer
**Variables**:
- `{customer_name}`
- `{order_id}`

#### 3. Order Dispatched
**Trigger**: Order marked as dispatched
**Recipients**: Customer
**Variables**:
- `{customer_name}`
- `{order_id}`
- `{tracking_number}`

### Email Configuration

**Admin Panel**: WordPress Admin → Andy Kemp Photos → Email Templates

**Settings**:
- Subject line (per email type)
- Body content (WYSIWYG editor)
- Variable replacement

### Sending Function

```php
function send_order_email($order_id, $template_type) {
    $order = get_order_by_id($order_id);
    $order_data = json_decode($order->order_data, true);
    
    $subject = get_option("email_{$template_type}_subject");
    $body = get_option("email_{$template_type}_body");
    
    // Replace variables
    $replacements = [
        '{customer_name}' => $order->customer_name,
        '{order_id}' => $order->order_id,
        '{order_date}' => date('F j, Y', strtotime($order->created_at)),
        '{order_total}' => '£' . number_format($order->total, 2),
        '{tracking_number}' => $order->tracking_info ?: 'N/A'
    ];
    
    $subject = str_replace(array_keys($replacements), array_values($replacements), $subject);
    $body = str_replace(array_keys($replacements), array_values($replacements), $body);
    
    // Generate order items table
    $items_html = generate_order_items_table($order_data['items']);
    $body = str_replace('{order_items}', $items_html, $body);
    
    wp_mail($order->customer_email, $subject, $body, ['Content-Type: text/html; charset=UTF-8']);
}
```

---

## Admin Features

### Dashboard Pages

Accessible via **WordPress Admin → Andy Kemp Photos**

#### 1. Photo Management
**Path**: `admin.php?page=andykemp-photos`

**Features**:
- View all photos (thumbnails)
- Edit photo metadata (caption, tags, orientation)
- Upload new photos
- Delete photos
- Azure sync status

**Actions**:
- Bulk upload
- Edit individual photo
- Assign to galleries via tags
- Delete from local + Azure

#### 2. Order Management
**Path**: `admin.php?page=andykemp-orders`

**Features**:
- List all orders (filterable by status)
- View order details
- Update order status
- Add tracking information
- Archive/delete orders
- Send status update emails

**Order Actions**:
- Change status dropdown
- Add tracking number field
- Archive checkbox
- Delete button
- Email customer button

#### 3. Azure Settings
**Path**: `admin.php?page=andykemp-azure`

**Configuration Fields**:
- Enable/Disable Azure
- Storage Account Name
- Storage Access Key
- Container Name
- SAS Token (auto-generated)
- Token Expiry Display

**Actions**:
- Save settings
- Test connection
- Regenerate SAS token
- View token expiry

#### 4. Email Templates
**Path**: `admin.php?page=andykemp-emails`

**Editors** (3 templates):
- Order Confirmation
  - Subject line input
  - WYSIWYG body editor
  - Available variables list
- Order Update
- Order Dispatched

**Variables**:
Display help text showing available placeholders for each template.

#### 5. Watermark Settings
**Path**: `admin.php?page=andykemp-watermark`

**Features**:
- Upload watermark image (PNG with transparency)
- Preview current watermark
- Apply to all photos button
- Instructions for optimal watermark design

---

## Installation & Setup

### Requirements

- **WordPress**: 5.8+
- **PHP**: 7.4+
- **MySQL**: 5.7+
- **Server**: Apache/Nginx with mod_rewrite
- **Memory**: 256MB+ PHP memory limit
- **Azure Account**: (Optional) For cloud storage

### Step 1: Install Theme

**Via WordPress Admin**:
1. Download theme ZIP file
2. Go to **Appearance → Themes → Add New**
3. Click **Upload Theme**
4. Choose ZIP file
5. Click **Install Now**
6. Click **Activate**

**Via FTP**:
1. Extract theme ZIP
2. Upload `andykemp-photography-theme/` to `/wp-content/themes/`
3. Go to **Appearance → Themes**
4. Activate theme

### Step 2: Database Tables

Tables are created automatically on theme activation. Manual creation:

```sql
-- Run in phpMyAdmin or MySQL client
-- Tables will be created with your WP prefix (default: wp_)
```

Functions `create_orders_table()` and table migrations run automatically on:
- `after_switch_theme` hook
- `init` hook (temporary)

### Step 3: Create Pages

Create the following pages in **Pages → Add New**:

1. **Home** (set as front page)
2. **Portfolio**
3. **Galleries** (child of Portfolio)
4. **Store** (assign template: Store)
5. **About** (assign template: About)
6. **Contact** (assign template: Contact)

### Step 4: Create Gallery Pages

Under **Galleries** page, create child pages for each gallery:

1. **Pages → Add New**
2. **Parent**: Galleries
3. **Template**: Default (will use single-gallery.php)
4. **Featured Image**: Set gallery cover photo

Examples:
- Landscape Photography
- Wildlife
- Urban Scenes
- Portraits

### Step 5: Configure Settings

**WordPress → Settings → Reading**:
- Set homepage to "Home" page
- Set posts page (optional)

**Appearance → Menus**:
- Create primary menu
- Add Portfolio, Store, About, Contact
- Set Portfolio as dropdown with gallery children

### Step 6: Upload Photos

**Option A: Via Admin Panel**

1. Go to **Andy Kemp Photos → Photo Management**
2. Click **Upload Photos**
3. Select multiple files
4. For each photo:
   - Add caption
   - Add tags (gallery names)
   - Set orientation
5. Click **Save**

**Option B: Via Azure (Recommended)**

1. Configure Azure settings (see Configuration section)
2. Upload to Azure container using Azure Storage Explorer or Portal
3. Photos will auto-sync to theme

### Step 7: Assign Photos to Galleries

1. Go to **Andy Kemp Photos → Photo Management**
2. Click **Edit** on a photo
3. In **Tags** field, enter gallery name(s) (comma-separated)
4. Example: `Landscape Photography, Featured`
5. Click **Save**

### Step 8: Configure Email Templates

1. Go to **Andy Kemp Photos → Email Templates**
2. Customize subject and body for each template type
3. Use variables like `{customer_name}`, `{order_id}`
4. Click **Save Email Templates**

### Step 9: Upload Watermark

1. Go to **Andy Kemp Photos → Watermark Settings**
2. Click **Select Watermark Image**
3. Choose PNG file with transparent background
4. Click **Use This Image**
5. Click **Apply Watermark to All Photos** (optional)

---

## Configuration

### Azure Storage Setup

**Prerequisites**:
- Azure subscription
- Storage account created
- Container created (public blob access)

**Steps**:

1. **Get Credentials**:
   - Azure Portal → Storage Account
   - Access Keys → Copy Key1
   - Note Storage Account Name

2. **Configure Theme**:
   - WordPress Admin → Andy Kemp Photos → Azure Settings
   - Enable Azure Storage: ✓
   - Storage Account: `youraccount`
   - Access Key: `paste-key-here`
   - Container Name: `photos`
   - Click **Save Settings**

3. **SAS Token**:
   - Token auto-generated on save
   - Valid for 7 days
   - Auto-regenerates when near expiry

4. **Upload Structure**:
   ```
   photos/
   ├── originals/
   ├── thumbnails/
   └── display/
   ```

### Color Scheme

**Primary Colors**:
- Signature Blue: `#4a90e2`
- Signature Hover: `#3a7bc8`
- Favorite Red: `#e74c3c`

**CSS Variables**:
```css
:root {
    --signature-color: #4a90e2;
    --signature-hover: #3a7bc8;
    --text-primary: #333;
    --text-secondary: #666;
    --surface-color: #fff;
    --border-color: #ddd;
    --accent-color: #4a90e2;
}
```

**Customization**:
Edit `style.css` to change colors globally.

### Print Pricing

**Edit Prices**:
Located in `page-store.php` and `store.js`:

```javascript
// In store.js
function calculatePrice(printType, printSize, framed) {
    let price = 0;
    
    if (printType === 'digital') {
        price = 5.00;
    } else if (printType === 'physical-print') {
        switch(printSize) {
            case 'A3': price = 25.00; break;
            case 'A4': price = 15.00; break;
            case '8x10': price = 12.00; break;
        }
        if (framed) {
            price += 15.00;
        }
    }
    
    return price;
}
```

### Postage Rates

**Edit in** `store.js`:

```javascript
function calculatePostage(items) {
    const physicalItems = items.filter(item => item.printType !== 'digital');
    if (physicalItems.length === 0) return 0;
    if (physicalItems.length <= 3) return 3.50;
    return 7.00;
}
```

---

## Development

### File Modification Guidelines

**Core Files**:
- `functions.php`: Core logic (11,585 lines - use search to find sections)
- `style.css`: Global styles
- `page-*.php`: Template-specific markup
- `assets/js/*.js`: JavaScript functionality

**Safe to Edit**:
- Color schemes in `style.css`
- Pricing in `store.js`
- Email templates via admin panel
- Gallery structures (page hierarchy)

**Caution**:
- Database table structures
- AJAX endpoint names
- localStorage key names
- Photo object structure

### Adding New Features

#### New Gutenberg Block

1. **Create JavaScript File**:
   `assets/js/my-new-block.js`

```javascript
(function(blocks, element, editor, components, i18n) {
    blocks.registerBlockType('andykemp/my-new-block', {
        title: 'My New Block',
        icon: 'camera',
        category: 'common',
        attributes: { /* ... */ },
        edit: function(props) { /* ... */ },
        save: function() { return null; }
    });
})(window.wp.blocks, window.wp.element, window.wp.editor, window.wp.components, window.wp.i18n);
```

2. **Register in PHP**:
   Add to `blocks/featured-galleries.php`

```php
function register_my_new_block() {
    register_block_type('andykemp/my-new-block', array(
        'attributes' => array(/* ... */),
        'render_callback' => 'render_my_new_block'
    ));
}
add_action('init', 'register_my_new_block');

function render_my_new_block($attributes) {
    // PHP rendering logic
    ob_start();
    ?>
    <div class="my-new-block">
        <!-- HTML output -->
    </div>
    <?php
    return ob_get_clean();
}

function my_new_block_editor_assets() {
    wp_enqueue_script(
        'my-new-block',
        get_template_directory_uri() . '/assets/js/my-new-block.js',
        array('wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'),
        '1.0.0',
        true
    );
}
add_action('enqueue_block_editor_assets', 'my_new_block_editor_assets');
```

#### New AJAX Endpoint

1. **Add Handler in functions.php**:

```php
function ajax_my_custom_action() {
    // Verify nonce
    check_ajax_referer('ajax-nonce', 'nonce');
    
    // Get data
    $data = $_POST['my_data'];
    
    // Process
    $result = process_data($data);
    
    // Return
    if ($result) {
        wp_send_json_success(['result' => $result]);
    } else {
        wp_send_json_error('Error message');
    }
}
add_action('wp_ajax_my_custom_action', 'ajax_my_custom_action');
add_action('wp_ajax_nopriv_my_custom_action', 'ajax_my_custom_action');
```

2. **Call from JavaScript**:

```javascript
jQuery.post(ajaxData.ajaxUrl, {
    action: 'my_custom_action',
    nonce: ajaxData.nonce,
    my_data: 'value'
}, function(response) {
    if (response.success) {
        console.log(response.data.result);
    }
});
```

### Debugging

**Enable WordPress Debug Mode**:
Edit `wp-config.php`:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

**View Logs**:
- PHP errors: `wp-content/debug.log`
- JavaScript: Browser console (F12)
- Database queries: Install Query Monitor plugin

**Common Issues**:
- **Photos not showing**: Check Azure connection, SAS token expiry
- **Favorites not saving**: Check localStorage enabled, AJAX endpoint working
- **Orders not saving**: Check database table exists, customer email valid
- **Pagination broken**: Check view size localStorage, photos per page calculation

---

## Troubleshooting

### Photos Not Displaying

**Symptoms**: Empty gallery, blank store page

**Solutions**:
1. Check Azure connection:
   - Admin → Azure Settings → Test Connection
2. Verify SAS token:
   - Check expiry date
   - Regenerate if expired
3. Check photo upload:
   - Admin → Photo Management
   - Verify photos listed
4. Browser console:
   - F12 → Check for JavaScript errors
   - Look for AJAX errors

### Favorites Not Working

**Symptoms**: Heart icon doesn't toggle, count not updating

**Solutions**:
1. Check localStorage:
   - Browser allows localStorage
   - Not in private/incognito mode
2. Verify AJAX endpoint:
   - Console → Network tab
   - Look for `admin-ajax.php` calls
3. Check database table:
   - phpMyAdmin → `wp_photo_favorites`
   - Verify table exists

### Orders Not Submitting

**Symptoms**: Checkout button does nothing, no confirmation

**Solutions**:
1. Check form validation:
   - All required fields filled
   - Email format valid
2. Check database:
   - `wp_photo_orders` table exists
3. View console errors:
   - JavaScript errors preventing submission
4. Check PHP error log:
   - `wp-content/debug.log`

### Email Not Sending

**Symptoms**: Orders placed but no email received

**Solutions**:
1. Check email templates:
   - Admin → Email Templates
   - Verify templates saved
2. Check PHP mail function:
   - Install WP Mail SMTP plugin
   - Configure SMTP settings
3. Check spam folder
4. Test with WP Mail Log plugin

### Azure Upload Failing

**Symptoms**: Photos uploaded but not appearing

**Solutions**:
1. Verify credentials:
   - Correct storage account name
   - Valid access key
2. Check container:
   - Container exists
   - Public blob access enabled
3. Check SAS token:
   - Token permissions include write
   - Token not expired
4. View error message:
   - Admin panel error notices
   - PHP error log

### Pagination Not Working

**Symptoms**: All photos visible, page selector broken

**Solutions**:
1. Check JavaScript loaded:
   - View page source
   - Look for `store.js`
2. Check localStorage:
   - Console → Application → Local Storage
   - Look for `preferredViewSize`
3. Clear cache:
   - Ctrl+Shift+R (hard refresh)
4. Check photo count:
   - Minimum photos for pagination

---

## Support & Maintenance

### Regular Maintenance Tasks

**Weekly**:
- Process and fulfill orders
- Check SAS token expiry
- Backup database

**Monthly**:
- Update photo metadata
- Archive old orders
- Review favorite photos for trends

**As Needed**:
- Upload new photos
- Create new galleries
- Update email templates
- Adjust pricing

### Backup Recommendations

**Database**:
- Use WordPress plugin (UpdraftPlus, BackupBuddy)
- Backup before major updates
- Include custom tables: `wp_photo_orders`, `wp_photo_favorites`

**Files**:
- Theme files: `/wp-content/themes/andykemp-photography-theme/`
- Uploads: `/wp-content/uploads/store-photos/`
- Azure: Blob storage has built-in redundancy

### Performance Optimization

**Image Optimization**:
- Azure thumbnails: 300px width
- Display versions: 1200px width watermarked
- Lazy loading enabled on all templates

**Caching**:
- Use WordPress caching plugin (WP Super Cache, W3 Total Cache)
- Enable Azure CDN for photo delivery
- Browser caching for static assets

**Database**:
- Regular optimization via phpMyAdmin
- Archive old orders (delete = 0, archived = 1)
- Clean up photo favorites with 0 count

---

## Credits & License

**Theme Developer**: Andy Kemp Photography
**Version**: 2.0
**License**: Proprietary - All rights reserved

**Third-Party Libraries**:
- WordPress Core (GPL v2+)
- Font Awesome Icons (Font Awesome Free License)
- jQuery (MIT License)
- Azure Storage REST API (Microsoft)

---

## Changelog

### Version 2.0 (December 2025)
- Added Azure Blob Storage integration
- Implemented e-commerce store functionality
- Created custom Gutenberg blocks
- Added favorites system with database tracking
- Implemented order management dashboard
- Added email template system
- Created dynamic pagination
- Added view size controls (small/medium/large)
- Implemented carousel views for blocks
- Fixed favorite count tracking bug
- Added Recent Ordered Photos block
- Added Most Popular Photos block
- Improved responsive design
- Updated color scheme to blue (#4a90e2)

### Version 1.0 (Initial Release)
- Basic theme structure
- Portfolio and gallery pages
- Light/dark mode toggle
- Responsive design
- Basic customizer options

---

**For more information or support, contact: andy@andykemp.photography**

2. **Configure homepage**:
   - Go to Settings > Reading
   - Set "Your homepage displays" to "A static page"
   - Choose your home page

### 2. Hero Section Setup

1. **Upload hero image**:
   - Go to Appearance > Customize > Hero Section
   - Upload your hero background image
   - Add or modify the custom tagline

2. **Set up site logo**:
   - Go to Appearance > Customize > Site Identity
   - Upload your logo under "Logo"

### 3. Portfolio Setup

The theme includes a custom Portfolio post type:

1. **Create portfolio categories**:
   - Go to Portfolio > Portfolio Categories
   - Add categories like "Nature", "Landscape", "Wildlife", etc.

2. **Add portfolio items**:
   - Go to Portfolio > Add New Portfolio Item
   - Add title, description, and featured image
   - Assign to appropriate category

### 4. Social Media

1. **Add social links**:
   - Go to Appearance > Customize > Social Media
   - Add URLs for your social media profiles
   - Links will automatically appear as icons

### 5. Theme Mode

1. **Set default theme**:
   - Go to Appearance > Customize > Theme Options
   - Choose between Light Mode and Dark Mode as default
   - Users can still toggle between modes using the theme toggle button

## Menu Structure

The recommended menu structure for the theme:

```
- Home
- Portfolio
  - Nature
  - Landscape
  - Wildlife
  - Urban
  - (Add your gallery categories)
- Prints
- About
- Contact
```

## Page Templates

The theme includes several page templates:

- **Front Page**: Home page with hero section
- **Single Post**: Individual blog posts and portfolio items
- **Page**: Static pages (About, Contact, etc.)
- **Archive**: Portfolio archives and blog archives
- **Category/Tag Archives**: Filtered content displays

## Customization Options

### Through WordPress Customizer

- **Site Identity**: Logo, site title, tagline
- **Hero Section**: Background image, custom tagline
- **Social Media**: Links to social platforms
- **Theme Options**: Default color scheme

### CSS Variables

The theme uses CSS custom properties for easy color customization:

```css
:root {
    --primary-bg: #ffffff;
    --text-primary: #333333;
    --accent-color: #2c3e50;
    /* Add your custom colors */
}
```

## File Structure

```
andykemp-photography-theme/
├── style.css                 # Main stylesheet with theme info
├── functions.php             # Theme functions and features
├── index.php                 # Main template file
├── header.php               # Header template
├── footer.php               # Footer template
├── single.php               # Single post template
├── page.php                 # Static page template
├── archive.php              # Archive template
├── assets/
│   ├── css/
│   └── js/
│       └── theme.js         # Theme JavaScript
└── template-parts/          # Partial templates
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Features

- **CSS Variables**: Efficient theming system
- **Lazy Loading**: Images load as they enter viewport
- **Optimized Images**: Multiple image sizes for different contexts
- **Minimal Dependencies**: Clean, lightweight code
- **Backdrop Filters**: Modern CSS effects for browsers that support them

## Developer Notes

### Hooks and Filters

The theme includes several action hooks for customization:

- `andykemp_photography_setup`: Theme setup
- `andykemp_photography_scripts`: Enqueue scripts and styles
- Standard WordPress hooks for posts, pages, and comments

### Custom Post Types

- **Portfolio**: Custom post type for photography work
- **Portfolio Category**: Custom taxonomy for organizing portfolio items

### Image Sizes

The theme registers custom image sizes:

- `portfolio-thumb`: 400x300px (cropped)
- `portfolio-large`: 800x600px (cropped)
- `hero-image`: 1920x1080px (cropped)

## Support and Updates

For support or customization requests, please contact the theme developer.

## License

This theme is licensed under the GPL v2.0 or later.

## Credits

- **Fonts**: Inter (Google Fonts)
- **Icons**: Font Awesome
- **Framework**: WordPress
- **CSS**: Modern CSS with Grid and Flexbox
- **JavaScript**: Vanilla JS with jQuery support

---

*Exploring nature, one frame at a time.*
