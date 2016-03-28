<?php
class RegisterController extends Controller
{

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

        $client = $clientsCollection->getAll();

        $data['users'] = $client;

        $this->loadFrontView('profile/register', $data);

    }

    public function create()
    {
        $data = array();

        $clientCollection = new ClientsCollection();

        $insertInfo = array(
            'username' => '',
            'password' => '',
            'email' => '',
        );
        $errors = array();
        if (isset($_POST['register'])) {

            $insertInfo = array(
                'username' => (isset($_POST['username'])) ? $_POST['username'] : '',
                'password' => sha1(isset($_POST['password'])) ? sha1($_POST['password']) : '',
                'email' => (isset($_POST['email'])) ? $_POST['email'] : '',
            );

            $errors = $this->validateClientsInput($insertInfo);

            if (empty($errors)) {
                $clientEntity = new ClientsEntity();

                $obj = $clientEntity->init($insertInfo);

                $clientCollection->save($obj);

                header('Location: index.php?c=tours&m=index');
            }
        }

        $data['errors'] = $errors;
        $data['insertInfo'] = $insertInfo;

        $this->loadFrontView('profile/register', $data);
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
            'email' => $client->getEmail(),
        );

        $errors = array();

        if (isset($_POST['register'])) {

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
                header('Location: index.php?c=client&m=index');
            }
        }


        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadFrontView('profile/update', $data);
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
