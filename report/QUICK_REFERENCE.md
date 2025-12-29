# Quick Reference - AJ Capital Advisory

## 🌐 Access URLs
- **Local Development**: http://ajcapital.local/
- **English Version**: http://ajcapital.local/EN
- **Indonesian Version**: http://ajcapital.local/ID

---

## 📝 Important Files

| File | Purpose | Edit? |
|------|---------|-------|
| `.env` | Environment config (credentials) | ✅ YES (change password!) |
| `.env.example` | Template for .env | ℹ️ Reference only |
| `.gitignore` | Git ignore rules | ⚠️ Rarely |
| `app/routes.php` | All routes (78 routes) | ✅ For new routes |
| `app/settings.php` | App settings | ⚠️ Rarely |
| `app/dependencies.php` | Dependency injection | ⚠️ Rarely |
| `bootstrap/app.php` | App bootstrap | ❌ Don't modify |
| `.htaccess` | Security & routing | ⚠️ Be careful |
| `assets/db/*.json` | Content data | ✅ For content updates |

---

## 🔧 Common Commands

### Composer
```bash
# Install dependencies
composer install

# Update dependencies
composer update

# Check for security vulnerabilities
composer audit
```

### Testing
```bash
# Test homepage
curl http://ajcapital.local/

# Test security headers
curl -I http://ajcapital.local/ | grep "X-"

# Test file protection
curl -I http://ajcapital.local/.env  # Should return 403
```

---

## ⚙️ Environment Variables (.env)

### Critical Settings
```env
# CHANGE THIS IMMEDIATELY!
SMTP_PASSWORD=your_new_strong_password_here

# Environment
APP_ENV=development  # or 'production'
DISPLAY_ERRORS=true  # false for production

# SMTP Debug
SMTP_DEBUG=0  # 0=OFF (production), 2=ON (development)
```

### All SMTP Variables
```env
SMTP_HOST=sg3plcpnl0183.prod.sin3.secureserver.net
SMTP_PORT=587
SMTP_ENCRYPTION=tls
SMTP_USERNAME=info@ajcapital.asia
SMTP_PASSWORD=your_password
SMTP_FROM_EMAIL=info@ajcapital.asia
SMTP_FROM_NAME="Ajcapital Asia Website"
SMTP_TO_EMAIL=info@ajcapital.co.id
SMTP_TO_NAME="AJCapital Info"
SMTP_DEBUG=0
```

---

## 🚨 Emergency Procedures

### If Website is Down
1. Check Apache is running
2. Check error_log: `tail -f error_log`
3. Check .env file exists
4. Test PHP: `php -v`
5. Test composer autoload: `composer dump-autoload`

### If Email Not Sending
1. Check SMTP credentials in `.env`
2. Enable debug: Set `SMTP_DEBUG=2` in `.env`
3. Check error_log for details
4. Test SMTP connection manually
5. Verify firewall allows port 587

### If 403 Errors on Normal Pages
1. Check `.htaccess` file
2. Verify Apache mod_rewrite enabled
3. Check file permissions
4. Clear browser cache

---

## 📊 Project Stats
- **Framework**: Slim 3.12.5
- **PHP Version**: 7.4.20
- **Total Routes**: 78
- **Template Files**: 101
- **JSON Data Files**: 9
- **Languages**: English (EN), Indonesian (ID)

---

## 🔒 Security Checklist

### Daily
- [ ] Monitor error logs
- [ ] Check email delivery

### Weekly
- [ ] Review access logs
- [ ] Test contact forms

### Monthly
- [ ] Run `composer audit`
- [ ] Update dependencies if needed
- [ ] Review security headers: https://securityheaders.com/
- [ ] Change SMTP password (best practice)

---

## 📁 Project Structure
```
ajcapital/
├── .env                    # Environment config (SECRET!)
├── .env.example           # Template
├── .gitignore             # Git ignore
├── composer.json          # PHP dependencies
├── index.php              # Entry point
├── bootstrap/
│   └── app.php           # Bootstrap
├── app/
│   ├── routes.php        # All routes
│   ├── settings.php      # Settings
│   ├── dependencies.php  # DI container
│   └── resources/views/  # Twig templates
├── assets/
│   ├── db/*.json         # Data files
│   ├── css/              # Styles
│   └── js/               # Scripts
└── vendor/               # Composer packages
```

---

## 🎯 Key Contact Form Routes

### English
- **Route**: `POST /send-contact`
- **Success**: Redirects to `/EN/contactus?i=sent`
- **Error**: Redirects to `/EN/contactus?i=error`

### Indonesian
- **Route**: `POST /kirim-kontak`
- **Success**: Redirects to `/ID/hubungikami?i=sent`
- **Error**: Redirects to `/ID/hubungikami?i=error`

---

## 📖 Documentation Files

| File | Description |
|------|-------------|
| `CLAUDE.MD` | Project overview & guide |
| `ANALISIS_KODE.md` | Detailed code analysis |
| `SECURITY_FIXES.md` | Security improvements |
| `UPGRADE_SLIM4_PLAN.md` | Future upgrade plan |
| `QUICK_REFERENCE.md` | This file |

---

## 🆘 Getting Help

1. Check error_log file
2. Review documentation files
3. Check Slim 3 docs: https://www.slimframework.com/docs/v3/
4. PHPMailer docs: https://github.com/PHPMailer/PHPMailer

---

**Last Updated**: 3 December 2025
**Status**: ✅ Production Ready (after password change)
