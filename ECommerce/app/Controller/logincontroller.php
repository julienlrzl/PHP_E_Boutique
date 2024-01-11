<?php

require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/panier.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/boisson.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/fruitssec.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/biscuit.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/customers.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/Model/logins.php';


include '/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/vendor/autoload.php';

$loader = new Twig\Loader\FilesystemLoader('/Applications/XAMPP/xamppfiles/htdocs/projetPHP/php-e-boutique/ECommerce/app/View/templates');
$twig = new Twig\Environment($loader);

require_once '../Model/logins.php';

$login = new Logins();
$customer = new Customer();
$panier =new Panier();

$action = $_GET['action'];

switch ($action) {


    case "creercompte":

        {
            if (isset($_POST['submit'])) {
                // Récupérer les données du formulaire
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

                $customer = new Customer();
                $login = new Logins();


                $customer->creerUtilisateur($nom, $prenom, $add1, $add2, $add3, $postcode, $phone, $email);

                $customer_id = $customer->getIdUtilisateur($prenom, $nom, $email);


                ob_start();
                $login->creerLogin($customer_id, $username, $password);
                ob_clean();


                header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");


            }
        }
        break;
    case "seconnecter":
        {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if ($username !== '' && $password !== '') {
                $resultat = $login->seConnecter($username, $password);

                // Vérifie si la méthode a renvoyé un tableau non vide
                if ($resultat && !empty($resultat)) {
                    $id_panier = $resultat[0]["id_panier"];

                    // Création des cookies avec une durée de vie d'un an (en secondes)
                    $expire = time() + 365 * 24 * 3600; // 1 an
                    setcookie('username', $username, $expire, '/');
                    setcookie('password', $password, $expire, '/');

                    $produitsdupanier = $panier->getContenu($id_panier);
                    $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);

                    // Redirection ou autres actions après la connexion réussie
                    echo "Connexion réussie";
                    header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");
                    exit();  // Assurez-vous de terminer le script après la redirection
                } else {
                    // La connexion a échoué
                    echo "Identifiant ou mot de passe incorrect.";
                }
            } else {
                echo "Veuillez fournir un nom d'utilisateur et un mot de passe.";
            }
        }
        break;

    case "sedeconnecter":
        // Détruire la session ou supprimer le cookie ici
        session_start();
        session_destroy(); // ou utilisez unset($_SESSION['nom_variable_session']);

        // Redirigez l'utilisateur vers une page de déconnexion réussie ou une autre page de votre choix.
        header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");
        exit();
        break;

}
?>
