<?php

class UserController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $usersCollection = new UserCollection();

        $page = isset($_GET['page'])? (int)$_GET['page'] : 1;
        $perPage = 5;
        $offset  = ($page) ? ($page-1) * $perPage : 0;

        $rows = count($usersCollection->getAll());

        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/admin/index.php?c=user&m=index");

        $users = $usersCollection->getAll(array(), $offset, $perPage);

        $data['users'] = $users;
        $data['pagination'] = $pagination;


        $this->loadView('users/listing', $data);

    }

    public function create()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        $insertInfo = array(
            'username' => '',
            'password' => '',
            'email'    => '',
            'description' => '',

        );
        $errors = array();
        if (isset($_POST['createUser'])) {

            $insertInfo = array(
                'username' => (isset($_POST['username']))? $_POST['username'] : '',
                'password' => sha1(isset($_POST['password']))? sha1($_POST['password']) : '',
                'email'    => (isset($_POST['email']))? $_POST['email'] : '',
                'description' => (isset($_POST['description'])) ? $_POST['description'] : '',


            );

            $errors = $this->validateUserInput($insertInfo);

            if (empty($errors)) {

                $userEntity = new UsersEntity();
                $userEntity->setUsername($insertInfo['username']);
                $userEntity->setEmail($insertInfo['email']);
                $userEntity->setPassword($insertInfo['password']);
                $userEntity->setDescription($insertInfo['description']);
                $collection = new UserCollection();
                $collection->save($userEntity);

                $_SESSION['flashMessage'] = 'You have 1 new user';
                header('Location: index.php?c=user&m=index');
            }
        }

        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadView('users/create', $data);
    }


    public function update()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: users.php');
        }

        $userCollection = new UserCollection();
        $user = $userCollection->getOne($_GET['id']);

        if (is_null($user)) {
            header('Location: users.php');
        }

        $insertInfo = array(
            'username' => $user->getUsername(),
            'password' => '',
            'email'    => $user->getEmail(),
            'description' => $user->getDescription(),

        );

        $errors = array();

        if (isset($_POST['editUser'])) {

            $insertInfo = array(
                'username'    => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password'    => sha1(isset($_POST['password'])) ? sha1($_POST['password']) : '',
                'email'       => (isset($_POST['email'])) ? $_POST['email'] : '',
                'description' => (isset($_POST['description'])) ? $_POST['description'] : '',

            );

            $errors = $this->validateUserInput($insertInfo);

            if (empty($errors)) {
                $entity = new UsersEntity();
                $entity->setId($_GET['id']);
                $entity->setUsername($insertInfo['username']);
                $entity->setPassword($insertInfo['password']);
                $entity->setEmail($insertInfo['email']);
                $entity->setDescription($insertInfo['description']);
                $userCollection->save($entity);

                $_SESSION['flashMessage'] = 'You have 1 affected row';
                header('Location: index.php?c=user&m=index');
            }
        }


        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadView('users/update', $data);
    }

    public function delete()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=user&m=index');
        }

        $userCollection = new UserCollection();
        $user = $userCollection->getOne($_GET['id']);

        if (is_null($user)) {
            header('Location: index.php?c=user&m=index');
        }

        $userCollection->delete($user->getId());
        header('Location: index.php?c=user&m=index');
    }

    private function validateUserInput($input)
    {
        $errors = array();

        if (!isset($input['username']) || strlen(trim($input['username'])) < 3 || strlen(trim($input['username'])) > 255) {
            $errors['username'] = 'Incorrect username';
        }

        return $errors;
    }
}