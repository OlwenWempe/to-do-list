<?php
session_start();
$title = 'Ma liste 2Do done';

if (isset($_SESSION['authenticated']) && isset($_SESSION['id'])) {
    require_once 'pdo.php';
    $order_request = null;

    if (isset($_GET['order']) && in_array($_GET['order'], ['asc', 'desc'])) {
        $order_request = 'ORDER BY done_at ' . $_GET['order'];
    }
    try {
        $sql_query = "
        SELECT * 
        FROM task_done 
        WHERE id_user = :id 
        " . $order_request;

        $stmt = $pdo->prepare($sql_query);
        $stmt->execute(['id' => $_SESSION['id']]);
        $tasks_done = $stmt->fetchAll();
    } catch (PDOException $th) {
        $_SESSION['error'] = $th->getMessage();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
        require_once 'delete_def.php';
    }
    unset($pdo);
} else {
    header('Location: destroy.php');
}
require_once 'views/2Do_done.view.php';