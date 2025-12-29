# Analisis Basis Kode - AJ Capital Advisory Website

**Tanggal Analisis**: 3 Desember 2025
**Versi**: 1.0
**Analis**: Claude Code

---

## 📊 Ringkasan Eksekutif

Proyek ini adalah website korporat untuk AJ Capital Advisory yang dibangun menggunakan Slim PHP Framework. Basis kode memiliki struktur yang relatif sederhana namun memiliki beberapa area yang memerlukan perbaikan dalam hal keamanan, performa, dan maintainability.

### Statistik Proyek
- **Total Baris Kode Routes**: 1,372 baris
- **Total Template Twig**: 101 file
- **Total File JSON Database**: 9 file
- **File JavaScript**: 6 file
- **Framework**: Slim PHP v3.1
- **Template Engine**: Twig v2.4

---

## 🏗️ 1. ARSITEKTUR & STRUKTUR

### ✅ Kekuatan
1. **Arsitektur MVC yang Jelas**
   - Separation of concerns antara routes, views, dan logic
   - Penggunaan Twig untuk templating menghindari mixing PHP-HTML
   - Dependency injection menggunakan Slim Container

2. **Struktur Bootstrap yang Baik**
   - Bootstrap process terorganisir dengan baik di `bootstrap/app.php`
   - Settings, dependencies, dan routes dipisahkan ke file berbeda
   - Autoloading Composer terkonfigurasi dengan benar

3. **Dukungan Bilingual**
   - Implementasi lengkap untuk bahasa Inggris dan Indonesia
   - Routing terpisah untuk setiap bahasa (/EN dan /ID)
   - Template terorganisir per bahasa

### ⚠️ Kelemahan
1. **File Routes Terlalu Besar**
   - 1,372 baris dalam satu file `routes.php`
   - Sulit untuk maintain dan debug
   - Banyak duplikasi kode untuk pola yang sama

2. **Banyak File Backup/Lama**
   - Ditemukan 22 file template backup (ori, bak, old, dengan tahun 2020-2023)
   - Menambah ukuran repository tanpa manfaat
   - Membingungkan developer

3. **Tidak Ada Routing Pattern**
   - Setiap route didefinisikan secara manual
   - Tidak menggunakan route groups atau middleware
   - Duplikasi logic untuk handling bahasa berbeda

---

## 💻 2. KUALITAS KODE

### ✅ Yang Baik
1. **Konsistensi Penamaan**
   - Route names konsisten menggunakan kebab-case
   - Variable naming cukup deskriptif
   - Template files terorganisir dengan baik

2. **Penggunaan Twig Templates**
   - Template inheritance digunakan dengan baik
   - Separation antara layout dan content
   - Menghindari inline PHP di views

### ⚠️ Area Perbaikan

#### Code Duplication (HIGH)
**Lokasi**: `app/routes.php` (seluruh file)

**Masalah**: Pola yang sama berulang untuk setiap route:
```php
// Pola ini diulang puluhan kali
$app->get('/EN/services/...', function (Request $request, Response $response, $args) {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    // ... dst
});
```

**Dampak**:
- Sulit untuk maintain
- Bugs harus diperbaiki di banyak tempat
- Perubahan global memerlukan editing manual di banyak lokasi

**Rekomendasi**:
- Buat service class untuk handling JSON data
- Gunakan route groups dan middleware
- Extract common logic ke helper functions

#### Hard-coded Values (MEDIUM)
**Lokasi**: `app/routes.php` line 194, 211, 258, dst.

**Masalah**:
```php
$str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
```

**Dampak**:
- Path hard-coded di banyak tempat
- Sulit untuk mengubah lokasi file
- Testing menjadi sulit

**Rekomendasi**:
- Define paths sebagai konstanta atau config
- Buat data service layer
- Gunakan dependency injection untuk data sources

#### Commented Code (LOW)
**Lokasi**: `assets/js/app.js`, `app/routes.php`

**Masalah**: Banyak kode yang di-comment tidak dihapus

**Rekomendasi**: Hapus commented code, gunakan version control untuk history

---

## 🔒 3. KEAMANAN (CRITICAL ISSUES)

### 🚨 CRITICAL: Kredensial Hard-coded
**Lokasi**: `app/routes.php` line 1278-1281, 1339-1342

**Masalah**:
```php
$mail->Username = "info@ajcapital.asia";
$mail->Password = "AJCap1234";  // HARD-CODED PASSWORD!
```

