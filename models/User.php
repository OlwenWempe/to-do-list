<?php
require_once 'partials/Connexion.php';

class User
{

    private int $id;
    private string $email;
    private string $password;


    public function getId(): int
    {
        return $this->id;
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
        $this->password = password_hash($password, PASSWORD_ARGON2ID);
    }

    public function insertEmail()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("INSERT INTO user (`email`) VALUES (:email)");
        $stmt->execute([
            'email' => $this->email,
        ]);
    }

    public function insertPassword()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();

        $stmt = $pdo->prepare("INSERT INTO user (`password`) VALUES (:password)");
        $stmt->execute([
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