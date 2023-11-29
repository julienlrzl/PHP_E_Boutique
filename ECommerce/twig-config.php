<?php
require_once 'vendor/autoload.php';
require_once 'app/Model/boisson.php';
require_once 'app/Model/biscuit.php';
require_once 'app/Model/fruitssec.php';

/* récupérer le tableau des données */
//test cours
//require 'app/Model/data.php';
//$donnees = getData();

// Créez une instance de boisson
$boisson = new boisson();
$biscuit = new biscuit();
$fruitssec = new fruitssec();

// Utilisez la méthode pour récupérer tous les boisson
$boissons = $boisson->getAllBoissons();
$biscuits = $biscuit->getAllBiscuits();
$fruitssecs = $fruitssec->getAllFruitssec();

$loader = new \Twig\Loader\FilesystemLoader("app/View/templates");
$twig = new \Twig\Environment($loader);

echo $twig->render('fruitssec.twig', ['fruitssecs' => $fruitssecs]);

//test cours
//echo $twig->render('biscuits.twig', $donnees);