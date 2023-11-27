<?php

abstract class Modele
{
    // Objet PDO d'accès à la BD
    private $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    private function getBdd()
    {
        if ($this->bdd == null) { // Création de la connexion
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
