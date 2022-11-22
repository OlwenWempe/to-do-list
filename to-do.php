<?php
require_once 'partials/_check_if_logged.php';
require_once "models/Task.php";

$title = 'Ma liste 2Do';

// require_once 'partials/_start_session.php';

if (isset($_GET['order']) && in_array($_GET['order'], ['asc', 'desc'])) {
    $order_request = null;
    $order_request = 'ORDER BY to_do_at ' . $_GET['order'];
}
try {
    $id_user = $_SESSION['user']['id'];
    $tasks = Task::show_tasks($id_user);

    foreach ($tasks as $task) {
        if ($task->is_done == 1) {
            try {
                $stmt = $pdo->prepare("INSERT INTO task_done (id_task, name, id_user, done_at) VALUES (:id_task, :name, :id_user, :done_at)");
                $stmt->execute([
                    'id_task' => $task->id,
                    'name' => $task->name,
                    'id_user' => $_SESSION['id'],
                    'done_at' => date('Y/m/d H:i:s')
                ]);
            } catch (PDOException $th) {
                $_SESSION['error'][] = $th->getMessage();
            } catch (Exception $e) {
                $_SESSION['error'][] = $e->getMessage();
            }
            try {
                $sql = "DELETE FROM task WHERE id = :id";
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute(['id' => $task->id]);
            } catch (PDOException $th) {
                $_SESSION['error'][] = 'Désolé nous n\'avons pas pu mettre à jour votre 2Do.';
            }
        }
    }
} catch (PDOException $th) {
    $_SESSION['error'][] = $th->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $to_delete = 'task';
    require_once 'delete.php';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['done'])) {
    foreach ($_POST['supp'] as $id) {
        $task_finished = Task::setDone($id);
    }
    header('Location: to-do.php');
}


require_once 'views/to-do.view.php';