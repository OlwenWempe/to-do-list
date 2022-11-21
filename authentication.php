<?php
session_start();
if (isset($_SESSION['authenticated'])) {
    header('Location: to-do.php');
} else {
    if (isset($_SESSION['first_name'])) {
        $first_name = ($_SESSION['first_name']);
    } else {
        $first_name = `chèr(e) inconnu(e)`;
        $_SESSION['error'] = `Il semblerait que vous avez oublié de vous identifier`;
    }

    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        require_once 'pdo.php';
        try {
            $stmt = $pdo->prepare("SELECT `id`, `password` FROM user WHERE email = :email");
            $stmt->execute(['email' => $_SESSION['email']]);
            $result = $stmt->fetch();
            $id = $result->id;
            $hash = $result->password;
            try {
                if ($_SESSION['password'] === $hash) {
                    $_SESSION['id'] = $id;
                    $_SESSION['authenticated'] = true;
                    header('Location: to-do.php');
                } else {
                    $title = 'authentication';
                    require_once './views/authentication.view.php';
                    echo $th->getMessage();
                    $_SESSION['error'] = "Ce n'est pas le bon mot de passe";
                }
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
        unset($pdo);
    } else {

        $title = 'Connexion';
        if (isset($_SESSION['email'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                /*********Vérification*********** */
                require_once 'pdo.php';

                if (isset($_POST['connexion'])) {

                    // vérifier si les champs sont remplis
                    if (!empty($_POST['password'])) {
                        // Récupérer les données du formulaire
                        try {
                            $stmt = $pdo->prepare("SELECT `id`, `password` FROM user WHERE email = :email");
                            $stmt->execute(['email' => $_SESSION['email']]);
                            $result = $stmt->fetch();
                            $id = $result->id;
                            $hash = $result->password;
                            if (isset($_POST['connexion'])) {
                                $password = strip_tags($_POST['password']);
                                if (password_verify($password, $hash)) {
                                    $_SESSION['authenticated'] = true;
                                    $_SESSION['id'] = $id;
                                    header('Location: to-do.php');
                                } else {
                                    header('Location = authentication.php');
                                    $_SESSION['error'] = "Ce n'est pas le bon mot de passe";
                                }
                            }
                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                    } else {

                        $_SESSION['error'] = 'Veuillez entrer votre mot de passe.';
                    }
                }
                unset($pdo);
            }
        } else {
            header('Location = destroy.php');
        }
        require_once './views/authentication.view.php';
    }
}