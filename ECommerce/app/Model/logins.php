<?php
require_once 'modele.php';

class Logins extends modele
{
    public function creerLogin($customer_id, $username, $password)
    {
        $sql = "INSERT INTO logins (customer_id, username, password) 
            VALUES (:customer_id, :username, :password)";
        $parametres = array(
            ':customer_id' => $customer_id,
            ':username' => $username,
            ':password' => $password,
        );
        return $this->executerRequete($sql, $parametres);

    }


    public function seConnecter($username, $password)
    {
        $sql = "SELECT logins.username, logins.password, panier.id_panier 
        FROM logins 
        JOIN panier ON panier.customer_id = logins.customer_id 
        WHERE logins.username = :username AND logins.password = :password";
        $parametres = array(
            ':username' => $username,
            ':password' => $password,

        );
        return $this->executerRequete($sql, $parametres)->fetchAll();
    }

    public function getCustomerId($username, $password)
    {
        $sql = "SELECT customer_id FROM logins WHERE username = :username AND password = :password";
        $parametres = array(
            ':username' => $username,
            ':password' => $password,
        );
        $resultat = $this->executerRequete($sql, $parametres)->fetch();
        return $resultat ? $resultat['customer_id'] : null;

    }

    public function checkUsernameExists($username)
    {
        $sql = "SELECT COUNT(*) FROM logins WHERE username = :username";
        $parametres = array(':username' => $username);
        $resultat = $this->executerRequete($sql, $parametres)->fetchColumn();
        return $resultat > 0;
    }

    public function getPasswordHash($username)
    {
        $sql = "SELECT password FROM logins WHERE username = :username";
        $parametres = array(
            ':username' => $username,
        );
        return $this->executerRequete($sql, $parametres)->fetchColumn();
    }
}

