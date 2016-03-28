<?php

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data = array();


        $clientsCollection = new ClientsCollection();

        $errors = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['username'])) {
                if (isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username']) > 3 && strlen($_POST['password']) > 3) {
                    $password = sha1($_POST['password']);

                    $username = htmlspecialchars(trim($_POST['username']));
                    $where = array('username' => $username);

                    $result = $clientsCollection->getAll($where);

                    if ($result != null && $result[0]->getPassword() == $password) {
                        $_SESSION['client'] = $result[0];
                        $_SESSION['logged_in'] = 1;
                        header('Location: index.php?c=dashboard');
                    } else {
                        $errors['login'] = 'Wrong credentials';
                    }

                } else {
                    $errors['login'] = 'Wrong credentials';
                }
            }
        }

        $data['errors'] = $errors;


        $this->loadFrontView('login', $data);
    }


    public function logout()
    {
        unset($_SESSION['client']);
        unset($_SESSION['logged_in']);
        header('Location: index.php?c=login&m=login');
    }

}