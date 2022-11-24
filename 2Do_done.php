<?php
require_once 'partials/_check_if_logged.php';
require_once "models/Task_done.php";

$title = 'Ma liste 2Do done';

$order_request = null;

if (isset($_GET['order']) && in_array($_GET['order'], ['asc', 'desc'])) {
    $order_request = 'ORDER BY done_at ' . $_GET['order'];
}

if (isset($_GET['id']) && $_GET['id'] != '' && is_numeric($_GET['id'])) {

    try {
        $delete = Task_done::delete($_GET['id']);
        $_SESSION['success'][] = "Le 2Do a bien été supprimé.";
    } catch (Exception $e) {
        $_SESSION['errors'][] = "Désolé nous avons rencontré une erreur.";
    }
}

try {
    $id_user = $_SESSION['user']['id'];
    $tasks_done = Task_done::show_tasksDone($id_user);
} catch (PDOException $th) {
    $_SESSION['error'][] = $th->getMessage();
}
require_once 'views/2Do_done.view.php';