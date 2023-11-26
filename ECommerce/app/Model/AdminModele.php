<?php
require_once 'Modele.php';

class AdminModele extends Modele {
    public function getAllAdmins() {
        $sql = "SELECT * FROM admin";
        return $this->executerRequete($sql)->fetchAll();
    }
}
?>
