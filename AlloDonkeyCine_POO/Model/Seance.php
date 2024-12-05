<?php
class Seance
{
    public int $id;
    public film $film;
    public salle $salle;
    public string $heureDebut;
    public string $date;


    function newSeance(int $id, film $film, salle $salle, string $heureDebut)
    {
        $this->id = $id;
        $this->film = $film;
        $this->salle = $salle;
        $this->heureDebut = $heureDebut;
        $this->date = date('Y-m-d');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFilm()
    {
        return $this->film;
    }

    public function getSalle()
    {
        return $this->salle;
    }

    public function getHeureDebut()
    {
        return $this->heureDebut;
    }
}
