<?php

class FilmController
{
    public $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function list()
    {
        $title = "Film";
        $action = "Liste";
        $films = new FilmRepository($this->dbh);
        $films = $films->getFilmList();
        include 'View/header.html.php';
        include 'View/films/list.html.php';
        include 'View/footer.html';
    }


    public function show(int $id)
    {
        var_dump($_POST);
        if ($_POST) {
            $userReservation = new ReservationRepository($this->dbh);
            $userReservation->newUserReservation($_SESSION['user']->id, $_POST['seanceId']);
            var_dump($userReservation);
        }
        var_dump($_POST);
        $id = intval($id);
        $film = new FilmRepository($this->dbh);
        $film = $film->getFilm($id);
        $seances = new SeanceRepository($this->dbh);
        $seances = $seances->getFilmSeance($id);
        $title = $film['titre'];
        $action = "Détail";
        include 'View/header.html.php';
        include 'View/films/show.html.php';
        include 'View/footer.html';
    }
}
