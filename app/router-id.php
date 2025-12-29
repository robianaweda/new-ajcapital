$app->get('/', function (Request $request, Response $response, $args)   {
    $vars = [
        'page' => [
        'title' => 'Selamat Datang',
        'description' => 'AJCapital Advisory Selamat datang'
        ],
    ];  
    return $this->view->render($response, 'landing.twig', $vars);
})->setName('landing');


//ID Route : Beranda
$app->get('/EN', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Konsultansi',
        'description' => 'AJCapital Advisory',
        'uri' => $path[1],
        ],
    ];  
    return $this->view->render($response, 'id/home.twig', $vars);
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

$app->get('/ID/tentangkami/traksaksi-dan-studi-kasus', function (Request $request, Response $response, $args)   {
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
    return $this->view->render($response, 'id/tentangkami/traksaksi-dan-studi-kasus.twig', $vars);
})->setName('traksaksi-dan-studi-kasus');
$app->get('/ID/tentangkami/traksaksi-dan-studi-kasus/{id}', function ($request, $response, $args)   {
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
    return $this->view->render($response, 'id/tentangkami/traksaksi-dan-studi-kasus-single.twig', $vars);
})->setName('traksaksi-dan-studi-kasus-id');
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
$app->get('/ID/layanan/restrukturisasi-dan-manajemen-pemulihan', function (Request $request, Response $response, $args)   {
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
    return $this->view->render($response, 'id/layanan/rtm.twig', $vars);

})->setName('restrukturisasi-dan-manajemen-pemulihan');
$app->get('/ID/layanan/restrukturisasi-dan-manajemen-pemulihan/{id}', function ($request, $response, $args)   {
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
    return $this->view->render($response, 'id/layanan/rtm-kasus.twig', $vars);

})->setName('restrukturisasi-dan-manajemen-pemulihan-kasus');
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
    return $this->view->render($response, 'id/layanan/csa.twig', $vars);

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
    return $this->view->render($response, 'id/layanan/csa-kasus.twig', $vars);

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
    return $this->view->render($response, 'id/layanan/fils.twig', $vars);

})->setName('investigasi-keuangan-dan-dukungan-litigasi');
$app->get('/ID/layanan/investigasi-keuangan-dan-dukungan-litigasi/{id}', function (Request $request, Response $response, $args)   {
    $id = $argh['id'];
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
    return $this->view->render($response, 'id/layanan/fils-kasus.twig', $vars);

})->setName('investigasi-keuangan-dan-dukungan-litigasi-kasus');

$app->get('/ID/layanan/insolvensi-dan-pemberesan', function (Request $request, Response $response, $args)   {
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
    return $this->view->render($response, 'id/layanan/lrca.twig', $vars);

})->setName('insolvensi-dan-pemberesan');
$app->get('/ID/layanan/insolvensi-dan-pemberesan/{id}', function (Request $request, Response $response, $args)   {
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
    return $this->view->render($response, 'id/layanan/lrca-kasus.twig', $vars);

})->setName('insolvensi-dan-pemberesan-kasus');
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
    return $this->view->render($response, 'id/layanan/maafr.twig', $vars);

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
    return $this->view->render($response, 'id/layanan/maafr-kasus.twig', $vars);

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
    return $this->view->render($response, 'id/layanan/cims.twig', $vars);

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
    return $this->view->render($response, 'id/layanan/cims-kasus.twig', $vars);

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
$app->get('/ID/karir/rekrutmen-lulusan-bar', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'id/rekrutmen-lulusan-bar.twig', $vars);

})->setName('graduate-recruiement');
$app->get('/ID/karir/rekrutment-profesional', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'karir @ AJCapital',
        'description' => 'karir @ AJCapital Advisory',
        'uri' => $path[2],
        ],
    ];  

    return $this->view->render($response, 'id/rekrutment-profesional.twig', $vars);

})->setName('rekrutment-profesional');
// ABOUT ROUTE
// 
$app->get('/ID/kontak-kami', function (Request $request, Response $response, $args)   {
    $link = $request->getUri()->getPath();
    $path = explode("/",$link);
    $vars = [
        'page' => [
        'title' => 'Contact US',
        'description' => 'AJCapital Advisory',
        'uri' => $path[2]
        ],
    ];  
    return $this->view->render($response, 'id/kontak-kami.twig', $vars);
})->setName('kontak-kami');