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
        'uri' => $path[1],
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
            'uri' => $path[2],
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
            'uri' => $path[2],
            'sub' => $path[3]
        ],
    ];  
    return $this->view->render($response, 'en/aboutus/whatmakeusdifferent.twig', $vars);
})->setName('whatmakeusdifferent');
$app->get('/EN/aboutus/ourleadership', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3]
        ],
    ];  
    return $this->view->render($response, 'en/aboutus/ourleadership.twig', $vars);
})->setName('ourleadership');
$app->get('/EN/aboutus/ourleadership/geoffrey-d-simms', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/gs.twig', $vars);
})->setName('geoffrey-d-simms');
$app->get('/EN/aboutus/ourleadership/fransiscus-alip', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/fa.twig', $vars);
})->setName('fransiscus-alip');

$app->get('/EN/aboutus/ourleadership/luke-furler', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/lf.twig', $vars);
})->setName('luke-furler');

$app->get('/EN/aboutus/ourleadership/dessi-natalegawa', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/dn.twig', $vars);
})->setName('dessi-natalegawa');

$app->get('/EN/aboutus/ourleadership/ivan-ciptadi', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/ic.twig', $vars);
})->setName('ivan-ciptadi');

$app->get('/EN/aboutus/ourleadership/stephani-lucia', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/sl.twig', $vars);
})->setName('stephani-lucia');
$app->get('/EN/aboutus/ourleadership/michael-gunawan', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/mg.twig', $vars);
})->setName('michael-gunawan');
$app->get('/EN/aboutus/ourleadership/zara-xue', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/zx.twig', $vars);
})->setName('zara-xue');
$app->get('/EN/aboutus/ourleadership/susana-cassandra', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Our Leadership',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'en/cv/sc.twig', $vars);
})->setName('susana-cassandra');
$app->get('/EN/aboutus/transactionsandcasestudy', function (Request $request, Response $response, $args)   {
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Transactions and Case Study',
            'uri' => $path[2],
            'sub' => $path[3],
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
            'uri' => $path[2],
            'sub' => $path[3],
            'data' => $json_data,
            'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/aboutus/transactionsandcasestudy-single.twig', $vars);
})->setName('transactionsandcasestudy-id');
$app->get('/EN/aboutus/eventsandconferences', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Events and Conferences',
            'uri' => $path[2],
            'sub' => $path[3]
        ],
    ];  
    return $this->view->render($response, 'en/aboutus/eventsandconferences.twig', $vars);
})->setName('eventsandconferences');

// English Route : Services
$app->get('/EN/services', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Our Services.',
        'description' => 'Our services AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  
    return $this->view->render($response, 'en/services.twig', $vars);

})->setName('services');
$app->get('/EN/services/debt-restructurings-and-turnaround-management', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Restructurings and Turnaround Management',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Debt Restructurings and Turnaround Management',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Creditor Support and Advisory',
        'description' => 'Creditor Support and Advisory',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Creditor Support and Advisory',
        'description' => 'Creditor Support and Advisory',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Financial Investigations and Litigation Support',
        'description' => 'Financial Investigations and Litigation Support',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Financial Investigations and Litigation Support',
        'description' => 'Financial Investigations and Litigation Support',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/casestudy.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2],
        'sub' => $path[3],
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'en/services/cims-case.twig', $vars);

})->setName('corporate-initiative-management-and-support-case');

// ABOUT ROUTE
// 
$app->get('/EN/careers', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'en/careers/christo.twig', $vars);

})->setName('christoper-joutua');
$app->get('/EN/careers/graduate-recruitment', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'en/graduate-recruitment.twig', $vars);

})->setName('graduate-recruiement');
$app->get('/EN/careers/experienced-recruitment', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Careers @ AJCapital',
        'description' => 'Careers @ AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'en/experienced-recruitment.twig', $vars);

})->setName('experienced-recruitment');
// ABOUT ROUTE
// 
$app->get('/EN/contactus', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2]
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
        'uri' => $path[2]
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
        'uri' => $path[2]
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
        'uri' => $path[1],
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
            'uri' => $path[2],
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
            'uri' => $path[2],
            'sub' => $path[3]
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami/yang-membedakan-kami.twig', $vars);
})->setName('yang-membedakan-kami');
$app->get('/ID/tentangkami/kepemimpinan-kami', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Kepemimpinan Kami',
            'uri' => $path[2],
            'sub' => $path[3]
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami/kepemimpinan-kami.twig', $vars);
})->setName('kepemimpinan-kami');
$app->get('/ID/tentangkami/kepemimpinan-kami/geoffrey-d-simms', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Kepemimpinan Kami',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'id/cv/gs.twig', $vars);
})->setName('geoffrey-d-simms');
$app->get('/ID/tentangkami/kepemimpinan-kami/fransiscus-alip', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Kepemimpinan Kami',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'id/cv/fa.twig', $vars);
})->setName('fransiscus-alip');

$app->get('/ID/tentangkami/kepemimpinan-kami/luke-furler', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Kepemimpinan Kami',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'id/cv/lf.twig', $vars);
})->setName('luke-furler');

