<?php
require_once '../Model/panier.php';
require_once '../Model/boisson.php';
require_once '../Model/fruitssec.php';
require_once '../Model/biscuit.php';
require_once '../Model/modele.php';
require_once '../Model/Products.php';




include '../../vendor/autoload.php';
$loader = new Twig\Loader\FilesystemLoader('../View/templates');

$twig = new Twig\Environment($loader);


$panier = new panier();
$boissons = new boisson();
$fruitssec = new fruitssec();
$biscuits = new biscuit();



$action = isset($_GET['action']) ? $_GET['action'] : '';
$id_produit = isset($_GET['id_produit']) ? $_GET['id_produit'] : '';
$id_panier = isset($_GET['id_panier']) ? $_GET['id_panier'] : '';

if (empty($id_panier)) {
    echo "Erreur : id_panier non défini.";
    exit();
}

switch($action) {
    case "supp":{
        $panier->retirerProduitPanier($id_produit, $id_panier);
        $template = $twig->load('panier.twig');
        ob_start();
        echo $template->render(array('produits'=> $panier->getContenu($id_panier)));
        ob_end_clean();
        header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=panier');
        exit();
    }

    case "add_boissons":{
        $panier->ajouterProduitPanier($id_produit, $id_panier);
        $template = $twig->load('boissons.twig');
        ob_start();
        echo $template->render(array('boissons' => $boissons->getAllBoissons()));
        ob_end_clean();
        header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=boissons');
        exit();
    }

    case "add_fruits_secs":{
        $panier->ajouterProduitPanier($id_produit, $id_panier);
        $template = $twig->load('fruitssec.twig');
        ob_start();
        echo $template->render(array('fruitssec' => $fruitssec->getAllFruitssec()));
        ob_end_clean();
        header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=fruitssec');
        exit();

    }
    case "add_biscuits":{
        $panier->ajouterProduitPanier($id_produit, $id_panier);
        $template = $twig->load('biscuits.twig');
        ob_start();
        echo $template->render(array('biscuits' => $biscuits->getAllBiscuits()));
        ob_end_clean();
        header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=biscuits');
        exit();



    }

    case "add_product": {
        $quantite = isset($_GET['quantite']) ? (int)$_GET['quantite'] : 1;
        $quantite = max($quantite, 1);

        for ($i = 0; $i < $quantite; $i++) {
            $panier->ajouterProduitPanier($id_produit, $id_panier);
        }

        header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=panier');
        exit();
    }



    case "list":{
        $panier->getContenu($id_panier);
        break;
    }

    case "decreaseQty":
    {
        $panier->decreaseQty($id_produit, $id_panier);
        $template = $twig->load('panier.twig');
        ob_start();
        echo $template->render(array('produits'=> $panier->getContenu($id_panier)));
        ob_end_clean();
        header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=panier');
        exit();
    }

    case "ajouterProduitPanier":{
            $panier->ajouterProduitPanier($id_produit, $id_panier);
            $template = $twig->load('panier.twig');
            ob_start();
            echo $template->render(array('produits'=> $panier->getContenu($id_panier)));
            ob_end_clean();
            header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=panier');
            exit();
    }

    case "generateInvoice":
    {
        $id_panier = 1;
        $panier_data = $panier->getContenu($id_panier);

        header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/facture.php?panier_data=' . urlencode(serialize($panier_data)));
        exit();
    }
}
