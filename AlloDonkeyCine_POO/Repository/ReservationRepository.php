<?php

class ReservationRepository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    //Inner joint de seance et reservation pour écupérer les reservations de l'utilisateur
    public function checkUserReservation(): array
    {
        $sql = " SELECT 
    s.id AS seance_id, 
    s.date AS seance_date, 
    s.heureDebut AS seance_horaire, 
    r.id_user AS user_id, 
    f.id AS film_id, 
    f.titre AS film_titre, 
    f.duree AS film_duree,
    count(s.id) as nbPlaces
    FROM seance s
    INNER JOIN reservation r ON s.id = r.ID_seance
    INNER JOIN film f ON s.id_film = f.id
    WHERE r.ID_user = :id
    group by s.id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $_SESSION['user']->id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function newUserReservation($idUser, $idSeance)
    {
        $sql = "INSERT INTO reservation (ID_user,ID_seance) VALUES (:idUser, :idSeance)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':idSeance', $idSeance);
        $stmt->execute();
    }
}