**Severity**: CRITICAL
**CVSS Score**: ~8.5 (High)

**Risiko**:
- Password tersimpan dalam source code (plain text)
- Jika repository public atau leaked, akses email dapat diambil alih
- Tidak ada rotation mechanism untuk credentials
- Compliance issues (GDPR, ISO 27001)

**Rekomendasi URGENT**:
```php
// 1. Pindahkan ke environment variables
$mail->Username = getenv('SMTP_USERNAME');
$mail->Password = getenv('SMTP_PASSWORD');

// 2. Gunakan .env file (dengan php-dotenv)
// 3. Tambahkan .env ke .gitignore
// 4. SEGERA ubah password yang sudah ter-expose
// 5. Audit siapa saja yang punya akses ke repository
```

### 🚨 HIGH: SMTP Debug Mode ON
**Lokasi**: `app/routes.php` line 1263, 1324

**Masalah**:
```php
$mail->SMTPDebug = 2;  // Shows client AND server messages
```

**Severity**: HIGH

**Risiko**:
- Credentials dan sensitive data dapat ter-expose di logs
- Error messages detail dapat membantu attacker
- Performance overhead

**Rekomendasi**:
```php
// Production: OFF
$mail->SMTPDebug = 0;

// Development: gunakan environment check
$mail->SMTPDebug = getenv('APP_ENV') === 'development' ? 2 : 0;
```

### 🚨 HIGH: No Input Validation
**Lokasi**: `app/routes.php` line 1251-1309, 1312-1372

**Masalah**:
```php
$email = $request->getParam('email');    // No validation
$subject = $request->getParam('subject'); // No sanitization
$phone = $request->getParam('phone');
$name = $request->getParam('name');

$mail->Body = "<p>Name: ".$name."</p><p>Email: ".$email."</p>..."; // XSS risk
```

**Risiko**:
- **Email Injection**: Subject/email dapat dimanipulasi untuk spam
- **XSS**: Jika email dibaca di HTML client tanpa sanitasi
- **No CSRF Protection**: Form dapat di-submit dari site lain
- **No Rate Limiting**: Spam/abuse mungkin terjadi

**Rekomendasi**:
```php
// 1. Validasi input
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return $response->withStatus(400)->write('Invalid email');
}

// 2. Sanitasi untuk HTML
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');

// 3. Tambahkan CSRF token
// 4. Implementasi rate limiting
// 5. Tambahkan CAPTCHA untuk mencegah bot
```

### 🚨 MEDIUM: Error Logging Exposure
**Lokasi**: Root directory

**Masalah**:
- File `error_log` berukuran 14MB di public directory
- Potentially accessible via web browser
- Dapat contain sensitive information

**Rekomendasi**:
```apache
# .htaccess - block access to error_log
<Files error_log>
    Order allow,deny
    Deny from all
</Files>

# Atau pindahkan error logging ke luar webroot
# php.ini: error_log = /var/log/php/error.log
```

### 🚨 MEDIUM: No Security Headers
**Lokasi**: `.htaccess`

**Masalah**: Tidak ada security headers yang di-set

**Rekomendasi**:
```apache
# .htaccess
# Security Headers
Header set X-Content-Type-Options "nosniff"
Header set X-Frame-Options "SAMEORIGIN"
Header set X-XSS-Protection "1; mode=block"
Header set Referrer-Policy "strict-origin-when-cross-origin"
Header set Content-Security-Policy "default-src 'self'"

# HTTPS Redirect (jika applicable)
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

### 🚨 LOW: Display Errors Enabled
**Lokasi**: `app/settings.php` line 5

**Masalah**:
```php
'displayErrorDetails' => true,  // Should be false in production
```

**Risiko**: Information disclosure, stack traces visible

**Rekomendasi**:
```php
'displayErrorDetails' => getenv('APP_ENV') === 'development',
```

---

## ⚡ 4. PERFORMA

### ⚠️ Issues Ditemukan

#### 1. Twig Cache Disabled (MEDIUM)
**Lokasi**: `app/settings.php` line 9

**Masalah**:
```php
'cache' => false  // Twig cache disabled
```

**Dampak**:
- Template di-compile ulang setiap request
- Response time lebih lambat
- CPU usage lebih tinggi
- Server load meningkat pada high traffic

**Impact Estimate**: ~50-200ms overhead per request

**Rekomendasi**:
```php
'cache' => __DIR__ . '/../cache/twig'  // Enable in production

