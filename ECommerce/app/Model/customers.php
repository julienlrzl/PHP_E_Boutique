<?php
require_once 'modele.php';


class Customer extends modele
{
    public $id;
    public $forname;
    public $add1;
    public $add2;
    public $add3;
    public $postcode;
    public $phone;
    public $email;
    public $registered;


    public function getId()
    {
        return $this->id;
    }

    public function getForname()
    {
        return $this->forname;
    }

    public function getAdd1()
    {
        return $this->add1;
    }

    public function getAdd2()
    {
        return $this->add2;
    }

    public function getAdd3()
    {
        return $this->add3;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRegistered()
    {
        return $this->registered;
    }






    public function Utilisateur($id, $forname, $add1, $add2, $add3, $postcode, $phone, $email, $registered)
    {
        $this->id = $id;
        $this->forname = $forname;
        $this->add1 = $add1;
        $this->add2 = $add2;
        $this->add3 = $add3;
        $this->postcode = $postcode;
        $this->phone = $phone;
        $this->email = $email;
        $this->registered = $registered;
    }






    public function creerUtilisateur($nom, $prenom, $add1, $add2, $add3, $postcode, $phone, $email)
    {
        $sql = "INSERT INTO customers (forname, surname, add1, add2, add3, postcode, phone, email, registered) 
            VALUES (:forname, :surname, :add1, :add2, :add3, :postcode, :phone, :email, 1)";

        $parametres = array(
            ':forname' => $prenom,
            ':surname' => $nom,
            ':add1' => $add1,
            ':add2' => $add2,
            ':add3' => $add3,
            ':postcode' => $postcode,
            ':phone' => $phone,
            ':email' => $email,
        );
        return $this->executerRequete($sql, $parametres);

    }
    public function creerUtilisateurCookie()
    {
        // Vérification de la présence du cookie de l'utilisateur
        $cookieName = 'customer_id';
        $customer_id = isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : null;

        // Création ou récupération de l'utilisateur
        if ($customer_id === null) {
            // Si le cookie n'existe pas, créez un nouvel utilisateur
            $customer_id = genererNouvelUtilisateur(); // Fonction à implémenter

            // Stockez l'ID de l'utilisateur dans un cookie
            setcookie($cookieName, $customer_id, time() + (86400 * 30), "/"); // valide pendant 30 jours
        } else {
            // Si le cookie existe, récupérez l'ID de l'utilisateur
            // Vous pourriez également effectuer des vérifications supplémentaires ici si nécessaire
        }

        // Reste du code pour traiter l'utilisateur, par exemple, récupérer d'autres informations de la base de données

        return $customer_id;
    }





        public function getIdUtilisateur($forname, $surname, $email){
        $sql ="SELECT id FROM customers WHERE forname = :forname and surname = :surname and email = :email";

        $parametres = array(
                ':forname' => $forname,
                ':surname' => $surname,
                ':email' => $email
        );

        return $this->executerRequete($sql, $parametres)->fetchColumn();
    }


    public function getUnUtilisateur($username)
    {
        // Logique pour récupérer un utilisateur par son ID depuis la base de données
        $sql = "SELECT * FROM logins WHERE username = :username";
        $parametres = array(
                ':username' => $username,

        );


        // Fetch en tant qu'objet Utilisateur
        $utilisateurData = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifie si un utilisateur a été trouvé
        if (!$utilisateurData) {
            return null;
        }

        // Crée un objet Utilisateur à partir des données de la base de données
        $utilisateur = new Utilisateur(
            $utilisateurData['id'],
            $utilisateurData['forname'],
            $utilisateurData['add1'],
            $utilisateurData['add2'],
            $utilisateurData['add3'],
            $utilisateurData['postcode'],
            $utilisateurData['phone'],
            $utilisateurData['email'],
            $utilisateurData['registered']
        );

        return $utilisateur;
    }

    public function mettreAJourUtilisateur(Utilisateur $utilisateur)
    {
        // Logique pour mettre à jour un utilisateur dans la base de données
        $sql = "UPDATE utilisateurs SET forname = :forname, add1 = :add1, add2 = :add2, add3 = :add3,
                postcode = :postcode, phone = :phone, email = :email, registered = :registered
                WHERE id = :id";

        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $utilisateur->getId(), PDO::PARAM_INT);
        $query->bindParam(':forname', $utilisateur->getForname(), PDO::PARAM_STR);
        $query->bindParam(':add1', $utilisateur->getAdd1(), PDO::PARAM_STR);
        $query->bindParam(':add2', $utilisateur->getAdd2(), PDO::PARAM_STR);
        $query->bindParam(':add3', $utilisateur->getAdd3(), PDO::PARAM_STR);
        $query->bindParam(':postcode', $utilisateur->getPostcode(), PDO::PARAM_STR);
        $query->bindParam(':phone', $utilisateur->getPhone(), PDO::PARAM_STR);
        $query->bindParam(':email', $utilisateur->getEmail(), PDO::PARAM_STR);
        $query->bindParam(':registered', $utilisateur->getRegistered(), PDO::PARAM_STR);

        return $query->execute();
    }

    public function supprimerUtilisateur($id)
    {
        // Logique pour supprimer un utilisateur de la base de données
        $sql = "DELETE FROM utilisateurs WHERE id = :id";

        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);

        return $query->execute();
    }




}
