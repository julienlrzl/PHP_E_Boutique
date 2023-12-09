<?php

// Chargement de l'autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Model/boisson.php';
require_once __DIR__ . '/../app/Model/biscuit.php';
require_once __DIR__ . '/../app/Model/fruitssec.php';
require_once __DIR__ . '/../app/Model/panier.php';



// Créez une instance de boisson
$boisson = new boisson();
$biscuit = new biscuit();
$fruitssec = new fruitssec();
$panier = new panier();

// Utilisez la méthode pour récupérer tous les boisson
$boissons = $boisson->getAllBoissons();
$biscuits = $biscuit->getAllBiscuits();
$fruitssecs = $fruitssec->getAllFruitssec();
$produitsdupanier = $panier->getContenu(1);


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

try {
    // Configuration du chemin vers les templates
    $loader = new FilesystemLoader(__DIR__ . '/../app/View/templates');

    // Initialisation de l'environnement Twig
    $twig = new Environment($loader);

    $page = isset($_GET['page']) ? $_GET['page'] : 'index';


    // Exemple de données à passer au template
    $data = null;
    if ($page == 'panier'){
        $data = [
            'produits' => $produitsdupanier,
        ];
    }
    else {
        $data = [
            'boissons' => $boissons,
            'biscuits' => $biscuits,
            'fruitssecs' => $fruitssecs  // Ajout des fruitssecs au tableau de données
        ];
    }


    // Rendu du template avec les données

    echo $twig->render($page . '.twig', $data);

} catch (\Exception $e) {
    // Affichage des erreurs
    die('Erreur Twig : ' . $e->getMessage());
}
