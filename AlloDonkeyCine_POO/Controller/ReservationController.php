<?php

class ReservationController
{
    public $reservationRepository;
    public function __construct($dbh)
    {
        $this->reservationRepository = new ReservationRepository($dbh);
    }

    public function list()
    {
        $title = "Reservation";
        $action = 'Vos reservations';
        $reservations = $this->reservationRepository->checkUserReservation();
        include BASE_ROOT . 'View/header.html.php';
        include BASE_ROOT . 'View/Reservation/reservation.html.php';
        include BASE_ROOT . 'View/footer.html';
    }
}
