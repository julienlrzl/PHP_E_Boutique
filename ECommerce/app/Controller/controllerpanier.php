<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/panier.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/boisson.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/fruitssec.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/biscuit.php';



include '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/vendor/autoload.php';
$loader = new Twig\Loader\FilesystemLoader('/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/View/templates');

$twig = new Twig\Environment($loader);


$panier = new panier();
$boissons = new boisson();
$fruitssec = new fruitssec();
$biscuits = new biscuit();


$action = $_GET['action'];
$id_produit = $_GET['id_produit'];
$id_panier = $_GET['id_panier'];

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

    case "ajouterProduitPanier":{ //increaseQTy
            $panier->ajouterProduitPanier($id_produit, $id_panier);
            $template = $twig->load('panier.twig');
            ob_start();
            echo $template->render(array('produits'=> $panier->getContenu($id_panier)));
            ob_end_clean();
            header('Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public/?page=panier');
            exit();



        }












}
