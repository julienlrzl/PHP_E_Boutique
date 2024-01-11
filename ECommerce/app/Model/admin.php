<?php
require_once 'modele.php';


class Admin extends modele
{

    public function seConnecterAdmin($usernameadmin, $passwordadmin)
    {
        $sql = "SELECT admin.username, admin.password
        FROM admin 
        WHERE admin.username = :username AND admin.password = :password";

        $parametres = array(
            ':username' => $usernameadmin,
            ':password' => $passwordadmin,

        );

        return $this->executerRequete($sql, $parametres)->fetchAll();

    }

}