<?php

// Get the container
$container = $app->getContainer();

// Twig view dependency
$container['view'] = function ($c) {

    $cf = $c->get('settings')['view'];
    $view = new \Slim\Views\Twig($cf['path'], $cf['twig']);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c->router,
        $c->request->getUri()
    ));

    // Add custom Twig functions for deal URLs
    $dealHelper = $c->get('dealHelper');
    $view->getEnvironment()->addFunction(new \Twig\TwigFunction('deal_url', function($deal, $lang = 'EN') use ($dealHelper) {
        return $dealHelper->generateDealUrl($deal, $lang);
    }));

    return $view;
};

// Activating routes in a subfolder
$container['environment'] = function () {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    // Fix: Use single dirname() for subfolder, not double dirname()
    $_SERVER['SCRIPT_NAME'] = dirname($scriptName) . '/' . basename($scriptName);
    return new Slim\Http\Environment($_SERVER);
};

// Helper functions for deal URLs
$container['dealHelper'] = function ($c) {
    return new class {
        // Generate URL-friendly slug from title
        public function slugify($text) {
            // Replace non letter or digits by -
            $text = preg_replace('~[^\pL\d]+~u', '-', $text);
            // Transliterate
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            // Remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);
            // Trim
            $text = trim($text, '-');
            // Remove duplicate -
            $text = preg_replace('~-+~', '-', $text);
            // Lowercase
            $text = strtolower($text);

            if (empty($text)) {
                return 'n-a';
            }
            return $text;
        }

        // Parse date string like "August 2014" or "December 2017" to Y/m/d
        public function parseDateToUrl($dateString) {
            // Default date if parsing fails
            $defaultDate = '2014/01/01';

            // Try to parse the date
            $timestamp = strtotime($dateString);
            if ($timestamp === false) {
                return $defaultDate;
            }

            // Format as YYYY/MM/DD (use 01 for day if not specified)
            return date('Y/m/d', $timestamp);
        }

        // Find deal by ID from JSON data
        public function findDealById($jsonData, $id) {
            foreach ($jsonData as $deal) {
                if ($deal['id'] == $id) {
                    return $deal;
                }
            }
            return null;
        }

        // Find deal by slug and date
        public function findDealBySlugAndDate($jsonData, $year, $month, $day, $slug) {
            foreach ($jsonData as $deal) {
                $dealSlug = $this->slugify($deal['header']);
                $dealDate = $this->parseDateToUrl($deal['DateofClosing']);
                list($dealYear, $dealMonth, $dealDay) = explode('/', $dealDate);

                if ($dealSlug === $slug && $dealYear === $year && $dealMonth === $month && $dealDay === $day) {
                    return $deal;
                }
            }
            return null;
        }

        // Generate deal URL
        public function generateDealUrl($deal, $lang = 'EN') {
            $date = $this->parseDateToUrl($deal['DateofClosing']);
            $slug = $this->slugify($deal['header']);
            return "/{$lang}/{$date}/{$slug}";
        }
    };
};