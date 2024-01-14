<?php
require_once 'modele.php';

class review extends modele {
    public function getAllReview() {
        $sql = "SELECT * FROM reviews";
        return $this->executerRequete($sql)->fetchAll();
    }
}
?>