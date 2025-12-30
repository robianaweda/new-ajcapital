<?php

// Creating routes

// Psr-7 Request and Response interfaces
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$app->get('/', function (Request $request, Response $response, $args)   {
    $vars = [
        'page' => [
        'title' => 'Welcome.',
        'description' => 'Welcome to AJCapital Advisory.'
        ],
    ];  
    return $this->view->render($response, 'landing.twig', $vars);
})->setName('landing');


// English Route : Home
$app->get('/EN', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Welcome',
        'description' => 'AJCapital Advisory',
        'uri' => $path[1] ?? '',
        ],
    ];  
    return $this->view->render($response, 'en/home.twig', $vars);
})->setName('home');

// English Route : About Us
$app->get('/EN/aboutus', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'About Us',
            'uri' => $path[2] ?? '',
        ],
    ];  
    return $this->view->render($response, 'en/aboutus.twig', $vars);
})->setName('aboutus');
$app->get('/EN/aboutus/whatmakeusdifferent', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'What Make Us Different',
            'uri' => $path[2] ?? '',
            'sub' => $path[3] ?? ''
        ],
    ];  
    return $this->view->render($response, 'en/aboutus/whatmakeusdifferent.twig', $vars);
})->setName('whatmakeusdifferent');
$app->get('/EN/ourleadership', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2] ?? '',
            'sub' => ''
        ],
    ];
    return $this->view->render($response, 'en/aboutus/ourleadership.twig', $vars);
})->setName('ourleadership');
$app->get('/EN/aboutus/transactionsandcasestudy', function (Request $request, Response $response, $args)   {
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Transactions and Case Study',
            'uri' => $path[2] ?? '',
            'sub' => $path[3] ?? '',
            'data' => $json_data,
        ],
    ];  
    return $this->view->render($response, 'en/aboutus/transactionsandcasestudy.twig', $vars);
})->setName('transactionsandcasestudy');
$app->get('/EN/aboutus/transactionsandcasestudy/{id}', function ($request, $response, $args)   {
    $id = $args['id'];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Transactions and Case Study',
            'uri' => $path[2] ?? '',
            'sub' => $path[3] ?? '',
            'data' => $json_data,
            'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/aboutus/transactionsandcasestudy-single.twig', $vars);
})->setName('transactionsandcasestudy-id');
// Events & Conferences - English Route (Main Listing)
$app->get('/EN/eventsandconferences', function (Request $request, Response $response, $args)   {
    $str = file_get_contents(__DIR__ . '../../assets/db/events.json');
    $json_data = json_decode($str, true);

    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Events & Conferences',
            'uri' => 'eventsandconferences',
            'data' => $json_data,
        ],
    ];
    return $this->view->render($response, 'en/eventsandconferences.twig', $vars);
})->setName('eventsandconferences');

// Event Detail Route - English (SEO-friendly URL with year and slug)
$app->get('/EN/eventsandconferences/{year}/{month}/{day}/{slug}', function (Request $request, Response $response, $args)   {
    $year = $args['year'];
    $month = $args['month'];
    $day = $args['day'];
    $slug = $args['slug'];

    $str = file_get_contents(__DIR__ . '../../assets/db/events.json');
    $json_data = json_decode($str, true);

    // Find the event by slug and date
    $event = null;
    foreach ($json_data as $item) {
        if ($item['slug'] === $slug) {
            // Parse the date from shortDate field
            $eventDate = new DateTime($item['shortDate']);
            if ($eventDate->format('Y') == $year &&
                $eventDate->format('m') == $month &&
                $eventDate->format('d') == $day) {
                $event = $item;
                break;
            }
        }
    }

    if (!$event) {
        return $response->withStatus(404)->write('Event not found');
    }

    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $vars = [
        'page' => [
            'title' => $event['title'],
            'uri' => 'eventsandconferences',
            'event' => $event,
        ],
    ];
    return $this->view->render($response, 'en/eventsandconferences-detail.twig', $vars);
})->setName('eventsandconferences-detail');

// Redirect old URL to new URL for backward compatibility - Events
$app->get('/EN/aboutus/eventsandconferences', function (Request $request, Response $response, $args)   {
    return $response->withRedirect('/EN/eventsandconferences', 301);
});

// English Route : Client Insights
$app->get('/EN/clientinsights', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Client Insights',
            'uri' => 'clientinsights',
        ],
    ];
    return $this->view->render($response, 'en/aboutus/clientinsights.twig', $vars);
})->setName('clientinsights');

// Redirect old URL to new URL for backward compatibility - Client Insights
$app->get('/EN/aboutus/clientinsights', function (Request $request, Response $response, $args)   {
    return $response->withRedirect('/EN/clientinsights', 301);
});

