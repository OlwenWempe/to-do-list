<?php
session_start();
if (isset($_SESSION['authenticated'])) {
    require_once 'pdo.php';
    if (isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id'])) {
        // récupérer la valeur de $_GET['id']
        $id = $_GET['id'];
        $sql = "DELETE FROM task_done WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        header('Location: 2Do_done.php');
    }
} else {
    header('Location: destroy.php');
}