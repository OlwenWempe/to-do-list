<?php
require_once 'partials/_check_if_unlogged.php';
require_once "models/User.php";

$title = 'Connexion';
if (isset($_SESSION['user'])) {
    header('Location: authentication.php');
} else {
    require_once 'views/login.view.php';


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        /*********Vérification*********** */


        if (isset($_POST['suivant'])) {
            require_once 'partials/_start_session.php';

            // vérifier si les champs sont remplis
            if (empty($_POST['email'])) {
                $_SESSION['error'][] = 'Veuillez rentrer votre adresse mail.';
            } else {
                // Récupérer les données du formulaire
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $email = htmlspecialchars($email);

                $user = User::findOneByEmail($email);

                if (!$user) {
                    $_SESSION['errors'][] = "Oups, nous ne vous connaissons pas.";
                } else {
                    $_SESSION['user'] = [
                        'id' => $user->getId(),
                        'first_name' => $user->getFirst_name(),
                        'email' => $user->getEmail(),
                    ];
                    header('Location: authentication.php');
                }
            }
        }
    };
}