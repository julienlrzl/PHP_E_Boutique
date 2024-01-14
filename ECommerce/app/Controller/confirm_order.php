<?php
require_once '../Model/panier.php';
require_once '../Model/boisson.php';
require_once '../Model/fruitssec.php';
require_once '../Model/biscuit.php';
require_once '../Model/modele.php';
require_once '../Model/Products.php';
require_once '../Model/admin.php';

include '../../vendor/autoload.php';
$loader = new Twig\Loader\FilesystemLoader('../View/templates');

$twig = new Twig\Environment($loader);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    $admin = new admin();
    $admin->confirmOrder($orderId);

    header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=admin');
    exit;
}

