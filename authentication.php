<?php
require_once 'partials/_check_if_unlogged.php';
require_once 'partials/_check_if_known.php';
require_once "models/User.php";

$title = 'Authentication';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /*********Vérification*********** */

    if (isset($_POST['connexion'])) {
        require_once 'partials/_start_session.php';

        // vérifier si les champs sont remplis
        if (empty($_POST['password'])) {
            $_SESSION['error'][] = 'Veuillez rentrer votre adresse mail.';
        } else {
            // Récupérer les données du formulaire

            $user = User::findOneByEmail($_SESSION['user']['email']);

            if (!$user) {
                $_SESSION['errors'][] = "Oups, nous ne vous connaissons pas.";
            } else {
                if (password_verify(htmlspecialchars($_POST['password']), $user->getPassword())) {
                    $_SESSION['user']['auth'] = TRUE;
                    $_SESSION['success'][] = "Bienvenue dans votre 2Do";
                    header('Location: to-do.php');
                }
            }
        }
    }
}
require_once './views/authentication.view.php';