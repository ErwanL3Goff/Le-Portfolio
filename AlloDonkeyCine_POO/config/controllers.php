<?php

spl_autoload_register(function ($class) {
    require BASE_ROOT . 'Controller/' . $class . '.php';
});

// require BASE_ROOT . 'Controller/IndexController.php';
// require BASE_ROOT . 'Controller/FilmController.php';
// require BASE_ROOT . 'Controller/RegisterController.php';
// require BASE_ROOT . 'Controller/LoginController.php';
// require BASE_ROOT . 'Controller/UserController.php';
// require BASE_ROOT . 'Controller/ReservationController.php';
