# Rencana Upgrade Slim Framework 3 ke Slim 4

**Tanggal**: 3 Desember 2025
**Current Version**: Slim 3.12.5
**Target Version**: Slim 4.x (Latest)
**Status**: FEASIBILITY ANALYSIS & MIGRATION PLAN

---

## 📊 EXECUTIVE SUMMARY

### Apakah Mungkin?
**✅ YA, SANGAT MUNGKIN** - Namun memerlukan effort yang signifikan.

### Level Kesulitan
**MEDIUM to HIGH** (6/10)

### Estimasi Waktu
- **Minimum**: 40-60 jam (5-8 hari kerja)
- **Realistis**: 80-120 jam (10-15 hari kerja)
- **Dengan testing menyeluruh**: 120-160 jam (15-20 hari kerja)

### Estimasi Biaya
- **Developer Cost**: 10-20 hari kerja × tarif developer
- **Testing & QA**: 3-5 hari kerja
- **Total**: ~15-25 hari kerja

---

## 🎯 MENGAPA HARUS UPGRADE?

### Keuntungan Upgrade ke Slim 4

1. **Security & Support** ⭐⭐⭐⭐⭐
   - Slim 3 sudah tidak mendapat security updates
   - Slim 4 aktif di-maintain dan mendapat patch security
   - PHP 8.x compatibility lebih baik

2. **Performance** ⭐⭐⭐⭐
   - Architecture lebih modern dan efficient
   - Better PSR-7/PSR-15 compliance
   - Middleware system lebih optimal

3. **Modern PHP Features** ⭐⭐⭐⭐
   - Type declarations support
   - Better error handling
   - Modern coding standards

4. **Future-Proof** ⭐⭐⭐⭐⭐
   - Ready for PHP 8.x features
   - Active community support
   - Long-term viability

### Kerugian/Risiko

1. **Development Time** ⚠️
   - Significant refactoring required
   - 78 routes perlu diupdate
   - Testing semua functionality

2. **Downtime Risk** ⚠️
   - Potential bugs during migration
   - Need thorough testing
   - Rollback plan required

3. **Learning Curve** ⚠️
   - Team perlu familiar dengan Slim 4 patterns
   - New dependency injection patterns
   - Middleware architecture changes

---

## 📋 CURRENT STATE ANALYSIS

### Statistik Proyek
- **Total PHP Lines**: 3,275 lines
- **Total Routes**: 78 routes (GET & POST)
- **Route Patterns**: 166 occurrences menggunakan old patterns
- **Main Dependencies**:
  - slim/slim: 3.12.5
  - slim/twig-view: 2.5.1
  - phpmailer/phpmailer: 6.12.0
  - twig/twig: 3.11.3

### Code Patterns yang Perlu Diubah

#### 1. Route Definitions (78 routes)
**Slim 3 (Current):**
```php
$app->get('/EN', function (Request $request, Response $response, $args) {
    // ... logic ...
    return $this->view->render($response, 'en/home.twig', $vars);
})->setName('home');
```

**Slim 4 (Target):**
```php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/EN', function (Request $request, Response $response, $args) {
    // ... logic ...
    return $this->get('view')->render($response, 'en/home.twig', $vars);
})->setName('home');
```

#### 2. Request Parameters (166 occurrences)
**Slim 3:**
```php
$email = $request->getParam('email');
```

**Slim 4:**
```php
$params = $request->getParsedBody();
$email = $params['email'] ?? '';
// Atau menggunakan helper
$email = $request->getParsedBody()['email'] ?? '';
```

#### 3. Response Redirects
**Slim 3:**
```php
return $response->withRedirect('/EN/contactus?i=sent');
```

**Slim 4:** (Same, no change - compatible)
```php
return $response->withRedirect('/EN/contactus?i=sent');
```

#### 4. Twig View Integration
**Slim 3:**
```php
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig($path, $options);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c->router,
        $c->request->getUri()
    ));
    return $view;
};
```

**Slim 4:**
```php
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

$twig = Twig::create($path, $options);
$app->add(TwigMiddleware::create($app, $twig));
```

---

## 🔴 BREAKING CHANGES SUMMARY

