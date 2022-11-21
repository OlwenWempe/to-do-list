<?php
require_once 'partials/Connexion.php';

class User
{

    private int $id;
    private string $last_name;
    private string $first_name;
    private string $email;
    private string $password;


    public function getId(): int
    {
        return $this->id;
    }

    public function getLast_name(): string
    {
        return $this->last_name;
    }

    public function setLast_name(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getFirst_name(): string
    {
        return $this->first_name;
    }

    public function setFirst_name(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("adresse mail non valide");
        }
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            throw new Exception("Le mot de passe doit contenir au moins 8 caractères dont une minuscule, une majuscule, un chiffre et un caractère spécial");
        }
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function insert()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("INSERT INTO user (last_name, first_name, email, password) VALUES (:last_name, :first_name, :email, :password)");
        $stmt->execute([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }

    public function isExistent()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->execute([
            'email' => $this->email
        ]);

        $count_user = $stmt->rowCount();

        return $count_user > 0 ? true : false;
    }



    public static function findOneByEmail(string $email)
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("SELECT * from user WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $user = $stmt->fetch();

        return $user;
    }
}