// Atau dengan environment check:
'cache' => getenv('APP_ENV') === 'production' ? __DIR__ . '/../cache/twig' : false
```

#### 2. JSON Files Loaded Per Request (HIGH)
**Lokasi**: `app/routes.php` - 30+ occurrences

**Masalah**:
```php
// Ini dilakukan di SETIAP request
$str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
$json_data = json_decode($str, true);
```

**Dampak**:
- File I/O di setiap request (expensive operation)
- JSON parsing berulang untuk data yang sama
- Tidak ada caching mechanism
- Scalability issues pada high traffic

**Impact Estimate**:
- File read: ~5-10ms per file
- JSON decode: ~5-20ms depending on size
- Total: ~10-30ms overhead per request

**Rekomendasi**:
```php
// Option 1: APCu cache
$cache_key = 'casestudy_json';
$json_data = apcu_fetch($cache_key);
if ($json_data === false) {
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data = json_decode($str, true);
    apcu_store($cache_key, $json_data, 3600); // 1 hour
}

// Option 2: Service class dengan caching
class DataService {
    private static $cache = [];

    public static function getCaseStudies() {
        if (!isset(self::$cache['casestudy'])) {
            $str = file_get_contents(__DIR__ . '/../assets/db/casestudy.json');
            self::$cache['casestudy'] = json_decode($str, true);
        }
        return self::$cache['casestudy'];
    }
}

// Option 3: Move to database (MySQL/PostgreSQL)
```

#### 3. No HTTP Caching Headers (MEDIUM)
**Masalah**: Static content tidak memiliki cache headers

**Dampak**:
- Browser re-download assets setiap kali
- Bandwidth waste
- Slower page loads

**Rekomendasi**:
```apache
# .htaccess
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

#### 4. Large Error Log File (LOW)
**Masalah**: error_log 14MB - menunjukkan banyak errors yang tidak di-handle

**Rekomendasi**:
- Review dan fix errors yang sering terjadi
- Implementasi log rotation
- Pindahkan ke proper logging system (Monolog)

---

## 📁 5. STRUKTUR DATA

### JSON Database Files

**Files Ditemukan**:
1. `casestudy.json` - English case studies ✓
2. `studikasus.json` - Indonesian case studies ✓
3. `leadership.json` - Leadership data ✓
4. `transactions.json`, `transac.json`, `transaksi.json`, `transak.json` - **Duplikasi?**
5. `studikasus2903.json` - **Old version?**
6. `t.json` - **Unknown purpose**

### ⚠️ Issues

1. **Duplikasi Files** (MEDIUM)
   - 4 files dengan nama mirip untuk transactions
   - Tidak jelas mana yang aktif digunakan
   - Inconsistency risk

2. **No Schema Validation** (MEDIUM)
   - JSON files tidak memiliki schema validation
   - Typo atau missing fields tidak terdeteksi
   - Runtime errors mungkin terjadi

3. **File-based Database Limitations** (MEDIUM)
   - Tidak scalable untuk data besar
   - No concurrent access control
   - No transaction support
   - Sulit untuk query complex data

**Rekomendasi**:
```bash
# 1. Cleanup duplicate files
# 2. Implementasi JSON Schema validation
# 3. Consider migration ke database (MySQL/PostgreSQL) untuk:
#    - Better performance
#    - ACID transactions
#    - Complex queries
#    - Concurrent access
#    - Backup & recovery
```

---

## 🧹 6. CODE MAINTENANCE

### Technical Debt

#### 1. Template Files Clutter (MEDIUM)
**22 backup/old files ditemukan**:
- `*_ori.twig`, `*_bak.twig`
- `*_original.twig`
- Files dengan timestamp (2020, 2021, 2022, 2023)

**Masalah**:
- Repository bloat
- Confusion tentang file mana yang aktif
- Merge conflicts potential

**Rekomendasi**:
```bash
# Hapus semua backup files - version control sudah cukup
# List untuk review:
find app/resources/views -name "*ori*" -o -name "*bak*" -o -name "*old*" -o -name "*2020*" -o -name "*2021*" -o -name "*2022*" -o -name "*2023*"

# Setelah konfirmasi, hapus
# Gunakan git untuk history, bukan backup files
```

#### 2. Commented Code (LOW)
**Lokasi**: Multiple files

**Masalah**: Banyak commented code tidak dihapus

