<?php
require_once 'partials/Connexion.php';

class Task_done extends Task
{
    private int $id_task;
    private string $done_at;


    public function getId_task(): int
    {
        return $this->id_task;
    }


    public function setId_task(int $id_task): void
    {
        $this->id_task = $id_task;
    }


    public function setDone_at(string $done_at): void
    {
        $this->done_at = $done_at;
    }

    public function insert()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("
        INSERT INTO task_done (id_task, name, id_user, done_at) 
        VALUES (:id_task, :name, :id_user, :done_at)");
        $stmt->execute([
            'id_task' => $this->id,
            'name' => $this->name,
            'id_user' => $this->id_user,
            'done_at' => date('Y/m/d H:i:s')
        ]);
    }
}