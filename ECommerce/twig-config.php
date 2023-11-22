<?php

require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader("app/View/templates");
$twig = new \Twig\Environment($loader);
echo $twig->render('index.twig');