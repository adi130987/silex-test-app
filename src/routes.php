<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Csrf\CsrfToken;


/**
 * Index route
 */
$app->get('/', function (Application $app, Request $request) {
    return $app['twig']->render('home.twig.html', []);
});

/**
 * Generate valid CSRF tokens
 */
$app->get('/get-csrf-token', function (Application $app, Request $request) {
    // var_dump($app['csrf.token_manager']->isTokenValid(new CsrfToken('testing_token', 'lHio-C_CFl7OrfyJeP_HOU4k7uttFZichhDWvl7tBts')));
    $validToken = $app['csrf.token_manager']->getToken('testing_token');
    return $app->json(
        array(
            'token_id' => $validToken->getId(),
            'token_value' => $validToken->getValue()
        )
    );
});

$app->get('/countries-data', function (Application $app, Request $request) {

    $jsonCountriesDataStr = file_get_contents(__DIR__.'/../data/countries.json');
    $jsonCountriesData = json_decode($jsonCountriesDataStr, true);

    return $app->json($jsonCountriesData);

});
