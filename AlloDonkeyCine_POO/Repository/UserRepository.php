<?php

class UserRepository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getUserByEmailAndPassword(array $credentials): User|bool
    {
        $sql = 'SELECT * FROM utilisateur WHERE email = \'' . $credentials['email'] . '\' AND password = \'' . $credentials['password'] . '\'';
        $stmt = $this->dbh->prepare($sql);

        $stmt->execute();
        return $stmt->fetchObject(User::class);
    }

    public function addUser(array $newUser)
    {
        $sql = "insert into utilisateur (nom, prenom, email,password,surnom,dateDeNaissance,created_at) 
        values (:nom, :prenom, :email, :password, :surnom, :dateDeNaissance, :created_at)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':nom', $newUser['nom']);
        $stmt->bindParam(':prenom', $newUser['prenom']);
        $stmt->bindParam(':email', $newUser['email']);
        $stmt->bindParam(':password', $newUser['password']);
        $stmt->bindParam(':surnom', $newUser['surnom']);
        $stmt->bindParam(':dateDeNaissance', $newUser['dateDeNaissance']);
        $stmt->bindParam(':created_at', $newUser['created_at']);

        $stmt->execute();
        return $stmt;
    }

    public function getUserPasswordById($id)
    {
        $sql = 'SELECT password FROM utilisateur WHERE id = \'' . $id . '\'';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updatePassword($updatePassword)
    {
        $sql = "UPDATE utilisateur SET password = :password  WHERE id = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':password', $updatePassword['password']);
        $stmt->bindParam(':id', $updatePassword['id']);
        $stmt->execute();
    }
}
