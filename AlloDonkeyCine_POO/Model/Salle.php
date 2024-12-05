<?php
class Salle
{
    public int $id;
    public int $nbPlaces;
    public int $nbPlacesHandicapes;
    public string $numSalle;

    public function getId()
    {
        return $this->id;
    }

    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    public function getNbPlacesHandicapes()
    {
        return $this->nbPlacesHandicapes;
    }

    public function getNumSalle()
    {
        return $this->numSalle;
    }
}
