<?php
session_start();
$title = 'Ma tâche 2Do';

if (isset($_SESSION['authenticated']) && isset($_SESSION['id'])) {
    if (
        isset($_POST['name']) && isset($_POST['to_do_at'])
        && !empty($_POST['name']) && !empty($_POST['to_do_at']) //&& empty($_POST['description'])
    ) {
        require_once 'pdo.php';
        try {
            $stmt = $pdo->prepare("INSERT INTO task (name, to_do_at, id_user) VALUES (:name, :to_do_at, :id_user)");
            $stmt->execute([
                'name' => $_POST['name'],
                'to_do_at' => $_POST['to_do_at'],
                'id_user' => $_SESSION['id']
            ]);
        } catch (PDOException $th) {
            $_SESSION['error'] = $th->getMessage();
        } catch (Exception $th) {
        }

        unset($pdo);
    }
} else {
    // header('Location: destroy.php');
}
require_once 'views/task.view.php';