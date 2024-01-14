<?php

require_once '../Model/panier.php';
require_once '../Model/boisson.php';
require_once '../Model/fruitssec.php';
require_once '../Model/biscuit.php';
require_once '../Model/customers.php';
require_once '../Model/logins.php';
require_once '../Model/admin.php';

include '../../vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader('../View/templates');
$twig = new Twig\Environment($loader);

$login = new Logins();
$customer = new Customer();
$panier = new Panier();
$admin = new Admin();

$action = $_GET['action'];
session_start();

switch ($action) {
    case "creercompte":

        if (isset($_POST['submit'])) {

            $nom = $_POST['forname'];
            $prenom = $_POST['surname'];
            $add1 = $_POST['add1'];
            $add2 = isset($_POST['add2']) ? $_POST['add2'] : null;
            $add3 = $_POST['add3'];
            $postcode = $_POST['postcode'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userExists = $login->checkUsernameExists($username);
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);

            if (!$userExists) {
                $customer->creerUtilisateur($nom, $prenom, $add1, $add2, $add3, $postcode, $phone, $email);
                $customer_id = $customer->getIdUtilisateur($prenom, $nom, $email);
                $login->creerLogin($customer_id, $username, $passwordhash);
                $panier->assignCustomerId($customer_id);
                header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=compte");
            }else{
                echo"Le nom d'utilisateur existe déjà. Veuillez en choisir un autre.";
                exit();
            }
        }
        break;

    case "seconnecter":
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $passwordhash = $login->getPasswordHash($username);
        $isAdmin = null;
        $isAdmin = $admin->seConnecterAdmin($username, $password);

        if ($username !== '' && $password !== '') {
            if (!empty($isAdmin)) {
                $expire = time() + 365 * 24 * 3600;
                setcookie('username', $username, $expire, '/');
                setcookie('password', $password, $expire, '/');
                echo "Connexion réussie en tant qu'administrateur";
                header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");

            }

            else {
                $resultat = $login->seConnecter($username, $passwordhash);

                if (!empty($resultat)) {
                    $id_panier = $resultat[0]["id_panier"];

                    $expire = time() + 365 * 24 * 3600;
                    setcookie('username', $username, $expire, '/');
                    setcookie('id_panier', $id_panier, $expire, '/');

                    $produitsdupanier = $panier->getContenu($id_panier);
                    $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);

                    echo "Connexion réussie en tant qu'utilisateur";

                    header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=panier");
                    exit();
                } else {
                    $resultat = $login->seConnecter($username, $password);
                    if (!empty($resultat)) {
                        $id_panier = $resultat[0]["id_panier"];
                        $expire = time() + 365 * 24 * 3600;
                        setcookie('username', $username, $expire, '/');
                        setcookie('id_panier', $id_panier, $expire, '/');

                        $produitsdupanier = $panier->getContenu($id_panier);
                        $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);

                        echo "Connexion réussie en tant qu'utilisateur";

                        header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=panier");
                        exit();

                    }
                    else{
                        echo'Identifiant ou mot de passe incorect';
                    }
                }
            }
        }
        break;

    case "sedeconnecter":
        session_start();
        session_unset();
        session_destroy();
        header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");
        setcookie('username', '', time() - 3600, '/');
        setcookie('password', '', time() - 3600, '/');

        if (isset($_GET['logout']) && $_GET['logout'] === 'success') {
            echo '<div class="logout-success">Déconnexion réussie</div>';
        }
        header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index&logout=success");

        exit();

}

?>
