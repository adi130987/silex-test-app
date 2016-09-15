<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Silex\Provider\CsrfServiceProvider;

$app['debug'] = true;

/**
 * Session Provider
 */

$app->register(new Silex\Provider\SessionServiceProvider());

/**
 * Twig provider
 */
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

/**
 * Register CSRF service
 */
$app->register(new CsrfServiceProvider());


$app->before(function (Request $request, Application $app) {
    // rootes before middleware actions
    // enjoy
});

require_once __DIR__.'/routes.php';


return $app;
