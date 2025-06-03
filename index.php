<?php

require_once('includes/db_config.php');

$url = $_SERVER['REQUEST_URI'];
$url = str_replace('/Memoteam', '', $url);
$url = str_replace('/memoteam', '', $url);

$routes = [
    '/' => 'accueil.php',
    '/form' => 'form.php',
    '/game' => 'game.php',
    '/apropos' => 'apropos.php',
    '/result' => 'result.php',
    '/resultat' => 'resultat.php'
];

$apiRoutes = [
    '/get_sounds' => 'get_sounds.php',
    '/create_user' => 'create_user.php',
    '/end_game' => 'end_game.php',
    '/get_result' => 'get_result.php',
    '/movement' => 'movement.php'
];
global $pdo;


function router($url, $routes, $apiRoutes, $pdo)
{
    $url = strtok($url, '?');

    if (array_key_exists($url, $routes)) {
        require('pages/' . $routes[$url]);
    } elseif (array_key_exists($url, $apiRoutes)) {
        require('api/' . $apiRoutes[$url]);
        exit();
    } else {
        abort();
    }
}

function abort()
{
    http_response_code(404);
    require('pages/404.php');
}

if (array_key_exists($url, $apiRoutes)) {
    router($url, $routes, $apiRoutes, $pdo);
} else {

    echo ('<!DOCTYPE html><html lang="fr"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>MemoPsycoacoustique</title> <link rel="stylesheet" href="./css/style.css"> </head> <body>');
    router($url, $routes, $apiRoutes, $pdo);
    echo ('</body> </html>');
}
?>