// Redirect old URL to new URL for backward compatibility - Leadership
$app->get('/EN/aboutus/ourleadership', function (Request $request, Response $response, $args)   {
    return $response->withRedirect('/EN/ourleadership', 301);
});
$app->get('/EN/aboutus/ourleadership/{leader}', function (Request $request, Response $response, $args)   {
    $leader = $args['leader'];
    return $response->withRedirect('/EN/ourleadership/' . $leader, 301);
});

// English Route : Services
$app->get('/EN/services', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Our Services.',
        'description' => 'Our services AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  
    return $this->view->render($response, 'en/services.twig', $vars);

})->setName('services');
$app->get('/EN/services/debt-restructurings-and-turnaround-management', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Restructurings and Turnaround Management',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'en/services/rtm.twig', $vars);

})->setName('debt-restructurings-and-turnaround-management');
$app->get('/EN/services/debt-restructurings-and-turnaround-management/{id}', function ($request, $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Debt Restructurings and Turnaround Management',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/services/rtm-case.twig', $vars);

})->setName('debt-restructurings-and-turnaround-management-case');
$app->get('/EN/services/creditor-support-and-advisory', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Creditor Support and Advisory',
        'description' => 'Creditor Support and Advisory',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'en/services/csa.twig', $vars);

})->setName('creditor-support-and-advisory');
$app->get('/EN/services/creditor-support-and-advisory/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Creditor Support and Advisory',
        'description' => 'Creditor Support and Advisory',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/services/csa-case.twig', $vars);

})->setName('creditor-support-and-advisory-case');
$app->get('/EN/services/financial-investigations-and-litigation-support', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Financial Investigations and Litigation Support',
        'description' => 'Financial Investigations and Litigation Support',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'en/services/fils.twig', $vars);

})->setName('financial-investigations-and-litigation-support');
$app->get('/EN/services/financial-investigations-and-litigation-support/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Financial Investigations and Litigation Support',
        'description' => 'Financial Investigations and Litigation Support',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/services/fils-case.twig', $vars);

})->setName('financial-investigations-and-litigation-support-case');

$app->get('/EN/services/liquidation-receivership-and-court-appointments', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'en/services/lrca.twig', $vars);

})->setName('liquidation-receivership-and-court-appointments');
$app->get('/EN/services/liquidation-receivership-and-court-appointments/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/services/lrca-case.twig', $vars);

})->setName('liquidation-receivership-and-court-appointments-case');
$app->get('/EN/services/ma-advisory-and-fundraising', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'en/services/maafr.twig', $vars);

})->setName('ma-advisory-and-fundraising');
$app->get('/EN/services/ma-advisory-and-fundraising/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id'=> $id,
        ],
    ];  
    return $this->view->render($response, 'en/services/maafr-case.twig', $vars);

})->setName('ma-advisory-and-fundraising-case');
$app->get('/EN/services/corporate-initiative-management-and-support', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'en/services/cims.twig', $vars);

})->setName('corporate-initiative-management-and-support');
$app->get('/EN/services/corporate-initiative-management-and-support/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/services/cims-case.twig', $vars);

})->setName('corporate-initiative-management-and-support-case');

// DEALS ROUTE - English
$app->get('/EN/deals', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data = json_decode($str, true);

    $vars = [
        'page' => [
            'title' => 'Deals',
            'description' => 'AJCapital Advisory Deals and Transactions',
            'uri' => 'deals',
            'data' => $json_data,
        ],
    ];
    return $this->view->render($response, 'en/deals.twig', $vars);
})->setName('deals');

// DEAL DETAIL ROUTE - English (SEO-friendly URL with date and slug)
$app->get('/EN/{year}/{month}/{day}/{slug}', function (Request $request, Response $response, $args)   {
    $year = $args['year'];
    $month = $args['month'];
    $day = $args['day'];
    $slug = $args['slug'];

    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data = json_decode($str, true);

    // Find the deal using the helper
    $deal = $this->dealHelper->findDealBySlugAndDate($json_data, $year, $month, $day, $slug);

    if (!$deal) {
        // Deal not found, return 404
        return $response->withStatus(404)->write('Deal not found');
    }

    $vars = [
        'page' => [
            'title' => $deal['header'],
            'description' => $deal['Title'],
            'uri' => 'deals',
            'data' => $json_data,
            'service' => $deal['TypeofCase'],
            'id' => $deal['id'],
        ],
    ];

    // Use dedicated deal detail template
    return $this->view->render($response, 'en/deal-detail.twig', $vars);
})->setName('deal-detail-en');

