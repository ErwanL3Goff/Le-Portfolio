<?php

class Reservation
{
    public int $id;
    public User $user;
    public Seance $seance;

    function newReservation(User $user, Seance $seance)
    {
        $this->user = $user;
        $this->seance = $seance;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getUser()
    {
        return $this->user;
    }
    public function getSeance()
    {
        return $this->seance;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function setSeance(Seance $seance)
    {
        $this->seance = $seance;
    }
}
