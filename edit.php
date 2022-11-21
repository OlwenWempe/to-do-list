<?php
session_start();

if (isset($_SESSION['authenticated']) && isset($_SESSION['id'])) {

    require_once 'pdo.php';
    if (isset($_GET['id']) || isset($_SESSION['task_to_edit'])) {
        if (isset($_GET['id'])) {
            $_SESSION['task_to_edit'] = $_GET['id'];
        }
        $id_to_edit = $_SESSION['task_to_edit'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $sql = "UPDATE task SET `name` = :new_name, `to_do_at`= :new_to_do_at WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'new_name' => $_POST['name'],
                    'new_to_do_at' => $_POST['to_do_at'],
                    'id' => $id_to_edit
                ]);
            } catch (PDOException $e) {
                $_SESSION['error'] = 'Nous ne reconnaissons pas votre 2Do';
            }
            header('Location: to-do.php');
            $_SESSION['success'] = 'Nous avons bien modifié votre 2Do.';
        }
        try {
            $stmt = $pdo->prepare("SELECT * FROM task WHERE id = :id");
            $stmt->execute(['id' => $id_to_edit]);
            $update_task = $stmt->fetch();
        } catch (PDOException $th) {
            $_SESSION['error'] = $th;
        }
    } else {
        $_SESSION['error'] = 'Nous avons rencontré un problème. Désolé';
        header('Location: to-do.php');
    }

    unset($pdo);
} else {
    header('Location: destroy.php');
}
require_once './views/edit.view.php';