// ABOUT ROUTE
//
$app->get('/EN/careers', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'en/careers.twig', $vars);

})->setName('careers');
$app->get('/EN/careers/alumni/hendro-maulana', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'en/careers/hendro.twig', $vars);

})->setName('hendro-maulana');
$app->get('/EN/careers/alumni/nathaniel-siagian', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'en/careers/nathan.twig', $vars);

})->setName('nathaniel-siagian');
$app->get('/EN/careers/alumni/edward-widjonarko', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'en/careers/edo.twig', $vars);

})->setName('edward-widjonarko');
$app->get('/EN/careers/a-day-in-ajcapital/susana-cassandra-santosa', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'en/careers/susana.twig', $vars);

})->setName('susana-cassandra-santosa');
$app->get('/EN/careers/a-day-in-ajcapital/christoper-joutua', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'en/careers/christo.twig', $vars);

})->setName('christoper-joutua');
$app->get('/EN/careers/graduate-recruitment', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    if($request->getParam('i') != ""){
        $i = $request->getParam('i');
    } else {
        $i = "";
    }

    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        'info' => $i,
        ],
    ];

    return $this->view->render($response, 'en/graduate-recruitment.twig', $vars);

})->setName('graduate-recruiement');
$app->get('/EN/careers/experienced-recruitment', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    if($request->getParam('i') != ""){
        $i = $request->getParam('i');
    } else {
        $i = "";
    }

    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        'info' => $i,
        ],
    ];

    return $this->view->render($response, 'en/experienced-recruitment.twig', $vars);

})->setName('experienced-recruitment');
// ABOUT ROUTE
// 
$app->get('/EN/contactus', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    //$info = $request->getParam('i');
    if($request->getParam('i') != ""){
        $i = $request->getParam('i');
    } else {
        $i = "";
    }
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2] ?? '',
        'info'=> $i,
        ],
    ];  
    return $this->view->render($response, 'en/contactus.twig', $vars);
})->setName('contactus');
$app->get('/EN/privacy-policy', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2] ?? ''
        ],
    ];  
    return $this->view->render($response, 'en/privacy-policy.twig', $vars);
})->setName('privacy-policy');
$app->get('/EN/terms-of-use', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2] ?? ''
        ],
    ];  
    return $this->view->render($response, 'en/term-of-use.twig', $vars);
})->setName('terms-of-use');

// ID Language ///////////////////////////////////////////////////////////////////


//ID Route : Beranda
$app->get('/ID', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Konsultansi',
        'description' => 'AJCapital Advisory',
        'uri' => $path[1] ?? '',
        ],
    ];  
    return $this->view->render($response, 'id/beranda.twig', $vars);
})->setName('home');

// ID Route : Tentang Kami
$app->get('/ID/tentangkami', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Tentang Kami',
            'uri' => $path[2] ?? '',
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami.twig', $vars);
})->setName('tentangkami');
$app->get('/ID/tentangkami/yang-membedakan-kami', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Yang membedakan kami',
            'uri' => $path[2] ?? '',
            'sub' => $path[3] ?? ''
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami/yang-membedakan-kami.twig', $vars);
})->setName('yang-membedakan-kami');
$app->get('/ID/kepemimpinan-kami', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Kepemimpinan Kami',
            'uri' => $path[2] ?? '',
            'sub' => ''
        ],
    ];
    return $this->view->render($response, 'id/tentangkami/kepemimpinan-kami.twig', $vars);
})->setName('kepemimpinan-kami');
$app->get('/ID/tentangkami/transaksi-dan-studi-kasus', function (Request $request, Response $response, $args)   {
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Transaksi dan Studi Kasus',
            'uri' => $path[2] ?? '',
            'sub' => $path[3] ?? '',
            'data' => $json_data,
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami/transaksi-dan-studikasus.twig', $vars);
})->setName('transaksi-dan-studi-kasus');
$app->get('/ID/tentangkami/transaksi-dan-studi-kasus/{id}', function ($request, $response, $args)   {
    $id = $args['id'];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Transaksi dan Studi Kasus',
            'uri' => $path[2] ?? '',
            'sub' => $path[3] ?? '',
            'data' => $json_data,
            'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami/transaksi-dan-studikasus-single.twig', $vars);
})->setName('transaksi-dan-studi-kasus-id');
// Acara & Konferensi - Indonesian Route (Main Listing)
$app->get('/ID/acaradankonferensi', function (Request $request, Response $response, $args)   {
    $str = file_get_contents(__DIR__ . '../../assets/db/acara.json');
    $json_data = json_decode($str, true);

    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Acara & Konferensi',
            'uri' => 'acaradankonferensi',
            'data' => $json_data,
        ],
    ];
    return $this->view->render($response, 'id/acaradankonferensi.twig', $vars);
})->setName('acara-dan-konferensi');

