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



                // try {
                //     $stmt = $pdo->prepare("SELECT `email`, `first_name` FROM user WHERE email = :email");
                //     $stmt->execute(['email' => $_POST['email']]);
                //     $id = $stmt->fetch();
                //     if ($id->email == $_POST['email']) {
                //         $_SESSION['first_name'] = $id->first_name;
                //         $_SESSION['email'] = $id->email;
                //         header('Location: authentication.php');
                //     } else {
                //         $_SESSION['error'] = "Cet email n'est pas enregistré dans notre base.";
                //     }
                // } catch (PDOException $th) {
                //     echo $th->getMessage();
                // }
            } else {
                // Récupérer les données du formulaire
                $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                $email = htmlspecialchars($email);

                $user = User::findOneByEmail($email);

                if (!$user) {
                    $_SESSION['errors'][] = "Oups, nous ne vous connaissons pas.";
                } else {
                    $_SESSION['user'] = [
                        'first_name' => $user->getFirst_name(),
                        'email' => $user->getEmail(),
                    ];
                    header('Location: authentication.php');
                }
            }
        }
    };
}