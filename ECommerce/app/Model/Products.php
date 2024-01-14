<?php
require_once 'modele.php';

class Products extends modele
{

    public function getProduitsInfo($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $query = $this->executerRequete($sql, [':id' => $id]);

        $ProduitsData = $query->fetch(PDO::FETCH_ASSOC);

        if (!$ProduitsData) {
            return null;
        }
        return $ProduitsData;
    }


    public function getReviewsProduits($id)
    {
        $sql = "SELECT * FROM reviews WHERE id_product = :id";
        $query = $this->executerRequete($sql, [':id' => $id]);

        $reviewsData = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!$reviewsData) {
            return null;
        }

        return $reviewsData;
    }

    public function decrementerQuantite($id_produit, $quantite)
    {
        $sql = "UPDATE products SET quantity = GREATEST(0, quantity - :quantite) WHERE id = :id_produit";
        $parametres = array(
            ":quantite" => $quantite,
            ":id_produit" => $id_produit,
        );
        $this->executerRequete($sql, $parametres);
    }
}

?>