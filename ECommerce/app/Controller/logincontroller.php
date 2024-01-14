<?php

// Inclure les fichiers nécessaires
require_once '../Model/panier.php';
require_once '../Model/boisson.php';
require_once '../Model/fruitssec.php';
require_once '../Model/biscuit.php';
require_once '../Model/customers.php';
require_once '../Model/logins.php';
require_once '../Model/admin.php';

// Inclure le fichier autoload de Twig
include '../../vendor/autoload.php';

// Initialiser l'environnement Twig
$loader = new Twig\Loader\FilesystemLoader('../View/templates');
$twig = new Twig\Environment($loader);

// Initialiser les instances des classes nécessaires
$login = new Logins();
$customer = new Customer();
$panier = new Panier();
$admin = new Admin();

// Récupérer l'action de l'URL
$action = $_GET['action'];
session_start();
// Switch case pour gérer les différentes actions
switch ($action) {
    case "creercompte":
        // Action pour créer un compte utilisateur
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
            $userExists = $login->checkUsernameExists($username);

            if (!$userExists) {
                $customer->creerUtilisateur($nom, $prenom, $add1, $add2, $add3, $postcode, $phone, $email);
                $customer_id = $customer->getIdUtilisateur($prenom, $nom, $email);
                ob_start();
                $login->creerLogin($customer_id, $username, $password);
                ob_clean();
                header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=compte");
            }else{
                echo"Le nom d'utilisateur existe déjà. Veuillez en choisir un autre.";
                exit();
            }
        }
        break;

    case "seconnecter":
        // Action pour se connecter
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';

        // Vérification si l'utilisateur est un admin
        $isAdmin = null;
        $isAdmin = $admin->seConnecterAdmin($username, $password);

        if ($username !== '' && $password !== '') {
            // Vérifie si l'utilisateur est un admin avant de vérifier s'il est un utilisateur normal
            if (!empty($isAdmin)) {
                // Connexion réussie en tant qu'administrateur
                $expire = time() + 365 * 24 * 3600; // 1 an
                setcookie('username', $username, $expire, '/');
                setcookie('password', $password, $expire, '/');
                echo "Connexion réussie en tant qu'administrateur";
                header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");

            } else {
                // Vérifie si la méthode a renvoyé un tableau non vide
                $resultat = $login->seConnecter($username, $password);

                if (!empty($resultat)) {
                    $id_panier = $resultat[0]["id_panier"];

                    // Création des cookies avec une durée de vie d'un an (en secondes)
                    $expire = time() + 365 * 24 * 3600; // 1 an
                    setcookie('username', $username, $expire, '/');
                    setcookie('password', $password, $expire, '/');

                    $produitsdupanier = $panier->getContenu($id_panier);
                    $quantiteDansPanier = $panier->getQuantiteDansPanier($id_panier);

                    // Redirection ou autres actions après la connexion réussie
                    echo "Connexion réussie en tant qu'utilisateur";
                    header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");
                    exit();  // Assurez-vous de terminer le script après la redirection
                } else {
                    // La connexion a échoué
                    echo "Identifiant ou mot de passe incorrect.";
                }
            }
        } else {
            echo "Veuillez fournir un nom d'utilisateur et un mot de passe.";
        }
        break;

    case "sedeconnecter":
        // Action pour se déconnecter
        // Démarre la session
        session_start();

        // Détruit toutes les données de la session
        session_unset();

        // Détruit la session
        session_destroy();

        // Redirige l'utilisateur vers une page de déconnexion réussie ou une autre page de votre choix.
        header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index");

        // Supprimer le cookie 'username'
        setcookie('username', '', time() - 3600, '/');

        // Supprimer le cookie 'password'
        setcookie('password', '', time() - 3600, '/');

        if (isset($_GET['logout']) && $_GET['logout'] === 'success') {
            // Affiche le message de déconnexion réussie
            echo '<div class="logout-success">Déconnexion réussie</div>';
        }

        // Redirige l'utilisateur vers une page de déconnexion réussie avec un paramètre de succès
        header("Location: http://localhost/projetPHP/php-e-boutique/ECommerce/public?page=index&logout=success");

        exit();

    // Ajouter d'autres cas au besoin

    default:
        // Action par défaut (si l'action n'est pas reconnue)
        // ...
        break;
}

?>
