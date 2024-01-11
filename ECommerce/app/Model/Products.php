<?php
require_once 'modele.php';

class Products extends modele
{

    public function getProduitsInfo($id)
    {
        // Logique pour récupérer un utilisateur par son ID depuis la base de données
        $sql = "SELECT * FROM products WHERE id = :id";
        $query = $this->executerRequete($sql, [':id' => $id]);

        // Fetch en tant qu'objet Utilisateur
        $ProduitsData = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifie si un utilisateur a été trouvé
        if (!$ProduitsData) {
            return null;
        }
        return $ProduitsData;
    }

    public function getIdProduit($name){
        $sql ="SELECT id FROM products WHERE name =:name";

        $parametres = array(
                ":name" => $name,
        );
        return $this->executerRequete($sql, $parametres)->fetchColumn();

    }

    public function getReviewsProduits($id){
        $sql = "SELECT * FROM reviews WHERE id_product = :id";
        $query = $this->executerRequete($sql, [':id' => $id]);

        // Fetch en tant qu'ensemble d'avis
        $reviewsData = $query->fetchAll(PDO::FETCH_ASSOC);

        // Vérifie si des avis ont été trouvés
        if (!$reviewsData) {
            return null;
        }

        return $reviewsData;
    }
}
?>