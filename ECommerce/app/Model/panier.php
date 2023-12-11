<?php
require_once 'modele.php';

// Démarrer ou reprendre une session
class panier extends modele
{

    // Fonction pour ajouter un produit au panier
    function ajouterProduitPanier($id_product, $id_panier)
    {
        $sql = "INSERT INTO produitspanier (id_product, id_panier) VALUES ($id_product, $id_panier);";
        $this->executerRequete($sql);
        $this->getQuantitéDansPanier($id_panier);
        return $this;
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
        $sql = "SELECT
    products.id,
    products.name,
    products.image,
    products.price,
    COUNT(produitspanier.id_product) AS nombre_occurrences
FROM
    products
LEFT JOIN
    produitspanier ON products.id = produitspanier.id_product AND produitspanier.id_panier = $id_panier
GROUP BY
    products.id, products.name, products.image, products.price
HAVING
    COUNT(produitspanier.id_product) > 0;
";
        return $this->executerRequete($sql)->fetchAll();
    }

    function decreaseQty($id_product, $id_panier){
        $sql="DELETE FROM produitspanier WHERE id_product = $id_product AND id_panier = $id_panier LIMIT 1";
        return $this->executerRequete($sql);

    }

    function getQuantitéDansPanier($id_panier){
        $sql="SELECT COUNT(id_product) as quantiteDansPanier FROM produitspanier where id_panier = $id_panier";
        $result = $this->executerRequete($sql)->fetch(PDO::FETCH_ASSOC);
        return $result['quantiteDansPanier'];
    }

}
?>