// Acara Detail Route - Indonesian (SEO-friendly URL with year and slug)
$app->get('/ID/acaradankonferensi/{year}/{month}/{day}/{slug}', function (Request $request, Response $response, $args)   {
    $year = $args['year'];
    $month = $args['month'];
    $day = $args['day'];
    $slug = $args['slug'];

    $str = file_get_contents(__DIR__ . '../../assets/db/acara.json');
    $json_data = json_decode($str, true);

    // Find the event by slug and date
    $event = null;
    foreach ($json_data as $item) {
        if ($item['slug'] === $slug) {
            // Parse the date from shortDate field
            $eventDate = new DateTime($item['shortDate']);
            if ($eventDate->format('Y') == $year &&
                $eventDate->format('m') == $month &&
                $eventDate->format('d') == $day) {
                $event = $item;
                break;
            }
        }
    }

    if (!$event) {
        return $response->withStatus(404)->write('Acara tidak ditemukan');
    }

    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $vars = [
        'page' => [
            'title' => $event['title'],
            'uri' => 'acaradankonferensi',
            'event' => $event,
        ],
    ];
    return $this->view->render($response, 'id/acaradankonferensi-detail.twig', $vars);
})->setName('acara-dan-konferensi-detail');

// Redirect old URL to new URL for backward compatibility - Events
$app->get('/ID/tentangkami/acara-dan-konferensi', function (Request $request, Response $response, $args)   {
    return $response->withRedirect('/ID/acaradankonferensi', 301);
});

// Indonesian Route : Client Insights
$app->get('/ID/wawasanklien', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Wawasan Klien',
            'uri' => 'wawasanklien',
        ],
    ];
    return $this->view->render($response, 'id/tentangkami/wawasan-klien.twig', $vars);
})->setName('wawasan-klien');

// Redirect old URL to new URL for backward compatibility - Client Insights
$app->get('/ID/tentangkami/wawasan-klien', function (Request $request, Response $response, $args)   {
    return $response->withRedirect('/ID/wawasanklien', 301);
});

// Redirect old URL to new URL for backward compatibility - Leadership
$app->get('/ID/tentangkami/kepemimpinan-kami', function (Request $request, Response $response, $args)   {
    return $response->withRedirect('/ID/kepemimpinan-kami', 301);
});
$app->get('/ID/tentangkami/kepemimpinan-kami/{leader}', function (Request $request, Response $response, $args)   {
    $leader = $args['leader'];
    return $response->withRedirect('/ID/kepemimpinan-kami/' . $leader, 301);
});

// ID Route : layanan
$app->get('/ID/layanan', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Our layanan.',
        'description' => 'Our layanan AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  
    return $this->view->render($response, 'id/layanan.twig', $vars);

})->setName('layanan');
$app->get('/ID/layanan/restrukturisasi-dan-turnaround-management', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Restrukturisasi dan Manajemen Pemulihan',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/restrukturisasi-dan-turnaround-management.twig', $vars);

})->setName('restrukturisasi-dan-turnaround-management');
$app->get('/ID/layanan/restrukturisasi-dan-turnaround-management/{id}', function ($request, $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Restrukturisasi dan Manajemen Pemulihan',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/restrukturisasi-dan-turnaround-management-kasus.twig', $vars);

})->setName('restrukturisasi-dan-turnaround-management-kasus');
$app->get('/ID/layanan/pendukung-dan-penasihat-kreditor', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'pendukung-dan-penasihat-kreditor',
        'description' => 'pendukung-dan-penasihat-kreditor',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/pendukung-dan-penasihat-kreditor.twig', $vars);

})->setName('pendukung-dan-penasihat-kreditor');
$app->get('/ID/layanan/pendukung-dan-penasihat-kreditor/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Pendukung dan Penasihat Kreditor',
        'description' => 'Pendukung dan Penasihat Kreditor',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/pendukung-dan-penasihat-kreditor-kasus.twig', $vars);

})->setName('pendukung-dan-penasihat-kreditor-kasus');
$app->get('/ID/layanan/investigasi-keuangan-dan-dukungan-litigasi', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Investigasi Keuangan dan Dukungan Litigasi',
        'description' => 'investigasi-keuangan-dan-dukungan-litigasi',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/investigasi-keuangan-dan-dukungan-litigasi.twig', $vars);

})->setName('investigasi-keuangan-dan-dukungan-litigasi');
$app->get('/ID/layanan/investigasi-keuangan-dan-dukungan-litigasi/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'investigasi-keuangan-dan-dukungan-litigasi',
        'description' => 'investigasi-keuangan-dan-dukungan-litigasi',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/investigasi-keuangan-dan-dukungan-litigasi-kasus.twig', $vars);

})->setName('investigasi-keuangan-dan-dukungan-litigasi-kasus');

