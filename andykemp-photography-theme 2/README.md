# Andy Kemp Photography WordPress Theme

A modern, clean WordPress theme designed specifically for photography websites. Features dual color schemes (light/dark), semi-transparent navigation, hero image sections, and a single-column layout optimized for showcasing photography work.

## Features

### Design
- **Dual Color Schemes**: Light and dark modes with smooth transitions
- **Hero Image Section**: Full-width hero area with overlay for site branding
- **Semi-transparent Navigation**: Fixed navigation with backdrop blur effect
- **Single Column Layout**: Clean, distraction-free design focused on content
- **Responsive Design**: Optimized for all devices and screen sizes

### Navigation
- **Portfolio Menu**: Dropdown menu structure for galleries
- **Top-level Pages**: Portfolio (with sub-galleries), Prints, About, Contact
- **Social Media Integration**: Fixed social media icons for easy access

### Photography Features
- **Portfolio Post Type**: Custom post type for organizing photography work
- **Portfolio Categories**: Taxonomy for organizing different types of photography
- **Gallery Support**: Built-in WordPress gallery support with custom styling
- **Image Optimization**: Responsive images with lazy loading support

### Customization
- **WordPress Customizer Integration**: Easy theme customization through WordPress
- **Custom Logo Support**: Upload and display your brand logo
- **Hero Image Settings**: Upload and manage hero background images
- **Social Media Links**: Add links to Instagram, Facebook, Twitter, LinkedIn, YouTube, and Pinterest
- **Theme Mode Selection**: Choose default light or dark mode

## Installation

1. **Download**: Download the theme files to your computer
2. **Upload**: 
   - Via WordPress Admin: Go to Appearance > Themes > Add New > Upload Theme
   - Via FTP: Upload the theme folder to `/wp-content/themes/`
3. **Activate**: Navigate to Appearance > Themes and activate "Andy Kemp Photography"
4. **Customize**: Go to Appearance > Customize to set up your theme

## Setup Guide

### 1. Initial Configuration

After activating the theme:

1. **Set up menus**:
   - Go to Appearance > Menus
   - Create a new menu and assign it to "Primary Menu"
   - Add pages for Portfolio, Prints, About, Contact

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