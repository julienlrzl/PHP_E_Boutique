<?php

abstract class Modele
{
    private $bdd;

    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);
        } else {
            $resultat = $this->getBdd()->prepare($sql);
            $resultat->execute($params);
        }
        return $resultat;
    }

    protected function getBdd()
    {
        if ($this->bdd == null) {
            $host = 'localhost';
            $dbname = 'web4shop';
            $charset = 'utf8';
            $username = 'root';
            $password = '';

            $dsn = "mysql:host=localhost;dbname=web4shop;charset=utf8;unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock";

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->bdd = new PDO($dsn, $username, $password, $options);
        }
        return $this->bdd;
    }
}

?>
