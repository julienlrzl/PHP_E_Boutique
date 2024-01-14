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

session_start();

$boisson = new boisson();
$biscuit = new biscuit();
$fruitssec = new fruitssec();
$panier = new panier();
$login = new Logins();
$Products = new Products();
$admin = new Admin();
$customer = new Customer();

$boissons = $boisson->getAllBoissons();
$biscuits = $biscuit->getAllBiscuits();
$fruitssecs = $fruitssec->getAllFruitssec();

$customerInfo = null;

$username = $_COOKIE['username'] ?? null;
$password = $_COOKIE['password'] ?? null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

$Product = $Products->getProduitsInfo($id);
$reviews = $Products->getReviewsProduits($id);

$passwordhash = $login->getPasswordHash($username);
$passwordhashadmin = $admin->getPasswordHashAdmin($username);

$isAdmin = false;
$resultat = $login->seConnecter($username, $passwordhash);
$resultatAdmin = $admin->seConnecterAdmin($username, $password);
$resultatsanshash = $login->seConnecter($username, $password);

if ($username !== null) {
    if (!empty($resultatAdmin)) {
        $isAdmin = true;
        $orders = $admin->getAllOrders();
        $data['orders'] = $orders;

    } elseif (!empty($resultat) || !(empty($resultatsanshash))) {
        $username = $_COOKIE['username'] ?? null;
        $password = $_COOKIE['password'] ?? null;
        $id_panier = $resultat[0]["id_panier"];
        $produitsdupanier = $panier->getContenu($id_panier);
        $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);
        $customerInfo = $customer->getUnUtilisateur($username);
        $data['customerInfo'] = $customerInfo;
    } else {
        unset($_COOKIE['username']);
        unset($_COOKIE['password']);
        $username = null;
        $password = null;
        $id_panier = null;
        $produitqdupanier = null;
    }
}

if (isset($_COOKIE['id_panier']) ){


    $id_panier = $_COOKIE['id_panier'] ?? null;
    $produitsdupanier = $panier->getContenu($id_panier);
    $panier->getQuantiteDansPanier($id_panier);
    $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);
    $username = $_COOKIE['username'] ?? null;
    $password = $_COOKIE['password'] ?? null;

}
elseif (!isset($_COOKIE['id_panier'])) {
    // Les cookies n'existent pas, générer des valeurs par défaut
    $panier->creerEmptyPanier();
    $id_panier = $panier->lastInsertPanierId();
    $produitsdupanier = $panier->getContenu($id_panier);
    $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);

    $expire = time() + 365 * 24 * 3600; // 1 an
    setcookie('username', $username, $expire, '/');
    setcookie('password', $password, $expire, '/');
    setcookie('id_panier', $id_panier, time() + 24 * 3600, '/');
    $username = $_COOKIE['username'] ?? null;
    $password = $_COOKIE['password'] ?? null;

}

try {
    $loader = new FilesystemLoader(__DIR__ . '/../app/View/templates');
    $twig = new Environment($loader);
    $page = isset($_GET['page']) ? $_GET['page'] : 'index';
    $data = null;

    if ($page == 'panier' || $page == 'paypalcheque') {
        $data = [
            'produits' => $produitsdupanier ?? [],
            'quantiteDansPanier' => $quantiteDansPanier ?? 0,
            'id_panier' => $id_panier ?? 0,
            'id' => $id,
            'isAdmin' => $isAdmin,
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
            'isAdmin' => $isAdmin,
        ];
        if ($isAdmin) {
            $data['orders'] = $orders;
        } elseif ($username) {
            $customerInfo = $customer->getUnUtilisateur($username);
            $data['customerInfo'] = $customerInfo;
        }
    }
    echo $twig->render($page . '.twig', $data);


} catch (\Exception $e) {
    die('Erreur Twig : ' . $e->getMessage());
}

?>
