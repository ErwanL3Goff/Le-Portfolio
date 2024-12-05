<?php

class SeanceController
{
    public $seanceRepository;
    public function __construct($dbh)
    {
        $this->seanceRepository = new SeanceRepository($dbh);
    }

    public function seanceForReservation(): Seance
    {
        $this->seanceRepository->getSeanceForReservation();

        $newSeance = new Seance();
        $newSeance->newSeance();

        return true;
    }
}
