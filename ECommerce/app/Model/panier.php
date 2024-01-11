<?php
require_once 'modele.php';

// Démarrer ou reprendre une session
class panier extends modele
{

    // Fonction pour ajouter un produit au panier
    function ajouterProduitPanier($id_product, $id_panier)
    {
        // Utilisation de paramètres pour éviter les problèmes de sécurité
        $sql = "INSERT INTO produitspanier (id_product, id_panier) VALUES (:id_product, :id_panier)";

        // Paramètres à lier
        $parametres = array(
            ":id_product" => $id_product,
            ":id_panier" => $id_panier,
        );

        // Exécution de la requête avec les paramètres
        $this->executerRequete($sql, $parametres);

        // Mettez à jour la quantité après l'ajout
        $quantiteDansPanier = $this->getQuantiteDansPanier($id_panier);

        return $quantiteDansPanier;
    }


    function retirerProduitPanier($id_product, $id_panier)
    {
        $sql = "DELETE FROM produitspanier WHERE id_product = $id_product and id_panier = $id_panier;";
        return $this->executerRequete($sql);
    }



    // Fonction qui créer un nouveau panier



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

    function getQuantiteDansPanier($id_panier){
        $sql="SELECT COUNT(id_product) as quantiteDansPanier FROM produitspanier where id_panier = $id_panier";
        $result = $this->executerRequete($sql)->fetch(PDO::FETCH_ASSOC);
        return $result['quantiteDansPanier'];
    }

    function creerNouveauPanier($customer_id)
    {
        $sql = "INSERT INTO panier VALUES (customer_id)";

        $parametres = array(
            ":customer_id" => $customer_id,

        );

        return $this->executerRequete($sql, $parametres);

    }

    function getIdPanier($username, $password){

        $sql = "SELECT logins.customer_id, panier.id_panier
FROM logins
JOIN panier ON panier.customer_id = logins.customer_id
WHERE logins.username = :username AND logins.password = :password;";

        $parametres = array(
                ":username" => $username,
                ":password" =>$password,

        );

        return $this->executerRequete($sql, $parametres);


    }

}
?>
