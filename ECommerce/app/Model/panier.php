<?php

// Démarrer ou reprendre une session
class panier extends modele
{


// Fonction pour ajouter un produit au panier
    function ajouterProduitPanier($id_product, $id_panier)
    {
        $sql = "INSERT INTO produitspanier (id_product, id_panier) VALUES ($id_product, $id_panier);";
        return $this->executerRequete($sql);
    }

    function retirerProduitPanier($id_product, $id_panier)
    {
        $sql = "DELETE FROM produitspanier WHERE id_product = $id_product and id_panier = $id_panier;";
        return $this->executerRequete($sql);
    }



    // Fonction qui créer un nouveau panier
    function creerPanier(){
        $sql = "INSERT INTO panier VALUES ();";
        return $this->executerRequete($sql);
    }


    // Fonction qui retourne le contenu d'un panier en prenant en paramètre l'id du panier
    function getContenu($id_panier)
    {
        $sql = "SELECT DISTINCT products.name, products.image, products.price, COUNT(produitspanier.id_product) AS nombre_occurrences FROM produitspanier join products on products.id = produitspanier.id_product where produitspanier.id_panier = $id_panier";
        return $this->executerRequete($sql)->fetchAll();
    }


}
?>
