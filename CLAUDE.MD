# AJ Capital Advisory Website

## Project Overview
This is the corporate website for AJ Capital Advisory, a financial advisory firm specializing in debt restructuring, creditor support, financial investigations, M&A advisory, and corporate initiative management.

## Technology Stack
- **Framework**: Slim PHP Framework v3.1
- **Template Engine**: Twig v2.4
- **Email**: PHPMailer v6.0
- **OAuth**: League OAuth2 Client v2.4
- **Server**: Apache/XAMPP
- **Languages**: PHP, JavaScript, HTML/CSS

## Project Structure
```
ajcapital/
├── app/
│   ├── routes.php          # All application routes (EN/ID)
│   ├── settings.php        # Application configuration
│   ├── dependencies.php    # Dependency injection
│   └── resources/views/    # Twig templates
├── assets/
│   ├── db/                 # JSON data files
│   │   ├── casestudy.json  # English case studies
│   │   ├── studikasus.json # Indonesian case studies
│   │   └── leadership.json # Leadership data
│   ├── js/                 # JavaScript files
│   └── css/                # Stylesheets
├── bootstrap/
│   └── app.php            # Application bootstrap
├── index.php              # Entry point
└── composer.json          # PHP dependencies
```

## Key Features
- **Bilingual Support**: Full English (EN) and Indonesian (ID) versions
- **Service Pages**: Six main service categories with case studies
- **Leadership Profiles**: Individual pages for team members
- **Contact Forms**: Email submission via PHPMailer
- **Case Studies**: Dynamic loading from JSON files
- **Careers Section**: Alumni profiles and recruitment information

## Routes Overview

### English Routes (`/EN`)
- `/EN` - Home
- `/EN/aboutus` - About Us
  - `/EN/aboutus/whatmakeusdifferent`
  - `/EN/aboutus/ourleadership`
  - `/EN/aboutus/transactionsandcasestudy`
  - `/EN/aboutus/eventsandconferences`
- `/EN/services` - Services
  - Debt restructurings and turnaround management
  - Creditor support and advisory
  - Financial investigations and litigation support
  - Liquidation, receivership and court appointments
  - M&A advisory and fundraising
  - Corporate initiative management and support
- `/EN/careers` - Careers
- `/EN/contactus` - Contact Us

### Indonesian Routes (`/ID`)
- `/ID` - Beranda
- `/ID/tentangkami` - Tentang Kami
- `/ID/layanan` - Layanan
- `/ID/karir` - Karir
- `/ID/hubungikami` - Hubungi Kami

## Data Files
The website uses JSON files for dynamic content:
- `casestudy.json` - English case studies and transactions
- `studikasus.json` - Indonesian case studies
- `leadership.json` - Team leadership information

## Email Configuration
Contact forms use PHPMailer with SMTP:
- **Host**: sg3plcpnl0183.prod.sin3.secureserver.net
- **Port**: 587 (TLS)
- **From**: info@ajcapital.asia
- **To**: info@ajcapital.co.id

## Development Setup
1. Ensure XAMPP is installed and running
2. Place project in `C:\xampp\htdocs\ajcapital`
3. Install dependencies: `composer install`
4. Configure email credentials in routes.php
5. Access via `http://localhost/ajcapital`

## Common Tasks

### Adding New Case Studies
1. Edit `assets/db/casestudy.json` (English) or `assets/db/studikasus.json` (Indonesian)
2. Add entry with required fields: id, title, description, service category
3. No code changes needed - routes dynamically load JSON data

### Adding Leadership Members
1. Create new Twig template in `app/resources/views/en/cv/` or `app/resources/views/id/cv/`
2. Add route in `app/routes.php` following existing pattern
3. Update leadership listing page template

### Modifying Email Templates
Email templates are in the POST route handlers:
- English: `/send-contact` route (line 1251)
- Indonesian: `/kirim-kontak` route (line 1312)

### Adding New Service Category
1. Add route in `app/routes.php`
2. Create Twig template in `app/resources/views/en/services/` or `id/layanan/`
3. Update services listing page
4. Add case study template for the category

## URL Patterns
- Service pages: `/EN/services/{service-slug}`
- Case studies: `/EN/services/{service-slug}/{id}`
- Leadership: `/EN/aboutus/ourleadership/{person-slug}`

## Notes
- Routes follow RESTful patterns with slugs
- All templates use Twig inheritance
- Static assets in `assets/` directory
- Error logging to `error_log` file in root
- Subdomain `deals.ajcapital.co.id` contains separate Symfony application

## Maintenance
- Check `error_log` for PHP errors
- Update JSON files for content changes
- Email credentials stored in routes.php (consider moving to config)
- Keep Composer dependencies updated

## Security Considerations
- Email credentials are hardcoded in routes.php - consider using environment variables
- SMTP debug mode is ON (line 1263, 1324) - disable in production
- Review .htaccess configuration for security headers
- Validate and sanitize form inputs before sending emails
