<?php

class LoginController
{
    public $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);
    }

    public function login()
    {
        $error = '';

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $user = $this->userRepository->getUserByEmailAndPassword([
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ]);

            if ($user) {

                $_SESSION['user'] = $user;
                Header('Location: /index');
            } else {
                $error = 'Mauvaise';
            }
        }

        $title = "Connexion";
        $action = 'Login';

        include BASE_ROOT . 'View/header.html.php';
        include BASE_ROOT . 'View/login/login.html.php';
        include BASE_ROOT . 'View/footer.html';
    }
}
