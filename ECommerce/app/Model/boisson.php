<?php
require_once 'modele.php';

class boisson extends modele {
    public function getAllBoissons() {
        $sql = "SELECT * FROM products WHERE cat_id=1";
        return $this->executerRequete($sql)->fetchAll();
    }
}
?>
