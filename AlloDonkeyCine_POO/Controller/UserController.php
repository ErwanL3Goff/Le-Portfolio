<?php

class UserController
{
    public $userRepository;

    public function __construct($dbh)
    {
        $this->userRepository = new UserRepository($dbh);
    }


    public function logout()
    {
        session_destroy();
        Header('Location: /index');
    }

    public function updatePassword($postUser)
    {
        if (!empty($postUser)) {
            if ($postUser['confirmNewPassword'] == $postUser['newPassword']) {
                $checkPassword = $this->userRepository->getUserPasswordById($_SESSION['user']->id);
                if ($postUser['oldPassword'] == $checkPassword["password"]) {
                    $checkPassword = $this->userRepository->getUserPasswordById($_SESSION['user']->id);
                    $result = $this->userRepository->updatePassword(['password' => $postUser['newPassword'], 'id' => $_SESSION['user']->id]);
                    return true;
                }
            }
        } else return false;
    }

    public function infos()
    {
        if ($_POST) {
            $updateUser = $this->updatePassword($_POST);
            var_dump($updateUser);
            if ($updateUser == true) {
                echo "Modification effectuée";
            } else {
                echo "Erreur lors de la modification";
            }
        }
        $title = 'Espace utilisateur';
        $action = 'Bienvenu';
        $userFirstname = $_SESSION['user']->prenom;
        $userLastname = $_SESSION['user']->nom;
        include BASE_ROOT . 'View/header.html.php';
        include BASE_ROOT . 'View/user/user.html.php';
        include BASE_ROOT . 'View/footer.html';
    }
}
