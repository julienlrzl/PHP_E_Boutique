<?php

// Chargement de l'autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Model/boisson.php';
require_once __DIR__ . '/../app/Model/biscuit.php';
require_once __DIR__ . '/../app/Model/fruitssec.php';
require_once __DIR__ . '/../app/Model/panier.php';
require_once __DIR__ . '/../app/Model/logins.php';
require_once __DIR__ . '/../app/Model/review.php';
require_once __DIR__ . '/../app/Model/Products.php';

// Créez une instance
$boisson = new boisson();
$biscuit = new biscuit();
$fruitssec = new fruitssec();
$panier = new panier();
$login = new Logins();
$Products = new Products();

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Utilisez la méthode pour récupérer tous les boissons
$boissons = $boisson->getAllBoissons();
$biscuits = $biscuit->getAllBiscuits();
$fruitssecs = $fruitssec->getAllFruitssec();

// Vérifiez si l'utilisateur est connecté en utilisant les cookies
$username = $_COOKIE['username'] ?? null;
$password = $_COOKIE['password'] ?? null;

$id = isset($_GET['id']) ? $_GET['id'] : null;
$Product = $Products -> getProduitsInfo($id);
$reviews = $Products -> getReviewsProduits($id);

if ($username !== null && $password !== null) {
    $resultat = $login->seConnecter($username, $password);

    // Vérifie si la méthode a renvoyé un tableau non vide
    if ($resultat && !empty($resultat)) {
        $id_panier = $resultat[0]["id_panier"];
        $produitsdupanier = $panier->getContenu($id_panier);
        $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);
    } else {
        // La connexion a échoué, vous pouvez traiter cela comme une déconnexion
        $username = null;
        $password = null;
    }
}

try {
    // Configuration du chemin vers les templates
    $loader = new FilesystemLoader(__DIR__ . '/../app/View/templates');

    // Initialisation de l'environnement Twig
    $twig = new Environment($loader);

    $page = isset($_GET['page']) ? $_GET['page'] : 'index';

    // Exemple de données à passer au template
    $data = null;

    if ($page == 'panier' || $page == 'paypalcheque') {
        $data = [
            'produits' => $produitsdupanier ?? [],
            'quantiteDansPanier' => $quantiteDansPanier ?? 0,
            'id_panier' => $id_panier,
            'id' =>$id,


        ];
    } else {
        $data = [
            'boissons' => $boissons,
            'biscuits' => $biscuits,
            'fruitssecs' => $fruitssecs,
            'quantiteDansPanier' => $quantiteDansPanier ?? 0,
            'id_panier' => $id_panier,
            'Product' => $Product,
            'reviews' => $reviews,
            'produitsdupanier' => $produitsdupanier,
            'id' =>$id,
            'username' => $username,
        ];
    }

    // Rendu du template avec les données
    echo $twig->render($page . '.twig', $data);

} catch (\Exception $e) {
    // Affichage des erreurs
    die('Erreur Twig : ' . $e->getMessage());
}
?>