$app->get('/ID/layanan/likuidasi-pemberesan-dan-penunjukan-pengadilan', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/likuidasi-pemberesan-dan-penunjukan-pengadilan.twig', $vars);

})->setName('likuidasi-pemberesan-dan-penunjukan-pengadilan');
$app->get('/ID/layanan/likuidasi-pemberesan-dan-penunjukan-pengadilan/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/likuidasi-pemberesan-dan-penunjukan-pengadilan-kasus.twig', $vars);

})->setName('likuidasi-pemberesan-dan-penunjukan-pengadilan-kasus');
$app->get('/ID/layanan/penasihat-ma-dan-penggalangan-dana', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/penasihat-ma-dan-penggalangan-dana.twig', $vars);

})->setName('penasihat-ma-dan-penggalangan-dana');
$app->get('/ID/layanan/penasihat-ma-dan-penggalangan-dana/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id'=> $id,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/penasihat-ma-dan-penggalangan-dana-kasus.twig', $vars);

})->setName('penasihat-ma-dan-penggalangan-dana-kasus');
$app->get('/ID/layanan/manajemen-inisiatif-dan-pendukung-perusahaan', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/manajemen-inisiatif-dan-pendukung-perusahaan.twig', $vars);

})->setName('manajemen-inisiatif-dan-pendukung-perusahaan');
$app->get('/ID/layanan/manajemen-inisiatif-dan-pendukung-perusahaan/{id}', function (Request $request, Response $response, $args)   {
    $id = $args['id'];
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3] ?? '';
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2] ?? '',
        'sub' => $path[3] ?? '',
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/manajemen-inisiatif-dan-pendukung-perusahaan-kasus.twig', $vars);

})->setName('manajemen-inisiatif-dan-pendukung-perusahaan-kasus');

// DEALS ROUTE - Indonesian
$app->get('/ID/transaksi', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data = json_decode($str, true);

    $vars = [
        'page' => [
            'title' => 'Transaksi',
            'description' => 'Transaksi dan Kesepakatan AJCapital Advisory',
            'uri' => 'transaksi',
            'data' => $json_data,
        ],
    ];
    return $this->view->render($response, 'id/transaksi.twig', $vars);
})->setName('transaksi');

// DEAL DETAIL ROUTE - Indonesian (SEO-friendly URL with date and slug)
$app->get('/ID/{year}/{month}/{day}/{slug}', function (Request $request, Response $response, $args)   {
    $year = $args['year'];
    $month = $args['month'];
    $day = $args['day'];
    $slug = $args['slug'];

    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data = json_decode($str, true);

    // Find the deal using the helper
    $deal = $this->dealHelper->findDealBySlugAndDate($json_data, $year, $month, $day, $slug);

    if (!$deal) {
        // Deal not found, return 404
        return $response->withStatus(404)->write('Transaksi tidak ditemukan');
    }

    $vars = [
        'page' => [
            'title' => $deal['header'],
            'description' => $deal['Title'],
            'uri' => 'transaksi',
            'data' => $json_data,
            'service' => $deal['TypeofCase'],
            'id' => $deal['id'],
        ],
    ];

    // Use dedicated deal detail template
    return $this->view->render($response, 'id/transaksi-detail.twig', $vars);
})->setName('deal-detail-id');

