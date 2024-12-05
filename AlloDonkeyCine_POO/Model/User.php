<?php

class User
{
    public $id;
    public string $nom;
    public string $prenom;
    public string $email;
    public string $password;
    public string $surnom;
    public ?string $dateDeNaissance = null;
    public ?string $created_at = null;


    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setSurnom($surnom)
    {
        $this->surnom = $surnom;
    }

    public function setDateDeNaissance($dateDeNaissance)
    {
        $this->dateDeNaissance = $dateDeNaissance;
    }

    public function getCreateTime(): string
    {
        return $this->created_at;
    }
}
