<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Model/boisson.php';
require_once __DIR__ . '/../app/Model/biscuit.php';
require_once __DIR__ . '/../app/Model/fruitssec.php';
require_once __DIR__ . '/../app/Model/panier.php';
require_once __DIR__ . '/../app/Model/logins.php';
require_once __DIR__ . '/../app/Model/review.php';
require_once __DIR__ . '/../app/Model/Products.php';
require_once __DIR__ . '/../app/Model/admin.php';
require_once __DIR__ . '/../app/Model/customers.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

// Créez une instance
$boisson = new boisson();
$biscuit = new biscuit();
$fruitssec = new fruitssec();
$panier = new panier();
$login = new Logins();
$Products = new Products();
$admin = new Admin();
$customer = new Customer();

// Utilisez la méthode pour récupérer tous les boissons
$boissons = $boisson->getAllBoissons();
$biscuits = $biscuit->getAllBiscuits();
$fruitssecs = $fruitssec->getAllFruitssec();

$customerInfo = null;

// Vérifiez si l'utilisateur est connecté en utilisant les cookies
$username = $_COOKIE['username'] ?? null;
$password = $_COOKIE['password'] ?? null;


$id = isset($_GET['id']) ? $_GET['id'] : null;
$Product = $Products->getProduitsInfo($id);
$reviews = $Products->getReviewsProduits($id);

$isAdmin = false; // Initialisation de la variable admin

$resultat = $login->seConnecter($username, $password);
$resultatAdmin = $admin->seConnecterAdmin($username, $password);
if ($username !== null && $password !== null) {


    // Vérifie si la méthode a renvoyé un tableau non vide
    if (!empty($resultatAdmin)) {
        // Utilisateur est un admin
        $isAdmin = true;
        $orders = $admin->getAllOrders();
        $data['orders'] = $orders;

    } elseif (!empty($resultat)) {
        $id_panier = $resultat[0]["id_panier"];
        $produitsdupanier = $panier->getContenu($id_panier);
        $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);
        $customerInfo = $customer->getUnUtilisateur($username);
        $data['customerInfo'] = $customerInfo;


        // Vérifie si l'utilisateur est aussi un admin
    } else {
        // La connexion a échoué, vous pouvez traiter cela comme une déconnexion

        unset($_COOKIE['username']);
        unset($_COOKIE['password']);
        $username = null;
        $password = null;
        $id_panier = null;
        $produitqdupanier = null;
    }
    // Afficher les cookies avant la suppression


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
            'id_panier' => $id_panier ?? 0,
            'id' => $id,
            'isAdmin' => $isAdmin, // Ajout de la variable admin
            'boissons' => $boissons,
            'biscuits' => $biscuits,
            'fruitssecs' => $fruitssecs,
            'Product' => $Product,
            'reviews' => $reviews,
            'produitsdupanier' => $produitsdupanier ?? 0,
            'username' => $username,
            'customerInfo' => $customerInfo,
        ];

    } else {
        $data = [
            'boissons' => $boissons,
            'biscuits' => $biscuits,
            'fruitssecs' => $fruitssecs,
            'quantiteDansPanier' => $quantiteDansPanier ?? 0,
            'id_panier' => $id_panier ?? 0,
            'Product' => $Product,
            'reviews' => $reviews,
            'produitsdupanier' => $produitsdupanier ?? 0,
            'id' => $id,
            'username' => $username,
            'customerInfo' => $customerInfo,
            'isAdmin' => $isAdmin, // Ajout de la variable admin
        ];
        if ($isAdmin) {
            $data['orders'] = $orders; // Ajouter les commandes pour l'admin
        }
        elseif ($username) {
            $customerInfo = $customer->getUnUtilisateur($username);
            $data['customerInfo'] = $customerInfo;
        }
    }

    // Rendu du template avec les données
    echo $twig->render($page . '.twig', $data);


} catch (\Exception $e) {
    // Affichage des erreurs
    die('Erreur Twig : ' . $e->getMessage());

}

?>
