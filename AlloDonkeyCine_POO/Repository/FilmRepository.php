<?php

class FilmRepository
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function getFilmList(): array // Envois un array de films
    {
        $sql = 'SELECT * FROM film';
        $stmt = $this->dbh->prepare($sql);

        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getFilm(int $id): array // Envois un array de films
    {
        $sql = 'SELECT * FROM film where id = :id';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch();
    }

    public function getCurrentFilms(): array
    {
        $sql = 'SELECT 
    f.id AS film_id,
    f.titre AS film_titre,
    f.duree AS film_duree,
    f.description AS film_description,
    f.picture AS film_picture,
    MIN(s.date) AS premiere_seance
FROM film f
INNER JOIN seance s ON f.id = s.id_film
GROUP BY f.id, f.titre, f.duree, f.description, f.picture';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
