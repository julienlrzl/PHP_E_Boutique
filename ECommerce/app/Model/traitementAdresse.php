<?php

require_once 'customers.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nouvelleAdresse = $_POST['address'];
    $nouveauCodePostal = $_POST['postalCode'];
    $nouvelleVille = $_POST['city'];
    $customerId = $_POST['customerId'];
    $customer = new Customer();
    $customer->updateAddress($customerId, $nouvelleAdresse, $nouveauCodePostal, $nouvelleVille);
    header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=paypalcheque&addressUpdated=true');
    exit();
}
?>
