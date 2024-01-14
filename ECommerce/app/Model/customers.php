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

    public function getIdUtilisateur($forname, $surname, $email)
    {
        $sql = "SELECT id FROM customers WHERE forname = :forname and surname = :surname and email = :email";

        $parametres = array(
            ':forname' => $forname,
            ':surname' => $surname,
            ':email' => $email
        );

        return $this->executerRequete($sql, $parametres)->fetchColumn();
    }


    public function getUnUtilisateur($username)
    {
        $sql = "SELECT c.* FROM logins l
            JOIN customers c ON l.customer_id = c.id
            WHERE l.username = :username";
        $parametres = array(':username' => $username);

        $resultat = $this->executerRequete($sql, $parametres)->fetch(PDO::FETCH_ASSOC);

        if (!$resultat) {
            return null;
        }

        return $resultat;
    }

    public function updateAddress($customerId, $newAddress, $newPostalCode, $newCity)
    {
        $sql = "UPDATE customers SET add1 = :newAddress, postcode = :newPostalCode, add3 = :newCity WHERE id = :customerId";

        $params = array(
            ':newAddress' => $newAddress,
            ':newPostalCode' => $newPostalCode,
            ':newCity' => $newCity,
            ':customerId' => $customerId
        );

        $this->executerRequete($sql, $params);
    }

}
