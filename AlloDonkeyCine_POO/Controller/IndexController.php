<?php

class IndexController
{
    private $dbh;

    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    public function list()
    {
        $title = 'Index';
        $action = '';
        $currentFilms = new FilmRepository($this->dbh);
        $currentFilms = $currentFilms->getCurrentFilms();
        $films = new FilmRepository($this->dbh);
        $films = $films->getFilmList();
        require 'View/header.html.php';
        require 'View/index/list.html.php';
        require 'View/footer.html';
    }
}
