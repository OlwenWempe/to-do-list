<?php
require_once "partials/_check_if_unlogged.php";
require_once "models/User.php";

$title = 'Inscription';
if (isset($_POST['submit'])) {
    require_once 'partials/_start_session.php';

    //check if all the fields are filled in
    if (
        empty($_POST['email']) ||
        empty($_POST['last_name']) ||
        empty($_POST['first_name']) ||
        empty($_POST['password'])
    ) {
        $_SESSION['errors'][] = "veuillez remplir tous les champs";
    } else {
        //check if data is valid
        $secured_data = [
            'last_name' => htmlspecialchars($_POST['last_name']),
            'first_name' => htmlspecialchars($_POST['first_name']),
            'email' => htmlspecialchars($_POST['email']),
            'password' => htmlspecialchars($_POST['password'])
        ];

        //Check email integrity
        try {
            $user = new User();
            $user->setLast_name($secured_data['last_name']);
            $user->setFirst_name($secured_data['first_name']);
            $user->setEmail($secured_data['email']);
            $user->setPassword($secured_data['password']);
        } catch (Exception $e) {
            $_SESSION['errors'][] = $e->getMessage();
        }
        if (empty($_SESSION['errors'])) {

            if ($user->isExistent()) {
                $_SESSION['errors'][] = "cette adresse mail existe déjà";
            }
        }

        if (empty($_SESSION['errors'])) {

            try {
                $user->insert();
                $_SESSION['user'] = [
                    'first_name' => $user->getFirst_name(),
                    'email' => $user->getEmail(),
                ];

                $_SESSION['success'][] = "Vous vous êtes bien enregistré";
                header('Location: login.php');
                exit;
            } catch (Exception $e) {
                $_SESSION['errors'][] = $e->getMessage();
            }
        }
    }
};
require_once './views/register.view.php';