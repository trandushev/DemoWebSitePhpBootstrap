<?php

class BlogController extends Controller {

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

        $blogCollection = new BlogCollection();

        $page = isset($_GET['page'])? (int)$_GET['page'] : 1;
        $perPage = 5;
        $offset  = ($page) ? ($page-1) * $perPage : 0;

        $rows = count($blogCollection->getAll());

        $pagination = new Pagination();
        $pagination->setPerPage($perPage);
        $pagination->setTotalRows($rows);
        $pagination->setBaseUrl("http://softacad.dev/admin/index.php?c=blog&m=index");

        $blogPosts = $blogCollection->getAll(array(), $offset, $perPage);

        $data['blogPosts'] = $blogPosts;
        $data['pagination'] = $pagination;

        $this->loadView('blog/listing', $data);
    }

    public function create()
    {
        $data = array();

        $insertInfo = array(
            'title'       => '',
            'image'       => '',
            'description' => '',

        );
        $errors = array();

        if (isset($_POST['addBlogPost'])) {
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

            $mydate=getdate(time('Y-m-d'));
            $date = time($mydate);
            $dt = new DateTime("@$date");  // convert UNIX timestamp to PHP DateTime
            $mydater = $dt->format('Y-m-d H:i:s'); // output = 2012-08-15 00:00:00

            $insertInfo = array(
                'title'       => $_POST['title'],
                'image'       => $newName,
                'description' => $_POST['description'],
                'created_at'  => $mydater,

            );

            if (empty($imageErrors) && empty($errors)) {
                $blogPostEntity = new BlogEntity();
                $obj = $blogPostEntity->init($insertInfo);

                $blogPostCollection = new BlogCollection();
                $blogPostCollection->save($obj);

                $fileUpload->upload('uploads/blog/' . $newName);

                header("Location: index.php?c=blog&m=index");
            }
        }

        $data['insertInfo'] = $insertInfo;
        $data['errors'] = $errors;

        $this->loadView('blog/create', $data);
    }

    public function update()
    {

        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=tour&m=index');
        }

        $blogCollection = new BlogCollection();
        $blog = $blogCollection->getOne($_GET['id']);

        if (is_null($blog)) {
            header('Location: index.php?c=blog&m=index');
        }

        $insertInfo = array(
            'title' => $blog->getTitle(),
            'image' => $blog->getImage(),
            'description' => $blog->getDescription(),
        );



        if (isset($_POST['editBlog'])) {


            $fileUpload = new fileUpload('image');


            $file = $fileUpload->getFilename();
            $fileExtention = $fileUpload->getFileExtention();

            $imageErrors = array();


            if ($file != '') {

                $imageErrors =  $fileUpload->validate();
                $newName = sha1(time()).'.'.$fileExtention;

            } else {
                $newName = '';
            }


            $fileUpload->upload('uploads/blog/'.$newName);

            $mydate=getdate(time('Y-m-d'));
            $date = time($mydate);
            $dt = new DateTime("@$date");  // convert UNIX timestamp to PHP DateTime
            $mydater = $dt->format('Y-m-d H:i:s'); // output = 2012-08-15 00:00:00

            $insertInfo = array(
                'title' => (isset($_POST['title'])) ? $_POST['title'] : '',
                'image' => $newName,
                'description' => (isset($_POST['description'])) ? $_POST['description'] : '',
                'created_at'  => $mydater,
            );





            $entity = new BlogEntity();
            $entity->setId($_GET['id']);
            $entity->setTitle($insertInfo['title']);
            $entity->setDescription($insertInfo['description']);
            $entity->setImage($insertInfo['image']);
            $entity->setCreatedAt($insertInfo['created_at']);




            $blogCollection->save($entity);

            $_SESSION['flashMessage'] = 'Промяната е извършена!!!';
            header('Location: index.php?c=blog&m=index');
        }


        $data['insertInfo'] = $insertInfo;
        //$data['errors'] = $error;



        $this->loadView('blog/update', $data);

    }

    public function delete()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=blog&m=index');
        }

        $blogCollection = new BlogCollection();
        $blog = $blogCollection->getOne($_GET['id']);

        if (is_null($blog)) {
            header('Location: index.php?c=blog&m=index');
        }

        $blogCollection->delete($blog->getId());
        header('Location: index.php?c=blog&m=index');
    }


    public function blogImages()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        $data = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=blog&m=index');
        }

        $blogCollection = new BlogCollection();
        $blog = $blogCollection->getOne($_GET['id']);

        if (is_null($blog)) {
            header('Location: index.php?c=blog&m=index');
        }

        $blogImagesCollection = new BlogImagesCollection();
        $images = $blogImagesCollection->getAll(array('blog_post_id' => $_GET['id']));


        $fileUpload = new fileUpload('image');
        $file = $fileUpload->getFilename();

        $fileExtention = $fileUpload->getFileExtention();

        $imageErrors = array();

        if ($file != '') {

            $imageErrors =  $fileUpload->validate();
            $newName = sha1(time()).'.'.$fileExtention;
            $insertInfo = array(
                'blog_post_id' => $_GET['id'],
                'image' => $newName
            );

            if (empty($imageErrors)) {

                $imageEntity = new BlogImagesEntity();
                $obj =  $imageEntity->init($insertInfo);
                $blogImagesCollection->save($obj);


                $fileUpload->upload('uploads/blog/'.$newName);

                header("Location: index.php?c=blog&m=blogImages&id=".$_GET['id']);
            }
        } else {

        }

        $data['imageErrors'] = $imageErrors;
        $data['images'] = $images;
        $data['blogId'] = $_GET['id'];

        $this->loadView('blog/blogImages', $data);

    }

    public function deleteBlogImage()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login&m=login');
        }

        if(!isset($_GET['id'])) {
            header('Location: index.php?c=blog&m=index');
        }

        $imageCollection = new BlogImagesCollection();

        $image = $imageCollection->getOne($_GET['id']);

        if(is_null($image)) {
            header('Location: index.php?c=blog&m=index');
        }

        $tourId = $image->getBlogPostId();

        unlink('uploads/blog/'.$image->getImage());
        $imageCollection->delete($_GET['id']);

        header("Location: index.php?c=blog&m=blogImages&id=".$tourId);
    }



}