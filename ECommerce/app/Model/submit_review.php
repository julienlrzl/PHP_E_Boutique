<?php
require_once 'modele.php';

class Review extends Modele
{

    public function addReview($id_product, $name_user, $photo_user, $stars, $title, $description)
    {
        $sql = "INSERT INTO reviews (id_product, name_user, photo_user, stars, title, description) VALUES (?, ?, ?, ?, ?, ?)";
        $this->executerRequete($sql, [$id_product, $name_user, $photo_user, $stars, $title, $description]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_product = $_POST['id_product'];
    $name_user = $_POST['name_user'];
    $photo_user = $_POST['photo_user'];
    $stars = $_POST['stars'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $reviewModel = new Review();
    $reviewModel->addReview($id_product, $name_user, $photo_user, $stars, $title, $description);

    header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=produit_boisson&id='. $id_product);
    exit;
}