// ABOUT ROUTE
//
$app->get('/ID/karir', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'id/karir.twig', $vars);

})->setName('karir');
$app->get('/ID/karir/alumni/hendro-maulana', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'id/karir/hendro.twig', $vars);

})->setName('hendro-maulana');
$app->get('/ID/karir/alumni/nathaniel-siagian', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'id/karir/nathan.twig', $vars);

})->setName('nathaniel-siagian');
$app->get('/ID/karir/alumni/edward-widjonarko', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'id/karir/edo.twig', $vars);

})->setName('edward-widjonarko');
$app->get('/ID/karir/a-day-in-ajcapital/susana-cassandra-santosa', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'id/karir/susana.twig', $vars);

})->setName('susana-cassandra-santosa');
$app->get('/ID/karir/a-day-in-ajcapital/christoper-joutua', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        ],
    ];  

    return $this->view->render($response, 'id/karir/christo.twig', $vars);

})->setName('christoper-joutua');
$app->get('/ID/karir/rekrutmen-lulusan-baru', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    if($request->getParam('i') != ""){
        $i = $request->getParam('i');
    } else {
        $i = "";
    }

    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        'info' => $i,
        ],
    ];

    return $this->view->render($response, 'id/karir/rekrutmen-lulusan-baru.twig', $vars);

})->setName('graduate-recruiement');
$app->get('/ID/karir/rekrutmen-profesional', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);

    if($request->getParam('i') != ""){
        $i = $request->getParam('i');
    } else {
        $i = "";
    }

    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2] ?? '',
        'info' => $i,
        ],
    ];

    return $this->view->render($response, 'id/karir/rekrutmen-profesional.twig', $vars);

})->setName('rekrutment-profesional');
// ABOUT ROUTE
// 
$app->get('/ID/hubungikami', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    if($request->getParam('i') != ""){
        $i = $request->getParam('i');
    } else {
        $i = "";
    }
    
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2] ?? '',
        'info' => $i,
        ],
    ];  
    return $this->view->render($response, 'id/hubungikami.twig', $vars);
})->setName('hubungikami');
$app->get('/ID/ketentuan-penggunaan', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2] ?? ''
        ],
    ];  
    return $this->view->render($response, 'id/ketentuan-penggunaan.twig', $vars);
})->setName('ketentuan-penggunaan');
$app->get('/ID/kebijakan-privasi', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2] ?? ''
        ],
    ];  
    return $this->view->render($response, 'id/kebijakan-privasi.twig', $vars);
})->setName('kebijakan-privasi');

