<?php
require_once 'partials/Connexion.php';

class Task_done
{
    private int $id;
    private int $id_task;
    private string $name;
    private string $done_at;
    private int $id_user;
    private string $order_request;

    public function getId(): int
    {
        return $this->id;
    }


    public function getId_task(): int
    {
        return $this->id_task;
    }
    public function setId_task(int $id_task): void
    {
        $this->id_task = $id_task;
    }


    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getDone_at(): string
    {
        return $this->done_at;
    }


    public function getId_user(): int
    {
        return $this->id_user;
    }
    public function setId_user(int $id_user): void
    {
        $this->id_user = $id_user;
    }


    public function getOrder_request(): string
    {
        return $this->order_request;
    }
    public function setOrder_request(string $order_request): void
    {
        $this->order_request = $order_request;
    }


    public static function show_tasksDone(int $id_user)
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("SELECT * FROM task_done WHERE id_user = :id");
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        $tasks_done = $stmt->fetchAll();

        return $tasks_done;
    }


    public function insert()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("
        INSERT INTO task_done (id_task, name, id_user, done_at) 
        VALUES (:id_task, :name, :id_user, :done_at)");
        $stmt->execute([
            'id_task' => $this->id_task,
            'name' => $this->name,
            'id_user' => $this->id_user,
            'done_at' => date('Y/m/d H:i:s')
        ]);
    }

    public static function delete(int $id)
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $sql = "DELETE FROM task_done WHERE id = :id";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
    }

    /**
     * Get the value of order_request
     */


    /**
     * Set the value of order_request
     *
     * @return  self
     */
}