$app->get('/ID/tentangkami/kepemimpinan-kami/dessi-natalegawa', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode('/',$link);
    $vars = [
        'page' => [
            'title' => 'Kepemimpinan Kami',
            'uri' => $path[2],
            'sub' => $path[3],
            'leader' => $path[4]
        ],
    ];  
    return $this->view->render($response, 'id/cv/dn.twig', $vars);
})->setName('dessi-natalegawa');

$app->get('/ID/tentangkami/transaksi-dan-studi-kasus', function (Request $request, Response $response, $args)   {
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Transaksi dan Studi Kasus',
            'uri' => $path[2],
            'sub' => $path[3],
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
            'uri' => $path[2],
            'sub' => $path[3],
            'data' => $json_data,
            'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami/transaksi-dan-studikasus-single.twig', $vars);
})->setName('transaksi-dan-studi-kasus-id');
$app->get('/ID/tentangkami/acara-dan-konferensi', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
            'title' => 'Acara dan Konferensi',
            'uri' => $path[2],
            'sub' => $path[3]
        ],
    ];  
    return $this->view->render($response, 'id/tentangkami/acara-dan-konferensi.twig', $vars);
})->setName('acara-dan-konferensi');

// ID Route : layanan
$app->get('/ID/layanan', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Our layanan.',
        'description' => 'Our layanan AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  
    return $this->view->render($response, 'id/layanan.twig', $vars);

})->setName('layanan');
$app->get('/ID/layanan/restrukturisasi-dan-turnaround-management', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Restrukturisasi dan Manajemen Pemulihan',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Restrukturisasi dan Manajemen Pemulihan',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'pendukung-dan-penasihat-kreditor',
        'description' => 'pendukung-dan-penasihat-kreditor',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Pendukung dan Penasihat Kreditor',
        'description' => 'Pendukung dan Penasihat Kreditor',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'Investigasi Keuangan dan Dukungan Litigasi',
        'description' => 'investigasi-keuangan-dan-dukungan-litigasi',
        'uri' => $path[2],
        'sub' => $path[3],
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

    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);

    $vars = [
        'page' => [
        'title' => 'investigasi-keuangan-dan-dukungan-litigasi',
        'description' => 'investigasi-keuangan-dan-dukungan-litigasi',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Liquidation, Receivership and Court appointments',
        'description' => 'Liquidation, Receivership and Court appointments',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    $vars = [
        'page' => [
        'title' => 'M&A Advisory and Fund Raising',
        'description' => 'M&A Advisory and Fund Raising',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2],
        'sub' => $path[3],
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
    $cat = $path[3];
    $str = file_get_contents(__DIR__ . '../../assets/db/studikasus.json');
    $json_data=json_decode($str,true);
    
    $vars = [
        'page' => [
        'title' => 'Corporate Initiative Management and Support',
        'description' => 'Corporate Initiative Management and Support',
        'uri' => $path[2],
        'sub' => $path[3],
        'data' => $json_data,
        'service' => $cat,
        'id' => $id,
        ],
    ];  
    return $this->view->render($response, 'id/layanan/manajemen-inisiatif-dan-pendukung-perusahaan-kasus.twig', $vars);

})->setName('manajemen-inisiatif-dan-pendukung-perusahaan-kasus');

// ABOUT ROUTE
// 
$app->get('/ID/karir', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
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
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'id/karir/christo.twig', $vars);

})->setName('christoper-joutua');
$app->get('/ID/karir/rekrutmen-lulusan-baru', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'id/karir/rekrutmen-lulusan-baru.twig', $vars);

})->setName('graduate-recruiement');
$app->get('/ID/karir/rekrutmen-profesional', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'id/karir/rekrutmen-profesional.twig', $vars);

})->setName('rekrutment-profesional');
// ABOUT ROUTE
// 
$app->get('/ID/hubungikami', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2]
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
        'uri' => $path[2]
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
        'uri' => $path[2]
        ],
    ];  
    return $this->view->render($response, 'id/kebijakan-privasi.twig', $vars);
})->setName('kebijakan-privasi');

$app->post('/send-contact', function ($request, $response, $args)   {
    $email = $request->getParam('email');
    $subject = $request->getParam('subject');
    $phone = $request->getParam('phone');
    $name = $request->getParam('name');
    echo "Email: $email<br/>";
    echo "Subject: $subject<br />";
    echo "Phone: $phone<br />";
    echo "Name: $name";
    
    // php mailer
    //Tell PHPMailer to use SMTP
    $mail = new PHPMailer;
    $mail->isSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;
    //Set the hostname of the mail server
    $mail->Host = 'smtp.mailtrap.io';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465 ;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "bd833e2d9e73f3";
    //Password to use for SMTP authentication
    $mail->Password = "49fdeb4eac7306";
    //Set who the message is to be sent from
    $mail->setFrom('462efef2df-9ffc3a@inbox.mailtrap.io', 'First Last');
    //Set an alternative reply-to address
    //$mail->addReplyTo('replyto@example.com', 'First Last');
    //Set who the message is to be sent to
    $mail->addAddress('462efef2df-9ffc3a@inbox.mailtrap.io', 'AJCapital Info');
    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
    $mail->IsHTML(true);
    $mail->Body="<p>Email: ".$email."</p><p>Subject:</p>". $subject."</p><p>Phone: ".$phone."</p>Name: ".$name;
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        //echo "Message sent!";
        return $response->withRedirect('/EN/contactus/sent'.$args['id']); 
    }
    

})->setName('send-contact');
