<?php

require_once 'vendor/autoload.php';
require_once 'AdminModele.php';

// Créez une instance de AdminModele
$adminModele = new AdminModele();

// Utilisez la méthode pour récupérer tous les admins
$admins = $adminModele->getAllAdmins();

// Affichez les données pour le débogage
print_r($admins);

$loader = new \Twig\Loader\FilesystemLoader("app/View/templates");
$twig = new \Twig\Environment($loader);
echo $twig->render('index.twig', ['admins' => $admins]);