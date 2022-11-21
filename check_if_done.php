<?php
try {
    $stmt = $pdo->prepare("SELECT * FROM task WHERE id_user = :id");
    $stmt->execute(['id' => $_SESSION['id']]);
    $tasks = $stmt->fetchAll();
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
                $_SESSION['error'] = $th->getMessage();
            } catch (Exception $th) {
            }
            try {
                $sql = "DELETE FROM task WHERE id = :id";
                $stmt2 = $pdo->prepare($sql);
                $stmt2->execute(['id' => $task->id]);
            } catch (PDOException $th) {
                $_SESSION['error'] = 'Désolé nous n\'avons pas pu mettre à jour votre 2Do.';
            }
        }
    }
} catch (PDOException $th) {
    $_SESSION['error'] = $th->getMessage();
}