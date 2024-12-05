<?php

class SeanceRepository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    // public function getSeanceForReservation()
    // {
    //     $query = $this->dbh->prepare("SELECT * FROM seance WHERE id = :id");
    //     $query->execute(['id' => $_GET['id']]);
    //     $seance = $query->fetch();
    //     return $seance;
    // }

    public function getFilmSeance($idMovie): array
    {
        $sql = "SELECT * FROM seance where id_film = :id order by seance.date, seance.heureDebut";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $idMovie);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
