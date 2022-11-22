<?php
require_once 'partials/Connexion.php';

class Task
{
    private int $id;
    private string $name;
    private string $to_do_at;
    private int $is_done;
    private int $id_user;
    private string $order_request;


    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }


    public function getTo_do_at(): string
    {
        return $this->to_do_at;
    }


    public function setTo_do_at(string $to_do_at): void
    {
        $this->to_do_at = $to_do_at;
    }


    public function getIs_done(): int
    {
        return $this->is_done;
    }


    public function setIs_done(int $is_done): void
    {
        $this->is_done = $is_done;
    }


    public function getId_user(): int
    {
        return $this->id_user;
    }


    public function setId_user(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    public function getOrder_request(): int
    {
        return $this->order_request;
    }

    public function insert()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("
        INSERT INTO task (`name`, to_do_at, is_done, id_user) 
        VALUES (:name, :to_do_at, :is_done, :id_user)");
        $stmt->execute([
            'name' => $this->name,
            'to_do_at' => $this->to_do_at,
            'is_done' => $this->is_done,
            'id_user' => $this->id_user
        ]);
    }

    public static function show_tasks(int $id_user)
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("SELECT * FROM task WHERE id_user = :id");
        $stmt->bindParam(':id', $id_user);
        $stmt->execute();
        $tasks = $stmt->fetchAll();

        return $tasks;
    }

    public static function setDone(int $id)
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $sql = "UPDATE task SET is_done = 1 WHERE id=:id";
        $stmt3 = $pdo->prepare($sql);
        $stmt3->execute(['id' => $id]);
    }

    public static function delete(int $id)
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $sql = "DELETE FROM task WHERE id = :id";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
    }
}