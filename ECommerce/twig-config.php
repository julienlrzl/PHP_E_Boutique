<?php
require_once 'vendor/autoload.php';
require_once 'app/Model/AdminModele.php';

/* récupérer le tableau des données */
//test cours
//require 'app/Model/data.php';
//$donnees = getData();

// Créez une instance de AdminModele
$adminModele = new AdminModele();

// Utilisez la méthode pour récupérer tous les admins
$admins = $adminModele->getAllAdmins();

$loader = new \Twig\Loader\FilesystemLoader("app/View/templates");
$twig = new \Twig\Environment($loader);

echo $twig->render('biscuits.twig', ['admins' => $admins]);

//test cours
//echo $twig->render('biscuits.twig', $donnees);