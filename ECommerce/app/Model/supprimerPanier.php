<?php
require_once '../Model/panier.php';
require_once '../Model/logins.php';
require_once '../Model/Products.php';
require_once '../Model/Orders.php';


include '../../vendor/autoload.php';

$username = $_COOKIE['username'] ?? null;
$password = $_COOKIE['password'] ?? null;
$total = $_GET['total'] ?? 0;
$session_id = $_COOKIE['PHPSESSID'] ?? null;
$payment_type = $_GET['payment_type'] ?? 'cheque';
$login = new Logins();
$passwordhash = $login->getPasswordHash($username);

$login = new Logins();
$resultat = $login->seConnecter($username, $passwordhash);
$resultatsanshash = $login->seConnecter($username, $password);



if (!empty($resultat) || !(empty($resultatsanshash))) {
    $customer_id = $login->getCustomerId($username, $passwordhash);
    $id_panier = $resultat[0]["id_panier"];
    $panier = new panier();
    $Products = new Products();
    $Orders = new Orders();

    $produitsdupanier = $panier->getContenu($id_panier);
    $total = 0;

    foreach ($produitsdupanier as $produit) {
        $total += $produit['price'] * $produit['nombre_occurrences'];
    }

    $order_id = $Orders->ajouterCommande($customer_id, $total,$session_id, $payment_type);

    foreach ($produitsdupanier as $produit) {
        $Orders->ajouterOrderItems($order_id, $produit['id'], $produit['nombre_occurrences']);
    }

    foreach ($produitsdupanier as $produit) {
        $id_produit = $produit['id'];
        $quantite = $produit['nombre_occurrences'];
        $Products->decrementerQuantite($id_produit, $quantite);
    }

    if ($payment_type == 'paypal') {
        header("Location: https://www.paypal.com");
        $panier->viderPanier($id_panier);
        exit();
    } else {
        header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=payementcheque");
        exit();
    }
} else {
    echo "Erreur de connexion ou panier introuvable.";
}