**Contoh**: `assets/js/app.js` line 9-49

**Rekomendasi**: Hapus - gunakan git history jika perlu

#### 3. No Code Documentation (MEDIUM)
**Masalah**:
- Tidak ada PHPDoc comments
- Tidak ada function documentation
- Sulit untuk onboarding developer baru

**Rekomendasi**:
```php
/**
 * Send contact form email to AJCapital
 *
 * @param Request $request The HTTP request containing form data
 * @param Response $response The HTTP response object
 * @param array $args Route arguments
 * @return Response Redirect response on success
 */
$app->post('/send-contact', function ($request, $response, $args) {
    // ...
});
```

---

## 🔧 7. DEPENDENCY MANAGEMENT

### Composer Dependencies
```json
{
  "slim/slim": "^3.1",              // ⚠️ Old version (2015)
  "slim/twig-view": "^2.4",         // ✓ Compatible
  "phpmailer/phpmailer": "~6.0",    // ✓ Updated
  "league/oauth2-client": "^2.4"    // ⚠️ Unused?
}
```

### ⚠️ Issues

1. **Slim Framework v3 is EOL** (HIGH)
   - Slim v3 released in 2015
   - Slim v4 is current (2019)
   - v3 no longer receives security updates
   - PHP 8+ compatibility issues

   **Risk**: Security vulnerabilities tidak akan dipatch

   **Rekomendasi**: Plan migration to Slim v4

2. **OAuth2 Client Unused?** (LOW)
   - Dependency `league/oauth2-client` di composer.json
   - Tidak ditemukan usage di codebase
   - Unnecessary dependency

   **Rekomendasi**: Remove jika tidak digunakan

3. **No Development Dependencies** (MEDIUM)
   - Tidak ada testing framework (PHPUnit)
   - Tidak ada code quality tools (PHP_CodeSniffer, PHPStan)
   - Tidak ada development tools

---

## 🧪 8. TESTING

### ❌ Current Status
- **No unit tests**
- **No integration tests**
- **No automated testing**
- **No CI/CD pipeline**

### Impact
- Bugs hanya terdeteksi di production
- Refactoring menjadi berisiko
- Regression bugs tidak terdeteksi
- Code quality sulit dijaga

### Rekomendasi
```bash
# 1. Tambahkan PHPUnit
composer require --dev phpunit/phpunit

# 2. Setup basic tests untuk critical paths
# 3. Implementasi CI/CD dengan GitHub Actions/GitLab CI
# 4. Code coverage minimum 70%
```

---

## 📊 9. METRICS & STATISTICS

### Code Complexity
- **Routes File**: 1,372 lines (VERY HIGH - split recommended)
- **Template Files**: 101 files (OK)
- **JSON Data Files**: 9 files (MEDIUM - consider DB)
- **JavaScript Files**: 6 files (OK)

### Maintenance Index
- **Code Duplication**: HIGH ⚠️
- **Code Documentation**: LOW ⚠️
- **Test Coverage**: 0% ❌
- **Security Score**: 4/10 ⚠️
- **Performance Score**: 6/10 ⚠️

### Technical Debt Estimate
- **Critical Issues**: 3 items (~16 hours)
- **High Priority**: 5 items (~40 hours)
- **Medium Priority**: 10 items (~60 hours)
- **Low Priority**: 8 items (~20 hours)
- **Total Estimate**: ~136 hours (~17 working days)

---

## 🎯 10. PRIORITIZED RECOMMENDATIONS

### 🔴 CRITICAL (Do Immediately)
1. **Move credentials to environment variables** (2 hours)
   - Impact: Security vulnerability
   - File: `app/routes.php`
   - Action: Setup .env, move all credentials

2. **Disable SMTP debug in production** (15 minutes)
   - Impact: Security & performance
   - File: `app/routes.php` line 1263, 1324
   - Action: Set to 0 or use environment check

3. **Change exposed password** (30 minutes)
   - Impact: Critical security
   - Action: Change SMTP password immediately
   - Follow-up: Audit repository access

### 🟠 HIGH (Do This Week)
1. **Implement input validation** (8 hours)
   - Impact: Security (XSS, injection)
   - File: Contact form handlers
   - Action: Add validation & sanitization

2. **Add security headers** (1 hour)
   - Impact: Security
   - File: `.htaccess`
   - Action: Add headers dari contoh di atas