Berdasarkan [official upgrade guide](https://www.slimframework.com/docs/v4/start/upgrade.html) dan [community resources](https://blog.mansonthomas.com/2019/11/upgrade-slimframework-v3-to-v4-how-i.html), berikut breaking changes utama:

### 1. PHP Version Requirement ⚠️
- **Slim 3**: PHP 5.5+ (Currently using PHP 7.4.20 ✓)
- **Slim 4**: PHP 7.4+ (Compatible ✓)
- **Action**: No change needed

### 2. Dependency Injection Container 🔴 CRITICAL
- **Slim 3**: Built-in Pimple container
- **Slim 4**: No built-in container (bring your own)

**Impact**: HIGH - Semua container definitions perlu direfactor

**Current** (`dependencies.php`):
```php
$container = $app->getContainer();
$container['view'] = function ($c) { ... };
```

**New** (Slim 4 with PHP-DI):
```php
use DI\Container;
use DI\ContainerBuilder;

$container = (new ContainerBuilder())
    ->addDefinitions([
        'view' => function(Container $c) { ... }
    ])
    ->build();

$app = AppFactory::createFromContainer($container);
```

### 3. Application Bootstrap 🔴 CRITICAL
**Impact**: HIGH - `bootstrap/app.php` perlu complete rewrite

**Current**:
```php
$app = new Slim\App($settings);
require 'dependencies.php';
require 'routes.php';
$app->run();
```

**New**:
```php
use Slim\Factory\AppFactory;

$container = // ... setup container
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add middleware
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

require 'routes.php';
$app->run();
```

### 4. Error Handling 🟡 MEDIUM
**Impact**: MEDIUM - Error handling needs new middleware

**Current** (`settings.php`):
```php
'displayErrorDetails' => true
```

**New**:
```php
$errorMiddleware = $app->addErrorMiddleware(
    $displayErrorDetails,
    $logErrors,
    $logErrorDetails
);
```

### 5. Request getParam() 🟡 MEDIUM
**Impact**: HIGH (166 occurrences) - Banyak code yang perlu diubah

**Current**:
```php
$request->getParam('email')
```

**New**:
```php
$request->getParsedBody()['email'] ?? ''
// Or create helper function
```

### 6. Settings Configuration 🟡 MEDIUM
**Impact**: MEDIUM

**Current**: Settings in container
**New**: Settings as separate config, not in container

### 7. Response Factory 🟢 LOW
**Impact**: LOW - Most response methods remain the same

### 8. Middleware Execution Order 🟢 LOW
**Impact**: LOW - Still LIFO but more explicit

---

## 📝 DETAILED MIGRATION PLAN

### Phase 1: Preparation & Setup (8-16 hours)

#### 1.1 Backup & Version Control ⏱️ 1 hour
```bash
# Create migration branch
git checkout -b upgrade-slim4

# Backup database (if any)
# Backup current vendor folder
cp -r vendor vendor-slim3-backup
```

#### 1.2 Update composer.json ⏱️ 2 hours
```json
{
  "require": {
    "php": ">=7.4.0",
    "slim/slim": "^4.14",
    "slim/psr7": "^1.7",
    "slim/twig-view": "^3.4",
    "php-di/php-di": "^7.0",
    "phpmailer/phpmailer": "^6.9",
    "league/oauth2-client": "^2.7"
  },
  "require-dev": {
    "phpunit/phpunit": "^9.6"
  }
}
```

#### 1.3 Install Dependencies ⏱️ 1 hour
```bash
composer update
# Handle compatibility issues
# May need to resolve conflicts
```

#### 1.4 Study Slim 4 Documentation ⏱️ 4-8 hours
- Read official upgrade guide
- Review Slim 4 concepts
- Understand PSR-15 middleware
- Learn PHP-DI basics

### Phase 2: Core Refactoring (24-40 hours)

#### 2.1 Refactor bootstrap/app.php ⏱️ 4 hours
**Priority**: CRITICAL

**Tasks**:
- Implement PHP-DI container
- Configure AppFactory
- Add routing middleware
- Add error middleware
- Setup CORS if needed

**New Structure**:
```php
<?php
// bootstrap/app.php

use DI\Container;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

// Create container
$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__ . '/../app/dependencies.php');
$container = $containerBuilder->build();

// Set container to create App with on AppFactory
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add middleware
$app->addRoutingMiddleware();

// Add error middleware
$errorMiddleware = $app->addErrorMiddleware(
    (bool) getenv('DISPLAY_ERRORS'),
    (bool) getenv('LOG_ERRORS'),
    (bool) getenv('LOG_ERROR_DETAILS')
);

// Load routes
require __DIR__ . '/../app/routes.php';

return $app;
```

#### 2.2 Refactor app/dependencies.php ⏱️ 6 hours
**Priority**: CRITICAL

**Tasks**:
- Convert to PHP-DI definitions array
- Update Twig view setup
- Fix environment configuration
- Update PHPMailer setup if needed

**New Structure**:
```php
<?php
// app/dependencies.php

use DI\Container;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Psr\Http\Message\ResponseFactoryInterface;

return [
    // Twig view
    Twig::class => function (Container $c) {
        $settings = $c->get('settings');
        $twig = Twig::create(
            $settings['view']['path'],
            $settings['view']['twig']
        );
        return $twig;
    },

    // Settings
    'settings' => function() {
        return require __DIR__ . '/settings.php';
    },

    // Response factory
    ResponseFactoryInterface::class => function (Container $c) {
        return $c->get(\Slim\Psr7\Factory\ResponseFactory::class);
    }
];
```

#### 2.3 Refactor app/routes.php ⏱️ 12-24 hours
**Priority**: HIGH - 78 routes perlu diupdate

**Breaking Changes in Routes**:

1. **Request getParam() → getParsedBody()** (166 occurrences)
2. **$this->view → container->get('view')** (78+ occurrences)
3. **Use proper PSR-7 imports**

**Strategy**:
- Create helper functions untuk common patterns
- Update semua routes systematically
- Test each route after update

**Helper Functions** (create `app/helpers.php`):
```php
<?php
// app/helpers.php

/**
 * Get single parameter from request (Slim 3 compatibility)
 */
function getParam($request, $key, $default = null) {
    $postParams = $request->getParsedBody();
    $getParams = $request->getQueryParams();

    return $postParams[$key] ?? $getParams[$key] ?? $default;
}

/**
 * Render Twig template
 */
function renderView($response, $container, $template, $vars = []) {
    return $container->get(Twig::class)->render($response, $template, $vars);
}
```

**Route Update Example**:
```php
// BEFORE (Slim 3)
$app->get('/EN', function (Request $request, Response $response, $args) {
    $vars = ['page' => ['title' => 'Welcome']];
    return $this->view->render($response, 'en/home.twig', $vars);
});

// AFTER (Slim 4)
use Slim\Views\Twig;

$app->get('/EN', function (Request $request, Response $response, $args) {
    $vars = ['page' => ['title' => 'Welcome']];
    $view = $this->get(Twig::class);
    return $view->render($response, 'en/home.twig', $vars);
});

// OR with helper
$app->get('/EN', function (Request $request, Response $response, $args) {
    $vars = ['page' => ['title' => 'Welcome']];
    return renderView($response, $this, 'en/home.twig', $vars);
});
```

**Automated Refactoring** (Optional - using Rector):
```bash
composer require --dev rector/rector
# Configure rector for Slim 3→4 upgrade
# Run: vendor/bin/rector process app/
```

#### 2.4 Update Contact Form Handlers ⏱️ 2-4 hours
**Priority**: HIGH

**Files**: routes.php line 1251-1372 (2 routes)

**Changes**:
```php
// OLD
$email = $request->getParam('email');
$subject = $request->getParam('subject');
$phone = $request->getParam('phone');
$name = $request->getParam('name');

// NEW
$params = $request->getParsedBody();
$email = $params['email'] ?? '';
$subject = $params['subject'] ?? '';
$phone = $params['phone'] ?? '';
$name = $params['name'] ?? '';

// OR with helper
$email = getParam($request, 'email', '');
$subject = getParam($request, 'subject', '');
// ... etc
```

### Phase 3: Middleware & Error Handling (8-12 hours)

#### 3.1 Add Twig Middleware ⏱️ 2 hours
```php
// In bootstrap/app.php
use Slim\Views\TwigMiddleware;

$app->add(TwigMiddleware::createFromContainer($app, Twig::class));
```

#### 3.2 Custom Error Handler ⏱️ 4-6 hours
```php
// app/ErrorHandler.php
use Slim\Handlers\ErrorHandler;

class CustomErrorHandler extends ErrorHandler {
    protected function respond(): Response {
        // Custom error page
        return $this->responseFactory->createResponse(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('<h1>404 Not Found</h1>');
    }
}

// Register in bootstrap
$errorMiddleware->setDefaultErrorHandler(CustomErrorHandler::class);
```

#### 3.3 CORS Middleware (if needed) ⏱️ 2 hours
```php
$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type');
});
```

### Phase 4: Testing (16-32 hours)

#### 4.1 Unit Testing Setup ⏱️ 4 hours
```bash
composer require --dev phpunit/phpunit
# Create phpunit.xml
# Write basic tests for routes
```

#### 4.2 Manual Testing ⏱️ 8-16 hours
**Test Matrix** (78 routes):
- [ ] Landing page (/)
- [ ] English routes (/EN/*)
  - [ ] Home
  - [ ] About Us (5 sub-pages)
  - [ ] Services (6 services × 2 pages = 12 pages)
  - [ ] Careers (8 pages)
  - [ ] Contact Us
- [ ] Indonesian routes (/ID/*)
  - [ ] Similar structure to English
- [ ] Form submissions (2 forms)
- [ ] Case study detail pages (dynamic routes)
- [ ] Leadership profile pages (9 profiles)

**Testing Checklist per Page**:
```
[ ] Page loads without errors
[ ] All assets load (CSS, JS, images)
[ ] Navigation works
[ ] Forms submit properly
[ ] Data displays correctly
[ ] No PHP errors in logs
```

#### 4.3 Performance Testing ⏱️ 2-4 hours
- Load time comparison
- Memory usage
- Query optimization

#### 4.4 Bug Fixing ⏱️ 2-8 hours
- Fix issues found during testing
- Iterate until stable

### Phase 5: Documentation & Deployment (8-12 hours)

#### 5.1 Update Documentation ⏱️ 4 hours
- Update CLAUDE.MD
- Update README
- Document new patterns
- Add troubleshooting guide

#### 5.2 Deployment Preparation ⏱️ 2-4 hours
- Create deployment checklist
- Update server requirements
- Prepare rollback plan
- Database backup (if applicable)

#### 5.3 Production Deployment ⏱️ 2-4 hours
- Deploy to staging first
- Full testing on staging
- Deploy to production
- Monitor for issues

---

## 🔧 TECHNICAL REQUIREMENTS

### Server Requirements

#### Minimum Requirements
- **PHP**: 7.4+ (Current: 7.4.20 ✓)
- **Apache**: mod_rewrite enabled ✓
- **Memory**: 128MB (recommended: 256MB)
- **Extensions**:
  - mbstring ✓
  - json ✓
  - openssl ✓ (for PHPMailer)

#### Recommended
- **PHP**: 8.0+ (for better performance)
- **Composer**: 2.x ✓
- **OPcache**: Enabled
- **APCu**: For caching

### Development Tools Needed
- Composer 2.x
- Git
- Text editor/IDE
- Local web server (XAMPP/Laragon)
- PHP 7.4+

---

## 📊 MIGRATION COMPLEXITY MATRIX

| Component | Changes Required | Effort | Risk | Priority |
|-----------|-----------------|--------|------|----------|
| bootstrap/app.php | Complete rewrite | HIGH | HIGH | CRITICAL |
| dependencies.php | Major refactor | HIGH | HIGH | CRITICAL |
| routes.php (78 routes) | Pattern updates | HIGH | MEDIUM | HIGH |
| getParam() (166x) | Method changes | MEDIUM | LOW | HIGH |
| Twig integration | Config update | MEDIUM | MEDIUM | HIGH |
| Error handling | New middleware | MEDIUM | LOW | MEDIUM |
| Settings | Restructure | LOW | LOW | MEDIUM |
| Templates (101 files) | No changes | NONE | NONE | N/A |
| JSON data files | No changes | NONE | NONE | N/A |

**Legend**:
- **Effort**: None / Low / Medium / High
- **Risk**: Low / Medium / High (risk of breaking functionality)
- **Priority**: Critical / High / Medium / Low

---

## 💰 COST-BENEFIT ANALYSIS

### Costs

| Item | Hours | Cost (Example) |
|------|-------|---------------|
| Development | 80-120h | $4,000-6,000 |
| Testing | 16-32h | $800-1,600 |
| Documentation | 8-12h | $400-600 |
| Deployment | 2-4h | $100-200 |
| **TOTAL** | **106-168h** | **$5,300-8,400** |

*Note: Costs based on $50/hour rate - adjust for your region*

### Benefits (Over 2-3 Years)

| Benefit | Value |
|---------|-------|
| Security updates | Priceless |
| Reduced maintenance time | $2,000-4,000 |
| Better performance | $500-1,000 |
| PHP 8.x compatibility | $1,000-2,000 |
| Developer productivity | $1,000-2,000 |
| **TOTAL BENEFIT** | **$4,500-9,000+** |

### ROI Calculation
- **Investment**: $5,300-8,400
- **Return**: $4,500-9,000+
- **Payback Period**: 12-18 months
- **ROI**: ~70-100% over 2-3 years

**Plus intangible benefits**:
- Peace of mind (security)
- Future-proofing
- Easier to hire developers (modern stack)
- Better code maintainability

---

## ⚠️ RISKS & MITIGATION

### Risk 1: Breaking Functionality 🔴 HIGH
**Probability**: HIGH
**Impact**: HIGH

**Mitigation**:
- Comprehensive testing plan
- Staging environment testing
- Rollback plan ready
- Feature flags for gradual rollout

### Risk 2: Extended Downtime 🟡 MEDIUM
**Probability**: MEDIUM
**Impact**: HIGH

**Mitigation**:
- Deploy during low-traffic hours
- Have backup ready
- Monitor closely post-deployment
- Quick rollback procedure

### Risk 3: Budget Overrun 🟡 MEDIUM
**Probability**: MEDIUM
**Impact**: MEDIUM

**Mitigation**:
- Add 30% buffer to estimates
- Prioritize critical features first
- Phased approach if needed
- Regular progress reviews

### Risk 4: Performance Regression 🟢 LOW
**Probability**: LOW
**Impact**: MEDIUM

**Mitigation**:
- Performance testing before/after
- Enable OPcache
- Profile and optimize
- Load testing

### Risk 5: Team Learning Curve 🟡 MEDIUM
**Probability**: MEDIUM
**Impact**: LOW

**Mitigation**:
- Training sessions
- Comprehensive documentation
- Code reviews
- Pair programming

---

## 📈 ALTERNATIVE APPROACHES

### Option A: Full Migration (Recommended)
**Timeline**: 15-20 days
**Cost**: $5,300-8,400
**Risk**: Medium
**Benefits**: Complete, future-proof solution

### Option B: Phased Migration
**Phase 1**: Critical security updates only (5 days)
**Phase 2**: Full migration later (10-15 days)
**Total**: 15-20 days (but spread over time)
**Cost**: Similar, but more flexible
**Risk**: Medium (technical debt between phases)

### Option C: Stay on Slim 3
**Cost**: $0 now
**Risk**: HIGH (security vulnerabilities)
**Recommendation**: ❌ NOT RECOMMENDED
**Note**: Eventually forced upgrade will be more expensive

### Option D: Rewrite in Different Framework
**Examples**: Laravel, Symfony
**Timeline**: 30-60 days
**Cost**: $15,000-30,000
**Recommendation**: ❌ Overkill for this project

---

## 🎯 RECOMMENDATION

### Primary Recommendation: **PROCEED WITH SLIM 4 UPGRADE**

**Reasoning**:
1. ✅ **Feasibility**: Technically straightforward
2. ✅ **ROI**: Positive return within 12-18 months
3. ✅ **Security**: Critical for business continuity
4. ✅ **Future-proof**: Ready for next 5+ years
5. ✅ **Manageable**: Clear migration path exists

### Recommended Approach: **Option B (Phased Migration)**

**Phase 1** (Week 1-2): Security & Foundation
- Update Composer dependencies
- Refactor bootstrap & dependencies
- Basic testing
- Deploy to production

**Phase 2** (Week 3-4): Complete Migration
- Refactor all routes
- Comprehensive testing
- Performance optimization
- Final deployment

### Timeline
- **Start**: When business ready
- **Phase 1 Complete**: Week 2
- **Phase 2 Complete**: Week 4
- **Total Duration**: 4 weeks (20 working days)

### Budget
- **Phase 1**: $2,500-3,500
- **Phase 2**: $2,800-4,900
- **Total**: $5,300-8,400

---

## 📝 ACTION ITEMS

### Immediate (This Week)
- [ ] Management approval for budget
- [ ] Schedule kickoff meeting
- [ ] Assign developer resources
- [ ] Setup development environment
- [ ] Create project timeline

### Short-term (Week 1)
- [ ] Backup current system
- [ ] Create migration branch
- [ ] Study Slim 4 documentation
- [ ] Setup testing framework
- [ ] Begin Phase 1 development

### Medium-term (Week 2-4)
- [ ] Complete Phase 1 migration
- [ ] Deploy to staging
- [ ] Testing & bug fixes
- [ ] Complete Phase 2 migration
- [ ] Production deployment

### Long-term (Month 2-3)
- [ ] Monitor production
- [ ] Performance optimization
- [ ] Documentation updates
- [ ] Team training
- [ ] Retrospective meeting

---

## 📚 RESOURCES & REFERENCES

### Official Documentation
- [Slim 4 Upgrade Guide](https://www.slimframework.com/docs/v4/start/upgrade.html)
- [Slim 4 Documentation](https://www.slimframework.com/docs/v4/)
- [PHP-DI Documentation](https://php-di.org/)

### Community Resources
- [Upgrade Slimframework v3 to v4, how I did it](https://blog.mansonthomas.com/2019/11/upgrade-slimframework-v3-to-v4-how-i.html)
- [Stack Overflow: Slim 3 to 4 Migration](https://stackoverflow.com/questions/58721302/slim-framework-upgrade-from-version-3-to-version-4)
- [Chris Worfolk: Upgrading from Slim 3 to Slim 4](https://blog.chrisworfolk.com/upgrading-from-slim-3-to-slim-4)

### Tools
- [Rector PHP](https://getrector.org/) - Automated refactoring tool
- [PHPStan](https://phpstan.org/) - Static analysis
- [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) - Code standards

---

## 🤝 SUPPORT & QUESTIONS

### Need Help?
- Slim Framework Discourse: https://discourse.slimframework.com/
- GitHub Issues: https://github.com/slimphp/Slim/issues
- Stack Overflow: Tag [slim] or [slim-4]

### Consulting Services
Consider hiring Slim expert if:
- Timeline is critical
- Team lacks experience
- Budget allows external help
- Risk tolerance is low

---

## ✅ CONCLUSION

**Upgrade ke Slim 4 adalah investasi yang WORTH IT:**
- ✅ Technically feasible
- ✅ Financially viable (positive ROI)
- ✅ Critical for security
- ✅ Future-proofs the application
- ✅ Manageable risk with proper planning

**RECOMMENDATION: PROCEED** with phased approach starting Q1 2026.

---

**Document prepared by**: Claude Code Analysis
**Date**: 3 December 2025
**Status**: Draft for Management Review
**Next Review**: After management approval

---

## Sources
- [Slim Framework Upgrade Guide](https://www.slimframework.com/docs/v4/start/upgrade.html)
- [Stack Overflow: Slim Framework Upgrade Discussion](https://stackoverflow.com/questions/58721302/slim-framework-upgrade-from-version-3-to-version-4)
- [Upgrade Slimframework v3 to v4, how I did it](https://blog.mansonthomas.com/2019/11/upgrade-slimframework-v3-to-v4-how-i.html)
- [Slim Migration Discussion Forum](https://discourse.slimframework.com/t/migration-from-slim3-to-slim4/4904)
- [Chris Worfolk's Blog: Upgrading to Slim 4](https://blog.chrisworfolk.com/upgrading-from-slim-3-to-slim-4)
