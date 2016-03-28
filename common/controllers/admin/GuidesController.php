<?php

class GuidesController extends Controller{
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

        $guidesCollection = new GuideCollection();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5;
        $offset = ($page) ? ($page - 1) * $perPage : 0;

        $rows = count($guidesCollection->getAll());

        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/admin/index.php?c=guides&m=index");

        $guides = $guidesCollection->getAll(array(), $offset, $perPage);

        $data['guides'] = $guides;
        $data['pagination'] = $pagination;


        $this->loadView('guides/listing', $data);


    }

    public function create()
    {
        $data = array();

        $insertInfo = array(
            'name'       => '',
            'image'       => '',
            'description' => '',

        );
        $errors = array();

        if (isset($_POST['addGuide'])) {
            $fileUpload = new fileUpload('image');
            $file = $fileUpload->getFilename();
            $fileExtention = $fileUpload->getFileExtention();

            $imageErrors = array();
            if ($file != '') {
                $imageErrors = $fileUpload->validate();
                $newName = sha1(time()) . '.' . $fileExtention;
            } else {
                $newName = '';
            }

            $insertInfo = array(
                'name'       => $_POST['name'],
                'image'       => $newName,
                'description' => $_POST['description'],

            );

            if (empty($imageErrors) && empty($errors)) {
                $guideEntity = new GuideEntity();
                $obj = $guideEntity->init($insertInfo);

                $guideCollection = new GuideCollection();
                $guideCollection->save($obj);

                $fileUpload->upload('uploads/pic/' . $newName);

                header("Location: index.php?c=guides&m=index");
            }
        }

        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadView('guides/create', $data);
    }
    public function delete()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=guides&m=index');
        }

        $guideCollection = new GuideCollection();
        $blog = $guideCollection->getOne($_GET['id']);

        if (is_null($blog)) {
            header('Location: index.php?c=guides&m=index');
        }

        $guideCollection->delete($blog->getId());
        header('Location: index.php?c=guides&m=index');
    }
}