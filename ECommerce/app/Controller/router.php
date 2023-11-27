<?php

$loader = new \Twig\Loader\FilesystemLoader("app/View/templates");
$twig = new \Twig\Environment($loader);

$request_uri = $_SERVER['REQUEST_URI'];

switch ($request_uri) {
    case 'politique_confidentialite':
        echo $twig->render('politique_confidentialite.twig');
        break;

    case 'compte':
        echo $twig->render('compte.twig');
        break;

    case 'panier':
        echo $twig->render('panier.twig');
        break;

    case 'conditions_generales':
        echo $twig->render('conditions_generales.twig');
        break;

    case 'boissons':
        echo $twig->render('boissons.twig');
        break;

    case 'biscuits':
        echo $twig->render('biscuits.twig');
        break;

    case 'conditions_generales':
        echo $twig->render('conditions_generales.twig');
        break;

    case 'fruitssec':
        echo $twig->render('fruitssec.twig');
        break;

    case 'ventesflash':
        echo $twig->render('ventesflash.twig');
        break;

    case 'magasins':
        echo $twig->render('magasins.twig');
        break;

    default:
        echo $twig->render('index.twig');
        break;
}
