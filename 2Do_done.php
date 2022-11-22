<?php
require_once 'partials/_check_if_logged.php';
require_once "models/Task_done.php";

$title = 'Ma liste 2Do done';


require_once 'partials/Connexion.php';
$order_request = null;

if (isset($_GET['order']) && in_array($_GET['order'], ['asc', 'desc'])) {
    $order_request = 'ORDER BY done_at ' . $_GET['order'];
}
try {
    $id_user = $_SESSION['user']['id'];
    $tasks_done = Task_done::show_tasksDone($id_user);
} catch (PDOException $th) {
    $_SESSION['error'] = $th->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    require_once 'delete_def.php';
}
unset($pdo);

require_once 'views/2Do_done.view.php';