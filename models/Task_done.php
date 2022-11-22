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


    public function getDone_at(): string
    {
        return $this->done_at;
    }
}