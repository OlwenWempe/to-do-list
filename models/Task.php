<?php
require_once 'partials/Connexion.php';

class Task
{
    private int $id;
    private string $name;
    private string $to_do_at;
    private int $is_done;
    private int $id_user;


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
}