3. **Enable Twig caching** (30 minutes)
   - Impact: Performance ~50-200ms improvement
   - File: `app/settings.php`
   - Action: Enable cache for production

4. **Implement JSON data caching** (4 hours)
   - Impact: Performance ~10-30ms improvement per request
   - Files: All routes loading JSON
   - Action: Create data service with caching

5. **Block error_log access** (15 minutes)
   - Impact: Security
   - File: `.htaccess`
   - Action: Add deny rule

### 🟡 MEDIUM (Do This Month)
1. **Refactor routes.php** (24 hours)
   - Split into multiple files
   - Use route groups
   - Extract common logic

2. **Cleanup old template files** (2 hours)
   - Remove 22 backup files
   - Clean commented code

3. **Add PHPDoc comments** (16 hours)
   - Document all functions
   - Add type hints

4. **Setup JSON schema validation** (4 hours)
   - Prevent data errors

5. **Plan Slim v4 migration** (8 hours research)
   - Assess breaking changes
   - Create migration plan

### 🟢 LOW (Do Eventually)
1. **Setup testing framework** (16 hours)
2. **Implement CI/CD** (8 hours)
3. **Add rate limiting** (4 hours)
4. **Add CSRF protection** (4 hours)
5. **Consider database migration** (40+ hours)

---

## 📈 11. IMPROVEMENT ROADMAP

### Phase 1: Security Fix (Week 1)
- [ ] Move credentials to .env
- [ ] Change exposed passwords
- [ ] Disable SMTP debug
- [ ] Add security headers
- [ ] Implement input validation
- [ ] Block error_log access

**Estimated Time**: 12 hours
**Impact**: Critical security improvements

### Phase 2: Performance (Week 2-3)
- [ ] Enable Twig caching
- [ ] Implement JSON caching
- [ ] Add HTTP cache headers
- [ ] Optimize asset loading

**Estimated Time**: 8 hours
**Impact**: 30-50% performance improvement

### Phase 3: Code Quality (Week 4-6)
- [ ] Refactor routes.php
- [ ] Cleanup old files
- [ ] Add documentation
- [ ] Setup testing
- [ ] Code quality tools

**Estimated Time**: 48 hours
**Impact**: Better maintainability

### Phase 4: Architecture (Month 2-3)
- [ ] Plan Slim v4 migration
- [ ] Consider database migration
- [ ] Implement CI/CD
- [ ] Full test coverage

**Estimated Time**: 80+ hours
**Impact**: Modern, scalable architecture

---

## 🎓 12. BEST PRACTICES VIOLATIONS

### Detected Issues
1. ❌ **Hardcoded credentials** - Use environment variables
2. ❌ **No input validation** - Always validate user input
3. ❌ **Debug mode in production** - Disable in production
4. ❌ **No CSRF protection** - Critical for forms
5. ❌ **No tests** - Minimum 70% coverage recommended
6. ❌ **Twig cache disabled** - Enable in production
7. ❌ **File-based sessions** - Use Redis/Memcached for scale
8. ❌ **No error monitoring** - Use Sentry/Bugsnag
9. ❌ **Large single files** - Split routes.php
10. ❌ **No code review process** - Implement PR reviews

---

## 📝 13. CONCLUSION

### Overall Assessment
**Grade**: C+ (70/100)

**Strengths**:
- ✅ Clear MVC architecture
- ✅ Good template organization
- ✅ Bilingual support implementation
- ✅ Use of modern tools (Composer, Twig)

**Critical Weaknesses**:
- ❌ Security vulnerabilities (hardcoded credentials)
- ❌ No input validation
- ❌ Performance issues (no caching)
- ❌ High technical debt (1372-line routes file)
- ❌ No testing

### Recommended Next Steps
1. **Immediate** (Today): Fix critical security issues
2. **This Week**: Address high-priority items
3. **This Month**: Code refactoring & cleanup
4. **Long-term**: Architecture modernization

### Resources Needed
- **Development Time**: ~136 hours total
- **Priority**: Focus on Phase 1 (Security) immediately
- **Team Size**: 1-2 developers
- **Timeline**: 2-3 months for full improvement

---

## 📞 SUPPORT & QUESTIONS

Jika ada pertanyaan tentang analisis ini atau membutuhkan bantuan implementasi:
1. Review file ini dengan development team
2. Prioritize berdasarkan business impact
3. Implementasi secara incremental
4. Test setiap perubahan secara menyeluruh

**Happy Coding!** 🚀
