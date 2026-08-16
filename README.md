# गुन्जनगर खानेपानी आयोजना - Official CMS Website

A complete, production-ready CMS-based official website for Gunjannagar Khane Pani Aayojana (Water Supply Organization).

## Features

- **Dynamic CMS**: Fully manageable from Admin Panel
- **Multi-language Support**: Nepali-first interface with English support
- **Responsive Design**: Works on desktop, tablet, and mobile
- **Modern UI**: Government/utility organization style with blue/water theme
- **Rich Content Management**: Notices, News, Services, Downloads, Gallery, FAQ
- **Contact Management**: Contact form with AJAX submission
- **Search Functionality**: Search across all content
- **SEO Ready**: Meta tags, sitemap, and SEO management
- **Role-based Access**: Super Admin, Admin, Content Manager, Editor

## Technology Stack

- **Framework**: Laravel 12
- **PHP**: 8.3+
- **Database**: MySQL
- **Frontend**: Blade Templates, Bootstrap 5, jQuery, AJAX
- **Icons**: Font Awesome
- **No Build Process**: Runs easily on cPanel/shared hosting

## Installation

### Prerequisites

- PHP 8.3 or higher
- MySQL 5.7 or higher
- Composer
- Web Server (Apache/Nginx)

### Step 1: Clone the Repository

```bash
git clone <repository-url>
cd gunjannagar-khanepani
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Environment Setup

```bash
cp .env.example .env
```

Edit `.env` file and configure your database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gunjannagar_khanepani
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Run Migrations

```bash
php artisan migrate
```

### Step 6: Seed Database (Optional - for demo data)

```bash
php artisan db:seed
```

This will create:
- Default admin user (email: admin@gunjannagar.gov.np, password: Admin@123)
- Sample officials, notices, news, services, downloads, FAQs
- Default settings and statistics

### Step 7: Create Storage Link

```bash
php artisan storage:link
```

### Step 8: Start Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` to view the website.

## Admin Access

- **Admin URL**: `http://localhost:8000/admin/login`
- **Default Email**: `admin@gunjannagar.gov.np`
- **Default Password**: `Admin@123`

**Important**: Change the default admin password after first login.

## Project Structure

```
gunjannagar-khanepani/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin controllers
│   │   │   ├── HomeController.php
│   │   │   └── ContactController.php
│   │   └── Middleware/         # Authentication & permissions
│   ├── Models/                 # Eloquent models
│   └── Providers/
├── database/
│   ├── migrations/             # Database migrations
│   └── seeders/               # Database seeders
├── public/
│   └── uploads/               # Uploaded files
├── resources/
│   └── views/
│       ├── admin/             # Admin panel views
│       └── layouts/           # Layout templates
├── routes/
│   └── web.php                # Web routes
└── storage/
    └── app/public/            # Storage files
```

## Admin Panel Features

### Dashboard
- Statistics overview
- Recent notices, news, and messages
- Quick access to management sections

### Content Management
- **Notices**: Create, edit, delete with priority and pinning
- **News**: Full news management with featured images
- **Services**: Service listings with icons and descriptions
- **Downloads**: File upload and management
- **Gallery**: Albums and image management
- **FAQ**: Question and answer management
- **Important Links**: External link management

### Organization Management
- **Officials**: Add/edit officials with photos
- **Staff**: Staff directory management
- **Statistics**: Homepage statistics management

### Website Settings
- **General**: Site name, tagline, contact info
- **Social Media**: Facebook, Twitter, YouTube links
- **Google Maps**: Location configuration
- **SEO**: Meta tags and descriptions

### Messages
- **Contact Messages**: View and reply to contact form submissions
- **Status Management**: New, Processing, Resolved

## Frontend Sections

1. **Top Bar**: Contact info, date/time, social links
2. **Main Header**: Logo, organization name, tagline, action buttons
3. **Navigation**: Full-width menu with dropdown support
4. **Notice Bar**: Scrolling ticker with important notices
5. **Hero Section**: Water-themed with officials display
6. **Statistics**: Key metrics display
7. **Services**: Service cards with icons
8. **Notices & News**: Latest notices and news
9. **Tariff/Rates**: Water rate information
10. **Downloads**: Forms and documents
11. **Gallery**: Photo gallery with lightbox
12. **Important Links**: External resources
13. **FAQ**: Accordion-style FAQ section
14. **Contact**: Contact form and information
15. **Google Map**: Location map
16. **Footer**: Organization info, quick links, social media

## Deployment

### Shared Hosting (cPanel)

1. Upload all files to `public_html`
2. Set document root to `public` folder
3. Import database
4. Update `.env` file
5. Run `php artisan storage:link` via SSH
6. Set proper file permissions (755 for directories, 644 for files)

### VPS/Dedicated Server

1. Clone repository
2. Install dependencies
3. Configure Nginx/Apache
4. Set up SSL certificate
5. Configure queue worker (if needed)
6. Set up cron jobs for scheduled tasks

## Security

- CSRF protection enabled
- XSS protection enabled
- SQL injection protection via Eloquent ORM
- File upload validation
- Role-based access control
- Secure admin routes
- Activity logging

## Customization

### Colors
Edit CSS variables in `resources/views/layouts/app.blade.php`:

```css
:root {
    --primary-blue: #0d47a1;
    --secondary-blue: #1565c0;
    --bright-blue: #2196f3;
    --water-blue: #00bcd4;
    --water-green: #4caf50;
    --notice-red: #f44336;
}
```

### Logo
Upload your logo via Admin Panel → Settings → General Settings

### Content
All content is managed through the Admin Panel. No code changes needed.

## Support

For issues or questions:
- Email: info@gunjannagar.gov.np
- Phone: +977-01-1234567

## Credits

- **Designed & Developed by**: DMC Group Nepal
- **Framework**: Laravel
- **UI Framework**: Bootstrap 5
- **Icons**: Font Awesome

## License

Proprietary - All rights reserved © 2082 गुन्जनगर खानेपानी आयोजना
