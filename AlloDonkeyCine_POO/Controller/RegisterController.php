<?php

class RegisterController
{
    public $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);
    }

    public function checkForm($postUser)
    {
        if (!empty($postUser))
            $newUser['firstName'] = htmlspecialchars($postUser['firstName']);
        $newUser['lastName'] = htmlspecialchars($postUser['lastName']);
        $newUser['email'] = filter_var($postUser['email'], FILTER_SANITIZE_EMAIL);
        $newUser['password'] = $postUser['password'];
        return $newUser;
    }


    public function register()
    {
        $error = '';
        if ($_POST) {
            if ($this->checkForm($_POST)) {
                $newUser = $this->userRepository->addUser([
                    'nom' => $_POST['lastName'],
                    'prenom' => $_POST['firstName'],
                    'surnom' => $_POST['nickname'],
                    'dateDeNaissance' => $_POST['dateOfBirth'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ]);
            }
            if ($newUser) {

                echo "Utilisateur ajouté";
            } else {
                $error = 'Mauvaise';
            }
        }

        $title = "Register";
        $action = 'Nouvel utilisateur';

        include BASE_ROOT . 'View/header.html.php';
        include BASE_ROOT . 'View/register/register.html.php';
        include BASE_ROOT . 'View/footer.html';
    }
}
