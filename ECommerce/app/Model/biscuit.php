<?php
require_once 'modele.php';

class biscuit extends modele {
    public function getAllBiscuits() {
        $sql = "SELECT * FROM products WHERE cat_id=2";
        return $this->executerRequete($sql)->fetchAll();
    }
}
?>
