<?php

class Film
{
    public int $id;
    public string $titre;
    public string $duree;
    public string $description;
    public string $picture;
    public bool $diffusion;

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getDiffusion()
    {
        return $this->diffusion;
    }
}
