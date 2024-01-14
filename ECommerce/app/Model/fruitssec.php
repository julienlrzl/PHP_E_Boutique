<?php
require_once 'modele.php';

class fruitssec extends modele {
    public function getAllFruitssec() {
        $sql = "SELECT * FROM products WHERE cat_id=3";
        return $this->executerRequete($sql)->fetchAll();
    }
}
?>
