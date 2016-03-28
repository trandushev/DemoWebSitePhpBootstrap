<<?php

class ProfileController extends Controller {


    public function index()
    {

        $this->loadFrontView('profile/profile');
    }


    public function update()
    {

        $clientCollection = new ClientsCollection();

        $insertInfo = array();

        $errors = array();

        if (isset($_POST['edit'])) {

            $insertInfo = array(
                'username' => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password' => sha1(isset($_POST['password'])) ? sha1($_POST['password']) : '',
                'email' => (isset($_POST['email'])) ? $_POST['email'] : '',
            );

            $errors = $this->validateClientsInput($insertInfo);

            if (empty($errors)) {
                $entity = new ClientsEntity();
                $entity->setId($_GET['id']);
                $entity->setUsername($insertInfo['username']);
                $entity->setPassword($insertInfo['password']);
                $entity->setEmail($insertInfo['email']);


                $clientCollection->save($entity);

                $_SESSION['flashMessage'] = 'You have 1 affected row';
                header('Location: index.php?c=profile&m=index');
            }
        }
        var_dump($insertInfo);
        die();
        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadFrontView('profile/profile', $data);
    }

}