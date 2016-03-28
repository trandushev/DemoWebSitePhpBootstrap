<?php

class ClientController extends Controller {

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

        $clientsCollection = new ClientsCollection();

        $page = isset($_GET['page'])? (int)$_GET['page'] : 1;
        $perPage = 5;
        $offset  = ($page) ? ($page-1) * $perPage : 0;

        $rows = count($clientsCollection->getAll());

        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/admin/index.php?c=client&m=index");

        $users = $clientsCollection->getAll(array(), $offset, $perPage);

        $data['users'] = $users;
        $data['pagination'] = $pagination;

        $this->loadView('clients/listing', $data);

    }

    public function create() {
        $data = array();

        $clientCollection = new ClientsCollection();

        $insertInfo = array(
            'username' => '',
            'password' => '',
            'email'    => '',
        );
        $errors = array();
        if(isset($_POST['createUser'])) {

            $insertInfo = array(
                'username' => (isset($_POST['username']))? $_POST['username'] : '',
                'password' => sha1(isset($_POST['password']))? sha1($_POST['password']) : '',
                'email'    => (isset($_POST['email']))? $_POST['email'] : '',
            );

            $errors = $this->validateClientsInput($insertInfo);

            if (empty($errors)) {
                $clientEntity = new ClientsEntity();

                $obj = $clientEntity->init($insertInfo);

                $clientCollection->save($obj);

                $_SESSION['flashMessage'] = 'You have 1 new user';
                header('Location: index.php?c=client&m=index');
            }
        }

        $data['errors'] = $errors;
        $data['insertInfo'] = $insertInfo;

        $this->loadView('clients/create', $data);
    }

    public function update()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: Location: clients.php');
        }

        $clientCollection = new ClientsCollection();
        $client = $clientCollection->getOne($_GET['id']);

        if (is_null($client)) {
            header('Location: customer.php');
        }

        $insertInfo = array(
            'username' => $client->getUsername(),
            'password' => '',
            'email'    => $client->getEmail(),
        );

        $errors = array();

        if (isset($_POST['editClient'])) {

            $insertInfo = array(
                'username'    => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password'    => sha1(isset($_POST['password'])) ? sha1($_POST['password']) : '',
                'email'       => (isset($_POST['email'])) ? $_POST['email'] : '',
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
                header('Location: index.php?c=client&m=index');
            }
        }


        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadView('clients/update', $data);
    }

    public function delete()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=client&m=index');
        }

        $clientCollection = new ClientsCollection();
        $client = $clientCollection->getOne($_GET['id']);

        if (is_null($client)) {
            header('Location: index.php?c=client&m=index');
        }

        $clientCollection->delete($client->getId());
        header('Location: index.php?c=client&m=index');
    }

    private function validateClientsInput($input)
    {
        $errors = array();

        if (!isset($input['username']) || strlen(trim($input['username'])) < 3 || strlen(trim($input['username'])) > 255) {
            $errors['username'] = 'Incorrect username';
        }

        return $errors;
    }
}