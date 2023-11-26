<?php

$loader = new \Twig\Loader\FilesystemLoader("app/View/templates");
$twig = new \Twig\Environment($loader);

$request_uri = $_SERVER['REQUEST_URI'];

switch ($request_uri) {
    case 'app/View/templates/politique_confidentialite.twig':
        echo $twig->render('politique_confidentialite.twig');
        break;

    case 'app/View/templates/compte.twig':
        echo $twig->render('compte.twig');
        break;

    case 'app/View/templates/panier.twig':
        echo $twig->render('panier.twig');
        break;

    case 'app/View/templates/conditions_generales.twig':
        echo $twig->render('conditions_generales.twig');
        break;

    case 'app/View/templates/boissons.twig':
        echo $twig->render('boissons.twig');
        break;

    case 'app/View/templates/biscuits.twig':
        echo $twig->render('biscuits.twig');
        break;

    case 'app/View/templates/conditions_generales.twig':
        echo $twig->render('conditions_generales.twig');
        break;

    case 'app/View/templates/fruitssec.twig':
        echo $twig->render('fruitssec.twig');
        break;

    case 'app/View/templates/ventesflash.twig':
        echo $twig->render('ventesflash.twig');
        break;

    case 'app/View/templates/magasins.twig':
        echo $twig->render('magasins.twig');
        break;

    default:
        echo $twig->render('index.twig');
        break;
}
