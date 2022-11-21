<?php
session_start();
if (isset($_SESSION['authenticated'])) {
    header('Location: to-do.php');
} else {
    $title = 'Inscription';
    if (
        isset($_POST['last_name'])
        && isset($_POST['first_name'])
        && isset($_POST['email'])
        && isset($_POST['password'])
        && !empty($_POST['last_name'])
        && !empty($_POST['first_name'])
        && !empty($_POST['email'])
        && !empty($_POST['password'])
    ) {
        try {
            $pdo = new PDO(
                "mysql:host=localhost;dbname=to-do-list",
                "root",
                "Logan24092018@",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]

            );
        } catch (PDOException $e) {
            echo $e->getMessage();
            echo "erreur";
            exit;
        } catch (Exception $e) {
        }
        try {
            $stmt = $pdo->prepare("SELECT `first_name` FROM user WHERE email = :email");
            $stmt->execute(['email' => $_POST['email']]);
            $id_exists = $stmt->fetch();
            if ($id_exists != false) {

                $_SESSION['error'] = "Vous êtes déjà inscrit chez nous avec cet email";
            } else {
                try {
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $stmt = $pdo->prepare("INSERT INTO user (last_name, first_name, email, password)
         VALUES (:last_name, :first_name, :email, :password)");

                    $stmt->execute([
                        'last_name' => $_POST['last_name'],
                        'first_name' => $_POST['first_name'],
                        'email' => $_POST['email'],
                        'password' => $password

                    ]);

                    $_SESSION['first_name'] = $_POST['first_name'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['password'] = $password;
                } catch (PDOException $th) {
                    echo $th->getMessage();
                    echo "erreur";
                    exit;
                } catch (Exception $th) {
                }

                unset($pdo);

                header('Location: login.php');
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    };
    require_once './views/register.view.php';
}