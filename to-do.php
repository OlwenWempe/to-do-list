<?php
require_once 'partials/_check_if_logged.php';
require_once "models/Task.php";
require_once "models/Task_done.php";

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
                $task_done = new Task_done;
                $task_done->setId_task($task->id);
                $task_done->setName($task->name);
                $task_done->setId_user($task->id_user);
            } catch (PDOException $th) {
                $_SESSION['error'][] = $th->getMessage();
            } catch (Exception $e) {
                $_SESSION['error'][] = $e->getMessage();
            }
            if (empty($_SESSION['errors'])) {
                try {
                    $task_done->insert();
                    $_SESSION['success'][] = "Votre 2Do a bien été marqué comme effectué";
                } catch (Exception $e) {
                    $_SESSION['errors'][] = $e->getMessage();
                }
            }
            if (empty($_SESSION['errors'])) {
                try {
                    $delete = Task::delete($task->id);
                } catch (PDOException $th) {
                    $_SESSION['error'][] = 'Désolé nous n\'avons pas pu mettre à jour votre 2Do.';
                }
            }
        }
    }
} catch (PDOException $th) {
    $_SESSION['error'][] = $th->getMessage();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    if (isset($_POST['supp']) && !empty($_POST['supp'])) {
        foreach ($_POST['supp'] as $id) {
            $delete = Task::delete($id);
        }
    } else {
        $delete = Task::delete($post->id);
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['done'])) {
    foreach ($_POST['supp'] as $id) {
        $task_finished = Task::setDone($id);
    }
    header('Location: to-do.php');
}


require_once 'views/to-do.view.php';