$app->post('/send-contact', function ($request, $response, $args)   {
    // Get and validate input parameters
    $email = filter_var($request->getParam('email'), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($request->getParam('subject'), ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($request->getParam('phone'), ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($request->getParam('name'), ENT_QUOTES, 'UTF-8');

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $response->withRedirect('/EN/contactus?i=error');
    }

    // Validate required fields
    if (empty($name) || empty($email) || empty($subject)) {
        return $response->withRedirect('/EN/contactus?i=error');
    }

    $mail = new PHPMailer;
    $mail->isSMTP();

    // SMTP Configuration from environment variables
    $mail->SMTPDebug = (int) $_ENV['SMTP_DEBUG']; // 0 = off for production
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->Port = (int) $_ENV['SMTP_PORT'];
    $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];

    // Set sender and recipient
    $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
    $mail->addAddress($_ENV['SMTP_TO_EMAIL'], $_ENV['SMTP_TO_NAME']);

    // Set email content
    $mail->Subject = 'Inquiry from website';
    $mail->IsHTML(true);
    $mail->Body = "<p>Hi, There is an incoming message from website through contact us form with these following information: </p><p>Name: ".$name."</p><p>Email: ".$email."</p><p>Phone: ".$phone."</p><p>Subject: ". $subject."</p>";
    $mail->AltBody = 'Please use html format email client.';

    // Send email
    if (!$mail->send()) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return $response->withRedirect('/EN/contactus?i=error');
    } else {
        return $response->withRedirect('/EN/contactus?i=sent');
    }

})->setName('send-contact');
$app->post('/kirim-kontak', function ($request, $response, $args)   {
    // Get and validate input parameters
    $email = filter_var($request->getParam('email'), FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($request->getParam('subject'), ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($request->getParam('phone'), ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($request->getParam('name'), ENT_QUOTES, 'UTF-8');

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $response->withRedirect('/ID/hubungikami?i=error');
    }

    // Validate required fields
    if (empty($name) || empty($email) || empty($subject)) {
        return $response->withRedirect('/ID/hubungikami?i=error');
    }

    $mail = new PHPMailer;
    $mail->isSMTP();

    // SMTP Configuration from environment variables
    $mail->SMTPDebug = (int) $_ENV['SMTP_DEBUG']; // 0 = off for production
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->Port = (int) $_ENV['SMTP_PORT'];
    $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USERNAME'];
    $mail->Password = $_ENV['SMTP_PASSWORD'];

    // Set sender and recipient
    $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
    $mail->addAddress($_ENV['SMTP_TO_EMAIL'], $_ENV['SMTP_TO_NAME']);

    // Set email content
    $mail->Subject = 'Pesan dari website';
    $mail->IsHTML(true);
    $mail->Body = "<p>Halo, ada pesan yang berasal dari formulir kontak di website dengan informasi sebagai berikut: </p><p>Nama: ".$name."</p><p>Email: ".$email."</p><p>Telepon: ".$phone."</p><p>Subyek: ". $subject."</p>";
    $mail->AltBody = 'Please use html format email client.';

    // Send email
    if (!$mail->send()) {
        error_log("Mailer Error: " . $mail->ErrorInfo);
        return $response->withRedirect('/ID/hubungikami?i=error');
    } else {
        return $response->withRedirect('/ID/hubungikami?i=sent');
    }

})->setName('kirim-kontak');

// English Route: Job Application Form Handler
$app->post('/send-job-application', function ($request, $response, $args) {
    // Get and validate input parameters
    $fullname = htmlspecialchars($request->getParam('fullname'), ENT_QUOTES, 'UTF-8');
    $dob = htmlspecialchars($request->getParam('dob'), ENT_QUOTES, 'UTF-8');
    $email = filter_var($request->getParam('email'), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($request->getParam('phone'), ENT_QUOTES, 'UTF-8');
    $education = htmlspecialchars($request->getParam('education'), ENT_QUOTES, 'UTF-8');
    $recruitment_type = htmlspecialchars($request->getParam('recruitment_type'), ENT_QUOTES, 'UTF-8');
    $source_page = htmlspecialchars($request->getParam('source_page'), ENT_QUOTES, 'UTF-8');

    // Determine redirect URL based on source page
    $redirectUrl = ($source_page === 'experienced')
        ? '/EN/careers/experienced-recruitment'
        : '/EN/careers/graduate-recruitment';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Validate required fields
    if (empty($fullname) || empty($dob) || empty($email) || empty($phone) || empty($education) || empty($recruitment_type)) {
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Handle file upload
    $uploadedFiles = $request->getUploadedFiles();
    $cvFile = $uploadedFiles['cv'] ?? null;

    if (!$cvFile || $cvFile->getError() !== UPLOAD_ERR_OK) {
        error_log("File upload error: " . ($cvFile ? $cvFile->getError() : 'No file uploaded'));
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Validate file type and size
    $filename = $cvFile->getClientFilename();
    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $fileSize = $cvFile->getSize();

    // Check file extension
    if ($fileExtension !== 'pdf') {
        error_log("Invalid file type: " . $fileExtension);
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Check file size (1 MB = 1048576 bytes)
    if ($fileSize > 1048576) {
        error_log("File too large: " . $fileSize . " bytes");
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Validate MIME type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $tmpFilePath = $cvFile->file;
    $mimeType = $finfo->file($tmpFilePath);

    if ($mimeType !== 'application/pdf') {
        error_log("Invalid MIME type: " . $mimeType);
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Sanitize filename
    $safeFilename = preg_replace("/[^a-zA-Z0-9._-]/", "", str_replace(' ', '_', $filename));
    $safeFilename = $fullname . '_CV_' . date('Ymd_His') . '.pdf';

    try {
        $mail = new PHPMailer;
        $mail->isSMTP();

        // SMTP Configuration from environment variables
        $mail->SMTPDebug = (int) $_ENV['SMTP_DEBUG'];
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->Port = (int) $_ENV['SMTP_PORT'];
        $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];

        // Set sender and recipient
        $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
        $mail->addAddress($_ENV['SMTP_TO_EMAIL'], $_ENV['SMTP_TO_NAME']);

        // Attach CV file
        $mail->addAttachment($tmpFilePath, $safeFilename);

        // Set email content
        $mail->Subject = 'Job Application from Website - ' . $fullname;
        $mail->IsHTML(true);
        $mail->Body = "
            <p>Hi, there is a new job application from the website with the following information:</p>
            <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
                <tr><td><strong>Full Name</strong></td><td>" . $fullname . "</td></tr>
                <tr><td><strong>Date of Birth</strong></td><td>" . $dob . "</td></tr>
                <tr><td><strong>Email</strong></td><td>" . $email . "</td></tr>
                <tr><td><strong>Phone Number</strong></td><td>" . $phone . "</td></tr>
                <tr><td><strong>Last Education</strong></td><td>" . $education . "</td></tr>
                <tr><td><strong>Recruitment Type</strong></td><td>" . $recruitment_type . "</td></tr>
            </table>
            <p>Curriculum Vitae is attached to this email.</p>
        ";
        $mail->AltBody = 'Job Application from ' . $fullname . '. Please use HTML format email client to view details.';

        // Send email
        if (!$mail->send()) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return $response->withRedirect($redirectUrl . '?i=error');
        } else {
            return $response->withRedirect($redirectUrl . '?i=sent');
        }
    } catch (Exception $e) {
        error_log("Exception: " . $e->getMessage());
        return $response->withRedirect($redirectUrl . '?i=error');
    }
})->setName('send-job-application');

// Indonesian Route: Job Application Form Handler
$app->post('/kirim-lamaran-kerja', function ($request, $response, $args) {
    // Get and validate input parameters
    $fullname = htmlspecialchars($request->getParam('fullname'), ENT_QUOTES, 'UTF-8');
    $dob = htmlspecialchars($request->getParam('dob'), ENT_QUOTES, 'UTF-8');
    $email = filter_var($request->getParam('email'), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($request->getParam('phone'), ENT_QUOTES, 'UTF-8');
    $education = htmlspecialchars($request->getParam('education'), ENT_QUOTES, 'UTF-8');
    $recruitment_type = htmlspecialchars($request->getParam('recruitment_type'), ENT_QUOTES, 'UTF-8');
    $source_page = htmlspecialchars($request->getParam('source_page'), ENT_QUOTES, 'UTF-8');

    // Determine redirect URL based on source page
    $redirectUrl = ($source_page === 'experienced')
        ? '/ID/karir/rekrutmen-profesional'
        : '/ID/karir/rekrutmen-lulusan-baru';

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Validate required fields
    if (empty($fullname) || empty($dob) || empty($email) || empty($phone) || empty($education) || empty($recruitment_type)) {
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Handle file upload
    $uploadedFiles = $request->getUploadedFiles();
    $cvFile = $uploadedFiles['cv'] ?? null;

    if (!$cvFile || $cvFile->getError() !== UPLOAD_ERR_OK) {
        error_log("File upload error: " . ($cvFile ? $cvFile->getError() : 'No file uploaded'));
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Validate file type and size
    $filename = $cvFile->getClientFilename();
    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $fileSize = $cvFile->getSize();

    // Check file extension
    if ($fileExtension !== 'pdf') {
        error_log("Invalid file type: " . $fileExtension);
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Check file size (1 MB = 1048576 bytes)
    if ($fileSize > 1048576) {
        error_log("File too large: " . $fileSize . " bytes");
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Validate MIME type
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $tmpFilePath = $cvFile->file;
    $mimeType = $finfo->file($tmpFilePath);

    if ($mimeType !== 'application/pdf') {
        error_log("Invalid MIME type: " . $mimeType);
        return $response->withRedirect($redirectUrl . '?i=error');
    }

    // Sanitize filename
    $safeFilename = preg_replace("/[^a-zA-Z0-9._-]/", "", str_replace(' ', '_', $filename));
    $safeFilename = $fullname . '_CV_' . date('Ymd_His') . '.pdf';

    try {
        $mail = new PHPMailer;
        $mail->isSMTP();

        // SMTP Configuration from environment variables
        $mail->SMTPDebug = (int) $_ENV['SMTP_DEBUG'];
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->Port = (int) $_ENV['SMTP_PORT'];
        $mail->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];

        // Set sender and recipient
        $mail->setFrom($_ENV['SMTP_FROM_EMAIL'], $_ENV['SMTP_FROM_NAME']);
        $mail->addAddress($_ENV['SMTP_TO_EMAIL'], $_ENV['SMTP_TO_NAME']);

        // Attach CV file
        $mail->addAttachment($tmpFilePath, $safeFilename);

        // Set email content
        $mail->Subject = 'Lamaran Kerja dari Website - ' . $fullname;
        $mail->IsHTML(true);
        $mail->Body = "
            <p>Halo, ada lamaran kerja baru dari website dengan informasi sebagai berikut:</p>
            <table border='1' cellpadding='5' cellspacing='0' style='border-collapse: collapse;'>
                <tr><td><strong>Nama Lengkap</strong></td><td>" . $fullname . "</td></tr>
                <tr><td><strong>Tanggal Lahir</strong></td><td>" . $dob . "</td></tr>
                <tr><td><strong>Email</strong></td><td>" . $email . "</td></tr>
                <tr><td><strong>Nomor Handphone</strong></td><td>" . $phone . "</td></tr>
                <tr><td><strong>Pendidikan Terakhir</strong></td><td>" . $education . "</td></tr>
                <tr><td><strong>Tipe Rekrutmen</strong></td><td>" . $recruitment_type . "</td></tr>
            </table>
            <p>Curriculum Vitae terlampir dalam email ini.</p>
        ";
        $mail->AltBody = 'Lamaran kerja dari ' . $fullname . '. Silakan gunakan email client format HTML untuk melihat detail.';

        // Send email
        if (!$mail->send()) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            return $response->withRedirect($redirectUrl . '?i=error');
        } else {
            return $response->withRedirect($redirectUrl . '?i=sent');
        }
    } catch (Exception $e) {
        error_log("Exception: " . $e->getMessage());
        return $response->withRedirect($redirectUrl . '?i=error');
    }
})->setName('kirim-lamaran-kerja');
