<?php
session_start();

if (isset($_SESSION['authenticated'])) {
    header('Location: to-do.php');
} else {
    $title = 'Connexion';
    if (isset($_SESSION['first_name']) && isset($_SESSION['password'])) {
        require_once 'pdo.php';
        try {
            $stmt = $pdo->prepare("SELECT `email`, `first_name` FROM user WHERE first_name = :first_name");
            $stmt->execute(['first_name' => $_SESSION['first_name']]);
            $id = $stmt->fetch();

            if ($id->email == $_SESSION['email']) {
                $_SESSION['first_name'] = $id->first_name;
                $_SESSION['email'] = $id->email;
                header('Location: authentication.php');
            } else {
                $_SESSION['error'] = "Cet email n'est pas enregistré dans notre base.";
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        unset($pdo);
    } else {
        require_once './views/login.view.php';


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            /*********Vérification*********** */

            require_once 'pdo.php';

            if (isset($_POST['suivant'])) {
                // vérifier si les champs sont remplis
                if (!empty($_POST['email'])) {
                    // Récupérer les données du formulaire
                    try {
                        $stmt = $pdo->prepare("SELECT `email`, `first_name` FROM user WHERE email = :email");
                        $stmt->execute(['email' => $_POST['email']]);
                        $id = $stmt->fetch();
                        if ($id->email == $_POST['email']) {
                            $_SESSION['first_name'] = $id->first_name;
                            $_SESSION['email'] = $id->email;
                            header('Location: authentication.php');
                        } else {
                            $_SESSION['error'] = "Cet email n'est pas enregistré dans notre base.";
                        }
                    } catch (PDOException $th) {
                        echo $th->getMessage();
                    }
                } else {

                    $_SESSION['error'] = 'Veuillez rentrer une adresse mail.';
                }
            }
            unset($pdo);
        };
    }
}