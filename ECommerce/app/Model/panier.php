<?php
require_once 'modele.php';

class panier extends modele
{
    function ajouterProduitPanier($id_product, $id_panier)
    {
        $sql = "INSERT INTO produitspanier (id_product, id_panier) VALUES (:id_product, :id_panier)";

        $parametres = array(
            ":id_product" => $id_product,
            ":id_panier" => $id_panier,
        );

        $this->executerRequete($sql, $parametres);

        $quantiteDansPanier = $this->getQuantiteDansPanier($id_panier);

        return $quantiteDansPanier;
    }


    function retirerProduitPanier($id_product, $id_panier)
    {
        $sql = "DELETE FROM produitspanier WHERE id_product = $id_product and id_panier = $id_panier;";
        return $this->executerRequete($sql);
    }


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

    function decreaseQty($id_product, $id_panier)
    {
        $sql = "DELETE FROM produitspanier WHERE id_product = $id_product AND id_panier = $id_panier LIMIT 1";
        return $this->executerRequete($sql);

    }

    function getQuantiteDansPanier($id_panier)
    {
        $sql = "SELECT COUNT(id_product) as quantiteDansPanier FROM produitspanier where id_panier = $id_panier";
        $result = $this->executerRequete($sql)->fetch(PDO::FETCH_ASSOC);
        return $result['quantiteDansPanier'];
    }


    function viderPanier($id_panier)
    {
        $sql = "DELETE FROM produitspanier WHERE id_panier = :id_panier";
        $this->executerRequete($sql, [':id_panier' => $id_panier]);
    }

    function creerEmptyPanier()
    {
        $sql = "INSERT INTO panier (customer_id) VALUES (NULL)";
        $this->executerRequete($sql);
    }

    function lastInsertPanierId() {
        $sql = "SELECT id_panier FROM panier ORDER BY id_panier DESC LIMIT 1";
        $resultat = $this->executerRequete($sql);
        $id_panier = $resultat->fetchColumn();
        return $id_panier;
    }

    function assignCustomerId($customer_id) {
        $id_panier = $_COOKIE['id_panier'];

        $sql = "UPDATE panier SET customer_id = :customer_id WHERE id_panier = :id_panier";

        $parametres = array(
            ':id_panier' => $id_panier,
            ':customer_id' => $customer_id,
        );

        return $this->executerRequete($sql, $parametres);
    }


}

?>
