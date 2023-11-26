<?php
require_once 'Modele.php';

class AdminModele extends Modele {
    public function getAllAdmins() {
        $sql = "SELECT * FROM products";
        return $this->executerRequete($sql)->fetchAll();
    }
}
?>
