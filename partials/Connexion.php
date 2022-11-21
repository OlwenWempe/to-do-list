<?php


class Connexion
{

    private $pdo;

    public function __construct()
    {
        $db_config = parse_ini_file('config/db.ini');

        try {
            $this->pdo = new PDO(
                "mysql:host=" . $db_config['db_host'] . ";dbname=" . $db_config['db_name'],
                $db_config['db_user'],
                $db_config['db_password']
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function __destruct()
    {
        unset($this->pdo);
    }
}